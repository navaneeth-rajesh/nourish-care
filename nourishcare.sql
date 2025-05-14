-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 09, 2024 at 11:35 AM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nourishcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `chatid` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) DEFAULT NULL,
  `receiver` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `message` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`chatid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chatid`, `sender`, `receiver`, `date`, `message`) VALUES
(1, 1, 5, '2024-06-29 12:28:13', 'HIIIIII'),
(2, 1, 5, '2024-06-29 12:32:59', 'hello'),
(3, 1, 5, '2024-06-29 12:33:05', 'hey'),
(4, 1, 5, '2024-06-29 12:33:14', 'bye'),
(5, 1, 5, '2024-06-29 12:34:32', 'bye'),
(6, 5, 1, '2024-06-29 12:39:11', 'hey'),
(8, 5, 1, '2024-06-29 12:39:28', 'hello'),
(13, 5, 1, '2024-06-29 12:42:37', 'hoho'),
(12, 5, 1, '2024-06-29 12:42:21', 'hello'),
(14, 5, 1, '2024-06-29 12:42:45', 'hoho'),
(15, 5, 1, '2024-06-29 12:43:54', 'hoho'),
(16, 1, 6, '2024-06-29 12:49:47', 'hii'),
(17, 1, 6, '2024-06-29 12:49:53', 'hii'),
(18, 5, 1, '2024-06-29 12:54:06', 'hoho'),
(19, 5, 1, '2024-06-29 14:21:26', 'hoho'),
(20, 5, 1, '2024-06-29 14:23:30', 'hoho'),
(21, 5, 1, '2024-06-29 14:26:01', ''),
(22, 5, 3, '2024-10-09 16:41:52', 'hi'),
(23, 5, 3, '2024-10-09 16:46:37', ''),
(24, 5, 3, '2024-10-09 16:46:49', 'hello'),
(25, 5, 3, '2024-10-09 16:48:43', 'ok'),
(26, 5, 3, '2024-10-09 16:49:24', 'hi'),
(27, 5, 3, '2024-10-09 16:50:15', 'hi'),
(28, 5, 1, '2024-10-09 16:58:26', 'hii'),
(29, 5, 1, '2024-10-09 16:58:45', 'heloo');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE IF NOT EXISTS `donations` (
  `orphanage` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `item` varchar(50) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`did`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`orphanage`, `user`, `image`, `item`, `date`, `did`, `desc`) VALUES
(NULL, NULL, NULL, NULL, '2024-06-28 17:26:16', 1, NULL),
(2, 1, 'static/media/OIP.jpeg', 'Food', '2024-06-28 17:28:36', 2, 'desc'),
(1, 1, 'static/media/OIP.jpeg', 'Food', '2024-06-28 17:28:50', 3, 'desc'),
(2, 1, 'static/media/type-of-event.jpg', 'Food', '2024-06-29 14:32:41', 4, 'desc'),
(1, 1, 'static/media/fc-barcelona-emblem-wallpaper-preview.jpg', 'Food', '2024-08-17 11:03:00', 5, 'desc'),
(1, 1, 'static/media/abdulsalamkm8921@gmail.com.mp4', 'Dress', '2024-10-09 17:01:54', 6, 'desc');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE IF NOT EXISTS `donor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `aadhar` varchar(20) DEFAULT NULL,
  `orphanage` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_email` (`email`),
  UNIQUE KEY `unique_phone` (`phone`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`id`, `name`, `email`, `address`, `phone`, `aadhar`, `orphanage`) VALUES
