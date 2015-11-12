<?php
	require('rb.php');
    R::setup( 'mysql:host=localhost;dbname=que','root', 'PmpwyE9tII');


    $registered = R::getAll("
   		SELECT 
   		guests.id AS id, guests.name, guests.phone, guests.manager, guests.time_reg,
   		guests.external_id, guests.city, branches.name AS branche, 
   		branches.id AS branche_id, guests_routes.position_id AS position, guests_routes.table_id AS  'table'
    	FROM `guests` 
		left join guests_routes
		on guests_routes.guest_id = guests.id
		left join branches
		on guests_routes.branche_id = branches.id
		where branche_id > 0
		and branche_id <> 13
		and time_reg > 0
	");

    //echo count($registered);

    $result = [];
    foreach($registered as $guest){
    	if($guest['position'] == 1){
	    	$result[$guest['id']] = [
	    		'id' => $guest['id'],
	    		'name' => $guest['name'],
	    		'phone' => $guest['phone'],
	    		'manager' => $guest['manager'],
	    		'external_id' => $guest['external_id'],
	    		'city' => $guest['city'],
	    		'branche' => $guest['branche'],
	    		'table' => $guest['table'],
	    		'branche_of_table' => '',
	    		'reg_date' => '',
	    		'day' => ''
	    	];
    	}elseif($guest['position'] == 2){
    		$result[$guest['id']]['table'] = $guest['table'];
    	}
    	else{}



    	$current = $result[$guest['id']];
    	if($current['table'] != null or $current['table'] != ''){
    		$branche_of_table = R::getRow('Select branches.name as name from tables left join branches on branches.id = tables.branche_id where tables.id = '.$current['table']);
    		$result[$guest['id']]['branche_of_table'] = $branche_of_table['name'];
    	}else{
    		$result[$guest['id']]['branche_of_table'] = null;
    	}


    	$phpdate = strtotime( $guest['time_reg'] );
	$day = date( 'Y-m-d', $phpdate );
	$result[$guest['id']]['reg_date'] = $day;



	$query = R::getRow('SELECT TIMEDIFF(
    (SELECT the_time FROM  guests_routes where guest_id = '.$guest['id'].' and position_id = 2 Order by the_time DESC limit 1),
    
     (SELECT the_time FROM  guests_routes where guest_id = '.$guest['id'].' and position_id = 1 Order by the_time ASC limit 1)
) as time');
	
	$result[$guest['id']]['from_reg_to_table'] = $query['time'];



	$query = R::getRow('SELECT TIMEDIFF(
    (SELECT the_time FROM guests_routes where guest_id = '.$guest['id'].' and (position_id is null  or position_id = 3)  order by the_time DESC limit 1),
    
     (SELECT the_time FROM  guests_routes where guest_id = '.$guest['id'].' and position_id = 2 Order by the_time DESC limit 1)
) as time');


	$result[$guest['id']]['second_time'] = $query['time'];



	$next_step = R::getRow('SELECT position_id FROM guests_routes where guest_id = '.$guest['id'].' and (position_id is null  or position_id = 3)  order by the_time DESC limit 1');
	if($next_step['position_id'] > 2)
		$result[$guest['id']]['next_step'] = 'test drive';
	else 
		$result[$guest['id']]['next_step'] = 'finish';
    
    }
	$i = 0;
?>
	<html>
		<head>
			<meta charset="utf-8">
		</head>
		<body>
			<table>
				<thead>
					<tr>
						<td>#</td>
						<td>id</td>
						<td>name</td>
						<td>phone</td>
						<td>manager</td>
						<td>external_id</td>
						<td>city</td>
						<td>branche</td>
						<td>table</td>
						<td>branche of table</td>
						<td>registration time</td>
						<td>time from reg to table (min)</td>
						<td>next step</td>
						<td>time to next step</td>
					</tr>
				</thead>
				<tbody>
				</tbody><?php foreach($result as $item){ $i ++; ?>
					<tr>
						<td><?=$i?></td>
						<td><?=$item['id']?></td>
						<td><?=$item['name']?></td>
						<td><?=$item['phone']?></td>
						<td><?=$item['manager']?></td>
						<td><?=$item['external_id']?></td>
						<td><?=$item['city']?></td>
						<td><?=$item['branche']?></td>
						<td><?=$item['table']?></td>
						<td><?=$item['branche_of_table']?></td>		
						<td><?=$item['reg_date']?></td>	
						<td><?=$item['from_reg_to_table']?></td>
						<td><?=$item['next_step']?></td>	
						<td><?=$item['second_time']?></td>	
					</tr>
					<?php } ?>
				</tbody>
			</table>		
		</body>
	</html>

	<style type="text/css">
			table {
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
}
td{padding:5px;
	}
	</style>}
