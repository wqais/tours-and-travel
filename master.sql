-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 01, 2023 at 11:50 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `master`
--

-- --------------------------------------------------------

--
-- Table structure for table `accomodation`
--

DROP TABLE IF EXISTS `accomodation`;
CREATE TABLE IF NOT EXISTS `accomodation` (
  `hotel_id` int NOT NULL AUTO_INCREMENT,
  `tour_id` int NOT NULL,
  `hotel_name` varchar(30) NOT NULL,
  PRIMARY KEY (`hotel_id`),
  KEY `tour_id` (`tour_id`),
  KEY `hotel_name` (`hotel_name`)
) ENGINE=InnoDB AUTO_INCREMENT=20029 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `accomodation`
--

INSERT INTO `accomodation` (`hotel_id`, `tour_id`, `hotel_name`) VALUES
(20001, 1001, 'Beachy Vibes'),
(20002, 1001, 'Hotel Chef\'s Diner'),
(20003, 1002, 'Hotel Chill Vibes'),
(20004, 1003, 'Green Hotel'),
(20005, 1003, 'Hotel Amazon'),
(20006, 1004, 'Ei Feel Hotel'),
(20007, 1004, 'Hotel City Of Love'),
(20008, 1005, 'Jungle King Hotel'),
(20009, 1006, 'Cold Vibes Hotel'),
(20010, 1006, 'Diamond Services'),
(20011, 1007, 'Silver Queen Hotel'),
(20013, 1008, 'Ichi Go'),
(20014, 1008, 'Hotel Gum Gum '),
(20015, 1009, 'Hotel Ava Black'),
(20016, 1010, 'Icy Stay'),
(20017, 1011, 'Hotel Oceania'),
(20018, 1011, 'Relax Hotel'),
(20019, 1012, 'Hotel Jagdamba'),
(20021, 1012, 'BaseLine Camp'),
(20022, 1013, 'Red Flag Hotel'),
(20023, 1014, 'Desserty Vibes'),
(20024, 1014, 'Hotel Pyramids Are Us'),
(20025, 1015, 'Burj Itachi'),
(20026, 1015, 'Hotel Shukran'),
(20027, 1016, 'WildCard Hotel'),
(20028, 1017, 'Machu Hotel');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(30) NOT NULL,
  `admin_password_hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `admin_email` (`admin_email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password_hash`) VALUES
(2, 'admin2@gmail.com', '$2y$10$VvMvfQggdGxrcF5LUUHEOOnm/Y9n98TJSaiiU1ALDYGZCp4Z0AQOK');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE IF NOT EXISTS `bill` (
  `bill_id` int NOT NULL AUTO_INCREMENT,
  `tour_id` int NOT NULL,
  `cust_id` int NOT NULL,
  `adult_seats_cost` int NOT NULL,
  `child_seats_cost` int NOT NULL,
  `bill_date` date NOT NULL,
  `payment_mode` varchar(20) NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_id`, `tour_id`, `cust_id`, `adult_seats_cost`, `child_seats_cost`, `bill_date`, `payment_mode`) VALUES
