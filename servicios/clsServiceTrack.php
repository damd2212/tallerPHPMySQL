<?php

require_once '../modelo/clsTracks.php';
require_once '../modelo/conexion_db.php';

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

    //consulta listar canciones que si ha comprado
    public function Listar() {
        $CustomerId = $_SESSION['CustomerId'];
        $consulta = $this->auxTrack->prepare("SELECT tr.TrackId, tr.Name, tr.Composer, tr.Milliseconds, tr.UnitPrice FROM customer cus, invoice inv, invoiceline invl, track tr WHERE cus.CustomerId = inv.CustomerId AND inv.InvoiceId = invl.InvoiceId AND invl.TrackId = tr.TrackId AND cus.CustomerId = ".$CustomerId);
        $consulta->execute();
        $resultado = array();
        foreach($consulta->fetchAll(PDO::FETCH_OBJ) as $obj){
            $this->auxTrack = new clsTracks();
            $this->auxTrack->__set('TrackId', $obj->TrackId);
            $this->auxTrack->__set('Name', $obj->Name);
            $this->auxTrack->__set('Composer', $obj->Composer);
            $this->auxTrack->__set('Milliseconds', $obj->Milliseconds);
            $this->auxTrack->__set('UnitPrice', $obj->UnitPrice);
            $resultado [] = $this->auxTrack;
        }
        return $resultado;
    }

    //consulta listar canciones restantes que no ha comprado el usuario
    public function ListarNoCompradas() {
        $CustomerId = $_SESSION['CustomerId'];
        $consulta = $this->auxTrack->prepare("SELECT * FROM (SELECT tr.TrackId FROM customer cus, invoice inv, invoiceline invl, track tr WHERE cus.CustomerId = inv.CustomerId AND inv.InvoiceId = invl.InvoiceId AND invl.TrackId = tr.TrackId AND cus.CustomerId = ?) AS sq RIGHT JOIN track tra  ON tra.TrackId = sq.TrackId WHERE sq.TrackId IS NULL");
        $consulta->execute(array($CustomerId));
        $resultado = array();
        foreach($consulta->fetchAll(PDO::FETCH_OBJ) as $obj){
            $this->auxTrack = new clsTracks();
            $this->auxTrack->__set('TrackId', $obj->TrackId);
            $this->auxTrack->__set('Name', $obj->Name);
            $this->auxTrack->__set('Composer', $obj->Composer);
            $this->auxTrack->__set('Milliseconds', $obj->Milliseconds);
            $this->auxTrack->__set('UnitPrice', $obj->UnitPrice);
            $resultado [] = $this->auxTrack;
        }
        return $resultado;
    }

    public function Comprar($idTrack){
        //consultamos si existe el id
        $consulta = $this->auxTrack->prepare("SELECT * FROM track WHERE TrackId = ?");
        $consulta->execute(array($idTrack));
        $track = $consulta->fetch(PDO::FETCH_ASSOC);
        $result = $consulta ->rowCount();

        //consultamos el id siguiente a guardar de la cancion
        $consulta = $this->auxTrack->prepare("SELECT TrackId FROM track ORDER BY TrackId DESC LIMIT 1");
        $consulta->execute();
        $datoObtenido = $consulta->fetch(PDO::FETCH_ASSOC); 
        $result2 = $consulta ->rowCount();
        echo $datoObtenido['TrackId'];

        //consultamos el id siguiente a guardar de invoice
        $consulta = $this->auxTrack->prepare("SELECT InvoiceId FROM invoice ORDER BY InvoiceId DESC LIMIT 1");
        $consulta->execute();
        $datoObtenido2 = $consulta->fetch(PDO::FETCH_ASSOC); 
        $result3 = $consulta ->rowCount();
        echo $datoObtenido2['InvoiceId'];

        //consultamos el id siguiente a guardar de invoiceline
        $consulta = $this->auxTrack->prepare("SELECT InvoiceLineId FROM invoiceline ORDER BY InvoiceLineId DESC LIMIT 1");
        $consulta->execute();
        $datoObtenido3 = $consulta->fetch(PDO::FETCH_ASSOC); 
        $result4 = $consulta ->rowCount();
        echo $datoObtenido3['InvoiceLineId'];

        if($result > 0 && $result2 && $result3 && $result4){
            //registramos la factura general
            $consulta = "INSERT INTO invoice (InvoiceId,CustomerId,InvoiceDate,BillingAddress,BillingCity,BillingCountry,Total) VALUES (?,?,?,?,?,?,?)";
            $this->auxTrack->prepare($consulta)->execute(array(
                $datoObtenido2['InvoiceId'] + 1,
                $_SESSION['CustomerId'],
                "2022-12-08 00:00:00",
                "Carrera 12",
                "Popayan",
                "Colombia",
                $track['UnitPrice']
            ));
            //registramos la factura del item
            $consulta = "INSERT INTO invoiceline (InvoiceLineId,InvoiceId,TrackId,UnitPrice,Quantity) VALUES (?,?,?,?,?)";
            $this->auxTrack->prepare($consulta)->execute(array(
                $datoObtenido3['InvoiceLineId'] + 1,
                $datoObtenido2['InvoiceId'] + 1,
                $track['TrackId'],
                $track['UnitPrice'],
                1
            ));
        }else{
            echo "Id_track no encontrado";
        }
    }

    public function EliminarCompra($idTrack){
        $CustomerId = $_SESSION['CustomerId'];
        $consulta = $this->auxTrack->prepare("SELECT invl.InvoiceLineId FROM customer cus, invoice inv, invoiceline invl WHERE cus.CustomerId = inv.CustomerId AND inv.InvoiceId = invl.InvoiceId AND invl.TrackId = ? AND cus.CustomerId = ?");
        $consulta->execute(array(
            $idTrack,
            $CustomerId
        ));
        $delete = $consulta->fetch(PDO::FETCH_ASSOC);
        try {
            $consulta = $this->auxTrack->prepare("DELETE FROM invoiceline WHERE InvoiceLineId=?");
            $consulta->execute(array($delete['InvoiceLineId']));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    

}