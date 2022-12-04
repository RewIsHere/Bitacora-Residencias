<?php

function conn(){
    $hostname = "localhost";
    $usuariodb = "root";
    $passworddb = "";
    $dbname = "bitacora_residencias"

$conectar = mysqli_connect($hostname,$usuariodb,$passworddb,$dbname);
return $conectar;

}


?>