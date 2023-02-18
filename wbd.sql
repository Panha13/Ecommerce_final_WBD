-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 18, 2023 at 07:32 AM
-- Server version: 5.7.40
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advertise`
--

DROP TABLE IF EXISTS `tbl_advertise`;
CREATE TABLE IF NOT EXISTS `tbl_advertise` (
  `ads_id` int(11) NOT NULL AUTO_INCREMENT,
  `ads_name` varchar(50) DEFAULT NULL,
  `ads_des` varchar(255) DEFAULT NULL,
  `ads_price` double DEFAULT NULL,
  `ads_img` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `ordernum` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`ads_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_advertise`
--

INSERT INTO `tbl_advertise` (`ads_id`, `ads_name`, `ads_des`, `ads_price`, `ads_img`, `link`, `ordernum`, `active`) VALUES
(51, '1', '1', 1, '1675918023492.jpg', '1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

DROP TABLE IF EXISTS `tbl_brand`;
CREATE TABLE IF NOT EXISTS `tbl_brand` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(50) DEFAULT NULL,
  `brand_des` varchar(255) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `ordernum` int(11) DEFAULT NULL,
  PRIMARY KEY (`brand_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_des`, `active`, `ordernum`) VALUES
(2, 'Nvidia', 'Nvidia', 1, 2),
(11, '1', '1', 1, 3),
(12, '2', '2', 1, 3),
(13, '3', '3', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(50) DEFAULT NULL,
  `cate_des` varchar(255) DEFAULT NULL,
  `active` int(255) DEFAULT NULL,
  `ordernum` int(11) DEFAULT NULL,
  PRIMARY KEY (`cate_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cate_id`, `cate_name`, `cate_des`, `active`, `ordernum`) VALUES
(26, 'dsaf', 'asdf', 1, 3),
(28, '21', 'dsf', 1, 2),
(29, 'sdfsadf', 'sdfasdf', 1, 5),
(30, '1', '1', 1, 4),
(31, '2', '2', 1, 5),
(32, '3', '3', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(50) DEFAULT NULL,
  `prod_des` varchar(255) DEFAULT NULL,
  `prod_instock` int(11) DEFAULT NULL,
  `prod_price` double DEFAULT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `prod_img` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `ordernum` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`prod_id`) USING BTREE,
  KEY `cate_id` (`cate_id`),
  KEY `brand_id` (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`prod_id`, `prod_name`, `prod_des`, `prod_instock`, `prod_price`, `cate_id`, `brand_id`, `prod_img`, `link`, `ordernum`, `active`) VALUES
(44, 'werwer', 'asdfsadf', 100, 20, 28, 12, '1675864706690.jpg', '#sadf', 1, 0),
(46, '1', '1', 1, 1, 26, 2, '1675869843462.jpg', '1', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slideshow`
--

DROP TABLE IF EXISTS `tbl_slideshow`;
CREATE TABLE IF NOT EXISTS `tbl_slideshow` (
  `slide_id` int(11) NOT NULL AUTO_INCREMENT,
  `slide_name` varchar(50) DEFAULT NULL,
  `slide_des` varchar(255) DEFAULT NULL,
  `slide_price` double DEFAULT NULL,
  `slide_img` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `ordernum` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`slide_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_slideshow`
--

INSERT INTO `tbl_slideshow` (`slide_id`, `slide_name`, `slide_des`, `slide_price`, `slide_img`, `link`, `ordernum`, `active`) VALUES
(47, '3', '3', 3, '1675916354941.jpg', '3', 2, 1),
(48, '2', '2', 2, '1675916378087.jpg', '2', 1, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `tbl_category` (`cate_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_product_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `tbl_brand` (`brand_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
