<?php

require_once 'modelo/clsTracks.php';
require_once 'modelo/conexion_db.php';

class clsServiceTrack{
    //atributos
    private $conexion;
    private $auxTrack;

    //metodos
    public function __construct()
    {
        $this->conexion = new conexion_db("localhost","chinook","root"," ");
        $this->conexion->conectar();
        $this->auxTrack = $this->conexion->conexion;
    }

    public function Listar() {
        $consulta = $this->auxTrack->prepare("SELECT * FROM track");
        $consulta->execute();
        $resultado = array();
        foreach($consulta->fetchAll(PDO::FETCH_OBJ) as $obj){
            $this->auxTrack = new clsTracks();
            $this->auxTrack->__set('Name', $obj->Name);
            $this->auxTrack->__set('Composer', $obj->Composer);
            $this->auxTrack->__set('Milliseconds', $obj->Milliseconds);
            $this->auxTrack->__set('UnitPrice', $obj->Milliseconds);
            $resultado [] = $this->auxTrack;
        }
        return $resultado;
    }


}