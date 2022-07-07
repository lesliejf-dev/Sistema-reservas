-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2022 a las 20:37:01
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `centro_infinite`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `perfil` text NOT NULL,
  `nombre` text NOT NULL,
  `usuario` text NOT NULL,
  `password` text NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `perfil`, `nombre`, `usuario`, `password`, `estado`, `fecha`) VALUES
(1, 'Administrador', 'Centro Infinite', 'infinite', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 1, '2022-04-24 14:05:50'),
(2, 'Editor', 'Leslie Jara', 'leslie', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 1, '2022-05-09 09:55:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`id`, `img`, `fecha`) VALUES
(1, 'vistas/img/banner/banner01.jpg', '2022-03-30 09:26:58'),
(2, 'vistas/img/banner/banner02.jpg', '2022-03-30 09:26:58'),
(3, 'vistas/img/banner/banner03.jpg', '2022-03-30 09:26:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_cat` int(11) NOT NULL,
  `ruta` text NOT NULL,
  `color` text NOT NULL,
  `tipo` text NOT NULL,
  `img` text NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_cat`, `ruta`, `color`, `tipo`, `img`, `descripcion`, `fecha_creacion`) VALUES
(1, 'servicio-tipo-peluqueria', '#d7957c', 'Peluqueria', 'vistas/img/peluqueria/portadapelu.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2022-05-09 07:39:26'),
(2, 'servicio-tipo-unas', '#d7957c', 'Uñas', 'vistas/img/unas/portadaunas.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2022-04-05 14:49:09'),
(3, 'servicio-tipo-maquillaje', '#d7957c', 'Maquillaje', 'vistas/img/maquillaje/portadamkp.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2022-04-05 16:27:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `tipo` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `tipo`, `cantidad`, `fecha`) VALUES
(1, 'reservas', 12, '2022-05-09 17:27:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id_r` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `precio_r` float NOT NULL,
  `codigo_r` text NOT NULL,
  `descripcion_r` text NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `hora_cita` text NOT NULL,
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id_r`, `id_servicio`, `id_usuario`, `precio_r`, `codigo_r`, `descripcion_r`, `fecha_ingreso`, `fecha_salida`, `hora_cita`, `fecha_crea`) VALUES
(36, 1, 3, 17, 'RSH1SI36M', 'Peluqueria- Corte Mujer', '2022-04-25', '0000-00-00', '19:00', '2022-04-19 23:37:50'),
(37, 7, 5, 6, 'T4X11B8PI', 'Peluqueria- Afeitado barba', '2022-04-25', '0000-00-00', '11:00', '2022-04-19 23:40:24'),
(42, 11, 6, 35, 'FQJDPE2KL', 'Uñas- UÑAS BABY BOOMER', '2022-04-28', '0000-00-00', '18:00', '2022-04-20 11:35:05'),
(43, 11, 3, 35, '4GCR7Y5MG', 'Uñas- UÑAS BABY BOOMER', '2022-04-25', '0000-00-00', '13:00', '2022-04-21 11:28:07'),
(44, 4, 3, 12, '4CQE508AT', 'Peluqueria- Lavado y secado', '2022-04-29', '0000-00-00', '10:00', '2022-04-24 14:05:11'),
(48, 6, 3, 60, 'KOIUNODD3', 'Peluquería- Mechas', '2022-05-18', '0000-00-00', '10:00', '2022-05-08 23:17:44'),
(49, 2, 3, 10, 'CZ3SKPHWS', 'Peluquería- Corte Caballero', '2022-05-13', '0000-00-00', '16:00', '2022-05-09 00:42:15'),
(50, 2, 6, 10, '1IMUXWNCD', 'Peluquería- Corte Caballero', '2022-05-18', '0000-00-00', '12:00', '2022-05-09 06:12:13'),
(51, 3, 5, 7, 'USJ31WQUM', 'Peluquería- Corte  Niño', '2022-05-17', '0000-00-00', '12:00', '2022-05-09 06:40:29'),
(55, 10, 7, 25, '3PMCGOWSG', 'Uñas- Uñas de Gel', '2022-05-25', '0000-00-00', '11:00', '2022-05-09 07:22:54'),
(56, 4, 2, 12, 'SDFH2R5TR', 'Peluquería- Lavado y secado', '2022-05-18', '0000-00-00', '10:00', '2022-05-09 07:23:38'),
(60, 6, 15, 60, '6B6WSE0G1', 'Peluqueria- Mechas', '2022-05-17', '0000-00-00', '10:00', '2022-05-09 16:22:26'),
(61, 9, 3, 35, 'TG0PQQCRH', 'Maquillaje- Maquillaje social', '2022-06-11', '0000-00-00', '10:00', '2022-05-09 16:28:57'),
(62, 12, 6, 80, 'SZPVEMCF7', 'Maquillaje- Maquillaje sesión fotos', '2022-06-08', '0000-00-00', '17:00', '2022-05-09 17:25:28'),
(63, 10, 6, 25, 'BEAHH9V4F', 'Uñas- Uñas de Gel', '2022-06-15', '0000-00-00', '18:00', '2022-05-09 17:26:25'),
(64, 2, 5, 10, 'AG4Y67EY8', 'Peluqueria- Corte Caballero', '2022-06-14', '0000-00-00', '19:00', '2022-05-09 17:27:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_s` int(11) NOT NULL,
  `tipo_s` int(11) NOT NULL,
  `nombre_servicio` text NOT NULL,
  `precio` float NOT NULL,
  `descripcion_s` text NOT NULL,
  `fecha_c` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_s`, `tipo_s`, `nombre_servicio`, `precio`, `descripcion_s`, `fecha_c`) VALUES
(1, 1, 'Corte Mujer', 17, 'Te ayudamos a elegir el corte de pelo que mas te favorece.', '2022-04-25 12:02:19'),
(2, 1, 'Corte Caballero', 10, 'Elige entre los tantos tipo de corte de pelo de hombre, el que mejor te quede a ti', '2022-04-05 17:19:44'),
(3, 1, 'Corte  Niño', 7, 'Algunos de estos estilos están diseñados para que no necesiten un cuidado especial de peinado, todos se verán bien con o sin productos para el cabello.', '2022-04-05 17:20:27'),
(4, 1, 'Lavado y secado', 12, 'La temperatura del secado es clave: 160° para pelos dañados o tinturados, 180° para los sanos y sin procesos de coloración y sobre los 180° los gruesos, rebeldes y sanos.', '2022-04-05 17:22:43'),
(5, 1, 'Recogido', 35, 'Obten el recogido perfecto, bodas, noches de fiesta, incluso un compromiso laboral; el pelo recogido es una opción perfecta para todas estas ocasiones', '2022-04-05 17:24:06'),
(6, 1, 'Mechas', 60, 'Todo lo que quieres saber sobre las mechas: mechas balayage, californianas, babylights, woodlights, reflejos... Mechas rubias, morenas, castañas, pelirrojas o mechas para pelo corto, largo, media melena... Sea como sea tu color y tipo de pelo, ¡hay unas mechas para ti!', '2022-04-25 11:56:41'),
(7, 1, 'Afeitado barba', 6, 'Este servicio está pensado para todo tipo de barbas: desde una barba hipster superlarga a un afeitado completo, pasando por la perilla, el bigote, etc. Y también para todo tipo de pieles. La diferencia entre una barba y un afeitado completo es que a la barba la hidratamos y en el afeitado cuidamos la piel.', '2022-04-25 12:00:44'),
(9, 3, 'Maquillaje social', 35, 'El maquillaje social es un estilo nuevo que tiene como objetivo destacar nuestra belleza y facciones logrando un equilibrio con el look que vayamos a usar.', '2022-04-25 12:04:40'),
(10, 2, 'Uñas de Gel', 25, 'Son extensiones que se ponen sobre tus uñas naturales, buscando obtener un acabado mucho más perfecto. ', '2022-04-05 17:15:56'),
(11, 2, 'UÑAS BABY BOOMER', 35, 'Consiste en una técnica donde se realiza un difuminado de tonos de colores entre el color rosa y el color blanco de la punta de las uñas.', '2022-04-05 17:15:15'),
(12, 3, 'Maquillaje sesión fotos', 80, 'El maquillaje para una sesión fotográfica debe ser ligeramente más pronunciado que el básico que usamos para salir a la calle, debido a la intensidad de la luz dada por los focos. Los focos van a absorber dos tonos de luz como mínimo por lo que es recomendable aumentar la tonalidad de los colores.', '2022-04-25 12:05:17'),
(13, 3, 'Maquillaje de novia', 120, 'Un maquillaje para novias perfecto consiste en realzar lo mas bonito de ti, una piel iluminada, unas cejas delineadas y una mirada intensa.', '2022-04-05 19:28:59'),
(14, 2, 'Manicura', 21, 'Esta manicura incluye dar forma a las uñas, tratamientos de cutícula, hidratación con masaje y esmaltado permanente del color de tu preferencia.', '2022-04-25 11:52:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_u` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `clave` text NOT NULL,
  `email` text NOT NULL,
  `foto` text NOT NULL,
  `modo` text NOT NULL,
  `verificacion` int(11) NOT NULL,
  `email_encriptado` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_u`, `nombre`, `clave`, `email`, `foto`, `modo`, `verificacion`, `email_encriptado`, `fecha`) VALUES
(2, 'Leslie', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'leslie@gmail.com', 'vistas/img/usuarios/2/619.jpg', 'directo', 1, '1b23bd6ceff0525464948614113caf2f', '2022-05-09 18:09:17'),
(3, 'Maria', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'maria@gmail.com', 'vistas/img/usuarios/3/640.jpg', 'directo', 1, 'c3a724f59d3245b0e166b278f809a9c7', '2022-05-09 18:10:18'),
(5, 'Jack', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'jack@yahoo.com', 'vistas/img/usuarios/5/891.jpg', 'directo', 1, '68ff8249fcf9d2ac71e7bf91ab3f904d', '2022-04-21 19:10:40'),
(6, 'Ariadna', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'ari@outlook.com', 'vistas/img/usuarios/6/743.jpg', 'directo', 1, '3d54ce100371766c3b9d3b03ddae62dc', '2022-05-05 23:16:36'),
(7, 'Juan', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'juan@gmail.com', '', 'directo', 1, '7038663cc684aa330956752c7e6fe7d4', '2022-05-08 22:16:26'),
(15, 'paquita', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'paquita@gmail.com', '', 'directo', 1, '6bfb81b8558185b0993119a8fd39dc63', '2022-05-09 09:51:28');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_r`),
  ADD KEY `reservas_ibfk_1` (`id_servicio`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_s`),
  ADD KEY `tipo_s` (`tipo_s`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_r` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_s` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id_s`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_u`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `servicios_ibfk_1` FOREIGN KEY (`tipo_s`) REFERENCES `categorias` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
