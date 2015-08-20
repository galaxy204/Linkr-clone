<?php

require ('../core/init.php');
$userId = $_SESSION['userid'];
$spaceTitle = $_SESSION['space_title'];

$message = $_POST['message'];
echo $message;
echo "||";
//Insert the post
query_insert($conn, "INSERT INTO space_message(title, message, posted_at, posted_by) VALUES(:title, :message, NOW(), $userId)", array('title' => $spaceTitle,
	'message' => $message));
//we need post id to store the attachment in another table
$queryForPostId = query($conn, "SELECT row_id FROM space_message WHERE posted_by = $userId ORDER BY row_id DESC LIMIT 1");
$post_id = $queryForPostId[0]['row_id'];

//If any attachment is set
if (isset($_POST['filename'])) {
	$fileName = $_POST['filename'];
	$fileDesc =  $_POST['file_desc'];

	//creating new array to hold the attahcment from the form element to insert into db
	$arr = array();
	for ($i=0; $i <count($fileName) ; $i++) {
		$arr[] = array($fileName[$i], $fileDesc[$i]);
	}

	//checking if there is no attahcment
	if (!empty($fileName)) {
		//looping and posting the attahcment with post id in the attachment table
		for ($i=0; $i < count($arr); $i++) {

			query_insert($conn, "INSERT INTO space_message_attachment(post_id, file_name, file_desc) VALUES(:post_id, :file_name, :file_desc)", array(
				'post_id'   => $post_id,
				'file_name' => $arr[$i][0],
				'file_desc' => $arr[$i][1]
			));
			//checking for image attachment and show

			if ( get_file_extension($arr[$i][0]) === 'jpg' || get_file_extension($arr[$i][0]) === 'png' || get_file_extension($arr[$i][0]) === 'jpeg' || get_file_extension($arr[$i][0]) === 'gif') {
				$image  = "<img class='attach-img' src='";
				$image .= url_return('/bin/uploads/') .$arr[$i][0]. '\'' . '/>';
				echo $image;
			} else {
				$attch = '<p>' . $arr[$i][1] . '</p>';
				//file icon load
				$fileIcon = getIcon($arr[$i][0]);
				$attch .= '<i class="icon-file"> '.$fileIcon.'</i><a href="'. url_return('/bin/uploads/') .$arr[$i][0].'" download>' . substr($arr[$i][0], 8) . '</a>';
				echo $attch;
			}

		}



	}
}











?>