<?php
require_once("../bd/ProcedimientosAdministracionNoticias.php");
require_once("../Control/ControlAdministracionRutasUsuarios.php");
require_once ("../modelo/Usuario.php");
require_once ("../modelo/Empresa.php");
 session_start();
$us = $_SESSION['usuario'];
$idEmpresa = $us->obtenerEmpresa()->obtenerIdEmpresa();
        

if(isset($_POST['idRuta'])){
    
    $idRuta = $_POST['idRuta'];
    $descNoticia = $_POST['descNoticia'];
    $fechaNoticia = $_POST['fechaNoticia'];
    
    
    $resultado = insertarNoticiaRuta($idRuta, $fechaNoticia, $descNoticia);
    
    if($resultado == -1){
        echo -1;
    }else {
       
        tablaNoticias($idEmpresa);
        
    }
    
}

if(isset($_POST['idRutaM'])){
    
    $idRutaM = $_POST['idRutaM'];
    $idNoticiaM =  $_POST['idNoticiaM'];
    $fechaNoticiaM = $_POST['fechaNoticiaM'];
    $descripcionM = $_POST['descripcionM'];
    
    $resultado = modificarNoticiasEmpresa($idNoticiaM, $fechaNoticiaM, $descripcionM, $idRutaM);
    
    if($resultado == -1){
        echo -1;
    }else {
       
        tablaNoticias($idEmpresa);
        
    }
}


if(isset($_POST['idNoticiaE'])){
    
    $idNoticiaEliminar = $_POST['idNoticiaE'];
    $resultado = borrarNoticiasEmpresa($idNoticiaEliminar);
    
    if($resultado == -1){
        echo -1;
    }else {     
        echo tablaNoticias($idEmpresa);       
    }
    
    
    
    
}
