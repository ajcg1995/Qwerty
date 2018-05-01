<?php


class Rol {
    private $idRol;
    private $nombreRol;
    
    function __construct($idRol, $nombreRol) {
        $this->idRol = $idRol;
        $this->nombreRol = $nombreRol;
    }
    
    function obtenerIdRol() {
        return $this->idRol;
    }

    function obtenerNombreRol() {
        return $this->nombreRol;
    }

    function modificarIdRol($idRol) {
        $this->idRol = $idRol;
    }

    function modificarNombreRol($nombreRol) {
        $this->nombreRol = $nombreRol;
    }




}
