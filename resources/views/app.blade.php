<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <title>AdminLTE 2 | Data Tables</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="/template/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="/template/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="/template/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="/template/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="/template/plugins/jQuery/jQuery-2.1.4.min.js"></script>
</head>

<body class="skin-blue sidebar-mini">
<div class="wrapper">
<div id="table" data-id="" style="display: none"></div>
<header class="main-header">
    <!-- Logo -->
    <a href="/template/index2.html" class="logo">
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
                    <li><a href="/plasma" target="_blank"><i class="fa fa-circle-o"></i>User screen</a></li>
                    <li><a href="/registration/all"><i class="fa fa-circle-o"></i>All</a></li>
                    <li><a href="/registration/"><i class="fa fa-circle-o"></i>Registration</a></li>
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i>Distribution</a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="#"><i class="fa fa-circle-o"></i>אשדוד</a>
                                <ul>
                                    <li><a href="/distribution/9/1"><i class="fa fa-dot"></i>№ 1</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-circle-o"></i>תל אביב</a>
                                <ul>
                                    <li><a href="/distribution/1/2"><i class="fa fa-dot"></i>№ 2</a></li>
                                    <li><a href="/distribution/1/3"><i class="fa fa-dot"></i>№ 3</a></li>
                                    <li><a href="/distribution/1/4"><i class="fa fa-dot"></i>№ 4</a></li>
                                    <li><a href="/distribution/1/5"><i class="fa fa-dot"></i>№ 5</a></li>
                                    <li><a href="/distribution/1/6"><i class="fa fa-dot"></i>№ 6</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-circle-o"></i>חיפה</a>
                                <ul>
                                    <li><a href="/distribution/2/7"><i class="fa fa-dot"></i>№ 7</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-circle-o"></i>ראשון לציון</a>
                                <ul>
                                    <li><a href="/distribution/13/8"><i class="fa fa-dot"></i>№ 8</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-circle-o"></i>עכו</a>
                                <ul>
                                    <li><a href="/distribution/7/9"><i class="fa fa-dot"></i>№ 9</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-circle-o"></i>מעלות</a>
                                <ul>
                                    <li><a href="/distribution/14/10"><i class="fa fa-dot"></i>№ 10</a></li>
                                </ul>
                            </li>
                           <li>
                                <a href="#"><i class="fa fa-circle-o"></i>יפו</a>
                                <ul>
                                    <li><a href="/distribution/15/11"><i class="fa fa-dot"></i>№ 11</a></li>
                                </ul>
                            </li>
                           <li>
                                <a href="#"><i class="fa fa-circle-o"></i>נתניה</a>
                                <ul>
                                    <li><a href="/distribution/6/12"><i class="fa fa-dot"></i>№ 12</a></li>
                                </ul>
                            </li>
                           <li>
                                <a href="#"><i class="fa fa-circle-o"></i>נצרת</a>
                                <ul>
                                    <li><a href="/distribution/8/13"><i class="fa fa-dot"></i>№ 13</a></li>
                                </ul>
                            </li>
                           <li>
                                <a href="#"><i class="fa fa-circle-o"></i>ירושלים</a>
                                <ul>
                                    <li><a href="/distribution/5/14"><i class="fa fa-dot"></i>№ 14</a></li>
                                </ul>
                            </li>
                           <li>
                                <a href="#"><i class="fa fa-circle-o"></i>מטה</a>
                                <ul>
                                    <li><a href="/distribution/16/15"><i class="fa fa-dot"></i>№ 15</a></li>
                                    <li><a href="/distribution/16/16"><i class="fa fa-dot"></i>№ 16</a></li>
                                    <li><a href="/distribution/16/17"><i class="fa fa-dot"></i>№ 17</a></li>
                                </ul>
                            </li>
                           <li>
                                <a href="#"><i class="fa fa-circle-o"></i>טריד מובייל</a>
                                <ul>
                                    <li><a href="/distribution/17/18"><i class="fa fa-dot"></i>№ 18</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="/distribution/101/21/"><i class="fa fa-circle-o"></i>Test Drive</a></li>
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

    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            @yield('content')
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.0 &beta;
    </div>
    <strong>Copyright &copy; 2015 <a href="http://bob.org.il" target="_blank">Avi Munk</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>

</aside><!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class='control-sidebar-bg'></div>
</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->

<!-- Bootstrap 3.3.2 JS -->
<script src="/template/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<script src="/template/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="/template/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="/template/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='template/plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="/template/dist/js/app.min.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="/template/dist/js/demo.js" type="text/javascript"></script>
<script src="/template/main.js" type="text/javascript"></script>
<!-- page script -->


@yield('scripts')


</body>
</html>
