-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2016 a las 03:30:06
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
  `id_admin` int(2) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellido` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_admin`, `nombre`, `apellido`) VALUES
(1, 'Diego', 'Reinoso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(2) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellido` varchar(15) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `nombre`, `apellido`, `estado`) VALUES
(2, 'Julio', 'Reinoso', 'efectivo'),
(3, 'Elizabeth', 'Perez', 'efectivo'),
(4, 'Lucia', 'Reinoso', 'efectivo'),
(5, 'Miriam', 'Reinoso', 'efectivo'),
(7, 'Pedro', 'Picapiedra', 'efectivo'),
(8, 'Juan', 'Peron', 'efectivo'),
(9, 'Tony', 'Stark', 'efectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios`
--

CREATE TABLE `precios` (
  `id_producto` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_Entrada` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `semana` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(3) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `descripcion`) VALUES
(1, 'fideos'),
(2, 'galletitas'),
(3, 'desodorante'),
(4, 'fernet'),
(6, 'caramelos'),
(7, 'pan rallado ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(2) NOT NULL,
  `rol` varchar(15) NOT NULL,
  `contrasenia` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `rol`, `contrasenia`) VALUES
(1, 'administrador', '$2y$12$2XF2zWvzfh3tB/MF9y0RPuS3CiwvID6F5ZKc0PpQk11d2hPzxApmu'),
(2, 'empleado', '$2y$12$XXmCeXW5XBraTeWVoTElg.DkeuRtb3kH.Agu1s5Ao/Bp8N5/IDYp2'),
(3, 'empleado', '$2y$12$FyxhV2g08m6tLPumr1Bmte0FORSGOISQfMdIfFwTBCMwBQIhev9iu'),
(4, 'empleado', '$2y$12$ZEJuhfmOaxroLnyn.SvZouo2MXSjTeJwsYljq6xnHOLPrz01LNP8G'),
(5, 'empleado', '$2y$12$g5se.0HTq2wG8.VInalzA.sf6/Gx2FpLEVmomqxssTlwNzrrr5MCy'),
(7, 'empleado', '$2y$12$B5BkClAjSFkE6YLIdFevVuzJ4czuMbVtn46ldQ5XKXK5sni1LJMVq'),
(8, 'empleado', '$2y$12$0NSSdoTFKVlPBMjn8swsRe5fDUdiq/Z45HnKYmXeRFxlkOQ.4tJNu'),
(9, 'empleado', '$2y$12$IDWu1dgzcUOFsleKDCCRb.7sZNEw4jupXaRUfZ1qSGtFojrL0UeyW');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `precios`
--
ALTER TABLE `precios`
  ADD PRIMARY KEY (`id_producto`,`id_empleado`),
  ADD KEY `id_empleado` (`id_empleado`);

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
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `precios`
--
ALTER TABLE `precios`
  ADD CONSTRAINT `precios_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`),
  ADD CONSTRAINT `precios_ibfk_3` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
