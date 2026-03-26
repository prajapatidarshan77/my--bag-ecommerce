-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2024 at 05:32 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


-- Database: `schoolbag`
--
CREATE DATABASE IF NOT EXISTS `Bag` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `Bag`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `a_id` int(4) NOT NULL AUTO_INCREMENT,
  `a_unm` varchar(30) NOT NULL,
  `a_pwd` varchar(30) NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_unm`, `a_pwd`) VALUES
('admin', 'admin');
--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `uname` varchar(100) NOT NULL,
  `pswd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `pswd` int(50) NOT NULL,
  `conpswd` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `add` varchar(50) NOT NULL,
  `dist` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `gender` enum('m','f') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `fname`, `lname`, `uname`, `pswd`, `conpswd`, `email`, `phone`, `add`, `dist`, `state`, `gender`) VALUES
(1, 'aa', 'bb', 'xx', 1234, 1234, 'aa01@gmail.com', 123456789, 'dhrangadhra', 's.nagar', 'gujarat', 'f'),
(2, 'nn', 'pp', 'nn', 123, 123, 'nn14@gmail.com', 123456789, 'dhrangadhra', 's.nagar', 'gujarat', ''),
(5, 'aa', 'bb', 'aa', 12345678, 12345678, 'aa123@gmail.com', 123456789, 'halvad road', 'dhrangadhra', 'Gujarat', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Database: `shop_db`
--
CREATE DATABASE IF NOT EXISTS `Bag` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `Bag`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `price`, `image`, `quantity`) VALUES
(12, 'Bag 2', '200', 'img 2.jpg', 1),
(14, 'Bag 1', '250', 'img 1.webp', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(100) NOT NULL,
  `flat` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `pin_code` int(10) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `orders` (`id`, `name`, `number`, `email`, `method`, `flat`, `street`, `city`, `state`, `country`, `pin_code`, `total_products`, `total_price`) VALUES
(8, 'abc', '0123456789', 'abc123@gmail.com', 'credit cart', '14', 'halvad road', 'dhrangadhra', 'Gujarat', 'india', 363310, 'Bag 2(1),Bag 3(1),Bag 1(1),Bag 4(1)', '830'),
(9, 'abc', '123456789', 'abc123@gmail.com', 'cash on delivery', '14', 'halvad road', 'dhrangadhra', 'Gujarat', 'India', 363310, 'Bag 2(1),Bag 3(1),Bag 1(1),Bag 4(1)', '830'),
(10, 'abc', '1234567890', 'abc123@gmail.com', 'cash on delivery', '14', 'halvad road', 'dhrangadhra', 'Gujarat', 'India', 363310, 'Bag 2(1),Bag 3(1),Bag 1(1),Bag 4(1),Bag 5(1),Bag 6(1)', '1630'),
(11, 'abc', '1234567869', 'abc123@gmail.com', 'cash on delivery', '14', 'halvad road', 'dhrangadhra', 'Gujarat', 'India', 363310, 'Bag 2(1),Bag 3(1),Bag 1(1),Bag 4(1),Bag 5(1),Bag 6(1)', '1630'),
(12, 'abc', '123456789', 'abc123@gmail.com', 'cash on delivery', '14', 'halvad road', 'dhrangadhra', 'Gujarat', 'India', 363310, 'Bag 2(1),Bag 3(1),Bag 1(1),Bag 4(1),Bag 5(1),Bag 6(1)', '1630'),
(13, 'abc', '123456789', 'abc123@gmail.com', 'Cash on delivery', '14', 'halvad road', 'dhrangadhra', 'Gujarat', 'India', 363310, 'Bag 2(1),Bag 3(1),Bag 1(1),Bag 4(1),Bag 5(1),Bag 6(1)', '1630'),
(14, 'abc', '123456789', 'abc123@gmail.com', 'Credit cart', '14', 'halvad road', 'dhrangadhra', 'Gujarat', 'India', 363310, 'Bag 2(1),Bag 3(1),Bag 1(1),Bag 4(1),Bag 5(1),Bag 6(1)', '1630'),
(15, 'abc', '123456789', 'abc123@gmail.com', 'Cash on delivery', '14', 'halvad road', 'dhrangadhra', 'Gujarat', 'India', 363310, 'Bag 2(1),Bag 3(1),Bag 1(1),Bag 4(1),Bag 5(1),Bag 6(1)', '1630'),
(16, 'abc', '123456789', 'abc123@gmail.com', 'Cash on delivery', '14', 'halvad road', 'dhrangadhra', 'Gujarat', 'India', 363310, 'Bag 2(1),Bag 3(1),Bag 1(1),Bag 4(1),Bag 5(1),Bag 6(1)', '1630'),
(17, 'abc', '123456789', 'abc123@gmail.com', 'Cash on delivery', '14', 'halvad road', 'dhrangadhra', 'Gujarat', 'India', 363310, 'Bag 2(1),Bag 3(1),Bag 1(1),Bag 4(1),Bag 5(1),Bag 6(1)', '1630'),
(18, 'abc', '123456789', 'abc123@gmail.com', 'Cash on delivery', '14', 'halvad road', 'dhrangadhra', 'Gujarat', 'India', 363310, 'Bag 2(1),Bag 3(1),Bag 1(1),Bag 4(1),Bag 5(1),Bag 6(1)', '1630'),
(19, 'abc', '123456789', 'abc123@gmail.com', 'Cash on delivery', '14', 'halvad road', 'dhrangadhra', 'Gujarat', 'India', 363310, 'Bag 2(1),Bag 1(1)', '450');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(11, 'Bag 1', '250', 'img 1.webp'),
(12, 'Bag 2', '200', 'img 2.jpg'),
(13, 'Bag 3', '180', 'img 12.webp'),
(14, 'Bag 4', '200', 'img 7.webp'),
(19, 'Bag 5', '500', 'img 5.jpeg'),
(21, 'Bag 6', '300', 'img 8.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
