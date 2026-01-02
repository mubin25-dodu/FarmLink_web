-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2026 at 03:11 PM
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

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`odr_id`, `user_id`, `product_id`, `quantity`, `total_price`, `name`, `phone`, `address`, `payment_method`, `status`) VALUES
('ODR_1', 'bu-6', 'PROD004', 5, 1400.00, 'wdawd awd', '+8801870500658', 'qwqw qdd qd', 'bkash', 'Pending'),
('ODR_1', 'bu-6', 'PROD006', 5, 600.00, 'wdawd awd', '+8801870500658', 'qwqw qdd qd', 'bkash', 'Pending'),
('ODR_3', 'bu-6', 'PROD004', 2, 560.00, 'wdawd awd', '+8801870500658', 'qwqw qdd qd', 'bkash', 'Pending'),
('ODR_4', 'bu-6', 'PROD005', 3, 195.00, 'wdawd awd', '+8801870500658', 'qwqw qdd qd', 'bkash', 'Pending'),
('ODR_5', 'bu-6', 'PROD004', 3, 840.00, 'wdawd awd', '+8801870500658', 'qwqw qdd qd', 'bkash', 'Pending'),
('ODR_6', 'bu-6', 'PROD006', 2, 240.00, 'wdawd awd', '+8801870500658', 'qwqw qdd qd', 'bkash', 'Pending'),
('ODR_7', 'bu-1', 'PROD004', 1, 280.00, 'abdullah al mubin', '+8801870500658', 'kuril, kaji bari mosjid', 'bkash', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `unit_price` decimal(10,0) DEFAULT NULL,
  `available_unit` decimal(10,0) NOT NULL,
  `image` varchar(150) NOT NULL,
  `seller_id` varchar(50) NOT NULL,
  `agent_id` varchar(50) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `catagory` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `description`, `unit_price`, `available_unit`, `image`, `seller_id`, `agent_id`, `unit`, `catagory`) VALUES
