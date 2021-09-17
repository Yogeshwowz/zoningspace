-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2021 at 02:40 AM
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
-- Table structure for table `neighborhood`
--

CREATE TABLE `neighborhood` (
  `id` int(11) NOT NULL,
  `neighborhood` text CHARACTER SET utf8mb4
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `neighborhood`
--

INSERT INTO `neighborhood` (`id`, `neighborhood`) VALUES
(1, '16th Street Heights'),
(2, 'American University'),
(3, 'Anacostia'),
(4, 'Anacostia Park'),
(5, 'Barry Farms'),
(6, 'Berkley'),
(7, 'Brentwood'),
(8, 'Brightwood'),
(9, 'Brookland'),
(10, 'Burleith'),
(11, 'Capitol Hill'),
(12, 'Central-tri 1'),
(13, 'Central-tri 3'),
(14, 'Chevy Chase'),
(15, 'Chillum'),
(16, 'Cleveland Park'),
(17, 'Colonial Village'),
(18, 'Columbia Heights'),
(19, 'Congress Heights'),
(20, 'Crestwood'),
(21, 'DC Stadium Area'),
(22, 'Deanwood'),
(23, 'Eckington'),
(24, 'Foggy Bottom'),
(25, 'Forest Hills'),
(26, 'Fort Dupont Park'),
(27, 'Fort Lincoln'),
(28, 'Foxhall'),
(29, 'Garfield'),
(30, 'Georgetown'),
(31, 'Glover Park'),
(32, 'Hawthorne'),
(33, 'Hillcrest'),
(34, 'Kalorama'),
(35, 'Kent'),
(36, 'Ledroit Park'),
(37, 'Lily Ponds'),
(38, 'Mall/East Potomac Park'),
(39, 'Marshall Heights'),
(40, 'Massachusetts Avenue Heights'),
(41, 'Michigan Park'),
(42, 'Mt. Pleasant'),
(43, 'NoMa'),
(44, 'North Cleveland Park'),
(45, 'Null'),
(46, 'Observatory Circle'),
(47, 'Old City 1'),
(48, 'Old City 2'),
(49, 'Palisades'),
(50, 'Petworth'),
(51, 'Randle Heights'),
(52, 'Riggs Park'),
(53, 'Rock Creek Park'),
(54, 'Shepherd Heights'),
(55, 'Southwest Waterfront'),
(56, 'Spring Valley'),
(57, 'Takoma Park'),
(58, 'Trinidad'),
(59, 'Wakefield'),
(60, 'Washington Navy Yard'),
(61, 'Wesley Heights'),
(62, 'Woodley'),
(63, 'Woodridge');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `neighborhood`
--
ALTER TABLE `neighborhood`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `neighborhood`
--
ALTER TABLE `neighborhood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
