-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2023 at 06:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homedecor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin'),
(33, 'admin1', 'admin1', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(100) DEFAULT NULL,
  `pid` int(100) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(100) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `title`, `price`, `quantity`, `image_name`) VALUES
(13, 0, 15, 'Brown String Lights', '750.00', 1, 'Product_Name_1559.jpeg'),
(14, 0, 11, 'Two seater gray sofa', '50000.00', 1, 'Product_Name_9325.avif');

-- --------------------------------------------------------

--
-- Table structure for table `cart_orders`
--

CREATE TABLE `cart_orders` (
  `id` int(11) NOT NULL,
  `user_id` int(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `number` varchar(12) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `total_products` varchar(1000) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_orders`
--

INSERT INTO `cart_orders` (`id`, `user_id`, `name`, `number`, `email`, `address`, `total_products`, `total_price`, `order_date`, `status`) VALUES
(1, 0, 'Ram', '2147483647', 'ram1@gmail.com', 'Kathmandu', ', TV Stand (1) , Two seater gray sofa (1) , Double Bed (1) ', '110000.00', '2023-02-11 05:18:09', 'Ordered'),
(2, 0, '', '', '', '', ', Ganesh Figurine (2) , Wind Chime (3) , Wooden Dining Table (1) ', '30450.00', '2023-02-12 03:22:26', 'Ordered'),
(3, 0, 'Tisha', '9876537980', 'tisha@gmail.com', 'Kathmandu', ', Pendant Light (1) ', '2000.00', '2023-02-12 03:34:25', 'Ordered'),
(4, 0, 'Tisha ', '9876537980', 'tisha@gmail.com', 'Kathmandu', ', TV Stand (1) , Two seater gray sofa (1) , Black Dream Catcher (2) ', '80500.00', '2023-02-12 05:49:26', 'Ordered');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `featured` varchar(10) DEFAULT NULL,
  `active` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(4, 'Furniture', 'Category_111.jpeg', 'Yes', 'Yes'),
(5, 'Lighting', 'Category_957.jpeg', 'Yes', 'Yes'),
(6, 'Decor', 'Category_488.jpeg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product` varchar(150) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `customer_name` varchar(150) DEFAULT NULL,
  `customer_contact` varchar(20) DEFAULT NULL,
  `customer_email` varchar(150) DEFAULT NULL,
  `customer_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Wooden Dining Table', '25000.00', 12, '300000.00', '2023-02-05 05:01:05', 'Ordered', 'Tisha Maharjan', '9841781720', 'tisha@gmail.com', 'Kathmandu'),
(2, 'Dining Table', '45000.00', 1, '45000.00', '2023-02-05 05:04:01', 'Ordered', 'Tisha Maharjan', '9841781720', 'tisha@gmail.com', 'fcjiak;'),
(3, 'Dining Table', '45000.00', 1, '45000.00', '2023-02-05 05:07:26', 'Ordered', 'Tisha Maharjan', '9841781720', 'tisha@gmail.com', 'fcjiak;'),
(4, 'Two seater gray sofa', '50000.00', 1, '50000.00', '2023-02-05 05:08:40', 'Ordered', 'Ram', '9871347709', 'ram1@gmail.com', 'bhkgjgi'),
(6, 'Wooden Dining Table', '25000.00', 1, '25000.00', '2023-02-06 04:39:12', 'Delivered', 'Tisha Maharjan', '9841781720', 'tisha@gmail.com', 'Kathmandu'),
(8, 'Wooden Dining Table', '25000.00', 1, '25000.00', '2023-02-12 06:09:01', 'Ordered', 'Ram', '9841781720', 'ram1@gmail.com', 'kathmandu'),
(9, 'Wooden Dining Table', '25000.00', 1, '25000.00', '2023-02-12 06:10:06', 'Ordered', 'Ram', '9841781720', 'ram1@gmail.com', 'kathmandu'),
(10, 'Brown String Lights', '750.00', 1, '750.00', '2023-02-12 06:10:49', 'Ordered', 'Rojen Dangol', '9871347709', 'tisha@gmail.com', 'KhjxdoL');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `category_id` int(10) DEFAULT NULL,
  `featured` varchar(10) DEFAULT NULL,
  `active` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(9, 'Wooden Dining Table', 'dining', '25000.00', 'Product_Name_8996.jpg', 4, 'Yes', 'Yes'),
(10, 'TV Stand', 'tv stand', '30000.00', 'Product_Name_4587.avif', 4, 'Yes', 'Yes'),
(11, 'Two seater gray sofa', 'sofa', '50000.00', 'Product_Name_9325.avif', 4, 'Yes', 'Yes'),
(12, 'Double Bed', 'bed', '30000.00', 'Product_Name_2491.avif', 4, 'Yes', 'Yes'),
(13, 'Black Leather Couch', 'sofa', '75000.00', 'Product_Name_6176.jpeg', 4, 'Yes', 'Yes'),
(14, 'Dining Table', 'table', '45000.00', 'Product_Name_6307.jpeg', 4, 'Yes', 'Yes'),
(15, 'Brown String Lights', 'lights', '750.00', 'Product_Name_1559.jpeg', 5, 'Yes', 'Yes'),
(16, 'Yellow String Lights', 'light', '750.00', 'Product_Name_4854.jpeg', 0, 'Yes', 'Yes'),
(17, 'Pendant Light', 'light', '2000.00', 'Product_Name_6633.jpeg', 5, 'Yes', 'Yes'),
(18, 'Yellow String Lights', 'light', '750.00', 'Product_Name_2195.jpeg', 5, 'Yes', 'Yes'),
(19, 'Mini Lantern String Lights', 'lights', '2000.00', 'Product_Name_6979.jpg', 5, 'Yes', 'Yes'),
(20, 'Plastic Photo Clip Lights', 'lights', '600.00', 'Product_Name_6159.jpeg', 5, 'Yes', 'Yes'),
(23, 'Signage Lights', 'light', '2000.00', 'Product_Name_5040.jpeg', 5, 'Yes', 'Yes'),
(24, 'Yellow Lantern', 'light', '7000.00', 'Product_Name_9371.jpeg', 5, 'Yes', 'Yes'),
(25, 'Metal Chess Set', 'decor', '5000.00', 'Product_Name_2430.jpeg', 6, 'Yes', 'Yes'),
(26, 'Wind Chime', 'decor', '650.00', 'Product_Name_3294.jpeg', 6, 'Yes', 'Yes'),
(27, 'Brown Wooden Wind Chime', 'decor', '700.00', 'Product_Name_7934.jpeg', 6, 'Yes', 'Yes'),
(28, 'Black Dream Catcher', 'decor', '250.00', 'Product_Name_6135.jpeg', 6, 'Yes', 'Yes'),
(29, 'Buddha Sculpture', 'decor', '1500.00', 'Product_Name_8385.jpeg', 6, 'Yes', 'Yes'),
(30, 'Brass Buddha Figurine', 'decor', '2000.00', 'Product_Name_2724.jpeg', 6, 'Yes', 'Yes'),
(31, 'Ganesh Figurine', 'decor', '1750.00', 'Product_Name_5158.jpeg', 6, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `phone`, `address`) VALUES
(1, 'tisha@gmail.com', 'tisha', '9860561195', 'Kathmandu'),
(3, 'ram1@gmail.com', 'ram', '9841781290', 'Kathmandu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_orders`
--
ALTER TABLE `cart_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cart_orders`
--
ALTER TABLE `cart_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
