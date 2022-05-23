-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2022 at 07:59 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `Account_no` varchar(20) NOT NULL,
  `IFSC_Code` varchar(20) NOT NULL,
  `balance` int(20) NOT NULL,
  `Account type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `Branch Name` varchar(20) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Assets` int(20) NOT NULL,
  `IFSC_Code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Cust_ID` varchar(20) NOT NULL,
  `Account_no` varchar(20) NOT NULL,
  `Phone` int(20) NOT NULL,
  `Address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `Loan_id` varchar(20) NOT NULL,
  `Cust_id` varchar(20) NOT NULL,
  `Amount` int(20) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `Transaction_id` varchar(20) NOT NULL,
  `Cust_Id` varchar(20) NOT NULL,
  `Recievers_Id` varchar(20) NOT NULL,
  `Amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`Account_no`),
  ADD KEY `FK1` (`IFSC_Code`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`IFSC_Code`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Cust_ID`),
  ADD KEY `FK2` (`Account_no`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD KEY `FK4` (`Cust_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD KEY `FK3` (`Cust_Id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`IFSC_Code`) REFERENCES `branch` (`IFSC_Code`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `FK2` FOREIGN KEY (`Account_no`) REFERENCES `account` (`Account_no`);

--
-- Constraints for table `loan`
--
ALTER TABLE `loan`
  ADD CONSTRAINT `FK4` FOREIGN KEY (`Cust_id`) REFERENCES `customer` (`Cust_ID`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `FK3` FOREIGN KEY (`Cust_Id`) REFERENCES `customer` (`Cust_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
