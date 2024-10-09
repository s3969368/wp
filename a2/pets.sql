-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 09, 2024 at 03:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petsvictoria`
--

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `petid` int(11) NOT NULL,
  `petname` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `age` double NOT NULL,
  `location` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`petid`, `petname`, `description`, `image`, `caption`, `age`, `location`, `type`) VALUES
(1, 'Milo', 'Milo is a sweet boy.', 'milo.jpeg', 'Milo', 3, 'Melbourne CBD', 'Cat'),
(2, 'Baxter', 'Baxter has a lot of energy and will play fetch for hours.', 'baxter.jpeg', 'Baxter', 5, 'Cape Woolamai', 'Dog'),
(3, 'Luna', 'A cuddly companion.', 'luna.jpeg', 'Luna', 1, 'Ferntree Gully', 'Cat'),
(4, 'Willow', 'Laziest dog you will ever meet.', 'willow.jpeg', 'Willow', 48, 'Marysville', 'Dog'),
(5, 'Oliver', 'A weird little guy.', 'oliver.jpeg', 'Oliver', 12, 'Grampians', 'Cat'),
(6, 'Bella', 'Full of joy.', 'bella.jpeg', 'Bella', 10, 'Carlton', 'Dog');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`petid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `petid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
