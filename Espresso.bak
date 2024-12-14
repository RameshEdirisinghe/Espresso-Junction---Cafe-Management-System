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
(3, 'PASTA'),
(4, 'DRINKS'),
(6, 'ENTREES'),
(7, 'SANDWICHES'),
(8, 'APPETIZERS'),
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
(385, '2017-08-12 14:50:36', '2017-0209', 'Meloi''s Quarter Pounder Single Patty', 150, 1, 150, 1, '2017-M-010', '0008', 'Paid', 'DineIn'),
(386, '2017-08-12 14:50:36', '2017-0209', 'Garlic Toast', 50, 2, 100, 1, '2017-M-011', '0008', 'Paid', 'DineIn'),
(387, '2017-08-12 14:50:36', '2017-0209', 'Spaghetti and Meatballs / Double Meatballs', 210, 4, 840, 1, '2017-M-012', '0008', 'Paid', 'DineIn'),
(388, '2017-08-12 14:51:14', '2017-0210', 'Meloi''s Quarter Pounder Single Patty', 150, 2, 300, 1, '2017-M-010', '0006', 'Paid', 'DineIn'),
(389, '2017-08-12 14:51:14', '2017-0210', 'Garlic Toast', 50, 2, 100, 1, '2017-M-011', '0006', 'Paid', 'DineIn'),
(390, '2017-08-12 14:51:14', '2017-0210', 'Spaghetti and Meatballs / Double Meatballs', 210, 1, 210, 1, '2017-M-012', '0006', 'Paid', 'DineIn'),
(391, '2017-08-12 17:29:05', '2017-0211', 'Meloi''s Quarter Pounder Single Patty', 150, 3, 450, 1, '2017-M-010', '0006', 'Paid', 'DineIn'),
(392, '2017-08-12 17:29:06', '2017-0211', 'Garlic Toast', 50, 4, 200, 1, '2017-M-011', '0006', 'Paid', 'DineIn'),
(393, '2017-08-12 17:30:00', '2017-0211', 'Spaghetti and Meatballs / Double Meatballs', 210, 1, 210, 1, '2017-M-012', '0006', 'Paid', 'DineIn'),
(394, '2017-08-12 17:30:00', '2017-0211', '3 Cheese Pizza', 195, 1, 195, 1, '2017-M-06', '0006', 'Paid', 'DineIn'),
(395, '2017-08-13 10:03:00', '2017-0211', 'Pesto Chicken', 145, 1, 145, 1, '2017-M-09', '0006', 'Paid', 'DineIn'),
(396, '2017-08-13 14:35:00', '2017-0212', 'Garlic Toast', 50, 1, 50, 1, '2017-M-011', '0008', 'Paid', 'DineIn'),
(397, '2017-08-13 14:35:00', '2017-0212', 'Meloi''s Quarter Pounder Single Patty', 150, 1, 150, 1, '2017-M-010', '0008', 'Paid', 'DineIn'),
(398, '2017-08-13 14:35:01', '2017-0212', 'Spaghetti and Meatballs / Double Meatballs', 210, 1, 210, 1, '2017-M-012', '0008', 'Paid', 'DineIn'),
(399, '2017-08-13 15:02:38', '2017-0213', 'Spaghetti and Meatballs / Double Meatballs', 210, 1, 210, 1, '2017-M-012', '0008', 'Paid', 'Dine_In'),
(400, '2017-08-13 15:02:39', '2017-0213', 'Garlic Toast', 50, 2, 100, 1, '2017-M-011', '0008', 'Paid', 'Dine_In'),
(401, '2017-08-13 15:03:39', '2017-0214', 'Spaghetti and Meatballs / Double Meatballs', 210, 1, 210, 1, '2017-M-012', '0008', 'Paid', 'Take_Out'),
(402, '2017-08-13 15:03:39', '2017-0214', 'Garlic Toast', 50, 1, 50, 1, '2017-M-011', '0008', 'Paid', 'Take_Out'),
(403, '2017-08-13 15:19:59', '2017-0215', 'Spaghetti and Meatballs / Double Meatballs', 210, 1, 210, 1, '2017-M-012', '0008', 'Paid', 'TakeOut'),
(404, '2017-08-13 15:19:59', '2017-0215', 'Meloi''s Quarter Pounder Single Patty', 150, 1, 150, 1, '2017-M-010', '0008', 'Paid', 'TakeOut'),
(405, '2017-08-13 15:25:20', '2017-0216', 'Spaghetti and Meatballs / Double Meatballs', 210, 3, 630, 1, '2017-M-012', '0008', 'Paid', 'Dine_In'),
(406, '2017-08-13 15:25:20', '2017-0216', 'Garlic Toast', 50, 1, 50, 1, '2017-M-011', '0008', 'Paid', 'Dine_In'),
(407, '2017-08-13 15:25:20', '2017-0216', 'Meloi''s Quarter Pounder Single Patty', 150, 1, 150, 1, '2017-M-010', '0008', 'Paid', 'Dine_In'),
(408, '2017-08-13 15:25:20', '2017-0216', '3 Cheese Pizza', 195, 1, 195, 1, '2017-M-06', '0008', 'Paid', 'Dine_In'),
(409, '2017-08-13 15:25:20', '2017-0216', 'Baby Back Ribs 1 Rack', 400, 1, 400, 1, '2017-M-07', '0008', 'Paid', 'Dine_In'),
(410, '2017-08-13 15:29:04', '2017-0217', 'Spaghetti and Meatballs / Double Meatballs', 210, 2, 420, 1, '2017-M-012', '0008', 'Paid', 'Dine_In'),
(411, '2017-08-13 15:29:05', '2017-0217', 'Garlic Toast', 50, 1, 50, 1, '2017-M-011', '0008', 'Paid', 'Dine_In'),
(412, '2017-08-13 15:29:05', '2017-0217', 'Meloi''s Quarter Pounder Single Patty', 150, 1, 150, 1, '2017-M-010', '0008', 'Paid', 'Dine_In'),
(413, '2017-08-13 15:29:05', '2017-0217', '3 Cheese Pizza', 195, 1, 195, 1, '2017-M-06', '0008', 'Paid', 'Dine_In'),
(414, '2017-08-13 15:29:05', '2017-0217', 'Pesto Chicken', 145, 1, 145, 1, '2017-M-09', '0008', 'Paid', 'Dine_In'),
(415, '2017-08-13 15:29:05', '2017-0217', 'pesto', 100, 1, 100, 1, '2017-M-015', '0008', 'Cancel', 'Dine_In'),
(416, '2017-08-13 15:43:34', '2017-0218', 'Spaghetti and Meatballs / Double Meatballs', 210, 1, 210, 1, '2017-M-012', '0008', 'Paid', 'Dine_In'),
(417, '2017-08-13 16:13:44', '2017-0219', 'Spaghetti and Meatballs / Double Meatballs', 210, 2, 420, 1, '2017-M-012', '0008', 'Paid', 'Dine_In'),
(418, '2017-08-13 16:13:44', '2017-0219', 'Garlic Toast', 50, 2, 100, 1, '2017-M-011', '0008', 'Paid', 'Dine_In'),
(419, '2017-08-13 16:13:44', '2017-0219', 'Meloi''s Quarter Pounder Single Patty', 150, 1, 150, 1, '2017-M-010', '0008', 'Paid', 'Dine_In'),
(420, '2017-08-13 16:13:44', '2017-0219', '3 Cheese Pizza', 195, 1, 195, 1, '2017-M-06', '0008', 'Paid', 'Dine_In'),
(421, '2017-08-13 16:13:44', '2017-0219', 'Baby Back Ribs 1 Rack', 400, 1, 400, 1, '2017-M-07', '0008', 'Paid', 'Dine_In'),
(422, '2017-08-13 16:13:44', '2017-0219', 'Fresh Juice', 40, 1, 40, 1, '2017-M-08', '0008', 'Paid', 'Dine_In'),
(423, '2017-08-13 16:13:44', '2017-0219', 'Pesto Chicken', 145, 2, 290, 1, '2017-M-09', '0008', 'Paid', 'Dine_In'),
(424, '2017-08-14 15:34:57', '2017-0220', 'Spaghetti and Meatballs / Double Meatballs', 210, 1, 210, 1, '2017-M-012', '0008', 'Paid', 'Dine_In'),
(425, '2017-08-14 15:34:57', '2017-0220', 'Garlic Toast', 50, 1, 50, 1, '2017-M-011', '0008', 'Paid', 'Dine_In'),
(426, '2017-08-14 15:34:57', '2017-0220', 'Meloi''s Quarter Pounder Single Patty', 150, 1, 150, 1, '2017-M-010', '0008', 'Paid', 'Dine_In'),
(427, '2017-08-14 15:35:12', '2017-0221', 'Spaghetti and Meatballs / Double Meatballs', 210, 1, 210, 1, '2017-M-012', '0008', 'Paid', 'Take_Out'),
(428, '2017-08-14 15:35:12', '2017-0221', 'Fresh Juice', 40, 1, 40, 1, '2017-M-08', '0008', 'Paid', 'Take_Out'),
(429, '2017-08-14 15:35:12', '2017-0221', 'Garlic Toast', 50, 1, 50, 1, '2017-M-011', '0008', 'Paid', 'Take_Out'),
(430, '2017-08-14 15:35:12', '2017-0221', 'Baby Back Ribs 1 Rack', 400, 1, 400, 1, '2017-M-07', '0008', 'Paid', 'Take_Out'),
(431, '2017-08-14 15:37:35', '2017-0222', 'Meloi''s Quarter Pounder Single Patty', 150, 1, 150, 1, '2017-M-010', '0008', 'Paid', 'Dine_In'),
(432, '2017-08-14 15:37:35', '2017-0222', '3 Cheese Pizza', 195, 1, 195, 1, '2017-M-06', '0008', 'Paid', 'Dine_In'),
(433, '2017-08-14 15:39:29', '2017-0223', 'Spaghetti and Meatballs / Double Meatballs', 210, 1, 210, 1, '2017-M-012', '0008', 'Paid', 'Dine_In'),
(434, '2017-08-14 15:39:30', '2017-0223', 'Fresh Juice', 40, 1, 40, 1, '2017-M-08', '0008', 'Paid', 'Dine_In'),
(435, '2017-08-14 15:39:30', '2017-0223', 'Baby Back Ribs 1 Rack', 400, 1, 400, 1, '2017-M-07', '0008', 'Paid', 'Dine_In'),
(436, '2017-08-14 15:40:41', '2017-0224', 'Meloi''s Quarter Pounder Single Patty', 150, 1, 150, 1, '2017-M-010', '0008', 'Paid', 'Take_Out'),
(437, '2017-08-14 15:40:41', '2017-0224', 'Baby Back Ribs 1 Rack', 400, 1, 400, 1, '2017-M-07', '0008', 'Paid', 'Take_Out'),
(438, '2017-08-14 15:40:41', '2017-0224', 'Pesto Chicken', 145, 1, 145, 1, '2017-M-09', '0008', 'Paid', 'Take_Out'),
(439, '2017-08-14 15:40:41', '2017-0224', '3 Cheese Pizza', 195, 1, 195, 1, '2017-M-06', '0008', 'Paid', 'Take_Out'),
(440, '2017-08-14 15:42:27', '2017-0225', 'Baby Back Ribs 1 Rack', 400, 1, 400, 1, '2017-M-07', '0008', 'Paid', 'Dine_In'),
(441, '2017-08-14 15:42:27', '2017-0225', 'Garlic Toast', 50, 1, 50, 1, '2017-M-011', '0008', 'Paid', 'Dine_In'),
(442, '2017-08-14 15:44:33', '2017-0226', 'Garlic Toast', 50, 1, 50, 1, '2017-M-011', '0008', 'Paid', 'Take_Out'),
(443, '2017-08-14 15:44:34', '2017-0226', 'Meloi''s Quarter Pounder Single Patty', 150, 1, 150, 1, '2017-M-010', '0008', 'Paid', 'Take_Out'),
(444, '2017-08-14 15:46:01', '2017-0227', 'Spaghetti and Meatballs / Double Meatballs', 210, 1, 210, 1, '2017-M-012', '0008', 'Paid', 'Take_Out'),
(445, '2017-08-14 15:46:01', '2017-0227', 'Baby Back Ribs 1 Rack', 400, 1, 400, 1, '2017-M-07', '0008', 'Paid', 'Take_Out'),
(446, '2017-08-14 15:48:23', '2017-0228', 'Baby Back Ribs 1 Rack', 400, 1, 400, 1, '2017-M-07', '0008', 'Paid', 'Dine_In'),
(447, '2017-08-14 15:50:05', '2017-0229', 'Baby Back Ribs 1 Rack', 400, 1, 400, 1, '2017-M-07', '0008', 'Paid', 'Dine_In'),
(448, '2017-08-14 15:50:51', '2017-0230', 'Meloi''s Quarter Pounder Single Patty', 150, 1, 150, 1, '2017-M-010', '0008', 'Paid', 'Dine_In'),
(449, '2017-08-14 15:51:02', '2017-0231', 'Meloi''s Quarter Pounder Single Patty', 150, 1, 150, 2, '2017-M-010', '0008', 'Paid', 'Dine_In'),
(450, '2017-08-14 15:52:59', '2017-0232', 'Spaghetti and Meatballs / Double Meatballs', 210, 1, 210, 4, '2017-M-012', '0008', 'Paid', 'Take_Out'),
(451, '2017-08-14 15:54:44', '2017-0233', 'Garlic Toast', 50, 1, 50, 1, '2017-M-011', '0008', 'Paid', 'Dine_In'),
(452, '2017-08-14 15:56:22', '2017-0234', 'Spaghetti and Meatballs / Double Meatballs', 210, 1, 210, 1, '2017-M-012', '0008', 'Paid', 'Take_Out'),
(453, '2017-08-14 15:57:36', '2017-0235', 'Baby Back Ribs 1 Rack', 400, 1, 400, 1, '2017-M-07', '0008', 'Paid', 'Dine_In'),
(454, '2017-08-14 15:58:46', '2017-0236', 'Spaghetti and Meatballs / Double Meatballs', 210, 1, 210, 1, '2017-M-012', '0008', 'Paid', 'Dine_In'),
(455, '2017-08-14 16:02:00', '2017-0237', 'Spaghetti and Meatballs / Double Meatballs', 210, 1, 210, 1, '2017-M-012', '0008', 'Paid', 'Dine_In'),
(456, '2017-08-14 16:07:26', '2017-0238', 'Spaghetti and Meatballs / Double Meatballs', 210, 1, 210, 1, '2017-M-012', '0008', 'Paid', 'Dine_In'),
(457, '2017-08-14 16:14:23', '2017-0239', 'Spaghetti and Meatballs / Double Meatballs', 210, 1, 210, 5, '2017-M-012', '0008', 'Paid', 'Dine_In'),
(458, '2017-08-14 16:14:23', '2017-0239', 'Baby Back Ribs 1 Rack', 400, 1, 400, 5, '2017-M-07', '0008', 'Paid', 'Dine_In'),
(459, '2017-08-14 16:33:20', '2017-0240', 'Garlic Toast', 50, 1, 50, 1, '2017-M-011', '0008', 'Paid', 'Take_Out'),
(460, '2017-08-14 16:39:12', '2017-0241', 'Garlic Toast', 50, 1, 50, 1, '2017-M-011', '0008', 'Paid', 'Take_Out'),
(461, '2017-08-14 16:44:09', '2017-0242', '3 Cheese Pizza', 195, 1, 195, 3, '2017-M-06', '0008', 'Paid', 'Dine_In'),
(462, '2017-08-16 14:00:20', '2017-0243', 'Garlic Toast', 50, 1, 50, 1, '2017-M-011', '0008', 'Paid', 'Dine_In'),
(463, '2017-08-16 14:00:20', '2017-0243', 'Baby Back Ribs 1 Rack', 400, 1, 400, 1, '2017-M-07', '0008', 'Paid', 'Dine_In'),
(464, '2017-08-18 07:39:00', '2017-0243', 'Pesto Chicken', 145, 1, 145, 1, '2017-M-09', '0006', 'Paid', 'Dine_In'),
(465, '2017-08-18 07:45:00', '2017-0243', 'Fresh Juice', 40, 1, 40, 1, '2017-M-08', '0006', 'Paid', 'Dine_In'),
(466, '2017-08-18 07:46:04', '2017-0244', 'Meloi''s Quarter Pounder Single Patty', 150, 1, 150, 3, '2017-M-010', '0006', 'Paid', 'DineIn'),
(467, '2017-08-18 07:46:04', '2017-0244', 'Garlic Toast', 50, 1, 50, 3, '2017-M-011', '0006', 'Paid', 'DineIn'),
(468, '2017-08-18 08:25:52', '2017-0245', 'Spaghetti and Meatballs / Double Meatballs', 210, 2, 420, 1, '2017-M-012', '0008', 'Paid', 'DineIn'),
(469, '2017-08-18 08:25:53', '2017-0245', 'Baby Back Ribs 1 Rack', 400, 1, 400, 1, '2017-M-07', '0008', 'Paid', 'DineIn'),
(471, '2017-08-18 08:53:46', '2017-0246', 'Spaghetti and Meatballs / Double Meatballs', 210, 1, 210, 1, '2017-M-012', '0008', 'Paid', 'TakeOut'),
(472, '2017-08-18 08:54:22', '2017-0247', 'Baby Back Ribs 1 Rack', 400, 1, 400, 1, '2017-M-07', '0008', 'Paid', 'TakeOut'),
(473, '2017-08-18 08:54:54', '2017-0248', 'Spaghetti and Meatballs / Double Meatballs', 210, 1, 210, 1, '2017-M-012', '0008', 'Paid', 'DineIn'),
(474, '2017-08-18 08:55:46', '2017-0249', 'Garlic Toast', 50, 1, 50, 2, '2017-M-011', '0008', 'Paid', 'TakeOut'),
(475, '2017-08-18 09:07:11', '2017-0250', 'Spaghetti and Meatballs / Double Meatballs', 210, 1, 210, 1, '2017-M-012', '0008', 'Paid', 'DineIn'),
(476, '2017-08-18 09:14:23', '2017-0251', 'Garlic Toast', 50, 1, 50, 1, '2017-M-011', '0008', 'Paid', 'DineIn'),
(477, '2017-08-18 09:14:23', '2017-0251', 'Meloi''s Quarter Pounder Single Patty', 150, 1, 150, 1, '2017-M-010', '0008', 'Paid', 'DineIn'),
(478, '2017-08-18 15:21:39', '2017-0252', 'Baby Back Ribs 1 Rack', 400, 1, 400, 1, '2017-M-07', '0008', 'Paid', 'Dine-In'),
(479, '2017-08-18 15:21:58', '2017-0253', 'Spaghetti and Meatballs / Double Meatballs', 210, 1, 210, 1, '2017-M-012', '0008', 'Paid', 'Take-Out'),
(480, '2017-08-18 15:28:00', '2017-0253', 'Meloi''s Quarter Pounder Single Patty', 150, 3, 450, 1, '2017-M-010', '0006', 'Paid', 'Take-Out'),
(481, '2017-08-18 15:28:00', '2017-0253', 'Fresh Juice', 40, 1, 40, 1, '2017-M-08', '0006', 'Paid', 'Take-Out'),
(482, '2017-08-18 15:31:00', '2017-0253', 'Garlic Toast', 50, 1, 50, 1, '2017-M-011', '0006', 'Paid', 'Take-Out'),
(483, '2017-08-18 15:36:29', '2017-0254', 'Spaghetti and Meatballs / Double Meatballs', 210, 1, 210, 3, '2017-M-012', '0008', 'Paid', 'Dine-In'),
(484, '2017-08-18 15:37:42', '2017-0255', 'Spaghetti and Meatballs / Double Meatballs', 210, 1, 210, 3, '2017-M-012', '0008', 'Paid', 'Take-Out'),
(485, '2017-08-18 15:38:15', '2017-0256', 'Baby Back Ribs 1 Rack', 400, 1, 400, 4, '2017-M-07', '0006', 'Paid', 'Dine-In'),
(486, '2017-08-18 15:38:15', '2017-0256', 'Spaghetti and Meatballs / Double Meatballs', 210, 1, 210, 4, '2017-M-012', '0006', 'Paid', 'Dine-In'),
(487, '2017-08-18 15:38:15', '2017-0256', 'Garlic Toast', 50, 1, 50, 4, '2017-M-011', '0006', 'Paid', 'Dine-In'),
(488, '2017-08-18 15:40:02', '2017-0257', 'Fresh Juice', 40, 2, 80, 2, '2017-M-08', '0006', 'Paid', 'Dine-In'),
(489, '2017-08-18 15:40:02', '2017-0257', 'Meloi''s Quarter Pounder Single Patty', 150, 1, 150, 2, '2017-M-010', '0006', 'Paid', 'Dine-In'),
(490, '2017-08-18 15:41:14', '2017-0258', 'Baby Back Ribs 1 Rack', 400, 1, 400, 1, '2017-M-07', '0006', 'Paid', 'Take-Out'),
(491, '2017-08-18 15:41:14', '2017-0258', 'Pesto Chicken', 145, 1, 145, 1, '2017-M-09', '0006', 'Paid', 'Take-Out'),
(492, '2017-08-18 15:41:14', '2017-0258', 'Fresh Juice', 40, 1, 40, 1, '2017-M-08', '0006', 'Paid', 'Take-Out'),
(493, '2017-08-18 16:12:46', '2017-0259', 'Meloi''s Quarter Pounder Single Patty', 150, 1, 150, 1, '2017-M-010', '0006', 'Paid', 'DineIn'),
(494, '2017-08-18 16:12:00', '2017-0259', 'Pesto Chicken', 145, 1, 145, 1, '2017-M-09', '0006', 'Paid', 'DineIn'),
(495, '2017-08-18 16:13:00', '2017-0259', '3 Cheese Pizza', 195, 1, 195, 1, '2017-M-06', '0006', 'Paid', 'DineIn'),
(496, '2017-08-18 16:15:06', '2017-0260', 'Spaghetti and Meatballs / Double Meatballs', 210, 1, 210, 1, '2017-M-012', '0008', 'Paid', 'DineIn'),
(497, '2017-08-20 06:49:52', '2017-0261', 'Garlic Toast', 50, 3, 150, 1, '2017-M-011', '0008', 'Paid', 'DineIn'),
(498, '2017-08-20 06:49:53', '2017-0261', 'Spaghetti and Meatballs / Double Meatballs', 210, 4, 840, 1, '2017-M-012', '0008', 'Paid', 'DineIn'),
(499, '2017-08-20 06:49:53', '2017-0261', 'Pesto Chicken', 145, 2, 290, 1, '2017-M-09', '0008', 'Paid', 'DineIn'),
(500, '2017-08-20 06:53:17', '2017-0262', 'Pesto Chicken', 145, 3, 435, 5, '2017-M-09', '0006', 'Paid', 'TakeOut'),
(501, '2017-08-20 06:57:48', '2017-0263', '3 Cheese Pizza', 195, 1, 195, 1, '2017-M-06', '0008', 'Cancel', 'TakeOut'),
(502, '2017-08-20 07:02:00', '2017-0263', 'Spaghetti and Meatballs / Double Meatballs', 210, 3, 630, 1, '2017-M-012', '0006', 'Cancel', 'TakeOut'),
(503, '2017-08-20 07:02:00', '2017-0263', 'Garlic Toast', 50, 3, 150, 1, '2017-M-011', '0006', 'Cancel', 'TakeOut'),
(504, '2017-08-20 11:02:10', '2017-0264', 'Meloi''s Quarter Pounder Single Patty', 150, 1, 150, 1, '2017-M-010', '0008', 'Paid', 'DineIn'),
(505, '2017-08-20 11:02:10', '2017-0264', '3 Cheese Pizza', 195, 1, 195, 1, '2017-M-06', '0008', 'Paid', 'DineIn'),
(506, '2017-08-20 11:02:11', '2017-0264', 'Baby Back Ribs 1 Rack', 400, 1, 400, 1, '2017-M-07', '0008', 'Paid', 'DineIn'),
(507, '2017-08-20 11:04:09', '2017-0265', 'Spaghetti and Meatballs / Double Meatballs', 180, 1, 180, 4, '2017-M-012', '0008', 'Paid', 'TakeOut'),
(508, '2017-08-20 11:04:09', '2017-0265', 'Meloi''s Quarter Pounder Single Patty', 150, 1, 150, 4, '2017-M-010', '0008', 'Paid', 'TakeOut'),
(509, '2017-08-20 11:04:09', '2017-0265', 'Baby Back Ribs 1 Rack', 400, 1, 400, 4, '2017-M-07', '0008', 'Paid', 'TakeOut'),
(510, '2017-08-20 11:09:29', '2017-0266', 'Meloi''s Quarter Pounder Single Patty', 150, 1, 150, 2, '2017-M-010', '0008', 'Paid', 'DineIn'),
(511, '2017-08-20 11:09:31', '2017-0266', 'Baby Back Ribs 1 Rack', 400, 1, 400, 2, '2017-M-07', '0008', 'Paid', 'DineIn'),
(512, '2017-08-20 11:09:32', '2017-0266', 'Garlic Toast', 50, 1, 50, 2, '2017-M-011', '0008', 'Paid', 'DineIn'),
(513, '2017-08-20 11:09:32', '2017-0266', 'Spaghetti and Meatballs / Double Meatballs', 180, 1, 180, 2, '2017-M-012', '0008', 'Paid', 'DineIn'),
(514, '2017-08-20 11:09:33', '2017-0266', 'Fresh Juice', 40, 1, 40, 2, '2017-M-08', '0008', 'Paid', 'DineIn'),
(515, '2017-08-20 11:09:34', '2017-0266', '3 Cheese Pizza', 195, 1, 195, 2, '2017-M-06', '0008', 'Paid', 'DineIn'),
(516, '2017-08-20 11:09:34', '2017-0266', 'Pesto Chicken', 145, 1, 145, 2, '2017-M-09', '0008', 'Paid', 'DineIn'),
(517, '2017-08-20 11:14:25', '2017-0267', 'Garlic Toast', 50, 1, 50, 4, '2017-M-011', '0008', 'Paid', 'TakeOut'),
(518, '2017-08-20 11:14:26', '2017-0267', 'Meloi''s Quarter Pounder Single Patty', 150, 1, 150, 4, '2017-M-010', '0008', 'Paid', 'TakeOut'),
(519, '2017-08-20 11:14:26', '2017-0267', 'Fresh Juice', 40, 1, 40, 4, '2017-M-08', '0008', 'Paid', 'TakeOut'),
(520, '2017-08-20 11:14:26', '2017-0267', 'Baby Back Ribs 1 Rack', 400, 1, 400, 4, '2017-M-07', '0008', 'Paid', 'TakeOut'),
(521, '2017-08-20 11:55:10', '2017-0268', 'Meloi''s Quarter Pounder Single Patty', 150, 1, 150, 1, '2017-M-010', '0006', 'Paid', 'DineIn'),
(522, '2017-08-20 11:55:11', '2017-0268', 'Spaghetti and Meatballs / Double Meatballs', 180, 1, 180, 1, '2017-M-012', '0006', 'Paid', 'DineIn'),
(523, '2017-08-20 11:55:11', '2017-0268', '3 Cheese Pizza', 195, 1, 195, 1, '2017-M-06', '0006', 'Paid', 'DineIn'),
(524, '2017-08-20 11:55:11', '2017-0268', 'Baby Back Ribs 1 Rack', 400, 1, 400, 1, '2017-M-07', '0006', 'Paid', 'DineIn'),
(525, '2017-08-20 12:57:43', '2017-0269', 'Spaghetti and Meatballs / Double Meatballs', 180, 1, 180, 1, '2017-M-012', '0008', 'Paid', 'DineIn'),
(526, '2017-08-20 12:57:44', '2017-0269', 'Garlic Toast', 50, 1, 50, 1, '2017-M-011', '0008', 'Paid', 'DineIn'),
(527, '2017-08-20 12:57:44', '2017-0269', 'Meloi''s Quarter Pounder Single Patty', 150, 1, 150, 1, '2017-M-010', '0008', 'Paid', 'DineIn'),
(528, '2017-08-20 12:57:44', '2017-0269', 'Baby Back Ribs 1 Rack', 400, 1, 400, 1, '2017-M-07', '0008', 'Paid', 'DineIn'),
(529, '2017-08-20 14:37:53', '2017-0270', 'Meloi''s Quarter Pounder Single Patty', 150, 3, 450, 3, '2017-M-010', '0006', 'Paid', 'DineIn'),
(530, '2017-08-20 14:37:53', '2017-0270', 'Garlic Toast', 50, 2, 100, 3, '2017-M-011', '0006', 'Paid', 'DineIn'),
(531, '2017-08-20 14:38:00', '2017-0270', 'Baby Back Ribs 1 Rack', 400, 3, 1200, 3, '2017-M-07', '0006', 'Paid', 'DineIn'),
(532, '2017-08-20 14:41:00', '2017-0270', 'Fresh Juice', 40, 1, 40, 3, '2017-M-08', '0006', 'Paid', 'DineIn'),
(533, '2017-08-20 14:41:00', '2017-0270', 'Pesto Chicken', 145, 1, 145, 3, '2017-M-09', '0006', 'Paid', 'DineIn'),
(534, '2017-08-21 04:19:00', '2017-0271', 'Meloi''s Quarter Pounder Single Patty', 150, 1, 150, 1, '2017-M-010', '0006', 'Paid', 'Dine-In'),
(535, '2017-08-21 04:19:00', '2017-0271', 'Garlic Toast', 50, 1, 50, 1, '2017-M-011', '0006', 'Paid', 'Dine-In'),
(536, '2017-08-21 04:19:00', '2017-0271', 'Spaghetti and Meatballs / Double Meatballs', 180, 1, 180, 1, '2017-M-012', '0006', 'Paid', 'Dine-In'),
(537, '2017-08-21 04:30:02', '2017-0272', 'Garlic Toast', 50, 1, 50, 1, '2017-M-011', '00010', 'Paid', 'Dine-In'),
(538, '2017-08-21 04:56:19', '2017-0273', 'Spaghetti and Meatballs / Double Meatballs', 180, 1, 180, 1, '2017-M-012', '0006', 'Paid', 'Dine-In'),
(539, '2017-08-21 04:56:42', '2017-0274', 'Spaghetti and Meatballs / Double Meatballs', 180, 1, 180, 1, '2017-M-012', '00010', 'Paid', 'Dine-In'),
(540, '2017-08-21 05:21:55', '2017-0275', 'Garlic Toast', 50, 1, 50, 1, '2017-M-011', '00010', 'Paid', 'Dine-In'),
(541, '2017-12-06 11:33:50', '2017-0276', 'Spaghetti and Meatballs / Double Meatballs', 180, 1, 180, 1, '2017-M-012', '00010', 'Paid', 'Dine-In'),
(542, '2017-12-06 11:38:23', '2017-0277', 'Spaghetti and Meatballs / Double Meatballs', 180, 1, 180, 2, '2017-M-012', '00010', 'Paid', 'Take-Out'),
(543, '2017-12-06 11:38:23', '2017-0277', 'Garlic Toast', 50, 1, 50, 2, '2017-M-011', '00010', 'Paid', 'Take-Out'),
(544, '2017-12-06 11:38:52', '2017-0278', 'Meloi''s Quarter Pounder Single Patty', 150, 1, 150, 5, '2017-M-010', '00010', 'Paid', 'Dine-In'),
(545, '2017-12-06 11:38:52', '2017-0278', '3 Cheese Pizza', 195, 1, 195, 5, '2017-M-06', '00010', 'Paid', 'Dine-In'),
(546, '2017-12-06 11:38:52', '2017-0278', 'Baby Back Ribs 1 Rack', 400, 1, 400, 5, '2017-M-07', '00010', 'Paid', 'Dine-In'),
(547, '2017-12-06 11:54:26', '2017-0279', 'Meloi''s Quarter Pounder Single Patty', 150, 1, 150, 1, '2017-M-010', '00010', 'Paid', 'Dine-In'),
(548, '2017-12-06 11:54:26', '2017-0279', 'Garlic Toast', 50, 1, 50, 1, '2017-M-011', '00010', 'Paid', 'Dine-In'),
(549, '2017-12-06 12:00:38', '2017-0280', 'Spaghetti and Meatballs / Double Meatballs', 180, 2, 360, 1, '2017-M-012', '00010', 'Paid', 'Dine-In'),
(550, '2017-12-06 12:00:38', '2017-0280', 'Meloi''s Quarter Pounder Single Patty', 150, 6, 900, 1, '2017-M-010', '00010', 'Paid', 'Dine-In'),
(551, '2017-12-06 12:00:38', '2017-0280', 'Baby Back Ribs 1 Rack', 400, 1, 400, 1, '2017-M-07', '00010', 'Paid', 'Dine-In'),
(552, '2017-12-06 12:06:03', '2017-0281', 'Garlic Toast', 50, 11, 550, 5, '2017-M-011', '00010', 'Cancel', 'Dine-In'),
(553, '2017-12-06 12:07:00', '2017-0281', 'Pesto Chicken', 145, 5, 725, 5, '2017-M-09', '0006', 'Cancel', 'Dine-In'),
(554, '2017-12-06 12:07:00', '2017-0281', 'Garlic Toast', 50, 10, 500, 5, '2017-M-011', '0006', 'Paid', 'Dine-In'),
(555, '2017-12-06 12:21:13', '2017-0282', 'Meloi''s Quarter Pounder Single Patty', 150, 10, 1500, 4, '2017-M-010', '00014', 'Paid', 'Take-Out'),
(556, '2017-12-06 12:21:14', '2017-0282', 'Spaghetti and Meatballs / Double Meatballs', 180, 10, 1800, 4, '2017-M-012', '00014', 'Cancel', 'Take-Out'),
(557, '2017-12-06 12:21:14', '2017-0282', '3 Cheese Pizza', 195, 1, 195, 4, '2017-M-06', '00014', 'Cancel', 'Take-Out'),
(558, '2017-12-06 12:22:02', '2017-0283', 'Meloi''s Quarter Pounder Single Patty', 150, 1, 150, 3, '2017-M-010', '00014', 'Paid', 'Take-Out'),
(559, '2017-12-06 12:22:02', '2017-0283', 'Spaghetti and Meatballs / Double Meatballs', 180, 1, 180, 3, '2017-M-012', '00014', 'Paid', 'Take-Out'),
(560, '2017-12-06 12:22:02', '2017-0283', 'Fresh Juice', 40, 1, 40, 3, '2017-M-08', '00014', 'Paid', 'Take-Out'),
(561, '2017-12-12 05:57:03', '2017-0284', 'Garlic Toast', 50, 2, 100, 1, '2017-M-011', '00010', 'Paid', 'Take-Out'),
(562, '2017-12-12 05:57:03', '2017-0284', 'Spaghetti and Meatballs / Double Meatballs', 180, 1, 180, 1, '2017-M-012', '00010', 'Paid', 'Take-Out'),
(563, '2018-01-08 11:31:00', '2017-0282', 'Pesto Chicken', 145, 2, 290, 4, '2017-M-09', '0007', 'Cancel', 'Take-Out'),
(564, '2018-01-08 11:31:00', '2017-0282', 'Fresh Juice', 40, 2, 80, 4, '2017-M-08', '0007', 'Cancel', 'Take-Out'),
(565, '2018-03-18 23:04:16', '2017-0285', 'Spaghetti and Meatballs / Double Meatballs', 180, 1, 180, 1, '2017-M-012', '0006', 'Paid', 'Dine-In'),
(566, '2018-03-18 23:04:16', '2017-0285', 'Pesto Chicken', 145, 1, 145, 1, '2017-M-09', '0006', 'Paid', 'Dine-In'),
(567, '2018-03-18 23:04:00', '2017-0285', '3 Cheese Pizza', 195, 1, 195, 1, '2017-M-06', '0006', 'Paid', 'Dine-In'),
(568, '2018-03-18 23:04:00', '2017-0285', 'Meloi''s Quarter Pounder Single Patty', 150, 2, 300, 1, '2017-M-010', '0006', 'Paid', 'Dine-In'),
(569, '2018-03-18 23:07:56', '2017-0286', 'Spaghetti and Meatballs / Double Meatballs', 180, 2, 360, 1, '2017-M-012', '00010', 'Paid', 'Dine-In'),
(570, '2018-03-18 23:08:24', '2017-0287', 'Garlic Toast', 50, 3, 150, 1, '2017-M-011', '00010', 'Paid', 'Take-Out'),
(571, '2018-03-18 23:08:32', '2017-0288', '3 Cheese Pizza', 195, 1, 195, 1, '2017-M-06', '00010', 'Cancel', 'Dine-In'),
(572, '2018-03-18 23:13:48', '2017-0289', 'Spaghetti and Meatballs / Double Meatballs', 180, 3, 540, 1, '2017-M-012', '00010', 'Paid', 'Take-Out'),
(573, '2018-03-18 23:50:31', '2017-0290', 'Spaghetti and Meatballs / Double Meatballs', 180, 2, 360, 1, '2017-M-012', '00010', 'Cancel', 'Dine-In'),
(574, '2018-03-20 13:17:50', '2017-0291', 'Spaghetti and Meatballs / Double Meatballs', 180, 2, 360, 1, '2017-M-012', '0007', 'Paid', 'Dine-In'),
(575, '2018-03-20 13:17:51', '2017-0291', 'Pesto Chicken', 145, 2, 290, 1, '2017-M-09', '0007', 'Paid', 'Dine-In'),
(576, '2018-03-20 13:21:34', '2017-0292', 'Spaghetti and Meatballs / Double Meatballs', 180, 1, 180, 1, '2017-M-012', '0007', 'Paid', 'Dine-In'),
(577, '2018-03-20 13:24:11', '2017-0293', '3 Cheese Pizza', 195, 1, 195, 1, '2017-M-06', '0007', 'Paid', 'Dine-In'),
(578, '2018-03-20 13:33:32', '2017-0294', 'Spaghetti and Meatballs / Double Meatballs', 180, 1, 180, 1, '2017-M-012', '0007', 'Paid', 'Dine-In'),
(579, '2018-03-20 13:33:32', '2017-0294', 'Pesto Chicken', 145, 1, 145, 1, '2017-M-09', '0007', 'Paid', 'Dine-In'),
(580, '2018-03-20 13:58:05', '2017-0295', '3 Cheese Pizza', 195, 1, 195, 1, '2017-M-06', '0007', 'Paid', 'Dine-In'),
(581, '2018-03-20 14:24:10', '2017-0296', 'Spaghetti and Meatballs / Double Meatballs', 180, 5, 900, 1, '2017-M-012', '00010', 'Cancel', 'Dine-In'),
(582, '2018-03-20 14:25:00', '2017-0296', '3 Cheese Pizza', 195, 2, 390, 1, '2017-M-06', '0007', 'Cancel', 'Dine-In'),
(583, '2018-03-20 14:54:00', '2017-0296', 'Baby Back Ribs 1 Rack', 400, 1, 400, 1, '2017-M-07', '0007', 'Cancel', 'Dine-In'),
(584, '2018-03-20 14:54:00', '2017-0296', 'Pesto Chicken', 145, 1, 145, 1, '2017-M-09', '0007', 'Paid', 'Dine-In'),
(585, '2018-03-20 14:54:00', '2017-0296', 'Garlic Toast', 50, 1, 50, 1, '2017-M-011', '0007', 'Cancel', 'Dine-In'),
(586, '2018-03-20 14:54:55', '2017-0297', 'Spaghetti and Meatballs / Double Meatballs', 180, 3, 540, 1, '2017-M-012', '00010', 'Cancel', 'Take-Out'),
(587, '2018-03-20 14:55:00', '2017-0297', 'Garlic Toast', 50, 1, 50, 1, '2017-M-011', '0007', 'Cancel', 'Take-Out'),
(588, '2018-03-20 15:17:23', '2017-0298', 'Baby Back Ribs 1 Rack', 400, 2, 800, 3, '2017-M-07', '00010', 'Cancel', 'Dine-In'),
(589, '2018-03-20 15:17:32', '2017-0299', 'Garlic Toast', 50, 1, 50, 1, '2017-M-011', '00010', 'Paid', 'Take-Out'),
(590, '2018-03-25 08:49:00', '2017-0298', 'Pesto Chicken', 145, 18, 2610, 3, '2017-M-09', '', 'Paid', 'Dine-In'),
(591, '2018-03-25 08:49:00', '2017-0298', 'Spaghetti and Meatballs / Double Meatballs', 180, 14, 2520, 3, '2017-M-012', '', 'Paid', 'Dine-In'),
(592, '2018-03-25 08:49:00', '2017-0298', 'Fresh Juice', 40, 4, 160, 3, '2017-M-08', '', 'Paid', 'Dine-In'),
(593, '2018-03-25 08:50:00', '2017-0298', '3 Cheese Pizza', 195, 3, 585, 3, '2017-M-06', '00010', 'Cancel', 'Dine-In'),
(594, '2018-03-25 08:50:00', '2017-0298', 'Meloi''s Quarter Pounder Single Patty', 150, 2, 300, 3, '2017-M-010', '00010', 'Cancel', 'Dine-In'),
(595, '2018-03-25 08:51:00', '2017-0298', 'Garlic Toast', 50, 4, 200, 3, '2017-M-011', '00010', 'Cancel', 'Dine-In'),
(596, '2018-03-25 08:54:00', '2017-0298', 'Meloi''s Quarter Pounder Single Patty', 150, 1, 150, 3, '2017-M-010', '00010', 'Paid', 'Dine-In'),
(597, '2018-03-25 08:54:00', '2017-0298', 'Baby Back Ribs 1 Rack', 400, 1, 400, 3, '2017-M-07', '00010', 'Paid', 'Dine-In'),
(598, '2018-03-25 08:54:37', '2017-0300', 'Spaghetti and Meatballs / Double Meatballs', 180, 15, 2700, 2, '2017-M-012', '00010', 'Cancel', 'Take-Out'),
(599, '2018-03-25 08:54:37', '2017-0300', 'Meloi''s Quarter Pounder Single Patty', 150, 1, 150, 2, '2017-M-010', '00010', 'Cancel', 'Take-Out'),
(600, '2018-03-25 08:54:37', '2017-0300', 'Pesto Chicken', 145, 6, 870, 2, '2017-M-09', '00010', 'Cancel', 'Take-Out'),
(601, '2018-03-25 08:55:00', '2017-0300', 'Spaghetti and Meatballs / Double Meatballs', 180, 1, 180, 2, '2017-M-012', '00010', 'Cancel', 'Take-Out'),
(602, '2018-03-25 08:55:00', '2017-0300', 'Pesto Chicken', 145, 6, 870, 2, '2017-M-09', '00010', 'Cancel', 'Take-Out'),
(603, '2018-04-14 08:51:00', '2017-0299', 'Baby Back Ribs 1 Rack', 400, 2, 800, 1, '2017-M-07', '0007', 'Paid', 'Take-Out'),
(604, '2018-04-14 09:36:00', '2017-0296', 'Garlic Toast', 50, 1, 50, 1, '2017-M-011', '0007', 'Paid', 'Dine-In'),
(605, '2018-04-14 09:44:50', '2017-0301', 'Spaghetti and Meatballs / Double Meatballs', 180, 1, 180, 1, '2017-M-012', '0007', 'Paid', 'Dine-In'),
(606, '2018-04-14 09:44:50', '2017-0301', 'Pesto Chicken', 145, 2, 290, 1, '2017-M-09', '0007', 'Paid', 'Dine-In'),
(607, '2018-04-14 09:47:15', '2017-0302', 'Spaghetti and Meatballs / Double Meatballs', 180, 1, 180, 1, '2017-M-012', '0007', 'Paid', 'Dine-In'),
(608, '2018-04-14 09:47:15', '2017-0302', 'Baby Back Ribs 1 Rack', 400, 2, 800, 1, '2017-M-07', '0007', 'Paid', 'Dine-In'),
(609, '2018-04-14 09:58:36', '0303', 'Spaghetti and Meatballs / Double Meatballs', 180, 1, 180, 1, '2017-M-012', '0007', 'Cancel', 'Dine-In'),
(610, '2018-04-14 09:59:49', '2018 - 0304', 'Spaghetti and Meatballs / Double Meatballs', 180, 1, 180, 2, '2017-M-012', '0007', 'Cancel', 'Dine-In'),
(611, '2018-04-14 10:00:14', '2018-0305', 'Spaghetti and Meatballs / Double Meatballs', 180, 1, 180, 3, '2017-M-012', '0007', 'Paid', 'Dine-In'),
(612, '2018-04-14 10:04:51', '2018-0306', 'Fresh Juice', 40, 1, 40, 3, '2017-M-08', '0007', 'Cancel', 'Dine-In'),
(613, '2018-04-14 10:04:51', '2018-0306', 'Spaghetti and Meatballs / Double Meatballs', 180, 1, 180, 3, '2017-M-012', '0007', 'Cancel', 'Dine-In'),
(614, '2018-04-14 10:06:47', '2018-0307', 'Fresh Juice', 40, 1, 40, 3, '2017-M-08', '0007', 'Cancel', 'DineIn'),
(615, '2018-04-14 10:06:00', '2018-0307', 'Pesto Chicken', 145, 1, 145, 3, '2017-M-09', '0007', 'Cancel', 'DineIn'),
(616, '2018-04-14 10:06:00', '2018-0307', 'Baby Back Ribs 1 Rack', 400, 1, 400, 3, '2017-M-07', '0007', 'Cancel', 'DineIn'),
(617, '2018-04-17 09:14:16', '2018-0308', 'Spaghetti and Meatballs / Double Meatballs', 180, 1, 180, 3, '2017-M-012', '0007', 'Paid', 'DineIn'),
(618, '2018-04-17 09:14:16', '2018-0308', 'Fresh Juice', 40, 1, 40, 3, '2017-M-08', '0007', 'Paid', 'DineIn'),
(619, '2018-04-17 09:14:16', '2018-0308', 'Baby Back Ribs 1 Rack', 400, 1, 400, 3, '2017-M-07', '0007', 'Paid', 'DineIn'),
(620, '2018-04-18 05:09:49', '2018-0309', 'Spaghetti and Meatballs / Double Meatballs', 180, 1, 180, 2, '2017-M-012', '0007', 'Paid', 'DineIn'),
(621, '2018-04-18 05:32:27', '2018-0310', 'Spaghetti and Meatballs / Double Meatballs', 180, 2, 360, 1, '2017-M-012', '0007', 'Paid', 'DineIn'),
(622, '2018-04-18 05:42:00', '2018-0310', 'Pesto Chicken', 145, 1, 145, 1, '2017-M-09', '0007', 'Paid', 'DineIn'),
(623, '2018-04-18 05:56:47', '0311', 'Spaghetti and Meatballs / Double Meatballs', 180, 6, 1080, 1, '2017-M-012', '00010', 'Cancel', 'Take-Out'),
(624, '2018-04-18 09:25:00', '0311', 'Pesto Chicken', 145, 3, 435, 1, '2017-M-09', '0007', 'Cancel', 'Take-Out'),
(625, '2018-04-18 16:28:51', '2018-0312', 'Garlic Toast', 50, 4, 200, 2, '2017-M-011', '00010', 'Cancel', 'Dine-In'),
(626, '2018-04-18 16:29:08', '2018-0313', 'Spaghetti and Meatballs / Double Meatballs', 180, 1, 180, 3, '2017-M-012', '00010', 'Paid', 'Take-Out'),
(627, '2018-04-22 20:10:00', '0311', '3 Cheese Pizza', 195, 1, 195, 1, '2017-M-06', '0007', 'Cancel', 'Take-Out'),
(628, '2018-05-21 07:29:05', '2018-0314', 'Spaghetti and Meatballs / Double Meatballs', 180, 1, 180, 1, '2017-M-012', '00018', 'Pending', 'Dine-In'),
(629, '2018-05-21 07:29:18', '2018-0315', 'Pesto Chicken', 145, 1, 145, 2, '2017-M-09', '00018', 'Pending', 'Dine-In'),
(630, '2018-05-21 07:30:50', '2018-0316', 'Spaghetti and Meatballs / Double Meatballs', 180, 1, 180, 3, '2017-M-012', '00018', 'Pending', 'Dine-In'),
(631, '2018-05-21 07:30:50', '2018-0316', 'Pesto Chicken', 145, 1, 145, 3, '2017-M-09', '00018', 'Pending', 'Dine-In'),
(632, '2018-05-21 07:31:23', '2018-0317', 'Spaghetti and Meatballs / Double Meatballs', 180, 1, 180, 4, '2017-M-012', '0007', 'Paid', 'Dine-In'),
(633, '2018-05-21 07:31:23', '2018-0317', 'Pesto Chicken', 145, 2, 290, 4, '2017-M-09', '0007', 'Paid', 'Dine-In'),
(634, '2018-05-21 07:43:28', '2018-0318', 'Pesto Chicken', 145, 1, 145, 4, '2017-M-09', '0007', 'Paid', 'Dine-In'),
(635, '2018-05-26 07:15:16', '2018-0319', 'Pesto Chicken', 145, 1, 145, 4, '2017-M-09', '0007', 'Paid', 'Dine-In');

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
(1, '2017-0301', '2018-04-14 09:45:00', 470, 20, 376, 500, 124, 'Administrator', '201799', 1, 'Dine-In', ''),
(2, '2017-0302', '2018-04-14 09:47:00', 980, 20, 784, 1000, 216, 'Administrator', '2017100', 1, 'Dine-In', ''),
(3, '2018-0305', '2018-04-14 10:00:00', 180, 20, 144, 444, 300, 'Administrator', '2017101', 3, 'Dine-In', ''),
(4, '2018-0308', '2018-04-17 09:14:00', 620, 20, 496, 500, 4, 'Administrator', '2017102', 3, 'DineIn', ''),
(5, '2018-0309', '2018-04-18 05:10:00', 180, 20, 144, 500, 356, 'Administrator', '2017103', 2, 'DineIn', ''),
(6, '2018-0310', '2018-04-18 05:47:00', 505, 101, 404, 500, 96, 'Administrator', '2017104', 1, 'DineIn', ''),
(7, '2018-0313', '2018-04-18 16:29:00', 180, 36, 144, 300, 156, 'Administrator', '2017105', 3, 'Take-Out', ''),
(8, '2018-0317', '2018-05-21 07:31:00', 470, 83.928571428571, 335.71428571428567, 500, 164.29, 'Administrator', '2017106', 4, 'Dine-In', ''),
(9, '2018-0318', '2018-05-21 07:49:00', 145, 25.892857142857, 103.57142857142856, 200, 96.43, 'Administrator', '2017107', 4, 'Dine-In', ''),
(10, '2018-0319', '2018-05-26 07:52:00', 145, 51.785714285714, 77.67857142857142, 100, 22.32, 'JANO ', '2017108', 4, 'Dine-In', '123123123');

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
(6, 2, '', '2018-05-21', '01:29 PM', 'Occupied'),
(7, 1, '', '2018-05-21', '01:29 PM', 'Occupied'),
(16, 3, 'asdas', '2018-05-21', '01:30 PM', 'Occupied'),
(17, 4, '', '2018-05-26', '01:15 PM', 'Available'),
(18, 5, '', '0000-00-00', '', 'Available'),
(19, 6, '', '0000-00-00', '', 'Available'),
(20, 7, '', '0000-00-00', '', 'Available'),
(21, 8, '', '0000-00-00', '', 'Available');

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
(1, 'meloi''s Plaza CafÃ©', '24hrs.');

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
('00010', 'Mark Guilot', 'waiter1', '2927b4649cf4307f990009a16d33a38ceea4c866', 'Waiter'),
('00014', 'Rhea S. Calvo', 'waiter2', '78c37ed1a914e7d544d18bafbe533ffbc710a286', 'Waiter'),
('00015', 'Jiggy Anthony V. Alteros', 'waiter3', '2dda784cf25c5a8cbbe11c60e8fb777f7c897dd5', 'Waiter'),
('00016', 'Jennie Faith Joy Y. Resano', 'waiter4', '65fe0fa368590c720491b848829e4c8c8e15c9e9', 'Waiter'),
('0006', 'Jayson Cayao', 'cashier1', '2f22765d04931a078909145ca628d2264c852d7d', 'Cashier'),
('0007', 'Administrator', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator');
