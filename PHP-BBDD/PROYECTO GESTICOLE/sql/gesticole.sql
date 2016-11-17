-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-11-2016 a las 07:59:56
-- Versión del servidor: 5.6.31-0ubuntu0.15.10.1
-- Versión de PHP: 5.6.11-1ubuntu3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gesticole`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE IF NOT EXISTS `acceso` (
  `usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clave` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`usuario`, `clave`, `tipo`) VALUES
('admin', '123456', 'administra'),
('root', 'toor', 'profesor'),
('tux', 'linux', 'profesor'),
('usuario', 'usuario', 'alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
  `dni` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `colegio` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `edad` double NOT NULL,
  `curso` double NOT NULL,
  `actividad` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`dni`, `nombre`, `colegio`, `edad`, `curso`, `actividad`) VALUES
('65767', 'fkpafi eo', 'j', 36, 2, 'judo'),
('12345678Z', 'Mario Casas Yuste', 'Colegio de Primaria', 8, 3, 'judo'),
('98745612K', 'Rocio Caballero Galante', 'Colegio de Primaria', 9, 2, 'hockey');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `castillo`
--

CREATE TABLE IF NOT EXISTS `castillo` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) COLLATE utf8_bin NOT NULL,
  `imagen` varchar(100) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `castillo`
--

INSERT INTO `castillo` (`id`, `titulo`, `imagen`, `descripcion`) VALUES
(1, 'Castillo Acuatico', 'castillo1.jpg', 'Espectacular castillo acuatico de gran capacidad imprescindible en una fiesta de verano.'),
(2, 'Castillo Bob Esponja', 'castillo2.jpg', 'Castillo de tamaño pequeño ideal para espacios reducidos.'),
(3, 'Castillo Mediano Rosa', 'castillo3.jpg', 'Castillo de tamaño medio con dos pasarelas de entrada y salida.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE IF NOT EXISTS `profesor` (
  `dni` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `actividad` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`dni`, `nombre`, `direccion`, `telefono`, `actividad`) VALUES
('12345678A', 'Jose Antonio Flores Campos', 'C/Rosas Rojas, s/n, 29000, Malaga', '600123456', 'futbol'),
('23456789B', 'Almudena Vera Fernandez', 'C/Rio Seco, s/n, 29000, Malaga', '600234567', 'baile'),
('34567890C', 'Alejandro Risas Misas', 'Avda. del Manantial, s/n, 29000, Malaga', '600345678', 'hockey');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `castillo`
--
ALTER TABLE `castillo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `castillo`
--
ALTER TABLE `castillo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
