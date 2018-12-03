-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 
-- Generation Time: Dec 03, 2018 at 11:00 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koboraa`
--

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `buildingID` int(5) NOT NULL,
  `buildID` varchar(50) NOT NULL,
  `buildingName` varchar(90) NOT NULL,
  `buildingCity` varchar(20) NOT NULL,
  `buildingEstate` varchar(20) NOT NULL,
  `ownerID` int(5) NOT NULL,
  `roomCapacity` int(3) NOT NULL,
  `caretakerName` varchar(50) DEFAULT NULL,
  `caretakerNo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `building`
--



-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaintID` int(5) NOT NULL,
  `complaint` text NOT NULL,
  `complaintTime` bigint(10) NOT NULL,
  `buildID` varchar(15) NOT NULL,
  `buildingID` int(5) NOT NULL,
  `ownerID` int(5) NOT NULL,
  `buildingName` varchar(90) NOT NULL,
  `status` int(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--


-- --------------------------------------------------------

--
-- Table structure for table `conpay`
--

CREATE TABLE `conpay` (
  `ID` int(5) NOT NULL,
  `transactionID` varchar(20) NOT NULL,
  `buildID` varchar(15) NOT NULL,
  `buildingID` int(5) NOT NULL,
  `ownerID` int(5) NOT NULL,
  `buildingName` varchar(90) NOT NULL,
  `rentalNumber` varchar(10) DEFAULT NULL,
  `amount` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conpay`
--

-- --------------------------------------------------------

--
-- Table structure for table `prepay`
--

CREATE TABLE `prepay` (
  `ID` int(5) NOT NULL,
  `transactionID` varchar(20) NOT NULL,
  `buildID` varchar(15) NOT NULL,
  `buildingID` int(5) NOT NULL,
  `ownerID` int(5) NOT NULL,
  `buildingName` varchar(90) NOT NULL,
  `rentalNumber` varchar(10) DEFAULT NULL,
  `amount` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prepay`
--



-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `tenantID` int(5) NOT NULL,
  `tenantName` varchar(90) NOT NULL,
  `tenantPhone` int(10) NOT NULL,
  `tenantEmail` varchar(50) NOT NULL,
  `buildingID` int(5) NOT NULL,
  `ownerID` int(5) NOT NULL,
  `rentalNumber` varchar(10) DEFAULT NULL,
  `payStatus` int(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenant`
--



-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(5) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `userMail` varchar(50) NOT NULL,
  `userPass` varchar(50) NOT NULL,
  `designation` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`buildingID`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaintID`);

--
-- Indexes for table `conpay`
--
ALTER TABLE `conpay`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `prepay`
--
ALTER TABLE `prepay`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`tenantID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `buildingID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaintID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `conpay`
--
ALTER TABLE `conpay`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prepay`
--
ALTER TABLE `prepay`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `tenantID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
