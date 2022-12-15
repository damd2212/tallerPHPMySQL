<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: controlador/cntrlGeneral.php?c=tracks&a=Listar"); 
}
else{
    if (isset($_REQUEST['mensajeLogin'])) {
        echo '<div class="alert alert-danger" id="demo"><strong>Success!</strong> Indicates a successful or positive action.</div>';
        echo '<script type="text/javascript">document.getElementById("demo").innerHTML = "Credenciales incorrectas"; const value = document.getElementById("demo"); setTimeout(() => { value.parentNode.removeChild(value); }, 5000);</script>';
    }
    if(isset($_REQUEST['mensajeError'])){
        echo '<div class="alert alert-warning" id="demo"><strong>Success!</strong> Indicates a successful or positive action.</div>';
        echo '<script type="text/javascript">document.getElementById("demo").innerHTML = "Inicia sesión para continuar"; const value = document.getElementById("demo"); setTimeout(() => { value.parentNode.removeChild(value); }, 5000);</script>';
    } 
    require ('vista/inicioSesion.php');
}