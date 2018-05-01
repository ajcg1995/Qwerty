<?php

class Ruta {
    private $idRuta;
    private $nombreRuta;
    private $gps;
    private $imgHorario;
    private $horario;
    private $estado;
   
    function __construct($idRuta, $nombreRuta, $gps, $imgHorario, $horario, $estado) {
        $this->idRuta = $idRuta;
        $this->nombreRuta = $nombreRuta;
        $this->gps = $gps;
        $this->imgHorario = $imgHorario;
        $this->horario = $horario;
        $this->estado = $estado;
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
}
