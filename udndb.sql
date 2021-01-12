-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-01-2021 a las 07:26:33
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `udndb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `idalumnos` int(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apepat` varchar(45) NOT NULL,
  `apemat` varchar(45) NOT NULL,
  `fnacimiento` date NOT NULL,
  `alum_domicilio` varchar(45) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `curp` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`idalumnos`, `nombres`, `apepat`, `apemat`, `fnacimiento`, `alum_domicilio`, `telefono`, `curp`) VALUES
(1, 'Jorge Luis', 'Alvarez', 'Rubalcava', '1992-01-01', 'Musica 4532 Colonia Musicos', '3313456789', 'ALRU010192HJMRTC98'),
(45574, 'Mariana', 'Salinas', 'Llamas', '1988-09-16', 'Melodia 2329', '3334557947', 'SALLMA875904'),
(45734, 'Roberto', 'Rivas', 'Souza', '1993-05-13', 'Musica 1765', '3348579858', 'RISORO563497'),
(46896, 'Mayra', 'Robles', 'Cuevas', '1990-02-17', 'Armonia 2414', '3346587059', 'ROCUMA583735'),
(56743, 'Hector', 'Paredes', 'Contreras', '1998-08-26', 'Rondalla 4583', '3322665599', 'PACOHE458723'),
(56744, 'Paul', 'Garcia ', 'Castaneda', '1985-11-30', 'Himno 3457', '3345687654', 'GACAPA673487');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignadas`
--

CREATE TABLE `asignadas` (
  `idasignadas` int(11) NOT NULL,
  `idmateria` int(11) NOT NULL,
  `idprofesores` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asignadas`
--

