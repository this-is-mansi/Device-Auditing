-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2024 at 12:56 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data`
--

-- --------------------------------------------------------

--
-- Table structure for table `allsheets`
--

CREATE TABLE `allsheets` (
  `id` int(11) NOT NULL,
  `asset_head` varchar(50) DEFAULT NULL,
  `asset_tag` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `obt_tag` varchar(100) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `AuditOn` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Location` varchar(100) DEFAULT NULL,
  `quantity` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allsheets`
--

INSERT INTO `allsheets` (`id`, `asset_head`, `asset_tag`, `description`, `obt_tag`, `status`, `AuditOn`, `Location`, `quantity`) VALUES
(1, 'Printer', '32000476', 'Canon Printer', '32000493', 'Audited', '2024-02-16 10:01:25', 'Phugewadi', 1),
(2, 'Desktop', '32000493', 'Lenovo Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 1),
(3, 'Desktop', '32000523', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Range Hill', 1),
(4, 'Desktop', '32000562', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 1),
(5, 'Desktop', '32000615', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 1),
(6, 'Desktop', '32000630', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 1),
(7, 'Desktop', '32000465', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 5),
(8, 'Desktop', '32000193', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 2),
(9, 'Desktop', '32000466', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 1),
(10, 'Desktop', '32000474', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Civil Court', 1),
(11, 'Desktop', '32000475', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Civil Court', 1),
(12, 'Desktop', '32000477', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Civil Court', 1),
(13, 'Desktop', '32000394', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Civil Court', 1),
(14, 'Desktop', '32000469', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Civil Court', 1),
(15, 'Printer', '32000476', 'Canon Printer', '32000493', 'Audited', '2024-02-16 10:01:25', 'Phugewadi', 1),
(16, 'Desktop', '32000493', 'Lenovo Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 1),
(17, 'Desktop', '32000523', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Range Hill', 1),
(18, 'Desktop', '32000562', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 1),
(19, 'Desktop', '32000615', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 1),
(20, 'Desktop', '32000630', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 1),
(21, 'Desktop', '32000465', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 5),
(22, 'Desktop', '32000193', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 2),
(23, 'Desktop', '32000466', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 1),
(24, 'Desktop', '32000474', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Civil Court', 1),
(25, 'Desktop', '32000475', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Civil Court', 1),
(26, 'Desktop', '32000477', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Civil Court', 1),
(27, 'Desktop', '32000394', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Civil Court', 1),
(28, 'Desktop', '32000469', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Civil Court', 1),
(29, 'Printer', '32000476', 'Canon Printer', '32000493', 'Audited', '2024-02-16 10:01:25', 'Phugewadi', 1),
(30, 'Desktop', '32000493', 'Lenovo Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 1),
(31, 'Desktop', '32000523', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Range Hill', 1),
(32, 'Desktop', '32000562', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 1),
(33, 'Desktop', '32000615', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 1),
(34, 'Desktop', '32000630', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 1),
(35, 'Desktop', '32000465', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 5),
(36, 'Desktop', '32000193', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 2),
(37, 'Desktop', '32000466', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 1),
(38, 'Desktop', '32000474', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Civil Court', 1),
(39, 'Desktop', '32000475', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Civil Court', 1),
(40, 'Desktop', '32000477', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Civil Court', 1),
(41, 'Desktop', '32000394', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Civil Court', 1),
(42, 'Desktop', '32000469', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Civil Court', 1),
(43, 'Printer', '32000476', 'Canon Printer', '32000493', 'Audited', '2024-02-16 10:01:25', 'Phugewadi', 1),
(44, 'Desktop', '32000493', 'Lenovo Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 1),
(45, 'Desktop', '32000523', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Range Hill', 1),
(46, 'Desktop', '32000562', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 1),
(47, 'Desktop', '32000615', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 1),
(48, 'Desktop', '32000630', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 1),
(49, 'Desktop', '32000465', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 5),
(50, 'Desktop', '32000193', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 2),
(51, 'Desktop', '32000466', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 1),
(52, 'Desktop', '32000474', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Civil Court', 1),
(53, 'Desktop', '32000475', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Civil Court', 1),
(54, 'Desktop', '32000477', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Civil Court', 1),
(55, 'Desktop', '32000394', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Civil Court', 1),
(56, 'Desktop', '32000469', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Civil Court', 1),
(57, 'Printer', '32000476', 'Canon Printer', '32000493', 'Audited', '2024-02-16 10:01:25', 'Phugewadi', 1),
(58, 'Desktop', '32000493', 'Lenovo Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 1),
(59, 'Desktop', '32000523', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Range Hill', 1),
(60, 'Desktop', '32000562', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 1),
(61, 'Desktop', '32000615', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 1),
(62, 'Desktop', '32000630', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 1),
(63, 'Desktop', '32000465', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 5),
(64, 'Desktop', '32000193', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 2),
(65, 'Desktop', '32000466', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 1),
(66, 'Desktop', '32000474', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Civil Court', 1),
(67, 'Desktop', '32000475', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Civil Court', 1),
(68, 'Desktop', '32000477', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Civil Court', 1),
(69, 'Desktop', '32000394', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Civil Court', 1),
(70, 'Desktop', '32000469', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Civil Court', 1),
(71, 'Printer', '32000476', 'Canon Printer', '32000493', 'Audited', '2024-02-16 10:01:25', 'Phugewadi', 1),
(72, 'Desktop', '32000493', 'Lenovo Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 1),
(73, 'Desktop', '32000523', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Range Hill', 1),
(74, 'Desktop', '32000562', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 1),
(75, 'Desktop', '32000615', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 1),
(76, 'Desktop', '32000630', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 1),
(77, 'Desktop', '32000465', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 5),
(78, 'Desktop', '32000193', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 2),
(79, 'Desktop', '32000466', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Koregaon Park', 1),
(80, 'Desktop', '32000474', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Civil Court', 1),
(81, 'Desktop', '32000475', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Civil Court', 1),
(82, 'Desktop', '32000477', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Civil Court', 1),
(83, 'Desktop', '32000394', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Civil Court', 1),
(84, 'Desktop', '32000469', 'Dell Desktop', '32000493', 'Audited', '2024-02-16 10:01:25', 'Civil Court', 1),
(85, 'Printer', '32000476', 'Canon Printer', NULL, NULL, NULL, 'Phugewadi', 1),
(86, 'Desktop', '32000493', 'Lenovo Desktop', NULL, NULL, NULL, 'Koregaon Park', 1),
(87, 'Desktop', '32000523', 'Dell Desktop', NULL, NULL, NULL, 'Range Hill', 1),
(88, 'Desktop', '32000562', 'Dell Desktop', NULL, NULL, NULL, 'Koregaon Park', 1),
(89, 'Desktop', '32000615', 'Dell Desktop', NULL, NULL, NULL, 'Koregaon Park', 1),
(90, 'Desktop', '32000630', 'Dell Desktop', NULL, NULL, NULL, 'Koregaon Park', 1),
(91, 'Desktop', '32000465', 'Dell Desktop', NULL, NULL, NULL, 'Koregaon Park', 5),
(92, 'Desktop', '32000193', 'Dell Desktop', NULL, NULL, NULL, 'Koregaon Park', 2),
(93, 'Desktop', '32000466', 'Dell Desktop', NULL, NULL, NULL, 'Koregaon Park', 1),
(94, 'Desktop', '32000474', 'Dell Desktop', NULL, NULL, NULL, 'Civil Court', 1),
(95, 'Desktop', '32000475', 'Dell Desktop', NULL, NULL, NULL, 'Civil Court', 1),
(96, 'Desktop', '32000477', 'Dell Desktop', NULL, NULL, NULL, 'Civil Court', 1),
(97, 'Desktop', '32000394', 'Dell Desktop', NULL, NULL, NULL, 'Civil Court', 1),
(98, 'Desktop', '32000469', 'Dell Desktop', NULL, NULL, NULL, 'Civil Court', 1);

-- --------------------------------------------------------

--
-- Table structure for table `asset_data`
--

CREATE TABLE `asset_data` (
  `id` int(11) NOT NULL,
  `asset_head` varchar(50) DEFAULT NULL,
  `asset_tag` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `obt_tag` varchar(100) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `AuditOn` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Location` varchar(100) DEFAULT NULL,
  `quantity` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asset_data`
--

INSERT INTO `asset_data` (`id`, `asset_head`, `asset_tag`, `description`, `obt_tag`, `status`, `AuditOn`, `Location`, `quantity`) VALUES
(1, 'Desktop', '32000474', 'Dell Desktop', NULL, NULL, NULL, 'Civil Court', 1),
(2, 'Desktop', '32000475', 'Dell Desktop', NULL, NULL, NULL, 'Civil Court', 1),
(3, 'Desktop', '32000477', 'Dell Desktop', NULL, NULL, NULL, 'Civil Court', 1),
(4, 'Desktop', '32000394', 'Dell Desktop', NULL, NULL, NULL, 'Civil Court', 1),
(5, 'Desktop', '32000469', 'Dell Desktop', NULL, NULL, NULL, 'Civil Court', 1);

-- --------------------------------------------------------

--
-- Table structure for table `backup_table`
--

CREATE TABLE `backup_table` (
  `id` int(11) NOT NULL,
  `asset_head` varchar(50) DEFAULT NULL,
  `asset_tag` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `obt_tag` varchar(100) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `AuditOn` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Location` varchar(100) DEFAULT NULL,
  `quantity` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `backup_table`
