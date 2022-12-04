
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta><script src="https://kit.fontawesome.com/ba719609d3.js" crossorigin="anonymous"></script>
        <meta name="description"content="BITACORA  RESIDENCIAS ITSPR">
        <meta name="key"content="BITACORA, REDICENCIAS, ITSPR, INSTITUTO TECNOLOGICO SUPERIOR DE POZA RICA">
        <META NAME="AUTHOR"CONTENT="Omar Nayef Pineda Blanco">
        <title>BITACORA ITSPR</title>
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="IMAGENES_BD/LOGO_ITSPR.jpg" type="image/x-icon">
        <img  src="IMAGENES_BD/Tira_logo.jpg"width="1400" height="200" >
    </head> 

    <body>
        <header>
            <nav>
                <a href="index.php">Inicio</a>
                <a href="registro.php" target="_blank">REGISTRARSE</a>  
                <a href="login.php"target="_blank">INICIAR SESION</a>
            </nav>
        </header>
        <form class="REGISTRATE" method="post" action="registro_sesion.php">
        <H1>REGISTRATE</H1>
        <DIV CLASS="contenedor">

        <div class="input-contenedor">
            <i class="fa-solid fa-person icon"></i>
            <input type="text" name="nombre" placeholder="Nombre">
        </div>

        <div class="input-contenedor">
            <i class="fa-solid fa-person icon"></i>
            <input type="text" name="apellido_pat" placeholder="Apellido Paterno">
        </div>

        <div class="input-contenedor">
            <i class="fa-solid fa-person icon"></i>
            <input type="text" name="apellido_mat" placeholder="Apellido Materno">
        </div>

        <div class="input-contenedor">
            <i class="fa-solid fa-gamepad icon"></i>
            <input type="text" name="num_control" placeholder="Numero de control">
        </div>

        <div class="input-contenedor">
            <i class="fa-solid fa-eye icon"></i>
            <input type="text" name="carrera" placeholder="Carrera">
        </div>

        <div class="input-contenedor">
            <i class="fa-solid fa-envelope icon"></i>
            <input type="email" name="correo" placeholder="E-Mail Academico">
        </div>
        <div class="input-contenedor">
            <i class="fa-solid fa-gamepad icon"></i>
            <input type="password" name="contraseña" placeholder="Contrasena" >
        </div>
                
        <div class="input-contenedor">
            <i class="fa-solid fa-mobile icon"></i>
            <input class="tel" type="tel" name="tel" placeholder="Numero Celular">
        </div> 
            
        <div class="input-contenedor">
            <i class="fa-solid fa-hashtag icon"></i>
            <input type="text" name="semestre_cursado" placeholder="Semestre Cursado">
        </div>

        <div class="input-contenedor">
            <i class="fa-solid fa-arrow-up-9-1 icon"></i>    
            <input type="text" name="mat_pend" placeholder="Materias Pendientes">
        </div>
        <input type="submit" name="REGISTRO" value="Registar" class="button">
        <br><br>
        <input type="reset" name="LIMPIAR" value="Limpiar" class="bot_reset" >
    
        <p class> ¿YA TIENES UNA CUENTA? <a class="link" href="login.html">Iniciar Sesion</a></p>
        </DIV>
    </form>
<?php
include("registro_sesion.php");
?>

    </body>

</html>