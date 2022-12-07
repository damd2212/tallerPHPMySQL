<?php

class conexion_db {
    //atributos
    private $conexion;
    private $BDnombre;
    private $BDUsuario;
    private $BDclave;
    private $conexionHost;

    public function __construct($conexionHost, $BDnombre, $BDusuario, $BDclave) {
        $this->conexionHost = $conexionHost;
        $this->BDnombre = $BDnombre;
        $this->BDusuario = $BDusuario;
        $this->BDclave = $BDclave;
    }

    public function conectar() {
        $conn = 'mysql:host='."localhost".';'.'dbname='."chinook";
        $this->conexion = new PDO($conn, "root", "");
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function desconectar() {
        $this->conexion = null;
    }

    public function __GET($atr){return $this->$atr;}
    public function __SET($atr,$val){return $this->$atr = $val;}

}
    

?>