-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2020 at 03:56 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(99) NOT NULL,
  `password` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(2, 'Admin', '$2y$10$TJPpESf8oXKtj7XEt5UNz.0QhGkACmyETEbQ3yOLbprRf4Ey8dUA.');

-- --------------------------------------------------------

--
-- Table structure for table `buss_info`
--

CREATE TABLE `buss_info` (
  `id` int(99) NOT NULL,
  `bus_from` varchar(255) NOT NULL,
  `bus_to` varchar(254) NOT NULL,
  `bus_name` varchar(254) NOT NULL,
  `bus_type` varchar(99) NOT NULL,
  `cost` int(99) NOT NULL,
  `seat` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buss_info`
--

INSERT INTO `buss_info` (`id`, `bus_from`, `bus_to`, `bus_name`, `bus_type`, `cost`, `seat`) VALUES
(5, 'Dhaka', 'Chittagong', 'Hanif Travels', 'bus', 700, 35),
(6, 'Dhaka', 'Khulna', 'Shakura Poribahon', 'bus', 700, 40),
(7, 'Chittagong', 'Dhaka', 'Hanif Travels', 'bus', 700, 35),
(8, 'Khulna', 'Dhaka', 'Shakura Poribahon', 'bus', 700, 40),
(9, 'Dhaka', 'Mymensingh', 'Ena Poribahon', 'bus', 250, 40),
(10, 'Mymensingh', 'Dhaka', 'Ena Poribahon', 'bus', 250, 40),
(11, 'Dhaka', 'Sylhet', 'Shamim Poribahon', 'bus', 300, 40),
(12, 'Sylhet', 'Dhaka', 'Shamim Poribahon', 'bus', 300, 40),
(13, 'Dhaka', 'Chittagong', 'Subarna Express', 'train', 550, 100),
(14, 'Chittagong', 'Dhaka', 'Subarna Express', 'train', 550, 100),
(15, 'Dhaka', 'Sylhet', 'Parabat Express', 'train', 250, 90),
(16, 'Sylhet', 'Dhaka', 'Parabat Express', 'train', 250, 90),
(17, 'Dhaka', 'Khulna', 'Sundarban Express', 'bus', 500, 100),
(18, 'Khulna', 'Dhaka', 'Sundarban Express', 'train', 500, 100),
(19, 'Dhaka', 'Mymensingh', 'Mohangonj Express', 'train', 150, 90),
(20, 'Mymensingh', 'Dhaka', 'Mohangonj Express', 'train', 150, 90),
(27, 'Chittagong', 'Dhaka', 'US-Bangla Airlines', 'plane', 1500, 200),
(28, 'Dhaka', 'Chittagong', 'US-Bangla Airlines', 'plane', 1500, 200),
(29, 'Dhaka', 'Sylhet', 'Biman Bangladesh Airlines', 'plane', 1200, 200),
(30, 'Dhaka', 'Khulna', 'Novoair', 'plane', 1200, 150),
(31, 'Khulna', 'Dhaka', 'Novoair', 'plane', 1200, 150),
(32, 'Sylhet', 'Dhaka', 'Biman Bangladesh Airlines', 'plane', 1200, 200);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(99) NOT NULL,
  `bus_from` varchar(99) NOT NULL,
  `bus_to` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `bus_from`, `bus_to`) VALUES
(1, 'Dhaka', 'Chittagong'),
(2, 'Chittagong', 'Dhaka'),
(3, 'Mymensingh', 'Khulna'),
(4, 'Khulna', 'Sylhet'),
(5, 'Sylhet', 'Mymensingh');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(99) NOT NULL,
  `location` varchar(99) NOT NULL,
  `hotel_name` varchar(99) NOT NULL,
  `hotel_type` varchar(99) NOT NULL,
  `hotel_cost` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `location`, `hotel_name`, `hotel_type`, `hotel_cost`) VALUES
(6, 'Dhaka', 'Hotel Intercontinental', 'five star', '10000'),
(7, 'Dhaka', 'Radisson Blu', 'five star', '15000'),
(8, 'Dhaka', 'Le Méridien', 'five star', '15000'),
(9, 'Mymensingh', 'Silver Castle Hotel & Spa', 'three star', '5000'),
(10, 'Mymensingh', 'Hotel Amir International', 'three star', '3000'),
(11, 'Khulna', 'Tiger Garden Int. Hotel', 'five star', '4000'),
(12, 'Khulna', 'Hotel Royal International', 'three star', '3000'),
(13, 'Sylhet', 'Grand Sultan Tea Resort & Golf', 'five star', '15000'),
(14, 'Sylhet', 'Hotel Noorjahan Grand', 'three star', '5000'),
(15, 'Chittagong', 'Well Park Residence', 'three star', '5000'),
(16, 'Chittagong', 'Radisson Blu Chattogram Bay View', 'five star', '12000');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(99) NOT NULL,
  `location` varchar(255) NOT NULL,
  `restaurant_name` varchar(255) NOT NULL,
  `food_type` varchar(99) NOT NULL,
  `restaurant_cost` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `location`, `restaurant_name`, `food_type`, `restaurant_cost`) VALUES
(5, 'Mymensingh', 'Avanti Aroma Restaurant', 'chinese', '200'),
(6, 'Mymensingh', 'Sarinda', 'bengali', '200'),
(7, 'Dhaka', 'Hazir Biriani', 'bengali', '200'),
(8, 'Dhaka', 'Cafe Chinese', 'chinese', '200'),
(9, 'Dhaka', 'Thai Nation', 'thai', '200'),
(10, 'Sylhet', 'La Vista Hotel', 'chinese', '200'),
(11, 'Sylhet', 'Woondaal King Kebab', 'bengali', '200'),
(12, 'Khulna', 'Deshi Kitchen', 'chinese', '200'),
(13, 'Khulna', 'We Hungry', 'chinese', '200'),
(14, 'Chittagong', 'The Pavilion', 'chinese', '200'),
(15, 'Chittagong', 'Mezbani Beef', 'bengali', '200');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(99) NOT NULL,
  `first_name` varchar(99) NOT NULL,
  `last_name` varchar(99) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`) VALUES
(5, 'Samik', 'Ahmed', 'samikeshti00@gmail.com', '$2y$10$DSo5szYCfTwNWL9wHiUHQegIq6bQzKXLAQkjVlIy9Fk84QDwc6Jv.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buss_info`
--
ALTER TABLE `buss_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Bus From` (`bus_from`) USING BTREE,
  ADD KEY `Bus To` (`bus_to`) USING BTREE;

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Unique From` (`bus_from`) USING BTREE,
  ADD UNIQUE KEY `Unique To` (`bus_to`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buss_info`
--
ALTER TABLE `buss_info`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
