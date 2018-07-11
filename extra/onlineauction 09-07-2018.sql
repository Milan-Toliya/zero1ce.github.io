-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 09, 2018 at 05:48 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineauction`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `password` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

DROP TABLE IF EXISTS `auction`;
CREATE TABLE IF NOT EXISTS `auction` (
  `auctionID` varchar(17) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `specification` text NOT NULL,
  `nowDT` datetime NOT NULL,
  `startDT` datetime NOT NULL,
  `endDT` datetime NOT NULL,
  `basePrice` int(11) NOT NULL,
  `commision` float DEFAULT NULL,
  `img1` text,
  `img2` text,
  `img3` text,
  `img4` text,
  `img5` text,
  `userID` varchar(17) NOT NULL,
  `currentBid` int(11) NOT NULL,
  `hammerPrice` int(11) NOT NULL,
  PRIMARY KEY (`auctionID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auction`
--

INSERT INTO `auction` (`auctionID`, `name`, `description`, `specification`, `nowDT`, `startDT`, `endDT`, `basePrice`, `commision`, `img1`, `img2`, `img3`, `img4`, `img5`, `userID`, `currentBid`, `hammerPrice`) VALUES
('AID5b41c7dadddac', 'dell 3542', 'dell nu lappy', 'my laptop', '2018-07-08 08:14:18', '1010-10-10 00:44:00', '1011-10-10 00:45:00', 90, 0, '1AID5b41c7dadddac.jpg', '2AID5b41c7dadddac.jpg', '3AID5b41c7dadddac.jpg', '4AID5b41c7dadddac.jpg', '5AID5b41c7dadddac.jpg', 'UID5b41c05491678', 0, 0),
('AID5b41f854e30bb', 'GJHGJ', 'GG', 'GHJ', '2018-07-08 11:41:08', '2017-06-07 04:10:00', '2019-08-09 04:10:00', 24, 0, NULL, NULL, NULL, NULL, NULL, 'UID5b41c05491678', 0, 0),
('AID5b41f8b171dfd', 'GJHGJ', 'GG', 'GHJ', '2018-07-08 11:42:41', '2017-06-07 04:11:00', '2019-08-09 04:11:00', 10000000, 100, NULL, NULL, NULL, NULL, NULL, 'UID5b41c05491678', 0, 0),
('AID5b420790c642d', 'dell', 'dell nu lappu', 'dell i3 4gb ram nvidiada', '2018-07-08 12:46:08', '2017-06-07 05:15:00', '2019-08-09 07:17:00', 500, 0, NULL, NULL, NULL, NULL, NULL, 'UID5b41c05491678', 0, 0),
('AID5b424560c26d9', 'hjgg', 'jgjgjgj', 'gjgjgj', '2018-07-08 17:09:52', '2017-06-07 11:40:00', '2019-08-09 11:40:00', 6899, 0, NULL, NULL, NULL, NULL, NULL, 'UID5b41c05491678', 0, 0),
('AID5b42461707d6d', 'gjgjgjgjgjj', 'jgjgjgjgjgjgjg', 'jgjgjgjgjgjgjgj', '2018-07-08 00:00:00', '2019-08-09 11:43:00', '2017-06-07 11:43:00', 7890, 0, NULL, NULL, NULL, NULL, NULL, 'UID5b41c05491678', 0, 0),
('AID5b424ea8897f5', 'kkkkkkkkkkk', 'kkkkkkkkkkkkkkkkk', 'kkkkkkkkkkkkkkk', '2018-07-08 17:49:28', '2017-06-07 00:20:00', '2019-08-09 00:20:00', 78909, 100, NULL, NULL, NULL, NULL, NULL, 'UID5b41c05491678', 0, 0),
('AID5b4256af8ed7b', 'yurekaa', 'u', 'yi', '2018-07-08 18:23:43', '2018-07-09 00:54:00', '2018-07-11 00:54:00', 874, 0, NULL, NULL, NULL, NULL, NULL, 'UID5b41c05491678', 0, 0),
('AID5b425fac7e1c8', 'hjhjh', 'hhhh', 'jhjhjhj', '2018-07-08 19:02:04', '2018-07-08 01:27:00', '2018-07-11 01:27:00', 6868, 0, NULL, NULL, NULL, NULL, NULL, 'UID5b41c05491678', 0, 0),
('AID5b4261509e8be', 'lllllllllllll', 'llllllllllllllll', 'lllllllllllllll', '2018-07-08 19:09:04', '2018-07-09 10:10:00', '2018-07-12 22:10:00', 77, 0, NULL, NULL, NULL, NULL, NULL, 'UID5b41c05491678', 0, 0),
('AID5b42674c44347', 'power', 'power', 'op', '2018-07-09 01:04:36', '2018-07-10 04:05:00', '2018-07-11 02:05:00', 2445545, 100, NULL, NULL, NULL, NULL, NULL, 'UID5b41c05491678', 0, 0),
('AID5b426f45213e4', 'ja', 'ja', 'iure', '2018-07-09 01:38:37', '2018-07-10 01:40:00', '2018-07-11 02:39:00', 54645, 100, NULL, NULL, NULL, NULL, NULL, 'UID5b41c05491678', 0, 0),
('AID5b426fdcb501b', 'ja', 'ja', 'iure', '2018-07-09 01:41:08', '2018-07-10 01:40:00', '2018-07-11 02:39:00', 54645, 100, NULL, NULL, NULL, NULL, NULL, 'UID5b41c05491678', 0, 0),
('AID5b4270c5d3cf5', 'nowtime', 'nowtime', 'nowtimw', '2018-07-09 01:45:01', '2018-07-10 02:45:00', '2018-07-11 00:43:00', 2445545, 100, NULL, NULL, NULL, NULL, NULL, 'UID5b41c05491678', 0, 0),
('AID5b427110b61d7', 'nowtime12', 'nowtime', 'iure', '2018-07-09 01:46:16', '2018-07-10 05:45:00', '2018-07-11 00:45:00', 54645, 100, NULL, NULL, NULL, NULL, NULL, 'UID5b41c05491678', 0, 0),
('AID5b4271d129fea', 'intel', 'intelq', 'iadio', '2018-07-09 01:49:29', '2018-07-10 02:49:00', '2018-07-11 00:47:00', 2445545, 100, NULL, NULL, NULL, NULL, NULL, 'UID5b41c05491678', 0, 0),
('AID5b4276cb0956e', 'hadfhj', 'ajkdhkjs', 'jkhakdf', '2018-07-09 02:10:43', '2018-07-09 03:10:00', '2018-07-09 03:10:00', 65464, 100, NULL, NULL, NULL, NULL, NULL, 'UID5b41c05491678', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

DROP TABLE IF EXISTS `bid`;
CREATE TABLE IF NOT EXISTS `bid` (
  `bidID` varchar(17) NOT NULL,
  `userID` varchar(17) NOT NULL,
  `auctionID` varchar(17) NOT NULL,
  `bidAmmount` int(11) NOT NULL,
  `bidDT` datetime NOT NULL,
  PRIMARY KEY (`bidID`),
  KEY `buyerID` (`userID`),
  KEY `auctionID` (`auctionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `FAQ` text NOT NULL,
  `Chat` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kanji`
--

DROP TABLE IF EXISTS `kanji`;
CREATE TABLE IF NOT EXISTS `kanji` (
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kanji`
--

