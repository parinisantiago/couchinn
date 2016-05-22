-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2016 a las 19:40:24
-- Versión del servidor: 5.7.9
-- Versión de PHP: 5.6.16

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

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(100) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `couch`
--

DROP TABLE IF EXISTS `couch`;
CREATE TABLE IF NOT EXISTS `couch` (
  `id_couch` int(100) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(100) NOT NULL,
  `id_tipo` int(100) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `capacidad` int(100) NOT NULL,
  PRIMARY KEY (`id_couch`),
  KEY `id_tipo` (`id_tipo`)
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

DROP TABLE IF EXISTS `foto`;
CREATE TABLE IF NOT EXISTS `foto` (
  `id_foto` int(100) NOT NULL AUTO_INCREMENT,
  `id_couch` int(100) NOT NULL,
  `ruta` varchar(100) NOT NULL,
  PRIMARY KEY (`id_foto`),
  UNIQUE KEY `ruta` (`ruta`),
  KEY `id_couch` (`id_couch`)
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

DROP TABLE IF EXISTS `pregunta`;
CREATE TABLE IF NOT EXISTS `pregunta` (
  `id_pregunta` int(100) NOT NULL AUTO_INCREMENT,
  `id_couch` int(100) NOT NULL,
  `id_usuariopregunta` int(100) NOT NULL,
  `id_usuariorespuesta` int(100) DEFAULT NULL,
  `contenidopregunta` text NOT NULL,
  `contenidorespuesta` text,
  PRIMARY KEY (`id_pregunta`),
  KEY `id_couch` (`id_couch`),
  KEY `id_usuariopregunta` (`id_usuariopregunta`),
  KEY `id_usuariorespuesta` (`id_usuariorespuesta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `premium`
--

DROP TABLE IF EXISTS `premium`;
CREATE TABLE IF NOT EXISTS `premium` (
  `id_premium` int(100) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(100) DEFAULT NULL,
  `tarjeta` varchar(20) DEFAULT NULL,
  `f_incripcion` datetime(6) DEFAULT NULL,
  `f_desuscripcion` datetime(6) DEFAULT NULL,
  PRIMARY KEY (`id_premium`),
  UNIQUE KEY `tarjeta` (`tarjeta`),
  UNIQUE KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

DROP TABLE IF EXISTS `publicacion`;
CREATE TABLE IF NOT EXISTS `publicacion` (
  `id_publicacion` int(100) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(100) NOT NULL,
  `id_couch` int(100) NOT NULL,
  `finicio` datetime(6) NOT NULL,
  `ffin` datetime(6) NOT NULL,
  PRIMARY KEY (`id_publicacion`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_couch` (`id_couch`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntoscouch`
--

DROP TABLE IF EXISTS `puntoscouch`;
CREATE TABLE IF NOT EXISTS `puntoscouch` (
  `id_puntoscouch` int(100) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(100) NOT NULL,
  `id_couch` int(100) NOT NULL,
  `comentario` text,
  `puntaje` int(3) NOT NULL,
  PRIMARY KEY (`id_puntoscouch`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_couch` (`id_couch`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntos_usuario`
--

DROP TABLE IF EXISTS `puntos_usuario`;
CREATE TABLE IF NOT EXISTS `puntos_usuario` (
  `id_puntosusuario` int(100) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(100) NOT NULL,
  `comentario` text,
  `puntuacion` int(3) NOT NULL,
  PRIMARY KEY (`id_puntosusuario`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

DROP TABLE IF EXISTS `reserva`;
CREATE TABLE IF NOT EXISTS `reserva` (
  `id_reserva` int(100) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(100) NOT NULL,
  `id_couch` int(100) NOT NULL,
  `finicio` datetime(6) NOT NULL,
  `ffin` datetime(6) NOT NULL,
  `estado` varchar(20) NOT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_couch` (`id_couch`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

DROP TABLE IF EXISTS `tarjetas`;
CREATE TABLE IF NOT EXISTS `tarjetas` (
  `nro_tarjeta` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarjetas`
--

INSERT INTO `tarjetas` (`nro_tarjeta`) VALUES
('123456789');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

DROP TABLE IF EXISTS `tipo`;
CREATE TABLE IF NOT EXISTS `tipo` (
  `id_tipo` int(100) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `nombre`) VALUES
(1, 'asdasd'),
(2, 'departamento'),
(3, 'bungalow'),
(4, 'casa'),
(5, 'chalet');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(100) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `fnac` date NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `clave` varchar(20) NOT NULL,
  PRIMARY KEY (`id_usuario`) USING BTREE,
  UNIQUE KEY `email` (`email`),
  KEY `email_2` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `email`, `nombre`, `apellido`, `fnac`, `telefono`, `clave`) VALUES
(1, 'la@la.com', 'Santiago', 'Parini', '2016-05-31', '2214691152', 'la'),
(3, 'lau@gmail.com', 'María', 'Laura', '1900-01-01', '+542214691152', 'asdasd'),
(4, 'tomas@gmail.com', 'Tomas', 'Tomas', '1900-01-01', '+54-221-45-67', 'asdasd'),
(5, 'aguirre@gmail.com', 'Marcos', 'Aguirre', '2016-05-31', '26695914', '123456');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
