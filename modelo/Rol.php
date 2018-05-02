<?php


class Rol {
    private $idRol;
    private $nombreRol;
    
    public function __construct($idRol, $nombreRol) {
        $this->idRol = $idRol;
        $this->nombreRol = $nombreRol;
    }
    
   public function obtenerIdRol() {
        return $this->idRol;
    }

    public function obtenerNombreRol() {
        return $this->nombreRol;
    }

   public function modificarIdRol($idRol) {
        $this->idRol = $idRol;
    }

  public  function modificarNombreRol($nombreRol) {
        $this->nombreRol = $nombreRol;
    }




}
