<?php 
require ('../core/init.php'); 
restrict_without_login('signin.php');

$ip = $_SERVER['REMOTE_ADDR'];
$id = $_SESSION['userid'];

$users = query($conn,
			"SELECT id, fullname, avatar, position, organization FROM users");

view('users/people', array('users' => $users));