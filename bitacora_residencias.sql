-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `alumno`
--
-- --------------------------------------------------------

CREATE TABLE `alumno` (
  `num_control` varchar(15) PRIMARY KEY NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido_pat` varchar(40) NOT NULL,
  `apellido_mat` varchar(40) NOT NULL,
  `carrera` varchar(60) NOT NULL,
  `semestre_cursado` int(11) NOT NULL,
  `mat_pend` int(11) NOT NULL,
  `tel` int(11) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `contraseña` varchar(20) NOT NULL 
);


-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `docente`
--
-- --------------------------------------------------------
CREATE TABLE `docente` (
  `Id_docente` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido_pat` varchar(40) NOT NULL,
  `apellido_mat` varchar(40) NOT NULL,
  `carrera` varchar(60) NOT NULL,
  `tel` int(11) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `contraseña` varchar(20) NOT NULL
);


--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`num_control`, `nombre`, `apellido_pat`, `apellido_mat`, `carrera`, `semestre_cursado`, `mat_pend`, `tel`, `correo`, `contraseña`) VALUES
('', 'asd', 'asd', '', 'sistemas', 5, 2, 0, '', '12345'),
('12345', 'bryan', 'chena', 'gonzales', 'isc', 5, 2, 2147483647, 'yo@itspozarica.edu.mx', '1234567'),
('12a', 'asd', 'asd', '', 'sistemas', 5, 2, 0, '', '12345'),
('206p0361', 'omar', 'ape1', 'ape2', 'isc', 5, 2, 2147483647, 'yo@itspozarica.edu.mx', '1234567'),
('222333', 'kevin', 'moedano', 'garcia', 'isc', 5, 2, 2147483647, 'kevin@hotmail.com', '1234'),
('aaaa', 'asd', 'asd', 'asdas', 'aaa', 9, 1, 789, 'aaa@hotmail.com', 'omar'),
('asda', 'asda', 'asda', '', 'sistemas', 5, 2, 0, '', 'asd2'),
('asdasd2342', 'Omar Nayef', 'Pineda', 'Blanco', 'ISC', 2, 5, 2147483647, 'nayefblanco@hotmail.com', '1233123'),
('asdasdasdas', 'asd', 'asdasd', '', 'sistemas', 5, 2, 0, '', 'asd2'),
('mmmm', 'adasd', 'asda', 'asd', 'mm', 9, 2, 123, 'nayefblanco@hotmail.com', '1234'),
('nada', 'prueba', '1', '2', 'isc', 5, 1, 123, 'nada@gmail.com', 'omar'),
('ni', 'asd', 'asd', 'asdas', 'asd', 9, 1, 789, 'aaa@hotmail.com', 'omar'),
('no', 'asd', 'asd', 'asdas', 'asd', 9, 1, 789, 'aaa@hotmail.com', 'omar'),
('ppp', 'as dlasd', 'asd', 'qsapla', 'ppp', 8, 2, 89, 'pp@gmail.com', 'asd');

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `docs_alumno`
--
-- --------------------------------------------------------

