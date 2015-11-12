<?php
	require('rb.php');
    R::setup( 'mysql:host=46.101.16.248;dbname=que','root', 'PmpwyE9tII');


    $registered = R::getAll("SELECT  guests.id, guests.phone, guests.name, guests.external_id, guests.city, branches.name as branche, guests_routes.table_id as 'table' FROM `guests` 
left join guests_routes
on guests_routes.guest_id = guests.id
left join branches
on guests_routes.branche_id = branches.id
where branche_id > 0
and branche_id <> 13
and time_reg > 0");

    print_r($registered);