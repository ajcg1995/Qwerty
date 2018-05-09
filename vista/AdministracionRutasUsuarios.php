
<!DOCTYPE html>
<html> 
    <head>        
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        <script  type="text/javascript" src="../recursos/js/Administracion.js"></script>   
        <script  type="text/javascript" src="../recursos/js/Rutas.js"></script> 
        <script  type="text/javascript" src="../recursos/js/Noticias.js"></script> 
        <link href="../recursos/css/Administracion.css" rel="stylesheet"/>
        <?php
        require ("../control/ControlArchivosCabecera.php");
        require ("../bd/ProcedimientosAdministracionRutas.php");
        require ("../bd/ProcedimientosAdministracionNoticias.php");
        require ("../control/ControlAdministracionRutasUsuarios.php");
        require ("../control/ControlRutas.php");
        require_once '../bd/Conexion.php';
        require_once '../modelo/Noticia.php';
        require_once '../modelo/Usuario.php';
        require_once '../modelo/Empresa.php';
        require_once '../modelo/Rol.php';
        require_once '../modelo/Ruta.php';
        ?>   
    </head>     
    <body>   
        <?php
        require("../vista/Cabecera.php");
        $us = $_SESSION['usuario'];
        $idEmpresa = $us->obtenerEmpresa()->obtenerIdEmpresa();
        //$empresas = cargarEmpresas();
        ?>        

        <h1>Administración Rutas</h1>
        <div class="container-fluid">
            <div class="row">
                <div class=""></div>                    
                <div class="col-md-12">
                    <div id="tab-indice" class="tab">
                        <button class="tablinks" onclick="abrirTab(event, 'admin-rutas')" id="defaultOpen">Administracion General</button>
                        <button class="tablinks" onclick="abrirTab(event, 'admin-empresas')" >Noticias</button>                        
                        <button class="tablinks" onclick="llamarMapa()">Tiempo real</button>
                        <button class="tablinks" onclick="abrirTab(event, 'admin-tiempo-real')">Buses</button>
                    </div>   
                    <section id="admin-empresas" class="tabcontent tab-oculto">
                        <h1>Noticias</h1>
                        <div class="container-fluid">
                            <div class="row">
                                <div class=""></div>                                
                                <div id ="" class="col-md-12"></div>       

                            </div>
                            <div class="row">  
                                <div class=""></div>
                                <div class="col-md-12 ">
                                    <div class="table table-responsive">  
                                        <table class="table table-hover" >
                                            <thead>
                                            <th>Id Noticia</th>
                                            <th>Id Ruta</th>
                                            <th>FechaNoticia</th>
                                            <th>Descripción</th>
                                            </thead>
                                            <tbody id="tablaNoticias">
                                                <?php echo tablaNoticias($idEmpresa); ?> 
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="admin-rutas" class="tabcontent tab-oculto">
                        <h1>Administración Ruta</h1>
                        <div class="container-fluid">
                           
                            <div class="row">  
                                <div class="col-md-1"></div>
                                <div class="col-md-10 ">
                                    <div class="table table-responsive">  
                                        <table class="table table-hover" id="tablaRutas">
                                            <thead>
                                            <th>Ruta</th>
                                            <th>Número de ruta</th>
                                            <th>Tarifas</th>
                                            <th>Horario</th>
                                            <th>Noticias</th>                                
                                            </thead>
                                            <tbody>
                                                <?php
                                                echo tablaRutas($idEmpresa);
                                                ?>
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



        <!---------------------------- MODAL AGREGAR NOTICIA------------------------------- -->


        <!-- Modal -->
        <div id="ModalAgregarNoticias" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" id="modal-headerAgregarNoticia">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Agregar Noticias</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group"> 
                            <h4 id="idRuta"> </h4>
                        </div>

                        <div class="form-group">                  
                            <h4 id="nombreRuta"> </h4>
                        </div>

                        <div class="form-group">
                            <label for="email">Descripción Noticia</label>
                            <textarea placeholder="Escriba aquí su noticia..." type="text" class="form-control" id="descripcionNoticia" rows="9" > 
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="pwd">Fecha Noticia</label>
                            <input type="date" class="form-control" id="fechaNoticia">
                        </div>

                        <button type="button" class="btn btn-success" onclick="ajaxAgregarNoticiaRuta()">Agregar</button>  
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <!---------------------TERMINA MODAL AGREGAR NOTICIA------------------------------- -->



        <!---------------------------- MODAL MODIFICAR NOTICIA------------------------------- --> 

        <!-- Modal -->
        <div id="ModalModificarNoticias" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" id="modal-headerNoticia">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modificar Noticias</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group"> 
                            <h4 id="idNoticiaM"> </h4>
                        </div>

                        <div class="form-group">                  
                            <h4 id="idRutaM"> </h4>
                        </div>

                        <div class="form-group">
                            <label for="pwd">Fecha Noticia</label>
                            <input type="text" class="form-control" id="fechaNoticiaM">
                            
                        </div>

                        <div class="form-group">
                            <label for="email">Descripción Noticia</label>
                            <textarea placeholder="Escriba aquí su noticia..." type="text" class="form-control" id="descripcionNoticiaM" rows="5" > 
                            </textarea>
                        </div>

                        <button type="button" class="btn btn-success" onclick="ajaxModificarNoticia()">Modificar</button>  
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <!---------------------TERMINA MODAL MODIFICAR NOTICIA------------------------------- -->
    </body>
</html>