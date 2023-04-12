-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 12-04-2023 a las 22:00:30
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `debt`
--

CREATE TABLE `debt` (
  `id_debt` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `debt`
--

INSERT INTO `debt` (`id_debt`, `id_user`, `description`, `amount`) VALUES
(5, 1, 'ahora si funciona como es', 12456);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `font`
--

CREATE TABLE `font` (
  `id_font` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name_font` varchar(45) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `font`
--

INSERT INTO `font` (`id_font`, `id_user`, `name_font`, `amount`) VALUES
(74, 1, 'Bancog', 212.487),
(77, 1, 'hola', 788546),
(83, 1, '1234', 3245),
(84, 1, '1234', 2135),
(85, 1, 'fsdgsdfgsfgdsgfds', 312345),
(86, 1, 'fsgfds', 1234);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `management`
--

CREATE TABLE `management` (
  `id_management` int(11) NOT NULL,
  `name_management` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `management`
--

INSERT INTO `management` (`id_management`, `name_management`) VALUES
(1, 'ingreso'),
(2, 'egreso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaction`
--

CREATE TABLE `transaction` (
  `id_transaction` int(11) NOT NULL,
  `id_management` int(11) NOT NULL,
  `id_font` int(11) NOT NULL,
  `reference` varchar(45) NOT NULL,
  `amount` float NOT NULL,
  `date` date NOT NULL,
  `description` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `transaction`
--

INSERT INTO `transaction` (`id_transaction`, `id_management`, `id_font`, `reference`, `amount`, `date`, `description`) VALUES
(3, 2, 77, '78953', 123578, '2023-04-06', 'Hola que sae');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nickname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `nickname`, `email`, `password`) VALUES
(1, 'admin', '', '123456'),
(2, 'kaloxe24', 'carlossa@gmail.com', '12345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `debt`
--
ALTER TABLE `debt`
  ADD PRIMARY KEY (`id_debt`),
  ADD KEY `fk_Liability_User1_idx` (`id_user`);

--
-- Indices de la tabla `font`
--
ALTER TABLE `font`
  ADD PRIMARY KEY (`id_font`),
  ADD KEY `fk_Font_User1_idx` (`id_user`);

--
-- Indices de la tabla `management`
--
ALTER TABLE `management`
  ADD PRIMARY KEY (`id_management`);

--
-- Indices de la tabla `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaction`),
  ADD KEY `fk_Transaction_Management1_idx` (`id_management`),
  ADD KEY `fk_Transaction_Font1_idx` (`id_font`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `debt`
--
ALTER TABLE `debt`
  MODIFY `id_debt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `font`
--
ALTER TABLE `font`
  MODIFY `id_font` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de la tabla `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `debt`
--
ALTER TABLE `debt`
  ADD CONSTRAINT `fk_Liability_User1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `font`
--
ALTER TABLE `font`
  ADD CONSTRAINT `fk_Font_User1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `fk_Transaction_Font1` FOREIGN KEY (`id_font`) REFERENCES `font` (`id_font`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Transaction_Management1` FOREIGN KEY (`id_management`) REFERENCES `management` (`id_management`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
