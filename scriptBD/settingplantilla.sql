-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 19-11-2020 a las 04:05:41
-- Versión del servidor: 8.0.22
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mbapro_academy`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settingplantilla`
--

CREATE TABLE `settingplantilla` (
  `id` int NOT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `contenido` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `settingplantilla`
--

INSERT INTO `settingplantilla` (`id`, `titulo`, `contenido`, `updated_at`) VALUES
(1, 'Bienvenido', '<p>@nombre</p><p>@usuario</p><p>@idpatrocionio</p><p>@clave</p><p>@correo</p> <p>@Nafiliacion</p>', '2020-03-26 21:51:53'),
(2, 'Pagos', '<p>@nombrecompleto</p><p><span style=\"color: rgb(165, 42, 42);\">@correo</span></p><p><span style=\"color: rgb(165, 42, 42);\">@pago</span></p><p><span style=\"color: rgb(165, 42, 42);\">@usuario</span></p><p><span style=\"color: rgb(165, 42, 42);\">@idpatrocinio<br></span><br></p>', '2020-03-26 21:52:52'),
(3, 'Compra', '<p>@nombre</p><p>@correo</p><p>@datos</p><p>@fecha</p><p>@total</p>', '2020-03-26 21:53:42'),
(4, 'Compra', '<p>@nombre</p><p>@correo</p><p>@datos</p><p>@fecha</p><p>@total</p>', '2020-03-26 21:54:53'),
(5, 'Liquidación', '<p>@nombre</p><p>@correo</p><p>@datosbancarios</p><p>@fecha</p><p>@total</p>', '2020-03-26 21:55:48'),
(6, NULL, NULL, '0000-00-00 00:00:00'),
(8, 'Evento Agendado', NULL, '2020-11-18 11:45:20'),
(9, 'Live esta apunto de iniciar', NULL, '2020-11-18 11:45:29'),
(10, 'El live a iniciado', NULL, '2020-11-18 11:45:54');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `settingplantilla`
--
ALTER TABLE `settingplantilla`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `settingplantilla`
--
ALTER TABLE `settingplantilla`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
