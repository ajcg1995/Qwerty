<?php
require ("../bd/ProcedimientosAdministracion.php");
require ("../control/ControlAdministracion.php");
//Agregar nuevo rol al sistema
if(isset($_POST['agregarRol'])){
    $rol = $_POST['agregarRol'];
    $resultado = agregarRoles($rol);
    if($resultado == -1){
        echo -1;
    }else {
        $roles = listarRoles();
        tablaRoles($roles);
    }
}

if(isset($_POST['eliminarRol'])){
    $rol = $_POST['eliminarRol'];
    $resultado = eliminarRoles($rol);
    if($resultado == -1){
        echo -1;
    }else {
        $roles = listarRoles();
        tablaRoles($roles);
    }
}


