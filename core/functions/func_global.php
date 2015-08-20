<?php 
function view($path, $data = NULL, $layout = 'layout')
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

/*
* @dir = return the root folder name
* @example = Linkr-clone
**/
$dir = __DIR__ . '<br>';
$dir = explode('/', $dir);
$dir = array_slice($dir, -3, -2)[0];
$dir;

/*
* @url = echo path up to root folder name
* @example = http://localhost/Linkr-clone
**/
function url($insert_url)
{	
	global $dir;
	$url = "http";
	if ( isset( $_SERVER["HTTPS"]) ) {
		$url .= "s";
	}
	$url .= "://";
	if ( $_SERVER["SERVER_PORT"] != 80 ) {
		$url .= $_SERVER["SERVER_NAME"].$_SERVER["SERVER_PORT"].'/' . $dir . $insert_url;
	} else {
		$url .= $_SERVER["SERVER_NAME"].'/' . $dir . $insert_url;
	}
	return $url;
}


function notifications($iid, $elem, $notifications) {
	if ( isset($notifications[$iid][$elem]) ) {
		return $notifications[$iid][$elem];
	}
	return false;
}

function ternary($data, $default_data = "", $add_after = "", $add_before = "" ) {
	if ( $data != "" ) {
		$output = $add_before;
		$output .= $data;
		$output .= $add_after;
		echo $output;
	} else {
		echo $default_data;
	}
}

function multiPrint($params, $divider="", $pre="", $pos="")
{
	$params = explode(',', $params);
	$count = count($params);

	$output = "";
	for( $i = 0; $i < $count; $i++ ) {
		if( $i < $count - 1 ) {
			$output .= $pre . $params[$i] . $divider . $pos;
		} else {
			$output .= $pre . $params[$i] . $pos;
		}
	}

	return $output;
}

function multiPrintImage($url, $description="", $pre="", $pos="")
{
	$url = explode(',', $url);
	$count = count($url);

	$description = explode(',', $description);

	$output = "";
	for( $i = 0; $i < $count; $i++ ) {
		$output .= $pre . '<img src="' . $url[$i] . '"> <span>' . $description[$i] . '</span>' . $pos;
	}

	return $output;
}

/*
 * @param $date string
 * @param $time string
 * return string
 */
function fullDate($date, $time)
{
	try {
		$str_to_time = strtotime($date . $time);
		$full_date = date("l, F d, Y h:i A", $str_to_time);

		return $full_date;
	} catch(NotFoundException $e)  {
		return false;
	}
}



//making another url function with return key for certain needs-Arif
function url_return($insert_url)
{
	global $dir;
	$url = "http";
	if ( isset( $_SERVER["HTTPS"]) ) {
		$url .= "s";
	}
	$url .= "://";
	if ( $_SERVER["SERVER_PORT"] != 80 ) {
		$url .= $_SERVER["SERVER_NAME"].$_SERVER["SERVER_PORT"].'/' . $dir . $insert_url;
	} else {
		$url .= $_SERVER["SERVER_NAME"].'/' . $dir . $insert_url;
	}
	return $url;
}



//checks the checkboxes and return 0 if the checkbox is unchecked @Arif
function undefineCheck($paramOne) {
	if (empty($paramOne)) {
		$Nval = 0;
	} else {
		$Nval = $paramOne;
	}
	return $Nval;  //either 0 or 1
}

//Creates menu option as necessary @Arif
function checkSpaceOptions($conn, $spaceTitle) {

	$row = query($conn,
				"SELECT drive, wikis, tasks, chat FROM new_space WHERE title = :title",
				array('title' => $spaceTitle));

	$drive = $row[0]['drive'];
	$wikis = $row[0]['wikis'];
	$tasks = $row[0]['tasks'];
	$chat = $row[0]['chat'];

	if ( ($drive == 0 && $wikis == 0) && ($tasks == 0 && $chat == 0) ) {
		$str = "Space has no additional options";
	} else {
		$str = "<div class='btn-group space-options'>";
		if ($drive == 1) {
			$str .= "<button type='button' class='btn btn-primary'><i class='fa fa fa-hdd-o'></i>  Drive</button>";
		}
		if ($wikis == 1) {
			$str .= "<button type='button' class='btn btn-primary'><i class='fa fa-file-word-o'></i>  Wikis</button>";
		}

		if ($tasks == 1) {
			$str .= "<button type='button' class='btn btn-primary'><i class='fa fa-tasks'></i>  Tasks</button>";
		}

		if ($chat == 1) {
			$str .= "<button type='button' class='btn btn-primary'><i class='fa fa-comments'></i>  Chat</button>";
		}

		$str.= "</div>";
	}

	return $str;
}

