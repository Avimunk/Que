<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <title>AdminLTE 2 | Data Tables</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="template/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="template/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="template/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="template/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<?php
$positions = R::getAll('select * from position');
?>
<body class="skin-blue sidebar-mini">
<div class="wrapper">

<header class="main-header">
    <!-- Logo -->
    <a href="template/index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>TAG</b>Admin</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->

                <!-- User Account: style can be found in dropdown.less -->

                <!-- Control Sidebar Toggle Button -->
            </ul>
        </div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Guests</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="?user=all" target="_blank"><i class="fa fa-circle-o"></i>User screen</a></li>
                    <li><a href="?admin=all"><i class="fa fa-circle-o"></i>All</a></li>
                    <li><a href="?show=registration"><i class="fa fa-circle-o"></i>Registration</a></li>
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i>Distribution</a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="?show=distribution&amp;id=1"><i class="fa fa-circle-o"></i>תל אביב</a>
                                <ul>
                                    <li><a href="?show=distribution&amp;id=1&amp;table=1"><i class="fa fa-dot"></i>№ 1</a></li>
                                    <li><a href="?show=distribution&amp;id=1&amp;table=2"><i class="fa fa-dot"></i>№ 2</a></li>
                                    <li><a href="?show=distribution&amp;id=1&amp;table=3"><i class="fa fa-dot"></i>№ 3</a></li>
                                    <li><a href="?show=distribution&amp;id=1&amp;table=4"><i class="fa fa-dot"></i>№ 4</a></li>
                                    <li><a href="?show=distribution&amp;id=1&amp;table=5"><i class="fa fa-dot"></i>№ 5</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="?show=distribution&amp;id=2"><i class="fa fa-circle-o"></i>חיפה</a>
                                <ul>
                                    <li><a href="?show=distribution&amp;id=2&amp;table=6"><i class="fa fa-dot"></i>№ 6</a></li>
                                    <li><a href="?show=distribution&amp;id=2&amp;table=7"><i class="fa fa-dot"></i>№ 7</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="?show=distribution&amp;id=3"><i class="fa fa-circle-o"></i>רעננה</a>
                                <ul>
                                    <li><a href="?show=distribution&amp;id=3&amp;table=8"><i class="fa fa-dot"></i>№ 8</a></li>
                                    <li><a href="?show=distribution&amp;id=3&amp;table=9"><i class="fa fa-dot"></i>№ 9</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="?show=distribution&amp;id=4"><i class="fa fa-circle-o"></i>חדרה</a>
                                <ul>
                                    <li><a href="?show=distribution&amp;id=4&amp;table=10"><i class="fa fa-dot"></i>№ 10</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="?show=distribution&amp;id=5"><i class="fa fa-circle-o"></i>ירושלים</a>
                                <ul>
                                    <li><a href="?show=distribution&amp;id=5&amp;table=11"><i class="fa fa-dot"></i>№ 11</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="?show=distribution&amp;id=6"><i class="fa fa-circle-o"></i>נתניה</a>
                                <ul>
                                    <li><a href="?show=distribution&amp;id=6&amp;table=12"><i class="fa fa-dot"></i>№ 12</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="?show=distribution&amp;id=7"><i class="fa fa-circle-o"></i>עכו</a>
                                <ul>
                                    <li><a href="?show=distribution&amp;id=7&amp;table=13"><i class="fa fa-dot"></i>№ 13</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="?show=distribution&amp;id=8"><i class="fa fa-circle-o"></i>נצרת</a>
                                <ul>
                                    <li><a href="?show=distribution&amp;id=8&amp;table=14"><i class="fa fa-dot"></i>№ 14</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="?show=distribution&amp;id=9"><i class="fa fa-circle-o"></i>אשדוד</a>
                                <ul>
                                    <li><a href="?show=distribution&amp;id=9&amp;table=15"><i class="fa fa-dot"></i>№ 15</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="?show=distribution&amp;id=10"><i class="fa fa-circle-o"></i>פתרון בעיות</a>
                                <ul>
                                    <li><a href="?show=distribution&amp;id=10&amp;table=16"><i class="fa fa-dot"></i>№ 16</a></li>
                                    <li><a href="?show=distribution&amp;id=10&amp;table=17"><i class="fa fa-dot"></i>№ 17</a></li>
                                    <li><a href="?show=distribution&amp;id=10&amp;table=18"><i class="fa fa-dot"></i>№ 18</a></li>
                                    <li><a href="?show=distribution&amp;id=10&amp;table=19"><i class="fa fa-dot"></i>№ 19</a></li>
                                    <li><a href="?show=distribution&amp;id=10&amp;table=20"><i class="fa fa-dot"></i>№ 20</a></li>
                                </ul>
                            </li>
                        </ul>


                    </li>




                    <li><a href="?show=Test%20drive"><i class="fa fa-circle-o"></i>Test Drive</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?=$_GET['take']?>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Guests list</h3>
                </div><!-- /.box-header -->

                <a href="#" class="btn btn-primary" onclick="window.location.href = window.location.href.replace(/#.*$/, '');">Re-calculate</a>
                <div class="col-xs-1"></div>
                <div class="col-md-10">
                    <div class="box box-solid box-primary" id="addNewForm" style="display:none">

                    </div>
                </div>
                <div class="col-xs-1"></div>



                <div class="box-body">
                    <div class="bbox">
                    <h3>תל אביב</h3>
