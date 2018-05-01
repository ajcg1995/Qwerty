<?php

require_once '../bd/Conexion.php';
require_once '../modelo/Rol.php';
require_once '../modelo/Permiso.php';
require_once '../modelo/Usuario.php';
require_once '../modelo/Empresa.php';

define('HASH', PASSWORD_DEFAULT);
define('COST', 11);

function listarRoles() {
    $instancia = Conexion::obtenerInstancia();
    $conn = $instancia->obtenerConexion();
    $query = 'call PAlistarRoles()';
    $resultado = $conn->query($query);
    $filas = array();
    if ($resultado === false) {
        return false;
    }
    while ($fila = $resultado->fetch_assoc()) {
        $idRol = $fila['idRol'];
        $nombreRol = $fila['nombreRol'];
        $filas[] = new Rol($idRol, $nombreRol);
    }
    if ($conn) {
        $instancia->cerrar($conn);
    }
    return $filas;
}

function agregarRoles($rol) {
    $instancia = Conexion::obtenerInstancia();
    $conn = $instancia->obtenerConexion();
    $query = "call PAagregarRoles('$rol')";
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

function eliminarRoles($id) {
    $instancia = Conexion::obtenerInstancia();
    $conn = $instancia->obtenerConexion();
    $query = "call PAeliminarRoles('$id')";
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

function listarPermisos() {
    $instancia = Conexion::obtenerInstancia();
    $conn = $instancia->obtenerConexion();
    $query = 'call PAlistarPermisos()';
    $resultado = $conn->query($query);
    $filas = array();
    if ($resultado === false) {
        return false;
    }
    while ($fila = $resultado->fetch_assoc()) {
        $idPermiso = $fila['idPermiso'];
        $nombrePermiso = $fila['nombrePermiso'];
        $filas[] = new Permiso($idPermiso, $nombrePermiso);
    }
    if ($conn) {
        $instancia->cerrar($conn);
    }
    return $filas;
}

function listarUsuarios() {
    $instancia = Conexion::obtenerInstancia();
    $conn = $instancia->obtenerConexion();
    $query = 'call PAlistarUsuarios()';
    $resultado = $conn->query($query);
    $filas = array();
    if ($resultado === false) {
        return false;
    }
    while ($fila = $resultado->fetch_assoc()) {
        $filas[] = instanciaUsuario($fila);
    }
    if ($conn) {
        $instancia->cerrar($conn);
    }
    return $filas;
}

function usuarioLogueado($usuario, $contrasenia) {
    $res = NULL;
    $instancia = Conexion::obtenerInstancia();
    $conn = $instancia->obtenerConexion();
    $queryContrasena = 'call PAcontrasenaUsuario("' . $usuario . '")';
    $resultadoContrasena = $conn->query($queryContrasena);
    while ($fila = $resultadoContrasena->fetch_assoc()) {
        $contra = $fila;
    }
    $contra = $contra['contrasena'];
    if ($conn) {
        $instancia->cerrar($conn);
    }
    /*if (password_verify($contrasenia, $contra)) {
        if (password_needs_rehash($contra, HASH, ['cost' => COST])) {
            $contrasenia = password_hash($contrasenia, HASH, ['cost' => COST]);
            modificarContrasena($usuario, $contrasenia);
        }*/
        $instancia = Conexion::obtenerInstancia();
        $conn = $instancia->obtenerConexion();
        $query = 'call PAusuarioLogueado("' . $usuario . '","' . $contra . '")';
        $resultado = $conn->query($query);
        $filas = array();
        if ($resultado === false) {
            return false;
        }
        while ($fila = $resultado->fetch_assoc()) {
            $filas = instanciaUsuarioLogueado($fila, $usuario, $contrasenia);
        }
        if ($conn) {
            $instancia->cerrar($conn);
        }
        $res = count($filas) == 1 ? $filas : NULL;
    //}
    return $res;
}

function modificarContrasena($usuario, $contrasenia) {
    $instancia = Conexion::obtenerInstancia();
    $conn = $instancia->obtenerConexion();
    $queryContrasena = 'call PAactualizarContrasena("' . $usuario . '","' . $contrasenia . '")';
    $resultadoContrasena = $conn->query($queryContrasena);
    if ($conn) {
        $instancia->cerrar($conn);
    }
    return $resultadoContrasena;
}

function listarPermisosPorRol() {
    $conexion = Conexion::obtenerInstancia();
    $query = 'call PAlistarPermisosPorRol(1)';
    $resultado = $conexion->query($query);
    $filas = array();
    if ($resultado === false) {
        return false;
    }
    while ($fila = $resultado->fetch_assoc()) {
        $idPermiso = $fila['idPermiso'];
        $nombrePermiso = $fila['nombrePermiso'];
        $filas[] = new Permiso($idPermiso, $nombrePermiso);
    }
    return $filas;
}

function instanciaUsuario($fila) {
    $idUsuario = $fila['idUsuario'];
    $nombreUsuario = $fila['nombreUsuario'];
    $apellidoUsuario = $fila['apellidoUsuario'];
    $contrasena = $fila['contrasena'];
    $idEmpresa = $fila['idEmpresa'];
    $idRol = $fila['idRol'];
    $nombreRol = $fila['nombreRol'];
    $estadoUsuario = $fila['estadoUsuario'];
    $foto = $fila['foto'];
    $nombreEmpresa = $fila['nombreEmpresa'];
    $encargado = $fila['encargado'];
    $telefono = $fila['telefono'];
    $correo = $fila['correo'];
    $direccion = $fila['direccion'];
    $rol = new Rol($idRol, $nombreRol);
    $empresa = new Empresa($idEmpresa, $nombreEmpresa, $encargado, $telefono, $direccion, $correo);
    return new Usuario($idUsuario, $nombreUsuario, $apellidoUsuario, $contrasena, $foto, $estadoUsuario, $empresa, $rol);
}

function instanciaUsuarioLogueado($fila, $idUsuario, $contrasena) {
    $nombreUsuario = $fila['nombreUsuario'];
    $apellidoUsuario = $fila['apellidoUsuario'];
    $idEmpresa = $fila['idEmpresa'];
    $idRol = $fila['idRol'];
    $nombreRol = $fila['nombreRol'];
    $estadoUsuario = $fila['estadoUsuario'];
    $foto = $fila['foto'];
    $nombreEmpresa = $fila['nombreEmpresa'];
    $encargado = $fila['encargado'];
    $telefono = $fila['telefono'];
    $correo = $fila['correo'];
    $direccion = $fila['direccion'];
    $rol = new Rol($idRol, $nombreRol);
    $empresa = new Empresa($idEmpresa, $nombreEmpresa, $encargado, $telefono, $direccion, $correo);
    return new Usuario($idUsuario, $nombreUsuario, $apellidoUsuario, $contrasena, $foto, $estadoUsuario, $empresa, $rol);
}
