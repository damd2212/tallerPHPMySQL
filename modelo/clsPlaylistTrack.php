<?php


class clsPlaylistTrack {
    //atributos
    private $TrackId;
    private $PlaylistName;
    private $PlaylistId;
    private $TrackName;

    //métodos
    public function __construct() {}

    public function __get($atr){return $this->$atr;}

    public function __set($atr, $val){return $this->$atr = $val;}

}