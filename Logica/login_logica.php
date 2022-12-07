<?php
require_once '../Servicios/ConexionBD.php';

if (!isset($_POST['num_control'], $_POST['contraseña'])) {
        exit('Por favor , llena ambos campos para poder iniciar sesion!');
}
session_start();

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT num_control, nombre, contraseña FROM alumno WHERE num_control = ?')) {
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
        $stmt->bind_param('s', $_POST['num_control']);
        $stmt->execute();
        // Store the result so we can check if the account exists in the database.
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
                $stmt->bind_result($no_control, $nombre, $contra);
                $stmt->fetch();
                // Account exists, now we verify the password.
                // Note: remember to use password_hash in your registration file to store the hashed passwords.
                if ($_POST['contraseña'] === $contra) {
                        // Verification success! User has logged-in!
                        // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
                        session_regenerate_id();
                        $_SESSION['SesionIniciada'] = TRUE;
                        $_SESSION['nombre'] = $nombre;
                        header('Location: ../inicio.php');
                } else {
                        // Incorrect password
                        echo 'Contraseña incorrecta!';
                }
        } else {
                // Incorrect username
                echo 'Este usuario no existe!';
        }

        $stmt->close();
}
