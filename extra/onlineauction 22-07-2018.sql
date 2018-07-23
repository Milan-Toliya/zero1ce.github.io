-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 21, 2018 at 07:42 PM
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
  `cartUserID` varchar(17) DEFAULT NULL,
  `currentBid` int(11) DEFAULT NULL,
  `hammerPrice` int(11) DEFAULT NULL,
  `catagory` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`auctionID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auction`
--

INSERT INTO `auction` (`auctionID`, `name`, `description`, `specification`, `nowDT`, `startDT`, `endDT`, `basePrice`, `commision`, `img1`, `img2`, `img3`, `img4`, `img5`, `userID`, `cartUserID`, `currentBid`, `hammerPrice`, `catagory`) VALUES
('AID5b517965db056', 'lenovo', 'dablu', 'dabli', '2018-07-20 11:25:49', '2018-07-21 00:26:00', '2018-07-22 00:26:00', 999988, 100, '1AID5b517965db056.jpeg', NULL, NULL, NULL, NULL, 'UID5b41c85a8dadb', NULL, NULL, NULL, 'electronics'),
('AID7uhg6t5r4edn', 'lkjalnv', 'alkfjdakj', 'akjfklajdf', '2018-07-17 00:00:00', '2018-07-18 00:00:00', '2018-07-19 00:00:00', 98568, NULL, NULL, NULL, NULL, NULL, NULL, 'UID5b41c85a8dadb', NULL, NULL, NULL, 'vehical'),
('AID7y32g6t5r4edn', 'laskjfkl', 'alkfjdakj', 'akjfklajdf', '2018-07-17 00:00:00', '2018-07-18 00:00:00', '2018-07-19 00:00:00', 98568, NULL, NULL, NULL, NULL, NULL, NULL, 'UID5b41c85a8dadb', NULL, NULL, NULL, 'land'),
('AID7y5hg6t5r4edn', 'uyiuefkl', 'alkfjdakj', 'akjfklajdf', '2018-07-17 00:00:00', '2018-07-18 00:00:00', '2018-07-19 00:00:00', 98568, NULL, NULL, NULL, NULL, NULL, NULL, 'UID5b41c85a8dadb', NULL, NULL, NULL, 'vehical'),
('AID7ye36t5r4edn', 'ljaaskjfkl', 'alkfjdakj', 'akjfklajdf', '2018-07-17 00:00:00', '2018-07-18 00:00:00', '2018-07-19 00:00:00', 98568, NULL, NULL, NULL, NULL, NULL, NULL, 'UID5b41c85a8dadb', NULL, NULL, NULL, 'land'),
('AID7yueg6t5r4edn', 'laskadssjfkl', 'alkfjdakj', 'akjfklajdf', '2018-07-17 00:00:00', '2018-07-18 00:00:00', '2018-07-19 00:00:00', 98568, NULL, NULL, NULL, NULL, NULL, NULL, 'UID5b41c85a8dadb', NULL, NULL, NULL, 'land'),
('AID7yuh374t5r4edn', 'adfaskjfkl', 'alkfjdakj', 'akjfklajdf', '2018-07-17 00:00:00', '2018-07-18 00:00:00', '2018-07-19 00:00:00', 98568, NULL, NULL, NULL, NULL, NULL, NULL, 'UID5b41c85a8dadb', NULL, NULL, NULL, 'land'),
('AID7yuhg235r4edn', 'laskadf]ghjfkl', 'alkfjdakj', 'akjfklajdf', '2018-07-17 00:00:00', '2018-07-18 00:00:00', '2018-07-19 00:00:00', 98568, NULL, NULL, NULL, NULL, NULL, NULL, 'UID5b41c85a8dadb', NULL, NULL, NULL, 'land'),
('AID7yuhg6t534edn', 'miakl', 'alkfjdakj', 'akjfklajdf', '2018-07-17 00:00:00', '2018-07-18 00:00:00', '2018-07-19 00:00:00', 98568, NULL, NULL, NULL, NULL, NULL, NULL, 'UID5b41c85a8dadb', NULL, 99999, NULL, 'art'),
('AID7yuhg6t54redn', 'mkkjfkl', 'alkfjdakj', 'akjfklajdf', '2018-07-17 00:00:00', '2018-07-18 00:00:00', '2018-07-19 00:00:00', 98568, NULL, NULL, NULL, NULL, NULL, NULL, 'UID5b41c85a8dadb', NULL, NULL, NULL, 'art'),
('AID7yuhg6t5r4e09', 'loakjfkl', 'alkfjdakj', 'akjfklajdf', '2018-07-17 00:00:00', '2018-07-18 00:00:00', '2018-07-19 00:00:00', 98568, NULL, NULL, NULL, NULL, NULL, NULL, 'UID5b41c85a8dadb', NULL, NULL, NULL, 'vehical'),
('AID7yuhg6t5r4e99', 'lasskjfkl', 'alkfjdakj', 'akjfklajdf', '2018-07-17 00:00:00', '2018-07-18 00:00:00', '2018-07-19 00:00:00', 98568, NULL, NULL, NULL, NULL, NULL, NULL, 'UID5b41c85a8dadb', NULL, NULL, NULL, 'art'),
('AID7yuhg6t5r4ed2', 'lasadfkl', 'alkfjdakj', 'akjfklajdf', '2018-07-17 00:00:00', '2018-07-18 00:00:00', '2018-07-19 00:00:00', 98568, NULL, NULL, NULL, NULL, NULL, NULL, 'UID5b41c85a8dadb', NULL, NULL, NULL, 'vehical'),
('AID7yuhg6t5r4ed9', 'Gaskjfkl', 'alkfjdakj', 'akjfklajdf', '2018-07-17 00:00:00', '2018-07-18 00:00:00', '2018-07-19 00:00:00', 98568, NULL, NULL, NULL, NULL, NULL, NULL, 'UID5b41c85a8dadb', NULL, NULL, NULL, 'art'),
('AID7yuhg6t5r4edfg', 'kanji', 'kangad', 'kkkk', '2018-07-16 00:00:00', '2018-07-17 00:00:00', '2018-07-18 00:00:00', 9999, 987, '1AID7yuhg6t5r4edfg.png', '2AID7yuhg6t5r4edfg.png', '3AID7yuhg6t5r4edfg.png', '4AID7yuhg6t5r4edfg.png', '5AID7yuhg6t5r4edfg.png', 'UID5b41c05491678', NULL, 5679, NULL, 'electronics'),
('AID7yuhg6t5r4edn', 'laskjfkl', 'alkfjdakj', 'akjfklajdf', '2018-07-17 00:00:00', '2018-07-18 00:00:00', '2018-07-19 00:00:00', 98568, NULL, NULL, NULL, NULL, NULL, NULL, 'UID5b41c85a8dadb', NULL, NULL, NULL, 'art'),
('AID7yuhg6t5r4eio', 'nalkadl', 'alkfjdakj', 'akjfklajdf', '2018-07-17 00:00:00', '2018-07-18 00:00:00', '2018-07-19 00:00:00', 98568, NULL, NULL, NULL, NULL, NULL, NULL, 'UID5b41c85a8dadb', NULL, NULL, NULL, 'vehical'),
('AID7yuhg6t5r4eka', 'jiaskjfkl', 'alkfjdakj', 'akjfklajdf', '2018-07-17 00:00:00', '2018-07-18 00:00:00', '2018-07-19 00:00:00', 98568, NULL, NULL, NULL, NULL, NULL, NULL, 'UID5b41c85a8dadb', NULL, NULL, NULL, 'land'),
('AIDty67ydgyft76fd', 'nnnnnnnnnnnnnnn', 'nnnnnnnnnnnnnn', 'nnnnnnnnnnnnnnnnnnn', '2018-07-16 00:00:00', '2018-07-24 00:00:00', '2018-07-25 00:00:00', 656, NULL, NULL, NULL, NULL, NULL, NULL, 'UID5b41c05491678', NULL, 659, NULL, 'electronics'),
('AIDty67ydgyft76we', 'lllllllllll', 'ygyugyygygygyy', 'ygyugyuguyg', '2018-07-10 00:00:00', '2018-07-17 00:00:00', '2018-07-18 00:00:00', 5678, NULL, NULL, NULL, NULL, NULL, NULL, 'UID5b41c05491678', NULL, NULL, NULL, 'electronics'),
('AIDty67ydgyft76wg', 'mmmmmmmmmmmmmmm', 'mmmmmmmmmmmmmmmm', 'mmmmmmmmmmmmmmmmmmmm', '2018-07-16 00:00:00', '2018-07-24 00:00:00', '2018-07-18 00:00:00', 656, NULL, NULL, NULL, NULL, NULL, NULL, 'UID5b41c85a8dadb', NULL, NULL, NULL, 'electronics'),
('AIDty67ydgyft7gyu', 'oooooooooooooooo', 'oooooooooooo', 'ooooooooooo', '2018-07-10 00:00:00', '2018-07-25 00:00:00', '2018-07-11 00:00:00', 8, NULL, NULL, NULL, NULL, NULL, NULL, 'UID5b45f6c13d351', NULL, NULL, NULL, 'electronics');

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
('', 'toliya'),
('some text', 'toliya'),
('k1', 'toliya'),
('k2', 'toliya'),
('k3', 'toliya'),
('k4', 'toliya'),
('AID5b517965db056', 'toliya'),
('AID7yuhg6t5r4edfg', 'toliya');

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
('UID5b41c05491678', 'MILAN ', 'TOLIYA', 'milan.toriya@gmail.com', '9624952923', '1998-04-08', '83227a721a3363d2c78381664c78657f', NULL, 'm.png', NULL, NULL),
('UID5b41c85a8dadb', 'kanji', 'kangad', '', '9879782739', NULL, '7a48b3323b0b04bd61a7c10fdcb10120', NULL, 'm.png', '', NULL),
('UID5b45f6c13d351', 'rahul', 'rathod', '', '8758591469', '1998-03-17', '4750f4ac5b23ec6ace93c148698bea86', NULL, 'm.png', 'm', NULL),
('UID5b47439c6e688', 'kanji', 'kangad', 'kanjikangad63@gmail.com', '9925619136', NULL, 'dc73166a5cda804c4629197a02af4109', NULL, 'm.png', 'm', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishcart`
--

DROP TABLE IF EXISTS `wishcart`;
CREATE TABLE IF NOT EXISTS `wishcart` (
  `wishcartID` varchar(17) NOT NULL,
  `userID` varchar(17) NOT NULL,
  `wishAuctionID` varchar(17) NOT NULL,
  PRIMARY KEY (`wishcartID`),
  KEY `userID` (`userID`),
  KEY `wishAuctionID` (`wishAuctionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishcart`
--

INSERT INTO `wishcart` (`wishcartID`, `userID`, `wishAuctionID`) VALUES
('WID5b53897a5a336', 'UID5b41c85a8dadb', 'AID5b517965db056'),
('WID5b53897cb3ed1', 'UID5b41c85a8dadb', 'AID7yuhg6t5r4edfg');

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

--
-- Constraints for table `wishcart`
--
ALTER TABLE `wishcart`
  ADD CONSTRAINT `wishcart_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishcart_ibfk_2` FOREIGN KEY (`wishAuctionID`) REFERENCES `auction` (`auctionID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
