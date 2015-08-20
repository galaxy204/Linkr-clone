-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 08, 2015 at 12:11 AM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `review_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `biz_poor_review`
--

CREATE TABLE IF NOT EXISTS `biz_poor_review` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT,
  `biz_name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `rating_val` varchar(100) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `ans_one` text NOT NULL,
  `ans_two` text NOT NULL,
  `ans_three` text NOT NULL,
  `ans_four` text NOT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `biz_poor_review`
--

INSERT INTO `biz_poor_review` (`row_id`, `biz_name`, `phone`, `email`, `lastname`, `rating_val`, `firstname`, `ans_one`, `ans_two`, `ans_three`, `ans_four`) VALUES
(10, 'created by mirarif', '44343', 'fdlkfld@yahoo.com', 'islam', '2', 'ariful', 'dgfdg', 'gfgf', 'fgfg', 'fgfg');

-- --------------------------------------------------------

--
-- Table structure for table `biz_review`
--

CREATE TABLE IF NOT EXISTS `biz_review` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT,
  `biz_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `rating_val` varchar(20) NOT NULL,
  `review` text NOT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `biz_review`
--

INSERT INTO `biz_review` (`row_id`, `biz_name`, `first_name`, `last_name`, `email`, `phone`, `address`, `rating_val`, `review`) VALUES
(58, 'Web design school', 'Ariful Islam', 'fdfd', 'fdfdf@yahoo.com', 'fdfd', 'fdf', '5', 'fdf');

-- --------------------------------------------------------

--
-- Table structure for table `biz_users`
--

CREATE TABLE IF NOT EXISTS `biz_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `reffered_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `biz_users`
--

INSERT INTO `biz_users` (`id`, `firstname`, `lastname`, `email`, `password`, `reffered_by`) VALUES
(1, 'ariful', 'islam', 'hello@admin.com', 'hello', NULL),
(2, 'Monjur', 'Ershad', 'admin@gmail.com', 'hello', 'dWGupiAM'),
(3, 'najim', 'sujan', 'hellodd@admin.com', '1`23', 'dWGupiAM');

-- --------------------------------------------------------

--
-- Table structure for table `new_agency`
--

CREATE TABLE IF NOT EXISTS `new_agency` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `office_hours` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `service_one` varchar(255) NOT NULL,
  `service_two` varchar(255) NOT NULL,
  `service_three` varchar(255) NOT NULL,
  `service_four` varchar(255) NOT NULL,
  `service_five` varchar(255) NOT NULL,
  `cash` varchar(255) NOT NULL,
  `visa` varchar(255) NOT NULL,
  `mastercard` varchar(255) NOT NULL,
  `a_express` varchar(255) NOT NULL,
  `bank_trans` varchar(255) NOT NULL,
  `subj_pos_rev` varchar(255) NOT NULL,
  `email_pos_cont` text NOT NULL,
  `subj_neg_rev` varchar(255) NOT NULL,
  `email_neg_cont` text NOT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `new_agency`
--

