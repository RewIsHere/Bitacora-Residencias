<?php
session_start();
// PREGUNTA SI YA HEMOS INICIADO SESION EN CASO DE QUE NO, NOS REDIRECCIONA AL INICIO
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
    <link rel="stylesheet" href="css/register-styles.css">
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
    <form id="formRegistro" class="form-register" method="post">
        <h1>REGISTRATE</h1>
        <div CLASS="contenedor">
            <nav class="switch-cuenta">
                <a href="#">ALUMNO</a>
                <a href="docente-registro.php">DOCENTE</a>
            </nav>
            <div class="input-contenedor">
                <i class="fa-solid fa-person icon"></i>
                <input type="text" name="nombre" placeholder="Nombre" required>
            </div>

            <div class="input-contenedor">
                <i class="fa-solid fa-person icon"></i>
                <input type="text" name="apellido_pat" placeholder="Apellido Paterno" required>
            </div>

            <div class="input-contenedor">
                <i class="fa-solid fa-person icon"></i>
                <input type="text" name="apellido_mat" placeholder="Apellido Materno" required>
            </div>

            <div class="input-contenedor">
                <i class="fa-solid fa-gamepad icon"></i>
                <input type="text" name="num_control" placeholder="Numero de control" required>
            </div>

            <div class="input-contenedor">
                <i class="fa-solid fa-eye icon"></i>
                <input type="text" name="carrera" placeholder="Carrera" required>
            </div>

            <div class="input-contenedor">
                <i class="fa-solid fa-envelope icon"></i>
                <input type="email" name="correo" placeholder="Correo Institucional" required>
            </div>
            <div class="input-contenedor">
                <i class="fa-solid fa-gamepad icon"></i>
                <input type="password" name="contraseña" placeholder="Contraseña" required>
            </div>

            <div class="input-contenedor">
                <i class="fa-solid fa-mobile icon"></i>
                <input class="tel" type="tel" name="tel" placeholder="Numero Celular" required>
            </div>

            <div class="input-contenedor">
                <i class="fa-solid fa-hashtag icon"></i>
                <input type="number" name="semestre_cursado" placeholder="Semestre Cursado" required>
            </div>

            <div class="input-contenedor">
                <i class="fa-solid fa-arrow-up-9-1 icon"></i>
                <input type="number" name="mat_pend" placeholder="Materias Pendientes" required>
            </div>
            <input type="submit" name="REGISTRO" value="Registar" class="button">
            <br><br>
            <input type="reset" name="LIMPIAR" value="Limpiar" class="bot_reset">

            <p class> ¿YA TIENES UNA CUENTA? <a class="link" href="login.php">Iniciar Sesion</a></p>
        </div>
    </form>
</body>

</html>
<script src="js/registro.js"></script>