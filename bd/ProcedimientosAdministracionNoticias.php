<?php
require_once '../bd/Conexion.php';
require_once '../modelo/Noticia.php';
require_once '../modelo/Usuario.php';
require_once '../modelo/Empresa.php';
require_once '../modelo/Rol.php';



function insertarNoticiaRuta($idRuta, $fechaNoticia, $descripcionNoticia) {
    $instancia = Conexion::obtenerInstancia();
    $conn = $instancia->obtenerConexion();
    $query = "call PAinsertarNoticia('$idRuta','$fechaNoticia','$descripcionNoticia')";
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

function modificarNoticiasEmpresa($idNoticia, $fechaNoticia, $descripcionNoticia,$idRuta) {
    $instancia = Conexion::obtenerInstancia();
    $conn = $instancia->obtenerConexion();
    $query = "call PAmodificarNoticias('$idRuta','$fechaNoticia','$descripcionNoticia','$idNoticia')";
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

function borrarNoticiasEmpresa($idNoticia) {
    $instancia = Conexion::obtenerInstancia();
    $conn = $instancia->obtenerConexion();
    $query = "call PAborrarNoticia('$idNoticia')";
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

function listarNoticias($idEmpresa) {
    $arreglo = array();
     $instancia = Conexion::obtenerInstancia();
    $conn = $instancia->obtenerConexion();
    $query = "Call PAlistarNoticiasEmpresas($idEmpresa)";
    if (mysqli_multi_query($conn, $query)) {
        $result = mysqli_store_result($conn);

        while ($fila = $result->fetch_assoc()) {
            $idNoticia = $fila['idNoticia'];
            $idRuta = $fila['idRuta'];
            $descripcionNoticias = $fila['descripcionNoticia'];
            $fechaNoticias = $fila['fechaNoticia'];
            $arreglo[] = new Noticia($idNoticia, $fechaNoticias, $descripcionNoticias, $idRuta);
        }
    }
    if ($conn) {
        $instancia->cerrar($conn);
    }

    return $arreglo != null ? $arreglo : null;
}
