<?php
require_once '../bd/ProcedimientosAdministracionNoticias.php';

function tablaNoticias($idEmpresa){
    
   $result = listarNoticiasEmpresa($idEmpresa);  
   
   if(mysqli_num_rows($result) > 0){
       $concat="";
   while ($fila = mysqli_fetch_array($result,MYSQLI_ASSOC)){
      $concat.= 
      '<tr>'
        . '<td>' . $fila['idNoticia'] . '</td>'
        . '<td>' . $fila['idRuta'].'</td>'
        . '<td>' . $fila['fechaNoticia']  . '</td>'
        . '<td>' . $fila['descripcionNoticia']  . '</td>'  
        . '<td>' . $fila['idEmpresa']  . '</td>'  
        . '<td><button onclick="abrirModalAgregarNoticia(this)" class ="btn btn-warning"><i class = "glyphicon glyphicon-pencil"></i></button></td>' 
   . '</tr>';
    }
    return $concat;  
              
   }else{
       return "No se encontraron Datos";
   } 
}
