-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3366
-- Tiempo de generación: 27-10-2023 a las 04:27:22
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
(40, 2, 'Paypal', 1),
(41, 2, 'Bancaribe', 1),
(43, 2, 'AirTM', 1),
(44, 2, 'Banesco', 1),
(45, 2, 'Banco Venezuela', 1);

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
(1, 'Bolivares', 0.035),
(2, 'Dolar', 1),
(3, 'Petro', 60),
(6, 'Euro', 1.18);

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
(307, 1, 'Cambio de datos de usuario: admin', '2023-10-19 07:49:20'),
(308, 2, 'Ingreso de usuario: profesor', '2023-10-19 09:55:05'),
(309, 1, 'Ingreso de usuario: admin', '2023-10-19 09:55:16'),
(310, 13, 'Registro de usuario comun: kaloxe', '2023-10-19 09:58:53'),
(311, 13, 'Ingreso de usuario: kaloxe', '2023-10-19 09:59:04'),
(312, 13, 'Creacion de evento para el 2023-10-27', '2023-10-19 10:06:09'),
(313, 13, 'Eliminacion de evento n* 14', '2023-10-19 10:12:44'),
(314, 13, 'Creacion de evento para el 2023-10-27', '2023-10-19 10:20:27'),
(315, 1, 'Ingreso de usuario: admin', '2023-10-19 10:27:33'),
(316, 1, 'Eliminacion de meta n* 8', '2023-10-20 09:54:01'),
(317, 2, 'Ingreso de usuario: profesor', '2023-10-20 09:59:24'),
(318, 2, 'Creacion de meta: pagar telefono', '2023-10-20 10:01:41'),
(319, 2, 'Actualizacion de meta: pagar telefono', '2023-10-20 10:02:42'),
(320, 2, 'Creacion de cuenta: BCV', '2023-10-21 01:48:07'),
(321, 2, 'Eliminacion de cuenta n* 42', '2023-10-21 01:48:11'),
(322, 2, 'Eliminacion de la transaccion n* 21', '2023-10-21 02:01:02'),
(323, 2, 'Eliminacion de evento n* 12', '2023-10-21 02:01:15'),
(324, 1, 'Ingreso de usuario: admin', '2023-10-21 02:01:41'),
(325, 1, 'Eliminacion de usuario n* 12', '2023-10-21 02:01:51'),
(326, 1, 'Eliminacion de usuario n* 2', '2023-10-21 02:02:04'),
(327, 1, 'Creacion de divisa: Euro', '2023-10-21 02:02:38'),
(328, 1, 'Eliminacion de divisa n* 5', '2023-10-21 02:02:46'),
(329, 1, 'Eliminacion de divisa n* 3', '2023-10-21 02:02:56'),
(330, 2, 'Ingreso de usuario: profesor', '2023-10-22 08:01:18'),
(331, 1, 'Ingreso de usuario: admin', '2023-10-22 08:18:39'),
(332, 1, 'Creacion de divisa: Euro', '2023-10-22 02:19:46'),
(333, 1, 'Actualizacion de evento para el 2023-10-27', '2023-10-23 08:08:00'),
(334, 1, 'Actualizacion de evento para el 2023-10-13', '2023-10-23 09:02:55'),
(335, 1, 'Actualizacion de evento para el 2023-11-23', '2023-10-23 09:03:05'),
(336, 1, 'Ingreso de usuario: admin', '2023-10-23 09:06:00'),
(337, 1, 'Actualizacion de evento para el 2023-10-13', '2023-10-23 09:07:31'),
(338, 1, 'Ingreso de usuario: admin', '2023-10-26 08:49:18'),
(339, 1, 'Eliminacion de cuenta n* 39', '2023-10-26 11:18:08'),
(340, 1, 'Registro de transaccion', '2023-10-26 11:18:40'),
(341, 1, 'Cambio en la transaccion n* 34', '2023-10-26 11:20:19'),
(342, 1, 'Cambio en la transaccion n* 25', '2023-10-26 11:20:34'),
(343, 1, 'Actualizacion de cuenta: Paypal', '2023-10-26 12:44:14'),
(344, 1, 'Cambio en la transaccion n* 28', '2023-10-26 12:45:28'),
(345, 1, 'Eliminacion de usuario n* 8', '2023-10-26 08:03:23'),
(346, 1, 'Actualizacion de usuario carlos', '2023-10-26 08:03:40'),
(347, 1, 'Eliminacion de usuario n* 11', '2023-10-26 08:04:01'),
(348, 1, 'Registro de transaccion', '2023-10-26 08:30:45'),
(349, 1, 'Registro de transaccion', '2023-10-26 08:31:22'),
(350, 1, 'Registro de transaccion', '2023-10-26 08:32:42'),
(351, 1, 'Registro de transaccion', '2023-10-26 08:33:33'),
(352, 1, 'Registro de transaccion', '2023-10-26 08:34:27'),
(353, 1, 'Eliminacion de la transaccion n* 20', '2023-10-26 08:34:40'),
(354, 1, 'Eliminacion de la transaccion n* 20', '2023-10-26 08:34:52'),
(355, 1, 'Actualizacion de divisa: Bolivares', '2023-10-26 08:45:36'),
(356, 1, 'Actualizacion de divisa: Euro', '2023-10-26 08:46:41'),
(357, 1, 'Creacion de evento para el 2023-12-02', '2023-10-26 08:57:27'),
(358, 1, 'Creacion de evento para el 2023-12-12', '2023-10-26 08:57:57'),
(359, 1, 'Creacion de evento para el 2023-11-30', '2023-10-26 08:58:14'),
(360, 2, 'Ingreso de usuario: carlos', '2023-10-26 08:59:30'),
(361, 2, 'Creacion de cuenta: AirTM', '2023-10-26 09:25:15'),
(362, 2, 'Creacion de cuenta: Banesco', '2023-10-26 09:25:24'),
(363, 2, 'Creacion de cuenta: Banco Venezuela', '2023-10-26 09:25:36'),
(364, 2, 'Registro de transaccion', '2023-10-26 09:31:41'),
(365, 2, 'Registro de transaccion', '2023-10-26 09:32:10'),
(366, 2, 'Registro de transaccion', '2023-10-26 09:32:42'),
(367, 2, 'Registro de transaccion', '2023-10-26 09:33:05'),
(368, 2, 'Registro de transaccion', '2023-10-26 09:33:42'),
(369, 2, 'Registro de transaccion', '2023-10-26 09:34:34'),
(370, 2, 'Registro de transaccion', '2023-10-26 09:35:18'),
(371, 2, 'Registro de transaccion', '2023-10-26 09:36:11'),
(372, 2, 'Transferencia entre cuentas', '2023-10-26 09:36:56'),
(373, 2, 'Creacion de evento para el 2023-10-28', '2023-10-26 09:38:10'),
(374, 2, 'Creacion de evento para el 2023-10-31', '2023-10-26 09:38:24'),
(375, 2, 'Creacion de evento para el 2023-11-10', '2023-10-26 09:38:39'),
(376, 2, 'Creacion de evento para el 2023-10-30', '2023-10-26 09:39:11'),
(377, 2, 'Creacion de meta: Ahorra dinero', '2023-10-26 09:40:02'),
(378, 2, 'Creacion de meta: Pagar carnet', '2023-10-26 09:40:17'),
(379, 2, 'Creacion de meta: Comprar telefono', '2023-10-26 09:40:43'),
(380, 1, 'Ingreso de usuario: admin', '2023-10-26 09:52:31'),
(381, 2, 'Ingreso de usuario: carlos', '2023-10-26 09:52:46');

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
(23, '2023-10-12'),
(24, '2023-10-27'),
(25, '2023-10-27'),
(26, '2023-12-02'),
(27, '2023-12-12'),
(28, '2023-11-30'),
(29, '2023-10-28'),
(30, '2023-10-31'),
(31, '2023-11-10'),
(32, '2023-10-30');

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
(15, 13, 2, 25, 'pago del trabajo', 50, 0, 1),
(16, 1, 1, 26, 'Comprar regalo de navidad', 1000, 0, 1),
(17, 1, 2, 27, 'Pagar la comida de las fiestas', 100, 0, 1),
(18, 1, 2, 28, 'Cobro de aginaldo', 250, 1, 1),
(19, 2, 1, 29, 'pasaje', 60, 0, 1),
(20, 2, 2, 30, 'Pago de fin de mes', 50, 1, 1),
(21, 2, 2, 31, 'Juguetes de regalo', 20, 0, 1),
(22, 2, 1, 32, 'Prestamo a Daniel', 80, 0, 1);

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
(2, 1, 3, 'Comprar petros en binance', 'suficiente para comprar crudo', 12, 0, 0, 1),
(3, 1, 2, 'Comprar carro', 'quiero ir a la playa', 2000, 0, 1, 1),
(10, 2, 2, 'Comprar pc', '123456', 200, 1, 1, 1),
(11, 2, 2, 'pagar telefono', '', 100, 1, 0, 1),
(12, 2, 2, 'Ahorra dinero', 'Inversion en binance', 500, 0, 1, 1),
(13, 2, 1, 'Pagar carnet', '', 100, 0, 0, 1),
(14, 2, 2, 'Comprar telefono', '', 110, 0, 0, 1);

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
(4, 'Trabajo'),
(5, 'Compra'),
(6, 'Venta'),
(7, 'Evento'),
(8, 'Completar meta'),
(9, 'Otro');

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
(24, 41, 1, 2, 'dsasda', 200, '2023-10-18', 1, 1),
(25, 2, 2, 5, '12345', 15, '2023-10-20', 1, 1),
(26, 11, 1, 5, '123456', 90, '2023-10-20', 1, 1),
(27, 4, 2, 5, 'Prueba', 50, '2023-10-23', 0, 1),
(28, 4, 2, 5, 'Prueba2', 150, '2023-10-23', 1, 1),
(29, 4, 2, 5, 'Prueba3', 10.5, '2023-10-23', 1, 1),
(30, 4, 1, 5, 'Estilos', 50, '2023-10-23', 1, 1),
(31, 4, 1, 5, 'Chino', 500, '2023-10-23', 1, 1),
(32, 4, 2, 8, 'pago del telefono', 100, '2023-10-23', 0, 1),
(33, 2, 1, 7, 'gift', 50, '2023-10-23', 1, 1),
(34, 2, 1, 4, 'Pago de deudas', 1000, '2023-10-26', 1, 1),
(35, 4, 2, 3, 'Referencia 8954621', 130, '2023-10-24', 1, 1),
(36, 5, 1, 6, 'Venta de dolares', 1600, '2023-10-14', 1, 1),
(37, 11, 1, 4, 'Salario', 900, '2023-10-22', 1, 1),
(38, 11, 2, 6, 'Venta de telefono a cliente', 200, '2023-10-23', 1, 1),
(39, 40, 2, 4, 'Servicio de boots', 459, '2023-10-22', 1, 1),
(40, 43, 1, 6, 'Venta de dolares', 250, '2023-10-21', 1, 1),
(41, 43, 2, 2, 'Cobro de pieza', 115, '2023-10-23', 1, 1),
(42, 44, 1, 4, 'Horas extra', 800, '2023-10-24', 1, 1),
(43, 45, 1, 9, 'Limosna', 50, '2023-10-25', 1, 1),
(44, 45, 1, 1, 'Empanadas', 205, '2023-10-26', 1, 1),
(45, 44, 2, 3, 'Prestamo de equipo', 15, '2023-10-21', 1, 1),
(46, 43, 3, 5, 'Crudo de la gasolina', 1, '2023-10-20', 1, 1),
(47, 40, 2, 5, 'Zapatos Nike', 95, '2023-10-21', 0, 1),
(48, 40, 2, 7, 'Para pagar en la fiesta', 50, '2023-10-25', 0, 1),
(49, 45, 2, 7, 'Para pagar en la fiesta', 50, '2023-10-25', 1, 1);

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
(2, 'carlos', '123456', 'carlos@gmail.com', 'usuario'),
(7, 'paola', '123456', 'paola@gmail.com', 'usuario'),
(13, 'kaloxe', '123456', 'kaloxe@gmail.com', 'usuario');

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
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `badge`
--
ALTER TABLE `badge`
  MODIFY `id_badge` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `binnacle`
--
ALTER TABLE `binnacle`
  MODIFY `id_binnacle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=382;

--
-- AUTO_INCREMENT de la tabla `date`
--
ALTER TABLE `date`
  MODIFY `id_date` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `diary`
--
ALTER TABLE `diary`
  MODIFY `id_diary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `goal`
--
ALTER TABLE `goal`
  MODIFY `id_goal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `reason`
--
ALTER TABLE `reason`
  MODIFY `id_reason` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
