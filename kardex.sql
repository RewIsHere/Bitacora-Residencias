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
  `foto` varchar(60) NOT NULL,
  `semestre_cursado` int(11) NOT NULL,
  `tel` int(14) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `contraseña` varchar(20) NOT NULL,
  `aprobado` int(1) NOT NULL 
);


-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `docente`
--
-- --------------------------------------------------------
CREATE TABLE `JefeCarrera` (
  `Id_jefe` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido_pat` varchar(40) NOT NULL,
  `apellido_mat` varchar(40) NOT NULL,
  `tel` int(11) NOT NULL,
  `correo` varchar(60) NOT NULL UNIQUE,
  `contraseña` varchar(20) NOT NULL
);

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `docs_alumno`
--
-- --------------------------------------------------------

CREATE TABLE `Solicitudes_alumno` (
  `Id_soli_a` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `Kardex` varchar(200),
  `Id_alumno` varchar(15) NOT NULL UNIQUE,
  FOREIGN KEY (`Id_alumno`)
  REFERENCES `alumno`(`num_control`) 
);


CREATE TABLE `docs_alumno` (
  `Id_docs_a` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `Kardex` varchar(200)
  `Id_soli_a` int(11) NOT NULL UNIQUE,
  FOREIGN KEY (`Id_soli_a`)
  REFERENCES `Solicitudes_alumno`(`Id_soli_a`) 
);


CREATE TABLE `comentario` (
  `Id_Comentario` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `Comentario` varchar(60) NOT NULL,
  `Fecha` date NOT NULL,
  `Id_alumno` varchar(15) NOT NULL,
  `Id_docente` int(11) NOT NULL,
  FOREIGN KEY (`Id_alumno`)
  REFERENCES `alumno`(`num_control`),
  FOREIGN KEY (`Id_docente`)
  REFERENCES `docente`(`Id_docente`)
);

-- PROCEDIMIENTO ALMACENADO PARA REGISTRAR A ALUMNOS
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `registar_alumno`(
num_control varchar(15),
nombre varchar(40),
apellido_pat varchar(40),
apellido_mat varchar(40),
foto varchar(60),
semestre_cursado int(11),
tel int(11),
correo varchar(60),
contraseña varchar(20),
aprobado int(1)
)
BEGIN
insert into `alumno`(`num_control`, `nombre`, `apellido_pat`, `apellido_mat`, `foto`, `semestre_cursado`, `tel`, `correo`, `contraseña`, `aprobado`) value(num_control, nombre, apellido_pat, apellido_mat, foto, semestre_cursado, tel, correo, contraseña, aprobado);
END$$
DELIMITER ;

-- PROCEDIMIENTO ALMACENADO PARA VERIFICAR SI LA CUENTA DEL ALUMNO EXISTE
DELIMITER $
CREATE DEFINER=`root`@`localhost` PROCEDURE `verificarCuenta`(IN `nocontrol` VARCHAR(255))
    NO SQL
SELECT num_control FROM alumno  WHERE num_control=nocontrol$
DELIMITER ;

-- PROCEDIMIENTO ALMACENADO PARA REGISTRAR A JEFE DE CARRERA
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `registar_jefe`(
nombre varchar(40),
apellido_pat varchar(40),
apellido_mat varchar(40),
tel int(11),
correo varchar(60),
contraseña varchar(20)
)
BEGIN
insert into `JefeCarrera`(`nombre`, `apellido_pat`, `apellido_mat`, `tel`, `correo`, `contraseña`) value(nombre, apellido_pat, apellido_mat, tel, correo, contraseña);
END$$
DELIMITER ;

-- PROCEDIMIENTO ALMACENADO PARA VERIFICAR SI LA CUENTA DEL JEFE DE CARRERA EXISTE
DELIMITER $
CREATE DEFINER=`root`@`localhost` PROCEDURE `verificarCuentaJefe`(IN `email` VARCHAR(255))
    NO SQL
SELECT correo FROM JefeCarrera  WHERE correo=email$
DELIMITER ;

-- PROCEDIMIENTO ALMACENADO PARA REGISTRAR A DOCENTES
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `agregar_comentario`(
Comentario varchar(60),
  Fecha date,
  Id_alumno varchar(15),
  Id_docente int(11)
)
BEGIN
insert into `comentario`(`Comentario`, `Fecha`, `Id_alumno`, `Id_docente`) value(Comentario, Fecha, Id_alumno, Id_docente);
END$$
DELIMITER ;

-- PROCEDIMIENTO ALMACENADO PARA VERIFICAR SI LA CUENTA DEL DOCENTE EXISTE
DELIMITER $
CREATE DEFINER=`root`@`localhost` PROCEDURE `verificarComentario`(IN `no_control` VARCHAR(255))
    NO SQL
SELECT Id_alumno FROM comentario  WHERE Id_alumno=no_control$
DELIMITER ;