//generates eight characheter long random number @Arif

function randomNumber() {
	$result = '';

	for($i = 0; $i < 8; $i++) {
		$result .= mt_rand(0, 9);
	}

	return $result;
}

// track task comm unliked
function isTaskCommUnliked($conn, $task_comm_id, $task_comm_user_id) {
	$track_unliked = query($conn,
							"SELECT COUNT(task_comm_track_id) FROM task_comm_user_tracking
							WHERE task_comm_id = $task_comm_id
							AND task_comm_user_id = $task_comm_user_id
							AND task_comm_user_status = '0'",
							array());

	if( $track_unliked < 1 ) {
		return true;
	}
}

// track task comm liked
function isTaskCommliked($conn, $task_comm_id, $task_comm_user_id) {
	$track_liked = query($conn,
							"SELECT task_comm_track_id FROM task_comm_user_tracking
							WHERE task_comm_id = $task_comm_id
							AND task_comm_user_id = $task_comm_user_id
							AND task_comm_user_status = '1'",
		array());

	if( $track_liked ) {
		return true;
	}
	return false;
}

// Check task comment own user
function isOwnTaskComment($conn, $task_comm_id, $user_id) {
	$isOwnTaskComment = query($conn,
							"SELECT task_comm_id FROM tasks_comments WHERE task_comm_id = $task_comm_id AND task_comm_user_id = $user_id",
							array());

	if( $isOwnTaskComment ) {
		return true;
	} else {
		return false;
	}
}


/*
|------------------------------------------------------------------------------------------------
| 2. Arif vai
|------------------------------------------------------------------------------------------------
*/
//return timestamp to textual date
function textDate($timestamp)
{
	return date('M j Y g:i A', strtotime($timestamp));
}


//get actual extension regardless of the file type
function get_file_extension($f)
{
//	if( file_exists($f) ) {
		$ftype = pathinfo($f);
		return $extension = strtolower($ftype['extension']);
//	}
//	return false;
}
//only gets 3 character long extension
function getImageExtension($str) {
	return strtolower( substr($str, -3) );
}

/*
 * Desc : file icon loader
 * @author: Arif
 * @param $filename string
 * return string
 */
function getIcon($filename)
{
	switch (get_file_extension($filename)) {
		case 'pdf':
			$img = '<img src="' . url_return('/images/icons/pdf.png') . '">';
			break;
		case 'doc':
			$img ='<img src="' . url_return('/images/icons/msoffice.png') . '">';
			break;
		case 'docx':
			$img ='<img src="' . url_return('/images/icons/msoffice.png') . '">';
			break;
		case 'txt':
			$img ='<img src="' . url_return('/images/icons/txt.png') . '">';
			break;
		case 'xls':
			$img ='<img src="' . url_return('/images/icons/msxl.png') . '">';
			break;
		case 'xlsx':
			$img ='<img src="' . url_return('/images/icons/msxl.png') . '">';
			break;
		case 'xlsm':
			$img ='<img src="' . url_return('/images/icons/msxl.png') . '">';
			break;
		case 'ppt':
			$img ='<img src="' . url_return('/images/icons/msppt.png') . '">';
			break;
		case 'pptx':
			$img ='<img src="' . url_return('/images/icons/msppt.png') . '">';
			break;
		case 'mp3':
			$img ='<img src="' . url_return('/images/icons/mp3.png') . '">';
			break;
		case 'wmv':
			$img ='<img src="' . url_return('/images/icons/video.png') . '">';
			break;
		case 'mp4':
			$img ='<img src="' . url_return('/images/icons/video.png') . '">';
			break;
		case 'mpeg':
			$img ='<img src="' . url_return('/images/icons/video.png') . '">';
			break;
		case 'html':
			$img ='<img src="' . url_return('/images/icons/html.png') . '">';
			break;
		default:
			$img ='<img src="' . url_return('/images/icons/default.png') . '">';
			break;
	}
	return $img;
}