-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 13-11-2020 a las 19:55:19
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_prueba`
--

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `agregar_interes`$$
CREATE DEFINER=`cag36493`@`localhost` PROCEDURE `agregar_interes` (IN `Correo_Cliete` VARCHAR(255), IN `Interes` VARCHAR(50))  MODIFIES SQL DATA
    SQL SECURITY INVOKER
    COMMENT 'Agrega un interes a un cliente'
INSERT INTO Intereses
(Correo_Cliente,Interes)
VALUES
(Correo_Cliente,Interes)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `Correo_Cliente` varchar(255) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Telefono` varchar(12) NOT NULL,
  `Region` varchar(50) DEFAULT NULL,
  `Empresa` varchar(50) DEFAULT NULL,
  `Ultima_Compra` date DEFAULT NULL,
  `Correo_Vendedor` varchar(255) NOT NULL,
  `RUT_Empresa` varchar(10) NOT NULL,
  PRIMARY KEY (`Correo_Cliente`),
  KEY `Correo_Vendedor` (`Correo_Vendedor`),
  KEY `RUT_Empresa` (`RUT_Empresa`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Correo_Cliente`, `Nombre`, `Telefono`, `Region`, `Empresa`, `Ultima_Compra`, `Correo_Vendedor`, `RUT_Empresa`) VALUES
('hacker@gmail.com', 'juan nicolas', '89896859', 'metropolitana', 'dalira', '2020-11-27', 'jajas@gmail.com', '19244925-1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `RUT_Empresa` varchar(10) NOT NULL,
  `Contrasenha` varchar(30) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Razon_Social` varchar(50) NOT NULL,
  `Giro` varchar(50) NOT NULL,
  `Direccion` tinytext NOT NULL,
  `Correo_Empresa` varchar(255) NOT NULL,
  `Telefono` varchar(12) DEFAULT NULL,
  `Inicio_Contrato` date NOT NULL,
  `Fin_Contrato` date DEFAULT NULL,
  PRIMARY KEY (`RUT_Empresa`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`RUT_Empresa`, `Contrasenha`, `Nombre`, `Razon_Social`, `Giro`, `Direccion`, `Correo_Empresa`, `Telefono`, `Inicio_Contrato`, `Fin_Contrato`) VALUES
('19244925-1', 'hola123', 'miguel', 'jajas', 'jajas', 'jajas1023', 'jajas@gmail.com', '986083149', '2020-11-25', '2020-11-28'),
('19244925-3', 'hola123', 'jajasjajas', 'asjaksjaj', 'sajkasjkj', 'sajkasjks15', 'el@gmail.com', '787575', '2020-11-25', '2020-11-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intereses`
--

DROP TABLE IF EXISTS `intereses`;
CREATE TABLE IF NOT EXISTS `intereses` (
  `Correo_Cliente` varchar(255) NOT NULL,
  `Interes` varchar(50) NOT NULL,
  KEY `Correo_Cliente` (`Correo_Cliente`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

DROP TABLE IF EXISTS `vendedor`;
CREATE TABLE IF NOT EXISTS `vendedor` (
  `Correo_Vendedor` varchar(255) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Telefono` varchar(12) NOT NULL,
  `Inicio_Contrato` date NOT NULL,
  `Fin_Contrato` date DEFAULT NULL,
  `RUT_Empresa` varchar(10) NOT NULL,
  PRIMARY KEY (`Correo_Vendedor`),
  KEY `RUT_Empresa` (`RUT_Empresa`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vendedor`
--

INSERT INTO `vendedor` (`Correo_Vendedor`, `Nombre`, `Telefono`, `Inicio_Contrato`, `Fin_Contrato`, `RUT_Empresa`) VALUES
('jajas@gmail.com', 'jajas', '787575', '2020-11-25', '2020-11-28', '19244925-1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

DROP TABLE IF EXISTS `venta`;
CREATE TABLE IF NOT EXISTS `venta` (
  `ID_Venta` int(6) NOT NULL,
  `Fecha` date NOT NULL,
  `Monto` int(9) NOT NULL,
  `Detalle` text NOT NULL,
  `Correo_Cliente` varchar(255) NOT NULL,
  `Correo_Vendedor` varchar(255) NOT NULL,
  `RUT_Empresa` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_Venta`),
  KEY `Correo_Cliente` (`Correo_Cliente`),
  KEY `Correo_Vendedor` (`Correo_Vendedor`),
  KEY `RUT_Empresa` (`RUT_Empresa`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`ID_Venta`, `Fecha`, `Monto`, `Detalle`, `Correo_Cliente`, `Correo_Vendedor`, `RUT_Empresa`) VALUES
(1, '2020-11-19', 55000, 'pago facil', 'hacker@gmail.com', 'jajas@gmail.com', '19244925-1'),
(2, '2020-11-27', 68000, 'abdaf abdaf', 'james@gmail.com', 'jajas@gmail.com', '19244925-1'),
(3, '2020-11-27', 68000, 'abdaf abdaf', 'walala@gmail.com', 'jajas@gmail.com', '19244925-1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
