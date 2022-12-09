<?php

require_once '../modelo/clsPlaylist.php';
require_once '../modelo/conexion_db.php';
require_once '../modelo/clsPlaylistTrack.php';
require_once '../modelo/clsConteoPT.php';
require_once '../modelo/clsIDplaylistTrack.php';

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
                $auxPlaylist->__SET('PlaylistId', $obj->PlaylistId);
                $auxPlaylist->__SET('Name', $obj->Name);
            }
        return $auxPlaylist;
    }

    public function Crear(clsPlaylist $obj) {
        $respuesta = Null;
        try {
            $consulta = "INSERT INTO Playlist (PlaylistId,Name) VALUES (?,?)";
            $this->auxPlay->prepare($consulta)->execute(array(
                $obj->PlaylistId,
                $obj->Name
            ));
        } catch (Exception $e) {
            $code = $e->getCode();
            $message = $e->getMessage();
            $file = $e->getFile();
            $line = $e->getLine();
            $respuesta = "Exception thrown in ".$file." on line ".$line.": [Code ".$code."] ".$message;
        }
        return $respuesta;
    }

    public function Actualizar(clsPlaylist $obj) {
        $respuesta = Null;
        try {
            $consulta = "UPDATE Playlist SET Name=? WHERE PlaylistId=?";
            $this->auxPlay->prepare($consulta)->execute(array(
                $obj->Name,
                $obj->PlaylistId
            ));
        } catch (Exception $e) {
            $code = $e->getCode();
            $message = $e->getMessage();
            $file = $e->getFile();
            $line = $e->getLine();
            $respuesta = "Exception thrown in ".$file." on line ".$line.": [Code ".$code."] ".$message;
        }
        return $respuesta;
    }

    public function Eliminar($PlaylistId) {
        $respuesta = Null;
        try {
            $consulta = $this->auxPlay->prepare("DELETE FROM Playlist WHERE PlaylistId=?");
            $consulta->execute(array($PlaylistId));
            $result = $consulta->rowCount();
            if($result<=0){
                throw new Exception("El Id de la Playlist no se encuentra registrada", 10001);
            }
        } catch (Exception $e) {
            $code = $e->getCode();
            $message = $e->getMessage();
            $file = $e->getFile();
            $line = $e->getLine();
            $respuesta = "Exception thrown in ".$file." on line ".$line.": [Code ".$code."] ".$message;
        }
        return $respuesta;
    }

    public function ListaPlaylistTrack(){
        $customerId = $_SESSION['CustomerId'];
        try {
            
            $consulta = $this->auxPlay->prepare("SELECT DISTINCT t.TrackId ,t.Name AS cancion, p.PlaylistId,p.Name AS 'playlist' FROM customer c, invoice i, invoiceline il, track t, playlisttrack pt, playlist p
                WHERE c.CustomerId = i.CustomerId
                AND i.InvoiceId = il.InvoiceId
                AND il.TrackId = t.TrackId
                AND pt.TrackId = t.TrackId
                AND p.PlaylistId = pt.PlaylistId
                AND c.CustomerId=?
                ORDER BY p.PlaylistId");
            $consulta->execute(array($customerId));

            $resultado = array();

            foreach ($consulta->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $this->auxPlay = new clsPlaylistTrack();
                $this->auxPlay->__set('TrackId', $obj->TrackId);
                $this->auxPlay->__set('TrackName', $obj->cancion);
                $this->auxPlay->__set('PlaylistName', $obj->playlist);
                $this->auxPlay->__set('PlaylistId', $obj->PlaylistId);
                $resultado[] = $this->auxPlay;
            }

            return $resultado;

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ConteoPT(){
        try {
            $consulta = $this->auxPlay->prepare("SELECT pl.name, COUNT(pt.trackid) as total 
                FROM playlist pl, playlisttrack pt 
                WHERE pl.playlistid = pt.playlistid 
                GROUP BY pl.name");
            $consulta->execute();

            $resultado = array();

            foreach ($consulta->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $this->auxPlay = new clsConteoPT();
                $this->auxPlay->__set('PlaylistName', $obj->name);
                $this->auxPlay->__set('total', $obj->total);
                $resultado[] = $this->auxPlay;
            }

            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Asociar(clsIDplaylistTrack $obj) {
        try {
            $consulta = "INSERT INTO playlisttrack (PlaylistId,TrackId) VALUES (?,?)";
            $this->auxPlay->prepare($consulta)->execute(array(
                $obj->PlaylistId,
                $obj->TrackId
            ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function SacarPlayTrack($PlaylistId, $TrackId) {
        try {
            $consulta = $this->auxPlay->prepare("DELETE FROM playlisttrack WHERE PlaylistId=? AND TrackId=?");
            $consulta->execute(array($PlaylistId,$TrackId));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}