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
-- Table structure for table `zip`
--

CREATE TABLE `zip` (
  `zipid` int(11) NOT NULL,
  `zipcode` text CHARACTER SET utf8mb4
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zip`
--

INSERT INTO `zip` (`zipid`, `zipcode`) VALUES
(1, '20001'),
(2, '20002'),
(3, '20003'),
(4, '20004'),
(5, '20005'),
(6, '20006'),
(7, '20007'),
(8, '20008'),
(9, '20009'),
(10, '20010'),
(11, '20011'),
(12, '20012'),
(13, '20015'),
(14, '20016'),
(15, '20017'),
(16, '20018'),
(17, '20019'),
(18, '20020'),
(19, '20024'),
(20, '20032'),
(21, '20036'),
(22, '20037'),
(23, '20052'),
(24, '20057'),
(25, '20059'),
(26, '20319'),
(27, '20410'),
(28, '20536'),
(29, '20593');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `zip`
--
ALTER TABLE `zip`
  ADD PRIMARY KEY (`zipid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `zip`
--
ALTER TABLE `zip`
  MODIFY `zipid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
