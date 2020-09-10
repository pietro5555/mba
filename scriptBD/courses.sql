-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-09-2020 a las 03:48:02
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
-- Estructura de tabla para la tabla `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `mentor_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `cover_name` varchar(255) DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `featured_cover` varchar(255) DEFAULT NULL,
  `featured_cover_name` varchar(255) DEFAULT NULL,
  `featured_at` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0 = No Disponible. 1 = Disponible',
  `likes` int(10) UNSIGNED DEFAULT NULL COMMENT 'Para guardar el numero de likes que tiene ese curso',
  `shares` int(10) UNSIGNED DEFAULT NULL COMMENT 'Para guardar el numero de veces que ha sido compartido',
  `views` int(10) UNSIGNED DEFAULT NULL COMMENT 'Para guardar el numero de visualizaciones',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `courses`
--

INSERT INTO `courses` (`id`, `mentor_id`, `title`, `slug`, `category_id`, `subcategory_id`, `description`, `cover`, `cover_name`, `featured`, `featured_cover`, `featured_cover_name`, `featured_at`, `status`, `likes`, `shares`, `views`, `created_at`, `updated_at`) VALUES
(1, 7, 'Cómo administrar tus finanzas', 'como-administrar-tus-finanzas', 1, 1, 'Curso de economia', '1.png', 'slider1.png', 1, '1.gif', 'Imagen2.gif', '2020-09-09', 1, 1, 0, 3, '2020-09-08 14:04:07', '2020-09-09 20:46:36'),
(2, 7, 'Curso completo de Inteligencia Artificial con Python', 'curso-completo-de-inteligencia-artificial-con-python', 8, 4, 'Curso completo de Inteligencia Artificial con Python', '2.png', 'img-recommended2.png', 0, NULL, NULL, NULL, 0, 2, 4, 4, '2020-09-08 14:55:12', '2020-09-08 16:18:42'),
(3, 7, 'Forex Begins: Curso de trading en Forex gratuito', 'forex-begins-curso-de-trading-en-forex-gratuito', 5, 1, 'Forex Begins: Curso de trading en Forex gratuito.', '3.png', 'img-recommended4.png', 0, NULL, NULL, NULL, 1, 2, 2, 2, '2020-09-08 16:17:28', '2020-09-08 16:17:28'),
(4, 7, 'Análisis Técnico de los Mercados Financieros', 'analisis-tecnico-de-los-mercados-financieros', 3, 5, NULL, '4.png', 'img-recommended5.png', 0, NULL, NULL, NULL, 1, 3, 4, 4, '2020-09-08 16:46:14', '2020-09-08 16:54:19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
