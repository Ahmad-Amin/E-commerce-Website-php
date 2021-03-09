-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2020 at 06:56 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `featuredproducts`
--

CREATE TABLE `featuredproducts` (
  `fproduct_id` int(11) NOT NULL,
  `fproduct_name` varchar(255) NOT NULL,
  `fproduct_newPrice` varchar(255) NOT NULL,
  `fproduct_oldPrice` varchar(255) NOT NULL,
  `fproduct_image` varchar(255) NOT NULL,
  `fproduct_code` varchar(255) NOT NULL,
  `fproduct_warranty` varchar(255) NOT NULL,
  `fproduct_available` varchar(255) NOT NULL,
  `fproduct_sold` int(11) NOT NULL,
  `fproduct_brand` varchar(255) NOT NULL,
  `fproduct_cat_id` int(11) NOT NULL,
  `fproduct_sale` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `featuredproducts`
--

INSERT INTO `featuredproducts` (`fproduct_id`, `fproduct_name`, `fproduct_newPrice`, `fproduct_oldPrice`, `fproduct_image`, `fproduct_code`, `fproduct_warranty`, `fproduct_available`, `fproduct_sold`, `fproduct_brand`, `fproduct_cat_id`, `fproduct_sale`) VALUES
(1, 'Samsung LED TV', '500.00', '600.00', 'Samsung-UE49NU7172.jpg', 'SL9208', '12 Months', 'In Stock', 10, 'Samsung', 1, 'no'),
(2, 'Apple MacBook Pro', '1599.99', '1799.99', 'apple-laptop.jpg,product1.jpg,product2.jpg,product3.jpg', 'AL9284', '13 Months', 'In Stock', 5, 'Apple', 2, 'no'),
(3, 'HP OMEN 15', '1349.99', '1549.99', 'slide1.jpg,product1.jpg,product2.jpg,product3.jpg', 'HP8264', '2 years', 'In Stock', 15, 'OMEN By HP', 2, 'no'),
(4, 'Beats Headset', '90.00', '120.00', 'Headsets.png,product1.jpg,product2.jpg,product3.jpg', 'BH8374', '1 years', 'Out Of Stock', 21, 'Beats By Dre', 4, 'no'),
(5, 'Wireless Keyboard', '15.00', '25.00', 'Logitech-Bluetooth-Keyboard.png,product1.jpg,product2.jpg,product3.jpg', 'WK2937', '5 Months', 'In Stock', 3, 'Logitech', 3, 'no'),
(6, 'PlayStation Controller', '25.00', '50.00', 'Gaming-Controllers-2.jpg,product1.jpg,product2.jpg,product3.jpg', 'PC9358', '1 years', 'In Stock', 5, 'Sony', 3, 'no'),
(7, 'Fitness Watch', '50.00', '75.00', 'Fitbit-Versa2.jpg,product1.jpg,product2.jpg,product3.jpg', 'FW9274', '18 Months', 'In Stock', 30, 'Fitbit Versa 2', 4, 'no'),
(8, 'Apple Ipad 3', '150.00', '220.00', 'Apple-iPad-2019-2.jpg,product1.jpg,product2.jpg,product3.jpg', 'AI8203', '3 years', 'In Stock', 11, 'Apple', 4, 'no'),
(9, 'Apple Watch Series 4', '699.99', '749.99', 'Apple-Watch-Series-4-GPS-40mm-Gold-Aluminum-2.jpg,product1.jpg,product2.jpg,product3.jpg', 'AW2984', '12 Months', 'Out Of Stock', 25, 'Apple', 4, 'no'),
(10, 'Iphone XR', '1500.00', '1700.00', 'Apple-iPhone-XR-17.jpg,product1.jpg,product2.jpg,product3.jpg', 'AI2731', '15 Months', 'Out Of Stock', 22, 'Apple', 1, 'no'),
(20, 'Samsung LED TV', '500.00', '600.00', 'Samsung-UE49NU7172.jpg,product1.jpg,product2.jpg,product3.jpg', 'SL9208', '12 Months', 'In Stock', 25, 'Samsung', 4, 'no'),
(21, 'HP OMEN 15', '1349.99', '1549.99', 'slide1.jpg,product1.jpg,product2.jpg,product3.jpg', 'HP8264', '2 years', 'In Stock', 35, 'OMEN By HP', 2, 'no'),
(22, 'Wireless Keyboard', '15.00', '25.00', 'Logitech-Bluetooth-Keyboard.png,product1.jpg,product2.jpg,product3.jpg', 'WK2937', '5 Months', 'In Stock', 0, 'Logitech', 3, 'no'),
(23, 'Fitness Watch', '50.00', '75.00', 'Fitbit-Versa2.jpg,product1.jpg,product2.jpg,product3.jpg', 'FW9274', '18 Months', 'In Stock', 45, 'Fitbit Versa 2', 4, 'no'),
(24, 'Apple Watch Series 4', '699.99', '749.99', 'Apple-Watch-Series-4-GPS-40mm-Gold-Aluminum-2.jpg,product1.jpg,product2.jpg,product3.jpg', 'AW2984', '12 Months', 'Out Of Stock', 15, 'Apple', 4, 'no'),
(25, 'Apple MacBook Pro', '1599.99', '1799.99', 'apple-laptop.jpg,product1.jpg,product2.jpg,product3.jpg', 'AL9284', '13 Months', 'In Stock', 25, 'Apple', 2, 'no'),
(26, 'Beats Headset', '90.00', '120.00', 'Headsets.png,product1.jpg,product2.jpg,product3.jpg', 'BH8374', '1 years', 'Out Of Stock', 51, 'Beats By Dre', 4, 'no'),
(27, 'PlayStation Controller', '25.00', '50.00', 'Gaming-Controllers-2.jpg,product1.jpg,product2.jpg,product3.jpg', 'PC9358', '1 years', 'In Stock', 2, 'Sony', 3, 'no'),
(28, 'Apple Ipad 3', '150.00', '', 'Apple-iPad-2019-2.jpg,product1.jpg,product2.jpg,product3.jpg', 'AI8203', '3 years', 'In Stock', 19, 'Apple', 4, 'no'),
(29, 'Iphone XR', '1500.00', '1700.00', 'Apple-iPhone-XR-17.jpg,product1.jpg,product2.jpg,product3.jpg', 'AI2731', '15 Months', 'Out Of Stock', 45, 'Apple', 1, 'yes'),
(30, 'MSI GS75 Stealth', '1499.99', '1800.00', 'msi1.png', 'MSI9264', '2 Years', 'In Stock', 10, 'MSI', 2, 'yes'),
(31, 'Beats wireless Headset', '390.00', '440.00', 'Beats-Solo3-Wireless-2.jpg', 'BS9348', '6 Months', 'In Stock', 12, 'Beats By Dre', 4, 'yes'),
(33, 'Ahmad Amin', 'Demo 1 New price', 'Demo 1 Old Price', 'Crystal-Chairs-2.jpg', 'D1OP', '12 Months', 'In Stock', 12, 'DEMO', 1, 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `featuredproducts`
--
ALTER TABLE `featuredproducts`
  ADD PRIMARY KEY (`fproduct_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `featuredproducts`
--
ALTER TABLE `featuredproducts`
  MODIFY `fproduct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
