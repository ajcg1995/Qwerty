<?php
require_once ("../bd/ProcedimientosAdministracionRutas.php");

if(isset($_GET['idRuta'])){
    
    //print trazarRutas($_GET['idRuta']);
    echo trazarRutas($_GET['idRuta']);
    
}
