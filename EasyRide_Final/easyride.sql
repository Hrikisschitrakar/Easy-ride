-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3006
-- Generation Time: May 14, 2024 at 04:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

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
(1, 'easyride bro', 'easy12345');

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
(15, 'Joe Khalid', '985068594J', 'joe@gmail.com', 'Janakpur', 'Dharan');

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
(6, 'Swyambhu yatayat', '9842633046'),
(7, 'Nepal yatayat', '98427033698'),
(8, 'Pramdip Yatayat', '9842633046'),
(9, 'NewRoad Yatayat', '98663745'),
(10, 'Bullet Yatayat', '988695784'),
(12, 'Pradesh Yatayat', '9894875994'),
(17, 'Jamuna Yatayat', '9849509685');

-- --------------------------------------------------------

--
-- Table structure for table `bus_driver`
--

CREATE TABLE `bus_driver` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Driver_Name` varchar(50) NOT NULL,
  `Bus_Name` varchar(50) NOT NULL,
  `Telephone_no` bigint(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus_driver`
--

INSERT INTO `bus_driver` (`id`, `user_id`, `Driver_Name`, `Bus_Name`, `Telephone_no`, `Email`, `Password`) VALUES
(1, 2330894, 'Shyam Shrestha', 'Pramdip Yatayat', 9845069343, 'easyri@gmail.com', 'Heyyy@12345'),
(2, 58695, 'Ghaley Bahadur Shrestha', 'Bullet Yatayat', 9859489065, 'are44@gmail.com', '94093'),
(3, 78995, 'Shyam Shrestha', 'My Yatayat', 9845069343, 'Ghalay@gamil.com', '6899586'),
(4, 68975, 'Adarsha Karki', 'New Yatayat', 9842633046, 'Shrestha@gmail.com', '699706');

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
  `Name` varchar(20) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Message` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`Name`, `Email`, `Phone`, `Message`) VALUES
('', '', 0, ''),
('Pramdip', 'Pramdip@gmail.com', 985069054, 'Hello my name is Pramdip and i want to book this b'),
('Ambani', 'raman444@gmail.com', 2147483647, 'biiiooop'),
('Jakante', 'JakanteBahadur@gmail.com', 2147483647, 'i am hero'),
('Partima Shrestha', 'pratima@gmail.com', 2147483647, 'i want to book it'),
('Adarsha Shrestha', 'adarsha@gamil.com', 985004905, 'i am adarsha and i want to book'),
('pukar', 'pukakr@gmail.com', 2147483647, 'i am pukar'),
('Siivam Bahadur malla', 'rajamalla@gmail.com', 981234098, 'I want to know more about this company');

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
(9, 1000, 'Elon Musk', 'Elon?@gmail.com', 'Biratnagar', 'Biratnagar', 'india', 12345, 'hrikiss', '111222222333', 'Janauray', '2024', 1234);

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
  `departure_time` time(3) NOT NULL,
  `cost` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`id`, `via_city`, `destination`, `bus_name`, `departure_date`, `departure_time`, `cost`) VALUES
(1, 'Birgunj', 'Pokhara', 'Swyambhu yatayat', '2024-05-08', '04:30:00.000', '300'),
(2, 'Dharan', 'Biratnagar', 'Pramdip Yatayat', '2024-05-16', '18:43:00.000', '400'),
(3, 'Kathmandu', 'Pokhara', 'Swyambhu yatayat', '2024-05-10', '00:00:00.000', '799'),
(4, 'Dharan', 'Biratnagar', 'Safari Yatayat', '2024-05-11', '22:12:00.000', '400');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` int(10) NOT NULL,
  `cpassword` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 2330894, 'jakokb ', 'Ambani', 'easyride bro', 'raman444@gmail.com', 'Hello@12234'),
(3, 20039, 'Adarsha', 'Ambani', 'easyri@gmail.com', 'raman444@gmail.com', 'Bibek@12345'),
(4, 2330894, 'Tekkken', 'Shrestha', 'easyri@gmail.com', 'raman444@gmail.com', 'Tekken@1234'),
(5, 20039, 'Kaydae', 'Namaze', '68975', 'kaydae@gmail.com', 'iamkaydae123'),
(6, 586907, 'Sikxiya ', 'Shrestha', 'Sikxiya', 'Sikxiya@gmail.com', '5896095'),
(7, 58949, 'Javierhood', 'Jaden', 'Javierhoodjaden', 'jaden@gmail.com', '9788907'),
(8, 20039, 'Lil', 'Uzil', '590690490', 'uzil@gamil.com', 'Uzi@12345'),
(9, 20039, 'Tenz', 'Ambani', '986705', 'raman444@gmail.com', '489300495'),
(10, 785786, 'Helloworld', 'iamkyedae', 'Helloiam', 'raman444@gmail.com', 'Iam@123');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'School Fees Payment System', '', '', '', '');

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
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `First_Name`, `Last_Name`, `username`, `email`, `password`) VALUES
(2, 2330894, 'Adarsha', 'Ambani', 'easyri@gmail.com', 'raman444@gmail.com', 'Hello@12345'),
(4, 89258032, 'Hrikiss', 'Chitrakar', 'hrikiss010', 'hrikisschit14@gmail.com', 'hrikiss010'),
(6, 20039, 'Tenz', 'Ambani', 'easyride bro', 'raman444@gmail.com', 'easy12345'),
(7, 2330894, 'Hrikkis', 'Bahadur malla', 'RajuHrikkis@gmail.com', 'hiku@gmail.com', 'Hiku@12345'),
(8, 2330894, 'Adarsha', 'Karki', 'easyride bro', '58996444@gmail.com', 'easy12345'),
(10, 61512290, 'Pramdip', 'Shrestha', 'admin', 'pramdipshrestha833@gmail.com', 'admin'),
(12, 799559498855, 'Pramdip', 'Shrestha', 'admin', 'NP03CS4A220289@heraldcollege.edu.np', 'admin'),
(15, 6030943521863, 'Pratima', 'Shrestha', 'Pramdip', 'NP03CS4A220289@heraldcollege.edu.np', 'hello1'),
(16, 5566237134239162, 'Pratima', 'Shrestha', 'Pramdip', 'NP03CS4A220289@heraldcollege.edu.np', 'Pramdip'),
(19, 675862, 'Pratima', 'Shrestha', 'Pramdip', 'NP03CS4A220289@heraldcollege.edu.npnp', 'Pramdip'),
(20, 6759597503, 'Pratima', 'Shrestha', 'admin', 'NP03CS4A220289@heraldcollege.edu.np', 'rdgs'),
(21, 15597699812327482, 'Pratima', 'Shrestha', 'admin', 'NP03CS4A220289@heraldcollege.edu.np', 'rdgs');

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
-- Indexes for table `signup`
--
ALTER TABLE `signup`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `bus_driver`
--
ALTER TABLE `bus_driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `station_manager`
--
ALTER TABLE `station_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
