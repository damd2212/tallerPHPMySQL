<?php
/*este es para redirigir un controlador*/
if(isset($_REQUEST['C']))
{
    
} else {
    $controlador = "tracks";
    require "cntrl.$controlador";
    $controlador = "controlador".$controlador;
    $controlador = new $controlador;
    $controlador->Listar();
}