<?php $count = R::getRow('select count(*) as count from guests where branch = 1 AND guests.position = 2 AND   is_inside NOT IN(0,3,5)')?>
                        <h4><?=$count['count']?></h4><ul id="sortable1" class="connectedSortable" data-id="1">
                    <?php
                        $all = R::findAll( 'guests' , 'branch = 1 AND guests.position= 2 AND  is_inside NOT IN(0,3,5) ORDER BY time_reg ASC');
                    $item = null;
                    foreach($all as $item){
                    ?>
                            <?php $class = 'class="ui-state-default"'; if($item->is_inside == 6 OR $item->is_inside == 7){$class = 'class="ui-state-default ui-state-disabled"';} if($item->prev_position > 99){$style = 'style="background:red!important;color:white!important;"';} ?>
                            <li <?=$style?>  <?=$class?> data-id="<?=$item->id?>">
                                <?=$item->id?>. <?=$item->first_name?> <?=$item->last_name?> - <?=substr($item->phone, -4)?>
                            </li>
                    <?php } ?>
                    </ul>
                    </div>
                    <div class="bbox">
                    <h3>חיפה</h3>
<?php $count = R::getRow('select count(*) as count from guests where branch = 2 AND guests.position = 2 AND   is_inside NOT IN(0,3,5)')?>
                        <h4><?=$count['count']?></h4>
                    <ul id="sortable2" class="connectedSortable" data-id="2">
                        <?php
                        $all = R::findAll( 'guests' , 'branch = 2 AND guests.position= 2 AND  is_inside NOT IN(0,3,5) ORDER BY time_reg ASC');
                        $item = null;
                        foreach($all as $item){
                            ?>
                            <?php $class = 'class="ui-state-default"'; if($item->is_inside == 6 OR $item->is_inside == 7){$class = 'class="ui-state-default ui-state-disabled"';} if($item->prev_position > 99){$style = 'style="background:red!important;color:white!important;"';} ?>
                            <li <?=$style?>  data-id="<?=$item->id?>" <?=$class?>>
                                <?=$item->id?>. <?=$item->first_name?> <?=$item->last_name?> - <?=substr($item->phone, -4)?>
                            </li>
                        <?php } ?>
                    </ul></div>
                        <div class="bbox">
                    <h3>רעננה</h3>
