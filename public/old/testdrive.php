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
    <script src="template/plugins/jQuery/jQuery-2.1.4.min.js"></script>
</head>
<?php
$positions = R::getAll('select * from position');
?>
<body class="skin-blue sidebar-mini">
<div class="wrapper">
<div id="table" data-id="<?=$_GET['table']?>" style="display: none"></div>
<header class="main-header">
    <!-- Logo -->
    <a href="template/index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>TAG</b></span>
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
    <h1 style="direction: ltr">
        <?=$_GET['show']?>
        <?php
        if($_GET['table']){
            $branch = R::getRow('Select * from branches where id = "'.$_GET['id'].'"');
            echo '<br>'.$branch['title'].'<br>שולחן '.$_GET['table'];
        }
        ?>
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
        <br>
        
        <div class="col-xs-1"></div>
        <div class="col-md-10">
            <div class="box box-solid box-primary" id="addNewForm" style="display:none">



                <div class="box-header">
                    <h3 class="box-title">Register a new guest</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="register-box-body">
                        <p class="login-box-msg">Register a new membership</p>
                        <form action="#" id="addNewGuestForm" method="post">
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" name="first_name" placeholder="First name">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" name="last_name" placeholder="Last name">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" name="phone"  placeholder="Phone">
                                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <select class="form-control" name="branch">
                                    <option value="0"><span style="color: red">Select</span></option>
                                    <?php
                                    $branches = R::getAll('select * from branches');
                                    foreach($branches as $item){
                                        ?>
                                        <option value="<?=$item['id']?>"><?=$item['title']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="hidden" class="form-control" name="add_new" value="1">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                                </div><!-- /.col -->
                                <div class="col-xs-6">
                                    <button type="reset" id="back_btn" class="btn btn-primary btn-block btn-danger">Reset</button>
                                </div><!-- /.col -->
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-body -->
            </div>
        </div>
        <div class="col-xs-1"></div>






        <div class="box-body">
            <?php
                $all = Guests::getByPosition('3');
                //echo '<script>$(document).ready(function(){setTimeout(refresh, 3000);})</script>';
                $class="hide";
                $api = 'testDrive';
            ?>
            <div id="theApi" style="display: none" data-id="<?=$api?>"></div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th class="<?=$class?>">Branch</th>
                    <!--<th>Position</th>
                    <th>Previous</th>-->
                    <th>Status</th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody>

                <?php
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
                        <td  class="<?=$class?>">
                            <form class="setBranch" data-id="<?=$item->id?>">
                                <select class=" form-control selectBranch<?=$item->id?>" data-id="<?=$item->id?>" name="branch">
                                    <option value="$branch<?=$branch['id']?>"><?=$branch['title']?></option>
                                    <?php
                                    $branches = R::getAll('select * from branches');
                                    foreach($branches as $br){
                                        ?>
                                        <option value="<?=$br['id']?>"><?=$br['title']?></option>
                                    <?php } ?>
                                </select>
                            </form>
                        </td>
                        <!--<td><?=$position?></td>
                        <td><?=$prev_position?></td>-->
                        <td><?=$inside?> <?=$gotBack?></td>
                        <td class="buttons">

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

                ?>
                </tbody>
            </table>
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

<script>
    function apiCall() {
        var theApi = $('#theApi').attr('data-id');
        var theId = '<?=$_GET['id']?>';
        var theTable = '<?=$_GET['table']?>';
        $.ajax({
            url:'api.php',
            data: {call: 'testdrive'},
            type: 'post',
            success:function(response){
                $('#example1 tbody').html('');
                $('#example1 tbody').append(response);
            }

        });
        setTimeout(apiCall, 1000);
    };
    $(document).ready(function(){
        setTimeout(apiCall, 100);
    });

</script>


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
