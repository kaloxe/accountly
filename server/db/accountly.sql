-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3366
-- Tiempo de generación: 21-09-2023 a las 13:29:24
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
(6, 1, 'Paypal', 1),
(11, 1, 'Bancaribe', 1);

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
(1, 'Bolivar', 1),
(2, 'Dolar', 33),
(3, 'Petro', 59);

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
(1, 1, 'Inicio de session admin', '2023-09-14 10:01:32'),
(2, 1, 'Inicio de session admin', '2023-09-14 10:10:32'),
(3, 1, 'Inicio de session admin', '2023-09-14 10:11:11'),
(4, 1, 'Inicio de session admin', '2023-09-14 10:11:30'),
(5, 1, 'Inicio de session admin', '2023-09-14 10:13:22'),
(6, 1, 'Inicio de session admin', '2023-09-14 10:15:21'),
(7, 1, 'Inicio de session admin', '2023-09-14 10:16:28');

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
(19, '2023-09-21');

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
(1, 1, 1, 5, 'hola', 123, 1, 0),
(2, 1, 2, 6, 'holi', 123, 1, 0),
(7, 1, 1, 17, 'dsasda', 123, 1, 1),
(8, 1, 2, 18, 'dsasda', 12, 1, 1),
(9, 1, 1, 19, 'qwerty', 1234, 1, 1);

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
(2, 1, 3, 'Vaina', 'cripto', 12, 0, 0, 1),
(3, 1, 2, 'Carro', 'pa anda en la calle', 2000, 0, 1, 1),
(4, 1, 1, 'Comprar arepa', 'Quiero comer arepa', 86, 0, 1, 1);

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
(4, 'otro');

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
(1, 2, 3, 2, 'qwerty', 500, '2023-09-15', 1, 1),
(4, 5, 1, 3, 'hola mundo', 450, '2023-09-10', 0, 1),
(6, 4, 1, 1, 'fdfsdfds', 2000, '2023-09-16', 1, 1),
(7, 2, 1, 3, 'fsfdadfdsa', 700, '2023-09-16', 1, 1),
(9, 2, 3, 2, 'sddsfsfddsfaas', 50, '2023-09-15', 0, 1),
(10, 5, 1, 2, 'vava', 600, '2023-09-20', 1, 1);

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
(1, 'admin', '123456', 'admin@admin', 'admin'),
(2, 'profesor', '123456', 'profesor@gmail.com', 'usuario');

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
  ADD UNIQUE KEY `nickname_UNIQUE` (`nickname`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `account`
--
ALTER TABLE `account`
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `badge`
--
ALTER TABLE `badge`
  MODIFY `id_badge` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `binnacle`
--
ALTER TABLE `binnacle`
  MODIFY `id_binnacle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `date`
--
ALTER TABLE `date`
  MODIFY `id_date` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `diary`
--
ALTER TABLE `diary`
  MODIFY `id_diary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `goal`
--
ALTER TABLE `goal`
  MODIFY `id_goal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `reason`
--
ALTER TABLE `reason`
  MODIFY `id_reason` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