<?php $count = R::getRow('select count(*) as count from guests where branch = 3 AND guests.position = 2 AND   is_inside NOT IN(0,3,5)')?>
                            <h4><?=$count['count']?></h4><ul id="sortable3" class="connectedSortable" data-id="3">
                        <?php
                        $all = R::findAll( 'guests' , 'branch = 3 AND guests.position= 2 AND  is_inside NOT IN(0,3,5) ORDER BY time_reg ASC');
                        $item = null;
                        foreach($all as $item){
                            ?>
                            <?php $class = 'class="ui-state-default"'; if($item->is_inside == 6 OR $item->is_inside == 7){$class = 'class="ui-state-default ui-state-disabled"';} if($item->prev_position > 99){$style = 'style="background:red!important;color:white!important;"';} ?>
                            <li <?=$style?>  data-id="<?=$item->id?>" <?=$class?>>
                                <?=$item->id?>. <?=$item->first_name?> <?=$item->last_name?> - <?=substr($item->phone, -4)?>
                            </li>
                        <?php } ?>
                    </ul></div>
                            <div class="bbox">
                    <h3>חדרה</h3>
<?php $count = R::getRow('select count(*) as count from guests where branch = 4 AND guests.position = 2 AND   is_inside NOT IN(0,3,5)')?>
                                <h4><?=$count['count']?></h4>
                    <ul id="sortable4" class="connectedSortable" data-id="4">
                        <?php
                        $all = R::findAll( 'guests' , 'branch = 4 AND guests.position= 2 AND  is_inside NOT IN(0,3,5) ORDER BY time_reg ASC');
                        $item = null;
                        foreach($all as $item){
                            ?>
                            <?php $class = 'class="ui-state-default"'; if($item->is_inside == 6 OR $item->is_inside == 7){$class = 'class="ui-state-default ui-state-disabled"';} if($item->prev_position > 99){$style = 'style="background:red!important;color:white!important;"';} ?>
                            <li <?=$style?>  data-id="<?=$item->id?>" <?=$class?>>
                                <?=$item->id?>. <?=$item->first_name?> <?=$item->last_name?> - <?=substr($item->phone, -4)?>
                            </li>
                        <?php } ?>
                    </ul></div>
                                <div class="bbox">
                    <h3>ירושלים</h3>
<?php $count = R::getRow('select count(*) as count from guests where branch = 5 AND guests.position = 2 AND   is_inside NOT IN(0,3,5)')?>
                                    <h4><?=$count['count']?></h4><ul id="sortable5" class="connectedSortable" data-id="5">
                        <?php
                        $all = R::findAll( 'guests' , 'branch = 5 AND guests.position= 2 AND  is_inside NOT IN(0,3,5) ORDER BY time_reg ASC');
                        $item = null;
                        foreach($all as $item){
                            ?>
                            <?php $class = 'class="ui-state-default"'; if($item->is_inside == 6 OR $item->is_inside == 7){$class = 'class="ui-state-default ui-state-disabled"';} if($item->prev_position > 99){$style = 'style="background:red!important;color:white!important;"';} ?>
                            <li <?=$style?>  data-id="<?=$item->id?>" <?=$class?>>
                                <?=$item->id?>. <?=$item->first_name?> <?=$item->last_name?> - <?=substr($item->phone, -4)?>
                            </li>
                        <?php } ?>
                    </ul></div>
                                    <div class="bbox">
                    <h3>נתניה</h3>
<?php $count = R::getRow('select count(*) as count from guests where branch = 6 AND guests.position = 2 AND   is_inside NOT IN(0,3,5)')?>
                                        <h4><?=$count['count']?></h4>
                    <ul id="sortable6" class="connectedSortable" data-id="6">
                        <?php
                        $all = R::findAll( 'guests' , 'branch = 6 AND guests.position= 2 AND  is_inside NOT IN(0,3,5) ORDER BY time_reg ASC');
                        $item = null;
                        foreach($all as $item){
                            ?>
                            <?php $class = 'class="ui-state-default"'; if($item->is_inside == 6 OR $item->is_inside == 7){$class = 'class="ui-state-default ui-state-disabled"';} if($item->prev_position > 99){$style = 'style="background:red!important;color:white!important;"';} ?>
                            <li <?=$style?>  data-id="<?=$item->id?>" <?=$class?>>
                                <?=$item->id?>. <?=$item->first_name?> <?=$item->last_name?> - <?=substr($item->phone, -4)?>
                            </li>
                        <?php } ?>
                    </ul></div>
                     <div class="bbox">
                    <h3>עכו</h3>
