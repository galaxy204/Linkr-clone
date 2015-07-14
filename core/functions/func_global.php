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

function restrict_without_login($location)
{
	if ( empty($_SESSION['username']) ) {
		header('Location: ' . $location);
	}
}

function restrict_with_login($location)
{
	if ( isset($_SESSION['username']) ) {
		header('Location: ' . $location);
	}
}