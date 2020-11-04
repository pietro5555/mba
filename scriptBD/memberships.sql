-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 04, 2020 at 10:53 PM
-- Server version: 8.0.22
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mba`
--

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `descuento` double NOT NULL DEFAULT '0',
  `ganancia` double NOT NULL DEFAULT '0',
  `type` varchar(20) NOT NULL DEFAULT 'monthly',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `name`, `image`, `price`, `descuento`, `ganancia`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Principiante', 'default.jpg', 24, 9.99, 3, 'monthly', '2020-09-29 18:39:11', '2020-09-29 18:39:11'),
(2, 'Basico', 'default.jpg', 22, 10.99, 4, 'monthly', '2020-09-29 18:39:11', '2020-09-29 18:39:11'),
(3, 'Intermedio', 'default.jpg', 20, 11.99, 5, 'monthly', '2020-09-29 18:40:16', '2020-09-29 18:40:16'),
(4, 'Avanzado', 'default.jpg', 18, 12.99, 6, 'monthly', '2020-09-29 18:40:16', '2020-09-29 18:40:16'),
(5, 'Pro', 'default.jpg', 16, 13.99, 7, 'monthly', '2020-09-29 18:40:16', '2020-09-29 18:40:16'),
(6, 'Pro Anual', 'default.jpg', 350, 0, 65, 'yearly', '2020-10-17 14:11:09', '2020-10-17 14:11:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
