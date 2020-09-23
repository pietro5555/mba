-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 22, 2020 at 12:15 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

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
-- Table structure for table `courses_users`
--

DROP TABLE IF EXISTS `courses_users`;
CREATE TABLE IF NOT EXISTS `courses_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `progress` int(11) NOT NULL DEFAULT '0',
  `start_date` date NOT NULL,
  `finish_date` date DEFAULT NULL,
  `certificate` tinyint(1) NOT NULL,
  `favorite` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses_users`
--

INSERT INTO `courses_users` (`id`, `course_id`, `user_id`, `progress`, `start_date`, `finish_date`, `certificate`, `favorite`, `created_at`, `updated_at`) VALUES
(1, 7, 5, 0, '2020-09-01', NULL, 1, 1, '2020-09-19 00:00:00', '2020-09-19 00:00:00'),
(2, 1, 5, 5, '2020-09-16', NULL, 1, 1, '2020-09-16 00:00:00', '2020-09-21 18:00:00'),
(3, 6, 5, 24, '2020-09-09', NULL, 1, 1, '2020-09-09 00:00:00', '2020-09-21 20:00:00'),
(4, 4, 5, 0, '2020-09-15', NULL, 1, NULL, '2020-09-15 00:00:00', '2020-09-15 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
