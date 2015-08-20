<?php
//Upload file to the folder and send the file name to the ajax success
require ('../core/init.php');

$tmp_name = $_FILES['files']['tmp_name'];
$file_name = randomNumber() . $_FILES['files']['name'];
$target_path = "../bin/uploads/"  .$file_name;
$basename = basename($target_path);
move_uploaded_file($tmp_name, $target_path);
echo $basename;





?>