-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3366
-- Tiempo de generación: 15-10-2023 a las 19:41:07
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `accountly`
--
CREATE DATABASE IF NOT EXISTS `accountly` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `accountly`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `account`
--

CREATE TABLE `account` (
  `id_account` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name_account` varchar(45) NOT NULL,
  `state_register` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `account`
--

INSERT INTO `account` (`id_account`, `id_user`, `name_account`, `state_register`) VALUES
(2, 1, 'Banesco', 1),
(4, 1, 'Life', 1),
(5, 1, 'BCV ', 1),
(11, 1, 'Bancaribe', 1),
(39, 1, 'Vida', 1),
(40, 2, 'Mamasita', 1),
(41, 2, 'Bancaribe', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `badge`
--

CREATE TABLE `badge` (
  `id_badge` int(11) NOT NULL,
  `name_badge` varchar(45) NOT NULL,
  `value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `badge`
--

INSERT INTO `badge` (`id_badge`, `name_badge`, `value`) VALUES
(1, 'Bolivares', 0.033),
(2, 'Dolar', 1),
(3, 'Petro', 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `binnacle`
--

CREATE TABLE `binnacle` (
  `id_binnacle` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `movement` varchar(80) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `binnacle`
--

INSERT INTO `binnacle` (`id_binnacle`, `id_user`, `movement`, `datetime`) VALUES
(1, 1, 'Inicio de session admin', '2023-09-14 10:01:32'),
(2, 1, 'Inicio de session admin', '2023-09-14 10:10:32'),
(3, 1, 'Inicio de session admin', '2023-09-14 10:11:11'),
(4, 1, 'Inicio de session admin', '2023-09-14 10:11:30'),
(5, 1, 'Inicio de session admin', '2023-09-14 10:13:22'),
(6, 1, 'Inicio de session admin', '2023-09-14 10:15:21'),
(7, 1, 'Inicio de session admin', '2023-09-14 10:16:28'),
(8, 1, 'Creacion de cuenta vaina', '2023-09-21 07:26:22'),
(9, 1, 'Actualizacion de cuenta: vainas', '2023-09-21 07:40:28'),
(10, 1, 'Eliminacion de cuenta n* 15', '2023-09-21 07:40:31'),
(11, 1, 'Creacion de meta: fdsfds', '2023-09-21 07:56:34'),
(12, 1, 'Registro de transaccion', '2023-09-23 08:38:17'),
(13, 1, 'Registro de transaccion', '2023-09-23 08:38:44'),
(14, 1, 'Eliminacion de meta n* 5', '2023-09-24 12:39:05'),
(15, 1, 'Actualizacion de meta: Comprar petroleo', '2023-09-24 12:39:34'),
(16, 1, 'Actualizacion de meta: Comprar petroleo', '2023-09-24 12:39:35'),
(17, 1, 'Actualizacion de meta: Comprar petroleo', '2023-09-24 12:39:35'),
(18, 1, 'Actualizacion de divisa: Petro', '2023-09-26 10:56:57'),
(19, 1, 'Actualizacion de divisa: Dolar', '2023-09-26 10:57:02'),
(20, 1, 'Actualizacion de divisa: Bolivar', '2023-09-26 10:57:18'),
(21, 1, 'Cambio en la transaccion n* 12', '2023-09-27 08:09:49'),
(22, 1, 'Cambio en la transaccion n* 12', '2023-09-27 08:09:49'),
(23, 1, 'Cambio en la transaccion n* 12', '2023-09-27 08:09:50'),
(24, 1, 'Cambio en la transaccion n* 12', '2023-09-27 08:09:50'),
(25, 1, 'Cambio en la transaccion n* 12', '2023-09-27 08:09:55'),
(26, 1, 'Cambio en la transaccion n* 12', '2023-09-27 08:09:55'),
(27, 1, 'Cambio en la transaccion n* 12', '2023-09-27 08:09:55'),
(28, 1, 'Cambio en la transaccion n* 12', '2023-09-27 08:10:03'),
(29, 1, 'Actualizacion de divisa: Bolivar', '2023-09-27 08:10:11'),
(30, 1, 'Actualizacion de divisa: Bolivar', '2023-09-27 08:10:11'),
(31, 1, 'Actualizacion de divisa: Bolivar', '2023-09-27 08:11:21'),
(32, 1, 'Actualizacion de divisa: ', '2023-09-27 08:11:25'),
(33, 1, 'Actualizacion de divisa: ', '2023-09-27 08:11:26'),
(34, 1, 'Actualizacion de divisa: ', '2023-09-27 08:11:28'),
(35, 1, 'Actualizacion de divisa: ', '2023-09-27 08:11:28'),
(36, 1, 'Actualizacion de divisa: ', '2023-09-27 08:11:28'),
(37, 1, 'Actualizacion de divisa: ', '2023-09-27 08:11:29'),
(38, 1, 'Actualizacion de divisa: ', '2023-09-27 08:11:31'),
(39, 1, 'Actualizacion de divisa: ', '2023-09-27 08:11:34'),
(40, 1, 'Actualizacion de divisa: ', '2023-09-27 08:12:11'),
(41, 1, 'Actualizacion de divisa: Bolivar', '2023-09-27 08:12:21'),
(42, 1, 'Actualizacion de divisa: Bolivar', '2023-09-27 08:12:24'),
(43, 1, 'Actualizacion de divisa: Bolivar', '2023-09-27 08:12:35'),
(44, 1, 'Actualizacion de divisa: Bolivar', '2023-09-27 08:15:27'),
(45, 1, 'Actualizacion de divisa: Bo', '2023-09-27 08:15:36'),
(46, 1, 'Actualizacion de divisa: Bolivar', '2023-09-27 08:15:41'),
(47, 1, 'Actualizacion de divisa: Bol', '2023-09-27 08:16:18'),
(48, 1, 'Actualizacion de divisa: Bolivar', '2023-09-27 08:16:22'),
(49, 1, 'Actualizacion de divisa: Bolivar', '2023-09-27 08:16:24'),
(50, 1, 'Actualizacion de divisa: Bolivar', '2023-09-27 08:19:09'),
(51, 1, 'Actualizacion de divisa: Bolivar', '2023-09-27 08:19:17'),
(52, 1, 'Actualizacion de evento para el 2023-05-05', '2023-09-27 08:22:57'),
(53, 1, 'Actualizacion de evento para el 2023-05-05', '2023-09-27 08:23:09'),
(54, 1, 'Actualizacion de divisa: Bolivar', '2023-09-27 08:27:37'),
(55, 1, 'Creacion de cuenta: coso', '2023-09-27 10:41:45'),
(56, 1, 'Eliminacion de cuenta n* 16', '2023-09-27 10:41:52'),
(57, 1, 'Eliminacion de la transaccion n* 7', '2023-09-27 10:42:54'),
(58, 1, 'Eliminacion de evento n* 9', '2023-09-27 10:43:09'),
(59, 1, 'Eliminacion de meta n* 4', '2023-09-27 10:43:23'),
(60, 1, 'Registro de usuario momy', '2023-09-27 10:43:51'),
(61, 1, 'Eliminacion de n* 3', '2023-09-27 10:44:00'),
(62, 1, 'Registro de usuario momy', '2023-09-27 10:44:42'),
(63, 1, 'Eliminacion de n* 4', '2023-09-27 10:45:44'),
(64, 1, 'Eliminacion de cuenta n* 2', '2023-09-28 06:46:32'),
(65, 1, 'Ingreso de usuario: admin', '2023-09-28 03:20:44'),
(66, 1, 'Ingreso de usuario: admin', '2023-09-28 03:43:15'),
(67, 1, 'Eliminacion de usuario n* 5', '2023-09-28 03:45:04'),
(68, 7, 'Registro de usuario comun: paola', '2023-09-28 03:53:01'),
(69, 1, 'Eliminacion de usuario n* 6', '2023-09-28 03:54:28'),
(70, 1, 'Eliminacion de usuario n* 7', '2023-09-28 03:54:30'),
(71, 1, 'Eliminacion de usuario n* 7', '2023-09-28 03:54:38'),
(72, 1, 'Eliminacion de usuario n* 7', '2023-09-28 03:55:53'),
(73, 8, 'Registro de usuario comun: carlos', '2023-09-28 03:59:51'),
(74, 1, 'Eliminacion de usuario n* 8', '2023-09-28 04:01:04'),
(75, 1, 'Creacion de cuenta: Binance', '2023-09-28 05:24:29'),
(76, 1, 'Eliminacion de cuenta n* 17', '2023-09-28 05:24:36'),
(77, 1, 'Eliminacion de cuenta n* 2', '2023-09-28 05:24:46'),
(78, 1, 'Eliminacion de cuenta n* 2', '2023-09-28 05:25:36'),
(79, 1, 'Eliminacion de cuenta n* 4', '2023-09-28 05:27:53'),
(80, 1, 'Eliminacion de cuenta n* 6', '2023-09-28 05:30:14'),
(81, 1, 'Eliminacion de cuenta n* 6', '2023-09-28 05:30:50'),
(82, 1, 'Eliminacion de cuenta n* 11', '2023-09-28 05:31:34'),
(83, 1, 'Eliminacion de cuenta n* 2', '2023-09-28 05:31:45'),
(84, 1, 'Eliminacion de cuenta n* 6', '2023-09-28 05:32:51'),
(85, 1, 'Eliminacion de cuenta n* 2', '2023-09-28 05:34:24'),
(86, 1, 'Eliminacion de cuenta n* 11', '2023-09-28 05:38:46'),
(87, 1, 'Eliminacion de cuenta n* 11', '2023-09-28 05:39:37'),
(88, 1, 'Eliminacion de usuario n* 1', '2023-09-28 05:41:02'),
(89, 1, 'Eliminacion de divisa n* 1', '2023-09-28 05:41:09'),
(90, 1, 'Actualizacion de usuario admin', '2023-09-28 05:49:50'),
(91, 1, 'Actualizacion de usuario admin', '2023-09-28 05:49:51'),
(92, 1, 'Actualizacion de usuario admin', '2023-09-28 05:51:44'),
(93, 1, 'Actualizacion de usuario admin', '2023-09-28 05:52:52'),
(94, 1, 'Registro de usuario administrador: admin', '2023-09-28 08:25:08'),
(95, 1, 'Actualizacion de usuario profesor', '2023-09-28 08:25:20'),
(96, 1, 'Se completo meta de meta: 3', '2023-09-28 09:36:43'),
(97, 1, 'Se completo meta de meta: 3', '2023-09-28 09:36:44'),
(98, 1, 'Se completo meta de meta: 2', '2023-09-28 09:37:05'),
(99, 1, 'Se completo meta de meta: 2', '2023-09-28 09:37:06'),
(100, 1, 'Se completo meta de meta: 2', '2023-09-28 10:15:01'),
(101, 1, 'Se completo meta de meta: 2', '2023-09-28 10:15:02'),
(102, 1, 'Se completo meta de meta: 3', '2023-09-28 10:15:03'),
(103, 1, 'Se completo meta de meta: 3', '2023-09-28 10:15:03'),
(104, 1, 'Se completo meta de meta: 2', '2023-09-28 10:15:17'),
(105, 1, 'Se completo meta de meta: 2', '2023-09-28 10:15:18'),
(106, 1, 'Se completo meta de meta: 3', '2023-09-28 10:16:14'),
(107, 1, 'Se completo meta de meta: 3', '2023-09-28 10:16:14'),
(108, 1, 'Se completo meta de meta: 3', '2023-09-28 10:16:17'),
(109, 1, 'Se completo meta de meta: 3', '2023-09-28 10:16:17'),
(110, 1, 'Se completo meta de meta: 3', '2023-09-28 10:16:18'),
(111, 1, 'Se completo meta de meta: 3', '2023-09-28 10:16:18'),
(112, 1, 'Se completo meta de meta: 3', '2023-09-28 10:17:10'),
(113, 1, 'Se completo meta de meta: 3', '2023-09-28 10:18:31'),
(114, 1, 'Se completo meta de meta: 3', '2023-09-28 10:19:14'),
(115, 1, 'Se completo meta de meta: 3', '2023-09-28 10:24:49'),
(116, 1, 'Creacion de meta: empanada', '2023-09-28 11:45:56'),
(117, 1, 'Creacion de meta: cobrar mano', '2023-09-28 11:55:05'),
(118, 1, 'Eliminacion de meta n* 7', '2023-09-28 11:56:28'),
(119, 1, 'Eliminacion de meta n* 6', '2023-09-28 11:56:43'),
(120, 1, 'Creacion de meta: paga', '2023-09-28 11:57:04'),
(121, 1, 'Transferencia desde 2 a 5', '2023-09-29 12:47:21'),
(122, 1, 'Actualizacion de divisa: Bolivares', '2023-09-29 12:49:29'),
(123, 1, 'Eliminacion de la transaccion n* 11', '2023-09-29 01:03:11'),
(124, 1, 'Eliminacion de la transaccion n* 14', '2023-09-29 01:04:49'),
(125, 1, 'Eliminacion de la transaccion n* 9', '2023-09-29 01:05:35'),
(126, 1, 'Creacion de cuenta: concha', '2023-09-29 01:06:06'),
(127, 1, 'Creacion de cuenta: la mae', '2023-09-29 01:06:10'),
(128, 1, 'Eliminacion de cuenta n* 19', '2023-09-29 01:06:18'),
(129, 1, 'Eliminacion de cuenta n* 18', '2023-09-29 01:06:36'),
(130, 1, 'Creacion de cuenta: mama', '2023-09-29 01:07:34'),
(131, 1, 'Eliminacion de cuenta n* 20', '2023-09-29 01:07:42'),
(132, 1, 'Creacion de cuenta: asdfg', '2023-09-29 01:35:57'),
(133, 1, 'Eliminacion de cuenta n* 21', '2023-09-29 01:36:07'),
(134, 1, 'Creacion de cuenta: sdafsfdas', '2023-09-29 01:37:11'),
(135, 1, 'Creacion de cuenta: fdsafsafsa', '2023-09-29 01:37:13'),
(136, 1, 'Eliminacion de cuenta n* 22', '2023-09-29 01:37:23'),
(137, 1, 'Eliminacion de cuenta n* 23', '2023-09-29 01:39:09'),
(138, 1, 'Creacion de cuenta: sdadsasda', '2023-09-29 01:39:46'),
(139, 1, 'Creacion de cuenta: fdadsffdsa', '2023-09-29 01:39:48'),
(140, 1, 'Eliminacion de cuenta n* 25', '2023-09-29 01:40:03'),
(141, 1, 'Eliminacion de cuenta n* 24', '2023-09-29 01:43:27'),
(142, 1, 'Creacion de cuenta: dssdasdads', '2023-09-29 01:44:36'),
(143, 1, 'Creacion de cuenta: sdadsasdasda', '2023-09-29 01:44:37'),
(144, 1, 'Eliminacion de cuenta n* 27', '2023-09-29 01:44:48'),
(145, 1, 'Eliminacion de cuenta n* 26', '2023-09-29 01:45:00'),
(146, 1, 'Creacion de cuenta: fdsadsfafdas', '2023-09-29 02:00:42'),
(147, 1, 'Creacion de cuenta: fdsadsfadsfa', '2023-09-29 02:00:44'),
(148, 1, 'Eliminacion de cuenta n* 29', '2023-09-29 02:00:54'),
(149, 1, 'Eliminacion de cuenta n* 28', '2023-09-29 02:05:37'),
(150, 1, 'Creacion de cuenta: ffaddfd', '2023-09-29 02:08:06'),
(151, 1, 'Eliminacion de cuenta n* 30', '2023-09-29 02:08:48'),
(152, 1, 'Creacion de cuenta: sdasaf', '2023-09-29 02:09:21'),
(153, 1, 'Eliminacion de cuenta n* 31', '2023-09-29 02:22:24'),
(154, 1, 'Eliminacion de cuenta n* 31', '2023-09-29 02:22:35'),
(155, 1, 'Creacion de cuenta: dasdsasd', '2023-09-29 02:22:50'),
(156, 1, 'Creacion de cuenta: dsadsasdads', '2023-09-29 02:22:53'),
(157, 1, 'Eliminacion de cuenta n* 6', '2023-09-29 02:23:22'),
(158, 1, 'Eliminacion de cuenta n* 32', '2023-09-29 02:28:55'),
(159, 1, 'Eliminacion de cuenta n* 33', '2023-09-29 02:29:04'),
(160, 1, 'Creacion de cuenta: Paypal', '2023-09-29 02:29:36'),
(161, 1, 'Eliminacion de cuenta n* 34', '2023-09-29 02:29:49'),
(162, 1, 'Creacion de cuenta: fdsfdssfd', '2023-09-29 02:29:58'),
(163, 1, 'Creacion de cuenta: fdsfdfdfds', '2023-09-29 02:30:00'),
(164, 1, 'Eliminacion de cuenta n* 35', '2023-09-29 02:30:09'),
(165, 1, 'Eliminacion de cuenta n* 36', '2023-09-29 02:30:13'),
(166, 1, 'Ingreso de usuario: admin', '2023-09-30 09:58:32'),
(167, 2, 'Ingreso de usuario: profesor', '2023-09-30 10:51:13'),
(168, 2, 'Creacion de cuenta: Banesco', '2023-09-30 10:51:41'),
(169, 1, 'Ingreso de usuario: admin', '2023-09-30 10:51:57'),
(170, 1, 'Actualizacion de cuenta: Banescos', '2023-09-30 11:09:38'),
(171, 1, 'Actualizacion de cuenta: Banesco', '2023-09-30 11:09:44'),
(172, 1, 'Actualizacion de cuenta: Banesco', '2023-09-30 11:09:49'),
(173, 1, 'Actualizacion de cuenta: Banesco', '2023-09-30 11:09:50'),
(174, 1, 'Actualizacion de cuenta: Banescos', '2023-09-30 11:10:32'),
(175, 1, 'Actualizacion de cuenta: Banesco', '2023-09-30 11:10:36'),
(176, 1, 'Actualizacion de cuenta: Banesco', '2023-09-30 11:10:40'),
(177, 1, 'Actualizacion de cuenta: Banesco', '2023-09-30 11:11:51'),
(178, 1, 'Actualizacion de cuenta: Banesco', '2023-09-30 11:14:36'),
(179, 1, 'Actualizacion de cuenta: Banesco', '2023-09-30 11:14:52'),
(180, 1, 'Actualizacion de cuenta: Life', '2023-09-30 11:15:12'),
(181, 1, 'Creacion de cuenta: Banesco', '2023-09-30 11:16:49'),
(182, 1, 'Creacion de cuenta: Concha', '2023-09-30 11:17:01'),
(183, 1, 'Actualizacion de cuenta: Banesco', '2023-09-30 11:17:14'),
(184, 1, 'Eliminacion de cuenta n* 38', '2023-09-30 11:18:45'),
(185, 1, 'Actualizacion de cuenta: Life', '2023-09-30 11:25:17'),
(186, 1, 'Actualizacion de cuenta: Life', '2023-09-30 11:25:22'),
(187, 1, 'Actualizacion de cuenta: Life', '2023-09-30 11:25:29'),
(188, 1, 'Actualizacion de cuenta: Life', '2023-09-30 11:25:46'),
(189, 1, 'Actualizacion de cuenta: Life', '2023-09-30 11:26:40'),
(190, 1, 'Eliminacion de cuenta n* 37', '2023-09-30 11:26:49'),
(191, 1, 'Creacion de cuenta: Life', '2023-09-30 11:26:55'),
(192, 1, 'Creacion de cuenta: Hola', '2023-09-30 11:26:59'),
(193, 1, 'Actualizacion de cuenta: Bancaribe', '2023-09-30 11:27:08'),
(194, 1, 'Actualizacion de cuenta: Bancaribe', '2023-09-30 11:27:11'),
(195, 1, 'Actualizacion de cuenta: Bancaribe', '2023-09-30 11:27:18'),
(196, 1, 'Actualizacion de cuenta: Life', '2023-09-30 11:28:05'),
(197, 1, 'Actualizacion de cuenta: Banesco', '2023-09-30 11:29:06'),
(198, 1, 'Actualizacion de cuenta: Hola', '2023-09-30 11:29:32'),
(199, 1, 'Actualizacion de cuenta: Hola', '2023-09-30 11:29:37'),
(200, 1, 'Actualizacion de cuenta: Hola', '2023-09-30 11:29:38'),
(201, 1, 'Actualizacion de cuenta: Life', '2023-09-30 11:29:44'),
(202, 1, 'Actualizacion de cuenta: Hola', '2023-09-30 11:31:35'),
(203, 1, 'Actualizacion de cuenta: Life', '2023-09-30 11:31:39'),
(204, 1, 'Actualizacion de cuenta: Life', '2023-09-30 11:31:40'),
(205, 1, 'Actualizacion de cuenta: Vida', '2023-09-30 11:31:46'),
(206, 2, 'Ingreso de usuario: profesor', '2023-09-30 11:42:57'),
(207, 2, 'Creacion de cuenta: Banesco', '2023-09-30 11:43:09'),
(208, 2, 'Creacion de cuenta: Bancaribe', '2023-09-30 11:43:15'),
(209, 1, 'Ingreso de usuario: admin', '2023-09-30 11:43:22'),
(210, 1, 'Actualizacion de cuenta: Bancaribe', '2023-09-30 11:46:34'),
(211, 1, 'Actualizacion de cuenta: Banesco', '2023-09-30 11:46:39'),
(212, 1, 'Actualizacion de cuenta: Mamasita', '2023-09-30 11:46:44'),
(213, 1, 'Creacion de divisa: Bolivares', '2023-09-30 11:47:53'),
(214, 1, 'Eliminacion de divisa n* 4', '2023-09-30 11:48:01'),
(215, 1, 'Registro de usuario administrador: admin', '2023-09-30 11:51:44'),
(216, 2, 'Ingreso de usuario: profesor', '2023-09-30 12:30:29'),
(217, 2, 'Registro de transaccion', '2023-09-30 12:31:57'),
(218, 1, 'Ingreso de usuario: admin', '2023-09-30 12:46:29'),
(219, 1, 'Ingreso de usuario: admin', '2023-09-30 12:46:45'),
(220, 2, 'Ingreso de usuario: profesor', '2023-09-30 12:54:24'),
(221, 2, 'Creacion de evento para el 2023-10-18', '2023-09-30 12:55:06'),
(222, 2, 'Creacion de meta: pago de hipoteca', '2023-09-30 12:55:52'),
(223, 1, 'Ingreso de usuario: admin', '2023-09-30 01:00:36'),
(224, 1, 'Ingreso de usuario: admin', '2023-09-30 08:11:16'),
(225, 2, 'Ingreso de usuario: profesor', '2023-09-30 08:12:22'),
(226, 2, 'Registro de transaccion', '2023-09-30 10:19:46'),
(227, 2, 'Registro de transaccion', '2023-09-30 10:20:12'),
(228, 2, 'Eliminacion de la transaccion n* 19', '2023-09-30 10:29:41'),
(229, 1, 'Ingreso de usuario: admin', '2023-09-30 10:39:55'),
(230, 1, 'Cambio en la transaccion n* 1', '2023-09-30 10:40:51'),
(231, 1, 'Cambio en la transaccion n* 13', '2023-09-30 10:41:05'),
(232, 1, 'Cambio en la transaccion n* 6', '2023-09-30 10:41:14'),
(233, 2, 'Ingreso de usuario: profesor', '2023-09-30 10:41:33'),
(234, 2, 'Registro de transaccion', '2023-09-30 10:44:53'),
(235, 2, 'Registro de transaccion', '2023-09-30 10:45:16'),
(236, 2, 'Cambio en la transaccion n* 22', '2023-09-30 10:46:37'),
(237, 1, 'Ingreso de usuario: admin', '2023-09-30 11:01:20'),
(238, 2, 'Ingreso de usuario: profesor', '2023-09-30 11:25:06'),
(239, 1, 'Ingreso de usuario: admin', '2023-09-30 11:35:45'),
(240, 1, 'Registro de transaccion', '2023-09-30 11:36:38'),
(241, 2, 'Ingreso de usuario: profesor', '2023-09-30 11:42:04'),
(242, 2, 'Creacion de evento para el 2023-10-13', '2023-10-01 11:32:45'),
(243, 2, 'Creacion de evento para el 2023-10-25', '2023-10-01 11:33:03'),
(244, 1, 'Ingreso de usuario: admin', '2023-10-01 01:48:26'),
(245, 2, 'Ingreso de usuario: profesor', '2023-10-01 01:54:18'),
(246, 1, 'Ingreso de usuario: admin', '2023-10-01 02:05:57'),
(247, 1, 'Ingreso de usuario: admin', '2023-10-01 03:29:48'),
(248, 2, 'Ingreso de usuario: profesor', '2023-10-01 03:32:27'),
(249, 1, 'Ingreso de usuario: admin', '2023-10-01 03:39:05'),
(250, 2, 'Ingreso de usuario: profesor', '2023-10-01 03:40:31'),
(251, 1, 'Ingreso de usuario: admin', '2023-10-01 04:02:01'),
(252, 1, 'Cambio en la transaccion n* 6', '2023-10-01 04:04:25'),
(253, 2, 'Ingreso de usuario: profesor', '2023-10-01 05:14:25'),
(254, 2, 'Cambio en la transaccion n* 18', '2023-10-01 11:31:01'),
(255, 1, 'Ingreso de usuario: admin', '2023-10-01 11:37:07'),
(256, 1, 'Creacion de evento para el 2023-10-12', '2023-10-04 07:24:13'),
(257, 2, 'Ingreso de usuario: profesor', '2023-10-04 07:24:43'),
(258, 2, 'Cambio en la transaccion n* 20', '2023-10-04 07:26:04'),
(259, 2, 'Ingreso de usuario: profesor', '2023-10-04 07:37:59'),
(260, 2, 'Ingreso de usuario: profesor', '2023-10-04 07:43:00'),
(261, 2, 'Ingreso de usuario: profesor', '2023-10-05 07:23:23'),
(262, 1, 'Ingreso de usuario: admin', '2023-10-05 08:44:19'),
(263, 1, 'Ingreso de usuario: admin', '2023-10-12 06:32:03'),
(264, 1, 'Cambio en la transaccion n* 18', '2023-10-12 06:32:55'),
(265, 1, 'Cambio en la transaccion n* 18', '2023-10-12 06:35:29'),
(266, 1, 'Cambio en la transaccion n* 17', '2023-10-12 06:35:46'),
(267, 1, 'Cambio en la transaccion n* 21', '2023-10-12 06:35:58'),
(268, 1, 'Cambio en la transaccion n* 16', '2023-10-12 06:36:10'),
(269, 1, 'Cambio en la transaccion n* 15', '2023-10-12 06:36:32'),
(270, 1, 'Eliminacion de la transaccion n* 1', '2023-10-12 06:36:57'),
(271, 1, 'Eliminacion de la transaccion n* 6', '2023-10-12 06:37:02'),
(272, 1, 'Cambio en la transaccion n* 4', '2023-10-12 06:37:34'),
(273, 1, 'Cambio en la transaccion n* 4', '2023-10-12 06:37:44'),
(274, 1, 'Eliminacion de la transaccion n* 10', '2023-10-12 06:37:48'),
(275, 1, 'Eliminacion de la transaccion n* 23', '2023-10-12 06:37:53'),
(276, 1, 'Eliminacion de la transaccion n* 22', '2023-10-12 06:37:57'),
(277, 1, 'Cambio en la transaccion n* 13', '2023-10-12 06:38:24'),
(278, 1, 'Cambio en la transaccion n* 20', '2023-10-12 06:38:43'),
(279, 1, 'Actualizacion de meta: Comprar petros en binance', '2023-10-12 06:39:23'),
(280, 1, 'Actualizacion de meta: Comprar carro', '2023-10-12 06:39:42'),
(281, 1, 'Actualizacion de meta: Paga del trabajo', '2023-10-12 06:40:06'),
(282, 1, 'Actualizacion de meta: Pago de hipoteca', '2023-10-12 06:40:26'),
(283, 1, 'Actualizacion de evento para el 2023-05-05', '2023-10-12 06:41:45'),
(284, 1, 'Eliminacion de evento n* 7', '2023-10-12 06:41:50'),
(285, 1, 'Eliminacion de evento n* 8', '2023-10-12 06:41:53'),
(286, 1, 'Eliminacion de evento n* 13', '2023-10-12 06:41:57'),
(287, 1, 'Actualizacion de evento para el 2023-10-13', '2023-10-12 06:42:14'),
(288, 1, 'Eliminacion de evento n* 10', '2023-10-12 06:42:18'),
(289, 1, 'Actualizacion de evento para el 2023-10-25', '2023-10-12 06:42:39'),
(290, 1, 'Actualizacion de evento para el 2023-11-23', '2023-10-12 06:43:10'),
(291, 1, 'Eliminacion de meta n* 9', '2023-10-12 09:30:02'),
(292, 1, 'Cambio en la transaccion n* 21', '2023-10-14 05:35:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `date`
--

CREATE TABLE `date` (
  `id_date` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `date`
--

INSERT INTO `date` (`id_date`, `date`) VALUES
(1, '2023-06-06'),
(2, '2023-06-07'),
(3, '2023-06-08'),
(4, '2023-06-08'),
(5, '2023-05-05'),
(6, '2023-11-23'),
(7, '2023-06-09'),
(8, '2023-09-01'),
(9, '2023-09-01'),
(10, '2023-09-01'),
(11, '2023-09-03'),
(12, '2023-09-03'),
(13, '2023-09-02'),
(14, '2023-09-05'),
(15, '2023-09-08'),
(16, '2023-09-11'),
(17, '2023-09-06'),
(18, '2023-09-07'),
(19, '2023-09-21'),
(20, '2023-10-18'),
(21, '2023-10-13'),
(22, '2023-10-25'),
(23, '2023-10-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diary`
--

CREATE TABLE `diary` (
  `id_diary` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_badge` int(11) NOT NULL,
  `id_date` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  `amount` float NOT NULL,
  `type` tinyint(4) NOT NULL,
  `state_register` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `diary`
--

INSERT INTO `diary` (`id_diary`, `id_user`, `id_badge`, `id_date`, `description`, `amount`, `type`, `state_register`) VALUES
(1, 1, 1, 5, 'Comprar regalo de cumple', 50, 1, 0),
(2, 1, 2, 6, 'Cobro del cliente', 10.5, 1, 0),
(11, 2, 1, 21, 'Pagar fiado del chino', 500, 1, 0),
(12, 2, 3, 22, 'Pagar la gasolina a Jorge', 2, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `goal`
--

CREATE TABLE `goal` (
  `id_goal` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_badge` int(11) NOT NULL,
  `name_goal` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `amount` float NOT NULL,
  `complete` tinyint(4) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `state_register` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `goal`
--

INSERT INTO `goal` (`id_goal`, `id_user`, `id_badge`, `name_goal`, `description`, `amount`, `complete`, `type`, `state_register`) VALUES
(2, 1, 3, 'Comprar petros en binance', 'suficiente para comprar crudo', 12, 1, 0, 1),
(3, 1, 2, 'Comprar carro', 'quiero ir a la playa', 2000, 0, 1, 1),
(8, 1, 1, 'Paga del trabajo', 'Dia de salario', 90, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reason`
--

CREATE TABLE `reason` (
  `id_reason` int(11) NOT NULL,
  `name_reason` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `reason`
--

INSERT INTO `reason` (`id_reason`, `name_reason`) VALUES
(1, 'Alimento'),
(2, 'Alquiler'),
(3, 'Mensualidad'),
(4, 'otro'),
(5, 'Completar meta'),
(6, 'Pequeño gasto'),
(7, 'Venta'),
(8, 'Compra'),
(9, 'Trabajo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaction`
--

CREATE TABLE `transaction` (
  `id_transaction` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `id_badge` int(11) NOT NULL,
  `id_reason` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  `amount` float NOT NULL,
  `date` date NOT NULL,
  `type` tinyint(4) NOT NULL,
  `state_register` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `transaction`
--

INSERT INTO `transaction` (`id_transaction`, `id_account`, `id_badge`, `id_reason`, `description`, `amount`, `date`, `type`, `state_register`) VALUES
(4, 5, 1, 2, 'Departamento de septiembre', 450, '2023-09-10', 0, 1),
(12, 11, 1, 2, 'carro alquilado', 150, '2023-09-21', 1, 1),
(13, 2, 2, 5, 'Suficiente compra', 200, '2023-09-28', 1, 1),
(15, 4, 1, 5, 'Objetivo completado', 90, '2023-09-28', 1, 1),
(16, 2, 1, 3, 'transferencia 98753', 500, '2023-09-29', 0, 1),
(17, 5, 1, 3, 'tranferencia 14523', 500, '2023-09-29', 1, 1),
(18, 41, 1, 1, 'Compra de viveres', 500, '2023-09-30', 1, 1),
(20, 40, 1, 1, 'Cooperativa 14586 154795', 700, '2023-09-27', 0, 1),
(21, 41, 2, 3, 'transferencia 789546', 200, '2023-09-29', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nickname` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `type_user` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `nickname`, `password`, `email`, `type_user`) VALUES
(1, 'admin', '123456', 'admin@admin.com', 'administrador'),
(2, 'profesor', '123456', 'profesor@gmail.com', 'usuario'),
(7, 'paola', '123456', 'paola@gmail.com', 'usuario'),
(8, 'carlos', '123456', 'carlos@gmail.com', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_account`),
  ADD KEY `fk_account_user1_idx` (`id_user`);

--
-- Indices de la tabla `badge`
--
ALTER TABLE `badge`
  ADD PRIMARY KEY (`id_badge`),
  ADD UNIQUE KEY `name_badge` (`name_badge`);

--
-- Indices de la tabla `binnacle`
--
ALTER TABLE `binnacle`
  ADD PRIMARY KEY (`id_binnacle`),
  ADD KEY `fk_binnacle_user1_idx` (`id_user`);

--
-- Indices de la tabla `date`
--
ALTER TABLE `date`
  ADD PRIMARY KEY (`id_date`);

--
-- Indices de la tabla `diary`
--
ALTER TABLE `diary`
  ADD PRIMARY KEY (`id_diary`),
  ADD KEY `fk_diary_user1_idx` (`id_user`),
  ADD KEY `fk_diary_badge1_idx` (`id_badge`),
  ADD KEY `fk_diary_date1_idx` (`id_date`);

--
-- Indices de la tabla `goal`
--
ALTER TABLE `goal`
  ADD PRIMARY KEY (`id_goal`),
  ADD KEY `fk_goal_user1_idx` (`id_user`),
  ADD KEY `fk_goal_badge1_idx` (`id_badge`);

--
-- Indices de la tabla `reason`
--
ALTER TABLE `reason`
  ADD PRIMARY KEY (`id_reason`);

--
-- Indices de la tabla `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaction`),
  ADD KEY `fk_Transaction_Font1_idx` (`id_account`),
  ADD KEY `fk_transaction_badge1_idx` (`id_badge`),
  ADD KEY `fk_transaction_reason1_idx` (`id_reason`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nickname` (`nickname`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `account`
--
ALTER TABLE `account`
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `badge`
--
ALTER TABLE `badge`
  MODIFY `id_badge` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `binnacle`
--
ALTER TABLE `binnacle`
  MODIFY `id_binnacle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;

--
-- AUTO_INCREMENT de la tabla `date`
--
ALTER TABLE `date`
  MODIFY `id_date` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `diary`
--
ALTER TABLE `diary`
  MODIFY `id_diary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `goal`
--
ALTER TABLE `goal`
  MODIFY `id_goal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `reason`
--
ALTER TABLE `reason`
  MODIFY `id_reason` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `fk_account_user1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `binnacle`
--
ALTER TABLE `binnacle`
  ADD CONSTRAINT `fk_binnacle_user1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `diary`
--
ALTER TABLE `diary`
  ADD CONSTRAINT `fk_diary_badge1` FOREIGN KEY (`id_badge`) REFERENCES `badge` (`id_badge`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_diary_date1` FOREIGN KEY (`id_date`) REFERENCES `date` (`id_date`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_diary_user1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `goal`
--
ALTER TABLE `goal`
  ADD CONSTRAINT `fk_goal_badge1` FOREIGN KEY (`id_badge`) REFERENCES `badge` (`id_badge`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_goal_user1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `fk_Transaction_Font1` FOREIGN KEY (`id_account`) REFERENCES `account` (`id_account`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transaction_badge1` FOREIGN KEY (`id_badge`) REFERENCES `badge` (`id_badge`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transaction_reason1` FOREIGN KEY (`id_reason`) REFERENCES `reason` (`id_reason`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
