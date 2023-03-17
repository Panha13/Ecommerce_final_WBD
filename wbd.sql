-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 17, 2023 at 04:32 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_advertise`
--

INSERT INTO `tbl_advertise` (`ads_id`, `ads_name`, `ads_des`, `ads_price`, `ads_img`, `link`, `ordernum`, `active`) VALUES
(1, 'Asus ROG Zephyrus Duo 16 GX650', 'ASUS ROG Strix G15 (2022) Gaming Laptop, 15.6\" 300Hz IPS FHD Display, NVIDIA GeForce RTX 3050, AMD Ryzen 7 6800H, 16GB DDR5, 1TB SSD, RGB Keyboard, Windows 11 Home, G513RC-IS74', 1599, '1676886347470.jpg', '#sadf', 1, 1),
(2, 'MSI GE76 Raider', 'Newest MSI GF63 Thin Gaming Laptop, 15.6\" FHD 144Hz, Intel i5-11400H, RTX 3050, 16GB RAM, 512GB NVMe SSD, Windows 11, Aluminum Black', 950, '1676886424955.jpg', '#sadf', 2, 1),
(3, 'Lenovo 2022 Legion 5 Pro', 'Lenovo 2023 Legion 5 17.3\" 144Hz Gaming Laptop, AMD Ryzen 7 5800H, 16GB RAM, 512GB PCIe SSD, NVIDIA GeForce RTX 3050, Backlit Keyboard, WiFi 6, Phantom Blue, Win 11 Pro, 32GB SnowBell USB Card', 1549, '1676988448242.jpg', '#sadf', 3, 1),
(4, 'Acer Nitro 5 2023', 'Acer Nitro 5 AN515-58-725A Gaming Laptop | Intel Core i7-12700H | NVIDIA GeForce RTX 3060 GPU | 15.6\" FHD 144Hz 3ms IPS Display | 16GB DDR4 | 512GB Gen 4 SSD | Killer Wi-Fi 6 | RGB Keyboard', 1450, '1676988503498.jpg', '#sadf', 4, 1),
(5, 'MacBook Air', 'Apple 2022 MacBook Air Laptop with M2 chip: 13.6-inch Liquid Retina Display, 8GB RAM, 256GB SSD Storage, Backlit Keyboard, 1080p FaceTime HD Camera. Works with iPhone and iPad; Midnight', 2599, '1676988560265.jpg', '#sadf', 5, 1),
(6, 'Z-Edge UG27P 27-inch', 'Z-Edge UG27P 27-inch Curved Gaming Monitor 16:9 1920x1080 240Hz 1ms Frameless LED Gaming Monitor, AMD Freesync Premium Display Port HDMI Built-in Speakers', 350, '1676988662109.jpg', '#fgrgc', 6, 1),
(7, 'Corsair Vengeance RGB DDR5 32GB', 'Corsair Vengeance RGB DDR5 32GB (2x16GB) 6000MHz C36 Intel Optimized Desktop Memory (Dynamic Ten-Zone RGB Lighting, Onboard Voltage Regulation, Custom XMP 3.0 Profiles, Tight Response Times) Black', 172, '1676988719603.jpg', '#sadf', 7, 1),
(8, 'Segotep 750W Power Supply', 'Segotep 750W Power Supply, PCIe 5.0 Full Modular 80 Plus Gold PSU ATX 3.0 Gaming Power Supply, 12VHPWR Cable, 120mm Silent FDB Fan', 245, '1676988797175.jpg', '#sadf', 8, 1),
(9, 'Asus ROG Zephyrus G15', 'Asus ROG Zephyrus G15', 1649, '1677241554193.jpg', '#sadf', 9, 1),
(10, 'MSI GE76 Raider', 'MSI GE76 Raider', 3399, '1677241624694.jpg', '#sadf', 10, 1),
(11, 'Acer Nitro 5', 'Acer Nitro 5', 2300, '1677241673587.jpg', '#fsd', 11, 1),
(12, 'Lenovo 2022 Legion 5 Pro', 'Lenovo 2022 Legion 5 Pro', 1619, '1677241716055.jpg', '#fsd', 12, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_des`, `active`, `ordernum`) VALUES
(2, 'MSI', '', 1, 1),
(11, 'Asus', '', 1, 2),
(12, 'Lenvo', '', 1, 3),
(13, 'MacBook', '', 1, 4),
(14, 'Acer', '', 1, 5),
(15, 'LG', '', 1, 6),
(16, 'Vengeance', '', 1, 7),
(17, 'OLOy', '', 1, 8);

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
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`prod_id`, `prod_name`, `prod_des`, `prod_instock`, `prod_price`, `cate_id`, `brand_id`, `prod_img`, `link`, `ordernum`, `active`) VALUES
(46, 'MSI GE76 Raider', 'Brand	MSI\r\nSeries	GE76 Raider 11UH-053\r\nScreen Size	17.3 Inches\r\nColor	Titanium Blue\r\nCPU Model	Core i9\r\nRam Memory Installed Size	32 GB', 25, 3399, 28, 2, '1676785376787.jpg', '#', 1, 1),
(47, 'MSI GE76 Raider 17.3', 'Brand	MSI\r\nSeries	GE76 Raider 11UH-245\r\nScreen Size	17.3 Inches\r\nColor	Titanium Blue\r\nHard Disk Size	1 TB\r\nCPU Model	Core i7 Family\r\nRam Memory Installed Size	32 GB', 25, 3049, 28, 2, '1676785484074.jpg', '#', 2, 1),
(48, 'MSI Titan GT77', '17.3\" UHD 120Hz Gaming Laptop: Intel Core i7-12800HX RTX 3070 Ti 32GB DDR5 1TB NVMe SSD, Thunderbolt 4, USB-Type C, Cooler Boost Titan, Win11 Pro: Core Black 12UGS-009', 25, 2599, 28, 2, '1676785859792.png', '#', 3, 1),
(49, 'MSI Katana GF66', 'MSI Katana GF66 15.6\" 144Hz FHD Gaming Laptop: Intel Core i7-12650H RTX 3050 Ti 16GB 512GB NVMe SSD, Type-C USB 3.2 Gen 1, High-ResoluTion Audio, Cooler Boost 5, Win11 Home: Black 12UD-436', 25, 788, 28, 2, '1676786010480.png', '#', 4, 1),
(50, 'MSI Computer GF63', 'MSI Computer GF63, NVIDIA GeForce GTX 1650 Graphics, 15.6\" 8GB 256GB Intel Core i5-10300H X4 2.5GHz Win10, Black', 25, 595, 28, 2, '1676786120130.jpg', '#', 5, 1),
(51, 'ASUS ROG Strix G15', 'ASUS ROG Strix G15 (2022) Gaming Laptop, 15.6â€ 165Hz IPS Type WQHD Display, NVIDIA GeForce RTX 3060, AMD Ryzen 7 6800H, 16GB DDR5, 1TB PCIe SSD, RGB Keyboard, Windows 11 Home, G513RM-AS71-CA', 25, 1999, 28, 11, '1676818210809.jpg', '#', 6, 1),
(55, 'Asus ROG-Zephyrus M16', 'GeForce RTXâ„¢ 3060 Laptop GPU\r\nWindows 11 Home\r\n12th Gen IntelÂ® Coreâ„¢ i7-12700H\r\nROG Nebula Display\r\n40.64cm(16\"), QHD+ 16:10 (2560 x 1600, WQXGA), Refresh Rate:165Hz\r\n512GB PCIeÂ® 4.0 NVMeâ„¢ M.2 Performance SSD', 20, 2350, 28, 11, '1676863110884.jpg', '#', 7, 1),
(57, 'Asus ROG Zephyrus G15', 'GeForce RTXâ„¢ 3080 Laptop GPU\r\nWindows 11 Home\r\nAMD Ryzenâ„¢ 9 6900HS\r\n39.62cm(15.6\"), WQHD (2560 x 1440) 16:9, Refresh Rate:165Hz\r\n1TB PCIeÂ® 4.0 NVMeâ„¢ M.2 SSD Supports slots up to max of: 4TB M.2 NVMeâ„¢ PCIeÂ® 4.0 SSD', 15, 1650, 28, 11, '1676864285152.jpg', '#', 9, 1),
(58, 'Asus ROG Zephyrus G15', 'GeForce RTXâ„¢ 3080 Laptop GPU\r\nWindows 11 Home\r\nAMD Ryzenâ„¢ 9 6900HS\r\n39.62cm(15.6\"), WQHD (2560 x 1440) 16:9, Refresh Rate:165Hz\r\n1TB PCIeÂ® 4.0 NVMeâ„¢ M.2 SSD Supports slots up to max of: 4TB M.2 NVMeâ„¢ PCIeÂ® 4.0 SSD', 15, 1350, 28, 11, '1676864457737.jpg', '#', 10, 1),
(59, 'Asus ROG Zephyrus G14', 'AMD Radeonâ„¢ RX 6700S\r\nWindows 11 Home\r\nAMD Ryzenâ„¢ 9 6900HS\r\nROG Nebula Display\r\n35.56cm(14\"), QHD+ 16:10 (2560 x 1600, WQXGA), Refresh Rate:120Hz\r\n1TB PCIeÂ® 4.0 NVMeâ„¢ M.2 SSD Supports slots up to max of: 4TB M.2 NVMeâ„¢ PCIeÂ® 4.0 SSD', 15, 1299, 28, 11, '1676864586184.jpg', '#', 11, 1),
(60, 'Asus ROG Zephyrus G15', 'AMD Radeonâ„¢ RX 6700S\r\nWindows 11 Home\r\nAMD Ryzenâ„¢ 9 6900HS\r\nROG Nebula Display\r\n35.56cm(14\"), QHD+ 16:10 (2560 x 1600, WQXGA), Refresh Rate:120Hz\r\n1TB PCIeÂ® 4.0 NVMeâ„¢ M.2 SSD Supports slots up to max of: 4TB M.2 NVMeâ„¢ PCIeÂ® 4.0 SSD', 12, 1500, 28, 11, '1676864664395.jpg', '#', 11, 1),
(61, 'Lenovo Legion 5 15 Gaming Laptop', 'Brand	Lenovo\r\nSeries	Lenovo Ryzen 3\r\nScreen Size	15.6 Inches\r\nHard Disk Size	1 TB\r\nCPU Model	AMD Ryzen 7 5800H\r\nRam Memory Installed Size	32 GB', 7, 1350, 28, 12, '1676864842787.jpg', '#', 12, 1),
(62, 'Lenovo Legion 5 Pro', 'nv883f79', 1, 2599, 28, 12, '1676865949757.jpg', '#', 13, 1),
(63, 'Lenovo 2022 Legion 5 Pro', 'fds', 25, 1549, 28, 12, '1676875109171.jpg', '#', 14, 1),
(64, 'Lenovo Legion 5 Pro Gen 6', '\r\nBrand	Lenovo\r\nSeries	Lenovo Legion 5 Pro\r\nScreen Size	16 Inches\r\nColor	Black\r\nHard Disk Size	1 TB\r\nCPU Model	AMD Ryzen 7 5800H\r\nRam Memory Installed Size	32 GB', 12, 1779, 28, 12, '1676875364621.jpg', '#', 15, 1),
(65, 'Acer Nitro 5', 'Acer Nitro 5 15.6\" FHD 144Hz Gaming Notebook, Intel Core i7-11800H Processor, NVIDIA GeForce RTX 3050 Ti, 4 Ports, Killer Wi-Fi, Backlit Keyboard, HDMI, Webcam, Win 11 Home (32GB RAM | 1TB SSD)', 5, 1099, 28, 14, '1676875566988.jpg', '#', 16, 1),
(66, 'Acer 2022 Nitro 5', 'Acer 2022 Nitro 5 Gaming Laptop, 17.3\" FHD IPS 144Hz, 12th Gen 12-Core i5-12500H, GeForce RTX 3050, 16GB RAM, 512GB PCIe SSD, Thunderbolt 4, HDMI, RJ45, WiFi 6, Backlit, SPS HDMI 2.1 Cable, Win 11', 5, 869, 28, 14, '1676875631938.jpg', '#', 17, 1),
(67, 'Acer Nitro 5 2023', '2022 Acer Nitro 5 Gaming Laptop, 17.3\" FHD IPS 144Hz, 12th Gen Intel 12-Core i5-12500H, GeForce RTX 3050 4GB, 8GB RAM, 256GB PCIe SSD, Thunderbolt 4, RGB KB, WiFi 6, SPS HDMI 2.1 Cable, Win 11', 5, 1050, 28, 14, '1676875736548.jpg', '#', 18, 1),
(68, 'Acer Chromebook', 'Acer Chromebook Spin 513 Convertible Laptop | Qualcomm Snapdragon 7c | 13.3\" FHD IPS Touch Corning Gorilla Glass Display | 8GB LPDDR4X | 64GB eMMC | WiFi 5 | Backlit KB | Chrome OS | CP513-1H-S338', 5, 650, 28, 14, '1676875810720.jpg', '#', 19, 1),
(69, 'Apple MacBook Pro', '\r\nBrand	Apple\r\nSeries	Macbook Pro\r\nScreen Size	13.3 Inches\r\nColor	Silver\r\nHard Disk Size	128 GB\r\nCPU Model	Core i5-4278U\r\nRam Memory Installed Size	8 GB\r\nOperating System	Mac OS\r\nCard Description	Integrated\r\nGraphics Coprocessor	yes\r\n', 12, 1450, 28, 13, '1676875925702.jpg', '#', 20, 1),
(70, 'Apple 2022 MacBook Air', 'Apple 2022 MacBook Air Laptop with M2 chip: 13.6-inch Liquid Retina Display, 8GB RAM, 512GB SSD Storage, Backlit Keyboard, 1080p FaceTime HD Camera. Works with iPhone and iPad; Starlight', 5, 2050, 28, 13, '1676876022339.jpg', '#', 21, 1),
(71, 'Apple 2023 MacBook Pro ', 'Apple 2023 MacBook Pro Laptop M2 Pro chip with 12â€‘core CPU and 19â€‘core GPU: 16.2-inch Liquid Retina XDR Display, 16GB Unified Memory, 512GB SSD Storage. Works with iPhone/iPad; Silver', 12, 2450, 28, 13, '1676876251233.jpg', '#', 22, 1),
(72, 'MSI Vigor GK30', 'MSI Vigor GK30 RGB Gaming Keyboard, 6-Zone RGB Lighting, Water Repellent & Splash-Proof, Mechanical-Like Plunger Switches', 50, 85, 36, 2, '1676876440079.jpg', '#', 23, 1),
(73, 'MSI Vigor GK50', 'MSI Vigor GK50 Elite LL Mechanical Gaming Keyboard - Kailh Blue Switches (Clicky), Ergonomic Keycaps, Brushed Metal Finish, Anti-Slip Base, Per-Key RGB Mystic Light, USB 2.0 - Full-Sized', 50, 85, 36, 2, '1676876512522.jpg', '#', 24, 1),
(74, 'MSI Vigor GK71', 'MSI Vigor GK71 Sonic US Mechanical RGB Gaming Keyboard Sonic Switches', 50, 125, 36, 2, '1676876577717.jpg', '#', 25, 1),
(75, 'MSI Gaming Backlit RGB', 'MSI Gaming Backlit RGB Dedicated Hotkeys Anti-Ghosting Water Resistant Gaming Keyboard (Vigor GK20 US)', 50, 35, 36, 2, '1676876668584.jpg', '#', 26, 1),
(76, 'MSI Vigor GK30', 'MSI Vigor GK30 Combo White, 6-Zone RGB GK30 Gaming Keyboard & GM11 Gaming Mouse, Water Repellent & Splash-Proof, 5000 DPI', 50, 63, 36, 2, '1676876718529.jpg', '#', 27, 1),
(77, 'MSI Clutch GM41', 'MSI Clutch GM41 Lightweight Wireless Gaming Mouse & Charging Dock, 20,000 DPI, 60M Omron Switches, Fast-Charging 80Hr Battery, RGB Mystic Light, 6 Programmable Buttons, PC/Mac\r\n', 45, 45, 35, 2, '1676876849772.jpg', '#', 28, 1),
(78, 'MSI Clutch GM31', 'MSI Clutch GM31 Lightweight Wireless Ergonomic Gaming Mouse & Charging Dock, 12K DPI Optical Sensor, 60M Omron Switches, Fast-Charging 110Hr Battery, RGB Mystic Light, 5 Programmable Buttons, PC/Mac', 50, 63, 35, 2, '1676876893408.jpg', '#', 29, 1),
(79, 'MSI Clutch GM20', 'MSI Clutch GM20 Elite Gaming Mouse, 6400 DPI, 20M+ Clicks OMRON Switch, Optical Sensor, Adjustable Weights, Ergonomic Right Hand Design, RGB Mystic Light', 50, 35, 35, 2, '1676876935891.jpg', '#', 30, 1),
(80, 'MSI Clutch GM11', 'MSI Clutch GM11 White Gaming Mouse - 5000 DPI Optical Sensor, Symmetrical, 10M+ Click OMRON Switches, 6-Buttons, 1ms Latency, RGB Mystic Light, 89g - Wired', 50, 28, 35, 2, '1676876981548.jpg', '#', 31, 1),
(81, 'Redragon M801', 'Redragon M801 Gaming Mouse LED RGB Backlit MMO 9 Programmable Buttons Mouse with Macro Recording Side Buttons Rapid Fire Button 16000 DPI for Windows PC Gamer (Wireless, Black)', 30, 34, 35, 2, '1676877027855.jpg', '#', 32, 1),
(82, 'Acer 27.0 inch', 'Acer 27.0â€ 1920 x 1080 VA Zero-Frame Office Home Computer Monitor - AMD FreeSync - 75Hz Refresh - 1ms VRB - Low Blue Light Filter - Tilt and VESA Compatible - HDMI Port 1.4 & VGA Port KB272HL Hbi', 25, 160, 26, 14, '1676877259284.jpg', '#', 33, 1),
(83, 'Z-Edge 30-inch', 'Z-Edge 30-inch Curved Gaming Monitor, 200Hz Refresh Rate, 21:9 2560x1080 Ultra Wide, Curved Monitor, R1500 Curvature, MPRT 1ms FPS-RTS', 10, 350, 26, 15, '1676877314750.jpg', '#', 34, 1),
(84, 'LG 32GN650-B', 'LG 32GN650-B Ultragear Gaming Monitor 32â€ QHD (2560 x 1440) Display, 165Hz Refresh Rate, 1ms MBR, HDR 10, sRGB 95% Color Gamut, AMD FreeSync â€“ Black', 12, 400, 26, 15, '1676877366512.jpg', '#', 35, 1),
(85, 'LG UltraGear FHD 32-Inch', 'LG UltraGear FHD 32-Inch Gaming Monitor 32GN50R, VA 5ms (GtG) with HDR 10 Compatibility, NVIDIA G-SYNC, and AMD FreeSync Premium, 165Hz, Black', 8, 160, 26, 15, '1676877422148.jpg', '#', 36, 1),
(86, 'GAMEMAX Rampage Series 850W', 'GAMEMAX Rampage Series 850W PCIe 5.0 80 Plus Gold Certified Fully Modular Power Supply, 135mm F.D.B Fan, 105Â°C Japanese Caps, 10 Year Warranty, GX850, White', 30, 150, 38, 11, '1676877563685.jpg', '#', 37, 1),
(87, 'ASUS ROG Thor 850 Certified 850W', 'ASUS ROG Thor 850 Certified 850W Fully-Modular RGB Power Supply with LiveDash OLED Panel', 30, 245, 38, 11, '1676877607541.jpg', '#', 38, 1),
(88, 'Asus 850W ROG Loki SFX-L Platinum PSU', 'Asus 850W ROG Loki SFX-L Platinum PSU, Small Form Factor, Fully Modular, 80+ Platinum, 0dB Fan Button, RGB, ATX-to- SFX Bracket, 10 Year Warranty', 25, 300, 38, 11, '1676877650668.jpg', '#', 39, 1),
(89, 'ASUS ROG Thor 1000W Platinum II', 'ASUS ROG Thor 1000W Platinum II Fully Modular Power Supply (1000 Watt, 80+ Platinum, Lambda A++ Certified, ROG Heatsinks, 135mm PWM Fan, 0dB Mode, OLED Panel, Sleeved Cables, Aura Sync)', 50, 312, 38, 11, '1676877693843.jpg', '#', 40, 1),
(90, 'MPG A850G PCIE 5 & ATX 3.0 Gaming Power Supply', 'MPG A850G PCIE 5 & ATX 3.0 Gaming Power Supply - Full Modular - 80 Plus Gold Certified 850W - 100% Japanese 105Â°C Capacitors - Compact Size - ATX PSU', 25, 150, 38, 2, '1676877782639.jpg', '#', 41, 1),
(91, 'Corsair RMX Series', 'Corsair RMX Series (2021), RM1000x, 1000 Watt, Gold, Fully Modular Power Supply,Black', 50, 250, 38, 2, '1676877855433.jpg', '#', 42, 1),
(92, 'GAMEMAX 1050W Power Supply', 'GAMEMAX 1050W Power Supply, Fully Modular, 80+ Gold Certified, ARGB SYNC with Motherboard, RGB-1050', 25, 145, 38, 2, '1676877921389.jpg', '#', 43, 1),
(93, 'OLOy DDR4 RAM 32GB', 'OLOy DDR4 RAM 32GB (2x16GB) 3200 MHz CL16 1.35V 288-Pin Desktop Gaming UDIMM (MD4U163216BJDA)', 10, 100, 37, 17, '1676878005834.jpg', '#', 44, 1),
(94, 'G.Skill Trident Z5 RGB Series (Intel XMP) 32GB', 'G.Skill Trident Z5 RGB Series (Intel XMP) 32GB (2 x 16GB) 288-Pin SDRAM DDR5 6400 CL32-39-39-102 1.40V Dual Channel Desktop Memory F5-6400J3239G16GA2-TZ5RK (Matte Black)', 25, 45, 37, 11, '1676878093379.jpg', '#', 45, 1),
(95, 'CORSAIR Vengeance DDR5 32GB', 'CORSAIR Vengeance DDR5 32GB (2x16GB) DDR5 5600 (PC5-44800) C36 1.25V Intel XMP Memory - Black', 50, 170, 37, 16, '1676878184907.jpg', '#', 46, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_slideshow`
--

INSERT INTO `tbl_slideshow` (`slide_id`, `slide_name`, `slide_des`, `slide_price`, `slide_img`, `link`, `ordernum`, `active`) VALUES
(1, 'Asus ROG Stric Scar15 ', 'ASUS 2023 New ROG Strix Premium G15 Gaming Laptop: 15.6\" FHD 144Hz IPS Display, AMD Gaming 8-Core Ryzen 7-4800HX, 16GB DDR5, 512GB SSD, 6GB GeForce RTX 3060, WiFi-6, Backlit-KYB, USB-C, Win11H, T.F', 1899, '1676885744830.jpg', '#sadf', 2, 1),
(2, 'MSI GE76 Raider', 'MSI GE76 Raider Gaming Laptop 17.3â€ FHD IPS 144Hz 12th Gen Intel 14-core i7-12700H 16GB RAM 1TB SSD GeForce RTX 3060 6GB RGB Backlit Thunderbolt USB-C MiniDP Dynaudio Nahimic Win11 + HDMI Cable', 2250, '1676885886312.jpg', '#sadf', 3, 1),
(3, 'Acer Nitro 5 2023', 'Acer Newest Nitro 5 Flagship Gaming Laptop: 17.3\" FHD 144Hz IPS Display, Intel Gaming H 12-Core i5-12500H, 16GB RAM, 512GB SSD, 4GB RTX 3050, WiFi-6, Backlit-KYB, DTSX Audio, CoolTech, Win11, TF', 1850, '1676885965257.jpg', '#fsd', 1, 1),
(4, 'Lenovo Legion 5 Pro', 'Lenovo Legion 5 15.6\", Ryzen 5 5600H, GeForce RTX 3050 Ti, 8GB RAM, 512GB SSD, Phantom Blue, Windows 11 Home, 82JW00Q7US', 1665, '1676886121968.jpg', '#fsd', 4, 1),
(5, 'MacBook Air', 'Apple 2022 MacBook Air Laptop with M2 chip: 13.6-inch Liquid Retina Display, 8GB RAM, 512GB SSD Storage, Backlit Keyboard, 1080p FaceTime HD Camera. Works with iPhone and iPad; Starlight', 2500, '1676886236757.jpg', '#fsd', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` varchar(255) NOT NULL,
  `user_firstname` varchar(50) DEFAULT NULL,
  `user_lastname` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `wl_id` int(11) DEFAULT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `purch_id` int(11) DEFAULT NULL,
  `bill_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_name`, `wl_id`, `cart_id`, `purch_id`, `bill_id`) VALUES
