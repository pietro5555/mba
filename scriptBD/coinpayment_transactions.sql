-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 23-09-2020 a las 16:13:47
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.3.21

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
-- Estructura de tabla para la tabla `coinpayment_transactions`
--

CREATE TABLE `coinpayment_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `txn_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amountf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirms_needed` int(11) DEFAULT NULL,
  `payment_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qrcode_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receivedf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recv_confirms` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timeout` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `coinpayment_transactions`
--

INSERT INTO `coinpayment_transactions` (`id`, `txn_id`, `address`, `amount`, `amountf`, `coin`, `confirms_needed`, `payment_address`, `qrcode_url`, `received`, `receivedf`, `recv_confirms`, `status`, `status_text`, `status_url`, `timeout`, `type`, `payload`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'CPEI3PNH3L68CJLBZIXVEKZKHZ', '3J51UKeB2uMyQGHQZfTLJTWV11vfLRobAD', '446000', '0.00446000', 'BTC', 2, '3J51UKeB2uMyQGHQZfTLJTWV11vfLRobAD', 'https://www.coinpayments.net/qrgen.php?id=CPEI3PNH3L68CJLBZIXVEKZKHZ&key=68e6ea5931ceb85a97de8b563cf2bf8f', '0', '0.00000000', '0', '0', 'Waiting for buyer funds...', 'https://www.coinpayments.net/index.php?cmd=status&id=CPEI3PNH3L68CJLBZIXVEKZKHZ&key=68e6ea5931ceb85a97de8b563cf2bf8f', '55800', 'coins', NULL, NULL, '2020-09-22 21:17:25', '2020-09-22 21:17:25'),
(2, 'CPEI3WHWUWMMUJ66D4AIXXPFUQ', '3DztMmuT7XBFRLAryS3gJ4WwzAwiEffuqz', '446000', '0.00446000', 'BTC', 2, '3DztMmuT7XBFRLAryS3gJ4WwzAwiEffuqz', 'https://www.coinpayments.net/qrgen.php?id=CPEI3WHWUWMMUJ66D4AIXXPFUQ&key=45f7a879f0cfa1202f65a17dbcc28854', '0', '0.00000000', '0', '0', 'Waiting for buyer funds...', 'https://www.coinpayments.net/index.php?cmd=status&id=CPEI3WHWUWMMUJ66D4AIXXPFUQ&key=45f7a879f0cfa1202f65a17dbcc28854', '55800', 'coins', NULL, NULL, '2020-09-22 21:19:58', '2020-09-22 21:19:58'),
(3, 'CPEI28KALU46QYQBZMHKS6SSDV', '3KZ7ZzEzkKAuzaYxRBPE9cUf4xEJLFN2pf', '446000', '0.00446000', 'BTC', 2, '3KZ7ZzEzkKAuzaYxRBPE9cUf4xEJLFN2pf', 'https://www.coinpayments.net/qrgen.php?id=CPEI28KALU46QYQBZMHKS6SSDV&key=3f494355bad84520637530995eaaefa3', '0', '0.00000000', '0', '0', 'Waiting for buyer funds...', 'https://www.coinpayments.net/index.php?cmd=status&id=CPEI28KALU46QYQBZMHKS6SSDV&key=3f494355bad84520637530995eaaefa3', '55800', 'coins', NULL, NULL, '2020-09-22 21:21:41', '2020-09-22 21:21:41'),
(4, 'CPEI5VDCY5T8HEU0J8BXMJBC6O', '3CwvbPyyuD3xwPmQtT73NZTMT9MWkCn6R2', '446000', '0.00446000', 'BTC', 2, '3CwvbPyyuD3xwPmQtT73NZTMT9MWkCn6R2', 'https://www.coinpayments.net/qrgen.php?id=CPEI5VDCY5T8HEU0J8BXMJBC6O&key=ef1340b4f84050188803bb964323bbbc', '0', '0.00000000', '0', '0', 'Waiting for buyer funds...', 'https://www.coinpayments.net/index.php?cmd=status&id=CPEI5VDCY5T8HEU0J8BXMJBC6O&key=ef1340b4f84050188803bb964323bbbc', '55800', 'coins', NULL, NULL, '2020-09-22 21:25:18', '2020-09-22 21:25:18');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `coinpayment_transactions`
--
ALTER TABLE `coinpayment_transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coinpayment_transactions_txn_id_unique` (`txn_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `coinpayment_transactions`
--
ALTER TABLE `coinpayment_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
