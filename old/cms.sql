-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2017 at 01:44 PM
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
-- Table structure for table `complainants`
--

CREATE TABLE IF NOT EXISTS `complainants` (
  `complainant_ID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(120) NOT NULL,
  `pin` varchar(350) NOT NULL,
  PRIMARY KEY (`complainant_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1015 ;

--
-- Dumping data for table `complainants`
--

INSERT INTO `complainants` (`complainant_ID`, `email`, `pin`) VALUES
(1000, 'test1@bou.or.ug', '1234'),
(1001, 'test2@bou.or.ug', '5678'),
(1002, 'test3@bou.or.ug', '1996'),
(1003, 'test4@bou.or.ug', '912'),
(1004, 'test5@bou.or.ug', '7171'),
(1005, 'grace@bou.or.ug', '7789'),
(1006, 'allan@bou.or.ug', '8989'),
(1007, 'mese@bou.or.ug', '3456'),
(1008, 'kate@bou.or.ug', '987'),
(1009, 'james@bou.or.ug', '3456'),
(1010, 'cat@gmail.com', '674f3c2c1a8a6f90461e8a66fb5550ba'),
(1011, 'conrad@bou.or.ug', '6531401f9a6807306651b87e44c05751'),
(1012, 'grace@gmail.com', '81b073de9370ea873f548e31b8adc081'),
(1013, 'con@bou.or.ug', '46d045ff5190f6ea93739da6c0aa19bc'),
(1014, 'mac@bou.or.ug', '674f3c2c1a8a6f90461e8a66fb5550ba');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE IF NOT EXISTS `complaints` (
  `comp_ID` int(11) NOT NULL AUTO_INCREMENT,
  `complaint_field` text NOT NULL,
  `staff_ID` int(11) NOT NULL,
  `status` varchar(40) NOT NULL,
  `comp_dtime` datetime NOT NULL,
  `complainant_ID` int(11) NOT NULL,
  PRIMARY KEY (`comp_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`comp_ID`, `complaint_field`, `staff_ID`, `status`, `comp_dtime`, `complainant_ID`) VALUES
(1, 'afandes are rough', 1060, 'replied', '0000-00-00 00:00:00', 0),
(2, 'computers dont work', 1040, 'replied', '0000-00-00 00:00:00', 0),
(3, 'bank rates are too high', 1050, 'replied', '0000-00-00 00:00:00', 0),
(4, 'i hve witnessed harrasment', 1030, 'replied', '0000-00-00 00:00:00', 0),
(5, 'the food served is too little', 1094, 'replied', '2006-07-22 00:00:00', 0),
(6, 'my bag was taken by afande', 1060, 'replied', '2006-07-10 00:00:00', 0),
(7, '', 1040, 'replied', '0000-00-00 00:00:00', 0),
(8, 'the bond rate is too high', 1050, 'replied', '2011-07-21 00:00:00', 0),
(9, 'sdsd', 1070, 'replied', '2011-07-02 00:00:00', 0),
(10, 'reduce the CBR', 1050, 'replied', '0000-00-00 00:00:00', 0),
(11, '', 1070, 'replied', '0000-00-00 00:00:00', 0),
(12, '', 1070, 'replied', '0000-00-00 00:00:00', 0),
(13, 'the tea is cold', 1070, 'replied', '0000-00-00 00:00:00', 0),
(14, 'the network is too slow', 1040, 'replied', '0000-00-00 00:00:00', 0),
(15, 'i hve stolen money', 1050, 'replied', '0000-00-00 00:00:00', 0),
(16, 'the database doesnot respond', 1040, 'replied', '2009-08-07 00:00:00', 0),
(17, 'am harrased', 1030, 'replied', '2009-08-04 00:00:00', 0),
(18, 'am flying out soon', 1030, 'replied', '0000-00-00 00:00:00', 0),
(19, 'my complaints are not answered', 1070, 'replied', '0000-00-00 00:00:00', 0),
(20, 'send me money', 1094, 'replied', '0000-00-00 00:00:00', 0),
(21, 'what is the dolar rate', 1070, 'replied', '2001-08-17 08:08:57', 0),
(22, 'hey, i was wondering wen is lunch time???', 1070, 'replied', '2017-08-01 08:08:54', 0),
(23, 'afande is tough', 1095, 'replied', '2017-08-12 10:08:51', 0),
(24, 'afande is tough', 1095, 'replied', '2017-08-12 10:08:25', 0),
(25, 'the computer wont start', 1040, 'replied', '2017-08-12 03:08:12', 1000),
(26, 'thanks for the feedback, but my databse doesnt work', 1040, 'replied', '2017-08-12 06:08:15', 1000),
(27, 'am tired of the xrays', 1060, 'replied', '2017-08-12 10:08:04', 1001),
(28, 'my bonds are about to mature ,what should i do???', 1050, 'replied', '2017-08-13 12:08:47', 1002),
(29, 'we are not eating enough food.. do something about it', 1030, 'replied', '2017-08-13 01:08:46', 1003),
(30, 'explain monetary policy', 1094, 'replied', '2017-08-13 06:08:01', 1000),
(31, 'halo ,thez afandes are rough, one  almost slapped me', 1091, 'replied', '2017-08-13 06:08:27', 1004),
(32, 'my computer isnot working', 1040, 'replied', '2017-08-14 08:08:05', 1005),
(33, 'afande pocketed my wallet. please help', 1091, 'replied', '2017-08-14 08:08:39', 1006),
(34, 'banya is too pretty', 1030, 'replied', '2017-08-14 08:08:24', 1007),
(35, 'what does monetary policy mean .??', 1070, 'replied', '2017-08-14 12:08:16', 1008),
(36, 'i lost my files for the transactions,help me recover', 1040, 'replied', '2017-08-14 01:08:25', 1008),
(37, ' network is slow', 1040, 'replied', '2017-08-16 01:08:17', 1009),
(38, 'the environment is not condusive', 1030, 'pending', '2017-08-17 01:08:10', 1010),
(39, 'the computer is fake', 1102, 'replied', '2017-08-17 02:08:04', 1011),
(40, 'i want to put on heels', 1103, 'replied', '2017-08-21 08:08:43', 1012),
(41, 'the afandes are rough', 1110, 'replied', '2017-08-21 09:08:29', 1013),
(42, 'how are the bonds.? retes..', 1108, 'replied', '2017-08-21 09:08:20', 1014),
(43, 'my phone got lost at the checking point', 1110, 'replied', '2017-08-21 09:08:50', 1014),
(44, 'i want to hack your systems', 1106, 'replied', '2017-08-21 09:08:18', 1014),
(45, 'am having temptations', 1103, 'replied', '2017-08-21 09:08:39', 1014),
(46, 'what is the BOU mission..??', 1112, 'replied', '2017-08-21 09:08:07', 1014);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `fd_ID` int(11) NOT NULL AUTO_INCREMENT,
  `fd_field` text NOT NULL,
  `fd_dtime` datetime NOT NULL,
  `comp_ID` int(11) NOT NULL,
  `staff_ID` int(11) NOT NULL,
  `complainant_ID` int(11) NOT NULL,
  PRIMARY KEY (`fd_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fd_ID`, `fd_field`, `fd_dtime`, `comp_ID`, `staff_ID`, `complainant_ID`) VALUES
(1, 'try switching it on', '2017-08-12 06:08:10', 25, 1040, 0),
(2, 'we are switching on the backup generator\r\n', '2017-08-12 06:08:27', 25, 1040, 0),
(3, 'plug in the switch', '2017-08-12 06:08:20', 25, 1040, 1000),
(4, 'we are trying to connect the database to the cloud', '2017-08-12 06:08:18', 26, 1040, 1000),
(5, 'we are trying to connect the database to the cloud', '2017-08-12 06:08:44', 26, 1040, 1000),
(6, 'haahaaha', '2017-08-12 08:08:05', 7, 1040, 0),
(7, 'not our fault', '2017-08-12 08:08:29', 14, 1040, 0),
(8, 'thts procedure, folow protocol', '2017-08-12 10:08:23', 27, 1060, 1001),
(9, 'wait for some time until ur paid ur money then invest it again', '2017-08-13 01:08:03', 28, 1050, 1002),
(10, 'take it to the police', '2017-08-13 01:08:47', 15, 1093, 0),
(11, 'sorry, we are cutting down on our expenditure, u hve to jus allow LOL', '2017-08-13 01:08:20', 29, 1080, 1003),
(12, 'we are human resource dept, send to appopriate dept', '2017-08-13 01:08:22', 8, 1093, 0),
(13, 'what shud we do for u..????', '2017-08-13 05:08:45', 17, 1030, 0),
(14, 'press the power button on the computer', '2017-08-13 05:08:04', 25, 1040, 1000),
(15, 'so u want me to cook for u..??? :)', '2017-08-13 06:08:43', 5, 1094, 0),
(16, 'so u want me to cook for u..??? :)', '2017-08-13 06:08:31', 5, 1094, 0),
(17, 'its about money,. am not the givenor jeezzz', '2017-08-13 06:08:13', 30, 1094, 1000),
(18, 'at this point in time its 3615 buying and 3578 in selling', '2017-08-13 06:08:42', 21, 1070, 0),
(19, 'work for it', '2017-08-13 06:08:25', 20, 1094, 0),
(20, 'oh, thts shocking, we will act on the matter as soon as possible', '2017-08-13 06:08:59', 31, 1091, 1004),
(21, 'we will fire him', '2017-08-13 06:08:21', 24, 1095, 0),
(22, 'thts his job', '2017-08-13 06:08:55', 23, 1095, 0),
(23, 'we shall investigate', '2017-08-13 06:08:36', 6, 1060, 0),
(24, 'i dont get u..??', '2017-08-13 06:08:07', 9, 1070, 0),
(25, 'dont disturb me...', '2017-08-14 08:08:20', 32, 1040, 1005),
(26, 'we are coming immediately ,please wait..', '2017-08-14 08:08:12', 33, 1091, 1006),
(27, 'excuse me...', '2017-08-14 09:08:53', 34, 1030, 1007),
(28, 'go to www.bankofuganda.com..everything is on the site', '2017-08-14 01:08:29', 35, 1070, 1008),
(29, 'use Easeus software', '2017-08-14 01:08:34', 36, 1040, 1008),
(30, 'we are working on it..', '2017-08-16 01:08:13', 37, 1040, 1009),
(31, 'suffer', '2017-08-17 02:08:48', 39, 1102, 1011),
(32, 'company policy ..ur not allowed', '2017-08-21 08:08:46', 40, 1103, 1012),
(33, 'foster blah blah', '2017-08-21 09:08:02', 46, 1112, 1014),
(34, 'we are working on it', '2017-08-21 09:08:59', 41, 1110, 1013),
(35, 'write a police statement', '2017-08-21 09:08:20', 43, 1110, 1014),
(36, 'high, very high', '2017-08-21 09:08:38', 42, 1108, 1014),
(37, 'try us\r\n', '2017-08-21 09:08:31', 44, 1106, 1014),
(38, 'wch ones?? ', '2017-08-21 09:08:41', 45, 1103, 1014);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `staff_ID` int(11) NOT NULL AUTO_INCREMENT,
  `staff_fname` varchar(150) NOT NULL,
  `department` varchar(80) NOT NULL,
  `password` varchar(150) NOT NULL,
  `staff_lname` varchar(150) NOT NULL,
  `login_time` varchar(50) NOT NULL,
  `logout_time` varchar(50) NOT NULL,
  `sys_ID` int(11) NOT NULL,
  `email` varchar(120) NOT NULL,
  PRIMARY KEY (`staff_ID`),
  UNIQUE KEY `staff_ID` (`staff_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1113 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_ID`, `staff_fname`, `department`, `password`, `staff_lname`, `login_time`, `logout_time`, `sys_ID`, `email`) VALUES
(1103, 'Wiine', 'Human Resource', '20ee502d8f0afbdc234f41b06e0b722b', 'Bobi', '09:08:11', '09:08:47', 4000, 'bobi@gmail.com'),
(1104, 'conrad', 'Human Resource', '09f870fbec667d5fade41db025f1645f', 'ariho', '00:00:00', '00:00:00', 4000, 'conrad@bou.or.ug'),
(1105, 'mugisha', 'IT', '6aeac5436ea1de52303c7c45b0d12d82', 'king', '00:00:00', '00:00:00', 4000, 'mugisha@bou.or.ug'),
(1106, 'Tom', 'IT', '2af04541569ed737fe121d86eb6d76ba', 'dick', '09:08:46', '09:08:37', 4000, 'tom@bou.or.ug'),
(1107, 'grace', 'Finance', '396c8d743aa3bbaf4b34dc4942fa30d7', 'ikomo', '00:00:00', '00:00:00', 4000, 'ikomo@bou.or.ug'),
(1108, 'bob', 'Finance', '2917f23a7673fa159953447c54daa5c4', 'kitwe', '09:08:14', '09:08:47', 4000, 'bob@bou.or.ug'),
(1109, 'akello', 'Security', '3e7ff9acd713d940fbe574a53c5a01e9', 'sarah', '00:00:00', '00:00:00', 4000, 'akello@bou.or.ug'),
(1110, 'alice', 'Security', '52b20b64fe5c0a415acbcb6e1836c570', 'kate', '09:08:46', '09:08:26', 4000, 'alice@bou.or.ug'),
(1111, 'allan', 'Communication', 'ebf063cbc91a7106ab3db94011a269db', 'tumusime', '09:08:19', '09:08:11', 4000, 'allan@bou.or.ug'),
(1112, 'mark', 'Communication', 'd2f0e963198965722fd22e9ab414efbc', 'arnold', '09:08:20', '09:08:40', 4000, 'mark@bou.or.ug');

-- --------------------------------------------------------

--
-- Table structure for table `sys_admin`
--

CREATE TABLE IF NOT EXISTS `sys_admin` (
  `sys_ID` int(11) NOT NULL AUTO_INCREMENT,
  `sys_fname` varchar(80) NOT NULL,
  `sys_lname` varchar(80) NOT NULL,
  `password` varchar(120) NOT NULL,
  PRIMARY KEY (`sys_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4003 ;

--
-- Dumping data for table `sys_admin`
--

INSERT INTO `sys_admin` (`sys_ID`, `sys_fname`, `sys_lname`, `password`) VALUES
(4000, 'Conrad_king', 'Mugisha', 'conrad12345'),
(4001, 'system', 'admin', 'admin12345'),
(4002, 'Admin', 'Pro', '7488e331b8b64e5794da3fa4eb10ad5d');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