INSERT INTO `kanji` (`fname`, `lname`) VALUES
('kanji', 'kangad');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `paymentID` int(11) NOT NULL,
  `paymentType` varchar(45) NOT NULL,
  `userID` varchar(17) NOT NULL,
  `auctionID` varchar(17) NOT NULL,
  `amount` int(11) NOT NULL,
  `paymentDT` datetime NOT NULL,
  PRIMARY KEY (`paymentID`),
  UNIQUE KEY `auctionID` (`auctionID`),
  KEY `userName` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userID` varchar(17) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(10) NOT NULL,
  `dob` date DEFAULT NULL,
  `password` text NOT NULL,
  `address` text,
  `img` text,
  `gender` varchar(1) DEFAULT NULL,
  `auctionNumber` int(11) DEFAULT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `mobile` (`mobile`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `fname`, `lname`, `email`, `mobile`, `dob`, `password`, `address`, `img`, `gender`, `auctionNumber`) VALUES
('UID5b41c05491678', 'MILAN ', 'TOLIYA', 'rc@gmailgg.in', '9624952923', '1998-04-08', '83227a721a3363d2c78381664c78657f', NULL, 'm.png', NULL, NULL),
('UID5b41c85a8dadb', 'kanji', 'kangad', '', '9879782739', NULL, '7a48b3323b0b04bd61a7c10fdcb10120', NULL, 'm.png', '', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auction`
--
ALTER TABLE `auction`
  ADD CONSTRAINT `Foreign KEY` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`auctionID`) REFERENCES `auction` (`auctionID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bid_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`auctionID`) REFERENCES `auction` (`auctionID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
