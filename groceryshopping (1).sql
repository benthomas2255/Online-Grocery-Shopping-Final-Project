-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2021 at 09:28 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `groceryshopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'ben', 'ben@123');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `CategoryDescription` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `CategoryDescription`) VALUES
(1, 'Fruits & Vegetable', 'Fruits and vegetables'),
(2, 'Personal Care', 'Personal care'),
(3, 'Dairy & Bakery', 'D and B'),
(4, 'Snacks', 'snacks');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `productId` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `paymentMethod` varchar(50) NOT NULL,
  `orderStatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `productId`, `quantity`, `paymentMethod`, `orderStatus`) VALUES
(1, 19, '3', 3, '', ''),
(2, 19, '6', 3, '', ''),
(3, 19, '55', 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subCategory` int(11) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productPrice` int(11) DEFAULT NULL,
  `productDescription` longtext NOT NULL,
  `productImage1` varchar(255) DEFAULT NULL,
  `shippingCharge` int(11) DEFAULT NULL,
  `productAvailability` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `subCategory`, `productName`, `productPrice`, `productDescription`, `productImage1`, `shippingCharge`, `productAvailability`, `quantity`) VALUES
(1, 2, 3, 'Park Avenue Impact Icon Perfume for Men 150 ml', 220, 'deo', 'parka.jpg', 0, 'In Stock', 3),
(2, 2, 3, 'Nivea Men Protect & Care Deodorant 150 ml', 130, '<br>', 'park2.jpg', 0, 'In Stock', 17),
(3, 2, 7, 'Vaseline Intensive Care Cocoa Glow Lotion for Dull & Dry Skin 400 ml', 200, '<br>', 'vas.jpg', 0, 'In Stock', 10),
(4, 2, 7, 'Garnier Men Oil Clear Face Wash 100 g (With Extra 10%)', 100, '<br>', 'gar.jpg', 0, 'In Stock', 2),
(5, 1, 1, 'Apple USA 6 pcs (Pack)', 109, 's', 'apple.jpg', 5, 'In Stock', 9),
(6, 1, 1, 'Kiwi 6 Pcs', 105, '<br>', 'kiwi.jpeg', 5, 'In Stock', 5),
(7, 3, 11, 'Amul Pasteurised Butter 500 g (Carton)', 225, '<br>', 'amul.jpeg', 0, 'In Stock', 33),
(8, 3, 12, 'Monginis Chocolate Veg Bar Cake 60 g', 20, '<br>', 'cake.jpg', 0, 'In Stock', 5),
(9, 2, 8, 'Everest Stainless Steel Corona Safety Key', 60, '<br>', 'c.jpg', 0, 'In Stock', 50),
(10, 2, 8, 'Lifebuoy Immunity Boosting Total 10 Hand Sanitizer 50 ml', 25, '<br>', 's.jpg', 0, 'In Stock', 100),
(11, 2, 10, 'Lifebuoy Total 10 Handwash Refill 750 ml (Pouch) (Buy 1 Get 1)', 175, '<br>', 'd.jpg', 0, 'In Stock', 44),
(12, 2, 10, 'Pears Soft & Fresh Soap with Mint Extracts 75 g', 41, '<br>', 'p.jpg', 0, 'In Stock', 55),
(13, 4, 15, 'Parle Milano Centre Filled Choco Cookies 250 g', 80, '<br>', 'm.jpg', 0, 'In Stock', 4),
(14, 4, 15, 'Parle MONACO 250 g', 40, '<br>', 'p.jpg', 0, 'In Stock', 21),
(15, 4, 18, 'Cadbury Celebrations Gift Pack 136.7 g', 110, '<br>', 'c.jpg', 0, 'In Stock', 24);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `subcategory` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`) VALUES
(1, 1, 'fruits'),
(2, 1, 'vegetable'),
(3, 2, 'Deo & Fragrances'),
(4, 2, 'Oral Care'),
(7, 2, 'Skin Care'),
(8, 2, 'Covid Essentials'),
(9, 2, 'Mens Grooming'),
(10, 2, 'Bath & Hand Wash'),
(11, 3, 'Dairy'),
(12, 3, 'Cakes & Muffins'),
(13, 3, 'Breads & Buns'),
(15, 4, 'Biscuits & Cookies'),
(16, 4, 'Noodles '),
(17, 4, 'Cereals'),
(18, 4, 'Chocolates'),
(21, 16, 'fruits'),
(28, 28, 'bmw'),
(29, 29, 'jhkj6');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contactno` bigint(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `shippingAddress` longtext NOT NULL,
  `shippingPincode` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `contactno`, `password`, `shippingAddress`, `shippingPincode`, `email`) VALUES
(2, 'albins', 8877665527, 'Albin@123', '', 0, 'albin@gmail.com'),
(3, 'albin', 9876683311, 'Albin@123', '', 0, 'albin@gmail.com'),
(4, '352345234', 24512463, 'qwerty123', '', 0, 'wet362356@ggf.com'),
(5, '352345234', 24512463, 'qwerty123', '', 0, 'wet362356@ggf.com'),
(6, '352345234', 24512463, 'qwerty123', '', 0, 'wet362356@ggf.com'),
(9, 'rttw', 9869385454, 'Benthomas@1', '', 0, 'wrtweywe@gmail'),
(10, 'ben', 9967855788, 'Benthomas@1', '', 0, 'qwqw11@sdsd.com'),
(11, 'qwewr', 9898393434, 'Benthomas@1', '', 0, 'qewq@gmail.com'),
(12, 'qwewr', 9898393434, 'Benthomas@1', '', 0, 'qewq@gmail.com'),
(13, 'qwewr', 9898393434, 'Benthomas@1', '', 0, 'qewq@gmail.com'),
(14, 'benthomas', 9977567857, 'Benthomas@1', '', 0, 'benthomas@gmail.com'),
(16, 'alan joseph', 8876778880, ' Benthomas@2', '', 0, 'alanj@6889'),
(19, 'ben', 9988838383, 'Benthomas@1', '', 0, 'ben@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `productid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `userid`, `productid`) VALUES
(3, 19, 55),
(4, 19, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
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
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
