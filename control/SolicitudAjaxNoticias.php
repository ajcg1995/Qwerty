<?php
require ("../bd/ProcedimientosAdministracionNoticias.php");
require ("../modelo/Usuario.php");
require ("../modelo/Empresa.php");
 session_start();
        

if(isset($_POST['idRuta'])){
    
    $idRuta = $_POST['idRuta'];
    $descNoticia = $_POST['descNoticia'];
    $fechaNoticia = $_POST['fechaNoticia'];
    $idEmpresa = $_SESSION['usuario']->obtenerEmpresa()->obtenerIdEmpresa();
    
    $resultado = insertarNoticiaRuta($idRuta, $fechaNoticia, $descNoticia, $idEmpresa);
    
    if($resultado == -1){
        echo -1;
    }else {
        echo 'LISTOOO';
        
        /*
         * Aqui va el listar noticias   
         
        $roles = listarRoles();
        tablaRoles($roles);
          
         */
    }
    
}
