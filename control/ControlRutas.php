<?php
require_once '../bd/ProcedimientosAdministracionRutas.php';
function ObtenerRutasPorEmpresa($idEmpresa){
   $result =  listarRutas($idEmpresa);  
   $concat="";
   while ($fila = mysqli_fetch_array($result,MYSQLI_ASSOC)){
      $concat.="<OPTION VALUE='".$fila['idRuta']."'>".$fila['nombreRuta']."</OPTION>";
    }
    return $concat;
}


function tablaRutas($idEmpresa){
   $result =  listarRutasEmpresa($idEmpresa);  
   
   if(mysqli_num_rows($result) > 0){
       $concat="";
   while ($fila = mysqli_fetch_array($result,MYSQLI_ASSOC)){
      $concat.= 
      '<tr>'
        . '<td>' . $fila['nombreRuta'] . '</td>'
        . '<td>' . $fila['idRuta'].'</td>'
        . '<td>' . $fila['monto']  . '</td>'
        . '<td>' . $fila['imgHorario']  . '</td>'  
        . '<td><button class ="btn btn-warning"><i class = "glyphicon glyphicon-pencil"></i></button></td>' 
   . '</tr>';
    }
    return $concat;  
              
   }else{
       return "No se encontraron Datos";
   }
   
   
}


