<?php 
require ('../core/init.php'); 
restrict_without_login('signin.php');

$ip = $_SERVER['REMOTE_ADDR'];
$id = $_SESSION['userid'];

view('calendar/index', array(), 'layout-calendar');
