-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 20, 2023 at 06:30 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

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
(2, 'MSI', '', 1, 2),
(11, 'Asus', '', 1, 3),
(12, 'Lenvo', '', 1, 3),
(13, 'MacBook', '', 1, 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cate_id`, `cate_name`, `cate_des`, `active`, `ordernum`) VALUES
(26, 'Monitor', '', 1, 3),
(28, 'Laptop', '', 1, 2),
(35, 'Mouse', '', 1, 3),
(36, 'KeyBoard', '', 1, 4),
(37, 'Ram', '', 1, 5),
(38, 'Power Supply', '', 1, 6);

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
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`prod_id`, `prod_name`, `prod_des`, `prod_instock`, `prod_price`, `cate_id`, `brand_id`, `prod_img`, `link`, `ordernum`, `active`) VALUES
(46, 'MSI GE76 Raider', 'Brand	MSI\r\nSeries	GE76 Raider 11UH-053\r\nScreen Size	17.3 Inches\r\nColor	Titanium Blue\r\nCPU Model	Core i9\r\nRam Memory Installed Size	32 GB', 25, 3399, 28, 2, '1676785376787.jpg', '#sadf', 1, 1),
(47, 'MSI GE76 Raider 17.3', 'Brand	MSI\r\nSeries	GE76 Raider 11UH-245\r\nScreen Size	17.3 Inches\r\nColor	Titanium Blue\r\nHard Disk Size	1 TB\r\nCPU Model	Core i7 Family\r\nRam Memory Installed Size	32 GB', 25, 3049, 28, 2, '1676785484074.jpg', '#sadf', 2, 1),
(48, 'MSI Titan GT77', '17.3\" UHD 120Hz Gaming Laptop: Intel Core i7-12800HX RTX 3070 Ti 32GB DDR5 1TB NVMe SSD, Thunderbolt 4, USB-Type C, Cooler Boost Titan, Win11 Pro: Core Black 12UGS-009', 25, 2599, 28, 2, '1676785859792.png', '#sadf', 3, 1),
(49, 'MSI Katana GF66', 'MSI Katana GF66 15.6\" 144Hz FHD Gaming Laptop: Intel Core i7-12650H RTX 3050 Ti 16GB 512GB NVMe SSD, Type-C USB 3.2 Gen 1, High-ResoluTion Audio, Cooler Boost 5, Win11 Home: Black 12UD-436', 25, 788, 28, 2, '1676786010480.png', '#sadf', 4, 1),
(50, 'MSI Computer GF63', 'MSI Computer GF63, NVIDIA GeForce GTX 1650 Graphics, 15.6\" 8GB 256GB Intel Core i5-10300H X4 2.5GHz Win10, Black', 25, 595, 28, 2, '1676786120130.jpg', '#sadf', 5, 1),
(51, 'ASUS ROG Strix G15', 'ASUS ROG Strix G15 (2022) Gaming Laptop, 15.6â€ 165Hz IPS Type WQHD Display, NVIDIA GeForce RTX 3060, AMD Ryzen 7 6800H, 16GB DDR5, 1TB PCIe SSD, RGB Keyboard, Windows 11 Home, G513RM-AS71-CA', 25, 1999, 28, 11, '1676818210809.jpg', '#sadf', 6, 1),
(55, 'Asus ROG-Zephyrus M16', 'GeForce RTXâ„¢ 3060 Laptop GPU\r\nWindows 11 Home\r\n12th Gen IntelÂ® Coreâ„¢ i7-12700H\r\nROG Nebula Display\r\n40.64cm(16\"), QHD+ 16:10 (2560 x 1600, WQXGA), Refresh Rate:165Hz\r\n512GB PCIeÂ® 4.0 NVMeâ„¢ M.2 Performance SSD', 20, 2350, 28, 11, '1676863110884.jpg', '#sadf', 7, 1),
(57, 'Asus ROG Zephyrus G15', 'GeForce RTXâ„¢ 3080 Laptop GPU\r\nWindows 11 Home\r\nAMD Ryzenâ„¢ 9 6900HS\r\n39.62cm(15.6\"), WQHD (2560 x 1440) 16:9, Refresh Rate:165Hz\r\n1TB PCIeÂ® 4.0 NVMeâ„¢ M.2 SSD Supports slots up to max of: 4TB M.2 NVMeâ„¢ PCIeÂ® 4.0 SSD', 15, 1650, 28, 11, '1676864285152.jpg', '#sadf', 9, 1),
(58, 'Asus ROG Zephyrus G15', 'GeForce RTXâ„¢ 3080 Laptop GPU\r\nWindows 11 Home\r\nAMD Ryzenâ„¢ 9 6900HS\r\n39.62cm(15.6\"), WQHD (2560 x 1440) 16:9, Refresh Rate:165Hz\r\n1TB PCIeÂ® 4.0 NVMeâ„¢ M.2 SSD Supports slots up to max of: 4TB M.2 NVMeâ„¢ PCIeÂ® 4.0 SSD', 15, 1350, 28, 11, '1676864457737.jpg', '#sadf', 10, 1),
(59, 'Asus ROG Zephyrus G14', 'AMD Radeonâ„¢ RX 6700S\r\nWindows 11 Home\r\nAMD Ryzenâ„¢ 9 6900HS\r\nROG Nebula Display\r\n35.56cm(14\"), QHD+ 16:10 (2560 x 1600, WQXGA), Refresh Rate:120Hz\r\n1TB PCIeÂ® 4.0 NVMeâ„¢ M.2 SSD Supports slots up to max of: 4TB M.2 NVMeâ„¢ PCIeÂ® 4.0 SSD', 15, 1299, 28, 11, '1676864586184.jpg', '#sadf', 11, 1),
(60, 'Asus ROG Zephyrus G15', 'AMD Radeonâ„¢ RX 6700S\r\nWindows 11 Home\r\nAMD Ryzenâ„¢ 9 6900HS\r\nROG Nebula Display\r\n35.56cm(14\"), QHD+ 16:10 (2560 x 1600, WQXGA), Refresh Rate:120Hz\r\n1TB PCIeÂ® 4.0 NVMeâ„¢ M.2 SSD Supports slots up to max of: 4TB M.2 NVMeâ„¢ PCIeÂ® 4.0 SSD', 12, 1500, 28, 11, '1676864664395.jpg', '#sadf', 11, 1),
(61, 'Lenovo Legion 5 15 Gaming Laptop', 'Brand	Lenovo\r\nSeries	Lenovo Ryzen 3\r\nScreen Size	15.6 Inches\r\nHard Disk Size	1 TB\r\nCPU Model	AMD Ryzen 7 5800H\r\nRam Memory Installed Size	32 GB', 7, 1350, 28, 12, '1676864842787.jpg', '#sadf', 12, 1),
(62, 'Lenovo Legion 5 Pro', 'nv883f79', 1, 2599, 28, 12, '1676865949757.jpg', '#sadf', 13, 1);

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
(47, '3', '3', 3, '1675916354941.jpg', '3', 2, 1);

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
