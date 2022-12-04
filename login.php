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
        <form class="LOGIN" method="post" action="login_logica.php"></form>
        <H1>INICIA SESION</H1>
        <Div class="contenedor1">

            <div class="input-contenedor1">
                <i class="fa-solid fa-person icon"></i>
                <input type="text" name="num_control" placeholder="NUMERO DE CONTROL">
            </div>

            <div class="input-contenedor1">
                <i class="fa-solid fa-person icon"></i>
                <input type="password" name="contraseña" placeholder="CONTRASEÑA">
            </div>

            <input type="submit" value="Logear" >
        </Div>
        </form>
    </body>

</html>