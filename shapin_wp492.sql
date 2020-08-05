-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 04-08-2020 a las 19:53:26
-- Versión del servidor: 10.1.45-MariaDB
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
-- Estructura de tabla para la tabla `administradorgastos`
--

CREATE TABLE `administradorgastos` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `descripcion` longtext NOT NULL,
  `tipo` tinyint(2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradorlista`
--

CREATE TABLE `administradorlista` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `tipo` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

CREATE TABLE `anuncios` (
  `id` int(11) NOT NULL,
  `titulo` longtext,
  `contenido` longtext,
  `color` varchar(250) DEFAULT NULL,
  `inicio` date DEFAULT NULL,
  `vencimiento` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` text COLLATE utf8mb4_unicode_ci,
  `contenido` longtext COLLATE utf8mb4_unicode_ci,
  `archivo` longtext COLLATE utf8mb4_unicode_ci,
  `imagen_muestra` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avatares`
--

CREATE TABLE `avatares` (
  `id` int(11) NOT NULL,
  `avatar` longtext,
  `activo_mujer` varchar(300) DEFAULT NULL,
  `activo_hombre` varchar(300) DEFAULT NULL,
  `inactivo_mujer` varchar(300) DEFAULT NULL,
  `inactivo_hombre` varchar(300) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `avatares`
--

INSERT INTO `avatares` (`id`, `avatar`, `activo_mujer`, `activo_hombre`, `inactivo_mujer`, `inactivo_hombre`, `created_at`, `updated_at`) VALUES
(1, '[{\"avatar\":\"avatar_1576185092.png\"},{\"avatar\":\"avatar_1576189159.png\"},{\"avatar\":\"avatar_1576189177.png\"},{\"avatar\":\"avatar_1576189187.png\"},{\"avatar\":\"avatar_1576189196.png\"},{\"avatar\":\"avatar_1576189203.png\"},{\"avatar\":\"avatar_1576189213.png\"},{\"avatar\":\"avatar_15762497471.png\"},{\"avatar\":\"avatar_15762497472.png\"},{\"avatar\":\"avatar_15762497473.png\"},{\"avatar\":\"avatar_15762497474.png\"},{\"avatar\":\"avatar_15763101171.png\"}]', 'avatar_1576189196.png', 'avatar_1576189187.png', 'avatar_1576189213.png', 'avatar_1576189203.png', '2019-12-14 07:55:17', '2019-12-14 12:55:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `binario`
--

CREATE TABLE `binario` (
  `id` int(11) NOT NULL,
  `binario` double DEFAULT NULL,
  `pata` varchar(250) DEFAULT NULL,
  `autobinario` int(2) DEFAULT NULL COMMENT '1 - automitico 0 - semiautomatico',
  `inicio` varchar(250) DEFAULT NULL,
  `tipo` varchar(250) DEFAULT NULL,
  `auto` varchar(250) DEFAULT NULL COMMENT 'automatico - se paga de una ves - semi - se guarda en la base de datos y el admin decide si la acepta',
  `puntos_inicio` varchar(250) DEFAULT NULL,
  `patrocinador` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bonoinicio`
--

CREATE TABLE `bonoinicio` (
  `id` int(11) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `iduser` int(250) NOT NULL,
  `idcomision` int(250) NOT NULL,
  `total` varchar(250) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `status` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendarios`
--

CREATE TABLE `calendarios` (
  `id` int(11) NOT NULL,
  `iduser` int(250) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `contenido` longtext NOT NULL,
  `color` varchar(250) NOT NULL,
  `inicio` datetime NOT NULL,
  `vence` datetime NOT NULL,
  `lugar` varchar(250) NOT NULL,
  `tipo` varchar(250) DEFAULT NULL,
  `especifico` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canjes`
--

CREATE TABLE `canjes` (
  `id` int(11) NOT NULL,
  `iduser` int(250) NOT NULL,
  `cantidad` double NOT NULL,
  `total` double DEFAULT NULL COMMENT 'total en pesos',
  `tipo` int(2) NOT NULL COMMENT '0 - puntos propios 1 - puntos grupales ',
  `status` int(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capital`
--

CREATE TABLE `capital` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `departa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `costo` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritos`
--

CREATE TABLE `carritos` (
  `id` int(11) NOT NULL,
  `iduser` int(250) NOT NULL,
  `producto` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` double NOT NULL,
  `idproducto` int(250) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` double NOT NULL,
  `iva` double DEFAULT NULL,
  `ip` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referido` int(250) DEFAULT NULL,
  `info` double DEFAULT NULL,
  `porcentaje` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `carritos`
--

INSERT INTO `carritos` (`id`, `iduser`, `producto`, `precio`, `idproducto`, `cantidad`, `total`, `iva`, `ip`, `referido`, `info`, `porcentaje`, `created_at`, `updated_at`) VALUES
(3, 0, 'Mensualidad', 280, 29, 1, 210, 0, '186.91.112.240', 7, 0, '0', '2020-08-04 13:48:14', '2020-08-04 13:48:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `contenido` longtext,
  `origen` int(250) DEFAULT NULL,
  `destino` int(250) DEFAULT NULL,
  `codigo` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat_codigo`
--

CREATE TABLE `chat_codigo` (
  `id` int(11) NOT NULL,
  `usuario_id` int(250) DEFAULT NULL,
  `codigo` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `tickets_id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `comentario` longtext COLLATE utf8mb4_unicode_ci,
  `archivo` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `commissions`
--

CREATE TABLE `commissions` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `compra_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `total` double NOT NULL,
  `referred_email` varchar(100) NOT NULL,
  `referred_level` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `edo_liquidacion` tinyint(1) NOT NULL DEFAULT '0',
  `concepto` varchar(100) NOT NULL,
  `tipo_comision` varchar(200) NOT NULL,
  `eliminada` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 - activa, 1 - eliminada',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `commissions`
--

INSERT INTO `commissions` (`id`, `user_id`, `compra_id`, `date`, `total`, `referred_email`, `referred_level`, `status`, `edo_liquidacion`, `concepto`, `tipo_comision`, `eliminada`, `created_at`, `updated_at`) VALUES
(1, 1, 15, '2020-03-26', 170, 'cliente2@sinergiared.com', 0, 1, 0, 'Bono Activacion Usuario: Alberto Picon', 'bono', 0, '2020-03-26 17:14:01', '2020-03-26 17:14:01'),
(2, 1, 30, '2020-03-26', 0, 'cliente2@sinergiared.com', 1, 1, 0, 'Comision del usuario: Alberto Picon de la orden: 30', 'referido', 0, '2020-03-26 17:14:01', '2020-03-26 17:14:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `component`
--

CREATE TABLE `component` (
  `id` int(11) NOT NULL,
  `slider` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componentenoticias`
--

CREATE TABLE `componentenoticias` (
  `id` int(11) NOT NULL,
  `noticias` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componentestransf`
--

CREATE TABLE `componentestransf` (
  `id` int(11) NOT NULL,
  `tipotransferencia` int(2) DEFAULT NULL COMMENT '0 - monto fijo 1 - monto por porcentaje',
  `comisiontransf` double DEFAULT NULL COMMENT 'esta es para el metodo de pago, es la comision por transferencia de dinero en la billetera',
  `valor_conversion` double DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `componentestransf`
--

INSERT INTO `componentestransf` (`id`, `tipotransferencia`, `comisiontransf`, `valor_conversion`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, '2020-03-02 00:13:31', '2020-03-01 23:47:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componentestransferencias`
--

CREATE TABLE `componentestransferencias` (
  `id` int(11) NOT NULL,
  `iduser` int(250) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `descripcion` longtext NOT NULL,
  `debito` float NOT NULL,
  `credito` float NOT NULL,
  `balance` float NOT NULL,
  `descuento` float NOT NULL,
  `tipotransacion` int(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compradirectas`
--

CREATE TABLE `compradirectas` (
  `id` int(11) NOT NULL,
  `iduser` int(250) NOT NULL,
  `idcompra` int(250) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `precio` double DEFAULT NULL,
  `referido_correo` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultacrypto`
--

CREATE TABLE `consultacrypto` (
  `id` int(11) NOT NULL,
  `idcompra` text COLLATE utf8mb4_unicode_ci,
  `idconsulta` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos`
--

CREATE TABLE `contenidos` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` text COLLATE utf8mb4_unicode_ci,
  `contenido` longtext COLLATE utf8mb4_unicode_ci,
  `imagen` longtext COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costo`
--

CREATE TABLE `costo` (
  `id` int(11) NOT NULL,
  `iduser` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `localidad` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `idlocalidad` int(11) DEFAULT NULL,
  `provincia` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `costo` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE `formulario` (
  `id` int(11) NOT NULL,
  `label` varchar(250) NOT NULL,
  `nameinput` varchar(200) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `requerido` tinyint(1) NOT NULL DEFAULT '0',
  `input_edad` tinyint(1) NOT NULL DEFAULT '0',
  `tipo` varchar(200) NOT NULL DEFAULT 'text',
  `min` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL,
  `desactivable` tinyint(1) NOT NULL DEFAULT '1',
  `unico` int(20) DEFAULT NULL,
  `tip` int(2) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `formulario`
--

INSERT INTO `formulario` (`id`, `label`, `nameinput`, `estado`, `requerido`, `input_edad`, `tipo`, `min`, `max`, `desactivable`, `unico`, `tip`, `created_at`, `updated_at`) VALUES
(1, 'Nombre', 'firstname', 1, 1, 0, 'text', 0, 0, 0, 0, 0, '2019-02-18 15:26:42', '2019-02-18 20:19:56'),
(2, 'Apellido', 'lastname', 1, 1, 0, 'text', 0, 0, 0, 0, 0, '2019-02-18 20:12:39', '2019-02-19 01:12:39'),
(3, 'Sexo', 'genero', 1, 0, 0, 'select', 0, 0, 1, 0, 0, '2019-03-01 00:03:55', '2019-03-01 05:03:55'),
(4, 'Fecha de Nacimiento', 'edad', 1, 1, 1, 'date', 0, 0, 1, 0, 0, '2019-02-18 15:48:38', '2019-01-08 06:52:23'),
(5, 'Usuario', 'nameuser', 1, 1, 0, 'text', 0, 0, 0, 1, 0, '2019-02-18 15:48:35', '2019-01-08 04:55:50'),
(12, 'N° de Documento de Identidad', 'document', 1, 1, 0, 'text', 5, 20, 1, 0, 0, '2020-05-02 19:20:33', '2019-01-29 01:57:12'),
(7, 'Direccion', 'direccion', 1, 1, 0, 'text', 0, 0, 1, 0, 0, '2019-02-18 15:48:41', '2019-02-09 02:33:39'),
(13, 'Direccion 2', 'direccion2', 0, 0, 0, 'text', 5, 100, 1, 0, 0, '2019-02-18 15:48:46', '2019-01-30 03:19:23'),
(18, 'Estado', 'estado', 0, 1, 0, 'text', 20, 100, 1, 0, 0, '2019-02-18 15:48:49', '2019-01-30 03:51:28'),
(38, 'Pais', 'pais', 0, 1, 0, 'text', 10, 20, 1, 0, 0, '2019-02-18 15:48:51', '2019-01-30 19:24:23'),
(19, 'Ciudad', 'ciudad', 0, 1, 0, 'text', 20, 100, 1, 0, 0, '2019-02-18 15:48:54', '2019-02-01 18:47:31'),
(20, 'Codigo Postal', 'codigo', 0, 0, 0, 'text', 7, 10, 1, 0, 0, '2019-02-18 15:48:56', '2019-01-30 03:52:34'),
(21, 'Celular', 'phone', 0, 0, 0, 'number', 0, 0, 1, 0, 0, '2019-02-18 15:48:59', '2019-01-30 19:18:56'),
(22, 'Telefono fijo', 'fijo', 0, 0, 0, 'number', 0, 0, 1, 0, 0, '2019-02-18 15:49:01', '2019-01-30 03:54:11'),
(23, 'Facebook', 'facebook', 0, 0, 0, 'url', 30, 100, 1, 0, 0, '2019-02-18 15:49:07', '2019-01-30 03:59:43'),
(24, 'Twitter', 'twitter', 0, 0, 0, 'url', 30, 100, 1, 0, 0, '2019-02-18 15:49:09', '2019-01-30 04:01:10'),
(25, 'Nombre del Banco', 'banco', 0, 0, 0, 'text', 20, 40, 1, 0, 0, '2019-02-18 15:49:11', '2019-01-30 04:01:45'),
(26, 'Nombre de la rama', 'tipocuenta', 0, 0, 0, 'text', 20, 50, 1, 0, 0, '2020-06-30 23:14:27', '2019-01-30 04:03:42'),
(27, 'Titular de la cuenta', 'titular', 0, 0, 0, 'text', 20, 40, 1, 0, 0, '2019-02-18 15:49:16', '2019-01-30 04:04:11'),
(28, 'Numero de cuenta', 'cuenta', 0, 0, 0, 'number', 0, 0, 1, 0, 0, '2019-02-18 15:49:18', '2019-01-30 04:04:38'),
(29, 'Codigo swift', 'swift', 0, 0, 0, 'text', 0, 0, 1, 0, 0, '2019-12-23 00:08:25', '2019-02-01 18:47:25'),
(30, 'Numero PAN', 'pan', 0, 0, 0, 'number', 0, 0, 1, 0, 0, '2019-02-18 15:49:23', '2019-01-30 04:07:15'),
(31, 'Cuenta Paypal', 'paypal', 0, 0, 0, 'text', 10, 20, 1, 0, 0, '2019-02-18 15:49:25', '2019-01-30 04:08:26'),
(32, 'Direccion de Blocktrail', 'blocktrail', 0, 0, 0, 'text', 10, 20, 1, 0, 0, '2019-02-18 15:49:27', '2019-01-30 04:09:16'),
(33, 'Direccion de blockchain', 'blockchain', 0, 0, 0, 'text', 10, 20, 1, 0, 0, '2019-02-18 15:49:29', '2019-01-30 04:09:40'),
(34, 'Direccion de Bitgo', 'bitgo', 0, 0, 0, 'text', 10, 20, 1, 0, 0, '2019-02-18 15:49:36', '2019-01-30 04:10:03'),
(39, 'Metodo de pago', 'pago', 0, 0, 0, 'select', 0, 0, 1, 0, 0, '2019-02-18 15:49:39', '2019-01-30 19:25:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ganancias`
--

CREATE TABLE `ganancias` (
  `id` int(11) NOT NULL,
  `configuracion` longtext,
  `tipo` varchar(250) DEFAULT NULL,
  `nota` longtext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacionbancaria`
--

CREATE TABLE `informacionbancaria` (
  `id` int(11) NOT NULL,
  `titulo` varchar(250) DEFAULT NULL,
  `contenido` longtext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iva`
--

CREATE TABLE `iva` (
  `id` int(11) NOT NULL,
  `configuracion` longtext NOT NULL,
  `tipo` varchar(250) NOT NULL,
  `tipocalculo` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linkpagos`
--

CREATE TABLE `linkpagos` (
  `id` int(11) NOT NULL,
  `iduser` int(250) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `archivo` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `inicio` text,
  `actualizar` text,
  `registro` text,
  `registro_cliente` text,
  `red_usuario` text,
  `transacciones` text,
  `billetera` text,
  `calendario` text,
  `informes` text,
  `prospeccion` text,
  `correos` text,
  `tickets` text,
  `ranking` text,
  `tienda` text,
  `herramientas` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `inicio`, `actualizar`, `registro`, `registro_cliente`, `red_usuario`, `transacciones`, `billetera`, `calendario`, `informes`, `prospeccion`, `correos`, `tickets`, `ranking`, `tienda`, `herramientas`, `created_at`, `updated_at`) VALUES
(1, '{\"activo\":1}', '{\"activo\":1}', '{\"activo\":1}', '{\"activo\":1}', '{\"activo\":1,\"usuario\":1,\"cliente\":1,\"directos\":1,\"red\":1}', '{\"activo\":1,\"personales\":1,\"red\":1,\"directos\":0,\"link\":1}', '{\"activo\":1,\"billetera\":1,\"transferencia\":1,\"corte\":1,\"canje\":1}', '{\"activo\":1}', '{\"activo\":1,\"activacion\":1,\"comisiones\":1,\"liquidacion\":1,\"repor_comisiones\":1,\"afiliados\":1}', '{\"activo\":1}', '{\"activo\":1}', '{\"activo\":1,\"mios\":1,\"generar\":1}', '{\"activo\":1}', '{\"activo\":1,\"productos\":1,\"bancaria\":1,\"pagos\":1,\"lista_pagos\":1,\"paypal\":1,\"paga_paypal\":1}', '{\"activo\":1,\"documentos\":1,\"articulos\":1,\"notas\":1,\"activacion_correos\":1}', NULL, '0000-00-00 00:00:00'),
(2, '{\"activo\":\"1\"}', '{\"activo\":\"1\"}', '{\"activo\":\"1\"}', '{\"activo\":\"1\"}', '{\"activo\":\"1\",\"usuario\":\"1\",\"cliente\":\"1\",\"directos\":\"1\",\"red\":\"1\"}', '{\"activo\":\"1\",\"personales\":\"1\",\"red\":\"1\",\"link\":\"1\"}', '{\"activo\":\"1\",\"billetera\":\"1\",\"transferencia\":\"1\",\"corte\":\"1\",\"canje\":\"1\"}', '{\"activo\":\"1\"}', '{\"activo\":\"1\",\"activacion\":\"1\",\"comisiones\":\"1\",\"liquidacion\":\"1\",\"repor_comisiones\":\"1\",\"afiliados\":\"1\"}', '{\"activo\":\"1\"}', '{\"activo\":\"1\"}', '{\"activo\":\"1\",\"generar\":\"1\",\"mios\":\"1\"}', '{\"activo\":\"1\"}', '{\"activo\":\"1\",\"productos\":\"1\",\"bancaria\":\"1\",\"pagos\":\"1\",\"lista_pagos\":\"1\",\"paypal\":\"1\",\"paga_paypal\":\"1\"}', '{\"activo\":\"1\",\"documentos\":\"1\",\"articulos\":\"1\",\"notas\":\"1\",\"activacion_correos\":\"1\"}', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulocomplementario`
--

CREATE TABLE `modulocomplementario` (
  `id` int(11) NOT NULL,
  `contenido` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monedadicional`
--

CREATE TABLE `monedadicional` (
  `id` int(11) NOT NULL,
  `configuracion` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monedas`
--

CREATE TABLE `monedas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `simbolo` varchar(200) NOT NULL,
  `mostrar_a_d` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 o false - despue del monto, 1 o true - antes del monto',
  `principal` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `monedas`
--

INSERT INTO `monedas` (`id`, `nombre`, `simbolo`, `mostrar_a_d`, `principal`, `created_at`, `updated_at`) VALUES
(1, 'Dolar', '$', 0, 1, '2020-03-26 20:49:07', '2020-03-26 20:49:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `iduser` int(250) NOT NULL,
  `titulo` longtext NOT NULL,
  `contenido` longtext NOT NULL,
  `inicio` date NOT NULL,
  `fin` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notes`
--

CREATE TABLE `notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion_tickets`
--

CREATE TABLE `notificacion_tickets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `ticket` varchar(250) NOT NULL,
  `contenido` varchar(250) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notification_type` varchar(5) DEFAULT NULL,
  `date` date NOT NULL,
  `route` varchar(200) NOT NULL,
  `description` varchar(255) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `label` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `calendario` int(250) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones_select`
--

CREATE TABLE `opciones_select` (
  `id` int(11) NOT NULL,
  `idselect` int(11) NOT NULL,
  `valor` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `opciones_select`
--

INSERT INTO `opciones_select` (`id`, `idselect`, `valor`, `created_at`, `updated_at`) VALUES
(1, 3, 'M', '2019-01-08 02:13:50', '2019-01-08 02:13:50'),
(2, 3, 'F', '2019-01-08 02:13:50', '2019-01-08 02:13:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `optioncarritos`
--

CREATE TABLE `optioncarritos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medio_pago` int(10) NOT NULL COMMENT '0- otros metodos de pago 1- billetera',
  `activo` int(2) DEFAULT NULL,
  `link` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `optioncarritos`
--

INSERT INTO `optioncarritos` (`id`, `nombre`, `medio_pago`, `activo`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Billetera', 1, 1, NULL, '2019-10-23 21:04:57', '2019-10-24 01:53:38'),
(4, 'Transferencia Bancaria', 0, 1, NULL, '2019-11-05 20:04:41', '2019-11-05 20:04:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagocarritos`
--

CREATE TABLE `pagocarritos` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iduser` int(250) DEFAULT NULL,
  `idcompra` int(250) NOT NULL,
  `metodo` int(250) NOT NULL,
  `nombre` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pagocarritos`
--

INSERT INTO `pagocarritos` (`id`, `name`, `iduser`, `idcompra`, `metodo`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Alberto Picon', 3, 30, 0, 'Transferencia Bancaria', '2020-03-26 22:13:15', '2020-03-26 22:13:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `iduser` bigint(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `monto` float NOT NULL,
  `fechasoli` date NOT NULL,
  `fechapago` date DEFAULT NULL,
  `metodo` varchar(200) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tipopago` text,
  `descuento` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pop`
--

CREATE TABLE `pop` (
  `id` int(11) NOT NULL,
  `titulo` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contenido` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `activado` tinyint(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pop`
--

INSERT INTO `pop` (`id`, `titulo`, `contenido`, `activado`, `created_at`, `updated_at`) VALUES
(1, 'Video explicativo', '<ol><li><center><iframe frameborder=\"0\" src=\"//www.youtube.com/embed/bbHSuBLXbHc\" width=\"640\" height=\"360\" class=\"note-video-clip\"></iframe></center><br></li></ol>', 0, '2020-05-26 21:22:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prospeccion`
--

CREATE TABLE `prospeccion` (
  `id` int(11) NOT NULL,
  `iduser` int(250) NOT NULL,
  `persona_natural` varchar(250) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `direccion` longtext NOT NULL,
  `ciudad` varchar(250) NOT NULL,
  `estado` varchar(250) NOT NULL,
  `user_email` varchar(250) DEFAULT NULL,
  `local` varchar(250) DEFAULT NULL,
  `zip` int(250) DEFAULT NULL,
  `pais` varchar(250) NOT NULL,
  `telefono` varchar(250) NOT NULL,
  `website` varchar(250) DEFAULT NULL,
  `vap` varchar(250) DEFAULT NULL,
  `referred_id` int(250) NOT NULL,
  `position_id` int(250) NOT NULL,
  `ladomatriz` varchar(250) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT '0',
  `tipo` varchar(250) DEFAULT NULL,
  `comentario` longtext,
  `observaciones` longtext,
  `perfil` longtext,
  `envioCorreo` int(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntos`
--

CREATE TABLE `puntos` (
  `id` int(11) NOT NULL,
  `iduser` int(250) NOT NULL,
  `idcompra` int(250) NOT NULL,
  `usuario` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `concepto` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `puntos` double NOT NULL,
  `cantidad` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntosbonos`
--

CREATE TABLE `puntosbonos` (
  `id` int(11) NOT NULL,
  `iduser` int(250) DEFAULT NULL,
  `usuario` varchar(250) DEFAULT NULL,
  `concepto` varchar(250) DEFAULT NULL,
  `puntos` double DEFAULT NULL,
  `tipo` varchar(250) DEFAULT NULL COMMENT '1 - puntos que se pueden descontar 2 - puntos que se almacenan 3 - puntos descontados del 1',
  `lado` varchar(10) DEFAULT NULL,
  `balance` double DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pushs`
--

CREATE TABLE `pushs` (
  `id` int(11) NOT NULL,
  `iduser` int(250) DEFAULT NULL,
  `titulo` varchar(250) DEFAULT NULL,
  `body` varchar(250) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `qr`
--

CREATE TABLE `qr` (
  `id` int(11) NOT NULL,
  `contenido` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redes_sociales`
--

CREATE TABLE `redes_sociales` (
  `id` int(11) NOT NULL,
  `link` text NOT NULL,
  `tipo` int(2) DEFAULT NULL COMMENT '1- glyphicon 2-imagen',
  `imagen` text NOT NULL,
  `color` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `redes_sociales`
--

INSERT INTO `redes_sociales` (`id`, `link`, `tipo`, `imagen`, `color`, `created_at`, `updated_at`) VALUES
(1, 'https://twitter.com/login?lang=es', 1, 'fab fa-twitter', 'ADD8E6', '2020-05-02 21:23:05', '2020-05-02 21:13:17'),
(2, 'https://web.whatsapp.com/', 1, 'fab fa-whatsapp-square', '00a65a', '2020-05-02 21:23:07', '2020-05-02 20:51:30'),
(3, 'https://es-la.facebook.com/login/', 1, 'fab fa-facebook', '3c8dbc', '2020-05-02 21:23:09', '2020-05-02 20:51:30'),
(4, 'https://es-la.facebook.com/messenger/', 1, 'fab fa-facebook-messenger', '00c0ef', '2020-05-02 21:23:12', '2020-05-02 21:14:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referidos` int(11) DEFAULT '0',
  `refeact` int(11) DEFAULT '0',
  `referidosd` int(11) DEFAULT NULL,
  `referidosInd` int(11) DEFAULT NULL,
  `compras` float DEFAULT '0',
  `grupal` float DEFAULT NULL COMMENT 'puntos grupales',
  `comisiones` float DEFAULT '0',
  `bonos` float DEFAULT '0',
  `niveles` int(11) DEFAULT '0',
  `rolprevio` int(11) DEFAULT NULL,
  `acepta_comision` tinyint(1) DEFAULT '1',
  `rolnecesario` int(11) DEFAULT NULL,
  `rolnecesariocant` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `referidos`, `refeact`, `referidosd`, `referidosInd`, `compras`, `grupal`, `comisiones`, `bonos`, `niveles`, `rolprevio`, `acepta_comision`, `rolnecesario`, `rolnecesariocant`, `created_at`, `updated_at`) VALUES
(0, 'Administrador', 0, 0, NULL, NULL, 0, NULL, 0, 0, 0, NULL, 1, NULL, NULL, NULL, NULL),
(100, 'Cliente', 0, 0, NULL, NULL, 0, NULL, 0, 0, 0, NULL, 1, NULL, NULL, NULL, NULL),
(1, 'Socio', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, '2020-03-26 21:50:02', '2020-03-26 21:50:02'),
(2, 'Bronce', 6, 6, 5, 1, 0, 0, 0, 100, 0, 1, 1, 0, 0, '2020-03-26 21:50:02', '2020-03-26 21:50:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguridad`
--

CREATE TABLE `seguridad` (
  `id` int(11) NOT NULL,
  `titulo` text,
  `contenido` longtext,
  `concepto` text,
  `tipo` int(11) DEFAULT '1' COMMENT '1 - una ves al dia 2 - siempre 3 - cada treinta dias ',
  `status` int(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seguridad`
--

INSERT INTO `seguridad` (`id`, `titulo`, `contenido`, `concepto`, `tipo`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'hola @nombre @correo le hemos enviado un codigo de seguridad para verificar que es usted su codigo es: @codigo', NULL, 1, 0, '2020-05-12 01:53:02', '2020-05-10 21:38:37'),
(2, 'Codigo Qr', NULL, 'Al activar el codigo Qr puede usar google autenticador, Authy o cualquier otra aplicacion para escanear los codigo qr este sera requerido al iniciar sesion\r\n', 1, 0, '2020-05-11 01:09:21', '2020-05-11 01:09:21'),
(3, 'Verificacion por correo', 'Hola @nombre @correo se a enviado un codigo para verificar que es usted su codigo es: @codigo', 'Se envia un codigo al correo el cual debera ingresar al iniciar sesion ', 1, 0, '2020-05-11 02:17:30', '2020-05-11 02:17:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semiautobinario`
--

CREATE TABLE `semiautobinario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(250) DEFAULT NULL,
  `iduser` int(250) DEFAULT NULL,
  `idcomision` int(250) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `correo` varchar(250) DEFAULT NULL,
  `status` varchar(2) NOT NULL DEFAULT '0',
  `lado` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesions`
--

CREATE TABLE `sesions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `fecha` date NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actividad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sesions`
--

INSERT INTO `sesions` (`id`, `user_id`, `fecha`, `ip`, `actividad`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 3, '2020-03-26', '190.25.37.181', 'Inicio Sesion', NULL, '2020-03-26 22:07:03', '2020-03-26 22:07:03'),
(3, 1, '2020-03-26', '190.25.37.181', 'Inicio Sesion', NULL, '2020-03-27 00:15:00', '2020-03-27 00:15:00'),
(4, 1, '2020-04-11', '186.85.41.22', 'Inicio Sesion', NULL, '2020-04-11 21:56:09', '2020-04-11 21:56:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settingactivacion`
--

CREATE TABLE `settingactivacion` (
  `id` int(11) NOT NULL,
  `tipoactivacion` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1 - producto, 2 - dinero',
  `tiporecompra` tinyint(4) DEFAULT '0' COMMENT '1 - producto, 2 - dinero',
  `requisitoactivacion` float NOT NULL,
  `requisitorecompra` float DEFAULT NULL,
  `desativar_usuarios` tinyint(4) DEFAULT NULL COMMENT '0 - desactivar a fin de mes, 1 - desctivar despues de haber cumplido un mes en el sistema ',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `settingactivacion`
--

INSERT INTO `settingactivacion` (`id`, `tipoactivacion`, `tiporecompra`, `requisitoactivacion`, `requisitorecompra`, `desativar_usuarios`, `created_at`, `updated_at`) VALUES
(1, 2, 0, 0, NULL, NULL, '2020-03-26 20:49:07', '2020-03-26 20:49:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settingcliente`
--

CREATE TABLE `settingcliente` (
  `id` int(11) NOT NULL,
  `cliente` tinyint(1) NOT NULL,
  `permiso` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `settingcliente`
--

INSERT INTO `settingcliente` (`id`, `cliente`, `permiso`, `created_at`, `updated_at`) VALUES
(1, 0, 0, '2020-03-26 20:49:07', '2020-03-26 20:49:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settingcomision`
--

CREATE TABLE `settingcomision` (
  `id` int(11) NOT NULL,
  `niveles` int(11) NOT NULL,
  `tipocomision` varchar(200) NOT NULL,
  `valorgeneral` float NOT NULL,
  `valordetallado` text NOT NULL,
  `tipopago` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tipotransferencia` tinyint(1) DEFAULT NULL COMMENT '0 - monto fijo 1 - monto por porcentaje',
  `comisiontransf` float DEFAULT NULL COMMENT 'esta es para el metodo de pago, es la comision por transferencia de dinero en la billetera',
  `bonoactivacion` longtext,
  `directos` tinyint(1) DEFAULT '1' COMMENT 'si solo los directos aceptan el bono de activacion',
  `tipobono` varchar(50) DEFAULT NULL,
  `primera_compra` tinyint(1) DEFAULT '1',
  `activacioncomision` tinyint(1) DEFAULT NULL COMMENT '1 - cobrar comision desde la fecha de activacion, 2 - cobrar comision desde inicio del mes'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `settingcomision`
--

INSERT INTO `settingcomision` (`id`, `niveles`, `tipocomision`, `valorgeneral`, `valordetallado`, `tipopago`, `created_at`, `updated_at`, `tipotransferencia`, `comisiontransf`, `bonoactivacion`, `directos`, `tipobono`, `primera_compra`, `activacioncomision`) VALUES
(1, 5, 'producto', 0, '[{\"idproductos\":12,\"comisiones\":[{\"nivel\":1,\"comision\":170},{\"nivel\":2,\"comision\":10},{\"nivel\":3,\"comision\":10},{\"nivel\":4,\"comision\":0},{\"nivel\":5,\"comision\":0}]},{\"idproductos\":28,\"comisiones\":[{\"nivel\":1,\"comision\":250},{\"nivel\":2,\"comision\":10},{\"nivel\":3,\"comision\":10},{\"nivel\":4,\"comision\":0},{\"nivel\":5,\"comision\":0}]},{\"idproductos\":29,\"comisiones\":[{\"nivel\":1,\"comision\":0},{\"nivel\":2,\"comision\":0},{\"nivel\":3,\"comision\":0},{\"nivel\":4,\"comision\":0},{\"nivel\":5,\"comision\":0}]}]', 'normal', '2020-03-26 21:47:34', '2020-03-26 21:47:34', NULL, NULL, '[{\"producto\":\"12\",\"bono\":\"170\",\"tipobono\":\"fijo\"},{\"producto\":\"600\",\"bono\":\"250\",\"tipobono\":\"fijo\"}]', 1, 'fijo', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settingpagos`
--

CREATE TABLE `settingpagos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `feed` float NOT NULL,
  `monto_min` float DEFAULT '0',
  `tipofeed` tinyint(1) NOT NULL COMMENT '0 - monto fijo 1 - porcentaje',
  `estado` tinyint(1) NOT NULL DEFAULT '0',
  `correo` tinyint(1) DEFAULT '0',
  `wallet` tinyint(1) DEFAULT '0',
  `datosbancarios` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settingpermiso`
--

CREATE TABLE `settingpermiso` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `nameuser` varchar(200) NOT NULL,
  `nuevo_registro` tinyint(4) DEFAULT '0',
  `red_usuario` tinyint(4) DEFAULT '0',
  `vision_usuario` tinyint(4) DEFAULT '0',
  `billetera` tinyint(4) DEFAULT '0',
  `pago` tinyint(4) DEFAULT '0',
  `informes` tinyint(4) DEFAULT '0',
  `tickets` tinyint(4) DEFAULT '0',
  `buzon` tinyint(4) DEFAULT '0',
  `ranking` tinyint(4) DEFAULT '0',
  `historial_actividades` tinyint(4) DEFAULT '0',
  `email_marketing` tinyint(4) DEFAULT '0',
  `administrar_redes` tinyint(4) DEFAULT '0',
  `soporte` tinyint(4) DEFAULT '0',
  `ajuste` tinyint(4) DEFAULT '0',
  `herramienta` tinyint(4) DEFAULT '0',
  `calendario` tinyint(4) DEFAULT '0',
  `correos` tinyint(4) DEFAULT '0',
  `prospeccion` tinyint(4) DEFAULT '0',
  `puntos` tinyint(4) DEFAULT '0',
  `binario` tinyint(4) DEFAULT '0',
  `usuario` tinyint(4) NOT NULL DEFAULT '0',
  `tienda` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `settingpermiso`
--

INSERT INTO `settingpermiso` (`id`, `iduser`, `nameuser`, `nuevo_registro`, `red_usuario`, `vision_usuario`, `billetera`, `pago`, `informes`, `tickets`, `buzon`, `ranking`, `historial_actividades`, `email_marketing`, `administrar_redes`, `soporte`, `ajuste`, `herramienta`, `calendario`, `correos`, `prospeccion`, `puntos`, `binario`, `usuario`, `tienda`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 1, '2020-07-29 22:28:43', '2020-03-26 20:49:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settingplantilla`
--

CREATE TABLE `settingplantilla` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `contenido` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `settingplantilla`
--

INSERT INTO `settingplantilla` (`id`, `titulo`, `contenido`, `created_at`, `updated_at`) VALUES
(1, 'Bienvenido', '<p>@nombre</p><p>@usuario</p><p>@idpatrocionio</p><p>@clave</p><p>@correo</p>', '2020-03-26 21:51:53', '2020-03-26 21:51:53'),
(2, 'Pagos', '<p>@nombrecompleto</p><p><span style=\"color: rgb(165, 42, 42);\">@correo</span></p><p><span style=\"color: rgb(165, 42, 42);\">@pago</span></p><p><span style=\"color: rgb(165, 42, 42);\">@usuario</span></p><p><span style=\"color: rgb(165, 42, 42);\">@idpatrocinio<br></span><br></p>', '2020-03-26 21:52:52', '2020-03-26 21:52:52'),
(3, 'Compra', '<p>@nombre</p><p>@correo</p><p>@datos</p><p>@fecha</p><p>@total</p>', '2020-03-26 21:53:42', '2020-03-26 21:53:42'),
(4, 'Compra', '<p>@nombre</p><p>@correo</p><p>@datos</p><p>@fecha</p><p>@total</p>', '2020-03-26 21:54:53', '2020-03-26 21:54:53'),
(5, 'Liquidación', '<p>@nombre</p><p>@correo</p><p>@datosbancarios</p><p>@fecha</p><p>@total</p>', '2020-03-26 21:55:48', '2020-03-26 21:55:48'),
(6, NULL, NULL, '2020-02-07 17:35:55', '0000-00-00 00:00:00');

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
  `description` text COLLATE utf8mb4_unicode_ci,
  `category_type` int(11) DEFAULT NULL,
  `enable_register` tinyint(1) DEFAULT '1',
  `enable_auth_fb` tinyint(1) DEFAULT '0',
  `enable_auth_tw` tinyint(1) DEFAULT '0',
  `enable_auth_google` tinyint(1) DEFAULT '0',
  `version` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0.2.0',
  `keycode` int(11) DEFAULT NULL,
  `logo` int(11) DEFAULT '1',
  `rol_default` int(11) DEFAULT '3',
  `status_web` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `referred_id_default` int(11) NOT NULL DEFAULT '1',
  `referred_level_max` int(11) NOT NULL DEFAULT '5',
  `edad_minino` int(11) NOT NULL COMMENT 'edad minimo para ingresar al sistema',
  `licencia` text COLLATE utf8mb4_unicode_ci,
  `fecha_vencimiento` text COLLATE utf8mb4_unicode_ci,
  `prefijo_wp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_no_comision` text COLLATE utf8mb4_unicode_ci,
  `activarBotones` text COLLATE utf8mb4_unicode_ci COMMENT 'permite activar los botones de transferencia, retiro, pago total y pago masivo',
  `activarCorreos` longtext COLLATE utf8mb4_unicode_ci,
  `firma` longtext COLLATE utf8mb4_unicode_ci,
  `limitar` int(2) NOT NULL DEFAULT '0',
  `traductor` int(2) DEFAULT '0',
  `recarga` int(2) NOT NULL DEFAULT '0',
  `canje` int(2) NOT NULL DEFAULT '0',
  `total_canje` double DEFAULT NULL,
  `estilo` int(2) DEFAULT '1',
  `posicionamiento` int(2) DEFAULT '0',
  `btc` int(2) NOT NULL DEFAULT '0',
  `paypal` longtext COLLATE utf8mb4_unicode_ci,
  `scriptpaypal` longtext COLLATE utf8mb4_unicode_ci,
  `htmlpaypal` longtext COLLATE utf8mb4_unicode_ci,
  `login` int(11) NOT NULL DEFAULT '1',
  `registro` int(2) NOT NULL DEFAULT '2',
  `colorfondo` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fff',
  `cololetras` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '333'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `settings`
--

INSERT INTO `settings` (`id`, `name`, `slogan`, `name_styled`, `company_name`, `company_email`, `site_email`, `description`, `category_type`, `enable_register`, `enable_auth_fb`, `enable_auth_tw`, `enable_auth_google`, `version`, `keycode`, `logo`, `rol_default`, `status_web`, `created_at`, `updated_at`, `referred_id_default`, `referred_level_max`, `edad_minino`, `licencia`, `fecha_vencimiento`, `prefijo_wp`, `id_no_comision`, `activarBotones`, `activarCorreos`, `firma`, `limitar`, `traductor`, `recarga`, `canje`, `total_canje`, `estilo`, `posicionamiento`, `btc`, `paypal`, `scriptpaypal`, `htmlpaypal`, `login`, `registro`, `colorfondo`, `cololetras`) VALUES
(1, 'Sinergia Demo', '123456', 'Sinergia Demo', NULL, NULL, 'soporte@shapinetwork.com', NULL, NULL, 1, 0, 0, 0, '0.2.0', NULL, 1, 3, 1, '2020-03-26 20:49:07', '2020-03-26 20:49:07', 1, 5, 18, 'TlRBM0lWSTVObGxFT1RSVkxETTNVRklzSXloU0t6TmdVaXN6S0ZjS1lBbz0=', 'MjAyMy0wNy0yOQ==', 'wp98_', NULL, '{\"btn_transferencia\":1,\"btn_retiro\":1,\"btn_masivo\":1,\"btn_todo\":1,\"btn_liquida\":1,\"btn_monto\":1}', '{\"pago\":1,\"compra\":1,\"pc\":1,\"liquidacion\":1}', '<p>Empresa</p><p>Telefono</p><p>direccion</p>', 0, 0, 0, 0, NULL, 7, 0, 0, NULL, NULL, NULL, 2, 2, 'fff', '333');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settingsestructura`
--

CREATE TABLE `settingsestructura` (
  `id` int(11) NOT NULL,
  `tipoestructura` varchar(50) NOT NULL,
  `cantnivel` int(11) NOT NULL,
  `cantfilas` int(11) DEFAULT NULL,
  `estructuraprincipal` tinyint(1) DEFAULT NULL COMMENT '1: arbol - 2: matriz',
  `usuarioprincipal` tinyint(1) DEFAULT NULL COMMENT '1: admin - 2:user',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `settingsestructura`
--

INSERT INTO `settingsestructura` (`id`, `tipoestructura`, `cantnivel`, `cantfilas`, `estructuraprincipal`, `usuarioprincipal`, `created_at`, `updated_at`) VALUES
(1, 'matriz', 5, 5, 0, 0, '2020-03-26 21:33:16', '2020-03-26 21:33:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settingspuntos`
--

CREATE TABLE `settingspuntos` (
  `id` int(11) NOT NULL,
  `configuracion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipopuntos` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `setttingsroles`
--

CREATE TABLE `setttingsroles` (
  `id` int(11) NOT NULL,
  `rangos` int(11) NOT NULL,
  `compras` tinyint(1) DEFAULT '0',
  `comisiones` tinyint(1) DEFAULT '0',
  `niveles` tinyint(1) DEFAULT '0',
  `referidos` tinyint(1) DEFAULT '0',
  `referidosact` tinyint(1) DEFAULT '0',
  `referidosd` tinyint(1) DEFAULT '0',
  `referidosInd` tinyint(1) DEFAULT '0',
  `grupal` tinyint(1) DEFAULT '0' COMMENT 'puntos grupales',
  `valorpuntos` float DEFAULT NULL,
  `bonos` tinyint(1) DEFAULT '0',
  `rolnecesario` tinyint(1) DEFAULT '0',
  `reseteomensual` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `setttingsroles`
--

INSERT INTO `setttingsroles` (`id`, `rangos`, `compras`, `comisiones`, `niveles`, `referidos`, `referidosact`, `referidosd`, `referidosInd`, `grupal`, `valorpuntos`, `bonos`, `rolnecesario`, `reseteomensual`, `created_at`, `updated_at`) VALUES
(1, 2, 0, 0, 0, 1, 1, 1, 1, 0, 0, 1, 0, 0, '2020-03-26 21:50:02', '2020-03-26 21:50:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` text COLLATE utf8mb4_unicode_ci,
  `comentario` longtext COLLATE utf8mb4_unicode_ci,
  `tipo` longtext COLLATE utf8mb4_unicode_ci,
  `user_id` int(10) UNSIGNED NOT NULL,
  `admin` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivo` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_campo`
--

CREATE TABLE `user_campo` (
  `ID` bigint(20) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `genero` varchar(250) DEFAULT NULL,
  `edad` date DEFAULT NULL,
  `nameuser` varchar(250) NOT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `document` varchar(250) DEFAULT NULL,
  `direccion2` varchar(250) DEFAULT NULL,
  `estado` varchar(250) DEFAULT NULL,
  `ciudad` varchar(250) DEFAULT NULL,
  `codigo` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `fijo` varchar(250) DEFAULT NULL,
  `facebook` varchar(250) DEFAULT NULL,
  `twitter` varchar(250) DEFAULT NULL,
  `instagram` varchar(250) DEFAULT NULL,
  `youtube` varchar(250) DEFAULT NULL,
  `linkedin` varchar(250) DEFAULT NULL,
  `banco` varchar(250) DEFAULT NULL,
  `tipocuenta` varchar(250) DEFAULT NULL,
  `titular` varchar(250) DEFAULT NULL,
  `documento_identidad_titular` varchar(250) DEFAULT NULL,
  `cuenta` varchar(250) DEFAULT NULL,
  `swift` varchar(250) DEFAULT NULL,
  `pan` varchar(250) DEFAULT NULL,
  `paypal` varchar(250) DEFAULT NULL,
  `blocktrail` varchar(250) DEFAULT NULL,
  `blockchain` varchar(250) DEFAULT NULL,
  `bitgo` varchar(250) DEFAULT NULL,
  `pais` varchar(250) DEFAULT NULL,
  `pago` varchar(250) DEFAULT NULL,
  `btc` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_campo`
--

INSERT INTO `user_campo` (`ID`, `firstname`, `lastname`, `genero`, `edad`, `nameuser`, `direccion`, `document`, `direccion2`, `estado`, `ciudad`, `codigo`, `phone`, `fijo`, `facebook`, `twitter`, `instagram`, `youtube`, `linkedin`, `banco`, `tipocuenta`, `titular`, `documento_identidad_titular`, `cuenta`, `swift`, `pan`, `paypal`, `blocktrail`, `blockchain`, `bitgo`, `pais`, `pago`, `btc`) VALUES
(1, 'ADMIN', 'SHAPINETWORK', NULL, NULL, 'shapinetadmin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Ramon', 'Picon', NULL, NULL, 'ramonp', NULL, '746873793', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Alberto', 'Picon', NULL, NULL, 'albertop', NULL, '6483793', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'pietro', 'pasqualis', 'M', '2016-09-28', 'pietro giacomo pasqualis', 'casa, mi otra casa', '25160138', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `walletlog`
--

CREATE TABLE `walletlog` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idcomision` int(11) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `debito` float NOT NULL,
  `credito` float NOT NULL,
  `balance` float NOT NULL,
  `descuento` float NOT NULL,
  `tipotransacion` tinyint(4) NOT NULL COMMENT '0 - transferencia, 1 - retiros, 2 - comisiones,  3 - liquidaciones',
  `monedaAdicional` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `walletlog`
--

INSERT INTO `walletlog` (`id`, `iduser`, `idcomision`, `usuario`, `descripcion`, `debito`, `credito`, `balance`, `descuento`, `tipotransacion`, `monedaAdicional`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Shapinetwork', 'Bono Activacion Usuario: Alberto Picon', 170, 0, 170, 0, 2, NULL, '2020-03-26 22:14:01', '2020-03-26 22:14:01'),
(2, 1, 2, 'Shapinetwork', 'Comision del usuario: Alberto Picon de la orden: 30', 0, 0, 170, 0, 2, NULL, '2020-03-26 22:14:01', '2020-03-26 22:14:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_actionscheduler_actions`
--

CREATE TABLE `wp98_actionscheduler_actions` (
  `action_id` bigint(20) UNSIGNED NOT NULL,
  `hook` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scheduled_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `scheduled_date_local` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `args` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schedule` longtext COLLATE utf8mb4_unicode_ci,
  `group_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `attempts` int(11) NOT NULL DEFAULT '0',
  `last_attempt_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_attempt_local` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `claim_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `extended_args` varchar(8000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wp98_actionscheduler_actions`
--

INSERT INTO `wp98_actionscheduler_actions` (`action_id`, `hook`, `status`, `scheduled_date_gmt`, `scheduled_date_local`, `args`, `schedule`, `group_id`, `attempts`, `last_attempt_gmt`, `last_attempt_local`, `claim_id`, `extended_args`) VALUES
(7, 'woocommerce_run_update_callback', 'complete', '2020-07-23 17:11:44', '2020-07-23 17:11:44', '[\"wc_admin_update_110_remove_facebook_note\"]', 'O:30:\"ActionScheduler_SimpleSchedule\":2:{s:22:\"\0*\0scheduled_timestamp\";i:1595524304;s:41:\"\0ActionScheduler_SimpleSchedule\0timestamp\";i:1595524304;}', 2, 1, '2020-07-23 17:11:45', '2020-07-23 17:11:45', 0, NULL),
(8, 'woocommerce_run_update_callback', 'complete', '2020-07-23 17:11:45', '2020-07-23 17:11:45', '[\"wc_admin_update_110_db_version\"]', 'O:30:\"ActionScheduler_SimpleSchedule\":2:{s:22:\"\0*\0scheduled_timestamp\";i:1595524305;s:41:\"\0ActionScheduler_SimpleSchedule\0timestamp\";i:1595524305;}', 2, 1, '2020-07-23 17:11:45', '2020-07-23 17:11:45', 0, NULL),
(9, 'woocommerce_run_update_callback', 'complete', '2020-07-23 17:11:46', '2020-07-23 17:11:46', '[\"wc_admin_update_130_remove_dismiss_action_from_tracking_opt_in_note\"]', 'O:30:\"ActionScheduler_SimpleSchedule\":2:{s:22:\"\0*\0scheduled_timestamp\";i:1595524306;s:41:\"\0ActionScheduler_SimpleSchedule\0timestamp\";i:1595524306;}', 2, 1, '2020-07-23 17:12:34', '2020-07-23 17:12:34', 0, NULL),
(10, 'woocommerce_run_update_callback', 'complete', '2020-07-23 17:11:47', '2020-07-23 17:11:47', '[\"wc_admin_update_130_db_version\"]', 'O:30:\"ActionScheduler_SimpleSchedule\":2:{s:22:\"\0*\0scheduled_timestamp\";i:1595524307;s:41:\"\0ActionScheduler_SimpleSchedule\0timestamp\";i:1595524307;}', 2, 1, '2020-07-23 17:12:34', '2020-07-23 17:12:34', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_actionscheduler_claims`
--

CREATE TABLE `wp98_actionscheduler_claims` (
  `claim_id` bigint(20) UNSIGNED NOT NULL,
  `date_created_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_actionscheduler_groups`
--

CREATE TABLE `wp98_actionscheduler_groups` (
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wp98_actionscheduler_groups`
--

INSERT INTO `wp98_actionscheduler_groups` (`group_id`, `slug`) VALUES
(1, 'action-scheduler-migration'),
(2, 'woocommerce-db-updates');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_actionscheduler_logs`
--

CREATE TABLE `wp98_actionscheduler_logs` (
  `log_id` bigint(20) UNSIGNED NOT NULL,
  `action_id` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `log_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `log_date_local` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wp98_actionscheduler_logs`
--

INSERT INTO `wp98_actionscheduler_logs` (`log_id`, `action_id`, `message`, `log_date_gmt`, `log_date_local`) VALUES
(6, 9, 'acción creada', '2020-07-23 17:11:44', '2020-07-23 17:11:44'),
(5, 8, 'acción creada', '2020-07-23 17:11:44', '2020-07-23 17:11:44'),
(4, 7, 'acción creada', '2020-07-23 17:11:44', '2020-07-23 17:11:44'),
(7, 10, 'acción creada', '2020-07-23 17:11:44', '2020-07-23 17:11:44'),
(8, 7, 'acción empezada vía WP Cron', '2020-07-23 17:11:45', '2020-07-23 17:11:45'),
(9, 7, 'acción completa vía WP Cron', '2020-07-23 17:11:45', '2020-07-23 17:11:45'),
(10, 8, 'acción empezada vía WP Cron', '2020-07-23 17:11:45', '2020-07-23 17:11:45'),
(11, 8, 'acción completa vía WP Cron', '2020-07-23 17:11:45', '2020-07-23 17:11:45'),
(12, 9, 'acción empezada vía Async Request', '2020-07-23 17:12:34', '2020-07-23 17:12:34'),
(13, 9, 'acción completa vía Async Request', '2020-07-23 17:12:34', '2020-07-23 17:12:34'),
(14, 10, 'acción empezada vía Async Request', '2020-07-23 17:12:34', '2020-07-23 17:12:34'),
(15, 10, 'acción completa vía Async Request', '2020-07-23 17:12:34', '2020-07-23 17:12:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_commentmeta`
--

CREATE TABLE `wp98_commentmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wp98_commentmeta`
--

INSERT INTO `wp98_commentmeta` (`meta_id`, `comment_id`, `meta_key`, `meta_value`) VALUES
(1, 1, '_wp_trash_meta_status', '1'),
(2, 1, '_wp_trash_meta_time', '1595524122'),
(3, 2, '_wp_trash_meta_status', '0'),
(4, 2, '_wp_trash_meta_time', '1595524127');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_comments`
--

CREATE TABLE `wp98_comments` (
  `comment_ID` bigint(20) UNSIGNED NOT NULL,
  `comment_post_ID` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wp98_comments`
--

INSERT INTO `wp98_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'A WordPress Commenter', 'wapuu@wordpress.example', 'https://wordpress.org/', '', '2020-03-26 20:05:35', '2020-03-26 20:05:35', 'Hi, this is a comment.\nTo get started with moderating, editing, and deleting comments, please visit the Comments screen in the dashboard.\nCommenter avatars come from <a href=\"https://gravatar.com\">Gravatar</a>.', 0, 'post-trashed', '', '', 0, 0),
(2, 1, 'Davidnog', 'yourmail@gmail.com', 'https://google.com/aasgdhjhgasjfajsd', '151.80.47.41', '2020-06-25 00:12:32', '2020-06-25 00:12:32', 'Hello. And Bye. \r\n<a href=\"https://google.com/aasgdhjhgasjfajsd#\" rel=\"nofollow ugc\">google404</a> \r\nhjgklsjdfhgkjhdfkjghsdkjfgdh', 0, 'post-trashed', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.140 Safari/537.36 Edge/17.17134', '', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_links`
--

CREATE TABLE `wp98_links` (
  `link_id` bigint(20) UNSIGNED NOT NULL,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_ms_snippets`
--

CREATE TABLE `wp98_ms_snippets` (
  `id` bigint(20) NOT NULL,
  `name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `scope` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'global',
  `priority` smallint(6) NOT NULL DEFAULT '10',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_options`
--

CREATE TABLE `wp98_options` (
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wp98_options`
--

INSERT INTO `wp98_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'https://shapinetwork.com', 'yes'),
(2, 'home', 'https://shapinetwork.com', 'yes'),
(3, 'blogname', 'shapinetwork', 'yes'),
(4, 'blogdescription', 'Shapinetwork', 'yes'),
(5, 'users_can_register', '0', 'yes'),
(6, 'admin_email', 'admin@shapinetwork.com', 'yes'),
(7, 'start_of_week', '1', 'yes'),
(8, 'use_balanceTags', '0', 'yes'),
(9, 'use_smilies', '1', 'yes'),
(10, 'require_name_email', '1', 'yes'),
(11, 'comments_notify', '1', 'yes'),
(12, 'posts_per_rss', '10', 'yes'),
(13, 'rss_use_excerpt', '0', 'yes'),
(14, 'mailserver_url', 'mail.example.com', 'yes'),
(15, 'mailserver_login', 'login@example.com', 'yes'),
(16, 'mailserver_pass', 'password', 'yes'),
(17, 'mailserver_port', '110', 'yes'),
(18, 'default_category', '1', 'yes'),
(19, 'default_comment_status', 'open', 'yes'),
(20, 'default_ping_status', 'open', 'yes'),
(21, 'default_pingback_flag', '1', 'yes'),
(22, 'posts_per_page', '10', 'yes'),
(23, 'date_format', 'F j, Y', 'yes'),
(24, 'time_format', 'g:i a', 'yes'),
(25, 'links_updated_date_format', 'F j, Y g:i a', 'yes'),
(26, 'comment_moderation', '0', 'yes'),
(27, 'moderation_notify', '1', 'yes'),
(28, 'permalink_structure', '/%year%/%monthnum%/%day%/%postname%/', 'yes'),
(29, 'rewrite_rules', 'a:238:{s:24:\"^wc-auth/v([1]{1})/(.*)?\";s:63:\"index.php?wc-auth-version=$matches[1]&wc-auth-route=$matches[2]\";s:22:\"^wc-api/v([1-3]{1})/?$\";s:51:\"index.php?wc-api-version=$matches[1]&wc-api-route=/\";s:24:\"^wc-api/v([1-3]{1})(.*)?\";s:61:\"index.php?wc-api-version=$matches[1]&wc-api-route=$matches[2]\";s:10:\"project/?$\";s:27:\"index.php?post_type=project\";s:40:\"project/feed/(feed|rdf|rss|rss2|atom)/?$\";s:44:\"index.php?post_type=project&feed=$matches[1]\";s:35:\"project/(feed|rdf|rss|rss2|atom)/?$\";s:44:\"index.php?post_type=project&feed=$matches[1]\";s:27:\"project/page/([0-9]{1,})/?$\";s:45:\"index.php?post_type=project&paged=$matches[1]\";s:9:\"tienda/?$\";s:27:\"index.php?post_type=product\";s:39:\"tienda/feed/(feed|rdf|rss|rss2|atom)/?$\";s:44:\"index.php?post_type=product&feed=$matches[1]\";s:34:\"tienda/(feed|rdf|rss|rss2|atom)/?$\";s:44:\"index.php?post_type=product&feed=$matches[1]\";s:26:\"tienda/page/([0-9]{1,})/?$\";s:45:\"index.php?post_type=product&paged=$matches[1]\";s:11:\"^wp-json/?$\";s:22:\"index.php?rest_route=/\";s:14:\"^wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:21:\"^index.php/wp-json/?$\";s:22:\"index.php?rest_route=/\";s:24:\"^index.php/wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:47:\"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:42:\"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:23:\"category/(.+?)/embed/?$\";s:46:\"index.php?category_name=$matches[1]&embed=true\";s:35:\"category/(.+?)/page/?([0-9]{1,})/?$\";s:53:\"index.php?category_name=$matches[1]&paged=$matches[2]\";s:32:\"category/(.+?)/wc-api(/(.*))?/?$\";s:54:\"index.php?category_name=$matches[1]&wc-api=$matches[3]\";s:17:\"category/(.+?)/?$\";s:35:\"index.php?category_name=$matches[1]\";s:44:\"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:39:\"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:20:\"tag/([^/]+)/embed/?$\";s:36:\"index.php?tag=$matches[1]&embed=true\";s:32:\"tag/([^/]+)/page/?([0-9]{1,})/?$\";s:43:\"index.php?tag=$matches[1]&paged=$matches[2]\";s:29:\"tag/([^/]+)/wc-api(/(.*))?/?$\";s:44:\"index.php?tag=$matches[1]&wc-api=$matches[3]\";s:14:\"tag/([^/]+)/?$\";s:25:\"index.php?tag=$matches[1]\";s:45:\"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:40:\"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:21:\"type/([^/]+)/embed/?$\";s:44:\"index.php?post_format=$matches[1]&embed=true\";s:33:\"type/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?post_format=$matches[1]&paged=$matches[2]\";s:15:\"type/([^/]+)/?$\";s:33:\"index.php?post_format=$matches[1]\";s:56:\"layout_category/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:54:\"index.php?layout_category=$matches[1]&feed=$matches[2]\";s:51:\"layout_category/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:54:\"index.php?layout_category=$matches[1]&feed=$matches[2]\";s:32:\"layout_category/([^/]+)/embed/?$\";s:48:\"index.php?layout_category=$matches[1]&embed=true\";s:44:\"layout_category/([^/]+)/page/?([0-9]{1,})/?$\";s:55:\"index.php?layout_category=$matches[1]&paged=$matches[2]\";s:26:\"layout_category/([^/]+)/?$\";s:37:\"index.php?layout_category=$matches[1]\";s:52:\"layout_pack/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?layout_pack=$matches[1]&feed=$matches[2]\";s:47:\"layout_pack/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?layout_pack=$matches[1]&feed=$matches[2]\";s:28:\"layout_pack/([^/]+)/embed/?$\";s:44:\"index.php?layout_pack=$matches[1]&embed=true\";s:40:\"layout_pack/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?layout_pack=$matches[1]&paged=$matches[2]\";s:22:\"layout_pack/([^/]+)/?$\";s:33:\"index.php?layout_pack=$matches[1]\";s:52:\"layout_type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?layout_type=$matches[1]&feed=$matches[2]\";s:47:\"layout_type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?layout_type=$matches[1]&feed=$matches[2]\";s:28:\"layout_type/([^/]+)/embed/?$\";s:44:\"index.php?layout_type=$matches[1]&embed=true\";s:40:\"layout_type/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?layout_type=$matches[1]&paged=$matches[2]\";s:22:\"layout_type/([^/]+)/?$\";s:33:\"index.php?layout_type=$matches[1]\";s:46:\"scope/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:44:\"index.php?scope=$matches[1]&feed=$matches[2]\";s:41:\"scope/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:44:\"index.php?scope=$matches[1]&feed=$matches[2]\";s:22:\"scope/([^/]+)/embed/?$\";s:38:\"index.php?scope=$matches[1]&embed=true\";s:34:\"scope/([^/]+)/page/?([0-9]{1,})/?$\";s:45:\"index.php?scope=$matches[1]&paged=$matches[2]\";s:16:\"scope/([^/]+)/?$\";s:27:\"index.php?scope=$matches[1]\";s:53:\"module_width/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:51:\"index.php?module_width=$matches[1]&feed=$matches[2]\";s:48:\"module_width/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:51:\"index.php?module_width=$matches[1]&feed=$matches[2]\";s:29:\"module_width/([^/]+)/embed/?$\";s:45:\"index.php?module_width=$matches[1]&embed=true\";s:41:\"module_width/([^/]+)/page/?([0-9]{1,})/?$\";s:52:\"index.php?module_width=$matches[1]&paged=$matches[2]\";s:23:\"module_width/([^/]+)/?$\";s:34:\"index.php?module_width=$matches[1]\";s:40:\"et_pb_layout/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:50:\"et_pb_layout/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:70:\"et_pb_layout/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:65:\"et_pb_layout/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:65:\"et_pb_layout/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:46:\"et_pb_layout/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:29:\"et_pb_layout/([^/]+)/embed/?$\";s:60:\"index.php?post_type=et_pb_layout&name=$matches[1]&embed=true\";s:33:\"et_pb_layout/([^/]+)/trackback/?$\";s:54:\"index.php?post_type=et_pb_layout&name=$matches[1]&tb=1\";s:41:\"et_pb_layout/([^/]+)/page/?([0-9]{1,})/?$\";s:67:\"index.php?post_type=et_pb_layout&name=$matches[1]&paged=$matches[2]\";s:48:\"et_pb_layout/([^/]+)/comment-page-([0-9]{1,})/?$\";s:67:\"index.php?post_type=et_pb_layout&name=$matches[1]&cpage=$matches[2]\";s:38:\"et_pb_layout/([^/]+)/wc-api(/(.*))?/?$\";s:68:\"index.php?post_type=et_pb_layout&name=$matches[1]&wc-api=$matches[3]\";s:44:\"et_pb_layout/[^/]+/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:55:\"et_pb_layout/[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:37:\"et_pb_layout/([^/]+)(?:/([0-9]+))?/?$\";s:66:\"index.php?post_type=et_pb_layout&name=$matches[1]&page=$matches[2]\";s:29:\"et_pb_layout/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:39:\"et_pb_layout/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:59:\"et_pb_layout/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:54:\"et_pb_layout/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:54:\"et_pb_layout/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:35:\"et_pb_layout/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:35:\"project/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:45:\"project/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:65:\"project/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:60:\"project/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:60:\"project/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:41:\"project/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:24:\"project/([^/]+)/embed/?$\";s:40:\"index.php?project=$matches[1]&embed=true\";s:28:\"project/([^/]+)/trackback/?$\";s:34:\"index.php?project=$matches[1]&tb=1\";s:48:\"project/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:46:\"index.php?project=$matches[1]&feed=$matches[2]\";s:43:\"project/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:46:\"index.php?project=$matches[1]&feed=$matches[2]\";s:36:\"project/([^/]+)/page/?([0-9]{1,})/?$\";s:47:\"index.php?project=$matches[1]&paged=$matches[2]\";s:43:\"project/([^/]+)/comment-page-([0-9]{1,})/?$\";s:47:\"index.php?project=$matches[1]&cpage=$matches[2]\";s:33:\"project/([^/]+)/wc-api(/(.*))?/?$\";s:48:\"index.php?project=$matches[1]&wc-api=$matches[3]\";s:39:\"project/[^/]+/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:50:\"project/[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:32:\"project/([^/]+)(?:/([0-9]+))?/?$\";s:46:\"index.php?project=$matches[1]&page=$matches[2]\";s:24:\"project/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:34:\"project/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:54:\"project/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:49:\"project/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:49:\"project/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:30:\"project/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:57:\"project_category/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:55:\"index.php?project_category=$matches[1]&feed=$matches[2]\";s:52:\"project_category/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:55:\"index.php?project_category=$matches[1]&feed=$matches[2]\";s:33:\"project_category/([^/]+)/embed/?$\";s:49:\"index.php?project_category=$matches[1]&embed=true\";s:45:\"project_category/([^/]+)/page/?([0-9]{1,})/?$\";s:56:\"index.php?project_category=$matches[1]&paged=$matches[2]\";s:27:\"project_category/([^/]+)/?$\";s:38:\"index.php?project_category=$matches[1]\";s:52:\"project_tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?project_tag=$matches[1]&feed=$matches[2]\";s:47:\"project_tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?project_tag=$matches[1]&feed=$matches[2]\";s:28:\"project_tag/([^/]+)/embed/?$\";s:44:\"index.php?project_tag=$matches[1]&embed=true\";s:40:\"project_tag/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?project_tag=$matches[1]&paged=$matches[2]\";s:22:\"project_tag/([^/]+)/?$\";s:33:\"index.php?project_tag=$matches[1]\";s:57:\"categoria-producto/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?product_cat=$matches[1]&feed=$matches[2]\";s:52:\"categoria-producto/(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?product_cat=$matches[1]&feed=$matches[2]\";s:33:\"categoria-producto/(.+?)/embed/?$\";s:44:\"index.php?product_cat=$matches[1]&embed=true\";s:45:\"categoria-producto/(.+?)/page/?([0-9]{1,})/?$\";s:51:\"index.php?product_cat=$matches[1]&paged=$matches[2]\";s:27:\"categoria-producto/(.+?)/?$\";s:33:\"index.php?product_cat=$matches[1]\";s:58:\"etiqueta-producto/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?product_tag=$matches[1]&feed=$matches[2]\";s:53:\"etiqueta-producto/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?product_tag=$matches[1]&feed=$matches[2]\";s:34:\"etiqueta-producto/([^/]+)/embed/?$\";s:44:\"index.php?product_tag=$matches[1]&embed=true\";s:46:\"etiqueta-producto/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?product_tag=$matches[1]&paged=$matches[2]\";s:28:\"etiqueta-producto/([^/]+)/?$\";s:33:\"index.php?product_tag=$matches[1]\";s:36:\"producto/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:46:\"producto/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:66:\"producto/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:61:\"producto/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:61:\"producto/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:42:\"producto/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:25:\"producto/([^/]+)/embed/?$\";s:40:\"index.php?product=$matches[1]&embed=true\";s:29:\"producto/([^/]+)/trackback/?$\";s:34:\"index.php?product=$matches[1]&tb=1\";s:49:\"producto/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:46:\"index.php?product=$matches[1]&feed=$matches[2]\";s:44:\"producto/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:46:\"index.php?product=$matches[1]&feed=$matches[2]\";s:37:\"producto/([^/]+)/page/?([0-9]{1,})/?$\";s:47:\"index.php?product=$matches[1]&paged=$matches[2]\";s:44:\"producto/([^/]+)/comment-page-([0-9]{1,})/?$\";s:47:\"index.php?product=$matches[1]&cpage=$matches[2]\";s:34:\"producto/([^/]+)/wc-api(/(.*))?/?$\";s:48:\"index.php?product=$matches[1]&wc-api=$matches[3]\";s:40:\"producto/[^/]+/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:51:\"producto/[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:33:\"producto/([^/]+)(?:/([0-9]+))?/?$\";s:46:\"index.php?product=$matches[1]&page=$matches[2]\";s:25:\"producto/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:35:\"producto/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:55:\"producto/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:50:\"producto/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:50:\"producto/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:31:\"producto/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:12:\"robots\\.txt$\";s:18:\"index.php?robots=1\";s:48:\".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$\";s:18:\"index.php?feed=old\";s:20:\".*wp-app\\.php(/.*)?$\";s:19:\"index.php?error=403\";s:18:\".*wp-register.php$\";s:23:\"index.php?register=true\";s:32:\"feed/(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:27:\"(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:8:\"embed/?$\";s:21:\"index.php?&embed=true\";s:20:\"page/?([0-9]{1,})/?$\";s:28:\"index.php?&paged=$matches[1]\";s:17:\"wc-api(/(.*))?/?$\";s:29:\"index.php?&wc-api=$matches[2]\";s:41:\"comments/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:36:\"comments/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:17:\"comments/embed/?$\";s:21:\"index.php?&embed=true\";s:26:\"comments/wc-api(/(.*))?/?$\";s:29:\"index.php?&wc-api=$matches[2]\";s:44:\"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:39:\"search/(.+)/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:20:\"search/(.+)/embed/?$\";s:34:\"index.php?s=$matches[1]&embed=true\";s:32:\"search/(.+)/page/?([0-9]{1,})/?$\";s:41:\"index.php?s=$matches[1]&paged=$matches[2]\";s:29:\"search/(.+)/wc-api(/(.*))?/?$\";s:42:\"index.php?s=$matches[1]&wc-api=$matches[3]\";s:14:\"search/(.+)/?$\";s:23:\"index.php?s=$matches[1]\";s:47:\"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:42:\"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:23:\"author/([^/]+)/embed/?$\";s:44:\"index.php?author_name=$matches[1]&embed=true\";s:35:\"author/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?author_name=$matches[1]&paged=$matches[2]\";s:32:\"author/([^/]+)/wc-api(/(.*))?/?$\";s:52:\"index.php?author_name=$matches[1]&wc-api=$matches[3]\";s:17:\"author/([^/]+)/?$\";s:33:\"index.php?author_name=$matches[1]\";s:69:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:45:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$\";s:74:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]\";s:54:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/wc-api(/(.*))?/?$\";s:82:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&wc-api=$matches[5]\";s:39:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$\";s:63:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]\";s:56:\"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:51:\"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:32:\"([0-9]{4})/([0-9]{1,2})/embed/?$\";s:58:\"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true\";s:44:\"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]\";s:41:\"([0-9]{4})/([0-9]{1,2})/wc-api(/(.*))?/?$\";s:66:\"index.php?year=$matches[1]&monthnum=$matches[2]&wc-api=$matches[4]\";s:26:\"([0-9]{4})/([0-9]{1,2})/?$\";s:47:\"index.php?year=$matches[1]&monthnum=$matches[2]\";s:43:\"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:38:\"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:19:\"([0-9]{4})/embed/?$\";s:37:\"index.php?year=$matches[1]&embed=true\";s:31:\"([0-9]{4})/page/?([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&paged=$matches[2]\";s:28:\"([0-9]{4})/wc-api(/(.*))?/?$\";s:45:\"index.php?year=$matches[1]&wc-api=$matches[3]\";s:13:\"([0-9]{4})/?$\";s:26:\"index.php?year=$matches[1]\";s:58:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:68:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:88:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:83:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:83:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:64:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:53:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/embed/?$\";s:91:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/trackback/?$\";s:85:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&tb=1\";s:77:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]\";s:72:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]\";s:65:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/page/?([0-9]{1,})/?$\";s:98:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&paged=$matches[5]\";s:72:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/comment-page-([0-9]{1,})/?$\";s:98:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&cpage=$matches[5]\";s:62:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/wc-api(/(.*))?/?$\";s:99:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&wc-api=$matches[6]\";s:62:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:73:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:61:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)(?:/([0-9]+))?/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&page=$matches[5]\";s:47:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:57:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:77:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:72:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:72:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:53:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&cpage=$matches[4]\";s:51:\"([0-9]{4})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&cpage=$matches[3]\";s:38:\"([0-9]{4})/comment-page-([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&cpage=$matches[2]\";s:27:\".?.+?/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\".?.+?/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\".?.+?/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:16:\"(.?.+?)/embed/?$\";s:41:\"index.php?pagename=$matches[1]&embed=true\";s:20:\"(.?.+?)/trackback/?$\";s:35:\"index.php?pagename=$matches[1]&tb=1\";s:40:\"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:35:\"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:28:\"(.?.+?)/page/?([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&paged=$matches[2]\";s:35:\"(.?.+?)/comment-page-([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&cpage=$matches[2]\";s:25:\"(.?.+?)/wc-api(/(.*))?/?$\";s:49:\"index.php?pagename=$matches[1]&wc-api=$matches[3]\";s:28:\"(.?.+?)/order-pay(/(.*))?/?$\";s:52:\"index.php?pagename=$matches[1]&order-pay=$matches[3]\";s:33:\"(.?.+?)/order-received(/(.*))?/?$\";s:57:\"index.php?pagename=$matches[1]&order-received=$matches[3]\";s:25:\"(.?.+?)/orders(/(.*))?/?$\";s:49:\"index.php?pagename=$matches[1]&orders=$matches[3]\";s:29:\"(.?.+?)/view-order(/(.*))?/?$\";s:53:\"index.php?pagename=$matches[1]&view-order=$matches[3]\";s:28:\"(.?.+?)/downloads(/(.*))?/?$\";s:52:\"index.php?pagename=$matches[1]&downloads=$matches[3]\";s:31:\"(.?.+?)/edit-account(/(.*))?/?$\";s:55:\"index.php?pagename=$matches[1]&edit-account=$matches[3]\";s:31:\"(.?.+?)/edit-address(/(.*))?/?$\";s:55:\"index.php?pagename=$matches[1]&edit-address=$matches[3]\";s:34:\"(.?.+?)/payment-methods(/(.*))?/?$\";s:58:\"index.php?pagename=$matches[1]&payment-methods=$matches[3]\";s:32:\"(.?.+?)/lost-password(/(.*))?/?$\";s:56:\"index.php?pagename=$matches[1]&lost-password=$matches[3]\";s:34:\"(.?.+?)/customer-logout(/(.*))?/?$\";s:58:\"index.php?pagename=$matches[1]&customer-logout=$matches[3]\";s:37:\"(.?.+?)/add-payment-method(/(.*))?/?$\";s:61:\"index.php?pagename=$matches[1]&add-payment-method=$matches[3]\";s:40:\"(.?.+?)/delete-payment-method(/(.*))?/?$\";s:64:\"index.php?pagename=$matches[1]&delete-payment-method=$matches[3]\";s:45:\"(.?.+?)/set-default-payment-method(/(.*))?/?$\";s:69:\"index.php?pagename=$matches[1]&set-default-payment-method=$matches[3]\";s:31:\".?.+?/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:42:\".?.+?/attachment/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:24:\"(.?.+?)(?:/([0-9]+))?/?$\";s:47:\"index.php?pagename=$matches[1]&page=$matches[2]\";}', 'yes'),
(30, 'hack_file', '0', 'yes'),
(31, 'blog_charset', 'UTF-8', 'yes'),
(32, 'moderation_keys', '', 'no'),
(33, 'active_plugins', 'a:12:{i:0;s:25:\"adminimize/adminimize.php\";i:1;s:31:\"code-snippets/code-snippets.php\";i:2;s:39:\"disable-gutenberg/disable-gutenberg.php\";i:3;s:29:\"divi-ghoster/divi-ghoster.php\";i:4;s:33:\"nav-menu-roles/nav-menu-roles.php\";i:5;s:47:\"really-simple-ssl/rlrsssl-really-simple-ssl.php\";i:6;s:51:\"simple-google-recaptcha/simple-google-recaptcha.php\";i:7;s:39:\"ultimate-branding/ultimate-branding.php\";i:8;s:46:\"under-construction-page/under-construction.php\";i:9;s:45:\"woocommerce-branding/woocommerce-branding.php\";i:10;s:27:\"woocommerce/woocommerce.php\";i:11;s:33:\"wps-hide-login/wps-hide-login.php\";}', 'yes'),
(34, 'category_base', '', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(36, 'comment_max_links', '2', 'yes'),
(37, 'gmt_offset', '0', 'yes'),
(38, 'default_email_category', '1', 'yes'),
(39, 'recently_edited', '', 'no'),
(40, 'template', 'Divi', 'yes'),
(41, 'stylesheet', 'Divi', 'yes'),
(42, 'comment_whitelist', '1', 'yes'),
(43, 'blacklist_keys', '', 'no'),
(44, 'comment_registration', '0', 'yes'),
(45, 'html_type', 'text/html', 'yes'),
(46, 'use_trackback', '0', 'yes'),
(47, 'default_role', 'subscriber', 'yes'),
(48, 'db_version', '45805', 'yes'),
(49, 'uploads_use_yearmonth_folders', '1', 'yes'),
(50, 'upload_path', '', 'yes'),
(51, 'blog_public', '1', 'yes'),
(52, 'default_link_category', '2', 'yes'),
(53, 'show_on_front', 'posts', 'yes'),
(54, 'tag_base', '', 'yes'),
(55, 'show_avatars', '1', 'yes'),
(56, 'avatar_rating', 'G', 'yes'),
(57, 'upload_url_path', '', 'yes'),
(58, 'thumbnail_size_w', '150', 'yes'),
(59, 'thumbnail_size_h', '150', 'yes'),
(60, 'thumbnail_crop', '1', 'yes'),
(61, 'medium_size_w', '300', 'yes'),
(62, 'medium_size_h', '300', 'yes'),
(63, 'avatar_default', 'mystery', 'yes'),
(64, 'large_size_w', '1024', 'yes'),
(65, 'large_size_h', '1024', 'yes'),
(66, 'image_default_link_type', 'none', 'yes'),
(67, 'image_default_size', '', 'yes'),
(68, 'image_default_align', '', 'yes'),
(69, 'close_comments_for_old_posts', '0', 'yes'),
(70, 'close_comments_days_old', '14', 'yes'),
(71, 'thread_comments', '1', 'yes'),
(72, 'thread_comments_depth', '5', 'yes'),
(73, 'page_comments', '0', 'yes'),
(74, 'comments_per_page', '50', 'yes'),
(75, 'default_comments_page', 'newest', 'yes'),
(76, 'comment_order', 'asc', 'yes'),
(77, 'sticky_posts', 'a:0:{}', 'yes'),
(78, 'widget_categories', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(79, 'widget_text', 'a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}', 'yes'),
(80, 'widget_rss', 'a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}', 'yes'),
(81, 'uninstall_plugins', 'a:2:{s:25:\"adminimize/adminimize.php\";s:24:\"_mw_adminimize_uninstall\";s:46:\"under-construction-page/under-construction.php\";a:2:{i:0;s:3:\"UCP\";i:1;s:9:\"uninstall\";}}', 'no'),
(82, 'timezone_string', '', 'yes'),
(83, 'page_for_posts', '0', 'yes'),
(84, 'page_on_front', '0', 'yes'),
(85, 'default_post_format', '0', 'yes'),
(86, 'link_manager_enabled', '0', 'yes'),
(87, 'finished_splitting_shared_terms', '1', 'yes'),
(88, 'site_icon', '22', 'yes'),
(89, 'medium_large_size_w', '768', 'yes'),
(90, 'medium_large_size_h', '0', 'yes'),
(91, 'wp_page_for_privacy_policy', '3', 'yes'),
(92, 'show_comments_cookies_opt_in', '1', 'yes'),
(93, 'admin_email_lifespan', '1600805135', 'yes'),
(94, 'initial_db_version', '45805', 'yes'),
(95, 'wp98_user_roles', 'a:7:{s:13:\"administrator\";a:2:{s:4:\"name\";s:13:\"Administrator\";s:12:\"capabilities\";a:114:{s:13:\"switch_themes\";b:1;s:11:\"edit_themes\";b:1;s:16:\"activate_plugins\";b:1;s:12:\"edit_plugins\";b:1;s:10:\"edit_users\";b:1;s:10:\"edit_files\";b:1;s:14:\"manage_options\";b:1;s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:6:\"import\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:8:\"level_10\";b:1;s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:12:\"delete_users\";b:1;s:12:\"create_users\";b:1;s:17:\"unfiltered_upload\";b:1;s:14:\"edit_dashboard\";b:1;s:14:\"update_plugins\";b:1;s:14:\"delete_plugins\";b:1;s:15:\"install_plugins\";b:1;s:13:\"update_themes\";b:1;s:14:\"install_themes\";b:1;s:11:\"update_core\";b:1;s:10:\"list_users\";b:1;s:12:\"remove_users\";b:1;s:13:\"promote_users\";b:1;s:18:\"edit_theme_options\";b:1;s:13:\"delete_themes\";b:1;s:6:\"export\";b:1;s:18:\"manage_woocommerce\";b:1;s:24:\"view_woocommerce_reports\";b:1;s:12:\"edit_product\";b:1;s:12:\"read_product\";b:1;s:14:\"delete_product\";b:1;s:13:\"edit_products\";b:1;s:20:\"edit_others_products\";b:1;s:16:\"publish_products\";b:1;s:21:\"read_private_products\";b:1;s:15:\"delete_products\";b:1;s:23:\"delete_private_products\";b:1;s:25:\"delete_published_products\";b:1;s:22:\"delete_others_products\";b:1;s:21:\"edit_private_products\";b:1;s:23:\"edit_published_products\";b:1;s:20:\"manage_product_terms\";b:1;s:18:\"edit_product_terms\";b:1;s:20:\"delete_product_terms\";b:1;s:20:\"assign_product_terms\";b:1;s:15:\"edit_shop_order\";b:1;s:15:\"read_shop_order\";b:1;s:17:\"delete_shop_order\";b:1;s:16:\"edit_shop_orders\";b:1;s:23:\"edit_others_shop_orders\";b:1;s:19:\"publish_shop_orders\";b:1;s:24:\"read_private_shop_orders\";b:1;s:18:\"delete_shop_orders\";b:1;s:26:\"delete_private_shop_orders\";b:1;s:28:\"delete_published_shop_orders\";b:1;s:25:\"delete_others_shop_orders\";b:1;s:24:\"edit_private_shop_orders\";b:1;s:26:\"edit_published_shop_orders\";b:1;s:23:\"manage_shop_order_terms\";b:1;s:21:\"edit_shop_order_terms\";b:1;s:23:\"delete_shop_order_terms\";b:1;s:23:\"assign_shop_order_terms\";b:1;s:16:\"edit_shop_coupon\";b:1;s:16:\"read_shop_coupon\";b:1;s:18:\"delete_shop_coupon\";b:1;s:17:\"edit_shop_coupons\";b:1;s:24:\"edit_others_shop_coupons\";b:1;s:20:\"publish_shop_coupons\";b:1;s:25:\"read_private_shop_coupons\";b:1;s:19:\"delete_shop_coupons\";b:1;s:27:\"delete_private_shop_coupons\";b:1;s:29:\"delete_published_shop_coupons\";b:1;s:26:\"delete_others_shop_coupons\";b:1;s:25:\"edit_private_shop_coupons\";b:1;s:27:\"edit_published_shop_coupons\";b:1;s:24:\"manage_shop_coupon_terms\";b:1;s:22:\"edit_shop_coupon_terms\";b:1;s:24:\"delete_shop_coupon_terms\";b:1;s:24:\"assign_shop_coupon_terms\";b:1;}}s:6:\"editor\";a:2:{s:4:\"name\";s:6:\"Editor\";s:12:\"capabilities\";a:34:{s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;}}s:6:\"author\";a:2:{s:4:\"name\";s:6:\"Author\";s:12:\"capabilities\";a:10:{s:12:\"upload_files\";b:1;s:10:\"edit_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;s:22:\"delete_published_posts\";b:1;}}s:11:\"contributor\";a:2:{s:4:\"name\";s:11:\"Contributor\";s:12:\"capabilities\";a:5:{s:10:\"edit_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;}}s:10:\"subscriber\";a:2:{s:4:\"name\";s:10:\"Subscriber\";s:12:\"capabilities\";a:2:{s:4:\"read\";b:1;s:7:\"level_0\";b:1;}}s:8:\"customer\";a:2:{s:4:\"name\";s:8:\"Customer\";s:12:\"capabilities\";a:1:{s:4:\"read\";b:1;}}s:12:\"shop_manager\";a:2:{s:4:\"name\";s:12:\"Shop manager\";s:12:\"capabilities\";a:92:{s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:4:\"read\";b:1;s:18:\"read_private_pages\";b:1;s:18:\"read_private_posts\";b:1;s:10:\"edit_posts\";b:1;s:10:\"edit_pages\";b:1;s:20:\"edit_published_posts\";b:1;s:20:\"edit_published_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"edit_private_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:17:\"edit_others_pages\";b:1;s:13:\"publish_posts\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_posts\";b:1;s:12:\"delete_pages\";b:1;s:20:\"delete_private_pages\";b:1;s:20:\"delete_private_posts\";b:1;s:22:\"delete_published_pages\";b:1;s:22:\"delete_published_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:19:\"delete_others_pages\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:17:\"moderate_comments\";b:1;s:12:\"upload_files\";b:1;s:6:\"export\";b:1;s:6:\"import\";b:1;s:10:\"list_users\";b:1;s:18:\"edit_theme_options\";b:1;s:18:\"manage_woocommerce\";b:1;s:24:\"view_woocommerce_reports\";b:1;s:12:\"edit_product\";b:1;s:12:\"read_product\";b:1;s:14:\"delete_product\";b:1;s:13:\"edit_products\";b:1;s:20:\"edit_others_products\";b:1;s:16:\"publish_products\";b:1;s:21:\"read_private_products\";b:1;s:15:\"delete_products\";b:1;s:23:\"delete_private_products\";b:1;s:25:\"delete_published_products\";b:1;s:22:\"delete_others_products\";b:1;s:21:\"edit_private_products\";b:1;s:23:\"edit_published_products\";b:1;s:20:\"manage_product_terms\";b:1;s:18:\"edit_product_terms\";b:1;s:20:\"delete_product_terms\";b:1;s:20:\"assign_product_terms\";b:1;s:15:\"edit_shop_order\";b:1;s:15:\"read_shop_order\";b:1;s:17:\"delete_shop_order\";b:1;s:16:\"edit_shop_orders\";b:1;s:23:\"edit_others_shop_orders\";b:1;s:19:\"publish_shop_orders\";b:1;s:24:\"read_private_shop_orders\";b:1;s:18:\"delete_shop_orders\";b:1;s:26:\"delete_private_shop_orders\";b:1;s:28:\"delete_published_shop_orders\";b:1;s:25:\"delete_others_shop_orders\";b:1;s:24:\"edit_private_shop_orders\";b:1;s:26:\"edit_published_shop_orders\";b:1;s:23:\"manage_shop_order_terms\";b:1;s:21:\"edit_shop_order_terms\";b:1;s:23:\"delete_shop_order_terms\";b:1;s:23:\"assign_shop_order_terms\";b:1;s:16:\"edit_shop_coupon\";b:1;s:16:\"read_shop_coupon\";b:1;s:18:\"delete_shop_coupon\";b:1;s:17:\"edit_shop_coupons\";b:1;s:24:\"edit_others_shop_coupons\";b:1;s:20:\"publish_shop_coupons\";b:1;s:25:\"read_private_shop_coupons\";b:1;s:19:\"delete_shop_coupons\";b:1;s:27:\"delete_private_shop_coupons\";b:1;s:29:\"delete_published_shop_coupons\";b:1;s:26:\"delete_others_shop_coupons\";b:1;s:25:\"edit_private_shop_coupons\";b:1;s:27:\"edit_published_shop_coupons\";b:1;s:24:\"manage_shop_coupon_terms\";b:1;s:22:\"edit_shop_coupon_terms\";b:1;s:24:\"delete_shop_coupon_terms\";b:1;s:24:\"assign_shop_coupon_terms\";b:1;}}}', 'yes'),
(96, 'fresh_site', '0', 'yes'),
(97, 'widget_search', 'a:2:{i:2;a:1:{s:5:\"title\";s:0:\"\";}s:12:\"_multiwidget\";i:1;}', 'yes'),
(98, 'widget_recent-posts', 'a:2:{i:2;a:2:{s:5:\"title\";s:0:\"\";s:6:\"number\";i:5;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(99, 'widget_recent-comments', 'a:2:{i:2;a:2:{s:5:\"title\";s:0:\"\";s:6:\"number\";i:5;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(100, 'widget_archives', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(101, 'widget_meta', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(102, 'sidebars_widgets', 'a:9:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:3:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";}s:9:\"sidebar-2\";a:0:{}s:9:\"sidebar-3\";a:0:{}s:9:\"sidebar-4\";a:0:{}s:9:\"sidebar-5\";a:0:{}s:9:\"sidebar-6\";a:0:{}s:9:\"sidebar-7\";a:0:{}s:13:\"array_version\";i:3;}', 'yes'),
(103, 'cron', 'a:20:{i:1596586179;a:1:{s:26:\"action_scheduler_run_queue\";a:1:{s:32:\"0d04ed39571b55704c122d726248bbac\";a:3:{s:8:\"schedule\";s:12:\"every_minute\";s:4:\"args\";a:1:{i:0;s:7:\"WP Cron\";}s:8:\"interval\";i:60;}}}i:1596587736;a:1:{s:33:\"wc_admin_process_orders_milestone\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"hourly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:3600;}}}i:1596587741;a:1:{s:29:\"wc_admin_unsnooze_admin_notes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"hourly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:3600;}}}i:1596589622;a:1:{s:34:\"wp_privacy_delete_old_export_files\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"hourly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:3600;}}}i:1596589776;a:1:{s:32:\"woocommerce_cancel_unpaid_orders\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:2:{s:8:\"schedule\";b:0;s:4:\"args\";a:0:{}}}}i:1596604454;a:1:{s:22:\"wpmudev_scheduled_jobs\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1596614735;a:3:{s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1596618867;a:1:{s:33:\"check_plugin_updates-divi-ghoster\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1596625904;a:1:{s:28:\"woocommerce_cleanup_sessions\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1596647514;a:2:{s:33:\"woocommerce_cleanup_personal_data\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}s:30:\"woocommerce_tracker_send_event\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1596657935;a:1:{s:32:\"recovery_mode_clean_expired_keys\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1596657989;a:2:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}s:25:\"delete_expired_transients\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1596657990;a:1:{s:30:\"wp_scheduled_auto_draft_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1596658304;a:1:{s:24:\"woocommerce_cleanup_logs\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1596659736;a:1:{s:14:\"wc_admin_daily\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1596662631;a:1:{s:21:\"et_builder_fonts_cron\";a:1:{s:32:\"552cbb9d6515dadbbc4718ad75114f08\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:1:{s:8:\"interval\";s:5:\"daily\";}s:8:\"interval\";i:86400;}}}i:1596672000;a:1:{s:27:\"woocommerce_scheduled_sales\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1596820364;a:1:{s:25:\"woocommerce_geoip_updater\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:11:\"fifteendays\";s:4:\"args\";a:0:{}s:8:\"interval\";i:1296000;}}}i:1598390041;a:1:{s:32:\"et_core_page_resource_auto_clear\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:7:\"monthly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:2635200;}}}s:7:\"version\";i:2;}', 'yes'),
(104, 'widget_pages', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(105, 'widget_calendar', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(106, 'widget_media_audio', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(107, 'widget_media_image', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(108, 'widget_media_gallery', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(109, 'widget_media_video', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(110, 'widget_tag_cloud', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(111, 'widget_nav_menu', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(112, 'widget_custom_html', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(113, 'recovery_keys', 'a:0:{}', 'yes'),
(114, 'theme_mods_twentytwenty', 'a:3:{s:18:\"custom_css_post_id\";i:-1;s:16:\"background_color\";s:3:\"fff\";s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1585257240;s:4:\"data\";a:3:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:3:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";}s:9:\"sidebar-2\";a:3:{i:0;s:10:\"archives-2\";i:1;s:12:\"categories-2\";i:2;s:6:\"meta-2\";}}}}', 'yes'),
(21376, '_site_transient_timeout_theme_roots', '1596587976', 'no'),
(21377, '_site_transient_theme_roots', 'a:6:{s:4:\"Divi\";s:7:\"/themes\";s:10:\"ghost_divi\";s:7:\"/themes\";s:14:\"twentynineteen\";s:7:\"/themes\";s:15:\"twentyseventeen\";s:7:\"/themes\";s:13:\"twentysixteen\";s:7:\"/themes\";s:12:\"twentytwenty\";s:7:\"/themes\";}', 'no'),
(21378, '_transient_timeout__woocommerce_helper_updates', '1596629376', 'no'),
(21379, '_transient__woocommerce_helper_updates', 'a:4:{s:4:\"hash\";s:32:\"2b07b128970885cf30d5311be8a6d9bc\";s:7:\"updated\";i:1596586176;s:8:\"products\";a:0:{}s:6:\"errors\";a:1:{i:0;s:10:\"http-error\";}}', 'no');
INSERT INTO `wp98_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(154, 'mw_adminimize', 'a:132:{s:29:\"mw_adminimize_admin_bar_nodes\";a:30:{s:12:\"user-actions\";O:8:\"stdClass\":6:{s:2:\"id\";s:12:\"user-actions\";s:5:\"title\";b:0;s:6:\"parent\";s:10:\"my-account\";s:4:\"href\";b:0;s:5:\"group\";b:1;s:4:\"meta\";a:0:{}}s:9:\"user-info\";O:8:\"stdClass\":6:{s:2:\"id\";s:9:\"user-info\";s:5:\"title\";s:360:\"<img alt=\'\' src=\'https://secure.gravatar.com/avatar/b7999da42ed48b2d790650d53dfd67f6?s=64&#038;d=mm&#038;r=g\' srcset=\'https://secure.gravatar.com/avatar/b7999da42ed48b2d790650d53dfd67f6?s=128&#038;d=mm&#038;r=g 2x\' class=\'avatar avatar-64 photo\' height=\'64\' width=\'64\' /><span class=\'display-name\'>Shapinetwork</span><span class=\'username\'>shapinetadmin</span>\";s:6:\"parent\";s:12:\"user-actions\";s:4:\"href\";s:45:\"https://shapinetwork.com/wp-admin/profile.php\";s:5:\"group\";b:0;s:4:\"meta\";a:1:{s:8:\"tabindex\";i:-1;}}s:12:\"edit-profile\";O:8:\"stdClass\":6:{s:2:\"id\";s:12:\"edit-profile\";s:5:\"title\";s:16:\"Editar mi perfil\";s:6:\"parent\";s:12:\"user-actions\";s:4:\"href\";s:45:\"https://shapinetwork.com/wp-admin/profile.php\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:6:\"logout\";O:8:\"stdClass\":6:{s:2:\"id\";s:6:\"logout\";s:5:\"title\";s:5:\"Salir\";s:6:\"parent\";s:12:\"user-actions\";s:4:\"href\";s:69:\"https://shapinetwork.com/login/?action=logout&amp;_wpnonce=077e3f3812\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:11:\"menu-toggle\";O:8:\"stdClass\":6:{s:2:\"id\";s:11:\"menu-toggle\";s:5:\"title\";s:74:\"<span class=\"ab-icon\"></span><span class=\"screen-reader-text\">Menú</span>\";s:6:\"parent\";b:0;s:4:\"href\";s:1:\"#\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:10:\"my-account\";O:8:\"stdClass\":6:{s:2:\"id\";s:10:\"my-account\";s:5:\"title\";s:322:\"Hola, <span class=\"display-name\">Shapinetwork</span><img alt=\'\' src=\'https://secure.gravatar.com/avatar/b7999da42ed48b2d790650d53dfd67f6?s=26&#038;d=mm&#038;r=g\' srcset=\'https://secure.gravatar.com/avatar/b7999da42ed48b2d790650d53dfd67f6?s=52&#038;d=mm&#038;r=g 2x\' class=\'avatar avatar-26 photo\' height=\'26\' width=\'26\' />\";s:6:\"parent\";s:13:\"top-secondary\";s:4:\"href\";s:45:\"https://shapinetwork.com/wp-admin/profile.php\";s:5:\"group\";b:0;s:4:\"meta\";a:1:{s:5:\"class\";s:11:\"with-avatar\";}}s:5:\"about\";O:8:\"stdClass\":6:{s:2:\"id\";s:5:\"about\";s:5:\"title\";s:19:\"Acerca de WordPress\";s:6:\"parent\";s:7:\"wp-logo\";s:4:\"href\";s:43:\"https://shapinetwork.com/wp-admin/about.php\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:5:\"wporg\";O:8:\"stdClass\":6:{s:2:\"id\";s:5:\"wporg\";s:5:\"title\";s:13:\"WordPress.org\";s:6:\"parent\";s:16:\"wp-logo-external\";s:4:\"href\";s:25:\"https://es.wordpress.org/\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:13:\"documentation\";O:8:\"stdClass\":6:{s:2:\"id\";s:13:\"documentation\";s:5:\"title\";s:14:\"Documentación\";s:6:\"parent\";s:16:\"wp-logo-external\";s:4:\"href\";s:28:\"https://codex.wordpress.org/\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:14:\"support-forums\";O:8:\"stdClass\":6:{s:2:\"id\";s:14:\"support-forums\";s:5:\"title\";s:7:\"Soporte\";s:6:\"parent\";s:16:\"wp-logo-external\";s:4:\"href\";s:33:\"https://es.wordpress.org/support/\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:8:\"feedback\";O:8:\"stdClass\":6:{s:2:\"id\";s:8:\"feedback\";s:5:\"title\";s:11:\"Sugerencias\";s:6:\"parent\";s:16:\"wp-logo-external\";s:4:\"href\";s:71:\"https://es.wordpress.org/support/forum/comunidad/peticiones-y-feedback/\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:9:\"site-name\";O:8:\"stdClass\":6:{s:2:\"id\";s:9:\"site-name\";s:5:\"title\";s:12:\"shapinetwork\";s:6:\"parent\";b:0;s:4:\"href\";s:25:\"https://shapinetwork.com/\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:9:\"view-site\";O:8:\"stdClass\":6:{s:2:\"id\";s:9:\"view-site\";s:5:\"title\";s:16:\"Visitar el sitio\";s:6:\"parent\";s:9:\"site-name\";s:4:\"href\";s:25:\"https://shapinetwork.com/\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:10:\"view-store\";O:8:\"stdClass\":6:{s:2:\"id\";s:10:\"view-store\";s:5:\"title\";s:17:\"Visitar la tienda\";s:6:\"parent\";s:9:\"site-name\";s:4:\"href\";s:32:\"https://shapinetwork.com/tienda/\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:8:\"comments\";O:8:\"stdClass\":6:{s:2:\"id\";s:8:\"comments\";s:5:\"title\";s:210:\"<span class=\"ab-icon\"></span><span class=\"ab-label awaiting-mod pending-count count-0\" aria-hidden=\"true\">0</span><span class=\"screen-reader-text comments-in-moderation-text\">0 comentarios en moderación</span>\";s:6:\"parent\";b:0;s:4:\"href\";s:51:\"https://shapinetwork.com/wp-admin/edit-comments.php\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:8:\"new-post\";O:8:\"stdClass\":6:{s:2:\"id\";s:8:\"new-post\";s:5:\"title\";s:7:\"Entrada\";s:6:\"parent\";s:11:\"new-content\";s:4:\"href\";s:46:\"https://shapinetwork.com/wp-admin/post-new.php\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:9:\"new-media\";O:8:\"stdClass\":6:{s:2:\"id\";s:9:\"new-media\";s:5:\"title\";s:5:\"Medio\";s:6:\"parent\";s:11:\"new-content\";s:4:\"href\";s:47:\"https://shapinetwork.com/wp-admin/media-new.php\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:8:\"new-page\";O:8:\"stdClass\":6:{s:2:\"id\";s:8:\"new-page\";s:5:\"title\";s:7:\"Página\";s:6:\"parent\";s:11:\"new-content\";s:4:\"href\";s:61:\"https://shapinetwork.com/wp-admin/post-new.php?post_type=page\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:11:\"new-project\";O:8:\"stdClass\":6:{s:2:\"id\";s:11:\"new-project\";s:5:\"title\";s:8:\"Proyecto\";s:6:\"parent\";s:11:\"new-content\";s:4:\"href\";s:64:\"https://shapinetwork.com/wp-admin/post-new.php?post_type=project\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:11:\"new-product\";O:8:\"stdClass\":6:{s:2:\"id\";s:11:\"new-product\";s:5:\"title\";s:8:\"Producto\";s:6:\"parent\";s:11:\"new-content\";s:4:\"href\";s:64:\"https://shapinetwork.com/wp-admin/post-new.php?post_type=product\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:14:\"new-shop_order\";O:8:\"stdClass\":6:{s:2:\"id\";s:14:\"new-shop_order\";s:5:\"title\";s:6:\"Pedido\";s:6:\"parent\";s:11:\"new-content\";s:4:\"href\";s:67:\"https://shapinetwork.com/wp-admin/post-new.php?post_type=shop_order\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:15:\"new-shop_coupon\";O:8:\"stdClass\":6:{s:2:\"id\";s:15:\"new-shop_coupon\";s:5:\"title\";s:6:\"Cupón\";s:6:\"parent\";s:11:\"new-content\";s:4:\"href\";s:68:\"https://shapinetwork.com/wp-admin/post-new.php?post_type=shop_coupon\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:8:\"new-user\";O:8:\"stdClass\":6:{s:2:\"id\";s:8:\"new-user\";s:5:\"title\";s:7:\"Usuario\";s:6:\"parent\";s:11:\"new-content\";s:4:\"href\";s:46:\"https://shapinetwork.com/wp-admin/user-new.php\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:13:\"top-secondary\";O:8:\"stdClass\":6:{s:2:\"id\";s:13:\"top-secondary\";s:5:\"title\";b:0;s:6:\"parent\";b:0;s:4:\"href\";b:0;s:5:\"group\";b:1;s:4:\"meta\";a:1:{s:5:\"class\";s:16:\"ab-top-secondary\";}}s:16:\"wp-logo-external\";O:8:\"stdClass\":6:{s:2:\"id\";s:16:\"wp-logo-external\";s:5:\"title\";b:0;s:6:\"parent\";s:7:\"wp-logo\";s:4:\"href\";b:0;s:5:\"group\";b:1;s:4:\"meta\";a:1:{s:5:\"class\";s:16:\"ab-sub-secondary\";}}s:20:\"customize-divi-theme\";O:8:\"stdClass\":6:{s:2:\"id\";s:20:\"customize-divi-theme\";s:5:\"title\";s:23:\"Personalizador de temas\";s:6:\"parent\";s:10:\"appearance\";s:4:\"href\";s:138:\"https://shapinetwork.com/wp-admin/customize.php?url=https%3A%2F%2Fshapinetwork.com%2Fwp-admin%2Fwidgets.php&et_customizer_option_set=theme\";s:5:\"group\";b:0;s:4:\"meta\";a:1:{s:5:\"class\";s:20:\"hide-if-no-customize\";}}s:23:\"under-construction-page\";O:8:\"stdClass\":6:{s:2:\"id\";s:23:\"under-construction-page\";s:5:\"title\";s:354:\"<img style=\"height: 17px; margin-bottom: -4px; padding-right: 3px;\" src=\"https://shapinetwork.com/wp-content/plugins/under-construction-page/images/ucp_icon.png\" alt=\"Modo en construcción desactivado\" title=\"Modo en construcción desactivado\"> <span class=\"ab-label\">UnderConstruction <i class=\"ucp-status-dot ucp-status-dot-disabled\">&#9679;</i></span>\";s:6:\"parent\";s:0:\"\";s:4:\"href\";s:62:\"https://shapinetwork.com/wp-admin/options-general.php?page=ucp\";s:5:\"group\";b:0;s:4:\"meta\";a:1:{s:5:\"class\";s:12:\"ucp-disabled\";}}s:10:\"ucp-status\";O:8:\"stdClass\":6:{s:2:\"id\";s:10:\"ucp-status\";s:5:\"title\";s:342:\"Modo en construcción<a href=\"https://shapinetwork.com/wp-admin/admin.php?action=ucp_change_status&amp;new_status=enabled&amp;redirect=%2Fwp-admin%2Fwidgets.php&amp;_wpnonce=be8438a189\" id=\"ucp-status-wrapper\" class=\"off\"><span id=\"ucp-status-off\" class=\"ucp-status-btn\">OFF</span><span id=\"ucp-status-on\" class=\"ucp-status-btn\">ON</span></a>\";s:6:\"parent\";s:23:\"under-construction-page\";s:4:\"href\";b:0;s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:11:\"ucp-preview\";O:8:\"stdClass\":6:{s:2:\"id\";s:11:\"ucp-preview\";s:5:\"title\";s:12:\"Vista previa\";s:6:\"parent\";s:23:\"under-construction-page\";s:4:\"href\";s:37:\"https://shapinetwork.com/?ucp_preview\";s:5:\"group\";b:0;s:4:\"meta\";a:1:{s:6:\"target\";s:5:\"blank\";}}s:12:\"ucp-settings\";O:8:\"stdClass\":6:{s:2:\"id\";s:12:\"ucp-settings\";s:5:\"title\";s:7:\"Ajustes\";s:6:\"parent\";s:23:\"under-construction-page\";s:4:\"href\";s:62:\"https://shapinetwork.com/wp-admin/options-general.php?page=ucp\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}}s:52:\"mw_adminimize_disabled_admin_bar_administrator_items\";a:0:{}s:45:\"mw_adminimize_disabled_admin_bar_editor_items\";a:0:{}s:45:\"mw_adminimize_disabled_admin_bar_author_items\";a:0:{}s:50:\"mw_adminimize_disabled_admin_bar_contributor_items\";a:0:{}s:49:\"mw_adminimize_disabled_admin_bar_subscriber_items\";a:0:{}s:47:\"mw_adminimize_disabled_admin_bar_customer_items\";a:0:{}s:51:\"mw_adminimize_disabled_admin_bar_shop_manager_items\";a:0:{}s:19:\"mw_adminimize_debug\";i:0;s:28:\"mw_adminimize_multiple_roles\";i:0;s:29:\"mw_adminimize_support_bbpress\";i:0;s:33:\"mw_adminimize_prevent_page_access\";i:0;s:38:\"mw_adminimize_admin_bar_frontend_nodes\";a:34:{s:12:\"user-actions\";O:8:\"stdClass\":6:{s:2:\"id\";s:12:\"user-actions\";s:5:\"title\";b:0;s:6:\"parent\";s:10:\"my-account\";s:4:\"href\";b:0;s:5:\"group\";b:1;s:4:\"meta\";a:0:{}}s:9:\"user-info\";O:8:\"stdClass\":6:{s:2:\"id\";s:9:\"user-info\";s:5:\"title\";s:360:\"<img alt=\'\' src=\'https://secure.gravatar.com/avatar/b7999da42ed48b2d790650d53dfd67f6?s=64&#038;d=mm&#038;r=g\' srcset=\'https://secure.gravatar.com/avatar/b7999da42ed48b2d790650d53dfd67f6?s=128&#038;d=mm&#038;r=g 2x\' class=\'avatar avatar-64 photo\' height=\'64\' width=\'64\' /><span class=\'display-name\'>Shapinetwork</span><span class=\'username\'>shapinetadmin</span>\";s:6:\"parent\";s:12:\"user-actions\";s:4:\"href\";s:45:\"https://shapinetwork.com/wp-admin/profile.php\";s:5:\"group\";b:0;s:4:\"meta\";a:1:{s:8:\"tabindex\";i:-1;}}s:12:\"edit-profile\";O:8:\"stdClass\":6:{s:2:\"id\";s:12:\"edit-profile\";s:5:\"title\";s:16:\"Editar mi perfil\";s:6:\"parent\";s:12:\"user-actions\";s:4:\"href\";s:45:\"https://shapinetwork.com/wp-admin/profile.php\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:6:\"logout\";O:8:\"stdClass\":6:{s:2:\"id\";s:6:\"logout\";s:5:\"title\";s:5:\"Salir\";s:6:\"parent\";s:12:\"user-actions\";s:4:\"href\";s:69:\"https://shapinetwork.com/login/?action=logout&amp;_wpnonce=077e3f3812\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:6:\"search\";O:8:\"stdClass\":6:{s:2:\"id\";s:6:\"search\";s:5:\"title\";s:311:\"<form action=\"https://shapinetwork.com/\" method=\"get\" id=\"adminbarsearch\"><input class=\"adminbar-input\" name=\"s\" id=\"adminbar-search\" type=\"text\" value=\"\" maxlength=\"150\" /><label for=\"adminbar-search\" class=\"screen-reader-text\">Buscar</label><input type=\"submit\" class=\"adminbar-button\" value=\"Buscar\"/></form>\";s:6:\"parent\";s:13:\"top-secondary\";s:4:\"href\";b:0;s:5:\"group\";b:0;s:4:\"meta\";a:2:{s:5:\"class\";s:16:\"admin-bar-search\";s:8:\"tabindex\";i:-1;}}s:10:\"my-account\";O:8:\"stdClass\":6:{s:2:\"id\";s:10:\"my-account\";s:5:\"title\";s:322:\"Hola, <span class=\"display-name\">Shapinetwork</span><img alt=\'\' src=\'https://secure.gravatar.com/avatar/b7999da42ed48b2d790650d53dfd67f6?s=26&#038;d=mm&#038;r=g\' srcset=\'https://secure.gravatar.com/avatar/b7999da42ed48b2d790650d53dfd67f6?s=52&#038;d=mm&#038;r=g 2x\' class=\'avatar avatar-26 photo\' height=\'26\' width=\'26\' />\";s:6:\"parent\";s:13:\"top-secondary\";s:4:\"href\";s:45:\"https://shapinetwork.com/wp-admin/profile.php\";s:5:\"group\";b:0;s:4:\"meta\";a:1:{s:5:\"class\";s:11:\"with-avatar\";}}s:5:\"about\";O:8:\"stdClass\":6:{s:2:\"id\";s:5:\"about\";s:5:\"title\";s:19:\"Acerca de WordPress\";s:6:\"parent\";s:7:\"wp-logo\";s:4:\"href\";s:43:\"https://shapinetwork.com/wp-admin/about.php\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:5:\"wporg\";O:8:\"stdClass\":6:{s:2:\"id\";s:5:\"wporg\";s:5:\"title\";s:13:\"WordPress.org\";s:6:\"parent\";s:16:\"wp-logo-external\";s:4:\"href\";s:25:\"https://es.wordpress.org/\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:13:\"documentation\";O:8:\"stdClass\":6:{s:2:\"id\";s:13:\"documentation\";s:5:\"title\";s:14:\"Documentación\";s:6:\"parent\";s:16:\"wp-logo-external\";s:4:\"href\";s:28:\"https://codex.wordpress.org/\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:14:\"support-forums\";O:8:\"stdClass\":6:{s:2:\"id\";s:14:\"support-forums\";s:5:\"title\";s:7:\"Soporte\";s:6:\"parent\";s:16:\"wp-logo-external\";s:4:\"href\";s:33:\"https://es.wordpress.org/support/\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:8:\"feedback\";O:8:\"stdClass\":6:{s:2:\"id\";s:8:\"feedback\";s:5:\"title\";s:11:\"Sugerencias\";s:6:\"parent\";s:16:\"wp-logo-external\";s:4:\"href\";s:71:\"https://es.wordpress.org/support/forum/comunidad/peticiones-y-feedback/\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:9:\"site-name\";O:8:\"stdClass\":6:{s:2:\"id\";s:9:\"site-name\";s:5:\"title\";s:12:\"shapinetwork\";s:6:\"parent\";b:0;s:4:\"href\";s:34:\"https://shapinetwork.com/wp-admin/\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:9:\"dashboard\";O:8:\"stdClass\":6:{s:2:\"id\";s:9:\"dashboard\";s:5:\"title\";s:10:\"Escritorio\";s:6:\"parent\";s:9:\"site-name\";s:4:\"href\";s:34:\"https://shapinetwork.com/wp-admin/\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:10:\"appearance\";O:8:\"stdClass\":6:{s:2:\"id\";s:10:\"appearance\";s:5:\"title\";b:0;s:6:\"parent\";s:9:\"site-name\";s:4:\"href\";b:0;s:5:\"group\";b:1;s:4:\"meta\";a:0:{}}s:6:\"themes\";O:8:\"stdClass\":6:{s:2:\"id\";s:6:\"themes\";s:5:\"title\";s:5:\"Temas\";s:6:\"parent\";s:10:\"appearance\";s:4:\"href\";s:44:\"https://shapinetwork.com/wp-admin/themes.php\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:7:\"widgets\";O:8:\"stdClass\":6:{s:2:\"id\";s:7:\"widgets\";s:5:\"title\";s:7:\"Widgets\";s:6:\"parent\";s:10:\"appearance\";s:4:\"href\";s:45:\"https://shapinetwork.com/wp-admin/widgets.php\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:5:\"menus\";O:8:\"stdClass\":6:{s:2:\"id\";s:5:\"menus\";s:5:\"title\";s:6:\"Menús\";s:6:\"parent\";s:10:\"appearance\";s:4:\"href\";s:47:\"https://shapinetwork.com/wp-admin/nav-menus.php\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:10:\"background\";O:8:\"stdClass\":6:{s:2:\"id\";s:10:\"background\";s:5:\"title\";s:5:\"Fondo\";s:6:\"parent\";s:10:\"appearance\";s:4:\"href\";s:67:\"https://shapinetwork.com/wp-admin/themes.php?page=custom-background\";s:5:\"group\";b:0;s:4:\"meta\";a:1:{s:5:\"class\";s:17:\"hide-if-customize\";}}s:8:\"comments\";O:8:\"stdClass\":6:{s:2:\"id\";s:8:\"comments\";s:5:\"title\";s:210:\"<span class=\"ab-icon\"></span><span class=\"ab-label awaiting-mod pending-count count-0\" aria-hidden=\"true\">0</span><span class=\"screen-reader-text comments-in-moderation-text\">0 comentarios en moderación</span>\";s:6:\"parent\";b:0;s:4:\"href\";s:51:\"https://shapinetwork.com/wp-admin/edit-comments.php\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:8:\"new-post\";O:8:\"stdClass\":6:{s:2:\"id\";s:8:\"new-post\";s:5:\"title\";s:7:\"Entrada\";s:6:\"parent\";s:11:\"new-content\";s:4:\"href\";s:46:\"https://shapinetwork.com/wp-admin/post-new.php\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:9:\"new-media\";O:8:\"stdClass\":6:{s:2:\"id\";s:9:\"new-media\";s:5:\"title\";s:5:\"Medio\";s:6:\"parent\";s:11:\"new-content\";s:4:\"href\";s:47:\"https://shapinetwork.com/wp-admin/media-new.php\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:8:\"new-page\";O:8:\"stdClass\":6:{s:2:\"id\";s:8:\"new-page\";s:5:\"title\";s:7:\"Página\";s:6:\"parent\";s:11:\"new-content\";s:4:\"href\";s:61:\"https://shapinetwork.com/wp-admin/post-new.php?post_type=page\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:11:\"new-project\";O:8:\"stdClass\":6:{s:2:\"id\";s:11:\"new-project\";s:5:\"title\";s:8:\"Proyecto\";s:6:\"parent\";s:11:\"new-content\";s:4:\"href\";s:64:\"https://shapinetwork.com/wp-admin/post-new.php?post_type=project\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:11:\"new-product\";O:8:\"stdClass\":6:{s:2:\"id\";s:11:\"new-product\";s:5:\"title\";s:8:\"Producto\";s:6:\"parent\";s:11:\"new-content\";s:4:\"href\";s:64:\"https://shapinetwork.com/wp-admin/post-new.php?post_type=product\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:14:\"new-shop_order\";O:8:\"stdClass\":6:{s:2:\"id\";s:14:\"new-shop_order\";s:5:\"title\";s:6:\"Pedido\";s:6:\"parent\";s:11:\"new-content\";s:4:\"href\";s:67:\"https://shapinetwork.com/wp-admin/post-new.php?post_type=shop_order\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:15:\"new-shop_coupon\";O:8:\"stdClass\":6:{s:2:\"id\";s:15:\"new-shop_coupon\";s:5:\"title\";s:6:\"Cupón\";s:6:\"parent\";s:11:\"new-content\";s:4:\"href\";s:68:\"https://shapinetwork.com/wp-admin/post-new.php?post_type=shop_coupon\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:8:\"new-user\";O:8:\"stdClass\":6:{s:2:\"id\";s:8:\"new-user\";s:5:\"title\";s:7:\"Usuario\";s:6:\"parent\";s:11:\"new-content\";s:4:\"href\";s:46:\"https://shapinetwork.com/wp-admin/user-new.php\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:13:\"top-secondary\";O:8:\"stdClass\":6:{s:2:\"id\";s:13:\"top-secondary\";s:5:\"title\";b:0;s:6:\"parent\";b:0;s:4:\"href\";b:0;s:5:\"group\";b:1;s:4:\"meta\";a:1:{s:5:\"class\";s:16:\"ab-top-secondary\";}}s:16:\"wp-logo-external\";O:8:\"stdClass\":6:{s:2:\"id\";s:16:\"wp-logo-external\";s:5:\"title\";b:0;s:6:\"parent\";s:7:\"wp-logo\";s:4:\"href\";b:0;s:5:\"group\";b:1;s:4:\"meta\";a:1:{s:5:\"class\";s:16:\"ab-sub-secondary\";}}s:20:\"customize-divi-theme\";O:8:\"stdClass\":6:{s:2:\"id\";s:20:\"customize-divi-theme\";s:5:\"title\";s:23:\"Personalizador de temas\";s:6:\"parent\";s:10:\"appearance\";s:4:\"href\";s:116:\"https://shapinetwork.com/wp-admin/customize.php?url=https%3A%2F%2Fshapinetwork.com%2F&et_customizer_option_set=theme\";s:5:\"group\";b:0;s:4:\"meta\";a:1:{s:5:\"class\";s:20:\"hide-if-no-customize\";}}s:23:\"under-construction-page\";O:8:\"stdClass\":6:{s:2:\"id\";s:23:\"under-construction-page\";s:5:\"title\";s:347:\"<img style=\"height: 17px; margin-bottom: -4px; padding-right: 3px;\" src=\"https://shapinetwork.com/wp-content/plugins/under-construction-page/images/ucp_icon.png\" alt=\"Modo en construcción activado\" title=\"Modo en construcción activado\"> <span class=\"ab-label\">UnderConstruction <i class=\"ucp-status-dot ucp-status-dot-enabled\">&#9679;</i></span>\";s:6:\"parent\";s:0:\"\";s:4:\"href\";s:62:\"https://shapinetwork.com/wp-admin/options-general.php?page=ucp\";s:5:\"group\";b:0;s:4:\"meta\";a:1:{s:5:\"class\";s:11:\"ucp-enabled\";}}s:10:\"ucp-status\";O:8:\"stdClass\":6:{s:2:\"id\";s:10:\"ucp-status\";s:5:\"title\";s:320:\"Modo en construcción<a href=\"https://shapinetwork.com/wp-admin/admin.php?action=ucp_change_status&amp;new_status=disabled&amp;redirect=%2F&amp;_wpnonce=be8438a189\" id=\"ucp-status-wrapper\" class=\"on\"><span id=\"ucp-status-off\" class=\"ucp-status-btn\">OFF</span><span id=\"ucp-status-on\" class=\"ucp-status-btn\">ON</span></a>\";s:6:\"parent\";s:23:\"under-construction-page\";s:4:\"href\";b:0;s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}s:11:\"ucp-preview\";O:8:\"stdClass\":6:{s:2:\"id\";s:11:\"ucp-preview\";s:5:\"title\";s:12:\"Vista previa\";s:6:\"parent\";s:23:\"under-construction-page\";s:4:\"href\";s:37:\"https://shapinetwork.com/?ucp_preview\";s:5:\"group\";b:0;s:4:\"meta\";a:1:{s:6:\"target\";s:5:\"blank\";}}s:12:\"ucp-settings\";O:8:\"stdClass\":6:{s:2:\"id\";s:12:\"ucp-settings\";s:5:\"title\";s:7:\"Ajustes\";s:6:\"parent\";s:23:\"under-construction-page\";s:4:\"href\";s:62:\"https://shapinetwork.com/wp-admin/options-general.php?page=ucp\";s:5:\"group\";b:0;s:4:\"meta\";a:0:{}}}s:61:\"mw_adminimize_disabled_admin_bar_frontend_administrator_items\";a:0:{}s:54:\"mw_adminimize_disabled_admin_bar_frontend_editor_items\";a:0:{}s:54:\"mw_adminimize_disabled_admin_bar_frontend_author_items\";a:0:{}s:59:\"mw_adminimize_disabled_admin_bar_frontend_contributor_items\";a:0:{}s:58:\"mw_adminimize_disabled_admin_bar_frontend_subscriber_items\";a:0:{}s:56:\"mw_adminimize_disabled_admin_bar_frontend_customer_items\";a:0:{}s:60:\"mw_adminimize_disabled_admin_bar_frontend_shop_manager_items\";a:0:{}s:24:\"_mw_adminimize_user_info\";i:0;s:21:\"_mw_adminimize_footer\";i:0;s:21:\"_mw_adminimize_header\";i:0;s:34:\"_mw_adminimize_exclude_super_admin\";i:0;s:24:\"_mw_adminimize_tb_window\";i:0;s:23:\"_mw_adminimize_cat_full\";i:0;s:26:\"_mw_adminimize_db_redirect\";i:0;s:26:\"_mw_adminimize_ui_redirect\";i:0;s:21:\"_mw_adminimize_advice\";i:0;s:25:\"_mw_adminimize_advice_txt\";s:0:\"\";s:24:\"_mw_adminimize_timestamp\";i:0;s:30:\"_mw_adminimize_db_redirect_txt\";s:0:\"\";s:47:\"mw_adminimize_disabled_menu_administrator_items\";a:0:{}s:50:\"mw_adminimize_disabled_submenu_administrator_items\";a:0:{}s:40:\"mw_adminimize_disabled_menu_editor_items\";a:0:{}s:43:\"mw_adminimize_disabled_submenu_editor_items\";a:0:{}s:40:\"mw_adminimize_disabled_menu_author_items\";a:0:{}s:43:\"mw_adminimize_disabled_submenu_author_items\";a:0:{}s:45:\"mw_adminimize_disabled_menu_contributor_items\";a:0:{}s:48:\"mw_adminimize_disabled_submenu_contributor_items\";a:0:{}s:44:\"mw_adminimize_disabled_menu_subscriber_items\";a:0:{}s:47:\"mw_adminimize_disabled_submenu_subscriber_items\";a:0:{}s:42:\"mw_adminimize_disabled_menu_customer_items\";a:0:{}s:45:\"mw_adminimize_disabled_submenu_customer_items\";a:0:{}s:46:\"mw_adminimize_disabled_menu_shop_manager_items\";a:7:{i:0;s:32:\"wc-admin&path=/analytics/revenue\";i:1;s:10:\"separator2\";i:2;s:11:\"plugins.php\";i:3;s:9:\"tools.php\";i:4;s:19:\"options-general.php\";i:5;s:14:\"separator-last\";i:6;s:21:\"et_ghost_divi_options\";}s:49:\"mw_adminimize_disabled_submenu_shop_manager_items\";a:4:{i:0;s:13:\"index.php__10\";i:1;s:14:\"woocommerce__5\";i:2;s:14:\"woocommerce__6\";i:3;s:14:\"woocommerce__7\";}s:28:\"_mw_adminimize_own_menu_slug\";s:0:\"\";s:35:\"_mw_adminimize_own_menu_custom_slug\";s:0:\"\";s:56:\"mw_adminimize_disabled_global_option_administrator_items\";a:0:{}s:57:\"mw_adminimize_disabled_metaboxes_post_administrator_items\";a:0:{}s:57:\"mw_adminimize_disabled_metaboxes_page_administrator_items\";a:0:{}s:60:\"mw_adminimize_disabled_metaboxes_project_administrator_items\";a:0:{}s:60:\"mw_adminimize_disabled_metaboxes_product_administrator_items\";a:0:{}s:54:\"mw_adminimize_disabled_link_option_administrator_items\";a:0:{}s:58:\"mw_adminimize_disabled_nav_menu_option_administrator_items\";a:0:{}s:56:\"mw_adminimize_disabled_widget_option_administrator_items\";a:0:{}s:59:\"mw_adminimize_disabled_dashboard_option_administrator_items\";a:0:{}s:49:\"mw_adminimize_disabled_global_option_editor_items\";a:0:{}s:50:\"mw_adminimize_disabled_metaboxes_post_editor_items\";a:0:{}s:50:\"mw_adminimize_disabled_metaboxes_page_editor_items\";a:0:{}s:53:\"mw_adminimize_disabled_metaboxes_project_editor_items\";a:0:{}s:53:\"mw_adminimize_disabled_metaboxes_product_editor_items\";a:0:{}s:47:\"mw_adminimize_disabled_link_option_editor_items\";a:0:{}s:51:\"mw_adminimize_disabled_nav_menu_option_editor_items\";a:0:{}s:49:\"mw_adminimize_disabled_widget_option_editor_items\";a:0:{}s:52:\"mw_adminimize_disabled_dashboard_option_editor_items\";a:0:{}s:49:\"mw_adminimize_disabled_global_option_author_items\";a:0:{}s:50:\"mw_adminimize_disabled_metaboxes_post_author_items\";a:0:{}s:50:\"mw_adminimize_disabled_metaboxes_page_author_items\";a:0:{}s:53:\"mw_adminimize_disabled_metaboxes_project_author_items\";a:0:{}s:53:\"mw_adminimize_disabled_metaboxes_product_author_items\";a:0:{}s:47:\"mw_adminimize_disabled_link_option_author_items\";a:0:{}s:51:\"mw_adminimize_disabled_nav_menu_option_author_items\";a:0:{}s:49:\"mw_adminimize_disabled_widget_option_author_items\";a:0:{}s:52:\"mw_adminimize_disabled_dashboard_option_author_items\";a:0:{}s:54:\"mw_adminimize_disabled_global_option_contributor_items\";a:0:{}s:55:\"mw_adminimize_disabled_metaboxes_post_contributor_items\";a:0:{}s:55:\"mw_adminimize_disabled_metaboxes_page_contributor_items\";a:0:{}s:58:\"mw_adminimize_disabled_metaboxes_project_contributor_items\";a:0:{}s:58:\"mw_adminimize_disabled_metaboxes_product_contributor_items\";a:0:{}s:52:\"mw_adminimize_disabled_link_option_contributor_items\";a:0:{}s:56:\"mw_adminimize_disabled_nav_menu_option_contributor_items\";a:0:{}s:54:\"mw_adminimize_disabled_widget_option_contributor_items\";a:0:{}s:57:\"mw_adminimize_disabled_dashboard_option_contributor_items\";a:0:{}s:53:\"mw_adminimize_disabled_global_option_subscriber_items\";a:0:{}s:54:\"mw_adminimize_disabled_metaboxes_post_subscriber_items\";a:0:{}s:54:\"mw_adminimize_disabled_metaboxes_page_subscriber_items\";a:0:{}s:57:\"mw_adminimize_disabled_metaboxes_project_subscriber_items\";a:0:{}s:57:\"mw_adminimize_disabled_metaboxes_product_subscriber_items\";a:0:{}s:51:\"mw_adminimize_disabled_link_option_subscriber_items\";a:0:{}s:55:\"mw_adminimize_disabled_nav_menu_option_subscriber_items\";a:0:{}s:53:\"mw_adminimize_disabled_widget_option_subscriber_items\";a:0:{}s:56:\"mw_adminimize_disabled_dashboard_option_subscriber_items\";a:0:{}s:51:\"mw_adminimize_disabled_global_option_customer_items\";a:0:{}s:52:\"mw_adminimize_disabled_metaboxes_post_customer_items\";a:0:{}s:52:\"mw_adminimize_disabled_metaboxes_page_customer_items\";a:0:{}s:55:\"mw_adminimize_disabled_metaboxes_project_customer_items\";a:0:{}s:55:\"mw_adminimize_disabled_metaboxes_product_customer_items\";a:0:{}s:49:\"mw_adminimize_disabled_link_option_customer_items\";a:0:{}s:53:\"mw_adminimize_disabled_nav_menu_option_customer_items\";a:0:{}s:51:\"mw_adminimize_disabled_widget_option_customer_items\";a:0:{}s:54:\"mw_adminimize_disabled_dashboard_option_customer_items\";a:0:{}s:55:\"mw_adminimize_disabled_global_option_shop_manager_items\";a:0:{}s:56:\"mw_adminimize_disabled_metaboxes_post_shop_manager_items\";a:0:{}s:56:\"mw_adminimize_disabled_metaboxes_page_shop_manager_items\";a:0:{}s:59:\"mw_adminimize_disabled_metaboxes_project_shop_manager_items\";a:0:{}s:59:\"mw_adminimize_disabled_metaboxes_product_shop_manager_items\";a:0:{}s:53:\"mw_adminimize_disabled_link_option_shop_manager_items\";a:0:{}s:57:\"mw_adminimize_disabled_nav_menu_option_shop_manager_items\";a:0:{}s:55:\"mw_adminimize_disabled_widget_option_shop_manager_items\";a:0:{}s:58:\"mw_adminimize_disabled_dashboard_option_shop_manager_items\";a:0:{}s:25:\"_mw_adminimize_own_values\";s:0:\"\";s:26:\"_mw_adminimize_own_options\";s:0:\"\";s:30:\"_mw_adminimize_own_post_values\";s:0:\"\";s:31:\"_mw_adminimize_own_post_options\";s:0:\"\";s:30:\"_mw_adminimize_own_page_values\";s:0:\"\";s:31:\"_mw_adminimize_own_page_options\";s:0:\"\";s:33:\"_mw_adminimize_own_values_project\";s:0:\"\";s:34:\"_mw_adminimize_own_options_project\";s:0:\"\";s:33:\"_mw_adminimize_own_values_product\";s:0:\"\";s:34:\"_mw_adminimize_own_options_product\";s:0:\"\";s:30:\"_mw_adminimize_own_link_values\";s:0:\"\";s:31:\"_mw_adminimize_own_link_options\";s:0:\"\";s:34:\"_mw_adminimize_own_nav_menu_values\";s:0:\"\";s:35:\"_mw_adminimize_own_nav_menu_options\";s:0:\"\";s:32:\"_mw_adminimize_own_widget_values\";s:0:\"\";s:33:\"_mw_adminimize_own_widget_options\";s:0:\"\";s:35:\"_mw_adminimize_own_dashboard_values\";s:0:\"\";s:36:\"_mw_adminimize_own_dashboard_options\";s:0:\"\";s:31:\"mw_adminimize_dashboard_widgets\";a:7:{s:17:\"dashboard_php_nag\";a:4:{s:2:\"id\";s:17:\"dashboard_php_nag\";s:5:\"title\";s:27:\"Es necesario actualizar PHP\";s:7:\"context\";s:6:\"normal\";s:8:\"priority\";s:4:\"high\";}s:19:\"dashboard_right_now\";a:4:{s:2:\"id\";s:19:\"dashboard_right_now\";s:5:\"title\";s:13:\"De un vistazo\";s:7:\"context\";s:6:\"normal\";s:8:\"priority\";s:4:\"core\";}s:18:\"dashboard_activity\";a:4:{s:2:\"id\";s:18:\"dashboard_activity\";s:5:\"title\";s:9:\"Actividad\";s:7:\"context\";s:6:\"normal\";s:8:\"priority\";s:4:\"core\";}s:36:\"woocommerce_dashboard_recent_reviews\";a:4:{s:2:\"id\";s:36:\"woocommerce_dashboard_recent_reviews\";s:5:\"title\";s:41:\"Valoraciones recientes de Sinergia Market\";s:7:\"context\";s:6:\"normal\";s:8:\"priority\";s:4:\"core\";}s:28:\"woocommerce_dashboard_status\";a:4:{s:2:\"id\";s:28:\"woocommerce_dashboard_status\";s:5:\"title\";s:25:\"Estado de Sinergia Market\";s:7:\"context\";s:6:\"normal\";s:8:\"priority\";s:4:\"core\";}s:21:\"dashboard_quick_press\";a:4:{s:2:\"id\";s:21:\"dashboard_quick_press\";s:5:\"title\";s:0:\"\";s:7:\"context\";s:4:\"side\";s:8:\"priority\";s:4:\"core\";}s:17:\"dashboard_primary\";a:4:{s:2:\"id\";s:17:\"dashboard_primary\";s:5:\"title\";s:31:\"Eventos y noticias de WordPress\";s:7:\"context\";s:4:\"side\";s:8:\"priority\";s:4:\"core\";}}s:26:\"mw_adminimize_default_menu\";a:19:{i:0;a:7:{i:0;s:10:\"Escritorio\";i:1;s:4:\"read\";i:2;s:9:\"index.php\";i:3;s:0:\"\";i:4;s:72:\"menu-top menu-top-first menu-icon-dashboard menu-top-first menu-top-last\";i:5;s:14:\"menu-dashboard\";i:6;s:19:\"dashicons-dashboard\";}i:1;a:5:{i:0;s:0:\"\";i:1;s:4:\"read\";i:2;s:10:\"separator1\";i:3;s:0:\"\";i:4;s:17:\"wp-menu-separator\";}i:2;a:7:{i:0;s:8:\"Entradas\";i:1;s:10:\"edit_posts\";i:2;s:8:\"edit.php\";i:3;s:0:\"\";i:4;s:52:\"menu-top menu-icon-post open-if-no-js menu-top-first\";i:5;s:10:\"menu-posts\";i:6;s:20:\"dashicons-admin-post\";}i:3;a:7:{i:0;s:6:\"Medios\";i:1;s:12:\"upload_files\";i:2;s:10:\"upload.php\";i:3;s:0:\"\";i:4;s:24:\"menu-top menu-icon-media\";i:5;s:10:\"menu-media\";i:6;s:21:\"dashicons-admin-media\";}i:4;a:7:{i:0;s:8:\"Páginas\";i:1;s:10:\"edit_pages\";i:2;s:23:\"edit.php?post_type=page\";i:3;s:0:\"\";i:4;s:23:\"menu-top menu-icon-page\";i:5;s:10:\"menu-pages\";i:6;s:20:\"dashicons-admin-page\";}i:5;a:7:{i:0;s:205:\"Comentarios <span class=\"awaiting-mod count-0\"><span class=\"pending-count\" aria-hidden=\"true\">0</span><span class=\"comments-in-moderation-text screen-reader-text\">0 comentarios en moderación</span></span>\";i:1;s:10:\"edit_posts\";i:2;s:17:\"edit-comments.php\";i:3;s:0:\"\";i:4;s:27:\"menu-top menu-icon-comments\";i:5;s:13:\"menu-comments\";i:6;s:24:\"dashicons-admin-comments\";}i:6;a:7:{i:0;s:9:\"Proyectos\";i:1;s:10:\"edit_posts\";i:2;s:26:\"edit.php?post_type=project\";i:3;s:0:\"\";i:4;s:40:\"menu-top menu-icon-project menu-top-last\";i:5;s:18:\"menu-posts-project\";i:6;s:20:\"dashicons-admin-post\";}i:7;a:5:{i:0;s:0:\"\";i:1;s:4:\"read\";i:2;s:21:\"separator-woocommerce\";i:3;s:0:\"\";i:4;s:29:\"wp-menu-separator woocommerce\";}i:8;a:7:{i:0;s:15:\"Sinergia Market\";i:1;s:18:\"manage_woocommerce\";i:2;s:11:\"woocommerce\";i:3;s:15:\"Sinergia Market\";i:4;s:67:\"menu-top menu-icon-generic toplevel_page_woocommerce menu-top-first\";i:5;s:25:\"toplevel_page_woocommerce\";i:6;s:76:\"https://sinergiared.com/wp-content/uploads/2018/11/icono-market-sinergia.png\";}i:9;a:7:{i:0;s:9:\"Productos\";i:1;s:13:\"edit_products\";i:2;s:26:\"edit.php?post_type=product\";i:3;s:0:\"\";i:4;s:26:\"menu-top menu-icon-product\";i:5;s:18:\"menu-posts-product\";i:6;s:20:\"dashicons-admin-post\";}i:10;a:7:{i:0;s:9:\"Análisis\";i:1;s:24:\"view_woocommerce_reports\";i:2;s:32:\"wc-admin&path=/analytics/revenue\";i:3;s:9:\"Análisis\";i:4;s:69:\"menu-top toplevel_page_wc-admin&path=/analytics/revenue menu-top-last\";i:5;s:46:\"toplevel_page_wc-admin&path=/analytics/revenue\";i:6;s:19:\"dashicons-chart-bar\";}i:11;a:5:{i:0;s:0:\"\";i:1;s:4:\"read\";i:2;s:10:\"separator2\";i:3;s:0:\"\";i:4;s:17:\"wp-menu-separator\";}i:12;a:7:{i:0;s:10:\"Apariencia\";i:1;s:13:\"switch_themes\";i:2;s:10:\"themes.php\";i:3;s:0:\"\";i:4;s:44:\"menu-top menu-icon-appearance menu-top-first\";i:5;s:15:\"menu-appearance\";i:6;s:26:\"dashicons-admin-appearance\";}i:13;a:7:{i:0;s:87:\"Plugins <span class=\"update-plugins count-0\"><span class=\"plugin-count\">0</span></span>\";i:1;s:16:\"activate_plugins\";i:2;s:11:\"plugins.php\";i:3;s:0:\"\";i:4;s:26:\"menu-top menu-icon-plugins\";i:5;s:12:\"menu-plugins\";i:6;s:23:\"dashicons-admin-plugins\";}i:14;a:7:{i:0;s:8:\"Usuarios\";i:1;s:10:\"list_users\";i:2;s:9:\"users.php\";i:3;s:0:\"\";i:4;s:24:\"menu-top menu-icon-users\";i:5;s:10:\"menu-users\";i:6;s:21:\"dashicons-admin-users\";}i:15;a:7:{i:0;s:12:\"Herramientas\";i:1;s:10:\"edit_posts\";i:2;s:9:\"tools.php\";i:3;s:0:\"\";i:4;s:24:\"menu-top menu-icon-tools\";i:5;s:10:\"menu-tools\";i:6;s:21:\"dashicons-admin-tools\";}i:16;a:7:{i:0;s:97:\"Ajustes<span class=\'update-plugins rsssl-update-count\'><span class=\'update-count\'>1</span></span>\";i:1;s:14:\"manage_options\";i:2;s:19:\"options-general.php\";i:3;s:0:\"\";i:4;s:41:\"menu-top menu-icon-settings menu-top-last\";i:5;s:13:\"menu-settings\";i:6;s:24:\"dashicons-admin-settings\";}i:17;a:5:{i:0;s:0:\"\";i:1;s:4:\"read\";i:2;s:14:\"separator-last\";i:3;s:0:\"\";i:4;s:17:\"wp-menu-separator\";}i:18;a:7:{i:0;s:8:\"Sinergia\";i:1;s:13:\"switch_themes\";i:2;s:21:\"et_ghost_divi_options\";i:3;s:8:\"Sinergia\";i:4;s:91:\"menu-top menu-icon-generic toplevel_page_et_ghost_divi_options menu-top-first menu-top-last\";i:5;s:35:\"toplevel_page_et_ghost_divi_options\";i:6;s:23:\"dashicons-admin-generic\";}}s:29:\"mw_adminimize_default_submenu\";a:14:{s:9:\"index.php\";a:2:{i:0;a:3:{i:0;s:6:\"Inicio\";i:1;s:4:\"read\";i:2;s:9:\"index.php\";}i:10;a:3:{i:0;s:95:\"Actualizaciones <span class=\"update-plugins count-0\"><span class=\"update-count\">0</span></span>\";i:1;s:11:\"update_core\";i:2;s:15:\"update-core.php\";}}s:10:\"upload.php\";a:2:{i:5;a:3:{i:0;s:10:\"Biblioteca\";i:1;s:12:\"upload_files\";i:2;s:10:\"upload.php\";}i:10;a:3:{i:0;s:13:\"Añadir nuevo\";i:1;s:12:\"upload_files\";i:2;s:13:\"media-new.php\";}}s:8:\"edit.php\";a:4:{i:5;a:3:{i:0;s:18:\"Todas las entradas\";i:1;s:10:\"edit_posts\";i:2;s:8:\"edit.php\";}i:10;a:3:{i:0;s:13:\"Añadir nueva\";i:1;s:10:\"edit_posts\";i:2;s:12:\"post-new.php\";}i:15;a:3:{i:0;s:11:\"Categorías\";i:1;s:17:\"manage_categories\";i:2;s:31:\"edit-tags.php?taxonomy=category\";}i:16;a:3:{i:0;s:9:\"Etiquetas\";i:1;s:16:\"manage_post_tags\";i:2;s:31:\"edit-tags.php?taxonomy=post_tag\";}}s:23:\"edit.php?post_type=page\";a:2:{i:5;a:3:{i:0;s:18:\"Todas las páginas\";i:1;s:10:\"edit_pages\";i:2;s:23:\"edit.php?post_type=page\";}i:10;a:3:{i:0;s:13:\"Añadir nueva\";i:1;s:10:\"edit_pages\";i:2;s:27:\"post-new.php?post_type=page\";}}s:26:\"edit.php?post_type=project\";a:4:{i:5;a:3:{i:0;s:19:\"Todos Los Proyectos\";i:1;s:10:\"edit_posts\";i:2;s:26:\"edit.php?post_type=project\";}i:10;a:3:{i:0;s:13:\"Añadir nuevo\";i:1;s:10:\"edit_posts\";i:2;s:30:\"post-new.php?post_type=project\";}i:15;a:3:{i:0;s:11:\"Categorías\";i:1;s:17:\"manage_categories\";i:2;s:61:\"edit-tags.php?taxonomy=project_category&amp;post_type=project\";}i:16;a:3:{i:0;s:9:\"Etiquetas\";i:1;s:17:\"manage_categories\";i:2;s:56:\"edit-tags.php?taxonomy=project_tag&amp;post_type=project\";}}s:26:\"edit.php?post_type=product\";a:5:{i:5;a:3:{i:0;s:19:\"Todos los productos\";i:1;s:13:\"edit_products\";i:2;s:26:\"edit.php?post_type=product\";}i:10;a:3:{i:0;s:13:\"Añadir nuevo\";i:1;s:13:\"edit_products\";i:2;s:30:\"post-new.php?post_type=product\";}i:15;a:3:{i:0;s:11:\"Categorías\";i:1;s:20:\"manage_product_terms\";i:2;s:56:\"edit-tags.php?taxonomy=product_cat&amp;post_type=product\";}i:16;a:3:{i:0;s:9:\"Etiquetas\";i:1;s:20:\"manage_product_terms\";i:2;s:56:\"edit-tags.php?taxonomy=product_tag&amp;post_type=product\";}i:17;a:4:{i:0;s:9:\"Atributos\";i:1;s:20:\"manage_product_terms\";i:2;s:18:\"product_attributes\";i:3;s:9:\"Atributos\";}}s:10:\"themes.php\";a:7:{i:5;a:3:{i:0;s:5:\"Temas\";i:1;s:13:\"switch_themes\";i:2;s:10:\"themes.php\";}i:6;a:5:{i:0;s:12:\"Personalizar\";i:1;s:9:\"customize\";i:2;s:82:\"customize.php?return=%2Fwp-admin%2Foptions-general.php%3Fpage%3Dadminimize-options\";i:3;s:0:\"\";i:4;s:20:\"hide-if-no-customize\";}i:7;a:3:{i:0;s:7:\"Widgets\";i:1;s:18:\"edit_theme_options\";i:2;s:11:\"widgets.php\";}i:10;a:3:{i:0;s:6:\"Menús\";i:1;s:18:\"edit_theme_options\";i:2;s:13:\"nav-menus.php\";}i:20;a:5:{i:0;s:5:\"Fondo\";i:1;s:13:\"switch_themes\";i:2;s:127:\"customize.php?return=%2Fwp-admin%2Foptions-general.php%3Fpage%3Dadminimize-options&#038;autofocus%5Bcontrol%5D=background_image\";i:3;s:0:\"\";i:4;s:20:\"hide-if-no-customize\";}i:21;a:4:{i:0;s:5:\"Fondo\";i:1;s:18:\"edit_theme_options\";i:2;s:17:\"custom-background\";i:3;s:5:\"Fondo\";}i:22;a:4:{i:0;s:15:\"Editor de temas\";i:1;s:11:\"edit_themes\";i:2;s:16:\"theme-editor.php\";i:3;s:15:\"Editor de temas\";}}s:11:\"plugins.php\";a:3:{i:5;a:3:{i:0;s:18:\"Plugins instalados\";i:1;s:16:\"activate_plugins\";i:2;s:11:\"plugins.php\";}i:10;a:3:{i:0;s:13:\"Añadir nuevo\";i:1;s:15:\"install_plugins\";i:2;s:18:\"plugin-install.php\";}i:15;a:3:{i:0;s:17:\"Editor de plugins\";i:1;s:12:\"edit_plugins\";i:2;s:17:\"plugin-editor.php\";}}s:9:\"users.php\";a:3:{i:5;a:3:{i:0;s:18:\"Todos los usuarios\";i:1;s:10:\"list_users\";i:2;s:9:\"users.php\";}i:10;a:3:{i:0;s:13:\"Añadir nuevo\";i:1;s:12:\"create_users\";i:2;s:12:\"user-new.php\";}i:15;a:3:{i:0;s:9:\"Tu perfil\";i:1;s:4:\"read\";i:2;s:11:\"profile.php\";}}s:9:\"tools.php\";a:7:{i:5;a:3:{i:0;s:24:\"Herramientas disponibles\";i:1;s:10:\"edit_posts\";i:2;s:9:\"tools.php\";}i:10;a:3:{i:0;s:8:\"Importar\";i:1;s:6:\"import\";i:2;s:10:\"import.php\";}i:15;a:3:{i:0;s:8:\"Exportar\";i:1;s:6:\"export\";i:2;s:10:\"export.php\";}i:20;a:3:{i:0;s:15:\"Salud del sitio\";i:1;s:23:\"view_site_health_checks\";i:2;s:15:\"site-health.php\";}i:25;a:3:{i:0;s:29:\"Exportar los datos personales\";i:1;s:27:\"export_others_personal_data\";i:2;s:24:\"export-personal-data.php\";}i:30;a:3:{i:0;s:27:\"Borrar los datos personales\";i:1;s:26:\"erase_others_personal_data\";i:2;s:23:\"erase-personal-data.php\";}i:31;a:4:{i:0;s:20:\"Acciones programadas\";i:1;s:14:\"manage_options\";i:2;s:16:\"action-scheduler\";i:3;s:20:\"Acciones programadas\";}}s:19:\"options-general.php\";a:11:{i:10;a:3:{i:0;s:9:\"Generales\";i:1;s:14:\"manage_options\";i:2;s:19:\"options-general.php\";}i:15;a:3:{i:0;s:9:\"Escritura\";i:1;s:14:\"manage_options\";i:2;s:19:\"options-writing.php\";}i:20;a:3:{i:0;s:7:\"Lectura\";i:1;s:14:\"manage_options\";i:2;s:19:\"options-reading.php\";}i:25;a:3:{i:0;s:11:\"Comentarios\";i:1;s:14:\"manage_options\";i:2;s:22:\"options-discussion.php\";}i:30;a:3:{i:0;s:6:\"Medios\";i:1;s:14:\"manage_options\";i:2;s:17:\"options-media.php\";}i:40;a:3:{i:0;s:19:\"Enlaces permanentes\";i:1;s:14:\"manage_options\";i:2;s:21:\"options-permalink.php\";}i:45;a:3:{i:0;s:10:\"Privacidad\";i:1;s:22:\"manage_privacy_options\";i:2;s:19:\"options-privacy.php\";}i:46;a:4:{i:0;s:10:\"Adminimize\";i:1;s:14:\"manage_options\";i:2;s:18:\"adminimize-options\";i:3;s:22:\"Opciones de Adminimize\";}i:47;a:4:{i:0;s:17:\"Disable Gutenberg\";i:1;s:14:\"manage_options\";i:2;s:17:\"disable-gutenberg\";i:3;s:17:\"Disable Gutenberg\";}i:48;a:4:{i:0;s:17:\"UnderConstruction\";i:1;s:14:\"manage_options\";i:2;s:3:\"ucp\";i:3;s:17:\"UnderConstruction\";}i:49;a:4:{i:0;s:93:\"SSL<span class=\'update-plugins rsssl-update-count\'><span class=\'update-count\'>1</span></span>\";i:1;s:16:\"activate_plugins\";i:2;s:25:\"rlrsssl_really_simple_ssl\";i:3;s:11:\"Ajustes SSL\";}}s:11:\"woocommerce\";a:8:{i:0;a:4:{i:0;s:10:\"Escritorio\";i:1;s:24:\"view_woocommerce_reports\";i:2;s:8:\"wc-admin\";i:3;s:10:\"Escritorio\";}i:1;a:4:{i:0;s:7:\"Pedidos\";i:1;s:16:\"edit_shop_orders\";i:2;s:29:\"edit.php?post_type=shop_order\";i:3;s:7:\"Pedidos\";}i:2;a:4:{i:0;s:7:\"Cupones\";i:1;s:17:\"edit_shop_coupons\";i:2;s:30:\"edit.php?post_type=shop_coupon\";i:3;s:7:\"Cupones\";}i:3;a:4:{i:0;s:8:\"Clientes\";i:1;s:24:\"view_woocommerce_reports\";i:2;s:24:\"wc-admin&path=/customers\";i:3;s:8:\"Clientes\";}i:4;a:4:{i:0;s:8:\"Informes\";i:1;s:24:\"view_woocommerce_reports\";i:2;s:10:\"wc-reports\";i:3;s:8:\"Informes\";}i:5;a:4:{i:0;s:7:\"Ajustes\";i:1;s:18:\"manage_woocommerce\";i:2;s:11:\"wc-settings\";i:3;s:26:\"Ajustes de Sinergia Market\";}i:6;a:4:{i:0;s:6:\"Estado\";i:1;s:18:\"manage_woocommerce\";i:2;s:9:\"wc-status\";i:3;s:25:\"Estado de Sinergia Market\";}i:7;a:4:{i:0;s:12:\"Extensiones \";i:1;s:18:\"manage_woocommerce\";i:2;s:9:\"wc-addons\";i:3;s:30:\"Extensiones de Sinergia Market\";}}s:32:\"wc-admin&path=/analytics/revenue\";a:9:{i:0;a:4:{i:0;s:8:\"Ingresos\";i:1;s:24:\"view_woocommerce_reports\";i:2;s:32:\"wc-admin&path=/analytics/revenue\";i:3;s:8:\"Ingresos\";}i:1;a:4:{i:0;s:7:\"Pedidos\";i:1;s:24:\"view_woocommerce_reports\";i:2;s:31:\"wc-admin&path=/analytics/orders\";i:3;s:7:\"Pedidos\";}i:2;a:4:{i:0;s:9:\"Productos\";i:1;s:24:\"view_woocommerce_reports\";i:2;s:33:\"wc-admin&path=/analytics/products\";i:3;s:9:\"Productos\";}i:3;a:4:{i:0;s:11:\"Categorías\";i:1;s:24:\"view_woocommerce_reports\";i:2;s:35:\"wc-admin&path=/analytics/categories\";i:3;s:11:\"Categorías\";}i:4;a:4:{i:0;s:7:\"Cupones\";i:1;s:24:\"view_woocommerce_reports\";i:2;s:32:\"wc-admin&path=/analytics/coupons\";i:3;s:7:\"Cupones\";}i:5;a:4:{i:0;s:9:\"Impuestos\";i:1;s:24:\"view_woocommerce_reports\";i:2;s:30:\"wc-admin&path=/analytics/taxes\";i:3;s:9:\"Impuestos\";}i:6;a:4:{i:0;s:9:\"Descargas\";i:1;s:24:\"view_woocommerce_reports\";i:2;s:34:\"wc-admin&path=/analytics/downloads\";i:3;s:9:\"Descargas\";}i:7;a:4:{i:0;s:10:\"Inventario\";i:1;s:24:\"view_woocommerce_reports\";i:2;s:30:\"wc-admin&path=/analytics/stock\";i:3;s:10:\"Inventario\";}i:8;a:4:{i:0;s:7:\"Ajustes\";i:1;s:24:\"view_woocommerce_reports\";i:2;s:33:\"wc-admin&path=/analytics/settings\";i:3;s:7:\"Ajustes\";}}s:21:\"et_ghost_divi_options\";a:5:{i:0;a:4:{i:0;s:17:\"Opciones del tema\";i:1;s:14:\"manage_options\";i:2;s:21:\"et_ghost_divi_options\";i:3;s:17:\"Opciones del tema\";}i:1;a:4:{i:0;s:23:\"Personalizador de temas\";i:1;s:14:\"manage_options\";i:2;s:44:\"customize.php?et_customizer_option_set=theme\";i:3;s:23:\"Personalizador de temas\";}i:2;a:4:{i:0;s:13:\"Editor de Rol\";i:1;s:14:\"manage_options\";i:2;s:25:\"et_ghost_divi_role_editor\";i:3;s:13:\"Editor de Rol\";}i:3;a:4:{i:0;s:22:\"Biblioteca de Sinergia\";i:1;s:14:\"manage_options\";i:2;s:31:\"edit.php?post_type=et_pb_layout\";i:3;s:22:\"Biblioteca de Sinergia\";}i:4;a:4:{i:0;s:14:\"Support Center\";i:1;s:14:\"manage_options\";i:2;s:17:\"et_support_center\";i:3;s:14:\"Support Center\";}}}}', 'yes'),
(123, 'WPLANG', 'es_ES', 'yes'),
(3565, '_transient_woocommerce_reports-transient-version', '1595524304', 'yes'),
(583, 'woocommerce_sales_record_date', '2020-03-26', 'yes'),
(584, 'woocommerce_sales_record_amount', '340', 'yes'),
(588, 'woocommerce_tracker_last_send', '1596309439', 'yes'),
(21374, '_transient_timeout__woocommerce_helper_subscriptions', '1596587076', 'no'),
(21375, '_transient__woocommerce_helper_subscriptions', 'a:0:{}', 'no'),
(144, 'can_compress_scripts', '1', 'no'),
(147, 'recently_activated', 'a:0:{}', 'yes'),
(159, 'nav_menu_roles_db_version', '1.10.2', 'yes'),
(246, 'woocommerce_price_display_suffix', '', 'yes'),
(247, 'woocommerce_tax_total_display', 'itemized', 'no'),
(248, 'woocommerce_enable_shipping_calc', 'yes', 'no'),
(249, 'woocommerce_shipping_cost_requires_address', 'no', 'yes'),
(164, 'rlrsssl_options', 'a:16:{s:12:\"site_has_ssl\";b:1;s:4:\"hsts\";b:0;s:22:\"htaccess_warning_shown\";b:0;s:19:\"review_notice_shown\";b:0;s:25:\"ssl_success_message_shown\";b:1;s:26:\"autoreplace_insecure_links\";b:1;s:17:\"plugin_db_version\";s:5:\"3.3.4\";s:5:\"debug\";b:0;s:20:\"do_not_edit_htaccess\";b:0;s:17:\"htaccess_redirect\";b:0;s:11:\"ssl_enabled\";b:1;s:19:\"javascript_redirect\";b:0;s:11:\"wp_redirect\";b:1;s:31:\"switch_mixed_content_fixer_hook\";b:0;s:19:\"dismiss_all_notices\";b:0;s:21:\"dismiss_review_notice\";b:0;}', 'yes'),
(239, 'woocommerce_prices_include_tax', 'no', 'yes'),
(240, 'woocommerce_tax_based_on', 'shipping', 'yes'),
(241, 'woocommerce_shipping_tax_class', 'inherit', 'yes'),
(242, 'woocommerce_tax_round_at_subtotal', 'no', 'yes'),
(196, 'woocommerce_store_address', 'cale 1', 'yes'),
(197, 'woocommerce_store_address_2', '', 'yes'),
(198, 'woocommerce_store_city', 'lima', 'yes'),
(199, 'woocommerce_default_country', 'PE:APU', 'yes'),
(200, 'woocommerce_store_postcode', '111', 'yes'),
(201, 'woocommerce_allowed_countries', 'all', 'yes'),
(202, 'woocommerce_all_except_countries', '', 'yes'),
(203, 'woocommerce_specific_allowed_countries', '', 'yes'),
(243, 'woocommerce_tax_classes', '', 'yes'),
(244, 'woocommerce_tax_display_shop', 'excl', 'yes'),
(245, 'woocommerce_tax_display_cart', 'excl', 'yes'),
(313, '_transient_woocommerce_webhook_ids_status_active', 'a:0:{}', 'yes'),
(314, 'widget_woocommerce_widget_cart', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(315, 'widget_woocommerce_layered_nav_filters', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(316, 'widget_woocommerce_layered_nav', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(312, 'woocommerce_maxmind_geolocation_settings', 'a:1:{s:15:\"database_prefix\";s:32:\"RfSYNa2EW19iMGnk2rkna4zhxQtfMhTX\";}', 'yes'),
(172, 'rsssl_activation_timestamp', '1585254193', 'yes'),
(311, 'action_scheduler_lock_async-request-runner', '1596561341', 'yes'),
(191, 'action_scheduler_hybrid_store_demarkation', '5', 'yes'),
(192, 'schema-ActionScheduler_StoreSchema', '3.0.1585254934', 'yes'),
(193, 'schema-ActionScheduler_LoggerSchema', '2.0.1585254934', 'yes'),
(204, 'woocommerce_ship_to_countries', '', 'yes'),
(205, 'woocommerce_specific_ship_to_countries', '', 'yes'),
(206, 'woocommerce_default_customer_address', 'base', 'yes'),
(207, 'woocommerce_calc_taxes', 'no', 'yes'),
(208, 'woocommerce_enable_coupons', 'yes', 'yes'),
(209, 'woocommerce_calc_discounts_sequentially', 'no', 'no'),
(210, 'woocommerce_currency', 'PEN', 'yes'),
(211, 'woocommerce_currency_pos', 'left', 'yes'),
(212, 'woocommerce_price_thousand_sep', ',', 'yes'),
(213, 'woocommerce_price_decimal_sep', '.', 'yes'),
(214, 'woocommerce_price_num_decimals', '2', 'yes'),
(215, 'woocommerce_shop_page_id', '8', 'yes'),
(216, 'woocommerce_cart_redirect_after_add', 'no', 'yes'),
(217, 'woocommerce_enable_ajax_add_to_cart', 'yes', 'yes'),
(218, 'woocommerce_placeholder_image', '7', 'yes'),
(219, 'woocommerce_weight_unit', 'kg', 'yes'),
(220, 'woocommerce_dimension_unit', 'cm', 'yes'),
(221, 'woocommerce_enable_reviews', 'yes', 'yes'),
(222, 'woocommerce_review_rating_verification_label', 'yes', 'no'),
(223, 'woocommerce_review_rating_verification_required', 'no', 'no'),
(224, 'woocommerce_enable_review_rating', 'yes', 'yes'),
(225, 'woocommerce_review_rating_required', 'yes', 'no'),
(226, 'woocommerce_manage_stock', 'yes', 'yes'),
(227, 'woocommerce_hold_stock_minutes', '60', 'no'),
(228, 'woocommerce_notify_low_stock', 'yes', 'no'),
(229, 'woocommerce_notify_no_stock', 'yes', 'no'),
(230, 'woocommerce_stock_email_recipient', 'admin@shapinetwork.com', 'no'),
(231, 'woocommerce_notify_low_stock_amount', '2', 'no'),
(232, 'woocommerce_notify_no_stock_amount', '0', 'yes'),
(233, 'woocommerce_hide_out_of_stock_items', 'no', 'yes'),
(234, 'woocommerce_stock_format', '', 'yes'),
(235, 'woocommerce_file_download_method', 'force', 'no'),
(236, 'woocommerce_downloads_require_login', 'no', 'no'),
(237, 'woocommerce_downloads_grant_access_after_payment', 'yes', 'no'),
(238, 'woocommerce_downloads_add_hash_to_filename', 'yes', 'yes'),
(449, '_site_transient_et_update_all_plugins', 'O:8:\"stdClass\":1:{s:12:\"last_checked\";i:1595524647;}', 'no'),
(450, 'ucp_pointers', 'a:1:{s:15:\"getting_started\";a:4:{s:6:\"target\";s:29:\".ucp-main-tab li:nth-child(2)\";s:4:\"edge\";s:3:\"top\";s:5:\"align\";s:4:\"left\";s:7:\"content\";s:414:\"Watch the short <a href=\"https://www.youtube.com/watch?v=RN4XABhK7_w\" target=\"_blank\">getting started video</a> to get you up to speed with UCP in no time. If that doesn\'t answer your questions watch the longer <a href=\"https://www.youtube.com/watch?v=K3DF-NP6Fog\" target=\"_blank\">in-depth video walktrough</a>.<br>If you need the videos later, links are in the <a href=\"#\" class=\"change_tab\" data-tab=\"4\">FAQ</a>.\";}}', 'yes'),
(467, 'nav_menu_options', 'a:2:{i:0;b:0;s:8:\"auto_add\";a:0:{}}', 'yes'),
(455, 'ucp_meta', 'a:3:{s:13:\"first_version\";s:4:\"3.65\";s:13:\"first_install\";i:1585257328;s:11:\"options_ver\";s:4:\"3.80\";}', 'yes'),
(457, 'adsdg_ultimate_theme', 'Divi', 'yes'),
(463, 'et_google_api_settings', 'a:3:{s:7:\"api_key\";s:0:\"\";s:26:\"enqueue_google_maps_script\";s:2:\"on\";s:16:\"use_google_fonts\";s:2:\"on\";}', 'yes'),
(250, 'woocommerce_ship_to_destination', 'billing', 'no'),
(251, 'woocommerce_shipping_debug_mode', 'no', 'yes'),
(252, 'woocommerce_enable_guest_checkout', 'yes', 'no'),
(253, 'woocommerce_enable_checkout_login_reminder', 'no', 'no'),
(254, 'woocommerce_enable_signup_and_login_from_checkout', 'no', 'no'),
(255, 'woocommerce_enable_myaccount_registration', 'no', 'no'),
(256, 'woocommerce_registration_generate_username', 'yes', 'no'),
(257, 'woocommerce_registration_generate_password', 'yes', 'no'),
(258, 'woocommerce_erasure_request_removes_order_data', 'no', 'no'),
(259, 'woocommerce_erasure_request_removes_download_data', 'no', 'no'),
(260, 'woocommerce_allow_bulk_remove_personal_data', 'no', 'no'),
(261, 'woocommerce_registration_privacy_policy_text', 'Tus datos personales se utilizarán para procesar tu pedido, mejorar tu experiencia en esta web, gestionar el acceso a tu cuenta y otros propósitos descritos en nuestra [privacy_policy].', 'yes'),
(262, 'woocommerce_checkout_privacy_policy_text', 'Tus datos personales se utilizarán para procesar tu pedido, mejorar tu experiencia en esta web y otros propósitos descritos en nuestra [privacy_policy].', 'yes');
INSERT INTO `wp98_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(263, 'woocommerce_delete_inactive_accounts', 'a:2:{s:6:\"number\";s:0:\"\";s:4:\"unit\";s:6:\"months\";}', 'no'),
(264, 'woocommerce_trash_pending_orders', '', 'no'),
(265, 'woocommerce_trash_failed_orders', '', 'no'),
(266, 'woocommerce_trash_cancelled_orders', '', 'no'),
(267, 'woocommerce_anonymize_completed_orders', 'a:2:{s:6:\"number\";s:0:\"\";s:4:\"unit\";s:6:\"months\";}', 'no'),
(268, 'woocommerce_email_from_name', 'shapinetwork', 'no'),
(269, 'woocommerce_email_from_address', 'admin@shapinetwork.com', 'no'),
(270, 'woocommerce_email_header_image', '', 'no'),
(271, 'woocommerce_email_footer_text', '{site_title} &mdash; Built with {WooCommerce}', 'no'),
(272, 'woocommerce_email_base_color', '#96588a', 'no'),
(273, 'woocommerce_email_background_color', '#f7f7f7', 'no'),
(274, 'woocommerce_email_body_background_color', '#ffffff', 'no'),
(275, 'woocommerce_email_text_color', '#3c3c3c', 'no'),
(276, 'woocommerce_cart_page_id', '9', 'no'),
(277, 'woocommerce_checkout_page_id', '10', 'no'),
(278, 'woocommerce_myaccount_page_id', '11', 'no'),
(279, 'woocommerce_terms_page_id', '', 'no'),
(280, 'woocommerce_checkout_pay_endpoint', 'order-pay', 'yes'),
(281, 'woocommerce_checkout_order_received_endpoint', 'order-received', 'yes'),
(282, 'woocommerce_myaccount_add_payment_method_endpoint', 'add-payment-method', 'yes'),
(283, 'woocommerce_myaccount_delete_payment_method_endpoint', 'delete-payment-method', 'yes'),
(284, 'woocommerce_myaccount_set_default_payment_method_endpoint', 'set-default-payment-method', 'yes'),
(285, 'woocommerce_myaccount_orders_endpoint', 'orders', 'yes'),
(286, 'woocommerce_myaccount_view_order_endpoint', 'view-order', 'yes'),
(287, 'woocommerce_myaccount_downloads_endpoint', 'downloads', 'yes'),
(288, 'woocommerce_myaccount_edit_account_endpoint', 'edit-account', 'yes'),
(289, 'woocommerce_myaccount_edit_address_endpoint', 'edit-address', 'yes'),
(290, 'woocommerce_myaccount_payment_methods_endpoint', 'payment-methods', 'yes'),
(291, 'woocommerce_myaccount_lost_password_endpoint', 'lost-password', 'yes'),
(292, 'woocommerce_logout_endpoint', 'customer-logout', 'yes'),
(293, 'woocommerce_api_enabled', 'no', 'yes'),
(294, 'woocommerce_allow_tracking', 'yes', 'no'),
(295, 'woocommerce_show_marketplace_suggestions', 'yes', 'no'),
(296, 'woocommerce_single_image_width', '600', 'yes'),
(297, 'woocommerce_thumbnail_image_width', '300', 'yes'),
(298, 'woocommerce_checkout_highlight_required_fields', 'yes', 'yes'),
(299, 'woocommerce_demo_store', 'no', 'no'),
(300, 'woocommerce_permalinks', 'a:5:{s:12:\"product_base\";s:8:\"producto\";s:13:\"category_base\";s:18:\"categoria-producto\";s:8:\"tag_base\";s:17:\"etiqueta-producto\";s:14:\"attribute_base\";s:0:\"\";s:22:\"use_verbose_page_rules\";b:0;}', 'yes'),
(301, 'current_theme_supports_woocommerce', 'yes', 'yes'),
(302, 'woocommerce_queue_flush_rewrite_rules', 'no', 'yes'),
(20658, 'woocommerce_schema_version', '430', 'yes'),
(500, 'product_cat_children', 'a:0:{}', 'yes'),
(305, 'default_product_cat', '15', 'yes'),
(306, 'woocommerce_admin_notices', 'a:1:{i:1;s:31:\"wp_php_min_requirements_7.2_5.2\";}', 'yes'),
(338, 'woocommerce_meta_box_errors', 'a:0:{}', 'yes'),
(20659, 'woocommerce_version', '4.3.1', 'yes'),
(20660, 'woocommerce_db_version', '4.3.1', 'yes'),
(317, 'widget_woocommerce_price_filter', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(318, 'widget_woocommerce_product_categories', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(319, 'widget_woocommerce_product_search', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(320, 'widget_woocommerce_product_tag_cloud', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(321, 'widget_woocommerce_products', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(322, 'widget_woocommerce_recently_viewed_products', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(323, 'widget_woocommerce_top_rated_products', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(324, 'widget_woocommerce_recent_reviews', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(325, 'widget_woocommerce_rating_filter', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(326, 'woocommerce_onboarding_opt_in', 'no', 'yes'),
(330, 'woocommerce_admin_install_timestamp', '1585254936', 'yes'),
(20704, 'woocommerce_admin_version', '1.3.1', 'yes'),
(334, 'action_scheduler_migration_status', 'complete', 'yes'),
(335, 'woocommerce_admin_last_orders_milestone', '1', 'yes'),
(336, 'woocommerce_onboarding_profile', 'a:1:{s:9:\"completed\";b:1;}', 'yes'),
(340, 'woocommerce_setup_ab_wc_admin_onboarding', 'a', 'yes'),
(351, 'woocommerce_cheque_settings', 'a:1:{s:7:\"enabled\";s:2:\"no\";}', 'yes'),
(352, 'woocommerce_bacs_settings', 'a:10:{s:7:\"enabled\";s:3:\"yes\";s:5:\"title\";s:30:\"Transferencia bancaria directa\";s:11:\"description\";s:202:\"Realiza tu pago directamente en nuestra cuenta bancaria. Por favor, usa el número del pedido como referencia de pago. Tu pedido no se procesará hasta que se haya recibido el importe en nuestra cuenta.\";s:12:\"instructions\";s:0:\"\";s:12:\"account_name\";s:0:\"\";s:14:\"account_number\";s:0:\"\";s:9:\"sort_code\";s:0:\"\";s:9:\"bank_name\";s:0:\"\";s:4:\"iban\";s:0:\"\";s:3:\"bic\";s:0:\"\";}', 'yes'),
(353, 'woocommerce_cod_settings', 'a:1:{s:7:\"enabled\";s:2:\"no\";}', 'yes'),
(359, '_transient_product_query-transient-version', '1595524709', 'yes'),
(343, 'woocommerce_obw_last_completed_step', 'recommended', 'yes'),
(346, 'woocommerce_product_type', 'both', 'yes'),
(347, 'woocommerce_sell_in_person', '1', 'yes'),
(354, '_transient_shipping-transient-version', '1585255058', 'yes'),
(364, 'hide-wc-extensions-message', '1', 'yes'),
(365, 'woocommerce_branding_name', 'Sinergia Market', 'yes'),
(360, '_transient_product-transient-version', '1585258701', 'yes'),
(366, 'woocommerce_branding_icon', 'https://sinergiared.com/wp-content/uploads/2018/11/icono-market-sinergia.png', 'yes'),
(367, 'woocommerce_gateway_order', 'a:4:{s:4:\"bacs\";i:0;s:6:\"cheque\";i:1;s:3:\"cod\";i:2;s:6:\"paypal\";i:3;}', 'yes'),
(404, 'current_theme', 'Divi', 'yes'),
(405, 'theme_mods_Divi', 'a:6:{i:0;b:0;s:18:\"custom_css_post_id\";i:14;s:16:\"et_pb_css_synced\";s:3:\"yes\";s:18:\"nav_menu_locations\";a:2:{s:14:\"secondary-menu\";i:17;s:12:\"primary-menu\";i:16;}s:39:\"et_updated_layouts_built_for_post_types\";s:3:\"yes\";s:21:\"login_area_logo_image\";s:69:\"https://shapinetwork.com/wp-content/uploads/2020/03/logo_sinergia.png\";}', 'yes'),
(406, 'theme_switched', '', 'yes'),
(433, 'agsdg_settings', 'a:4:{s:13:\"branding_name\";s:8:\"Sinergia\";s:14:\"branding_image\";s:76:\"https://sinergiared.com/wp-content/uploads/2018/11/icono-market-sinergia.png\";s:10:\"theme_slug\";s:10:\"ghost_divi\";s:16:\"ultimate_ghoster\";s:3:\"yes\";}', 'yes'),
(407, 'et_pb_cache_notice', 'a:1:{s:6:\"3.26.6\";s:6:\"ignore\";}', 'yes'),
(412, 'et_core_version', '3.26.6', 'yes'),
(414, 'et_divi', 'a:252:{s:39:\"static_css_custom_css_safety_check_done\";b:1;s:23:\"2_5_flush_rewrite_rules\";s:4:\"done\";s:30:\"et_flush_rewrite_rules_library\";s:6:\"3.26.6\";s:31:\"divi_previous_installed_version\";s:0:\"\";s:29:\"divi_latest_installed_version\";s:6:\"3.26.6\";s:27:\"divi_skip_font_subset_force\";b:1;s:27:\"et_pb_clear_templates_cache\";b:1;s:23:\"builder_custom_defaults\";O:8:\"stdClass\":0:{}s:33:\"customizer_settings_migrated_flag\";b:1;s:34:\"builder_custom_defaults_unmigrated\";b:0;s:40:\"divi_email_provider_credentials_migrated\";b:1;s:15:\"divi_1_3_images\";s:7:\"checked\";s:21:\"et_pb_layouts_updated\";b:1;s:30:\"library_removed_legacy_layouts\";b:1;s:30:\"divi_2_4_documentation_message\";s:9:\"triggered\";s:9:\"divi_logo\";s:69:\"https://shapinetwork.com/wp-content/uploads/2020/03/logo_sinergia.png\";s:14:\"divi_fixed_nav\";s:2:\"on\";s:26:\"divi_gallery_layout_enable\";s:5:\"false\";s:18:\"divi_color_palette\";s:63:\"#000000|#ffffff|#e02b20|#e09900|#edf000|#7cda24|#0c71c3|#8300e9\";s:15:\"divi_grab_image\";s:5:\"false\";s:15:\"divi_blog_style\";s:5:\"false\";s:12:\"divi_sidebar\";s:16:\"et_right_sidebar\";s:22:\"divi_shop_page_sidebar\";s:16:\"et_right_sidebar\";s:23:\"divi_show_facebook_icon\";s:2:\"on\";s:22:\"divi_show_twitter_icon\";s:2:\"on\";s:21:\"divi_show_google_icon\";s:2:\"on\";s:24:\"divi_show_instagram_icon\";s:2:\"on\";s:18:\"divi_show_rss_icon\";s:2:\"on\";s:17:\"divi_facebook_url\";s:1:\"#\";s:16:\"divi_twitter_url\";s:1:\"#\";s:15:\"divi_google_url\";s:1:\"#\";s:18:\"divi_instagram_url\";s:1:\"#\";s:12:\"divi_rss_url\";s:0:\"\";s:34:\"divi_woocommerce_archive_num_posts\";i:9;s:17:\"divi_catnum_posts\";i:6;s:21:\"divi_archivenum_posts\";i:5;s:20:\"divi_searchnum_posts\";i:5;s:17:\"divi_tagnum_posts\";i:5;s:16:\"divi_date_format\";s:6:\"M j, Y\";s:16:\"divi_use_excerpt\";s:5:\"false\";s:26:\"divi_responsive_shortcodes\";s:2:\"on\";s:33:\"divi_gf_enable_all_character_sets\";s:5:\"false\";s:16:\"divi_back_to_top\";s:5:\"false\";s:18:\"divi_smooth_scroll\";s:5:\"false\";s:25:\"divi_disable_translations\";s:5:\"false\";s:27:\"divi_minify_combine_scripts\";s:2:\"on\";s:26:\"divi_minify_combine_styles\";s:2:\"on\";s:15:\"divi_custom_css\";s:0:\"\";s:21:\"divi_enable_dropdowns\";s:2:\"on\";s:14:\"divi_home_link\";s:2:\"on\";s:15:\"divi_sort_pages\";s:10:\"post_title\";s:15:\"divi_order_page\";s:3:\"asc\";s:22:\"divi_tiers_shown_pages\";i:3;s:32:\"divi_enable_dropdowns_categories\";s:2:\"on\";s:21:\"divi_categories_empty\";s:2:\"on\";s:27:\"divi_tiers_shown_categories\";i:3;s:13:\"divi_sort_cat\";s:4:\"name\";s:14:\"divi_order_cat\";s:3:\"asc\";s:20:\"divi_disable_toptier\";s:5:\"false\";s:25:\"divi_scroll_to_anchor_fix\";s:5:\"false\";s:27:\"et_pb_post_type_integration\";a:4:{s:4:\"post\";s:2:\"on\";s:4:\"page\";s:2:\"on\";s:7:\"project\";s:2:\"on\";s:7:\"product\";s:2:\"on\";}s:21:\"et_pb_static_css_file\";s:2:\"on\";s:19:\"et_pb_css_in_footer\";s:3:\"off\";s:25:\"et_pb_product_tour_global\";s:2:\"on\";s:24:\"et_enable_classic_editor\";s:3:\"off\";s:14:\"divi_postinfo2\";a:4:{i:0;s:6:\"author\";i:1;s:4:\"date\";i:2;s:10:\"categories\";i:3;s:8:\"comments\";}s:22:\"divi_show_postcomments\";s:2:\"on\";s:15:\"divi_thumbnails\";s:2:\"on\";s:20:\"divi_page_thumbnails\";s:5:\"false\";s:23:\"divi_show_pagescomments\";s:5:\"false\";s:14:\"divi_postinfo1\";a:3:{i:0;s:6:\"author\";i:1;s:4:\"date\";i:2;s:10:\"categories\";}s:21:\"divi_thumbnails_index\";s:2:\"on\";s:19:\"divi_seo_home_title\";s:5:\"false\";s:25:\"divi_seo_home_description\";s:5:\"false\";s:22:\"divi_seo_home_keywords\";s:5:\"false\";s:23:\"divi_seo_home_canonical\";s:5:\"false\";s:23:\"divi_seo_home_titletext\";s:0:\"\";s:29:\"divi_seo_home_descriptiontext\";s:0:\"\";s:26:\"divi_seo_home_keywordstext\";s:0:\"\";s:18:\"divi_seo_home_type\";s:27:\"BlogName | Blog description\";s:22:\"divi_seo_home_separate\";s:3:\" | \";s:21:\"divi_seo_single_title\";s:5:\"false\";s:27:\"divi_seo_single_description\";s:5:\"false\";s:24:\"divi_seo_single_keywords\";s:5:\"false\";s:25:\"divi_seo_single_canonical\";s:5:\"false\";s:27:\"divi_seo_single_field_title\";s:9:\"seo_title\";s:33:\"divi_seo_single_field_description\";s:15:\"seo_description\";s:30:\"divi_seo_single_field_keywords\";s:12:\"seo_keywords\";s:20:\"divi_seo_single_type\";s:21:\"Post title | BlogName\";s:24:\"divi_seo_single_separate\";s:3:\" | \";s:24:\"divi_seo_index_canonical\";s:5:\"false\";s:26:\"divi_seo_index_description\";s:5:\"false\";s:19:\"divi_seo_index_type\";s:24:\"Category name | BlogName\";s:23:\"divi_seo_index_separate\";s:3:\" | \";s:28:\"divi_integrate_header_enable\";s:2:\"on\";s:26:\"divi_integrate_body_enable\";s:2:\"on\";s:31:\"divi_integrate_singletop_enable\";s:2:\"on\";s:34:\"divi_integrate_singlebottom_enable\";s:2:\"on\";s:21:\"divi_integration_head\";s:0:\"\";s:21:\"divi_integration_body\";s:0:\"\";s:27:\"divi_integration_single_top\";s:0:\"\";s:30:\"divi_integration_single_bottom\";s:0:\"\";s:15:\"divi_468_enable\";s:5:\"false\";s:14:\"divi_468_image\";s:0:\"\";s:12:\"divi_468_url\";s:0:\"\";s:16:\"divi_468_adsense\";s:0:\"\";s:24:\"footer_widget_text_color\";s:7:\"#ffffff\";s:24:\"footer_widget_link_color\";s:7:\"#ffffff\";s:21:\"custom_footer_credits\";s:78:\"Diseñado por <a href=\"https://sinergiared.com\">Sinergia Red Internacional</a>\";s:19:\"post_meta_font_size\";s:2:\"14\";s:16:\"post_meta_height\";s:1:\"1\";s:17:\"post_meta_spacing\";s:1:\"0\";s:15:\"post_meta_style\";s:0:\"\";s:21:\"post_header_font_size\";s:2:\"30\";s:18:\"post_header_height\";s:1:\"1\";s:19:\"post_header_spacing\";s:1:\"0\";s:17:\"post_header_style\";s:0:\"\";s:12:\"boxed_layout\";s:0:\"\";s:13:\"content_width\";s:4:\"1080\";s:12:\"gutter_width\";s:1:\"3\";s:17:\"use_sidebar_width\";s:0:\"\";s:13:\"sidebar_width\";s:2:\"21\";s:15:\"section_padding\";s:1:\"4\";s:20:\"phone_section_height\";s:2:\"50\";s:21:\"tablet_section_height\";s:2:\"50\";s:11:\"row_padding\";s:1:\"2\";s:16:\"phone_row_height\";s:2:\"30\";s:17:\"tablet_row_height\";s:2:\"30\";s:16:\"cover_background\";s:2:\"on\";s:14:\"body_font_size\";s:2:\"14\";s:16:\"body_font_height\";s:3:\"1.7\";s:20:\"phone_body_font_size\";s:2:\"14\";s:21:\"tablet_body_font_size\";s:2:\"14\";s:16:\"body_header_size\";s:2:\"30\";s:19:\"body_header_spacing\";s:1:\"0\";s:18:\"body_header_height\";s:1:\"1\";s:17:\"body_header_style\";s:0:\"\";s:22:\"phone_header_font_size\";s:2:\"30\";s:23:\"tablet_header_font_size\";s:2:\"30\";s:12:\"heading_font\";s:4:\"none\";s:9:\"body_font\";s:4:\"none\";s:10:\"link_color\";s:7:\"#2ea3f2\";s:10:\"font_color\";s:7:\"#666666\";s:12:\"header_color\";s:7:\"#666666\";s:12:\"accent_color\";s:7:\"#2ea3f2\";s:13:\"color_schemes\";s:4:\"none\";s:12:\"header_style\";s:4:\"left\";s:12:\"vertical_nav\";s:0:\"\";s:24:\"vertical_nav_orientation\";s:4:\"left\";s:8:\"hide_nav\";s:0:\"\";s:24:\"show_header_social_icons\";s:0:\"\";s:16:\"show_search_icon\";s:2:\"on\";s:22:\"slide_nav_show_top_bar\";s:2:\"on\";s:15:\"slide_nav_width\";s:3:\"320\";s:19:\"slide_nav_font_size\";s:2:\"14\";s:23:\"slide_nav_top_font_size\";s:2:\"14\";s:24:\"fullscreen_nav_font_size\";s:2:\"30\";s:28:\"fullscreen_nav_top_font_size\";s:2:\"18\";s:22:\"slide_nav_font_spacing\";s:1:\"0\";s:14:\"slide_nav_font\";s:4:\"none\";s:20:\"slide_nav_font_style\";s:0:\"\";s:12:\"slide_nav_bg\";s:7:\"#2ea3f2\";s:21:\"slide_nav_links_color\";s:7:\"#ffffff\";s:28:\"slide_nav_links_color_active\";s:7:\"#ffffff\";s:19:\"slide_nav_top_color\";s:21:\"rgba(255,255,255,0.6)\";s:16:\"slide_nav_search\";s:21:\"rgba(255,255,255,0.6)\";s:19:\"slide_nav_search_bg\";s:15:\"rgba(0,0,0,0.2)\";s:13:\"nav_fullwidth\";s:0:\"\";s:17:\"hide_primary_logo\";s:0:\"\";s:11:\"menu_height\";s:2:\"66\";s:11:\"logo_height\";s:2:\"54\";s:15:\"menu_margin_top\";s:1:\"0\";s:21:\"primary_nav_font_size\";s:2:\"14\";s:24:\"primary_nav_font_spacing\";s:1:\"0\";s:16:\"primary_nav_font\";s:4:\"none\";s:22:\"primary_nav_font_style\";s:0:\"\";s:23:\"secondary_nav_font_size\";s:2:\"12\";s:23:\"secondary_nav_fullwidth\";s:0:\"\";s:26:\"secondary_nav_font_spacing\";s:1:\"0\";s:18:\"secondary_nav_font\";s:4:\"none\";s:24:\"secondary_nav_font_style\";s:0:\"\";s:9:\"menu_link\";s:15:\"rgba(0,0,0,0.6)\";s:16:\"hide_mobile_logo\";s:0:\"\";s:16:\"mobile_menu_link\";s:15:\"rgba(0,0,0,0.6)\";s:16:\"menu_link_active\";s:7:\"#2ea3f2\";s:14:\"primary_nav_bg\";s:7:\"#ffffff\";s:23:\"primary_nav_dropdown_bg\";s:7:\"#ffffff\";s:31:\"primary_nav_dropdown_line_color\";s:7:\"#2ea3f2\";s:31:\"primary_nav_dropdown_link_color\";s:15:\"rgba(0,0,0,0.7)\";s:30:\"primary_nav_dropdown_animation\";s:4:\"fade\";s:21:\"mobile_primary_nav_bg\";s:7:\"#ffffff\";s:16:\"secondary_nav_bg\";s:7:\"#2ea3f2\";s:28:\"secondary_nav_text_color_new\";s:7:\"#ffffff\";s:25:\"secondary_nav_dropdown_bg\";s:7:\"#2ea3f2\";s:33:\"secondary_nav_dropdown_link_color\";s:7:\"#ffffff\";s:32:\"secondary_nav_dropdown_animation\";s:4:\"fade\";s:22:\"primary_nav_text_color\";s:4:\"dark\";s:24:\"secondary_nav_text_color\";s:5:\"light\";s:15:\"hide_fixed_logo\";s:0:\"\";s:21:\"minimized_menu_height\";s:2:\"40\";s:27:\"fixed_primary_nav_font_size\";s:2:\"14\";s:20:\"fixed_primary_nav_bg\";s:7:\"#ffffff\";s:22:\"fixed_secondary_nav_bg\";s:7:\"#2ea3f2\";s:15:\"fixed_menu_link\";s:15:\"rgba(0,0,0,0.6)\";s:25:\"fixed_secondary_menu_link\";s:7:\"#ffffff\";s:22:\"fixed_menu_link_active\";s:7:\"#2ea3f2\";s:12:\"phone_number\";s:0:\"\";s:12:\"header_email\";s:0:\"\";s:24:\"show_footer_social_icons\";s:2:\"on\";s:14:\"footer_columns\";s:1:\"4\";s:9:\"footer_bg\";s:7:\"#222222\";s:23:\"widget_header_font_size\";d:18;s:24:\"widget_header_font_style\";b:0;s:21:\"widget_body_font_size\";s:2:\"14\";s:23:\"widget_body_line_height\";s:3:\"1.7\";s:22:\"widget_body_font_style\";b:0;s:26:\"footer_widget_header_color\";s:7:\"#2ea3f2\";s:26:\"footer_widget_bullet_color\";s:7:\"#2ea3f2\";s:28:\"footer_menu_background_color\";s:22:\"rgba(255,255,255,0.05)\";s:22:\"footer_menu_text_color\";s:7:\"#bbbbbb\";s:29:\"footer_menu_active_link_color\";s:7:\"#2ea3f2\";s:26:\"footer_menu_letter_spacing\";s:1:\"0\";s:22:\"footer_menu_font_style\";b:0;s:21:\"footer_menu_font_size\";s:2:\"14\";s:27:\"bottom_bar_background_color\";s:16:\"rgba(0,0,0,0.32)\";s:21:\"bottom_bar_text_color\";s:7:\"#666666\";s:21:\"bottom_bar_font_style\";b:0;s:20:\"bottom_bar_font_size\";s:2:\"14\";s:27:\"bottom_bar_social_icon_size\";s:2:\"24\";s:28:\"bottom_bar_social_icon_color\";s:7:\"#666666\";s:29:\"disable_custom_footer_credits\";s:0:\"\";s:21:\"all_buttons_font_size\";s:2:\"20\";s:22:\"all_buttons_text_color\";s:7:\"#ffffff\";s:20:\"all_buttons_bg_color\";s:13:\"rgba(0,0,0,0)\";s:24:\"all_buttons_border_width\";s:1:\"2\";s:24:\"all_buttons_border_color\";s:7:\"#ffffff\";s:25:\"all_buttons_border_radius\";s:1:\"3\";s:19:\"all_buttons_spacing\";s:1:\"0\";s:22:\"all_buttons_font_style\";s:0:\"\";s:16:\"all_buttons_font\";s:4:\"none\";s:16:\"all_buttons_icon\";s:3:\"yes\";s:25:\"all_buttons_selected_icon\";s:1:\"5\";s:22:\"all_buttons_icon_color\";s:7:\"#ffffff\";s:26:\"all_buttons_icon_placement\";s:5:\"right\";s:22:\"all_buttons_icon_hover\";s:3:\"yes\";s:28:\"all_buttons_text_color_hover\";s:7:\"#ffffff\";s:26:\"all_buttons_bg_color_hover\";s:21:\"rgba(255,255,255,0.2)\";s:30:\"all_buttons_border_color_hover\";s:13:\"rgba(0,0,0,0)\";s:31:\"all_buttons_border_radius_hover\";b:0;s:25:\"all_buttons_spacing_hover\";b:0;s:12:\"divi_favicon\";s:0:\"\";s:26:\"divi_bfb_optin_modal_shown\";s:2:\"no\";}', 'yes'),
(415, 'widget_aboutmewidget', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(416, 'widget_adsensewidget', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(417, 'widget_advwidget', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(418, 'shop_catalog_image_size', 'a:3:{s:5:\"width\";s:3:\"400\";s:6:\"height\";s:3:\"400\";s:4:\"crop\";i:1;}', 'yes'),
(419, 'shop_single_image_size', 'a:3:{s:5:\"width\";s:3:\"510\";s:6:\"height\";s:4:\"9999\";s:4:\"crop\";i:0;}', 'yes'),
(420, 'shop_thumbnail_image_size', 'a:3:{s:5:\"width\";s:3:\"157\";s:6:\"height\";s:3:\"157\";s:4:\"crop\";i:1;}', 'yes'),
(421, 'et_support_site_id', '9PE*OG^WD+$c#2x1QMnY', 'yes'),
(422, 'et_safe_mode_plugins_whitelist', 'a:6:{i:0;s:27:\"ari-adminer/ari-adminer.php\";i:1;s:15:\"etdev/etdev.php\";i:2;s:29:\"divi-builder/divi-builder.php\";i:3;s:31:\"query-monitor/query-monitor.php\";i:4;s:27:\"woocommerce/woocommerce.php\";i:5;s:47:\"really-simple-ssl/rlrsssl-really-simple-ssl.php\";}', 'yes'),
(423, 'et_support_center_installed', 'true', 'yes'),
(424, 'et_images_temp_folder', '/home/shapin/public_html/wp-content/uploads/et_temp', 'yes'),
(425, 'et_schedule_clean_images_last_time', '1596207569', 'yes'),
(426, 'et_bfb_settings', 'a:1:{s:10:\"enable_bfb\";s:2:\"on\";}', 'yes'),
(427, 'woocommerce_maybe_regenerate_images_hash', '991b1ca641921cf0f5baf7a2fe85861b', 'yes'),
(20671, 'wc_blocks_db_schema_version', '260', 'yes'),
(432, 'et_pb_builder_options', 'a:2:{i:0;b:0;s:35:\"email_provider_credentials_migrated\";b:1;}', 'yes'),
(438, 'external_updates-divi-ghoster', 'O:8:\"stdClass\":3:{s:9:\"lastCheck\";i:1596586178;s:14:\"checkedVersion\";s:5:\"2.1.4\";s:6:\"update\";N;}', 'no'),
(440, 'et_account_status', 'active', 'no'),
(441, '_site_transient_et_update_themes', 'O:8:\"stdClass\":3:{s:7:\"checked\";a:6:{s:4:\"Divi\";s:6:\"3.26.6\";s:10:\"ghost_divi\";s:6:\"3.26.6\";s:14:\"twentynineteen\";s:3:\"1.4\";s:15:\"twentyseventeen\";s:3:\"2.2\";s:13:\"twentysixteen\";s:3:\"2.0\";s:12:\"twentytwenty\";s:3:\"1.1\";}s:8:\"response\";a:1:{s:4:\"Divi\";a:3:{s:11:\"new_version\";s:5:\"4.5.1\";s:5:\"theme\";s:4:\"Divi\";s:3:\"url\";s:52:\"https://www.elegantthemes.com/api/changelog/divi.txt\";}}s:12:\"last_checked\";i:1595524641;}', 'no'),
(464, 'et_automatic_updates_options', 'a:2:{s:8:\"username\";s:0:\"\";s:7:\"api_key\";s:0:\"\";}', 'no'),
(471, 'content_link_color', '#999999', 'yes'),
(472, 'background_color_tint', 'rgba(0,0,0,0)', 'yes'),
(526, 'woocommerce_tracker_ua', 'a:2:{i:0;s:102:\"Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36\";i:1;s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36\";}', 'yes'),
(20616, '_transient_wc_count_comments', 'O:8:\"stdClass\":7:{s:14:\"total_comments\";i:0;s:3:\"all\";i:0;s:5:\"trash\";s:1:\"2\";s:9:\"moderated\";i:0;s:8:\"approved\";i:0;s:4:\"spam\";i:0;s:12:\"post-trashed\";i:0;}', 'yes'),
(20801, 'ucp_options', 'a:34:{s:6:\"status\";s:1:\"1\";s:11:\"license_key\";s:0:\"\";s:14:\"license_active\";b:0;s:15:\"license_expires\";s:10:\"1900-01-01\";s:12:\"license_type\";s:0:\"\";s:8:\"end_date\";s:0:\"\";s:14:\"ga_tracking_id\";s:0:\"\";s:5:\"theme\";s:12:\"mad_designer\";s:10:\"custom_css\";s:0:\"\";s:5:\"title\";s:34:\"[site-title] is under construction\";s:11:\"description\";s:14:\"[site-tagline]\";s:8:\"heading1\";s:49:\"Lo siento, estamos haciendo trabajos en el sitio.\";s:7:\"content\";s:79:\"Gracias por tu paciencia. Estamos trabajando en el sito y volveremos enseguida.\";s:15:\"social_facebook\";s:0:\"\";s:14:\"social_twitter\";s:0:\"\";s:13:\"social_google\";s:0:\"\";s:15:\"social_linkedin\";s:0:\"\";s:14:\"social_youtube\";s:0:\"\";s:12:\"social_vimeo\";s:0:\"\";s:16:\"social_pinterest\";s:0:\"\";s:15:\"social_dribbble\";s:0:\"\";s:14:\"social_behance\";s:0:\"\";s:16:\"social_instagram\";s:0:\"\";s:13:\"social_tumblr\";s:0:\"\";s:9:\"social_vk\";s:0:\"\";s:12:\"social_email\";s:0:\"\";s:12:\"social_phone\";s:0:\"\";s:12:\"social_skype\";s:0:\"\";s:15:\"social_telegram\";s:0:\"\";s:15:\"social_whatsapp\";s:0:\"\";s:12:\"login_button\";s:1:\"1\";s:8:\"linkback\";s:1:\"0\";s:17:\"whitelisted_roles\";a:1:{i:0;s:13:\"administrator\";}s:17:\"whitelisted_users\";a:0:{}}', 'yes'),
(20793, 'sgr_version', '', 'yes'),
(20794, 'sgr_login_disable', '', 'yes'),
(20795, 'sgr_badge_hide', '', 'yes'),
(20796, 'sgr_site_key', '6LfXhnUUAAAAAPLxvCquHz94JzinMDCy6ToTBodJ', 'yes'),
(20590, '_transient_timeout_wc_shipping_method_count', '1598116020', 'no'),
(20591, '_transient_wc_shipping_method_count', 'a:2:{s:7:\"version\";s:10:\"1585255058\";s:5:\"value\";i:0;}', 'no'),
(20592, '_transient_timeout_wc_low_stock_count', '1598116020', 'no'),
(20593, '_transient_wc_low_stock_count', '0', 'no'),
(20594, '_transient_timeout_wc_outofstock_count', '1598116020', 'no'),
(20595, '_transient_wc_outofstock_count', '0', 'no'),
(628, 'category_children', 'a:0:{}', 'yes'),
(5336, 'auto_core_update_notified', 'a:4:{s:4:\"type\";s:7:\"success\";s:5:\"email\";s:22:\"admin@shapinetwork.com\";s:7:\"version\";s:5:\"5.3.4\";s:9:\"timestamp\";i:1591862903;}', 'no'),
(20772, 'ub_login_image', 'https://sinergiared.com/wp-content/uploads/2016/05/logo_sinergia.png', 'yes'),
(20663, 'woocommerce_task_list_hidden', 'yes', 'yes'),
(20667, '_transient_wc_attribute_taxonomies', 'a:0:{}', 'yes'),
(20771, 'ub_admin_bar_style', '', 'yes'),
(20710, '_transient_rsssl_plusone_count', '1', 'yes'),
(20742, 'code_snippets_version', '2.14.0', 'yes'),
(21382, '_site_transient_update_core', 'O:8:\"stdClass\":4:{s:7:\"updates\";a:3:{i:0;O:8:\"stdClass\":10:{s:8:\"response\";s:7:\"upgrade\";s:8:\"download\";s:65:\"https://downloads.wordpress.org/release/es_ES/wordpress-5.4.2.zip\";s:6:\"locale\";s:5:\"es_ES\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:65:\"https://downloads.wordpress.org/release/es_ES/wordpress-5.4.2.zip\";s:10:\"no_content\";b:0;s:11:\"new_bundled\";b:0;s:7:\"partial\";b:0;s:8:\"rollback\";b:0;}s:7:\"current\";s:5:\"5.4.2\";s:7:\"version\";s:5:\"5.4.2\";s:11:\"php_version\";s:6:\"5.6.20\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"5.3\";s:15:\"partial_version\";s:0:\"\";}i:1;O:8:\"stdClass\":10:{s:8:\"response\";s:7:\"upgrade\";s:8:\"download\";s:59:\"https://downloads.wordpress.org/release/wordpress-5.4.2.zip\";s:6:\"locale\";s:5:\"en_US\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:59:\"https://downloads.wordpress.org/release/wordpress-5.4.2.zip\";s:10:\"no_content\";s:70:\"https://downloads.wordpress.org/release/wordpress-5.4.2-no-content.zip\";s:11:\"new_bundled\";s:71:\"https://downloads.wordpress.org/release/wordpress-5.4.2-new-bundled.zip\";s:7:\"partial\";b:0;s:8:\"rollback\";b:0;}s:7:\"current\";s:5:\"5.4.2\";s:7:\"version\";s:5:\"5.4.2\";s:11:\"php_version\";s:6:\"5.6.20\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"5.3\";s:15:\"partial_version\";s:0:\"\";}i:2;O:8:\"stdClass\":11:{s:8:\"response\";s:10:\"autoupdate\";s:8:\"download\";s:59:\"https://downloads.wordpress.org/release/wordpress-5.4.2.zip\";s:6:\"locale\";s:5:\"en_US\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:59:\"https://downloads.wordpress.org/release/wordpress-5.4.2.zip\";s:10:\"no_content\";s:70:\"https://downloads.wordpress.org/release/wordpress-5.4.2-no-content.zip\";s:11:\"new_bundled\";s:71:\"https://downloads.wordpress.org/release/wordpress-5.4.2-new-bundled.zip\";s:7:\"partial\";b:0;s:8:\"rollback\";b:0;}s:7:\"current\";s:5:\"5.4.2\";s:7:\"version\";s:5:\"5.4.2\";s:11:\"php_version\";s:6:\"5.6.20\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"5.3\";s:15:\"partial_version\";s:0:\"\";s:9:\"new_files\";s:1:\"1\";}}s:12:\"last_checked\";i:1596586180;s:15:\"version_checked\";s:5:\"5.3.4\";s:12:\"translations\";a:0:{}}', 'no'),
(21383, '_site_transient_update_themes', 'O:8:\"stdClass\":4:{s:12:\"last_checked\";i:1596586180;s:7:\"checked\";a:6:{s:4:\"Divi\";s:6:\"3.26.6\";s:10:\"ghost_divi\";s:6:\"3.26.6\";s:14:\"twentynineteen\";s:3:\"1.4\";s:15:\"twentyseventeen\";s:3:\"2.2\";s:13:\"twentysixteen\";s:3:\"2.0\";s:12:\"twentytwenty\";s:3:\"1.1\";}s:8:\"response\";a:4:{s:14:\"twentynineteen\";a:6:{s:5:\"theme\";s:14:\"twentynineteen\";s:11:\"new_version\";s:3:\"1.6\";s:3:\"url\";s:44:\"https://wordpress.org/themes/twentynineteen/\";s:7:\"package\";s:60:\"https://downloads.wordpress.org/theme/twentynineteen.1.6.zip\";s:8:\"requires\";s:5:\"4.9.6\";s:12:\"requires_php\";s:5:\"5.2.4\";}s:15:\"twentyseventeen\";a:6:{s:5:\"theme\";s:15:\"twentyseventeen\";s:11:\"new_version\";s:3:\"2.3\";s:3:\"url\";s:45:\"https://wordpress.org/themes/twentyseventeen/\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/theme/twentyseventeen.2.3.zip\";s:8:\"requires\";s:3:\"4.7\";s:12:\"requires_php\";s:5:\"5.2.4\";}s:13:\"twentysixteen\";a:6:{s:5:\"theme\";s:13:\"twentysixteen\";s:11:\"new_version\";s:3:\"2.1\";s:3:\"url\";s:43:\"https://wordpress.org/themes/twentysixteen/\";s:7:\"package\";s:59:\"https://downloads.wordpress.org/theme/twentysixteen.2.1.zip\";s:8:\"requires\";s:3:\"4.4\";s:12:\"requires_php\";s:5:\"5.2.4\";}s:12:\"twentytwenty\";a:6:{s:5:\"theme\";s:12:\"twentytwenty\";s:11:\"new_version\";s:3:\"1.4\";s:3:\"url\";s:42:\"https://wordpress.org/themes/twentytwenty/\";s:7:\"package\";s:58:\"https://downloads.wordpress.org/theme/twentytwenty.1.4.zip\";s:8:\"requires\";s:3:\"4.7\";s:12:\"requires_php\";s:5:\"5.2.4\";}}s:12:\"translations\";a:0:{}}', 'no'),
(21384, '_site_transient_update_plugins', 'O:8:\"stdClass\":5:{s:12:\"last_checked\";i:1596586180;s:7:\"checked\";a:13:{s:25:\"adminimize/adminimize.php\";s:6:\"1.11.7\";s:31:\"code-snippets/code-snippets.php\";s:6:\"2.14.0\";s:39:\"disable-gutenberg/disable-gutenberg.php\";s:3:\"2.1\";s:29:\"divi-ghoster/divi-ghoster.php\";s:5:\"2.1.4\";s:9:\"hello.php\";s:5:\"1.7.2\";s:33:\"nav-menu-roles/nav-menu-roles.php\";s:6:\"1.10.2\";s:47:\"really-simple-ssl/rlrsssl-really-simple-ssl.php\";s:5:\"3.3.4\";s:51:\"simple-google-recaptcha/simple-google-recaptcha.php\";s:3:\"3.7\";s:39:\"ultimate-branding/ultimate-branding.php\";s:5:\"2.0.0\";s:46:\"under-construction-page/under-construction.php\";s:4:\"3.80\";s:27:\"woocommerce/woocommerce.php\";s:5:\"4.3.1\";s:45:\"woocommerce-branding/woocommerce-branding.php\";s:6:\"1.0.19\";s:33:\"wps-hide-login/wps-hide-login.php\";s:5:\"1.5.6\";}s:8:\"response\";a:1:{s:39:\"disable-gutenberg/disable-gutenberg.php\";O:8:\"stdClass\":12:{s:2:\"id\";s:31:\"w.org/plugins/disable-gutenberg\";s:4:\"slug\";s:17:\"disable-gutenberg\";s:6:\"plugin\";s:39:\"disable-gutenberg/disable-gutenberg.php\";s:11:\"new_version\";s:3:\"2.2\";s:3:\"url\";s:48:\"https://wordpress.org/plugins/disable-gutenberg/\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/plugin/disable-gutenberg.2.2.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:70:\"https://ps.w.org/disable-gutenberg/assets/icon-256x256.png?rev=1925990\";s:2:\"1x\";s:70:\"https://ps.w.org/disable-gutenberg/assets/icon-128x128.png?rev=1925990\";}s:7:\"banners\";a:0:{}s:11:\"banners_rtl\";a:0:{}s:6:\"tested\";s:3:\"5.5\";s:12:\"requires_php\";s:6:\"5.6.20\";s:13:\"compatibility\";O:8:\"stdClass\":0:{}}}s:12:\"translations\";a:0:{}s:9:\"no_update\";a:10:{s:25:\"adminimize/adminimize.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:24:\"w.org/plugins/adminimize\";s:4:\"slug\";s:10:\"adminimize\";s:6:\"plugin\";s:25:\"adminimize/adminimize.php\";s:11:\"new_version\";s:6:\"1.11.7\";s:3:\"url\";s:41:\"https://wordpress.org/plugins/adminimize/\";s:7:\"package\";s:60:\"https://downloads.wordpress.org/plugin/adminimize.1.11.7.zip\";s:5:\"icons\";a:1:{s:7:\"default\";s:61:\"https://s.w.org/plugins/geopattern-icon/adminimize_000000.svg\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:65:\"https://ps.w.org/adminimize/assets/banner-772x250.png?rev=1118207\";}s:11:\"banners_rtl\";a:0:{}}s:31:\"code-snippets/code-snippets.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:27:\"w.org/plugins/code-snippets\";s:4:\"slug\";s:13:\"code-snippets\";s:6:\"plugin\";s:31:\"code-snippets/code-snippets.php\";s:11:\"new_version\";s:6:\"2.14.0\";s:3:\"url\";s:44:\"https://wordpress.org/plugins/code-snippets/\";s:7:\"package\";s:56:\"https://downloads.wordpress.org/plugin/code-snippets.zip\";s:5:\"icons\";a:2:{s:2:\"1x\";s:58:\"https://ps.w.org/code-snippets/assets/icon.svg?rev=2148878\";s:3:\"svg\";s:58:\"https://ps.w.org/code-snippets/assets/icon.svg?rev=2148878\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:69:\"https://ps.w.org/code-snippets/assets/banner-1544x500.png?rev=2260997\";s:2:\"1x\";s:68:\"https://ps.w.org/code-snippets/assets/banner-772x250.png?rev=2256244\";}s:11:\"banners_rtl\";a:0:{}}s:9:\"hello.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:25:\"w.org/plugins/hello-dolly\";s:4:\"slug\";s:11:\"hello-dolly\";s:6:\"plugin\";s:9:\"hello.php\";s:11:\"new_version\";s:5:\"1.7.2\";s:3:\"url\";s:42:\"https://wordpress.org/plugins/hello-dolly/\";s:7:\"package\";s:60:\"https://downloads.wordpress.org/plugin/hello-dolly.1.7.2.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:64:\"https://ps.w.org/hello-dolly/assets/icon-256x256.jpg?rev=2052855\";s:2:\"1x\";s:64:\"https://ps.w.org/hello-dolly/assets/icon-128x128.jpg?rev=2052855\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:66:\"https://ps.w.org/hello-dolly/assets/banner-772x250.jpg?rev=2052855\";}s:11:\"banners_rtl\";a:0:{}}s:33:\"nav-menu-roles/nav-menu-roles.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:28:\"w.org/plugins/nav-menu-roles\";s:4:\"slug\";s:14:\"nav-menu-roles\";s:6:\"plugin\";s:33:\"nav-menu-roles/nav-menu-roles.php\";s:11:\"new_version\";s:6:\"1.10.2\";s:3:\"url\";s:45:\"https://wordpress.org/plugins/nav-menu-roles/\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/plugin/nav-menu-roles.1.10.2.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:67:\"https://ps.w.org/nav-menu-roles/assets/icon-256x256.png?rev=2336319\";s:2:\"1x\";s:67:\"https://ps.w.org/nav-menu-roles/assets/icon-128x128.png?rev=2336319\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:70:\"https://ps.w.org/nav-menu-roles/assets/banner-1544x500.png?rev=2336319\";s:2:\"1x\";s:69:\"https://ps.w.org/nav-menu-roles/assets/banner-772x250.png?rev=2336319\";}s:11:\"banners_rtl\";a:0:{}}s:47:\"really-simple-ssl/rlrsssl-really-simple-ssl.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:31:\"w.org/plugins/really-simple-ssl\";s:4:\"slug\";s:17:\"really-simple-ssl\";s:6:\"plugin\";s:47:\"really-simple-ssl/rlrsssl-really-simple-ssl.php\";s:11:\"new_version\";s:5:\"3.3.4\";s:3:\"url\";s:48:\"https://wordpress.org/plugins/really-simple-ssl/\";s:7:\"package\";s:66:\"https://downloads.wordpress.org/plugin/really-simple-ssl.3.3.4.zip\";s:5:\"icons\";a:1:{s:2:\"1x\";s:70:\"https://ps.w.org/really-simple-ssl/assets/icon-128x128.png?rev=1782452\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:73:\"https://ps.w.org/really-simple-ssl/assets/banner-1544x500.png?rev=2320223\";s:2:\"1x\";s:72:\"https://ps.w.org/really-simple-ssl/assets/banner-772x250.png?rev=2320228\";}s:11:\"banners_rtl\";a:0:{}}s:51:\"simple-google-recaptcha/simple-google-recaptcha.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:37:\"w.org/plugins/simple-google-recaptcha\";s:4:\"slug\";s:23:\"simple-google-recaptcha\";s:6:\"plugin\";s:51:\"simple-google-recaptcha/simple-google-recaptcha.php\";s:11:\"new_version\";s:3:\"3.7\";s:3:\"url\";s:54:\"https://wordpress.org/plugins/simple-google-recaptcha/\";s:7:\"package\";s:70:\"https://downloads.wordpress.org/plugin/simple-google-recaptcha.3.7.zip\";s:5:\"icons\";a:1:{s:2:\"1x\";s:76:\"https://ps.w.org/simple-google-recaptcha/assets/icon-128x128.png?rev=1466520\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:78:\"https://ps.w.org/simple-google-recaptcha/assets/banner-772x250.png?rev=1725176\";}s:11:\"banners_rtl\";a:0:{}}s:46:\"under-construction-page/under-construction.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:37:\"w.org/plugins/under-construction-page\";s:4:\"slug\";s:23:\"under-construction-page\";s:6:\"plugin\";s:46:\"under-construction-page/under-construction.php\";s:11:\"new_version\";s:4:\"3.80\";s:3:\"url\";s:54:\"https://wordpress.org/plugins/under-construction-page/\";s:7:\"package\";s:71:\"https://downloads.wordpress.org/plugin/under-construction-page.3.80.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:76:\"https://ps.w.org/under-construction-page/assets/icon-256x256.gif?rev=2284849\";s:2:\"1x\";s:76:\"https://ps.w.org/under-construction-page/assets/icon-128x128.gif?rev=2284852\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:79:\"https://ps.w.org/under-construction-page/assets/banner-1544x500.png?rev=1628376\";s:2:\"1x\";s:78:\"https://ps.w.org/under-construction-page/assets/banner-772x250.png?rev=1575797\";}s:11:\"banners_rtl\";a:0:{}}s:27:\"woocommerce/woocommerce.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:25:\"w.org/plugins/woocommerce\";s:4:\"slug\";s:11:\"woocommerce\";s:6:\"plugin\";s:27:\"woocommerce/woocommerce.php\";s:11:\"new_version\";s:5:\"4.3.1\";s:3:\"url\";s:42:\"https://wordpress.org/plugins/woocommerce/\";s:7:\"package\";s:60:\"https://downloads.wordpress.org/plugin/woocommerce.4.3.1.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:64:\"https://ps.w.org/woocommerce/assets/icon-256x256.png?rev=2075035\";s:2:\"1x\";s:64:\"https://ps.w.org/woocommerce/assets/icon-128x128.png?rev=2075035\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:67:\"https://ps.w.org/woocommerce/assets/banner-1544x500.png?rev=2075035\";s:2:\"1x\";s:66:\"https://ps.w.org/woocommerce/assets/banner-772x250.png?rev=2075035\";}s:11:\"banners_rtl\";a:0:{}}s:45:\"woocommerce-branding/woocommerce-branding.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:34:\"w.org/plugins/woocommerce-branding\";s:4:\"slug\";s:20:\"woocommerce-branding\";s:6:\"plugin\";s:45:\"woocommerce-branding/woocommerce-branding.php\";s:11:\"new_version\";s:5:\"1.0.1\";s:3:\"url\";s:51:\"https://wordpress.org/plugins/woocommerce-branding/\";s:7:\"package\";s:69:\"https://downloads.wordpress.org/plugin/woocommerce-branding.1.0.1.zip\";s:5:\"icons\";a:3:{s:2:\"2x\";s:73:\"https://ps.w.org/woocommerce-branding/assets/icon-256x256.png?rev=1305743\";s:2:\"1x\";s:65:\"https://ps.w.org/woocommerce-branding/assets/icon.svg?rev=1305743\";s:3:\"svg\";s:65:\"https://ps.w.org/woocommerce-branding/assets/icon.svg?rev=1305743\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:75:\"https://ps.w.org/woocommerce-branding/assets/banner-772x250.jpg?rev=1307387\";}s:11:\"banners_rtl\";a:0:{}}s:33:\"wps-hide-login/wps-hide-login.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:28:\"w.org/plugins/wps-hide-login\";s:4:\"slug\";s:14:\"wps-hide-login\";s:6:\"plugin\";s:33:\"wps-hide-login/wps-hide-login.php\";s:11:\"new_version\";s:5:\"1.5.6\";s:3:\"url\";s:45:\"https://wordpress.org/plugins/wps-hide-login/\";s:7:\"package\";s:63:\"https://downloads.wordpress.org/plugin/wps-hide-login.1.5.6.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:67:\"https://ps.w.org/wps-hide-login/assets/icon-256x256.png?rev=1820667\";s:2:\"1x\";s:67:\"https://ps.w.org/wps-hide-login/assets/icon-128x128.png?rev=1820667\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:70:\"https://ps.w.org/wps-hide-login/assets/banner-1544x500.jpg?rev=1820667\";s:2:\"1x\";s:69:\"https://ps.w.org/wps-hide-login/assets/banner-772x250.jpg?rev=1820667\";}s:11:\"banners_rtl\";a:0:{}}}}', 'no'),
(20773, 'ub_login_image_height', '64', 'yes'),
(20774, 'ub_login_image_id', '', 'yes'),
(20775, 'ub_login_image_size', '', 'yes'),
(20776, 'ub_login_image_width', '64', 'yes'),
(20777, 'rwp_active_dashboard_widgets', 'a:5:{s:19:\"dashboard_right_now\";s:19:\"dashboard_right_now\";s:18:\"dashboard_activity\";s:18:\"dashboard_activity\";s:22:\"tribe_dashboard_widget\";s:22:\"tribe_dashboard_widget\";s:21:\"dashboard_quick_press\";s:21:\"dashboard_quick_press\";s:17:\"dashboard_primary\";s:17:\"dashboard_primary\";}', 'yes'),
(20778, 'ub_rwp_all_active_dashboard_widgets', 'a:7:{s:19:\"dashboard_right_now\";s:13:\"De un vistazo\";s:18:\"dashboard_activity\";s:9:\"Actividad\";s:32:\"wordfence_activity_report_widget\";s:35:\"Wordfence activity in the past week\";s:36:\"woocommerce_dashboard_recent_reviews\";s:41:\"Valoraciones recientes de Sinergia Market\";s:28:\"woocommerce_dashboard_status\";s:25:\"Estado de Sinergia Market\";s:21:\"dashboard_quick_press\";s:108:\"<span class=\"hide-if-no-js\">Borrador rápido</span> <span class=\"hide-if-js\">Tus borradores recientes</span>\";s:17:\"dashboard_primary\";s:31:\"Eventos y noticias de WordPress\";}', 'yes'),
(20747, 'code_snippets_settings', 'a:3:{s:7:\"general\";a:6:{s:19:\"activate_by_default\";b:1;s:21:\"snippet_scope_enabled\";b:1;s:11:\"enable_tags\";b:1;s:18:\"enable_description\";b:1;s:13:\"disable_prism\";b:0;s:18:\"complete_uninstall\";b:0;}s:18:\"description_editor\";a:3:{s:4:\"rows\";i:5;s:12:\"use_full_mce\";b:0;s:13:\"media_buttons\";b:0;}s:6:\"editor\";a:8:{s:5:\"theme\";s:7:\"default\";s:16:\"indent_with_tabs\";b:1;s:8:\"tab_size\";i:4;s:11:\"indent_unit\";i:4;s:10:\"wrap_lines\";b:1;s:12:\"line_numbers\";b:1;s:19:\"auto_close_brackets\";b:1;s:27:\"highlight_selection_matches\";b:1;}}', 'yes'),
(20754, 'ub_version', '2.0.0', 'yes'),
(20759, 'wdp_un_activated_flag', '0', 'no'),
(20764, 'recently_activated_snippets', 'a:0:{}', 'yes'),
(20761, 'wdp_un_local_themes', 'a:0:{}', 'no'),
(20762, 'wdp_un_local_projects', 'a:1:{i:9135;a:3:{s:4:\"type\";s:6:\"plugin\";s:7:\"version\";s:5:\"2.0.0\";s:8:\"filename\";s:39:\"ultimate-branding/ultimate-branding.php\";}}', 'no'),
(20763, 'wdp_un_updates_available', 'a:1:{i:9135;a:7:{s:4:\"type\";s:6:\"plugin\";s:7:\"version\";s:5:\"2.0.0\";s:8:\"filename\";s:39:\"ultimate-branding/ultimate-branding.php\";s:3:\"url\";s:54:\"https://premium.wpmudev.org/project/ultimate-branding/\";s:4:\"name\";s:10:\"Branda Pro\";s:11:\"new_version\";s:5:\"3.3.1\";s:10:\"autoupdate\";s:1:\"1\";}}', 'no'),
(20768, 'ultimatebranding_activated_modules', 'a:5:{s:20:\"custom-admin-bar.php\";s:3:\"yes\";s:21:\"admin-footer-text.php\";s:3:\"yes\";s:15:\"login-image.php\";s:3:\"yes\";s:17:\"export-import.php\";s:3:\"yes\";s:31:\"remove-wp-dashboard-widgets.php\";s:3:\"yes\";}', 'yes'),
(20769, 'ultimatebranding_messages', 'a:1:{i:0;a:2:{s:5:\"class\";s:7:\"success\";s:7:\"message\";s:64:\"Módulo \"<strong>Export & Import</strong>\"se activó con éxito.\";}}', 'yes'),
(20797, 'sgr_secret_key', '6LfXhnUUAAAAAEC6AQkZ_pFv9pN6ssD8SjnonQGP', 'yes'),
(20770, 'wdcab', 'a:4:{s:7:\"enabled\";s:1:\"0\";s:27:\"show_toolbar_for_non_logged\";s:1:\"0\";s:14:\"disabled_menus\";a:3:{i:0;s:7:\"wp-logo\";i:1;s:11:\"new-content\";i:2;s:7:\"updates\";}s:13:\"wp_menu_roles\";a:16:{s:13:\"Administrator\";s:13:\"administrator\";s:6:\"Editor\";s:6:\"editor\";s:6:\"Author\";s:6:\"author\";s:11:\"Contributor\";s:11:\"contributor\";s:10:\"Subscriber\";s:10:\"subscriber\";s:8:\"Customer\";s:8:\"customer\";s:12:\"Shop manager\";s:12:\"shop_manager\";s:9:\"Keymaster\";s:13:\"bbp_keymaster\";s:9:\"Moderator\";s:13:\"bbp_moderator\";s:11:\"Participant\";s:15:\"bbp_participant\";s:9:\"Spectator\";s:13:\"bbp_spectator\";s:7:\"Blocked\";s:11:\"bbp_blocked\";s:12:\"Group Leader\";s:12:\"group_leader\";s:10:\"Translator\";s:10:\"translator\";s:8:\"Director\";s:8:\"director\";s:30:\"Invitado (usuario sin usuario)\";s:5:\"guest\";}}', 'yes'),
(20779, 'admin_footer_text', 'Diseñado por <a href=\"https://sinergiared.com\"> Sinergia Red Internacional</a>', 'yes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_postmeta`
--

CREATE TABLE `wp98_postmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wp98_postmeta`
--

INSERT INTO `wp98_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default'),
(2, 3, '_wp_page_template', 'default'),
(8, 7, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:1200;s:6:\"height\";i:1200;s:4:\"file\";s:27:\"woocommerce-placeholder.png\";s:5:\"sizes\";a:7:{s:21:\"woocommerce_thumbnail\";a:5:{s:4:\"file\";s:35:\"woocommerce-placeholder-300x300.png\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:9:\"image/png\";s:9:\"uncropped\";b:0;}s:29:\"woocommerce_gallery_thumbnail\";a:4:{s:4:\"file\";s:35:\"woocommerce-placeholder-100x100.png\";s:5:\"width\";i:100;s:6:\"height\";i:100;s:9:\"mime-type\";s:9:\"image/png\";}s:18:\"woocommerce_single\";a:4:{s:4:\"file\";s:35:\"woocommerce-placeholder-600x600.png\";s:5:\"width\";i:600;s:6:\"height\";i:600;s:9:\"mime-type\";s:9:\"image/png\";}s:6:\"medium\";a:4:{s:4:\"file\";s:35:\"woocommerce-placeholder-300x300.png\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:9:\"image/png\";}s:5:\"large\";a:4:{s:4:\"file\";s:37:\"woocommerce-placeholder-1024x1024.png\";s:5:\"width\";i:1024;s:6:\"height\";i:1024;s:9:\"mime-type\";s:9:\"image/png\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:35:\"woocommerce-placeholder-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:35:\"woocommerce-placeholder-768x768.png\";s:5:\"width\";i:768;s:6:\"height\";i:768;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(7, 7, '_wp_attached_file', 'woocommerce-placeholder.png'),
(9, 12, '_edit_last', '1'),
(10, 12, '_edit_lock', '1585258491:1'),
(11, 12, '_regular_price', '340'),
(12, 12, 'total_sales', '0'),
(13, 12, '_tax_status', 'taxable'),
(14, 12, '_tax_class', ''),
(15, 12, '_manage_stock', 'no'),
(16, 12, '_backorders', 'no'),
(17, 12, '_sold_individually', 'no'),
(18, 12, '_virtual', 'no'),
(19, 12, '_downloadable', 'no'),
(20, 12, '_download_limit', '-1'),
(21, 12, '_download_expiry', '-1'),
(22, 12, '_stock', NULL),
(23, 12, '_stock_status', 'instock'),
(24, 12, '_wc_average_rating', '0'),
(25, 12, '_wc_review_count', '0'),
(26, 12, '_product_version', '4.0.1'),
(27, 12, '_price', '340'),
(28, 13, '_wp_attached_file', '2020/03/logo_sinergia.png'),
(29, 13, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:150;s:6:\"height\";i:150;s:4:\"file\";s:25:\"2020/03/logo_sinergia.png\";s:5:\"sizes\";a:2:{s:29:\"woocommerce_gallery_thumbnail\";a:4:{s:4:\"file\";s:25:\"logo_sinergia-100x100.png\";s:5:\"width\";i:100;s:6:\"height\";i:100;s:9:\"mime-type\";s:9:\"image/png\";}s:14:\"shop_thumbnail\";a:4:{s:4:\"file\";s:25:\"logo_sinergia-100x100.png\";s:5:\"width\";i:100;s:6:\"height\";i:100;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(30, 16, '_menu_item_type', 'post_type'),
(31, 16, '_menu_item_menu_item_parent', '0'),
(32, 16, '_menu_item_object_id', '11'),
(33, 16, '_menu_item_object', 'page'),
(34, 16, '_menu_item_target', ''),
(35, 16, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(36, 16, '_menu_item_xfn', ''),
(37, 16, '_menu_item_url', ''),
(59, 19, '_menu_item_object_id', '8'),
(39, 17, '_menu_item_type', 'custom'),
(40, 17, '_menu_item_menu_item_parent', '0'),
(41, 17, '_menu_item_object_id', '17'),
(42, 17, '_menu_item_object', 'custom'),
(43, 17, '_menu_item_target', ''),
(44, 17, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(45, 17, '_menu_item_xfn', ''),
(46, 17, '_menu_item_url', 'https://shapinetwork.com/mioficina/'),
(58, 19, '_menu_item_menu_item_parent', '0'),
(48, 18, '_menu_item_type', 'custom'),
(49, 18, '_menu_item_menu_item_parent', '0'),
(50, 18, '_menu_item_object_id', '18'),
(51, 18, '_menu_item_object', 'custom'),
(52, 18, '_menu_item_target', ''),
(53, 18, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(54, 18, '_menu_item_xfn', ''),
(55, 18, '_menu_item_url', 'https://shapinetwork.com/mioficina/aut/register'),
(57, 19, '_menu_item_type', 'post_type'),
(60, 19, '_menu_item_object', 'page'),
(61, 19, '_menu_item_target', ''),
(62, 19, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(63, 19, '_menu_item_xfn', ''),
(64, 19, '_menu_item_url', ''),
(85, 22, '_wp_attachment_context', 'site-icon'),
(66, 20, '_menu_item_type', 'custom'),
(67, 20, '_menu_item_menu_item_parent', '0'),
(68, 20, '_menu_item_object_id', '20'),
(69, 20, '_menu_item_object', 'custom'),
(70, 20, '_menu_item_target', ''),
(71, 20, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(72, 20, '_menu_item_xfn', ''),
(73, 20, '_menu_item_url', '#'),
(75, 21, '_menu_item_type', 'custom'),
(76, 21, '_menu_item_menu_item_parent', '0'),
(77, 21, '_menu_item_object_id', '21'),
(78, 21, '_menu_item_object', 'custom'),
(79, 21, '_menu_item_target', ''),
(80, 21, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(81, 21, '_menu_item_xfn', ''),
(82, 21, '_menu_item_url', '#'),
(84, 22, '_wp_attached_file', '2020/03/cropped-logo_sinergia.png'),
(86, 22, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:33:\"2020/03/cropped-logo_sinergia.png\";s:5:\"sizes\";a:14:{s:6:\"medium\";a:4:{s:4:\"file\";s:33:\"cropped-logo_sinergia-300x300.png\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:9:\"image/png\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:33:\"cropped-logo_sinergia-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}s:21:\"et-pb-post-main-image\";a:4:{s:4:\"file\";s:33:\"cropped-logo_sinergia-400x250.png\";s:5:\"width\";i:400;s:6:\"height\";i:250;s:9:\"mime-type\";s:9:\"image/png\";}s:21:\"et-pb-portfolio-image\";a:4:{s:4:\"file\";s:33:\"cropped-logo_sinergia-400x284.png\";s:5:\"width\";i:400;s:6:\"height\";i:284;s:9:\"mime-type\";s:9:\"image/png\";}s:28:\"et-pb-portfolio-module-image\";a:4:{s:4:\"file\";s:33:\"cropped-logo_sinergia-510x382.png\";s:5:\"width\";i:510;s:6:\"height\";i:382;s:9:\"mime-type\";s:9:\"image/png\";}s:35:\"et-pb-gallery-module-image-portrait\";a:4:{s:4:\"file\";s:33:\"cropped-logo_sinergia-400x512.png\";s:5:\"width\";i:400;s:6:\"height\";i:512;s:9:\"mime-type\";s:9:\"image/png\";}s:21:\"woocommerce_thumbnail\";a:5:{s:4:\"file\";s:33:\"cropped-logo_sinergia-300x300.png\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:9:\"image/png\";s:9:\"uncropped\";b:0;}s:29:\"woocommerce_gallery_thumbnail\";a:4:{s:4:\"file\";s:33:\"cropped-logo_sinergia-100x100.png\";s:5:\"width\";i:100;s:6:\"height\";i:100;s:9:\"mime-type\";s:9:\"image/png\";}s:12:\"shop_catalog\";a:4:{s:4:\"file\";s:33:\"cropped-logo_sinergia-300x300.png\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:9:\"image/png\";}s:14:\"shop_thumbnail\";a:4:{s:4:\"file\";s:33:\"cropped-logo_sinergia-100x100.png\";s:5:\"width\";i:100;s:6:\"height\";i:100;s:9:\"mime-type\";s:9:\"image/png\";}s:13:\"site_icon-270\";a:4:{s:4:\"file\";s:33:\"cropped-logo_sinergia-270x270.png\";s:5:\"width\";i:270;s:6:\"height\";i:270;s:9:\"mime-type\";s:9:\"image/png\";}s:13:\"site_icon-192\";a:4:{s:4:\"file\";s:33:\"cropped-logo_sinergia-192x192.png\";s:5:\"width\";i:192;s:6:\"height\";i:192;s:9:\"mime-type\";s:9:\"image/png\";}s:13:\"site_icon-180\";a:4:{s:4:\"file\";s:33:\"cropped-logo_sinergia-180x180.png\";s:5:\"width\";i:180;s:6:\"height\";i:180;s:9:\"mime-type\";s:9:\"image/png\";}s:12:\"site_icon-32\";a:4:{s:4:\"file\";s:31:\"cropped-logo_sinergia-32x32.png\";s:5:\"width\";i:32;s:6:\"height\";i:32;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(233, 1, '_wp_desired_post_slug', 'hello-world'),
(232, 1, '_wp_trash_meta_time', '1595524709'),
(231, 1, '_wp_trash_meta_status', 'publish'),
(93, 26, '_menu_item_type', 'post_type'),
(94, 26, '_menu_item_menu_item_parent', '16'),
(95, 26, '_menu_item_object_id', '11'),
(96, 26, '_menu_item_object', 'page'),
(97, 26, '_menu_item_target', ''),
(98, 26, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(99, 26, '_menu_item_xfn', ''),
(100, 26, '_menu_item_url', ''),
(111, 26, '_nav_menu_role', 'out'),
(102, 27, '_menu_item_type', 'custom'),
(103, 27, '_menu_item_menu_item_parent', '16'),
(104, 27, '_menu_item_object_id', '27'),
(105, 27, '_menu_item_object', 'custom'),
(106, 27, '_menu_item_target', ''),
(107, 27, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(108, 27, '_menu_item_xfn', ''),
(109, 27, '_menu_item_url', 'https://shapinetwork.com/mi-cuenta/customer-logout/?_wpnonce=422496eabb'),
(112, 27, '_nav_menu_role', 'in'),
(113, 12, '_thumbnail_id', '13'),
(114, 12, '_et_pb_post_hide_nav', 'default'),
(115, 12, '_et_pb_page_layout', 'et_right_sidebar'),
(116, 12, '_et_pb_side_nav', 'off'),
(117, 12, '_et_pb_use_builder', ''),
(118, 12, '_et_pb_first_image', ''),
(119, 12, '_et_pb_truncate_post', ''),
(120, 12, '_et_pb_old_content', ''),
(121, 12, '_wp_old_slug', 'producto-de-prueba'),
(122, 28, '_edit_last', '1'),
(123, 28, '_edit_lock', '1585258474:1'),
(124, 28, '_thumbnail_id', '13'),
(125, 28, '_regular_price', '600'),
(126, 28, 'total_sales', '0'),
(127, 28, '_tax_status', 'taxable'),
(128, 28, '_tax_class', ''),
(129, 28, '_manage_stock', 'no'),
(130, 28, '_backorders', 'no'),
(131, 28, '_sold_individually', 'no'),
(132, 28, '_virtual', 'no'),
(133, 28, '_downloadable', 'no'),
(134, 28, '_download_limit', '-1'),
(135, 28, '_download_expiry', '-1'),
(136, 28, '_stock', NULL),
(137, 28, '_stock_status', 'instock'),
(138, 28, '_wc_average_rating', '0'),
(139, 28, '_wc_review_count', '0'),
(140, 28, '_product_version', '4.0.1'),
(141, 28, '_price', '600'),
(142, 28, '_et_pb_post_hide_nav', 'default'),
(143, 28, '_et_pb_page_layout', 'et_right_sidebar'),
(144, 28, '_et_pb_side_nav', 'off'),
(145, 28, '_et_pb_use_builder', ''),
(146, 28, '_et_pb_first_image', ''),
(147, 28, '_et_pb_truncate_post', ''),
(148, 28, '_et_pb_old_content', ''),
(149, 29, '_edit_last', '1'),
(150, 29, '_edit_lock', '1585258887:1'),
(151, 29, '_thumbnail_id', '13'),
(152, 29, '_regular_price', '280'),
(153, 29, 'total_sales', '0'),
(154, 29, '_tax_status', 'taxable'),
(155, 29, '_tax_class', ''),
(156, 29, '_manage_stock', 'no'),
(157, 29, '_backorders', 'no'),
(158, 29, '_sold_individually', 'no'),
(159, 29, '_virtual', 'no'),
(160, 29, '_downloadable', 'no'),
(161, 29, '_download_limit', '-1'),
(162, 29, '_download_expiry', '-1'),
(163, 29, '_stock', NULL),
(164, 29, '_stock_status', 'instock'),
(165, 29, '_wc_average_rating', '0'),
(166, 29, '_wc_review_count', '0'),
(167, 29, '_product_version', '4.0.1'),
(168, 29, '_price', '280'),
(169, 29, '_et_pb_post_hide_nav', 'default'),
(170, 29, '_et_pb_page_layout', 'et_right_sidebar'),
(171, 29, '_et_pb_side_nav', 'off'),
(172, 29, '_et_pb_use_builder', ''),
(173, 29, '_et_pb_first_image', ''),
(174, 29, '_et_pb_truncate_post', ''),
(175, 29, '_et_pb_old_content', ''),
(176, 30, '_orden_key', 'wc_order_MjAyMC0wMy0yNiAxNzoxMzoxNQ=='),
(177, 30, '_customer_user', '3'),
(178, 30, '_payment_method', 'bacs'),
(179, 30, '_payment_method_title', 'Wallet'),
(180, 30, '_transaction_id', ' '),
(181, 30, '_customer_ip_address', '190.25.37.181'),
(182, 30, '_customer_user_agent', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36'),
(183, 30, '_created_via', 'checkout'),
(184, 30, '_date_completed', '2603202057'),
(185, 30, '_completed_date', '2603202057'),
(186, 30, '_date_paid', '2603202057'),
(187, 30, '_paid_date', '2603202057'),
(188, 30, '_cart_hash', '6d0c2837fd5b28bcc497943ad7bb0844'),
(189, 30, '_billing_first_name', 'Alberto'),
(190, 30, '_billing_last_name', 'Picon'),
(191, 30, '_billing_company', ''),
(192, 30, '_billing_address_1', NULL),
(193, 30, '_billing_address_2', ''),
(194, 30, '_billing_city', ''),
(195, 30, '_billing_state', ''),
(196, 30, '_billing_postcode', ''),
(197, 30, '_billing_country', NULL),
(198, 30, '_billing_email', 'cliente2@sinergiared.com'),
(199, 30, '_billing_phone', NULL),
(200, 30, '_shipping_first_name', ''),
(201, 30, '_shipping_last_name', ''),
(202, 30, '_shipping_company', ''),
(203, 30, '_shipping_address_1', ''),
(204, 30, '_shipping_address_2', ''),
(205, 30, '_shipping_city', ''),
(206, 30, '_shipping_state', ''),
(207, 30, '_shipping_postcode', ''),
(208, 30, '_shipping_country', ''),
(209, 30, '_order_currency', 'USD'),
(210, 30, '_cart_discount', '0'),
(211, 30, '_cart_discount_tax', '0'),
(212, 30, '_order_shipping', '0'),
(213, 30, '_order_shipping_tax', '0'),
(214, 30, '_order_tax', '0'),
(215, 30, '_order_total', '340.00'),
(216, 30, '_order_version', '3.5.2'),
(217, 30, '_prices_include_tax', 'no'),
(218, 30, '_billing_address_index', 'Alberto Picon    cliente2@sinergiared.com '),
(219, 30, '_shipping_address_index', ''),
(220, 30, '_recorded_sales', 'yes'),
(221, 30, '_recorded_coupon_usage_counts', 'yes'),
(222, 30, '_order_stock_reduced', 'yes'),
(223, 30, '_edit_lock', '2603202057:1'),
(224, 30, '_edit_last', '1'),
(225, 30, '_order_key', 'wc_order_MjAyMC0wMy0yNiAxNzoxMzoxNQ=='),
(226, 30, '_download_permissions_granted', 'yes'),
(234, 1, '_wp_trash_meta_comments_status', 'a:2:{i:1;s:5:\"trash\";i:2;s:5:\"trash\";}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_posts`
--

CREATE TABLE `wp98_posts` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wp98_posts`
--

INSERT INTO `wp98_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2020-03-26 20:05:35', '2020-03-26 20:05:35', '<!-- wp:paragraph -->\n<p>Welcome to WordPress. This is your first post. Edit or delete it, then start writing!</p>\n<!-- /wp:paragraph -->', 'Hello world!', '', 'trash', 'open', 'open', '', 'hello-world__trashed', '', '', '2020-07-23 17:18:29', '2020-07-23 17:18:29', '', 0, 'http://shapinetwork.com/?p=1', 0, 'post', '', 0),
(2, 1, '2020-03-26 20:05:35', '2020-03-26 20:05:35', '<!-- wp:paragraph -->\n<p>This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>Hi there! I\'m a bike messenger by day, aspiring actor by night, and this is my website. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin\' caught in the rain.)</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>...or something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>As a new WordPress user, you should go to <a href=\"http://shapinetwork.com/wp-admin/\">your dashboard</a> to delete this page and create new pages for your content. Have fun!</p>\n<!-- /wp:paragraph -->', 'Sample Page', '', 'publish', 'closed', 'open', '', 'sample-page', '', '', '2020-03-26 20:05:35', '2020-03-26 20:05:35', '', 0, 'http://shapinetwork.com/?page_id=2', 0, 'page', '', 0),
(3, 1, '2020-03-26 20:05:35', '2020-03-26 20:05:35', '<!-- wp:heading --><h2>Who we are</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Our website address is: http://shapinetwork.com.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>What personal data we collect and why we collect it</h2><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Comments</h3><!-- /wp:heading --><!-- wp:paragraph --><p>When visitors leave comments on the site we collect the data shown in the comments form, and also the visitor&#8217;s IP address and browser user agent string to help spam detection.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>An anonymized string created from your email address (also called a hash) may be provided to the Gravatar service to see if you are using it. The Gravatar service privacy policy is available here: https://automattic.com/privacy/. After approval of your comment, your profile picture is visible to the public in the context of your comment.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Media</h3><!-- /wp:heading --><!-- wp:paragraph --><p>If you upload images to the website, you should avoid uploading images with embedded location data (EXIF GPS) included. Visitors to the website can download and extract any location data from images on the website.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Contact forms</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Cookies</h3><!-- /wp:heading --><!-- wp:paragraph --><p>If you leave a comment on our site you may opt-in to saving your name, email address and website in cookies. These are for your convenience so that you do not have to fill in your details again when you leave another comment. These cookies will last for one year.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>If you visit our login page, we will set a temporary cookie to determine if your browser accepts cookies. This cookie contains no personal data and is discarded when you close your browser.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>When you log in, we will also set up several cookies to save your login information and your screen display choices. Login cookies last for two days, and screen options cookies last for a year. If you select &quot;Remember Me&quot;, your login will persist for two weeks. If you log out of your account, the login cookies will be removed.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>If you edit or publish an article, an additional cookie will be saved in your browser. This cookie includes no personal data and simply indicates the post ID of the article you just edited. It expires after 1 day.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Embedded content from other websites</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Articles on this site may include embedded content (e.g. videos, images, articles, etc.). Embedded content from other websites behaves in the exact same way as if the visitor has visited the other website.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>These websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracking your interaction with the embedded content if you have an account and are logged in to that website.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Analytics</h3><!-- /wp:heading --><!-- wp:heading --><h2>Who we share your data with</h2><!-- /wp:heading --><!-- wp:heading --><h2>How long we retain your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p>If you leave a comment, the comment and its metadata are retained indefinitely. This is so we can recognize and approve any follow-up comments automatically instead of holding them in a moderation queue.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>For users that register on our website (if any), we also store the personal information they provide in their user profile. All users can see, edit, or delete their personal information at any time (except they cannot change their username). Website administrators can also see and edit that information.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>What rights you have over your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p>If you have an account on this site, or have left comments, you can request to receive an exported file of the personal data we hold about you, including any data you have provided to us. You can also request that we erase any personal data we hold about you. This does not include any data we are obliged to keep for administrative, legal, or security purposes.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Where we send your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Visitor comments may be checked through an automated spam detection service.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Your contact information</h2><!-- /wp:heading --><!-- wp:heading --><h2>Additional information</h2><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>How we protect your data</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>What data breach procedures we have in place</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>What third parties we receive data from</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>What automated decision making and/or profiling we do with user data</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Industry regulatory disclosure requirements</h3><!-- /wp:heading -->', 'Privacy Policy', '', 'draft', 'closed', 'open', '', 'privacy-policy', '', '', '2020-03-26 20:05:35', '2020-03-26 20:05:35', '', 0, 'http://shapinetwork.com/?page_id=3', 0, 'page', '', 0),
(8, 1, '2020-03-26 20:36:32', '2020-03-26 20:36:32', '', 'Tienda', '', 'publish', 'closed', 'closed', '', 'tienda', '', '', '2020-03-26 20:36:32', '2020-03-26 20:36:32', '', 0, 'https://shapinetwork.com/tienda/', 0, 'page', '', 0),
(7, 1, '2020-03-26 20:35:34', '2020-03-26 20:35:34', '', 'woocommerce-placeholder', '', 'inherit', 'open', 'closed', '', 'woocommerce-placeholder', '', '', '2020-03-26 20:35:34', '2020-03-26 20:35:34', '', 0, 'https://shapinetwork.com/wp-content/uploads/2020/03/woocommerce-placeholder.png', 0, 'attachment', 'image/png', 0),
(9, 1, '2020-03-26 20:36:32', '2020-03-26 20:36:32', '<!-- wp:shortcode -->[woocommerce_cart]<!-- /wp:shortcode -->', 'Carrito', '', 'publish', 'closed', 'closed', '', 'carrito', '', '', '2020-03-26 20:36:32', '2020-03-26 20:36:32', '', 0, 'https://shapinetwork.com/carrito/', 0, 'page', '', 0),
(10, 1, '2020-03-26 20:36:32', '2020-03-26 20:36:32', '<!-- wp:shortcode -->[woocommerce_checkout]<!-- /wp:shortcode -->', 'Finalizar compra', '', 'publish', 'closed', 'closed', '', 'finalizar-compra', '', '', '2020-03-26 20:36:32', '2020-03-26 20:36:32', '', 0, 'https://shapinetwork.com/finalizar-compra/', 0, 'page', '', 0),
(11, 1, '2020-03-26 20:36:32', '2020-03-26 20:36:32', '<!-- wp:shortcode -->[woocommerce_my_account]<!-- /wp:shortcode -->', 'Mi cuenta', '', 'publish', 'closed', 'closed', '', 'mi-cuenta', '', '', '2020-03-26 20:36:32', '2020-03-26 20:36:32', '', 0, 'https://shapinetwork.com/mi-cuenta/', 0, 'page', '', 0),
(12, 1, '2020-03-26 20:38:07', '2020-03-26 20:38:07', '', 'Franquisia Empresario', '', 'publish', 'open', 'closed', '', 'franquisia-empresario', '', '', '2020-03-26 21:34:51', '2020-03-26 21:34:51', '', 0, 'https://shapinetwork.com/?post_type=product&#038;p=12', 0, 'product', '', 0),
(13, 1, '2020-03-26 21:19:55', '2020-03-26 21:19:55', '', 'logo_sinergia', '', 'inherit', 'open', 'closed', '', 'logo_sinergia', '', '', '2020-03-26 21:19:55', '2020-03-26 21:19:55', '', 0, 'https://shapinetwork.com/wp-content/uploads/2020/03/logo_sinergia.png', 0, 'attachment', 'image/png', 0),
(14, 1, '2020-03-26 21:20:05', '2020-03-26 21:20:05', '', 'Divi', '', 'publish', 'closed', 'closed', '', 'divi', '', '', '2020-03-26 21:20:05', '2020-03-26 21:20:05', '', 0, 'https://shapinetwork.com/2020/03/26/divi/', 0, 'custom_css', '', 0),
(15, 1, '2020-03-26 21:20:05', '2020-03-26 21:20:05', '', 'Divi', '', 'inherit', 'closed', 'closed', '', '14-revision-v1', '', '', '2020-03-26 21:20:05', '2020-03-26 21:20:05', '', 14, 'https://shapinetwork.com/2020/03/26/14-revision-v1/', 0, 'revision', '', 0),
(16, 1, '2020-03-26 21:22:19', '2020-03-26 21:22:19', '', 'Acceso', '', 'publish', 'closed', 'closed', '', '16', '', '', '2020-03-26 21:27:22', '2020-03-26 21:27:22', '', 0, 'https://shapinetwork.com/?p=16', 1, 'nav_menu_item', '', 0),
(17, 1, '2020-03-26 21:22:19', '2020-03-26 21:22:19', '', 'Oficina Virtual', '', 'publish', 'closed', 'closed', '', 'oficina-virtual', '', '', '2020-03-26 21:27:22', '2020-03-26 21:27:22', '', 0, 'https://shapinetwork.com/?p=17', 4, 'nav_menu_item', '', 0),
(18, 1, '2020-03-26 21:22:19', '2020-03-26 21:22:19', '', 'Registro', '', 'publish', 'closed', 'closed', '', 'registro', '', '', '2020-03-26 21:27:22', '2020-03-26 21:27:22', '', 0, 'https://shapinetwork.com/?p=18', 5, 'nav_menu_item', '', 0),
(19, 1, '2020-03-26 21:23:36', '2020-03-26 21:23:36', ' ', '', '', 'publish', 'closed', 'closed', '', '19', '', '', '2020-03-26 21:23:36', '2020-03-26 21:23:36', '', 0, 'https://shapinetwork.com/?p=19', 1, 'nav_menu_item', '', 0),
(20, 1, '2020-03-26 21:23:36', '2020-03-26 21:23:36', '', 'Contacto', '', 'publish', 'closed', 'closed', '', 'contacto', '', '', '2020-03-26 21:23:36', '2020-03-26 21:23:36', '', 0, 'https://shapinetwork.com/?p=20', 2, 'nav_menu_item', '', 0),
(21, 1, '2020-03-26 21:23:36', '2020-03-26 21:23:36', '', 'Plan de negocio', '', 'publish', 'closed', 'closed', '', 'plan-de-negocio', '', '', '2020-03-26 21:23:36', '2020-03-26 21:23:36', '', 0, 'https://shapinetwork.com/?p=21', 3, 'nav_menu_item', '', 0),
(22, 1, '2020-03-26 21:24:43', '2020-03-26 21:24:43', 'https://shapinetwork.com/wp-content/uploads/2020/03/cropped-logo_sinergia.png', 'cropped-logo_sinergia.png', '', 'inherit', 'open', 'closed', '', 'cropped-logo_sinergia-png', '', '', '2020-03-26 21:24:43', '2020-03-26 21:24:43', '', 0, 'https://shapinetwork.com/wp-content/uploads/2020/03/cropped-logo_sinergia.png', 0, 'attachment', 'image/png', 0),
(34, 1, '2020-07-23 17:18:29', '2020-07-23 17:18:29', '<!-- wp:paragraph -->\n<p>Welcome to WordPress. This is your first post. Edit or delete it, then start writing!</p>\n<!-- /wp:paragraph -->', 'Hello world!', '', 'inherit', 'closed', 'closed', '', '1-revision-v1', '', '', '2020-07-23 17:18:29', '2020-07-23 17:18:29', '', 1, 'https://shapinetwork.com/2020/07/23/1-revision-v1/', 0, 'revision', '', 0),
(26, 1, '2020-03-26 21:27:22', '2020-03-26 21:27:22', ' ', '', '', 'publish', 'closed', 'closed', '', '26', '', '', '2020-03-26 21:27:22', '2020-03-26 21:27:22', '', 0, 'https://shapinetwork.com/?p=26', 2, 'nav_menu_item', '', 0),
(27, 1, '2020-03-26 21:27:22', '2020-03-26 21:27:22', '', 'Salir', '', 'publish', 'closed', 'closed', '', 'salir', '', '', '2020-03-26 21:27:22', '2020-03-26 21:27:22', '', 0, 'https://shapinetwork.com/?p=27', 3, 'nav_menu_item', '', 0),
(28, 1, '2020-03-26 21:35:43', '2020-03-26 21:35:43', '', 'Franquisia Premiun', '', 'publish', 'open', 'closed', '', 'franquisia-premiun', '', '', '2020-03-26 21:35:43', '2020-03-26 21:35:43', '', 0, 'https://shapinetwork.com/?post_type=product&#038;p=28', 0, 'product', '', 0),
(29, 1, '2020-03-26 21:38:21', '2020-03-26 21:38:21', '', 'Mensualidad', '', 'publish', 'open', 'closed', '', 'mensualidad', '', '', '2020-03-26 21:38:21', '2020-03-26 21:38:21', '', 0, 'https://shapinetwork.com/?post_type=product&#038;p=29', 0, 'product', '', 0),
(30, 1, '2020-03-26 17:13:15', '2020-03-26 17:13:15', ' ', 'Orden&ndash;Mar 26, 2020 @ 05:13 PM', ' ', 'wc-completed', 'open', 'closed', 'order_MjAyMC0wMy0yNiAxNzoxMzoxNQ==', 'perdido-Mar-26-2020-0513-pm', ' ', ' ', '2020-03-26 17:13:57', '2020-03-26 17:13:57', ' ', 0, 'https://shapinetwork.com/?post_type=shop_order&#038;p=30', 0, 'shop_order', ' ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_snippets`
--

CREATE TABLE `wp98_snippets` (
  `id` bigint(20) NOT NULL,
  `name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `scope` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'global',
  `priority` smallint(6) NOT NULL DEFAULT '10',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wp98_snippets`
--

INSERT INTO `wp98_snippets` (`id`, `name`, `description`, `code`, `tags`, `scope`, `priority`, `active`, `modified`) VALUES
(6, 'Ocultar versiones de wordpress', '', 'add_action( \'admin_head\', \'ocultar_notificacion_actualizacion\', 1 );\nfunction ocultar_notificacion_actualizacion() {\n if ( ! current_user_can( \'update_core\' )) {\n remove_action( \'admin_notices\', \'update_nag\', 3 );\n }\n}', '', 'global', 10, 1, '2020-07-23 17:15:03'),
(7, 'eliminar notificaciones de plugins y temas', '', 'function hide_notices_dashboard() {\n    global $wp_filter;\n \n    if (is_network_admin() and isset($wp_filter[\"network_admin_notices\"])) {\n        unset($wp_filter[\'network_admin_notices\']);\n    } elseif(is_user_admin() and isset($wp_filter[\"user_admin_notices\"])) {\n        unset($wp_filter[\'user_admin_notices\']);\n    } else {\n        if(isset($wp_filter[\"admin_notices\"])) {\n            unset($wp_filter[\'admin_notices\']);\n        }\n    }\n \n    if (isset($wp_filter[\"all_admin_notices\"])) {\n        unset($wp_filter[\'all_admin_notices\']);\n    }\n}\nadd_action( \'admin_init\', \'hide_notices_dashboard\' );', '', 'global', 10, 1, '2020-07-23 17:15:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_termmeta`
--

CREATE TABLE `wp98_termmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wp98_termmeta`
--

INSERT INTO `wp98_termmeta` (`meta_id`, `term_id`, `meta_key`, `meta_value`) VALUES
(1, 15, 'product_count_product_cat', '0'),
(2, 18, 'order', '0'),
(3, 18, 'product_count_product_cat', '2'),
(4, 19, 'order', '0'),
(5, 19, 'product_count_product_cat', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_terms`
--

CREATE TABLE `wp98_terms` (
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wp98_terms`
--

INSERT INTO `wp98_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Uncategorized', 'uncategorized', 0),
(2, 'simple', 'simple', 0),
(3, 'grouped', 'grouped', 0),
(4, 'variable', 'variable', 0),
(5, 'external', 'external', 0),
(6, 'exclude-from-search', 'exclude-from-search', 0),
(7, 'exclude-from-catalog', 'exclude-from-catalog', 0),
(8, 'featured', 'featured', 0),
(9, 'outofstock', 'outofstock', 0),
(10, 'rated-1', 'rated-1', 0),
(11, 'rated-2', 'rated-2', 0),
(12, 'rated-3', 'rated-3', 0),
(13, 'rated-4', 'rated-4', 0),
(14, 'rated-5', 'rated-5', 0),
(15, 'Sin categorizar', 'sin-categorizar', 0),
(16, 'Principal', 'principal', 0),
(17, 'Secundario', 'secundario', 0),
(18, 'Activacion', 'activacion', 0),
(19, 'Recompra', 'recompra', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_term_relationships`
--

CREATE TABLE `wp98_term_relationships` (
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wp98_term_relationships`
--

INSERT INTO `wp98_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 1, 0),
(28, 18, 0),
(12, 2, 0),
(16, 17, 0),
(17, 17, 0),
(18, 17, 0),
(19, 16, 0),
(20, 16, 0),
(21, 16, 0),
(26, 17, 0),
(27, 17, 0),
(12, 18, 0),
(28, 2, 0),
(29, 19, 0),
(29, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_term_taxonomy`
--

CREATE TABLE `wp98_term_taxonomy` (
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wp98_term_taxonomy`
--

INSERT INTO `wp98_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 0),
(2, 2, 'product_type', '', 0, 3),
(3, 3, 'product_type', '', 0, 0),
(4, 4, 'product_type', '', 0, 0),
(5, 5, 'product_type', '', 0, 0),
(6, 6, 'product_visibility', '', 0, 0),
(7, 7, 'product_visibility', '', 0, 0),
(8, 8, 'product_visibility', '', 0, 0),
(9, 9, 'product_visibility', '', 0, 0),
(10, 10, 'product_visibility', '', 0, 0),
(11, 11, 'product_visibility', '', 0, 0),
(12, 12, 'product_visibility', '', 0, 0),
(13, 13, 'product_visibility', '', 0, 0),
(14, 14, 'product_visibility', '', 0, 0),
(15, 15, 'product_cat', '', 0, 0),
(16, 16, 'nav_menu', '', 0, 3),
(17, 17, 'nav_menu', '', 0, 5),
(18, 18, 'product_cat', '', 0, 2),
(19, 19, 'product_cat', '', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_usermeta`
--

CREATE TABLE `wp98_usermeta` (
  `umeta_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wp98_usermeta`
--

INSERT INTO `wp98_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'shapinetadmin'),
(2, 1, 'first_name', ''),
(3, 1, 'last_name', ''),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'syntax_highlighting', 'true'),
(7, 1, 'comment_shortcuts', 'false'),
(8, 1, 'admin_color', 'fresh'),
(9, 1, 'use_ssl', '0'),
(10, 1, 'show_admin_bar_front', 'true'),
(11, 1, 'locale', ''),
(12, 1, 'wp98_capabilities', 'a:1:{s:13:\"administrator\";b:1;}'),
(13, 1, 'wp98_user_level', '10'),
(14, 1, 'dismissed_wp_pointers', ''),
(15, 1, 'show_welcome_panel', '1'),
(16, 1, 'session_tokens', 'a:1:{s:64:\"4bbe28545e848bef878c40f817f52f6159aaaaed4f086ca518ed1c8094eb57da\";a:4:{s:10:\"expiration\";i:1595696819;s:2:\"ip\";s:13:\"181.63.18.216\";s:2:\"ua\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36\";s:5:\"login\";i:1595524019;}}'),
(17, 1, 'wp98_dashboard_quick_press_last_post_id', '31'),
(18, 1, 'community-events-location', 'a:1:{s:2:\"ip\";s:11:\"181.63.18.0\";}'),
(57, 2, 'session_tokens', 'a:9:{s:64:\"6fd50f38b54133c1ed787f3c51fa356150251571390f51a22c0126025de6f2c6\";a:4:{s:10:\"expiration\";i:1592434618;s:2:\"ip\";s:14:\"144.217.193.11\";s:2:\"ua\";s:76:\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0\";s:5:\"login\";i:1592261818;}s:64:\"a9e081582c93640a52697d4308779e2697495c04f9f93810f78d9d8aacc1cd5f\";a:4:{s:10:\"expiration\";i:1592441495;s:2:\"ip\";s:13:\"51.254.209.86\";s:2:\"ua\";s:76:\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0\";s:5:\"login\";i:1592268695;}s:64:\"2280457580c82123fbd01b58805d65bd68896db4b72b0f329ba50f2e289f9382\";a:4:{s:10:\"expiration\";i:1592442340;s:2:\"ip\";s:14:\"91.134.248.249\";s:2:\"ua\";s:76:\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0\";s:5:\"login\";i:1592269540;}s:64:\"1a823b8edeb2ac3d05f5a46b006fe5c0ed53eef0a10a313924fe8a398f123ee9\";a:4:{s:10:\"expiration\";i:1592444255;s:2:\"ip\";s:12:\"95.0.170.140\";s:2:\"ua\";s:76:\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0\";s:5:\"login\";i:1592271455;}s:64:\"1e6efac89d2f252af2587472871dcd57e17112da681c37e385a432a8d3ed9981\";a:4:{s:10:\"expiration\";i:1592447633;s:2:\"ip\";s:10:\"81.4.96.82\";s:2:\"ua\";s:76:\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0\";s:5:\"login\";i:1592274833;}s:64:\"295de33589cf54b7de2c59ccd3fc41a6a6abedd11d53466f584148554c1d3060\";a:4:{s:10:\"expiration\";i:1592449378;s:2:\"ip\";s:13:\"148.71.89.190\";s:2:\"ua\";s:76:\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0\";s:5:\"login\";i:1592276578;}s:64:\"c7cd43287540453d80516e9aebfd0f658f3c14c91466057f52dec57a0cd01700\";a:4:{s:10:\"expiration\";i:1592450367;s:2:\"ip\";s:15:\"167.172.252.248\";s:2:\"ua\";s:76:\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0\";s:5:\"login\";i:1592277567;}s:64:\"9e82976316508ed4c6d77924bad9284d39aabac545477629f846fb7bec26d87c\";a:4:{s:10:\"expiration\";i:1592451565;s:2:\"ip\";s:13:\"147.139.37.89\";s:2:\"ua\";s:76:\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0\";s:5:\"login\";i:1592278765;}s:64:\"1bc4a7a9e680f7b490925a94088c765bce40b2211a8edb3a657aa190074fd5b1\";a:4:{s:10:\"expiration\";i:1592451831;s:2:\"ip\";s:14:\"197.232.53.182\";s:2:\"ua\";s:76:\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0\";s:5:\"login\";i:1592279031;}}'),
(19, 1, '_woocommerce_tracks_anon_id', 'woo:vMOf3jY+VY3SmA2rCHbJq9Kk'),
(20, 1, 'wc_last_active', '1595462400'),
(21, 1, 'managenav-menuscolumnshidden', 'a:5:{i:0;s:11:\"link-target\";i:1;s:11:\"css-classes\";i:2;s:3:\"xfn\";i:3;s:11:\"description\";i:4;s:15:\"title-attribute\";}'),
(22, 1, 'metaboxhidden_nav-menus', 'a:8:{i:0;s:21:\"add-post-type-project\";i:1;s:21:\"add-post-type-product\";i:2;s:12:\"add-post_tag\";i:3;s:15:\"add-post_format\";i:4;s:20:\"add-project_category\";i:5;s:15:\"add-project_tag\";i:6;s:15:\"add-product_cat\";i:7;s:15:\"add-product_tag\";}'),
(23, 1, 'wp98_user-settings', 'libraryContent=browse'),
(24, 1, 'wp98_user-settings-time', '1585257616'),
(25, 2, 'nickname', 'cliente1@sinergiared.com'),
(26, 2, 'first_name', 'Ramon'),
(27, 2, 'last_name', 'Picon'),
(28, 2, 'wp98_capabilities', 'a:1:{s:10:\"subscriber\";b:1;}'),
(29, 2, 'billing_first_name', 'Ramon'),
(30, 2, 'billing_last_name', 'Picon'),
(31, 2, 'billing_email', 'cliente1@sinergiared.com'),
(32, 2, 'billing_phone', NULL),
(33, 3, 'nickname', 'cliente2@sinergiared.com'),
(34, 3, 'first_name', 'Alberto'),
(35, 3, 'last_name', 'Picon'),
(36, 3, 'wp98_capabilities', 'a:1:{s:10:\"subscriber\";b:1;}'),
(37, 3, 'billing_first_name', 'Alberto'),
(38, 3, 'billing_last_name', 'Picon'),
(39, 3, 'billing_email', 'cliente2@sinergiared.com'),
(40, 3, 'billing_phone', NULL),
(42, 4, 'nickname', 'danieladmin'),
(43, 4, 'first_name', 'Daniel'),
(44, 4, 'last_name', 'Admin'),
(45, 4, 'description', ''),
(46, 4, 'rich_editing', 'true'),
(47, 4, 'syntax_highlighting', 'true'),
(48, 4, 'comment_shortcuts', 'false'),
(49, 4, 'admin_color', 'fresh'),
(50, 4, 'use_ssl', '0'),
(51, 4, 'show_admin_bar_front', 'true'),
(52, 4, 'locale', ''),
(53, 4, 'wp98_capabilities', 'a:1:{s:12:\"shop_manager\";b:1;}'),
(54, 4, 'wp98_user_level', '9'),
(55, 4, 'dismissed_wp_pointers', ''),
(56, 4, 'last_update', '1585266684'),
(58, 2, 'wc_last_active', '1592265600'),
(60, 3, 'session_tokens', 'a:16:{s:64:\"3fa0940b8547fcd7222bd9320c41f6ac9c8acb54568d1edce883210eab249200\";a:4:{s:10:\"expiration\";i:1592372074;s:2:\"ip\";s:13:\"47.254.69.237\";s:2:\"ua\";s:76:\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0\";s:5:\"login\";i:1592199274;}s:64:\"21d74f40c82e31d9b66fecf3ee8c139aba6061e1074dd6b528a2a2250d95e8f4\";a:4:{s:10:\"expiration\";i:1592384333;s:2:\"ip\";s:13:\"134.122.93.28\";s:2:\"ua\";s:76:\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0\";s:5:\"login\";i:1592211533;}s:64:\"75b3dbb9de2096ced2a569b3008a963dd9241c5c15d268dd4d371043c767f5a0\";a:4:{s:10:\"expiration\";i:1592389879;s:2:\"ip\";s:11:\"3.23.35.234\";s:2:\"ua\";s:76:\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0\";s:5:\"login\";i:1592217079;}s:64:\"76035b3897705eadb60d3a951de24b77fe94c2fc7c4f1f19e3b1f9120a49ea89\";a:4:{s:10:\"expiration\";i:1592390453;s:2:\"ip\";s:11:\"3.7.236.223\";s:2:\"ua\";s:76:\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0\";s:5:\"login\";i:1592217653;}s:64:\"bdae4624078dca3a5a81b58d0805b973652700efddb62e7e13f0ec4ba78b3727\";a:4:{s:10:\"expiration\";i:1592395045;s:2:\"ip\";s:12:\"34.86.202.44\";s:2:\"ua\";s:76:\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0\";s:5:\"login\";i:1592222245;}s:64:\"17c9ff16aa547115a18c8dab87abfc64c0fbfe80e3c77af9136b5ccc65654e9a\";a:4:{s:10:\"expiration\";i:1592396678;s:2:\"ip\";s:12:\"51.68.229.67\";s:2:\"ua\";s:76:\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0\";s:5:\"login\";i:1592223878;}s:64:\"1edba0c41fc27817cfcd104c37196b5ecf687e69455f56ef2b4d076812c6090a\";a:4:{s:10:\"expiration\";i:1592397492;s:2:\"ip\";s:14:\"104.248.16.191\";s:2:\"ua\";s:76:\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0\";s:5:\"login\";i:1592224692;}s:64:\"0e4796bad9142ef569fefc430cfb83d2f37051277889e6f751d669438d5988f2\";a:4:{s:10:\"expiration\";i:1592398658;s:2:\"ip\";s:12:\"185.95.0.197\";s:2:\"ua\";s:76:\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0\";s:5:\"login\";i:1592225858;}s:64:\"b87c87b0c58c229160c592b91ff81066c0ea8e070a5602dc675ce60cbb26f0f6\";a:4:{s:10:\"expiration\";i:1592398729;s:2:\"ip\";s:13:\"51.254.209.86\";s:2:\"ua\";s:76:\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0\";s:5:\"login\";i:1592225929;}s:64:\"e9387cdbc7842344620d969f97f5e0a62b0a789b2399c766327e4aea8ee00b1b\";a:4:{s:10:\"expiration\";i:1592403121;s:2:\"ip\";s:13:\"167.71.211.11\";s:2:\"ua\";s:76:\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0\";s:5:\"login\";i:1592230321;}s:64:\"dbb2d3c32647947fa9a238284d9fa75f6402010cb1c74b7425a526545105a547\";a:4:{s:10:\"expiration\";i:1592406002;s:2:\"ip\";s:13:\"157.230.91.15\";s:2:\"ua\";s:76:\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0\";s:5:\"login\";i:1592233202;}s:64:\"eff17120dad5225b372299f279a70fa1539c921f3d4821bebc1c16a75ce5ed5b\";a:4:{s:10:\"expiration\";i:1592408950;s:2:\"ip\";s:14:\"188.166.55.115\";s:2:\"ua\";s:76:\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0\";s:5:\"login\";i:1592236150;}s:64:\"1469dc0e445d9f04142e561507246872c10b279e70524a74913092e1bb33a0a2\";a:4:{s:10:\"expiration\";i:1592409322;s:2:\"ip\";s:13:\"107.191.44.45\";s:2:\"ua\";s:76:\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0\";s:5:\"login\";i:1592236522;}s:64:\"69859b5b8864337c913ce5f86ba76c86a286cab51e066b9334a45ba45fa70648\";a:4:{s:10:\"expiration\";i:1592410010;s:2:\"ip\";s:13:\"183.181.85.69\";s:2:\"ua\";s:76:\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0\";s:5:\"login\";i:1592237210;}s:64:\"091eed96a7b82901b6be11b9d6d82b0c50df1da5071f14456b8f430732fde621\";a:4:{s:10:\"expiration\";i:1592410223;s:2:\"ip\";s:15:\"167.172.110.159\";s:2:\"ua\";s:76:\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0\";s:5:\"login\";i:1592237423;}s:64:\"c55e4e72c575c5fd6e098a8c20477a10f4342923e4af41b60c922f6b4bf18529\";a:4:{s:10:\"expiration\";i:1592417807;s:2:\"ip\";s:14:\"202.254.236.42\";s:2:\"ua\";s:76:\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0\";s:5:\"login\";i:1592245007;}}'),
(61, 3, 'wc_last_active', '1592179200'),
(144, 1, '_order_count', '0'),
(63, 3, '_order_count', '1'),
(164, 7, 'first_name', 'pietro'),
(163, 7, 'nickname', 'yo@gmail.com'),
(159, 6, 'billing_first_name', 'pietro'),
(160, 6, 'billing_last_name', 'pasqualis'),
(161, 6, 'billing_email', 'yo@gmail.com'),
(162, 6, 'billing_phone', NULL),
(155, 6, 'nickname', 'yo@gmail.com'),
(156, 6, 'first_name', 'pietro'),
(157, 6, 'last_name', 'pasqualis'),
(158, 6, 'wp98_capabilities', 'a:1:{s:10:\"subscriber\";b:1;}'),
(151, 5, 'billing_first_name', 'pietro'),
(152, 5, 'billing_last_name', 'pasqualis'),
(153, 5, 'billing_email', 'yo@gmail.com'),
(154, 5, 'billing_phone', NULL),
(148, 5, 'first_name', 'pietro'),
(149, 5, 'last_name', 'pasqualis'),
(150, 5, 'wp98_capabilities', 'a:1:{s:10:\"subscriber\";b:1;}'),
(71, 2, '_order_count', '0'),
(147, 5, 'nickname', 'yo@gmail.com'),
(146, 1, 'wp98_managetoplevel_page_snippetscolumnshidden', 'a:1:{i:0;s:2:\"id\";}'),
(165, 7, 'last_name', 'pasqualis'),
(166, 7, 'wp98_capabilities', 'a:1:{s:10:\"subscriber\";b:1;}'),
(167, 7, 'billing_first_name', 'pietro'),
(168, 7, 'billing_last_name', 'pasqualis'),
(169, 7, 'billing_email', 'yo@gmail.com'),
(170, 7, 'billing_phone', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_users`
--

CREATE TABLE `wp98_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
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
  `modo_oscuro` int(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wp98_users`
--

INSERT INTO `wp98_users` (`ID`, `birthdate`, `gender`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`, `password`, `avatar`, `provider`, `provider_id`, `access_token`, `remember_token`, `created_at`, `updated_at`, `referred_id`, `sponsor_id`, `position_id`, `status`, `rol_id`, `wallet_amount`, `billetera`, `bank_amount`, `clave`, `activacion`, `fecha_activacion`, `token_correo`, `tipouser`, `ladomatriz`, `puntosPro`, `puntosRed`, `puntosDer`, `puntosIzq`, `debiDer`, `debiIzq`, `binario`, `codigo`, `correos`, `limitar`, `pop_up`, `autenticacion`, `factor2`, `fechaver`, `modo_oscuro`) VALUES
(1, NULL, NULL, 'shapinetadmin', '$P$B992jwyhEJzww0CCIg4l57J0j.pdf60', 'shapinetadmin', 'admin@shapinetwork.com', '', '2020-08-05 00:10:29', '', 0, 'Shapinetwork', '$2y$10$X901K/MPP45Icd.9GyBvJO/7246PTmMW4HGRftL/w5aOGMeD/kmVK', 'avatar.png', NULL, NULL, NULL, 'fQFRQZpP2s3TY6XYeMv1d7dNgMF6CtLZ78VfhqCkVna9cdI1osdn2xNduhaz', '2020-03-26 20:49:07', '2020-08-05 00:10:29', 0, 0, 0, 1, 0, 170, 0, 0, '$2y$10$x3gfgSnAfQTfXiZenuaDWuKExJ7rLTq0u2th/zmVgAAbg7Q/s/HGW', 0, NULL, NULL, 'Normal', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '{\"pago\":\"1\",\"compra\":\"1\",\"pc\":\"1\",\"liquidacion\":\"1\"}', 1, 0, NULL, NULL, NULL, 0),
(2, NULL, NULL, 'ramonp', '$P$BYIFLisGIrXybToQeSMTK/usXay0Lz1', 'ramonp', 'cliente1@sinergiared.com', '', '2020-07-29 22:39:13', '', 0, 'Ramon Picon', '$2y$10$qM0vSVT/9KzmR/x/LOLDMe8XSm4RipwEpYU3XUFBnJiFK7S6mdaQm', 'avatar.png', NULL, NULL, NULL, 'U1h2VTGPKbXp55r4rTZMxhyggUr5m0URt5yUUe2gLMNbzsjz2cYnLfmt31O3', '2020-03-26 22:00:37', '2020-07-29 22:33:13', 1, 1, 1, 0, 1, 0, 0, 0, 'eyJpdiI6IkR2Z0tmeUpNeWpoUDc3VkNDalJPMHc9PSIsInZhbHVlIjoibjdsMFYyWVJQaXNpT2FMdzYyZ1YzUT09IiwibWFjIjoiNzZlMWE4YmRlMjM5NmU0MDNjNTEyNGJiY2I3ZDgyZjZkMTJmY2FiYWYyZmMwOTAwY2U4YTc1NmVjNmYzZjJhMiJ9', 0, NULL, NULL, 'Normal', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '{\"pago\":\"1\",\"compra\":\"1\",\"pc\":\"1\",\"liquidacion\":\"1\"}', 1, 0, NULL, NULL, NULL, 0),
(3, NULL, NULL, 'albertop', '$P$BNTurnWInYiH.YQyeVJarJMNFNJSpA/', 'albertop', 'cliente2@sinergiared.com', '', '2020-04-20 15:07:02', '', 0, 'Alberto Picon', '$2y$10$vxc39wFkYzboHbmxL07GH.tR2yLWml2SRfod5bJ6MvnsxkvFQsY5i', 'avatar.png', NULL, NULL, NULL, 'etsG4PlZSIgb5lhuxvqJOiTjD9t9gPEnLUEfUlhvT2H4pcxRPXXztrYC5MXO', '2020-03-26 22:02:13', '2020-03-26 22:14:01', 1, 1, 1, 1, 1, 0, 0, 0, 'eyJpdiI6ImJwOE45dGVaYkRRajhNbEtyeUNyQUE9PSIsInZhbHVlIjoia3Q0ZURpUXl5dDFOVUQ1OEhZR0xaQT09IiwibWFjIjoiYTlmMWY2OGNkY2E5MzhhYTNiNTdiYjQ1ZmQyYTMyYTk0ZjI2MWE0ZTgyM2VhMGZlZDcyYWI0NDI5ZWY5MDE1MCJ9', 1, '2020-04-26 17:13:15', NULL, 'Normal', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '{\"pago\":\"1\",\"compra\":\"1\",\"pc\":\"1\",\"liquidacion\":\"1\"}', 1, 0, NULL, NULL, NULL, 0),
(4, NULL, NULL, 'danieladmin', '$P$BTMlNhC0FMldwCEM2YhkJivt.y.N3a1', 'danieladmin', 'info@shapinetwork.com', 'https://shapinetwork.com/', '2020-07-29 21:59:11', '1585266684:$P$B40rlk.ZrWWbAW8iVc4eoptEsuNpee.', 0, 'Daniel Admin', NULL, 'avatar.png', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 1, 0, 0, 0, NULL, 0, NULL, NULL, 'Normal', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '{\"pago\":\"1\",\"compra\":\"1\",\"pc\":\"1\",\"liquidacion\":\"1\"}', 1, 0, NULL, NULL, NULL, 0),
(7, '2016-09-28', 'M', 'pietro giacomo pasqualis', 'e10adc3949ba59abbe56e057f20f883e', 'pietro giacomo pasqualis', 'yo@gmail.com', '', '2020-08-04 13:47:37', '', 0, 'pietro pasqualis', '$2y$10$ixsyhaNO/HBNQmX5dL/0KOG1xbMsHPUYYbFyOAsYt.D9vvIkg.Uoq', 'avatar.png', NULL, NULL, NULL, 'D7hsCs7pn0lqsTRZckE9hcx8GNNvLxDmh9khEpNQkoD1MEUFQzgGykCgkHYY', '2020-08-04 13:26:02', '2020-08-04 13:47:23', 1, 1, 1, 0, 1, 0, 0, 0, 'eyJpdiI6InJReDgwOEFMemVPYU5QZ2IwdGdiUlE9PSIsInZhbHVlIjoiOTVDSWk3VTArRXBPRXFYTmVYZ1ZFUT09IiwibWFjIjoiNDZjY2U5MjRhZDEyMDY2ZjI3N2NjNmU1NWFlMGM1MDQ4MzQzODQ0ZTlmNWIzNjY5MTk4ZDY1ZDc1ZDNlMDhhMSJ9', 0, NULL, NULL, 'Normal', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '{\"pago\":\"1\",\"compra\":\"1\",\"pc\":\"1\",\"liquidacion\":\"1\"}', 1, 0, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_users_old`
--

CREATE TABLE `wp98_users_old` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wp98_users_old`
--

INSERT INTO `wp98_users_old` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'shapinetadmin', '$P$B992jwyhEJzww0CCIg4l57J0j.pdf60', 'shapinetadmin', 'admin@shapinetwork.com', '', '2020-03-26 20:05:35', '', 0, 'shapinetadmin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_wc_admin_notes`
--

CREATE TABLE `wp98_wc_admin_notes` (
  `note_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'info',
  `content_data` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_reminder` datetime DEFAULT NULL,
  `is_snoozable` tinyint(1) NOT NULL DEFAULT '0',
  `layout` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wp98_wc_admin_notes`
--

INSERT INTO `wp98_wc_admin_notes` (`note_id`, `name`, `type`, `locale`, `title`, `content`, `icon`, `content_data`, `status`, `source`, `date_created`, `date_reminder`, `is_snoozable`, `layout`, `image`, `is_deleted`) VALUES
(12, 'wc-admin-learn-more-about-product-settings', 'info', 'en_US', 'Aprender más acerca de los ajustes de producto', 'En este video encontrarás información sobre cómo configurar los ajustes del producto, cómo se muestran, editar las opciones de inventario, etc.', 'info', '{}', 'unactioned', 'woocommerce-admin', '2020-07-23 21:35:35', NULL, 0, 'plain', '', 0),
(11, 'wc-admin-store-notice-giving-feedback-2', 'info', 'en_US', 'Da tu opinión', 'Ahora que nos has elegido como socio, nuestro objetivo es asegurarnos de que proporcionemos las herramientas adecuadas para satisfacer tus necesidades. Esperamos recibir tus comentarios sobre la experiencia de configuración de la tienda para que podamos mejorarla en el futuro.', 'info', '{}', 'unactioned', 'woocommerce-admin', '2020-07-23 21:35:35', NULL, 0, 'plain', '', 0),
(3, 'wc-admin-add-first-product', 'info', 'en_US', 'Añade tu primer producto', 'Aumenta tus ingresos añadiendo productos a tu tienda. Añade productos manualmente, importa desde una hoja o migra desde otra plataforma.', 'product', '{}', 'unactioned', 'woocommerce-admin', '2020-03-26 20:35:36', NULL, 0, '', NULL, 0),
(4, 'wc-admin-wc-helper-connection', 'info', 'en_US', 'Conectar con WooCommerce.com', 'Conéctate para recibir avisos y actualizaciones importantes de productos.', 'info', '{}', 'unactioned', 'woocommerce-admin', '2020-03-26 20:35:36', NULL, 0, '', NULL, 0),
(5, 'wc-admin-orders-milestone', 'info', 'en_US', 'Primer pedido', '¡Enhorabuena por conseguir tu primer pedido de un cliente! Aprende cómo gestionar tus pedidos.', 'trophy', '{}', 'unactioned', 'woocommerce-admin', '2020-03-26 23:36:59', NULL, 0, '', NULL, 0),
(6, 'wc-admin-mobile-app', 'info', 'en_US', 'Instala la aplicación móvil Sinergia Market', 'Instala la aplicación móvil de Sinergia Market para gestionar pedidos, recibir avisos de ventas y ver métricas clave – allí donde estés.', 'phone', '{}', 'unactioned', 'woocommerce-admin', '2020-03-28 23:13:13', NULL, 0, '', NULL, 0),
(10, 'wc-admin-marketing-intro', 'info', 'en_US', 'Conecta con tu audiencia', 'Aumenta tu base de clientes e incrementa tus ventas con las herramientas de marketing creadas para Sinergia Market.', 'info', '{}', 'unactioned', 'woocommerce-admin', '2020-07-23 21:35:35', NULL, 0, 'plain', '', 0),
(9, 'wc-admin-onboarding-email-marketing', 'info', 'en_US', 'Trucos, actualizaciones de productos e inspiración', 'Estamos aquí para ti - consigue trucos, actualizaciones de productos e inspiración en tu buzón', 'info', '{}', 'unactioned', 'woocommerce-admin', '2020-07-23 21:35:35', NULL, 0, 'plain', '', 0),
(13, 'wc-admin-real-time-order-alerts', 'info', 'en_US', 'Recibe alertas de pedidos en tiempo real en cualquier lugar', 'Recibe avisos sobre la actividad de la tienda, incluidos nuevos pedidos y reseñas de productos directamente en tus dispositivos móviles con la aplicación Woo.', 'info', '{}', 'unactioned', 'woocommerce-admin', '2020-07-23 21:35:35', NULL, 0, 'plain', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_wc_admin_note_actions`
--

CREATE TABLE `wp98_wc_admin_note_actions` (
  `action_id` bigint(20) UNSIGNED NOT NULL,
  `note_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `query` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_primary` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wp98_wc_admin_note_actions`
--

INSERT INTO `wp98_wc_admin_note_actions` (`action_id`, `note_id`, `name`, `label`, `query`, `status`, `is_primary`) VALUES
(12, 11, 'share-feedback', 'Compartir comentarios', 'https://automattic.survey.fm/new-onboarding-survey', 'actioned', 0),
(3, 3, 'add-a-product', 'Añadir un producto', 'https://shapinetwork.com/wp-admin/post-new.php?post_type=product', 'actioned', 1),
(4, 4, 'connect', 'Conectar', '?page=wc-addons&section=helper', 'actioned', 0),
(5, 5, 'learn-more', 'Aprende más', 'https://docs.woocommerce.com/document/managing-orders/', 'actioned', 0),
(6, 6, 'learn-more', 'Aprende más', 'https://woocommerce.com/mobile/', 'actioned', 0),
(11, 10, 'open-marketing-hub', 'Abrir centro de marketing', 'https://shapinetwork.com/wp-admin/admin.php?page=wc-admin&path=/marketing', 'actioned', 0),
(10, 9, 'yes-please', '¡Sí, por favor!', 'https://woocommerce.us8.list-manage.com/subscribe/post?u=2c1434dc56f9506bf3c3ecd21&amp;id=13860df971&amp;SIGNUPPAGE=plugin', 'actioned', 0),
(13, 12, 'learn-more-about-product-settings', 'Ver el tutorial', 'https://www.youtube.com/watch?v=FEmwJsE8xDY&t=', 'actioned', 1),
(14, 13, 'learn-more', 'Aprende más', 'https://woocommerce.com/mobile/?utm_source=inbox', 'actioned', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_wc_category_lookup`
--

CREATE TABLE `wp98_wc_category_lookup` (
  `category_tree_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wp98_wc_category_lookup`
--

INSERT INTO `wp98_wc_category_lookup` (`category_tree_id`, `category_id`) VALUES
(15, 15),
(18, 18),
(19, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_wc_customer_lookup`
--

CREATE TABLE `wp98_wc_customer_lookup` (
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `username` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_last_active` timestamp NULL DEFAULT NULL,
  `date_registered` timestamp NULL DEFAULT NULL,
  `country` char(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `postcode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `state` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wp98_wc_customer_lookup`
--

INSERT INTO `wp98_wc_customer_lookup` (`customer_id`, `user_id`, `username`, `first_name`, `last_name`, `email`, `date_last_active`, `date_registered`, `country`, `postcode`, `city`, `state`) VALUES
(1, 3, 'albertop', 'Alberto', 'Picon', 'cliente2@sinergiared.com', '2020-06-15 05:00:00', '2020-04-20 15:07:02', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_wc_download_log`
--

CREATE TABLE `wp98_wc_download_log` (
  `download_log_id` bigint(20) UNSIGNED NOT NULL,
  `timestamp` datetime NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_ip_address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_wc_order_coupon_lookup`
--

CREATE TABLE `wp98_wc_order_coupon_lookup` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `discount_amount` double NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_wc_order_product_lookup`
--

CREATE TABLE `wp98_wc_order_product_lookup` (
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `variation_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `product_qty` int(11) NOT NULL,
  `product_net_revenue` double NOT NULL DEFAULT '0',
  `product_gross_revenue` double NOT NULL DEFAULT '0',
  `coupon_amount` double NOT NULL DEFAULT '0',
  `tax_amount` double NOT NULL DEFAULT '0',
  `shipping_amount` double NOT NULL DEFAULT '0',
  `shipping_tax_amount` double NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_wc_order_stats`
--

CREATE TABLE `wp98_wc_order_stats` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_created_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `num_items_sold` int(11) NOT NULL DEFAULT '0',
  `total_sales` double NOT NULL DEFAULT '0',
  `tax_total` double NOT NULL DEFAULT '0',
  `shipping_total` double NOT NULL DEFAULT '0',
  `net_total` double NOT NULL DEFAULT '0',
  `returning_customer` tinyint(1) DEFAULT NULL,
  `status` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_wc_order_tax_lookup`
--

CREATE TABLE `wp98_wc_order_tax_lookup` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `tax_rate_id` bigint(20) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `shipping_tax` double NOT NULL DEFAULT '0',
  `order_tax` double NOT NULL DEFAULT '0',
  `total_tax` double NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_wc_product_meta_lookup`
--

CREATE TABLE `wp98_wc_product_meta_lookup` (
  `product_id` bigint(20) NOT NULL,
  `sku` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `virtual` tinyint(1) DEFAULT '0',
  `downloadable` tinyint(1) DEFAULT '0',
  `min_price` decimal(19,4) DEFAULT NULL,
  `max_price` decimal(19,4) DEFAULT NULL,
  `onsale` tinyint(1) DEFAULT '0',
  `stock_quantity` double DEFAULT NULL,
  `stock_status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'instock',
  `rating_count` bigint(20) DEFAULT '0',
  `average_rating` decimal(3,2) DEFAULT '0.00',
  `total_sales` bigint(20) DEFAULT '0',
  `tax_status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'taxable',
  `tax_class` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wp98_wc_product_meta_lookup`
--

INSERT INTO `wp98_wc_product_meta_lookup` (`product_id`, `sku`, `virtual`, `downloadable`, `min_price`, `max_price`, `onsale`, `stock_quantity`, `stock_status`, `rating_count`, `average_rating`, `total_sales`, `tax_status`, `tax_class`) VALUES
(12, '', 0, 0, 340.0000, 340.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', ''),
(28, '', 0, 0, 600.0000, 600.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', ''),
(29, '', 0, 0, 280.0000, 280.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_wc_reserved_stock`
--

CREATE TABLE `wp98_wc_reserved_stock` (
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `stock_quantity` double NOT NULL DEFAULT '0',
  `timestamp` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `expires` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_wc_tax_rate_classes`
--

CREATE TABLE `wp98_wc_tax_rate_classes` (
  `tax_rate_class_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wp98_wc_tax_rate_classes`
--

INSERT INTO `wp98_wc_tax_rate_classes` (`tax_rate_class_id`, `name`, `slug`) VALUES
(1, 'Tasa reducida', 'tasa-reducida'),
(2, 'Tasa cero', 'tasa-cero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_wc_webhooks`
--

CREATE TABLE `wp98_wc_webhooks` (
  `webhook_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `delivery_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_created_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `api_version` smallint(4) NOT NULL,
  `failure_count` smallint(10) NOT NULL DEFAULT '0',
  `pending_delivery` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_woocommerce_api_keys`
--

CREATE TABLE `wp98_woocommerce_api_keys` (
  `key_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permissions` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consumer_key` char(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consumer_secret` char(43) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nonces` longtext COLLATE utf8mb4_unicode_ci,
  `truncated_key` char(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_access` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_woocommerce_attribute_taxonomies`
--

CREATE TABLE `wp98_woocommerce_attribute_taxonomies` (
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_label` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_orderby` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_public` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_woocommerce_downloadable_product_permissions`
--

CREATE TABLE `wp98_woocommerce_downloadable_product_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `download_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `order_key` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `downloads_remaining` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_granted` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `access_expires` datetime DEFAULT NULL,
  `download_count` bigint(20) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_woocommerce_log`
--

CREATE TABLE `wp98_woocommerce_log` (
  `log_id` bigint(20) UNSIGNED NOT NULL,
  `timestamp` datetime NOT NULL,
  `level` smallint(4) NOT NULL,
  `source` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `context` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_woocommerce_order_itemmeta`
--

CREATE TABLE `wp98_woocommerce_order_itemmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wp98_woocommerce_order_itemmeta`
--

INSERT INTO `wp98_woocommerce_order_itemmeta` (`meta_id`, `order_item_id`, `meta_key`, `meta_value`) VALUES
(1, 1, '_product_id', '12'),
(2, 1, '_variation_id', '0'),
(3, 1, '_qty', '1'),
(4, 1, '_tax_class', ''),
(5, 1, '_line_subtotal', '340'),
(6, 1, '_line_subtotal_tax', '0'),
(7, 1, '_line_total', '340'),
(8, 1, '_line_tax', '0'),
(9, 1, '_line_tax_data', 'a:2:{s:5:\"total\";a:0:{}s:8:\"subtotal\";a:0:{}}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_woocommerce_order_items`
--

CREATE TABLE `wp98_woocommerce_order_items` (
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `order_item_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_item_type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `order_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wp98_woocommerce_order_items`
--

INSERT INTO `wp98_woocommerce_order_items` (`order_item_id`, `order_item_name`, `order_item_type`, `order_id`) VALUES
(1, 'Franquisia Empresario', 'line_item', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_woocommerce_payment_tokenmeta`
--

CREATE TABLE `wp98_woocommerce_payment_tokenmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `payment_token_id` bigint(20) UNSIGNED NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_woocommerce_payment_tokens`
--

CREATE TABLE `wp98_woocommerce_payment_tokens` (
  `token_id` bigint(20) UNSIGNED NOT NULL,
  `gateway_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_woocommerce_sessions`
--

CREATE TABLE `wp98_woocommerce_sessions` (
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `session_key` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_expiry` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_woocommerce_shipping_zones`
--

CREATE TABLE `wp98_woocommerce_shipping_zones` (
  `zone_id` bigint(20) UNSIGNED NOT NULL,
  `zone_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone_order` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_woocommerce_shipping_zone_locations`
--

CREATE TABLE `wp98_woocommerce_shipping_zone_locations` (
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `zone_id` bigint(20) UNSIGNED NOT NULL,
  `location_code` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_type` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_woocommerce_shipping_zone_methods`
--

CREATE TABLE `wp98_woocommerce_shipping_zone_methods` (
  `zone_id` bigint(20) UNSIGNED NOT NULL,
  `instance_id` bigint(20) UNSIGNED NOT NULL,
  `method_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_order` bigint(20) UNSIGNED NOT NULL,
  `is_enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_woocommerce_tax_rates`
--

CREATE TABLE `wp98_woocommerce_tax_rates` (
  `tax_rate_id` bigint(20) UNSIGNED NOT NULL,
  `tax_rate_country` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tax_rate_state` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tax_rate` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tax_rate_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tax_rate_priority` bigint(20) UNSIGNED NOT NULL,
  `tax_rate_compound` int(1) NOT NULL DEFAULT '0',
  `tax_rate_shipping` int(1) NOT NULL DEFAULT '1',
  `tax_rate_order` bigint(20) UNSIGNED NOT NULL,
  `tax_rate_class` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp98_woocommerce_tax_rate_locations`
--

CREATE TABLE `wp98_woocommerce_tax_rate_locations` (
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `location_code` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_rate_id` bigint(20) UNSIGNED NOT NULL,
  `location_type` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradorgastos`
--
ALTER TABLE `administradorgastos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `administradorlista`
--
ALTER TABLE `administradorlista`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `avatares`
--
ALTER TABLE `avatares`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `binario`
--
ALTER TABLE `binario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bonoinicio`
--
ALTER TABLE `bonoinicio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `calendarios`
--
ALTER TABLE `calendarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `canjes`
--
ALTER TABLE `canjes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `capital`
--
ALTER TABLE `capital`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `chat_codigo`
--
ALTER TABLE `chat_codigo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comentarios_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `commissions`
--
ALTER TABLE `commissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `component`
--
ALTER TABLE `component`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `componentenoticias`
--
ALTER TABLE `componentenoticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `componentestransf`
--
ALTER TABLE `componentestransf`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `componentestransferencias`
--
ALTER TABLE `componentestransferencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compradirectas`
--
ALTER TABLE `compradirectas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consultacrypto`
--
ALTER TABLE `consultacrypto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `costo`
--
ALTER TABLE `costo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `label` (`label`,`nameinput`);

--
-- Indices de la tabla `ganancias`
--
ALTER TABLE `ganancias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `informacionbancaria`
--
ALTER TABLE `informacionbancaria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `iva`
--
ALTER TABLE `iva`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `linkpagos`
--
ALTER TABLE `linkpagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modulocomplementario`
--
ALTER TABLE `modulocomplementario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `monedadicional`
--
ALTER TABLE `monedadicional`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `monedas`
--
ALTER TABLE `monedas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notificacion_tickets`
--
ALTER TABLE `notificacion_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `opciones_select`
--
ALTER TABLE `opciones_select`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `optioncarritos`
--
ALTER TABLE `optioncarritos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagocarritos`
--
ALTER TABLE `pagocarritos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pop`
--
ALTER TABLE `pop`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prospeccion`
--
ALTER TABLE `prospeccion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `puntos`
--
ALTER TABLE `puntos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `puntosbonos`
--
ALTER TABLE `puntosbonos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pushs`
--
ALTER TABLE `pushs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `qr`
--
ALTER TABLE `qr`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `redes_sociales`
--
ALTER TABLE `redes_sociales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seguridad`
--
ALTER TABLE `seguridad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `semiautobinario`
--
ALTER TABLE `semiautobinario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sesions`
--
ALTER TABLE `sesions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sesions_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `settingactivacion`
--
ALTER TABLE `settingactivacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `settingcliente`
--
ALTER TABLE `settingcliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `settingcomision`
--
ALTER TABLE `settingcomision`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `settingpagos`
--
ALTER TABLE `settingpagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `settingpermiso`
--
ALTER TABLE `settingpermiso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `settingplantilla`
--
ALTER TABLE `settingplantilla`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `settingsestructura`
--
ALTER TABLE `settingsestructura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `settingspuntos`
--
ALTER TABLE `settingspuntos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `setttingsroles`
--
ALTER TABLE `setttingsroles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `user_campo`
--
ALTER TABLE `user_campo`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `walletlog`
--
ALTER TABLE `walletlog`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `wp98_actionscheduler_actions`
--
ALTER TABLE `wp98_actionscheduler_actions`
  ADD PRIMARY KEY (`action_id`),
  ADD KEY `hook` (`hook`),
  ADD KEY `status` (`status`),
  ADD KEY `scheduled_date_gmt` (`scheduled_date_gmt`),
  ADD KEY `args` (`args`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `last_attempt_gmt` (`last_attempt_gmt`),
  ADD KEY `claim_id` (`claim_id`);

--
-- Indices de la tabla `wp98_actionscheduler_claims`
--
ALTER TABLE `wp98_actionscheduler_claims`
  ADD PRIMARY KEY (`claim_id`),
  ADD KEY `date_created_gmt` (`date_created_gmt`);

--
-- Indices de la tabla `wp98_actionscheduler_groups`
--
ALTER TABLE `wp98_actionscheduler_groups`
  ADD PRIMARY KEY (`group_id`),
  ADD KEY `slug` (`slug`(191));

--
-- Indices de la tabla `wp98_actionscheduler_logs`
--
ALTER TABLE `wp98_actionscheduler_logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `action_id` (`action_id`),
  ADD KEY `log_date_gmt` (`log_date_gmt`);

--
-- Indices de la tabla `wp98_commentmeta`
--
ALTER TABLE `wp98_commentmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indices de la tabla `wp98_comments`
--
ALTER TABLE `wp98_comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `comment_post_ID` (`comment_post_ID`),
  ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  ADD KEY `comment_date_gmt` (`comment_date_gmt`),
  ADD KEY `comment_parent` (`comment_parent`),
  ADD KEY `comment_author_email` (`comment_author_email`(10)),
  ADD KEY `woo_idx_comment_type` (`comment_type`);

--
-- Indices de la tabla `wp98_links`
--
ALTER TABLE `wp98_links`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `link_visible` (`link_visible`);

--
-- Indices de la tabla `wp98_ms_snippets`
--
ALTER TABLE `wp98_ms_snippets`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `wp98_options`
--
ALTER TABLE `wp98_options`
  ADD PRIMARY KEY (`option_id`),
  ADD UNIQUE KEY `option_name` (`option_name`),
  ADD KEY `autoload` (`autoload`);

--
-- Indices de la tabla `wp98_postmeta`
--
ALTER TABLE `wp98_postmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indices de la tabla `wp98_posts`
--
ALTER TABLE `wp98_posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`);

--
-- Indices de la tabla `wp98_snippets`
--
ALTER TABLE `wp98_snippets`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `wp98_termmeta`
--
ALTER TABLE `wp98_termmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indices de la tabla `wp98_terms`
--
ALTER TABLE `wp98_terms`
  ADD PRIMARY KEY (`term_id`),
  ADD KEY `slug` (`slug`(191)),
  ADD KEY `name` (`name`(191));

--
-- Indices de la tabla `wp98_term_relationships`
--
ALTER TABLE `wp98_term_relationships`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Indices de la tabla `wp98_term_taxonomy`
--
ALTER TABLE `wp98_term_taxonomy`
  ADD PRIMARY KEY (`term_taxonomy_id`),
  ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  ADD KEY `taxonomy` (`taxonomy`);

--
-- Indices de la tabla `wp98_usermeta`
--
ALTER TABLE `wp98_usermeta`
  ADD PRIMARY KEY (`umeta_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indices de la tabla `wp98_users`
--
ALTER TABLE `wp98_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- Indices de la tabla `wp98_users_old`
--
ALTER TABLE `wp98_users_old`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- Indices de la tabla `wp98_wc_admin_notes`
--
ALTER TABLE `wp98_wc_admin_notes`
  ADD PRIMARY KEY (`note_id`);

--
-- Indices de la tabla `wp98_wc_admin_note_actions`
--
ALTER TABLE `wp98_wc_admin_note_actions`
  ADD PRIMARY KEY (`action_id`),
  ADD KEY `note_id` (`note_id`);

--
-- Indices de la tabla `wp98_wc_category_lookup`
--
ALTER TABLE `wp98_wc_category_lookup`
  ADD PRIMARY KEY (`category_tree_id`,`category_id`);

--
-- Indices de la tabla `wp98_wc_customer_lookup`
--
ALTER TABLE `wp98_wc_customer_lookup`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `email` (`email`);

--
-- Indices de la tabla `wp98_wc_download_log`
--
ALTER TABLE `wp98_wc_download_log`
  ADD PRIMARY KEY (`download_log_id`),
  ADD KEY `permission_id` (`permission_id`),
  ADD KEY `timestamp` (`timestamp`);

--
-- Indices de la tabla `wp98_wc_order_coupon_lookup`
--
ALTER TABLE `wp98_wc_order_coupon_lookup`
  ADD PRIMARY KEY (`order_id`,`coupon_id`),
  ADD KEY `coupon_id` (`coupon_id`),
  ADD KEY `date_created` (`date_created`);

--
-- Indices de la tabla `wp98_wc_order_product_lookup`
--
ALTER TABLE `wp98_wc_order_product_lookup`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `date_created` (`date_created`);

--
-- Indices de la tabla `wp98_wc_order_stats`
--
ALTER TABLE `wp98_wc_order_stats`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `date_created` (`date_created`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `status` (`status`(191));

--
-- Indices de la tabla `wp98_wc_order_tax_lookup`
--
ALTER TABLE `wp98_wc_order_tax_lookup`
  ADD PRIMARY KEY (`order_id`,`tax_rate_id`),
  ADD KEY `tax_rate_id` (`tax_rate_id`),
  ADD KEY `date_created` (`date_created`);

--
-- Indices de la tabla `wp98_wc_product_meta_lookup`
--
ALTER TABLE `wp98_wc_product_meta_lookup`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `virtual` (`virtual`),
  ADD KEY `downloadable` (`downloadable`),
  ADD KEY `stock_status` (`stock_status`),
  ADD KEY `stock_quantity` (`stock_quantity`),
  ADD KEY `onsale` (`onsale`),
  ADD KEY `min_max_price` (`min_price`,`max_price`);

--
-- Indices de la tabla `wp98_wc_reserved_stock`
--
ALTER TABLE `wp98_wc_reserved_stock`
  ADD PRIMARY KEY (`order_id`,`product_id`);

--
-- Indices de la tabla `wp98_wc_tax_rate_classes`
--
ALTER TABLE `wp98_wc_tax_rate_classes`
  ADD PRIMARY KEY (`tax_rate_class_id`),
  ADD UNIQUE KEY `slug` (`slug`(191));

--
-- Indices de la tabla `wp98_wc_webhooks`
--
ALTER TABLE `wp98_wc_webhooks`
  ADD PRIMARY KEY (`webhook_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `wp98_woocommerce_api_keys`
--
ALTER TABLE `wp98_woocommerce_api_keys`
  ADD PRIMARY KEY (`key_id`),
  ADD KEY `consumer_key` (`consumer_key`),
  ADD KEY `consumer_secret` (`consumer_secret`);

--
-- Indices de la tabla `wp98_woocommerce_attribute_taxonomies`
--
ALTER TABLE `wp98_woocommerce_attribute_taxonomies`
  ADD PRIMARY KEY (`attribute_id`),
  ADD KEY `attribute_name` (`attribute_name`(20));

--
-- Indices de la tabla `wp98_woocommerce_downloadable_product_permissions`
--
ALTER TABLE `wp98_woocommerce_downloadable_product_permissions`
  ADD PRIMARY KEY (`permission_id`),
  ADD KEY `download_order_key_product` (`product_id`,`order_id`,`order_key`(16),`download_id`),
  ADD KEY `download_order_product` (`download_id`,`order_id`,`product_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `user_order_remaining_expires` (`user_id`,`order_id`,`downloads_remaining`,`access_expires`);

--
-- Indices de la tabla `wp98_woocommerce_log`
--
ALTER TABLE `wp98_woocommerce_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `level` (`level`);

--
-- Indices de la tabla `wp98_woocommerce_order_itemmeta`
--
ALTER TABLE `wp98_woocommerce_order_itemmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `order_item_id` (`order_item_id`),
  ADD KEY `meta_key` (`meta_key`(32));

--
-- Indices de la tabla `wp98_woocommerce_order_items`
--
ALTER TABLE `wp98_woocommerce_order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indices de la tabla `wp98_woocommerce_payment_tokenmeta`
--
ALTER TABLE `wp98_woocommerce_payment_tokenmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `payment_token_id` (`payment_token_id`),
  ADD KEY `meta_key` (`meta_key`(32));

--
-- Indices de la tabla `wp98_woocommerce_payment_tokens`
--
ALTER TABLE `wp98_woocommerce_payment_tokens`
  ADD PRIMARY KEY (`token_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `wp98_woocommerce_sessions`
--
ALTER TABLE `wp98_woocommerce_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD UNIQUE KEY `session_key` (`session_key`);

--
-- Indices de la tabla `wp98_woocommerce_shipping_zones`
--
ALTER TABLE `wp98_woocommerce_shipping_zones`
  ADD PRIMARY KEY (`zone_id`);

--
-- Indices de la tabla `wp98_woocommerce_shipping_zone_locations`
--
ALTER TABLE `wp98_woocommerce_shipping_zone_locations`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `location_id` (`location_id`),
  ADD KEY `location_type_code` (`location_type`(10),`location_code`(20));

--
-- Indices de la tabla `wp98_woocommerce_shipping_zone_methods`
--
ALTER TABLE `wp98_woocommerce_shipping_zone_methods`
  ADD PRIMARY KEY (`instance_id`);

--
-- Indices de la tabla `wp98_woocommerce_tax_rates`
--
ALTER TABLE `wp98_woocommerce_tax_rates`
  ADD PRIMARY KEY (`tax_rate_id`),
  ADD KEY `tax_rate_country` (`tax_rate_country`),
  ADD KEY `tax_rate_state` (`tax_rate_state`(2)),
  ADD KEY `tax_rate_class` (`tax_rate_class`(10)),
  ADD KEY `tax_rate_priority` (`tax_rate_priority`);

--
-- Indices de la tabla `wp98_woocommerce_tax_rate_locations`
--
ALTER TABLE `wp98_woocommerce_tax_rate_locations`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `tax_rate_id` (`tax_rate_id`),
  ADD KEY `location_type_code` (`location_type`(10),`location_code`(20));

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradorgastos`
--
ALTER TABLE `administradorgastos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `administradorlista`
--
ALTER TABLE `administradorlista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `avatares`
--
ALTER TABLE `avatares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `binario`
--
ALTER TABLE `binario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bonoinicio`
--
ALTER TABLE `bonoinicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `calendarios`
--
ALTER TABLE `calendarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `canjes`
--
ALTER TABLE `canjes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `capital`
--
ALTER TABLE `capital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carritos`
--
ALTER TABLE `carritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `chat_codigo`
--
ALTER TABLE `chat_codigo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `commissions`
--
ALTER TABLE `commissions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `component`
--
ALTER TABLE `component`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `componentenoticias`
--
ALTER TABLE `componentenoticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `componentestransf`
--
ALTER TABLE `componentestransf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `componentestransferencias`
--
ALTER TABLE `componentestransferencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compradirectas`
--
ALTER TABLE `compradirectas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `consultacrypto`
--
ALTER TABLE `consultacrypto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `costo`
--
ALTER TABLE `costo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formulario`
--
ALTER TABLE `formulario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `ganancias`
--
ALTER TABLE `ganancias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `informacionbancaria`
--
ALTER TABLE `informacionbancaria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `iva`
--
ALTER TABLE `iva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `linkpagos`
--
ALTER TABLE `linkpagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `modulocomplementario`
--
ALTER TABLE `modulocomplementario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `monedadicional`
--
ALTER TABLE `monedadicional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `monedas`
--
ALTER TABLE `monedas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notificacion_tickets`
--
ALTER TABLE `notificacion_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `opciones_select`
--
ALTER TABLE `opciones_select`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT de la tabla `optioncarritos`
--
ALTER TABLE `optioncarritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pagocarritos`
--
ALTER TABLE `pagocarritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pop`
--
ALTER TABLE `pop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `prospeccion`
--
ALTER TABLE `prospeccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `puntos`
--
ALTER TABLE `puntos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `puntosbonos`
--
ALTER TABLE `puntosbonos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `pushs`
--
ALTER TABLE `pushs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `qr`
--
ALTER TABLE `qr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `redes_sociales`
--
ALTER TABLE `redes_sociales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `seguridad`
--
ALTER TABLE `seguridad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `semiautobinario`
--
ALTER TABLE `semiautobinario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sesions`
--
ALTER TABLE `sesions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `settingactivacion`
--
ALTER TABLE `settingactivacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `settingcliente`
--
ALTER TABLE `settingcliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `settingcomision`
--
ALTER TABLE `settingcomision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `settingpagos`
--
ALTER TABLE `settingpagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `settingpermiso`
--
ALTER TABLE `settingpermiso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `settingplantilla`
--
ALTER TABLE `settingplantilla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `settingsestructura`
--
ALTER TABLE `settingsestructura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `settingspuntos`
--
ALTER TABLE `settingspuntos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `setttingsroles`
--
ALTER TABLE `setttingsroles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `walletlog`
--
ALTER TABLE `walletlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `wp98_actionscheduler_actions`
--
ALTER TABLE `wp98_actionscheduler_actions`
  MODIFY `action_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `wp98_actionscheduler_claims`
--
ALTER TABLE `wp98_actionscheduler_claims`
  MODIFY `claim_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17673;

--
-- AUTO_INCREMENT de la tabla `wp98_actionscheduler_groups`
--
ALTER TABLE `wp98_actionscheduler_groups`
  MODIFY `group_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `wp98_actionscheduler_logs`
--
ALTER TABLE `wp98_actionscheduler_logs`
  MODIFY `log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `wp98_commentmeta`
--
ALTER TABLE `wp98_commentmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `wp98_comments`
--
ALTER TABLE `wp98_comments`
  MODIFY `comment_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `wp98_links`
--
ALTER TABLE `wp98_links`
  MODIFY `link_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `wp98_ms_snippets`
--
ALTER TABLE `wp98_ms_snippets`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `wp98_options`
--
ALTER TABLE `wp98_options`
  MODIFY `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21385;

--
-- AUTO_INCREMENT de la tabla `wp98_postmeta`
--
ALTER TABLE `wp98_postmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT de la tabla `wp98_posts`
--
ALTER TABLE `wp98_posts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `wp98_snippets`
--
ALTER TABLE `wp98_snippets`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `wp98_termmeta`
--
ALTER TABLE `wp98_termmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `wp98_terms`
--
ALTER TABLE `wp98_terms`
  MODIFY `term_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `wp98_term_taxonomy`
--
ALTER TABLE `wp98_term_taxonomy`
  MODIFY `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `wp98_usermeta`
--
ALTER TABLE `wp98_usermeta`
  MODIFY `umeta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT de la tabla `wp98_users`
--
ALTER TABLE `wp98_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `wp98_users_old`
--
ALTER TABLE `wp98_users_old`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `wp98_wc_admin_notes`
--
ALTER TABLE `wp98_wc_admin_notes`
  MODIFY `note_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `wp98_wc_admin_note_actions`
--
ALTER TABLE `wp98_wc_admin_note_actions`
  MODIFY `action_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `wp98_wc_customer_lookup`
--
ALTER TABLE `wp98_wc_customer_lookup`
  MODIFY `customer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `wp98_wc_download_log`
--
ALTER TABLE `wp98_wc_download_log`
  MODIFY `download_log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `wp98_wc_tax_rate_classes`
--
ALTER TABLE `wp98_wc_tax_rate_classes`
  MODIFY `tax_rate_class_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `wp98_wc_webhooks`
--
ALTER TABLE `wp98_wc_webhooks`
  MODIFY `webhook_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `wp98_woocommerce_api_keys`
--
ALTER TABLE `wp98_woocommerce_api_keys`
  MODIFY `key_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `wp98_woocommerce_attribute_taxonomies`
--
ALTER TABLE `wp98_woocommerce_attribute_taxonomies`
  MODIFY `attribute_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `wp98_woocommerce_downloadable_product_permissions`
--
ALTER TABLE `wp98_woocommerce_downloadable_product_permissions`
  MODIFY `permission_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `wp98_woocommerce_log`
--
ALTER TABLE `wp98_woocommerce_log`
  MODIFY `log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `wp98_woocommerce_order_itemmeta`
--
ALTER TABLE `wp98_woocommerce_order_itemmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `wp98_woocommerce_order_items`
--
ALTER TABLE `wp98_woocommerce_order_items`
  MODIFY `order_item_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `wp98_woocommerce_payment_tokenmeta`
--
ALTER TABLE `wp98_woocommerce_payment_tokenmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `wp98_woocommerce_payment_tokens`
--
ALTER TABLE `wp98_woocommerce_payment_tokens`
  MODIFY `token_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `wp98_woocommerce_sessions`
--
ALTER TABLE `wp98_woocommerce_sessions`
  MODIFY `session_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `wp98_woocommerce_shipping_zones`
--
ALTER TABLE `wp98_woocommerce_shipping_zones`
  MODIFY `zone_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `wp98_woocommerce_shipping_zone_locations`
--
ALTER TABLE `wp98_woocommerce_shipping_zone_locations`
  MODIFY `location_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `wp98_woocommerce_shipping_zone_methods`
--
ALTER TABLE `wp98_woocommerce_shipping_zone_methods`
  MODIFY `instance_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `wp98_woocommerce_tax_rates`
--
ALTER TABLE `wp98_woocommerce_tax_rates`
  MODIFY `tax_rate_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `wp98_woocommerce_tax_rate_locations`
--
ALTER TABLE `wp98_woocommerce_tax_rate_locations`
  MODIFY `location_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
