<?php require ('../core/init.php'); 
restrict_with_login('../index.php');
?>
<?php
if ( isset($_GET['u']) && isset($_GET['e']) && isset($_GET['p'])) {
	$u = preg_replace( '#[^a-z0-9]#i', '', trim($_GET['u']) );
	$e = htmlspecialchars( trim($_GET['e']) );
	$p = htmlspecialchars( trim($_GET['p']) );
	// Evaluate the lengths of the incoming $_GET variable
	if(strlen($u) < 3 || strlen($e) < 5){
		// Log this issue into a text file and email details to yourself
		header("location: status.php?msg=activation_string_length_issues");
    	exit(); 
	}

	// Check their credentials against the database
	$numrows = query($conn,
					"SELECT COUNT(id) AS id FROM users WHERE username=:username AND email=:email AND password=:password LIMIT 1",
					array('username' => $u, 'email' => $e, 'password' => $p))[0]['id'];
	// Evaluate for a match in the system (0 = no match, 1 = match)
	if($numrows < 1){
		// Log this potential hack attempt to text file and email details to yourself
		header("location: status.php?msg=Your credentials are not matching anything in our system");
    	exit();
	}

	// Match was found, you can activate them
	$actvate = query($conn,
			"UPDATE users SET activated='1' WHERE username=:username LIMIT 1",
			array('username' => $u));

	// Optional double check to see if activated in fact now = 1
	$numrows = query($conn,
			"SELECT COUNT(id) AS id FROM users WHERE username=:username LIMIT 1",
			array('username' => $u))[0]['id'];
	// Evaluate the double check
    if($numrows < 1){
		// Log this issue of no switch of activation field to 1
        header("location: status.php?msg=activation_failure");
    	exit();
    } else if($numrows == 1) {
		// Great everything went fine with activation!
        header("location: status.php?msg=activation_success");
    	exit();
    }
} else {
	// Log this issue of missing initial $_GET variables
	header("location: status.php?msg=missing_GET_variables");
    exit(); 
}