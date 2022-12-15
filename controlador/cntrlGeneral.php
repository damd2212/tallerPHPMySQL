<?php
session_start();
/*este es para redirigir un controlador*/
if (isset($_SESSION['user'])) {
    //redirige una peticion de acuerdo a los parametros que reciba por url y llamara al controlador especifico
    //por ejemplo c=tracks, a=listar
    if (isset($_REQUEST['c'])) {

        $controlador = $_REQUEST['c'];
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : Validar();
        require_once "cntrl.$controlador";
        $controlador = "controlador" . $controlador;
        $controlador = new $controlador;
        call_user_func(array($controlador, $accion));
    }
    //esta es la pagina inicial por defecto 
    else {
        $controlador = "tracks";
        require "cntrl.$controlador";
        $controlador = "controlador" . $controlador;
        $controlador = new $controlador;
        $controlador->Listar();
    }
}
//redirigimos al controlador de usuario para crear una nueva sesión
else {
    $controlador = "Customers";
    require "cntrl.$controlador";
    $controlador = "controlador" . $controlador;
    $controlador = new $controlador;
    $controlador->inicio();
}
