<?php 
function view($path, $layout = 'layout', $data = NULL)
{
	if($data) {
		extract($data);
	}

	$path = "$path" . ".view.php";
	$layout = "../views/" . $layout . ".php";
	include ($layout);
}