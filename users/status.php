<?php require ('../core/init.php'); 
restrict_with_login('../index.php');
?>
<?php 
if ( isset($_GET['msg'])) {
	$a_status = $_GET['msg'];
	if ($a_status === "activation_success") {
		$data = 'success';
	} else {
		$data = 'not-success';
	}
}
view('users/status', array('data'=>$data), 'layout-signin');