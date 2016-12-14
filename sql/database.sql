-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 14, 2016 at 10:09 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--
CREATE DATABASE test;
USE test;
-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `email`, `pass`) VALUES
(0, 'mohnish@226', 'cd92088d6105d97cfae2d243c2c33452');

--- password cd92088d6105d97cfae2d243c2c33452 is mohnish226

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vid` int(10) NOT NULL,
  `sold` int(1) NOT NULL DEFAULT '0',
  `Vehicle_Type` varchar(20) NOT NULL,
  `maker` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `fuel` varchar(50) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `kms` int(11) NOT NULL,
  `state` varchar(70) NOT NULL,
  `city` varchar(70) NOT NULL,
  `price` int(11) NOT NULL,
  `details` varchar(400) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `UserId` varchar(20) NOT NULL,
  `Image_Front` varchar(300) NOT NULL,
  `Image_Right` varchar(300) NOT NULL,
  `Image_Left` varchar(300) NOT NULL,
  `Image_Rear` varchar(300) NOT NULL,
  `Image_Inside` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wusers`
--

CREATE TABLE `wusers` (
  `userID` int(9) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vid`);

--
-- Indexes for table `wusers`
--
ALTER TABLE `wusers`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vid` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wusers`
--
ALTER TABLE `wusers`
  MODIFY `userID` int(9) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
