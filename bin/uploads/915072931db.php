<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'phpcom');
$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_DATABASE) or die(mysqli_connect_error());

//print_r($db);	
$path = "uploads/"; //Images upload folder 
