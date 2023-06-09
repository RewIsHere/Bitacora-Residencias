<?php
require_once 'services/ConexionBD.php';

session_start();
// PREGUNTA SI YA HEMOS INICIADO SESION EN CASO DE QUE NO, NOS REDIRECCIONA AL INDEX
if (!isset($_SESSION['SesionIniciada'])) {
    header('Location: index.php');
    exit;
}

$solicitado = '<span class="badge bg-primary">DOCUMENTADO SOLIKCITADO</span>';
$nosolicitado = '<span class="badge bg-danger">Aun no subido</span>';

$uname = $_SESSION['no_control'];
$globalquery = "SELECT * FROM alumno WHERE num_control ='" . $uname . "' ";
$globalsql = $con->query($globalquery);
$row = $globalsql->fetch_assoc();
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="description" content="BITACORA  RESIDENCIAS ITSPR">
    <meta name="key" content="BITACORA, REDICENCIAS, ITSPR, INSTITUTO TECNOLOGICO SUPERIOR DE POZA RICA">
    <META NAME="AUTHOR" CONTENT="None">
    <title>BITACORA ITSPR</title>
    <link rel="stylesheet" href="css/pruebas.css">
    <link rel="shortcut icon" href="assets/LOGO_ITSPR.jpg" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>
</head>

<body>
    <header>
        <div class="tira-header">
            <img class="tira-header__img" src="assets/Tira_logo.jpg">
        </div>
        <div id="nav-sup" class="navegacion">
            <ul class="navegacion__navegacion-list navegacion__menu">
                <li>
                    <a href="index.php" class="active">INICIO</a>
                </li>
                <li>
                    <a href="registro.php">REGISTRARSE</a>
                </li>
                <li>
                    <a href="login.php">INICIAR SESION</a>
                </li>
            </ul>
        </div>
    </header>

    <div class="container mt-5">
        <div class="col-12">
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">


                            <div class="col-12 row">


                                <form id="form-subir" class="form-subir" method="post" enctype="multipart/form-data">
                                    <div class="contenedor_1">
                                        <div class="form-group col-3">
                                            <label class="pb-2">Tipo de Documento</label>
                                            <select class="form-control" name="tipo_doc" id="tipo_doc">
                                                <option value="Kardex">Kardex</option>
                                            </select>
                                        </div>
                                        <div class="col-1">
                                            <input type="submit" class="btn " value="Solicitar" style="margin-top: 38px; background-color: purple; color: white;">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <h1 class="archivo-title">Kardex</h1>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr style="background-color: #f97c46;color:#FFFFFF;text-align: center;">
                                            <th>Completado</th>
                                            <th>Nombre</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody id="Solicitud_resi">
                                        <?php

                                        $archivoquery1 = "SELECT Kardex FROM Solicitudes_alumno WHERE Id_alumno ='" . $row["num_control"] . "' AND Kardex != ''";
                                        $archivosql1 = $con->query($archivoquery1);
                                        if ($archivosql1) {
                                            if (mysqli_num_rows($archivosql1) > 0) {
                                                $archivorow1 = $archivosql1->fetch_assoc();
                                                $col1 = $solicitado;
                                                $col2 = 'DOCUMENTO SOLICITADO';
                                            } else {
                                                $col1 = $nosolicitado;
                                                $col2 = 'AUN NO SOLICITADO';
                                            }
                                        } else {
                                            echo 'Error';
                                        }

                                        $archivoquery1 = "SELECT Kardex FROM docs_alumno WHERE Id_soli_a ='" . $row["num_control"] . "' AND Kardex != ''";
                                        $archivosql1 = $con->query($archivoquery1);
                                        if ($archivosql1) {
                                            if (mysqli_num_rows($archivosql1) > 0) {
                                                $archivorow1 = $archivosql1->fetch_assoc();
                                                $col1 = $solicitado;
                                                $col2 = 'DOCUMENTO SOLICITADO';
                                            } else {
                                                $col1 = $nosolicitado;
                                                $col2 = 'AUN NO SOLICITADO';
                                            }
                                        } else {
                                            echo 'Error';
                                        }



                                        ?>

                                        <tr>
                                            <td style="text-align: center;"><?php echo $col1; ?></td>
                                            <td style="text-align: center;"><?php echo $row["nombre"] . ' ' . $row["apellido_pat"] . ' ' . $row["apellido_mat"]; ?></td>
                                            <td style="text-align: center;"><?php echo $col2 ?></td>
                                        </tr>

                                        <?php //} 
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/upload-archivos.js"></script>
</body>

</html>