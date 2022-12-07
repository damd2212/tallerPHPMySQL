<?php

require_once 'modelo/clsGenre.php';
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
        $query = $this->auxCon->prepare("SELECT * FROM genre");
        $query->execute();
        $resultado = array();
        foreach($query->fetchAll(PDO::FETCH_OBJ) as $obj){
            $this->auxCon = new clsGenre();
            $this->auxCon->__set('GenreId', $obj->GenreId);
            $this->auxCon->__set('Name', $obj->Name);
            $resultado[] = $this->auxCon;
        }
        return $resultado;
    }

}