(4, 1003, 7001, 180000, 108000, '2023-03-23', 'Debit Card'),
(3, 1002, 7001, 40000, 6000, '2023-03-16', 'Credit Card'),
(5, 1008, 7001, 150000, 90000, '2023-08-03', 'Net Banking'),
(6, 1013, 7001, 700000, 105000, '0000-00-00', 'Debit Card');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `book_id` int NOT NULL AUTO_INCREMENT,
  `cust_id` int NOT NULL,
  `pack_id` int NOT NULL,
  `adult_seat` int NOT NULL,
  `child_seat` int NOT NULL,
  `time_of_booking` time NOT NULL,
  PRIMARY KEY (`book_id`),
  KEY `cust_id` (`cust_id`),
  KEY `pack_id` (`pack_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13018 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`book_id`, `cust_id`, `pack_id`, `adult_seat`, `child_seat`, `time_of_booking`) VALUES
(13014, 7001, 3002, 2, 1, '00:00:00'),
(13015, 7001, 3003, 1, 2, '18:23:06'),
(13016, 7001, 3008, 1, 2, '18:26:31'),
(13017, 7001, 3013, 2, 1, '18:28:45');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

DROP TABLE IF EXISTS `bus`;
CREATE TABLE IF NOT EXISTS `bus` (
  `bus_id` int NOT NULL AUTO_INCREMENT,
  `tour_id` int NOT NULL,
  `total_seats` int NOT NULL,
  `adult_seats` int NOT NULL,
  `available_adult_seats` int NOT NULL,
  `child_seats` int NOT NULL,
  `available_child_seats` int NOT NULL,
  `dept_city` varchar(20) NOT NULL,
  `final_city` varchar(20) NOT NULL,
  `final_city_opt` varchar(20) NOT NULL,
  PRIMARY KEY (`bus_id`),
  KEY `INDEX` (`tour_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8004 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bus_id`, `tour_id`, `total_seats`, `adult_seats`, `available_adult_seats`, `child_seats`, `available_child_seats`, `dept_city`, `final_city`, `final_city_opt`) VALUES
(8001, 1002, 80, 58, 42, 20, 11, 'Mumbai', 'Goa', ''),
(8002, 1012, 150, 120, 120, 30, 30, 'Mumbai', 'Leh', '');

-- --------------------------------------------------------

--
-- Table structure for table `cruise`
--

DROP TABLE IF EXISTS `cruise`;
CREATE TABLE IF NOT EXISTS `cruise` (
  `cruise_id` int NOT NULL AUTO_INCREMENT,
  `tour_id` int NOT NULL,
  `total_seats` int NOT NULL,
  `adult_seats` int NOT NULL,
  `available_adult_seats` int NOT NULL,
  `child_seats` int NOT NULL,
  `available_child_seats` int NOT NULL,
  `dept_city` varchar(20) NOT NULL,
  `final_city` varchar(20) NOT NULL,
  `final_city_opt` varchar(30) NOT NULL,
  PRIMARY KEY (`cruise_id`),
  KEY `INDEX` (`tour_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cruise`
--

INSERT INTO `cruise` (`cruise_id`, `tour_id`, `total_seats`, `adult_seats`, `available_adult_seats`, `child_seats`, `available_child_seats`, `dept_city`, `final_city`, `final_city_opt`) VALUES
(1, 1009, 3000, 2500, 2497, 500, 496, 'Mumbai', 'Havana', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `cust_id` int NOT NULL AUTO_INCREMENT,
  `cust_fname` varchar(20) NOT NULL,
  `cust_lname` varchar(20) NOT NULL,
  `cust_ph_no` bigint NOT NULL,
  `cust_email` varchar(50) NOT NULL,
  `cust_password_hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`cust_id`),
  UNIQUE KEY `cust_email` (`cust_email`)
) ENGINE=InnoDB AUTO_INCREMENT=7025 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_fname`, `cust_lname`, `cust_ph_no`, `cust_email`, `cust_password_hash`) VALUES
(7001, 'Qais', 'Warekar', 9975365987, 'warekarqais@gmail.com', '$2y$10$9T0N5zyiR.BIAykXHo80pO9Ov2XoD7af2tH2meIgfb2CTBfabLHge'),
(7002, 'Tim', 'Crook', 9975365973, 'timcrook@gmail.com', '$2y$10$mwUypyI01nU5zOlXvW9Vp.B2I6.i2ykC/zuGtD7AwhLHHna0E/huS'),
(7003, 'Ram', 'Singh', 7894566331, 'ram@gmail.com', '$2y$10$Sd9MAVQLz/kGkoPC6Fu1keKUNj75S.UoaswbA2/AAiNZOiRP1bGsq'),
(7004, 'James', 'Bond', 741036985, 'jamesbond@gmail.com', '$2y$10$ChCLXUZ8iRhgPXjLNsxvGOfbnYgK9ppmweFWcvMsGyrqoB9qDYrDi'),
(7009, 'Nico', 'Robin', 6310789320, 'nicorobin@gmail.com', '$2y$10$QyoLitrgdJRZwMFGwfSgg.A3eKW5WuqJu4Svo1IDjesWh4YEV10Qi'),
(7012, 'Roronoa', 'Zoro', 7894561230, 'zoro@gmail.com', '$2y$10$8xlUM5VLhYNc4EfcZPpkk.ClNqRaRRp.YcYAHLHPyP4KQDatsyL4K'),
(7014, 'Simp', 'Xd', 597413068, 'simpxd@gmail.com', '$2y$10$Jhg5U.4z2o4baKH6r8mPhuws0VHUbLrWEUmzyq3UrZglh02m5hkLa'),
(7019, 'John', 'Rider', 7894123560, 'johnRider@gmail.com', 'xyab'),
(7023, 'Tim', 'Cook', 789456123, '', '$2y$10$CGWwtrsJttfGjQmAx2ybIuErGWtIrt7I63iIdkTg94UbT3JM2WlYi'),
(7024, 'John', 'Hammer', 9754120314, 'john@gmail.com', '$2y$10$hThvTcDSM1jlmLn.oVmqn.sAF.vGCGzPM36tPneKYs13nAIMN6.KK');

-- --------------------------------------------------------

--
-- Table structure for table `custom_tour`
--

DROP TABLE IF EXISTS `custom_tour`;
CREATE TABLE IF NOT EXISTS `custom_tour` (
  `c_tour_id` int NOT NULL AUTO_INCREMENT,
  `tour_id` int NOT NULL,
  `cust_id` int NOT NULL,
  `hotel_id` int NOT NULL,
  `c_tour_dept` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `c_tour_dest` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `c_tour_start_date` date NOT NULL,
  `c_tour_end_date` date NOT NULL,
  `c_tour_adult` int NOT NULL,
  `c_tour_child` int NOT NULL,
  `guide_selected` varchar(3) NOT NULL,
  `food_selected` varchar(3) NOT NULL,
  `email` varchar(20) NOT NULL,
  `c_tour_price` varchar(10) NOT NULL,
  PRIMARY KEY (`c_tour_id`),
  KEY `INDEX` (`cust_id`),
  KEY `c_tour_hotel_id` (`hotel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19019 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `custom_tour`
--

