<?php
require ('../core/init.php');
$userId = $_SESSION['userid'];
$userName = $_SESSION['username'];

	
	


		$title = strip_tags(trim($_POST['title'])); 
		$description = strip_tags(trim ($_POST['description']));
		$created_by = $userId;
		$access = $_POST['access'];
		$drive = undefineCheck($_POST['drive']); // NULL

		
		$wikis = undefineCheck($_POST['wikis']);
		$tasks = undefineCheck($_POST['tasks']);
		$chat = undefineCheck($_POST['chat']);

		$q = query_insert($conn,
	 					"SELECT title FROM new_space WHERE title =:title",
	 						array('title'=> $title)
	 						);
		if (empty($title)) {
			echo "0";
		}elseif($q == true) {
			$message = 'Space title already exists';
			echo "1";
		} else {
			$create_space = query($conn, 
			 "INSERT INTO new_space(title, description, access, drive, wikis, tasks, chat, created_by) VALUES(:title, :description, :access, :drive, :wikis, :tasks, :chat, :created_by)",

			array(
				'title' => $title,
				'description' => $description,
				'access' => $access,
				'drive' => $drive,
				'wikis' => $wikis,
				'tasks' => $tasks,
				'chat' => $chat,
				'created_by' => $created_by
				) );
				$_SESSION['space_title'] = $title;
				echo "3";
			
		}

