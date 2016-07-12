-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-07-2016 a las 01:25:45
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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `couch`
--

INSERT INTO `couch` (`id_couch`, `id_usuario`, `id_tipo`, `titulo`, `descripcion`, `ubicacion`, `direccion`, `capacidad`, `eliminado_couch`, `despublicado`) VALUES
(1, 8, 14, 'Bungalow Frente al mar', 'Luminoso alojamiento frente al mar para 2 personas.', 'Las Toninas, Bs. As., Argentina.', 'Calle 90 Nro 785', 2, 1, 0),
(2, 9, 16, 'DDDDDDDDDD', 'Disfruta este intercambio en nuestra carpa en la montana.', 'Sierra de La Ventana, BS. AS., Argentina.', 'Calle holanda entre la sierra y los lenguados', 3, 1, 0),
(4, 10, 15, 'Departamento en La Plata', 'Departamento mono ambiente muy comodo cerca del centro.', 'La Plata, Bs.As., Argentnia.', '7 e 48 y 49.', 2, 1, 0),
(5, 8, 14, 'Bungalow Frente al  mar  ', 'asd', 'asd', 'asd', 1, 1, 0),
(6, 8, 14, 'Bungalow Frente al                  mar ', 'asdasdas', 'asd', 'adadad', 1, 1, 0),
(7, 8, 14, 'asdadddddddddddddddd ', 'ddddddd', 'd', 'd', 1, 1, 0),
(8, 8, 14, 'as asd asd ', 'asdasd', 'asdasd', 'asdasd', 1, 1, 0),
(9, 8, 14, 'Bungalow Frente al mar ', 'sadasd', 'asd', 'asd', 1, 1, 0),
(10, 8, 15, 'Bungalow Frente al mar ', 'asd', 'asd', 'asd', 1, 1, 0),
(11, 8, 14, 'gggggggggggg ', 'ggg', 'ggg', 'gg', 1, 1, 0),
(12, 8, 14, 'adfadsf ', 'sdaf', 'adf', 'asdf', 1, 1, 0),
(13, 8, 14, 'hththt ', 'hrhr1rgh', 'fdf', 'f', 1, 1, 0),
(14, 8, 14, 'wqewqeqwe ', 'qweqwe', 'qweqw', 'qwewqe', 1, 1, 0),
(15, 8, 14, 'sdsadasd ', 'asdasd', 'asda', 'asd', 1, 1, 0),
(16, 8, 14, 'sdsadasd ', 'asdasd', 'asda', 'asd', 1, 1, 0),
(17, 8, 14, 'grgergreg ', 'wgweg', 'wge', 'ewfwe', 1, 1, 0),
(18, 8, 14, 'grgergreg ', 'wgweg', 'wge', 'ewfwe', 1, 1, 0),
(19, 8, 14, 'grgergreg ', 'wgweg', 'wge', 'ewfwe', 1, 1, 0),
(20, 8, 14, 'fdasadg ', 'asdgasdg', 'sadg', 'asdg', 1, 1, 0),
(21, 8, 14, 'gfgfgdg ', 'gd', 'sd', 'sdfa', 1, 1, 0),
(22, 8, 14, 'zzzz ', 'sadasd', 'zadsd', 'sadsa', 1, 1, 0),
(23, 8, 14, 'adsfasf ', 'asdf', 'asdf', 'dsaf', 1, 1, 0),
(24, 8, 14, 'asdfsadf sadasdasd', 'sadfasdf', 'asdf', 'asdf', 1, 1, 0),
(25, 9, 14, 'asdasd ', 'asd', 'asd', 'asd', 1, 1, 0),
(26, 9, 14, 'adfa ', 'afs', 'asad', 'asda', 1, 1, 0),
(27, 9, 14, 'gsgsdg ', 'fdsdg', 'sdf', 'dfa', 1, 1, 0),
(28, 9, 14, 'asdfasdfgg ', 'df', 'adsf', 'asf', 1, 1, 0),
(29, 9, 14, 'dfg ', 'fdfdg', 'asd', 'asd', 1, 1, 0),
(30, 9, 14, 'asfdasdf ', 'asfd', 'sadf', 'dsf', 1, 1, 0),
(31, 8, 14, 'asdf ', 'sdafsfa', 'dsafsadfsadfsadf', 'asdfasdf', 2, 1, 0),
(32, 10, 14, 'ewrgerge ', 'ergerg', 'ergergerg', 'ergerg', 23, 1, 1),
(33, 8, 14, 'grgegrgr ', 'rgrg', 'rgrg', 'rgrg', 32, 1, 0),
(34, 8, 14, 'ergerger ', 'gergerg', 'ergerg', 'ergerg', 3, 1, 0),
(35, 8, 14, 'erg ', 'erg', 'sag', 'asdg', 2, 1, 0),
(36, 10, 14, 'erreerer ', 'ererer', 'rerere', 'rere', 3, 1, 0),
(37, 10, 14, 'rethhth ', 'thth', 'thth', 'th', 3, 1, 0),
(38, 9, 14, 'bnvbnvb ', 'nvbn', 'bvnvbn', 'vbn', 4, 1, 0),
(39, 9, 14, 'sdsss ', 'ssdx', 'xcxc', 'xcxc', 3, 1, 0),
(40, 8, 14, 'rgrgr ', 'rgerg', 'erger', 'ergerg', 3, 1, 0),
(41, 8, 14, 'errrrrrertert ', 'ertert', 'ert', 'ertert', 3, 1, 0),
(42, 8, 14, 'cxvxzcvxz ', 'xzcvxzcv', 'xcv', 'xzv', 3, 1, 0),
(43, 8, 14, 'dfsg ', 'sdfg', 'dfsg', 'dfsg', 2, 1, 0),
(44, 8, 14, 'sdfg ', 'dsfg', 'sfdg', 'sdfg', 3, 1, 0),
(45, 8, 14, 'ergerg ', 'erger', 'ergerg', 'ergerg', 3, 1, 0),
(46, 8, 14, 'qwwqwq ', 'wqeqweqw', 'eqwe', 'qweqwe', 2, 1, 0),
(47, 8, 14, 'xczvzxcv ', 'xzcvxzcv', 'xczvxzcv', 'zxcvxzc', 2, 1, 0),
(48, 10, 14, 'rerererere ', 'reerer', 'rere', 'rere', 3, 1, 0),
(49, 8, 14, 'asdf ', 'adsfsfsdf', 'sdsdf', 'afaf', 2, 1, 0),
(50, 9, 14, 'sfdgdf ', 'gfdsgfdg', 'sdfgsdfg', 'sdfg', 3, 0, 0),
(51, 8, 14, 'wefwefwef ', 'wefwe', 'fwefew', 'wefwef', 2, 0, 1),
(52, 8, 14, 'adgsdgasd ', 'gasdg', 'asdg', 'adg', 2, 1, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `foto`
--

INSERT INTO `foto` (`id_foto`, `id_couch`, `ruta`) VALUES
(1, 15, 'fotos_hospedajes/8/15/46783-malphite_vs_chogath_wallpaper.jpg'),
(2, 16, 'fotos_hospedajes/8/16/46783-malphite_vs_chogath_wallpaper.jpg'),
(3, 17, 'fotos_hospedajes/8/17/46783-malphite_vs_chogath_wallpaper.jpg'),
(4, 18, 'fotos_hospedajes/8/18/46783-malphite_vs_chogath_wallpaper.jpg'),
(5, 19, 'fotos_hospedajes/8/19/46783-malphite_vs_chogath_wallpaper.jpg'),
(20, 20, 'fotos_hospedajes/8/20/45826-sk_telecom_t1_logo_wallpaper.jpg'),
(21, 20, 'fotos_hospedajes/8/20/46783-malphite_vs_chogath_wallpaper.jpg'),
(22, 20, 'fotos_hospedajes/8/20/aurelion-sol-wallpaper.jpg'),
(23, 23, 'fotos_hospedajes/8/23/45826-sk_telecom_t1_logo_wallpaper.jpg'),
(24, 23, 'fotos_hospedajes/8/23/46783-malphite_vs_chogath_wallpaper.jpg'),
(41, 26, 'fotos_hospedajes/9/26/45826-sk_telecom_t1_logo_wallpaper.jpg'),
(42, 26, 'fotos_hospedajes/9/26/46783-malphite_vs_chogath_wallpaper.jpg'),
(43, 27, 'fotos_hospedajes/9/27/45826-sk_telecom_t1_logo_wallpaper.jpg'),
(44, 27, 'fotos_hospedajes/9/27/46783-malphite_vs_chogath_wallpaper.jpg'),
(45, 27, 'fotos_hospedajes/9/27/aurelion-sol-wallpaper.jpg'),
(46, 29, 'fotos_hospedajes/9/29/45826-sk_telecom_t1_logo_wallpaper.jpg'),
(68, 2, 'fotos_hospedajes/9/2/46783-malphite_vs_chogath_wallpaper.jpg'),
(71, 2, 'fotos_hospedajes/9/2/aurelion-sol-wallpaper.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`id_pregunta`, `id_couch`, `id_usuariopregunta`, `id_usuariorespuesta`, `contenidopregunta`, `contenidorespuesta`) VALUES
(1, 2, 10, NULL, 'ASdasdasd Â¿asdasd?', NULL),
(2, 2, 10, NULL, 'aasfasf', NULL),
(3, 4, 9, NULL, 'asdasdasd', NULL),
(4, 2, 10, NULL, 'dfghdfgh', NULL),
(5, 52, 9, NULL, 'dfgsdf', 'sdfgsdfg');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `premium`
--

INSERT INTO `premium` (`id_premium`, `id_usuario`, `tarjeta`, `f_incripcion`, `f_desuscripcion`) VALUES
(1, 10, '2131231231232131', '2016-06-04 00:00:00.000000', NULL),
(2, 9, '1234123412341234', '2016-06-21 00:00:00.000000', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `puntoscouch`
--

INSERT INTO `puntoscouch` (`id_puntoscouch`, `id_usuario`, `id_couch`, `comentario`, `puntaje`) VALUES
(3, 8, 2, 'asdasd', 3),
(4, 10, 2, 'asdfadfadsf', 1),
(5, 8, 2, 'fgfhhf', 3),
(6, 8, 2, 'sssssssssssssssss', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntos_usuario`
--

DROP TABLE IF EXISTS `puntos_usuario`;
CREATE TABLE IF NOT EXISTS `puntos_usuario` (
  `id_puntosusuario` int(100) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(100) NOT NULL,
  `id_reserva` int(100) NOT NULL,
  `comentario` text,
  `puntuacion` int(3) NOT NULL,
  PRIMARY KEY (`id_puntosusuario`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `puntos_usuario`
--

INSERT INTO `puntos_usuario` (`id_puntosusuario`, `id_usuario`, `id_reserva`, `comentario`, `puntuacion`) VALUES
(4, 8, 20, NULL, 1),
(5, 8, 21, NULL, 5),
(6, 8, 22, NULL, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

DROP TABLE IF EXISTS `reserva`;
CREATE TABLE IF NOT EXISTS `reserva` (
  `id_reserva` int(100) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(100) NOT NULL,
  `id_couch` int(100) NOT NULL,
  `finicio` date NOT NULL,
  `ffin` date NOT NULL,
  `estado` varchar(20) NOT NULL,
  `id_puntajeCouch` int(100) DEFAULT NULL,
  `id_puntajeUsuario` int(100) DEFAULT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_couch` (`id_couch`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `id_usuario`, `id_couch`, `finicio`, `ffin`, `estado`, `id_puntajeCouch`, `id_puntajeUsuario`) VALUES
(11, 9, 24, '2016-06-22', '2016-07-02', 'Rechazada', NULL, 8),
(12, 10, 24, '2016-07-14', '2016-07-15', 'Rechazada', NULL, 8),
(13, 10, 24, '2016-07-24', '2016-07-25', 'Rechazada', NULL, 8),
(17, 8, 2, '2016-06-24', '2016-06-25', 'Finalizada', 5, 8),
(18, 8, 2, '2016-06-26', '2016-06-27', 'Finalizada', 6, 8),
(19, 8, 25, '2016-06-24', '2016-06-25', 'Finalizada', NULL, 8),
(22, 8, 25, '2016-06-29', '2016-06-30', 'Finalizada', NULL, 6),
(23, 8, 50, '2016-07-22', '2016-07-31', 'Aceptada', NULL, NULL),
(24, 9, 51, '2016-07-13', '2016-07-24', 'Aceptada', NULL, NULL),
(25, 8, 50, '2016-08-11', '2016-08-19', 'Finalizada', NULL, NULL);

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
('123456789'),
(''),
('987654321');

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `nombre_tipo`, `eliminado`) VALUES
(14, 'Casa', 0),
(15, 'Departamento', 0),
(16, 'Camping', 0),
(17, 'Posada', 0),
(18, 'asdasasd', 1),
(19, 'asdasdadasdfsdfsdf', 1),
(20, 'ffffff', 1),
(21, 'asdasdasd', 1),
(22, 'fgfagag', 1),
(23, 'aaadd', 1),
(24, 'affafada', 1),
(25, 'dfdsfsdafasd', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(100) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `apellido` varchar(75) NOT NULL,
  `fnac` date NOT NULL,
  `telefono` varchar(25) NOT NULL,
  `clave` varchar(15) NOT NULL,
  `eliminado` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_usuario`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `email`, `nombre`, `apellido`, `fnac`, `telefono`, `clave`, `eliminado`) VALUES
(8, 'lucas@gmail.com', 'LUCAS', 'Costaddddd', '1993-05-19', '456789', 'asd', 0),
(9, 'leo@gmail.com', 'Leo', 'Armendariz', '1992-05-20', '15465365', 'asd', 0),
(10, 'euge@gmail.com', 'Euge asdfasf', 'Parini<font color=''red''> (ELIMINADO)</font>', '1994-12-25', '4345461', 'asd', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
