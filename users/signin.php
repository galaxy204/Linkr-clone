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
        					"SELECT id, username, password FROM users WHERE email = :email AND password = :password",
        					array('email' => $e, 'password' => $p))[0];

        	$db_id = $db_data['id'];
	        $db_username = $db_data['username'];
	        $db_password = $db_data['password'];
        	
        	// CREATE THEIR SESSIONS AND COOKIES
        	$_SESSION['userid'] = $db_id;
			$_SESSION['username'] = $db_username;
			$_SESSION['password'] = $db_password;

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

<script src="../js/ajax.js"></script>
<script src="../js/main.js"></script>

<script>
function signin()
{
	var e = _("email").value;
	var p = _("password").value;
	if(e == "" || p == ""){
		_("status").innerHTML = "Fill out all of the form data";
	} else {
		_("signinbtn").style.display = "none";
		_("status").innerHTML = 'please wait ...';
		var ajax = ajaxObj("POST", "signin.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            if(ajax.responseText == "ok"){
					window.location = "../index.php";
				} else {
					_("signinbtn").style.display = "block";
					_("status").innerHTML = ajax.responseText;
				}
	        }
        }
        ajax.send("e="+e+"&p="+p);
	}
}
</script>

<?php view('users/signin', 'layout-signin');  ?>