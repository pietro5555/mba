-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-09-2020 a las 00:45:32
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
-- Estructura de tabla para la tabla `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'AIO System',
  `slogan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Uno para todo.',
  `name_styled` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'AIO <strong>System</strong>',
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_type` int(11) DEFAULT NULL,
  `enable_register` tinyint(1) DEFAULT 1,
  `enable_auth_fb` tinyint(1) DEFAULT 0,
  `enable_auth_tw` tinyint(1) DEFAULT 0,
  `enable_auth_google` tinyint(1) DEFAULT 0,
  `version` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0.2.0',
  `keycode` int(11) DEFAULT NULL,
  `logo` int(11) DEFAULT 1,
  `rol_default` int(11) DEFAULT 3,
  `status_web` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `referred_id_default` int(11) NOT NULL DEFAULT 1,
  `referred_level_max` int(11) NOT NULL DEFAULT 5,
  `edad_minino` int(11) NOT NULL COMMENT 'edad minimo para ingresar al sistema',
  `licencia` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_vencimiento` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefijo_wp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_no_comision` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activarBotones` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'permite activar los botones de transferencia, retiro, pago total y pago masivo',
  `activarCorreos` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firma` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limitar` int(2) NOT NULL DEFAULT 0,
  `traductor` int(2) DEFAULT 0,
  `recarga` int(2) NOT NULL DEFAULT 0,
  `canje` int(2) NOT NULL DEFAULT 0,
  `total_canje` double DEFAULT NULL,
  `estilo` int(2) DEFAULT 1,
  `posicionamiento` int(2) DEFAULT 0,
  `btc` int(2) NOT NULL DEFAULT 0,
  `paypal` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scriptpaypal` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `htmlpaypal` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` int(11) NOT NULL DEFAULT 1,
  `registro` int(2) NOT NULL DEFAULT 2,
  `colorfondo` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fff',
  `cololetras` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '333'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `settings`
--

INSERT INTO `settings` (`id`, `name`, `slogan`, `name_styled`, `company_name`, `company_email`, `site_email`, `description`, `category_type`, `enable_register`, `enable_auth_fb`, `enable_auth_tw`, `enable_auth_google`, `version`, `keycode`, `logo`, `rol_default`, `status_web`, `created_at`, `updated_at`, `referred_id_default`, `referred_level_max`, `edad_minino`, `licencia`, `fecha_vencimiento`, `prefijo_wp`, `id_no_comision`, `activarBotones`, `activarCorreos`, `firma`, `limitar`, `traductor`, `recarga`, `canje`, `total_canje`, `estilo`, `posicionamiento`, `btc`, `paypal`, `scriptpaypal`, `htmlpaypal`, `login`, `registro`, `colorfondo`, `cololetras`) VALUES
(1, 'My Busineess Academy Pro', '123456', 'My Busineess Academy Pro', NULL, NULL, 'soporte@shapinetwork.com', NULL, NULL, 1, 0, 0, 0, '0.2.0', NULL, 1, 3, 1, '2020-03-26 20:49:07', '2020-03-26 20:49:07', 1, 5, 18, 'TlRBM0lWSTVObGxFT1RSVkxETTNVRklzSXloU0t6TmdVaXN6S0ZjS1lBbz0=', 'MjAyMy0wNy0yOQ==', 'wp98_', NULL, '{\"btn_transferencia\":1,\"btn_retiro\":1,\"btn_masivo\":1,\"btn_todo\":1,\"btn_liquida\":1,\"btn_monto\":1}', '{\"pago\":1,\"compra\":1,\"pc\":1,\"liquidacion\":1}', '<p>Empresa</p><p>Telefono</p><p>direccion</p>', 0, 0, 0, 0, NULL, 7, 0, 0, NULL, NULL, NULL, 2, 2, 'fff', '333');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
