-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2018 at 10:41 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cms`
--
CREATE DATABASE IF NOT EXISTS `cms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cms`;

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE IF NOT EXISTS `complaints` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `complaint_description` text NOT NULL,
  `status` varchar(80) NOT NULL,
  `dtime` datetime NOT NULL,
  `faculty` varchar(120) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `refid` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `dtime` datetime NOT NULL,
  `cid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`refid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `forwarded`
--

CREATE TABLE IF NOT EXISTS `forwarded` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `respondent_id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `dtime` datetime NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mailing`
--

CREATE TABLE IF NOT EXISTS `mailing` (
  `mail_id` int(11) NOT NULL AUTO_INCREMENT,
  `names` varchar(100) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(120) NOT NULL,
  `faculty` varchar(120) NOT NULL,
  `refid` int(11) NOT NULL,
  PRIMARY KEY (`mail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(120) NOT NULL,
  `password` varchar(180) NOT NULL,
  `full_name` varchar(180) NOT NULL,
  `role` varchar(40) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`sid`, `username`, `password`, `full_name`, `role`) VALUES
(1, 'carol', '12345', 'carol mbabazi', 'staff'),
(2, 'admin', '12345', 'Administrator', 'admin'),
(3, 'bantu', '12345', 'Henry Bantu', 'admin'),
(4, 'brian', 'pako', 'Musoke Brian', 'staff'),
(5, 'arnold', 'qwerty', 'Arnold Ogol', 'staff');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
