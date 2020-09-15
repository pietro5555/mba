-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 11, 2020 at 10:39 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mba`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp98_users`
--

DROP TABLE IF EXISTS `wp98_users`;
CREATE TABLE IF NOT EXISTS `wp98_users` (
  `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `birthdate` date DEFAULT NULL,
  `gender` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `user_registered` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'avatar.png',
  `provider` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `referred_id` int(11) DEFAULT '0',
  `sponsor_id` bigint(20) DEFAULT '0',
  `position_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `rol_id` int(11) NOT NULL DEFAULT '1',
  `wallet_amount` double NOT NULL DEFAULT '0',
  `billetera` double NOT NULL DEFAULT '0',
  `bank_amount` double NOT NULL DEFAULT '0',
  `clave` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activacion` tinyint(1) DEFAULT '0',
  `fecha_activacion` datetime DEFAULT NULL,
  `token_correo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipouser` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT 'Normal',
  `ladomatriz` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `puntosPro` double DEFAULT '0',
  `puntosRed` double DEFAULT '0',
  `puntosDer` double DEFAULT '0',
  `puntosIzq` double DEFAULT '0',
  `debiDer` double NOT NULL DEFAULT '0',
  `debiIzq` double DEFAULT '0',
  `binario` date DEFAULT NULL,
  `codigo` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correos` longtext COLLATE utf8mb4_unicode_ci,
  `limitar` int(2) NOT NULL DEFAULT '1',
  `pop_up` int(2) NOT NULL DEFAULT '0',
  `autenticacion` text COLLATE utf8mb4_unicode_ci,
  `factor2` text COLLATE utf8mb4_unicode_ci,
  `fechaver` date DEFAULT NULL,
  `modo_oscuro` int(2) NOT NULL DEFAULT '0',
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci,
  `cover_name` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`),
  KEY `user_email` (`user_email`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp98_users`
--

INSERT INTO `wp98_users` (`ID`, `birthdate`, `gender`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`, `password`, `avatar`, `provider`, `provider_id`, `access_token`, `remember_token`, `created_at`, `updated_at`, `referred_id`, `sponsor_id`, `position_id`, `status`, `rol_id`, `wallet_amount`, `billetera`, `bank_amount`, `clave`, `activacion`, `fecha_activacion`, `token_correo`, `tipouser`, `ladomatriz`, `puntosPro`, `puntosRed`, `puntosDer`, `puntosIzq`, `debiDer`, `debiIzq`, `binario`, `codigo`, `correos`, `limitar`, `pop_up`, `autenticacion`, `factor2`, `fechaver`, `modo_oscuro`, `profession`, `about`, `cover_name`) VALUES
(1, NULL, NULL, 'shapinetadmin', '$P$B992jwyhEJzww0CCIg4l57J0j.pdf60', 'shapinetadmin', 'admin@shapinetwork.com', '', '2020-09-11 19:58:33', '', 0, 'Shapinetwork', '$2y$10$X901K/MPP45Icd.9GyBvJO/7246PTmMW4HGRftL/w5aOGMeD/kmVK', 'avatar.png', NULL, NULL, NULL, 'Iqe1MolgjBI5p36qJrQbFDfkpohxwxzWu3Kxmnx2rJ5Ofuxsn2Tbc8A2VSbd', '2020-03-26 11:49:07', '2020-09-11 19:28:33', 0, 0, 0, 1, 0, 170, 0, 0, '$2y$10$x3gfgSnAfQTfXiZenuaDWuKExJ7rLTq0u2th/zmVgAAbg7Q/s/HGW', 0, NULL, NULL, 'Normal', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '{\"pago\":\"1\",\"compra\":\"1\",\"pc\":\"1\",\"liquidacion\":\"1\"}', 1, 0, NULL, NULL, NULL, 0, '', NULL, NULL),
(2, '2000-09-17', 'M', 'dgonzalez', '25f9e794323b453885f5181f1b624d0b', 'dgonzalez', 'dgonzalez@mail.com', '', '2020-09-11 22:27:35', '', 0, 'David Gonzalez', '$2y$10$2kkEGIWYAhjqGZM761kZ4.BEc3vsEbYRcgHGT6d3bCLtP3vO6R2Pu', 'user_1599859788.jpg', NULL, NULL, NULL, NULL, '2020-09-11 20:59:48', '2020-09-11 20:59:48', 1, 1, 1, 0, 2, 0, 0, 0, 'eyJpdiI6InJwc3pZdSszdEdhZnlvQUNFOUpBb0E9PSIsInZhbHVlIjoiTk9LNnMybjBmSWNOUXRFamFRcVo2azVEYUFpb242OE5VRnNhSEQ0aFI3RT0iLCJtYWMiOiJmMGQ1NzA5MjFhMGU5ODA1YThhOGZlMTZiMmY5YzhkYTBmMjk1MmEwOTU1ZDQ4ZGI1OGMxY2MwMWQyZmQxOWI2In0=', 0, NULL, NULL, 'Normal', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '{\"pago\":\"1\",\"compra\":\"1\",\"pc\":\"1\",\"liquidacion\":\"1\"}', 1, 0, NULL, NULL, NULL, 0, 'Experto en Economia', 'Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper.', NULL),
(3, '1994-09-19', 'F', 'mblanco', '25f9e794323b453885f5181f1b624d0b', 'mblanco', 'mblanco@mail.com', '', '2020-09-11 23:42:22', '', 0, 'Mariana Blanco', '$2y$10$nnNLgAzGjf3zznAUpIO6S.xIXFLkNG4/93ls/MXVWNTDRLrc5ea4m', 'user_1599869542.png', NULL, NULL, NULL, NULL, '2020-09-11 23:42:22', '2020-09-11 23:42:22', 1, 1, 1, 0, 2, 0, 0, 0, 'eyJpdiI6ImxGQ1dmeXBaZVo0TVZFTHJac0hjNWc9PSIsInZhbHVlIjoiaTRwWHJZS0VKc0dWXC9MZXhMb0tqcUtMZVlzY1l3TlNCSWM3T2N0QzV4Rk09IiwibWFjIjoiNzUwNTk5OTBhN2E0MmYxYTQ1YzMxYjMzOTBhOGU2NGJkZmQxOWMzZTI4MTEwNzVjZDg3N2VmMzNiNGNhZWI2MCJ9', 0, NULL, NULL, 'Normal', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '{\"pago\":\"1\",\"compra\":\"1\",\"pc\":\"1\",\"liquidacion\":\"1\"}', 1, 0, NULL, NULL, NULL, 0, 'Conferencias y experta en Inteligencia Artificial', 'Donec ullamcorper nulla non metus auctor fringilla.', NULL),
(4, '1997-09-29', 'M', 'jvera', '25f9e794323b453885f5181f1b624d0b', 'jvera', 'jvera@mail.com', '', '2020-09-11 23:47:34', '', 0, 'Jorge Vera', '$2y$10$xqFa4uhZ1WHj3DUFUG5hEOGjqPxRKhXf0WgxvICvu0C.REpg55thO', 'user_1599869854.png', NULL, NULL, NULL, NULL, '2020-09-11 23:47:34', '2020-09-11 23:47:34', 1, 1, 1, 0, 2, 0, 0, 0, 'eyJpdiI6Ikt0ZGJkSGR5XC9FVkcwZUJRRHd1cTJ3PT0iLCJ2YWx1ZSI6IktJUmNwdFVqQ0ZvSHUwOVBnZENPdXNIekxKdEQxaUp3Z0dXK1ZaR0NJMms9IiwibWFjIjoiYTYwMzZjY2I0YmMzMWU2OGMzYTM4YTQ2N2UxYTViYjA5Y2JlY2I5NzlhMTVhYWQ2MGFmMDczY2VkMjVmYmRlMSJ9', 0, NULL, NULL, 'Normal', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '{\"pago\":\"1\",\"compra\":\"1\",\"pc\":\"1\",\"liquidacion\":\"1\"}', 1, 0, NULL, NULL, NULL, 0, 'Experto en Forex', 'Praesent commodo cursus magna, vel scelerisque nisl consectetur.', NULL),
(5, '1992-09-26', 'F', 'mfrancia', '25f9e794323b453885f5181f1b624d0b', 'mfrancia', 'rfrancia@mail.com', '', '2020-09-11 23:50:05', '', 0, 'Rebeka Francia', '$2y$10$yFRnTZPIpA6aRRnfjn5G6.LK3tObKmAFb5A1PNz0JmD2poS6d6C0y', 'user_1599870005.png', NULL, NULL, NULL, NULL, '2020-09-11 23:50:05', '2020-09-11 23:50:05', 1, 1, 1, 0, 2, 0, 0, 0, 'eyJpdiI6InZrTFhqc1dqSmEydEgrRUlOSGxFVHc9PSIsInZhbHVlIjoiR1hKbUhZWEN6M1k4RXN0TnJLdndRMWpYUzN5Vm80TG12ZUNzbFZXUzhuST0iLCJtYWMiOiJkYWRkNTdmY2RjMmVjNzllZjY2MjM1ODhlNGFjMjFlYzM5MTVhMDc4NWIxZTFiZDJhOWRjNGQxYTllYWZmNzZkIn0=', 0, NULL, NULL, 'Normal', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '{\"pago\":\"1\",\"compra\":\"1\",\"pc\":\"1\",\"liquidacion\":\"1\"}', 1, 0, NULL, NULL, NULL, 0, 'Experta en Análisis técnico', 'Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.', NULL),
(6, '1980-09-12', 'M', 'jperez', '25f9e794323b453885f5181f1b624d0b', 'jperez', 'jlperez@mail.com', '', '2020-09-11 23:52:19', '', 0, 'Juan Luis Perez', '$2y$10$OxpcMgZBYNhMdf0o02yR1.VBbs9FjX9IeGQ/vVXvfuXqcTkfDPTh.', 'user_1599870139.png', NULL, NULL, NULL, NULL, '2020-09-11 23:52:19', '2020-09-11 23:52:19', 1, 1, 1, 0, 2, 0, 0, 0, 'eyJpdiI6IlA3dkpCYXF1RTc5NlwvaXhZanlydStRPT0iLCJ2YWx1ZSI6Ilp4aWF0a1wvT2JSNzFtTlwvXC9FejNXemVqdzFKUlhneVB1SnFzdFZcL3BFSnowPSIsIm1hYyI6ImViMmNiNDUzZGJlY2M5ZGNiN2Q0ZjA1ZjQzNzhkZTYyZDhhOWEzMjRkZjkzMjVlYTY1NDFiM2ViODA0Mjk3MGEifQ==', 0, NULL, NULL, 'Normal', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '{\"pago\":\"1\",\"compra\":\"1\",\"pc\":\"1\",\"liquidacion\":\"1\"}', 1, 0, NULL, NULL, NULL, 0, 'Experto en Finanzas', 'Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.', NULL),
(7, '1975-09-16', 'F', 'mfernandez', '25f9e794323b453885f5181f1b624d0b', 'mfernandez', 'mlfernandez@mail.com', '', '2020-09-11 23:58:28', '', 0, 'Maria Luisa Hernandez', '$2y$10$wrKJ69er30ZvaDvKJ4XNJey5MV0Gt3H/yLKV.cpnYHs1veyDfWk9e', 'user_1599870508.png', NULL, NULL, NULL, NULL, '2020-09-11 23:58:28', '2020-09-11 23:58:28', 1, 2, 2, 0, 2, 0, 0, 0, 'eyJpdiI6IkVXMkZtTDFrM2lCZHhySDZDYnFDXC9nPT0iLCJ2YWx1ZSI6Ik15c1FIVTREZlM5SzJhZElzYlREZ0w2NlhYWURcL2RUSHA5OFZBMmZ3S0hjPSIsIm1hYyI6ImNkMjI4NWMwYWI0M2I1NDA1ZThlMjYzOTI3N2I1MmIyNGVhNGIxZTNlZGNhNWI4ODVlYjU3MGFkMTZjY2QyMGYifQ==', 0, NULL, NULL, 'Normal', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '{\"pago\":\"1\",\"compra\":\"1\",\"pc\":\"1\",\"liquidacion\":\"1\"}', 1, 0, NULL, NULL, NULL, 0, 'Experto en Forex', 'Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper.', NULL),
(8, '1989-02-08', 'F', 'ejuarez', '25f9e794323b453885f5181f1b624d0b', 'ejuarez', 'ejuarez@mail.com', '', '2020-09-12 00:07:13', '', 0, 'Estefani Juarez', '$2y$10$ST9lSUADvpEOjrcZ5TWlQu2JC/VW5Yg4Tivo8fjVRozHaZSnf9jy.', 'user_1599871033.png', NULL, NULL, NULL, NULL, '2020-09-12 00:07:13', '2020-09-12 00:07:13', 1, 2, 2, 0, 2, 0, 0, 0, 'eyJpdiI6InZWXC9iMG1MbDR5Nnp1VjZCdlpCamVRPT0iLCJ2YWx1ZSI6Ikxocjk5MlwvUnc0bkNuRkdWajg2SVlJbStzMkJlcnZKaWdaTFFteWtpQzVNPSIsIm1hYyI6IjA4OGNmMThlOTQ1Y2U3MmNmYzQ5NmNmMDc0ZWM2OGJjNTgyMzFhYWUwYWY1MmVmMzRiMWYyMDM3YmNmZDAwMTgifQ==', 0, NULL, NULL, 'Normal', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '{\"pago\":\"1\",\"compra\":\"1\",\"pc\":\"1\",\"liquidacion\":\"1\"}', 1, 0, NULL, NULL, NULL, 0, 'Experto en Análisis Técnico y Financiero', 'Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper.', NULL),
(9, '1998-09-12', 'F', 'avaldivieso', '25f9e794323b453885f5181f1b624d0b', 'avaldivieso', 'avaldivieso@mail.com', '', '2020-09-12 00:14:37', '', 0, 'Alejandro Valdivieso', '$2y$10$aiprzCFk6G1uydEf5iqjfeY9kf6ZFeqOm.Au9HFARPYvnQNJuwVAG', 'user_1599871477.png', NULL, NULL, NULL, NULL, '2020-09-12 00:14:38', '2020-09-12 00:14:38', 1, 2, 2, 0, 2, 0, 0, 0, 'eyJpdiI6InQ0S0VONXcxUlFPcGtvTWRvcDVLekE9PSIsInZhbHVlIjoiMW01ejQ1dmIxWFJ3TnJiZGVxc2h3aGlSUkNLdVBhTEJUNFJWVDFWeDYwST0iLCJtYWMiOiI0ZDgzNjZiMzIyOWU1YzFkMzdlM2FmMmE5ZDg5MGQ3ZDhlMDJlZDcxNTYxN2MwMDNjZDU0NGM2MjZiMDYwODhmIn0=', 0, NULL, NULL, 'Normal', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '{\"pago\":\"1\",\"compra\":\"1\",\"pc\":\"1\",\"liquidacion\":\"1\"}', 1, 0, NULL, NULL, NULL, 0, 'Conferencista y experta en Criptomonedas', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus eros malesuada arcu sagittis, et lobortis.', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
