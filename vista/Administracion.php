<!DOCTYPE html>
<html> 
    <head>        
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        <script  type="text/javascript" src="../recursos/js/Administracion.js"></script>   
        <link href="../recursos/css/Administracion.css" rel="stylesheet"/>
        <?php
        require ("../control/ControlArchivosCabecera.php");
        require ("../control/ControlAdministracion.php");
        require ("../bd/ProcedimientosAdministracion.php");
         require ("../control/ControlNotificacion.php");  
        ?>   
    </head>     
    <body>   
        <?php
        require("../vista/Cabecera.php");
        $permisos = cargarPermisos();
        $roles = cargarRoles();
        $usuarios = cargarUsuarios();
        notificacion();
        ?>        
        <h1>Administración del Sistema</h1>
        <div class="container-fluid">
            <div class="row">
                <div class=""></div>
                <div class="col-md-12">
                    <div id="tab-indice" class="tab">
                        <button class="tablinks" onclick="abrirTab(event, 'admin-roles')" id="defaultOpen">Administración roles</button>
                        <button class="tablinks" onclick="abrirTab(event, 'admin-permisos')">Administración de permisos</button>
                        <button class="tablinks" onclick="abrirTab(event, 'admin-usuarios')">Administración de usuarios</button>
                    </div>               
                    <section id="admin-roles" class="tabcontent">
                        <h1>Roles</h1>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-2"></div>                                
                                <div id ="" class="col-md-8"></div>                
                                <div class="col-md-2">                    
                                    <button type="button" class="btn btn-success  btn-circle btn-xl" data-toggle="modal" data-target="#modalAgregarRol"><i class="glyphicon glyphicon-plus"></i></button>         
                                </div>
                            </div>
                            <div class="row">  
                                <div class="col-md-1"></div>
                                <div class="col-md-10 ">
                                    <div class="table table-responsive">  
                                        <table class="table table-hover">
                                            <thead>
                                            <th>Id</th>
                                            <th>Rol</th>
                                            <th>Usuarios</th> 
                                            <th>Editar</th>
                                            <th>Eliminar</th>                                           
                                            </thead>
                                            <tbody id = "tablaRoles">
                                                <?php tablaRoles($roles); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="admin-permisos" class="tabcontent tab-oculto">
                        <h1>Permisos</h1>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-3"></div> 
                                <div class="col-md-1"><h4>Rol</h4></div> 
                                <div class="col-md-4" style="text-align:center" >  
                                    <select class="form-control"><?php cargarComboRoles($roles) ?> </select>
                                </div> 
                                <br>  
                            </div>
                            <div class="row">  
                                <div class="col-md-1"></div>
                                <div class="col-md-10 ">
                                    <div class="table table-responsive">  
                                        <table class="table table-hover">
                                            <thead>
                                            <th>Id</th>
                                            <th>Permiso asociado</th>
                                            <th>Activo</th>
                                            </thead>
                                            <tbody>
                                                <?php tablaPermisos($permisos); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="admin-usuarios" class="tabcontent tab-oculto">
                        <h1>Usuarios</h1>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-2"></div>                                
                                <div id ="" class="col-md-8"></div>       
                                <div class="col-md-2">                    
                                    <button type="button" class="btn btn-success  btn-circle btn-xl" data-toggle="modal" data-target=""><i class="glyphicon glyphicon-plus"></i></button>
                                </div>
                            </div>
                            <div class="row">  
                                <div class="col-md-1"></div>
                                <div class="col-md-10 ">
                                    <div class="table table-responsive">  
                                        <table class="table table-hover">
                                            <thead>                                            
                                            <th>Usuario</th>
                                            <th>Nombre</th>
                                            <th>Rol</th>
                                            <th>Empresa</th>                                            
                                            <th>Activo</th>
                                            </thead>
                                            <tbody>
                                                <?php tablaUsuarios($usuarios); ?>
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

        <!------------------------ Ventanas modales---------------------------->
               <!-------------------- Agregar rol----------------------->
        <div id="modalAgregarRol" class="modal fade" role="dialog">
            <div class="modal-dialog">                
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Nuevo Rol </h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nombre del rol</label>
                            <input id = 'inputAgregarRol' type = "text" name = "agregarRol" class="form-control" placeholder="Nuevo rol" required></input>
                        </div>                       
                    </div>
                    <div class="modal-footer">                            
                        <button type="button" class="btn btn-success" onclick="agregarRol(this)">Guardar</button>
                        <button type="button" class="btn btn-danger"  data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
               
              <!-------------------- Eliminar rol----------------------->
        <div id="modalEliminarRol" class="modal fade" role="dialog">
            <div class="modal-dialog">                
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Eliminar Rol </h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <h4 id = "inputEliminarRol"></h4>                            
                        </div>                       
                    </div>
                    <div class="modal-footer">                            
                        <button type="button" class="btn btn-success" onclick="eliminarRolAjax(this)">Guardar</button>
                        <button type="button" class="btn btn-danger"  data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>