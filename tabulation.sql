-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2024 at 03:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tabulation`
--

-- --------------------------------------------------------

--
-- Table structure for table `denimattire`
--

CREATE TABLE `denimattire` (
  `id` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `candidate` varchar(100) NOT NULL,
  `score` decimal(5,2) NOT NULL,
  `rank` int(11) NOT NULL,
  `JudgeId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `denimattire`
--

INSERT INTO `denimattire` (`id`, `gender`, `candidate`, `score`, `rank`, `JudgeId`) VALUES
(1, 'male', 'M1', '9.00', 2, '3'),
(2, 'male', 'M2', '6.00', 4, '3'),
(3, 'male', 'M3', '5.00', 5, '3'),
(4, 'male', 'M4', '7.00', 3, '3'),
(5, 'male', 'M5', '10.00', 1, '3'),
(6, 'female', 'F1', '9.00', 2, '3'),
(7, 'female', 'F2', '8.00', 3, '3'),
(8, 'female', 'F3', '7.00', 4, '3'),
(9, 'female', 'F4', '6.00', 5, '3'),
(10, 'female', 'F5', '10.00', 1, '3'),
(11, 'male', 'M1', '9.00', 2, '2'),
(12, 'male', 'M2', '6.00', 5, '2'),
(13, 'male', 'M3', '10.00', 1, '2'),
(14, 'male', 'M4', '7.00', 4, '2'),
(15, 'male', 'M5', '8.00', 3, '2'),
(16, 'female', 'F1', '8.00', 4, '2'),
(17, 'female', 'F2', '9.00', 2, '2'),
(18, 'female', 'F3', '8.90', 3, '2'),
(19, 'female', 'F4', '5.00', 5, '2'),
(20, 'female', 'F5', '10.00', 1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `formalattire`
--

CREATE TABLE `formalattire` (
  `id` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `candidate` varchar(100) NOT NULL,
  `score` decimal(5,2) NOT NULL,
  `rank` int(11) NOT NULL,
  `JudgeId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `formalattire`
--

INSERT INTO `formalattire` (`id`, `gender`, `candidate`, `score`, `rank`, `JudgeId`) VALUES
(1, 'female', 'F1', '8.00', 2, '3'),
(2, 'female', 'F2', '6.00', 3, '3'),
(3, 'female', 'F3', '5.00', 4, '3'),
(4, 'female', 'F4', '4.00', 5, '3'),
(5, 'female', 'F5', '9.00', 1, '3'),
(6, 'male', 'M1', '9.00', 1, '3'),
(7, 'male', 'M2', '7.00', 2, '3'),
(8, 'male', 'M3', '6.00', 3, '3'),
(9, 'male', 'M4', '5.00', 4, '3'),
(10, 'male', 'M5', '4.00', 5, '3'),
(11, 'male', 'M1', '9.00', 2, '2'),
(12, 'male', 'M2', '10.00', 1, '2'),
(13, 'male', 'M3', '8.00', 3, '2'),
(14, 'male', 'M4', '9.00', 3, '2'),
(15, 'male', 'M5', '7.00', 4, '2'),
(16, 'female', 'F1', '9.00', 1, '2'),
(17, 'female', 'F2', '7.00', 2, '2'),
(18, 'female', 'F3', '6.00', 3, '2'),
(19, 'female', 'F4', '5.00', 4, '2'),
(20, 'female', 'F5', '4.00', 5, '2');

-- --------------------------------------------------------

--
-- Table structure for table `qanda`
--

CREATE TABLE `qanda` (
  `id` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `candidate` varchar(100) NOT NULL,
  `score` decimal(5,2) NOT NULL,
  `rank` int(11) NOT NULL,
  `JudgeId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qanda`
--

INSERT INTO `qanda` (`id`, `gender`, `candidate`, `score`, `rank`, `JudgeId`) VALUES
(1, 'female', 'F1', '7.00', 4, '3'),
(2, 'female', 'F2', '10.00', 1, '3'),
(3, 'female', 'F3', '6.00', 5, '3'),
(4, 'female', 'F4', '8.00', 3, '3'),
(5, 'female', 'F5', '9.00', 2, '3'),
(6, 'male', 'M1', '9.00', 2, '3'),
(7, 'male', 'M2', '7.00', 4, '3'),
(8, 'male', 'M3', '6.00', 5, '3'),
(9, 'male', 'M4', '8.00', 3, '3'),
(10, 'male', 'M5', '10.00', 1, '3'),
(11, 'male', 'M1', '60.00', 1, '2'),
(12, 'male', 'M2', '50.00', 3, '2'),
(13, 'male', 'M3', '45.00', 4, '2'),
(14, 'male', 'M4', '55.00', 2, '2'),
(15, 'male', 'M5', '35.00', 5, '2'),
(16, 'female', 'F1', '59.00', 2, '2'),
(17, 'female', 'F2', '60.00', 1, '2'),
(18, 'female', 'F3', '45.00', 4, '2'),
(19, 'female', 'F4', '55.00', 3, '2'),
(20, 'female', 'F5', '30.00', 5, '2');

-- --------------------------------------------------------

--
-- Table structure for table `sportswear`
--

CREATE TABLE `sportswear` (
  `id` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `candidate` varchar(100) NOT NULL,
  `score` decimal(5,2) NOT NULL,
  `rank` int(11) NOT NULL,
  `JudgeId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sportswear`
--

INSERT INTO `sportswear` (`id`, `gender`, `candidate`, `score`, `rank`, `JudgeId`) VALUES
(1, 'male', 'M1', '10.00', 1, '3'),
(2, 'male', 'M2', '4.00', 5, '3'),
(3, 'male', 'M3', '6.00', 3, '3'),
(4, 'male', 'M4', '5.00', 4, '3'),
(5, 'male', 'M5', '7.00', 2, '3'),
(6, 'female', 'F1', '9.00', 1, '3'),
(7, 'female', 'F2', '8.00', 2, '3'),
(8, 'female', 'F3', '5.80', 4, '3'),
(9, 'female', 'F4', '7.00', 3, '3'),
(10, 'female', 'F5', '5.00', 5, '3'),
(11, 'male', 'M1', '9.00', 2, '2'),
(12, 'male', 'M2', '10.00', 1, '2'),
(13, 'male', 'M3', '8.00', 4, '2'),
(14, 'male', 'M4', '8.80', 3, '2'),
(15, 'male', 'M5', '7.00', 5, '2'),
(16, 'female', 'F1', '7.00', 4, '2'),
(17, 'female', 'F2', '8.00', 3, '2'),
(18, 'female', 'F3', '9.00', 2, '2'),
(19, 'female', 'F4', '10.00', 1, '2'),
(20, 'female', 'F5', '6.00', 5, '2');

-- --------------------------------------------------------

--
-- Table structure for table `swimsuitandtrunks`
--

CREATE TABLE `swimsuitandtrunks` (
  `id` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `candidate` varchar(100) NOT NULL,
  `score` decimal(5,2) NOT NULL,
  `rank` int(11) NOT NULL,
  `JudgeId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `swimsuitandtrunks`
--

INSERT INTO `swimsuitandtrunks` (`id`, `gender`, `candidate`, `score`, `rank`, `JudgeId`) VALUES
(1, 'male', 'M1', '9.00', 1, '3'),
(2, 'male', 'M2', '3.00', 5, '3'),
(3, 'male', 'M3', '4.00', 4, '3'),
(4, 'male', 'M4', '6.00', 3, '3'),
(5, 'male', 'M5', '8.00', 2, '3'),
(6, 'female', 'F1', '9.00', 2, '3'),
(7, 'female', 'F2', '7.00', 3, '3'),
(8, 'female', 'F3', '6.00', 4, '3'),
(9, 'female', 'F4', '5.00', 5, '3'),
(10, 'female', 'F5', '10.00', 1, '3'),
(11, 'male', 'M1', '9.00', 3, '2'),
(12, 'male', 'M2', '5.00', 5, '2'),
(13, 'male', 'M3', '8.00', 4, '2'),
(14, 'male', 'M4', '10.00', 1, '2'),
(15, 'male', 'M5', '9.90', 2, '2'),
(16, 'female', 'F1', '7.00', 4, '2'),
(17, 'female', 'F2', '8.00', 2, '2'),
(18, 'female', 'F3', '9.00', 1, '2'),
(19, 'female', 'F4', '7.50', 3, '2'),
(20, 'female', 'F5', '9.00', 2, '2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `type`) VALUES
(1, 'DL', '202cb962ac59075b964b07152d234b70', 'user'),
(2, 'phoebe', '202cb962ac59075b964b07152d234b70', 'user'),
(3, 'shanne', '202cb962ac59075b964b07152d234b70', 'user'),
(4, 'adminDL', '202cb962ac59075b964b07152d234b70', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `denimattire`
--
ALTER TABLE `denimattire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formalattire`
--
ALTER TABLE `formalattire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qanda`
--
ALTER TABLE `qanda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sportswear`
--
ALTER TABLE `sportswear`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `swimsuitandtrunks`
--
ALTER TABLE `swimsuitandtrunks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `denimattire`
--
ALTER TABLE `denimattire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `formalattire`
--
ALTER TABLE `formalattire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `qanda`
--
ALTER TABLE `qanda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sportswear`
--
ALTER TABLE `sportswear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `swimsuitandtrunks`
--
ALTER TABLE `swimsuitandtrunks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
