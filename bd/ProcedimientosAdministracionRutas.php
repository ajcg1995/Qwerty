<?php
require_once '../bd/Conexion.php';
require_once '../modelo/Ruta.php';
require_once '../modelo/Empresa.php';


function listarRutas($idEmpresa){
    $instancia = Conexion::obtenerInstancia();
    $conn = $instancia->obtenerConexion();   
    $query = 'call PAinsertarRuta()';
    $resultado = $conn->query($query);
    $filas = array();
    if ($resultado === false) {
        return false;
    }
    while ($fila = $resultado->fetch_assoc()) {
        $idRuta = $fila['idRuta'];
        $idEmpresa = $fila['idEmpresa'];
        $nombreRuta = $fila['nombreRuta'];
        $gps = $fila['gps'];
        $imgHorario = $fila['imgHorario'];        
        $rutaEstatus = $fila['rutaEstatus'];
        $horario = $fila['horario'];        
        $filas[] = new Permiso($idPermiso, $nombrePermiso);
    }
    if ($conn) {
        $instancia->cerrar($conn);
    }
    return $filas;
}

function insertarRutas($idEmpresa,$nombreRuta,$gps,$imgHorario,$rutaEstatus,$horario){
    $instancia = Conexion::obtenerInstancia();
    $conn = $instancia->obtenerConexion();
    $query = "call PAinsertarRuta('$idEmpresa','$nombreRuta','$gps','$imgHorario','$rutaEstatus','$horario')";
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

function borrarRutas($idRuta){
    $instancia = Conexion::obtenerInstancia();
    $conn = $instancia->obtenerConexion();
    $query = "call PAborrarRuta('$idRuta')";
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

function buscarRutas($idRuta){
    $instancia = Conexion::obtenerInstancia();
    $conn = $instancia->obtenerConexion();   
    $query = 'call PAinsertarRuta()';
    $resultado = $conn->query($query);
    $filas = array();
    if ($resultado === false) {
        return false;
    }
    while ($fila = $resultado->fetch_assoc()) {
        $idPermiso = $fila['idPermiso'];
        $nombrePermiso = $fila['nombrePermiso'];
        $idEmpresa = new Empresa($fila);
        $nombreRuta = $fila['nombreRuta'];
        $gps = $fila['gps'];
        $imgHorario = $fila['imgHorario'];
        $rutaEstatus = $fila['rutaEstatus'];
        $horario = $fila['horario'];   
        $filas[] = new Permiso($idRuta, $nombreRuta, $gps, $imgHorario, $horario, $estado,$idEmpresa);
    }
    if ($conn) {
        $instancia->cerrar($conn);
    }
    return $filas;  
}


function modificarRuta($idRuta,$idEmpresa,$nombreRuta,$gps,$imgHorario,$rutaEstatus,$horario){
    $instancia = Conexion::obtenerInstancia();
    $conn = $instancia->obtenerConexion();
    $query = "call PAmodificarRuta('$idRuta','$idEmpresa','$nombreRuta','$gps','$imgHorario','$rutaEstatus','$horario')";
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

function trazarRutas($idRuta){
    $instancia = Conexion::obtenerInstancia();
    $conn = $instancia->obtenerConexion();
    $query = "SELECT gps FROM `ruta` WHERE idRuta = $idRuta";
    $result = $conn->query($sql);
    $fila = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $conn->close();  
    $ruta = $fila['gps'];
    $fp = fopen("$ruta","r");
    while (!feof($fp)){
        $linea = fgets($fp); 
        $arreglo[] = explode(",",$linea);        
    }
    
    for($i=1;$i<sizeof($arreglo);$i++){
        for($j=0;$j<2 ;$j++){
            //echo $arreglo[$i][$j].'  ';
            
            $arreglo2 []= array(
            "lant" => $arreglo[$i][$j],
            "long" => $arreglo[$i][$j+1]);
        break;
         } 
    }
    print json_encode($arreglo2);       
}

   
