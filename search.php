<?php include 'services/ConexionBD.php'; ?>
<?php

session_start();
// PREGUNTA SI YA HEMOS INICIADO SESION EN CASO DE QUE NO, NOS REDIRECCIONA AL INDEX
if (!isset($_SESSION['SesionIniciada'])) {
    header('Location: index.php');
    exit;
}
$uname = $_SESSION['correo'];

// PREGUNTA SI EL USUARIO QUE HA INICIADO SESION ES UN DOCENTE
if ($stmt = $con->prepare('SELECT * FROM docente WHERE correo = ?')) {
    $stmt->bind_param('s', $uname);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 0) {
        header('Location: inicio.php');
    }

    // CIERRA LA CONEXION CON LA BASE DE DATOS 
    $stmt->close();
}
global $con;
// PREPARAMOS UN QUERY PARA LISTAR LOS ALUMNOS QUE COINCIDAN CON LA BUSQUEDA

if (isset($_POST['search'])) {
    $name = $_POST['search'];
}
$sql_select = "SELECT alumno.num_control  AS alum_nc, alumno.nombre  AS alum_nom, alumno.apellido_pat  AS alum_app, alumno.apellido_mat  AS 
alum_apm, empresa.nombre  AS empre_nom, docs_alumno.Id_alumno AS docs_idalum FROM alumno INNER JOIN empresa ON alumno.num_control = empresa.Id_alumno INNER JOIN docs_alumno ON empresa.ID_alumno = docs_alumno.Id_alumno WHERE alumno.num_control LIKE '%$name%'";

$result_all = mysqli_query($con, $sql_select);
$total = mysqli_num_rows($result_all);
$rows = $con->query($sql_select);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="BITACORA  RESIDENCIAS ITSPR">
    <meta name="key" content="BITACORA, REDICENCIAS, ITSPR, INSTITUTO TECNOLOGICO SUPERIOR DE POZA RICA">
    <META NAME="AUTHOR" CONTENT="Omar Nayef Pineda Blanco">
    <title>BITACORA ITSPR</title>
    <link rel="shortcut icon" href="assets/LOGO_ITSPR.jpg" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/archivos-styles.css">

    <script defer src="https://use.fontawesome.com/releases/v5.8.2/js/all.js" integrity="sha384-DJ25uNYET2XCl5ZF++U8eNxPWqcKohUUBUpKGlNLMchM7q4Wjg2CUpjHLaL8yYPH" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>


    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>




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
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="btn-group w-100 mb-2">
                    <a href="inicio-d.php" class="btn btn-success">Volver al inicio</a>

                </div>
                <div class="btn-group w-100 mb-2">
                    <a href="archivos.php" class="btn btn-success">Volver a la lista General</a>

                </div>
                <div class="col-md-12 text-center mb-5">
                    <form action="search.php" method="post" class="form-inline">
                        <input type="text" placeholder="Buscar por Num. Control" name="search" class="form-control col-12">
                        <input type="submit" class="btn " value="Buscar" style="margin-top: 38px; background-color: purple; color: white;">
                    </form>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Num. Control</th>
                            <th>Nombre</th>
                            <th>Empresa</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        // PREGUNTA SI LOS REGISTROS DEL QUERY DE ARRIBA ES MAYOR A 0 EN CASO DE SERLO LO LISTARA
                        if ($total > 0) {
                            $counter = 0;

                            //USAMOS UN BUCLE PARA RELLENAR LA TABLA CON LOS DATOS DEL QUERY ANTERIOR
                            while ($rowSql = $rows->fetch_assoc()) {
                                $counter++;
                        ?>
                                <tr>
                                    <td><?php echo ucwords($rowSql['alum_nc']); ?></td>
                                    <td><?php echo ucwords($rowSql['alum_nom']); ?></td>
                                    <td><?php echo $rowSql['empre_nom']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?php echo $rowSql['alum_nc']; ?>">
                                            Ver
                                        </button>

                                        <?php include('includes/verArchivos.php'); ?>
                                    </td>
                                </tr>
                            <?php

                            }
                        } else {
                            // SI NO HAY NINGUN REGISTRO QUE COINCIDA NOS DIRA QUE NO HAY RESULTADOS
                            ?>
                            <tr>
                                <td colspan="3">Ningun resultado coincidio con tu busqueda</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>



    <script type="text/javascript" src="jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="bootstrap.min.js"></script>

</body>

</html>