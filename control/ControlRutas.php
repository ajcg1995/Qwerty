<?php
require_once '../bd/ProcedimientosAdministracionRutas.php';
function ObtenerRutasPorEmpresa($idEmpresa){
   $result =  listarRutas(2);  
   $concat="";
   while ($fila = mysqli_fetch_array($result,MYSQLI_ASSOC)){
      $concat.="<OPTION VALUE='".$fila['idRuta']."'>".$fila['nombreRuta']."</OPTION>";
    }
    return $concat;
}


