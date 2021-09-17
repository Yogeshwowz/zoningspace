-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2021 at 02:42 AM
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
-- Table structure for table `tbl_export_file`
--

CREATE TABLE `tbl_export_file` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fileName` text,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_export_file`
--

INSERT INTO `tbl_export_file` (`id`, `user_id`, `fileName`, `created_date`) VALUES
(1, 45, 'property-446082970-1588597453.csv', '2020-05-04 13:04:13'),
(2, 51, 'property-619556757-1593719134.csv', '2020-07-02 19:45:34'),
(3, 50, 'property-641101938-1593783303.csv', '2020-07-03 13:35:03'),
(4, 45, 'property-555203687-1594044545.csv', '2020-07-06 14:09:05'),
(5, 50, 'property-1462685715-1595424799.csv', '2020-07-22 13:33:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_export_file`
--
ALTER TABLE `tbl_export_file`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_export_file`
--
ALTER TABLE `tbl_export_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
