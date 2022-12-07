<?php

class clsCustomer {
    //atributos
    private $CustomerId;
    private $FirstName;
    private $LastName;
    private $Email;

    //metodos 
    public function __construct() {}
    
    public function __get($atr) {return $this->$atr;}
    public function __set($atr, $val) {return $this->$atr = $val;}
}