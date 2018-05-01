-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 01, 2018 at 11:01 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qwertytransportes`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `PAactualizarContrasena`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PAactualizarContrasena` (IN `us` VARCHAR(50), IN `con` MEDIUMTEXT)  BEGIN
DECLARE EXIT HANDLER FOR SQLEXCEPTION
BEGIN
    ROLLBACK;
END; 
DECLARE EXIT HANDLER FOR SQLWARNING
BEGIN
    ROLLBACK;
END;
START TRANSACTION;
    UPDATE Usuario  set contrasena = con where idUsuario = us;
COMMIT;
END$$

DROP PROCEDURE IF EXISTS `PAborrarRuta`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PAborrarRuta` (IN `idRuta` INT)  BEGIN 
DELETE from ruta where idRuta = idRuta; 
END$$

DROP PROCEDURE IF EXISTS `PAbuscarRuta`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PAbuscarRuta` (IN `idRuta` INT)  BEGIN 
select * from ruta where idRuta = idRuta;
END$$

DROP PROCEDURE IF EXISTS `PAcontrasenaUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PAcontrasenaUsuario` (IN `us` VARCHAR(50))  BEGIN
    SELECT contrasena from Usuario where idUsuario = us;
END$$

DROP PROCEDURE IF EXISTS `PAinsertarRuta`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PAinsertarRuta` (IN `idEmpresa` INT, IN `nombreRuta` VARCHAR(150), IN `gps` VARCHAR(500), IN `imgHorario` BLOB, IN `rutaEstatus` VARCHAR(20), IN `horario` VARCHAR(150))  BEGIN
insert into ruta(idEmpresa,nombreRuta,gps,imgHorario,rutaEstatus,horario) values(idEmpresa,nombreRuta,gps,imgHorario,rutaEstatus,horario);
END$$

DROP PROCEDURE IF EXISTS `PAlistarEmpresas`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PAlistarEmpresas` ()  BEGIN
SELECT correo, idEmpresa, nombreEmpresa, encargado, telefono, direccion  from Empresa;
END$$

DROP PROCEDURE IF EXISTS `PAlistarPermisos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PAlistarPermisos` ()  BEGIN
    SELECT idPermiso, nombrePermiso from Permiso; 
  END$$

DROP PROCEDURE IF EXISTS `PAlistarPermisosPorRol`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PAlistarPermisosPorRol` (`codigoRol` INT)  BEGIN
SELECT rolper.idPermiso, per.nombrePermiso from 
    (SELECT idPermiso, nombrePermiso from Permiso) per,
(SELECT idPermiso from RolPermiso where idRol = codigoRol) rolper
where per.idPermiso = rolper.idPermiso;
  END$$

DROP PROCEDURE IF EXISTS `PAlistarRoles`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PAlistarRoles` ()  BEGIN
    SELECT idRol, nombreRol from Rol; 
  END$$

DROP PROCEDURE IF EXISTS `PAlistarRutas`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PAlistarRutas` (IN `idEmpresa` INT)  BEGIN
select * from ruta where idEmpresa = idEmpresa;
END$$

DROP PROCEDURE IF EXISTS `PAlistarUsuarios`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PAlistarUsuarios` ()  BEGIN
SELECT emp.nombreEmpresa, emp.encargado, emp.telefono, emp.direccion, emp.direccion, emp.idEmpresa,emp.correo,
rol.idRol,rol.nombreRol, us.idUsuario, us.nombreUsuario, us.apellidoUsuario,us.contrasena,
 us.foto, us.estadoUsuario, us.idEmpresa, us.idRol from
(SELECT nombreEmpresa, encargado, telefono, direccion, idEmpresa, correo from Empresa)emp,
(SELECT idRol, nombreRol from Rol)rol,
(SELECT idUsuario, nombreUsuario, apellidoUsuario,contrasena,foto,estadoUsuario,idEmpresa,idRol from Usuario)us 
where emp.idEmpresa = us.idEmpresa and rol.idRol = us.idRol;
END$$

DROP PROCEDURE IF EXISTS `PAmodificarRuta`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PAmodificarRuta` (IN `idRuta` INT, IN `idEmpresa` INT, IN `nombreRuta` VARCHAR(150), IN `gps` VARCHAR(500), IN `imgHorario` BLOB, IN `rutaEstatus` VARCHAR(20), IN `horario` VARCHAR(150))  BEGIN
UPDATE `ruta` SET idEmpresa =idEmpresa,`nombreRuta`= nombreRuta,`gps`=gps,`imgHorario`=imgHorario,`rutaEstatus`=rutaEstatus,`horario`=horario WHERE idRuta = idRuta
;
END$$

DROP PROCEDURE IF EXISTS `PAusuarioLogueado`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PAusuarioLogueado` (IN `usuario` VARCHAR(50), IN `con` MEDIUMTEXT)  BEGIN
SELECT emp.nombreEmpresa, emp.encargado, emp.telefono, emp.direccion, emp.direccion, emp.idEmpresa,emp.correo,
rol.idRol,rol.nombreRol, us.idUsuario, us.nombreUsuario, us.apellidoUsuario,us.contrasena,
 us.foto, us.estadoUsuario, us.idEmpresa, us.idRol from
