-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-01-2021 a las 06:13:11
-- Versión del servidor: 8.0.19
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `udndb2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `idalumnos` int NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apepat` varchar(50) NOT NULL,
  `apemat` varchar(50) NOT NULL,
  `fnacimiento` varchar(50) NOT NULL,
  `domicilio` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `curp` varchar(50) NOT NULL,
  `carrera` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`idalumnos`, `nombres`, `apepat`, `apemat`, `fnacimiento`, `domicilio`, `telefono`, `curp`, `carrera`) VALUES
(1, 'Jorge Luis', 'Alvarez', 'Ruvalcaba', '1997-01-14', 'San Francisco 115', '3345564852', 'AADDH5S6DF56S', 1),
(2, 'Mariana', 'Salinas', 'Llamas', '1990-11-05', 'Colon 456', '5646545640', 'SDF5SD54DSFSD0', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `idalumnos` int NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `asistencia` int NOT NULL,
  `materia` int NOT NULL,
  `plantel` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `idalumnos` int NOT NULL,
  `idmaterias` int NOT NULL,
  `idprofesores` int NOT NULL,
  `calificacion` int NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `idcarreras` int NOT NULL,
  `nombres` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `duracion` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`idcarreras`, `nombres`, `duracion`) VALUES
(1, 'INGENERIA EN SISTEMAS COMPUTACIONALES', '3'),
(2, 'CONTADURIA PUBLICA', '3'),
(3, 'CIENCIAS EN LA COMUNICACION', '3'),
(4, 'FISIOTERAPEUTA', '5'),
(13, '', ''),
(14, 'TURISMO', '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobranza`
--

CREATE TABLE `cobranza` (
  `idalumno` int NOT NULL,
  `diasatraso` int NOT NULL,
  `interes` int NOT NULL,
  `total` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `idgrupos` int NOT NULL,
  `idcarrera` int NOT NULL,
  `ciclo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`idgrupos`, `idcarrera`, `ciclo`) VALUES
(1, 1, '2018-2021');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `idhorarios` int NOT NULL,
  `turno` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`idhorarios`, `turno`) VALUES
(1, 'Vespertino L-V'),
(2, 'Despertino L-V'),
(3, 'Sabados - Domingos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscritos`
--

CREATE TABLE `inscritos` (
  `idalumnos` int NOT NULL,
  `idturno` int NOT NULL,
  `idgrupo` int NOT NULL,
  `idmateria` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inscritos`
--

INSERT INTO `inscritos` (`idalumnos`, `idturno`, `idgrupo`, `idmateria`) VALUES
(1, 3, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `idmaterias` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `idcarrera` int NOT NULL,
  `clavemateria` varchar(50) NOT NULL,
  `duracion` varchar(50) NOT NULL,
  `prerequisito` varchar(50) NOT NULL,
  `cuatrimestre` int NOT NULL,
  `idprofesores` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`idmaterias`, `nombre`, `idcarrera`, `clavemateria`, `duracion`, `prerequisito`, `cuatrimestre`, `idprofesores`) VALUES
(1, 'Redes', 1, 'ISC802', '3 Semanas', 'ISC65S', 8, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pago`
--

CREATE TABLE `metodo_pago` (
  `idmetodopago` int NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `metodo_pago`
--

INSERT INTO `metodo_pago` (`idmetodopago`, `nombre`) VALUES
(1, 'Efectivo'),
(2, 'Tarjeta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `idpagos` int NOT NULL,
  `idalumno` int NOT NULL,
  `periodo` varchar(50) NOT NULL,
  `metodo_pago` int NOT NULL,
  `cantidad` int NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planteles`
--

CREATE TABLE `planteles` (
  `idplantel` int NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `planteles`
--

INSERT INTO `planteles` (`idplantel`, `nombre`) VALUES
(1, 'TLAQUEPAQUE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `idprofesores` int NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apepat` varchar(50) NOT NULL,
  `apemat` varchar(50) NOT NULL,
  `fnacimiento` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `curp` varchar(50) NOT NULL,
  `rfc` varchar(50) NOT NULL,
  `cedula` varchar(50) NOT NULL,
  `profesion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`idprofesores`, `nombres`, `apepat`, `apemat`, `fnacimiento`, `telefono`, `curp`, `rfc`, `cedula`, `profesion`) VALUES
(1, 'Francisco', 'Matinez', 'Rosales', '1988-02-09', '3345564852', 'AADDH5S6DF56S', 'AADDH5S6DF4DD', 'AEDFSF5E55', 'Lic. en Sistemas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Tipo` int NOT NULL,
  `idtipo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`, `Tipo`, `idtipo`) VALUES
(1, 'mariana@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 45574);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`idalumnos`),
  ADD KEY `carrera` (`carrera`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD KEY `idalumnos` (`idalumnos`),
  ADD KEY `plantel` (`plantel`),
  ADD KEY `materia` (`materia`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD KEY `idalumnos` (`idalumnos`),
  ADD KEY `idmaterias` (`idmaterias`),
  ADD KEY `idprofesores` (`idprofesores`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`idcarreras`);

--
-- Indices de la tabla `cobranza`
--
ALTER TABLE `cobranza`
  ADD KEY `idalumno` (`idalumno`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`idgrupos`),
  ADD KEY `idcarrera` (`idcarrera`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`idhorarios`);

--
-- Indices de la tabla `inscritos`
--
ALTER TABLE `inscritos`
  ADD KEY `idturno` (`idturno`),
  ADD KEY `idalumnos` (`idalumnos`),
  ADD KEY `idgrupo` (`idgrupo`),
  ADD KEY `idmateria` (`idmateria`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`idmaterias`),
  ADD KEY `idcarrera` (`idcarrera`),
  ADD KEY `idprofesores` (`idprofesores`);

--
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD PRIMARY KEY (`idmetodopago`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`idpagos`),
  ADD KEY `idalumno` (`idalumno`),
  ADD KEY `metodo_pago` (`metodo_pago`);

--
-- Indices de la tabla `planteles`
--
ALTER TABLE `planteles`
  ADD PRIMARY KEY (`idplantel`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`idprofesores`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `idalumnos` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `idcarreras` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `idgrupos` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `idhorarios` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `idmaterias` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  MODIFY `idmetodopago` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `idpagos` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `planteles`
--
ALTER TABLE `planteles`
  MODIFY `idplantel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `idprofesores` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`carrera`) REFERENCES `carreras` (`idcarreras`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`idalumnos`) REFERENCES `alumnos` (`idalumnos`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `asistencia_ibfk_2` FOREIGN KEY (`plantel`) REFERENCES `planteles` (`idplantel`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `asistencia_ibfk_3` FOREIGN KEY (`materia`) REFERENCES `materias` (`idmaterias`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`idalumnos`) REFERENCES `alumnos` (`idalumnos`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `calificaciones_ibfk_2` FOREIGN KEY (`idmaterias`) REFERENCES `materias` (`idmaterias`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `calificaciones_ibfk_3` FOREIGN KEY (`idprofesores`) REFERENCES `profesores` (`idprofesores`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `cobranza`
--
ALTER TABLE `cobranza`
  ADD CONSTRAINT `cobranza_ibfk_1` FOREIGN KEY (`idalumno`) REFERENCES `alumnos` (`idalumnos`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `grupos_ibfk_1` FOREIGN KEY (`idcarrera`) REFERENCES `carreras` (`idcarreras`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `inscritos`
--
ALTER TABLE `inscritos`
  ADD CONSTRAINT `inscritos_ibfk_1` FOREIGN KEY (`idalumnos`) REFERENCES `alumnos` (`idalumnos`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `inscritos_ibfk_2` FOREIGN KEY (`idturno`) REFERENCES `horarios` (`idhorarios`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `inscritos_ibfk_3` FOREIGN KEY (`idgrupo`) REFERENCES `grupos` (`idgrupos`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `inscritos_ibfk_4` FOREIGN KEY (`idmateria`) REFERENCES `materias` (`idmaterias`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `materias_ibfk_1` FOREIGN KEY (`idprofesores`) REFERENCES `profesores` (`idprofesores`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `materias_ibfk_2` FOREIGN KEY (`idcarrera`) REFERENCES `carreras` (`idcarreras`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`idalumno`) REFERENCES `alumnos` (`idalumnos`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `pagos_ibfk_2` FOREIGN KEY (`metodo_pago`) REFERENCES `metodo_pago` (`idmetodopago`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
