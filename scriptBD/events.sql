-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 18-11-2020 a las 19:43:36
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
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `id` int NOT NULL,
  `uuid` varchar(40) NOT NULL,
  `user_id` int DEFAULT NULL,
  `category_id` int NOT NULL,
  `subcategory_id` int UNSIGNED NOT NULL DEFAULT '1',
  `title` varchar(255) NOT NULL,
  `description` text,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `duration` int NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '0 = No Disponible. 1 = Disponible',
  `correos` int NOT NULL DEFAULT '0' COMMENT '0 - no se a enviado correos 1 - se envio correo 1 hora nates de empezar 2 - se envio correo al iniciar',
  `type` varchar(100) DEFAULT NULL,
  `url_streaming` varchar(255) DEFAULT NULL,
  `url_video` varchar(255) DEFAULT NULL,
  `miniatura` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id`, `uuid`, `user_id`, `category_id`, `subcategory_id`, `title`, `description`, `date`, `time`, `duration`, `image`, `status`, `correos`, `type`, `url_streaming`, `url_video`, `miniatura`, `created_at`, `updated_at`) VALUES
(1, 'c40880ae-8526-4654-96d0-4d92f5933884', 10071, 1, 1, 'Fortalece tus habilidades financieras', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '2020-11-18', '20:30:00', 45, '1.jpg', '1', 0, NULL, 'https://streaming.mybusinessacademypro.com/app/live/meetings/c40880ae-8526-4654-96d0-4d92f5933884', NULL, '1.jpg', '2020-11-16 12:30:14', '2020-11-17 00:00:01'),
(2, '5af031cb-7092-45f5-b557-d7d344e9a32f', 10072, 7, 1, 'Inteligencia Artificial en Marketing', '<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '2020-11-17', '13:30:00', 45, '2.jpg', '0', 0, NULL, 'https://streaming.mybusinessacademypro.com/app/live/meetings/5af031cb-7092-45f5-b557-d7d344e9a32f', NULL, '2.jpg', '2020-11-16 12:35:06', '2020-11-17 15:00:01'),
(3, '6b8a6f68-2462-4839-939a-cea0e50dab71', 10080, 5, 1, 'Streaming Lanzamiento', '<p>.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '2020-11-16', '20:41:00', 30, '3.jpg', '0', 0, NULL, 'https://streaming.mybusinessacademypro.com/app/live/meetings/6b8a6f68-2462-4839-939a-cea0e50dab71', NULL, '3.jpg', '2020-11-16 13:33:37', '2020-11-17 00:00:01');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
