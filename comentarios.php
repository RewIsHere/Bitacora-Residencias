<?php
// VINCULACION CON LA BASE DE DATOS
require_once 'services/ConexionBD.php';
// INICIAMOS EL PROCESO DE SESION
session_start();

// CREAMOS VARIABLES QUE EQUIVALEN A CADA CAMPO DEL FORMULARIO
$mensaje = $_POST['mensaje'];
$num_control = $_GET['nc'];
date_default_timezone_set('Mexico/General');
$date = date('d-m-y');
$docente_correo = $_SESSION['correo'];

$query1 = "SELECT * FROM docente WHERE correo ='" . $docente_correo . "' ";
$sql1 = $con->query($query1);
$row1 = $sql1->fetch_assoc();
$docente_id = $row1['Id_docente'];

if ($stmt = $con->prepare("call verificarComentario('$num_control')")) {
    $stmt->execute();
    $stmt->store_result();
    // PREGUNTA SI EL QUERY QUE LLAMAMOS ANTERIORMENTE TIENE UNA COLUMNA CON EL NOMBRE DE LA EMPRESA PUESTO EN EL FORMULARIO
    if ($stmt->num_rows > 0) {
        // EN CASO DE QUE EXISTA MARCARA ERROR
        echo "error";
    } else {
        $stmt->close();
        // LA EMPRESA NO EXISTE, POR LO TANTO PREPARAMOS OTRO PROCEDIMIENTO ALMACENADO PARA INGRESAR UN REGISTRO A LA TABLA EMPRESA
        if ($stmt = $con->prepare("call agregar_comentario('$mensaje','$date','$num_control','$docente_id')")) {
            $stmt->execute();
            echo "success";
        } else {
            // EN CASO DE ALGUN PROBLEMA NOS MARCARA ERROR
            echo "fatal-error";
        }
    }
    $stmt->close();
} else {
    // EN CASO DE ALGUN PROBLEMA NOS MARCARA ERROR
    echo "fatal-error";
}
// CIERRA LA CONEXION
$con->close();
?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="comentarios.php?nc=<?php echo $_GET['nc']; ?>" method="POST">
                    <label for="mensaje">Comentarios</label>
                    <textarea required placeholder="Escribir comentario" class="form-control" name="mensaje" id="mensaje" cols="30" rows="5"></textarea>

                    <button class="btn-success" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>