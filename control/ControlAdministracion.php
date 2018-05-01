<?php
    
function cargarRoles() {
    return listarRoles();
}

function cargarUsuarios(){
        return listarUsuarios();
}

function cargarPermisos(){
    return listarPermisos();
}


function cargarComboRoles($roles){
    foreach ($roles as $rol) {
        echo '<option value = "'.$rol->obtenerIdRol().'">'.$rol->obtenerNombreRol().'</option>';      
    }
}

function tablaRoles($roles) {
    foreach ($roles as $rol) {
        echo '<tr>'
        . '<td>' . $rol->obtenerIdRol() . '</td>'
        . '<td>' . $rol->obtenerNombreRol() . '</td>'
        . '<td><button class ="btn btn-info"><i class = "glyphicon glyphicon-user"></i></button></td>'
        . '<td><button class ="btn btn-warning"><i class = "glyphicon glyphicon-pencil"></i></button></td>' 
        . '<td><button value = "'.$rol->obtenerIdRol().'" class ="btn btn-danger" onclick = "eliminarRol(this);"><i class = "glyphicon glyphicon-minus"></i></button></td>'        
        . '</tr>';
    }
}

function tablaPermisos($permisos){
    foreach ($permisos as $per) {
        echo '<tr>'
        . '<td>' . $per->obtenerIdPermiso() . '</td>'
        . '<td>' . $per->obtenerNombrePermiso() . '</td>'
        . '<td><input type = "checkbox"></td>'      
        . '</tr>';
    }
}

function tablaUsuarios($usuarios){
    foreach ($usuarios as $us) {
        echo '<tr>'
        . '<td>' . $us->obtenerIdUsuario() . '</td>'
        . '<td>' . $us->obtenerNombreUsuario()." ".$us->obtenerApellidoUsuario().  '</td>'
        . '<td>' . $us->obtenerRol()->obtenerNombreRol()  . '</td>'
        . '<td>' . $us->obtenerEmpresa()->obtenerNombreEmpresa()  . '</td>'  
        . '<td>'.$us->obtenerEstado().'</td>' 
        . '</tr>';
    }
}

function tablaEmpresas($empresas){
    foreach ($empresas as $us) {
        echo '<tr>'
        . '<td>' . $us->obtenerIdEmpresa() . '</td>'
        . '<td>' . $us->obtenerNombreEmpresa().'</td>'
        . '<td>' . $us->obtenerEncargado()  . '</td>'
        . '<td>' . $us->obtenerTelefono()  . '</td>'  
        . '<td>'.$us->obtenerCorreo().'</td>'
        . '<td>'.$us->obtenerDireccion().'</td>' 
        . '<td><button class ="btn btn-warning"><i class = "glyphicon glyphicon-pencil"></i></button></td>' 
        . '<td><button class ="btn btn-danger"><i class = "glyphicon glyphicon-minus"></i></button></td>' 
        . '<td><button class ="btn btn-info">Activo</button></td>'
        . '<td><button class ="btn btn-info"><i class = "glyphicon glyphicon-user"></i></button></td>'         
        . '</tr>';
    }
}