INSERT INTO `custom_tour` (`c_tour_id`, `tour_id`, `cust_id`, `hotel_id`, `c_tour_dept`, `c_tour_dest`, `c_tour_start_date`, `c_tour_end_date`, `c_tour_adult`, `c_tour_child`, `guide_selected`, `food_selected`, `email`, `c_tour_price`) VALUES
(19012, 1005, 7001, 20008, 'Mumbai', 'Dar es Salaam', '2023-09-01', '2023-09-05', 1, 0, 'Yes', 'No', 'warekarqais@gmail.co', '180000'),
(19013, 1005, 7024, 20008, 'Mumbai', 'Dar es Salaam', '2023-09-01', '2023-09-08', 1, 0, 'No', 'Yes', 'john@gmail.com', '300000'),
(19014, 1016, 7024, 20027, 'Mumbai', 'Sydney', '2023-12-20', '2024-01-03', 2, 0, 'Yes', 'Yes', 'john@gmail.com', '1202500'),
(19015, 1016, 7024, 20027, 'Mumbai', 'Sydney', '2023-12-20', '2023-12-31', 1, 0, 'Yes', 'Yes', 'john@gmail.com', '650000'),
(19016, 1003, 7024, 20004, 'Mumbai', 'Manaus', '2023-06-07', '2023-06-13', 1, 0, 'Yes', 'Yes', 'john@gmail.com', '180000'),
(19017, 1003, 7024, 20004, 'Mumbai', 'Manaus', '2023-06-07', '2023-06-13', 1, 0, 'Yes', 'Yes', 'john@gmail.com', '180000'),
(19018, 1017, 7012, 20028, 'Mumbai', 'Callu', '2023-04-13', '2023-04-19', 1, 2, 'No', 'Yes', 'zoro@gmail.com', '845000');

-- --------------------------------------------------------

--
-- Table structure for table `c_tour_bill`
--

