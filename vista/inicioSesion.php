<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inicio Sesion</title>
        <link rel="stylesheet" href="estilos/stiles.css"/>
    </head>
    <body id="inicioSesion">
        <div class="login">
            <h2 id="TituloSesion">Inicio de Sesion</h2>
            <form action="controlador/cntrlGeneral.php" method="post">
                <input type="text" name="user" placeholder="Correo Electronico" required="required" />
                <input type="password" name="pass" placeholder="Contraseña" required="required" />
                <button type="submit" class="btn btn-primary btn-block btn-large" >Ingresar</button>
            </form>
        </div>
    </body>
</html>