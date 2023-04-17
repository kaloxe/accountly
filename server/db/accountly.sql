-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 18-04-2023 a las 01:01:55
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
(5, 1, 'Cambures por pagar', 60),
(6, 1, 'Prestamo del banco', 80),
(7, 1, 'Telefono nuevo', 500);

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
(77, 1, 'Amazon', 760),
(87, 1, 'Mercantil', 500),
(88, 1, 'BCV', 300),
(89, 1, 'Tesoro', 360),
(90, 1, 'Paypal', 200),
(91, 1, 'AirTM', 600),
(92, 1, 'Bancaribe', 225),
(93, 1, 'PandG', 405),
(94, 1, 'Cofee', 65),
(95, 1, 'Remotask', 565);

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
(3, 2, 77, '78953', 123578, '2023-04-06', 'Hola que sae'),
(5, 2, 87, '87795', 12.45, '2023-04-16', 'Pago de galleta'),
(6, 1, 88, '55555', 50, '2023-04-15', 'Bono de Maduro'),
(7, 1, 89, '123345', 120.12, '2023-04-17', 'Sueldo de la cooperativa'),
(8, 2, 90, '8888', 45, '2023-04-11', 'Pago del Royale'),
(9, 1, 94, '65656', 41, '2023-03-29', 'Venta de pelos'),
(10, 2, 89, '898978', 12.45, '2023-04-05', 'Compra de abanos'),
(11, 2, 87, '898947', 12.4, '2023-04-09', 'Compra de verduras'),
(12, 1, 91, '236547', 46.5, '2023-04-05', 'Venta de oro'),
(14, 1, 77, '4444', 10, '2023-04-17', 'Bono'),
(15, 2, 77, '88895', 50, '2023-04-17', 'Multa');

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
(2, 'kaloxe24', 'carlossa@gmail.com', '1234'),
(3, 'obama', 'nigga@gmail.com', '123456');

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
  MODIFY `id_debt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `font`
--
ALTER TABLE `font`
  MODIFY `id_font` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT de la tabla `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
