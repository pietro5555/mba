-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 20, 2020 at 11:34 PM
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
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `date` datetime DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `url_streaming` varchar(255) DEFAULT NULL,
  `url_video` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `description` text,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `date`, `type`, `url_streaming`, `url_video`, `status`, `image`, `date_end`, `description`, `user_id`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 'Curso de trading en Forex gratuito.', '2020-09-17 16:00:00', NULL, NULL, NULL, '1', '1.png', '2020-09-17 17:00:00', 'Potencia tu trading con nuestro curso online gratis de Forex y CFDs. Esperamos que este programa de tan solo 3 pasos te ayude a saber todo lo que necesitas para empezar a operar, ¡Compruébalo tu mismo!', 4, 4, '2020-09-15 16:49:28', '2020-09-17 00:13:30'),
(2, '¿Qué son  y cómo usar las Criptomonedas?', '2020-09-23 18:00:00', NULL, NULL, NULL, '1', '2.png', '2020-09-23 19:00:00', 'Con este curso aprenderás los conceptos básicos de Bitcoin, de las CriptoMonedas y del Trading con CriptoDivisas. Aquí, podrás familiarizarte con los aspectos más importantes para generar ganancias con las CriptoMonedas. ¡El curso Bitcoin que esperabas!', 9, 8, '2020-09-16 19:33:47', '2020-09-17 00:17:30'),
(3, 'Administración de finanzas personales', '2020-09-24 18:00:00', NULL, NULL, NULL, '1', '3.png', '2020-09-16 19:00:00', 'Este curso dotará a sus participantes con las herramientas que le permitirán llevar a cabo una planeación financiera personal y entender la necesidad de salvaguardar su patrimonio y recursos', 2, 1, '2020-09-16 20:45:39', '2020-09-16 20:46:39'),
(4, 'Inteligencia artificial en la actualidad', '2020-09-26 10:00:00', NULL, NULL, NULL, '1', '4.png', '2020-09-16 11:00:00', 'Este Programa especializado está dirigido a personas con interés en conocer más sobre los diversos desarrollos que han sido generados en décadas recientes en el área de inteligencia artificial.', 3, 2, '2020-09-16 20:49:52', '2020-09-16 20:49:53'),
(5, 'Live sobre análisis técnico y financiero', '2020-09-30 13:00:00', NULL, NULL, NULL, '1', '5.png', '2020-09-30 23:09:00', 'Los contenidos a desarrollar facilitan la comprensión y el uso del análisis técnico de los precios de los activos en los mercados organizados. Con esta herramienta se puede inferir las posibles tendencias de precios de acciones, divisas y materias primas. Se puede evaluar con propiedad el valor de un activo, su volatilidad subyacente y su tendencia a corto, mediano y largo plazo.', 8, 4, '2020-09-19 02:40:21', '2020-09-19 02:40:21'),
(6, 'Crecimiento financiero para empresarios', '2020-09-25 13:00:00', NULL, NULL, NULL, '1', '6.png', '2020-09-25 14:00:00', 'Entenderás cuáles son esos \"aspectos más relevantes\" de las finanzas y por qué hay que dominarlos.\r\nTambién te llevarás un “tool kit” que te ayudará a gestionar las finanzas de tu empresa, identificando cómo debemos sofisticar esas herramientas a medida que crecemos.', 6, 5, '2020-09-19 16:40:41', '2020-09-19 16:40:41');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
