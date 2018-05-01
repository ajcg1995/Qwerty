<?php

class Usuario {
    private $nombreUsuario;
    private $password;
    private $foto;
    private $estado;
    private $rol;
    private $empresa;
    private $apellidoUsuario;
    private $idUsuario;

    function __construct($idUsuario,$nombreUsuario, $apellidoUsuario, $password, $foto, $estado, $empresa, $rol) {
        $this->nombreUsuario = $nombreUsuario;
        $this->apellidoUsuario = $apellidoUsuario;
        $this->password = $password;
        $this->foto = $foto;
        $this->estado = $estado;
        $this->empresa = $empresa;
        $this->rol = $rol;
        $this->idUsuario = $idUsuario;
    }

    function obtenerApellidoUsuario(){
         return $this->apellidoUsuario;
    }
    function obtenerRol() {
        return $this->rol;
    }

    function obtenerEmpresa() {
        return $this->empresa;
    }

    function obtenerNombreUsuario() {
        return $this->nombreUsuario;
    }
    
    function obtenerIdUsuario() {
        return $this->idUsuario;
    }

    function obtenerPassword() {
        return $this->password;
    }

    function obtenerFoto() {
        return $this->foto;
    }

    function obtenerEstado() {
        return $this->estado;
    }

    function modificarNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }

    function modificarPassword($password) {
        $this->password = $password;
    }

    function modificarFoto($foto) {
        $this->foto = $foto;
    }

    function modificarEstado($estado) {
        $this->estado = $estado;
    }

}
