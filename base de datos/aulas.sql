-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-02-2022 a las 00:18:15
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aulas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `archivo` text NOT NULL,
  `video` text NOT NULL,
  `videoy` text NOT NULL,
  `imagen` text NOT NULL,
  `sinopsis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id`, `nombre`, `id_seccion`, `archivo`, `video`, `videoy`, `imagen`, `sinopsis`) VALUES
(42, 'Roma', 23, '', '', '', 'Vistas/img/Imagenes/23-728.png', 'comparacion de grecia y roma'),
(43, 'Mesopotamia, primera ciudad fluvial', 22, '', '', '', 'Vistas/img/Imagenes/22-45.png', 'Mesopotamia, primera ciudad fluvial'),
(44, 'Mesopotamia video', 22, '', '', 'https://www.youtube.com/embed/KvUnPpIAxtQ', '', ''),
(45, 'ROma y grecia', 23, '', '', 'https://www.youtube.com/embed/L5Q-bs-gg04\"', '', ''),
(46, 'Diferencias entre Roma y Grecia', 23, 'Vistas/Archivos/23-764.doc', '', '', '', ''),
(47, 'Primeras sociedades fluviales', 22, 'Vistas/Archivos/22-712.doc', '', '', '', ''),
(68, 'unida 3', 54, '', '', '', 'Vistas/img/Imagenes/54-945.png', 'taller'),
(69, 'hfgh', 54, 'Vistas/Archivos/54-30.pdf', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas`
--

CREATE TABLE `aulas` (
  `id` int(11) NOT NULL,
  `materia` text NOT NULL,
  `id_grado` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aulas`
--

INSERT INTO `aulas` (`id`, `materia`, `id_grado`, `id_profesor`) VALUES
(2, 'Programacion avanzada', 1, 3),
(6, 'Programacion I', 3, 3),
(7, 'Programacion II', 1, 3),
(8, 'Historia', 19, 11),
(9, 'Historia', 1, 3),
(10, 'Historia Noveno', 20, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregas`
--

CREATE TABLE `entregas` (
  `id` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_tarea` int(11) NOT NULL,
  `tarea_alumno` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `entregas`
--

INSERT INTO `entregas` (`id`, `id_seccion`, `id_alumno`, `id_tarea`, `tarea_alumno`) VALUES
(6, 22, 4, 53, 'Vistas/Entregas/22-53-316.doc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`id`, `nombre`) VALUES
(19, 'Séptimo A'),
(21, 'Séptimo B'),
(22, 'Octavo'),
(23, 'Noveno'),
(24, 'Decimo'),
(25, 'Once');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inicio`
--

CREATE TABLE `inicio` (
  `id` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `manualProfesor` text NOT NULL,
  `manualEstudiante` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inicio`
--

INSERT INTO `inicio` (`id`, `descripcion`, `manualProfesor`, `manualEstudiante`) VALUES
(1, '<p>Bienvenido al aula, a continuaci&oacute;n, encontrara los grados existentes en la instituci&oacute;n .Adem&aacute;s, contara con la opci&oacute;n de descargar un manual de uso seg&uacute;n su tipo de usuario (estudiante o profesor).&nbsp;</p>\r\n', 'Vistas/Manuales/Manual-Profesor.pdf', 'Vistas/Manuales/Manual-Estudiante.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `id` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_aula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`id`, `id_alumno`, `id_aula`) VALUES
(9, 4, 2),
(13, 7, 4),
(15, 4, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `id_destinatario` int(11) NOT NULL,
  `id_envia` int(11) NOT NULL,
  `asunto` text NOT NULL,
  `mensaje` text NOT NULL,
  `leido` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `id_destinatario`, `id_envia`, `asunto`, `mensaje`, `leido`, `fecha`) VALUES
(1, 3, 4, 'Mensaje 2', '<p>HOlaaaaaa</p>\r\n', 'Si', '2021-06-09 04:55:34'),
(2, 3, 4, 'Mensaje 3', '<p>3</p>\r\n', 'Si', '2021-06-09 05:01:11'),
(3, 4, 3, 'Inconveniente con la tarea', '<p>Buen dia profesor. \n El presente mensaje tiene el fin de comunicar el problema presentado en la tarea </p>\n', 'Si', '2021-08-24 20:53:57'),
(4, 3, 4, 'Mensaje 4', '<p>mensaje 4</p>\r\n', 'Si', '2021-06-11 00:53:07'),
(5, 3, 4, 'Hola', '<p>Hola</p>\r\n', 'No', '2022-02-17 15:13:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `id_tarea` int(11) NOT NULL,
  `id_entrega` int(11) NOT NULL,
  `nota` text NOT NULL,
  `estado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `id_seccion`, `id_tarea`, `id_entrega`, `nota`, `estado`) VALUES
(6, 22, 53, 6, '', 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `id` int(11) NOT NULL,
  `id_aula` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id`, `id_aula`, `nombre`, `descripcion`) VALUES
(22, 9, 'Unidad 1: Hominización, complejización de las primeras sociedades y civilizaciones fluviales', '<p>La revoluci&oacute;n del Neol&iacute;tico y la organizaci&oacute;n de grupos humanos. Factores geogr&aacute;ficos, sociales y culturales que dieron origen a las primeras civilizaciones.</p>\r\n'),
(23, 9, 'Unidad 2: Civilizaciones clásicas: Grecia y Roma', '<p>En esta unidad se espera que los y las estudiantes conozcan las principales caracter&iacute;sticas de la Antig&uuml;edad cl&aacute;sica y valoren el legado de algunos elementos de esa cultura en la conformaci&oacute;n de la cultura americana. Se pretende que comprendan que, durante la Antig&uuml;edad cl&aacute;sica, el mar Mediterr&aacute;neo se constituy&oacute; como una regi&oacute;n cultural donde se desarrollaron importantes culturas que originaron la civilizaci&oacute;n occidental.</p>\r\n'),
(44, 2, 'Nueva Seccion', ''),
(54, 9, 'Nueva Sección', '<p>esta es la unida 3</p>\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `materia` text NOT NULL,
  `observaciones` text NOT NULL,
  `estado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id`, `id_profesor`, `materia`, `observaciones`, `estado`) VALUES
(1, 3, 'Programacion III', '<p>Necesito aula</p>\r\n', 'Solicitada'),
(2, 3, 'Programacion I', '<p>khfkljfkdls</p>\r\n', 'Aprobada'),
(3, 3, 'biologia', '<p>hola quiero pedir un aula de biologia</p>\r\n', 'Solicitada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `id` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `id_tarea` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `tarea` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`id`, `id_seccion`, `id_tarea`, `nombre`, `tarea`) VALUES
(3, 22, 53, 'ciudades fluviales  tarea', 'Vistas/Tareas/22-53--636.doc'),
(4, 54, 56, 'tarea unidad 3', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_limite` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `id_seccion`, `nombre`, `descripcion`, `fecha_limite`) VALUES
(53, 22, 'Tarea ciudades fluviales 1', '<p>Indicar cuales son las primeras ciudades fluviales</p>\r\n', '09/22/2021'),
(56, 54, 'Nueva Tarea', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` text NOT NULL,
  `clave` text NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `correo` text NOT NULL,
  `documento` text NOT NULL,
  `id_grado` int(11) NOT NULL,
  `foto` text NOT NULL,
  `rol` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `clave`, `nombre`, `apellido`, `correo`, `documento`, `id_grado`, `foto`, `rol`) VALUES
(1, 'admin', '123', 'Cristiano', 'Ronaldo', 'CR7@hotmail.com', '1234567', 0, 'Vistas/img/Usuarios/U-851.jpg', 'Administrador'),
(3, 'leom', '123', 'Robert', 'Yepes', 'Me@hotmail.com', '1234567', 0, 'Vistas/img/Usuarios/U-167.jpg', 'Profesor'),
(4, 'Pepito', '123', 'Pepe', 'García', 'PE@hotmail.com', '12345', 1, '', 'Estudiante'),
(7, 'hln', '123', 'Erling', 'Haaland', '', '4568', 3, '', 'Estudiante'),
(10, 'lulu', '123', 'Lulu', 'Lalanda', 'L@hotmail.com', '12345678', 1, '', 'Estudiante'),
(11, 'rafa', '123', 'rafita', 'Gomez', 'asdasd@dfdsfds', '123456', 0, '', 'Profesor'),
(12, 'Jose', '123', 'Jose', 'Wesker', 'c@hotmal', '123456', 20, '', 'Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `video` text NOT NULL,
  `videoy` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`id`, `nombre`, `id_seccion`, `video`, `videoy`) VALUES
(65, 'ejemplo66', 21, '', 'https://www.youtube.com/embed/jGehuhFhtnE'),
(72, 'ejemplo9', 6, 'Vistas/vds/6-972.mp4', ''),
(73, 'ejemplo8', 6, 'Vistas/vds/6-904.mp4', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entregas`
--
ALTER TABLE `entregas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inicio`
--
ALTER TABLE `inicio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `entregas`
--
ALTER TABLE `entregas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `inicio`
--
ALTER TABLE `inicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
