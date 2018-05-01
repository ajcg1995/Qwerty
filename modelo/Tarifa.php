<?php

class Tarifa {
    private $monto;
    private $descripcion;
    
    function __construct($monto, $descripcion) {
        $this->monto = $monto;
        $this->descripcion = $descripcion;
    }

    function obtenerMonto() {
        return $this->monto;
    }

    function obtenerDescripcion() {
        return $this->descripcion;
    }
    
    function modificarMonto($monto) {
        $this->monto = $monto;
    }

    function modificarDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


    
}
