<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['SesionIniciada'])) {
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
</head>

<body>
    <header>
        <nav>
            <a href="index.php">Inicio</a>
            <a href="registro.php">REGISTRARSE</a>
            <a href="login.php">INICIAR SESION</a>
        </nav>
    </header>
    <form class="COMPLETAR" method="post" action="includes/empresa.php">
        <h1>LLENA LOS DATOS DE LA EMPRESA</h1>
        <div class="contenedor">

            <div class="input-contenedor">
                <i class="fa-solid fa-person icon"></i>
                <input type="text" name="Nombre" placeholder="Nombre de Empresa" required>
            </div>

            <div class="input-contenedor">
                <i class="fa-solid fa-person icon"></i>
                <input type="text" name="Dependencia" placeholder="Dependencia" required>
            </div>

            <div class="input-contenedor">
                <i class="fa-solid fa-person icon"></i>
                <input type="text" name="Area" placeholder="Area" required>
            </div>

            <div class="input-contenedor">
                <i class="fa-solid fa-gamepad icon"></i>
                <input type="text" name="Direccion" placeholder="Direccion" required>
            </div>

            <div class="input-contenedor">
                <i class="fa-solid fa-eye icon"></i>
                <input type="text" name="Telefonos" placeholder="Telefonos" required>
            </div>

            <div class="input-contenedor">
                <i class="fa-solid fa-envelope icon"></i>
                <input type="text" name="Ase_Externo" placeholder="Asesor Xxterno" required>
            </div>
            <div class="input-contenedor">
                <i class="fa-solid fa-gamepad icon"></i>
                <input type="text" name="Puesto" placeholder="Puesto" required>
            </div>

            <div class="input-contenedor">
                <i class="fa-solid fa-mobile icon"></i>
                <input type="email" name="E-mail" placeholder="E-mail" required>
            </div>

            <div class="input-contenedor">
                <i class="fa-solid fa-hashtag icon"></i>
                <input type="tel" name="Tel_contacto" placeholder="Telefono de Contacto" required>
            </div>
            <div class="input-contenedor">
                <i class="fa-solid fa-hashtag icon"></i>
                <input type="text" name="Horario_Contacto" placeholder="Horario de Contacto" required>
            </div>
            <div class="input-contenedor">
                <i class="fa-solid fa-hashtag icon"></i>
                <input type="date" name="Fecha_ini" placeholder="Fecha de Inicio" required>
            </div>
            <div class="input-contenedor">
                <i class="fa-solid fa-hashtag icon"></i>
                <input type="date" name="Fecha_fin" placeholder="Fecha de Fin" required>
            </div>

            <input type="submit" name="COMPLETAR" value="COMPLETAR" class="button">


        </div>
    </form>
</body>

</html>