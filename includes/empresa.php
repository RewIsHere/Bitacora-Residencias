<?php
// include database connection file
require_once '../services/ConexionBD.php';
// Now we check if the data was submitted, isset() function will check if the data exists.

session_start();

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
// Call the store procedure for insertion

// We need to check if the account with that username exists.
if ($stmt = $con->prepare("call verificarEmpresa('$Nombre')")) {
    // Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
    $stmt->execute();
    $stmt->store_result();
    // Store the result so we can check if the account exists in the database.
    if ($stmt->num_rows > 0) {
        // Username already exists
        echo $stmt->num_rows;
        echo 'La empresa ya existe!';
    } else {
        $stmt->close();
        // Username doesnt exists, insert new account
        if ($stmt = $con->prepare("call registrar_empresa('$Nombre','$Dependencia','$Area','$Direccion','$Telefonos','$Ase_Externo','$Puesto','$email','$Tel_contacto','$Horario_Contacto','$Fecha_ini','$Fecha_fin','$no_control')")) {
            // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
            $stmt->execute();
            echo 'Se ha completado el perfil correctamente';
        } else {
            // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
            echo 'Could not prepare statement!';
        }
    }
    $stmt->close();
} else {
    // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
    echo 'Could not prepare statement!';
}
$con->close();