(SELECT nombreEmpresa, encargado, telefono, direccion, idEmpresa, correo from Empresa)emp,
(SELECT idRol, nombreRol from Rol)rol,
(SELECT idUsuario, nombreUsuario, apellidoUsuario,contrasena,foto,estadoUsuario,idEmpresa,idRol from Usuario)us 
where emp.idEmpresa = us.idEmpresa and rol.idRol = us.idRol and us.idUsuario = usuario and us.contrasena = con;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dispositivo`
--

DROP TABLE IF EXISTS `dispositivo`;
CREATE TABLE IF NOT EXISTS `dispositivo` (
  `idDispositivo` varchar(100) DEFAULT NULL,
  `idRuta` varchar(100) DEFAULT NULL,
  KEY `idRuta` (`idRuta`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `idEmpresa` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEmpresa` varchar(150) DEFAULT NULL,
  `encargado` varchar(150) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `direccion` varchar(300) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idEmpresa`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `nombreEmpresa`, `encargado`, `telefono`, `direccion`, `correo`) VALUES
(1, 'Tuasa', 'Juan Perez', '22342312', 'Alajuela', 'tuasa@gmail.com'),
(2, 'Busetas Heredianas', 'Pedro Alvarado', '22344312', 'Heredia', 'busetasHeredianas@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `noticia`
--

DROP TABLE IF EXISTS `noticia`;
CREATE TABLE IF NOT EXISTS `noticia` (
  `idNoticia` int(11) NOT NULL AUTO_INCREMENT,
  `fechaNoticia` date DEFAULT NULL,
  `descripcionNoticia` varchar(1000) DEFAULT NULL,
  `idEmpresa` int(11) DEFAULT NULL,
  `imgNoticia` blob,
  PRIMARY KEY (`idNoticia`),
  KEY `idEmpresa` (`idEmpresa`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permiso`
--

DROP TABLE IF EXISTS `permiso`;
CREATE TABLE IF NOT EXISTS `permiso` (
  `idPermiso` int(11) NOT NULL AUTO_INCREMENT,
  `nombrePermiso` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idPermiso`),
  UNIQUE KEY `nombrePermiso` (`nombrePermiso`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permiso`
--

INSERT INTO `permiso` (`idPermiso`, `nombrePermiso`) VALUES
(1, 'Administracion general'),
(2, 'Administracion de empresas'),
(3, 'Administracion de usuarios'),
(4, 'Administracion de rutas'),
(5, 'Administracion de buses'),
(6, 'Administracion de horarios'),
(7, 'Administracion de cuenta');

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `nombreRol` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idRol`),
  UNIQUE KEY `nombreRol` (`nombreRol`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`idRol`, `nombreRol`) VALUES
(1, 'Administrador'),
(2, 'Coordinador'),
(3, 'Responsable'),
(4, 'Invitado');

-- --------------------------------------------------------

--
-- Table structure for table `rolpermiso`
--

DROP TABLE IF EXISTS `rolpermiso`;
CREATE TABLE IF NOT EXISTS `rolpermiso` (
  `idPermiso` int(11) NOT NULL,
  `idRol` int(11) NOT NULL,
  PRIMARY KEY (`idRol`,`idPermiso`),
  KEY `idPermiso` (`idPermiso`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rolpermiso`
--

INSERT INTO `rolpermiso` (`idPermiso`, `idRol`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `ruta`
--

DROP TABLE IF EXISTS `ruta`;
CREATE TABLE IF NOT EXISTS `ruta` (
  `idRuta` int(100) NOT NULL AUTO_INCREMENT,
  `idEmpresa` int(11) DEFAULT NULL,
  `nombreRuta` varchar(150) DEFAULT NULL,
  `gps` varchar(500) DEFAULT NULL,
  `imgHorario` blob,
  `rutaEstatus` varchar(20) DEFAULT NULL,
  `horario` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idRuta`),
  KEY `idEmpresa` (`idEmpresa`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruta`
--

INSERT INTO `ruta` (`idRuta`, `idEmpresa`, `nombreRuta`, `gps`, `imgHorario`, `rutaEstatus`, `horario`) VALUES
(2, 1, 'San jose', 'http://localhost/Qwerty/Rutas/2.txt', 0x3132, 'A', 'Lunes');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` varchar(70) NOT NULL,
  `nombreUsuario` varchar(50) DEFAULT NULL,
  `apellidoUsuario` varchar(50) DEFAULT NULL,
  `contrasena` mediumtext,
  `foto` varchar(50) DEFAULT NULL,
  `estadoUsuario` tinyint(1) DEFAULT NULL,
  `idEmpresa` int(11) DEFAULT NULL,
  `idRol` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `idEmpresa` (`idEmpresa`),
  KEY `idRol` (`idRol`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombreUsuario`, `apellidoUsuario`, `contrasena`, `foto`, `estadoUsuario`, `idEmpresa`, `idRol`) VALUES
('andrey', 'andrey', '', '123', '../adjuntos/qwertylogo.png', 1, 1, 2),
('francini113.com', 'Francini', 'Corrales', '1234', '../adjuntos/qwertylogo.png', 1, 2, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
