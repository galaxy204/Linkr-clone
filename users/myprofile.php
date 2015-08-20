<?php 
require ('../core/init.php'); 
restrict_without_login('signin.php');

$ip = $_SERVER['REMOTE_ADDR'];
$id = $_SESSION['userid'];



/***********************************************************************************************/
/* 1. UPDATE AVATAR PHP */
/***********************************************************************************************/
if(isset($_FILES["file"]["type"]))
{	
	$file_type = $_FILES['file']['type'];
	$file_size = $_FILES['file']['size'];
	$file_error = $_FILES['file']['error'];
	$tmp_name = $_FILES['file']['tmp_name'];
	$file_name = $_FILES['file']['name'];

	$user = trim($_SESSION['username']);
	$time = trim($_SESSION['time']);

	if ( $file_type != 'image/jpg' && $file_type != 'image/jpeg' && $file_type != 'image/png' ) {
		echo "type_error";
		exit;
	}

	if ( $file_size > 307200 ) {
		echo "size_error";
		exit;
	}

	if ( $file_error > 0 ) {
		echo "file_error";
		exit;
	}

	if ( file_exists("users_files/$user$time/$file_name") ) {
		echo "file_exist";
		exit;
	} else {

		$source_path = $tmp_name;
		$file_name  = microtime() . $file_name;
		$target_path = "users_files/" . $user . $time ."/" .$file_name;

		move_uploaded_file($source_path, $target_path);

		// create a path url
		$myurl = $_SERVER['REQUEST_URI'];
		$myurl = explode('/', $myurl);
		$myurl = end($myurl);

		if ($myurl == 'myprofile.php') {
			$myurl = dirname($_SERVER['REQUEST_URI']);
		} else {
			$myurl = $_SERVER['REQUEST_URI'];
		}

		$url  = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
		$url .= $_SERVER['SERVER_NAME'];
		$url .= $myurl;

		$img_full_path = $url . "/". $target_path;

		// update avatar into db.
		$update_avatar = query_update($conn,
									"UPDATE users SET avatar = :avatar, ip = :ip WHERE id = :id",
									array('avatar' => $img_full_path, 'ip' => $ip, 'id' => $id));
		if ($update_avatar) {
			echo $img_full_path;
			exit;
		} else {
			echo "file_error";
			exit;
		}
	}
}




/***********************************************************************************************/
/* 1. UPDATE PROFILE INFO PHP */
/***********************************************************************************************/
if ( isset($_POST['emailcheck']) ) {
	$email = htmlspecialchars( trim($_POST['emailcheck']) );

	$cid = (int)$_SESSION['userid'];

	if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
		echo "<p style='color: red'>Invalid!</p>";
		exit;
	}

	$email_check = query($conn,
						"SELECT COUNT(id) AS id FROM users WHERE email = :email AND id != $cid",
						array('email' => $email))[0]['id'];

	if ( $email_check > 0 ) {
		echo "<p style='color: red'>Already exists!</p>";
		exit;
	} else {
		echo "";
		exit;
	}	
}

if ( isset($_POST['e']) ) {
	$fl = htmlspecialchars( preg_replace('#[^a-z0-9 ]#i', '', trim( $_POST['fl']) ) );
	$e  = htmlspecialchars( trim( ($_POST['e']) ) );
	$ep = htmlspecialchars( $_POST['ep'] );
	$o = htmlspecialchars( preg_replace('#[^a-z0-9 .]#i', '', trim( $_POST['o']) ) );
	$ps = htmlspecialchars( preg_replace('#[^a-z0-9 .]#i', '', trim( $_POST['ps']) ) );
	$ph = htmlspecialchars( preg_replace('#[^a-z0-9 +]#i', '', trim( $_POST['ph']) ) );
	$fb  = htmlspecialchars( trim( ($_POST['fb']) ) );
	$gp  = htmlspecialchars( trim( ($_POST['gp']) ) );
	$sk  = htmlspecialchars( trim( ($_POST['sk']) ) );
	$tw  = htmlspecialchars( trim( ($_POST['tw']) ) );
	$li  = htmlspecialchars( trim( ($_POST['li']) ) );
	$gh  = htmlspecialchars( trim( ($_POST['gh']) ) );
	
	
	if ( $fl == "" || $e == "" || $ps == "" ) {
		echo "<p>Asterisk fields are required!</p>";
		exit;
	} 

	if( filter_var($e, FILTER_VALIDATE_EMAIL) == false ) {
		echo "<p>Invalid email!</p>";
		exit;
	}

	// check that the email is not duplicate against data
	$cid = $_SESSION['userid'];
	$email_check = query($conn,
						"SELECT COUNT(id) AS id FROM users WHERE email = :email AND != $cid",
						array('email' => $e))[0];

	if ( $email_check > 0 ) {
		echo "<p>Email address Already exists!</p>";
		exit;
	} else {
		// update the profile info.
		$ip = $_SERVER['REMOTE_ADDR'];
		$id = $_SESSION['userid'];
		$update_profile = query_update($conn,
										"UPDATE users SET fullname = :fullname, email = :email, email_perm = :email_perm, organization = :organization, position = :position, phone = :phone, facebook = :facebook, googleplus = :googleplus, skype = :skype, twitter = :twitter, linkedin = :linkedin, github = :github, ip = :ip WHERE id = :id LIMIT 1",
										array('fullname' => $fl, 'email' => $e, 'email_perm' => $ep, 'organization' => $o, 'position' => $ps, 'phone' => $ph, 'facebook' => $fb, 'googleplus' => $gp, 'skype' => $sk, 'twitter' => $tw, 'linkedin' => $li, 'github' => $gh, 'ip' => $ip, 'id' => $id));
		if ( $update_profile ) {
			echo "ok";
			exit;
		} else {
			echo "<p>Already updated!</p>";
			exit;
		}

		echo "<p>Some error has been occured!</p>";
		exit;
	}


}




