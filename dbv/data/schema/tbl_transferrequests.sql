-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 02, 2019 at 10:07 AM
-- Server version: 10.3.12-MariaDB
-- PHP Version: 7.3.5

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuguru`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transferrequests`
--

CREATE TABLE `tbl_transferrequests` (
  `transferrequest_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `from_location` int(11) NOT NULL,
  `to_location` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(192) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_transferrequests`
--
ALTER TABLE `tbl_transferrequests`
  ADD PRIMARY KEY (`transferrequest_id`),
  ADD KEY `to_location` (`to_location`),
  ADD KEY `tbl_transferrequests_ibfk_1` (`employee_id`),
  ADD KEY `tbl_transferrequests_ibfk_2` (`from_location`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_transferrequests`
--
ALTER TABLE `tbl_transferrequests`
  MODIFY `transferrequest_id` int(11) NOT NULL AUTO_INCREMENT;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
