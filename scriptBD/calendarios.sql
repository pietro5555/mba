-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 15, 2020 at 11:39 PM
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
-- Table structure for table `calendarios`
--

DROP TABLE IF EXISTS `calendarios`;
CREATE TABLE IF NOT EXISTS `calendarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(250) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `contenido` longtext NOT NULL,
  `color` varchar(250) NOT NULL,
  `inicio` datetime NOT NULL,
  `vence` datetime NOT NULL,
  `lugar` varchar(250) NOT NULL,
  `tipo` varchar(250) DEFAULT NULL,
  `especifico` varchar(250) DEFAULT NULL,
  `created_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendarios`
--

INSERT INTO `calendarios` (`id`, `iduser`, `titulo`, `contenido`, `color`, `inicio`, `vence`, `lugar`, `tipo`, `especifico`, `created_at`, `updated_at`) VALUES
(1, 1, 'Curso de trading en Forex gratuito.', 'Potencia tu trading con nuestro curso online gratis de Forex y CFDs. Esperamos que este programa de tan solo 3 pasos te ayude a saber todo lo que necesitas para empezar a operar, ¡compruébalo tu mismo!', '#00acd6', '2020-09-16 00:00:00', '2020-09-16 18:00:00', 'Ninguno', NULL, NULL, '2020-09-15 22:02:21', '2020-09-15 22:02:21'),
(2, 1, 'Curso de trading en Forex gratuito.', 'Potencia tu trading con nuestro curso online gratis de Forex y CFDs. Esperamos que este programa de tan solo 3 pasos te ayude a saber todo lo que necesitas para empezar a operar, ¡compruébalo tu mismo!', '#ffc107', '2020-09-16 00:00:00', '2020-09-16 18:00:00', 'Ninguno', NULL, NULL, '2020-09-15 22:15:36', '2020-09-15 22:15:36'),
(3, 1, 'Curso de trading en Forex gratuito.', 'Potencia tu trading con nuestro curso online gratis de Forex y CFDs. Esperamos que este programa de tan solo 3 pasos te ayude a saber todo lo que necesitas para empezar a operar, ¡compruébalo tu mismo!', '#dc3545', '2020-09-19 00:00:00', '2020-09-16 18:00:00', 'Ninguno', NULL, NULL, '2020-09-15 22:26:41', '2020-09-15 22:26:41'),
(4, 1, 'Curso de trading en Forex gratuito.', 'Potencia tu trading con nuestro curso online gratis de Forex y CFDs. Esperamos que este programa de tan solo 3 pasos te ayude a saber todo lo que necesitas para empezar a operar, ¡compruébalo tu mismo!', '#28a745', '2020-09-19 00:00:00', '2020-09-19 18:00:00', 'Ninguno', NULL, NULL, '2020-09-15 22:27:43', '2020-09-15 22:27:43');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
