-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 26, 2018 at 08:40 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `plazacafedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblautonumber`
--

CREATE TABLE IF NOT EXISTS `tblautonumber` (
  `AUTOID` int(11) NOT NULL AUTO_INCREMENT,
  `AUTOSTART` varchar(30) NOT NULL,
  `AUTOEND` int(11) NOT NULL,
  `AUTOKEY` varchar(30) NOT NULL,
  PRIMARY KEY (`AUTOID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tblautonumber`
--

INSERT INTO `tblautonumber` (`AUTOID`, `AUTOSTART`, `AUTOEND`, `AUTOKEY`) VALUES
(1, '000', 17, 'userid'),
(2, '201700', 8, 'MENUID'),
(4, '0', 320, 'ordernumber'),
(5, '2017-M-0', 19, 'MEALID'),
(6, '2017', 109, 'CUSTOMER');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE IF NOT EXISTS `tblcategory` (
  `CATEGORYID` int(11) NOT NULL AUTO_INCREMENT,
  `CATEGORY` varchar(90) NOT NULL,
  PRIMARY KEY (`CATEGORYID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`CATEGORYID`, `CATEGORY`) VALUES
(3, 'Bake Items'),
(4, 'DRINKS'),
(7, 'SANDWICHES'),
(9, 'PIZZA');

-- --------------------------------------------------------

--
-- Table structure for table `tblmeals`
--

CREATE TABLE IF NOT EXISTS `tblmeals` (
  `MEALID` varchar(30) NOT NULL,
  `MEALS` varchar(255) NOT NULL,
  `CATEGORIES` varchar(90) NOT NULL,
  `PRICE` double NOT NULL,
  `CATEGORYID` int(11) NOT NULL,
  `MEALPHOTO` varchar(90) NOT NULL,
  PRIMARY KEY (`MEALID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmeals`
--

INSERT INTO `tblmeals` (`MEALID`, `MEALS`, `CATEGORIES`, `PRICE`, `CATEGORYID`, `MEALPHOTO`) VALUES
('2017-M-010', 'Meloi''s Quarter Pounder Single Patty', 'SANDWICHES', 150, 7, 'uploaded_photos/food_icon05.jpg'),
('2017-M-011', 'Garlic Toast', 'APPETIZERS', 50, 8, 'uploaded_photos/food_icon06.jpg'),
('2017-M-012', 'Spaghetti and Meatballs / Double Meatballs', 'PASTA', 180, 3, 'uploaded_photos/food_icon01.jpg'),
('2017-M-06', '3 Cheese Pizza', 'PIZZA', 195, 9, 'uploaded_photos/limes.jpg'),
('2017-M-07', 'Baby Back Ribs 1 Rack', 'ENTREES', 400, 6, 'uploaded_photos/food_icon03.jpg'),
('2017-M-08', 'Fresh Juice', 'DRINKS', 40, 4, 'uploaded_photos/beer_spec.jpg'),
('2017-M-09', 'Pesto Chicken', 'PASTA', 145, 3, 'uploaded_photos/food_icon04.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblorders`
--

CREATE TABLE IF NOT EXISTS `tblorders` (
  `ORDERID` int(11) NOT NULL AUTO_INCREMENT,
  `DATEORDERED` datetime NOT NULL,
  `ORDERNO` varchar(40) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `PRICE` double NOT NULL,
  `QUANTITY` int(11) NOT NULL,
  `SUBTOTAL` double NOT NULL,
  `TABLENO` int(11) NOT NULL,
  `MEALID` varchar(30) NOT NULL,
  `USERID` varchar(30) NOT NULL,
  `STATUS` varchar(30) NOT NULL,
  `REMARKS` varchar(30) NOT NULL,
  PRIMARY KEY (`ORDERID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=636 ;

--
-- Dumping data for table `tblorders`
--

INSERT INTO `tblorders` (`ORDERID`, `DATEORDERED`, `ORDERNO`, `DESCRIPTION`, `PRICE`, `QUANTITY`, `SUBTOTAL`, `TABLENO`, `MEALID`, `USERID`, `STATUS`, `REMARKS`) VALUES
(385, '2017-08-12 14:50:36', '2017-0209', 'Meloi''s Quarter Pounder Single Patty', 150, 1, 150, 1, '2017-M-010', '0008', 'Paid', 'DineIn');

-- --------------------------------------------------------

--
-- Table structure for table `tblpayments`
--

CREATE TABLE IF NOT EXISTS `tblpayments` (
  `PAYMENTID` int(11) NOT NULL AUTO_INCREMENT,
  `ORDERNO` varchar(40) NOT NULL,
  `TRANSDATE` datetime NOT NULL,
  `TOTALPAYMENT` double NOT NULL,
  `DISCOUNTSENIOR` double NOT NULL,
  `OVERALLTOTAL` double NOT NULL,
  `TENDEREDAMOUNT` double NOT NULL,
  `PCHANGE` double NOT NULL,
  `USERSNAME` varchar(60) NOT NULL,
  `CUSTOMER` varchar(30) NOT NULL,
  `TABLENO` int(11) NOT NULL,
  `REMARK` varchar(30) NOT NULL,
  `SENIORID` varchar(90) NOT NULL,
  PRIMARY KEY (`PAYMENTID`),
  UNIQUE KEY `ORDERNO` (`ORDERNO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tblpayments`
--

INSERT INTO `tblpayments` (`PAYMENTID`, `ORDERNO`, `TRANSDATE`, `TOTALPAYMENT`, `DISCOUNTSENIOR`, `OVERALLTOTAL`, `TENDEREDAMOUNT`, `PCHANGE`, `USERSNAME`, `CUSTOMER`, `TABLENO`, `REMARK`, `SENIORID`) VALUES
(1, '2017-0301', '2018-04-14 09:45:00', 470, 20, 376, 500, 124, 'Administrator', '201799', 1, 'Dine-In', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbltable`
--

CREATE TABLE IF NOT EXISTS `tbltable` (
  `TABLEID` int(11) NOT NULL AUTO_INCREMENT,
  `TABLENO` int(11) NOT NULL,
  `CUSTOMER` text NOT NULL,
  `RESERVEDDATE` date NOT NULL,
  `RESERVEDTIME` varchar(30) NOT NULL,
  `STATUS` varchar(30) NOT NULL DEFAULT 'Available',
  PRIMARY KEY (`TABLEID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbltable`
--

INSERT INTO `tbltable` (`TABLEID`, `TABLENO`, `CUSTOMER`, `RESERVEDDATE`, `RESERVEDTIME`, `STATUS`) VALUES
(6, 2, '', '2024-10-21', '01:29 PM', 'Occupied')
;

-- --------------------------------------------------------

--
-- Table structure for table `tbltitle`
--

CREATE TABLE IF NOT EXISTS `tbltitle` (
  `TItleID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` text NOT NULL,
  `Subtitle` text NOT NULL,
  PRIMARY KEY (`TItleID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbltitle`
--

INSERT INTO `tbltitle` (`TItleID`, `Title`, `Subtitle`) VALUES
(1, 'espresso junction', '24hrs.');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE IF NOT EXISTS `tblusers` (
  `USERID` varchar(30) NOT NULL,
  `FULLNAME` varchar(40) NOT NULL,
  `USERNAME` varchar(90) NOT NULL,
  `PASS` varchar(90) NOT NULL,
  `ROLE` varchar(30) NOT NULL,
  PRIMARY KEY (`USERID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`USERID`, `FULLNAME`, `USERNAME`, `PASS`, `ROLE`) VALUES
('0006', 'Jayson Cayao', 'cashier1', '2f22765d04931a078909145ca628d2264c852d7d', 'Cashier'),
('0007', 'Administrator', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator');
