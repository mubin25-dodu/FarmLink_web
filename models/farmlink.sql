-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2025 at 06:26 AM
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
(1, 'ag1', 'PROD001', 1),
(2, 'ag1', 'PROD006', 1),
(3, 'ag1', 'PROD001', 1),
(4, 'bu-1', 'PROD001', 1),
(5, 'bu-1', 'PROD001', 1),
(6, 'bu-1', 'PROD002', 1),
(7, 'bu-1', 'PROD003', 1),
(8, 'bu-1', 'PROD002', 1),
(9, 'ag1', 'PROD001', 1),
(10, 'ag1', 'PROD001', 1);

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
('PROD001', 'Fresh Mango', 'Premium quality Himsagar mangoes directly from farm. Sweet and juicy, perfect for the summer season.', 150, 500, 'https://images.unsplash.com/photo-1553279768-865429fa0078?w=400', 'SELLER001', 'AGENT001', 'Kg', 'Fruit'),
('PROD002', 'Organic Potato', 'Farm fresh organic potatoes, grown without pesticides. Ideal for cooking and frying.', 35, 1000, 'https://images.unsplash.com/photo-1518977676601-b53f82aba655?w=400', 'SELLER002', 'AGENT001', 'Kg', 'Vegetable'),
('PROD003', 'Hilsa Fish', 'Fresh Hilsa fish caught from Padma river. Rich in omega-3 fatty acids.', 1200, 50, 'https://images.unsplash.com/photo-1560155477-4b0a2f770eb9?w=400', 'SELLER003', 'AGENT002', 'Kg', 'Fish'),
('PROD004', 'Farm Chicken', 'Organic farm-raised chicken. Healthy and chemical-free meat.', 280, 100, 'https://images.unsplash.com/photo-1587593810167-a84920ea0781?w=400', 'SELLER001', 'AGENT002', 'Kg', 'Meat'),
('PROD005', 'Fresh Milk', 'Pure cow milk collected daily from local dairy farms. No additives or preservatives.', 65, 200, 'https://images.unsplash.com/photo-1550583724-b2692b85b150?w=400', 'SELLER004', 'AGENT003', 'Liter', 'Dairy'),
('PROD006', 'Country Eggs', 'Fresh country chicken eggs. High protein and nutritious.', 120, 300, 'https://images.unsplash.com/photo-1582722872445-44dc5f7e3c8f?w=400', 'SELLER002', 'AGENT001', 'Dozen', 'Egg'),
('PROD007', 'Red Tomato', 'Fresh red tomatoes, perfect for salads and cooking. Rich in vitamins.', 45, 800, 'https://images.unsplash.com/photo-1546470427-e26264be0b0d?w=400', 'SELLER003', 'AGENT003', 'Kg', 'Vegetable'),
('PROD008', 'Banana', 'Ripe Sobri bananas from Chittagong. Sweet and energy-rich fruit.', 60, 600, 'https://images.unsplash.com/photo-1571771894821-ce9b6c11b08e?w=400', 'SELLER004', 'AGENT002', 'Dozen', 'Fruit'),
('PROD009', 'Paneer', 'Fresh homemade paneer from pure milk. Perfect for various dishes.', 350, 50, 'https://images.unsplash.com/photo-1631452180539-96aca7d48617?w=400', 'SELLER001', 'AGENT003', 'Kg', 'Dairy'),
('PROD010', 'Rui Fish', 'Fresh Rui fish from pond. Popular choice for Bengali cuisine.', 280, 150, 'https://images.unsplash.com/photo-1534943441045-1a8b3a6d6d8f?w=400', 'SELLER002', 'AGENT001', 'Kg', 'Fish'),
('PR001', 'Fresh Mango', 'Premium quality Himsagar mangoes directly from farm. Sweet and juicy, perfect for the summer season.', 150, 500, 'https://images.unsplash.com/photo-1553279768-865429fa0078?w=400', 'SELLER001', 'AGENT001', 'Kg', 'PROD001'),
('PR001', 'Fresh Mango', 'Premium quality Himsagar mangoes directly from farm. Sweet and juicy, perfect for the summer season.', 150, 500, 'https://images.unsplash.com/photo-1553279768-865429fa0078?w=400', 'SELLER001', 'AGENT001', 'Kg', 'PROD002'),
('PR001', 'Fresh Mango', 'Premium quality Himsagar mangoes directly from farm. Sweet and juicy, perfect for the summer season.', 150, 500, 'https://images.unsplash.com/photo-1553279768-865429fa0078?w=400', 'SELLER001', 'AGENT001', 'Kg', 'PROD003'),
('PR001', 'Fresh Mango', 'Premium quality Himsagar mangoes directly from farm. Sweet and juicy, perfect for the summer season.', 150, 500, 'https://images.unsplash.com/photo-1553279768-865429fa0078?w=400', 'SELLER001', 'AGENT001', 'Kg', 'PROD004'),
('PR001', 'Fresh Mango', 'Premium quality Himsagar mangoes directly from farm. Sweet and juicy, perfect for the summer season.', 150, 500, 'https://images.unsplash.com/photo-1553279768-865429fa0078?w=400', 'SELLER001', 'AGENT001', 'Kg', 'PROD005'),
('PR001', 'Fresh Mango', 'Premium quality Himsagar mangoes directly from farm. Sweet and juicy, perfect for the summer season.', 150, 500, 'https://images.unsplash.com/photo-1553279768-865429fa0078?w=400', 'SELLER001', 'AGENT001', 'Kg', 'PROD006'),
('PR001', 'Fresh Mango', 'Premium quality Himsagar mangoes directly from farm. Sweet and juicy, perfect for the summer season.', 150, 500, 'https://images.unsplash.com/photo-1553279768-865429fa0078?w=400', 'SELLER001', 'AGENT001', 'Kg', 'PROD007'),
('PR001', 'Fresh Mango', 'Premium quality Himsagar mangoes directly from farm. Sweet and juicy, perfect for the summer season.', 150, 500, 'https://images.unsplash.com/photo-1553279768-865429fa0078?w=400', 'SELLER001', 'AGENT001', 'Kg', 'PROD008'),
('PR001', 'Fresh Mango', 'Premium quality Himsagar mangoes directly from farm. Sweet and juicy, perfect for the summer season.', 150, 500, 'https://images.unsplash.com/photo-1553279768-865429fa0078?w=400', 'SELLER001', 'AGENT001', 'Kg', 'PROD009'),
('PR001', 'Fresh Mango', 'Premium quality Himsagar mangoes directly from farm. Sweet and juicy, perfect for the summer season.', 150, 500, 'https://images.unsplash.com/photo-1553279768-865429fa0078?w=400', 'SELLER001', 'AGENT001', 'Kg', 'PROD010'),
('PR001', 'Fresh Mango', 'Premium quality Himsagar mangoes directly from farm. Sweet and juicy, perfect for the summer season.', 150, 500, 'https://images.unsplash.com/photo-1553279768-865429fa0078?w=400', 'SELLER001', 'AGENT001', 'Kg', 'PROD001'),
('PR001', 'Fresh Mango', 'Premium quality Himsagar mangoes directly from farm. Sweet and juicy, perfect for the summer season.', 150, 500, 'https://images.unsplash.com/photo-1553279768-865429fa0078?w=400', 'SELLER001', 'AGENT001', 'Kg', 'PROD002'),
('PR001', 'Fresh Mango', 'Premium quality Himsagar mangoes directly from farm. Sweet and juicy, perfect for the summer season.', 150, 500, 'https://images.unsplash.com/photo-1553279768-865429fa0078?w=400', 'SELLER001', 'AGENT001', 'Kg', 'PROD003'),
('PR001', 'Fresh Mango', 'Premium quality Himsagar mangoes directly from farm. Sweet and juicy, perfect for the summer season.', 150, 500, 'https://images.unsplash.com/photo-1553279768-865429fa0078?w=400', 'SELLER001', 'AGENT001', 'Kg', 'PROD004'),
('PR001', 'Fresh Mango', 'Premium quality Himsagar mangoes directly from farm. Sweet and juicy, perfect for the summer season.', 150, 500, 'https://images.unsplash.com/photo-1553279768-865429fa0078?w=400', 'SELLER001', 'AGENT001', 'Kg', 'PROD005'),
('PR001', 'Fresh Mango', 'Premium quality Himsagar mangoes directly from farm. Sweet and juicy, perfect for the summer season.', 150, 500, 'https://images.unsplash.com/photo-1553279768-865429fa0078?w=400', 'SELLER001', 'AGENT001', 'Kg', 'PROD006'),
('PR001', 'Fresh Mango', 'Premium quality Himsagar mangoes directly from farm. Sweet and juicy, perfect for the summer season.', 150, 500, 'https://images.unsplash.com/photo-1553279768-865429fa0078?w=400', 'SELLER001', 'AGENT001', 'Kg', 'PROD007'),
('PR001', 'Fresh Mango', 'Premium quality Himsagar mangoes directly from farm. Sweet and juicy, perfect for the summer season.', 150, 500, 'https://images.unsplash.com/photo-1553279768-865429fa0078?w=400', 'SELLER001', 'AGENT001', 'Kg', 'PROD008'),
('PR001', 'Fresh Mango', 'Premium quality Himsagar mangoes directly from farm. Sweet and juicy, perfect for the summer season.', 150, 500, 'https://images.unsplash.com/photo-1553279768-865429fa0078?w=400', 'SELLER001', 'AGENT001', 'Kg', 'PROD009'),
('PR001', 'Fresh Mango', 'Premium quality Himsagar mangoes directly from farm. Sweet and juicy, perfect for the summer season.', 150, 500, 'https://images.unsplash.com/photo-1553279768-865429fa0078?w=400', 'SELLER001', 'AGENT001', 'Kg', 'PROD010'),
('PR001', 'Fresh Mango', 'Premium quality Himsagar mangoes directly from farm. Sweet and juicy, perfect for the summer season.', 150, 500, 'https://images.unsplash.com/photo-1553279768-865429fa0078?w=400', 'SELLER001', 'AGENT001', 'Kg', 'PR001'),
('PR001', 'Fresh Mango', 'Premium quality Himsagar mangoes directly from farm. Sweet and juicy, perfect for the summer season.', 150, 500, 'https://images.unsplash.com/photo-1553279768-865429fa0078?w=400', 'SELLER001', 'AGENT001', 'Kg', 'PR001'),
('PR001', 'Fresh Mango', 'Premium quality Himsagar mangoes directly from farm. Sweet and juicy, perfect for the summer season.', 150, 500, 'https://images.unsplash.com/photo-1553279768-865429fa0078?w=400', 'SELLER001', 'AGENT001', 'Kg', 'PR001'),
('PR001', 'Fresh Mango', 'Premium quality Himsagar mangoes directly from farm. Sweet and juicy, perfect for the summer season.', 150, 500, 'https://images.unsplash.com/photo-1553279768-865429fa0078?w=400', 'SELLER001', 'AGENT001', 'Kg', 'PR001'),
('PR001', 'Fresh Mango', 'Premium quality Himsagar mangoes directly from farm. Sweet and juicy, perfect for the summer season.', 150, 500, 'https://images.unsplash.com/photo-1553279768-865429fa0078?w=400', 'SELLER001', 'AGENT001', 'Kg', 'PR001'),
('PR001', 'Fresh Mango', 'Premium quality Himsagar mangoes directly from farm. Sweet and juicy, perfect for the summer season.', 150, 500, 'https://images.unsplash.com/photo-1553279768-865429fa0078?w=400', 'SELLER001', 'AGENT001', 'Kg', 'PR001'),
('PR001', 'Fresh Mango', 'Premium quality Himsagar mangoes directly from farm. Sweet and juicy, perfect for the summer season.', 150, 500, 'https://images.unsplash.com/photo-1553279768-865429fa0078?w=400', 'SELLER001', 'AGENT001', 'Kg', 'PR001'),
('PR001', 'Fresh Mango', 'Premium quality Himsagar mangoes directly from farm. Sweet and juicy, perfect for the summer season.', 150, 500, 'https://images.unsplash.com/photo-1553279768-865429fa0078?w=400', 'SELLER001', 'AGENT001', 'Kg', 'PR001'),
('PR001', 'Fresh Mango', 'Premium quality Himsagar mangoes directly from farm. Sweet and juicy, perfect for the summer season.', 150, 500, 'https://images.unsplash.com/photo-1553279768-865429fa0078?w=400', 'SELLER001', 'AGENT001', 'Kg', 'PR001'),
('PR001', 'Fresh Mango', 'Premium quality Himsagar mangoes directly from farm. Sweet and juicy, perfect for the summer season.', 150, 500, 'https://images.unsplash.com/photo-1553279768-865429fa0078?w=400', 'SELLER001', 'AGENT001', 'Kg', 'PR001');

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
('abdullah al mubin', 'm16@gmail.com', 1870500658, '11111111', 'Seller', 'kuril, kaji bari mosjid', 'Seller', 'active', 'se-1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`basket_id`);

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
  MODIFY `basket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
