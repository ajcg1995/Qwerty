<?php

//Dependiendo la opc lista las empresas, rutas y dispositivos
function listado($opc){
    return listar($opc);
}

function cargarComboEmpresas($empresas){
    foreach ($empresas as $emp) {
        echo '<option value = "'.$emp->obtenerIdEmpresa().'">'.$emp->obtenerNombreEmpresa().'</option>';      
    }
}

function cargarComboRutas($rutas){
    foreach ($rutas as $ru) {
        echo '<option value = "'.$ru->obtenerIdRuta().'">'.$ru->obtenerNombreRuta().'</option>';      
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
        . '</tr>';
    }
}



