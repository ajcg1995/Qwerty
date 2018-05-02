<?php
require_once ("../bd/ProcedimientosAdministracionRutas.php");

if(isset($_GET['idRuta'])){
    
    $resultado =  trazarRutas(2);
    
    echo $resultado;
    
}
