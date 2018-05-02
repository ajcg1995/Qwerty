<?php

class Usuario {
    private $nombreUsuario;
    private $password;
    private $foto;
    private $estado;
    private $rol;
    private $empresa; //objeto
    private $apellidoUsuario;
    private $idUsuario;

    public function __construct($idUsuario,$nombreUsuario, $apellidoUsuario, $password, $foto, $estado, $empresa, $rol) {
        $this->nombreUsuario = $nombreUsuario;
        $this->apellidoUsuario = $apellidoUsuario;
        $this->password = $password;
        $this->foto = $foto;
        $this->estado = $estado;
        $this->empresa = $empresa;
        $this->rol = $rol;
        $this->idUsuario = $idUsuario;
    }

    public  function obtenerApellidoUsuario(){
         return $this->apellidoUsuario;
    }
    public function obtenerRol() {
        return $this->rol;
    }

    public function obtenerEmpresa() {
        return $this->empresa;
    }

  public  function obtenerNombreUsuario() {
        return $this->nombreUsuario;
    }
    
   public function obtenerIdUsuario() {
        return $this->idUsuario;
    }

  public  function obtenerPassword() {
        return $this->password;
    }

  public  function obtenerFoto() {
        return $this->foto;
    }

  public  function obtenerEstado() {
        return $this->estado;
    }

  public  function modificarNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }

   public function modificarPassword($password) {
        $this->password = $password;
    }

   public function modificarFoto($foto) {
        $this->foto = $foto;
    }

  public  function modificarEstado($estado) {
        $this->estado = $estado;
    }

}
