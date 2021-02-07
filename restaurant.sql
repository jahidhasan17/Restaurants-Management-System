-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2021 at 07:45 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) UNSIGNED NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `re_date` varchar(100) NOT NULL,
  `re_time` varchar(100) NOT NULL,
  `guest` int(30) NOT NULL,
  `suggestions` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `customer_id`, `re_date`, `re_time`, `guest`, `suggestions`, `status`) VALUES
(2, 5, '2021-02-05', '14:36', 121, 'sdfds', 'Pending'),
(4, 5, '2021-02-11', '19:33', 4, 'sdf', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(8, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `active` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `active`) VALUES
(1, 'burger', 'img-3.jpg', 'Yes'),
(8, 'Pizza', 'img-4.jpg', 'Yes'),
(9, 'Momo', 'img-1.jpg', 'Yes'),
(10, 'Pasta', 'img-2.jpg', 'Yes'),
(11, 'Poroto', 'img-5.jpg', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `contact` int(10) NOT NULL,
  `location` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `full_name`, `contact`, `location`, `email`, `username`, `password`) VALUES
(5, 'Jahid Hasan', 123456, 'Lake City,D Block', 'jhasan1743@gmail.com', 'jahid_hasan17', '123'),
(6, 'Hasan', 123456, 'Lake City,D Block', 'hasan@gmail.com', 'Hasan', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `price`, `image_name`, `category_id`, `active`) VALUES
(9, 'Burger', '11', 'img-1.jpg', 1, 'Yes'),
(10, 'Pizza', '12', 'img-2.jpg', 8, 'Yes'),
(11, 'Momo', '13', 'img-3.jpg', 9, 'Yes'),
(12, 'Pasta', '15', 'img-4.jpg', 10, 'Yes'),
(13, 'Poroto', '11', 'img-5.jpg', 11, 'Yes'),
(14, 'Pizza1', '111', 'img-1.jpg', 8, 'Yes'),
(15, 'sdfsdf', '123', 'img-3.jpg', 8, 'Yes'),
(16, 'rwer', '234', 'img-5.jpg', 8, 'Yes'),
(17, 'sdrfsdf', '2343', 'img-3.jpg', 8, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(30) UNSIGNED NOT NULL,
  `order_date` datetime NOT NULL,
  `total_amount` decimal(10,0) NOT NULL,
  `order_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `customer_id`, `order_date`, `total_amount`, `order_status`) VALUES
(22, 5, '2021-02-04 08:40:13', '1552', 'Delivered'),
(23, 5, '2021-02-04 09:14:06', '5438', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderdetails`
--

CREATE TABLE `tbl_orderdetails` (
  `id` int(11) UNSIGNED NOT NULL,
  `order_id` int(11) UNSIGNED NOT NULL,
  `food_id` int(11) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_orderdetails`
--

INSERT INTO `tbl_orderdetails` (`id`, `order_id`, `food_id`, `qty`, `total`) VALUES
(16, 22, 10, 12, '144'),
(17, 22, 14, 12, '1332'),
(18, 22, 9, 1, '11'),
(19, 22, 11, 5, '65'),
(20, 23, 10, 2, '24'),
(21, 23, 17, 2, '4686'),
(22, 23, 11, 2, '26'),
(23, 23, 15, 3, '369'),
(24, 23, 14, 3, '333');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orderdetails`
--
ALTER TABLE `tbl_orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_orderdetails`
--
ALTER TABLE `tbl_orderdetails`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
