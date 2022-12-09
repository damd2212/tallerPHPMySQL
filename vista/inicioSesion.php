<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Inicio Sesion</title>
    <link rel="stylesheet" href="estilos/styles.css" />
    <link rel="stylesheet" href="../estilos/styles.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body id="inicioSesion">
    <div class="login">
        <div id="TituloSesion">
            <h4>Inicio de Sesión</h4>
        </div>
        <form action="controlador/cntrlGeneral.php" method="post">
            <div class="form-group">
                <label for="email" id="labels">Email:</label>
                <input type="email" class="form-control" placeholder="Ingresa tu email" name="user" required="required">
            </div>
            <div class="form-group">
                <label for="pwd" id="labels">Contraseña:</label>
                <input type="password" class="form-control" placeholder="Ingresa tu contraseña" name="pass" required="required">
            </div>
            <div class="form-group form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox">
                    <div id="labels">Remember me</div>
                </label>
            </div>
            <button type="Submit" class="btn btn-danger btn-lg btn-block"><div id="TituloSesion">Ingresar</div></button>
        </form>
    </div>

</body>

</html>