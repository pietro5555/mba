-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-09-2020 a las 20:03:58
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `uuid` varchar(40) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `icon` varchar(40) NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `cover_name` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `uuid`, `title`, `slug`, `icon`, `cover`, `cover_name`, `created_at`, `updated_at`) VALUES
(1, '', 'Finanzas para Todos', 'finanzas-para-todos', 'fa fa-line-chart', '1.png', 'img-category1.png', '2020-08-24 09:53:51', '2020-09-09 16:50:25'),
(2, '', 'Riesgo y Bolsa de Valores', 'riesgo-y-bolsa-de-valores', 'fa fa-suitcase', '2.png', 'img-category4.png', '2020-08-31 14:15:43', '2020-09-09 17:06:24'),
(3, '', 'Análisis Técnico y Financiero', 'analisis-tecnico-y-financiero', 'fa fa-bar-chart', '3.png', 'img-category3.png', '2020-08-31 14:15:43', '2020-09-09 17:05:36'),
(4, '', 'Intercambio de Divisas Forex y Análisis Econométrico', 'intercambio-de-divisas-forex-y-analisis-econometrico', 'fa fa-area-chart', NULL, NULL, '2020-08-31 14:15:43', '2020-08-31 14:15:43'),
(5, '', 'Forex', 'forex', 'fab fa-bitcoin', NULL, NULL, '2020-08-31 14:15:43', '2020-08-31 14:15:43'),
(6, '', 'Análisis Avanzado y Gestión de Riesgos', 'analisis-avanzado-y-gestion-de-riesgos', 'fas fa-tasks', '6.png', 'img-category2.png', '2020-08-31 14:15:43', '2020-09-09 16:56:31'),
(7, '', 'Opi y Valuación', 'opi-y-valuacion', 'fas fa-wallet', NULL, NULL, '2020-08-31 14:15:43', '2020-08-31 14:15:43'),
(8, '', 'Inteligencia Artificial', 'inteligencia-artificial', 'fas fa-robot', NULL, NULL, '2020-08-31 14:15:43', '2020-08-31 14:15:43'),
(9, '', 'Criptomonedas', 'criptomonedas', 'fab fa-btc', NULL, NULL, '2020-08-31 14:15:43', '2020-08-31 14:15:43');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
