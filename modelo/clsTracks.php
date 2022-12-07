<?php


class clsTracks {
    //atributos
    private $TrackId;
    private $Name;
    private $AlbumId;
    private $MediaTypeId;
    private $GenreId;
    private $Composer;
    private $Milliseconds;
    private $Bytes;
    private $UnitPrice;

    //métodos
    public function __construct() {}

    public function __get($atr){return $this->$atr;}

    public function __set($atr, $val){return $this->$atr = $val;}

}