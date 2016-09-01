-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 01, 2016 at 03:42 PM
-- Server version: 5.7.13
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `machine_learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_set_1`
--

CREATE TABLE `data_set_1` (
  `id` int(4) NOT NULL,
  `Education` varchar(20) NOT NULL,
  `Sex` varchar(1) NOT NULL,
  `Work` int(3) NOT NULL,
  `Disease` varchar(20) NOT NULL,
  `Salary` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_set_1`
--

INSERT INTO `data_set_1` (`id`, `Education`, `Sex`, `Work`, `Disease`, `Salary`) VALUES
(1, '9th', 'M', 32, 'Bronchitis', 3000),
(2, '9th', 'M', 30, 'Cholera', 1000),
(3, '9th', 'M', 33, 'Flu', 2000),
(4, '10th', 'F', 35, 'Bronchitis', 2000),
(5, '10th', 'F', 36, 'Cholera', 3000),
(6, '11th', 'M', 37, 'Flu', 3000),
(7, '12th', 'M', 38, 'Cholera', 3000),
(8, '12th', 'F', 38, 'Flu', 3000),
(9, '11th', 'M', 37, 'Bronchitis', 1000),
(10, 'Masters', 'M', 41, 'Flu', 2000),
(11, 'Bachelors', 'F', 39, 'Bronchitis', 2000),
(12, 'Masters', 'M', 42, 'Flu', 2000),
(13, 'Masters', 'M', 44, 'Flu', 2000),
(14, 'Bachelors', 'F', 38, 'Bronchitis', 1000),
(15, 'Doctorate', 'F', 44, 'Cholera', 2000),
(16, 'Masters', 'M', 40, 'Flu', 2000),
(17, 'Doctorate', 'F', 44, 'Bronchitis', 1000),
(18, 'Doctorate', 'F', 45, 'Cholera', 3000),
(19, 'Doctorate', 'F', 44, 'Cholera', 2000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_set_1`
--
ALTER TABLE `data_set_1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_set_1`
--
ALTER TABLE `data_set_1`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
