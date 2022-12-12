<?php
define('DB_HOST', 'localhost');
define('DB_USUARIO', 'root');
define('DB_PASSSWORD', '');
define('DB_NOMBRE', 'BitacoraITSPR');
$con = mysqli_connect(DB_HOST, DB_USUARIO, DB_PASSSWORD, DB_NOMBRE);
// Check connection
if (mysqli_connect_errno()) {
    echo "Ha ocurrido un fallo al conectar con MySQL: " . mysqli_connect_error();
}