INSERT INTO `asignadas` (`idasignadas`, `idmateria`, `idprofesores`) VALUES
(1, 1, 2),
(2, 3, 5),
(3, 5, 3),
(4, 2, 2),
(5, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `idalumno` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `asistencia` int(11) NOT NULL,
  `plantel` varchar(45) DEFAULT NULL,
  `hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`idalumno`, `fecha`, `asistencia`, `plantel`, `hora`) VALUES
(1, '2020-10-27', 1, 'Tlaquepaque', '15:00:07'),
(2, '2020-10-25', 1, 'Tlaquepaque', '09:01:10'),
(3, '2020-10-26', 1, 'Tlaquepaque', '15:02:01'),
(4, '2020-10-28', 1, 'Tlaquepaque', '16:07:23'),
(5, '2020-10-24', 1, 'Tlaquepaque', '19:00:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `idcarreras` int(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `duracion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`idcarreras`, `nombres`, `duracion`) VALUES
(1, 'Ing. en Sistemas', 3),
(2, 'Administracion ', 3),
(3, 'Contabilidad', 3),
(4, 'Abogado', 3),
(5, 'Diseño Grafico', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclo_escolar`
--

CREATE TABLE `ciclo_escolar` (
  `idciclo` int(11) NOT NULL,
  `clave` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ciclo_escolar`
--

INSERT INTO `ciclo_escolar` (`idciclo`, `clave`) VALUES
(1, '2020C'),
(2, '2020A'),
(3, '2020B'),
(4, '2021A'),
(5, '2021B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobranza`
--

CREATE TABLE `cobranza` (
  `idcobranza` int(11) NOT NULL,
  `idalumnos` int(11) NOT NULL,
  `diasatraso` int(11) NOT NULL,
  `interes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cobranza`
--

INSERT INTO `cobranza` (`idcobranza`, `idalumnos`, `diasatraso`, `interes`) VALUES
(1, 1, 1, 50),
(2, 2, 0, 0),
(3, 3, 0, 0),
(4, 4, 0, 0),
(5, 5, 1, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `idgrupos` int(11) NOT NULL,
  `idcarrera` int(11) NOT NULL,
  `idinscritos` int(11) NOT NULL,
  `idciclo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`idgrupos`, `idcarrera`, `idinscritos`, `idciclo`) VALUES
(1, 2, 2, 1),
(2, 1, 1, 1),
(3, 1, 3, 1),
(4, 3, 1, 1),
(5, 1, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `idhorario` int(11) NOT NULL,
  `idmateria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`idhorario`, `idmateria`) VALUES
(1, 'Vespetino L-V'),
(2, 'Matutino L-V'),
(3, 'Sabados'),
(4, 'Domingos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscritos`
--

CREATE TABLE `inscritos` (
  `idinscritos` int(11) NOT NULL,
  `idalumno` int(11) NOT NULL,
  `horario` int(11) NOT NULL,
  `idasistencia` int(11) NOT NULL,
  `idasignadas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inscritos`
--

INSERT INTO `inscritos` (`idinscritos`, `idalumno`, `horario`, `idasistencia`, `idasignadas`) VALUES
(1, 1, 3, 1, 1),
(2, 2, 2, 1, 2),
(3, 3, 3, 1, 3),
(4, 4, 1, 1, 4),
(5, 5, 1, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `idmaterias` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `idcarrera` int(11) NOT NULL,
  `clavemateria` varchar(45) DEFAULT NULL,
  `duracion` varchar(45) DEFAULT NULL,
  `prerequisito` varchar(45) DEFAULT NULL,
  `cuatrimestre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`idmaterias`, `nombre`, `idcarrera`, `clavemateria`, `duracion`, `prerequisito`, `cuatrimestre`) VALUES
(1, 'Redes 2', 1, 'ISC802', '3 semanas', 'ISC801', 8),
(2, 'Estadistica II', 2, 'LAE402', '3 semanas', 'LAE401', 4),
(3, 'Contabilidad 1', 3, 'LC101', '3 semanas', 'No', 1),
(4, 'Derecho romano', 4, 'LD104', '3 semanas', 'No', 1),
(5, 'Video II', 5, 'LDDCG702', '3 semanas', 'LDDCG701', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pagos`
--

CREATE TABLE `metodo_pagos` (
  `idmetodo` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `metodo_pagos`
--

INSERT INTO `metodo_pagos` (`idmetodo`, `tipo`) VALUES
(1, 'Efectivo'),
(2, 'Debito'),
(3, 'Tarjeta Credito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `idpagos` int(11) NOT NULL,
  `idalumnos` int(11) NOT NULL,
  `periodo` varchar(45) NOT NULL,
  `tipo` int(11) NOT NULL,
  `idcobranza` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`idpagos`, `idalumnos`, `periodo`, `tipo`, `idcobranza`, `cantidad`, `descripcion`, `fecha`) VALUES
(1, 4, 'Octubre', 1, 1, 1300, 'Pago a tiempo', '2020-10-05 09:34:12'),
(2, 5, 'Octubre', 3, 2, 1300, 'Pago atrasado', '2020-10-18 12:14:00'),
(3, 3, 'Octubre', 1, 3, 1300, 'Pago a tiempo', '2020-10-15 10:00:15'),
(4, 1, 'Octubre', 2, 4, 900, 'Pago atrasado', '2020-10-20 07:23:06'),
(5, 2, 'Octubre', 3, 5, 900, 'Pago a tiempo', '2020-10-15 11:24:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `idprofesores` int(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apepat` varchar(45) NOT NULL,
  `apemat` varchar(45) NOT NULL,
  `fnacimiento` date NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `curp` varchar(18) NOT NULL,
  `rfc` varchar(13) NOT NULL,
  `cedula` varchar(45) NOT NULL,
  `profesion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`idprofesores`, `nombres`, `apepat`, `apemat`, `fnacimiento`, `telefono`, `curp`, `rfc`, `cedula`, `profesion`) VALUES
(1, 'Francisco', 'Martinez', 'Rosales', '1988-02-08', '3355448899', 'ARLSJ554D78E1A5A', 'ARLSJ554D78E1', 'CDFF66E', 'Lic. en Derecho'),
(2, 'Juan', 'Morales', 'Jimenez', '1978-08-03', '3355448899', 'DSDFSDF66655WEF', 'ASDFSDF545DF4', 'VDFG564', 'Ing. en Sistemas'),
(3, 'Alejando', 'Ruvalcaba', 'Dueñas', '1987-08-04', '3355448899', 'FDFS5DF5FSD56SD1', 'SDF5SDF54SDF5', 'FDFE65E', 'Lic. en Diseño Grafico'),
(4, 'Anel', 'Garcia', 'Ibarra', '1986-05-08', '3355448899', 'DSAFFD54D5F45SD4', 'LKFGLKJ5456DF', 'DFF565S6', 'Lic. en Administracion '),
(5, 'Jaime', 'Ruiz', 'Martinez', '1989-06-08', '3355448899', 'PRRG5FSD55SD5SD', 'POEFSDJF65465', 'HYGH56D', 'Lic. en Contabilidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Tipo` int(11) NOT NULL,
  `idtipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`, `Tipo`, `idtipo`) VALUES
(1, 'mariana@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 45574),
(2, 'jorge@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 2, 5678),
(3, 'juanita@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 3, 2365);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`idalumnos`);

--
-- Indices de la tabla `asignadas`
--
ALTER TABLE `asignadas`
  ADD PRIMARY KEY (`idasignadas`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`idalumno`,`fecha`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`idcarreras`);

--
-- Indices de la tabla `ciclo_escolar`
--
ALTER TABLE `ciclo_escolar`
  ADD PRIMARY KEY (`idciclo`);

--
-- Indices de la tabla `cobranza`
--
ALTER TABLE `cobranza`
  ADD PRIMARY KEY (`idcobranza`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`idgrupos`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`idhorario`);

--
-- Indices de la tabla `inscritos`
--
ALTER TABLE `inscritos`
  ADD PRIMARY KEY (`idinscritos`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`idmaterias`);

--
-- Indices de la tabla `metodo_pagos`
--
ALTER TABLE `metodo_pagos`
  ADD PRIMARY KEY (`idmetodo`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`idpagos`);

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
-- AUTO_INCREMENT de la tabla `asignadas`
--
ALTER TABLE `asignadas`
  MODIFY `idasignadas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `idcarreras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ciclo_escolar`
--
ALTER TABLE `ciclo_escolar`
  MODIFY `idciclo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cobranza`
--
ALTER TABLE `cobranza`
  MODIFY `idcobranza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `idgrupos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `idhorario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `inscritos`
--
ALTER TABLE `inscritos`
  MODIFY `idinscritos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `idmaterias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `metodo_pagos`
--
ALTER TABLE `metodo_pagos`
  MODIFY `idmetodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `idpagos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `idprofesores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
