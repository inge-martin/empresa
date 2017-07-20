-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-07-2017 a las 19:45:04
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `empresa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `nombre_empleado` varchar(255) NOT NULL,
  `paterno_empleado` varchar(255) NOT NULL,
  `materno_empleado` varchar(255) NOT NULL,
  `nacimiento_empleado` date NOT NULL,
  `telefono_empleado` bigint(20) NOT NULL,
  `celular_empleado` bigint(20) NOT NULL,
  `email_empleado` varchar(50) NOT NULL,
  `sexo_empleado` varchar(10) NOT NULL,
  `fotografia_empleado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombre_empleado`, `paterno_empleado`, `materno_empleado`, `nacimiento_empleado`, `telefono_empleado`, `celular_empleado`, `email_empleado`, `sexo_empleado`, `fotografia_empleado`) VALUES
(6, 'judith', 'salchicha', 'hamburguesa', '2016-06-25', 2147483647, 55151516221, 'hotdog@papas.com', 'Femenino', 'aec5406a01f965b9f57045472ade0597.png'),
(7, 'ATLANTIS', 'ORTEGA', 'ALVARADO', '1988-02-09', 5557316555, 5561412584, 'atlantis@mail.com', 'Femenino', 'fdc5c582a1e9ceec931526ecbad0d13f.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE `sesiones` (
  `id_sesiones` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `contrasena` varchar(40) NOT NULL,
  `estado` int(1) NOT NULL,
  `id_empleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sesiones`
--

INSERT INTO `sesiones` (`id_sesiones`, `usuario`, `contrasena`, `estado`, `id_empleado`) VALUES
(1, 'martin', '54669547a225ff20cba8b75a4adca540eef25858', 1, 1),
(2, 'karen', '55107e193e648a27778fa98736b2e8e24b3cd6e1', 1, 2),
(3, 'kevin', 'ffb4761cba839470133bee36aeb139f58d7dbaa9', 1, 3),
(4, 'delia', 'e3bca34e045ad08834122390572ee9301f058856', 1, 4),
(5, 'jared', '420d97235124da5bf24c51a35edb1119f653ce09', 1, 5),
(6, 'judith', 'fcd1eee40b824e08506b5ff82781f775154ad51d', 1, 6),
(7, 'atlantis', '4432738a5981dde89b94b751a0179c2fdae7b7cf', 1, 7);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD PRIMARY KEY (`id_sesiones`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  MODIFY `id_sesiones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
