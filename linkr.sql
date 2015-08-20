-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 07, 2015 at 08:27 PM
-- Server version: 5.6.25-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `linkr`
--

-- --------------------------------------------------------

--
-- Table structure for table `mine`
--

CREATE TABLE IF NOT EXISTS `mine` (
`id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mine`
--

INSERT INTO `mine` (`id`, `name`) VALUES
(1, 'tanvir'),
(2, 'hasan');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event` enum('message','email') NOT NULL,
  `new_posts` enum('0','1','2') DEFAULT '1',
  `comm_posts` enum('0','1') DEFAULT '1',
  `comm_s_posts` enum('0','1') DEFAULT '1',
  `links` enum('0','1') DEFAULT '1',
  `mentions` enum('0','1') DEFAULT '1',
  `invitations` enum('0','1') DEFAULT '1',
  `private_msg` enum('0','1') DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `event`, `new_posts`, `comm_posts`, `comm_s_posts`, `links`, `mentions`, `invitations`, `private_msg`) VALUES
(1, 13, 'message', '1', '1', '0', '0', '0', '1', '0'),
(2, 13, 'email', '1', '1', '1', '1', '1', '1', '1'),
(7, 16, 'message', '0', '0', '0', '0', '0', '1', '0'),
(8, 16, 'email', '0', '1', '1', '0', '1', '1', '1'),
(9, 17, 'message', '1', '1', '1', '1', '1', '1', '1'),
(10, 17, 'email', '1', '1', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_perm` enum('0','1') DEFAULT '0',
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `position` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `googleplus` varchar(255) DEFAULT NULL,
  `skype` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `github` varchar(255) DEFAULT NULL,
  `ip` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `signup` datetime NOT NULL,
  `lastlogin` datetime NOT NULL,
  `notescheck` datetime NOT NULL,
  `activated` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_perm`, `password`, `fullname`, `organization`, `position`, `avatar`, `phone`, `facebook`, `googleplus`, `skype`, `twitter`, `linkedin`, `github`, `ip`, `time`, `signup`, `lastlogin`, `notescheck`, `activated`) VALUES
(0, 'kabir', 'kabir@gmail.com', '0', '4rf1g1psp01i1ee1vb11e10adc3949ba59abbe56e057f20f883eox8$$h1ymu1agca8x118', 'kabir', NULL, 'maneger', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0', '2015-07-14 12:34:42', '2015-07-14 12:34:42', '2015-07-14 12:34:42', '1'),
(3, 'kabir2', 'kabir2@gmail.com', '0', 'e10adc3949ba59abbe56e057f20f883e', 'Kabir2', NULL, 'maneger', 'http://localhost/Linkr-clone/users/users_files/tanvir0.40953900 1438284144/0.53548800 1438287310gallery-thumb-1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0', '2015-07-14 12:37:57', '2015-07-14 12:38:35', '2015-07-14 12:37:57', '1'),
(4, 'karim', 'karim@gmail.com', '0', 'e10adc3949ba59abbe56e057f20f883e', 'Karimm', NULL, 'sldfjk', 'http://localhost/Linkr-clone/users/users_files/tanvir0.40953900 1438284144/0.53548800 1438287310gallery-thumb-1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0', '2015-07-14 14:03:05', '2015-07-14 14:04:17', '2015-07-14 14:03:05', '1'),
(5, 'arif', 'arif@gmail.com', '1', 'e10adc3949ba59abbe56e057f20f883e', 'Arif Ahmed', NULL, 'Maneger', 'http://localhost/Linkr-clone/users/users_files/tanvir0.40953900 1438284144/0.53548800 1438287310gallery-thumb-1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0', '2015-07-14 22:53:11', '2015-07-14 22:54:38', '2015-07-14 22:53:11', '1'),
(6, 'sdf', 'sdfs@gmail.com', '1', '25d55ad283aa400af464c76d713c07ad', 'sdafs', NULL, 'sdf', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0', '2015-07-28 08:42:20', '2015-07-28 08:42:20', '2015-07-28 08:42:20', '0'),
(7, 'hasan', 'tanvir', '0', '25d55ad283aa400af464c76d713c07ad', 'fhskljfsIO', NULL, 'jflksdjafl', 'http://localhost/Linkr-clone/users/users_files/tanvir0.40953900 1438284144/0.53548800 1438287310gallery-thumb-1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0', '2015-07-29 22:56:14', '2015-07-29 22:56:14', '2015-07-29 22:56:14', '0'),
(8, 'khalid', 'tanvir2@gmail.com', '0', '94a9a4814e9186dc38c1c5b869b309ad', 'Khalid Hasan', NULL, 'manager', 'http://localhost/Linkr-clone/users/users_files/tanvir0.40953900 1438284144/0.53548800 1438287310gallery-thumb-1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0', '2015-07-31 01:09:58', '2015-07-31 01:09:58', '2015-07-31 01:09:58', '0'),
(9, 'kamal', 'kamal@gmail.com', '0', '25d55ad283aa400af464c76d713c07ad', 'kamal', NULL, 'manager', 'http://localhost/Linkr-clone/users/users_files/tanvir0.40953900 1438284144/0.53548800 1438287310gallery-thumb-1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0.96368600 1438283527', '2015-07-31 01:12:07', '2015-07-31 20:51:55', '2015-07-31 01:12:07', '1'),
(10, 'zamal', 'zamal@gamil.com', '0', 'c3e966a673722d3e0ac809aed2610783', 'zamal', NULL, 'manager', 'http://localhost/Linkr-clone/users/users_files/tanvir0.40953900 1438284144/0.53548800 1438287310gallery-thumb-1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0.20376400 1438283607', '2015-07-31 01:13:27', '2015-07-31 01:13:27', '2015-07-31 01:13:27', '1'),
(13, 'tanvir', 'tanvir@gmail.com', '1', '25d55ad283aa400af464c76d713c07ad', 'Tanvir Ahmed', 'OrbitWeb', 'manager', 'http://localhost/Linkr-clone/users/users_files/tanvir0.40953900 1438284144/0.62109900 14386815842.jpg', '88015201403040', 'facebook', 'google.com', 'skype', 't', '', '', '127.0.0.1', '0.40953900 1438284144', '2015-07-31 01:22:24', '2015-08-07 20:25:45', '2015-07-31 01:22:24', '1'),
(16, 'hasan2', 'hasan@gmail.com', '0', '25d55ad283aa400af464c76d713c07ad', 'hasan', 'orbit web ltd.', 'manager', 'http://localhost/Linkr-clone/users/users_files/hasan20.18354000 1438357097/0.44063600 1438424869gallery-thumb-4.jpg', '', '', '', '', '', '', '', '127.0.0.1', '0.18354000 1438357097', '2015-07-31 21:38:17', '2015-08-02 20:27:30', '2015-07-31 21:38:17', '1'),
(17, 'tanvir2', 'tanvir3@gmail.com', '0', '25d55ad283aa400af464c76d713c07ad', 'tanvir', NULL, 'maneger', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0.22227300 1438610651', '2015-08-03 20:04:11', '2015-08-03 20:04:11', '2015-08-03 20:04:11', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mine`
--
ALTER TABLE `mine`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mine`
--
ALTER TABLE `mine`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
