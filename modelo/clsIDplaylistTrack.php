<?php


class clsIDplaylistTrack {
    //atributos
    private $PlaylistId;
    private $TrackId;

    //métodos
    public function __construct() {}

    public function __get($atr){return $this->$atr;}

    public function __set($atr, $val){return $this->$atr = $val;}

}