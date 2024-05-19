-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2024 at 12:30 PM
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
(2, 'phoebe', '202cb962ac59075b964b07152d234b70', 'user');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `formalattire`
--
ALTER TABLE `formalattire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qanda`
--
ALTER TABLE `qanda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sportswear`
--
ALTER TABLE `sportswear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `swimsuitandtrunks`
--
ALTER TABLE `swimsuitandtrunks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
