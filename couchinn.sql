-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-05-2016 a las 23:06:44
-- Versión del servidor: 5.6.30-0ubuntu0.15.10.1
-- Versión de PHP: 5.6.20-1+deb.sury.org~wily+1

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
-- Estructura de tabla para la tabla `couch`
--

CREATE TABLE IF NOT EXISTS `couch` (
  `id_couch` int(100) NOT NULL,
  `id_tipo` int(100) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `capacidad` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
  `id_foto` int(100) NOT NULL,
  `id_couch` int(100) NOT NULL,
  `ruta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `clave` varchar(20) NOT NULL,
  `nrotarjeta` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

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
  ADD UNIQUE KEY `nrotarjeta` (`nrotarjeta`),
  ADD KEY `email_2` (`email`),
  ADD KEY `nrotarjeta_2` (`nrotarjeta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `couch`
--
ALTER TABLE `couch`
  MODIFY `id_couch` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id_pregunta` int(100) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id_tipo` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(100) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
