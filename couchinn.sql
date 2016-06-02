-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2016 a las 19:01:10
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
  `email` varchar(30) NOT NULL,
  `clave` varchar(15) NOT NULL,
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `clave`) VALUES
(1, 'admin@admin.com', 'admin');

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
  `eliminado_couch` tinyint(1) NOT NULL DEFAULT '0',
  `despublicado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_couch`),
  KEY `id_tipo` (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `couch`
--

INSERT INTO `couch` (`id_couch`, `id_usuario`, `id_tipo`, `titulo`, `descripcion`, `ubicacion`, `direccion`, `capacidad`, `eliminado_couch`, `despublicado`) VALUES
(1, 8, 14, 'Bungalow Frente al mar', 'Luminoso alojamiento frente al mar para 2 personas.', 'Las Toninas, Bs. As., Argentina.', 'Calle 90 Nro 785', 2, 0, 0),
(2, 9, 16, 'Carpa en la montana', 'Disfruta este intercambio en nuestra carpa en la montana.', 'Sierra de La Ventana, BS. AS., Argentina.', 'Calle holanda entre la sierra y los lenguados', 3, 0, 0),
(3, 10, 17, 'Posada en La Plata', 'Linda posada con diferente tipo de habitaciones a su disposicion.', 'La Plata, Bs.As., Argentina.', '60 e 1 y 2.', 5, 0, 0),
(4, 10, 15, 'Departamento en La Plata', 'Departamento mono ambiente muy comodo cerca del centro.', 'La Plata, Bs.As., Argentnia.', '7 e 48 y 49.', 2, 0, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `foto`
--

INSERT INTO `foto` (`id_foto`, `id_couch`, `ruta`) VALUES
(1, 1, 'foto1.jpg'),
(3, 2, 'foto2.jpg'),
(4, 3, 'foto3.jpg'),
(5, 3, 'foto4.jpg'),
(6, 4, 'foto5.jpg');

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
  `tarjeta` varchar(16) NOT NULL,
  `f_incripcion` datetime(6) DEFAULT NULL,
  `f_desuscripcion` datetime(6) DEFAULT NULL,
  PRIMARY KEY (`id_premium`),
  UNIQUE KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

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
-- Estructura de tabla para la tabla `tipo`
--

DROP TABLE IF EXISTS `tipo`;
CREATE TABLE IF NOT EXISTS `tipo` (
  `id_tipo` int(100) NOT NULL AUTO_INCREMENT,
  `nombre_tipo` varchar(30) NOT NULL,
  `eliminado` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `nombre_tipo`, `eliminado`) VALUES
(14, 'Casa', 0),
(15, 'Departamento', 0),
(16, 'Camping', 0),
(17, 'Posada', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(100) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `apellido` varchar(35) NOT NULL,
  `fnac` date NOT NULL,
  `telefono` varchar(25) NOT NULL,
  `clave` varchar(15) NOT NULL,
  PRIMARY KEY (`id_usuario`) USING BTREE,
  UNIQUE KEY `email` (`email`),
  KEY `email_2` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `email`, `nombre`, `apellido`, `fnac`, `telefono`, `clave`) VALUES
(8, 'lucas@gmail.com', 'Lucas', 'Costa', '1993-05-19', '456789', 'asd'),
(9, 'leo@gmail.com', 'Leo', 'Armendariz', '1992-05-20', '15465365', 'asd'),
(10, 'euge@gmail.com', 'Euge', 'Parini', '1994-12-25', '4345461', 'asd');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
