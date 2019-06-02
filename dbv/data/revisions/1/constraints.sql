--
-- Constraints for dumped tables
--

--
-- Constraints for table `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  ADD CONSTRAINT `tbl_employees_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_locationemployees`
--
ALTER TABLE `tbl_locationemployees`
  ADD CONSTRAINT `tbl_locationemployees_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `tbl_locations` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_locationemployees_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;


--
-- Constraints for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `tbl_orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_orders_ibfk_2` FOREIGN KEY (`pickup_location`) REFERENCES `tbl_locations` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_orders_ibfk_3` FOREIGN KEY (`processed_by`) REFERENCES `tbl_employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;


--
-- Constraints for table `tbl_transferrequests`
--
ALTER TABLE `tbl_transferrequests`
  ADD CONSTRAINT `tbl_transferrequests_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_transferrequests_ibfk_2` FOREIGN KEY (`from_location`) REFERENCES `tbl_locations` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_transferrequests_ibfk_3` FOREIGN KEY (`to_location`) REFERENCES `tbl_locations` (`location_id`);
