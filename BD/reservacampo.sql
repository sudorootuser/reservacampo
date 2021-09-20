/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.18-MariaDB : Database - reservacampo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`reservacampo` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `reservacampo`;

/*Table structure for table `campos` */

DROP TABLE IF EXISTS `campos`;

CREATE TABLE `campos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_Campo` varchar(35) NOT NULL,
  `mantenimiento` varchar(8) NOT NULL DEFAULT 'Activo',
  `imagen` varchar(100) DEFAULT NULL,
  `estado_Campo` varchar(10) DEFAULT '0',
  `tipo_Cancha` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4;

/*Data for the table `campos` */

insert  into `campos`(`id`,`nombre_Campo`,`mantenimiento`,`imagen`,`estado_Campo`,`tipo_Cancha`) values (97,'Cancha Verde','No','9ab54c521300984bffec95581c8115f0.jpg','0','Sinteticos'),(98,'Cancha Amarilla','Sí','f57f2d2687031d49e2a5f4ddc8ee35f2.jpg','0','Polvo Ladrillo');

/*Table structure for table `extras` */

DROP TABLE IF EXISTS `extras`;

CREATE TABLE `extras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `raqueta` varchar(25) DEFAULT NULL,
  `pelotas` varchar(25) DEFAULT NULL,
  `uniformes` varchar(35) DEFAULT NULL,
  `dia` date DEFAULT NULL,
  `reservas_idReservas` int(11) DEFAULT NULL,
  `campos_idCampos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `campos_idCampos` (`campos_idCampos`),
  KEY `reservas_idReservas` (`reservas_idReservas`),
  CONSTRAINT `extras_ibfk_1` FOREIGN KEY (`campos_idCampos`) REFERENCES `campos` (`id`),
  CONSTRAINT `extras_ibfk_2` FOREIGN KEY (`reservas_idReservas`) REFERENCES `reservas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `extras` */

insert  into `extras`(`id`,`raqueta`,`pelotas`,`uniformes`,`dia`,`reservas_idReservas`,`campos_idCampos`) values (13,'12','12','12','2021-09-10',154,NULL);

/*Table structure for table `reservas` */

DROP TABLE IF EXISTS `reservas`;

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titular_Reserva` varchar(45) NOT NULL,
  `fecha_Reserva` date NOT NULL,
  `telefono_Titular` varchar(45) NOT NULL,
  `email_Titular` varchar(45) NOT NULL,
  `Campos_idCampos` int(11) DEFAULT NULL,
  `estado_reserva` int(11) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `fk_Reservas_Campos1_idx` (`Campos_idCampos`),
  CONSTRAINT `fk_Reservas_Campos1` FOREIGN KEY (`Campos_idCampos`) REFERENCES `campos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=155 DEFAULT CHARSET=utf8mb4;

/*Data for the table `reservas` */

insert  into `reservas`(`id`,`titular_Reserva`,`fecha_Reserva`,`telefono_Titular`,`email_Titular`,`Campos_idCampos`,`estado_reserva`) values (154,'Admin','2021-09-10','1234567890','admin@gmail.com',98,0);

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(30) NOT NULL,
  `genero` varchar(11) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `estado` varchar(7) NOT NULL DEFAULT 'Activo',
  `fechaNacimiento` date DEFAULT NULL,
  `tpDocumento` varchar(20) NOT NULL,
  `cedula` varchar(12) NOT NULL,
  `password` varchar(130) NOT NULL,
  `nombreUsuario` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `last_session` datetime DEFAULT NULL,
  `activacion` int(11) NOT NULL DEFAULT 0,
  `token` varchar(40) NOT NULL,
  `token_password` varchar(100) DEFAULT NULL,
  `password_request` int(11) DEFAULT 0,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

/*Data for the table `usuario` */

insert  into `usuario`(`idUsuario`,`usuario`,`genero`,`telefono`,`estado`,`fechaNacimiento`,`tpDocumento`,`cedula`,`password`,`nombreUsuario`,`apellido`,`correo`,`last_session`,`activacion`,`token`,`token_password`,`password_request`) values (1,'Admin','','0123456789','Activo','2021-07-31','Tarjeta de Identidad','12345678910','$2y$10$HlPAVmVTecrZGBm0FM1jrOU8BGNtSZZQxlPWNbY9jsDtdHBx9hoiG','Admin','Admin','Admin@gmail.com','2021-09-12 15:04:52',1,'c89da2d615918683df8537e566ec8de0','',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