('fbee7c07-5160-4a98-82bd-23d7a3100d25', 'devit', 'rithy', 'devit1405@gmail.com', 'devid', 'devid', NULL, NULL, NULL, NULL),
('34485db1-81d0-4464-86a6-607c5837db9f', 'devid', 'rithy', 'devid1405@gmail.com', 'devid', 'devid1405', NULL, NULL, NULL, NULL),
('fc91ca99-73d4-4419-93db-7627aa6609fa', 'devid', 'rithy', 'devid1405@gmail.com', 'devid', 'devid1405', NULL, NULL, NULL, NULL),
('ef9635ec-aab6-4189-ae94-5a6013b9c25c', '', '', '', '', '', NULL, NULL, NULL, NULL),
('64bd4a48-1763-4a3d-af59-7ad26a1a63d5', 'asdkf', 'alksdfj', 'salkdfj@gmail.com', 'jjjj', 'lskfjasdf', NULL, NULL, NULL, NULL),
('2f8a4944-a2e7-44ce-9234-03104ea26310', 'asdkf', 'alksdfj', 'salkdfj@gmail.com', 'jjjj', 'lskfjasdf', NULL, NULL, NULL, NULL),
('3d7957b2-34b9-444b-b856-7b1647442646', 'sdfadfad', 'asdfadsf', 'isdjf@gmail.com', '1111', 'sdflka', NULL, NULL, NULL, NULL),
('4adc69c0-4881-4f44-918a-6a8ab4b6a2c1', 'devid', 'rithy', 'devid1405@gmail.com', 'devid1405', 'devid1405', NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
