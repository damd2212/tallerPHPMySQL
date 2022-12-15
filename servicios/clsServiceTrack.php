<?php

require_once '../modelo/clsTracks.php';
require_once '../modelo/conexion_db.php';

class clsServiceTrack
{
    //atributos
    private $conexion;
    private $auxTrack;

    //metodos
    public function __construct()
    {
        $this->conexion = new conexion_db("localhost", "chinook", "root", " ");
        $this->conexion->conectar();
        $this->auxTrack = $this->conexion->conexion;
    }

    //consulta listar canciones que si ha comprado
    public function Listar()
    {
        $CustomerId = $_SESSION['CustomerId'];
        $consulta = $this->auxTrack->prepare("SELECT tr.TrackId, tr.Name, tr.Composer, tr.Milliseconds, tr.UnitPrice FROM customer cus, invoice inv, invoiceline invl, track tr WHERE cus.CustomerId = inv.CustomerId AND inv.InvoiceId = invl.InvoiceId AND invl.TrackId = tr.TrackId AND cus.CustomerId = " . $CustomerId);
        $consulta->execute();
        $resultado = array();
        foreach ($consulta->fetchAll(PDO::FETCH_OBJ) as $obj) {
            $this->auxTrack = new clsTracks();
            $this->auxTrack->__set('TrackId', $obj->TrackId);
            $this->auxTrack->__set('Name', $obj->Name);
            $this->auxTrack->__set('Composer', $obj->Composer);
            $this->auxTrack->__set('Milliseconds', $obj->Milliseconds);
            $this->auxTrack->__set('UnitPrice', $obj->UnitPrice);
            $resultado[] = $this->auxTrack;
        }
        return $resultado;
    }

    //consulta listar canciones restantes que no ha comprado el usuario
    public function ListarNoCompradas()
    {
        $CustomerId = $_SESSION['CustomerId'];
        $consulta = $this->auxTrack->prepare("SELECT * FROM (SELECT tr.TrackId FROM customer cus, invoice inv, invoiceline invl, track tr WHERE cus.CustomerId = inv.CustomerId AND inv.InvoiceId = invl.InvoiceId AND invl.TrackId = tr.TrackId AND cus.CustomerId = ?) AS sq RIGHT JOIN track tra  ON tra.TrackId = sq.TrackId WHERE sq.TrackId IS NULL");
        $consulta->execute(array($CustomerId));
        $result = $consulta->rowCount();
        $resultado = null;
        try{
        if($result > 0){
            $resultado = array();
            foreach ($consulta->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $this->auxTrack = new clsTracks();
                $this->auxTrack->__set('TrackId', $obj->TrackId);
                $this->auxTrack->__set('Name', $obj->Name);
                $this->auxTrack->__set('Composer', $obj->Composer);
                $this->auxTrack->__set('Milliseconds', $obj->Milliseconds);
                $this->auxTrack->__set('UnitPrice', $obj->UnitPrice);
                $resultado[] = $this->auxTrack;
                }
            } else {
                throw new Exception("No hay canciones para comprar", 10004);
            }
        } catch (Exception $e) {
            $code = $e->getCode();
            $message = $e->getMessage();
            $file = $e->getFile();
            $line = $e->getLine();
            $resultado = "Exception thrown in ".$file." on line ".$line.": [Code ".$code."] ".$message;
        }
        return $resultado;
    }

    public function Comprar($idTrack)
    {
        $respuesta = Null;
        try {
            //consultamos si existe el id
            $consulta = $this->auxTrack->prepare("SELECT * FROM track WHERE TrackId = ?");
            $consulta->execute(array($idTrack));
            $track = $consulta->fetch(PDO::FETCH_ASSOC);
            $result = $consulta->rowCount();


            //consultamos el id siguiente a guardar de invoice
            $consulta = $this->auxTrack->prepare("SELECT InvoiceId FROM invoice ORDER BY InvoiceId DESC LIMIT 1");
            $consulta->execute();
            $datoObtenido2 = $consulta->fetch(PDO::FETCH_ASSOC);
            $result3 = $consulta->rowCount();

            //consultamos el id siguiente a guardar de invoiceline
            $consulta = $this->auxTrack->prepare("SELECT InvoiceLineId FROM invoiceline ORDER BY InvoiceLineId DESC LIMIT 1");
            $consulta->execute();
            $datoObtenido3 = $consulta->fetch(PDO::FETCH_ASSOC);
            $result4 = $consulta->rowCount();

            if ($result > 0 && $result3 > 0 && $result4 > 0) {
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
            } else {
                throw new Exception("El Id de la canción no se encuentra registrada", 10001);
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

    public function EliminarCompra($idTrack)
    {
        $respuesta = Null;
        try {
            $CustomerId = $_SESSION['CustomerId'];
            $consulta = $this->auxTrack->prepare("SELECT invl.InvoiceLineId, inv.InvoiceId FROM customer cus, invoice inv, invoiceline invl WHERE cus.CustomerId = inv.CustomerId AND inv.InvoiceId = invl.InvoiceId AND invl.TrackId = ? AND cus.CustomerId = ?");
            $consulta->execute(array(
                $idTrack,
                $CustomerId
            ));
            $delete = $consulta->fetch(PDO::FETCH_ASSOC);
            $result = $consulta->rowCount();
            if ($result > 0) {
                $consulta = $this->auxTrack->prepare("DELETE FROM invoiceline WHERE InvoiceLineId=?");
                $consulta->execute(array($delete['InvoiceLineId']));
                $consulta = $this->auxTrack->prepare("DELETE FROM invoice WHERE InvoiceId=?");
                $consulta->execute(array($delete['InvoiceId']));
            } else {
                throw new Exception("El Id que ingreso no se encuentra registrado", 10002);
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
}
