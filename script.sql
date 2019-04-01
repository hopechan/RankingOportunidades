-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 30-03-2019 a las 20:28:49
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ranking`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Certificacion`
--
CREATE DATABASE ranking;
USE ranking;
CREATE TABLE `Certificacion` (
  `idCertificacion` int(11) NOT NULL,
  `idTipo` int(11) NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  `nota` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Certificacion`
--

INSERT INTO `Certificacion` (`idCertificacion`, `idTipo`, `idEstudiante`, `nota`) VALUES
(2, 4, 1, '8.00'),
(3, 5, 3, '8.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Documentos`
--

CREATE TABLE `Documentos` (
  `idDocumentos` int(11) NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  `nombreDocumento` varchar(32) NOT NULL,
  `documento` longblob NOT NULL,
  `descripcion` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Estudiante`
--

CREATE TABLE `Estudiante` (
  `idEstudiante` int(11) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `apellidos` varchar(32) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `telefono` int(8) NOT NULL,
  `email` varchar(32) NOT NULL,
  `direccion` varchar(64) NOT NULL,
  `year` varchar(16) NOT NULL,
  `centroEscolar` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Estudiante`
--

INSERT INTO `Estudiante` (`idEstudiante`, `nombre`, `apellidos`, `fechaNacimiento`, `telefono`, `email`, `direccion`, `year`, `centroEscolar`) VALUES
(1, 'Jonathan', 'Joestar', '2019-03-06', 0, '', '', '', 'INSA'),
(2, 'Joseph', 'Joestar', '2019-03-10', 0, '', '', '', 'Madre de El Salvador'),
(3, 'Jotaro', 'Kujo', '2019-03-07', 0, '', '', '', 'INSA'),
(4, 'Josuke', 'Higashigata', '2019-03-31', 0, '', '', '', 'Madre de El Salvador'),
(5, 'Esperanza', 'Dueñas', '1994-10-08', 21453275, 'da13002@ues.edu.sv', 'Santa Ana', '3 YEAR', 'CE INSA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Materia`
--

CREATE TABLE `Materia` (
  `idMateria` int(11) NOT NULL,
  `materia` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Nota`
--

CREATE TABLE `Nota` (
  `idNota` int(11) NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL,
  `nota` decimal(4,2) NOT NULL,
  `periodo` varchar(16) NOT NULL,
  `anio` varchar(4) NOT NULL,
  `porcentaje` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tipo`
--

CREATE TABLE `Tipo` (
  `idTipo` int(11) NOT NULL,
  `tipo` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Tipo`
--

INSERT INTO `Tipo` (`idTipo`, `tipo`) VALUES
(2, 'Fundacion'),
(3, 'centro Escolar'),
(4, 'PAES'),
(5, 'TOELF'),
(6, 'Microsoft');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Certificacion`
--
ALTER TABLE `Certificacion`
  ADD PRIMARY KEY (`idCertificacion`),
  ADD KEY `idTipo` (`idTipo`),
  ADD KEY `idEstudiante` (`idEstudiante`);

--
-- Indices de la tabla `Documentos`
--
ALTER TABLE `Documentos`
  ADD PRIMARY KEY (`idDocumentos`),
  ADD KEY `idEstudiante` (`idEstudiante`);

--
-- Indices de la tabla `Estudiante`
--
ALTER TABLE `Estudiante`
  ADD PRIMARY KEY (`idEstudiante`);

--
-- Indices de la tabla `Materia`
--
ALTER TABLE `Materia`
  ADD PRIMARY KEY (`idMateria`);

--
-- Indices de la tabla `Nota`
--
ALTER TABLE `Nota`
  ADD PRIMARY KEY (`idNota`),
  ADD KEY `idEstudiante` (`idEstudiante`),
  ADD KEY `idMateria` (`idMateria`);

--
-- Indices de la tabla `Tipo`
--
ALTER TABLE `Tipo`
  ADD PRIMARY KEY (`idTipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Certificacion`
--
ALTER TABLE `Certificacion`
  MODIFY `idCertificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `Documentos`
--
ALTER TABLE `Documentos`
  MODIFY `idDocumentos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Estudiante`
--
ALTER TABLE `Estudiante`
  MODIFY `idEstudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `Materia`
--
ALTER TABLE `Materia`
  MODIFY `idMateria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Nota`
--
ALTER TABLE `Nota`
  MODIFY `idNota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Tipo`
--
ALTER TABLE `Tipo`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Certificacion`
--
ALTER TABLE `Certificacion`
  ADD CONSTRAINT `Certificacion_ibfk_1` FOREIGN KEY (`idTipo`) REFERENCES `Tipo` (`idTipo`),
  ADD CONSTRAINT `Certificacion_ibfk_2` FOREIGN KEY (`idEstudiante`) REFERENCES `Estudiante` (`idEstudiante`);

--
-- Filtros para la tabla `Documentos`
--
ALTER TABLE `Documentos`
  ADD CONSTRAINT `Documentos_ibfk_1` FOREIGN KEY (`idEstudiante`) REFERENCES `Estudiante` (`idEstudiante`);

--
-- Filtros para la tabla `Nota`
--
ALTER TABLE `Nota`
  ADD CONSTRAINT `Nota_ibfk_1` FOREIGN KEY (`idEstudiante`) REFERENCES `Estudiante` (`idEstudiante`),
  ADD CONSTRAINT `Nota_ibfk_2` FOREIGN KEY (`idMateria`) REFERENCES `Materia` (`idMateria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;