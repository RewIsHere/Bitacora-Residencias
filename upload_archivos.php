<?php
// We need to use sessions, so you should always start sessions using the below code.
require_once 'services/ConexionBD.php';

session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['SesionIniciada'])) {
    header('Location: index.php');
    exit;
}
$uname = $_SESSION['no_control'];

if ($stmt = $con->prepare('SELECT * FROM docs_alumno WHERE Id_alumno = ?')) {
    $stmt->bind_param('s', $uname);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        header('Location: update_archivos.php');
    }

    // CIERRA LA CONEXION CON LA BASE DE DATOS 
    $stmt->close();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="description" content="BITACORA  RESIDENCIAS ITSPR">
    <meta name="key" content="BITACORA, REDICENCIAS, ITSPR, INSTITUTO TECNOLOGICO SUPERIOR DE POZA RICA">
    <META NAME="AUTHOR" CONTENT="Omar Nayef Pineda Blanco">
    <title>BITACORA ITSPR</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="IMAGENES_BD/LOGO_ITSPR.jpg" type="image/x-icon">
    <img src="assets/Tira_logo.jpg" width="1400" height="200">
</head>

<body>
    <header>
        <div width="1400" height="200" class="NAVEGADOR">
            <nav>
                <a href="index.php">Inicio</a>
                <a href="registro.php">REGISTRARSE</a>
                <a href="login.php">INICIAR SESION</a>
            </nav>
        </div>

        <form class="SUBIDA" action="includes/upload_archivos.php" method="post" enctype="multipart/form-data">
            <h1>SUBE TUS ARCHIVOS</h1>
            <div class="contenedor_1">
                <div class="input-contenedor">
                    <label for="Solicitus_resi">1. SOLICITUED RESIDENCIA</label>
                    <input type="file" name="Solicitus_resi" class="input-cont1">
                </div>
                <div class="input-contenedor">
                    <label for="Carta_acep">2. CARTA ACEPTACION</label>
                    <input type="file" name="Carta_acep" class="input-cont1">
                </div>
                <div class="input-contenedor">
                    <label for="Reporte_pre">3. REPORTE PRELIMINAR</label>
                    <input type="file" name="Reporte_pre" class="input-cont1">
                </div>
                <div class="input-contenedor">
                    <label for="Reporte_final">4. REPORTE FINAL</label>
                    <input type="file" name="Reporte_final" class="input-cont1">
                </div>
                <div class="input-contenedor">
                    <label for="Cumpl_resi_doce">5. CUMPLIMIENTO DE RESIDENCIA DOCENTE</label>
                    <input type="file" name="Cumpl_resi_doce" class="input-cont1">
                </div>
                <div class="input-contenedor">
                    <label for="Eva_segui">6. EVALUACION Y SEGUIMIENTO</label>
                    <input type="file" name="Eva_segui" class="input-cont1">
                </div>
                <div class="input-contenedor">
                    <label for="Eva_repor">7. EVALUACION Y REPORTE</label>
                    <input type="file" name="Eva_repor" class="input-cont1">
                </div>
                <div class="input-contenedor">
                    <label for="Car_termin_resi">8. CARTA TERMINACION RESIDENCIAS</label>
                    <input type="file" name="Car_termin_resi" class="input-cont1">
                </div>
                <div class="input-contenedor">
                    <label for="Liberacion_repor">9. LIBERACION DE REPORTE RESIDENCIAS</label>
                    <input type="file" name="Liberacion_repor" class="input-cont1">
                </div>
                <br><br>
                <button>SUBIR</button>
            </div>
        </form>

</body>

</html>