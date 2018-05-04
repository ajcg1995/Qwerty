<?php
require_once '../bd/Conexion.php';
//require_once '../modelo/Noticia.php';


function insertarNoticiaRuta($idRuta,$fechaNoticia,$descripcionNoticia,$idEmpresa){
    $instancia = Conexion::obtenerInstancia();
    $conn = $instancia->obtenerConexion();
    $query = "call PAinsertarNoticia('$idRuta','$fechaNoticia','$descripcionNoticia','$idEmpresa')";
    $resultado = $conn->query($query);
    if (!$resultado) {
        echo -1;
    } else {
        echo '';
    }
    if ($conn) {
        $instancia->cerrar($conn);
    }   
}
