<?php


class clsMediaType {
    //atributos
    private $MediaTypeId;
    private $Name;

    //métodos
    public function __construct() {}

    public function __get($atr){return $this->$atr;}

    public function __set($atr, $val){return $this->$atr = $val;}

}