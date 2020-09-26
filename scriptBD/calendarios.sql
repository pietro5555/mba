-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2020 a las 08:51:44
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
  `iduser` int(250) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `contenido` longtext NOT NULL,
  `color` varchar(250) NOT NULL,
  `inicio` datetime NOT NULL,
  `vence` datetime DEFAULT NULL,
  `lugar` varchar(250) NOT NULL,
  `tipo` varchar(250) DEFAULT NULL,
  `especifico` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calendarios`
--

INSERT INTO `calendarios` (`id`, `iduser`, `titulo`, `contenido`, `color`, `inicio`, `vence`, `lugar`, `tipo`, `especifico`, `created_at`, `updated_at`) VALUES
(1, 10, 'Curso de trading en Forex gratuito.', 'Potencia tu trading con nuestro curso online gratis de Forex y CFDs. Esperamos que este programa de tan solo 3 pasos te ayude a saber todo lo que necesitas para empezar a operar, &iexcl;Compru&eacute;balo tu mismo!', '#28a745', '2020-09-28 00:00:00', NULL, 'Ninguno', NULL, NULL, '2020-09-26 01:34:13', '2020-09-26 01:34:13');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
