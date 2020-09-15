-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 07, 2020 at 10:51 AM
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
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referidos` int(11) DEFAULT '0',
  `refeact` int(11) DEFAULT '0',
  `referidosd` int(11) DEFAULT NULL,
  `referidosInd` int(11) DEFAULT NULL,
  `compras` float DEFAULT '0',
  `grupal` float DEFAULT NULL COMMENT 'puntos grupales',
  `comisiones` float DEFAULT '0',
  `bonos` float DEFAULT '0',
  `niveles` int(11) DEFAULT '0',
  `rolprevio` int(11) DEFAULT NULL,
  `acepta_comision` tinyint(1) DEFAULT '1',
  `rolnecesario` int(11) DEFAULT NULL,
  `rolnecesariocant` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `referidos`, `refeact`, `referidosd`, `referidosInd`, `compras`, `grupal`, `comisiones`, `bonos`, `niveles`, `rolprevio`, `acepta_comision`, `rolnecesario`, `rolnecesariocant`, `created_at`, `updated_at`) VALUES
(0, 'administrador', 0, 0, NULL, NULL, 0, NULL, 0, 0, 0, NULL, 1, NULL, NULL, NULL, NULL),
(1, 'moderador', 0, 0, NULL, NULL, 0, NULL, 0, 0, 0, NULL, 1, NULL, NULL, NULL, NULL),
(2, 'mentor', 0, 0, NULL, NULL, 0, NULL, 0, 0, 0, NULL, 1, NULL, NULL, NULL, NULL),
(3, 'cliente', 0, 0, NULL, NULL, 0, NULL, 0, 0, 0, NULL, 1, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
