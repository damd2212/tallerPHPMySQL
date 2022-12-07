<?php

require_once 'modelo/clsMediaType.php';
require_once 'modelo/conexion_db.php';

class clsServiceGenre{
    //atributos
    private $conexion;
    private $auxCon;

    //metodos
    public function __construct()
    {
        $this->conexion = new conexion_db("localhost","chinook","root"," ");
        $this->conexion->conectar();
        $this->auxCon = $this->conexion->conexion;
    }

    //Creación de servicio
    public function Listar() {
            $query = "SELECT * FROM MediaType";
            $resultado = mysqli_query($this->auxCon, $query);
            return $resultado;
    }
}