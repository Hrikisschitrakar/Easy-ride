-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 12, 2024 at 03:49 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easyride`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `passenger_name` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `boarding_place` varchar(255) NOT NULL,
  `Your_destination` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `passenger_name`, `telephone`, `email`, `boarding_place`, `Your_destination`) VALUES
(7, 'kamal', '071-333090', 'kamal@gmail.com', 'negombo', 'kegalla'),
(14, 'anju', '9803736077', 'rasanjali@gmail.com', 'kathamndu', 'Avissawella'),
(15, 'hrikiss', '9803736077', 'hrikisschit14@gmail.com', 'hh', 'hh'),
(16, 'Hrikiss', '9803736077', 'hrikiss@gmail.com', 'kathmandu', 'pokhara'),
(17, 'Hrikiss', '9803736077', 'hrikisschit14@gmail.com', 'Kathmandu', 'Patan'),
(18, 'Hrikiss', '876543210', 'hrikisschit14@gmail.com', 'kathmandu', 'manang'),
(19, 'Hrikiss', '9803736077', 'hrikisschit14@gmail.com', 'Pokhara', 'Kathmandu');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id` int(11) NOT NULL,
  `Bus_Name` varchar(255) NOT NULL,
  `Tel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id`, `Bus_Name`, `Tel`) VALUES
(2, 'llv0913', '44444'),
(3, 'llv0912', '78787878'),
(6, '5656', '5656');

-- --------------------------------------------------------

--
-- Table structure for table `bus_driver`
--

CREATE TABLE `bus_driver` (
  `id` int(11) NOT NULL,
  `user_id` bigint(25) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telephone` bigint(25) NOT NULL,
  `bus_assigned` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus_driver`
--

INSERT INTO `bus_driver` (`id`, `user_id`, `First_Name`, `Last_Name`, `username`, `email`, `password`, `telephone`, `bus_assigned`) VALUES
(2, 2323, 'Chandra', 'Rajbansi', 'chandra', 'chandra@gmail.com', 'chandra', 9823192409, 'llv0913');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `via_city` text NOT NULL,
  `Destination` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `via_city`, `Destination`) VALUES
(1, 'Kathmandu', 'Pokhara'),
(2, 'Lalitpur (Patan)', 'Lalitpur (Patan)'),
(3, 'Bhaktapur', 'Bhaktapur'),
(4, 'Biratnagar', 'Biratnagar'),
(5, 'Birgunj', 'Janakpur'),
(6, 'Janakpur', 'Birgunj'),
(7, 'Butwal', 'Dharan'),
(8, 'Dharan', 'Butwal'),
(9, 'Birtamod', 'Bharatpur'),
(10, 'Bharatpur', 'Birtamod'),
(11, 'Pokhara', 'Kathmandu');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` bigint(20) NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip_code` int(6) NOT NULL,
  `card_name` varchar(255) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `exp_month` varchar(20) NOT NULL,
  `exp_year` varchar(20) NOT NULL,
  `cvv` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `amount`, `name`, `email`, `address`, `city`, `state`, `zip_code`, `card_name`, `card_number`, `exp_month`, `exp_year`, `cvv`) VALUES
(5, 200, 'chathuranga priyadarshana', 'chathurangapriyadarshana29@gmail.com', 'No24,Udumaththa,Eheliyagoda', 'Eheliyagoda', 'india', 70600, 'jorn', '1111222233334444', 'gfggg', '2022', 1234),
(9, 200, 'anju', 'rasanjali@gmail.com', 'Kathmandu', 'Delhi', 'india', 12345, 'hrikiss', '111222222333', 'Janauray', '2024', 1234),
(10, 200, 'hrikiss010', 'hrikisschit14@gmail.com', '', '', '', 0, 'hjkjkj', '0998', 'hh', '88', 88),
(11, 200, 'hrikiss010', 'hrikisschit14@gmail.com', 'Kapurdhara', 'Kathmandu', 'Nepal', 1232, 'Hrikiss Chitrakar', '123455667', 'Des', '2025', 3736);

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `id` int(11) NOT NULL,
  `via_city` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `bus_name` varchar(255) NOT NULL,
  `departure_date` date NOT NULL,
  `departure_time` time(6) NOT NULL,
  `departure_status` varchar(255) NOT NULL,
  `arrival_status` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`id`, `via_city`, `destination`, `bus_name`, `departure_date`, `departure_time`, `departure_status`, `arrival_status`, `cost`) VALUES
(1, 'via Eheliyagoda', 'Avissawella', 'Ez', '2022-05-04', '04:00:00.000000', 'not-departed', 'not-arrived', '200.00'),
(2, 'Badulla', 'Jaffna', 'llv0913', '0000-00-00', '18:30:00.000000', 'departed', 'arrived', '300.00'),
(4, 'Rathnapura', 'Jaffna', 'llv0912', '2022-05-05', '00:09:00.000000', 'departed', 'arrived', '150.00');

-- --------------------------------------------------------

--
-- Table structure for table `station_manager`
--

CREATE TABLE `station_manager` (
  `id` int(11) NOT NULL,
  `user_id` bigint(25) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `station_manager`
--

INSERT INTO `station_manager` (`id`, `user_id`, `First_Name`, `Last_Name`, `username`, `email`, `password`) VALUES
(2, 2323, 'Chandra', 'Rajbansi', 'chandra', 'chandra@gmail.com', 'chandra');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` bigint(25) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` bigint(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `First_Name`, `Last_Name`, `username`, `email`, `telephone`, `password`) VALUES
(2, 65858844865684, 'Pukar', 'Karki', 'pukarki', 'pukarki1@gmail.com', 9824083895, 'pukarki'),
(4, 89258032, 'Hirkiss', 'Chitrkar', 'hirkiss010', 'hrikiss010@gmail.com', 9803736077, 'hirkiss010'),
(6, 24189, 'Rikesh', 'Chitrakar', 'rikesh010', 'rikesh14@gmail.com', 9823349705, 'rikesh010'),
(7, 667474697, 'Yojana', 'Ghimire', 'yojana010', 'yojana@gmail.com', 9807654321, 'yojana010');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_driver`
--
ALTER TABLE `bus_driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `station_manager`
--
ALTER TABLE `station_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bus_driver`
--
ALTER TABLE `bus_driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `station_manager`
--
ALTER TABLE `station_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
