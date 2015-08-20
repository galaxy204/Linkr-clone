<?php
require ('../core/init.php');
restrict_without_login('../users/signin.php');

$spaceName = $_SESSION['space_title'];

// echo $_SESSION['userid'];
//query for the users profile pic
$picAndName = query($conn, "SELECT avatar, fullname FROM users WHERE id =:id", array('id' => $_SESSION['userid']));


empty($picAndName[0]['avatar']) ? $proPicUser = url_return('/images/default-avatar.png') : $proPicUser = $picAndName[0]['avatar'];
$fullName = $picAndName[0]['fullname'];
//querying posts and sending the array to the view
$posts = query($conn,
	"SELECT * FROM space_message WHERE title = :title ORDER BY row_id DESC",
	array('title' => $spaceName));



//Sending connection reference for function usage
view('activities/space-post', array('conn' => $conn, 'proPicUser' => $proPicUser, 'fullName' => $fullName, 'posts' => $posts), 'layout-feed');



?>