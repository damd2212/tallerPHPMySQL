<?php
session_start();
/*este es para redirigir un controlador*/
if(isset($_REQUEST['c']))
{

    $controlador = $_REQUEST['c'];
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : Validar();
    require_once "cntrl.$controlador";
    $controlador = "controlador".$controlador;
    $controlador = new $controlador;
    call_user_func(array($controlador,$accion)); 

} else {
    $controlador = "Customers";
    require "cntrl.$controlador";
    $controlador = "controlador".$controlador;
    $controlador = new $controlador;
    $controlador->inicio();
}