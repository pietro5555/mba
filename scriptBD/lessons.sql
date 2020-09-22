-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-09-2020 a las 01:44:49
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
-- Estructura de tabla para la tabla `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `duration` varchar(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lessons`
--

INSERT INTO `lessons` (`id`, `course_id`, `title`, `slug`, `description`, `url`, `duration`, `created_at`, `updated_at`) VALUES
(1, 1, 'La economía para todos', 'la-economia-para-todos', 'una econmia para todos es global', 'https://vimeo.com/76979871', '0', '2020-09-15 10:29:30', '2020-09-19 10:34:38'),
(2, 1, 'la economia 2', 'la-economia-2', 'todo es una prueba', 'https://vimeo.com/76979871', '0', '2020-09-15 10:29:53', '2020-09-15 10:29:53'),
(3, 2, 'Introducción', 'introduccion', 'Introudcción', 'https://youtu.be/SPs1xcOTRG4', '65.46', '2020-09-18 20:09:53', '2020-09-18 20:09:53'),
(4, 2, 'Como activar host y dominio', 'como-activar-host-y-dominio', 'activación e instalación', 'https://www.youtube.com/watch?v=5-ViOcQPO-Q', '4.26', '2020-09-18 20:10:29', '2020-09-18 20:10:29');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
