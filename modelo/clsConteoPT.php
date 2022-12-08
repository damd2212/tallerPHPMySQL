<?php


class clsConteoPT {
    //atributos
    private $PlaylistName;
    private $total;

    //métodos
    public function __construct() {}

    public function __get($atr){return $this->$atr;}

    public function __set($atr, $val){return $this->$atr = $val;}

}