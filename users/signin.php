<?php 
require ('../core/init.php'); 
restrict_with_login('../index.php');
?>
<?php
// AJAX CALLS THIS LOGIN CODE TO EXECUTE
if(isset($_POST["e"])){
	// GATHER THE POSTED DATA INTO LOCAL VARIABLES AND SANITIZE
	$e = htmlspecialchars( trim($_POST['e']) );
	$p = md5( htmlspecialchars( trim($_POST['p']) ) );

	// GET USER IP ADDRESS
    $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));

	// FORM DATA ERROR HANDLING
	if($e == "" || $p == ""){
		echo "Please fill up all fields";
        exit();
	}else {

        $check_email = query($conn,
        				"SELECT COUNT(id) AS id FROM users WHERE email = :email LIMIT 1",
        				array('email' => $e))[0]['id'];

        if ( $check_email < 1 ) {
        	echo "The email doesn't exist!";
        	exit();
        }

        $check_activated = query($conn,
        				"SELECT COUNT(id) AS id FROM users WHERE email = :email AND activated = '1' LIMIT 1",
        				array('email' => $e) )[0]['id'];

        if ( $check_activated < 1 ) {
        	echo "The account isn't still activated!";
        	exit();
        }

        $check_email_pass = query($conn,
        							"SELECT COUNT(id) AS id FROM users WHERE email = :email AND password = :password LIMIT 1",
        							array('email' => $e, 'password' => $p))[0]['id'];

        if( $check_email_pass < 1 ) {
        	echo "invalid login credentials!";
        	exit();
        } else {
        	$db_data = query($conn,
        					"SELECT id, username, fullname, avatar, password, time FROM users WHERE email = :email AND password = :password",
        					array('email' => $e, 'password' => $p))[0];

        	$db_id = $db_data['id'];
	        $db_username = $db_data['username'];
	        $db_fullname = $db_data['fullname'];
	        $db_avatar = $db_data['avatar'];
	        $db_password = $db_data['password'];
	        $db_time = $db_data['time'];
        	
        	// CREATE THEIR SESSIONS AND COOKIES
        	$_SESSION['userid'] = $db_id;
			$_SESSION['username'] = $db_username;
			$_SESSION['fullname'] = $db_fullname;
			$_SESSION['avatar'] = $db_avatar;
			$_SESSION['password'] = $db_password;
			$_SESSION['time'] = $db_time;

			// setcookie("id", $db_id, strtotime( '+30 days' ), "/", "", "", TRUE);
			// setcookie("user", $db_username, strtotime( '+30 days' ), "/", "", "", TRUE);
   //  		setcookie("pass", $db_password, strtotime( '+30 days' ), "/", "", "", TRUE); 

			// UPDATE THEIR "IP" AND "LASTLOGIN" FIELDS
			query($conn,
					"UPDATE users SET ip = :ip, lastlogin = now() WHERE username = :username",
					array('ip' => $ip, 'username' => $db_username));

			echo "ok";
		    exit();
        }
	}
	exit();
}
?>

<?php view('users/signin', array(), 'layout-signin');  ?>