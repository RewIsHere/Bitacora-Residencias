-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2022 a las 17:19:15
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bitacora_residencias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `num_control` varchar(15) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido_pat` varchar(40) NOT NULL,
  `apellido_mat` varchar(40) NOT NULL,
  `carrera` varchar(60) NOT NULL,
  `semestre_cursado` int(11) NOT NULL,
  `mat_pend` int(11) NOT NULL,
  `tel` int(11) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `contraseña` varchar(20) NOT NULL,
  `Id_docs_a` int(11) NOT NULL,
  `Id_Empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`num_control`, `nombre`, `apellido_pat`, `apellido_mat`, `carrera`, `semestre_cursado`, `mat_pend`, `tel`, `correo`, `contraseña`, `Id_docs_a`, `Id_Empresa`) VALUES
('', 'asd', 'asd', '', 'sistemas', 5, 2, 0, '', '12345', 0, 0),
('12345', 'bryan', 'chena', 'gonzales', 'isc', 5, 2, 2147483647, 'yo@itspozarica.edu.mx', '1234567', 0, 0),
('12a', 'asd', 'asd', '', 'sistemas', 5, 2, 0, '', '12345', 0, 0),
('206p0361', 'omar', 'ape1', 'ape2', 'isc', 5, 2, 2147483647, 'yo@itspozarica.edu.mx', '1234567', 0, 0),
('222333', 'kevin', 'moedano', 'garcia', 'isc', 5, 2, 2147483647, 'kevin@hotmail.com', '1234', 0, 0),
('aaaa', 'asd', 'asd', 'asdas', 'aaa', 9, 1, 789, 'aaa@hotmail.com', 'omar', 0, 0),
('asda', 'asda', 'asda', '', 'sistemas', 5, 2, 0, '', 'asd2', 0, 0),
('asdasd2342', 'Omar Nayef', 'Pineda', 'Blanco', 'ISC', 2, 5, 2147483647, 'nayefblanco@hotmail.com', '1233123', 0, 0),
('asdasdasdas', 'asd', 'asdasd', '', 'sistemas', 5, 2, 0, '', 'asd2', 0, 0),
('mmmm', 'adasd', 'asda', 'asd', 'mm', 9, 2, 123, 'nayefblanco@hotmail.com', '1234', 0, 0),
('nada', 'prueba', '1', '2', 'isc', 5, 1, 123, 'nada@gmail.com', 'omar', 0, 0),
('ni', 'asd', 'asd', 'asdas', 'asd', 9, 1, 789, 'aaa@hotmail.com', 'omar', 0, 0),
('no', 'asd', 'asd', 'asdas', 'asd', 9, 1, 789, 'aaa@hotmail.com', 'omar', 0, 0),
('ppp', 'as dlasd', 'asd', 'qsapla', 'ppp', 8, 2, 89, 'pp@gmail.com', 'asd', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docs_alumno`
--

CREATE TABLE `docs_alumno` (
  `Solicitus_resi` varchar(200) NOT NULL,
  `Carta_acep` varchar(200) NOT NULL,
  `Reporte_pre` varchar(200) NOT NULL,
  `Reporte_final` varchar(200) NOT NULL,
  `Cumpl_resi_doce` varchar(200) NOT NULL,
  `Eva_segui` varchar(200) NOT NULL,
  `Car_termin_resi` varchar(200) NOT NULL,
  `Liberacion_repor` varchar(200) NOT NULL,
  `Id_doc_a` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `Nombre` varchar(60) NOT NULL,
  `Dependencia` int(60) NOT NULL,
  `Area` int(60) NOT NULL,
  `Direccion` int(150) NOT NULL,
  `Telefonos` int(15) NOT NULL,
  `Ase_Externo` varchar(100) NOT NULL,
  `Puesto` varchar(50) NOT NULL,
  `E-mail` int(100) NOT NULL,
  `Tel_contacto` int(15) NOT NULL,
  `Horario_Contacto` varchar(50) NOT NULL,
  `Fecha_ini` datetime NOT NULL,
  `Fecha_fin` datetime NOT NULL,
  `Id_Empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`num_control`),
  ADD KEY `Id_docs_a` (`Id_docs_a`,`Id_Empresa`);

--
-- Indices de la tabla `docs_alumno`
--
ALTER TABLE `docs_alumno`
  ADD PRIMARY KEY (`Id_doc_a`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`Id_Empresa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `docs_alumno`
--
ALTER TABLE `docs_alumno`
  MODIFY `Id_doc_a` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `Id_Empresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `docs_alumno`
--
ALTER TABLE `docs_alumno`
  ADD CONSTRAINT `docs_alumno_ibfk_1` FOREIGN KEY (`Id_doc_a`) REFERENCES `alumno` (`Id_docs_a`) ON DELETE CASCADE;

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`Id_Empresa`) REFERENCES `alumno` (`Id_Empresa`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
