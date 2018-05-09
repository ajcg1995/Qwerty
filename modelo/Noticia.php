<?php

class Noticia {
    
    private $idNoticia;
    private $fechaNoticias;
    private $descripcionNoticias;
    private $idRuta;
 
    
    function __construct($idNoticia, $fechaNoticias, $descripcionNoticias,$idRuta) {
        $this->idNoticia = $idNoticia;
        $this->fechaNoticias = $fechaNoticias;
        $this->descripcionNoticias = $descripcionNoticias;
        $this->idRuta = $idRuta;
    }
    
    function obtenerIdNoticia() {
        return $this->idNoticia;
    }
    function obtenerIdRuta() {
        return $this->idRuta;
    }

    function obtenerFechaNoticias() {
        return $this->fechaNoticias;
    }

    function obtenerDescripcionNoticias() {
        return $this->descripcionNoticias;
    }

    function obtenerRutaNoticias(){
        return $this->idRuta;
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
    function modificarRutaNoticias($idRuta){
        $this->idRuta = $idRuta;
    }
    

    
}
