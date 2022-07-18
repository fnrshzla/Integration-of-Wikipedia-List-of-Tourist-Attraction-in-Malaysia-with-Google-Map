-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2022 at 03:16 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ict651_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `location_address` varchar(200) NOT NULL,
  `location_longitude` decimal(10,4) DEFAULT NULL,
  `location_latitude` decimal(10,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_address`, `location_longitude`, `location_latitude`) VALUES
(1, 'Kaki Bukit Health Clinic\r\n', '6.6426', '100.2110'),
(2, 'Batu Caves', '3.2379', '101.6840'),
(3, 'Sunway Lagoon', '3.0715', '101.6053'),
(4, 'Cameron Highlands', '4.4721', '101.3801'),
(5, 'Farse\'s Hill', '3.7119', '101.7366'),
(6, 'Bukit Tinggi', '3.4010', '101.8468'),
(7, 'Penang Hill', '5.4085', '100.2773'),
(8, 'Siti Khadijah Market', '6.1300', '102.2393'),
(9, 'Langkawi', '6.3500', '99.8000'),
(10, 'Tioman Island', '2.7902', '104.1698'),
(11, 'Redang Island', '5.7844', '103.0069'),
(12, 'Kuala Lumpur', '3.1390', '101.6869');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
