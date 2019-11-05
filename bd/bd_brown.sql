-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2019 a las 16:55:15
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.1.32

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
  `titulo_inci` varchar(20) NOT NULL,
  `descrip_ini` text NOT NULL
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
(1, 'Sala Multidisciplinària A', 'Disponible', 'Sala Multidisciplinaria', './img/recursos/SalaMultA.png', ''),
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
  `fecha_fin_res` date NOT NULL,
  `hora_ini_res` time NOT NULL,
  `hora_fin_res` time NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_incidencia` int(11) NOT NULL,
  `id_recursos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'admin', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  ADD PRIMARY KEY (`id_incidencia`);

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
  ADD KEY `id_incidencia` (`id_incidencia`),
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
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `FK_id_recursos` FOREIGN KEY (`id_recursos`) REFERENCES `recursos` (`id_recurso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_incidencia`) REFERENCES `incidencia` (`id_incidencia`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
