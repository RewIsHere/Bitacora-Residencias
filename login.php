<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (isset($_SESSION['SesionIniciada'])) {
    header('Location: inicio.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta>
    <script src="https://kit.fontawesome.com/ba719609d3.js" crossorigin="anonymous"></script>
    <meta name="description" content="BITACORA  RESIDENCIAS ITSPR">
    <meta name="key" content="BITACORA, REDICENCIAS, ITSPR, INSTITUTO TECNOLOGICO SUPERIOR DE POZA RICA">
    <META NAME="AUTHOR" CONTENT="Omar Nayef Pineda Blanco">
    <title>BITACORA ITSPR</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="IMAGENES_BD/LOGO_ITSPR.jpg" type="image/x-icon">
    <img src="IMAGENES_BD/Tira_logo.jpg" width="1400" height="200">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <header>
        <nav>
            <a href="index.php">Inicio</a>
            <a href="registro.php">REGISTRARSE</a>
            <a href="login.php">INICIAR SESION</a>
        </nav>
    </header>
    <form class="LOGIN" method="post" action="includes/login.php">
        <h1>INICIA SESION</h1>
        <div class="contenedor1">
            <nav>
                <a href="#">ALUMNO</a>
                <a href="docente-login.php">DOCENTE</a>
            </nav>
            <div class="input-contenedor1">
                <i class="fa-solid fa-person icon"></i>
                <input type="text" name="num_control" placeholder="NUMERO DE CONTROL" required>
            </div>

            <div class="input-contenedor1">
                <i class="fa-solid fa-person icon"></i>
                <input type="password" name="contraseña" placeholder="CONTRASEÑA" required>
            </div>

            <input type="submit" value="Logear">
        </div>
    </form>
</body>

</html>