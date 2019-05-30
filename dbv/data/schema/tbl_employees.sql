CREATE TABLE `tbl_employees` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(192) DEFAULT NULL,
  `last_name` varchar(192) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `suspended` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`employee_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `tbl_employees_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1