/***********************************************************************************************/
/* 2. UPDATE PASSWORD PHP */
/***********************************************************************************************/
if ( isset($_POST['passOld']) ) {
	$pass_old = htmlspecialchars( trim($_POST['passOld']) );
	$pass = htmlspecialchars( trim($_POST['pass']) );
	$pass_again = htmlspecialchars( trim($_POST['passAgain']) );

	if ( $pass_old == "" || $pass == "" || $pass_again == "" ) {
		echo "<p>All fields are required!</p>";
		exit;
	}

	if ( $pass_old === $pass ) {
		echo "<p>Your old password and new password are same!</p>";
		exit;
	}

	// convert old password into md5 hash.
	$pass_old = md5($pass_old);

	// check the old password that matched against database.
	$check_old_pass = query($conn,
							"SELECT COUNT(id) AS id FROM users WHERE id = :id AND password = :password",
							array('id' => $id, 'password' => $pass_old))[0]['id'];
	if ( $check_old_pass < 1 ) {
		echo "miss-matched";
		exit;
	}

	// convert new password into md5 hash and update password.
	$pass = md5($pass);
	$update_pass = query_update($conn,
								"UPDATE users SET password = :password, ip = :ip WHERE id = :id",
								array('password' => $pass, 'ip' => $ip, 'id' => $id));

	if ($update_pass) {
		echo "ok";
		exit;
	}  else {
		echo "<p>Some has been occured to update password!</p>";
		exit;
	}
}




/***********************************************************************************************/
/* 3. UPDATE SETTINGS PHP */
/***********************************************************************************************/
if ( isset($_POST['npMsg'])) {
	$npMsg = htmlspecialchars($_POST['npMsg']);
	$npEmail = htmlspecialchars($_POST['npEmail']);

	$commPosMsg = htmlspecialchars($_POST['commPosMsg']);
	$commPosEmail = htmlspecialchars($_POST['commPosEmail']);

	$commPosStarredMsg = htmlspecialchars($_POST['commPosStarredMsg']);
	$commPosStarredEmail = htmlspecialchars($_POST['commPosStarredEmail']);

	$linksMsg = htmlspecialchars($_POST['linksMsg']);
	$linksEmail = htmlspecialchars($_POST['linksEmail']);

	$menMsg = htmlspecialchars($_POST['menMsg']);
	$menEmail = htmlspecialchars($_POST['menEmail']);

	$inviteMsg = htmlspecialchars($_POST['inviteMsg']);
	$inviteEmail = htmlspecialchars($_POST['inviteEmail']);

	$privateEmail = htmlspecialchars($_POST['privateEmail']);

	//update data into notifications table.
	$update_msg_perm = query_insert($conn,
							"UPDATE notifications SET new_posts = :new_posts, comm_posts = :comm_posts, comm_s_posts = :comm_s_posts, links = :links, mentions = :mentions, invitations = :invitations, private_msg = :private_msg WHERE user_id = :id AND event = :event",
							array('new_posts' => $npMsg, 'comm_posts' => $commPosMsg, 'comm_s_posts' => $commPosStarredMsg, 'links' => $linksMsg, 'mentions' => $menMsg, 'invitations' => $inviteMsg, 'private_msg' => '0', 'id' => $id, 'event' => 'message'));

	$update_email_perm = query_insert($conn,
							"UPDATE notifications SET new_posts = :new_posts, comm_posts = :comm_posts, comm_s_posts = :comm_s_posts, links = :links, mentions = :mentions, invitations = :invitations, private_msg = :private_msg WHERE user_id = :id AND event = :event",
							array('new_posts' => $npEmail, 'comm_posts' => $commPosEmail, 'comm_s_posts' => $commPosStarredEmail, 'links' => $linksEmail, 'mentions' => $menEmail, 'invitations' => $inviteEmail, 'private_msg' => $privateEmail, 'id' => $id, 'event' => 'email'));
	if ( $update_msg_perm || $update_email_perm ) {
		echo "ok";
		exit;
	} else {
		echo "<p>Already updated!</p>";
		exit;
	}
	

	echo "<p>Some error has been occured!</p>";
	exit;
}




$id = (int)$_SESSION['userid'];

$data = query($conn,
			"SELECT * FROM users WHERE id=:id LIMIT 1",
			array('id' => $id))[0];

$notifications = query($conn,
					"SELECT * FROM notifications WHERE user_id = :id",
					array('id' => $id));


view('users/myprofile', array('data' => $data, 'notifications' => $notifications));