-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-09-2020 a las 00:20:01
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
-- Estructura de tabla para la tabla `settingpermiso`
--

CREATE TABLE `settingpermiso` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `nameuser` varchar(200) NOT NULL,
  `cursos` tinyint(4) NOT NULL,
  `nuevo_registro` tinyint(4) DEFAULT 0,
  `red_usuario` tinyint(4) DEFAULT 0,
  `vision_usuario` tinyint(4) DEFAULT 0,
  `billetera` tinyint(4) DEFAULT 0,
  `pago` tinyint(4) DEFAULT 0,
  `informes` tinyint(4) DEFAULT 0,
  `tickets` tinyint(4) DEFAULT 0,
  `buzon` tinyint(4) DEFAULT 0,
  `ranking` tinyint(4) DEFAULT 0,
  `historial_actividades` tinyint(4) DEFAULT 0,
  `email_marketing` tinyint(4) DEFAULT 0,
  `administrar_redes` tinyint(4) DEFAULT 0,
  `soporte` tinyint(4) DEFAULT 0,
  `ajuste` tinyint(4) DEFAULT 0,
  `herramienta` tinyint(4) DEFAULT 0,
  `calendario` tinyint(4) DEFAULT 0,
  `correos` tinyint(4) DEFAULT 0,
  `prospeccion` tinyint(4) DEFAULT 0,
  `puntos` tinyint(4) DEFAULT 0,
  `binario` tinyint(4) DEFAULT 0,
  `usuario` tinyint(4) DEFAULT 0,
  `tienda` tinyint(4) DEFAULT 0,
  `transacciones` tinyint(4) DEFAULT 0,
  `usuarios` tinyint(4) DEFAULT 0,
  `red` tinyint(4) DEFAULT 0,
  `eventos` tinyint(4) DEFAULT 0,
  `entradas` tinyint(4) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `settingpermiso`
--

INSERT INTO `settingpermiso` (`id`, `iduser`, `nameuser`, `cursos`, `nuevo_registro`, `red_usuario`, `vision_usuario`, `billetera`, `pago`, `informes`, `tickets`, `buzon`, `ranking`, `historial_actividades`, `email_marketing`, `administrar_redes`, `soporte`, `ajuste`, `herramienta`, `calendario`, `correos`, `prospeccion`, `puntos`, `binario`, `usuario`, `tienda`, `transacciones`, `usuarios`, `red`, `eventos`, `entradas`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, '2020-09-11 19:42:10', '2020-03-26 20:49:07');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `settingpermiso`
--
ALTER TABLE `settingpermiso`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `settingpermiso`
--
ALTER TABLE `settingpermiso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10012;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
