-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2020 at 12:33 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdo_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `pdo_test_table`
--

CREATE TABLE `pdo_test_table` (
  `id` int(11) NOT NULL,
  `baslik` varchar(50) NOT NULL,
  `renk` varchar(50) NOT NULL,
  `durum` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pdo_test_table`
--

INSERT INTO `pdo_test_table` (`id`, `baslik`, `renk`, `durum`) VALUES
(1, 'Lastik', 'Siyah', 0),
(2, 'Muz', 'Sarı', 1),
(3, 'Çilek', 'Kırmızı', 0),
(4, 'Portakal', 'Portakal', 1),
(6, 'Kot Pantalon', 'Mavi', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pdo_test_table`
--
ALTER TABLE `pdo_test_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pdo_test_table`
--
ALTER TABLE `pdo_test_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
