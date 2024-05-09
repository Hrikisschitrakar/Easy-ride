-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3006
-- Generation Time: May 09, 2024 at 08:45 PM
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
(15, 'Chandra Limbu', '98399957243', 'raman444@gmail.com', 'Birgunj', 'Janakpur');

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
(6, 'Priya yatayat', '9842633046'),
(7, 'nepal yatayat', '98427033698'),
(8, 'Pramdip Yatayat', '9842633046'),
(9, 'Safari Yatayat', '98663745'),
(10, 'Bullet Yatayat', '988695784'),
(12, 'Bradesh Yatayat', '9894875994'),
(17, 'Jamuna Yatayat', '9849509685');

-- --------------------------------------------------------

--
-- Table structure for table `bus_driver`
--

CREATE TABLE `bus_driver` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `Driver_Name` varchar(50) NOT NULL,
  `Bus_Name` varchar(50) NOT NULL,
  `Telephone_no` bigint(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus_driver`
--

INSERT INTO `bus_driver` (`id`, `user_id`, `Driver_Name`, `Bus_Name`, `Telephone_no`, `Email`, `Password`) VALUES
(2, 58695, 'skurash shrestha', 'nepal yatayat', 9845069343, 'skura@gamil.com', 869785),
(4, 99223, 'Shyam Shrestha', 'Priya yatayat', 9845069343, 'raman444@gmail.com', 0),
(5, 20039, 'Hrikkis Chitrakar', 'New Yatayat', 9859489065, 'Hrikkischtra@gmail.com', 894893),
(6, 99865, 'Chandra rajbanshi', 'nepal yatayat', 984450994, 'chandra@gmail.com', 689705),
(9, 48937, 'Simu Shrestha', 'Priya yatayat', 9845069343, 'sumu@gmail.com', 86984),
(10, 58695, 'skurash shrestha', 'New Yatayat', 9845069343, 'Pukar@gamil.com', 4785783),
(16, 99865, 'Hrikkis Chitrakar', 'helloyr', 99389499892, 'haku@gamil.com', 3899483);

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
(9, 899, 'Ambani', 'raman444@gmail.com', 'Lalitpur', 'Bhaktapur', 'india', 12345, 'hrikiss', '111222222333', 'Janauray', '2024', 1234);

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
  `cost` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`id`, `via_city`, `destination`, `bus_name`, `departure_date`, `departure_time`, `cost`) VALUES
(8, 'Lalitpur', 'Bhaktapur', 'Priya yatayat', '2024-05-17', '11:38:00.000000', '6000'),
(11, 'Birgunj', 'Janakpur', 'Priya Yatayat', '2024-05-23', '04:09:49.000000', '300'),
(12, 'Lalitpur', 'Bhaktapur', 'Priya yatayat', '2024-05-10', '22:35:00.000000', '200'),
(13, 'Ilam', 'Chituwan', 'nepal yatayat', '2024-05-10', '23:37:00.000000', '500'),
(14, 'Dharan', 'Biratnagar', 'Pramdip Yatayat', '2024-05-16', '18:43:00.000000', '400'),
(16, 'Nepalgunj', 'Patan', 'Lubmini', '2024-05-17', '10:13:10.489000', '200');

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
(1, 20039, 'Adarsha', 'Ambau', 'easyride bro', 'see44@gmail.com', '785594'),
(4, 408560, 'Hero', 'Pramdip', 'Pramdip Hero', 'pramdipher@gmail.com', 'easy12345'),
(10, 0, 'Tenz', 'Ambani', 'easyride bro', 'raman444@gmail.com', 'hello12345'),
(21, 99865, 'Hero', 'Ambani', 'easyride bro', 'bro@gamil.com', '123330');

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
(2, 20039, 'Tenz', 'Tenzing', 'Tyson', 'raman444@gmail.com', 'eslfosiej'),
(4, 89258032, 'Hrikiss', 'Chitrakar', 'hrikiss010', 'hrikisschit14@gmail.com', 'hrikiss010'),
(6, 9223372036854775807, 'Pramdip', 'Shrestha', 'admin', 'NP03CS4A220289@heraldcollege.edu.np', 'admin'),
(7, 26616, 'chanda', 'Sekhar', 'admin', 'NP03CS4A220289@heraldcollege.edu.np', 'admin'),
(8, 28540757473, 'Pramdip', 'Shrestha', 'admin', 'NP03CS4A220289@heraldcollege.edu.np', 'admin'),
(9, 141305, 'chut', 'boka', 'admin', 'NP03CS4A220289@heraldcollege.edu.np', 'admin'),
(10, 61512290, 'Pramdip', 'Shrestha', 'admin', 'pramdipshrestha833@gmail.com', 'admin'),
(11, 283899, 'Pratima', 'Shrestha', 'admin', 'NP03CS4A220289@heraldcollege.edu.np', 'admin'),
(12, 799559498855, 'Pramdip', 'Shrestha', 'admin', 'NP03CS4A220289@heraldcollege.edu.np', 'admin'),
(13, 3634, 'Pratima', 'Shrestha', 'admin', 'NP03CS4A220289@heraldcollege.edu.np', 'kdkkd'),
(14, 1919439282842113, 'Pratima', 'Shrestha', 'Pramdip', 'NP03CS4A220289@heraldcollege.edu.np', '12345'),
(15, 6030943521863, 'Pratima', 'Shrestha', 'Pramdip', 'NP03CS4A220289@heraldcollege.edu.np', 'hello1'),
(16, 5566237134239162, 'Pratima', 'Shrestha', 'Pramdip', 'NP03CS4A220289@heraldcollege.edu.np', 'Pramdip'),
(17, 5799014, 'Pratima', 'Shrestha', 'Pramdip', 'NP03CS4A220289@heraldcollege.edu.np', 'Pramdip'),
(18, 2396482437322531, 'sekhr', 'sekar', 'admin', 'NP03CS4A220289@heraldcollege.edu.np', 'admin'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
