<?php


class clsPlaylistTrack {
    //atributos
    private $PlaylistName;
    private $TrackName;

    //métodos
    public function __construct() {}

    public function __get($atr){return $this->$atr;}

    public function __set($atr, $val){return $this->$atr = $val;}

}