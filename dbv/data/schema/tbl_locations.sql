CREATE TABLE `tbl_locations` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(192) NOT NULL,
  `phone_number` varchar(32) DEFAULT NULL,
  `email` varchar(192) DEFAULT NULL,
  `suspended` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1