-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2015 a las 21:22:21
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `serviciosocial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE IF NOT EXISTS `alumnos` (
  `matricula` int(10) unsigned NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `carrera` varchar(255) NOT NULL,
  `semestre` tinyint(2) unsigned NOT NULL,
  `id_empresa` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`matricula`, `nombre`, `carrera`, `semestre`, `id_empresa`) VALUES
(13390101, 'RICARDO CRUZ LEYVA', 'INGENIERÍA EN SISTEMAS COMPUTACIONALES', 5, 1),
(13390200, 'FELIPE LOPEZ GARCIA', 'ARQUITECTURA', 7, 1),
(13390202, 'RODOLFO RAFAEL DZUL CETINA', 'INGENIERÍA EN SISTEMAS COMPUTACIONALES', 5, 2),
(13390211, 'ÁNGEL ARTURO SALDIVAR BALAM', 'INGENIERÍA EN SISTEMAS COMPUTACIONALES', 5, 4),
(13390303, 'JOSÉ ROBERTO RAMÍREZ MARRUFO', 'INGENIERÍA CIVIL', 5, 3),
(13390606, 'WILLIAM JESÚS CAHUICH MARTINEZ', 'INGENIERÍA EN SISTEMAS COMPUTACIONALES', 5, 1),
(13391001, 'JOSELIN MAYANIN SANCHEZ JUAREZ', 'BIOLOGÍA', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE IF NOT EXISTS `carreras` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `nombre`) VALUES
(1, 'INGENIERÍA EN SISTEMAS COMPUTACIONALES'),
(2, 'INGENIERÍA EN TÉCNOLOGIAS DE LA INFORMACIÓN Y COMUNICACIÓN'),
(3, 'INGENIERÍA EN ADMINISTRACIÓN EMPRESARIAL'),
(4, 'LICENCIATURA EN BIOLOGÍA'),
(5, 'CONTADOR PÚBLICO'),
(6, 'INGENIERÍA ELÉCTRICA'),
(7, 'INGENIERÍA CIVIL'),
(8, 'ARQUITECTURA'),
(9, 'INGENIERÍA EN GESTIÓN EMPRESARIAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE IF NOT EXISTS `empresas` (
  `id` int(10) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `nombre`) VALUES
(1, 'IINDEQ'),
(2, 'CAPA'),
(3, 'CABLEMAS'),
(4, 'BIMBO'),
(5, 'SEMARNAT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encargados`
--

CREATE TABLE IF NOT EXISTS `encargados` (
  `id` int(10) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_empresa` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `encargados`
--

INSERT INTO `encargados` (`id`, `nombre`, `email`, `id_empresa`) VALUES
(1, 'ROBERTO WILBERT CASTILLO TAMAYO', 'rwilbermx@hotmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE IF NOT EXISTS `reportes` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `archivo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `rol_usuario` tinyint(1) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`id`, `id_usuario`, `archivo`, `descripcion`, `rol_usuario`, `fecha`) VALUES
(1, 4, 'cuna1.jpg', 'Reporte de Prueba', 1, '2015-11-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `matricula` int(10) unsigned DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `password` int(4) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rol` tinyint(1) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `fecha_alta` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `matricula`, `nombre`, `password`, `email`, `rol`, `status`, `fecha_alta`) VALUES
(1, 13390202, 'RODOLFO RAFAEL DZUL CETINA', 3660, 'rafael.cetina@hotmail.com', 0, 1, '2015-11-04'),
(2, 13390205, 'FELIX GUADALUPE AUGUST CRUZ', 1234, 'august@gmail.com', 1, 1, '2015-11-07'),
(4, 13391001, 'JOSELIN MAYANIN SANCHEZ JUAREZ', 1234, 'joselin@gmail.com', 1, 1, '2015-11-07'),
(5, NULL, 'ROBERTO WILBERT CASTILLO TAMAYO', 1234, 'rwilbermx@hotmail.com', 2, 1, '2015-11-07'),
(6, 13390303, 'JOSÉ ROBERTO RAMÍREZ MARRUFO', 2979, 'joseroberto@gmail.com', 1, 1, '2015-11-11'),
(7, 13390200, 'FELIPE LOPEZ GARCIA', 3663, 'FELIPE@GMAIL.COM', 1, 1, '2015-11-20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`matricula`), ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `encargados`
--
ALTER TABLE `encargados`
  ADD PRIMARY KEY (`id`), ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`id`), ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`), ADD KEY `matricula` (`matricula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `encargados`
--
ALTER TABLE `encargados`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
