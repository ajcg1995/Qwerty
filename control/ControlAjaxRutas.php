<?php
require_once ("../bd/ProcedimientosAdministracionRutas.php");

if(isset($_GET['idRuta'])){
    $resultado =  trazarRutas($_GET['idRuta']);
    echo $resultado;
}
