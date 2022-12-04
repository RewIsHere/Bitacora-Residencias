<?php


$nombre=$_FILES['archivo']['name'];
$guardado=$_FILES['archivo']['tmp_name'];

    if(!file_exists('archivos')){
        mkdir('archivos',Nayef2002,true);
        if(file_exists('archivos')){
            if(move_uploaded_file($guardado, 'archivos/'.$nombre)){
              echo "ARCHIVO GUARDADO";
      }else{echo "EL ARCHIVO NO SE PUDO GUARDAR";
      }
    }   
     }else{
        if(move_uploaded_file($guardado, 'archivos/'.$nombre)){
         echo "ARCHIVO GUARDADO";
 }else{echo "EL ARCHIVO NO SE PUDO GUARDAR";
 
        }
    }

?>