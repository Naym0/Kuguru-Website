CREATE TABLE `tbl_locationemployees` (
  `locationemployees_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `end_date` date NOT NULL,
  `role` varchar(192) NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`locationemployees_id`),
  KEY `location_id` (`location_id`),
  KEY `employee_id` (`employee_id`),
  CONSTRAINT `tbl_locationemployees_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `tbl_locations` (`location_id`),
  CONSTRAINT `tbl_locationemployees_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employees` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1