<?php

class Dispositivo {
    private $dispositivo;
    
    function __construct($dispositivo) {
        $this->dispositivo = $dispositivo;
    }
    
    function obtenerDispositivo() {
        return $this->dispositivo;
    }

    function modificarDispositivo($dispositivo) {
        $this->dispositivo = $dispositivo;
    }




    
}
