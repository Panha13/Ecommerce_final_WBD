-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 15, 2023 at 03:12 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

drop database if exists `ecomweb`;
create database IF NOT EXISTS `ecomweb`;
use ecomweb;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladvertisement`
--

DROP TABLE IF EXISTS `tbladvertisement`;
CREATE TABLE IF NOT EXISTS `tbladvertisement` (
  `ads_id` int NOT NULL,
  `ads_desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ads_id`)
) ;

-- --------------------------------------------------------

--
-- Table structure for table `tblbrand`
--

DROP TABLE IF EXISTS `tblbrand`;
CREATE TABLE IF NOT EXISTS `tblbrand` (
  `brand_id` int NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`brand_id`) USING BTREE
) ;

--
-- Dumping data for table `tblbrand`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

DROP TABLE IF EXISTS `tblcart`;
CREATE TABLE IF NOT EXISTS `tblcart` (
  `cart_id` int NOT NULL,
  `pro_id` int NOT NULL,
  `prize` varchar(255) NOT NULL,
  `qty` int NOT NULL,
  `subtotal` varchar(255) NOT NULL,
  PRIMARY KEY (`cart_id`) USING BTREE,
  KEY `pro_id` (`pro_id`)
) ;

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

DROP TABLE IF EXISTS `tblcategory`;
CREATE TABLE IF NOT EXISTS `tblcategory` (
  `cat_id` int NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cat_id`) USING BTREE
) ;

-- --------------------------------------------------------

--
-- Table structure for table `tblconfiguration`
--

DROP TABLE IF EXISTS `tblconfiguration`;
CREATE TABLE IF NOT EXISTS `tblconfiguration` (
  `config_id` int NOT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`config_id`)
) ;

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

DROP TABLE IF EXISTS `tblcustomer`;
CREATE TABLE IF NOT EXISTS `tblcustomer` (
  `cus_id` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  PRIMARY KEY (`cus_id`)
) ;

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

DROP TABLE IF EXISTS `tblemployees`;
CREATE TABLE IF NOT EXISTS `tblemployees` (
  `em_id` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `hire_date` datetime NOT NULL,
  PRIMARY KEY (`em_id`)
) ;

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

DROP TABLE IF EXISTS `tblorder`;
CREATE TABLE IF NOT EXISTS `tblorder` (
  `ord_id` int NOT NULL,
  `cus_id` int NOT NULL,
  `ord_date` datetime NOT NULL,
  `orderde_id` int NOT NULL,
  PRIMARY KEY (`ord_id`),
  KEY `cus_id` (`cus_id`),
  KEY `orderde_id` (`orderde_id`)
) ;

-- --------------------------------------------------------

--
-- Table structure for table `tblorder_detail`
--

DROP TABLE IF EXISTS `tblorder_detail`;
CREATE TABLE IF NOT EXISTS `tblorder_detail` (
  `ord_id` int NOT NULL,
  `prod_id` int NOT NULL,
  `qty` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `payment_id` int NOT NULL,
  `shipping_id` int NOT NULL,
  PRIMARY KEY (`ord_id`),
  KEY `prod_id` (`prod_id`),
  KEY `shipping_id` (`shipping_id`),
  KEY `payment_id` (`payment_id`)
) ;

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

DROP TABLE IF EXISTS `tblpage`;
CREATE TABLE IF NOT EXISTS `tblpage` (
  `page_id` int NOT NULL,
  PRIMARY KEY (`page_id`)
) ;

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

DROP TABLE IF EXISTS `tblproduct`;
CREATE TABLE IF NOT EXISTS `tblproduct` (
  `pro_id` int NOT NULL,
  `titile` varchar(255) DEFAULT NULL,
  `brand_id` int DEFAULT NULL,
  `cat_id` int DEFAULT NULL,
  PRIMARY KEY (`pro_id`),
  KEY `cat_id` (`cat_id`),
  KEY `brand_id` (`brand_id`)
) ;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`pro_id`, `titile`, `brand_id`, `cat_id`) VALUES
(1, '12pro', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct_detail`
--

DROP TABLE IF EXISTS `tblproduct_detail`;
CREATE TABLE IF NOT EXISTS `tblproduct_detail` (
  `prod_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtile` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `size` double NOT NULL,
  `qty` int NOT NULL,
  `profile_img` varchar(255) NOT NULL,
  PRIMARY KEY (`prod_id`) USING BTREE
) ;

-- --------------------------------------------------------

--
-- Table structure for table `tblshipping`
--

DROP TABLE IF EXISTS `tblshipping`;
CREATE TABLE IF NOT EXISTS `tblshipping` (
  `shipping_id` int NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `Zipcode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`shipping_id`) USING BTREE
) ;

-- --------------------------------------------------------

--
-- Table structure for table `tblslideshow`
--

DROP TABLE IF EXISTS `tblslideshow`;
CREATE TABLE IF NOT EXISTS `tblslideshow` (
  `ssid` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `active` varchar(255) NOT NULL,
  `ordernum` int NOT NULL,
  PRIMARY KEY (`ssid`) USING BTREE
) ;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE IF NOT EXISTS `tbluser` (
  `user_id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `em_id` int NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `em_id` (`em_id`)
) ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

DROP TABLE IF EXISTS `tbl_payment`;
CREATE TABLE IF NOT EXISTS `tbl_payment` (
  `payment_id` int NOT NULL,
  `orderde_id` int NOT NULL,
  `amount` varchar(255) NOT NULL,
  `payment_method_id` int NOT NULL,
  `payement_date` datetime NOT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `payment_method_id` (`payment_method_id`)
) ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_method`
--

DROP TABLE IF EXISTS `tbl_payment_method`;
CREATE TABLE IF NOT EXISTS `tbl_payment_method` (
  `id` int NOT NULL,
  `cus_id` int NOT NULL,
  `method` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `cuurency` varchar(255) NOT NULL,
  `account_number` int NOT NULL,
  `expiry_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cus_id` (`cus_id`)
) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
