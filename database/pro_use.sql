-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2021 at 02:41 AM
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
-- Table structure for table `pro_use`
--

CREATE TABLE `pro_use` (
  `id` int(11) NOT NULL,
  `pro_use` text CHARACTER SET utf8mb4
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pro_use`
--

INSERT INTO `pro_use` (`id`, `pro_use`) VALUES
(1, '192'),
(2, '194'),
(3, '195'),
(4, 'Club Private'),
(5, 'Commercial Banks, Financial'),
(6, 'Commercial Garage,Vehicle Sale'),
(7, 'Commercial Office Large'),
(8, 'Commercial Office Misc.'),
(9, 'Commercial Office Small'),
(10, 'Commercial Parking Garage'),
(11, 'Commercial Restaurant'),
(12, 'Commercial Restaurant Fast Foo'),
(13, 'Commercial Retail Misc'),
(14, 'Commercial Specific Purp,Misc'),
(15, 'Coop Horizontal Mixed Use'),
(16, 'Dormitory'),
(17, 'Educational'),
(18, 'Embassy, Chancery, etc.'),
(19, 'Garage Multi Family'),
(20, 'Health Care Facility'),
(21, 'Hotel Large'),
(22, 'Hotel Small'),
(23, 'Industrial Light'),
(24, 'Industrial Misc'),
(25, 'Industrial Raw Material Handli'),
(26, 'Industrial Warehouse 1 Story'),
(27, 'Industrial Warehouse Multi Sto'),
(28, 'Inn'),
(29, 'Medical'),
(30, 'Museum, Library, Gallery'),
(31, 'Parking Lot Special Purpose'),
(32, 'Public Service'),
(33, 'Recreational'),
(34, 'Religious'),
(35, 'Residential Apartment Elevator'),
(36, 'Residential Apartment Walk Up'),
(37, 'Residential Conversion 5 Units'),
(38, 'Residential Conversions Less t'),
(39, 'Residential Conversions Mrth5'),
(40, 'Residential Cooperative Horizo'),
(41, 'Residential Cooperative Vertic'),
(42, 'Residential Detached Single Fa'),
(43, 'Residential Flats Less than 5'),
(44, 'Residential Garage'),
(45, 'Residential Mixed Use'),
(46, 'Residential Multifamily, Misc'),
(47, 'Residential Row Single Family'),
(48, 'Residential Semi Detached Sing'),
(49, 'Residential Single Family (NC)'),
(50, 'Residential Single Family Misc'),
(51, 'Residential Transient, Misc'),
(52, 'Special Purpose Misc'),
(53, 'Store Barber/Beauty Shop'),
(54, 'Store Misc'),
(55, 'Store Restaurant'),
(56, 'Store Shopping Center/Mall'),
(57, 'Store Small 1 Story'),
(58, 'Store Super Market'),
(59, 'Theaters, Entertainment'),
(60, 'Tourist Homes'),
(61, 'Vacant False Abutting'),
(62, 'Vacant True'),
(63, 'Vacant with Permit'),
(64, 'Vacant Zoning Limits'),
(65, 'Vehicle Service Station Kiosk'),
(66, 'Vehicle Service Station Market'),
(67, 'Vehicle Service Station Vintag');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pro_use`
--
ALTER TABLE `pro_use`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pro_use`
--
ALTER TABLE `pro_use`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
