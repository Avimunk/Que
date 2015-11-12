<?php
    require 'rb.php';
    require 'init.php';
    require 'branches.php';
    require 'guests.php';
    require 'position.php';
    require 'functions.php';

    if($_GET['user']){
        include_once('user.php');

    }
    elseif($_GET['admin']){
        include_once('admin.php');

    }
    elseif($_GET['show'] == 'registration'){
        include_once('registration.php');

    }
    elseif($_GET['show'] == 'Test drive'){
        include_once('testdrive.php');

    }
    else{
        include_once('main.php');
    }


        //include_once('user.php');

