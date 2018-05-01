<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <link href="../recursos/css/InicioSesion.css" rel="stylesheet"/>
        <script  type="text/javascript" src="../recursos/js/InicioSesion.js"></script>  
        <?php
        require ("../control/ControlArchivosCabecera.php");
        require ("../bd/ProcedimientosAdministracion.php");             
        ?>         
    </head>    
    <body>   
        <?php require("../vista/Cabecera.php"); ?>
        <div class="" id="login-modal" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="loginmodal-container">                  
                <h1>Acceder</h1><br>                    
                <input type="text" id ="usuario" placeholder="Usuario">
                <input type="password" id="contrasena" placeholder="Contraseña"><br><br>
                <input id = "inputAcceder" onclick ="acceder(this);" type="submit" class="login loginmodal-submit" value="Acceder">                    
                <div id ='ayuda' ><br> 
                    <a href="#">¿Olvidaste la contraseña?</a>
                </div>
            </div>
        </div>
    </body>


</html>