<?php $count = R::getRow('select count(*) as count from guests where branch = 7 AND guests.position = 2 AND   is_inside NOT IN(0,3,5)')?>
                         <h4><?=$count['count']?></h4><ul id="sortable7" class="connectedSortable" data-id="7">
                        <?php
                        $all = R::findAll( 'guests' , 'branch = 7 AND guests.position= 2 AND  is_inside NOT IN(0,3,5) ORDER BY time_reg ASC');
                        $item = null;
                        foreach($all as $item){
                            ?>
                            <?php $class = 'class="ui-state-default"'; if($item->is_inside == 6 OR $item->is_inside == 7){$class = 'class="ui-state-default ui-state-disabled"';} if($item->prev_position > 99){$style = 'style="background:red!important;color:white!important;"';} ?>
                            <li <?=$style?>  data-id="<?=$item->id?>" <?=$class?>>
                                <?=$item->id?>. <?=$item->first_name?> <?=$item->last_name?> - <?=substr($item->phone, -4)?>
                            </li>
                        <?php } ?>
                    </ul></div>
                     <div class="bbox">
                    <h3>נצרת</h3>
<?php $count = R::getRow('select count(*) as count from guests where branch = 8 AND guests.position = 2 AND   is_inside NOT IN(0,3,5)')?>
                         <h4><?=$count['count']?></h4>
                    <ul id="sortable8" class="connectedSortable" data-id="8">
                        <?php
                        $all = R::findAll( 'guests' , 'branch = 8 AND guests.position= 2 AND  is_inside NOT IN(0,3,5) ORDER BY time_reg ASC');
                        $item = null;
                        foreach($all as $item){
                            ?>
                            <?php $class = 'class="ui-state-default"'; if($item->is_inside == 6 OR $item->is_inside == 7){$class = 'class="ui-state-default ui-state-disabled"';} if($item->prev_position > 99){$style = 'style="background:red!important;color:white!important;"';} ?>
                            <li <?=$style?>  data-id="<?=$item->id?>" <?=$class?>>
                                <?=$item->id?>. <?=$item->first_name?> <?=$item->last_name?> - <?=substr($item->phone, -4)?>
                            </li>
                        <?php } ?>
                    </ul></div>
                         <div class="bbox">
                    <h3>אשדוד</h3>
<?php $count = R::getRow('select count(*) as count from guests where branch = 9 AND guests.position = 2 AND   is_inside NOT IN(0,3,5)')?>
                             <h4><?=$count['count']?></h4><ul id="sortable9" class="connectedSortable" data-id="9">
                        <?php
                        $all = R::findAll( 'guests' , 'branch = 9 AND guests.position= 2 AND  is_inside NOT IN(0,3,5) ORDER BY time_reg ASC');
                        $item = null;
                        foreach($all as $item){
                            ?>
                            <?php $class = 'class="ui-state-default"'; if($item->is_inside == 6 OR $item->is_inside == 7){$class = 'class="ui-state-default ui-state-disabled"';} if($item->prev_position > 99){$style = 'style="background:red!important;color:white!important;"';} ?>
                            <li <?=$style?>  data-id="<?=$item->id?>" <?=$class?>>
                                <?=$item->id?>. <?=$item->first_name?> <?=$item->last_name?> - <?=substr($item->phone, -4)?>
                            </li>
                        <?php } ?>
                    </ul></div>
                             <div class="bbox">
                    <h3>פתרון בעיות</h3>
