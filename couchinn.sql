-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-06-2016 a las 14:50:26
-- Versión del servidor: 5.7.12-0ubuntu1
-- Versión de PHP: 5.6.22-1+donate.sury.org~wily+1

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

CREATE TABLE `admin` (
  `id_admin` int(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `clave` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `clave`) VALUES
(1, 'admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `couch`
--

CREATE TABLE `couch` (
  `id_couch` int(100) NOT NULL,
  `id_usuario` int(100) NOT NULL,
  `id_tipo` int(100) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `capacidad` int(100) NOT NULL,
  `eliminado_couch` tinyint(1) NOT NULL DEFAULT '0',
  `despublicado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `couch`
--

INSERT INTO `couch` (`id_couch`, `id_usuario`, `id_tipo`, `titulo`, `descripcion`, `ubicacion`, `direccion`, `capacidad`, `eliminado_couch`, `despublicado`) VALUES
(1, 8, 14, 'Bungalow Frente al mar', 'Luminoso alojamiento frente al mar para 2 personas.', 'Las Toninas, Bs. As., Argentina.', 'Calle 90 Nro 785', 2, 0, 0),
(2, 9, 16, 'Carpa en la montana', 'Disfruta este intercambio en nuestra carpa en la montana.', 'Sierra de La Ventana, BS. AS., Argentina.', 'Calle holanda entre la sierra y los lenguados', 3, 0, 0),
(4, 10, 15, 'Departamento en La Plata', 'Departamento mono ambiente muy comodo cerca del centro.', 'La Plata, Bs.As., Argentnia.', '7 e 48 y 49.', 2, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(100) NOT NULL,
  `id_couch` int(100) NOT NULL,
  `ruta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
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

CREATE TABLE `premium` (
  `id_premium` int(100) NOT NULL,
  `id_usuario` int(100) DEFAULT NULL,
  `tarjeta` varchar(16) NOT NULL,
  `f_incripcion` datetime(6) DEFAULT NULL,
  `f_desuscripcion` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `premium`
--

INSERT INTO `premium` (`id_premium`, `id_usuario`, `tarjeta`, `f_incripcion`, `f_desuscripcion`) VALUES
(1, 10, '2131231231232131', '2016-06-04 00:00:00.000000', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntoscouch`
--

CREATE TABLE `puntoscouch` (
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

CREATE TABLE `puntos_usuario` (
  `id_puntosusuario` int(100) NOT NULL,
  `id_usuario` int(100) NOT NULL,
  `comentario` text,
  `puntuacion` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(100) NOT NULL,
  `id_usuario` int(100) NOT NULL,
  `id_couch` int(100) NOT NULL,
  `finicio` datetime(6) NOT NULL,
  `ffin` datetime(6) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `id_puntajeCouch` int(100) DEFAULT NULL,
  `id_puntajeUsuario` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `id_usuario`, `id_couch`, `finicio`, `ffin`, `estado`, `id_puntajeCouch`, `id_puntajeUsuario`) VALUES
(1, 10, 1, '2016-06-15 00:00:00.000000', '2017-06-15 00:00:00.000000', 'Vencida', 23, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE `tarjetas` (
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

CREATE TABLE `tipo` (
  `id_tipo` int(100) NOT NULL,
  `nombre_tipo` varchar(30) NOT NULL,
  `eliminado` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `usuario` (
  `id_usuario` int(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `apellido` varchar(35) NOT NULL,
  `fnac` date NOT NULL,
  `telefono` varchar(25) NOT NULL,
  `clave` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `email`, `nombre`, `apellido`, `fnac`, `telefono`, `clave`) VALUES
(8, 'lucas@gmail.com', 'Lucas', 'Costa', '1993-05-19', '456789', 'asd'),
(9, 'leo@gmail.com', 'Leo', 'Armendariz', '1992-05-20', '15465365', 'asd'),
(10, 'euge@gmail.com', 'Euge', 'Parini', '1994-12-25', '4345461', 'asd');

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
  ADD UNIQUE KEY `id_usuario` (`id_usuario`);

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
  MODIFY `id_admin` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `couch`
--
ALTER TABLE `couch`
  MODIFY `id_couch` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
-- AUTO_INCREMENT de la tabla `premium`
--
ALTER TABLE `premium`
  MODIFY `id_premium` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `id_reserva` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id_tipo` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
