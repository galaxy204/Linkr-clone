<?php 
require ('../core/init.php'); 
restrict_without_login('../users/signin.php');

  
view('activities/index');