--

INSERT INTO `backup_table` (`id`, `asset_head`, `asset_tag`, `description`, `obt_tag`, `status`, `AuditOn`, `Location`, `quantity`) VALUES
(1, 'Printer', '32000476', 'Canon Printer', NULL, NULL, NULL, 'Phugewadi', 1),
(2, 'Desktop', '32000493', 'Lenovo Desktop', NULL, NULL, NULL, 'Koregaon Park', 1),
(3, 'Desktop', '32000523', 'Dell Desktop', NULL, NULL, NULL, 'Range Hill', 1),
(4, 'Desktop', '32000562', 'Dell Desktop', NULL, NULL, NULL, 'Koregaon Park', 1),
(5, 'Desktop', '32000615', 'Dell Desktop', NULL, NULL, NULL, 'Koregaon Park', 1),
(6, 'Desktop', '32000630', 'Dell Desktop', NULL, NULL, NULL, 'Koregaon Park', 1),
(7, 'Desktop', '32000465', 'Dell Desktop', NULL, NULL, NULL, 'Koregaon Park', 5),
(8, 'Desktop', '32000193', 'Dell Desktop', NULL, NULL, NULL, 'Koregaon Park', 2),
(9, 'Desktop', '32000466', 'Dell Desktop', NULL, NULL, NULL, 'Koregaon Park', 1),
(10, 'Desktop', '32000474', 'Dell Desktop', NULL, NULL, NULL, 'Civil Court', 1),
(11, 'Desktop', '32000475', 'Dell Desktop', NULL, NULL, NULL, 'Civil Court', 1),
(12, 'Desktop', '32000477', 'Dell Desktop', NULL, NULL, NULL, 'Civil Court', 1),
(13, 'Desktop', '32000394', 'Dell Desktop', NULL, NULL, NULL, 'Civil Court', 1),
(14, 'Desktop', '32000469', 'Dell Desktop', NULL, NULL, NULL, 'Civil Court', 1);