DROP TABLE IF EXISTS `c_tour_bill`;
CREATE TABLE IF NOT EXISTS `c_tour_bill` (
  `c_bill_id` int NOT NULL AUTO_INCREMENT,
  `c_tour_id` int NOT NULL,
  `cust_id` int NOT NULL,
  `bill_date` date NOT NULL,
  `adult_seat_cost` int NOT NULL,
  `child_seat_cost` int NOT NULL,
  `guide_cost` int NOT NULL,
  `food_cost` int NOT NULL,
  `acco_cost` int NOT NULL,
  `add_days_cost` int NOT NULL,
  `bill_total` int NOT NULL,
  `payment_mode` varchar(30) NOT NULL,
  PRIMARY KEY (`c_bill_id`),
  KEY `c_tour_id` (`c_tour_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `c_tour_bill`
--

INSERT INTO `c_tour_bill` (`c_bill_id`, `c_tour_id`, `cust_id`, `bill_date`, `adult_seat_cost`, `child_seat_cost`, `guide_cost`, `food_cost`, `acco_cost`, `add_days_cost`, `bill_total`, `payment_mode`) VALUES
(6, 19012, 0, '2023-03-31', 120000, 0, 20000, 20000, 40000, 0, 180000, 'Net Banking'),
(7, 19013, 0, '2023-03-31', 120000, 0, 20000, 20000, 40000, 120000, 300000, 'Debit Card'),
(8, 19014, 0, '2023-03-31', 780000, 0, 65000, 65000, 130000, 162500, 1202500, 'Net Banking'),
(9, 19015, 0, '2023-03-31', 390000, 0, 65000, 65000, 130000, 0, 650000, 'Debit Card'),
(10, 19016, 0, '2023-03-31', 108000, 0, 18000, 18000, 36000, 0, 180000, 'Net Banking'),
(11, 19017, 0, '2023-03-31', 108000, 0, 18000, 18000, 36000, 0, 180000, 'Net Banking'),
(12, 19018, 0, '2023-03-31', 390000, 260000, 65000, 65000, 130000, 0, 845000, 'Credit Card');

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

DROP TABLE IF EXISTS `flight`;
CREATE TABLE IF NOT EXISTS `flight` (
  `flight_id` int NOT NULL AUTO_INCREMENT,
  `tour_id` int NOT NULL,
  `total_seats` int NOT NULL,
  `adult_seats` int NOT NULL,
  `available_adult_seats` int NOT NULL,
  `child_seats` int NOT NULL,
  `available_child_seats` int NOT NULL,
  `dept_city` varchar(20) NOT NULL,
  `final_city` varchar(20) NOT NULL,
  `final_city_opt` varchar(30) NOT NULL,
  PRIMARY KEY (`flight_id`),
  KEY `INDEX` (`tour_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10017 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`flight_id`, `tour_id`, `total_seats`, `adult_seats`, `available_adult_seats`, `child_seats`, `available_child_seats`, `dept_city`, `final_city`, `final_city_opt`) VALUES
(10001, 1001, 250, 200, 187, 50, 37, 'Mumbai', 'Male', ''),
(10002, 1003, 250, 200, 187, 50, 42, 'Mumbai', 'Manaus', ''),
(10003, 1004, 300, 300, 192, 0, 45, 'Mumbai', 'Paris', ''),
(10004, 1005, 300, 220, 194, 80, 47, 'Mumbai', 'Dar es Salaam', ''),
(10005, 1006, 400, 300, 195, 100, 46, 'Mumbai', 'London', ''),
(10006, 1007, 400, 300, 196, 100, 47, 'Mumbai', 'Arizona', ''),
(10007, 1008, 300, 250, 193, 50, 43, 'Mumbai', 'Tokyo', ''),
(10008, 1010, 250, 200, 196, 50, 47, 'Mumbai', 'Punta Arenas', ''),
(10009, 1011, 300, 250, 195, 50, 47, 'Mumbai', 'Wellington', ''),
(10010, 1012, 200, 150, 196, 50, 47, 'Mumbai', 'Leh', ''),
(10011, 1013, 300, 220, 194, 80, 46, 'Mumbai', 'Cranbrook', ''),
(10012, 1014, 400, 300, 196, 100, 47, 'Mumbai', 'Cairo', ''),
(10013, 1015, 350, 280, 196, 70, 47, 'Mumbai', 'Abu Dhabi', ''),
(10014, 1016, 500, 400, 395, 100, 100, 'Mumbai', 'Sydney', ''),
(10016, 1017, 400, 280, 278, 120, 116, 'Mumbai', 'Callao', 'Callu');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

DROP TABLE IF EXISTS `package`;
CREATE TABLE IF NOT EXISTS `package` (
  `pack_id` int NOT NULL AUTO_INCREMENT,
  `tour_id` int NOT NULL,
  `pack_duration` int NOT NULL,
  `pack_type` varchar(30) NOT NULL,
  PRIMARY KEY (`pack_id`),
  KEY `INDEX` (`tour_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3019 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`pack_id`, `tour_id`, `pack_duration`, `pack_type`) VALUES
(3001, 1001, 9, 'Beach Bliss'),
(3002, 1002, 5, 'Beach Bliss'),
(3003, 1003, 8, 'Wilderness Wonders'),
(3004, 1004, 8, 'Couples Tour'),
(3005, 1005, 5, 'African Odyssey'),
(3006, 1006, 14, 'Euro Adventure'),
(3007, 1007, 4, 'Treks and Hikes'),
(3008, 1008, 10, 'Global Heritage'),
(3009, 1009, 25, 'Beach Bliss'),
(3010, 1010, 7, 'Arctic Adventures'),
(3011, 1011, 10, 'City and Sky'),
(3012, 1012, 5, 'Treks and Hikes'),
(3013, 1013, 5, 'Treks and Hikes'),
(3014, 1014, 15, 'Desert Tour'),
(3015, 1015, 14, 'City Wonders'),
(3016, 1016, 12, 'Beach Bliss'),
(3017, 1017, 7, 'Hikes and Treks');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `rev_id` int NOT NULL AUTO_INCREMENT,
  `cust_id` int NOT NULL,
  `tour_id` int NOT NULL,
  `rev_comment` varchar(100) NOT NULL,
  `tour_rating` int NOT NULL,
  PRIMARY KEY (`rev_id`),
  KEY `INDEX` (`cust_id`),
  KEY `tour_id` (`tour_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15002 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`rev_id`, `cust_id`, `tour_id`, `rev_comment`, `tour_rating`) VALUES
(15001, 7001, 1001, 'Best service ever provided. Had a great time in Maldives!', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

DROP TABLE IF EXISTS `tours`;
CREATE TABLE IF NOT EXISTS `tours` (
  `tour_id` int NOT NULL AUTO_INCREMENT,
  `tour_title` varchar(30) NOT NULL,
  `tour_dest` varchar(20) NOT NULL,
  `tour_region` varchar(20) NOT NULL,
  `tour_price` int NOT NULL,
  `tour_desc` varchar(100) NOT NULL,
  `tour_long_desc` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tour_month` varchar(20) NOT NULL,
  `tour_start_date` date NOT NULL,
  `tour_end_date` date NOT NULL,
  `tour_avg_rating` float NOT NULL,
  `food_provided` varchar(3) NOT NULL,
  `tour_img` varchar(150) NOT NULL,
  PRIMARY KEY (`tour_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1019 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`tour_id`, `tour_title`, `tour_dest`, `tour_region`, `tour_price`, `tour_desc`, `tour_long_desc`, `tour_month`, `tour_start_date`, `tour_end_date`, `tour_avg_rating`, `food_provided`, `tour_img`) VALUES
(1001, 'Maldives Staycation', 'Maldives', 'South Asia', 50000, 'Dive into the crazy Maldives water! Hurry and book now.', 'The Maldives is a tropical paradise, renowned for its turquoise waters, white sandy beaches, and stunning coral reefs. A Maldives tour package is the perfect way to experience all that this beautiful destination has to offer. The Maldives is made up of over 1,000 islands, each with its own unique charm and character. With a tour package, clients can visit some of the most beautiful and secluded islands, where they can relax, unwind, and soak up the sun.\r\n\r\nA typical Maldives tour package includes accommodation in one of the many luxurious resorts that are scattered throughout the islands. These resorts offer a range of amenities and activities, including snorkeling, scuba diving, water sports, and spa treatments. Clients can also enjoy delicious local cuisine, including fresh seafood, tropical fruits, and flavorful spices.', 'May', '2023-05-11', '2023-05-18', 4.5, 'Yes', 'assets/tour images/maldives.jpg'),
(1002, 'Weekend at Goa', 'Goa', 'South Asia', 20000, 'Spend a wonderful weekend at Goa with you friends and family.', 'A Goa tour package is a perfect way to experience the beautiful beaches, rich culture, and delicious cuisine of this popular Indian destination. With its palm-fringed coastline, colonial architecture, and vibrant nightlife, Goa is a unique and exciting destination that offers something for everyone. A typical tour package includes accommodation in a beachfront resort, visits to local attractions such as the historic forts and temples, and excursions to nearby villages to experience the local culture and cuisine. Clients can also enjoy water sports, sunbathing, and relaxing on the beach while soaking up the tropical ambiance.\r\n\r\nvibrant nightlife, Goa is a unique and exciting destination that offers something for everyone. In addition to the beaches, Goa is also known for its bustling markets, where clients can shop for local handicrafts, spices, and souvenirs. The tour package includes visits to popular markets such as the Anjuna Flea Market and the Mapusa Market. Clients can also take', 'June', '2023-06-02', '2023-06-06', 4, 'Yes', 'assets/tour images/goa.jpg'),
(1003, 'Amazon Getaway', 'Amazon', 'South America', 180000, 'Enjoy an amazing tour of the Amazon Rainforest in Brazil.', 'An Amazon rainforest tour is an incredible opportunity to immerse oneself in the natural wonders of one of the most biodiverse regions on the planet. Clients can explore the lush jungle, discover a diverse array of plant and animal species, and learn about the culture of the indigenous communities who call this region home. A typical tour includes guided hikes through the rainforest, canoe trips along the river, and visits to remote villages to interact with the locals. With its awe-inspiring scenery and unique cultural experiences, an Amazon rainforest tour is a once-in-a-lifetime opportunity to connect with nature and learn about the world around us.\r\nClients can also embark on night walks to witness the nocturnal creatures that come to life in the rainforest, including snakes, frogs, and spiders. The tour guides are knowledgeable about the diverse flora and fauna of the region and can provide fascinating insights into the ecology of the rainforest. Overall, an Amazon rainforest tour', 'June', '2023-06-07', '2023-06-13', 4.1, 'Yes', 'assets/tour images/amazon.jpg'),
(1004, 'Paris Tour', 'Paris', 'Europe', 160000, 'A romantic vacation with your partner in the City Of Love.', 'A Paris couples tour is a romantic and unforgettable way to explore one of the world\'s most iconic and charming cities. With its beautiful architecture, stunning parks, and renowned cuisine, Paris is the perfect destination for a couples\' getaway. The tour includes visits to world-famous landmarks such as the Eiffel Tower, Notre-Dame Cathedral, and the Louvre Museum. Clients can also enjoy romantic strolls along the Seine River and picnics in the city\'s many parks and gardens. The tour package also includes opportunities to indulge in delicious French cuisine, with visits to local cafes and restaurants, as well as wine tastings and cooking classes. With its enchanting ambiance and endless opportunities for romance, a Paris couples tour is the perfect way to celebrate love and create unforgettable memories with your significant other.', 'April', '2023-04-01', '2023-04-07', 5, 'Yes', 'assets/tour images/paris.jpg'),
(1005, 'African Safari', 'Africa', 'Africa', 200000, 'Experience the beauty and wonder of Africa on our safari tour.', 'An African safari tour is an adventure of a lifetime that takes clients on a journey through some of the world\'s most stunning and diverse landscapes. Clients can witness the incredible wildlife that roams the savannahs, including elephants, lions, zebras, and giraffes. A typical safari tour includes guided game drives, where clients can witness the animals in their natural habitats and learn about their behaviors and interactions. Clients can also enjoy guided walks, hot air balloon rides, and visits to local communities to learn about their cultures and ways of life. The tour packages include comfortable accommodations, often in luxury lodges or tented camps, and knowledgeable guides to ensure a safe and enjoyable experience. With its awe-inspiring scenery and unforgettable wildlife encounters, an African safari tour is a must-do experience for any nature lover or adventure seeker.', 'September', '2023-09-01', '2023-09-05', 4, 'Yes', 'assets/tour images/safari.jpg'),
(1006, 'European Tour', 'London', 'Europe', 450000, 'Explore the best of Europe on our 2-week tour. Visit places like London, Paris and Amsterdam!', 'A European tour in London is a great way to explore one of the world\'s most vibrant and culturally diverse cities. The tour includes visits to iconic landmarks such as Buckingham Palace, Big Ben, and the Tower of London. Clients can also enjoy walking tours of the city\'s many vibrant neighborhoods, such as Soho and Camden, and explore its numerous museums and art galleries. The tour package also includes opportunities to indulge in traditional British cuisine, with visits to local pubs and restaurants, as well as wine and cheese tastings. Clients can also enjoy shopping in the city\'s many boutiques and markets, such as Portobello Market and Camden Market. With its rich history, diverse culture, and lively atmosphere, a European tour in London is the perfect way to experience the best of this world-renowned city.', 'June', '2023-02-10', '2023-02-21', 3.9, 'Yes', 'assets/tour images/london.jpg'),
(1007, 'Grand Canyon Hiking', 'Grand Canyon', 'North America', 150000, 'Explore the breath-taking Grand Canyon on our hiking tour.', 'A Grand Canyon hiking tour offers a unique and breathtaking experience that allows you to explore one of the world\'s most magnificent natural wonders. As you hike through the canyon, you\'ll be surrounded by awe-inspiring vistas, towering cliffs, and stunning rock formations that have been carved out over millions of years by the forces of nature. Along the way, your expert guide will share fascinating insights about the canyon\'s geology, ecology, and cultural history, as well as lead you to hidden gems and scenic spots that you might otherwise miss. Depending on the tour you choose, you may also have the opportunity to camp out under the stars, ride on mules, or raft down the Colorado River. Whether you\'re a seasoned hiker or a novice explorer, a Grand Canyon hiking tour is an unforgettable adventure that will leave you with memories to last a lifetime.', 'September', '2023-09-14', '2023-09-17', 5, 'Yes', 'assets/tour images/grand canyon.jpg'),
(1008, 'Asian Adventure', 'Japan', 'East Asia', 150000, 'Discover the culture and cuisine of Asia on our guided tour.', 'A Japan heritage tour is an immersive and enlightening journey that takes you through the country\'s rich cultural and historical legacy. From the bustling streets of Tokyo to the serene temples of Kyoto, you\'ll visit some of Japan\'s most iconic landmarks and hidden treasures, and discover the stories behind them. Along the way, you\'ll learn about the traditions of tea ceremony, calligraphy, and flower arrangement, and witness the artistry of Japanese craftspeople and performers. You\'ll also delve into the fascinating history of samurai, shoguns, and emperors, and explore the influence of Zen Buddhism, Shintoism, and other spiritual traditions on Japanese society. Whether you\'re admiring the cherry blossoms in spring, experiencing the vivid autumn foliage, or savoring the flavors of Japanese cuisine, a Japan heritage tour is a journey of discovery that will deepen your appreciation for this unique and enchanting country.', 'April', '2023-04-16', '2023-04-24', 4.6, 'Yes', 'assets/tour images/japan.jpg'),
(1009, 'Caribbean Cruise', 'Havana', 'North America', 950000, 'Relax and enjoy the sun, sand, and sea on our Caribbean cruise.', 'A Caribbean cruise to Havana, Cuba is a voyage of discovery that takes you to one of the region\'s most vibrant and colorful cities. As you sail through turquoise waters and past swaying palm trees, you\'ll arrive in Havana, a city steeped in history, culture, and music. From the colorful colonial architecture of Old Havana to the lively streets of Centro Habana, you\'ll explore the city\'s many facets, including its renowned museums, art galleries, and historic landmarks. You\'ll also savor the flavors of Cuban cuisine, from classic mojitos and daiquiris to deliciously spicy dishes like ropa vieja and arroz con pollo. Whether you\'re strolling along the Malecon, watching a salsa performance, or simply people-watching in a bustling plaza, a Caribbean cruise to Havana is an unforgettable experience that will immerse you in the rhythms and spirit of this fascinating city.', 'October', '2023-10-01', '2023-10-25', 4.8, 'Yes', 'assets/tour images/caribbean.jpg'),
(1010, 'Antarctica Expedition', 'Antarctica', 'Antarctica', 550000, 'Experience the beauty and wildlife of Antarctica on our expedition tour.', 'An Antarctica expedition tour is a once-in-a-lifetime adventure that takes you to the frozen continent at the bottom of the world. As you cross the Drake Passage, one of the roughest and most unpredictable bodies of water on the planet, you\'ll feel the excitement and anticipation build for the incredible landscapes and wildlife you\'ll encounter. Once you arrive, you\'ll experience a stunning, otherworldly environment of icy mountains, glaciers, and frozen seas, where penguins, seals, and whales thrive. You\'ll explore the continent by Zodiac boats, hiking through ice fields, and even camping on the ice, under the stunning Southern Lights. Along the way, you\'ll learn from expert guides about the region\'s history, geology, and wildlife, as well as about the impact of climate change and how the international community is working to protect this fragile ecosystem. An Antarctica expedition tour is an unparalleled adventure that will leave you with a new perspective on our planet and a deep ap', 'September', '2023-09-20', '2023-09-26', 4.6, 'Yes', 'assets/tour images/antarctica.jpg'),
(1011, 'New Zealand Adventure', 'New Zealand', 'Oceania', 150000, 'Experience the adventure and natural beauty of New Zealand on our tour.', 'A New Zealand adventure tour is an exhilarating journey through a land of breathtaking landscapes, adrenaline-fueled activities, and unique cultural experiences. From the rugged coastlines and pristine beaches of the North Island to the majestic alpine peaks and fjords of the South Island, you\'ll explore the best that New Zealand has to offer. You can hike through ancient forests, swim with dolphins, bungee jump off a bridge, skydive over a glacier, or even try heli-skiing. You\'ll also have the chance to immerse yourself in Maori culture, learning about their traditions, stories, and customs. Along the way, you\'ll sample the delicious cuisine and fine wines that New Zealand is known for, and meet friendly locals who are always eager to share their love of their country. A New Zealand adventure tour is a thrilling and unforgettable experience that will leave you with memories to last a lifetime.', 'May', '2023-05-15', '2023-05-24', 4.1, 'Yes', 'assets/tour images/new zealand.jpg'),
(1012, 'Himalayan Trekking', 'Ladakh', 'South Asia', 70000, 'Embark on a challenging and rewarding trek through the Himalayas.', 'A Himalaya tour is an epic journey through some of the highest and most spectacular mountains in the world. From the foothills of the Himalayas in Nepal to the remote regions of Bhutan and Tibet, you\'ll explore a region of stunning beauty and cultural richness. You\'ll trek through rugged terrain, high-altitude passes, and lush valleys, and encounter diverse communities, each with their own unique traditions, languages, and lifestyles. Along the way, you\'ll witness awe-inspiring landscapes of snow-capped peaks, glaciers, and deep gorges, and visit ancient monasteries, temples, and historic sites that have been sacred to Himalayan people for centuries. You\'ll also have the chance to experience local cuisine, learn about traditional crafts, and even participate in festivals and ceremonies. A Himalaya tour is a journey of discovery that will challenge your limits and enrich your soul, leaving you with a deep appreciation for the natural and cultural wonders of this magnificent region.', 'March', '2023-03-15', '2023-02-19', 4.2, 'Yes', 'assets/tour images/himalaya.jpg'),
(1013, 'Canadian Rockies Tour', 'Canada', 'North America', 350000, 'Experience the stunning natural beauty of the Canadian Rockies on our tour.', 'A Canadian Rockies tour is a breathtaking journey through some of North America\'s most stunning natural scenery. From the turquoise lakes and towering peaks of Banff National Park to the glaciers and waterfalls of Jasper National Park, you\'ll explore a region of unparalleled beauty and diversity. You\'ll hike through alpine meadows, canoe on crystal-clear lakes, and soak in natural hot springs, all while surrounded by some of the most dramatic landscapes on earth. Along the way, you\'ll encounter a variety of wildlife, including bears, elk, moose, and mountain goats, and learn about the geological history and cultural heritage of the area. You\'ll also have the chance to experience the charming mountain towns and indulge in delicious local cuisine, from Alberta beef to artisanal cheeses and craft beer. A Canadian Rockies tour is an unforgettable adventure that will leave you with memories to last a lifetime.', 'December', '2023-12-08', '2023-12-12', 4.3, 'Yes', 'assets/tour images/canadian rockies.jpg'),
(1014, 'Desert Safari', 'Egypt', 'North Africa', 175000, 'Explore the pyramids of Egypt!', 'A desert safari in Egypt is a thrilling adventure that takes you deep into the heart of the Sahara, one of the world\'s most iconic and mysterious deserts. You\'ll journey by 4x4 vehicles, quad bikes, and even on camelback, through towering sand dunes, rugged mountains, and ancient oases. Along the way, you\'ll visit historic sites, such as the temples of Abu Simbel and the Valley of the Kings, and marvel at the natural wonders of the desert, from the shifting sands to the spectacular sunsets. You\'ll also experience Bedouin culture firsthand, sharing meals and stories around the campfire, and even sleeping under the stars in traditional Bedouin tents. Whether you\'re exploring the vast expanses of the desert or enjoying the hospitality of the local people, a desert safari in Egypt is an unforgettable adventure that will transport you to another world.', 'January', '2023-01-05', '2023-02-18', 4, 'Yes', 'assets/tour images/egypt.jpg'),
(1015, 'Dubai Dreams', 'Abu Dhabi', 'Middle East', 120000, 'Experience the wonders of Dubai, one of the most vibrant and exciting cities in the world. ', 'A Dubai tour is a thrilling journey to one of the most dynamic and modern cities in the world. This vibrant city is famous for its stunning architecture, luxurious shopping, world-class dining, and exciting entertainment options. You\'ll explore the city\'s many attractions, including the iconic Burj Khalifa, the tallest building in the world, and the spectacular Dubai Fountain, with its breathtaking water and light shows. You\'ll also visit the historic district of Dubai, with its traditional souks and museums, and learn about the city\'s fascinating history and culture. Along the way, you\'ll indulge in the finest cuisine, from authentic Emirati dishes to international favorites, and shop for everything from designer fashions to local crafts. You\'ll also have the chance to enjoy thrilling adventures, such as indoor skiing, desert safaris, and water park rides. A Dubai tour is an unforgettable experience that combines the best of modern luxury and traditional culture, and will leave you wi', 'April', '2023-04-04', '2023-02-17', 3.1, 'Yes', 'assets/tour images/dubai.jpg'),
(1016, 'Aussie Adventure', 'Australia', 'Oceania', 650000, 'Embark on an unforgettable journey of natural wonders and adventures in Australia', 'The tour will begin in the vibrant city of Sydney, where clients can witness the iconic Opera House and Harbour Bridge. From there, clients will head to the stunning Blue Mountains, where they can enjoy scenic hikes and views of the Three Sisters rock formation. The next stop will be the outback, where clients will visit the world-famous Uluru (Ayers Rock) and witness the spectacular sunset over the desert.\r\n\r\nThe tour will then take clients to the tropical north, where they can explore the lush Daintree Rainforest and snorkel the Great Barrier Reef, one of the world\'s most diverse and vibrant coral reefs. Clients will also have the opportunity to visit a local Indigenous community and learn about their traditional way of life.', 'December', '2023-12-20', '2023-12-31', 5, 'Yes', 'assets/tour images/australia.jpg'),
(1017, 'Machu Pichu Tour', 'Peru', 'Africa', 650000, 'Experience the ancient Inca ruins and breathtaking Andean landscapes on a Machu Picchu tour.', 'AA', 'April', '2023-04-13', '2023-04-19', 5, 'Yes', 'assets/tour images/machu pichu.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tour_guide`
--

DROP TABLE IF EXISTS `tour_guide`;
CREATE TABLE IF NOT EXISTS `tour_guide` (
  `guide_id` int NOT NULL AUTO_INCREMENT,
  `tour_id` int NOT NULL,
  `guide_fname` varchar(20) NOT NULL,
  `guide_lname` varchar(20) NOT NULL,
  `guide_rating` int NOT NULL,
  `guide_email` varchar(20) NOT NULL,
  `guide_ph_no` bigint NOT NULL,
  PRIMARY KEY (`guide_id`),
  KEY `INDEX` (`tour_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17023 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tour_guide`
--

INSERT INTO `tour_guide` (`guide_id`, `tour_id`, `guide_fname`, `guide_lname`, `guide_rating`, `guide_email`, `guide_ph_no`) VALUES
(17001, 1001, 'Boa', 'Hancock', 5, 'boahancock@gmail.com', 9876543211),
(17002, 1002, 'Ram', 'Kumar', 5, 'ram123kumar@gmail.co', 9123456780),
(17003, 1003, 'Clara', 'Smith', 5, 'clarasmith@gmail.com', 213789465),
(17004, 1004, 'Chamber', 'Bonjour', 5, 'chamber@valorant.com', 4201345887),
(17005, 1005, 'Dwayne', 'Smith', 5, 'dsmith@gmail.com', 4789512330),
(17006, 1006, 'Joe', 'Root', 5, 'rootjoe@gmail.com', 730124668),
(17007, 1007, 'Brimstone', 'Patel', 5, 'beastpatel@gmail.com', 137894560),
(17008, 1008, 'Mother', 'Sage', 5, 'sagemother@gmail.com', 9740324146),
(17009, 1009, 'Chris', 'Bale', 5, 'chrisbale@gmail.com', 7103245689),
(17010, 1010, 'Ava', 'Dhoot', 5, 'ava@gmail.com', 703698452),
(17011, 1010, 'Joe', 'King', 5, 'joeking@gmail.com', 709845613),
(17012, 1011, 'Kane', 'Willy', 5, 'wiilykane@gmail.com', 8012345679),
(17013, 1012, 'Harbour', 'Bullet', 5, 'chaloharbour@gmail.c', 703984510),
(17014, 1013, 'Canny', 'Rock', 5, 'cannyrock@gmail.com', 7098412365),
(17015, 1014, 'Sulaiman', 'Boom', 5, 'sulaimanboom@gmail.c', 578910365),
(17016, 1015, 'Sufiyan', 'Karbelkar', 5, 'chalodubai@gmail.com', 7030142069),
(17019, 1012, 'Nico', 'Robin', 5, 'robin@gmail.com', 97410325684),
(17020, 1011, 'Jimmy', 'Neil', 5, 'jimmy@gmail.com', 712036489),
(17021, 1016, 'Shane', 'Wattpad', 5, 'shany@gmail.com', 7012356489),
(17022, 1017, 'DonQuixote', 'Doflamingo', 5, 'doffy@gmail.com', 7410258930);

-- --------------------------------------------------------

--
-- Table structure for table `travel`
--

DROP TABLE IF EXISTS `travel`;
CREATE TABLE IF NOT EXISTS `travel` (
  `travel_id` int NOT NULL AUTO_INCREMENT,
  `tour_id` int NOT NULL,
  `travel_type` varchar(20) NOT NULL,
  PRIMARY KEY (`travel_id`),
  KEY `INDEX` (`tour_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5020 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `travel`
--

INSERT INTO `travel` (`travel_id`, `tour_id`, `travel_type`) VALUES
(5001, 1001, 'flight'),
(5002, 1002, 'bus'),
(5003, 1002, 'flight'),
(5004, 1003, 'flight'),
(5005, 1004, 'flight'),
(5006, 1005, 'flight'),
(5007, 1006, 'flight'),
(5008, 1007, 'flight'),
(5009, 1008, 'flight'),
(5010, 1009, 'cruise'),
(5011, 1010, 'flight'),
(5012, 1011, 'flight'),
(5013, 1012, 'flight'),
(5014, 1013, 'flight'),
(5015, 1014, 'flight'),
(5016, 1015, 'flight'),
(5017, 1016, 'flight'),
(5018, 1012, 'bus'),
(5019, 1017, 'flight');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accomodation`
--
ALTER TABLE `accomodation`
  ADD CONSTRAINT `accomodation_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`tour_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`pack_id`) REFERENCES `package` (`pack_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `bus_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`tour_id`) ON UPDATE CASCADE;

--
-- Constraints for table `cruise`
--
ALTER TABLE `cruise`
  ADD CONSTRAINT `cruise_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`tour_id`) ON UPDATE CASCADE;

--
-- Constraints for table `custom_tour`
--
ALTER TABLE `custom_tour`
  ADD CONSTRAINT `custom_tour_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `custom_tour_ibfk_3` FOREIGN KEY (`hotel_id`) REFERENCES `accomodation` (`hotel_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `c_tour_bill`
--
ALTER TABLE `c_tour_bill`
  ADD CONSTRAINT `c_tour_bill_ibfk_1` FOREIGN KEY (`c_tour_id`) REFERENCES `custom_tour` (`c_tour_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `flight`
--
ALTER TABLE `flight`
  ADD CONSTRAINT `flight_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`tour_id`) ON UPDATE CASCADE;

--
-- Constraints for table `package`
--
ALTER TABLE `package`
  ADD CONSTRAINT `package_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`tour_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`tour_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `tour_guide`
--
ALTER TABLE `tour_guide`
  ADD CONSTRAINT `tour_guide_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`tour_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `travel`
--
ALTER TABLE `travel`
  ADD CONSTRAINT `travel_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`tour_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
