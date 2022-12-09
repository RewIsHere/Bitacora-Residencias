<?php
// VINCULACION CON LA BASE DE DATOS
require_once '../services/ConexionBD.php';
// INICIAMOS EL PROCESO DE SESION
session_start();

// CREAMOS VARIABLES QUE EQUIVALEN A CADA CAMPO DEL FORMULARIO
$Nombre = $_POST['Nombre'];
$Dependencia = $_POST['Dependencia'];
$Area = $_POST['Area'];
$Direccion = $_POST['Direccion'];
$Telefonos = $_POST['Telefonos'];
$Ase_Externo = $_POST['Ase_Externo'];
$Puesto = $_POST['Puesto'];
$email = $_POST['E-mail'];
$Tel_contacto = $_POST['Tel_contacto'];
$Horario_Contacto = $_POST['Horario_Contacto'];
$Fecha_ini = $_POST['Fecha_ini'];
$Fecha_fin = $_POST['Fecha_fin'];
$no_control = $_SESSION['no_control'];

// PREPARA EL QUERY PARA LLAMAR AL PROCEDIMIENTO ALMACENADO DE VERIFICAR EMPRESA
if ($stmt = $con->prepare("call verificarEmpresa('$Nombre')")) {
    $stmt->execute();
    $stmt->store_result();
    // PREGUNTA SI EL QUERY QUE LLAMAMOS ANTERIORMENTE TIENE UNA COLUMNA CON EL NOMBRE DE LA EMPRESA PUESTO EN EL FORMULARIO
    if ($stmt->num_rows > 0) {
        // EN CASO DE QUE EXISTA MARCARA ERROR
        echo "error";
    } else {
        $stmt->close();
        // LA EMPRESA NO EXISTE, POR LO TANTO PREPARAMOS OTRO PROCEDIMIENTO ALMACENADO PARA INGRESAR UN REGISTRO A LA TABLA EMPRESA
        if ($stmt = $con->prepare("call registrar_empresa('$Nombre','$Dependencia','$Area','$Direccion','$Telefonos','$Ase_Externo','$Puesto','$email','$Tel_contacto','$Horario_Contacto','$Fecha_ini','$Fecha_fin','$no_control')")) {
            $stmt->execute();
            echo "success";
        } else {
            // EN CASO DE ALGUN PROBLEMA NOS MARCARA ERROR
            echo "fatal-error";
        }
    }
    $stmt->close();
} else {
    // EN CASO DE ALGUN PROBLEMA NOS MARCARA ERROR
    echo "fatal-error";
}
// CIERRA LA CONEXION
$con->close();
