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
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userId` int(11) NOT NULL,
  `email` varchar(128) NOT NULL COMMENT 'login email',
  `password` varchar(128) NOT NULL COMMENT 'hashed login password',
  `plain_password` varchar(255) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL COMMENT 'full name of user',
  `mobile` varchar(20) DEFAULT NULL,
  `roleId` tinyint(4) NOT NULL,
  `status` tinyint(11) NOT NULL DEFAULT '0',
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL,
  `packageamount` varchar(225) DEFAULT NULL,
  `subscription` varchar(225) DEFAULT NULL,
  `payment_status` varchar(225) DEFAULT NULL,
  `expired_date` datetime DEFAULT NULL,
  `connects` varchar(225) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `email`, `password`, `plain_password`, `name`, `mobile`, `roleId`, `status`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`, `packageamount`, `subscription`, `payment_status`, `expired_date`, `connects`) VALUES
(1, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', NULL, 'Admin', '9890098901', 1, 0, 0, 0, '2015-07-01 18:56:49', 1, '2020-03-25 15:35:56', '600', '4', 'complete', '2021-04-27 15:14:06', '1000'),
(46, 'ron@mobdeli.co', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Ron Cade', NULL, 2, 0, 0, 0, '2020-06-09 00:46:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'employee@example.com', 'fa5473530e4d1a5a1e1eb53d2fedb10c', NULL, 'Employee', '9890098900', 2, 0, 0, 1, '2016-12-09 17:50:22', 3, '2018-01-04 07:58:28', NULL, NULL, NULL, NULL, NULL),
(9, 'harsh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Harsh', '9652415252', 2, 0, 0, 0, '2020-03-16 10:44:13', NULL, '2020-03-25 07:52:25', NULL, NULL, NULL, NULL, NULL),
(11, 'har@gmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, 'Harsh', NULL, 2, 1, 0, 0, '2020-03-16 18:35:34', NULL, NULL, '3000', '2', 'complete', '2022-04-19 22:59:27', '5171447'),
(12, 'sukhi@gmail.com', 'e91ad51ae1c7ce9f2de2d19ab91cae5e', NULL, 'sukhi', NULL, 2, 0, 0, 0, '2020-03-16 23:28:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'harsh.wowz@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Harsh', NULL, 2, 1, 0, 0, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'harshkumar283@gmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, 'harsh', NULL, 2, 0, 0, 0, '2020-10-16 19:39:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'testing@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', NULL, 'testing', NULL, 2, 0, 0, 0, '2020-03-27 22:28:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, '16shivali@gmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, 'Shivali', NULL, 2, 0, 0, 0, '2020-10-16 20:00:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'Researcher@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Researcher', NULL, 3, 0, 0, 0, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 'scott.purcell@lnf.com', '21232f297a57a5a743894a0e4a801fc3', NULL, 'Scott', NULL, 2, 0, 0, 0, '2020-10-19 21:56:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'Zoning@gmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, 'Zoning', NULL, 2, 0, 0, 0, '2021-03-15 23:34:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'harsh@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Harsh', NULL, 3, 0, 0, 0, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'harshkumar382@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'harsh', NULL, 3, 0, 0, 0, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'Keshav.wowz@gmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, 'KeshavB', NULL, 2, 0, 0, 0, '2020-10-16 23:06:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 'vik@gmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, 'Harsh', NULL, 2, 0, 0, 0, '2021-03-17 15:36:05', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 'georgiamc@gmail.com', 'fe0b73f72b9145083d4c85f2a30c1042', NULL, 'Georgia', NULL, 2, 0, 0, 0, '2020-10-16 23:07:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 'shivali@gmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, 'Shivali', NULL, 2, 0, 0, 0, '2021-03-16 23:27:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 'tester1@gmail.com', '5a105e8b9d40e1329780d62ea2265d8a', NULL, 'test', NULL, 2, 0, 0, 0, '2021-03-19 00:05:02', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 'vikas@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Vikas', NULL, 2, 0, 0, 11, '2021-03-19 22:59:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 'Bkeshav.wowz@gmail.com', '0192023a7bbd73250516f069df18b500', NULL, 'Keshav', NULL, 2, 0, 0, 0, '2021-03-22 14:15:22', NULL, NULL, '2500', '1', 'complete', '2022-03-22 14:22:48', '5000'),
(73, 'Company@gmail.com', '0192023a7bbd73250516f069df18b500', NULL, 'Keshav', NULL, 2, 0, 0, 0, '2021-03-22 14:26:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'KB@gmail.com', '0192023a7bbd73250516f069df18b500', NULL, 'Keshav', NULL, 2, 0, 0, 0, '2021-03-22 14:49:44', NULL, NULL, '3000', '2', 'complete', '2022-03-22 14:50:32', '15000'),
(75, 'KK@gmail.com', '3f7caa3d471688b704b73e9a77b1107f', 'ADMIN123', 'KK', NULL, 2, 0, 0, 74, '2021-03-22 14:51:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 'bkb@gmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, 'Keshav', NULL, 2, 0, 0, 0, '2021-03-27 15:18:41', NULL, NULL, '3000', '2', 'complete', '2022-03-27 15:19:48', '14577'),
(77, 'Bkeshav@gmail.com', '0192023a7bbd73250516f069df18b500', NULL, 'Keshav', NULL, 2, 0, 0, 0, '2021-03-27 21:49:48', NULL, NULL, '3000', '2', 'complete', '2022-03-27 21:52:09', '14920'),
(78, 'Ron@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Ron', NULL, 2, 0, 0, 76, '2021-03-30 20:53:02', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
