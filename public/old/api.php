<?php
    require 'rb.php';
    require 'init.php';
    require 'branches.php';
    require 'guests.php';
    require 'functions.php';
    if($_POST){
        if($_POST['add_new'] == '1'){
            print Guests::create($_POST['first_name'], $_POST['last_name'], $_POST['phone'], $_POST['branch']);
        }
        if($_POST['switch']){
            echo Guests::switchPosition($_POST['id']);
        }
        if($_POST['wait']){
            echo Guests::pausePosition($_POST['id']);
        }
        if($_POST['finish'] == 1){
            echo Guests::finishGuest($_POST['id']);
        }
        if($_POST['take'] == 1){
            echo Guests::takeGuest($_POST['id'], $_POST['table']);
        }
        if($_POST['set'] == 1){
               echo Guests::setBranch($_POST['id'], $_POST['branch']);
        }
        if($_POST['changePosition'] == 1){
            echo Guests::changePosition($_POST['id'], $_POST['branch']);
        }
        if($_POST['register'] == 1){
            echo Guests::register($_POST['id']);
        }
        if($_POST['callGuest'] == 1){
            echo Guests::callGuest($_POST['id'], $_POST['table']);
        }
        if($_POST['callGuest'] == 1){
            echo Guests::takeGuestTest($_POST['id']);
        }
        if($_POST['callGuest'] == 1){
            echo Guests::callGuestTest($_POST['id']);
        }


        if($_POST['call']){
            if($_POST['call'] == 'distribution'){
                $all = Guests::getByDistributionTable($_POST['id'], $_POST['table']);
                foreach($all as $item){
                    if($item->is_inside == 1){
                        $inside = '<span class="label label-success">הגיע</span>';
                    }elseif($item->is_inside == 0){
                        $inside = '<span class="label label-danger">לא הגיע</span>';
                    }elseif($item->is_inside == 4){
                        $inside = '<span class="label label-warning">pending</span>';
                    }elseif($item->is_inside == 6){
                        $inside = '<span class="label label-info">בפגישה</span>';
                    }elseif($item->is_inside == 7){
                        $inside = '<span class="label label-info blink_me">גש לעמדה</span>';
                    }
                    else{
                        $inside = '<span class="label label-info" style="background: #dedede!important">סיים</span>';
                    }

                    $branch = R::getRow('select * from branches where id = "'.$item->branch.'"');

                    $branches = 1;
                    $position = R::getRow('select * from position where id = "'.$item->position.'"');
                    $position = $position['name'];

                    $prev_position = R::getRow('select * from branches where id = "'.$item->prev_position.'"');
                    if($prev_position){
                        if($item->last_stage){
                            $prev_position = $positions[2]['name'];
                        }else{
                            $prev_position = $positions[1]['name'].' '.$prev_position['title'];
                        }

                    }else{
                        if($item->is_inside !== 3){
                            $prev_position = $positions[0]['name'];
                        }else{
                            $prev_position = '';
                        }
                    }
                    if($item->prev_position == 999){
                        $gotBack = '<span class="label label-danger">From Test drive</span>';
                    }else{
                        $gotBack = '';
                    }
                    ?>
                    <tr>
                        <td><?=$item->id?></td>
                        <td><?=$item->first_name?> <?=$item->last_name?></td>
                        <td><?=$item->phone?></td>
                        <td><?=$inside?> <?=$gotBack?></td>
                        <td class="buttons">
                            <!--<a href="#" data-id="<?=$item->id?>" class="btn btn-success switchGuestPosition"><i class="fa"></i> Next Step</a>-->
                            <a href="#" data-id="<?=$item->id?>" class="btn btn-primary callGuest"><i class="fa"></i> Call</a>


                            <a href="#" data-id="<?=$item->id?>" class="btn btn-primary takeGuest"><i class="fa"></i> Take</a>
                            <a href="#" data-id="<?=$item->id?>" class="btn btn-success switchGuestPosition"><i class="fa"></i>Next Step</a>
                            <a href="#" data-id="<?=$item->id?>" class="btn btn-danger finishGuest"><i class="fa"></i> Finish</a>
                            <?php if($item->is_inside == 4){ ?>
                                <a  href="#" data-id="<?=$item->id?>" class="btn btn-primary waitGuestPosition"><i class="fa"></i> Return</a>
                            <?php }else{ ?>
                                <a  href="#" data-id="<?=$item->id?>" class="btn btn-warning waitGuestPosition"><i class="fa"></i> Wait</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php
                }
            }




            if($_POST['call'] == 'testdrive'){
                $all = Guests::getByPosition('3');
                foreach($all as $item){
                    if($item->is_inside == 1){
                        $inside = '<span class="label label-success">הגיע</span>';
                    }elseif($item->is_inside == 0){
                        $inside = '<span class="label label-danger">לא הגיע</span>';
                    }elseif($item->is_inside == 4){
                        $inside = '<span class="label label-warning">pending</span>';
                    }elseif($item->is_inside == 6){
                        $inside = '<span class="label label-info">בפגישה</span>';
                    }elseif($item->is_inside == 7){
                        $inside = '<span class="label label-info blink_me">גש לעמדה</span>';
                    }
                    else{
                        $inside = '<span class="label label-info" style="background: #dedede!important">סיים</span>';
                    }

                    $branch = R::getRow('select * from branches where id = "'.$item->branch.'"');

                    $branches = 1;
                    $position = R::getRow('select * from position where id = "'.$item->position.'"');
                    $position = $position['name'];

                    $prev_position = R::getRow('select * from branches where id = "'.$item->prev_position.'"');
                    if($prev_position){
                        if($item->last_stage){
                            $prev_position = $positions[2]['name'];
                        }else{
                            $prev_position = $positions[1]['name'].' '.$prev_position['title'];
                        }

                    }else{
                        if($item->is_inside !== 3){
                            $prev_position = $positions[0]['name'];
                        }else{
                            $prev_position = '';
                        }
                    }
                    if($item->prev_position == 999){
                        $gotBack = '<span class="label label-danger">From Test drive</span>';
                    }else{
                        $gotBack = '';
                    }
                    ?>
                    <tr>
                        <td><?=$item->id?></td>
                        <td><?=$item->first_name?> <?=$item->last_name?></td>
                        <td><?=$item->phone?></td>
                        <td><?=$inside?> <?=$gotBack?></td>
                        <td class="buttons">
                            <!--<a href="#" data-id="<?=$item->id?>" class="btn btn-success switchGuestPosition"><i class="fa"></i> Next Step</a>-->
                            <a href="#" data-id="<?=$item->id?>" class="btn btn-primary callGuestTest"><i class="fa"></i> Call</a>


                            <a href="#" data-id="<?=$item->id?>" class="btn btn-primary takeGuestTest"><i class="fa"></i> Take</a>
                            <a href="#" data-id="<?=$item->id?>" class="btn btn-success switchGuestPosition"><i class="fa"></i>Next Step</a>
                            <a href="#" data-id="<?=$item->id?>" class="btn btn-danger finishGuest"><i class="fa"></i> Finish</a>
                            <?php if($item->is_inside == 4){ ?>
                                <a  href="#" data-id="<?=$item->id?>" class="btn btn-primary waitGuestPosition"><i class="fa"></i> Return</a>
                            <?php }else{ ?>
                                <a  href="#" data-id="<?=$item->id?>" class="btn btn-warning waitGuestPosition"><i class="fa"></i> Wait</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php
                }
            }

        }
    }
if($_GET['info2']){
    $que = array();
    $i = 0;
    $branches = R::getAll('SELECT * FROM tables');
    foreach($branches as $branch){
        $i++;

        $guests = R::getAll('SELECT * FROM guests WHERE position = 2 AND  is_inside IN(1,6,7)  AND `table` = '.$branch['id'].' ORDER BY time_reg ASC LIMIT 1');

        $que[$branch['id']] = $guests;
    }
    echo json_encode($que);
}