INSERT INTO `new_agency` (`row_id`, `agency_name`, `address`, `city`, `state`, `phone`, `fax`, `email`, `password`, `image`, `description`, `office_hours`, `location`, `service_one`, `service_two`, `service_three`, `service_four`, `service_five`, `cash`, `visa`, `mastercard`, `a_express`, `bank_trans`, `subj_pos_rev`, `email_pos_cont`, `subj_neg_rev`, `email_neg_cont`) VALUES
(15, 'hello', '', '', '', '', '', 'skylarkwebdesign@gmail.com', 'wX0d5NCG', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, 'Orbit solutions', 'ljl', 'dhaka', 'dhaka', '43434', '34343', 'skylarkwebdesign@gmail.com', 'hello', 'upload/twitter-app-logo1437635871.png', 'this is description', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, 'there is you', '', '', '', '', '', 'your@mail.com', 'my', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `new_business`
--

CREATE TABLE IF NOT EXISTS `new_business` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT,
  `biz_owner` int(11) DEFAULT NULL,
  `biz_agency_owner` int(11) DEFAULT NULL,
  `business_name` varchar(255) NOT NULL,
  `referred_agency` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `com_phone` varchar(255) NOT NULL,
  `com_fax` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `office_hours` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `service_one` varchar(255) NOT NULL,
  `service_two` varchar(255) NOT NULL,
  `service_three` varchar(255) NOT NULL,
  `service_four` varchar(255) NOT NULL,
  `service_five` varchar(255) NOT NULL,
  `cash` varchar(255) NOT NULL,
  `visa` varchar(255) NOT NULL,
  `mastercard` varchar(255) NOT NULL,
  `a_express` varchar(255) NOT NULL,
  `bank_trans` varchar(255) NOT NULL,
  `youtube_id` varchar(255) NOT NULL,
  `cont_name` varchar(255) NOT NULL,
  `cont_phone` varchar(255) NOT NULL,
  `fb_review` varchar(255) NOT NULL,
  `fb_rev_check` varchar(10) NOT NULL DEFAULT '0',
  `yelp_review` varchar(255) NOT NULL,
  `yelp_rev_check` varchar(10) NOT NULL DEFAULT '0',
  `google_review` varchar(255) NOT NULL,
  `google_rev_check` varchar(10) NOT NULL DEFAULT '0',
  `stars` varchar(20) NOT NULL DEFAULT '5',
  `subj_pos_rev` varchar(255) NOT NULL,
  `email_pos_cont` text NOT NULL,
  `subj_neg_rev` varchar(255) NOT NULL,
  `email_neg_cont` text NOT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `new_business`
--

INSERT INTO `new_business` (`row_id`, `biz_owner`, `biz_agency_owner`, `business_name`, `referred_agency`, `type`, `description`, `address`, `city`, `state`, `com_phone`, `com_fax`, `email`, `website`, `image`, `office_hours`, `location`, `service_one`, `service_two`, `service_three`, `service_four`, `service_five`, `cash`, `visa`, `mastercard`, `a_express`, `bank_trans`, `youtube_id`, `cont_name`, `cont_phone`, `fb_review`, `fb_rev_check`, `yelp_review`, `yelp_rev_check`, `google_review`, `google_rev_check`, `stars`, `subj_pos_rev`, `email_pos_cont`, `subj_neg_rev`, `email_neg_cont`) VALUES
(12, 5, NULL, 'created by mirarif', 'Orbit solutions', 'I don''t know', '', '', '', '', '', '', '', '', 'upload/twitter-app-logo1437638784.png', '', '', '', '', '', '', '', 'Cash', 'Visa', '', '', '', '', '', '', '', '0', '', '0', '', '0', '3', '', '', '', ''),
(13, 0, 16, 'my awesome group', '', 'oil', '', '', '', '', '', '', '', '', '1438198728upload/', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'https://www.facebook.com/bdtouristservice', '1', '', '0', '', '0', '3', '', '', '', ''),
(14, 0, NULL, 'Hello world php', 'there is you', '', '', '', '', '', '', '', '', '', '1438340920upload/', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '', '0', '', '0', '3', '', '', '', ''),
(15, 0, NULL, 'arif business', 'there is you', '', '', '', '', '', '', '', '', '', '1438341091upload/', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '', '0', '', '0', '3', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `referral`
--

CREATE TABLE IF NOT EXISTS `referral` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `agency_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `referral`
--

INSERT INTO `referral` (`id`, `email`, `link`, `agency_name`) VALUES
(4, 'admin@gmail.com', 'localhost/review-app/index.php?ref_id=dWGupiAM', NULL),
(5, 'islam@yahoo.com', 'localhost/review-app/index.php?ref_id=T6ERyCxo', NULL),
(6, 'blaine@advancemarketinggroup.ca', 'www.blushplatinumstarvirginhairline.com/review-app/index.php?ref_id=xVTxRdPG', NULL),
(7, 'skylarkwebdesign@gmail.com', 'localhost/review-app/index.php?ref_id=nelKlqEr', 'Orbit solutions');

-- --------------------------------------------------------

--
-- Table structure for table `user_email`
--

CREATE TABLE IF NOT EXISTS `user_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
