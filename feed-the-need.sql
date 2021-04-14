-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Dec 26, 2020 at 11:52 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feed-the-need`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` varchar(20) NOT NULL,
  `admin_password` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_password`) VALUES
('9886530457', '1234'),
('1234', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

DROP TABLE IF EXISTS `contactus`;
CREATE TABLE IF NOT EXISTS `contactus` (
  `name` varchar(25) NOT NULL,
  `email` varchar(35) NOT NULL,
  `message` varchar(200) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`name`, `email`, `message`, `date`) VALUES
('pavan', 'pavan@gmail.com', 'hi 1st message', '2020-12-25 17:06:59');

-- --------------------------------------------------------

--
-- Table structure for table `food_pickup_request`
--

DROP TABLE IF EXISTS `food_pickup_request`;
CREATE TABLE IF NOT EXISTS `food_pickup_request` (
  `request_id` int(5) NOT NULL AUTO_INCREMENT,
  `request_time` datetime NOT NULL,
  `user_id` int(5) NOT NULL,
  `city` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `status` varchar(50) DEFAULT 'Requested to NGO',
  `ngo_id` int(6) NOT NULL,
  `volunteer_id` int(8) DEFAULT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10005 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_pickup_request`
--

INSERT INTO `food_pickup_request` (`request_id`, `request_time`, `user_id`, `city`, `address`, `status`, `ngo_id`, `volunteer_id`) VALUES
(10000, '2020-12-22 00:00:00', 1000, 'Mysor', 'rv road mysor', 'Requested to NGO', 100, 10000),
(10001, '2020-12-22 18:07:36', 1005, 'Mysor', 'k', 'Requested to NGO', 102, NULL),
(10003, '2020-12-23 13:21:57', 1004, 'Bangalore', 'nanjunguud road ', 'Requested to NGO', 101, NULL),
(10004, '2020-12-24 07:37:03', 1001, 'Bangalore', ' road', 'Requested to NGO', 100, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ngo`
--

DROP TABLE IF EXISTS `ngo`;
CREATE TABLE IF NOT EXISTS `ngo` (
  `ngo_id` int(3) NOT NULL AUTO_INCREMENT,
  `ngo_name` text NOT NULL,
  `ngo_email` varchar(30) NOT NULL,
  `ngo_phonenumber` bigint(10) NOT NULL,
  `ngo_workcity` text NOT NULL,
  `ngo_address` text NOT NULL,
  `ngo_password` varchar(30) NOT NULL,
  `ngo_approvel_status` int(1) NOT NULL,
  `ngo_active` int(1) NOT NULL,
  `reg_date` datetime DEFAULT NULL,
  PRIMARY KEY (`ngo_id`)
) ENGINE=MyISAM AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ngo`
--

INSERT INTO `ngo` (`ngo_id`, `ngo_name`, `ngo_email`, `ngo_phonenumber`, `ngo_workcity`, `ngo_address`, `ngo_password`, `ngo_approvel_status`, `ngo_active`, `reg_date`) VALUES
(100, 'adaya NGO', 'adngo@gmail.com', 9886530457, 'Bangalore', 'ngo, rv road , blr', '1234', 1, 1, NULL),
(101, 'pavan NGO', 'pavan@gmail.com', 9886540457, 'Bangalore', 'ba road , kumarswamy layout ', '1234', 1, 1, '2020-12-17 09:21:43'),
(102, 'Mysor NGO', 'mysorngo@gmail.com', 9870707033, 'Mysor', 'blr main road mysor', '1234', 1, 1, '2020-12-22 04:01:10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(4) NOT NULL AUTO_INCREMENT,
  `user_name` text NOT NULL,
  `user_phonenumber` bigint(10) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1006 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_phonenumber`, `user_email`, `user_password`, `reg_date`) VALUES
(1000, 'admin', 9898989999, 'admin@gmail.com', 'pav245', '2020-12-15 00:00:00'),
(1001, 'pavan', 9886530457, 'pavan@gmail.com', '1234', '2020-12-15 11:28:51'),
(1002, 'Pavan shetty', 9888653045, 'Pavans@gamil.com', 'Pavan@245265', '2020-12-15 11:29:58'),
(1003, 'pavan', 8618310900, 'pavans@gmail.com', '1234', '2020-12-15 12:53:14'),
(1004, 'Prajwal', 9887530457, 'Prajwal@gmail.com', '1234', '2020-12-15 13:29:22'),
(1005, 'Pavan', 9878090909, 'shetty@gmail.com', '1234', '2020-12-22 17:55:42');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

DROP TABLE IF EXISTS `volunteer`;
CREATE TABLE IF NOT EXISTS `volunteer` (
  `volunteer_id` int(8) NOT NULL AUTO_INCREMENT,
  `volunteer_name` varchar(20) NOT NULL,
  `volunteer_password` varchar(30) NOT NULL,
  `volunteer_ph_number` bigint(10) NOT NULL,
  `volunteer_regdate` datetime NOT NULL,
  `ngo_id` int(8) NOT NULL,
  PRIMARY KEY (`volunteer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10001 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`volunteer_id`, `volunteer_name`, `volunteer_password`, `volunteer_ph_number`, `volunteer_regdate`, `ngo_id`) VALUES
(10000, 'Praveen', '1234', 9886530457, '2020-12-24 00:00:00', 100);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
