-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 22, 2018 at 02:20 AM
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

DROP TABLE IF EXISTS `auction`;
CREATE TABLE IF NOT EXISTS `auction` (
  `auctionID` int(5) NOT NULL AUTO_INCREMENT,
  `sellerID` int(7) NOT NULL,
  `bidID` int(6) NOT NULL,
  `starDate` date NOT NULL,
  `endDate` date NOT NULL,
  `reservePrice` int(11) NOT NULL,
  `lotNumber` int(11) NOT NULL,
  `commission` float DEFAULT NULL,
  `state` tinyint(1) NOT NULL,
  PRIMARY KEY (`auctionID`),
  KEY `sellerID` (`sellerID`),
  KEY `bidID` (`bidID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

DROP TABLE IF EXISTS `bid`;
CREATE TABLE IF NOT EXISTS `bid` (
  `bidID` int(6) NOT NULL AUTO_INCREMENT,
  `buyerID` int(8) NOT NULL,
  `bidAmmount` int(11) NOT NULL,
  `currentBid` int(11) NOT NULL,
  `bidDate` date NOT NULL,
  `hammerPrice` int(11) NOT NULL,
  PRIMARY KEY (`bidID`),
  KEY `buyerID` (`buyerID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

DROP TABLE IF EXISTS `buyer`;
CREATE TABLE IF NOT EXISTS `buyer` (
  `buyerID` int(8) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(10) NOT NULL,
  `dob` date DEFAULT NULL,
  `password` text NOT NULL,
  `address` text,
  PRIMARY KEY (`buyerID`),
  UNIQUE KEY `buyerID` (`buyerID`),
  UNIQUE KEY `mobile` (`mobile`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`buyerID`, `fname`, `lname`, `email`, `mobile`, `dob`, `password`, `address`) VALUES
(20, 'KCUBE', 'KKK', 'kanjikangad444@gmail.com', '9879782739', '2019-07-24', 'SHANTUDI', NULL),
(28, 'shanti', 'myatra', 'shantimyatra555@gmail.com', '7016187149', '1998-08-02', 'kanji', NULL),
(46, 'milan', 'toliya', 'milan.toliya@gmail.com', '9624952923', '1998-04-08', 'milaniyo', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `FAQ` text NOT NULL,
  `Chat` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `userName` varchar(45) NOT NULL,
  `amount` int(11) NOT NULL,
  `paymentDate` date NOT NULL,
  PRIMARY KEY (`paymentID`),
  KEY `userName` (`userName`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

DROP TABLE IF EXISTS `seller`;
CREATE TABLE IF NOT EXISTS `seller` (
  `sellerID` int(7) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(10) NOT NULL,
  `dob` date DEFAULT NULL,
  `password` text NOT NULL,
  `address` text,
  PRIMARY KEY (`sellerID`),
  UNIQUE KEY `sellerID` (`sellerID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userName` varchar(45) NOT NULL,
  `password` text NOT NULL,
  `sellerID` int(11) DEFAULT NULL,
  `buyerID` int(11) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `mobileNO` int(10) NOT NULL,
  PRIMARY KEY (`userName`),
  UNIQUE KEY `sellerID_2` (`sellerID`),
  UNIQUE KEY `buyerID_2` (`buyerID`),
  KEY `sellerID` (`sellerID`),
  KEY `buyerID` (`buyerID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userName`, `password`, `sellerID`, `buyerID`, `email`, `mobileNO`) VALUES
('milan', '12345678', NULL, NULL, 'milan.toriya@gmail.com', 123456666),
('kanji', '123456789', NULL, NULL, 'kanjikangad63@gail.com', 123456789);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
