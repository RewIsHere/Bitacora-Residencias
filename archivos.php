<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="BITACORA  RESIDENCIAS ITSPR">
    <meta name="key" content="BITACORA, REDICENCIAS, ITSPR, INSTITUTO TECNOLOGICO SUPERIOR DE POZA RICA">
    <META NAME="AUTHOR" CONTENT="Omar Nayef Pineda Blanco">
    <title>BITACORA ITSPR</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="assets/LOGO_ITSPR.jpg" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!--  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootswatch/3.3.7/yeti/bootstrap.min.css"> -->

    <!-- Fonts -->

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Abel|Lato|Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/sport-store.css">

    <script defer src="https://use.fontawesome.com/releases/v5.8.2/js/all.js" integrity="sha384-DJ25uNYET2XCl5ZF++U8eNxPWqcKohUUBUpKGlNLMchM7q4Wjg2CUpjHLaL8yYPH" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>




</head>

<body>
    <img src="assets/Tira_logo.jpg" width="1400" height="200">
    <img src="assets/LOGO_ITSPR.jpg" width="100">
    <header>


        <nav class="nav-supe">
            <a href="index.php" class="input-nav-supe">Inicio</a>
            <a href="registro.php" class="input-nav-supe">REGISTRARSE</a>
            <a href="login.php" class="input-nav-supe">INICIAR SESION</a>
        </nav>


    </header>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-1">
                <div style="height:50px;"></div>

                <span style="font-size:25px; color:blue">
                    <center><strong>PHP/MySQLi CRUD Modal using Bootstrap</strong></center>
                </span>


                <div class="col-md-12 text-center mb-5">
                    <form action="search.php" method="post" class="form-inline">
                        <input type="text" placeholder="Search For Tasks" name="search" class="form-control col-12">
                    </form>
                </div>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <th>Num. Control</th>
                        <th>Nombre</th>
                        <th>Empresa</th>
                        <th>Accion</th>
                    </thead>
                    <tbody>
                        <?php
                        include('services/ConexionBD.php');

                        $query = mysqli_query($con, "SELECT alumno.num_control  AS alum_nc, alumno.nombre  AS alum_nom, alumno.apellido_pat  AS alum_app, alumno.apellido_mat  AS 
                        alum_apm, empresa.nombre  AS empre_nom FROM alumno INNER JOIN empresa ON alumno.num_control = empresa.Id_alumno");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo ucwords($row['alum_nc']); ?></td>
                                <td><?php echo ucwords($row['alum_nom']); ?></td>
                                <td><?php echo $row['empre_nom']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?php echo $row['alum_nc']; ?>">
                                        Ver
                                    </button>

                                    <?php include('includes/verArchivos.php'); ?>
                                </td>
                            </tr>
                        <?php
                        }

                        ?>
                    </tbody>
                </table>

</body>



</html>