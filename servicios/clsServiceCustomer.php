<?php
require_once '../modelo/conexion_db.php';

class clsServiceCustomer{
    //atributos
    //atributos
    private $conexion;
    private $auxCustomer;

    //metodos
    public function __construct()
    {
        $this->conexion = new conexion_db("localhost","chinook","root"," ");
        $this->conexion->conectar();
        $this->auxCustomer = $this->conexion->conexion;
    }

    public function Validar($prmEmail,$prmCustomerId) {
        $consulta = $this->auxCustomer->prepare("SELECT * FROM CUSTOMER WHERE Email =? AND CustomerId=?");
        $consulta->execute(array($prmEmail,$prmCustomerId));
        $customer = $consulta->fetch(PDO::FETCH_ASSOC);
        $filas = $consulta ->rowCount();
        
        if($filas > 0){
            $_SESSION['FirstName'] = $customer['FirstName'];
            $_SESSION['CustomerId'] = $customer['CustomerId'];
        } 
        return $filas;

    }

}