<?php

class Empresa {
    private $idEmpresa;
    private $nombreEmpresa;
    private $encargado;
    private $telefono;
    private $correo;
    private $direccion;
    
    function __construct($idEmpresa, $nombreEmpresa, $encargado, $telefono, $correo, $direccion) {
        $this->idEmpresa = $idEmpresa;
        $this->nombreEmpresa = $nombreEmpresa;
        $this->encargado = $encargado;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->direccion = $direccion;
    }
    
    function obtenerIdEmpresa() {
        return $this->idEmpresa;
    }

    function obtenerNombreEmpresa() {
        return $this->nombreEmpresa;
    }

    function obtenerEncargado() {
        return $this->encargado;
    }

    function obtenerTelefono() {
        return $this->telefono;
    }

    function obtenerCorreo() {
        return $this->correo;
    }

    function obtenerDireccion() {
        return $this->direccion;
    }  
  
}
