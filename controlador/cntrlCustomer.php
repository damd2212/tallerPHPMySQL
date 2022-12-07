<?php

$controlador = 'tracks';

if (!isset($_SESSION['user'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    require ('modelo/clsCustomer.php');
    require ('servicios/clsServiceCustomer.php');

    $customer = new clsServiceCustomer();
    $resultadoCustomer = $customer->validar($user, $pass);

    if($resultadoCustomer > 0){
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass;
        require "controlador/cntrl.$controlador";
        $controlador = "controlador".$controlador;
        $controlador = new $controlador;
        $controlador->Listar(); 
    }else{
        echo "Credenciales incorrectas";
    }
    
}else{
    if(isset($_REQUEST['c'])){
        
        $controlador = $_REQUEST['c'];
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : Listar();

        require_once "../controlador/cntrl.$controlador";
        $controlador = "controlador".$controlador;
        $controlador = new $controlador;
        call_user_func(array($controlador,$accion));    
    }
    else{
        
        require "../controlador/cntrl.$controlador";
        $controlador = "controlador".$controlador;
        $controlador = new $controlador;
        $controlador->Listar();    
    }
}