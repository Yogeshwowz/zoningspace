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
-- Table structure for table `zoning`
--

CREATE TABLE `zoning` (
  `id` int(11) NOT NULL,
  `zoning` text CHARACTER SET utf8mb4
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zoning`
--

INSERT INTO `zoning` (`id`, `zoning`) VALUES
(1, 'ARTS-2'),
(2, 'ARTS-3'),
(3, 'ARTS-4'),
(4, 'CG-1'),
(5, 'CG-2'),
(6, 'CG-3'),
(7, 'CG-4'),
(8, 'CG-5'),
(9, 'D-1-R'),
(10, 'D-2'),
(11, 'D-3'),
(12, 'D-4'),
(13, 'D-4-R'),
(14, 'D-5'),
(15, 'D-5-R'),
(16, 'D-6'),
(17, 'D-7'),
(18, 'D-8'),
(19, 'HE-1'),
(20, 'MU-10'),
(21, 'MU-12'),
(22, 'MU-13'),
(23, 'MU-14'),
(24, 'MU-15'),
(25, 'MU-16'),
(26, 'MU-17'),
(27, 'MU-18'),
(28, 'MU-19'),
(29, 'MU-2'),
(30, 'MU-20'),
(31, 'MU-21'),
(32, 'MU-22'),
(33, 'MU-23'),
(34, 'MU-24'),
(35, 'MU-25'),
(36, 'MU-26'),
(37, 'MU-27'),
(38, 'MU-28'),
(39, 'MU-29'),
(40, 'MU-3A'),
(41, 'MU-4'),
(42, 'MU-5A'),
(43, 'MU-6'),
(44, 'MU-7'),
(45, 'MU-9'),
(46, 'NC-10'),
(47, 'NC-14'),
(48, 'NC-15'),
(49, 'NC-16'),
(50, 'NC-2'),
(51, 'NC-3'),
(52, 'NC-5'),
(53, 'NC-6'),
(54, 'NC-7'),
(55, 'NC-8'),
(56, 'NC-9'),
(57, 'PDR-1'),
(58, 'PDR-2'),
(59, 'PDR-3'),
(60, 'PDR-4'),
(61, 'PDR-5'),
(62, 'PDR-6'),
(63, 'PDR-7'),
(64, 'R-1-A'),
(65, 'R-1-B'),
(66, 'R-10'),
(67, 'R-11'),
(68, 'R-12'),
(69, 'R-14'),
(70, 'R-15'),
(71, 'R-16'),
(72, 'R-17'),
(73, 'R-19'),
(74, 'R-2'),
(75, 'R-20'),
(76, 'R-21'),
(77, 'R-3'),
(78, 'R-6'),
(79, 'R-8'),
(80, 'R-9'),
(81, 'RA-1'),
(82, 'RA-10'),
(83, 'RA-2'),
(84, 'RA-3'),
(85, 'RA-4'),
(86, 'RA-5'),
(87, 'RA-6'),
(88, 'RA-7'),
(89, 'RA-8'),
(90, 'RA-9'),
(91, 'RC-1'),
(92, 'RC-2'),
(93, 'RC-3'),
(94, 'RF-1'),
(95, 'RF-2'),
(96, 'RF-3'),
(97, 'SEFC-1B'),
(98, 'SEFC-3'),
(99, 'SEFC-4'),
(100, 'UNZONED'),
(101, 'WR-4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `zoning`
--
ALTER TABLE `zoning`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `zoning`
--
ALTER TABLE `zoning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
