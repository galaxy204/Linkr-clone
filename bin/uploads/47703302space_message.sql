-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 04, 2015 at 12:18 PM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

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
-- Table structure for table `space_message`
--

CREATE TABLE IF NOT EXISTS `space_message` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `message` text,
  `posted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `picture` varchar(255) DEFAULT NULL,
  `posted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `space_message`
--

INSERT INTO `space_message` (`row_id`, `title`, `message`, `posted_at`, `picture`, `posted_by`) VALUES
(34, 'vabi post', 'ssdsdsds', '2015-08-01 15:22:34', 'untitled1438442554.jpg', 3),
(35, 'vabi post', 'ssdsdsds', '2015-08-01 15:22:40', 'her1438442560.(2013).eng.1cd.(5642919).zip', 3),
(36, 'vabi post', 'my world', '2015-08-01 15:32:49', 'untitled1438443169.jpg', 3),
(37, 'vabi post', '', '2015-08-01 15:33:19', 'her1438443199.(2013).eng.1cd.(5642919).zip', 3),
(38, 'my php group', NULL, '2015-08-03 19:37:04', 'untitled1438630624.jpg', 3),
(39, 'my php group', 'and this is another message as you see baby', '2015-08-03 19:40:31', 'untitled1438630831.jpg', 3),
(40, 'my php group', 'my awesome post hello php', '2015-08-03 19:49:53', 'untitled1438631393.jpg', 3),
(41, 'my php group', 'another&quot; with &lt;/br&gt;  tag', '2015-08-03 19:50:19', 'untitled1438631419.jpg', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
