SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE DATABASE IF NOT EXISTS `accountly` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `accountly`;

CREATE TABLE `account` (
  `id_account` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `name_account` varchar(45) NOT NULL,
  `state_register` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_account`),
  KEY `fk_account_user1_idx` (`id_user`),
  CONSTRAINT `fk_account_user1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO account VALUES("2","1","Banesco","1");
INSERT INTO account VALUES("4","1","Life","1");
INSERT INTO account VALUES("5","1","BCV ","1");
INSERT INTO account VALUES("11","1","Bancaribe","1");
INSERT INTO account VALUES("40","2","Paypal","1");
INSERT INTO account VALUES("41","2","Bancaribe","1");



CREATE TABLE `badge` (
  `id_badge` int(11) NOT NULL AUTO_INCREMENT,
  `name_badge` varchar(45) NOT NULL,
  `value` float NOT NULL,
  PRIMARY KEY (`id_badge`),
  UNIQUE KEY `name_badge` (`name_badge`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO badge VALUES("1","Bolivares","0.033");
INSERT INTO badge VALUES("2","Dolar","1");
INSERT INTO badge VALUES("3","Petro","60");
INSERT INTO badge VALUES("6","Euro","1.2");



CREATE TABLE `binnacle` (
  `id_binnacle` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `movement` varchar(80) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id_binnacle`),
  KEY `fk_binnacle_user1_idx` (`id_user`),
  CONSTRAINT `fk_binnacle_user1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=345 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO binnacle VALUES("307","1","Cambio de datos de usuario: admin","2023-10-19 07:49:20");
INSERT INTO binnacle VALUES("308","2","Ingreso de usuario: profesor","2023-10-19 09:55:05");
INSERT INTO binnacle VALUES("309","1","Ingreso de usuario: admin","2023-10-19 09:55:16");
INSERT INTO binnacle VALUES("310","13","Registro de usuario comun: kaloxe","2023-10-19 09:58:53");
INSERT INTO binnacle VALUES("311","13","Ingreso de usuario: kaloxe","2023-10-19 09:59:04");
INSERT INTO binnacle VALUES("312","13","Creacion de evento para el 2023-10-27","2023-10-19 10:06:09");
INSERT INTO binnacle VALUES("313","13","Eliminacion de evento n* 14","2023-10-19 10:12:44");
INSERT INTO binnacle VALUES("314","13","Creacion de evento para el 2023-10-27","2023-10-19 10:20:27");
INSERT INTO binnacle VALUES("315","1","Ingreso de usuario: admin","2023-10-19 10:27:33");
INSERT INTO binnacle VALUES("316","1","Eliminacion de meta n* 8","2023-10-20 09:54:01");
INSERT INTO binnacle VALUES("317","2","Ingreso de usuario: profesor","2023-10-20 09:59:24");
INSERT INTO binnacle VALUES("318","2","Creacion de meta: pagar telefono","2023-10-20 10:01:41");
INSERT INTO binnacle VALUES("319","2","Actualizacion de meta: pagar telefono","2023-10-20 10:02:42");
INSERT INTO binnacle VALUES("320","2","Creacion de cuenta: BCV","2023-10-21 01:48:07");
INSERT INTO binnacle VALUES("321","2","Eliminacion de cuenta n* 42","2023-10-21 01:48:11");
INSERT INTO binnacle VALUES("322","2","Eliminacion de la transaccion n* 21","2023-10-21 02:01:02");
INSERT INTO binnacle VALUES("323","2","Eliminacion de evento n* 12","2023-10-21 02:01:15");
INSERT INTO binnacle VALUES("324","1","Ingreso de usuario: admin","2023-10-21 02:01:41");
INSERT INTO binnacle VALUES("325","1","Eliminacion de usuario n* 12","2023-10-21 02:01:51");
INSERT INTO binnacle VALUES("326","1","Eliminacion de usuario n* 2","2023-10-21 02:02:04");
INSERT INTO binnacle VALUES("327","1","Creacion de divisa: Euro","2023-10-21 02:02:38");
INSERT INTO binnacle VALUES("328","1","Eliminacion de divisa n* 5","2023-10-21 02:02:46");
INSERT INTO binnacle VALUES("329","1","Eliminacion de divisa n* 3","2023-10-21 02:02:56");
INSERT INTO binnacle VALUES("330","2","Ingreso de usuario: profesor","2023-10-22 08:01:18");
INSERT INTO binnacle VALUES("331","1","Ingreso de usuario: admin","2023-10-22 08:18:39");
INSERT INTO binnacle VALUES("332","1","Creacion de divisa: Euro","2023-10-22 02:19:46");
INSERT INTO binnacle VALUES("333","1","Actualizacion de evento para el 2023-10-27","2023-10-23 08:08:00");
INSERT INTO binnacle VALUES("334","1","Actualizacion de evento para el 2023-10-13","2023-10-23 09:02:55");
INSERT INTO binnacle VALUES("335","1","Actualizacion de evento para el 2023-11-23","2023-10-23 09:03:05");
INSERT INTO binnacle VALUES("336","1","Ingreso de usuario: admin","2023-10-23 09:06:00");
INSERT INTO binnacle VALUES("337","1","Actualizacion de evento para el 2023-10-13","2023-10-23 09:07:31");
INSERT INTO binnacle VALUES("338","1","Ingreso de usuario: admin","2023-10-26 08:49:18");
INSERT INTO binnacle VALUES("339","1","Eliminacion de cuenta n* 39","2023-10-26 11:18:08");
INSERT INTO binnacle VALUES("340","1","Registro de transaccion","2023-10-26 11:18:40");
INSERT INTO binnacle VALUES("341","1","Cambio en la transaccion n* 34","2023-10-26 11:20:19");
INSERT INTO binnacle VALUES("342","1","Cambio en la transaccion n* 25","2023-10-26 11:20:34");
INSERT INTO binnacle VALUES("343","1","Actualizacion de cuenta: Paypal","2023-10-26 12:44:14");
INSERT INTO binnacle VALUES("344","1","Cambio en la transaccion n* 28","2023-10-26 12:45:28");



CREATE TABLE `date` (
  `id_date` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  PRIMARY KEY (`id_date`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO date VALUES("1","2023-06-06");
INSERT INTO date VALUES("2","2023-06-07");
INSERT INTO date VALUES("3","2023-06-08");
INSERT INTO date VALUES("4","2023-06-08");
INSERT INTO date VALUES("5","2023-05-05");
INSERT INTO date VALUES("6","2023-11-23");
INSERT INTO date VALUES("7","2023-06-09");
INSERT INTO date VALUES("8","2023-09-01");
INSERT INTO date VALUES("9","2023-09-01");
INSERT INTO date VALUES("10","2023-09-01");
INSERT INTO date VALUES("11","2023-09-03");
INSERT INTO date VALUES("12","2023-09-03");
INSERT INTO date VALUES("13","2023-09-02");
INSERT INTO date VALUES("14","2023-09-05");
INSERT INTO date VALUES("15","2023-09-08");
INSERT INTO date VALUES("16","2023-09-11");
INSERT INTO date VALUES("17","2023-09-06");
INSERT INTO date VALUES("18","2023-09-07");
INSERT INTO date VALUES("19","2023-09-21");
INSERT INTO date VALUES("20","2023-10-18");
INSERT INTO date VALUES("21","2023-10-13");
INSERT INTO date VALUES("22","2023-10-25");
INSERT INTO date VALUES("23","2023-10-12");
INSERT INTO date VALUES("24","2023-10-27");
INSERT INTO date VALUES("25","2023-10-27");



CREATE TABLE `diary` (
  `id_diary` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_badge` int(11) NOT NULL,
  `id_date` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  `amount` float NOT NULL,
  `type` tinyint(4) NOT NULL,
  `state_register` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_diary`),
  KEY `fk_diary_user1_idx` (`id_user`),
  KEY `fk_diary_badge1_idx` (`id_badge`),
  KEY `fk_diary_date1_idx` (`id_date`),
  CONSTRAINT `fk_diary_badge1` FOREIGN KEY (`id_badge`) REFERENCES `badge` (`id_badge`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_diary_date1` FOREIGN KEY (`id_date`) REFERENCES `date` (`id_date`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_diary_user1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO diary VALUES("1","1","1","5","Comprar regalo de cumple","50","1","0");
INSERT INTO diary VALUES("2","1","2","6","Cobro del cliente","10.5","1","0");
INSERT INTO diary VALUES("11","2","1","21","Pagar fiado del chino","500","1","0");
INSERT INTO diary VALUES("15","13","2","25","pago del trabajo","50","0","1");



CREATE TABLE `goal` (
  `id_goal` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_badge` int(11) NOT NULL,
  `name_goal` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `amount` float NOT NULL,
  `complete` tinyint(4) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `state_register` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_goal`),
  KEY `fk_goal_user1_idx` (`id_user`),
  KEY `fk_goal_badge1_idx` (`id_badge`),
  CONSTRAINT `fk_goal_badge1` FOREIGN KEY (`id_badge`) REFERENCES `badge` (`id_badge`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_goal_user1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO goal VALUES("2","1","3","Comprar petros en binance","suficiente para comprar crudo","12","0","0","1");
INSERT INTO goal VALUES("3","1","2","Comprar carro","quiero ir a la playa","2000","0","1","1");
INSERT INTO goal VALUES("10","2","2","Comprar pc","123456","200","1","1","1");
INSERT INTO goal VALUES("11","2","2","pagar telefono","","100","1","0","1");



CREATE TABLE `reason` (
  `id_reason` int(11) NOT NULL AUTO_INCREMENT,
  `name_reason` varchar(45) NOT NULL,
  PRIMARY KEY (`id_reason`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO reason VALUES("1","Alimento");
INSERT INTO reason VALUES("2","Alquiler");
INSERT INTO reason VALUES("3","Mensualidad");
INSERT INTO reason VALUES("4","Trabajo");
INSERT INTO reason VALUES("5","Compra");
INSERT INTO reason VALUES("6","Venta");
INSERT INTO reason VALUES("7","Evento");
INSERT INTO reason VALUES("8","Completar meta");
INSERT INTO reason VALUES("9","Otro");



CREATE TABLE `transaction` (
  `id_transaction` int(11) NOT NULL AUTO_INCREMENT,
  `id_account` int(11) NOT NULL,
  `id_badge` int(11) NOT NULL,
  `id_reason` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  `amount` float NOT NULL,
  `date` date NOT NULL,
  `type` tinyint(4) NOT NULL,
  `state_register` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_transaction`),
  KEY `fk_Transaction_Font1_idx` (`id_account`),
  KEY `fk_transaction_badge1_idx` (`id_badge`),
  KEY `fk_transaction_reason1_idx` (`id_reason`),
  CONSTRAINT `fk_Transaction_Font1` FOREIGN KEY (`id_account`) REFERENCES `account` (`id_account`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_transaction_badge1` FOREIGN KEY (`id_badge`) REFERENCES `badge` (`id_badge`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_transaction_reason1` FOREIGN KEY (`id_reason`) REFERENCES `reason` (`id_reason`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO transaction VALUES("4","5","1","2","Departamento de septiembre","450","2023-09-10","0","1");
INSERT INTO transaction VALUES("12","11","1","2","carro alquilado","150","2023-09-21","1","1");
INSERT INTO transaction VALUES("13","2","2","5","Suficiente compra","200","2023-09-28","1","1");
INSERT INTO transaction VALUES("15","4","1","5","Objetivo completado","90","2023-09-28","1","1");
INSERT INTO transaction VALUES("16","2","1","3","transferencia 98753","500","2023-09-29","0","1");
INSERT INTO transaction VALUES("17","5","1","3","tranferencia 14523","500","2023-09-29","1","1");
INSERT INTO transaction VALUES("18","41","1","1","Compra de viveres","500","2023-09-30","1","1");
INSERT INTO transaction VALUES("20","40","1","1","Cooperativa 14586 154795","100","2023-09-27","0","1");
INSERT INTO transaction VALUES("24","41","1","2","dsasda","200","2023-10-18","1","1");
INSERT INTO transaction VALUES("25","2","2","5","12345","15","2023-10-20","1","1");
INSERT INTO transaction VALUES("26","11","1","5","123456","90","2023-10-20","1","1");
INSERT INTO transaction VALUES("27","4","2","5","Prueba","50","2023-10-23","0","1");
INSERT INTO transaction VALUES("28","4","2","5","Prueba2","150","2023-10-23","1","1");
INSERT INTO transaction VALUES("29","4","2","5","Prueba3","10.5","2023-10-23","1","1");
INSERT INTO transaction VALUES("30","4","1","5","Estilos","50","2023-10-23","1","1");
INSERT INTO transaction VALUES("31","4","1","5","Chino","500","2023-10-23","1","1");
INSERT INTO transaction VALUES("32","4","2","8","pago del telefono","100","2023-10-23","0","1");
INSERT INTO transaction VALUES("33","2","1","7","gift","50","2023-10-23","1","1");
INSERT INTO transaction VALUES("34","2","1","4","Pago de deudas","1000","2023-10-26","1","1");



CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `type_user` varchar(45) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `nickname` (`nickname`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO user VALUES("1","admin","123456","admin@admin.com","administrador");
INSERT INTO user VALUES("2","profesor","123456","profesor@gmail.com","usuario");
INSERT INTO user VALUES("7","paola","123456","paola@gmail.com","usuario");
INSERT INTO user VALUES("8","carlos","123456","carlos@gmail.com","usuario");
INSERT INTO user VALUES("11","adrian","123456","adrian@gmail.com","usuario");
INSERT INTO user VALUES("13","kaloxe","123456","kaloxe@gmail.com","usuario");

