-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2016 a las 01:48:40
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `libreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idComentario` int(11) NOT NULL,
  `detalle` varchar(1000) NOT NULL,
  `fecha` datetime NOT NULL,
  `idProducto` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idComentario`, `detalle`, `fecha`, `idProducto`, `idUsuario`) VALUES
(15, 'Estas tijeras son de excelente calidad, hace un aÃ±o la tengo y funciona barbaro', '2016-05-14 09:34:33', 3, 28734996),
(16, 'Carpetas utiles para guardar cualquier documentacion', '2016-05-14 09:35:30', 2, 28734996),
(17, 'carpetas A4 - codigo de producto = 3456', '2016-05-15 18:31:19', 2, 28734996),
(18, 'tijera - cod: 4567', '2016-05-15 18:37:39', 3, 28734996),
(19, 'carpeta a4 - cod = 3456', '2016-05-15 18:38:48', 2, 28734996),
(20, 'carpeta a4 - cod = 3456', '2016-05-15 18:41:36', 3456, 22777888),
(21, 'Es un gran producto de excelente calidad.', '2016-05-15 22:38:54', 1234, 28734996),
(22, 'Gran libreta anuario que sirvio para todo', '2016-05-15 23:00:31', 2345, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `pr_codigo` int(11) NOT NULL,
  `pr_descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`pr_codigo`, `pr_descripcion`) VALUES
(1234, 'Juego de 30 lapices'),
(2345, 'Libreta Anuario'),
(3456, 'carpetas a4'),
(4567, 'tijera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_precio`
--

CREATE TABLE `producto_precio` (
  `pp_codigo` int(11) NOT NULL,
  `pp_codigo_prod` int(11) DEFAULT NULL,
  `pp_precio` float DEFAULT NULL,
  `pp_fecha_cambio` date DEFAULT NULL,
  `pp_semana` int(11) DEFAULT NULL,
  `pp_usuario` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto_precio`
--

INSERT INTO `producto_precio` (`pp_codigo`, `pp_codigo_prod`, `pp_precio`, `pp_fecha_cambio`, `pp_semana`, `pp_usuario`) VALUES
(1, 1234, 30, '2016-04-24', 3, '28734996'),
(2, 2345, 20, '2016-04-24', 3, '28734996'),
(3, 1234, 12, '2016-05-07', 4, '28734996'),
(4, 1234, 12, '2016-05-07', 4, '28734996'),
(5, 1234, 13, '2016-05-07', 4, '28734996'),
(6, 1234, 30, '2016-05-15', 6, '28734996'),
(7, 2345, 20, '2016-05-15', 6, '28734996'),
(8, 3456, 45, '2016-05-15', 6, '28734996');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `ro_codigo` int(11) NOT NULL,
  `ro_descripcion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`ro_codigo`, `ro_descripcion`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'USUARIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `us_login` varchar(20) NOT NULL,
  `us_password` varchar(30) NOT NULL,
  `us_rol` int(11) NOT NULL,
  `us_nombre` varchar(30) NOT NULL,
  `us_habilitado` char(1) NOT NULL,
  `passphrases` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`us_login`, `us_password`, `us_rol`, `us_nombre`, `us_habilitado`, `passphrases`) VALUES
('11222333', '1234', 2, 'Fernando', 'N', 'mdsei'),
('22777888', '123456', 1, 'pepe', 'S', 'mdsei'),
('28734996', '123456', 2, 'Ricardo', 'S', 'mdsei');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idComentario`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`pr_codigo`);

--
-- Indices de la tabla `producto_precio`
--
ALTER TABLE `producto_precio`
  ADD PRIMARY KEY (`pp_codigo`),
  ADD KEY `pp_codigo_prod` (`pp_codigo_prod`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`ro_codigo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`us_login`),
  ADD KEY `us_rol` (`us_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `producto_precio`
--
ALTER TABLE `producto_precio`
  MODIFY `pp_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto_precio`
--
ALTER TABLE `producto_precio`
  ADD CONSTRAINT `producto_precio_ibfk_1` FOREIGN KEY (`pp_codigo_prod`) REFERENCES `producto` (`pr_codigo`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`us_rol`) REFERENCES `rol` (`ro_codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
