<?php
// VINCULACION CON LA BASE DE DATOS
require_once '../services/ConexionBD.php';
// INICIAMOS EL PROCESO DE SESION
session_start();

// CREAMOS VARIABLES QUE EQUIVALEN A CADA CAMPO DEL FORMULARIO
$request = $_REQUEST;
$mensaje = $request['mensaje'];
$num_control = $request['num_control'];
date_default_timezone_set('Mexico/General');
$date = date('d-m-y');
$docente_correo = $_SESSION['correo'];

$query1 = "SELECT * FROM docente WHERE correo ='" . $docente_correo . "' ";
$sql1 = $con->query($query1);
$row1 = $sql1->fetch_assoc();
$docente_id = $row1['Id_docente'];

// PREPARA EL QUERY PARA LLAMAR AL PROCEDIMIENTO ALMACENADO DE VERIFICAR EMPRESA
if ($stmt = $con->prepare("call verificarComentario('$num_control')")) {
    $stmt->execute();
    $stmt->store_result();
    // PREGUNTA SI EL QUERY QUE LLAMAMOS ANTERIORMENTE TIENE UNA COLUMNA CON EL NOMBRE DE LA EMPRESA PUESTO EN EL FORMULARIO
    if ($stmt->num_rows > 0) {
        // EN CASO DE QUE EXISTA MARCARA ERROR
        echo "error";
    } else {
        $stmt->close();
        // LA EMPRESA NO EXISTE, POR LO TANTO PREPARAMOS OTRO PROCEDIMIENTO ALMACENADO PARA INGRESAR UN REGISTRO A LA TABLA EMPRESA
        if ($stmt = $con->prepare("call agregar_comentario('$mensaje','$date','$num_control','1')")) {
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
