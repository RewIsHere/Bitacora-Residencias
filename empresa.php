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
    <link rel="stylesheet" href="css/empresa-styles.css">
    <link rel="shortcut icon" href="assets/LOGO_ITSPR.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
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
    <nav class="navtop">
        <div>
            <h1>Panel de Usuario</h1>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Cerrar Sesion</a>
        </div>
    </nav>
    <div class="content">
        <h2>Inicio | Panel de Usuario</h2>
        <a href="inicio.php" class="btn btn-warning" role="button">VOLVER AL PANEL</a>
        <form id="formEmpresa" class="form-empresa" method="post">
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
    </div>
</body>

</html>
<script src="js/empresa.js"></script>