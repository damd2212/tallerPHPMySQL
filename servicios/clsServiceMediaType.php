<?php

require_once 'modelo/clsMediaType.php';
require_once 'modelo/conexion_db.php';

class clsServiceMediaType{
    //atributos
    private $conexion;
    private $auxMedia;

    //metodos
    public function __construct()
    {
        $this->conexion = new conexion_db("localhost","chinook","root"," ");
        $this->conexion->conectar();
        $this->auxMedia = $this->conexion->conexion;
    }


    public function Listar() {
        $query = $this->auxMedia->prepare("SELECT * FROM MediaType");
        $query->execute();
        $resultado = array();
        foreach($query->fetchAll(PDO::FETCH_OBJ) as $obj){
            $this->auxMedia = new clsMediaType();
            $this->auxMedia->__set('MediaTypeId', $obj->MediaTypeId);
            $this->auxMedia->__set('Name', $obj->Name);
            $resultado[] = $this->auxMedia;
        }
        return $resultado;
    }
}