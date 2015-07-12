<?php  
include_once("../init.php");

$tbl_users = "CREATE TABLE IF NOT EXISTS users (
              id INT(11) NOT NULL AUTO_INCREMENT,
			  username VARCHAR(16) NOT NULL,
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
			  activated ENUM('0','1') NOT NULL DEFAULT '0',
              PRIMARY KEY (id),
			  UNIQUE KEY username (username,email)
             )";
query($conn, $tbl_users);
