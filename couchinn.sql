-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-05-2016 a las 09:27:37
-- Versión del servidor: 5.6.30-0ubuntu0.15.10.1
-- Versión de PHP: 5.6.21-1+donate.sury.org~wily+4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `couchinn`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `couch`
--

CREATE TABLE IF NOT EXISTS `couch` (
  `id_couch` int(100) NOT NULL,
  `id_usuario` int(100) NOT NULL,
  `id_tipo` int(100) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `capacidad` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `couch`
--

INSERT INTO `couch` (`id_couch`, `id_usuario`, `id_tipo`, `titulo`, `descripcion`, `ubicacion`, `direccion`, `capacidad`) VALUES
(1, 0, 1, 'asd', 'asdasd', 'asdasd', 'asdad', 123123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
  `id_foto` int(100) NOT NULL,
  `id_couch` int(100) NOT NULL,
  `ruta` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `foto`
--

INSERT INTO `foto` (`id_foto`, `id_couch`, `ruta`) VALUES
(1, 3, 'algo'),
(2, 2, 'asd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE IF NOT EXISTS `pregunta` (
  `id_pregunta` int(100) NOT NULL,
  `id_couch` int(100) NOT NULL,
  `id_usuariopregunta` int(100) NOT NULL,
  `id_usuariorespuesta` int(100) DEFAULT NULL,
  `contenidopregunta` text NOT NULL,
  `contenidorespuesta` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `premium`
--

CREATE TABLE IF NOT EXISTS `premium` (
  `id_premium` int(100) NOT NULL,
  `id_usuario` int(100) NOT NULL,
  `tarjeta` varchar(20) NOT NULL,
  `f_incripcion` datetime(6) NOT NULL,
  `f_desuscripcion` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE IF NOT EXISTS `publicacion` (
  `id_publicacion` int(100) NOT NULL,
  `id_usuario` int(100) NOT NULL,
  `id_couch` int(100) NOT NULL,
  `finicio` datetime(6) NOT NULL,
  `ffin` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntoscouch`
--

CREATE TABLE IF NOT EXISTS `puntoscouch` (
  `id_puntoscouch` int(100) NOT NULL,
  `id_usuario` int(100) NOT NULL,
  `id_couch` int(100) NOT NULL,
  `comentario` text,
  `puntaje` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntos_usuario`
--

CREATE TABLE IF NOT EXISTS `puntos_usuario` (
  `id_puntosusuario` int(100) NOT NULL,
  `id_usuario` int(100) NOT NULL,
  `comentario` text,
  `puntuacion` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `id_reserva` int(100) NOT NULL,
  `id_usuario` int(100) NOT NULL,
  `id_couch` int(100) NOT NULL,
  `finicio` datetime(6) NOT NULL,
  `ffin` datetime(6) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `id_tipo` int(100) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `nombre`) VALUES
(1, 'asdasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `fnac` date NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `clave` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `email`, `nombre`, `apellido`, `fnac`, `telefono`, `clave`) VALUES
(1, 'parinisantiago@gmail.com', 'Santiago', 'Parini', '2016-05-31', '2214691152', 'pello'),
(3, 'lau@gmail.com', 'MarÃ­a', 'Laura', '1900-01-01', '+542214691152', 'asdasd'),
(4, 'tomas@gmail.com', 'Tomas', 'Tomas', '1900-01-01', '+54-221-45-67', 'asdasd');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `couch`
--
ALTER TABLE `couch`
  ADD PRIMARY KEY (`id_couch`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indices de la tabla `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`),
  ADD UNIQUE KEY `ruta` (`ruta`),
  ADD KEY `id_couch` (`id_couch`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id_pregunta`),
  ADD KEY `id_couch` (`id_couch`),
  ADD KEY `id_usuariopregunta` (`id_usuariopregunta`),
  ADD KEY `id_usuariorespuesta` (`id_usuariorespuesta`);

--
-- Indices de la tabla `premium`
--
ALTER TABLE `premium`
  ADD PRIMARY KEY (`id_premium`),
  ADD UNIQUE KEY `tarjeta` (`tarjeta`),
  ADD UNIQUE KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`id_publicacion`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_couch` (`id_couch`);

--
-- Indices de la tabla `puntoscouch`
--
ALTER TABLE `puntoscouch`
  ADD PRIMARY KEY (`id_puntoscouch`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_couch` (`id_couch`);

--
-- Indices de la tabla `puntos_usuario`
--
ALTER TABLE `puntos_usuario`
  ADD PRIMARY KEY (`id_puntosusuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_couch` (`id_couch`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `email_2` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `couch`
--
ALTER TABLE `couch`
  MODIFY `id_couch` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id_pregunta` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `premium`
--
ALTER TABLE `premium`
  MODIFY `id_premium` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `id_publicacion` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `puntoscouch`
--
ALTER TABLE `puntoscouch`
  MODIFY `id_puntoscouch` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `puntos_usuario`
--
ALTER TABLE `puntos_usuario`
  MODIFY `id_puntosusuario` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id_tipo` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
