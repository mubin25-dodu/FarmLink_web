-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2026 at 12:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
  `quantity` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`basket_id`, `buyer_id`, `product_id`, `quantity`, `date`) VALUES
(155, 'bu-0', '74 ', 1, '2026-01-17 23:02:55'),
(158, 'bu-0', '76 ', 1, '2026-01-18 18:42:18');

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
  `status` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `del_charge` int(11) DEFAULT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`odr_id`, `user_id`, `product_id`, `quantity`, `total_price`, `name`, `phone`, `address`, `payment_method`, `status`, `date`, `del_charge`, `city`) VALUES
('ODR_1', 'bu-0', '68 ', 4, 260.00, 'aa a', '+8801870500658', 'sd sdf sds s', 'bkash', 'Accepted', '2026-01-14 13:11:50', NULL, ''),
('ODR_1', 'bu-0', '69 ', 4, 2200.00, 'aa a', '+8801870500658', 'sd sdf sds s', 'bkash', 'Rejected', '2026-01-14 13:11:50', NULL, ''),
('ODR_10', 'bu-0', '100', 4, 600.00, 'abdullah al mubin', '+8801870500653', 'kuril, kaji bari mosjid', 'bkash', 'Accepted', '2026-01-14 23:42:22', 100, 'Dhaka'),
('ODR_11', 'bu-0', '80', 1, 38.00, 'abdullah al mubin', '+8801870500658', 'kuril, kaji bari mosjid', 'bkash', 'Pending', '2026-01-15 17:13:26', 0, 'Khulna'),
('ODR_12', 'bu-0', '69', 1, 550.00, 'abdullah al mubin', '+8801870500653', 'kuril, kaji bari mosjid', 'bkash', 'Pending', '2026-01-15 17:13:51', 0, 'Dhaka'),
('ODR_13', 'bu-0', '68 ', 1, 65.00, 'abdullah al mubin', '+8801870500658', 'kuril, kaji bari mosjid', 'bkash', 'Accepted', '2026-01-15 17:14:09', 100, 'Dhaka'),
('ODR_14', 'bu-0', '100', 9, 1350.00, 'aa a', '+8801874500658', 'sd sdf sds s', 'bkash', 'Accepted', '2026-01-15 17:29:15', 0, 'Barishal'),
('ODR_15', 'bu-0', '68 ', 1, 65.00, 'aa a', '+8801870500658', 'sd sdf sds s', 'bkash', 'Accepted', '2026-01-15 17:29:32', 100, 'Dhaka'),
('ODR_16', 'bu-0', '100', 2, 300.00, 'abdullah al mubin', '+8801870500653', 'kuril, kaji bari mosjid', 'bkash', 'Accepted', '2026-01-15 21:35:04', 200, 'Sylhet'),
('ODR_17', 'bu-0', '68 ', 2, 130.00, 'abdullah al mubin', '+8801870500653', 'kuril, kaji bari mosjid', 'bkash', 'Accepted', '2026-01-15 21:36:36', 200, 'Khulna'),
('ODR_17', 'bu-0', '69 ', 1, 550.00, 'abdullah al mubin', '+8801870500653', 'kuril, kaji bari mosjid', 'bkash', 'Pending', '2026-01-15 21:36:36', 200, 'Khulna'),
('ODR_17', 'bu-0', '70 ', 1, 20.00, 'abdullah al mubin', '+8801870500653', 'kuril, kaji bari mosjid', 'bkash', 'Pending', '2026-01-15 21:36:36', 200, 'Khulna'),
('ODR_20', 'bu-0', '68 ', 2, 130.00, 'abdullah al mubin', '+8801870500658', 'kuril, kaji bari mosjid', 'bkash', 'Pending', '2026-01-16 21:40:58', 100, 'Dhaka'),
('ODR_21', 'bu-0', '72', 2, 90.00, 'abdullah al mubin', '+8801870500658', 'kuril, kaji bari mosjid', 'bkash', 'Pending', '2026-01-16 21:43:06', 100, 'Dhaka'),
('ODR_22', 'bu-0', '68 ', 2, 130.00, 'wdawd awd', '+8801870500658', 'qwqw qdd qd', 'nagad', 'Pending', '2026-01-16 21:49:59', 100, 'Dhaka'),
('ODR_23', 'bu-0', '72', 2, 90.00, 'abdullah al mubin', '+8801870500658', 'kuril, kaji bari mosjid', 'bkash', 'Pending', '2026-01-16 21:57:49', 100, 'Dhaka'),
('ODR_24', 'bu-0', '68 ', 1, 65.00, '01870500658', '01870500658', '01870500658', 'bkash', 'Pending', '2026-01-16 22:02:22', 100, 'Dhaka'),
('ODR_25', 'bu-0', '100', 3, 450.00, 'abdullah al mubin', '+8801870500658', 'kuril, kaji bari mosjid', 'bkash', 'Pending', '2026-01-16 22:31:50', 200, 'Rangpur'),
('ODR_26', 'bu-0', '68 ', 1, 69.00, 'abdullah al mubin', '+8801870500658', 'kuril, kaji bari mosjid', 'bkash', 'Pending', '2026-01-18 11:51:04', 100, 'Dhaka'),
('ODR_26', 'bu-0', '69 ', 1, 550.00, 'abdullah al mubin', '+8801870500658', 'kuril, kaji bari mosjid', 'bkash', 'Pending', '2026-01-18 11:51:04', 100, 'Dhaka'),
('ODR_26', 'bu-0', '70 ', 1, 20.00, 'abdullah al mubin', '+8801870500658', 'kuril, kaji bari mosjid', 'bkash', 'Pending', '2026-01-18 11:51:04', 100, 'Dhaka'),
('ODR_26', 'bu-0', '72 ', 1, 45.00, 'abdullah al mubin', '+8801870500658', 'kuril, kaji bari mosjid', 'bkash', 'Pending', '2026-01-18 11:51:04', 100, 'Dhaka'),
('ODR_26', 'bu-0', '75 ', 1, 50.00, 'abdullah al mubin', '+8801870500658', 'kuril, kaji bari mosjid', 'bkash', 'Pending', '2026-01-18 11:51:04', 100, 'Dhaka'),
('ODR_26', 'bu-0', '76 ', 1, 35.00, 'abdullah al mubin', '+8801870500658', 'kuril, kaji bari mosjid', 'bkash', 'Pending', '2026-01-18 11:51:04', 100, 'Dhaka'),
('ODR_26', 'bu-0', '77 ', 1, 30.00, 'abdullah al mubin', '+8801870500658', 'kuril, kaji bari mosjid', 'bkash', 'Pending', '2026-01-18 11:51:04', 100, 'Dhaka'),
('ODR_3', 'bu-0', '72 ', 1, 45.00, 'aa a', '+8801870500658', 'sd sdf sds s', 'bkash', 'Rejected', '2026-01-14 13:12:38', NULL, ''),
('ODR_33', 'bu-0', '73 ', 2, 120.00, 'abdullah al mubin', '+8801870500653', 'kuril, kaji bari mosjid', 'bkash', 'Pending', '2026-01-18 18:43:31', 100, 'Dhaka'),
('ODR_4', 'bu-0', '68 ', 2, 130.00, 'abdullah al mubin', '+8801870500653', 'kuril, kaji bari mosjid', 'bkash', 'Accepted', '2026-01-14 13:25:54', NULL, ''),
('ODR_4', 'bu-0', '69 ', 2, 1100.00, 'abdullah al mubin', '+8801870500653', 'kuril, kaji bari mosjid', 'bkash', 'Accepted', '2026-01-14 13:25:54', NULL, ''),
('ODR_6', 'bu-0', '68 ', 2, 130.00, 'aa a', '+8801870500658', 'sd sdf sds s', 'bkash', 'Accepted', '2026-01-14 23:23:03', 100, ''),
('ODR_7', 'bu-0', '70 ', 1, 20.00, 'aa a', '+8801874500658', 'sd sdf sds s', 'bkash', 'Pending', '2026-01-14 23:26:02', 200, ''),
('ODR_7', 'bu-0', '71 ', 1, 100.00, 'aa a', '+8801874500658', 'sd sdf sds s', 'bkash', 'Pending', '2026-01-14 23:26:02', 200, ''),
('ODR_9', 'bu-0', '72 ', 6, 270.00, 'aa a', '+8801870500666', 'sd sdf sds s', 'bkash', 'Pending', '2026-01-14 23:28:25', 200, 'Rangpur');

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
  `category` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `description`, `unit_price`, `available_unit`, `image`, `seller_id`, `agent_id`, `unit`, `category`, `date`) VALUES
