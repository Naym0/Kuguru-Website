CREATE TABLE `tbl_orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `pickup_location` int(11) NOT NULL,
  `product_units` int(11) NOT NULL,
  `collection_date` date NOT NULL,
  `processed_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `processed_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(192) DEFAULT 'pending',
  PRIMARY KEY (`order_id`),
  KEY `customer_id` (`customer_id`),
  KEY `pickup_location` (`pickup_location`),
  KEY `processed_by` (`processed_by`),
  CONSTRAINT `tbl_orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `tbl_orders_ibfk_2` FOREIGN KEY (`pickup_location`) REFERENCES `tbl_locations` (`location_id`),
  CONSTRAINT `tbl_orders_ibfk_3` FOREIGN KEY (`processed_by`) REFERENCES `tbl_employees` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1