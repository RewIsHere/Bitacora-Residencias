<?php

include("con_db.php");

if(isset($_POST['REGISTRO'])){
    if(strlen($_POST['nombre']) >=1 && strlen($_POST['num_control']) >= 1){

        $nombre=$_POST['nombre'];
        $apellido_pat=trim($_POST['apellido_pat']);
        $apellido_mat=trim($_POST['apellido_mat']);
        $num_control=trim($_POST['num_control']);
        $carrera=trim($_POST['carrera']);
        $correo=trim($_POST['correo']);
        $contraseña=trim($_POST['contraseña']);
        $tel=trim($_POST['tel']);
        $semestre_cursado=trim($_POST['semestre_cursado']);
        $mat_pend=trim($_POST['mat_pend']);
            $consulta = "INSERT INTO alumno(num_control, nombre, apellido_pat, apellido_mat, carrera, semestre_cursado, mat_pend, tel, correo, contraseña) 
            VALUES ('$num_control','$nombre','$apellido_pat','$apellido_mat','$carrera','$semestre_cursado','$mat_pend','$tel','$correo','$contraseña')";
if(exist $num_control)
            $resultado = mysqli_query($conex,$consulta);
            if ($resultado) {
                ?> 
                <h3 class="ok">¡Te has inscripto correctamente!</h3>
               <?php
            } else {
                ?> 
                <h3 class="bad">¡Ups ha ocurrido un error!</h3>
               <?php
            }
        }   else {
                ?> 
                <h3 class="bad">¡Por favor complete los campos!</h3>
               <?php
        }
    }
    $control_nul="CREATE PROCEDURE sp_RepControl $num_control varchar(15)
    
        "
    ?>