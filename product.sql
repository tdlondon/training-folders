-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2016 at 11:38 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_2016_11_21`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pID` smallint(3) UNSIGNED NOT NULL,
  `pName` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pPrice` decimal(10,2) UNSIGNED DEFAULT NULL,
  `pDesc` text COLLATE utf8_unicode_ci,
  `pShipp` decimal(10,2) UNSIGNED DEFAULT NULL,
  `pImage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pID`, `pName`, `pPrice`, `pDesc`, `pShipp`, `pImage`) VALUES
(NULL, 'iPhone', '12.00', 'second hand apple iphone.', '10.99', 'iphone.jpg'),
(NULL, 'iMac', '4000.00', 'latest apple iMac model', '17.50', '2imacs.jpg'),
(NULL, 'arduino', '19.99', 'arduino uno, microcontroller for happy makers', '2.00', 'arduino.jpg'),
(NULL, 'servo motor', '1.99', 'from parallax inc, servo motor for your drones', '0.50', 'servo.jpg'),
(NULL, 'raspberry pi', '12.00', 'raspberry microcontroller', '2.00', 'raspberry_pi.jpg'),
(NULL, 'tank chassis', '50.99', 'chassis for your tank drone', '8.20', 'tank.jpg'),
(NULL, 'basic chassis', '20.00', 'basic chassis. arduino and raspberry compatible', '3.00', 'chassis.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pID` smallint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