CREATE TABLE `docs_alumno` (
  `Id_docs_a` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `Solicitus_resi` varchar(200) NOT NULL,
  `Carta_acep` varchar(200) NOT NULL,
  `Reporte_pre` varchar(200) NOT NULL,
  `Reporte_final` varchar(200) NOT NULL,
  `Cumpl_resi_doce` varchar(200) NOT NULL,
  `Eva_segui` varchar(200) NOT NULL,
  `Eva_repor` varchar(200) NOT NULL,
  `Car_termin_resi` varchar(200) NOT NULL,
  `Liberacion_repor` varchar(200) NOT NULL,
  `Id_alumno` varchar(15) NOT NULL,
  FOREIGN KEY (`Id_alumno`)
  REFERENCES `alumno`(`num_control`) 
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

-- --------------------------------------------------------

CREATE TABLE `empresa` (
  `Id_Empresa` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `Nombre` varchar(60) NOT NULL,
  `Dependencia` varchar(60) NOT NULL,
  `Area` varchar(60) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Telefonos` varchar(100) NOT NULL,
  `Ase_Externo` varchar(100) NOT NULL,
  `Puesto` varchar(50) NOT NULL,
  `E-mail` varchar(60) NOT NULL,
  `Tel_contacto` int(15) NOT NULL,
  `Horario_Contacto` varchar(50) NOT NULL,
  `Fecha_ini` date NOT NULL,
  `Fecha_fin` date NOT NULL,
  `Id_alumno` varchar(15) NOT NULL,
  FOREIGN KEY (`Id_alumno`)
  REFERENCES `alumno`(`num_control`) 
);

-- PROCEDIMIENTO ALMACENADO PARA REGISTRAR A ALUMNOS
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `registar_alumno`(
num_control varchar(15),
nombre varchar(40),
apellido_pat varchar(40),
apellido_mat varchar(40),
carrera varchar(60),
semestre_cursado int(11),
mat_pend int(11),
tel int(11),
correo varchar(60),
contraseña varchar(20)
)
BEGIN
insert into `alumno`(`num_control`, `nombre`, `apellido_pat`, `apellido_mat`, `carrera`, `semestre_cursado`, `mat_pend`, `tel`, `correo`, `contraseña`) value(num_control, nombre, apellido_pat, apellido_mat, carrera, semestre_cursado, mat_pend, tel, correo, contraseña);
END$$
DELIMITER ;

-- PROCEDIMIENTO ALMACENADO PARA VERIFICAR SI LA CUENTA DEL ALUMNO EXISTE
DELIMITER $
CREATE DEFINER=`root`@`localhost` PROCEDURE `verificarCuenta`(IN `nocontrol` VARCHAR(255))
    NO SQL
SELECT num_control FROM alumno  WHERE num_control=nocontrol$
DELIMITER ;

-- PROCEDIMIENTO ALMACENADO PARA REGISTRAR A DOCENTES
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `registar_docente`(
nombre varchar(40),
apellido_pat varchar(40),
apellido_mat varchar(40),
carrera varchar(60),
tel int(11),
correo varchar(60),
contraseña varchar(20)
)
BEGIN
insert into `docente`(`nombre`, `apellido_pat`, `apellido_mat`, `carrera`, `tel`, `correo`, `contraseña`) value(nombre, apellido_pat, apellido_mat, carrera, tel, correo, contraseña);
END$$
DELIMITER ;

-- PROCEDIMIENTO ALMACENADO PARA VERIFICAR SI LA CUENTA DEL DOCENTE EXISTE
DELIMITER $
CREATE DEFINER=`root`@`localhost` PROCEDURE `verificarCuentaDocente`(IN `email` VARCHAR(255))
    NO SQL
SELECT correo FROM docente  WHERE correo=email$
DELIMITER ;

-- PROCEDIMIENTO ALMACENADO PARA REGISTRAR A DOCENTES
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `registrar_empresa`(
Nombre varchar(60),
  Dependencia varchar(60),
  Area varchar(60),
  Direccion varchar(100),
  Telefonos varchar(100),
  Ase_Externo varchar(100),
  Puesto varchar(50),
  Email varchar(60),
  Tel_contacto int(15),
  Horario_Contacto varchar(50),
  Fecha_ini date,
  Fecha_fin date,
  Id_alumno varchar(15)
)
BEGIN
insert into `empresa`(`Nombre`, `Dependencia`, `Area`, `Direccion`, `Telefonos`, `Ase_Externo`, `Puesto`, `E-mail`, `Tel_contacto`, `Horario_Contacto`, `Fecha_ini`, `Fecha_fin`, `Id_alumno`) value(Nombre, Dependencia, Area, Direccion, Telefonos, Ase_Externo, Puesto, Email, Tel_contacto, Horario_Contacto, Fecha_ini, Fecha_fin, Id_alumno);
END$$
DELIMITER ;

-- PROCEDIMIENTO ALMACENADO PARA VERIFICAR SI LA CUENTA DEL DOCENTE EXISTE
DELIMITER $
CREATE DEFINER=`root`@`localhost` PROCEDURE `verificarEmpresa`(IN `em_nom` VARCHAR(255))
    NO SQL
SELECT Nombre FROM empresa  WHERE Nombre=em_nom$
DELIMITER ;