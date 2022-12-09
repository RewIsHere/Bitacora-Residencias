<?php
require_once '../services/ConexionBD.php';
// PREGUNTAMOS SI ALGUNO DE LOS CAMPOS DEL FORMULARIO DE REGISTRO HA SIDO ESTABLECIDO
if (!isset($_POST['nombre'], $_POST['num_control'], $_POST['contraseña'], $_POST['correo'])) {
    // EN CASO DE ESTAR VACIO ALGUNO, NOS MARCARA ERROR
    exit('Please complete the registration form!');
}
// PREGUNTAMOS SI ALGUN CAMPO ESTA VACIO
if (empty($_POST['nombre']) || empty($_POST['num_control']) || empty($_POST['contraseña']) || empty($_POST['correo'])) {
    // NUEVAMENTE NOS MARCARA ERROR EN CASO DE QUE LO ESTE
    exit('Please complete the registration form');
}

// DEFINIMOS VARIABLES PARA OBTENER LOS CAMPOS DEL FORMULARIO

$nombre = $_POST['nombre'];
$apellido_pat = $_POST['apellido_pat'];
$apellido_mat = $_POST['apellido_mat'];
$num_control = $_POST['num_control'];
$carrera = $_POST['carrera'];
$correo = $_POST['correo'];
$contra = $_POST['contraseña'];
$tel = $_POST['tel'];
$sem_cursado = $_POST['semestre_cursado'];
$mat_pend = $_POST['mat_pend'];

// LLAMAMOS A UN PROCEDIMIENTO ALMACENADO PARA VERIFICAR SI LA CUENTA EXISTE
if ($stmt = $con->prepare("call verificarCuenta('$num_control')")) {
    $stmt->execute();
    $stmt->store_result();
    // SI DA MAYOR A 1 SIGNIFICA QUE EL PROCEDIMIENTO ALMACENADO ENCONTRO A UN USUARIO CON ESE NOMBRE
    if ($stmt->num_rows > 0) {
        // SI EXISTE LA CUENTA NOS MARCARA ERROR
        echo "error";
    } else {
        $stmt->close();
        // LA CUENTA NO EXISTE , LLAMAMOS AL PROCEDIMIENTO ALMACENADO PARA CREAR LA CUENTA
        if ($stmt = $con->prepare("call registar_alumno('$num_control','$nombre','$apellido_pat','$apellido_mat','$carrera','$sem_cursado','$mat_pend','$tel','$correo','$contra')")) {
            $stmt->execute();
            echo "success";
        } else {
            // EN CASO DE ERROR NOS LO MARCARA
            echo "fatal_error";
        }
    }
    // CIERRA EL QUERY

    $stmt->close();
} else {
    // EN CASO DE ERROR NOS LO MARCARA
    echo "fatal_error";
}
// CIERRA LA CONEXION
$con->close();
