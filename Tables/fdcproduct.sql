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
-- Table structure for table `fdcproduct`
--

CREATE TABLE `fdcproduct` (
  `fdcproduct_id` int(11) NOT NULL,
  `fproduct_id` int(11) NOT NULL,
  `fdcproduct_features` text NOT NULL,
  `fdcproduct_description` text NOT NULL,
  `fdcproduct_description_points` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fdcproduct`
--

INSERT INTO `fdcproduct` (`fdcproduct_id`, `fproduct_id`, `fdcproduct_features`, `fdcproduct_description`, `fdcproduct_description_points`) VALUES
(1, 28, 'Wifi : Yes,\r\n\r\nWebcam : Yes,\r\n\r\nHeight : 1.37kg,\r\n\r\nSpeaker : Yes,\r\n\r\nLaptop Proccessor Code : 2,\r\n\r\nLaptop Cache Size : 4M,\r\n\r\nLaptop Proccessor : Intel Core i7,\r\n\r\nLaptop OS : MacOS', 'iPhone 11 Pro Max is a new proline for iPhone that presents advanced performance for users who want the best smartphone. The new Super Retina XDR display is a pro display with the brightest display ever in an iPhone. The powerful Apple-designed A13 Bionic chip provides unparalleled performance for every task.', 'Pro Display,\r\nA13 Bionic,\r\nCutting-Edge Pro Camera System,\r\nSuper Retina XDR display,\r\nGraphics and ML performance'),
(2, 1, 'Wifi : Yes,\r\n\r\nWebcam : Yes,\r\n\r\nHeight : 1.37kg,\r\n\r\nSpeaker : Yes,\r\n\r\nLaptop Proccessor Code : 2,\r\n\r\nLaptop Cache Size : 4M,\r\n\r\nLaptop Proccessor : Intel Core i7,\r\n\r\nLaptop OS : MacOS', 'iPhone 11 Pro Max is a new proline for iPhone that presents advanced performance for users who want the best smartphone. The new Super Retina XDR display is a pro display with the brightest display ever in an iPhone. The powerful Apple-designed A13 Bionic chip provides unparalleled performance for every task.', 'Pro Display,\r\nA13 Bionic,\r\nCutting-Edge Pro Camera System,\r\nSuper Retina XDR display,\r\nGraphics and ML performance'),
(9, 33, 'Name1: Value1, Name2: Value2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Name1: Value1, Name2: Value2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fdcproduct`
--
ALTER TABLE `fdcproduct`
  ADD PRIMARY KEY (`fdcproduct_id`),
  ADD KEY `fproduct_id` (`fproduct_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fdcproduct`
--
ALTER TABLE `fdcproduct`
  MODIFY `fdcproduct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fdcproduct`
--
ALTER TABLE `fdcproduct`
  ADD CONSTRAINT `fdcproduct_ibfk_1` FOREIGN KEY (`fproduct_id`) REFERENCES `featuredproducts` (`fproduct_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
