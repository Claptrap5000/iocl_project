-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2022 at 12:22 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iocl`
--

-- --------------------------------------------------------

--
-- Table structure for table `item_2`
--

CREATE TABLE `item_2` (
  `wno` varchar(25) DEFAULT NULL,
  `item_no` varchar(25) DEFAULT NULL,
  `item_desc` varchar(25) DEFAULT NULL,
  `qty` varchar(25) DEFAULT NULL,
  `unit` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_2`
--

INSERT INTO `item_2` (`wno`, `item_no`, `item_desc`, `qty`, `unit`) VALUES
('1122', '34', 'DJCHBWQJHC EDW', '123', 'm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item_2`
--
ALTER TABLE `item_2`
  ADD KEY `wno` (`wno`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item_2`
--
ALTER TABLE `item_2`
  ADD CONSTRAINT `item_2_ibfk_1` FOREIGN KEY (`wno`) REFERENCES `workallot` (`w_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
