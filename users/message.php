<?php 
require ('../core/init.php'); 
restrict_without_login('signin.php');

view('users/message');