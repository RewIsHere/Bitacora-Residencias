<?php include('../services/ConexionBD.php');
session_start();
$uname = $_SESSION['no_control'];

$globalquery = "SELECT * FROM alumno WHERE num_control ='" . $uname . "' ";
$globalsql = $con->query($globalquery);
$row = $globalsql->fetch_assoc();

if (isset($_POST["tipo_doc"])) {
    $nombreArchivo = $_FILES['archivo']['name'];
    $nombreArchivoTemp = $_FILES['archivo']['tmp_name'];
    $error = $_FILES['archivo']['error'];
    if ($error === 0) {
        $archivoExt = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
        $archivoExt_a_ubi = strtolower($archivoExt);



        // COLOCAMOS EN UNA VARIABLE LAS EXTENSIONES DE LOS ARCHIVOS PERMITIDAS

        $extensiones_val = array('pdf');
        // PREGUNTA SI LA EXTENSION DE LOS ARCHIVOS SUBIDOS ES IGUAL A LA EXTENSION PERMITIDA

        if (in_array($archivoExt_a_ubi, $extensiones_val)) {
            // OBTENEMOS DE LA SESION EL NO. DE CONTROL DEL ALUMNO Y LO ALMACENAMOS EN UNA VARIABLE

            // LE PONEMOS UN NUEVO NOMBRE A CADA ARCHIVO BASANDOSE EN EL NUMERO DE CONTROL Y LE DECIMOS LA RUTA A DONDE LOS PONDRA

            $nuevo_nombreArchivo = uniqid($uname, true) . '.' . $archivoExt_a_ubi;
            $archivo_ubi = '../archivos/' . $nuevo_nombreArchivo;


            $tipoarchivo = '"$_POST[tipo_doc"]"';
            // MOVEMOS LOS ARCHIVOS A LA RUTA ELEGIDA
            move_uploaded_file($nombreArchivoTemp, $archivo_ubi);

            switch ($_POST['tipo_doc']) {
                case 'Solicitud_resi':
                    $sql = "INSERT INTO docs_alumno(Solicitud_resi, Id_alumno) VALUES(?,?) ON DUPLICATE KEY UPDATE Solicitud_resi = ?, Id_alumno= ?";
                    break;
                case 'Carta_acep':
                    $sql = "INSERT INTO docs_alumno(Carta_acep, Id_alumno) VALUES(?,?) ON DUPLICATE KEY UPDATE Carta_acep = ?, Id_alumno= ?";
                    break;
                case 'Reporte_pre':
                    $sql = "INSERT INTO docs_alumno(Reporte_pre, Id_alumno) VALUES(?,?) ON DUPLICATE KEY UPDATE Reporte_pre = ?, Id_alumno= ?";
                    break;
                case 'Reporte_final':
                    $sql = "INSERT INTO docs_alumno(Reporte_final, Id_alumno) VALUES(?,?) ON DUPLICATE KEY UPDATE Reporte_final = ?, Id_alumno= ?";
                    break;
                case 'Cumpl_resi_doce':
                    $sql = "INSERT INTO docs_alumno(Cumpl_resi_doce, Id_alumno) VALUES(?,?) ON DUPLICATE KEY UPDATE Cumpl_resi_doce = ?, Id_alumno= ?";
                    break;
                case 'Eva_segui':
                    $sql = "INSERT INTO docs_alumno(Eva_segui, Id_alumno) VALUES(?,?) ON DUPLICATE KEY UPDATE Eva_segui = ?, Id_alumno= ?";
                    break;
                case 'Eva_repor':
                    $sql = "INSERT INTO docs_alumno(Eva_repor, Id_alumno) VALUES(?,?) ON DUPLICATE KEY UPDATE Eva_repor = ?, Id_alumno= ?";
                    break;
                case 'Car_termin_resi':
                    $sql = "INSERT INTO docs_alumno(Car_termin_resi, Id_alumno) VALUES(?,?) ON DUPLICATE KEY UPDATE Car_termin_resi = ?, Id_alumno= ?";
                    break;
                case 'Liberacion_repor':
                    $sql = "INSERT INTO docs_alumno(Liberacion_repor, Id_alumno) VALUES(?,?) ON DUPLICATE KEY UPDATE Liberacion_repor = ?, Id_alumno= ?";
                    break;

                default:
                    $sql = "none";
            }
            $stmt = $con->prepare($sql);
            $stmt->bind_param('ssss', $nuevo_nombreArchivo, $uname, $nuevo_nombreArchivo, $uname);
            $stmt->execute();

            $archivoquery = "SELECT * FROM docs_alumno WHERE Id_alumno ='" . $uname . "' ";
            $archivosql = $con->query($archivoquery);
            $archivorow = $archivosql->fetch_assoc();
            echo '<tr>
<td style="text-align: center;"><span class="badge bg-primary">Archivo subido</span></td>
<td style="text-align: center;">' . $row["nombre"] . ' ' . $row["apellido_pat"] . ' ' . $row["apellido_mat"] . '</td>
<td style="text-align: center;"><a href="archivos/' . $archivorow[$_POST['tipo_doc']] . '" target="_blank" class="btn btn-warning" role="button">Abrir</a>
</td>
</tr>';
        }
    }
}