<?php $count = R::getRow('select count(*) as count from guests where branch = 10 AND guests.position = 2 AND   is_inside NOT IN(0,3,5)')?>
                                 <h4><?=$count['count']?></h4>
                    <ul id="sortable10" class="connectedSortable" data-id="10">
                        <?php
                        $all = R::findAll( 'guests' , 'branch = 10 AND guests.position= 2 AND  is_inside NOT IN(0,3,5) ORDER BY time_reg ASC');
                        $item = null;
                        foreach($all as $item){
                            ?>
                            <?php $class = 'class="ui-state-default"'; if($item->is_inside == 6 OR $item->is_inside == 7){$class = 'class="ui-state-default ui-state-disabled"';} if($item->prev_position > 99){$style = 'style="background:red!important;color:white!important;"';} ?>
                            <li <?=$style?>  data-id="<?=$item->id?>" <?=$class?>>
                                <?=$item->id?>. <?=$item->first_name?> <?=$item->last_name?> - <?=substr($item->phone, -4)?>
                            </li>
                        <?php } ?>
                    </ul></div>


                    <br/><br/><br/>
                    <h1 style="clear: both">Test Drive</h1>
                    <div class="bbox">

                        <?php $count = R::getRow('select count(*) as count from guests where is_inside NOT IN(0,3,5) AND position = 3')?>
                        <h4><?=$count['count']?></h4><ul id="sortable1" class="connectedSortable" data-id="1">
                            <?php
                            $all = R::findAll( 'guests' , 'is_inside NOT IN(0,3,5) AND position = 3 ORDER BY time_reg, time_prev ASC');
                            $item = null;
                            foreach($all as $item){
                                ?>
                                <?php $class = 'class="ui-state-default"'; if($item->is_inside == 6 OR $item->is_inside == 7){$class = 'class="ui-state-default ui-state-disabled"';} if($item->prev_position > 99){$style = 'style="background:red!important;color:white!important;"';} ?>
                                <li <?=$style?>  <?=$class?> data-id="<?=$item->id?>">
                                    <?=$item->id?>. <?=$item->first_name?> <?=$item->last_name?> - <?=substr($item->phone, -4)?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>











                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.0
    </div>
    <strong>Copyright &copy; 2015 <a href="http://tmgroup.co.il">Tag Media Group</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>


</div>
</aside><!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class='control-sidebar-bg'></div>
</div><!-- ./wrapper -->



















<!-- jQuery 2.1.4 -->
<script src="template/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


<style>
    .connectedSortable {
        border: 1px solid #eee;
        width: 152px;
        min-height: 20px;
        list-style-type: none;
        margin: 0;
        padding: 5px 0 0 0;
        float: left;
        margin-right: 10px;
        min-height: 50px;
    }
    .connectedSortable li{
        margin: 0 5px 5px 5px;
        padding: 5px;
        font-size: 0.8em;
        width: 120px;
        border:1px solid darkslategray;
    }
    .connectedSortable li div{
        float: left;
    }
    .box-body h3{
    clear: both;
    }
    .bbox{
        float:left
    }
</style>
<script>
    $(function() {
        $( "#sortable1, #sortable2, #sortable3, #sortable4, #sortable5, #sortable6, #sortable7, #sortable8, #sortable9, #sortable10" ).sortable({
            connectWith: ".connectedSortable",
            items: "li:not(.ui-state-disabled)",
            update: function(event, ui) {
                // grabs the new positions now that we've finished sorting
                var new_position = ui.item.index();
                console.log(ui.item.parent().attr('data-id'));
                var id = ui.item.attr('data-id');
                $.ajax({
                    method: "POST",
                    url: 'api.php',
                    data: {id: id, changePosition: 1, branch: ui.item.parent().attr('data-id')},
                    success: function(response){
                        console.log(id+' '+ui.item.parent().attr('data-id'));
                        console.log(response);
                        //window.location.href = window.location.href.replace(/#.*$/, '');
                    }
                });
            }
        }).disableSelection();
    });
</script>

<style>
    .theRed{
        background:red!important;
        color:white!important;
    }
</style>









<!-- Bootstrap 3.3.2 JS -->
<script src="template/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<script src="template/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="template/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="template/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='template/plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="template/dist/js/app.min.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="template/dist/js/demo.js" type="text/javascript"></script>
<script src="main.js" type="text/javascript"></script>
<!-- page script -->
<script type="text/javascript">
    $(function () {
        //$("#example1").dataTable();
        $('#example1').dataTable({
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });
    });
</script>

</body>
</html>
