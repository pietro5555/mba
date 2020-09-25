-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 25-09-2020 a las 17:53:11
-- Versión del servidor: 10.3.24-MariaDB
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
-- Base de datos: `shapin_wp492`
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
  `membership_id` int(11) DEFAULT NULL,
  `streaming_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wp98_users`
--

INSERT INTO `wp98_users` (`ID`, `birthdate`, `gender`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`, `password`, `avatar`, `provider`, `provider_id`, `access_token`, `remember_token`, `created_at`, `updated_at`, `referred_id`, `sponsor_id`, `position_id`, `status`, `rol_id`, `wallet_amount`, `billetera`, `bank_amount`, `clave`, `activacion`, `fecha_activacion`, `token_correo`, `tipouser`, `ladomatriz`, `puntosPro`, `puntosRed`, `puntosDer`, `puntosIzq`, `debiDer`, `debiIzq`, `binario`, `codigo`, `correos`, `limitar`, `pop_up`, `autenticacion`, `factor2`, `fechaver`, `modo_oscuro`, `profession`, `about`, `cover_name`, `membership_id`, `streaming_token`) VALUES
(1, NULL, NULL, 'shapinetadmin', '$P$B992jwyhEJzww0CCIg4l57J0j.pdf60', 'shapinetadmin', 'admin@shapinetwork.com', '', '2020-09-25 18:05:31', '', 0, 'Shapinetwork', '$2y$10$X901K/MPP45Icd.9GyBvJO/7246PTmMW4HGRftL/w5aOGMeD/kmVK', 'avatar.png', NULL, NULL, NULL, 'Gvt4vUYnK5GWVdZQ3Ujo3XoRR1pOcMyiEkmye1hy7MtwdM4AJY1GgGclHFZs', '2020-03-26 11:49:07', '2020-09-11 19:28:33', 0, 0, 0, 1, 0, 170, 0, 0, '$2y$10$x3gfgSnAfQTfXiZenuaDWuKExJ7rLTq0u2th/zmVgAAbg7Q/s/HGW', 0, NULL, NULL, 'Normal', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '{\"pago\":\"1\",\"compra\":\"1\",\"pc\":\"1\",\"liquidacion\":\"1\"}', 1, 0, NULL, NULL, NULL, 0, '', NULL, NULL, NULL, '17|Y9PuFVZPTPWyEsJwnFmdEP6YVuhU2xinpGYDJKFCFNPsFejLYqAVInuhqhSLfDi0kp87g3FGVnyDvZW5'),
(2, '2000-09-17', 'M', 'dgonzalez', '25f9e794323b453885f5181f1b624d0b', 'dgonzalez', 'dgonzalez@mail.com', '', '2020-09-25 18:04:37', '', 0, 'David Gonzalez', '$2y$10$Ox6jSc26nHhblz5DdlTlUe7/XS674KVOlqllnh/JqRG6rL7hhY9ke', 'user_1599859788.jpg', NULL, NULL, NULL, 'qeH7c1DH0hDRMfqy5SaIFft1hLuKYWgXqnAp8ZaxxJ91ZaUXX3cGKEUTmEGt', '2020-09-11 20:59:48', '2020-09-11 20:59:48', 1, 1, 1, 0, 2, 0, 0, 0, 'eyJpdiI6InJwc3pZdSszdEdhZnlvQUNFOUpBb0E9PSIsInZhbHVlIjoiTk9LNnMybjBmSWNOUXRFamFRcVo2azVEYUFpb242OE5VRnNhSEQ0aFI3RT0iLCJtYWMiOiJmMGQ1NzA5MjFhMGU5ODA1YThhOGZlMTZiMmY5YzhkYTBmMjk1MmEwOTU1ZDQ4ZGI1OGMxY2MwMWQyZmQxOWI2In0=', 0, NULL, NULL, 'Normal', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '{\"pago\":\"1\",\"compra\":\"1\",\"pc\":\"1\",\"liquidacion\":\"1\"}', 1, 0, NULL, NULL, NULL, 0, 'Experto en Economia', 'Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper.', NULL, NULL, NULL),
(3, '1994-09-19', 'F', 'mblanco', '25f9e794323b453885f5181f1b624d0b', 'mblanco', 'mblanco@mail.com', '', '2020-09-11 23:42:22', '', 0, 'Mariana Blanco', '$2y$10$nnNLgAzGjf3zznAUpIO6S.xIXFLkNG4/93ls/MXVWNTDRLrc5ea4m', 'user_1599869542.png', NULL, NULL, NULL, NULL, '2020-09-11 23:42:22', '2020-09-11 23:42:22', 1, 1, 1, 0, 2, 0, 0, 0, 'eyJpdiI6ImxGQ1dmeXBaZVo0TVZFTHJac0hjNWc9PSIsInZhbHVlIjoiaTRwWHJZS0VKc0dWXC9MZXhMb0tqcUtMZVlzY1l3TlNCSWM3T2N0QzV4Rk09IiwibWFjIjoiNzUwNTk5OTBhN2E0MmYxYTQ1YzMxYjMzOTBhOGU2NGJkZmQxOWMzZTI4MTEwNzVjZDg3N2VmMzNiNGNhZWI2MCJ9', 0, NULL, NULL, 'Normal', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '{\"pago\":\"1\",\"compra\":\"1\",\"pc\":\"1\",\"liquidacion\":\"1\"}', 1, 0, NULL, NULL, NULL, 0, 'Conferencias y experta en Inteligencia Artificial', 'Donec ullamcorper nulla non metus auctor fringilla.', NULL, NULL, NULL),
(4, '1997-09-29', 'M', 'jvera', '25f9e794323b453885f5181f1b624d0b', 'jvera', 'jvera@mail.com', '', '2020-09-11 23:47:34', '', 0, 'Jorge Vera', '$2y$10$xqFa4uhZ1WHj3DUFUG5hEOGjqPxRKhXf0WgxvICvu0C.REpg55thO', 'user_1599869854.png', NULL, NULL, NULL, NULL, '2020-09-11 23:47:34', '2020-09-11 23:47:34', 1, 1, 1, 0, 2, 0, 0, 0, 'eyJpdiI6Ikt0ZGJkSGR5XC9FVkcwZUJRRHd1cTJ3PT0iLCJ2YWx1ZSI6IktJUmNwdFVqQ0ZvSHUwOVBnZENPdXNIekxKdEQxaUp3Z0dXK1ZaR0NJMms9IiwibWFjIjoiYTYwMzZjY2I0YmMzMWU2OGMzYTM4YTQ2N2UxYTViYjA5Y2JlY2I5NzlhMTVhYWQ2MGFmMDczY2VkMjVmYmRlMSJ9', 0, NULL, NULL, 'Normal', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '{\"pago\":\"1\",\"compra\":\"1\",\"pc\":\"1\",\"liquidacion\":\"1\"}', 1, 0, NULL, NULL, NULL, 0, 'Experto en Forex', 'Praesent commodo cursus magna, vel scelerisque nisl consectetur.', NULL, NULL, NULL),
(5, '1992-09-26', 'F', 'mfrancia', '25f9e794323b453885f5181f1b624d0b', 'mfrancia', 'rfrancia@mail.com', '', '2020-09-11 23:50:05', '', 0, 'Rebeka Francia', '$2y$10$yFRnTZPIpA6aRRnfjn5G6.LK3tObKmAFb5A1PNz0JmD2poS6d6C0y', 'user_1599870005.png', NULL, NULL, NULL, NULL, '2020-09-11 23:50:05', '2020-09-11 23:50:05', 1, 1, 1, 0, 2, 0, 0, 0, 'eyJpdiI6InZrTFhqc1dqSmEydEgrRUlOSGxFVHc9PSIsInZhbHVlIjoiR1hKbUhZWEN6M1k4RXN0TnJLdndRMWpYUzN5Vm80TG12ZUNzbFZXUzhuST0iLCJtYWMiOiJkYWRkNTdmY2RjMmVjNzllZjY2MjM1ODhlNGFjMjFlYzM5MTVhMDc4NWIxZTFiZDJhOWRjNGQxYTllYWZmNzZkIn0=', 0, NULL, NULL, 'Normal', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '{\"pago\":\"1\",\"compra\":\"1\",\"pc\":\"1\",\"liquidacion\":\"1\"}', 1, 0, NULL, NULL, NULL, 0, 'Experta en Análisis técnico', 'Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.', NULL, NULL, NULL),
(6, '1980-09-12', 'M', 'jperez', '25f9e794323b453885f5181f1b624d0b', 'jperez', 'jlperez@mail.com', '', '2020-09-11 23:52:19', '', 0, 'Juan Luis Perez', '$2y$10$OxpcMgZBYNhMdf0o02yR1.VBbs9FjX9IeGQ/vVXvfuXqcTkfDPTh.', 'user_1599870139.png', NULL, NULL, NULL, NULL, '2020-09-11 23:52:19', '2020-09-11 23:52:19', 1, 1, 1, 0, 2, 0, 0, 0, 'eyJpdiI6IlA3dkpCYXF1RTc5NlwvaXhZanlydStRPT0iLCJ2YWx1ZSI6Ilp4aWF0a1wvT2JSNzFtTlwvXC9FejNXemVqdzFKUlhneVB1SnFzdFZcL3BFSnowPSIsIm1hYyI6ImViMmNiNDUzZGJlY2M5ZGNiN2Q0ZjA1ZjQzNzhkZTYyZDhhOWEzMjRkZjkzMjVlYTY1NDFiM2ViODA0Mjk3MGEifQ==', 0, NULL, NULL, 'Normal', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '{\"pago\":\"1\",\"compra\":\"1\",\"pc\":\"1\",\"liquidacion\":\"1\"}', 1, 0, NULL, NULL, NULL, 0, 'Experto en Finanzas', 'Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.', NULL, NULL, NULL),
(7, '1975-09-16', 'F', 'mfernandez', '25f9e794323b453885f5181f1b624d0b', 'mfernandez', 'mlfernandez@mail.com', '', '2020-09-11 23:58:28', '', 0, 'Maria Luisa Hernandez', '$2y$10$wrKJ69er30ZvaDvKJ4XNJey5MV0Gt3H/yLKV.cpnYHs1veyDfWk9e', 'user_1599870508.png', NULL, NULL, NULL, NULL, '2020-09-11 23:58:28', '2020-09-11 23:58:28', 1, 2, 2, 0, 2, 0, 0, 0, 'eyJpdiI6IkVXMkZtTDFrM2lCZHhySDZDYnFDXC9nPT0iLCJ2YWx1ZSI6Ik15c1FIVTREZlM5SzJhZElzYlREZ0w2NlhYWURcL2RUSHA5OFZBMmZ3S0hjPSIsIm1hYyI6ImNkMjI4NWMwYWI0M2I1NDA1ZThlMjYzOTI3N2I1MmIyNGVhNGIxZTNlZGNhNWI4ODVlYjU3MGFkMTZjY2QyMGYifQ==', 0, NULL, NULL, 'Normal', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '{\"pago\":\"1\",\"compra\":\"1\",\"pc\":\"1\",\"liquidacion\":\"1\"}', 1, 0, NULL, NULL, NULL, 0, 'Experto en Forex', 'Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper.', NULL, NULL, NULL),
(8, '1989-02-08', 'F', 'ejuarez', '25f9e794323b453885f5181f1b624d0b', 'ejuarez', 'ejuarez@mail.com', '', '2020-09-12 00:07:13', '', 0, 'Estefani Juarez', '$2y$10$ST9lSUADvpEOjrcZ5TWlQu2JC/VW5Yg4Tivo8fjVRozHaZSnf9jy.', 'user_1599871033.png', NULL, NULL, NULL, NULL, '2020-09-12 00:07:13', '2020-09-12 00:07:13', 1, 2, 2, 0, 2, 0, 0, 0, 'eyJpdiI6InZWXC9iMG1MbDR5Nnp1VjZCdlpCamVRPT0iLCJ2YWx1ZSI6Ikxocjk5MlwvUnc0bkNuRkdWajg2SVlJbStzMkJlcnZKaWdaTFFteWtpQzVNPSIsIm1hYyI6IjA4OGNmMThlOTQ1Y2U3MmNmYzQ5NmNmMDc0ZWM2OGJjNTgyMzFhYWUwYWY1MmVmMzRiMWYyMDM3YmNmZDAwMTgifQ==', 0, NULL, NULL, 'Normal', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '{\"pago\":\"1\",\"compra\":\"1\",\"pc\":\"1\",\"liquidacion\":\"1\"}', 1, 0, NULL, NULL, NULL, 0, 'Experto en Análisis Técnico y Financiero', 'Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper.', NULL, NULL, NULL),
(9, '1998-09-12', 'F', 'avaldivieso', '25f9e794323b453885f5181f1b624d0b', 'avaldivieso', 'avaldivieso@mail.com', '', '2020-09-24 16:10:51', '', 0, 'Alejandro Valdivieso', '$2y$10$aiprzCFk6G1uydEf5iqjfeY9kf6ZFeqOm.Au9HFARPYvnQNJuwVAG', 'user_1599871477.png', NULL, NULL, NULL, 'UHWwSEotShyP8puARxlP6RMKEMLGqlbG9mMM4d1pj11jXk9C31gemIcvdkdK', '2020-09-12 00:14:38', '2020-09-12 00:14:38', 1, 2, 2, 0, 3, 0, 0, 0, 'eyJpdiI6InQ0S0VONXcxUlFPcGtvTWRvcDVLekE9PSIsInZhbHVlIjoiMW01ejQ1dmIxWFJ3TnJiZGVxc2h3aGlSUkNLdVBhTEJUNFJWVDFWeDYwST0iLCJtYWMiOiI0ZDgzNjZiMzIyOWU1YzFkMzdlM2FmMmE5ZDg5MGQ3ZDhlMDJlZDcxNTYxN2MwMDNjZDU0NGM2MjZiMDYwODhmIn0=', 0, NULL, NULL, 'Normal', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '{\"pago\":\"1\",\"compra\":\"1\",\"pc\":\"1\",\"liquidacion\":\"1\"}', 1, 0, NULL, NULL, NULL, 0, 'Conferencista y experta en Criptomonedas', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus eros malesuada arcu sagittis, et lobortis.', NULL, NULL, NULL),
(10, '1990-09-16', 'M', 'asifontes', '25f9e794323b453885f5181f1b624d0b', 'asifontes', 'asifontes@mail.com', '', '2020-09-15 15:04:26', '', 0, 'Andres Sifontes', '$2y$10$/ktaQnQdDI7BundB233UGOfYc4m12CXByprDHBQ7u8og01SDwfp2a', 'avatar.png', NULL, NULL, NULL, NULL, '2020-09-15 15:04:26', '2020-09-15 15:04:26', 1, 2, 2, 0, 3, 0, 0, 0, 'eyJpdiI6IlZtdGNkNGN0Z0Q0VitzOXlDWldJUXc9PSIsInZhbHVlIjoicVRcL2RDS3REUEZwRG9neWZZanBSNjE2WXBxZmlyaWxSSXVLcFpGa0FSbkU9IiwibWFjIjoiNzFkNzQyZTZmZjFlNDI2YWE3MjNlM2Q3YjZjZjBiY2ZlYTgxYzNkN2IwNjQwMzlmNDMyNjkxOWYzZGJlYWM1NCJ9', 0, NULL, NULL, 'Normal', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '{\"pago\":\"1\",\"compra\":\"1\",\"pc\":\"1\",\"liquidacion\":\"1\"}', 1, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(11, NULL, NULL, 'dobi', '25d55ad283aa400af464c76d713c07ad', 'dobi', 'alexisjsoe95@hotmail.com', '', '2020-09-15 23:19:35', '', 0, 'dobi', '$2y$10$VHuDX51XEpk3fSHttoHZce9qMWyhKxmbZwfXUYvEa6cJQkC65vYBW', 'avatar.png', NULL, NULL, NULL, NULL, '2020-09-15 23:19:35', '2020-09-15 23:19:35', 1, 1, 1, 0, 3, 0, 0, 0, 'eyJpdiI6InFpSnhsdXZ0Q2hBWlA3WE5QN2RVSlE9PSIsInZhbHVlIjoibkVjYXA1NTlBRkN5a3lyRUVYVTNDUT09IiwibWFjIjoiOTIxMDUwZDYyODU4OGEyYmFmNmZmOTJhNTQ5YTVjNGE3OGYwMjkwZTYzODljMWUwZjMxNDI3YmMwY2RhYWM5ZCJ9', 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '{\"pago\":\"1\",\"compra\":\"1\",\"pc\":\"1\",\"liquidacion\":\"1\"}', 1, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(12, '1990-12-12', NULL, 'usuarios2323', '25d55ad283aa400af464c76d713c07ad', 'usuarios2323', 'alexisjoseva959@gmail.com', '', '2020-09-17 23:34:45', '', 0, 'aa a', '$2y$10$x6icrgWaSy22OU/cDQ6X4uuRWQKKiqa2m/X7Q9Ydhknmv0eNCgq32', 'avatar.png', NULL, NULL, NULL, NULL, '2020-09-17 23:34:45', '2020-09-17 23:34:45', 1, 2, 2, 0, 3, 0, 0, 0, 'eyJpdiI6IlROREJKUExPYW5EdWhBVndNUlJXSlE9PSIsInZhbHVlIjoiNExWUjhzY3RjNlRYXC9GbXJKcUtMNXc9PSIsIm1hYyI6IjQ3YzE0M2E2MTdiYjYwNThlYTcyNmNlYjRkNGY1MGQzZjE1M2IwZDk4NDhiMTgwYjg3NmU2ZWI2MjE3NDdlMWQifQ==', 0, NULL, NULL, 'Normal', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '{\"pago\":\"1\",\"compra\":\"1\",\"pc\":\"1\",\"liquidacion\":\"1\"}', 1, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(13, '1990-12-12', NULL, 'usuarios', '25d55ad283aa400af464c76d713c07ad', 'usuarios', 'alexisjoseva952@gmail.com', '', '2020-09-17 23:40:27', '', 0, 'nombre apellido', '$2y$10$NeHbBzFOSmulujXNRo5SlOtZPa3LPUxBSGCtMCHSSMnHAL3X.sS1K', 'avatar.png', NULL, NULL, NULL, NULL, '2020-09-17 23:40:27', '2020-09-17 23:40:27', 1, 7, 7, 0, 1, 0, 0, 0, 'eyJpdiI6IkdWMjltWmhibDJ6cW9zWXNwQWpTNHc9PSIsInZhbHVlIjoiSDluRVN3a1ZXeDJDTDV4aW5ZRGlsdz09IiwibWFjIjoiNTcwMThkMjc5YjViNmRjNGJkNmZhOTNiZjlhNjA3NzQ1YzNjZThjMmViOWM4NDk2NWU5Zjk5MjhlZjdjNDRmZiJ9', 0, NULL, NULL, 'Normal', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '{\"pago\":\"1\",\"compra\":\"1\",\"pc\":\"1\",\"liquidacion\":\"1\"}', 1, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(16, NULL, NULL, 'Alexivalera', '25d55ad283aa400af464c76d713c07ad', 'Alexivalera', 'alexisjoseva95@gmail.com', '', '2020-09-25 17:06:00', '', 0, 'Alexivalera', '$2y$10$Ve22uF/C1fpf80AMcHbAD.Rfwa73cd0IpDI/L52UEDDGiwHpM7v/.', 'avatar.png', NULL, NULL, NULL, NULL, '2020-09-25 17:06:00', '2020-09-25 17:06:00', 1, 1, 1, 0, 3, 0, 0, 0, 'eyJpdiI6IklvY0h4SmswZkd6RkRPSjJkdnFTTEE9PSIsInZhbHVlIjoiZGdpSytJQjA2NlFPZCtrbXhhaG5jUT09IiwibWFjIjoiZjkxYzgzYzFlOGM0OWZmMzE3ZDNkYTRjNzY1YzZmYzY4YmM5MGFiMzVmOGUxZGQ3YzRmNzZlMWYzZDMwMGM3NiJ9', 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '{\"pago\":\"1\",\"compra\":\"1\",\"pc\":\"1\",\"liquidacion\":\"1\"}', 1, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(17, NULL, NULL, '1981', 'e19d5cd5af0378da05f63f891c7467af', '1981', 'lestermorales@sinergiared.com', '', '2020-09-25 17:07:00', '', 0, '1981', '$2y$10$Z15cr834B4PKU.dDZyG38ux1qrTa.xOHltv45AO6x8T7klUwIYPZO', 'avatar.png', NULL, NULL, NULL, NULL, '2020-09-25 17:07:00', '2020-09-25 17:07:00', 1, 1, 1, 0, 3, 0, 0, 0, 'eyJpdiI6IlNBZ0pzV0JLNitkbC9vZnNWT0F5VEE9PSIsInZhbHVlIjoiczhGK0NvcmU1VC93cEdpcUE5M0F6Zz09IiwibWFjIjoiYmQzMzAzNGY3OGZmYjkzZTYyNTk4YzA3MjMzYWJkM2U3ZTAwYmYwZmM3MDBlYWY3MmZiODdkYjI2MzQ3Zjg0MiJ9', 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '{\"pago\":\"1\",\"compra\":\"1\",\"pc\":\"1\",\"liquidacion\":\"1\"}', 1, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(10000, '1981-10-09', NULL, '1980', 'e10adc3949ba59abbe56e057f20f883e', '1980', 'mglesther@hotmail.com', '', '2020-09-25 18:36:29', '', 0, 'Lester Morales', '$2y$10$mJ3U48nAMKt76vmD8C/Fk.fv.KJK/.1Zc.SKAkmGMJv7TyPzv2hze', 'avatar.png', NULL, NULL, NULL, NULL, '2020-09-25 18:36:29', '2020-09-25 18:36:29', 1, 1, 1, 0, 3, 0, 0, 0, 'eyJpdiI6ImdORFAybnVERVhIMlp3My9XYXZUckE9PSIsInZhbHVlIjoiS3FidVBrSm45YXg3a1Z6QnpTdjNoQT09IiwibWFjIjoiYzI2ZTQzMzA0ODczMTQxY2I3ZmNmZTY0YTIxMTZiOTMxMmI5NDI4NWQzZGM1NGI1NmI0ZTliMzg2OGY4NzAwZSJ9', 0, NULL, NULL, 'Normal', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '{\"pago\":\"1\",\"compra\":\"1\",\"pc\":\"1\",\"liquidacion\":\"1\"}', 1, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL);

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
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10001;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
