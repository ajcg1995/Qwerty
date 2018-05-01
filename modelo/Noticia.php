<?php

class Noticia {
    
    private $idNoticia;
    private $fechaNoticias;
    private $descripcionNoticias;
    private $imgNoticias;
    
    function __construct($idNoticia, $fechaNoticias, $descripcionNoticias, $imgNoticias) {
        $this->idNoticia = $idNoticia;
        $this->fechaNoticias = $fechaNoticias;
        $this->descripcionNoticias = $descripcionNoticias;
        $this->imgNoticias = $imgNoticias;
    }
    
    function obtenerIdNoticia() {
        return $this->idNoticia;
    }

    function obtenerFechaNoticias() {
        return $this->fechaNoticias;
    }

    function obtenerDescripcionNoticias() {
        return $this->descripcionNoticias;
    }

    function obtenerImgNoticias() {
        return $this->imgNoticias;
    }

    function modificarIdNoticia($idNoticia) {
        $this->idNoticia = $idNoticia;
    }

    function modificarFechaNoticias($fechaNoticias) {
        $this->fechaNoticias = $fechaNoticias;
    }

    function modificarDescripcionNoticias($descripcionNoticias) {
        $this->descripcionNoticias = $descripcionNoticias;
    }

    function modificarImgNoticias($imgNoticias) {
        $this->imgNoticias = $imgNoticias;
    }
}
