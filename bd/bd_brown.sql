-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2019 a las 18:06:52
-- Versión del servidor: 8.0.13
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_brown`
--
CREATE DATABASE IF NOT EXISTS `bd_brown` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bd_brown`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencia`
--

CREATE TABLE `incidencia` (
  `id_incidencia` int(11) NOT NULL,
  `titulo_inci` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `descrip_ini` text NOT NULL,
  `fecha_ini_inc` date NOT NULL,
  `fecha_fin_inc` date DEFAULT NULL,
  `hora_ini_inc` time NOT NULL,
  `hora_fin_inc` time DEFAULT NULL,
  `status_inc` enum('progress','done') NOT NULL,
  `id_reserva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE `recursos` (
  `id_recurso` int(11) NOT NULL,
  `nom_rec` varchar(50) NOT NULL,
  `disp_rec` enum('Disponible','Ocupado') NOT NULL,
  `tipo_rec` enum('Sala Multidisciplinaria','Sala Informatica','Taller de Cocina','Despacho','Sala de actos','Sala de reuniones','Proyector','Portatil','Movil') NOT NULL,
  `imagen_rec` varchar(100) NOT NULL,
  `desc_rec` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `recursos`
--

INSERT INTO `recursos` (`id_recurso`, `nom_rec`, `disp_rec`, `tipo_rec`, `imagen_rec`, `desc_rec`) VALUES
(1, 'Sala Multidisciplinària A', 'Ocupado', 'Sala Multidisciplinaria', './img/recursos/SalaMultA.png', ''),
(2, 'Sala Multidisciplinària B', 'Disponible', 'Sala Multidisciplinaria', './img/recursos/SalaMultB.png', ''),
(3, 'Sala Multidisciplinària C', 'Disponible', 'Sala Multidisciplinaria', './img/recursos/SalaMultC.png', ''),
(4, 'Sala Multidisciplinària D', 'Disponible', 'Sala Multidisciplinaria', './img/recursos/SalaMultD.png', ''),
(5, 'Sala informática A', 'Disponible', 'Sala Informatica', './img/recursos/SalaInfoA.png', ''),
(6, 'Sala informática B', 'Disponible', 'Sala Informatica', './img/recursos/SalaInfoB.png', ''),
(7, 'Despacho A', 'Disponible', 'Despacho', './img/recursos/DespachoA.png', ''),
(8, 'Despacho B', 'Disponible', 'Despacho', './img/recursos/DespachoB.png', ''),
(9, 'Taller de cocina', 'Disponible', 'Taller de Cocina', './img/recursos/TallerCocina.png', ''),
(10, 'Salón de Actos', 'Disponible', 'Sala de actos', './img/recursos/SalonActos.png', ''),
(11, 'Sala de reuniones', 'Disponible', 'Sala de reuniones', './img/recursos/SalaReuniones.png', ''),
(12, 'Proyector A', 'Disponible', 'Proyector', './img/recursos/ProyectorA.png', ''),
(13, 'Proyector B', 'Disponible', 'Proyector', './img/recursos/ProyectorB.png', ''),
(14, 'Portátil A', 'Disponible', 'Portatil', './img/recursos/PortatilA.png', ''),
(15, 'Portátil B', 'Disponible', 'Portatil', './img/recursos/PortatilB.png', ''),
(16, 'Portátil C', 'Disponible', 'Portatil', './img/recursos/PortatilC.png', ''),
(17, 'Móvil A', 'Disponible', 'Movil', './img/recursos/MovilA.png', ''),
(18, 'Móvil B', 'Disponible', 'Movil', './img/recursos/MovilB.png', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `fecha_ini_res` date NOT NULL,
  `fecha_fin_res` date DEFAULT NULL,
  `hora_ini_res` time NOT NULL,
  `hora_fin_res` time DEFAULT NULL,
  `status_res` enum('progress','done') NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_recursos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `fecha_ini_res`, `fecha_fin_res`, `hora_ini_res`, `hora_fin_res`, `status_res`, `id_usuario`, `id_recursos`) VALUES
(1, '2019-11-07', '2019-11-07', '15:16:47', '16:03:37', 'done', 1, 1),
(2, '2019-11-07', '2019-11-07', '15:16:54', '16:11:45', 'done', 1, 3),
(3, '2019-11-07', '2019-11-07', '15:37:46', '16:11:21', 'done', 1, 2),
(4, '2019-11-07', '2019-11-07', '16:09:15', '16:10:39', 'done', 1, 1),
(5, '2019-11-07', '2019-11-07', '16:10:53', '16:10:55', 'done', 1, 1),
(6, '2019-11-07', '2019-11-07', '16:13:51', '16:37:43', 'done', 1, 5),
(7, '2019-11-07', '2019-11-07', '16:13:58', '16:37:19', 'done', 1, 1),
(8, '2019-11-07', '2019-11-07', '16:40:07', '16:40:13', 'done', 1, 5),
(9, '2019-11-07', '2019-11-07', '16:51:09', '16:51:34', 'done', 1, 1),
(10, '2019-11-07', NULL, '17:02:06', NULL, 'progress', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nom_usu` varchar(50) NOT NULL,
  `pass_usu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nom_usu`, `pass_usu`) VALUES
(1, 'admin', 'admin'),
(3, 'carmupe', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  ADD PRIMARY KEY (`id_incidencia`),
  ADD KEY `id_reserva` (`id_reserva`);

--
-- Indices de la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`id_recurso`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_recursos` (`id_recursos`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  MODIFY `id_incidencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id_recurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `incidencia`
--
ALTER TABLE `incidencia`
  ADD CONSTRAINT `incidencia_ibfk_1` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id_reserva`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `FK_id_recursos` FOREIGN KEY (`id_recursos`) REFERENCES `recursos` (`id_recurso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
