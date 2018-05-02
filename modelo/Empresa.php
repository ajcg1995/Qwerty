<?php

class Empresa {
    public $idEmpresa;
    private $nombreEmpresa;
    private $encargado;
    private $telefono;
    private $correo;
    private $direccion;
    
    public function __construct($idEmpresa, $nombreEmpresa, $encargado, $telefono, $correo, $direccion) {
        $this->idEmpresa = $idEmpresa;
        $this->nombreEmpresa = $nombreEmpresa;
        $this->encargado = $encargado;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->direccion = $direccion;
    }
    
    public function  obtenerIdEmpresa() {
        return $this->idEmpresa;
    }

   public function obtenerNombreEmpresa() {
        return $this->nombreEmpresa;
    }

  public  function obtenerEncargado() {
        return $this->encargado;
    }

   public function obtenerTelefono() {
        return $this->telefono;
    }

  public  function obtenerCorreo() {
        return $this->correo;
    }

  public  function obtenerDireccion() {
        return $this->direccion;
    }  
  
}
