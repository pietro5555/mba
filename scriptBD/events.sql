-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2020 a las 17:40:19
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
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `uuid` varchar(40) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `url_streaming` varchar(255) DEFAULT NULL,
  `url_video` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id`, `uuid`, `user_id`, `category_id`, `title`, `description`, `date`, `time`, `duration`, `image`, `status`, `type`, `url_streaming`, `url_video`, `created_at`, `updated_at`) VALUES
(1, '3ff6dee4-6ffc-445d-af03-19feb73ae700', 6, 5, 'Curso de trading en Forex gratuito.', 'Potencia tu trading con nuestro curso online gratis de Forex y CFDs. Esperamos que este programa de tan solo 3 pasos te ayude a saber todo lo que necesitas para empezar a operar, &iexcl;Compru&eacute;balo tu mismo!', '2020-09-28', '06:00:00', 90, '1.png', '1', NULL, NULL, NULL, '2020-09-25 00:24:53', '2020-09-25 00:24:53'),
(2, '385f12d4-4238-43f9-b1f5-c32c6049dc2a', 2, 1, 'Business para Control de Gestión y Finanzas Empresariales', 'Todo empresario, emprendedor o profesional que trabaje en una empresa y necesite tomar decisiones o desarrollar planes de acci&oacute;n requiere de herramientas y conceptos fundamentales sobre la gesti&oacute;n financiera. En este live aprender&aacute;s obtendr&aacute;s&nbsp;herramientas y conceptos esenciales.', '2020-09-30', '01:00:00', 60, '2.png', '1', NULL, NULL, NULL, '2020-09-26 13:41:17', '2020-09-26 13:41:18'),
(3, '4d4d6b2d-321a-4ade-8a10-e863d2882942', 8, 8, 'Todo lo que debes saber sobre inteligencia artificial', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras finibus ante ut arcu placerat pellentesque quis sed erat. Duis auctor tortor id maximus euismod. Mauris eu nibh lectus. Mauris vitae tincidunt tellus. Suspendisse maximus augue a leo accumsan, vel facilisis risus ornare. Vestibulum ante diam, pretium vitae convallis vel, dapibus in nunc. Vestibulum non quam sagittis nunc scelerisque tincidunt. Praesent varius vehicula justo, sit amet pellentesque ex euismod vel. Curabitur quis cursus turpis. Cras vehicula facilisis nibh quis rutrum.', '2020-09-27', '09:00:00', 60, '3.png', '1', NULL, NULL, NULL, '2020-09-26 14:16:49', '2020-09-26 14:16:49'),
(4, 'ad9aecd2-7d62-47a9-b8d2-b9f316d8cda6', 3, 6, 'Gestión y reducción de riesgos de desastres', 'Phasellus felis mi, tempor nec ligula ac, vehicula imperdiet purus. Sed in velit tincidunt, mollis nisl id, auctor quam. Praesent ultricies nulla nulla, in laoreet enim posuere ut. Vestibulum vitae velit eget enim vestibulum rhoncus. Sed in pulvinar nunc. Etiam posuere molestie convallis. Praesent et nulla viverra, imperdiet tellus et, scelerisque dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;', '2020-09-27', '11:00:00', 120, '4.png', '1', NULL, NULL, NULL, '2020-09-26 15:02:43', '2020-09-26 15:02:44'),
(5, '3439b4df-a361-4807-9f86-74918b894f42', 7, 4, '¿Qué es Forex?', '<p>Morbi erat augue, rhoncus a venenatis vel, iaculis sed neque. Donec quis elit id augue pretium eleifend. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas blandit quam vitae elit volutpat tincidunt. Etiam gravida id ligula ornare aliquam. Aenean laoreet tincidunt lectus eget imperdiet. Integer ac consequat eros. In id lectus sit amet felis suscipit interdum ut sit amet tellus. Curabitur a tristique libero.</p>', '2020-09-29', '17:30:00', 60, '5.png', '1', NULL, NULL, NULL, '2020-09-26 15:08:16', '2020-09-26 15:08:16');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
