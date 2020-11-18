-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2020 a las 22:30:32
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
-- Estructura de tabla para la tabla `calendarios`
--

CREATE TABLE `calendarios` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `contenido` longtext NOT NULL,
  `color` varchar(250) DEFAULT '#28a745',
  `inicio` date NOT NULL,
  `vence` datetime DEFAULT NULL,
  `time` time DEFAULT NULL,
  `lugar` varchar(250) NOT NULL,
  `tipo` varchar(250) DEFAULT NULL,
  `especifico` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calendarios`
--

INSERT INTO `calendarios` (`id`, `iduser`, `event_id`, `titulo`, `contenido`, `color`, `inicio`, `vence`, `time`, `lugar`, `tipo`, `especifico`, `created_at`, `updated_at`) VALUES
(1, 10075, 1, 'Prueba Recursos', '<p>Esto es una prueba para el funcionamiento de la carga de recursos y notificaciones en tiempo real. Hora cambiada</p>', '#28a745', '2020-11-19', NULL, '15:00:00', 'Ninguno', NULL, NULL, '2020-11-04 08:48:34', '2020-11-18 13:25:22'),
(2, 10075, 2, 'Prueba Final', '<p>Esto es una prueba. No tomar en cuenta. Probando que todo este perfecto</p>', '#28a745', '2020-11-20', NULL, '22:00:00', 'Ninguno', NULL, NULL, '2020-11-05 15:55:42', '2020-11-18 14:21:54'),
(3, 10076, 1, 'Prueba Recursos', '<p>Esto es una prueba para el funcionamiento de la carga de recursos y notificaciones en tiempo real. Hora cambiada</p>', '#28a745', '2020-11-19', NULL, '15:00:00', 'Ninguno', NULL, NULL, '2020-11-05 15:57:41', '2020-11-18 13:25:22');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calendarios`
--
ALTER TABLE `calendarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calendarios`
--
ALTER TABLE `calendarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
