-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 08, 2020 at 11:45 PM
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
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mentor_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `description` text,
  `cover` varchar(255) DEFAULT NULL,
  `cover_name` varchar(255) DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `featured_cover` varchar(255) DEFAULT NULL,
  `featured_cover_name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 = No Disponible. 1 = Disponible',
  `likes` int(10) UNSIGNED DEFAULT NULL COMMENT 'Para guardar el numero de likes que tiene ese curso',
  `shares` int(10) UNSIGNED DEFAULT NULL COMMENT 'Para guardar el numero de veces que ha sido compartido',
  `views` int(10) UNSIGNED DEFAULT NULL COMMENT 'Para guardar el numero de visualizaciones',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `mentor_id`, `title`, `slug`, `category_id`, `subcategory_id`, `description`, `cover`, `cover_name`, `featured`, `featured_cover`, `featured_cover_name`, `status`, `likes`, `shares`, `views`, `created_at`, `updated_at`) VALUES
(1, 7, 'Cómo administrar tus finanzas', 'como-administrar-tus-finanzas', 1, 1, 'Curso de economia', '1.png', 'slider1.png', 0, NULL, NULL, 1, 1, 0, 3, '2020-09-08 14:04:07', '2020-09-08 16:18:59'),
(2, 7, 'Curso completo de Inteligencia Artificial con Python', 'curso-completo-de-inteligencia-artificial-con-python', 8, 4, 'Curso completo de Inteligencia Artificial con Python', '2.png', 'img-recommended2.png', 0, NULL, NULL, 0, 2, 4, 4, '2020-09-08 14:55:12', '2020-09-08 16:18:42'),
(3, 7, 'Forex Begins: Curso de trading en Forex gratuito', 'forex-begins-curso-de-trading-en-forex-gratuito', 5, 1, 'Forex Begins: Curso de trading en Forex gratuito.', '3.png', 'img-recommended4.png', 0, NULL, NULL, 1, 2, 2, 2, '2020-09-08 16:17:28', '2020-09-08 16:17:28'),
(4, 7, 'Análisis Técnico de los Mercados Financieros', 'analisis-tecnico-de-los-mercados-financieros', 3, 5, NULL, '4.png', 'img-recommended5.png', 0, NULL, NULL, 1, 3, 4, 4, '2020-09-08 16:46:14', '2020-09-08 16:54:19');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
