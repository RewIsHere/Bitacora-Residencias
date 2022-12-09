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
    <link rel="stylesheet" href="css/login-styles.css">
    <link rel="shortcut icon" href="assets/LOGO_ITSPR.jpg" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

</head>

<body>
    <header>
        <div class="tira-header">
            <img class="tira-header__img" src="assets/Tira_logo.jpg">
        </div>
        <div id="nav-sup" class="navegacion">
            <ul class="navegacion__navegacion-list navegacion__menu">
                <li>
                    <a href="index.php">INICIO</a>
                </li>
                <li>
                    <a href="registro.php">REGISTRARSE</a>
                </li>
                <li>
                    <a href="login.php" class="active">INICIAR SESION</a>
                </li>
            </ul>
        </div>
    </header>
    <form id="formLogin" class="form-login" method="post">
        <h1>INICIA SESION</h1>
        <div class="contenedor1">
            <nav class="switch-cuenta">
                <a href="login.php">ALUMNO</a>
                <a href="#">DOCENTE</a>
            </nav>
            <div class="input-contenedor1">
                <i class="fa-solid fa-person icon"></i>
                <input type="text" name="correo" placeholder="CORREO INSTITUCIONAL" required>
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
<script src="js/login-d.js"></script>