-- --------------------------------------------------------

--
-- Table structure for table `location_tbl`
--

CREATE TABLE `location_tbl` (
  `id` int(11) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location_tbl`
--

INSERT INTO `location_tbl` (`id`, `location`) VALUES
(10, 'Civil Court'),
(2, 'Koregaon Park'),
(1, 'Phugewadi'),
(3, 'Range Hill');

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE `login_table` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`id`, `name`, `mobile`, `designation`, `department`) VALUES
(27, 'Mansi Sachin Kothale', '8262990252', 'abcd', 'asdfsdg');

-- --------------------------------------------------------

--
-- Table structure for table `not found asset`
--

CREATE TABLE `not found asset` (
  `id` int(30) NOT NULL,
  `asset_tag` int(50) DEFAULT NULL,
  `ScannedOn` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `not_found_asset`
--

CREATE TABLE `not_found_asset` (
  `id` int(11) NOT NULL,
  `asset_tag` varchar(255) NOT NULL,
  `ScannedOn` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `scanned_data`
--

CREATE TABLE `scanned_data` (
  `asset_tag` varchar(255) NOT NULL,
  `id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allsheets`
--
ALTER TABLE `allsheets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_data`
--
ALTER TABLE `asset_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_asset_tag` (`asset_tag`);

--
-- Indexes for table `backup_table`
--
ALTER TABLE `backup_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_asset_tag` (`asset_tag`);

--
-- Indexes for table `location_tbl`
--
ALTER TABLE `location_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `location` (`location`);

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `not found asset`
--
ALTER TABLE `not found asset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `not_found_asset`
--
ALTER TABLE `not_found_asset`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_asset_tag` (`asset_tag`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allsheets`
--
ALTER TABLE `allsheets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `asset_data`
--
ALTER TABLE `asset_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `backup_table`
--
ALTER TABLE `backup_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `location_tbl`
--
ALTER TABLE `location_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `login_table`
--
ALTER TABLE `login_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `not_found_asset`
--
ALTER TABLE `not_found_asset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
