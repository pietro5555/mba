-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-10-2020 a las 06:05:24
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.3.22

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
-- Estructura de tabla para la tabla `event_content`
--

CREATE TABLE `event_content` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `event_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `event_content`
--

INSERT INTO `event_content` (`id`, `title`, `type`, `url`, `event_id`, `created_at`, `updated_at`) VALUES
(62, 'null', 'video', 'https://www.youtube.com/embed/X4VRKMZf4Uc', 2, '2020-10-10 00:34:19', '2020-10-10 00:34:19'),
(63, 'null', 'file', 'file_2_1602291880.jpg', 2, '2020-10-10 00:34:40', '2020-10-10 00:34:40'),
(64, 'null', 'presentation', 'presentation_2_1602291942.pdf', 2, '2020-10-10 00:35:42', '2020-10-10 00:35:42'),
(74, 'null', 'survey', NULL, 1, '2020-10-10 01:08:26', '2020-10-10 01:08:26'),
(75, 'null', 'presentation', 'presentation_1_1602294394.pdf', 1, '2020-10-10 01:16:34', '2020-10-10 01:16:34'),
(80, 'null', 'video', 'https://www.youtube.com/embed/X4VRKMZf4Uc', 1, '2020-10-10 01:18:47', '2020-10-10 01:18:47'),
(83, 'null', 'file', 'file_1_1602294597.jpg', 1, '2020-10-10 01:19:57', '2020-10-10 01:19:57');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `event_content`
--
ALTER TABLE `event_content`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `event_content`
--
ALTER TABLE `event_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
