-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2020 a las 03:56:34
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
-- Estructura de tabla para la tabla `courses_users`
--

CREATE TABLE `courses_users` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `progress` int(11) NOT NULL DEFAULT 0,
  `start_date` date NOT NULL,
  `finish_date` date DEFAULT NULL,
  `certificate` tinyint(1) NOT NULL,
  `favorite` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `courses_users`
--

INSERT INTO `courses_users` (`id`, `course_id`, `user_id`, `progress`, `start_date`, `finish_date`, `certificate`, `favorite`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, 1, 3, '2020-09-29', NULL, 0, NULL, '2020-09-29 11:03:34', '2020-10-13 18:59:21', '2020-10-05 21:08:04'),
(3, 4, 10, 5, '2020-09-29', NULL, 0, NULL, '2020-09-29 11:03:34', '2020-09-29 11:03:34', NULL),
(4, 1, 3, 10, '2020-09-29', NULL, 0, 1, '2020-09-29 11:04:31', '2020-10-13 18:59:21', '2020-10-13 18:59:21'),
(5, 7, 10, 20, '2020-09-29', NULL, 0, NULL, '2020-09-29 11:06:09', '2020-09-29 11:06:09', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `courses_users`
--
ALTER TABLE `courses_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `courses_users`
--
ALTER TABLE `courses_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
