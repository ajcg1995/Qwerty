<?php
require ("../bd/ProcedimientosAdministracionRutas.php");

if(isset($_GET['idRuta'])){
    
    echo trazarRutas($_GET['idRuta']);
}
