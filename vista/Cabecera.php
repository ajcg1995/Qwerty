<?php
session_start();
$us = (isset($_SESSION['usuario'])) ? $_SESSION['usuario'] : NULL;

?>
<header>    
    <script  type="text/javascript" src="../recursos/js/Cabecera.js"></script> 
    <link href="../recursos/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../recursos/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    
    
    <nav  class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">            

            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#myNavBar">
                <span class="sr-only">Desplegar navegación</span>
                <span class="icon-bar"></span>       
            </button>
        </div>

        <div class="collapse navbar-collapse" id = "divMenuPrincipal">
            <ul class="nav navbar-nav">  <img class="nav" src="../recursos/img/qwertylogo.png"></ul>
            <?php if ($us) { ?>
                <ul class="nav navbar-nav">
                    <li class="dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Administración del Sistema</b> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="../vista/Administracion.php">Adminitración de roles</a></li>                        
                            <li><a href="../vista/Administracion.php">Administración de usuarios</a></li>                        
                            <li><a href="../vista/AdministracionGeneral.php">Administración de permisos</a></li>                                     
                        </ul>                    
                </ul>
                <ul class="nav navbar-nav">
                    <li class="dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b> Administracion General </b> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="../vista/AdministracionGeneral.php">Adminitración de empresas</a></li>                        
                            <li><a href="../vista/AdministracionGeneral.php">Administración de rutas</a></li>                        
                            <li><a href="../vista/AdministracionGeneral.php">Administración de buses</a></li>                                    
                        </ul>                    
                </ul>
                <ul class="nav navbar-nav">
                    <li class="dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b> Administracion de Rutas </b> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="../vista/AdministracionRutasUsuarios.php">Horarios</a></li>                        
                            <li><a href="../vista/AdministracionRutas.php">Tarifas</a></li>                        
                            <li><a href="../vista/AdministracionRutas.php">GPS</a></li> 
                            <li><a href="../vista/AdministracionRutas.php">Tiempo real</a></li>   
                        </ul>                    
                </ul>
                <ul class="nav navbar-nav navbar-right">    
                    <li class="dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Perfil <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="../vista/CrearNuevoTiquete.php">Configuración</a></li>       
                            <li><a href="#"onclick="cerrarSesion();">Cerrar sesión</a></li>
                        </ul> 
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <p class="navbar-text"><?php  ?></p>
                    </li>
                    <li>
                        <p class="navbar-text"><?php ?> </p>
                    </li>
                </ul>
            <?php } 
             ?>
        </div>
    </nav>
</header>
