-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-10-2020 a las 14:38:30
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
-- Base de datos: `shapin_streaming`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_id`, `subject_type`, `causer_id`, `causer_type`, `properties`, `created_at`, `updated_at`) VALUES
(1, 'meeting', 'created', 1, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.36.54.48\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36 Edg\\/85.0.564.51\"}', '2020-09-22 21:10:28', '2020-09-22 21:10:28'),
(2, 'meeting', 'updated', 1, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.36.54.48\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36 Edg\\/85.0.564.51\"}', '2020-09-22 21:10:28', '2020-09-22 21:10:28'),
(3, 'meeting', 'updated', 1, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.36.54.48\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36 Edg\\/85.0.564.51\"}', '2020-09-22 21:10:28', '2020-09-22 21:10:28'),
(4, 'meeting', 'updated', 1, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.36.54.48\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36 Edg\\/85.0.564.51\"}', '2020-09-22 21:10:28', '2020-09-22 21:10:28'),
(5, 'meeting', 'updated', 1, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.36.54.48\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36 Edg\\/85.0.564.51\"}', '2020-09-22 21:10:29', '2020-09-22 21:10:29'),
(6, 'meeting', 'created', 2, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.36.54.48\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36 Edg\\/85.0.564.51\"}', '2020-09-23 00:23:21', '2020-09-23 00:23:21'),
(7, 'meeting', 'updated', 2, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.36.54.48\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36 Edg\\/85.0.564.51\"}', '2020-09-23 00:23:21', '2020-09-23 00:23:21'),
(8, 'meeting', 'updated', 2, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.36.54.48\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36 Edg\\/85.0.564.51\"}', '2020-09-23 00:23:21', '2020-09-23 00:23:21'),
(9, 'meeting', 'updated', 2, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.36.54.48\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36 Edg\\/85.0.564.51\"}', '2020-09-23 00:23:21', '2020-09-23 00:23:21'),
(10, 'meeting', 'updated', 2, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.36.54.48\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36 Edg\\/85.0.564.51\"}', '2020-09-23 00:23:22', '2020-09-23 00:23:22'),
(11, 'meeting', 'created', 3, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-23 19:18:08', '2020-09-23 19:18:08'),
(12, 'meeting', 'updated', 3, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-23 19:18:08', '2020-09-23 19:18:08'),
(13, 'meeting', 'updated', 3, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-23 19:18:08', '2020-09-23 19:18:08'),
(14, 'meeting', 'updated', 3, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-23 19:18:08', '2020-09-23 19:18:08'),
(15, 'meeting', 'updated', 3, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-23 19:18:12', '2020-09-23 19:18:12'),
(16, 'meeting', 'created', 4, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-23 19:39:07', '2020-09-23 19:39:07'),
(17, 'meeting', 'updated', 4, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-23 19:39:07', '2020-09-23 19:39:07'),
(18, 'meeting', 'updated', 4, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-23 19:39:07', '2020-09-23 19:39:07'),
(19, 'meeting', 'updated', 4, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-23 19:39:08', '2020-09-23 19:39:08'),
(20, 'meeting', 'updated', 4, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-23 19:39:14', '2020-09-23 19:39:14'),
(21, 'segment', 'created', 1, 'App\\Models\\Segment', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:02:50', '2020-09-24 03:02:50'),
(22, 'meeting', 'created', 5, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-24 03:03:01', '2020-09-24 03:03:01'),
(23, 'meeting', 'updated', 5, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-24 03:03:01', '2020-09-24 03:03:01'),
(24, 'meeting', 'updated', 5, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-24 03:03:01', '2020-09-24 03:03:01'),
(25, 'meeting', 'updated', 5, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-24 03:03:01', '2020-09-24 03:03:01'),
(26, 'meeting', 'updated', 5, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-24 03:03:03', '2020-09-24 03:03:03'),
(27, 'option', 'created', 1, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:03:13', '2020-09-24 03:03:13'),
(28, 'meeting', 'created', 6, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:04:59', '2020-09-24 03:04:59'),
(29, 'contact', 'created', 1, 'App\\Models\\Contact', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:06:07', '2020-09-24 03:06:07'),
(30, 'meeting', 'created', 1, 'App\\Models\\Invitee', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:06:26', '2020-09-24 03:06:26'),
(31, 'meeting', 'updated', 6, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:10:04', '2020-09-24 03:10:04'),
(32, 'meeting', 'updated', 6, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:10:04', '2020-09-24 03:10:04'),
(33, 'meeting', 'updated', 1, 'App\\Models\\Invitee', 2, 'App\\Models\\User', '{\"ip\":\"191.95.59.200\",\"user_agent\":\"Mozilla\\/5.0 (iPhone; CPU iPhone OS 14_0 like Mac OS X) AppleWebKit\\/605.1.15 (KHTML, like Gecko) Version\\/14.0 Mobile\\/15E148 Safari\\/604.1\"}', '2020-09-24 03:10:48', '2020-09-24 03:10:48'),
(34, 'meeting', 'created', 7, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:15:42', '2020-09-24 03:15:42'),
(35, 'meeting', 'updated', 7, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:17:03', '2020-09-24 03:17:03'),
(36, 'contact', 'created', 2, 'App\\Models\\Contact', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:17:59', '2020-09-24 03:17:59'),
(37, 'contact', 'created', 3, 'App\\Models\\Contact', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:19:22', '2020-09-24 03:19:22'),
(38, 'contact', 'created', 4, 'App\\Models\\Contact', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:19:56', '2020-09-24 03:19:56'),
(39, 'meeting', 'created', 2, 'App\\Models\\Invitee', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:24:06', '2020-09-24 03:24:06'),
(40, 'meeting', 'created', 3, 'App\\Models\\Invitee', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:24:06', '2020-09-24 03:24:06'),
(41, 'meeting', 'created', 4, 'App\\Models\\Invitee', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:24:27', '2020-09-24 03:24:27'),
(42, 'meeting', 'updated', 7, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:30:30', '2020-09-24 03:30:30'),
(43, 'meeting', 'updated', 7, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:30:30', '2020-09-24 03:30:30'),
(44, 'meeting', 'updated', 2, 'App\\Models\\Invitee', 3, 'App\\Models\\User', '{\"ip\":\"177.241.60.68\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:31:56', '2020-09-24 03:31:56'),
(45, 'meeting', 'updated', 2, 'App\\Models\\Invitee', 3, 'App\\Models\\User', '{\"ip\":\"177.241.60.68\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:31:56', '2020-09-24 03:31:56'),
(46, 'meeting', 'updated', 2, 'App\\Models\\Invitee', 3, 'App\\Models\\User', '{\"ip\":\"177.241.60.68\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:32:00', '2020-09-24 03:32:00'),
(47, 'meeting', 'updated', 2, 'App\\Models\\Invitee', 3, 'App\\Models\\User', '{\"ip\":\"177.241.60.68\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:32:37', '2020-09-24 03:32:37'),
(48, 'meeting', 'updated', 2, 'App\\Models\\Invitee', 3, 'App\\Models\\User', '{\"ip\":\"177.241.60.68\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:32:38', '2020-09-24 03:32:38'),
(49, 'meeting', 'updated', 3, 'App\\Models\\Invitee', 4, 'App\\Models\\User', '{\"ip\":\"181.197.118.72\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:32:50', '2020-09-24 03:32:50'),
(50, 'meeting', 'updated', 3, 'App\\Models\\Invitee', 4, 'App\\Models\\User', '{\"ip\":\"181.197.118.72\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:33:52', '2020-09-24 03:33:52'),
(51, 'meeting', 'updated', 4, 'App\\Models\\Invitee', 2, 'App\\Models\\User', '{\"ip\":\"191.95.59.200\",\"user_agent\":\"Mozilla\\/5.0 (iPhone; CPU iPhone OS 14_0 like Mac OS X) AppleWebKit\\/605.1.15 (KHTML, like Gecko) Version\\/14.0 Mobile\\/15E148 Safari\\/604.1\"}', '2020-09-24 03:36:05', '2020-09-24 03:36:05'),
(52, 'meeting', 'updated', 2, 'App\\Models\\Invitee', 3, 'App\\Models\\User', '{\"ip\":\"177.241.60.68\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-24 03:36:22', '2020-09-24 03:36:22'),
(53, 'meeting', 'updated', 4, 'App\\Models\\Invitee', 2, 'App\\Models\\User', '{\"ip\":\"191.95.59.200\",\"user_agent\":\"Mozilla\\/5.0 (iPhone; CPU iPhone OS 14_0 like Mac OS X) AppleWebKit\\/605.1.15 (KHTML, like Gecko) Version\\/14.0 Mobile\\/15E148 Safari\\/604.1\"}', '2020-09-24 03:36:34', '2020-09-24 03:36:34'),
(54, 'meeting', 'updated', 2, 'App\\Models\\Invitee', 3, 'App\\Models\\User', '{\"ip\":\"177.241.60.68\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-24 03:38:06', '2020-09-24 03:38:06'),
(55, 'meeting', 'updated', 2, 'App\\Models\\Invitee', 3, 'App\\Models\\User', '{\"ip\":\"177.241.60.68\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-24 03:38:16', '2020-09-24 03:38:16'),
(56, 'meeting', 'updated', 3, 'App\\Models\\Invitee', 4, 'App\\Models\\User', '{\"ip\":\"181.197.118.72\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:38:44', '2020-09-24 03:38:44'),
(57, 'meeting', 'updated', 2, 'App\\Models\\Invitee', 3, 'App\\Models\\User', '{\"ip\":\"177.241.60.68\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-24 03:40:07', '2020-09-24 03:40:07'),
(58, 'meeting', 'updated', 3, 'App\\Models\\Invitee', 4, 'App\\Models\\User', '{\"ip\":\"181.197.118.72\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:40:27', '2020-09-24 03:40:27'),
(59, 'meeting', 'updated', 3, 'App\\Models\\Invitee', 4, 'App\\Models\\User', '{\"ip\":\"181.179.30.224\",\"user_agent\":\"Mozilla\\/5.0 (iPhone; CPU iPhone OS 12_4_6 like Mac OS X) AppleWebKit\\/605.1.15 (KHTML, like Gecko) Version\\/12.1.2 Mobile\\/15E148 Safari\\/604.1\"}', '2020-09-24 03:42:46', '2020-09-24 03:42:46'),
(60, 'meeting', 'updated', 2, 'App\\Models\\Invitee', 3, 'App\\Models\\User', '{\"ip\":\"177.241.60.68\",\"user_agent\":\"Mozilla\\/5.0 (iPhone; CPU iPhone OS 13_7 like Mac OS X) AppleWebKit\\/605.1.15 (KHTML, like Gecko) Version\\/13.1.2 Mobile\\/15E148 Safari\\/604.1\"}', '2020-09-24 03:43:18', '2020-09-24 03:43:18'),
(61, 'meeting', 'updated', 3, 'App\\Models\\Invitee', 4, 'App\\Models\\User', '{\"ip\":\"181.197.118.72\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:49:31', '2020-09-24 03:49:31'),
(62, 'meeting', 'created', 8, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:54:27', '2020-09-24 03:54:27'),
(63, 'meeting', 'created', 5, 'App\\Models\\Invitee', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:54:59', '2020-09-24 03:54:59'),
(64, 'meeting', 'created', 6, 'App\\Models\\Invitee', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:54:59', '2020-09-24 03:54:59'),
(65, 'meeting', 'created', 7, 'App\\Models\\Invitee', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:54:59', '2020-09-24 03:54:59'),
(66, 'meeting', 'created', 8, 'App\\Models\\Invitee', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:54:59', '2020-09-24 03:54:59'),
(67, 'meeting', 'deleted', 6, 'App\\Models\\Invitee', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:55:06', '2020-09-24 03:55:06'),
(68, 'meeting', 'updated', 8, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 03:56:36', '2020-09-24 03:56:36'),
(69, 'meeting', 'updated', 8, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:00:35', '2020-09-24 04:00:35'),
(70, 'meeting', 'updated', 8, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:00:35', '2020-09-24 04:00:35'),
(71, 'meeting', 'updated', 5, 'App\\Models\\Invitee', 2, 'App\\Models\\User', '{\"ip\":\"191.95.59.200\",\"user_agent\":\"Mozilla\\/5.0 (iPhone; CPU iPhone OS 14_0 like Mac OS X) AppleWebKit\\/605.1.15 (KHTML, like Gecko) Version\\/14.0 Mobile\\/15E148 Safari\\/604.1\"}', '2020-09-24 04:02:24', '2020-09-24 04:02:24'),
(72, 'meeting', 'updated', 5, 'App\\Models\\Invitee', 2, 'App\\Models\\User', '{\"ip\":\"191.95.59.200\",\"user_agent\":\"Mozilla\\/5.0 (iPhone; CPU iPhone OS 14_0 like Mac OS X) AppleWebKit\\/605.1.15 (KHTML, like Gecko) Version\\/14.0 Mobile\\/15E148 Safari\\/604.1\"}', '2020-09-24 04:02:44', '2020-09-24 04:02:44'),
(73, 'meeting', 'updated', 8, 'App\\Models\\Invitee', 4, 'App\\Models\\User', '{\"ip\":\"181.197.118.72\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:02:45', '2020-09-24 04:02:45'),
(74, 'meeting', 'updated', 8, 'App\\Models\\Invitee', 4, 'App\\Models\\User', '{\"ip\":\"181.197.118.72\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:03:31', '2020-09-24 04:03:31'),
(75, 'meeting', 'updated', 8, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:03:36', '2020-09-24 04:03:36'),
(76, 'meeting', 'updated', 8, 'App\\Models\\Invitee', 4, 'App\\Models\\User', '{\"ip\":\"181.197.118.72\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:03:43', '2020-09-24 04:03:43'),
(77, 'meeting', 'updated', 5, 'App\\Models\\Invitee', 2, 'App\\Models\\User', '{\"ip\":\"191.95.59.200\",\"user_agent\":\"Mozilla\\/5.0 (iPhone; CPU iPhone OS 14_0 like Mac OS X) AppleWebKit\\/605.1.15 (KHTML, like Gecko) Version\\/14.0 Mobile\\/15E148 Safari\\/604.1\"}', '2020-09-24 04:03:52', '2020-09-24 04:03:52'),
(78, 'meeting', 'updated', 2, 'App\\Models\\Invitee', 3, 'App\\Models\\User', '{\"ip\":\"177.241.60.68\",\"user_agent\":\"Mozilla\\/5.0 (iPhone; CPU iPhone OS 13_7 like Mac OS X) AppleWebKit\\/605.1.15 (KHTML, like Gecko) Version\\/13.1.2 Mobile\\/15E148 Safari\\/604.1\"}', '2020-09-24 04:04:35', '2020-09-24 04:04:35'),
(79, 'meeting', 'updated', 8, 'App\\Models\\Invitee', 4, 'App\\Models\\User', '{\"ip\":\"181.197.118.72\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:05:10', '2020-09-24 04:05:10'),
(80, 'meeting', 'updated', 2, 'App\\Models\\Invitee', 3, 'App\\Models\\User', '{\"ip\":\"177.241.60.68\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-24 04:06:41', '2020-09-24 04:06:41'),
(81, 'meeting', 'updated', 8, 'App\\Models\\Invitee', 4, 'App\\Models\\User', '{\"ip\":\"181.197.118.72\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:06:45', '2020-09-24 04:06:45'),
(82, 'meeting', 'updated', 8, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:06:56', '2020-09-24 04:06:56'),
(83, 'meeting', 'updated', 8, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:07:57', '2020-09-24 04:07:57'),
(84, 'meeting', 'updated', 8, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:08:08', '2020-09-24 04:08:08'),
(85, 'meeting', 'updated', 7, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:08:41', '2020-09-24 04:08:41'),
(86, 'meeting', 'updated', 7, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:08:53', '2020-09-24 04:08:53'),
(87, 'meeting', 'updated', 3, 'App\\Models\\Invitee', 4, 'App\\Models\\User', '{\"ip\":\"181.197.118.72\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:09:02', '2020-09-24 04:09:02'),
(88, 'meeting', 'updated', 4, 'App\\Models\\Invitee', 2, 'App\\Models\\User', '{\"ip\":\"191.95.59.200\",\"user_agent\":\"Mozilla\\/5.0 (iPhone; CPU iPhone OS 14_0 like Mac OS X) AppleWebKit\\/605.1.15 (KHTML, like Gecko) Version\\/14.0 Mobile\\/15E148 Safari\\/604.1\"}', '2020-09-24 04:09:49', '2020-09-24 04:09:49'),
(89, 'meeting', 'updated', 2, 'App\\Models\\Invitee', 3, 'App\\Models\\User', '{\"ip\":\"177.241.60.68\",\"user_agent\":\"Mozilla\\/5.0 (iPhone; CPU iPhone OS 13_7 like Mac OS X) AppleWebKit\\/605.1.15 (KHTML, like Gecko) Version\\/13.1.2 Mobile\\/15E148 Safari\\/604.1\"}', '2020-09-24 04:10:16', '2020-09-24 04:10:16'),
(90, 'meeting', 'updated', 2, 'App\\Models\\Invitee', 3, 'App\\Models\\User', '{\"ip\":\"177.241.60.68\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-24 04:10:37', '2020-09-24 04:10:37'),
(91, 'meeting', 'updated', 3, 'App\\Models\\Invitee', 4, 'App\\Models\\User', '{\"ip\":\"181.197.118.72\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:10:41', '2020-09-24 04:10:41'),
(92, 'meeting', 'updated', 7, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:12:45', '2020-09-24 04:12:45'),
(93, 'meeting', 'created', 9, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:17:34', '2020-09-24 04:17:34'),
(94, 'meeting', 'created', 9, 'App\\Models\\Invitee', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:18:35', '2020-09-24 04:18:35'),
(95, 'meeting', 'created', 10, 'App\\Models\\Invitee', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:18:35', '2020-09-24 04:18:35'),
(96, 'meeting', 'created', 11, 'App\\Models\\Invitee', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:18:35', '2020-09-24 04:18:35'),
(97, 'meeting', 'created', 12, 'App\\Models\\Invitee', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:18:35', '2020-09-24 04:18:35'),
(98, 'meeting', 'updated', 9, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:19:00', '2020-09-24 04:19:00'),
(99, 'meeting', 'created', 10, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:22:34', '2020-09-24 04:22:34'),
(100, 'meeting', 'updated', 10, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:22:34', '2020-09-24 04:22:34'),
(101, 'meeting', 'updated', 10, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:22:34', '2020-09-24 04:22:34'),
(102, 'meeting', 'updated', 10, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:22:34', '2020-09-24 04:22:34'),
(103, 'meeting', 'updated', 10, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:22:35', '2020-09-24 04:22:35'),
(104, 'meeting', 'created', 11, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:22:46', '2020-09-24 04:22:46'),
(105, 'meeting', 'updated', 11, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:22:46', '2020-09-24 04:22:46'),
(106, 'meeting', 'updated', 11, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:22:46', '2020-09-24 04:22:46'),
(107, 'meeting', 'updated', 11, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:22:46', '2020-09-24 04:22:46'),
(108, 'meeting', 'updated', 11, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:22:46', '2020-09-24 04:22:46'),
(109, 'meeting', 'created', 12, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:23:08', '2020-09-24 04:23:08'),
(110, 'meeting', 'updated', 12, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:23:08', '2020-09-24 04:23:08'),
(111, 'meeting', 'updated', 12, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:23:08', '2020-09-24 04:23:08'),
(112, 'meeting', 'updated', 12, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:23:08', '2020-09-24 04:23:08'),
(113, 'meeting', 'updated', 12, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.84.22.65\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.102 Safari\\/537.36\"}', '2020-09-24 04:23:08', '2020-09-24 04:23:08'),
(114, 'meeting', 'created', 13, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.68.0 PHP\\/7.4.4\"}', '2020-09-24 07:18:21', '2020-09-24 07:18:21'),
(115, 'meeting', 'created', 14, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.68.0 PHP\\/7.4.4\"}', '2020-09-24 07:19:42', '2020-09-24 07:19:42'),
(116, 'meeting', 'created', 15, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.68.0 PHP\\/7.4.4\"}', '2020-09-24 07:19:59', '2020-09-24 07:19:59'),
(117, 'meeting', 'created', 16, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.68.0 PHP\\/7.4.4\"}', '2020-09-24 07:21:35', '2020-09-24 07:21:35'),
(118, 'meeting', 'created', 17, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.68.0 PHP\\/7.4.4\"}', '2020-09-24 07:22:46', '2020-09-24 07:22:46'),
(119, 'meeting', 'created', 18, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.68.0 PHP\\/7.4.4\"}', '2020-09-24 07:59:56', '2020-09-24 07:59:56'),
(120, 'meeting', 'created', 19, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.68.0 PHP\\/7.4.4\"}', '2020-09-24 08:01:05', '2020-09-24 08:01:05'),
(121, 'meeting', 'updated', 18, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.68.0 PHP\\/7.4.4\"}', '2020-09-24 08:39:55', '2020-09-24 08:39:55'),
(122, 'option', 'created', 2, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-24 08:45:22', '2020-09-24 08:45:22'),
(123, 'option', 'updated', 2, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-24 08:45:32', '2020-09-24 08:45:32'),
(124, 'option', 'created', 3, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-24 08:45:51', '2020-09-24 08:45:51'),
(125, 'option', 'created', 4, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-24 08:46:01', '2020-09-24 08:46:01'),
(126, 'option', 'created', 5, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-24 08:46:08', '2020-09-24 08:46:08'),
(127, 'option', 'created', 6, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-24 08:46:16', '2020-09-24 08:46:16'),
(128, 'option', 'created', 7, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-24 08:46:23', '2020-09-24 08:46:23'),
(129, 'option', 'created', 8, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-24 08:46:30', '2020-09-24 08:46:30'),
(130, 'option', 'created', 9, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-24 08:46:37', '2020-09-24 08:46:37'),
(131, 'option', 'created', 10, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-24 08:46:45', '2020-09-24 08:46:45'),
(132, 'meeting', 'updated', 19, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.68.0 PHP\\/7.4.4\"}', '2020-09-24 08:53:08', '2020-09-24 08:53:08'),
(133, 'meeting', 'created', 20, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-24 08:54:23', '2020-09-24 08:54:23'),
(134, 'meeting', 'created', 21, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-24 08:55:25', '2020-09-24 08:55:25'),
(135, 'option', 'created', 11, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-24 08:58:32', '2020-09-24 08:58:32'),
(136, 'meeting', 'updated', 21, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-24 08:59:35', '2020-09-24 08:59:35'),
(137, 'option', 'created', 12, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-24 09:00:10', '2020-09-24 09:00:10'),
(138, 'option', 'created', 13, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-24 09:00:40', '2020-09-24 09:00:40'),
(139, 'meeting', 'updated', 21, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-24 09:01:02', '2020-09-24 09:01:02'),
(140, 'meeting', 'updated', 19, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.201.16.47\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.68.0 PHP\\/7.4.4\"}', '2020-09-24 09:02:14', '2020-09-24 09:02:14'),
(141, 'option', 'created', 14, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"190.78.98.86\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-24 22:50:31', '2020-09-24 22:50:31'),
(142, 'option', 'created', 15, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"190.78.98.86\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-24 22:51:14', '2020-09-24 22:51:14'),
(143, 'option', 'updated', 15, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"190.78.98.86\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-24 22:55:10', '2020-09-24 22:55:10'),
(144, 'option', 'deleted', 15, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"190.78.98.86\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-24 22:59:51', '2020-09-24 22:59:51'),
(145, 'option', 'created', 16, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"190.78.98.86\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.68.0 PHP\\/7.4.4\"}', '2020-09-24 23:02:53', '2020-09-24 23:02:53'),
(146, 'option', 'updated', 16, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"190.78.98.86\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.68.0 PHP\\/7.4.4\"}', '2020-09-24 23:03:48', '2020-09-24 23:03:48'),
(147, 'option', 'deleted', 16, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"190.78.98.86\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.68.0 PHP\\/7.4.4\"}', '2020-09-24 23:04:05', '2020-09-24 23:04:05'),
(148, 'option', 'created', 1, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-09-25 05:12:55', '2020-09-25 05:12:55'),
(149, 'option', 'created', 2, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-09-25 05:14:07', '2020-09-25 05:14:07'),
(150, 'option', 'created', 3, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-09-25 05:14:34', '2020-09-25 05:14:34'),
(151, 'option', 'created', 4, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-09-25 05:14:56', '2020-09-25 05:14:56'),
(152, 'option', 'created', 5, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-09-25 05:15:23', '2020-09-25 05:15:23'),
(153, 'option', 'created', 6, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-09-25 05:15:40', '2020-09-25 05:15:40'),
(154, 'option', 'created', 7, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-09-25 05:15:57', '2020-09-25 05:15:57'),
(155, 'option', 'created', 8, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-09-25 05:16:20', '2020-09-25 05:16:20'),
(156, 'option', 'created', 9, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-09-25 05:16:46', '2020-09-25 05:16:46'),
(157, 'meeting', 'created', 1, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-09-25 05:24:53', '2020-09-25 05:24:53'),
(158, 'meeting', 'created', 2, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.90.87.86\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.70.0 PHP\\/7.3.22\"}', '2020-09-26 19:11:16', '2020-09-26 19:11:16'),
(159, 'meeting', 'created', 3, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.90.87.86\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.70.0 PHP\\/7.3.22\"}', '2020-09-26 19:46:48', '2020-09-26 19:46:48'),
(160, 'meeting', 'created', 4, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.90.87.86\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.70.0 PHP\\/7.3.22\"}', '2020-09-26 20:32:43', '2020-09-26 20:32:43'),
(161, 'meeting', 'created', 5, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"186.90.87.86\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.70.0 PHP\\/7.3.22\"}', '2020-09-26 20:38:15', '2020-09-26 20:38:15'),
(162, 'role', 'created', 3, 'Spatie\\Permission\\Models\\Role', 1, 'App\\Models\\User', '{\"attributes\":{\"id\":3,\"name\":\"client\"},\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-27 19:59:08', '2020-09-27 19:59:08'),
(163, 'contact', 'created', 5, 'App\\Models\\Contact', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-27 20:00:26', '2020-09-27 20:00:26'),
(164, 'meeting', 'created', 13, 'App\\Models\\Invitee', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-27 20:14:04', '2020-09-27 20:14:04'),
(165, 'meeting', 'created', 14, 'App\\Models\\Invitee', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-27 20:14:47', '2020-09-27 20:14:47'),
(166, 'contact', 'created', 6, 'App\\Models\\Contact', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-27 20:18:17', '2020-09-27 20:18:17'),
(167, 'meeting', 'deleted', 14, 'App\\Models\\Invitee', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-27 20:18:34', '2020-09-27 20:18:34'),
(168, 'meeting', 'created', 15, 'App\\Models\\Invitee', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-27 20:18:44', '2020-09-27 20:18:44'),
(169, 'meeting', 'created', 16, 'App\\Models\\Invitee', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-27 20:18:44', '2020-09-27 20:18:44'),
(170, 'meeting', 'deleted', 15, 'App\\Models\\Invitee', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-27 20:18:49', '2020-09-27 20:18:49'),
(171, 'contact', 'deleted', 5, 'App\\Models\\Contact', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-27 20:33:51', '2020-09-27 20:33:51'),
(172, 'meeting', 'updated', 1, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-27 20:39:21', '2020-09-27 20:39:21'),
(173, 'meeting', 'updated', 1, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-27 20:39:21', '2020-09-27 20:39:21'),
(174, 'meeting', 'created', 17, 'App\\Models\\Invitee', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-27 20:41:42', '2020-09-27 20:41:42'),
(175, 'meeting', 'created', 6, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.68.0 PHP\\/7.4.4\"}', '2020-09-27 22:57:29', '2020-09-27 22:57:29'),
(176, 'meeting', 'created', 7, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.68.0 PHP\\/7.4.4\"}', '2020-09-27 23:01:52', '2020-09-27 23:01:52'),
(177, 'meeting', 'created', 8, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.68.0 PHP\\/7.4.4\"}', '2020-09-27 23:10:30', '2020-09-27 23:10:30'),
(178, 'meeting', 'created', 9, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-09-27 23:13:52', '2020-09-27 23:13:52');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_id`, `subject_type`, `causer_id`, `causer_type`, `properties`, `created_at`, `updated_at`) VALUES
(179, 'meeting', 'updated', 9, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-27 23:18:26', '2020-09-27 23:18:26'),
(180, 'meeting', 'created', 1, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-09-27 23:23:56', '2020-09-27 23:23:56'),
(181, 'meeting', 'updated', 1, 'Meeting', 5, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Linux; Android 9; Redmi Note 8) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.127 Mobile Safari\\/537.36\"}', '2020-09-27 23:30:39', '2020-09-27 23:30:39'),
(182, 'meeting', 'created', 2, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-09-27 23:34:03', '2020-09-27 23:34:03'),
(183, 'meeting', 'updated', 2, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-27 23:35:05', '2020-09-27 23:35:05'),
(184, 'meeting', 'created', 3, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36 Edg\\/85.0.564.63\"}', '2020-09-27 23:37:48', '2020-09-27 23:37:48'),
(185, 'meeting', 'updated', 3, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36 Edg\\/85.0.564.63\"}', '2020-09-27 23:39:57', '2020-09-27 23:39:57'),
(186, 'meeting', 'created', 5, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36 Edg\\/85.0.564.63\"}', '2020-09-27 23:47:07', '2020-09-27 23:47:07'),
(187, 'meeting', 'created', 6, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-09-27 23:52:12', '2020-09-27 23:52:12'),
(188, 'meeting', 'created', 18, 'App\\Models\\Invitee', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36 Edg\\/85.0.564.63\"}', '2020-09-27 23:53:20', '2020-09-27 23:53:20'),
(189, 'meeting', 'updated', 6, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:01:24', '2020-09-28 00:01:24'),
(190, 'meeting', 'updated', 6, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:01:24', '2020-09-28 00:01:24'),
(191, 'meeting', 'updated', 6, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:01:37', '2020-09-28 00:01:37'),
(192, 'meeting', 'updated', 6, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:02:02', '2020-09-28 00:02:02'),
(193, 'meeting', 'updated', 6, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:02:19', '2020-09-28 00:02:19'),
(194, 'meeting', 'updated', 6, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36 Edg\\/85.0.564.63\"}', '2020-09-28 00:02:34', '2020-09-28 00:02:34'),
(195, 'meeting', 'updated', 6, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:02:56', '2020-09-28 00:02:56'),
(196, 'meeting', 'updated', 6, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:03:26', '2020-09-28 00:03:26'),
(197, 'meeting', 'updated', 6, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:03:31', '2020-09-28 00:03:31'),
(198, 'meeting', 'updated', 6, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:03:50', '2020-09-28 00:03:50'),
(199, 'meeting', 'updated', 6, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:04:32', '2020-09-28 00:04:32'),
(200, 'meeting', 'updated', 6, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:04:58', '2020-09-28 00:04:58'),
(201, 'meeting', 'updated', 6, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36 Edg\\/85.0.564.63\"}', '2020-09-28 00:05:35', '2020-09-28 00:05:35'),
(202, 'meeting', 'updated', 6, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36 Edg\\/85.0.564.63\"}', '2020-09-28 00:07:26', '2020-09-28 00:07:26'),
(203, 'meeting', 'updated', 6, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Linux; Android 9; Redmi Note 8) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.127 Mobile Safari\\/537.36\"}', '2020-09-28 00:19:57', '2020-09-28 00:19:57'),
(204, 'meeting', 'updated', 6, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Linux; Android 9; Redmi Note 8) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.127 Mobile Safari\\/537.36\"}', '2020-09-28 00:20:55', '2020-09-28 00:20:55'),
(205, 'meeting', 'updated', 6, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Linux; Android 9; Redmi Note 8) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.127 Mobile Safari\\/537.36\"}', '2020-09-28 00:21:40', '2020-09-28 00:21:40'),
(206, 'meeting', 'updated', 6, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Linux; Android 9; Redmi Note 8) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.127 Mobile Safari\\/537.36\"}', '2020-09-28 00:21:50', '2020-09-28 00:21:50'),
(207, 'meeting', 'updated', 6, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:23:50', '2020-09-28 00:23:50'),
(208, 'meeting', 'created', 7, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:24:03', '2020-09-28 00:24:03'),
(209, 'meeting', 'updated', 7, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:24:03', '2020-09-28 00:24:03'),
(210, 'meeting', 'updated', 7, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:24:03', '2020-09-28 00:24:03'),
(211, 'meeting', 'updated', 7, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:24:03', '2020-09-28 00:24:03'),
(212, 'meeting', 'updated', 7, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:24:04', '2020-09-28 00:24:04'),
(213, 'meeting', 'updated', 7, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:24:07', '2020-09-28 00:24:07'),
(214, 'meeting', 'updated', 7, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:24:26', '2020-09-28 00:24:26'),
(215, 'meeting', 'updated', 6, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:25:04', '2020-09-28 00:25:04'),
(216, 'meeting', 'updated', 6, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:25:29', '2020-09-28 00:25:29'),
(217, 'meeting', 'created', 8, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:26:08', '2020-09-28 00:26:08'),
(218, 'meeting', 'updated', 8, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:26:08', '2020-09-28 00:26:08'),
(219, 'meeting', 'updated', 8, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:26:08', '2020-09-28 00:26:08'),
(220, 'meeting', 'updated', 8, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:26:08', '2020-09-28 00:26:08'),
(221, 'meeting', 'updated', 8, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:26:09', '2020-09-28 00:26:09'),
(222, 'meeting', 'updated', 6, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:29:33', '2020-09-28 00:29:33'),
(223, 'meeting', 'updated', 6, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:37:21', '2020-09-28 00:37:21'),
(224, 'meeting', 'created', 9, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Linux; Android 9; Redmi Note 8) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.127 Mobile Safari\\/537.36\"}', '2020-09-28 00:37:57', '2020-09-28 00:37:57'),
(225, 'meeting', 'updated', 9, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Linux; Android 9; Redmi Note 8) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.127 Mobile Safari\\/537.36\"}', '2020-09-28 00:37:57', '2020-09-28 00:37:57'),
(226, 'meeting', 'updated', 9, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Linux; Android 9; Redmi Note 8) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.127 Mobile Safari\\/537.36\"}', '2020-09-28 00:37:57', '2020-09-28 00:37:57'),
(227, 'meeting', 'updated', 9, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Linux; Android 9; Redmi Note 8) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.127 Mobile Safari\\/537.36\"}', '2020-09-28 00:37:57', '2020-09-28 00:37:57'),
(228, 'meeting', 'updated', 9, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Linux; Android 9; Redmi Note 8) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.127 Mobile Safari\\/537.36\"}', '2020-09-28 00:37:58', '2020-09-28 00:37:58'),
(229, 'meeting', 'updated', 9, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Linux; Android 9; Redmi Note 8) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.127 Mobile Safari\\/537.36\"}', '2020-09-28 00:38:10', '2020-09-28 00:38:10'),
(230, 'meeting', 'created', 10, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:52:24', '2020-09-28 00:52:24'),
(231, 'meeting', 'updated', 10, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:52:24', '2020-09-28 00:52:24'),
(232, 'meeting', 'updated', 10, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:52:24', '2020-09-28 00:52:24'),
(233, 'meeting', 'updated', 10, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:52:24', '2020-09-28 00:52:24'),
(234, 'meeting', 'updated', 10, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 00:52:25', '2020-09-28 00:52:25'),
(235, 'meeting', 'created', 11, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 01:07:14', '2020-09-28 01:07:14'),
(236, 'meeting', 'updated', 11, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 01:07:14', '2020-09-28 01:07:14'),
(237, 'meeting', 'updated', 11, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 01:07:14', '2020-09-28 01:07:14'),
(238, 'meeting', 'updated', 11, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 01:07:15', '2020-09-28 01:07:15'),
(239, 'meeting', 'updated', 11, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 01:07:15', '2020-09-28 01:07:15'),
(240, 'meeting', 'created', 12, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 01:09:24', '2020-09-28 01:09:24'),
(241, 'meeting', 'updated', 12, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 01:09:24', '2020-09-28 01:09:24'),
(242, 'meeting', 'updated', 12, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 01:09:24', '2020-09-28 01:09:24'),
(243, 'meeting', 'updated', 12, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 01:09:24', '2020-09-28 01:09:24'),
(244, 'meeting', 'updated', 12, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 01:09:25', '2020-09-28 01:09:25'),
(245, 'meeting', 'created', 13, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 01:10:14', '2020-09-28 01:10:14'),
(246, 'meeting', 'updated', 13, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 01:10:14', '2020-09-28 01:10:14'),
(247, 'meeting', 'updated', 13, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 01:10:14', '2020-09-28 01:10:14'),
(248, 'meeting', 'updated', 13, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 01:10:14', '2020-09-28 01:10:14'),
(249, 'meeting', 'updated', 13, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 01:10:15', '2020-09-28 01:10:15'),
(250, 'meeting', 'updated', 13, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 01:11:04', '2020-09-28 01:11:04'),
(251, 'meeting', 'updated', 13, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 01:12:16', '2020-09-28 01:12:16'),
(252, 'meeting', 'updated', 13, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 01:12:16', '2020-09-28 01:12:16'),
(253, 'meeting', 'updated', 13, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 01:12:40', '2020-09-28 01:12:40'),
(254, 'meeting', 'created', 14, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-09-28 01:28:21', '2020-09-28 01:28:21'),
(255, 'meeting', 'created', 19, 'App\\Models\\Invitee', 1, 'App\\Models\\User', '{\"ip\":\"190.78.122.111\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-09-28 01:34:07', '2020-09-28 01:34:07'),
(256, 'option', 'created', 10, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-09-30 23:26:17', '2020-09-30 23:26:17'),
(257, 'meeting', 'created', 15, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-10-02 22:15:03', '2020-10-02 22:15:03'),
(258, 'meeting', 'created', 16, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-10-02 22:16:20', '2020-10-02 22:16:20'),
(259, 'meeting', 'created', 17, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-10-02 22:17:20', '2020-10-02 22:17:20'),
(260, 'meeting', 'created', 18, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-10-02 22:18:13', '2020-10-02 22:18:13'),
(261, 'meeting', 'created', 19, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.198.240.146\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36 Edg\\/85.0.564.63\"}', '2020-10-03 01:39:15', '2020-10-03 01:39:15'),
(262, 'meeting', 'updated', 19, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.198.240.146\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36 Edg\\/85.0.564.63\"}', '2020-10-03 01:39:15', '2020-10-03 01:39:15'),
(263, 'meeting', 'updated', 19, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.198.240.146\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36 Edg\\/85.0.564.63\"}', '2020-10-03 01:39:15', '2020-10-03 01:39:15'),
(264, 'meeting', 'updated', 19, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.198.240.146\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36 Edg\\/85.0.564.63\"}', '2020-10-03 01:39:16', '2020-10-03 01:39:16'),
(265, 'meeting', 'updated', 19, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.198.240.146\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36 Edg\\/85.0.564.63\"}', '2020-10-03 01:39:18', '2020-10-03 01:39:18'),
(266, 'meeting', 'updated', 19, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.198.240.146\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36 Edg\\/85.0.564.63\"}', '2020-10-03 01:39:25', '2020-10-03 01:39:25'),
(267, 'meeting', 'updated', 18, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.198.240.146\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-05 19:01:15', '2020-10-05 19:01:15'),
(268, 'meeting', 'created', 20, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.198.240.146\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-05 19:10:49', '2020-10-05 19:10:49'),
(269, 'meeting', 'updated', 20, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.198.240.146\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-05 19:10:49', '2020-10-05 19:10:49'),
(270, 'meeting', 'updated', 20, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.198.240.146\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-05 19:10:49', '2020-10-05 19:10:49'),
(271, 'meeting', 'updated', 20, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.198.240.146\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-05 19:10:50', '2020-10-05 19:10:50'),
(272, 'meeting', 'updated', 20, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.198.240.146\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-05 19:10:51', '2020-10-05 19:10:51'),
(273, 'meeting', 'created', 21, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.60.95.57\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-06 04:28:50', '2020-10-06 04:28:50'),
(274, 'meeting', 'updated', 21, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.60.95.57\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-06 04:29:02', '2020-10-06 04:29:02'),
(275, 'meeting', 'updated', 21, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.60.95.57\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-06 04:29:02', '2020-10-06 04:29:02'),
(276, 'meeting', 'created', 22, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.36.43.147\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-06 06:44:21', '2020-10-06 06:44:21'),
(277, 'meeting', 'updated', 22, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.36.43.147\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-06 06:44:21', '2020-10-06 06:44:21'),
(278, 'meeting', 'updated', 22, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.36.43.147\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-06 06:44:21', '2020-10-06 06:44:21'),
(279, 'meeting', 'updated', 22, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.36.43.147\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-06 06:44:22', '2020-10-06 06:44:22'),
(280, 'meeting', 'updated', 22, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.36.43.147\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-06 06:44:24', '2020-10-06 06:44:24'),
(281, 'meeting', 'created', 23, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.60.95.57\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko\\/20100101 Firefox\\/81.0\"}', '2020-10-06 07:18:51', '2020-10-06 07:18:51'),
(282, 'meeting', 'updated', 23, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.60.95.57\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko\\/20100101 Firefox\\/81.0\"}', '2020-10-06 07:18:51', '2020-10-06 07:18:51'),
(283, 'meeting', 'updated', 23, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.60.95.57\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko\\/20100101 Firefox\\/81.0\"}', '2020-10-06 07:18:51', '2020-10-06 07:18:51'),
(284, 'meeting', 'updated', 23, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.60.95.57\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko\\/20100101 Firefox\\/81.0\"}', '2020-10-06 07:18:51', '2020-10-06 07:18:51'),
(285, 'meeting', 'updated', 23, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.60.95.57\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko\\/20100101 Firefox\\/81.0\"}', '2020-10-06 07:18:55', '2020-10-06 07:18:55'),
(286, 'contact', 'created', 7, 'App\\Models\\Contact', 1, 'App\\Models\\User', '{\"ip\":\"190.60.95.57\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 04:17:28', '2020-10-07 04:17:28'),
(287, 'meeting', 'created', 24, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.60.95.57\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 04:25:43', '2020-10-07 04:25:43'),
(288, 'meeting', 'updated', 24, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.60.95.57\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 04:25:43', '2020-10-07 04:25:43'),
(289, 'meeting', 'updated', 24, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.60.95.57\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 04:25:43', '2020-10-07 04:25:43'),
(290, 'meeting', 'updated', 24, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.60.95.57\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 04:25:44', '2020-10-07 04:25:44'),
(291, 'meeting', 'updated', 24, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.60.95.57\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 04:25:46', '2020-10-07 04:25:46'),
(292, 'meeting', 'created', 25, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.60.95.57\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 04:28:41', '2020-10-07 04:28:41'),
(293, 'meeting', 'updated', 25, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.60.95.57\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 04:29:20', '2020-10-07 04:29:20'),
(294, 'meeting', 'created', 20, 'App\\Models\\Invitee', 1, 'App\\Models\\User', '{\"ip\":\"190.60.95.57\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 04:29:41', '2020-10-07 04:29:41'),
(295, 'meeting', 'created', 21, 'App\\Models\\Invitee', 1, 'App\\Models\\User', '{\"ip\":\"190.60.95.57\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 04:31:34', '2020-10-07 04:31:34'),
(296, 'meeting', 'created', 22, 'App\\Models\\Invitee', 1, 'App\\Models\\User', '{\"ip\":\"190.60.95.57\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 04:31:34', '2020-10-07 04:31:34'),
(297, 'meeting', 'created', 23, 'App\\Models\\Invitee', 1, 'App\\Models\\User', '{\"ip\":\"190.60.95.57\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 04:31:34', '2020-10-07 04:31:34'),
(298, 'meeting', 'created', 24, 'App\\Models\\Invitee', 1, 'App\\Models\\User', '{\"ip\":\"190.60.95.57\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 04:31:34', '2020-10-07 04:31:34'),
(299, 'meeting', 'deleted', 21, 'App\\Models\\Invitee', 1, 'App\\Models\\User', '{\"ip\":\"190.60.95.57\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 04:31:41', '2020-10-07 04:31:41'),
(300, 'meeting', 'updated', 25, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.60.95.57\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 04:32:01', '2020-10-07 04:32:01'),
(301, 'meeting', 'updated', 25, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.60.95.57\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 04:32:01', '2020-10-07 04:32:01'),
(302, 'meeting', 'updated', 24, 'App\\Models\\Invitee', 6, 'App\\Models\\User', '{\"ip\":\"186.28.134.215\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 04:37:34', '2020-10-07 04:37:34'),
(303, 'meeting', 'updated', 23, 'App\\Models\\Invitee', 4, 'App\\Models\\User', '{\"ip\":\"200.75.235.102\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 04:39:36', '2020-10-07 04:39:36'),
(304, 'meeting', 'updated', 24, 'App\\Models\\Invitee', 6, 'App\\Models\\User', '{\"ip\":\"186.28.134.215\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 04:39:58', '2020-10-07 04:39:58'),
(305, 'meeting', 'updated', 23, 'App\\Models\\Invitee', 4, 'App\\Models\\User', '{\"ip\":\"200.75.235.102\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 04:41:05', '2020-10-07 04:41:05'),
(306, 'meeting', 'updated', 25, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.60.95.57\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 04:55:31', '2020-10-07 04:55:31'),
(307, 'meeting', 'updated', 25, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.60.95.57\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 05:01:38', '2020-10-07 05:01:38'),
(308, 'meeting', 'created', 26, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.60.95.57\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 05:03:57', '2020-10-07 05:03:57'),
(309, 'meeting', 'updated', 26, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.60.95.57\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 05:03:57', '2020-10-07 05:03:57'),
(310, 'meeting', 'updated', 26, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.60.95.57\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 05:03:57', '2020-10-07 05:03:57'),
(311, 'meeting', 'updated', 26, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.60.95.57\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 05:03:57', '2020-10-07 05:03:57'),
(312, 'meeting', 'updated', 26, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.60.95.57\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 05:03:58', '2020-10-07 05:03:58'),
(313, 'meeting', 'created', 25, 'App\\Models\\Invitee', 3, 'App\\Models\\User', '{\"ip\":\"177.241.61.20\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 05:04:37', '2020-10-07 05:04:37'),
(314, 'meeting', 'updated', 25, 'App\\Models\\Invitee', 3, 'App\\Models\\User', '{\"ip\":\"177.241.61.20\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 05:04:38', '2020-10-07 05:04:38'),
(315, 'meeting', 'updated', 25, 'App\\Models\\Invitee', 3, 'App\\Models\\User', '{\"ip\":\"177.241.61.20\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 05:05:10', '2020-10-07 05:05:10'),
(316, 'meeting', 'updated', 25, 'App\\Models\\Invitee', 3, 'App\\Models\\User', '{\"ip\":\"177.241.61.20\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 05:05:38', '2020-10-07 05:05:38'),
(317, 'meeting', 'updated', 25, 'App\\Models\\Invitee', 3, 'App\\Models\\User', '{\"ip\":\"177.241.61.20\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 05:06:00', '2020-10-07 05:06:00'),
(318, 'permission', 'assigned', NULL, NULL, 1, 'App\\Models\\User', '{\"ip\":\"190.78.110.102\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 06:55:02', '2020-10-07 06:55:02'),
(319, 'permission', 'assigned', NULL, NULL, 1, 'App\\Models\\User', '{\"ip\":\"186.167.251.235\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 07:14:23', '2020-10-07 07:14:23'),
(320, 'permission', 'assigned', NULL, NULL, 1, 'App\\Models\\User', '{\"ip\":\"186.167.251.235\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 07:14:59', '2020-10-07 07:14:59'),
(321, 'option', 'deleted', 7, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-10-07 19:33:26', '2020-10-07 19:33:26'),
(322, 'option', 'deleted', 10, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-10-07 19:33:35', '2020-10-07 19:33:35'),
(323, 'option', 'created', 11, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-10-07 20:12:51', '2020-10-07 20:12:51'),
(324, 'contact', 'created', 8, 'App\\Models\\Contact', 1, 'App\\Models\\User', '{\"ip\":\"190.78.110.102\",\"user_agent\":\"PostmanRuntime\\/7.26.5\"}', '2020-10-07 20:54:11', '2020-10-07 20:54:11'),
(325, 'contact', 'updated', 8, 'App\\Models\\Contact', 1, 'App\\Models\\User', '{\"ip\":\"190.78.110.102\",\"user_agent\":\"PostmanRuntime\\/7.26.5\"}', '2020-10-07 20:54:11', '2020-10-07 20:54:11'),
(326, 'meeting', 'updated', 17, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.110.102\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 21:02:46', '2020-10-07 21:02:46'),
(327, 'meeting', 'updated', 16, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"190.78.110.102\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-07 21:02:58', '2020-10-07 21:02:58'),
(328, 'meeting', 'created', 27, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-10-07 21:40:25', '2020-10-07 21:40:25'),
(329, 'meeting', 'created', 28, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-10-07 21:41:37', '2020-10-07 21:41:37'),
(330, 'meeting', 'created', 29, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-10-07 21:42:29', '2020-10-07 21:42:29'),
(331, 'meeting', 'created', 30, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-10-07 21:43:32', '2020-10-07 21:43:32'),
(332, 'option', 'updated', 9, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-10-08 00:23:52', '2020-10-08 00:23:52'),
(333, 'option', 'created', 12, 'Option', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-10-08 00:24:08', '2020-10-08 00:24:08'),
(334, 'meeting', 'created', 26, 'App\\Models\\Invitee', 1, 'App\\Models\\User', '{\"ip\":\"190.78.110.102\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36\"}', '2020-10-08 00:35:52', '2020-10-08 00:35:52'),
(335, 'contact', 'created', 9, 'App\\Models\\Contact', 1, 'App\\Models\\User', '{\"ip\":\"190.78.110.102\",\"user_agent\":\"PostmanRuntime\\/7.26.5\"}', '2020-10-08 00:51:15', '2020-10-08 00:51:15'),
(336, 'contact', 'updated', 9, 'App\\Models\\Contact', 1, 'App\\Models\\User', '{\"ip\":\"190.78.110.102\",\"user_agent\":\"PostmanRuntime\\/7.26.5\"}', '2020-10-08 00:51:15', '2020-10-08 00:51:15'),
(337, 'role', 'created', 4, 'Spatie\\Permission\\Models\\Role', 1, 'App\\Models\\User', '{\"attributes\":{\"id\":4,\"name\":\"mentor\"},\"ip\":\"190.78.110.102\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36 Edg\\/85.0.564.68\"}', '2020-10-08 07:35:52', '2020-10-08 07:35:52'),
(338, 'permission', 'assigned', NULL, NULL, 1, 'App\\Models\\User', '{\"ip\":\"190.78.110.102\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36 Edg\\/85.0.564.68\"}', '2020-10-08 07:36:02', '2020-10-08 07:36:02'),
(339, 'permission', 'assigned', NULL, NULL, 1, 'App\\Models\\User', '{\"ip\":\"190.78.110.102\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36 Edg\\/85.0.564.68\"}', '2020-10-08 07:36:47', '2020-10-08 07:36:47'),
(340, 'meeting', 'updated', 15, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-10-09 06:08:41', '2020-10-09 06:08:41'),
(341, 'meeting', 'updated', 15, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-10-09 06:08:41', '2020-10-09 06:08:41'),
(342, 'meeting', 'created', 31, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-10-09 06:11:02', '2020-10-09 06:11:02'),
(343, 'meeting', 'deleted', 27, 'App\\Models\\Invitee', 1, 'App\\Models\\User', '{\"ip\":\"190.36.55.104\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/85.0.4183.121 Safari\\/537.36 Edg\\/85.0.564.70\"}', '2020-10-09 18:29:48', '2020-10-09 18:29:48'),
(344, 'meeting', 'created', 32, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-10-09 18:40:23', '2020-10-09 18:40:23'),
(345, 'meeting', 'created', 33, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-10-09 18:51:07', '2020-10-09 18:51:07'),
(346, 'meeting', 'created', 34, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-10-09 22:54:34', '2020-10-09 22:54:34'),
(347, 'meeting', 'created', 35, 'Meeting', 1, 'App\\Models\\User', '{\"ip\":\"67.23.255.2\",\"user_agent\":\"GuzzleHttp\\/6.5.5 curl\\/7.72.0 PHP\\/7.4.10\"}', '2020-10-09 23:48:45', '2020-10-09 23:48:45'),
(348, 'meeting', 'updated', 35, 'Meeting', 13, 'App\\Models\\User', '{\"ip\":\"186.28.134.215\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/86.0.4240.75 Safari\\/537.36\"}', '2020-10-10 00:00:41', '2020-10-10 00:00:41'),
(349, 'meeting', 'created', 36, 'Meeting', 13, 'App\\Models\\User', '{\"ip\":\"186.28.134.215\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/86.0.4240.75 Safari\\/537.36\"}', '2020-10-10 00:02:38', '2020-10-10 00:02:38'),
(350, 'meeting', 'updated', 36, 'Meeting', 13, 'App\\Models\\User', '{\"ip\":\"186.28.134.215\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/86.0.4240.75 Safari\\/537.36\"}', '2020-10-10 00:02:38', '2020-10-10 00:02:38'),
(351, 'meeting', 'updated', 36, 'Meeting', 13, 'App\\Models\\User', '{\"ip\":\"186.28.134.215\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/86.0.4240.75 Safari\\/537.36\"}', '2020-10-10 00:02:38', '2020-10-10 00:02:38'),
(352, 'meeting', 'updated', 36, 'Meeting', 13, 'App\\Models\\User', '{\"ip\":\"186.28.134.215\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/86.0.4240.75 Safari\\/537.36\"}', '2020-10-10 00:02:39', '2020-10-10 00:02:39'),
(353, 'meeting', 'updated', 36, 'Meeting', 13, 'App\\Models\\User', '{\"ip\":\"186.28.134.215\",\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/86.0.4240.75 Safari\\/537.36\"}', '2020-10-10 00:02:41', '2020-10-10 00:02:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chat_room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat_rooms`
--

CREATE TABLE `chat_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_conversation_at` datetime DEFAULT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat_room_members`
--

CREATE TABLE `chat_room_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chat_room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `joined_at` datetime DEFAULT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentable_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configs`
--

CREATE TABLE `configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `configs`
--

INSERT INTO `configs` (`id`, `name`, `value`, `meta`, `created_at`, `updated_at`) VALUES
(1, 'pusher', '{\"pusher_app_key\":\"47191c61976043f068ee\",\"pusher_app_id\":\"1077588\",\"pusher_app_cluster\":\"us2\",\"pusher_app_secret\":\"b3ff882707f9b3129605\"}', NULL, '2020-09-22 21:10:20', '2020-09-22 21:10:20'),
(2, 'signal', '{\"url\":\"https:\\/\\/signal.kodemint.in:9001\\/\"}', NULL, '2020-09-23 19:39:00', '2020-09-23 19:39:00'),
(3, 'system', '{\"date_format\":\"MMM D, YYYY\",\"time_format\":\"h:mm A\",\"timezone\":\"America\\/Bogota\",\"fy_start\":\"\",\"per_page\":\"10\",\"locale\":\"en\",\"currency\":\"USD\",\"footer_credit\":\"MBA Pro\",\"https\":false,\"error_display\":false,\"print_preview\":true,\"frontend_website\":\"\",\"ip_filter\":false,\"email_log\":false,\"email_template\":false,\"todo\":true,\"backup\":false,\"maintenance_mode\":false,\"maintenance_mode_message\":\"\"}', NULL, '2020-09-24 02:05:51', '2020-09-24 02:05:51'),
(4, 'basic', '{\"org_name\":\"MBA Pro\",\"org_foundation_date\":\"1970-01-01\",\"org_tax_number\":\"\",\"org_running_body\":\"\",\"org_recognition_number\":\"\",\"org_recognition_body\":\"\",\"org_address_line1\":\"Calle 79\",\"org_address_line2\":\"\",\"org_city\":\"Bogota\",\"org_state\":\"Cundinamarca\",\"org_zipcode\":\"\",\"org_country\":\"Colombia\",\"org_phone\":\"3213912535\",\"org_fax\":\"\",\"org_email\":\"soporte@sinergiared.com\",\"org_website\":\"https:\\/\\/mybusinessacademypro.com\",\"app_name\":\"FTX LIve\",\"app_desc\":\"Streaming y Videoconferencias\",\"app_theme_color\":\"#581b98\",\"app_background_color\":\"#ffffff\"}', NULL, '2020-09-24 02:06:55', '2020-10-06 04:34:05'),
(5, 'ui', '{\"full_screen\":false,\"scroll_lock\":false,\"layout\":\"default-layout\",\"color_scheme\":\"custom\",\"page_background_color\":\"light\",\"page_container_background_color\":\"white\",\"page_footer_show\":true,\"page_header_show\":true,\"page_header_is_boxed\":false,\"page_header_background_color\":\"transparent\",\"page_color_scheme_type\":\"light\",\"left_sidebar_height\":\"full\",\"left_sidebar_style\":\"folded\",\"left_sidebar_backdrop\":true,\"left_sidebar_backdrop_color\":\"dark\",\"left_sidebar_shadow\":false,\"left_sidebar_color\":\"white\",\"left_sidebar_show\":false,\"left_sidebar_logo_light\":false,\"right_sidebar_height\":\"full\",\"right_sidebar_style\":\"over\",\"right_sidebar_backdrop\":false,\"right_sidebar_backdrop_color\":\"dark\",\"right_sidebar_shadow\":true,\"right_sidebar_color\":\"white\",\"right_sidebar_show\":false,\"modal_sidebar_height\":\"full\",\"modal_sidebar_style\":\"over\",\"modal_sidebar_backdrop\":false,\"modal_sidebar_backdrop_color\":\"dark\",\"modal_sidebar_shadow\":true,\"modal_sidebar_color\":\"white\",\"modal_sidebar_show\":false,\"config_sidebar_color\":\"light\",\"config_sidebar_show\":false,\"special_sidebar_color\":\"light\",\"special_sidebar_show\":false,\"top_navbar_fixed\":true,\"top_navbar_hide\":false,\"top_navbar_color\":\"gray-darkest\",\"top_navbar_logo_light\":true,\"nav_menu_thumb_on_right\":false,\"nav_menu_letter_icon\":false,\"nav_menu_horizontal\":false,\"notification_position\":\"bottom-right\",\"notification_duration\":\"5000\",\"search_screen_show\":false,\"toggle_rtl\":false,\"wallpaper\":false}', NULL, '2020-09-24 02:49:51', '2020-09-24 02:51:46'),
(6, 'mail', '{\"driver\":\"smtp\",\"from_name\":\"MbaStreaming\",\"from_address\":\"soporte@shapinetwork.com\",\"smtp_host\":\"mail.shapinetwork.com\",\"smtp_port\":\"465\",\"smtp_username\":\"soporte@shapinetwork.com\",\"smtp_password\":\"Proyecto$2019\",\"smtp_encryption\":\"ssl\",\"mailgun_domain\":\"\",\"mailgun_secret\":\"\",\"mailgun_endpoint\":\"\"}', NULL, '2020-09-24 02:58:21', '2020-09-24 03:28:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contacts`
--

INSERT INTO `contacts` (`id`, `uuid`, `name`, `email`, `user_id`, `meta`, `created_at`, `updated_at`) VALUES
(1, 'ce91381b-ad5f-4c9a-a1b2-e66f06e6f68a', 'Lester', 'lestermorales@sinergiared.com', 2, NULL, '2020-09-24 03:06:07', '2020-09-24 03:06:07'),
(2, 'b3e1cd26-14ff-47c2-9be6-5f288b7c863f', 'Noemy Aleman', 'noemyproducer@gmail.com', 3, NULL, '2020-09-24 03:17:59', '2020-09-24 03:17:59'),
(3, 'd8144e98-b53f-4709-a4df-f01585a462a8', 'Noemy Aleman', 'noemy.producer@gmail.com', 3, NULL, '2020-09-24 03:19:22', '2020-09-24 03:19:22'),
(4, 'de0dae3a-6911-4194-9da8-990df9940a92', 'Douglas Carrillo', 'douglascarrillo.ga@gmail.com', 4, NULL, '2020-09-24 03:19:56', '2020-09-24 03:19:56'),
(7, 'bbb6ef29-f745-4513-a42f-88e90e8cfe37', 'Ramon Picon', 'soporte@sinergiared.com', 6, NULL, '2020-10-07 04:17:28', '2020-10-07 04:17:28'),
(6, 'f4a29fd1-ff8a-4c15-ab37-bffcac24d07e', 'Cliente De Prueba', 'lic.freddymillan@gmail.com', 5, NULL, '2020-09-27 20:18:17', '2020-09-27 20:18:17'),
(9, '2b259e10-1e25-41d0-9958-fce90835bf5c', 'Prueba', 'prueba@gmail.com', 7, NULL, '2020-10-08 00:51:15', '2020-10-08 00:51:15'),
(11, 'ceac11f5-2b06-4cfc-b2a9-235a69580f67', 'luisanaelenamarin@gmail.com', 'luisanaelenamarin@gmail.com', 10, NULL, '2020-10-09 13:32:07', '2020-10-09 13:32:07'),
(12, '3f71e6a1-542c-47a5-8532-7cbd64876fab', 'lvmb29@gmail.com', 'lvmb29@gmail.com', 11, NULL, '2020-10-09 13:40:23', '2020-10-09 13:40:23'),
(13, 'cbdd9e76-6d5b-4253-9989-8552dbf22f44', 'conferencias@lestermorales.com', 'conferencias@lestermorales.com', 12, NULL, '2020-10-09 17:54:34', '2020-10-09 17:54:34'),
(14, '9b8d31a3-1778-4a40-9603-c5132d25c2ef', 'ramalejtq@gmail.com', 'ramalejtq@gmail.com', 13, NULL, '2020-10-09 18:48:45', '2020-10-09 18:48:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact_segment`
--

CREATE TABLE `contact_segment` (
  `contact_id` bigint(20) UNSIGNED DEFAULT NULL,
  `segment_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meetings`
--

CREATE TABLE `meetings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agenda` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date_time` datetime DEFAULT NULL,
  `period` int(11) NOT NULL DEFAULT 0,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `meetings`
--

INSERT INTO `meetings` (`id`, `uuid`, `type`, `title`, `agenda`, `description`, `start_date_time`, `period`, `category_id`, `user_id`, `meta`, `created_at`, `updated_at`) VALUES
(1, '577cf0bb-6677-4810-a51e-0009de08e5ef', 'video_conference', 'Prueba de Freddy', 'Esto es una prueba de funcionamiento', 'Esto es una prueba de funcionamiento', '2020-09-27 14:30:00', 60, 1, 1, '{\"status\":\"cancelled\",\"instant\":false,\"identifier\":\"lrpbGp\",\"cancellation_reason\":\"auto\",\"cancelled_at\":\"2020-09-27T18:30:39.254753Z\"}', '2020-09-27 23:23:56', '2020-09-27 23:30:39'),
(2, 'aaa12fcc-143a-471d-ad07-b782600084a5', 'video_conference', 'Prueba 2', 'esto e suna prueba blabahkjsjkdkjsjdksafddsf', 'esto e suna prueba blabahkjsjkdkjsjdksafddsf', '2020-09-27 15:00:00', 60, 1, 1, '{\"status\":\"cancelled\",\"instant\":false,\"identifier\":\"cYzjaa\",\"cancellation_reason\":\"auto\",\"cancelled_at\":\"2020-09-27T18:35:05.180403Z\"}', '2020-09-27 23:34:03', '2020-09-27 23:35:05'),
(3, '113a6157-006e-47a9-9f5a-b856be4be378', 'webinar', 'desde COnnect', 'estp es una prueba de zona horaria', 'prueba', '2020-09-27 15:36:15', 60, 8, 1, '{\"status\":\"cancelled\",\"instant\":false,\"identifier\":\"ze6OY8\",\"cancellation_reason\":\"auto\",\"cancelled_at\":\"2020-09-27T18:39:57.666312Z\"}', '2020-09-27 23:37:48', '2020-09-27 23:39:57'),
(5, 'ae4ecf5d-1651-4b54-945b-aedb11407626', 'audio_conference', 'prueba', 'esto es una prueba esto esta my corrto', 'prueba', '2020-09-27 19:49:36', 60, 9, 1, '{\"status\":\"scheduled\",\"instant\":false,\"identifier\":\"sMuXHg\"}', '2020-09-27 23:47:07', '2020-09-27 23:47:07'),
(6, '77a6af00-5480-4b55-b2ac-79e8d82a8f8a', 'video_conference', 'prueba de MBA', 'dshnafjkdhsfjkhdsjkfhjksdhgjkasdf fdskajghjksdfhgjkfhgjkfdhg fdghfdjkg', 'dshnafjkdhsfjkhdsjkfhjksdhgjkasdf fdskajghjksdfhgjkfhgjkfdhg fdghfdjkg', '2020-09-27 19:00:00', 60, 1, 1, '{\"status\":\"ended\",\"instant\":false,\"identifier\":\"TB1kIb\",\"room_id\":\"z7yknLYkg4gOGPfXmfU9\",\"started_at\":\"2020-09-27T19:01:24.189461Z\",\"is_attendee\":true,\"logs\":[{\"start\":\"2020-09-27T19:01:24.661226Z\",\"ip\":\"190.78.122.111\"},{\"start\":\"2020-09-27T19:01:37.496740Z\",\"ip\":\"190.78.122.111\"},{\"start\":\"2020-09-27T19:02:02.829911Z\",\"ip\":\"190.78.122.111\"},{\"start\":\"2020-09-27T19:02:19.761962Z\",\"ip\":\"190.78.122.111\"},{\"start\":\"2020-09-27T19:02:34.605376Z\",\"ip\":\"190.78.122.111\"},{\"start\":\"2020-09-27T19:02:56.836888Z\",\"ip\":\"190.78.122.111\"},{\"start\":\"2020-09-27T19:03:26.065411Z\",\"ip\":\"190.78.122.111\"},{\"start\":\"2020-09-27T19:03:31.542296Z\",\"ip\":\"190.78.122.111\"},{\"start\":\"2020-09-27T19:03:50.986529Z\",\"ip\":\"190.78.122.111\"},{\"start\":\"2020-09-27T19:04:32.747153Z\",\"ip\":\"190.78.122.111\"},{\"start\":\"2020-09-27T19:04:58.824693Z\",\"ip\":\"190.78.122.111\"},{\"start\":\"2020-09-27T19:05:35.416813Z\",\"ip\":\"190.78.122.111\"},{\"start\":\"2020-09-27T19:07:26.042497Z\",\"ip\":\"190.78.122.111\"},{\"start\":\"2020-09-27T19:19:57.573431Z\",\"ip\":\"190.78.122.111\"},{\"start\":\"2020-09-27T19:20:55.062492Z\",\"ip\":\"190.78.122.111\"},{\"start\":\"2020-09-27T19:21:40.855230Z\",\"ip\":\"190.78.122.111\"},{\"start\":\"2020-09-27T19:21:50.145576Z\",\"ip\":\"190.78.122.111\"},{\"start\":\"2020-09-27T19:23:50.834253Z\",\"ip\":\"190.78.122.111\"},{\"start\":\"2020-09-27T19:25:04.459875Z\",\"ip\":\"190.78.122.111\"},{\"start\":\"2020-09-27T19:25:29.608322Z\",\"ip\":\"190.78.122.111\"},{\"start\":\"2020-09-27T19:29:33.026061Z\",\"ip\":\"190.78.122.111\"}],\"ended_at\":\"2020-09-27T19:37:21.028182Z\"}', '2020-09-27 23:52:12', '2020-09-28 00:37:21'),
(7, 'a094243d-329a-450c-bc92-609924ac285b', 'video_conference', NULL, NULL, NULL, '2020-09-27 19:24:03', 60, NULL, 1, '{\"status\":\"live\",\"instant\":true,\"identifier\":\"2Myg5V\",\"config\":{\"enable_comments\":true,\"private_comments\":true,\"enable_comment_before_meeting_starts\":true},\"room_id\":\"PsFcgxVXPZF4LU9lPRbH\",\"started_at\":\"2020-09-27T19:24:03.602757Z\",\"is_attendee\":true,\"logs\":[{\"start\":\"2020-09-27T19:24:03.838757Z\",\"ip\":\"190.78.122.111\"},{\"start\":\"2020-09-27T19:24:04.447902Z\",\"ip\":\"190.78.122.111\"},{\"start\":\"2020-09-27T19:24:07.574927Z\",\"ip\":\"190.78.122.111\"},{\"start\":\"2020-09-27T19:24:26.321679Z\",\"ip\":\"190.78.122.111\"}]}', '2020-09-28 00:24:03', '2020-09-28 00:24:26'),
(8, 'b08e26f4-44a7-4b2b-9fd8-6efc303af2be', 'video_conference', NULL, NULL, NULL, '2020-09-27 19:26:08', 60, NULL, 1, '{\"status\":\"live\",\"instant\":true,\"identifier\":\"JZX8oc\",\"config\":{\"enable_comments\":true,\"private_comments\":true,\"enable_comment_before_meeting_starts\":true},\"room_id\":\"t9WtC5CYOR797K1QLT7e\",\"started_at\":\"2020-09-27T19:26:08.205788Z\",\"is_attendee\":true,\"logs\":[{\"start\":\"2020-09-27T19:26:08.388880Z\",\"ip\":\"190.78.122.111\"},{\"start\":\"2020-09-27T19:26:09.012522Z\",\"ip\":\"190.78.122.111\"}]}', '2020-09-28 00:26:08', '2020-09-28 00:26:09'),
(9, '1c2f3ced-e7bb-43b1-9583-eacd8ad8bc43', 'video_conference', NULL, NULL, NULL, '2020-09-27 19:37:57', 60, NULL, 1, '{\"status\":\"ended\",\"instant\":true,\"identifier\":\"yeQJWc\",\"config\":{\"enable_comments\":true,\"private_comments\":true,\"enable_comment_before_meeting_starts\":true},\"room_id\":\"3qGQNGKi3wS6US0W283K\",\"started_at\":\"2020-09-27T19:37:57.411840Z\",\"is_attendee\":true,\"logs\":[{\"start\":\"2020-09-27T19:37:57.599106Z\",\"ip\":\"190.78.122.111\"},{\"start\":\"2020-09-27T19:37:58.438055Z\",\"ip\":\"190.78.122.111\"}],\"ended_at\":\"2020-09-27T19:38:10.675690Z\"}', '2020-09-28 00:37:57', '2020-09-28 00:38:10'),
(10, '14ca5e29-fba8-4ca6-ab98-fe3c344b4c16', 'video_conference', NULL, NULL, NULL, '2020-09-27 19:52:24', 60, NULL, 1, '{\"status\":\"live\",\"instant\":true,\"identifier\":\"3phEgw\",\"config\":{\"enable_comments\":true,\"private_comments\":true,\"enable_comment_before_meeting_starts\":true},\"room_id\":\"zq35WtbJMpGCIHQIavxh\",\"started_at\":\"2020-09-27T19:52:24.389224Z\",\"is_attendee\":true,\"logs\":[{\"start\":\"2020-09-27T19:52:24.651215Z\",\"ip\":\"190.78.122.111\"},{\"start\":\"2020-09-27T19:52:25.216909Z\",\"ip\":\"190.78.122.111\"}]}', '2020-09-28 00:52:24', '2020-09-28 00:52:25'),
(11, '60e0cf5d-f53c-4283-80a6-b37447b386bd', 'video_conference', NULL, NULL, NULL, '2020-09-27 20:07:14', 60, NULL, 1, '{\"status\":\"live\",\"instant\":true,\"identifier\":\"h84EvK\",\"config\":{\"enable_comments\":true,\"private_comments\":true,\"enable_comment_before_meeting_starts\":true},\"room_id\":\"Ho7np0UGc29a7tIvbm7V\",\"started_at\":\"2020-09-27T20:07:14.765536Z\",\"is_attendee\":true,\"logs\":[{\"start\":\"2020-09-27T20:07:15.010190Z\",\"ip\":\"190.78.122.111\"},{\"start\":\"2020-09-27T20:07:15.697940Z\",\"ip\":\"190.78.122.111\"}]}', '2020-09-28 01:07:14', '2020-09-28 01:07:15'),
(12, 'd0c18b01-fbf4-45a2-9d45-4213b8777fa8', 'video_conference', NULL, NULL, NULL, '2020-09-27 20:09:24', 60, NULL, 1, '{\"status\":\"live\",\"instant\":true,\"identifier\":\"HCK6yg\",\"config\":{\"enable_comments\":true,\"private_comments\":true,\"enable_comment_before_meeting_starts\":true},\"room_id\":\"9UeLgjtkuLmj1FwxbHwX\",\"started_at\":\"2020-09-27T20:09:24.223582Z\",\"is_attendee\":true,\"logs\":[{\"start\":\"2020-09-27T20:09:24.408994Z\",\"ip\":\"190.78.122.111\"},{\"start\":\"2020-09-27T20:09:25.000038Z\",\"ip\":\"190.78.122.111\"}]}', '2020-09-28 01:09:24', '2020-09-28 01:09:25'),
(13, '013b7571-3cc9-4db7-961b-eb363cc56b95', 'video_conference', NULL, NULL, NULL, '2020-09-27 20:10:14', 60, NULL, 1, '{\"status\":\"ended\",\"instant\":true,\"identifier\":\"O6M3YL\",\"config\":{\"enable_comments\":true,\"private_comments\":true,\"enable_comment_before_meeting_starts\":true},\"room_id\":\"vBfisVY1ToRe6beF9XjS\",\"started_at\":\"2020-09-27T20:12:16.744205Z\",\"is_attendee\":true,\"logs\":[{\"start\":\"2020-09-27T20:10:14.842339Z\",\"ip\":\"190.78.122.111\"},{\"start\":\"2020-09-27T20:10:15.405365Z\",\"ip\":\"190.78.122.111\"},{\"start\":\"2020-09-27T20:12:16.936379Z\",\"ip\":\"190.78.122.111\"}],\"ended_at\":\"2020-09-27T20:12:40.560733Z\"}', '2020-09-28 01:10:14', '2020-09-28 01:12:40'),
(14, '70e4eaa7-cddb-4add-9354-9cd081829d62', 'video_conference', 'prueba final', 'esto es una prueba final que si funcionara', 'esto es una prueba final que si funcionara', '2020-09-28 10:00:00', 60, 1, 1, '{\"status\":\"scheduled\",\"instant\":false,\"identifier\":\"QJeSQY\"}', '2020-09-28 01:28:21', '2020-09-28 01:28:21'),
(15, 'a959808c-0cca-40b7-860d-e8bff1e4a153', 'video_conference', 'Evento de Prueba', 'Esto es una prueba para el funcionamiento de los eventos', '<p>Esto es una prueba para el funcionamiento de los eventos</p>', '2020-10-09 18:14:00', 45, 1, 1, '{\"status\":\"scheduled\",\"instant\":false,\"identifier\":\"Bfhw1g\",\"accessible_via_link\":false}', '2020-10-02 22:15:03', '2020-10-09 06:08:41'),
(16, 'eab86373-6f62-426c-a1f1-059e3c522401', 'video_conference', 'Segundo Evento', 'Esto es una prueba para el funcionamiento de los eventos', 'Esto es una prueba para el funcionamiento de los eventos', '2020-10-04 21:16:00', 45, 1, 1, '{\"status\":\"cancelled\",\"instant\":false,\"identifier\":\"68q21r\",\"cancellation_reason\":\"auto\",\"cancelled_at\":\"2020-10-07T16:02:58.995877Z\"}', '2020-10-02 22:16:20', '2020-10-07 21:02:58'),
(17, 'ccfe879e-ee1c-4391-898e-6ad583bfabf3', 'video_conference', 'Tercer Evento', 'Esto es una prueba para el funcionamiento de los eventos', 'Esto es una prueba para el funcionamiento de los eventos', '2020-10-06 22:17:00', 45, 1, 1, '{\"status\":\"cancelled\",\"instant\":false,\"identifier\":\"q0cHg6\",\"cancellation_reason\":\"auto\",\"cancelled_at\":\"2020-10-07T16:02:46.331000Z\"}', '2020-10-02 22:17:20', '2020-10-07 21:02:46'),
(18, 'e0906ab1-60e5-4803-887e-b23d5063d67a', 'video_conference', 'Evento de Prueba 2', 'Esto es una prueba para el funcionamiento de los eventos', 'Esto es una prueba para el funcionamiento de los eventos', '2020-10-03 18:00:00', 60, 1, 1, '{\"status\":\"cancelled\",\"instant\":false,\"identifier\":\"PjybsQ\",\"cancellation_reason\":\"auto\",\"cancelled_at\":\"2020-10-05T14:01:15.186965Z\"}', '2020-10-02 22:18:13', '2020-10-05 19:01:15'),
(19, 'd09a55d4-8fbf-4dfb-8d96-12ac0de81339', 'video_conference', NULL, NULL, NULL, '2020-10-02 20:39:15', 60, NULL, 1, '{\"status\":\"live\",\"instant\":true,\"identifier\":\"9LZ0mo\",\"config\":{\"enable_comments\":true,\"private_comments\":true,\"enable_comment_before_meeting_starts\":true},\"room_id\":\"qnOpycaIswbmxwDNUgu5\",\"started_at\":\"2020-10-02T20:39:15.386237Z\",\"is_attendee\":true,\"logs\":[{\"start\":\"2020-10-02T20:39:16.387802Z\",\"ip\":\"190.198.240.146\"},{\"start\":\"2020-10-02T20:39:18.881696Z\",\"ip\":\"190.198.240.146\"},{\"start\":\"2020-10-02T20:39:25.950240Z\",\"ip\":\"190.198.240.146\"}]}', '2020-10-03 01:39:15', '2020-10-03 01:39:25'),
(20, 'b53ec113-9749-49c0-aaad-93083bbd2c4f', 'webinar', NULL, NULL, NULL, '2020-10-05 14:10:49', 60, NULL, 1, '{\"status\":\"live\",\"instant\":true,\"accessible_via_link\":true,\"identifier\":\"D86RVP\",\"config\":[],\"room_id\":\"ZhFn4TBfEVzMQctObH46\",\"started_at\":\"2020-10-05T14:10:49.953701Z\",\"is_attendee\":true,\"logs\":[{\"start\":\"2020-10-05T14:10:50.172398Z\",\"ip\":\"190.198.240.146\"},{\"start\":\"2020-10-05T14:10:51.338540Z\",\"ip\":\"190.198.240.146\"}]}', '2020-10-05 19:10:49', '2020-10-05 19:10:51'),
(21, 'fe4e7f7b-b96a-4cc7-8a54-067a90828942', 'video_conference', 'Prueba 05 octubre', 'Prueba de transmisión FTXLive 05 de octubre', '<p>Prueba transmisión</p>', '2020-10-05 23:27:00', 30, 8, 1, '{\"status\":\"live\",\"instant\":false,\"accessible_via_link\":true,\"identifier\":\"7T7YrB\",\"room_id\":\"YiSlkvzpwzEbmXk0PTrH\",\"started_at\":\"2020-10-05T23:29:02.698428Z\",\"is_attendee\":true,\"logs\":[{\"start\":\"2020-10-05T23:29:02.983111Z\",\"ip\":\"190.60.95.57\"}]}', '2020-10-06 04:28:50', '2020-10-06 04:29:02'),
(22, '54d6602e-ffe9-4c65-a49a-fe8850f49c61', 'webinar', NULL, NULL, NULL, '2020-10-06 01:44:21', 60, NULL, 1, '{\"status\":\"live\",\"instant\":true,\"accessible_via_link\":true,\"identifier\":\"REjWaA\",\"config\":[],\"room_id\":\"ESdP7iMlJ5TiVDgyt3mp\",\"started_at\":\"2020-10-06T01:44:21.880807Z\",\"is_attendee\":true,\"logs\":[{\"start\":\"2020-10-06T01:44:22.099115Z\",\"ip\":\"190.36.43.147\"},{\"start\":\"2020-10-06T01:44:24.365816Z\",\"ip\":\"190.36.43.147\"}]}', '2020-10-06 06:44:21', '2020-10-06 06:44:24'),
(23, '54982605-444c-4a28-b60e-8c6d3d3cb968', 'video_conference', NULL, NULL, NULL, '2020-10-06 02:18:51', 60, NULL, 1, '{\"status\":\"live\",\"instant\":true,\"accessible_via_link\":true,\"identifier\":\"7UCndY\",\"config\":[],\"room_id\":\"obD2jhGC2nRyoWhrqoBa\",\"started_at\":\"2020-10-06T02:18:51.232253Z\",\"is_attendee\":true,\"logs\":[{\"start\":\"2020-10-06T02:18:51.456443Z\",\"ip\":\"190.60.95.57\"},{\"start\":\"2020-10-06T02:18:55.375159Z\",\"ip\":\"190.60.95.57\"}]}', '2020-10-06 07:18:51', '2020-10-06 07:18:55'),
(24, 'ee09d115-57ec-4f0d-b460-c215e7f35393', 'video_conference', NULL, NULL, NULL, '2020-10-06 23:25:43', 60, NULL, 1, '{\"status\":\"live\",\"instant\":true,\"accessible_via_link\":true,\"identifier\":\"24Jq5g\",\"config\":[],\"room_id\":\"olrXudMuvUShW960twsN\",\"started_at\":\"2020-10-06T23:25:43.931187Z\",\"is_attendee\":true,\"logs\":[{\"start\":\"2020-10-06T23:25:44.136751Z\",\"ip\":\"190.60.95.57\"},{\"start\":\"2020-10-06T23:25:46.101843Z\",\"ip\":\"190.60.95.57\"}]}', '2020-10-07 04:25:43', '2020-10-07 04:25:46'),
(25, '42f08055-0145-4729-a26c-93aa46c56864', 'video_conference', 'Probando FTX LIVE', 'probando ftxlive con mejoras y correcciones', '<p>probando ftxlive</p>', '2020-10-06 23:27:00', 60, 8, 1, '{\"status\":\"live\",\"instant\":false,\"accessible_via_link\":false,\"identifier\":\"z8R5nv\",\"config\":{\"enable_comments\":false,\"private_comments\":false,\"enable_comment_before_meeting_starts\":false,\"enable_chat\":true,\"enable_screen_sharing\":true,\"enable_recording\":true,\"enable_hand_gesture\":true,\"footer_auto_hide\":false,\"enable_file_sharing\":true,\"layout\":\"gallery\"},\"room_id\":\"7tt7SrPu7SXheFS1NbsJ\",\"started_at\":\"2020-10-06T23:32:01.225489Z\",\"is_attendee\":true,\"logs\":[{\"start\":\"2020-10-06T23:32:01.422536Z\",\"ip\":\"190.60.95.57\"},{\"start\":\"2020-10-06T23:55:31.382720Z\",\"ip\":\"190.60.95.57\"},{\"start\":\"2020-10-07T00:01:38.535266Z\",\"ip\":\"190.60.95.57\"}]}', '2020-10-07 04:28:41', '2020-10-07 05:01:38'),
(26, '330c8903-f957-4945-b507-5793b72bfbd7', 'video_conference', NULL, NULL, NULL, '2020-10-07 00:03:57', 60, NULL, 1, '{\"status\":\"live\",\"instant\":true,\"accessible_via_link\":true,\"identifier\":\"FGSjlO\",\"config\":[],\"room_id\":\"QBloNvZOnBidkamphI7f\",\"started_at\":\"2020-10-07T00:03:57.152372Z\",\"is_attendee\":true,\"logs\":[{\"start\":\"2020-10-07T00:03:57.384786Z\",\"ip\":\"190.60.95.57\"},{\"start\":\"2020-10-07T00:03:58.912275Z\",\"ip\":\"190.60.95.57\"}]}', '2020-10-07 05:03:57', '2020-10-07 05:03:58'),
(27, 'e9ccee31-3bbb-4b66-b668-1d42c15eef9b', 'video_conference', 'Inicio del Marketing', 'Administraci&oacute;n de Redes Sociales\r\n\r\nherramientas\r\n\r\n&nbsp;', '<p>Administraci&oacute;n de Redes Sociales</p>\r\n\r\n<p>herramientas</p>\r\n\r\n<p>&nbsp;</p>', '2020-10-10 09:00:00', 120, 1, 1, '{\"status\":\"scheduled\",\"instant\":false,\"accessible_via_link\":false,\"identifier\":\"qET4Dd\"}', '2020-10-07 21:40:25', '2020-10-07 21:40:25'),
(28, '76af1858-df23-4e4f-9227-0cea7fe4438d', 'video_conference', 'Como Organizar tu cartera de negocio', 'Aprende a controlar tus gastos.', '<p>Aprende a controlar tus gastos.</p>', '2020-10-11 10:00:00', 60, 1, 1, '{\"status\":\"scheduled\",\"instant\":false,\"accessible_via_link\":false,\"identifier\":\"6RKIl2\"}', '2020-10-07 21:41:37', '2020-10-07 21:41:37'),
(29, '72d92f69-6ec1-4704-9498-dbb1fd61799e', 'video_conference', 'Desarrollo de las Finanzas', 'Desarrollo de estrategias de mercadeo', '<p>Desarrollo de estrategias de mercadeo</p>', '2020-10-13 10:00:00', 120, 1, 1, '{\"status\":\"scheduled\",\"instant\":false,\"accessible_via_link\":false,\"identifier\":\"uBeine\"}', '2020-10-07 21:42:29', '2020-10-07 21:42:29'),
(30, '6fd21856-40ca-42c8-bc57-7c34bba29cc5', 'video_conference', 'Muestra de los mercados Internacionales', 'Analisis de mercado\r\n\r\nCrypto', '<p>Analisis de mercado</p>\r\n\r\n<p>Crypto</p>', '2020-10-13 16:00:00', 120, 1, 1, '{\"status\":\"scheduled\",\"instant\":false,\"accessible_via_link\":false,\"identifier\":\"lPC4P9\"}', '2020-10-07 21:43:32', '2020-10-07 21:43:32'),
(31, 'b6863b61-7c0e-4935-85da-3e2a6ec8d80f', 'video_conference', 'Prueba COnexion', 'esto es una prueba de conexion para la api de mba a streaming', '<p>esto es una prueba de conexion para la api de mba a streaming</p>', '2020-10-11 10:00:00', 60, 1, 1, '{\"status\":\"scheduled\",\"instant\":false,\"accessible_via_link\":false,\"identifier\":\"Jorgkk\"}', '2020-10-09 06:11:02', '2020-10-09 06:11:02'),
(32, '26c6f3af-be28-4b45-8383-687aeb7ce10c', 'webinar', 'Evento Flujo Completo', 'Esto es una prueba del flujo completo para la transmisi&oacute;n', '<p>Esto es una prueba del flujo completo para la transmisi&oacute;n</p>', '2020-10-10 10:00:00', 60, 1, 11, '{\"status\":\"scheduled\",\"instant\":false,\"accessible_via_link\":false,\"identifier\":\"1YS1QS\"}', '2020-10-09 18:40:23', '2020-10-09 13:40:23'),
(33, '5f97a5f5-13c4-481c-bef6-88bc7d0eaf60', 'webinar', 'Evento Prueba Final Flujo Completo', 'Esto es una prueba por favor no tomarlo en cuenta', '<p>Esto es una prueba por favor no tomarlo en cuenta</p>', '2020-10-09 18:00:00', 45, 1, 11, '{\"status\":\"scheduled\",\"instant\":false,\"accessible_via_link\":false,\"identifier\":\"i4xhbO\"}', '2020-10-09 18:51:07', '2020-10-09 13:51:07'),
(34, '8dac610a-00fb-4c27-932d-066b4552fb33', 'webinar', 'Reunión de Sinergia', 'Desarrollo de gesti&oacute;n para el consumo de divisas internacionales', '<p>Desarrollo de gesti&oacute;n para el consumo de divisas internacionales</p>', '2020-10-09 13:00:00', 60, 1, 12, '{\"status\":\"scheduled\",\"instant\":false,\"accessible_via_link\":false,\"identifier\":\"4gRjgL\"}', '2020-10-09 22:54:34', '2020-10-09 17:54:34'),
(35, 'c1124e78-843b-4c39-b919-6d0320b72009', 'webinar', 'Reunión de Sinergia2', 'Prueba de Desarrollo', '<p>Prueba de Desarrollo</p>', '2020-10-09 14:00:00', 60, 1, 13, '{\"status\":\"cancelled\",\"instant\":false,\"accessible_via_link\":false,\"identifier\":\"UZLn83\",\"cancellation_reason\":\"auto\",\"cancelled_at\":\"2020-10-09T19:00:41.689104Z\"}', '2020-10-09 23:48:45', '2020-10-10 00:00:41'),
(36, 'a74bced6-d6e0-41f7-96a6-ad0a90910ef9', 'webinar', NULL, NULL, NULL, '2020-10-09 19:02:38', 60, NULL, 13, '{\"status\":\"live\",\"instant\":true,\"accessible_via_link\":true,\"identifier\":\"fRpHnw\",\"config\":[],\"room_id\":\"ToeKq4FVoZjj3fL9cAU7\",\"started_at\":\"2020-10-09T19:02:38.764918Z\",\"is_attendee\":true,\"logs\":[{\"start\":\"2020-10-09T19:02:39.004400Z\",\"ip\":\"186.28.134.215\"},{\"start\":\"2020-10-09T19:02:41.077905Z\",\"ip\":\"186.28.134.215\"}]}', '2020-10-10 00:02:38', '2020-10-10 00:02:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meeting_invitees`
--

CREATE TABLE `meeting_invitees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_attendee` tinyint(1) NOT NULL DEFAULT 0,
  `meeting_id` bigint(20) UNSIGNED DEFAULT NULL,
  `contact_id` bigint(20) UNSIGNED DEFAULT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `meeting_invitees`
--

INSERT INTO `meeting_invitees` (`id`, `uuid`, `is_attendee`, `meeting_id`, `contact_id`, `meta`, `created_at`, `updated_at`) VALUES
(1, 'cbca1f53-824c-47dd-81ee-2c5b674f27f6', 1, 6, 1, '{\"logs\":[{\"start\":\"2020-09-23T22:10:48.978291Z\",\"ip\":\"191.95.59.200\"}]}', '2020-09-24 03:06:26', '2020-09-24 03:10:48'),
(2, '744f062b-1cce-437e-8401-9a72755eb0f3', 1, 7, 2, '{\"logs\":[{\"start\":\"2020-09-23T22:31:56.419691Z\",\"ip\":\"177.241.60.68\"},{\"error\":{\"name\":\"NotFoundError\",\"title\":\"Some Required Devices Missing!\"},\"ip\":\"177.241.60.68\"},{\"start\":\"2020-09-23T22:32:00.431198Z\",\"ip\":\"177.241.60.68\"},{\"start\":\"2020-09-23T22:32:37.911394Z\",\"ip\":\"177.241.60.68\"},{\"error\":{\"name\":\"NotFoundError\",\"title\":\"Some Required Devices Missing!\"},\"ip\":\"177.241.60.68\"},{\"start\":\"2020-09-23T22:36:22.003530Z\",\"ip\":\"177.241.60.68\"},{\"error\":{\"name\":\"NotAllowedError\",\"title\":\"You Denied Required Permissions!\"},\"ip\":\"177.241.60.68\"},{\"start\":\"2020-09-23T22:38:16.556053Z\",\"ip\":\"177.241.60.68\"},{\"error\":{\"name\":\"NotAllowedError\",\"title\":\"You Denied Required Permissions!\"},\"ip\":\"177.241.60.68\"},{\"start\":\"2020-09-23T22:43:18.986967Z\",\"ip\":\"177.241.60.68\"},{\"start\":\"2020-09-23T23:04:35.177832Z\",\"ip\":\"177.241.60.68\"},{\"start\":\"2020-09-23T23:06:41.222540Z\",\"ip\":\"177.241.60.68\"},{\"start\":\"2020-09-23T23:10:16.981073Z\",\"ip\":\"177.241.60.68\"},{\"start\":\"2020-09-23T23:10:37.812217Z\",\"ip\":\"177.241.60.68\"}]}', '2020-09-24 03:24:06', '2020-09-24 04:10:37'),
(3, 'b2f10cb1-59f6-4d2e-8e16-d5068cae06e2', 1, 7, 4, '{\"logs\":[{\"start\":\"2020-09-23T22:32:49.999828Z\",\"ip\":\"181.197.118.72\"},{\"start\":\"2020-09-23T22:33:52.939164Z\",\"ip\":\"181.197.118.72\"},{\"start\":\"2020-09-23T22:38:44.724224Z\",\"ip\":\"181.197.118.72\"},{\"start\":\"2020-09-23T22:40:27.659899Z\",\"ip\":\"181.197.118.72\"},{\"start\":\"2020-09-23T22:42:46.164810Z\",\"ip\":\"181.179.30.224\"},{\"start\":\"2020-09-23T22:49:31.080569Z\",\"ip\":\"181.197.118.72\"},{\"start\":\"2020-09-23T23:09:02.603335Z\",\"ip\":\"181.197.118.72\"},{\"start\":\"2020-09-23T23:10:41.690010Z\",\"ip\":\"181.197.118.72\"}]}', '2020-09-24 03:24:06', '2020-09-24 04:10:41'),
(4, '6385dae3-f0f8-40e2-ac76-9bf7aae5ae2e', 1, 7, 1, '{\"logs\":[{\"start\":\"2020-09-23T22:36:05.707922Z\",\"ip\":\"191.95.59.200\"},{\"start\":\"2020-09-23T22:36:34.793080Z\",\"ip\":\"191.95.59.200\"},{\"start\":\"2020-09-23T23:09:49.950020Z\",\"ip\":\"191.95.59.200\"}]}', '2020-09-24 03:24:27', '2020-09-24 04:09:49'),
(5, 'c96ce8a8-4401-4eda-8ac6-76437044f907', 1, 8, 1, '{\"logs\":[{\"start\":\"2020-09-23T23:02:24.863280Z\",\"ip\":\"191.95.59.200\"},{\"start\":\"2020-09-23T23:02:44.294360Z\",\"ip\":\"191.95.59.200\"},{\"start\":\"2020-09-23T23:03:52.919064Z\",\"ip\":\"191.95.59.200\"}]}', '2020-09-24 03:54:59', '2020-09-24 04:03:52'),
(7, '6035ad86-1965-42bf-a0d8-0250304e22a8', 0, 8, 3, NULL, '2020-09-24 03:54:59', '2020-09-24 03:54:59'),
(8, '7bae0161-9ac9-465c-b4b7-bdecbb6519c4', 1, 8, 4, '{\"logs\":[{\"start\":\"2020-09-23T23:02:45.062467Z\",\"ip\":\"181.197.118.72\"},{\"start\":\"2020-09-23T23:03:31.265940Z\",\"ip\":\"181.197.118.72\"},{\"start\":\"2020-09-23T23:03:43.856445Z\",\"ip\":\"181.197.118.72\"},{\"start\":\"2020-09-23T23:05:10.526953Z\",\"ip\":\"181.197.118.72\"},{\"start\":\"2020-09-23T23:06:45.030974Z\",\"ip\":\"181.197.118.72\"}]}', '2020-09-24 03:54:59', '2020-09-24 04:06:45'),
(9, '4aee6c82-8a4c-4243-9f9f-014260c50f92', 0, 9, 1, NULL, '2020-09-24 04:18:35', '2020-09-24 04:18:35'),
(10, 'f073b1ff-15e7-493d-a3b1-81b07c0c9af0', 0, 9, 2, NULL, '2020-09-24 04:18:35', '2020-09-24 04:18:35'),
(11, '42a8be34-ab04-44e4-8cbe-836ef3a85e80', 0, 9, 3, NULL, '2020-09-24 04:18:35', '2020-09-24 04:18:35'),
(12, '474c9e45-79f3-4379-9055-e882bccb0ef9', 0, 9, 4, NULL, '2020-09-24 04:18:35', '2020-09-24 04:18:35'),
(13, '19f70d71-89b0-465b-8dde-eab02ed0c97e', 0, 5, 5, NULL, '2020-09-27 20:14:04', '2020-09-27 20:14:04'),
(17, '2e8061df-65be-4627-9690-c0c84bae86e2', 0, 2, 6, NULL, '2020-09-27 20:41:42', '2020-09-27 20:41:42'),
(16, '23d0d06a-ddf8-495e-bf1a-6adecb4d3b16', 0, 1, 6, NULL, '2020-09-27 20:18:44', '2020-09-27 20:18:44'),
(18, 'f4df66ae-1e10-4342-bf60-1bc2b4c68d77', 0, 6, 6, NULL, '2020-09-27 23:53:20', '2020-09-27 23:53:20'),
(19, '0cd8efac-d4e7-4be5-a61f-c3c12d8c9e6d', 0, 14, 6, NULL, '2020-09-28 01:34:07', '2020-09-28 01:34:07'),
(20, '9e5169f4-2e55-41ff-b090-8473ea3fffcf', 0, 25, 1, NULL, '2020-10-07 04:29:41', '2020-10-07 04:29:41'),
(22, '69eb5042-eb74-44cd-be27-5b1f024fd38c', 0, 25, 3, NULL, '2020-10-07 04:31:34', '2020-10-07 04:31:34'),
(23, 'd33934dd-152f-406b-842c-61e8c821a9ce', 1, 25, 4, '{\"logs\":[{\"start\":\"2020-10-06T23:39:36.972993Z\",\"ip\":\"200.75.235.102\"},{\"start\":\"2020-10-06T23:41:05.624915Z\",\"ip\":\"200.75.235.102\"}]}', '2020-10-07 04:31:34', '2020-10-07 04:41:05'),
(24, 'c1eb826a-13cc-48f8-b55b-deac04d1e445', 1, 25, 7, '{\"logs\":[{\"start\":\"2020-10-06T23:37:34.565751Z\",\"ip\":\"186.28.134.215\"},{\"start\":\"2020-10-06T23:39:58.417749Z\",\"ip\":\"186.28.134.215\"}]}', '2020-10-07 04:31:34', '2020-10-07 04:39:58'),
(25, '0151d2e8-9239-4674-b1a0-63f22c8ffba5', 1, 26, 2, '{\"logs\":[{\"start\":\"2020-10-07T00:04:38.904658Z\",\"ip\":\"177.241.61.20\"},{\"start\":\"2020-10-07T00:05:10.610997Z\",\"ip\":\"177.241.61.20\"},{\"start\":\"2020-10-07T00:05:38.815459Z\",\"ip\":\"177.241.61.20\"},{\"start\":\"2020-10-07T00:06:00.780123Z\",\"ip\":\"177.241.61.20\"}]}', '2020-10-07 05:04:37', '2020-10-07 05:06:00'),
(26, '12877ccf-0700-4dec-b9d2-0a3ac1e18258', 0, 15, 6, NULL, '2020-10-08 00:35:52', '2020-10-08 00:35:52'),
(28, '1b461854-04d3-447e-ab85-4f4b9f8d7be4', 0, 27, 11, NULL, '2020-10-09 13:32:07', '2020-10-09 13:32:07'),
(29, '1ade5c2a-5a7e-4c94-9f71-bcd68390a658', 0, 25, 11, NULL, '2020-10-09 18:42:29', '2020-10-09 18:42:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2018_08_08_100000_create_telescope_entries_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2020_04_06_140659_create_permission_tables', 1),
(6, '2020_04_06_142503_create_activity_log_table', 1),
(7, '2020_04_06_145125_create_media_table', 1),
(8, '2020_04_07_065852_create_notifications_table', 1),
(9, '2020_04_07_065904_create_jobs_table', 1),
(10, '2020_04_07_070304_create_configs_table', 1),
(11, '2020_04_07_070705_create_tags_table', 1),
(12, '2020_04_07_070911_create_taggables_table', 1),
(13, '2020_04_07_071338_create_options_table', 1),
(14, '2020_04_09_054225_create_password_resets_table', 1),
(15, '2020_04_12_031749_create_todos_table', 1),
(16, '2020_04_25_053441_create_comments_table', 1),
(17, '2020_04_28_090817_create_contacts_table', 1),
(18, '2020_04_28_092928_create_segments_table', 1),
(19, '2020_04_28_092938_create_contact_segment_table', 1),
(20, '2020_04_28_104044_create_meetings_table', 1),
(21, '2020_04_28_104343_create_meeting_invitees_table', 1),
(22, '2020_07_28_063830_create_chat_rooms_table', 1),
(23, '2020_07_28_063835_create_chat_room_members_table', 1),
(24, '2020_07_28_063939_create_chats_table', 1),
(25, '2020_08_25_080957_create_site_subscribers_table', 2),
(26, '2020_08_25_081048_create_site_queries_table', 2),
(27, '2020_09_10_133301_create_site_pages_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 10),
(4, 'App\\Models\\User', 11),
(4, 'App\\Models\\User', 12),
(4, 'App\\Models\\User', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `options`
--

INSERT INTO `options` (`id`, `uuid`, `name`, `slug`, `type`, `description`, `parent_id`, `meta`, `created_at`, `updated_at`) VALUES
(1, '9fe6be92-5aba-457d-98af-fb7b67168598', 'Finanzas para Todos', 'finanzas-para-todos', 'meeting_category', 'Finanzas para Todos', NULL, NULL, '2020-09-25 05:12:55', '2020-09-25 05:12:55'),
(2, '8558f538-7d9a-4f64-83c8-97404793431d', 'Riesgo y Bolsa de Valores', 'riesgo-y-bolsa-de-valores', 'meeting_category', 'Riesgo y Bolsa de Valores', NULL, NULL, '2020-09-25 05:14:07', '2020-09-25 05:14:07'),
(3, '090eb53e-817e-48da-81d5-d861c87f923b', 'Análisis Técnico y Financiero', 'analisis-tecnico-y-financiero', 'meeting_category', 'Análisis Técnico y Financiero', NULL, NULL, '2020-09-25 05:14:34', '2020-09-25 05:14:34'),
(4, 'd47041f3-108d-4f29-9d77-8b40e203f83a', 'Intercambio de Divisas Forex y Análisis Econométrico', 'intercambio-de-divisas-forex-y-analisis-econometrico', 'meeting_category', 'Intercambio de Divisas Forex y Análisis Econométrico', NULL, NULL, '2020-09-25 05:14:56', '2020-09-25 05:14:56'),
(5, '6c96c53c-26fe-4879-9aae-b10e7e9aac66', 'Forex', 'forex', 'meeting_category', 'Frex', NULL, NULL, '2020-09-25 05:15:23', '2020-09-25 05:15:23'),
(6, 'd650a03f-10ec-4e28-bf6c-9d3c1d228c00', 'Análisis Avanzado y Gestión de Riesgos', 'analisis-avanzado-y-gestion-de-riesgos', 'meeting_category', 'Análisis Avanzado y Gestión de Riesgos', NULL, NULL, '2020-09-25 05:15:40', '2020-09-25 05:15:40'),
(12, '6d815cf6-6c00-42d2-a677-ba98f980b940', 'Crypto Trading', 'crypto-trading', 'meeting_category', 'Crypto Trading', NULL, NULL, '2020-10-08 00:24:08', '2020-10-08 00:24:08'),
(8, '095f04fe-59a4-4d99-95fe-b74a325f19c0', 'Inteligencia Artificial', 'inteligencia-artificial', 'meeting_category', 'Inteligencia Artificial', NULL, NULL, '2020-09-25 05:16:20', '2020-09-25 05:16:20'),
(9, '4fc79fa4-a031-4410-bd22-c28bb9ef3005', 'Cripto Finanzas', 'cripto-finanzas', 'meeting_category', 'Cripto Finanzas', NULL, NULL, '2020-09-25 05:16:46', '2020-10-08 00:23:52'),
(11, '438d2eec-101b-4fdf-b3c4-d7501bdd922b', 'Opi y Valuación', 'opi-y-valuacion', 'meeting_category', 'Opi y Valuación', NULL, NULL, '2020-10-07 20:12:51', '2020-10-07 20:12:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `uuid`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, '5fe87be3-fbe3-4517-895e-fe378173cb02', 'access-config', 'web', '2020-09-22 21:09:28', '2020-09-22 21:09:28'),
(2, '9f92311f-52a0-41d1-89f7-dcdedcf5ce59', 'access-ui-config', 'web', '2020-09-22 21:09:28', '2020-09-22 21:09:28'),
(3, '090abdcb-dbbf-477e-aef6-a933ec5cc94d', 'enable-login', 'web', '2020-09-22 21:09:28', '2020-09-22 21:09:28'),
(4, '70a1f754-d299-4085-86e8-72f1d2aeab0d', 'access-todo', 'web', '2020-09-22 21:09:28', '2020-09-22 21:09:28'),
(5, '611bf7f7-e59d-4f11-93c1-333622b8776f', 'list-user', 'web', '2020-09-22 21:09:28', '2020-09-22 21:09:28'),
(6, '2b8d163b-ce27-40a6-aff7-6b2537969f0a', 'create-user', 'web', '2020-09-22 21:09:28', '2020-09-22 21:09:28'),
(7, '88237f27-87c5-4b95-b2af-eeaaa8e77b0c', 'edit-user', 'web', '2020-09-22 21:09:28', '2020-09-22 21:09:28'),
(8, '2c5c00fe-c61e-4986-8944-0889f65192bd', 'delete-user', 'web', '2020-09-22 21:09:28', '2020-09-22 21:09:28'),
(9, '6424c218-3c47-49d8-a147-82e655ff8c77', 'access-contact', 'web', '2020-09-22 21:09:28', '2020-09-22 21:09:28'),
(10, '61b0299d-dfe3-44c3-8d0d-37543e76b94b', 'list-meeting', 'web', '2020-09-22 21:09:28', '2020-09-22 21:09:28'),
(11, '09d90735-88a8-47b4-aa54-9077dc6fcfad', 'create-meeting', 'web', '2020-09-22 21:09:28', '2020-09-22 21:09:28'),
(12, 'ec52f082-f43c-4006-8ef1-582830d56f47', 'edit-meeting', 'web', '2020-09-22 21:09:28', '2020-09-22 21:09:28'),
(13, 'a5c43a38-a934-4ec2-bf0d-5243f7757c9a', 'delete-meeting', 'web', '2020-09-22 21:09:28', '2020-09-22 21:09:28'),
(14, '42ca36d4-48d7-40fe-a4bc-dadcafe6b1f5', 'access-meeting-config', 'web', '2020-09-22 21:09:28', '2020-09-22 21:09:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'luisana', '8cb762d19d1a2e0d5660925e41871361c6e2f846cc5fd85c41d190e46550c7e7', '[\"*\"]', NULL, '2020-09-24 06:12:30', '2020-09-24 06:12:30'),
(2, 'App\\Models\\User', 1, 'luisana', '7d78cfea06a68b13c96e0c1c2fc73515fa64f44d10cd5e84888739bc0f7b2942', '[\"*\"]', '2020-09-24 07:14:56', '2020-09-24 07:14:56', '2020-09-24 07:14:56'),
(3, 'App\\Models\\User', 1, 'luisana', '8ccbadaadbfb99438fa52c468929526f554514ac5e112be9d565940e7b23c7a5', '[\"*\"]', '2020-09-24 07:15:56', '2020-09-24 07:15:56', '2020-09-24 07:15:56'),
(4, 'App\\Models\\User', 1, 'luisana', '288637fa3e144ad47e18f2f235d6328458152d2b00247620592de0aa8abc1259', '[\"*\"]', '2020-09-24 07:16:17', '2020-09-24 07:16:17', '2020-09-24 07:16:17'),
(5, 'App\\Models\\User', 1, 'luisana', 'cd20e80630299d4ec3f461ff908923e17bd32d7dd6ac29ec4df277013482afe3', '[\"*\"]', '2020-09-24 07:17:26', '2020-09-24 07:17:26', '2020-09-24 07:17:26'),
(6, 'App\\Models\\User', 1, 'luisana', '5817fd21112182e318fce731039a998b584af73499064bbd003f23b2d56f347e', '[\"*\"]', '2020-09-24 07:17:43', '2020-09-24 07:17:43', '2020-09-24 07:17:43'),
(7, 'App\\Models\\User', 1, 'luisana', '254624d235a0a95979aed8f3418b869610a46cea11dbee718f9fb5f2277ec8d0', '[\"*\"]', '2020-09-24 07:18:21', '2020-09-24 07:18:21', '2020-09-24 07:18:21'),
(8, 'App\\Models\\User', 1, 'luisana', 'd28e8005c3139ab9106c68bf3b5bc8444de4591a85e2aaecd0dc1fe18519b3a4', '[\"*\"]', '2020-09-24 07:19:14', '2020-09-24 07:19:14', '2020-09-24 07:19:14'),
(9, 'App\\Models\\User', 1, 'luisana', '008c18e6a298a04763c5e3643eaee9cbdc1a2699b03352c316dc354b067d9dd8', '[\"*\"]', '2020-09-24 07:19:42', '2020-09-24 07:19:42', '2020-09-24 07:19:42'),
(10, 'App\\Models\\User', 1, 'luisana', 'aba4f68b0438c60ed550b57a39fc27250b1e91af506c6ed313290816af66aca2', '[\"*\"]', '2020-09-24 07:19:59', '2020-09-24 07:19:59', '2020-09-24 07:19:59'),
(11, 'App\\Models\\User', 1, 'luisana', 'ad7db0f3c9d006aeb01f69fd059eeb727872b23cd2d58b457d2528f9a3ab75b4', '[\"*\"]', '2020-09-24 07:21:35', '2020-09-24 07:21:34', '2020-09-24 07:21:35'),
(12, 'App\\Models\\User', 1, 'luisana', '248a7ad349def19fcc4483f0352eb04d8b56f9b6f8fa3eb5b2051d919f4a88e4', '[\"*\"]', '2020-09-24 07:22:46', '2020-09-24 07:22:46', '2020-09-24 07:22:46'),
(13, 'App\\Models\\User', 1, 'luisana', '927b27567a6afef5fad09cf83f1086212d04d88cdbe50a344150632d81e249e0', '[\"*\"]', '2020-09-24 07:59:56', '2020-09-24 07:59:56', '2020-09-24 07:59:56'),
(14, 'App\\Models\\User', 1, 'luisana', '14b5182ca29780f1aba13be86b9009ac4d8bde3bec251b73097fb8cd4337a273', '[\"*\"]', '2020-09-24 08:01:05', '2020-09-24 08:01:05', '2020-09-24 08:01:05'),
(15, 'App\\Models\\User', 1, 'luisana', '3eb2769a439dd421405416604105e75043b1f561066b322f6cdaa12aa18923c7', '[\"*\"]', NULL, '2020-09-24 08:10:54', '2020-09-24 08:10:54'),
(16, 'App\\Models\\User', 1, 'luisana', 'deb739f561562ef3e488dbfd21408e3cc606e76e1d862a0f6d77596677a5b946', '[\"*\"]', NULL, '2020-09-24 08:12:19', '2020-09-24 08:12:19'),
(17, 'App\\Models\\User', 1, 'luisana', '84e9b0df539e7f4ad8b599a52844beec10da155ced5e52ff30cf634d58382c4f', '[\"*\"]', '2020-10-10 00:11:19', '2020-09-24 08:12:35', '2020-10-10 00:11:19'),
(18, 'App\\Models\\User', 1, 'luisana', 'f96d937c9359a0cd33279bf0cf129e77d8ef41ba519ffc8a84cf38de1e95d34c', '[\"*\"]', NULL, '2020-09-24 08:28:51', '2020-09-24 08:28:51'),
(19, 'App\\Models\\User', 1, 'luisana', '1f9bb5fe25b0704a5fdbda09da826443916308a57a8c16a6ea991d0d626c0893', '[\"*\"]', NULL, '2020-09-24 08:29:34', '2020-09-24 08:29:34'),
(20, 'App\\Models\\User', 1, 'luisana', 'a2a78f47c2f4ccc6cb5398a9f796115cd7e830d9712dcf2386902c8642f6911b', '[\"*\"]', NULL, '2020-09-24 08:29:57', '2020-09-24 08:29:57'),
(21, 'App\\Models\\User', 1, 'luisana', '10fff41a3d74e420fbce9a02cd4f4b1d8107393834cec97809d03b88bbce056d', '[\"*\"]', '2020-09-24 08:37:46', '2020-09-24 08:31:28', '2020-09-24 08:37:46'),
(22, 'App\\Models\\User', 1, 'luisana', '437ec6c08d0246c5d63f7a46eaba26d9bab02c9ec33fbff9c435aa815f6b5688', '[\"*\"]', '2020-09-24 08:55:34', '2020-09-24 08:53:33', '2020-09-24 08:55:34'),
(23, 'App\\Models\\User', 1, 'luisana', 'a8ce1c3e842b177413e9dac19d60c78b3aeae4e6353d74b9402d7aa52829a12d', '[\"*\"]', '2020-09-24 22:59:51', '2020-09-24 08:57:33', '2020-09-24 22:59:51'),
(24, 'App\\Models\\User', 1, 'luisana', '9584abb2da37e25ea75490027f7494721301f704cc680ebeec4f12f7a8a7ac5a', '[\"*\"]', '2020-09-24 22:51:14', '2020-09-24 22:50:03', '2020-09-24 22:51:14'),
(25, 'App\\Models\\User', 5, '9', 'a2cb49daaadf70c11ef49c5d945e0f360c4d3cdc6f683b4a4e3f8ccbe65f36cf', '[\"*\"]', NULL, '2020-09-27 20:03:13', '2020-09-27 20:03:13'),
(26, 'App\\Models\\User', 5, 'luisana', '09f92f66ad22bc03f2c5df203b690c195116538aa5d5ac4d9ef5099d3f405a57', '[\"*\"]', '2020-09-27 20:47:33', '2020-09-27 20:30:20', '2020-09-27 20:47:33'),
(27, 'App\\Models\\User', 5, 'luisana', 'c88d88a8202e7f9406d71956a0127f904a64366b8a86c95abe6d86ce2678b9b3', '[\"*\"]', NULL, '2020-09-27 20:33:29', '2020-09-27 20:33:29'),
(28, 'App\\Models\\User', 5, 'luisana', 'a243319651be7042e837fca927a5d755fa620afc1e92c5c20b8ad992889d0d6b', '[\"*\"]', '2020-09-27 20:39:27', '2020-09-27 20:33:58', '2020-09-27 20:39:27'),
(29, 'App\\Models\\User', 1, 'luisana', '7b60940bfceca818e69e3175e4261283ea57842dff598617cd1709dedc32e604', '[\"*\"]', NULL, '2020-09-29 19:14:04', '2020-09-29 19:14:04'),
(30, 'App\\Models\\User', 1, 'admin', '0c301d9c7e25e2bae84abd459c48e07ea4f4e6f3554224a3ccf451f895f41e10', '[\"*\"]', '2020-10-08 00:51:15', '2020-10-07 20:47:01', '2020-10-08 00:51:15'),
(31, 'App\\Models\\User', 1, 'admin', '2f1f8839bee7032bfbdf90c7e7e792e02caa18f89f2a29fa6dfb8a062220f538', '[\"*\"]', NULL, '2020-10-08 00:27:43', '2020-10-08 00:27:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `uuid`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, '8d3ecb78-2854-40b1-8616-bd55ab1cc8b7', 'admin', 'web', '2020-09-22 21:09:28', '2020-09-22 21:09:28'),
(2, '69a9c543-437b-4a86-a99d-f6c39bf482f2', 'user', 'web', '2020-09-22 21:09:28', '2020-09-22 21:09:28'),
(3, '58e92b05-7a91-4d00-a6f5-121401690576', 'client', 'web', '2020-09-27 19:59:08', '2020-09-27 19:59:08'),
(4, 'fcd5090e-0ad5-499a-a8ea-4264a6e8d128', 'mentor', 'web', '2020-10-08 07:35:52', '2020-10-08 07:35:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(11, 1),
(11, 4),
(12, 1),
(12, 4),
(13, 1),
(13, 4),
(14, 1),
(14, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `segments`
--

CREATE TABLE `segments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `segments`
--

INSERT INTO `segments` (`id`, `uuid`, `name`, `description`, `meta`, `created_at`, `updated_at`) VALUES
(1, '24bd6171-8181-41c1-8793-bdd98491350e', 'Capacitación', 'Capacitación General', NULL, '2020-09-24 03:02:50', '2020-09-24 03:02:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `site_pages`
--

CREATE TABLE `site_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `template_id` bigint(20) UNSIGNED DEFAULT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `site_queries`
--

CREATE TABLE `site_queries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `site_subscribers`
--

CREATE TABLE `site_subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unsubscribed_at` datetime DEFAULT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taggables`
--

CREATE TABLE `taggables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED DEFAULT NULL,
  `taggable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taggable_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telescope_entries`
--

CREATE TABLE `telescope_entries` (
  `sequence` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_hash` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `should_display_on_index` tinyint(1) NOT NULL DEFAULT 1,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telescope_entries_tags`
--

CREATE TABLE `telescope_entries_tags` (
  `entry_uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telescope_monitoring`
--

CREATE TABLE `telescope_monitoring` (
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `todos`
--

CREATE TABLE `todos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `due_date` date DEFAULT NULL,
  `due_time` time DEFAULT NULL,
  `completed_at` datetime DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preference` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `uuid`, `name`, `email`, `username`, `birth_date`, `gender`, `avatar`, `email_verified_at`, `password`, `status`, `preference`, `remember_token`, `meta`, `created_at`, `updated_at`) VALUES
(1, '7fde7624-b342-4354-b0d5-8feac400fabe', 'admin', 'admin@streaming.shapinetwork.com', 'admin', NULL, NULL, NULL, '2020-09-22 21:09:28', '$2y$10$13p.0zWCx7nxq51b7V68fO4y3zcN5WxuyYvRKdr61dmBp2zAtNXGm', 'activated', NULL, NULL, NULL, '2020-09-22 21:09:28', '2020-10-09 18:26:27'),
(2, '1fd90de7-ac93-43e5-b71d-3e95f9b143da', 'Lester', 'lestermorales@sinergiared.com', 'lestermorales', '1981-10-09', 'male', NULL, NULL, '$2y$10$SZx8M8jx2ygE7eu4jRY4v.QDSirC/by9fbvvYmTY8/aYKRvfAmliq', 'activated', NULL, NULL, NULL, '2020-09-24 03:06:07', '2020-09-24 03:06:07'),
(3, '1217513a-c296-4197-ac31-b878e58b908e', 'Noemy Aleman', 'noemy.producer@gmail.com', 'noemyproducer', '1990-09-15', 'female', NULL, NULL, '$2y$10$hJA6Jq6UeqzYNexqEPlLh.H37kmhNoT7f0NFF1nLLsLZqTqZnc64C', 'activated', NULL, NULL, NULL, '2020-09-24 03:17:59', '2020-10-07 04:25:24'),
(4, '0a5ca87d-8977-4aa3-b821-351c524ba6e7', 'Douglas Carrillo', 'douglascarrillo.ga@gmail.com', 'douglas', '1993-09-08', 'male', NULL, NULL, '$2y$10$0l.LEzpp7flyVpfEquXZiOmscsoQuFKH2G5VNYVfM8aB8SzDe2X1a', 'activated', NULL, NULL, NULL, '2020-09-24 03:19:56', '2020-10-07 04:25:38'),
(5, 'b0f72c45-99be-450a-aa74-1e7626b58076', 'Cliente De Prueba', 'lic.freddymillan@gmail.com', 'cliente', '2020-09-26', 'female', NULL, '2020-09-27 16:20:33', '$2y$10$/slMdWtiwENjP.2X2w484.NiNK17if97oqTn5PGVWbw9d9OVF1r92', 'activated', NULL, NULL, NULL, '2020-09-27 20:00:26', '2020-09-27 20:18:17'),
(6, '0b7e34a0-b49a-4e6a-a3e7-b63a46aa07d8', 'Ramon Picon', 'soporte@sinergiared.com', 'soporte', '1998-10-01', 'male', NULL, NULL, '$2y$10$QbmtCenEhBJmmmUZOAEGzed2T.CGYetkhSEiVpbYZV7vcaVGZvFLa', 'activated', NULL, NULL, NULL, '2020-10-07 04:17:28', '2020-10-07 04:24:14'),
(7, 'aa0f2a5e-1d42-4d03-b19d-4fc106a5eda4', 'Prueba', 'prueba@gmail.com', 'prueba', '2020-10-07', 'male', NULL, NULL, '$2y$10$YRnBMsW5uzFV2T1Ezwx.qO4qietTvrVCPKdTSUwJgA.JnAJcatCkG', 'activated', NULL, NULL, '{\"activation_token\":\"9e6ad10b-8441-47d9-ab54-3df27d7b9fa9\"}', '2020-10-07 20:49:02', '2020-10-08 07:33:42'),
(10, '25e9ddef-3c18-4ef5-969d-a6491f54c7d5', 'lvmb29', 'luisanaelenamarin@gmail.com', 'luisanaelenamarin@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$Md4bmEOnwAPyt/650S609.5yPsmrXM1SAEYBMgPd4kWez9yc2pNHa', 'activated', NULL, NULL, NULL, '2020-10-09 13:32:07', '2020-10-09 13:32:07'),
(11, 'da07d690-3d1d-4ec3-8c2d-b55e2ecdff5a', 'Luisanaelena Marín', 'lvmb29@gmail.com', 'lvmb29@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$qwXcfIFil9M4wSLO7I6EFOy1FirBhdSlb/srkBxmZ7ebegPgrZ7wm', 'activated', NULL, NULL, NULL, '2020-10-09 13:39:58', '2020-10-09 13:39:58'),
(12, 'c3170bf1-e0b9-483c-9436-760a5ddcf6a8', 'Lester Morales', 'conferencias@lestermorales.com', 'conferencias@lestermorales.com', NULL, NULL, NULL, NULL, '$2y$10$RP7DbWF3xOkkaWf5D68Q6OYIhz5v1V8XkkNkDnk8kuftj/LXHyCce', 'activated', NULL, NULL, NULL, '2020-10-09 17:54:34', '2020-10-09 17:54:34'),
(13, '12f30f3f-14ef-434e-ad3e-0e30c14ae4c0', 'Ramón Alberto Picon Guerra', 'ramalejtq@gmail.com', 'ramalejtq@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$jH3oKeRqFE92GyZukqD7G.yb5QCTz1kqXUE.d5GznZEQwH4szEA/q', 'activated', NULL, NULL, NULL, '2020-10-09 18:48:45', '2020-10-09 18:48:45');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_log_log_name_index` (`log_name`),
  ADD KEY `subject` (`subject_id`,`subject_type`),
  ADD KEY `causer` (`causer_id`,`causer_type`);

--
-- Indices de la tabla `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chats_chat_room_id_foreign` (`chat_room_id`),
  ADD KEY `chats_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `chat_rooms`
--
ALTER TABLE `chat_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `chat_room_members`
--
ALTER TABLE `chat_room_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_room_members_chat_room_id_foreign` (`chat_room_id`),
  ADD KEY `chat_room_members_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_commentable_type_commentable_id_index` (`commentable_type`,`commentable_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `contact_segment`
--
ALTER TABLE `contact_segment`
  ADD KEY `contact_segment_contact_id_foreign` (`contact_id`),
  ADD KEY `contact_segment_segment_id_foreign` (`segment_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indices de la tabla `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meetings_category_id_foreign` (`category_id`),
  ADD KEY `meetings_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `meeting_invitees`
--
ALTER TABLE `meeting_invitees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meeting_invitees_meeting_id_foreign` (`meeting_id`),
  ADD KEY `meeting_invitees_contact_id_foreign` (`contact_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indices de la tabla `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `options_parent_id_foreign` (`parent_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `segments`
--
ALTER TABLE `segments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `site_pages`
--
ALTER TABLE `site_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `site_pages_parent_id_foreign` (`parent_id`),
  ADD KEY `site_pages_template_id_foreign` (`template_id`);

--
-- Indices de la tabla `site_queries`
--
ALTER TABLE `site_queries`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `site_subscribers`
--
ALTER TABLE `site_subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `taggables`
--
ALTER TABLE `taggables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `taggables_tag_id_foreign` (`tag_id`),
  ADD KEY `taggables_taggable_type_taggable_id_index` (`taggable_type`,`taggable_id`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `telescope_entries`
--
ALTER TABLE `telescope_entries`
  ADD PRIMARY KEY (`sequence`),
  ADD UNIQUE KEY `telescope_entries_uuid_unique` (`uuid`),
  ADD KEY `telescope_entries_batch_id_index` (`batch_id`),
  ADD KEY `telescope_entries_type_should_display_on_index_index` (`type`,`should_display_on_index`),
  ADD KEY `telescope_entries_family_hash_index` (`family_hash`);

--
-- Indices de la tabla `telescope_entries_tags`
--
ALTER TABLE `telescope_entries_tags`
  ADD KEY `telescope_entries_tags_entry_uuid_tag_index` (`entry_uuid`,`tag`),
  ADD KEY `telescope_entries_tags_tag_index` (`tag`);

--
-- Indices de la tabla `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `todos_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=354;

--
-- AUTO_INCREMENT de la tabla `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `chat_rooms`
--
ALTER TABLE `chat_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `chat_room_members`
--
ALTER TABLE `chat_room_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `configs`
--
ALTER TABLE `configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `meeting_invitees`
--
ALTER TABLE `meeting_invitees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `segments`
--
ALTER TABLE `segments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `site_pages`
--
ALTER TABLE `site_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `site_queries`
--
ALTER TABLE `site_queries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `site_subscribers`
--
ALTER TABLE `site_subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `taggables`
--
ALTER TABLE `taggables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `telescope_entries`
--
ALTER TABLE `telescope_entries`
  MODIFY `sequence` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `todos`
--
ALTER TABLE `todos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
