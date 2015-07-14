<?php require ('../core/init.php'); 
restrict_with_login('../index.php');
?>
<?php
// Ajax calls this NAME CHECK code to execute
if(isset($_POST["usernamecheck"])){
	$username = preg_replace('#[^a-z0-9]#i', '', $_POST['usernamecheck']);

	$uname_check = query($conn,
						"SELECT COUNT(id) AS id FROM users WHERE username = :username LIMIT 1",
						array('username' => $username))[0]['id'];

    if (strlen($username) < 3 || strlen($username) > 16) {
	    echo '<strong style="color:#F00;">3 - 32 characters please</strong>';
	    exit();
    }
	if (is_numeric($username[0])) {
	    echo '<strong style="color:#F00;">Usernames must begin with a letter</strong>';
	    exit();
    }
    if ($uname_check < 1) {
	    echo '<strong style="color:#009900;">' . $username . ' is OK</strong>';
	    exit();
    } else {
	    echo '<strong style="color:#F00;">' . $username . ' is taken</strong>';
	    exit();
    }
}
?>

<?php
// Ajax calls this EMAIL CHECK code to execute
if(isset($_POST["emailcheck"])){
	$email = $_POST["emailcheck"];

	if ( filter_var($email, FILTER_VALIDATE_EMAIL) == false ) {
		echo '<strong style="color:#F00;">Email invalid!</strong>';
		exit();
	} else {
		$email_check = query($conn,
						"SELECT COUNT(id) AS id FROM users WHERE email = :email LIMIT 1",
						array('email' => $email))[0]['id'];
	}

	if ( $email_check > 0 ) {
		echo '<strong style="color:#F00;">The email is already in use!</strong>';
		exit();
	} else {
		echo '<strong style="color:#009900;">' . 'The email is OK!' . '</strong>';
	    exit();
	}
}
?>

<?php
// Ajax calls this REGISTRATION code to execute
if(isset($_POST["u"])){
	// GATHER THE POSTED DATA INTO LOCAL VARIABLES
	$fl = htmlspecialchars( preg_replace('#[^a-z0-9 ]#i', '', trim( $_POST['fl']) ) );
	$po = htmlspecialchars( preg_replace('#[^a-z0-9 ]#i', '', trim( $_POST['po']) ) );
	$u  = htmlspecialchars( preg_replace('#[^a-z0-9_]#i', '', trim( $_POST['u']) ) );
	$e  = htmlspecialchars( trim( ($_POST['e']) ) );
	$ep = htmlspecialchars( $_POST['ep'] );
	$p = htmlspecialchars( trim( $_POST['p1'] ) );
	$hidden = $_POST['hidden'];
	// GET USER IP ADDRESS
    $ip = htmlspecialchars( preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR')) );

	// DUPLICATE DATA CHECKS FOR USERNAME AND EMAIL
	$u_check = query($conn,
					"SELECT COUNT(id) AS id FROM users WHERE username = :username",
					array('username' => $u) )[0]['id'];
	
	$e_check = query($conn,
					"SELECT COUNT(email) AS email FROM users WHERE email = :email",
					array('email' => $e) )[0]['email'];

	// FORM DATA ERROR HANDLING
	if ( $hidden !== "") {
		echo "Only human!";
		exit();
	}
	if($fl == "" || $po == "" || $u == "" || $e == "" || $ep == "" || $p == ""){
		echo "The form submission is missing values.";
        exit();
	}
	if ($u_check > 0){ 
        echo "The username you entered is alreay taken";
        exit();
	}
	if ( filter_var($e, FILTER_VALIDATE_EMAIL) == false ) {
		echo "Invalid email";
	}
	if ($e_check > 0){ 
        echo "That email address is already in use in the system";
        exit();
	}
	if (strlen($u) < 3 || strlen($u) > 32) {
        echo "Username must be between 3 and 16 characters";
        exit(); 
    }
    if (is_numeric($u[0])) {
        echo 'Username cannot begin with a number';
        exit();
    }
    if ( strlen($p) < 6 || strlen($p) > 32 ) {
     	echo "Username must be between 3 and 16 characters";
     	exit();
     } else {
	// END FORM DATA ERROR HANDLING

	    // Begin Insertion of data into the database
		// Hash the password and apply your own mysterious unique salt
		
		$p_hash = md5($p);
		// Add user info into the database table for the main site table

		query($conn,
				"INSERT INTO users 	(username, email, email_perm, password, fullname, position, ip, signup, lastlogin, notescheck) values(:username, :email, :email_perm, :password, :fullname, :position, :ip, NOW(), NOW(), NOW() )",
				array('username' => $u, 'email' => $e, 'email_perm' => $ep, 'password' => $p_hash, 'fullname' => $fl, 'position' => $po, 'ip' => $ip ));
		
		// Create directory(folder) to hold each user's files(pics, MP3s, etc.)
		if (!file_exists("user/$u")) {
			mkdir("user_files/$u", 0755);
		}


		// Email the user their activation link
		$to = "$e";							 
		$from = "auto_responder@linkr.com";
		$subject = 'yoursitename Account Activation';
		$message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>yoursitename Message</title></head><body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px; background:#333; font-size:24px; color:#CCC;"><a href="http://www.yoursitename.com"><img src="http://www.yoursitename.com/images/logo.png" width="36" height="30" alt="yoursitename" style="border:none; float:left;"></a>yoursitename Account Activation</div><div style="padding:24px; font-size:17px;">Hello '.$u.',<br /><br />Click the link below to activate your account when ready:<br /><br /><a href="http://www.yoursitename.com/activation.php?u='.$u.'&e='.$e.'&p='.$p_hash.'">Click here to activate your account now</a><br /><br />Login after successful activation using your:<br />* E-mail Address: <b>'.$e.'</b></div></body></html>';
		$headers = "From: $from\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
		mail($to, $subject, $message, $headers);

		echo 1;
		exit();
	}
	exit();
}
?>

<script src="../js/ajax.js"></script>
<script src="../js/main.js"></script>

<script>

function checkusername()
{
	var u = _("username").value;
	if(u != ""){
		_("unamestatus").innerHTML = 'Checking ...';

		var ajax = ajaxObj("POST", "signup.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            _("unamestatus").innerHTML = ajax.responseText;
	        }
        }

        ajax.send("usernamecheck="+u);
	}
}

