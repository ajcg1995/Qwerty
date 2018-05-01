<!DOCTYPE html>
<html> 
    <head>        
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        <script  type="text/javascript" src="../recursos/js/Administracion.js"></script>   
        <link href="../recursos/css/Administracion.css" rel="stylesheet"/>
        <?php
        require ("../control/ControlArchivosCabecera.php");
        require ("../control/ControlAdministracionRutas.php");
        require ("../bd/ProcedimientosAdministracionRutas.php");
        ?>   
    </head>     
    <body>   
        <?php
        require("../vista/Cabecera.php");
       // $empresas = cargarEmpresas();
        ?>        
        <h1>Administración Rutas</h1>
        <div class="container-fluid">
            <div class="row">
                <div class=""></div>
                <div class="col-md-12">
                    <div id="tab-indice" class="tab">
                        <button class="tablinks" onclick="abrirTab(event, 'admin-empresas')" id="defaultOpen">Horarios</button>
                        <button class="tablinks" onclick="abrirTab(event, 'admin-rutas')" >Tarifa</button>                        
                        <button class="tablinks" onclick="abrirTab(event, 'admin-buses')">GPS</button>
                        <button class="tablinks" onclick="abrirTab(event, 'admin-tiempo-real')">Tiempo real</button>
                    </div>       
                    <section id="admin-rutas" class="tabcontent tab-oculto">
                        <h1>Rutas por empresa</h1>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-1"></div> 
                                <div class="col-md-2"><h4>Empresa</h4></div> 
                                <div class="col-md-4" style="text-align:center" >  
                                    <select class="form-control"><?php //cargarComboEmpresas($empresas)  ?> </select>
                                </div> 
                                <div class="col-md-2"><h4>Agregar ruta</h4></div> 
                                <div class="col-md-2">                    
                                    <button type="button" class="btn btn-success  btn-circle btn-xl" data-toggle="modal" data-target=""><i class="glyphicon glyphicon-plus"></i></button>
                                </div>
                                <br>  
                            </div>
                            <div class="row">  
                                <div class="col-md-1"></div>
                                <div class="col-md-10 ">
                                    <div class="table table-responsive">  
                                        <table class="table table-hover">
                                            <thead>
                                            <th>Ruta</th>
                                            <th>Número de ruta</th>
                                            <th>Tarifas</th>
                                            <th>Horario</th>
                                            <th>GPS</th>                                            
                                            <th>Horario</th>
                                            </thead>
                                            <tbody>
                                                <?php // tablaPermisos($permisos);  ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>              
                    <section id="admin-empresas" class="tabcontent tab-oculto">
                        <h1>Administracion de empresas</h1>
                        <div class="container-fluid">
                            <div class="row">
                                <div class=""></div>                                
                                <div id ="" class="col-md-12"></div>       
                                <div class="col-md-2">                    
                                    <button type="button" class="btn btn-success  btn-circle btn-xl" data-toggle="modal" data-target=""><i class="glyphicon glyphicon-plus"></i></button>
                                </div>
                            </div>
                            <div class="row">  
                                <div class=""></div>
                                <div class="col-md-12 ">
                                    <div class="table table-responsive">  
                                        <table class="table table-hover">
                                            <thead>                                              
                                            <th>id</th>
                                            <th>Empresa</th>
                                            <th>Encargado</th>
                                            <th>Telefono</th>                                            
                                            <th>Correo</th>
                                            <th>Direccion</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                            <th>Activo</th>                                            
                                            <th>Rutas</th>
                                            </thead>
                                            <tbody>
                                                <?php //tablaEmpresas($empresas); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </body>
</html>