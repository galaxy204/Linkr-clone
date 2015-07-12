<?php 
require_once ('database/db.php');
require_once ('functions/func_global.php');

$conn = connect($config);
if ( ! $conn ) die('Couldn\'t connected to db!');