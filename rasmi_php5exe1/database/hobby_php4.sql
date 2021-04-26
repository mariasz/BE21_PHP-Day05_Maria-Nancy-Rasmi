-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2021 at 04:02 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hobby_php4`
--
CREATE DATABASE IF NOT EXISTS `hobby_php4` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hobby_php4`;

-- --------------------------------------------------------

--
-- Table structure for table `entries`
--

CREATE TABLE `entries` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `entry` varchar(2000) NOT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entries`
--

INSERT INTO `entries` (`id`, `title`, `date`, `entry`, `picture`) VALUES
(3, 'Painting', '2010-04-03', 'Was trying to paint a flower. Showed it to mom and she thought it was a wheel. Not a very good result I guess.', '608169e618d07.jpg'),
(4, 'Woodwork', '2010-05-27', 'Was making a small stool. It stood up alright but broke down after 5 mins of sitting. Is it the stool or just my weight.', '6081647682c94.jpg'),
(5, 'Cooking', '2010-06-07', 'Was trying to make salad. Why did I go for salad, salad is so bland. But frying salad though, fried salad is genius.', '608164df55cb9.png'),
(6, 'Gardening', '2010-07-10', 'Was only the first week and all the plants already died. I should stay away from any living things. Maybe should try rock gardening.', 'default.png'),
(7, 'sewing', '2010-11-03', 'was sewing a tote bag. stupid me the zipper turned up inside-out. lucky me now it looks prettier when I peek inside.', '6086af9cd13a3.jpg'),
(9, 'fishing', '2010-12-02', 'it was fishing day', '6086b450694fe.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entries`
--
ALTER TABLE `entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entries`
--
ALTER TABLE `entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
