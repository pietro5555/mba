-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-07-2020 a las 22:31:04
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cambios`
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
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `comentario` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivo` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 'Mi Billetera', 1, 1, NULL, '2020-05-07 14:58:52', '2019-10-24 01:53:38'),
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
  `descuento` float DEFAULT NULL,
  `monedaAdicional` text
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
(1, NULL, NULL, '2019-12-23 19:10:18', '0000-00-00 00:00:00'),
(2, NULL, NULL, '2019-12-23 19:10:18', '0000-00-00 00:00:00'),
(3, NULL, NULL, '2019-12-23 19:10:29', '0000-00-00 00:00:00'),
(4, NULL, NULL, '2019-12-23 19:10:29', '0000-00-00 00:00:00'),
(5, NULL, NULL, '2019-12-23 19:16:00', '0000-00-00 00:00:00'),
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
  `posicionamiento` int(2) NOT NULL DEFAULT '0',
  `btc` int(2) DEFAULT '0',
  `paypal` longtext COLLATE utf8mb4_unicode_ci,
  `scriptpaypal` longtext COLLATE utf8mb4_unicode_ci,
  `htmlpaypal` longtext COLLATE utf8mb4_unicode_ci,
  `login` int(11) NOT NULL DEFAULT '1',
  `registro` int(2) NOT NULL DEFAULT '2',
  `colorfondo` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fff',
  `cololetras` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '333'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comentario` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` longtext COLLATE utf8mb4_unicode_ci,
  `user_id` int(10) UNSIGNED NOT NULL,
  `admin` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivo` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users2`
--

CREATE TABLE `users2` (
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_campo`
--

CREATE TABLE `user_campo` (
  `ID` bigint(20) NOT NULL,
  `firstname` varchar(250) DEFAULT NULL,
  `lastname` varchar(250) DEFAULT NULL,
  `genero` varchar(250) DEFAULT NULL,
  `edad` date DEFAULT NULL,
  `nameuser` varchar(250) DEFAULT NULL,
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `walletlog`
--

CREATE TABLE `walletlog` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idcomision` varchar(250) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `debito` float NOT NULL,
  `credito` float NOT NULL,
  `balance` float NOT NULL,
  `descuento` float NOT NULL,
  `tipotransacion` tinyint(4) NOT NULL COMMENT '0 - transferencia, 1 - retiros, 2 - comisiones,  3 - liquidaciones 4 - recarga de billetera',
  `monedaAdicional` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Indices de la tabla `users2`
--
ALTER TABLE `users2`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `settingactivacion`
--
ALTER TABLE `settingactivacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `settingcliente`
--
ALTER TABLE `settingcliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `settingcomision`
--
ALTER TABLE `settingcomision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `settingpagos`
--
ALTER TABLE `settingpagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `settingpermiso`
--
ALTER TABLE `settingpermiso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `settingplantilla`
--
ALTER TABLE `settingplantilla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `settingsestructura`
--
ALTER TABLE `settingsestructura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `settingspuntos`
--
ALTER TABLE `settingspuntos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `setttingsroles`
--
ALTER TABLE `setttingsroles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users2`
--
ALTER TABLE `users2`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `walletlog`
--
ALTER TABLE `walletlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
