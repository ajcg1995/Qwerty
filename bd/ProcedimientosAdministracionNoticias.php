<?php
require_once '../bd/Conexion.php';
require_once '../modelo/Noticia.php';
require_once '../modelo/Usuario.php';
require_once '../modelo/Empresa.php';
require_once '../modelo/Rol.php';


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

function listarNoticiasEmpresa($idEmpresa){
    $instancia = Conexion::obtenerInstancia();
    $conn = $instancia->obtenerConexion();   
    $query = "Call PAlistarNoticias($idEmpresa)";
    if (mysqli_multi_query($conn, $query)){
        if($result = mysqli_store_result($conn)) {   
            return $result;  
        }   
    }
}