-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2015 a las 19:00:25
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

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
(13390202, 'RODOLFO RAFAEL DZUL CETINA', 'INGENIERÍA EN SISTEMAS COMPUTACIONALES', 5, 2),
(13390205, 'FELIX GUADALUPE AUGUST CRUZ', 'INGENIERÍA EN SISTEMAS COMPUTACIONALES', 5, 3),
(13390211, 'ÁNGEL ARTURO SALDIVAR BALAM', 'INGENIERÍA EN SISTEMAS COMPUTACIONALES', 5, 4),
(13390216, 'ÁNGEL RICARDO CÁMARA UITZ', 'INGENIERÍA EN SISTEMAS COMPUTACIONALES', 5, 5),
(13390606, 'WILLIAM JESÚS CAHUICH MARTINEZ', 'INGENIERÍA EN SISTEMAS COMPUTACIONALES', 5, 1),
(13391001, 'JOSELIN MAYANIN SANCHEZ JUAREZ', 'BIOLOGÍA', 3, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE IF NOT EXISTS `empresas` (
`id` int(10) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

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
  `id_usuario` int(11) NOT NULL,
  `archivo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `rol_usuario` tinyint(1) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`id_usuario`, `archivo`, `descripcion`, `rol_usuario`, `fecha`) VALUES
(1, 'img.png', 'Descripcion 1', 1, '2015-11-05'),
(4, 'Carta_a_Banorte.docx', 'Mi primer Reporte', 1, '2015-11-07'),
(4, 'Carlos_Adán.docx', 'Mi segundo Reporte', 1, '2015-11-07'),
(4, 'Libro.pdf', 'Reporte 3', 1, '2015-11-07'),
(4, 'Banorte-Solicitud.pdf', 'Solicitud 2', 1, '2015-11-10');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `matricula`, `nombre`, `password`, `email`, `rol`, `status`, `fecha_alta`) VALUES
(1, 13390202, 'RODOLFO RAFAEL DZUL CETINA', 3660, 'rafael.cetina@hotmail.com', 0, 1, '2015-11-04'),
(2, 13390205, 'FELIX GUADALUPE AUGUST CRUZ', 1234, 'august@gmail.com', 1, 1, '2015-11-07'),
(3, 13390206, 'FELIX GUADALUPE AUGUST CRUZ', 1234, 'august@gmail.com', 1, 1, '2015-11-07'),
(4, 13391001, 'JOSELIN MAYANIN SANCHEZ JUAREZ', 1234, 'joselin@gmail.com', 1, 1, '2015-11-07'),
(5, NULL, 'ROBERTO WILBERT CASTILLO TAMAYO', 1234, 'rwilbermx@hotmail.com', 2, 1, '2015-11-07');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
 ADD PRIMARY KEY (`matricula`), ADD KEY `id_empresa` (`id_empresa`);

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
 ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`), ADD KEY `matricula` (`matricula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

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
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
