<?php

class Ruta {
    private $idRuta;
    private $nombreRuta;
    private $gps;
    private $imgHorario;
    private $horario;
    private $estado;
    private $idEmpresa;
   
    function __construct($idRuta, $nombreRuta, $gps, $imgHorario, $horario, $estado,$idEmpresa) {
        $this->idRuta = $idRuta;
        $this->nombreRuta = $nombreRuta;
        $this->gps = $gps;
        $this->imgHorario = $imgHorario;
        $this->horario = $horario;
        $this->estado = $estado;
        $this->idEmpresa = $idEmpresa;
    }

    
    function obtenerIdRuta() {
        return $this->idRuta;
    }

    function obtenerNombreRuta() {
        return $this->nombreRuta;
    }

    function obtenerGps() {
        return $this->gps;
    }

    function obtenerImgHorario() {
        return $this->imgHorario;
    }

    function obtenerHorario() {
        return $this->horario;
    }
    
    function getEstado() {
        return $this->estado;
    }
    
    function obtenerIdEmpresa(){
        return $this->idEmpresa;
    }

    function modificarIdRuta($idRuta) {
        $this->idRuta = $idRuta;
    }

    function modificarNombreRuta($nombreRuta) {
        $this->nombreRuta = $nombreRuta;
    }

    function modificarGps($gps) {
        $this->gps = $gps;
    }

    function modificarImgHorario($imgHorario) {
        $this->imgHorario = $imgHorario;
    }

    function modificarHorario($horario) {
        $this->horario = $horario;
    }
    
    function setEstado($estado) {
        $this->estado = $estado;
    }
    
    function modificarIdEmpresa($idEmpresa){
        $this->idEmpresa = $idEmpresa;
    }
    
    
}
