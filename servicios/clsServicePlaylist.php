<?php

require_once '../modelo/clsPlaylist.php';
require_once '../modelo/conexion_db.php';

class clsServicePlaylist{
    //atributos
    private $conexion;
    private $auxPlay;

    //metodos
    public function __construct()
    {
        $this->conexion = new conexion_db("localhost","chinook","root"," ");
        $this->conexion->conectar();
        $this->auxPlay = $this->conexion->conexion;
    }

    //Creación de servicio
    public function Listar() {
        $query = $this->auxPlay->prepare("SELECT * FROM Playlist");
        $query->execute();
        $resultado = array();
        foreach($query->fetchAll(PDO::FETCH_OBJ) as $obj){
            $this->auxPlay = new clsPlaylist();
            $this->auxPlay->__set('PlaylistId', $obj->PlaylistId);
            $this->auxPlay->__set('Name', $obj->Name);
            $resultado[] = $this->auxPlay;
        }
        return $resultado;
    }

    public function obtener($PlaylistId){
        $consulta = $this->auxPlay->prepare ("SELECT * FROM Playlist WHERE PlaylistId=?");
        $consulta->execute(array($PlaylistId));
        $auxPlaylist = new clsPlaylist();
        foreach ($consulta->fetchALL(PDO::FETCH_OBJ) as $obj) {
                $auxPlaylist->auxPlay->__set('PlaylistId', $obj->PlaylistId);
                $auxPlaylist->auxPlay->__set('Name', $obj->Name);
            }
        return $auxPlaylist;
    }
}