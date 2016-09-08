<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
       <?php include "view/dist/cabecera.php";?>
       <link href="view/importaciones/jquery-ui.min.css" rel="stylesheet"> 
    </head>
    <body class="skin-blue" >
        <!-- header logo: style can be found in header.less -->
        <header class="header">
           <?php    include "view/dist/logo.php";    ?>
            <!-- Header Navbar: style can be found in header.less -->
             <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Navegación</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                           <ul class="dropdown-menu">                               
                                <li>                   
                                   <ul class="menu">
                                        <li></li>      
                                    </ul>
                                </li>
                                <li class="footer"><a href="#"></a></li>
                            </ul>
                        </li>
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <ul class="dropdown-menu">
                                <li>
                                    <!--menu -->
                                    <ul class="menu">
                                        <li></li>
                                       
                                    </ul>
                                </li>
                                
                            </ul>
                        </li>
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">        
                            <ul class="dropdown-menu">      
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>  
                                        </li>
                                    </ul>
                                </li>
                               
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <!--Parte para recibir el nombre del usuario-->
                     <?php include "view/dist/menuderecho.php";?> 
                    </ul>
                </div>
            </nav>
            
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                 <?php include "view/dist/menuizquierdo.php";?> 
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Municipalidad Provincial de Ferreñafe
                        
                         <small>Cuentas de Usuarios</small>
                    </h1>
              
                </section>
                     <!-- Main content -->
                <section class="content">
                   <div class="row">
                    <section class="col-lg-12 connectedSortable" id="sectionbotones" name="sectionbotones">
                              <div class="box">
                                 <div class="box-header">
                                    <h3 class="box-title"></h3>
                                    <div class="box-tools"><!--aqui llamo a mi modal-->
                                        <button id="btnusuariosn" name="btnusuariosn" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalusuarios">Insertar Usuarios </button>
                                     </div>
                                 </div><!-- /.box-header --> 
                         </div><!-- /.box (chat box) -->
                    </section>
                  </div>

                  <div class="row">
                         <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Listado de Usuarios</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive" >
                                    <table id="example1"  class="table table-bordered table-striped">
                                            <thead>
                                                <tr>  
                                                    <th>Usuario</th>    
                                                    <th>Nombres y Apellidos</th>               
                                                    <th>Estado</th>
                                                    <th style="width: 40px">Editar</th>
                                                    <th style="width: 40px">Eliminar</th>                                                   
                                                </tr>
                                            </thead>
                                                <tbody>
                                        <?php  foreach ($lusuarios as $usuarios): ?>
                                                 <tr id="<?php echo $usuarios->idusuario; ?>">
                                                  <td> <?php echo utf8_encode($usuarios->usuario)?></td>
                                                   <td> <?php echo utf8_encode($usuarios->nombres).", ".utf8_encode($usuarios->appaterno)." ".utf8_encode($usuarios->apmaterno)?></td>                                                                                              
                                                   <?php 
                                                      if ($usuarios->estado=="A" ){
                                                          echo "<td><span class='badge bg-green'>Activado</span></td>";
                                                         } else{
                                                          echo "<td><span class='badge bg-red'>Desactivado</span></td>";
                                                         }
                                                   ?>
                                                   <td><button onclick='actualizarUsuarios("<?php echo $usuarios->idusuario; ?>")' class="btn btn-danger fa  fa-pencil"></button></td>
                                                   <td><button onclick='eliminarUsuarios("<?php echo $usuarios->idusuario ?>")' class="btn btn-danger fa fa-close"></button></td>
                                                   
                                                                                          
                                               <?php endforeach; ?> 
                                            </tbody>
                                    </table>

                               </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                  </div>

                </section>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
         <!-- COMPOSE MESSAGE MODAL -->
      
        <!-- /.modal -->
          <div class="modal fade" id="modalusuarios"   tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-user"></i> Usuarios</h4>
                    </div>
                    <form action="index.php?page=usuariospersonal&accion=registrarUsuario" method="post">
                        <div class="modal-body">
                                <div class="form-group">
                                      <label>Usuario:</label>
                                   <input class="form-control"  id="usu" name="usu" placeholder="Usuario" type="text">   
                                </div>
                              <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" class="form-control" id="clave" name="clave"placeholder="Password">
                                </div>
                         <div class="form-group">
                              <div id="lperfilusuario"></div>
                           </div>
                            <div class="form-group">
                                    <label class="col-md-2">Seleccionar servidor:</label>
                                    <div class="col-xs-4">
                                            <!--<input class="form-control" placeholder=".col-xs-4" type="text">-->
                                            <input type="text" id="servidor"  name="servidor" maxlength="8"class="form-control"> 
                                     </div>
                                     <div class="col-xs-6">
                                         <input type="text" id="nomservidor" name="nomservidor"  class="form-control" disabled>  
                                        </div>
                                    <label class="col-md-1"></label>
                                    <input type="hidden" id="idservidor" name="idservidor" > 
                                    <input type="hidden" id="codusuario" name="codusuario" > 
                           </div>  
                            <div class="form-group">
                              <label >Activado</label>
                                <input id="chkestadou" name="chkestadou" type="checkbox" >
                            </div>                            
                              
                            
                        <div class="modal-footer clearfix">

                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                            <button  type="submit"  id="btngusu" name="btngusu" class="btn btn-success pull-left">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 



      
     <?php include "view/dist/footer.php";?>
     <script src="view/jquery/usuario.js" type="text/javascript"></script> 
     <script src="view/jquery/asignaciones.js" type="text/javascript"></script> 
     
    </body>
</html>