(5, 'Faculty', 'raju@gmail.com', 'address', '9999999999', '212226542542', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `eventname` varchar(50) DEFAULT NULL,
  `eventdesc` varchar(200) DEFAULT NULL,
  `eventsdate` date DEFAULT NULL,
  `fid` int(11) DEFAULT NULL,
  `eventprogress` int(11) DEFAULT '0',
  `cashcollected` int(11) DEFAULT '0',
  `image` varchar(200) DEFAULT NULL,
  `target` int(11) DEFAULT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eid`, `eventname`, `eventdesc`, `eventsdate`, `fid`, `eventprogress`, `cashcollected`, `image`, `target`) VALUES
(12, 'New Event', 'event desc', '2024-10-11', 5, 0, 5000, './static/media/0_POjH5vv_7t8s8loG.webp', 20000),
(11, 'New Event', 'desc', '2024-06-24', 5, 0, 5500, './static/media/type-of-event.jpg', 10000),
(10, 'New Event', 'desc', '2024-06-24', 5, 0, 0, './static/media/type-of-event.jpg', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`lid`, `uid`, `email`, `password`, `type`, `date`) VALUES
(1, 5, 'raju@gmail.com', 'pass', 'Donor', '2024-06-18 17:02:32'),
(2, 1, 'user@gmail.com', 'pass', 'User', '2024-06-18 17:05:17'),
(4, 6, 'dona@gmail.com', 'pass', 'Donor', '2024-06-21 09:48:40'),
(5, 0, 'admin@gmail.com', 'admin', 'Admin', '2024-06-26 17:31:49'),
(6, 3, 'user2@gmail.com', 'pass', 'User', '2024-08-17 10:39:39');

-- --------------------------------------------------------

--
-- Table structure for table `orphanage`
--

CREATE TABLE IF NOT EXISTS `orphanage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `desc` varchar(200) DEFAULT NULL,
  `owner` varchar(50) DEFAULT NULL,
  `incharge` varchar(50) DEFAULT NULL,
  `children` int(11) DEFAULT NULL,
  `teens` int(11) DEFAULT NULL,
  `adults` int(11) DEFAULT NULL,
  `olds` int(11) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `lat` float DEFAULT NULL,
  `lon` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `orphanage`
--

INSERT INTO `orphanage` (`id`, `name`, `desc`, `owner`, `incharge`, `children`, `teens`, `adults`, `olds`, `phone`, `address`, `lat`, `lon`) VALUES
(1, 'Sunshine Orphanage', 'A place for homeless children.', 'John Doe', 'Jane Smith', 50, 30, 10, 10, '123-456-7890', '123 Sunshine St, Happyville', 9.98164, 76.2999),
(2, 'Hope Haven', 'Providing hope and care for all ages.', 'Alice Johnson', 'Bob Brown', 40, 20, 30, 10, '234-567-8901', '456 Hope Ave, Caretown', 9.90812, 76.4088),
(3, 'Future Stars', 'Helping children reach their potential.', 'Emma White', 'Chris Green', 60, 25, 5, 10, '345-678-9012', '789 Future Blvd, Dreamcity', 10.0969, 76.3602),
(4, 'New Beginnings', 'A new home for those in need.', 'Michael Black', 'Sara Blue', 30, 15, 20, 35, '456-789-0123', '101 New St, Freshstart', 9.94372, 76.5663),
(5, 'Safe Haven', 'Ensuring safety and love for every child.', 'Daniel Grey', 'Laura Red', 70, 15, 10, 5, '567-890-1234', '202 Safe Pl, Securetown', 10.0235, 76.3836),
(6, 'Testing', 'desc', 'chellappan', 'subi', 40, 10, 10, 40, '9595959595', 'address', 10.1116, 76.3508),
(13, 'new orphanage', 'desc', 'orphanage owner', 'orphanage incharge', 5, 35, 20, 40, '9999999999', 'address', 9.7831, 76.4714);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` int(11) DEFAULT NULL,
  `event` int(11) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pid`, `amount`, `date`, `user`, `event`) VALUES
(1, 1000, '2024-06-26 16:33:31', 1, 11),
(2, 100, '2024-06-26 16:41:31', 1, 11),
(3, 100, '2024-06-26 16:42:53', 1, 11),
(4, 100, '2024-06-26 16:43:17', 1, 11),
(5, 100, '2024-06-26 16:43:55', 1, 11),
(6, 100, '2024-06-26 16:44:37', 1, 11),
(7, 1000, '2024-08-17 11:01:57', 1, 11),
(8, 1000, '2024-08-17 11:08:48', 1, 11),
(9, 5000, '2024-10-09 17:00:58', 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `aadhar` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `aadhar`, `address`) VALUES
(1, 'user', 'user@gmail.com', '8888888888', '212226542542', 'address'),
(3, 'user2', 'user2@gmail.com', '9999999999', '212226542542', 'address\r\n');
