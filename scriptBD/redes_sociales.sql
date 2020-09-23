-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-09-2020 a las 16:24:05
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `shapin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redes_sociales`
--

CREATE TABLE `redes_sociales` (
  `id` int(11) NOT NULL,
  `link` text NOT NULL,
  `tipo` int(2) DEFAULT NULL COMMENT '1- glyphicon 2-imagen',
  `imagen` text NOT NULL,
  `color` varchar(250) DEFAULT NULL,
  `nombre` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `redes_sociales`
--

INSERT INTO `redes_sociales` (`id`, `link`, `tipo`, `imagen`, `color`, `nombre`, `created_at`, `updated_at`) VALUES
(4, 'https://twitter.com/login?lang=es', 1, 'fab fa-twitter', 'ADD8E6', 'twitter', '2020-09-21 22:06:42', '2020-09-21 21:36:42'),
(2, 'https://web.whatsapp.com/', 1, 'fab fa-whatsapp', '00a65a', 'whatsapp', '2020-09-21 22:02:56', '2020-09-21 21:15:51'),
(3, 'https://es-la.facebook.com/login/', 1, 'fab fa-facebook-f', '3c8dbc', 'Facebook', '2020-09-21 22:02:47', '2020-09-21 21:15:30'),
(1, 'https://www.instagram.com/', 1, 'fab fa-instagram', 'dc3545', 'Instagram', '2020-09-21 22:02:41', '2020-09-21 21:14:42');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `redes_sociales`
--
ALTER TABLE `redes_sociales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `redes_sociales`
--
ALTER TABLE `redes_sociales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
