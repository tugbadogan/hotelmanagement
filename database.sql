-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 26, 2014 at 10:47 PM
-- Server version: 5.5.28
-- PHP Version: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `hotel`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`hotel`@`localhost` PROCEDURE `get_available_rooms`(IN o_room_type varchar(50), IN o_checkin_date varchar(50), IN o_checkout_date varchar(50))
BEGIN
SELECT * FROM `room` WHERE room_type=o_room_type AND NOT EXISTS (
SELECT room_id FROM reservation WHERE reservation.room_id=room.room_id AND checkout_date >= o_checkin_date AND checkin_date <= o_checkout_date
UNION ALL
SELECT room_id FROM room_sales WHERE room_sales.room_id=room.room_id AND checkout_date >= o_checkin_date AND checkin_date <= o_checkout_date
);
END$$

CREATE DEFINER=`hotel`@`localhost` PROCEDURE `get_customers`(IN today_date varchar(50))
BEGIN
SELECT * FROM `room_sales` NATURAL JOIN `customer` WHERE checkout_date >= today_date AND checkin_date <= today_date;
END$$

CREATE DEFINER=`hotel`@`localhost` PROCEDURE `todays_service_count`(IN today_date varchar(50))
BEGIN
SELECT count(*) as amount, "laundry" as type FROM laundry_service WHERE laundry_date=today_date UNION ALL SELECT count(*) as amount, "massage" as type FROM massage_service WHERE massage_date=today_date UNION ALL SELECT count(*) as amount, "roomservice" as type FROM get_roomservice WHERE roomservice_date=today_date UNION ALL SELECT count(*) as amount, "medicalservice" as type FROM get_medicalservice WHERE medicalservice_date=today_date UNION ALL SELECT count(*) as amount, "sport" as type FROM do_sport WHERE dosport_date=today_date
UNION ALL SELECT count(*) as amount, "restaurant" as type FROM restaurant_booking WHERE book_date=today_date;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_firstname` varchar(50) NOT NULL,
  `customer_lastname` varchar(50) NOT NULL,
  `customer_TCno` varchar(11) NOT NULL,
  `customer_city` varchar(50) DEFAULT NULL,
  `customer_country` varchar(50) DEFAULT NULL,
  `customer_telephone` varchar(50) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(50) NOT NULL,
  `department_budget` float DEFAULT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `do_sport`
--

CREATE TABLE IF NOT EXISTS `do_sport` (
  `customer_id` int(11) NOT NULL,
  `sportfacility_id` int(11) NOT NULL,
  `dosport_date` varchar(50) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `dosport_details` text,
  `dosport_price` float DEFAULT NULL,
  PRIMARY KEY (`customer_id`,`sportfacility_id`,`dosport_date`),
  KEY `customer` (`customer_id`),
  KEY `sport_facility` (`sportfacility_id`),
  KEY `employee` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `do_sport`
--
DROP TRIGGER IF EXISTS `after_insert_sport_service`;
DELIMITER //
CREATE TRIGGER `after_insert_sport_service` AFTER INSERT ON `do_sport`
 FOR EACH ROW BEGIN
    UPDATE room_sales SET room_sales.total_service_price = room_sales.total_service_price + NEW.dosport_price WHERE room_sales.customer_id = NEW.customer_id AND room_sales.checkin_date <= NEW.dosport_date AND room_sales.checkout_date >= NEW.dosport_date;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `before_delete_sport_service`;
DELIMITER //
CREATE TRIGGER `before_delete_sport_service` BEFORE DELETE ON `do_sport`
 FOR EACH ROW BEGIN
    UPDATE room_sales SET room_sales.total_service_price = room_sales.total_service_price - OLD.dosport_price WHERE room_sales.customer_id = OLD.customer_id AND room_sales.checkin_date <= OLD.dosport_date AND room_sales.checkout_date >= OLD.dosport_date;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_username` varchar(50) NOT NULL,
  `employee_password` varchar(50) CHARACTER SET utf32 NOT NULL,
  `employee_firstname` varchar(50) NOT NULL,
  `employee_lastname` varchar(50) NOT NULL,
  `employee_telephone` varchar(50) DEFAULT NULL,
  `employee_email` varchar(50) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `employee_type` varchar(50) NOT NULL,
  `employee_salary` float DEFAULT NULL,
  `employee_hiring_date` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`employee_id`),
  UNIQUE KEY `username` (`employee_username`),
  UNIQUE KEY `email` (`employee_email`),
  KEY `department` (`department_id`),
  KEY `login` (`employee_username`,`employee_password`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

-- --------------------------------------------------------

--
-- Table structure for table `get_medicalservice`
--

CREATE TABLE IF NOT EXISTS `get_medicalservice` (
  `customer_id` int(11) NOT NULL,
  `medicalservice_id` int(11) NOT NULL,
  `medicalservice_date` varchar(50) CHARACTER SET utf8 NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `getmedicalservice_details` text CHARACTER SET utf8,
  `medicalservice_price` float DEFAULT NULL,
  PRIMARY KEY (`customer_id`,`medicalservice_id`,`medicalservice_date`),
  KEY `customer` (`customer_id`),
  KEY `medical_service` (`medicalservice_id`),
  KEY `employee` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Triggers `get_medicalservice`
--
DROP TRIGGER IF EXISTS `after_insert_medical_service`;
DELIMITER //
CREATE TRIGGER `after_insert_medical_service` AFTER INSERT ON `get_medicalservice`
 FOR EACH ROW BEGIN
    UPDATE room_sales SET room_sales.total_service_price = room_sales.total_service_price + NEW.medicalservice_price WHERE room_sales.customer_id = NEW.customer_id AND room_sales.checkin_date <= NEW.medicalservice_date AND room_sales.checkout_date >= NEW.medicalservice_date;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `after_delete_medical_service`;
DELIMITER //
CREATE TRIGGER `after_delete_medical_service` BEFORE DELETE ON `get_medicalservice`
 FOR EACH ROW BEGIN
    UPDATE room_sales SET room_sales.total_service_price = room_sales.total_service_price - OLD.medicalservice_price WHERE room_sales.customer_id = OLD.customer_id AND room_sales.checkin_date <= OLD.medicalservice_date AND room_sales.checkout_date >= OLD.medicalservice_date;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `get_roomservice`
--

CREATE TABLE IF NOT EXISTS `get_roomservice` (
  `customer_id` int(11) NOT NULL,
  `roomservice_id` int(11) NOT NULL,
  `roomservice_date` varchar(50) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `getroomservice_details` text,
  `roomservice_price` float DEFAULT NULL,
  PRIMARY KEY (`customer_id`,`roomservice_id`,`roomservice_date`),
  KEY `customer` (`customer_id`),
  KEY `room_service` (`roomservice_id`),
  KEY `employee` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `get_roomservice`
--
DROP TRIGGER IF EXISTS `after_insert_room_service`;
DELIMITER //
CREATE TRIGGER `after_insert_room_service` AFTER INSERT ON `get_roomservice`
 FOR EACH ROW BEGIN
    UPDATE room_sales SET room_sales.total_service_price = room_sales.total_service_price + NEW.roomservice_price WHERE room_sales.customer_id = NEW.customer_id AND room_sales.checkin_date <= NEW.roomservice_date AND room_sales.checkout_date >= NEW.roomservice_date;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `before_delete_room_service`;
DELIMITER //
CREATE TRIGGER `before_delete_room_service` BEFORE DELETE ON `get_roomservice`
 FOR EACH ROW BEGIN
    UPDATE room_sales SET room_sales.total_service_price = room_sales.total_service_price - OLD.roomservice_price WHERE room_sales.customer_id = OLD.customer_id AND room_sales.checkin_date <= OLD.roomservice_date AND room_sales.checkout_date >= OLD.roomservice_date;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `laundry`
--

CREATE TABLE IF NOT EXISTS `laundry` (
  `laundry_id` int(11) NOT NULL AUTO_INCREMENT,
  `laundry_open_time` varchar(50) DEFAULT NULL,
  `laundry_close_time` varchar(50) DEFAULT NULL,
  `laundry_details` text,
  PRIMARY KEY (`laundry_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `laundry_service`
--

CREATE TABLE IF NOT EXISTS `laundry_service` (
  `customer_id` int(11) NOT NULL,
  `laundry_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `laundry_date` varchar(50) DEFAULT NULL,
  `laundry_amount` int(11) DEFAULT NULL,
  `laundry_price` float DEFAULT NULL,
  PRIMARY KEY (`customer_id`,`laundry_id`),
  KEY `customer` (`customer_id`),
  KEY `laundry` (`laundry_id`),
  KEY `employee` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `laundry_service`
--
DROP TRIGGER IF EXISTS `after_insert_laundry_service`;
DELIMITER //
CREATE TRIGGER `after_insert_laundry_service` AFTER INSERT ON `laundry_service`
 FOR EACH ROW BEGIN
    UPDATE room_sales SET room_sales.total_service_price = room_sales.total_service_price + NEW.laundry_price WHERE room_sales.customer_id = NEW.customer_id AND room_sales.checkin_date <= NEW.laundry_date AND room_sales.checkout_date >= NEW.laundry_date;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `before_delete_laundry_service`;
DELIMITER //
CREATE TRIGGER `before_delete_laundry_service` BEFORE DELETE ON `laundry_service`
 FOR EACH ROW BEGIN
    UPDATE room_sales SET room_sales.total_service_price = room_sales.total_service_price - OLD.laundry_price WHERE room_sales.customer_id = OLD.customer_id AND room_sales.checkin_date <= OLD.laundry_date AND room_sales.checkout_date >= OLD.laundry_date;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `massage_room`
--

CREATE TABLE IF NOT EXISTS `massage_room` (
  `massageroom_id` int(11) NOT NULL AUTO_INCREMENT,
  `massageroom_open_time` varchar(10) DEFAULT NULL,
  `massageroom_close_time` varchar(10) DEFAULT NULL,
  `massageroom_details` text,
  PRIMARY KEY (`massageroom_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `massage_service`
--

CREATE TABLE IF NOT EXISTS `massage_service` (
  `customer_id` int(11) NOT NULL,
  `massageroom_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `massage_date` varchar(50) DEFAULT NULL,
  `massage_details` text,
  `massage_price` float DEFAULT NULL,
  PRIMARY KEY (`customer_id`,`massageroom_id`),
  KEY `customer` (`customer_id`),
  KEY `massage` (`massageroom_id`),
  KEY `employee` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `massage_service`
--
DROP TRIGGER IF EXISTS `after_insert_massage_service`;
DELIMITER //
CREATE TRIGGER `after_insert_massage_service` AFTER INSERT ON `massage_service`
 FOR EACH ROW BEGIN
    UPDATE room_sales SET room_sales.total_service_price = room_sales.total_service_price + NEW.massage_price WHERE room_sales.customer_id = NEW.customer_id AND room_sales.checkin_date <= NEW.massage_date AND room_sales.checkout_date >= NEW.massage_date;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `before_delete_massage_service`;
DELIMITER //
CREATE TRIGGER `before_delete_massage_service` BEFORE DELETE ON `massage_service`
 FOR EACH ROW BEGIN
    UPDATE room_sales SET room_sales.total_service_price = room_sales.total_service_price - OLD.massage_price WHERE room_sales.customer_id = OLD.customer_id AND room_sales.checkin_date <= OLD.massage_date AND room_sales.checkout_date >= OLD.massage_date;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `medical_service`
--

CREATE TABLE IF NOT EXISTS `medical_service` (
  `medicalservice_id` int(11) NOT NULL AUTO_INCREMENT,
  `medicalservice_open_time` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `medicalservice_close_time` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `medicalservice_details` text CHARACTER SET utf8,
  PRIMARY KEY (`medicalservice_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `customer_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `checkin_date` varchar(50) NOT NULL,
  `checkout_date` varchar(50) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `reservation_date` varchar(50) DEFAULT NULL,
  `reservation_price` float DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`customer_id`,`room_id`,`checkin_date`),
  KEY `customer` (`customer_id`),
  KEY `employee` (`employee_id`),
  KEY `room` (`room_id`),
  KEY `availability` (`room_id`,`checkin_date`,`checkout_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE IF NOT EXISTS `restaurant` (
  `restaurant_name` varchar(50) NOT NULL,
  `restaurant_open_time` varchar(10) DEFAULT NULL,
  `restaurant_close_time` varchar(10) DEFAULT NULL,
  `restaurant_details` text,
  `table_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`restaurant_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_booking`
--

CREATE TABLE IF NOT EXISTS `restaurant_booking` (
  `restaurant_name` varchar(50) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `book_date` varchar(50) NOT NULL,
  `table_number` int(11) DEFAULT NULL,
  `book_price` float DEFAULT NULL,
  PRIMARY KEY (`restaurant_name`,`customer_id`,`book_date`),
  KEY `restaurant` (`restaurant_name`),
  KEY `customer` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `restaurant_booking`
--
DROP TRIGGER IF EXISTS `after_insert_restaurant_service`;
DELIMITER //
CREATE TRIGGER `after_insert_restaurant_service` AFTER INSERT ON `restaurant_booking`
 FOR EACH ROW BEGIN
    UPDATE room_sales SET room_sales.total_service_price = room_sales.total_service_price + NEW.book_price WHERE room_sales.customer_id = NEW.customer_id AND room_sales.checkin_date <= NEW.book_date AND room_sales.checkout_date >= NEW.book_date;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `before_delete_restaurant_service`;
DELIMITER //
CREATE TRIGGER `before_delete_restaurant_service` BEFORE DELETE ON `restaurant_booking`
 FOR EACH ROW BEGIN
    UPDATE room_sales SET room_sales.total_service_price = room_sales.total_service_price - OLD.book_price WHERE room_sales.customer_id = OLD.customer_id AND room_sales.checkin_date <= OLD.book_date AND room_sales.checkout_date >= OLD.book_date;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`room_id`),
  KEY `room_type` (`room_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=201 ;

--
-- Triggers `room`
--
DROP TRIGGER IF EXISTS `after_insert_room`;
DELIMITER //
CREATE TRIGGER `after_insert_room` AFTER INSERT ON `room`
 FOR EACH ROW BEGIN
    UPDATE room_type SET room_type.room_quantity =room_type.room_quantity + 1 WHERE room_type.room_type = NEW.room_type;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `before_delete_room`;
DELIMITER //
CREATE TRIGGER `before_delete_room` BEFORE DELETE ON `room`
 FOR EACH ROW BEGIN
    UPDATE room_type SET room_type.room_quantity =room_type.room_quantity - 1 WHERE room_type.room_type = OLD.room_type;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `room_sales`
--

CREATE TABLE IF NOT EXISTS `room_sales` (
  `customer_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `checkin_date` varchar(50) NOT NULL,
  `checkout_date` varchar(50) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `room_sales_price` float DEFAULT NULL,
  `total_service_price` float DEFAULT NULL,
  PRIMARY KEY (`customer_id`,`room_id`,`checkin_date`),
  KEY `customer` (`customer_id`),
  KEY `employee` (`employee_id`),
  KEY `room` (`room_id`),
  KEY `availability` (`room_id`,`checkin_date`,`checkout_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `room_service`
--

CREATE TABLE IF NOT EXISTS `room_service` (
  `roomservice_id` int(11) NOT NULL AUTO_INCREMENT,
  `roomservice_open_time` varchar(50) DEFAULT NULL,
  `roomservice_close_time` varchar(50) DEFAULT NULL,
  `roomservice_floor` varchar(50) DEFAULT NULL,
  `roomservice_details` text,
  PRIMARY KEY (`roomservice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE IF NOT EXISTS `room_type` (
  `room_type` varchar(50) NOT NULL,
  `room_price` int(11) DEFAULT NULL,
  `room_details` text,
  `room_quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`room_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sport_facilities`
--

CREATE TABLE IF NOT EXISTS `sport_facilities` (
  `sportfacility_id` int(11) NOT NULL AUTO_INCREMENT,
  `sportfacility_open_time` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `sportfacility_close_time` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `sportfacility_details` text CHARACTER SET utf8,
  PRIMARY KEY (`sportfacility_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `do_sport`
--
ALTER TABLE `do_sport`
  ADD CONSTRAINT `do_sport_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `do_sport_ibfk_2` FOREIGN KEY (`sportfacility_id`) REFERENCES `sport_facilities` (`sportfacility_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `do_sport_ibfk_3` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `get_medicalservice`
--
ALTER TABLE `get_medicalservice`
  ADD CONSTRAINT `get_medicalservice_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `get_medicalservice_ibfk_2` FOREIGN KEY (`medicalservice_id`) REFERENCES `medical_service` (`medicalservice_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `get_medicalservice_ibfk_3` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `get_roomservice`
--
ALTER TABLE `get_roomservice`
  ADD CONSTRAINT `get_roomservice_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `get_roomservice_ibfk_2` FOREIGN KEY (`roomservice_id`) REFERENCES `room_service` (`roomservice_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `get_roomservice_ibfk_3` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laundry_service`
--
ALTER TABLE `laundry_service`
  ADD CONSTRAINT `laundry_service_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `laundry_service_ibfk_2` FOREIGN KEY (`laundry_id`) REFERENCES `laundry` (`laundry_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `laundry_service_ibfk_3` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `massage_service`
--
ALTER TABLE `massage_service`
  ADD CONSTRAINT `massage_service_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `massage_service_ibfk_2` FOREIGN KEY (`massageroom_id`) REFERENCES `massage_room` (`massageroom_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `massage_service_ibfk_3` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restaurant_booking`
--
ALTER TABLE `restaurant_booking`
  ADD CONSTRAINT `restaurant_booking_ibfk_1` FOREIGN KEY (`restaurant_name`) REFERENCES `restaurant` (`restaurant_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `restaurant_booking_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`room_type`) REFERENCES `room_type` (`room_type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room_sales`
--
ALTER TABLE `room_sales`
  ADD CONSTRAINT `room_sales_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_sales_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_sales_ibfk_3` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

