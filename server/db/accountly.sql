-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3366
-- Tiempo de generación: 11-09-2023 a las 04:30:26
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
(1, 1, 'Paypal', 0),
(3, 1, 'Airtm', 1),
(5, 1, 'Banco central de Venezuela', 1),
(6, 1, 'Hola que hace', 1),
(7, 1, 'La madre que esta', 1),
(8, 1, 'Binance', 1),
(9, 1, 'Hacker', 1),
(10, 1, 'Mas registros', 1),
(11, 1, 'Banesco', 1),
(12, 1, 'Bancaribe', 1),
(13, 1, 'Mercantil', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `badge`
--

CREATE TABLE `badge` (
  `id_badge` int(11) NOT NULL,
  `name_badge` varchar(45) NOT NULL,
  `value` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `badge`
--

INSERT INTO `badge` (`id_badge`, `name_badge`, `value`) VALUES
(1, 'Bolivar', 1),
(2, 'Dolar', 33);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `binnacle`
--

CREATE TABLE `binnacle` (
  `id_binnacle` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `movement` varchar(45) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `binnacle`
--

INSERT INTO `binnacle` (`id_binnacle`, `id_user`, `movement`, `datetime`) VALUES
(1, 1, 'Inicio de session admin', '2023-09-10 12:36:55'),
(2, 1, 'Inicio de session admin', '2023-09-10 08:27:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `days`
--

CREATE TABLE `days` (
  `id_days` int(11) NOT NULL,
  `name_day` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diary`
--

CREATE TABLE `diary` (
  `id_diary` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_log` int(11) NOT NULL,
  `name_diary` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `amount` float NOT NULL,
  `state_register` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `goal`
--

CREATE TABLE `goal` (
  `id_goal` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name_goal` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `amount` float NOT NULL,
  `date` datetime NOT NULL,
  `state_register` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `id_days` int(11) NOT NULL,
  `type` varchar(45) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaction`
--

CREATE TABLE `transaction` (
  `id_transaction` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `id_badge` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `reference` varchar(45) NOT NULL,
  `amount` float NOT NULL,
  `date` date NOT NULL,
  `description` varchar(45) NOT NULL,
  `state_register` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `transaction`
--

INSERT INTO `transaction` (`id_transaction`, `id_account`, `id_badge`, `type`, `reference`, `amount`, `date`, `description`, `state_register`) VALUES
(1, 1, 1, 0, '123456789', 14, '2023-09-10', 'hola', 1),
(3, 3, 1, 1, '32413', 3212, '2023-09-10', 'fdsaasfd', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nickname` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `nickname`, `password`, `email`) VALUES
(1, 'admin', '123456', 'admin@gmail.com');

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
  ADD PRIMARY KEY (`id_badge`);

--
-- Indices de la tabla `binnacle`
--
ALTER TABLE `binnacle`
  ADD PRIMARY KEY (`id_binnacle`),
  ADD KEY `fk_binnacle_User1_idx` (`id_user`);

--
-- Indices de la tabla `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id_days`);

--
-- Indices de la tabla `diary`
--
ALTER TABLE `diary`
  ADD PRIMARY KEY (`id_diary`),
  ADD KEY `fk_diary_user1_idx` (`id_user`),
  ADD KEY `fk_diary_log1_idx` (`id_log`);

--
-- Indices de la tabla `goal`
--
ALTER TABLE `goal`
  ADD PRIMARY KEY (`id_goal`),
  ADD KEY `fk_goal_user1_idx` (`id_user`);

--
-- Indices de la tabla `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `fk_log_days1_idx` (`id_days`);

--
-- Indices de la tabla `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaction`),
  ADD KEY `fk_Transaction_Font1_idx` (`id_account`),
  ADD KEY `fk_transaction_badge1_idx` (`id_badge`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nickname_UNIQUE` (`nickname`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `account`
--
ALTER TABLE `account`
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `badge`
--
ALTER TABLE `badge`
  MODIFY `id_badge` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `binnacle`
--
ALTER TABLE `binnacle`
  MODIFY `id_binnacle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `days`
--
ALTER TABLE `days`
  MODIFY `id_days` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `diary`
--
ALTER TABLE `diary`
  MODIFY `id_diary` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `goal`
--
ALTER TABLE `goal`
  MODIFY `id_goal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `fk_binnacle_User1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `diary`
--
ALTER TABLE `diary`
  ADD CONSTRAINT `fk_diary_log1` FOREIGN KEY (`id_log`) REFERENCES `log` (`id_log`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_diary_user1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `goal`
--
ALTER TABLE `goal`
  ADD CONSTRAINT `fk_goal_user1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `fk_log_days1` FOREIGN KEY (`id_days`) REFERENCES `days` (`id_days`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `fk_Transaction_Font1` FOREIGN KEY (`id_account`) REFERENCES `account` (`id_account`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transaction_badge1` FOREIGN KEY (`id_badge`) REFERENCES `badge` (`id_badge`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