function checkemail()
{
	var e = _("email").value;
	if(e != ""){
		_("emailstatus").innerHTML = 'Checking ...';

		var ajax = ajaxObj("POST", "signup.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            _("emailstatus").innerHTML = ajax.responseText;
	        }
        }

        ajax.send("emailcheck="+e);
	}
}

function checkpassword()
{
	var p1 = _("password").value;
	var p2 = _("passwordagain").value;

	if(p1 != ""){
		if ( p1.length < 6 ) {
			_('plstatus').innerHTML = 'Password must be between 6-32 charecters!';
		}
	}

	if ( p1 != "" && p2 != "") {
		if ( p1 !== p2 ) {
			_('pmstatus').innerHTML = 'Password doesn\'t match!';
		} else {
			_('pmstatus').innerHTML = '';
		}
	}
}



function signup()
{
	var fl = _("fullname").value;
	var po = _("position").value;
	var u = _("username").value;
	var e = _("email").value;
	var ep = _("emailperm").checked;
	if (ep == true) {
		var ep = 1;
	} else { var ep = 0 };
	var p1 = _("password").value;
	var p2 = _("passwordagain").value;
	var hidden = _("hidden").value;
	var status = _("status");

	if(fl == "" || po == "" || u == "" || e == "" || p1 == "" || p2 == ""){
		status.innerHTML = "Fill out all of the form data";
	}else if(p1 != p2){
		status.innerHTML = "Your password fields do not match";
	} else {
		_("signupbtn").style.display = "none";
		status.innerHTML = 'please wait ...';
		var ajax = ajaxObj("POST", "signup.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            if(ajax.responseText != 1){
					status.innerHTML = ajax.responseText;
					_("signupbtn").style.display = "block";
				} else {
					window.scrollTo(0,0);
					_("signupform").innerHTML = "OK "+u+", check your email inbox and junk mail box at <u>"+e+"</u> in a moment to complete the sign up process by activating your account. You will not be able to do anything on the site until you successfully activate your account.";
				}
	        }
        }
        ajax.send("fl="+fl+"&po="+po+"&u="+u+"&e="+e+"&ep="+ep+"&p1="+p1+"&hidden="+hidden);
	}
}
</script> 

<?php view('users/signup', 'layout-signin'); ?>