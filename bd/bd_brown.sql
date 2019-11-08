-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2019 a las 16:58:46
-- Versión del servidor: 10.1.38-MariaDB
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
  `titulo_inci` varchar(50) NOT NULL,
  `descrip_ini` text NOT NULL,
  `fecha_ini_inc` date NOT NULL,
  `fecha_fin_inc` date DEFAULT NULL,
  `hora_ini_inc` time NOT NULL,
  `hora_fin_inc` time DEFAULT NULL,
  `status_inc` enum('progress','done') NOT NULL,
  `id_recurso` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `incidencia`
--

INSERT INTO `incidencia` (`id_incidencia`, `titulo_inci`, `descrip_ini`, `fecha_ini_inc`, `fecha_fin_inc`, `hora_ini_inc`, `hora_fin_inc`, `status_inc`, `id_recurso`, `id_usuario`) VALUES
(1, 'prueba', 'des  de  prueba', '2019-11-08', '2019-11-08', '02:02:50', '02:53:48', 'done', 4, 3),
(2, 'sdadasfd', 'sadfgsgsfgsdg', '2019-11-08', '2019-11-08', '02:12:35', '03:00:42', 'done', 1, 1),
(3, 'sdfasdfsadfsa', 'sadfsdfasdfsfsgsdfgdsfhfgd', '2019-11-08', '2019-11-08', '03:21:06', '03:33:21', 'done', 11, 3),
(4, 'dfasdfasdf', 'sadfasdfas', '2019-11-08', '2019-11-08', '03:29:16', '03:32:08', 'done', 1, 1),
(5, 'dsaaSasf', 'afasdfasdgas', '2019-11-08', '2019-11-08', '15:17:51', '15:18:43', 'done', 11, 1),
(6, 'pruebaaaaaaaa', 'sdfasdgsfahadfhndsghfds', '2019-11-08', '2019-11-08', '15:19:30', '16:17:04', 'done', 9, 3),
(7, 'asdasdsadasd', 'sadasasdasdsa', '2019-11-08', '2019-11-08', '15:48:24', '16:17:05', 'done', 13, 1),
(8, 'XCVZCBZVCN', 'CVBXCBXCVBXC', '2019-11-08', '2019-11-08', '15:55:19', '16:17:07', 'done', 12, 3),
(9, 'SADAfd', 'sadfsadfasdfsadf', '2019-11-08', '2019-11-08', '15:55:44', '16:17:08', 'done', 13, 3),
(10, 'HHHHHHHHHH', 'FFFFFFFFFFFF', '2019-11-08', '2019-11-08', '16:47:20', '16:48:48', 'done', 16, 3);

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
(1, 'Sala Multidisciplinària A', 'Ocupado', 'Sala Multidisciplinaria', './img/recursos/SalaMultA.png', 'Sala Multidisciplinaria preparada para clases de ioga.'),
(2, 'Sala Multidisciplinària B', 'Disponible', 'Sala Multidisciplinaria', './img/recursos/SalaMultB.png', 'Sala Multidisciplinaria preparada para clases de baile.'),
(3, 'Sala Multidisciplinària C', 'Disponible', 'Sala Multidisciplinaria', './img/recursos/SalaMultC.png', 'Sala Multidisciplinaria preparada para hacer presentaciones con un proyector.'),
(4, 'Sala Multidisciplinària D', 'Disponible', 'Sala Multidisciplinaria', './img/recursos/SalaMultD.png', 'Sala Multidisciplinaria preparada para hacer juegos, con mesa de ping pong y futbolin.'),
(5, 'Sala informática A', 'Disponible', 'Sala Informatica', './img/recursos/SalaInfoA.png', 'Sala de Informatica que dispone con mas de 15 equipos de sobremesa.'),
(6, 'Sala informática B', 'Disponible', 'Sala Informatica', './img/recursos/SalaInfoB.png', 'Sala de Informatica que dispone con 5 macs y mas de 20 equipos de sobremesa.'),
(7, 'Despacho A', 'Disponible', 'Despacho', './img/recursos/DespachoA.png', 'Despacho preparado para cualquier entrevista que dispone de un telefono fijo.'),
(8, 'Despacho B', 'Disponible', 'Despacho', './img/recursos/DespachoB.png', 'Despacho preparado para cualquier entrevista que dispone de un pc de sobremesa.'),
(9, 'Taller de cocina', 'Disponible', 'Taller de Cocina', './img/recursos/TallerCocina.png', 'Taller de cocina preparado con todo lo necesario para cocinar con todos los utensilios.'),
(10, 'Salón de Actos', 'Disponible', 'Sala de actos', './img/recursos/SalonActos.png', 'Salon de actos con capacidad para 150 personas y dispone de diferentes altavoces.'),
(11, 'Sala de reuniones', 'Disponible', 'Sala de reuniones', './img/recursos/SalaReuniones.png', 'Sala de reuniones con capacidad para 12 personas que dispone de una TV.'),
(12, 'Proyector A', 'Disponible', 'Proyector', './img/recursos/ProyectorA.png', 'Proyector EPSON de color negro portable ya configurado y preparado para la proyeccion.'),
(13, 'Proyector B', 'Disponible', 'Proyector', './img/recursos/ProyectorB.png', 'Proyector EPSON de color blanco portable ya configurado y preparado para la proyeccion.'),
(14, 'Portátil A', 'Disponible', 'Portatil', './img/recursos/PortatilA.png', 'Portatil ASUS VivoBoock acabado de metal pulido, procesador Intel® Core™ i7, 12 GB de RAM y gráfica NVIDIA® GeForce® 940MX*.'),
(15, 'Portátil B', 'Disponible', 'Portatil', './img/recursos/PortatilB.png', 'Portatil Xiaomi Mi Notebook Air 12.5 tiene  12,5 pulgadas, con un procesador M3, 128 GB de almacenamiento y 4 GB de RAM.'),
(16, 'Portátil C', 'Disponible', 'Portatil', './img/recursos/PortatilC.png', 'Portatil LG Gram 15Z990 cuenta como motor con un procesador Intel Core i7-8565U de cuatro núcleos a 1,8 GHz (hasta 4,6 GHz), con hasta 16 GB de RAM y 512 GB de almacenamiento.'),
(17, 'Móvil A', 'Disponible', 'Movil', './img/recursos/MovilA.png', 'Movil A, Iphone 5 con 64GB color negro.'),
(18, 'Móvil B', 'Disponible', 'Movil', './img/recursos/MovilB.png', 'Movil B, Samsung Galaxy A10 con 64GB color gris.');

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
(10, '2019-11-07', '2019-11-08', '17:02:06', '01:37:07', 'done', 3, 1),
(11, '2019-11-08', '2019-11-08', '01:35:52', '01:37:13', 'done', 3, 3),
(12, '2019-11-08', '2019-11-08', '01:36:11', '01:37:28', 'done', 1, 2),
(13, '2019-11-08', '2019-11-08', '03:20:48', '03:20:52', 'done', 3, 1),
(14, '2019-11-08', NULL, '15:22:31', NULL, 'progress', 3, 1),
(15, '2019-11-08', '2019-11-08', '15:54:04', '15:54:11', 'done', 3, 15);

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
  ADD KEY `id_reserva` (`id_recurso`),
  ADD KEY `id_usuario` (`id_usuario`);

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
  MODIFY `id_incidencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id_recurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  ADD CONSTRAINT `incidencia_ibfk_1` FOREIGN KEY (`id_recurso`) REFERENCES `recursos` (`id_recurso`);

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
