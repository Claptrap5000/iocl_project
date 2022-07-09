-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2022 at 06:02 PM
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
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empno` varchar(25) NOT NULL,
  `empname` varchar(30) NOT NULL,
  `empdept` varchar(30) NOT NULL,
  `emppassword` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empno`, `empname`, `empdept`, `emppassword`) VALUES
('iocl1', 'jintu', 'IT', 'password'),
('iocl2', 'Nishant', 'IT', 'password1');

-- --------------------------------------------------------

--
-- Table structure for table `entry_table`
--

CREATE TABLE `entry_table` (
  `wno` varchar(25) DEFAULT NULL,
  `item_no` varchar(25) DEFAULT NULL,
  `dn_qty` varchar(25) DEFAULT NULL,
  `entry_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entry_table`
--

INSERT INTO `entry_table` (`wno`, `item_no`, `dn_qty`, `entry_date`) VALUES
('abcd', '987', '50', '2022-07-09');

-- --------------------------------------------------------

--
-- Table structure for table `item_allot`
--

CREATE TABLE `item_allot` (
  `wno` varchar(25) DEFAULT NULL,
  `item_no` varchar(25) NOT NULL,
  `item_desc` varchar(255) DEFAULT NULL,
  `item_qty` varchar(25) DEFAULT NULL,
  `item_unit` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_allot`
--

INSERT INTO `item_allot` (`wno`, `item_no`, `item_desc`, `item_qty`, `item_unit`) VALUES
('abcd', '987', 'this is anything', '1234', '345');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vcode` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pan` varchar(25) NOT NULL,
  `GST` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vcode`, `name`, `address`, `pan`, `GST`, `password`) VALUES
('vendor1', 'TATA', 'Noonmati , Guwahati', 'PAN1234', 'GST2122', 'password'),
('vendor2', 'IOCL', 'Noonmati , Guwahati', 'PAN9876', 'GST2987', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `workallot`
--

CREATE TABLE `workallot` (
  `wno` varchar(25) NOT NULL,
  `empno` varchar(25) NOT NULL,
  `vcode` varchar(25) NOT NULL,
  `des` varchar(255) NOT NULL,
  `entdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workallot`
--

INSERT INTO `workallot` (`wno`, `empno`, `vcode`, `des`, `entdate`) VALUES
('123244', 'iocl1', 'vendor1', '', '2022-07-07'),
('2300', 'iocl1', 'vendor1', 'This is description', '2022-07-09'),
('731', 'iocl2', 'vendor1', 'dfgdf', '0000-00-00'),
('abcd', 'iocl2', 'vendor1', 'dfgdf', '2022-07-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empno`),
  ADD UNIQUE KEY `empno` (`empno`);

--
-- Indexes for table `entry_table`
--
ALTER TABLE `entry_table`
  ADD KEY `wno` (`wno`),
  ADD KEY `item_no` (`item_no`);

--
-- Indexes for table `item_allot`
--
ALTER TABLE `item_allot`
  ADD PRIMARY KEY (`item_no`),
  ADD KEY `wno` (`wno`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vcode`),
  ADD UNIQUE KEY `vcode` (`vcode`),
  ADD UNIQUE KEY `pan` (`pan`),
  ADD UNIQUE KEY `GST` (`GST`);

--
-- Indexes for table `workallot`
--
ALTER TABLE `workallot`
  ADD PRIMARY KEY (`wno`),
  ADD UNIQUE KEY `wno` (`wno`),
  ADD KEY `empno` (`empno`),
  ADD KEY `vcode` (`vcode`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `entry_table`
--
ALTER TABLE `entry_table`
  ADD CONSTRAINT `entry_table_ibfk_1` FOREIGN KEY (`wno`) REFERENCES `workallot` (`wno`),
  ADD CONSTRAINT `entry_table_ibfk_2` FOREIGN KEY (`item_no`) REFERENCES `item_allot` (`item_no`);

--
-- Constraints for table `item_allot`
--
ALTER TABLE `item_allot`
  ADD CONSTRAINT `item_allot_ibfk_1` FOREIGN KEY (`wno`) REFERENCES `workallot` (`wno`);

--
-- Constraints for table `workallot`
--
ALTER TABLE `workallot`
  ADD CONSTRAINT `workallot_ibfk_1` FOREIGN KEY (`empno`) REFERENCES `employee` (`empno`),
  ADD CONSTRAINT `workallot_ibfk_2` FOREIGN KEY (`vcode`) REFERENCES `vendor` (`vcode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