('PROD004', 'Farm Chicken', 'Organic farm-raised chicken. Healthy and chemical-free meat.', 280, 99, 'https://images.unsplash.com/photo-1587593810167-a84920ea0781?w=400', 'SELLER001', 'AGENT002', 'Kg', 'Meat'),
('PROD005', 'Fresh Milk', 'Pure cow milk collected daily from local dairy farms. No additives or preservatives.', 65, 200, 'https://images.unsplash.com/photo-1550583724-b2692b85b150?w=400', 'SELLER004', 'AGENT003', 'Liter', 'Dairy'),
('PROD006', 'Country Eggs', 'Fresh country chicken eggs. High protein and nutritious.', 120, 298, 'https://images.unsplash.com/photo-1582722872445-44dc5f7e3c8f?w=400', 'SELLER002', 'AGENT001', 'Dozen', 'Egg'),
('PROD007', 'Red Tomato', 'Fresh red tomatoes, perfect for salads and cooking. Rich in vitamins.', 45, 800, 'https://images.unsplash.com/photo-1546470427-e26264be0b0d?w=400', 'SELLER003', 'AGENT003', 'Kg', 'Vegetable'),
('PROD008', 'Banana', 'Ripe Sobri bananas from Chittagong. Sweet and energy-rich fruit.', 60, 600, 'https://images.unsplash.com/photo-1571771894821-ce9b6c11b08e?w=400', 'SELLER004', 'AGENT002', 'Dozen', 'Fruit'),
('PROD009', 'Paneer', 'Fresh homemade paneer from pure milk. Perfect for various dishes.', 350, 50, 'https://images.unsplash.com/photo-1631452180539-96aca7d48617?w=400', 'SELLER001', 'AGENT003', 'Kg', 'Dairy'),
('PROD010', 'Rui Fish', 'Fresh Rui fish from pond. Popular choice for Bengali cuisine.', 280, 150, 'https://images.unsplash.com/photo-1534943441045-1a8b3a6d6d8f?w=400', 'SELLER002', 'AGENT001', 'Kg', 'Fish'),
('PROD011', 'Green Beans', 'Crisp and fresh green beans, perfect for stir fry.', 55, 400, 'https://images.unsplash.com/photo-1502741338009-cac2772e18bc?w=400', 'SELLER005', 'AGENT002', 'Kg', 'Vegetable'),
('PROD012', 'Carrot', 'Sweet and crunchy carrots, rich in beta-carotene.', 40, 700, 'https://images.unsplash.com/photo-1465101046530-73398c7f28ca?w=400', 'SELLER006', 'AGENT003', 'Kg', 'Vegetable'),
('PROD013', 'Broccoli', 'Fresh broccoli, great for steaming and salads.', 90, 250, 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=400', 'SELLER007', 'AGENT001', 'Kg', 'Vegetable'),
('PROD014', 'Pumpkin', 'Locally grown pumpkin, ideal for curries and soups.', 30, 350, 'https://images.unsplash.com/photo-1502741338009-cac2772e18bc?w=400', 'SELLER008', 'AGENT002', 'Kg', 'Vegetable'),
('PROD015', 'Spinach', 'Fresh spinach leaves, rich in iron and vitamins.', 25, 500, 'https://images.unsplash.com/photo-1519864600265-abb23847ef2c?w=400', 'SELLER009', 'AGENT003', 'Kg', 'Vegetable'),
('PROD016', 'Buffalo Meat', 'Lean and tender buffalo meat, locally sourced.', 600, 80, 'https://images.unsplash.com/photo-1519864600265-abb23847ef2c?w=400', 'SELLER010', 'AGENT001', 'Kg', 'Meat'),
('PROD017', 'Duck Eggs', 'Farm-fresh duck eggs, rich in nutrients.', 150, 120, 'https://images.unsplash.com/photo-1582722872445-44dc5f7e3c8f?w=400', 'SELLER011', 'AGENT002', 'Dozen', 'Egg'),
('PROD018', 'Sweet Corn', 'Juicy sweet corn, perfect for boiling or grilling.', 35, 300, 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=400', 'SELLER012', 'AGENT003', 'Kg', 'Vegetable'),
('PROD019', 'Guava', 'Fresh guavas, high in vitamin C.', 70, 200, 'https://images.unsplash.com/photo-1502741338009-cac2772e18bc?w=400', 'SELLER013', 'AGENT001', 'Kg', 'Fruit'),
('PROD020', 'Cucumber', 'Cool and crisp cucumbers, great for salads.', 30, 400, 'https://images.unsplash.com/photo-1465101046530-73398c7f28ca?w=400', 'SELLER014', 'AGENT002', 'Kg', 'Vegetable'),
('PROD021', 'Beef', 'Fresh beef, locally sourced and hygienically processed.', 700, 90, 'https://images.unsplash.com/photo-1519864600265-abb23847ef2c?w=400', 'SELLER015', 'AGENT003', 'Kg', 'Meat'),
('PROD022', 'Goat Meat', 'Tender goat meat, perfect for curries.', 850, 60, 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=400', 'SELLER016', 'AGENT001', 'Kg', 'Meat'),
('PROD023', 'Papaya', 'Ripe papayas, sweet and full of nutrients.', 50, 180, 'https://images.unsplash.com/photo-1502741338009-cac2772e18bc?w=400', 'SELLER017', 'AGENT002', 'Kg', 'Fruit'),
('PROD024', 'Lemon', 'Fresh lemons, perfect for juice and seasoning.', 15, 500, 'https://images.unsplash.com/photo-1465101046530-73398c7f28ca?w=400', 'SELLER018', 'AGENT003', 'Dozen', 'Fruit');

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
('abdullah al mubin', 'mubin@gmail.com', 1870500688, 'wwwwwwww', 'Buyer', 'kuril, kaji bari mosjid', 'Seller', 'active', 'bu-4'),
('wdawd awd', 'jinar20897@mmm.com', 1870500111, '11111111', 'Buyer', 'qwqw qdd qd', 'Dhaka', 'active', 'bu-6'),
('abdullah al mubin', 'm16@gmail.com', 1870500658, '11111111', 'Seller', 'kuril, kaji bari mosjid', 'Seller', 'active', 'se-1'),
('nai', 'mubin7@gamintor.com', 1870500568, '11111111', 'Seller', 'qwqw qdd qd', 'Chattogram', 'active', 'se-5');

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
  MODIFY `basket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
