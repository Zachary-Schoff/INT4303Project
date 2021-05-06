-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 06, 2021 at 08:47 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enhancedfunctionalitypages`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `creategroup`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `creategroup` (IN `name` VARCHAR(32), IN `description` VARCHAR(128), IN `picture` VARCHAR(32))  MODIFIES SQL DATA
INSERT INTO usergroup (gname, gdescription, gpicture) VALUES (name, description, picture)$$

DROP PROCEDURE IF EXISTS `createuser`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `createuser` (IN `first` VARCHAR(32), IN `last` VARCHAR(32), IN `emailaddress` VARCHAR(64), IN `birth` DATE, IN `username` VARCHAR(32), IN `pass` VARCHAR(32), IN `bio` VARCHAR(128), IN `pfp` VARCHAR(32))  MODIFIES SQL DATA
INSERT INTO user (fname, lname, email, nickname, password, bio, profilepicture) VALUES (first, last, emailaddress, username, pass, bio, pfp)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `following`
--

DROP TABLE IF EXISTS `following`;
CREATE TABLE IF NOT EXISTS `following` (
  `followid` int NOT NULL,
  `followerid` int NOT NULL,
  PRIMARY KEY (`followid`,`followerid`),
  KEY `followerid` (`followerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `following`
--

INSERT INTO `following` (`followid`, `followerid`) VALUES
(9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `postid` int NOT NULL AUTO_INCREMENT,
  `message` varchar(256) NOT NULL,
  `dateposted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `userid` int NOT NULL,
  PRIMARY KEY (`postid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postid`, `message`, `dateposted`, `file`, `userid`) VALUES
(1, 'Hey guys the post function works', '2021-04-21 17:15:48', NULL, 3),
(2, 'This is going to be a good day', '2021-04-21 17:19:40', NULL, 3),
(3, 'Test	', '2021-04-21 17:21:05', NULL, 3),
(4, 'In IT Capstone', '2021-04-21 17:52:25', NULL, 3),
(5, 'Test', '2021-05-05 17:58:23', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userid` int NOT NULL AUTO_INCREMENT,
  `nickname` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `profilepicture` varchar(32) DEFAULT NULL,
  `bio` varchar(128) DEFAULT NULL,
  `fname` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `lname` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `nickname`, `password`, `email`, `profilepicture`, `bio`, `fname`, `lname`, `dob`) VALUES
(1, 'TEST', '134567', 'test@t.com', NULL, NULL, NULL, NULL, NULL),
(2, 'testnick', '1234', 'test@gmail.com', NULL, NULL, 'testfirstname', 'testlastname', '2019-01-01'),
(3, 'Schoff', 'Zts021299', 'zschoff@me.com', 'Schoff.png', 'LTU Student, Part Time TSE at Imagesoft in Southfield', 'Zach', 'Schoff', '1999-02-12'),
(9, 'Bill Nye', 'THEscienceGUY2002', 'bnye@harvard.edu', 'Bill.jpg', 'The Science GUUUUUUUUUUUUUUY', 'William', 'Nye', NULL),
(25, 'Aber', 'ASFhj', 'A@G.edu', '1Capture.PNG', '', 'asdfhgj', 'sdbv', NULL),
(27, 'AllNight', 'Midnight', 'night@dark.com', 'Night.jpeg', 'Its gonna be a long night', 'A', 'Knight', NULL),
(28, 'Penguin0', 'Moisture', 'critical@gmail.com', 'Penguin.jpg', 'Moistcritical', 'Charlie', 'Smith', NULL),
(29, 'BoyScout42', 'BSoA', 'BSEnthusiast@gmail.com', 'BS.jpg', 'I loved my time in the boy scouts, and now I am an Eagle Scout at LTU', 'Zac', 'Adams', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usergroup`
--

DROP TABLE IF EXISTS `usergroup`;
CREATE TABLE IF NOT EXISTS `usergroup` (
  `groupid` int NOT NULL AUTO_INCREMENT,
  `gname` varchar(32) NOT NULL,
  `gpicture` varchar(32) DEFAULT NULL,
  `gdescription` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`groupid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usergroup`
--

INSERT INTO `usergroup` (`groupid`, `gname`, `gpicture`, `gdescription`) VALUES
(2, 'LTU Soccer', 'LTU Soccer.png', 'Official group of the soccer team'),
(3, 'Web Design', 'Web Design.png', 'A group all about web design'),
(4, 'IT Capstone Group', 'IT Capstone Group.png', 'This group was created during the IT Capstone Presentation');

-- --------------------------------------------------------

--
-- Table structure for table `userxusergroup`
--

DROP TABLE IF EXISTS `userxusergroup`;
CREATE TABLE IF NOT EXISTS `userxusergroup` (
  `groupid` int NOT NULL,
  `userid` int NOT NULL,
  KEY `groupid` (`groupid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `following`
--
ALTER TABLE `following`
  ADD CONSTRAINT `followid` FOREIGN KEY (`followid`) REFERENCES `user` (`userid`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userxusergroup`
--
ALTER TABLE `userxusergroup`
  ADD CONSTRAINT `groupid` FOREIGN KEY (`groupid`) REFERENCES `usergroup` (`groupid`),
  ADD CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
