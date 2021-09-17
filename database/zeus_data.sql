-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2021 at 02:43 AM
-- Server version: 5.6.49-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zoningspace`
--

-- --------------------------------------------------------

--
-- Table structure for table `zeus_data`
--

CREATE TABLE `zeus_data` (
  `id` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `place_id` varchar(255) DEFAULT NULL,
  `type_of_home` varchar(255) DEFAULT NULL,
  `txt_isunitnumber` varchar(255) DEFAULT NULL,
  `number_of_unit_studio` varchar(255) DEFAULT NULL,
  `number_of_unit_1` varchar(255) DEFAULT NULL,
  `number_of_unit_2` varchar(255) DEFAULT NULL,
  `bedroom` varchar(255) DEFAULT NULL,
  `bathroom` varchar(255) DEFAULT NULL,
  `sq_ft` varchar(255) DEFAULT NULL,
  `same_property` varchar(255) DEFAULT NULL,
  `lockboxes` varchar(255) DEFAULT NULL,
  `choose_date` varchar(255) DEFAULT NULL,
  `emailid` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `phoneno` varchar(255) DEFAULT NULL,
  `NotifymeEmail` varchar(255) DEFAULT NULL,
  `created_date` varchar(255) DEFAULT NULL,
  `type_of_certificate` text,
  `CertificateofOccupancyuploadImage` varchar(255) DEFAULT NULL,
  `BusinessLicenseuploadImage` varchar(255) DEFAULT NULL,
  `DeeduploadImage` varchar(255) DEFAULT NULL,
  `IDuploadImage` varchar(255) DEFAULT NULL,
  `VoidedCheckuploadImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zeus_data`
--

INSERT INTO `zeus_data` (`id`, `address`, `place_id`, `type_of_home`, `txt_isunitnumber`, `number_of_unit_studio`, `number_of_unit_1`, `number_of_unit_2`, `bedroom`, `bathroom`, `sq_ft`, `same_property`, `lockboxes`, `choose_date`, `emailid`, `firstname`, `lastname`, `phoneno`, `NotifymeEmail`, `created_date`, `type_of_certificate`, `CertificateofOccupancyuploadImage`, `BusinessLicenseuploadImage`, `DeeduploadImage`, `IDuploadImage`, `VoidedCheckuploadImage`) VALUES
(1, '1310 E St NE, Washington, DC, USA', 'ChIJ37ueUD-4t4kR8vsaNifjwGQ', 'entire_building', '', '2', '5', '4', '1', '2', '410', 'yes', 'no', '2020-08-06', 'harsh@gmail.com', 'harsh', 'kumar', '88999963', '', '2020-08-05 18:06:58', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'No. 1310, Zhongshan Road, Taoyuan District, Taoyuan City, Taiwan', 'ChIJt42u0FofaDQR5oj3zcEpcvI', 'single_apartment', '54', '', '', '', '5', '5', '45', 'yes', NULL, '', '', '', '', '', 'h@gmail.com', '2020-08-05 19:50:05', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'No. 1310, Zhongshan Road, Taoyuan District, Taoyuan City, Taiwan', 'ChIJt42u0FofaDQR5oj3zcEpcvI', 'single_apartment', '54', '', '', '', '5', '5', '45', 'yes', NULL, '', '', '', '', '', 'h@gmail.com', '2020-08-05 19:50:41', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'No. 1310, Zhongshan Road, Taoyuan District, Taoyuan City, Taiwan', 'ChIJt42u0FofaDQR5oj3zcEpcvI', 'single_apartment', '54', '', '', '', '5', '5', '45', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, 'h@gmail.com', '2020-08-05 19:51:09', NULL, NULL, NULL, NULL, NULL, NULL),
(5, '1310 E St NE, Washington, DC, USA', 'ChIJ37ueUD-4t4kR8vsaNifjwGQ', 'single_apartment', '69', '', '', '', '2', '4', '456', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, 'ha@gmail.com', '2020-08-05 20:47:37', NULL, NULL, NULL, NULL, NULL, NULL),
(6, '1310 E St NE, Washington, DC, USA', 'ChIJ37ueUD-4t4kR8vsaNifjwGQ', 'single_apartment', '', '', '', '', '1', '5', '620', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, 'f@gmail.com', '2020-08-05 20:48:45', NULL, NULL, NULL, NULL, NULL, NULL),
(7, '1310 E St NE, Washington, DC, USA', 'ChIJ37ueUD-4t4kR8vsaNifjwGQ', 'single_apartment', '690', '', '', '', '3', '1', '960', 'no', 'not_sure', '2020-08-07', 'harsh@gmil.com', 'harsh', 'kumar', '9999898989', '', '2020-08-05 20:51:21', NULL, NULL, NULL, NULL, NULL, NULL),
(8, '1310 E St NE, Washington, DC, USA', 'ChIJ37ueUD-4t4kR8vsaNifjwGQ', 'entire_building', '', '5', '2', '4', '0', '3', '965', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, 'harsh@gmail.com', '2020-08-05 20:53:47', NULL, NULL, NULL, NULL, NULL, NULL),
(9, '1310 E St NE, Washington, DC, USA', 'ChIJ37ueUD-4t4kR8vsaNifjwGQ', 'single_family', '960', '', '', '', '3', '4', '960', 'no', 'not_sure', '2020-08-05', 'ha@fmil.com', 'dd', 'ddd', '445455', '', '2020-08-05 20:59:35', NULL, NULL, NULL, NULL, NULL, NULL),
(10, '1310 E St NE, Washington, DC, USA', 'ChIJ37ueUD-4t4kR8vsaNifjwGQ', 'entire_building', '', '3', '5', '', '5', '5', '210', 'no', 'yes', '2020-08-21', 'sukhisharma7560@gmail.com', 'Sukhi ', 'Sharma', '9518070482', '', '2020-08-06 02:12:23', NULL, NULL, NULL, NULL, NULL, NULL),
(11, '1310 E St NE, Washington, DC, USA', 'ChIJ37ueUD-4t4kR8vsaNifjwGQ', 'entire_building', '', '1', '2', '3', '2', '3', '23', 'no', 'yes', '2020-08-17', 'keshav.wowz@gmail.com', 'keshav', 'b', '6285001053', '', '2020-08-06 16:56:46', NULL, NULL, NULL, NULL, NULL, NULL),
(12, '1540 Douglas St NE, Washington, DC, USA', 'ChIJr0eg0YvHt4kR-DkNfg2chl8', 'single_family', '', '', '', '', '4', '2', '1000', 'no', 'no', '', 'rcade@darthlp.com', 'ron ', 'cade', '4045197809', '', '2020-08-10 19:57:37', NULL, NULL, NULL, NULL, NULL, NULL),
(13, '1310 E St NE, Washington, DC, USA', 'ChIJ37ueUD-4t4kR8vsaNifjwGQ', 'single_apartment', '', '', '', '', '3', '2', '852', 'no', 'not_sure', '2020-08-12', 'harsh@gmail.com', 'harsh', 'kumar', '2342333424', '', '2020-08-12 21:29:54', NULL, NULL, NULL, NULL, NULL, NULL),
(14, '1310 E St NE, Washington, DC, USA', 'ChIJ37ueUD-4t4kR8vsaNifjwGQ', 'single_apartment', '', '', '', '', '3', '4', '234', 'no', 'not_sure', '2020-10-15', 'keshav.wowz@gmail.com', 'Keshav', 'B', '6285001053', '', '2020-10-14 16:13:46', NULL, NULL, NULL, NULL, NULL, NULL),
(15, '1540 Douglas Street Northeast, Washington, DC, USA', 'ChIJr0eg0YvHt4kR-DkNfg2chl8', 'single_family', '1', '', '', '', '2', '2', '1000', 'no', 'no', '2020-10-17', 'rcadepi@gmail.com', 'ron ', 'cade', '', '', '2020-10-16 22:55:22', NULL, NULL, NULL, NULL, NULL, NULL),
(16, '1310 E St NE, Washington, DC, USA', 'ChIJ37ueUD-4t4kR8vsaNifjwGQ', 'single_apartment', '6', '', '', '', '3', '4', '250', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, 'f@gmail.com', '2020-10-22 19:05:15', NULL, NULL, NULL, NULL, NULL, NULL),
(17, '1310 E St NE, Washington, DC, USA', 'ChIJ37ueUD-4t4kR8vsaNifjwGQ', 'single_apartment', '', '', '', '', '3', '3', '850', 'no', 'yes', '2020-10-22', 'ha@gmail.com', 'harsh', 'kumar', '6566666662', '', '2020-10-22 19:06:07', NULL, NULL, NULL, NULL, NULL, NULL),
(18, '1310 E St NE, Washington, DC, USA', 'ChIJ37ueUD-4t4kR8vsaNifjwGQ', 'single_apartment', '', '', '', '', '4', '4', '56', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, 'keshav.wowz@gmail.com', '2020-12-01 00:37:57', NULL, NULL, NULL, NULL, NULL, NULL),
(19, '1310 E St NE, Washington, DC, USA', 'ChIJ37ueUD-4t4kR8vsaNifjwGQ', 'entire_building', '', '', '2', '', '3', '2', '34', 'no', NULL, '2020-12-07', 'keshav.wowz@gmail.com', 'Keshav ', 'B', '', '', '2020-12-04 23:21:47', NULL, NULL, NULL, NULL, NULL, NULL),
(20, '1310 E St NE, Washington, DC, USA', 'ChIJ37ueUD-4t4kR8vsaNifjwGQ', 'single_condo', '630', '', '', '', '4', '5', '630', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, 'harsh@gmail.com', '2020-12-07 22:38:41', 'a:3:{i:0;s:24:\"Certificate of Occupancy\";i:1;s:4:\"Deed\";i:2;s:12:\"Voided Check\";}', NULL, NULL, NULL, NULL, NULL),
(21, '1310 E St NE, Washington, DC, USA', 'ChIJ37ueUD-4t4kR8vsaNifjwGQ', 'single_family_home', '630', '', '', '', '2', '4', '620', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, 'h@gmail.com', '2020-12-08 16:10:39', 'a:2:{i:0;s:24:\"Certificate of Occupancy\";i:1;s:4:\"Deed\";}', NULL, NULL, NULL, NULL, NULL),
(22, '1310 E St NE, Washington, DC, USA', 'ChIJ37ueUD-4t4kR8vsaNifjwGQ', 'single_family_home', '', '', '', '', '1', '2', '344', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, 'keshav.wowz@gmail.com', '2020-12-08 16:13:54', 'a:2:{i:0;s:4:\"Deed\";i:1;s:2:\"ID\";}', NULL, NULL, NULL, NULL, NULL),
(23, '1310 E St NE, Washington, DC, USA', 'ChIJ37ueUD-4t4kR8vsaNifjwGQ', 'single_family_home', '120', '', '', '', '3', '2', '150', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, 'harsh@gmail.com', '2020-12-09 23:33:48', 'a:5:{i:0;s:24:\"Certificate of Occupancy\";i:1;s:16:\"Business License\";i:2;s:4:\"Deed\";i:3;s:2:\"ID\";i:4;s:12:\"Voided Check\";}', 'gallery-130466318-1607536959.pdf', 'gallery-109239210-1607536967.png', 'gallery-508066038-1607536974.png', 'gallery-1707173925-1607536986.png', 'gallery-1783280531-1607537012.pdf'),
(24, '1310 E St, Lincoln, NE, USA', 'EiExMzEwIEUgU3QsIExpbmNvbG4sIE5FIDY4NTA4LCBVU0EiMRIvChQKEgnHFbroVb6WhxHXqsV_PFzGhxCeCioUChIJJVv4Pl--locRZeBQC2LMdWg', 'single_apartment', '', '', '', '', '2', '3', '2334', 'no', NULL, '2020-12-16', 'keshav.wowz@gmail.com', 'keshav', 'b', '', '', '2020-12-10 01:08:09', 'N;', NULL, NULL, NULL, NULL, NULL),
(25, '1310 E St NE, Washington, DC, USA', 'ChIJ37ueUD-4t4kR8vsaNifjwGQ', 'single_condo', '630', '', '', '', '2', '4', '520', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, 'harsh@gmail.com', '2020-12-17 20:00:28', 'a:3:{i:0;s:24:\"Certificate of Occupancy\";i:1;s:16:\"Business License\";i:2;s:2:\"ID\";}', 'gallery-687277294-1608215382.jpg', 'gallery-1303144682-1608215401.jpg', '', 'gallery-773597738-1608215416.jpg', ''),
(26, '1310 E St NE, Washington, DC, USA', 'ChIJ37ueUD-4t4kR8vsaNifjwGQ', 'single_condo', '', '', '', '', '3', '5', '20', 'no', NULL, '2020-12-17', 'harh@gmail.com', 'harsh', 'kumar', '965656565', '', '2020-12-17 20:01:13', 'N;', NULL, NULL, NULL, NULL, NULL),
(27, '1310 E St NE, Washington, DC, USA', 'ChIJ37ueUD-4t4kR8vsaNifjwGQ', 'single_condo', '', '', '', '', '0', '2', '123', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, 'fsdf@gmail.com', '2020-12-18 15:00:53', 'a:5:{i:0;s:24:\"Certificate of Occupancy\";i:1;s:16:\"Business License\";i:2;s:4:\"Deed\";i:3;s:2:\"ID\";i:4;s:12:\"Voided Check\";}', '', '', '', '', ''),
(28, '1310 E St NE, Washington, DC, USA', 'ChIJ37ueUD-4t4kR8vsaNifjwGQ', 'building_with_multiple_units', '', '', '', '3', '3', '3', '1234', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, 'test@gmail.com', '2020-12-18 16:06:37', 'a:3:{i:0;s:16:\"Business License\";i:1;s:4:\"Deed\";i:2;s:2:\"ID\";}', '', 'gallery-457230132-1608287654.png', 'gallery-670386919-1608287670.png', 'gallery-1904972636-1608287683.png', ''),
(29, '1310 E St NE, Washington, DC, USA', 'ChIJ37ueUD-4t4kR8vsaNifjwGQ', 'building_with_multiple_units', '', '', '4', '', '3', '3', '123', 'no', NULL, '2020-12-23', 'keshav.wowz@gmail.com', 'Keshav', 'B', '1234567899', '', '2020-12-18 17:54:23', 'N;', NULL, NULL, NULL, NULL, NULL),
(30, '1310 E St NE, Washington, DC, USA', 'ChIJ37ueUD-4t4kR8vsaNifjwGQ', 'single_condo', '630', '', '', '', '3', '5', '620', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, 'harsh@gmail.com', '2020-12-29 16:00:39', 'a:1:{i:0;s:24:\"Certificate of Occupancy\";}', 'gallery-1269852512-1609237820.png', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `zeus_data`
--
ALTER TABLE `zeus_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `zeus_data`
--
ALTER TABLE `zeus_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
