<?php


class Permiso {
   private $idPermiso;
   private $nombrePermiso;
   
   function __construct($idPermiso, $nombrePermiso) {
       $this->idPermiso = $idPermiso;
       $this->nombrePermiso = $nombrePermiso;
   }
   
   function obtenerIdPermiso() {
       return $this->idPermiso;
   }

   function obtenerNombrePermiso() {
       return $this->nombrePermiso;
   }

   function modificarIdPermiso($idPermiso) {
       $this->idPermiso = $idPermiso;
   }

   function modificarNombrePermiso($nombrePermiso) {
       $this->nombrePermiso = $nombrePermiso;
   }



}
