<?php
// include database connection file
require_once '../services/ConexionBD.php';
// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['nombre'], $_POST['num_control'], $_POST['contraseña'], $_POST['correo'])) {
    // Could not get the data that should have been sent.
    exit('Please complete the registration form!');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['nombre']) || empty($_POST['num_control']) || empty($_POST['contraseña']) || empty($_POST['correo'])) {
    // One or more values are empty.
    exit('Please complete the registration form');
}

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
// Call the store procedure for insertion

// We need to check if the account with that username exists.
if ($stmt = $con->prepare("call verificarCuenta('$num_control')")) {
    // Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
    $stmt->execute();
    $stmt->store_result();
    // Store the result so we can check if the account exists in the database.
    if ($stmt->num_rows > 0) {
        // Username already exists
        echo $stmt->num_rows;
        echo 'Username exists, please choose another!';
    } else {
        $stmt->close();
        // Username doesnt exists, insert new account
        if ($stmt = $con->prepare("call registar_alumno('$num_control','$nombre','$apellido_pat','$apellido_mat','$carrera','$sem_cursado','$mat_pend','$tel','$correo','$contra')")) {
            // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
            $stmt->execute();
            echo 'You have successfully registered, you can now login!';
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
