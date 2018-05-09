<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>  
        <link href="../recursos/css/EstiloGeneral.css" rel="stylesheet" type="text/css"/>
    <?php
    require_once '../control/ControlRutas.php';
    require ("../control/ControlArchivosCabecera.php");
    ?>

    </head>

    <body id="MapaContenedor"> 
        <?php       
        require("../vista/Cabecera.php");       
        ?>          
    <div id="contieneCombo">
        <select id="cboRutas" class="form-control" NAME="selCombo" SIZE=1 onChange="TrazarRutaMapa()"> 
            <OPTION VALUE="0">Seleccionar Ruta</OPTION>
            <?php
                $us = $_SESSION['usuario'];
                $idEmpresa =  $us->obtenerEmpresa()->obtenerIdEmpresa();
                echo ObtenerRutasPorEmpresa($idEmpresa);
            ?>
        </select>
    </div>
        
    <div id="map-canva" style="width: 90%; height: 450px;margin: auto">
            Mostrando Mapa...
    </div>
        <!--
        <input type="submit" onclick="TrazarRutaMapa()" value="prueba" />
        <input type="submit" onclick="baseData(1)" value="Basedata" /> -->
        <?php
        // https://www.phpcentral.com/pregunta/231/aporte-geolocalizacion-de-usuario-w3c
        //https://www.phpcentral.com/pregunta/630/leer-coordenadas-y-trazar-ruta-en-google-maps
        //<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d15720.509971110643!2d-84.1382365!3d9.9233386!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2scr!4v1525150969450" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
        ?>
    </body>
</html>

<script src="../recursos/js/Rutas.js" type="text/javascript"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBqvWebwOCDVsT_eAEtZzXakPKuIsRXOE&callback=Inicializar"
        type="text/javascript"></script>
        <script src="../recursos/bootstrap/js/jquery1.12.4.js" type="text/javascript"></script>
        
        <script src="https://www.gstatic.com/firebasejs/4.13.0/firebase.js">
            
            
</script>
