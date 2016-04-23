-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-04-2016 a las 01:05:42
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `precioscuidados`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `id_admin` int(2) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellido` varchar(15) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_admin`, `nombre`, `apellido`) VALUES
(1, 'Juan', 'Peron');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `id_empleado` int(2) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) NOT NULL,
  `apellido` varchar(15) NOT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `nombre`, `apellido`) VALUES
(2, 'diego', 'reinoso'),
(3, 'elizabeth', 'perez'),
(4, 'lucia', 'reinoso'),
(6, 'lara', 'ruedas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios`
--

CREATE TABLE IF NOT EXISTS `precios` (
  `id_producto` int(3) NOT NULL,
  `id_empleado` int(2) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `valor` float NOT NULL,
  `semana` int(1) NOT NULL,
  PRIMARY KEY (`id_producto`,`id_empleado`),
  KEY `id_empleado` (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `precios`
--

INSERT INTO `precios` (`id_producto`, `id_empleado`, `descripcion`, `valor`, `semana`) VALUES
(1, 2, 'fideos', 75, 1),
(1, 3, 'fideos', 11, 1),
(1, 4, 'fideos', 20, 1),
(2, 2, 'galletitas', 15, 1),
(2, 3, 'galletitas', 43, 1),
(2, 4, 'galletitas', 25, 1),
(3, 2, 'desodorante', 20, 1),
(3, 3, 'desodorante', 21, 1),
(3, 4, 'desodorante', 77, 1),
(4, 2, 'fernet', 100, 1),
(4, 3, 'fernet', 120, 1),
(4, 4, 'fernet', 200, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id_producto` int(3) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `descripcion`) VALUES
(1, 'fideos'),
(2, 'galletitas'),
(3, 'desodorante'),
(4, 'fernet'),
(6, 'caramelos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `rol` varchar(15) NOT NULL,
  `contrasenia` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `rol`, `contrasenia`) VALUES
(1, 'administrador', 'diego'),
(2, 'empleado', 'juan'),
(3, 'empleado', 'pedro'),
(4, 'empleado', 'dios'),
(8, 'empleado', 'tupeli');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `precios`
--
ALTER TABLE `precios`
  ADD CONSTRAINT `precios_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`),
  ADD CONSTRAINT `precios_ibfk_2` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
