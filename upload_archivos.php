<?php
require_once 'services/ConexionBD.php';

session_start();
// PREGUNTA SI YA HEMOS INICIADO SESION EN CASO DE QUE NO, NOS REDIRECCIONA AL INDEX
if (!isset($_SESSION['SesionIniciada'])) {
    header('Location: index.php');
    exit;
}

$subido = '<span class="badge bg-primary">Archivo subido</span>';
$nosubido = '<span class="badge bg-danger">Aun no subido</span>';

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
    <META NAME="AUTHOR" CONTENT="Omar Nayef Pineda Blanco">
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
                                                <option value="Solicitud_resi">Solicitud de residencia</option>
                                                <option value="Carta_acep">Carta de Aceptacion</option>
                                                <option value="Reporte_pre">Reporte Preliminar</option>
                                                <option value="Reporte_final">Reporte Final</option>
                                                <option value="Cumpl_resi_doce">Cumplimiento Residencias Docente</option>
                                                <option value="Eva_segui">Evaluacion de Seguimiento</option>
                                                <option value="Eva_repor">Evaluacion Reporte</option>
                                                <option value="Car_termin_resi">Carta de Terminacion de Residencias</option>
                                                <option value="Liberacion_repor">Liberacion Reporte</option>
                                            </select>
                                        </div>
                                        <input type="file" name="archivo" id="archivo" class="input-cont1" />
                                        <div class="col-1">
                                            <input type="submit" class="btn " value="Ver" style="margin-top: 38px; background-color: purple; color: white;">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <h1 class="archivo-title">Solicitud de Residencia</h1>
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

                                        $archivoquery1 = "SELECT Solicitud_resi FROM docs_alumno WHERE Id_alumno ='" . $row["num_control"] . "' AND Solicitud_resi != ''";
                                        $archivosql1 = $con->query($archivoquery1);
                                        if ($archivosql1) {
                                            if (mysqli_num_rows($archivosql1) > 0) {
                                                $archivorow1 = $archivosql1->fetch_assoc();
                                                $col1 = $subido;
                                                $col2 = '<a href="archivos/' . $archivorow1["Solicitud_resi"] . '" target="_blank"  class="btn btn-warning" role="button">Abrir</a>';
                                            } else {
                                                $col1 = $nosubido;
                                                $col2 = 'NO DISPONIBLE';
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
                            <h1 class="archivo-title">Carta de Aceptacion</h1>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr style="background-color: #f97c46;color:#FFFFFF;text-align: center;">
                                            <th>Completado</th>
                                            <th>Nombre</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody id="Carta_acep">
                                        <?php

                                        $archivoquery2 = "SELECT Carta_acep FROM docs_alumno WHERE Id_alumno ='" . $row["num_control"] . "' AND Carta_acep != ''";
                                        $archivosql2 = $con->query($archivoquery2);
                                        if ($archivosql2) {
                                            if (mysqli_num_rows($archivosql2) > 0) {
                                                $archivorow2 = $archivosql2->fetch_assoc();
                                                $col3 = $subido;
                                                $col4 = '<a href="archivos/' . $archivorow2["Carta_acep"] . '" target="_blank" class="btn btn-warning" role="button">Abrir</a>';
                                            } else {
                                                $col3 = $nosubido;
                                                $col4 = 'NO DISPONIBLE';
                                            }
                                        } else {
                                            echo 'Error';
                                        }

                                        ?>

                                        <tr>
                                            <td style="text-align: center;"><?php echo $col3;  ?></td>
                                            <td style="text-align: center;"><?php echo $row["nombre"] . ' ' . $row["apellido_pat"] . ' ' . $row["apellido_mat"]; ?></td>
                                            <td style="text-align: center;"><?php echo $col4 ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h1 class="archivo-title">Reporte preliminar</h1>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr style="background-color: #f97c46;color:#FFFFFF;text-align: center;">
                                            <th>Completado</th>
                                            <th>Nombre</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody id="Reporte_pre">
                                        <?php

                                        $archivoquery3 = "SELECT Reporte_pre FROM docs_alumno WHERE Id_alumno ='" . $row["num_control"] . "' AND Reporte_pre != ''";
                                        $archivosql3 = $con->query($archivoquery3);
                                        if ($archivosql3) {
                                            if (mysqli_num_rows($archivosql3) > 0) {
                                                $archivorow3 = $archivosql3->fetch_assoc();
                                                $col5 = $subido;
                                                $col6 = '<a href="archivos/' . $archivorow3["Reporte_pre"] . '" target="_blank" class="btn btn-warning" role="button">Abrir</a>';
                                            } else {
                                                $col5 = $nosubido;
                                                $col6 = 'NO DISPONIBLE';
                                            }
                                        } else {
                                            echo 'Error';
                                        }

                                        ?>

                                        <tr>
                                            <td style="text-align: center;"><?php echo $col5;  ?></td>
                                            <td style="text-align: center;"><?php echo $row["nombre"] . ' ' . $row["apellido_pat"] . ' ' . $row["apellido_mat"]; ?></td>
                                            <td style="text-align: center;"><?php echo $col6 ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h1 class="archivo-title">Reporte final</h1>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr style="background-color: #f97c46;color:#FFFFFF;text-align: center;">
                                            <th>Completado</th>
                                            <th>Nombre</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody id="Reporte_final">
                                        <?php

                                        $archivoquery4 = "SELECT Reporte_final FROM docs_alumno WHERE Id_alumno ='" . $row["num_control"] . "' AND Reporte_final != ''";
                                        $archivosql4 = $con->query($archivoquery4);
                                        if ($archivosql4) {
                                            if (mysqli_num_rows($archivosql4) > 0) {
                                                $archivorow4 = $archivosql4->fetch_assoc();
                                                $col7 = $subido;
                                                $col8 = '<a href="archivos/' . $archivorow4["Reporte_final"] . '" target="_blank" class="btn btn-warning" role="button">Abrir</a>';
                                            } else {
                                                $col7 = $nosubido;
                                                $col8 = 'NO DISPONIBLE';
                                            }
                                        } else {
                                            echo 'Error';
                                        }

                                        ?>

                                        <tr>
                                            <td style="text-align: center;"><?php echo $col7;  ?></td>
                                            <td style="text-align: center;"><?php echo $row["nombre"] . ' ' . $row["apellido_pat"] . ' ' . $row["apellido_mat"]; ?></td>
                                            <td style="text-align: center;"><?php echo $col8 ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h1 class="archivo-title">Cumplimiento de Residencias Docente</h1>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr style="background-color: #f97c46;color:#FFFFFF;text-align: center;">
                                            <th>Completado</th>
                                            <th>Nombre</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody id="Cumpl_resi_doce">
                                        <?php

                                        $archivoquery5 = "SELECT Cumpl_resi_doce FROM docs_alumno WHERE Id_alumno ='" . $row["num_control"] . "' AND Cumpl_resi_doce != ''";
                                        $archivosql5 = $con->query($archivoquery5);
                                        if ($archivosql5) {
                                            if (mysqli_num_rows($archivosql5) > 0) {
                                                $archivorow5 = $archivosql5->fetch_assoc();
                                                $col9 = $subido;
                                                $col10 = '<a href="archivos/' . $archivorow5["Cumpl_resi_doce"] . '" target="_blank" class="btn btn-warning" role="button">Abrir</a>';
                                            } else {
                                                $col9 = $nosubido;
                                                $col10 = 'NO DISPONIBLE';
                                            }
                                        } else {
                                            echo 'Error';
                                        }

                                        ?>

                                        <tr>
                                            <td style="text-align: center;"><?php echo $col9;  ?></td>
                                            <td style="text-align: center;"><?php echo $row["nombre"] . ' ' . $row["apellido_pat"] . ' ' . $row["apellido_mat"]; ?></td>
                                            <td style="text-align: center;"><?php echo $col10 ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h1 class="archivo-title">Evaluacion de Seguimiento</h1>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr style="background-color: #f97c46;color:#FFFFFF;text-align: center;">
                                            <th>Completado</th>
                                            <th>Nombre</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody id="Eva_segui">
                                        <?php

                                        $archivoquery6 = "SELECT Eva_segui FROM docs_alumno WHERE Id_alumno ='" . $row["num_control"] . "' AND Eva_segui != ''";
                                        $archivosql6 = $con->query($archivoquery6);
                                        if ($archivosql6) {
                                            if (mysqli_num_rows($archivosql6) > 0) {
                                                $archivorow6 = $archivosql6->fetch_assoc();
                                                $col11 = $subido;
                                                $col12 = '<a href="archivos/' . $archivorow6["Eva_segui"] . '" target="_blank" class="btn btn-warning" role="button">Abrir</a>';
                                            } else {
                                                $col11 = $nosubido;
                                                $col12 = 'NO DISPONIBLE';
                                            }
                                        } else {
                                            echo 'Error';
                                        }

                                        ?>

                                        <tr>
                                            <td style="text-align: center;"><?php echo $col11;  ?></td>
                                            <td style="text-align: center;"><?php echo $row["nombre"] . ' ' . $row["apellido_pat"] . ' ' . $row["apellido_mat"]; ?></td>
                                            <td style="text-align: center;"><?php echo $col12 ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h1 class="archivo-title">Evaluacion Reporte</h1>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr style="background-color: #f97c46;color:#FFFFFF;text-align: center;">
                                            <th>Completado</th>
                                            <th>Nombre</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody id="Eva_repor">
                                        <?php

                                        $archivoquery7 = "SELECT Eva_repor FROM docs_alumno WHERE Id_alumno ='" . $row["num_control"] . "' AND Eva_repor != ''";
                                        $archivosql7 = $con->query($archivoquery7);
                                        if ($archivosql7) {
                                            if (mysqli_num_rows($archivosql7) > 0) {
                                                $archivorow7 = $archivosql7->fetch_assoc();
                                                $col13 = $subido;
                                                $col14 = '<a href="archivos/' . $archivorow7["Eva_repor"] . '" target="_blank" class="btn btn-warning" role="button">Abrir</a>';
                                            } else {
                                                $col13 = $nosubido;
                                                $col14 = 'NO DISPONIBLE';
                                            }
                                        } else {
                                            echo 'Error';
                                        }

                                        ?>

                                        <tr>
                                            <td style="text-align: center;"><?php echo $col13;  ?></td>
                                            <td style="text-align: center;"><?php echo $row["nombre"] . ' ' . $row["apellido_pat"] . ' ' . $row["apellido_mat"]; ?></td>
                                            <td style="text-align: center;"><?php echo $col14 ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h1 class="archivo-title">Carta de Terminacion de Residencias</h1>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr style="background-color: #f97c46;color:#FFFFFF;text-align: center;">
                                            <th>Completado</th>
                                            <th>Nombre</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody id="Car_termin_resi">
                                        <?php

                                        $archivoquery8 = "SELECT Car_termin_resi FROM docs_alumno WHERE Id_alumno ='" . $row["num_control"] . "' AND Car_termin_resi != ''";
                                        $archivosql8 = $con->query($archivoquery8);
                                        if ($archivosql8) {
                                            if (mysqli_num_rows($archivosql8) > 0) {
                                                $archivorow8 = $archivosql8->fetch_assoc();
                                                $col15 = $subido;
                                                $col16 = '<a href="archivos/' . $archivorow8["Car_termin_resi"] . '" target="_blank" class="btn btn-warning" role="button">Abrir</a>';
                                            } else {
                                                $col15 = $nosubido;
                                                $col16 = 'NO DISPONIBLE';
                                            }
                                        } else {
                                            echo 'Error';
                                        }

                                        ?>

                                        <tr>
                                            <td style="text-align: center;"><?php echo $col15;  ?></td>
                                            <td style="text-align: center;"><?php echo $row["nombre"] . ' ' . $row["apellido_pat"] . ' ' . $row["apellido_mat"]; ?></td>
                                            <td style="text-align: center;"><?php echo $col16 ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h1 class="archivo-title">Liberacion Reporte</h1>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr style="background-color: #f97c46;color:#FFFFFF;text-align: center;">
                                            <th>Completado</th>
                                            <th>Nombre</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody id="Liberacion_repor">
                                        <?php

                                        $archivoquery9 = "SELECT Liberacion_repor FROM docs_alumno WHERE Id_alumno ='" . $row["num_control"] . "' AND Liberacion_repor != ''";
                                        $archivosql9 = $con->query($archivoquery9);
                                        if ($archivosql9) {
                                            if (mysqli_num_rows($archivosql9) > 0) {
                                                $archivorow9 = $archivosql9->fetch_assoc();
                                                $col17 = $subido;
                                                $col18 = '<a href="archivos/' . $archivorow9["Liberacion_repor"] . '" target="_blank" class="btn btn-warning" role="button">Abrir</a>';
                                            } else {
                                                $col17 = $nosubido;
                                                $col18 = 'NO DISPONIBLE';
                                            }
                                        } else {
                                            echo 'Error';
                                        }

                                        ?>

                                        <tr>
                                            <td style="text-align: center;"><?php echo $col17;  ?></td>
                                            <td style="text-align: center;"><?php echo $row["nombre"] . ' ' . $row["apellido_pat"] . ' ' . $row["apellido_mat"]; ?></td>
                                            <td style="text-align: center;"><?php echo $col18 ?></td>
                                        </tr>
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