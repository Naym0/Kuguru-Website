-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2019 at 11:13 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

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
-- Table structure for table `tbl_employees`
--

CREATE TABLE `tbl_employees` (
  `employee_id` int(11) NOT NULL,
  `first_name` varchar(192) DEFAULT NULL,
  `last_name` varchar(192) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `suspended` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employees`
--

INSERT INTO `tbl_employees` (`employee_id`, `first_name`, `last_name`, `user_id`, `suspended`) VALUES
(1, 'Nicole', 'Muswanya', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locationemployees`
--

CREATE TABLE `tbl_locationemployees` (
  `locationemployees_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `end_date` date NOT NULL,
  `role` varchar(192) NOT NULL,
  `active` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_locationemployees`
--

INSERT INTO `tbl_locationemployees` (`locationemployees_id`, `location_id`, `employee_id`, `from_date`, `end_date`, `role`, `active`) VALUES
(1, 1, 1, '2019-07-24', '2019-07-27', 'personnel', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locations`
--

CREATE TABLE `tbl_locations` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(192) NOT NULL,
  `phone_number` varchar(32) DEFAULT NULL,
  `email` varchar(192) DEFAULT NULL,
  `suspended` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_locations`
--

INSERT INTO `tbl_locations` (`location_id`, `location_name`, `phone_number`, `email`, `suspended`) VALUES
(1, 'Nairobi', '0786142747', 'nairobi@kfcl.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `pickup_location` int(11) NOT NULL,
  `product_units` int(11) NOT NULL,
  `collection_date` date NOT NULL,
  `processed_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `processed_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(192) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transferrequests`
--

CREATE TABLE `tbl_transferrequests` (
  `transferrequest_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `from_location` int(11) NOT NULL,
  `to_location` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(192) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `token_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `token_expiry` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `valid` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`token_id`, `token`, `token_expiry`, `user_id`, `created_at`, `valid`) VALUES
(1, 'wuU0MwJGUXj7d43jYxhfyMH1gVY3XW', 7200, 1, '2019-05-30 10:41:18', 0),
(2, '94M98gRqmVuZgCoBKujbBEaL8G0BwD', 7200, 2, '2019-07-04 13:23:14', 1),
(3, '762nzVHPb5ROvdRmCKT8bOg8kHPNCh', 7200, 3, '2019-07-04 13:23:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` enum('admin','employee','customer') NOT NULL DEFAULT 'employee',
  `verified` tinyint(1) DEFAULT '0',
  `suspended` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_access` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `user_type`, `verified`, `suspended`, `created_at`, `last_access`) VALUES
(1, 'nicole.muswanya@strathmore.edu', '$2y$10$5TEP3wYWRWD/mRrRDZk0E.yaILmQEiYmq5aPMv4.QhjNrmaPPdvSO', 'admin', 1, 0, '2019-07-04 13:18:58', '2019-07-04 13:18:58'),
(2, 'nicole@strathmore.edu', NULL, 'employee', 0, 0, '2019-07-04 13:23:14', NULL),
(3, 'wanya@strathmore.edu', NULL, 'admin', 0, 0, '2019-07-04 13:23:42', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_locationemployees`
--
ALTER TABLE `tbl_locationemployees`
  ADD PRIMARY KEY (`locationemployees_id`),
  ADD KEY `location_id` (`location_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `tbl_locations`
--
ALTER TABLE `tbl_locations`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `pickup_location` (`pickup_location`),
  ADD KEY `processed_by` (`processed_by`);

--
-- Indexes for table `tbl_transferrequests`
--
ALTER TABLE `tbl_transferrequests`
  ADD PRIMARY KEY (`transferrequest_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `from_location` (`from_location`),
  ADD KEY `to_location` (`to_location`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`token_id`),
  ADD KEY `tokens_ibfk_1` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_locationemployees`
--
ALTER TABLE `tbl_locationemployees`
  MODIFY `locationemployees_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_locations`
--
ALTER TABLE `tbl_locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_transferrequests`
--
ALTER TABLE `tbl_transferrequests`
  MODIFY `transferrequest_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `token_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  ADD CONSTRAINT `tbl_employees_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `tbl_locationemployees`
--
ALTER TABLE `tbl_locationemployees`
  ADD CONSTRAINT `tbl_locationemployees_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `tbl_locations` (`location_id`),
  ADD CONSTRAINT `tbl_locationemployees_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employees` (`employee_id`);

--
-- Constraints for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `tbl_orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `tbl_orders_ibfk_2` FOREIGN KEY (`pickup_location`) REFERENCES `tbl_locations` (`location_id`),
  ADD CONSTRAINT `tbl_orders_ibfk_3` FOREIGN KEY (`processed_by`) REFERENCES `tbl_employees` (`employee_id`);

--
-- Constraints for table `tbl_transferrequests`
--
ALTER TABLE `tbl_transferrequests`
  ADD CONSTRAINT `tbl_transferrequests_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employees` (`employee_id`),
  ADD CONSTRAINT `tbl_transferrequests_ibfk_2` FOREIGN KEY (`from_location`) REFERENCES `tbl_locations` (`location_id`),
  ADD CONSTRAINT `tbl_transferrequests_ibfk_3` FOREIGN KEY (`to_location`) REFERENCES `tbl_locations` (`location_id`);

--
-- Constraints for table `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
