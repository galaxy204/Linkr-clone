<?php 
require_once ('database/db.php');

$conn = connect($config);
if ( ! $conn ) die('Couldn\'t connected to db!');