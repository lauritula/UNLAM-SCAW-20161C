-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2016 a las 19:34:29
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `precioscuidados`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_admin` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellido` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_admin`, `nombre`, `apellido`) VALUES
(1, 'John', 'Doe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_comentarista` int(11) NOT NULL,
  `semana` int(11) NOT NULL,
  `texto` varchar(100) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_comentarista`, `semana`, `texto`, `fecha_hora`) VALUES
(1, 0, 16, 'Supermercado X negó el acceso', '2016-05-15 22:19:27'),
(2, 2, 16, 'Ausente por enfermedad', '2016-05-15 22:41:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellido` varchar(15) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `nombre`, `apellido`, `estado`) VALUES
(0, 'Anonimo', 'Anonimo', 'efectivo'),
(2, 'Julio', 'Reinoso', 'efectivo'),
(3, 'Elizabeth', 'Perez', 'efectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios`
--

CREATE TABLE `precios` (
  `id_entrada` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `descripcion` varchar(20) NOT NULL,
  `valor` int(11) NOT NULL,
  `semana` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `precios`
--

INSERT INTO `precios` (`id_entrada`, `id_producto`, `id_empleado`, `descripcion`, `valor`, `semana`) VALUES
(1, 1, NULL, 'Arroz', 100, 16),
(2, 1, NULL, 'Arroz', 12, 17),
(4, 2, NULL, 'Fideos', 30, 16),
(5, 3, NULL, 'Yerba', 15, 16),
(6, 4, NULL, 'Azucar', 4, 16),
(7, 5, NULL, 'Salsa', 15, 16),
(8, 2, NULL, 'Fideos', 28, 17),
(9, 3, NULL, 'Yerba', 17, 17),
(10, 4, NULL, 'Azucar', 8, 17),
(11, 5, NULL, 'Salsa', 18, 17),
(12, 1, NULL, 'Arroz', 15, 16),
(13, 2, NULL, 'Fideos', 19, 16),
(14, 3, NULL, 'Yerba', 55, 16),
(15, 4, NULL, 'Azucar', 6, 16),
(16, 5, NULL, 'Salsa', 11, 16),
(17, 1, NULL, 'Arroz', 13, 17),
(18, 2, NULL, 'Fideos', 21, 17),
(19, 3, NULL, 'Yerba', 45, 17),
(20, 4, NULL, 'Azucar', 9, 17),
(21, 5, NULL, 'Salsa', 17, 17),
(22, 1, NULL, 'Arroz', 16, 16),
(23, 2, NULL, 'Fideos', 17, 16),
(24, 3, NULL, 'Yerba', 53, 16),
(25, 4, NULL, 'Azucar', 7, 16),
(26, 5, NULL, 'Salsa', 16, 16),
(27, 1, NULL, 'Arroz', 11, 17),
(28, 2, NULL, 'Fideos', 18, 17),
(29, 3, NULL, 'Yerba', 43, 17),
(30, 4, NULL, 'Azucar', 6, 17),
(31, 5, NULL, 'Salsa', 2, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `descripcion`) VALUES
(1, 'Arroz'),
(2, 'Fideos'),
(3, 'Yerba'),
(4, 'Azucar'),
(5, 'Salsa de Tomate');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `rol` varchar(15) NOT NULL,
  `contrasenia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `rol`, `contrasenia`) VALUES
(0, 'empleado', '$2y$12$0q9TyzWtI7WgmE1FWUMwf.IPxF0jlFZ9dbyaZKWc9hoofjYmsI1d.'),
(1, 'administrador', '$2y$12$FtsJ.hfipfZcB2MLgHX5f.A7pHvq5QJGMIdK3r5USfVViJSi.l.Wi'),
(2, 'empleado', '$2y$12$mWGGHLWsyeW1yy9etD1t4e/zBzMzpcqZbM1i4YXL7bCF4QSmiUc0a'),
(3, 'empleado', '$2y$12$rS.qFOoaGwgRlZRUTw62y.qZgZiaXXKfEra3UpPOwvCXhTeoCxpWu');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_comentarista` (`id_comentarista`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `precios`
--
ALTER TABLE `precios`
  ADD PRIMARY KEY (`id_entrada`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_producto_2` (`id_producto`),
  ADD KEY `id_empleado_2` (`id_empleado`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `precios`
--
ALTER TABLE `precios`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `precios`
--
ALTER TABLE `precios`
  ADD CONSTRAINT `precios_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `precios_ibfk_2` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE SET NULL ON UPDATE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
