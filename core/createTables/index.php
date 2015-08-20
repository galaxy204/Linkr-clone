<?php  
include_once("../init.php");

$tbl_users = "CREATE TABLE IF NOT EXISTS users (
              id INT(11) NOT NULL AUTO_INCREMENT,
			  username VARCHAR(32) NOT NULL,
			  email VARCHAR(255) NOT NULL,
			  email_perm ENUM('0','1') NULL DEFAULT '0',
			  password VARCHAR(255) NOT NULL,
			  fullname VARCHAR(255) NOT NULL,
			  position VARCHAR(255) NOT NULL,
			  avatar VARCHAR(255) NULL,
			  phone VARCHAR(255) NULL,
			  ip VARCHAR(255) NOT NULL,
			  signup DATETIME NOT NULL,
			  lastlogin DATETIME NOT NULL,
			  notescheck DATETIME NOT NULL,
			  activated ENUM('0','1') NOT NULL DEFAULT '1',
              PRIMARY KEY (id),
			  UNIQUE KEY (username,email)
             )";
query($conn, $tbl_users);

$tbl_notifications = "CREATE TABLE IF NOT EXISTS notifications (
					    id INT(11) AUTO_INCREMENT NOT NULL,
					    user_id INT(11) NOT NULL,
					    event enum('message', 'email') NOT NULL,
					    new_posts enum('0', '1', '2') default '1',
					    comm_posts enum('0', '1') default '1',
					    comm_s_posts enum('0', '1') default '1',
					    links enum('0', '1') default '1',
					    mentions enum('0', '1') default '1',
					    invitations enum('0', '1') default '1',
					    private_msg enum('0', '1') default '1',
					    PRIMARY KEY(id))";

$tbl_tasks = "CREATE TABLE IF NOT EXISTS tasks (
					id INT(11) AUTO_INCREMENT NOT NULL,
					user_id INT(11) NOT NULL,
					user_full_name VARCHAR(150) NOT NULL,
					group_id INT(11) NOT NULL,
					title VARCHAR(255),
					description TEXT(2500),
					due_date VARCHAR(50),
					due_time VARCHAR(50),
					priority enum('low', 'normal', 'high', 'critical') default 'normal',
					state enum('started', 'progress', 'suspended', 'completed', 'canceled') default 'started',
					date datetime NOT NULL DEFAULT now(),
					PRIMARY KEY (id))";

$tbl_tasks_assigned = "CREATE TABLE IF NOT EXISTS tasks_assigned (
							id INT(11) AUTO_INCREMENT NOT NULL,
							task_id INT(11) NOT NULL,
							as_user_id INT(11) NOT NULL,
							as_user_fullname VARCHAR(100),
							PRIMARY KEY (id))";

$tbl_tasks_attachment = "CREATE TABLE IF NOT EXISTS tasks_attachments (
							id INT(11) AUTO_INCREMENT NOT NULL,
							task_id INT(11) NOT NULL,
							a_image VARCHAR (250),
							a_description VARCHAR (255),
							PRIMARY KEY (id))";

$tbl_tasks_comments = "CREATE TABLE IF NOT EXISTS tasks_comments (
							task_comm_id INT(11) AUTO_INCREMENT NOT NULL,
							task_id INT(11) NOT NULL,
							task_comm TEXT(1500),
							task_comm_time datetime NOT NULL DEFAULT NOW(),
							PRIMARY KEY(task_comm_id))";

$tbl_tasks_comm_attachments = "CREATE TABLE IF NOT EXISTS tasks_comm_attachments (
									-> t_a_id INT(11) AUTO_INCREMENT NOT NULL,
									-> task_comm_id INT(11) NOT NULL,
									-> task_comm_image VARCHAR(100),
									-> task_comm_desc VARCHAR(255),
									-> PRIMARY KEY(t_a_id))";

