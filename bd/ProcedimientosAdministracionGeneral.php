<?php

require_once '../bd/Conexion.php';
require_once '../modelo/Empresa.php';
require_once '../modelo/Ruta.php';
function listarQuery($opc){
    $query = false;
    if($opc == 1){
        $query = 'call PAlistarEmpresas()';
    }
    else if($opc == 2){
        $query = 'call PAlistarRutas()';
    }
    
    if ($conn) {
        $instancia->cerrar($conn);
    }
    return $query;
}

function opcionInstanca($opc, $fila){
    if($opc == 1){
        return instanciarEmpresa($fila) ;
    }else if($opc == 2){
         return  instanciarRuta($fila);
    }
    else if($opc == 3){
        
    }
}

function listar($opc) {
    $instancia = Conexion::obtenerInstancia();
    $conn = $instancia->obtenerConexion();    
    $query =listarQuery($opc);
    $resultado = $conn->query($query);
    $filas = array();
    if ($resultado === false) {
        return false;
    }
    while ($fila = $resultado->fetch_assoc()) {
        $filas[] = opcionInstanca($opc,$fila);
    }
    if ($conn) {
        $instancia->cerrar($conn);
    }
    return $filas;
}

function instanciarRuta($fila) {
    $idRuta = $fila['idRuta'];
    $nombreRuta = $fila['nombreRuta'];
    $gps = $fila['gps'];
    $imgHorario = $fila['imgHorario'];
    $horario = $fila['horario'];
    $estado = $fila['estado'];
    return new Ruta($idRuta, $nombreRuta, $gps, $imgHorario, $horario, $estado);
}

function instanciarEmpresa($fila) {
    $idEmpresa = $fila['idEmpresa'];
    $nombreEmpresa = $fila['nombreEmpresa'];
    $encargado = $fila['encargado'];
    $telefono = $fila['telefono'];
    $correo = $fila['correo'];
    $direccion = $fila['direccion'];
    return new Empresa($idEmpresa, $nombreEmpresa, $encargado, $telefono, $correo, $direccion);
}
