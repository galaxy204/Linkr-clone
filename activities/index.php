<?php 
require ('../core/init.php'); 
restrict_without_login('../users/signin.php');
var_dump($_SESSION);
view('activities/index');