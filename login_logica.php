<?php

$num_control=$_POST['num_control'];
$contraseña=$_POST['contraseña']
SESSION_START();
$_SESSION['num_control']=$num_control

include (con_db.php);

$consulta="SELECT * FROM alumno where num_control='$num_control' and contraseña='$contraseña'";
$resultado=mysqli_query($conex,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
header("location:index.php");
}else{
        ?>
<?php
include(login.php);
?>
<h1 class="bad">¡ERROR EN LA AUTENTIFICACION!</h1>
        <?php
}
mysqli_free_result($resultado);
mysqli_close($conex)




?>