-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2026 at 05:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmlink`
--

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `basket_id` int(11) NOT NULL,
  `buyer_id` varchar(50) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`basket_id`, `buyer_id`, `product_id`, `quantity`) VALUES
(81, 'bu-1', '35', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `odr_id` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `unit_price` decimal(10,0) NOT NULL,
  `available_unit` decimal(10,0) NOT NULL,
  `image` varchar(150) NOT NULL,
  `seller_id` varchar(50) NOT NULL,
  `agent_id` varchar(50) DEFAULT NULL,
  `unit` varchar(50) NOT NULL,
  `catagory` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `description`, `unit_price`, `available_unit`, `image`, `seller_id`, `agent_id`, `unit`, `catagory`) VALUES
(34, 'Organic Potato', 'Fresh organic potatoes from local farms.', 35, 500, 'https://images.unsplash.com/photo-1502741338009-cac2772e18bc?w=400', 'se-23', NULL, 'Kg', 'Vegetable'),
(35, 'Deshi Chicken', 'Free-range deshi chicken, healthy and tasty.', 320, 50, 'https://images.unsplash.com/photo-1587593810167-a84920ea0781?w=400', 'se-23', NULL, 'Kg', 'Meat'),
(36, 'Farm Eggs', 'Farm-fresh eggs, high in protein.', 110, 200, 'https://images.unsplash.com/photo-1582722872445-44dc5f7e3c8f?w=400', 'se-23', NULL, 'Dozen', 'Egg'),
(37, 'Fresh Spinach', 'Green spinach leaves, rich in iron.', 30, 300, 'https://images.unsplash.com/photo-1519864600265-abb23847ef2c?w=400', 'se-23', NULL, 'Kg', 'Vegetable'),
(38, 'Sweet Mango', 'Juicy sweet mangoes from Rajshahi.', 80, 100, 'https://images.unsplash.com/photo-1571771894821-ce9b6c11b08e?w=400', 'se-23', NULL, 'Kg', 'Fruit');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(15) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` varchar(10) NOT NULL,
  `address` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `status` varchar(15) NOT NULL,
  `UID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`name`, `email`, `phone`, `password`, `role`, `address`, `city`, `status`, `UID`) VALUES
('wdawd awd', 'jinar20897@gamintor.com', 1870500658, '11111111', 'Buyer', 'qwqw qdd qd', 'Seller', 'active', 'ag1'),
('wdawd awd', 'jar20897@gamintor.com', 1870500660, '11111111', 'Buyer', 'qwqw qdd qd', 'Buyer', 'active', 'asd'),
('abdullah al mubin', 'mubin9516@gmail.com', 1870500658, 'dddddddd', 'Buyer', 'kuril, kaji bari mosjid', 'Buyer', 'active', 'bu-1'),
('aa a', 'mubin@ubin.com', 1770500658, '11111111', 'Buyer', 'sd sdf sds s', 'Dhaka', 'active', 'bu-10'),
('abdullah al mubin', 'pihebo534@cucadas.com', 1820500658, '11111111', 'Buyer', 'kuril, kaji bari mosjid', 'Dhaka', 'active', 'bu-11'),
('wdawd awd', 'jinar0897@mmm.com', 1870555515, '11111111', 'Buyer', 'jinar20897@mmm.com', 'Dhaka', 'active', 'bu-12'),
('abdullah al mubin', 'mubin56@gmail.com', 1870500158, '11111111', 'Buyer', 'kuril, kaji bari mosjid', 'Dhaka', 'active', 'bu-13'),
('abdullah al mubin', 'mubin9516@gil.com', 1870500653, 'qqqqqqqq', 'Buyer', 'kuril, kaji bari mosjid', 'Dhaka', 'active', 'bu-14'),
('abdullah al mubin', 'mubin9516@gmal.com', 1870500123, 'qqqqqqqq', 'Buyer', 'kuril, kaji bari mosjid', 'Dhaka', 'active', 'bu-15'),
('wdawd awd', 'jinar0897@mm1.com', 1870555510, '11111111', 'Buyer', 'jinar20897@mmm.com', 'Dhaka', 'active', 'bu-16'),
('abdullah al mubin', 'mubin9516@gail.com', 1870500611, '11111111', 'Buyer', 'kuril, kaji bari mosjid', 'Dhaka', 'active', 'bu-17'),
('abdullah al mubin', 'mubin9516@ail.com', 1870500623, '11111111', 'Buyer', 'kuril, kaji bari mosjid', 'Dhaka', 'active', 'bu-19'),
('abdullah al mubin', 'mub516@gmail.com', 1871110658, '11111111', 'Buyer', 'kuril, kaji bari mosjid', 'Dhaka', 'active', 'bu-20'),
('mubin', 'almubin9516@gmail.com.com', 1575707756, '11111111', 'Buyer', 'sd sdf sds s', 'Dhaka', 'active', 'bu-21'),
('aa a', 'mu@nubin.com', 1874500601, '11111111', 'Buyer', 'sd sdf sds s', 'Barishal', 'active', 'bu-22'),
('abdullah al mubin', 'mubin@gmail.com', 1870500688, 'wwwwwwww', 'Buyer', 'kuril, kaji bari mosjid', 'Seller', 'active', 'bu-4'),
('wdawd awd', 'jinar20897@mmm.com', 1870500111, '11111111', 'Buyer', 'qwqw qdd qd', 'Dhaka', 'active', 'bu-6'),
('aa a', 'mbin@nubin.com', 1870500958, '11111111', 'Buyer', 'sd sdf sds s', 'Dhaka', 'active', 'bu-9'),
('abdullah al mubin', 'm16@gmail.com', 1870500658, '11111111', 'Seller', 'kuril, kaji bari mosjid', 'Seller', 'active', 'se-1'),
('abdullah al mubin', 'mubin951@gmail.com', 1870500258, '11111111', 'Seller', 'kuril, kaji bari mosjid', 'Dhaka', 'active', 'se-18'),
('abdullah', 'mubin99@nubin.com', 1870100658, '11111111', 'Seller', 'sd sdf sds s', 'Chattogram', 'active', 'se-23'),
('nai', 'mubin7@gamintor.com', 1870500568, '11111111', 'Seller', 'qwqw qdd qd', 'Chattogram', 'active', 'se-5'),
('wdawd awd', 'jinar97@mmm.com', 1870555555, '11111111', 'Seller', 'qwqw qdd qd', 'Dhaka', 'active', 'se-7'),
('aa a', 'mub@nubin.com', 1874500658, '11111111', 'Seller', 'sd sdf sds s', 'Barishal', 'active', 'se-8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`basket_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`odr_id`,`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
  MODIFY `basket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
