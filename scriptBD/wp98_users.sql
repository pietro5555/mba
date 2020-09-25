-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2020 a las 19:31:27
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
-- Estructura de tabla para la tabla `wp98_users`
--

CREATE TABLE `wp98_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `user_registered` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT 0,
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'avatar.png',
  `provider` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `referred_id` int(11) DEFAULT 0,
  `sponsor_id` bigint(20) DEFAULT 0,
  `position_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `rol_id` int(11) NOT NULL DEFAULT 1,
  `wallet_amount` double NOT NULL DEFAULT 0,
  `billetera` double NOT NULL DEFAULT 0,
  `bank_amount` double NOT NULL DEFAULT 0,
  `clave` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activacion` tinyint(1) DEFAULT 0,
  `fecha_activacion` datetime DEFAULT NULL,
  `token_correo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipouser` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT 'Normal',
  `ladomatriz` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `puntosPro` double DEFAULT 0,
  `puntosRed` double DEFAULT 0,
  `puntosDer` double DEFAULT 0,
  `puntosIzq` double DEFAULT 0,
  `debiDer` double NOT NULL DEFAULT 0,
  `debiIzq` double DEFAULT 0,
  `binario` date DEFAULT NULL,
  `codigo` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correos` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limitar` int(2) NOT NULL DEFAULT 1,
  `pop_up` int(2) NOT NULL DEFAULT 0,
  `autenticacion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `factor2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fechaver` date DEFAULT NULL,
  `modo_oscuro` int(2) NOT NULL DEFAULT 0,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membership_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wp98_users`
--

INSERT INTO `wp98_users` (`ID`, `birthdate`, `gender`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`, `password`, `avatar`, `provider`, `provider_id`, `access_token`, `remember_token`, `created_at`, `updated_at`, `referred_id`, `sponsor_id`, `position_id`, `status`, `rol_id`, `wallet_amount`, `billetera`, `bank_amount`, `clave`, `activacion`, `fecha_activacion`, `token_correo`, `tipouser`, `ladomatriz`, `puntosPro`, `puntosRed`, `puntosDer`, `puntosIzq`, `debiDer`, `debiIzq`, `binario`, `codigo`, `correos`, `limitar`, `pop_up`, `autenticacion`, `factor2`, `fechaver`, `modo_oscuro`, `profession`, `about`, `cover_name`, `membership_id`) VALUES
(1, NULL, NULL, 'shapinetadmin', '$P$B992jwyhEJzww0CCIg4l57J0j.pdf60', 'shapinetadmin', 'admin@shapinetwork.com', '', '2020-09-25 17:30:38', '', 0, 'Shapinetwork', '$2y$10$X901K/MPP45Icd.9GyBvJO/7246PTmMW4HGRftL/w5aOGMeD/kmVK', 'avatar.png', NULL, NULL, NULL, '9aBuRRd5qKcEy60sGphnHImbYMpBS3e0x4KCjTMAWeqaJRQfLbpGWfHbWha7', '2020-03-26 11:49:07', '2020-09-11 19:28:33', 0, 0, 0, 1, 0, 0, 0, 0, '$2y$10$x3gfgSnAfQTfXiZenuaDWuKExJ7rLTq0u2th/zmVgAAbg7Q/s/HGW', 0, NULL, NULL, 'Normal', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '{\"pago\":\"1\",\"compra\":\"1\",\"pc\":\"1\",\"liquidacion\":\"1\"}', 1, 0, NULL, NULL, NULL, 0, '', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `wp98_users`
--
ALTER TABLE `wp98_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `wp98_users`
--
ALTER TABLE `wp98_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