(68, 'Fresh Milk', 'Pure cow milk from local dairy farm.', 69, 130, 'https://images.unsplash.com/photo-1550583724-b2692b85b150?w=400', 'se-1', NULL, 'Liter', 'Dairy', '2026-01-14 11:25:25'),
(69, 'Beef', 'Fresh beef from farm cattle.', 550, 89, 'https://images.unsplash.com/photo-1588347818036-c6298ed47881?w=400', 'se-1', NULL, 'Kg', 'Meat', '2026-01-14 11:25:25'),
(70, 'Coriander Leaves', 'Fresh coriander for garnishing.', 20, 77, 'https://images.unsplash.com/photo-1614343621865-e9c6fc544694?w=400', 'se-1', NULL, 'Bundle', 'Other', '2026-01-14 11:25:25'),
(71, 'Fresh Ginger', 'Organic ginger, great for health.', 100, 0, 'https://images.unsplash.com/photo-1553175207-8e3d5e0b90d1?w=400', 'se-1', NULL, 'Kg', 'Other', '2026-01-14 11:25:25'),
(72, 'Fresh Tomatoes', 'Ripe red tomatoes, perfect for salads and cooking.', 45, 388, 'https://images.unsplash.com/photo-1546470427-e26264be0d3b?w=400', 'se-1', NULL, 'Kg', 'Vegetable', '2026-01-14 11:38:01'),
(73, 'Green Chili', 'Hot green chilies, freshly harvested.', 60, 148, 'https://images.unsplash.com/photo-1583663824728-c5e0d899ed2b?w=400', 'se-1', NULL, 'Kg', 'Vegetable', '2026-01-14 11:38:01'),
(74, 'Cauliflower', 'Fresh white cauliflower from local farm.', 40, 200, 'https://images.unsplash.com/photo-1568584711271-6e8f2a66c0e3?w=400', 'se-1', NULL, 'Kg', 'Vegetable', '2026-01-14 11:38:01'),
(75, 'Carrots', 'Sweet orange carrots, rich in vitamin A.', 50, 349, 'https://images.unsplash.com/photo-1598170845058-32b9d6a5da37?w=400', 'se-1', NULL, 'Kg', 'Vegetable', '2026-01-14 11:38:01'),
(76, 'Brinjal', 'Fresh purple brinjal/eggplant.', 35, 179, 'https://images.unsplash.com/photo-1659261200833-ec8761558af7?w=400', 'se-1', NULL, 'Kg', 'Vegetable', '2026-01-14 11:38:01'),
(77, 'Cabbage', 'Green fresh cabbage, great for salads.', 30, 249, 'https://images.unsplash.com/photo-1594282486552-05b4d80fbb9f?w=400', 'se-1', NULL, 'Kg', 'Vegetable', '2026-01-14 11:38:01'),
(78, 'Cucumber', 'Cool and fresh cucumbers.', 25, 300, 'https://images.unsplash.com/photo-1604977042946-1eecc30f269e?w=400', 'se-1', NULL, 'Kg', 'Vegetable', '2026-01-14 11:38:01'),
(79, 'Bitter Gourd', 'Fresh bitter gourd, very healthy.', 55, 120, 'https://images.unsplash.com/photo-1620706857370-e1b9770e8bb1?w=400', 'se-1', NULL, 'Kg', 'Vegetable', '2026-01-14 11:38:01'),
(80, 'Pumpkin', 'Large sweet pumpkin from farm.', 38, 279, 'https://images.unsplash.com/photo-1570586437263-ab629fccc818?w=400', 'se-1', NULL, 'Kg', 'Vegetable', '2026-01-14 11:38:01'),
(81, 'Radish', 'White radish, fresh and crunchy.', 28, 220, 'https://images.unsplash.com/photo-1597933534024-8a3a2e8c0586?w=400', 'se-1', NULL, 'Kg', 'Vegetable', '2026-01-14 11:38:01'),
(82, 'Papaya', 'Ripe papaya, sweet and juicy.', 50, 150, 'https://images.unsplash.com/photo-1617112848923-cc2234396a8d?w=400', 'se-1', NULL, 'Kg', 'Fruit', '2026-01-14 11:38:01'),
(83, 'Banana', 'Fresh ripe bananas from Jessore.', 60, 200, 'https://images.unsplash.com/photo-1571771894821-ce9b6c11b08e?w=400', 'se-1', NULL, 'Dozen', 'Fruit', '2026-01-14 11:38:01'),
(84, 'Guava', 'Sweet and fragrant guavas.', 70, 180, 'https://images.unsplash.com/photo-1536511132770-e5058c7e8c46?w=400', 'se-1', NULL, 'Kg', 'Fruit', '2026-01-14 11:38:01'),
(85, 'Watermelon', 'Large sweet watermelon, refreshing.', 40, 300, 'https://images.unsplash.com/photo-1563114773-84221bd62daa?w=400', 'se-1', NULL, 'Kg', 'Fruit', '2026-01-14 11:38:01'),
(86, 'Lemon', 'Fresh lemon, rich in vitamin C.', 120, 100, 'https://images.unsplash.com/photo-1590502593747-42a996133562?w=400', 'se-1', NULL, 'Kg', 'Fruit', '2026-01-14 11:38:01'),
(87, 'Jackfruit', 'Large jackfruit, sweet and fibrous.', 90, 80, 'https://images.unsplash.com/photo-1617114692043-eb6c548d706d?w=400', 'se-1', NULL, 'Kg', 'Fruit', '2026-01-14 11:38:01'),
(88, 'Litchi', 'Fresh sweet litchis from Dinajpur.', 180, 120, 'https://images.unsplash.com/photo-1624880359596-ad79d2a3cf6a?w=400', 'se-1', NULL, 'Kg', 'Fruit', '2026-01-14 11:38:01'),
(89, 'Dragon Fruit', 'Exotic dragon fruit, healthy choice.', 250, 60, 'https://images.unsplash.com/photo-1527325678964-54921661f888?w=400', 'se-1', NULL, 'Kg', 'Fruit', '2026-01-14 11:38:01'),
(90, 'Basmati Rice', 'Premium quality basmati rice.', 85, 500, 'https://images.unsplash.com/photo-1586201375761-83865001e31c?w=400', 'se-1', NULL, 'Kg', 'Other', '2026-01-14 11:38:01'),
(91, 'Red Lentils', 'High quality red lentils (Masoor Dal).', 110, 300, 'https://images.unsplash.com/photo-1596097635780-36bde14e4e72?w=400', 'se-1', NULL, 'Kg', 'Other', '2026-01-14 11:38:01'),
(92, 'Yellow Peas', 'Fresh yellow peas for cooking.', 95, 250, 'https://images.unsplash.com/photo-1571958625035-cc5f0e0e96e2?w=400', 'se-1', NULL, 'Kg', 'Other', '2026-01-14 11:38:01'),
(93, 'Rui Fish', 'Fresh rui fish from local pond.', 280, 120, 'https://images.unsplash.com/photo-1544943910-4c1dc44aab44?w=400', 'se-1', NULL, 'Kg', 'Fish', '2026-01-14 11:38:01'),
(94, 'Tilapia Fish', 'Fresh tilapia, healthy protein source.', 220, 150, 'https://images.unsplash.com/photo-1534043464124-3be32fe000c9?w=400', 'se-1', NULL, 'Kg', 'Fish', '2026-01-14 11:38:01'),
(95, 'Fresh Milk', 'Pure cow milk from local dairy farm.', 65, 150, 'https://images.unsplash.com/photo-1550583724-b2692b85b150?w=400', 'se-1', NULL, 'Liter', 'Dairy', '2026-01-14 11:38:01'),
(96, 'Beef', 'Fresh beef from farm cattle.', 550, 100, 'https://images.unsplash.com/photo-1588347818036-c6298ed47881?w=400', 'se-1', NULL, 'Kg', 'Meat', '2026-01-14 11:38:01'),
(97, 'Coriander Leaves', 'Fresh coriander for garnishing.', 20, 80, 'https://images.unsplash.com/photo-1614343621865-e9c6fc544694?w=400', 'se-1', NULL, 'Bundle', 'Other', '2026-01-14 11:38:01'),
(98, 'Fresh Ginger', 'Organic ginger, great for health.', 100, 150, 'https://images.unsplash.com/photo-1553175207-8e3d5e0b90d1?w=400', 'se-1', NULL, 'Kg', 'Other', '2026-01-14 11:38:01'),
(100, 'Haribhanga mango', 'The Haribhanga mango is a famous, sweet, fiberless mango variety from Rangpur, Bangladesh, known for its rich aroma, juicy flesh, and distinctive taste', 150, 103, '../../assets/files/product_img/PROD_Haribhanga mango1768412431.jpg', 'se-1', NULL, 'Kg', 'Fruit', '2026-01-14 23:40:31');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` varchar(10) NOT NULL,
  `address` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `status` varchar(15) NOT NULL,
  `UID` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`name`, `email`, `phone`, `password`, `role`, `address`, `city`, `status`, `UID`, `date`) VALUES
('abdullah al mubin', 'mubin9516@gmail.com', '01870500658', '11111111', 'Buyer', 'kuril, kaji bari mosjid', 'Dhaka', 'active', 'bu-0', '2026-01-13 23:17:06'),
('abdullah al mubin', 'mubin516@gmail.com', '01870500659', '11111111', 'Seller', 'kuril, kaji bari mosjid', 'Dhaka', 'active', 'se-1', '2026-01-13 23:17:06');

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
  MODIFY `basket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
