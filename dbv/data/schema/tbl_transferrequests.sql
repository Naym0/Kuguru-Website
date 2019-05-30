CREATE TABLE `tbl_transferrequests` (
  `transferrequest_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `from_location` int(11) NOT NULL,
  `to_location` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(192) DEFAULT 'pending',
  PRIMARY KEY (`transferrequest_id`),
  KEY `employee_id` (`employee_id`),
  KEY `from_location` (`from_location`),
  KEY `to_location` (`to_location`),
  CONSTRAINT `tbl_transferrequests_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employees` (`employee_id`),
  CONSTRAINT `tbl_transferrequests_ibfk_2` FOREIGN KEY (`from_location`) REFERENCES `tbl_locations` (`location_id`),
  CONSTRAINT `tbl_transferrequests_ibfk_3` FOREIGN KEY (`to_location`) REFERENCES `tbl_locations` (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1