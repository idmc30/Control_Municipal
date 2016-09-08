<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
       <?php include "dist/cabecera.php";?> 
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
           <?php    include "dist/logo.php";    ?>
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
                      <?php include "dist/menuderecho.php";?> 
                    </ul>
                </div>
            </nav>
            
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                 <?php include "dist/menuizquierdo.php";?> 
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Municipalidad Provincial de Ferreñafe
                        
                         <small>Servidor Municipal</small>
                    </h1>
                   
                </section>
                      <section class="content">
                         <div class="row">
                               <section class="col-lg-7 connectedSortable">
                              <div class="box box-success">
                                <div class="box-header">
                                   <div class="col-xs-7">
                                        <button id="btnasignacion" name="btnnuevo" id="btnnuevo" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalpersonalnuevo">Nuevo Personal</button>  
                                         <a href="index.php?page=personal&accion=generarpdf"  target="_blank" class="btn btn-primary"><i class="fa fa-download"></i> Generate PDF</a>
                                         
                                     </div>

                                </div>
                                  
                            </div><!-- /.box (chat box) -->
                        </section>
                                 

                        </div>

                    </section>
                 
                  




                <!-- Main content -->

                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Listado de Personal</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive" >
                                    <table id="example1"  class="table table-bordered table-striped">
                                            <thead>
                                                <tr>   
                                                    <th>N°</th>   
                                                    <th>Nombres</th>               
                                                    <th>Apellido Paterno</th>
                                                    <th>Apellido Materno</th>
                                                    <th>Dni</th>
                                                    <th>Direccion</th>
                                                     <th>Editar</th>
                                                     <th>Eliminar</th>                                                   
                                                </tr>
                                            </thead>
                                                <tbody>
                                           <?php $c=1; ?>
                                             <?php  foreach ($sermunicipal as $servidor): ?>
                                                 <tr id="<?php echo $servidor->idservidor; ?>">
                                                    <td> <?php echo "<b>".$c."</b>";?></td>
                                                   <td> <?php echo utf8_encode($servidor->nombres) ?></td>
                                                   <td><?php echo $servidor->appaterno ?></td>
                                                   <td><?php echo $servidor->apmaterno?></td>    
                                                   <td><?php echo utf8_encode($servidor->dni) ?></td>    
                                                   <td><?php echo utf8_encode($servidor->direccion)?></td>
                                                 <!--  echo "<td><a href='javascript:editarasimple(".$lcliente->idpersonal.")'>Editar</a></td>"; -->
                                                   <td><a href="javascript:editar('<?php  echo $servidor->idservidor; ?>')">Editar</a></td>
                                                   <td><a href="javascript:eliminar('<?php  echo $servidor->idservidor; ?>')">Eliminar</a></td></tr>
                                                 <?php $c=$c+1 ?>                                         
                                               <?php endforeach; ?>
                                            </tbody>
                                    </table>

                               </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->

                 </br>
                 <!--<h1>Esta es la segunda tabla</h1>
                   <div id="tabla" nombre="tabla"></div>-->


            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
         <!-- COMPOSE MESSAGE MODAL -->
        <div class="modal fade" id="modalpersonalnuevo" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-male"></i> Nuevo Personal</h4>
                    </div>
                    <form action="index.php?page=personal&accion=insertar" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Nombres:</label>
                                    <input type="text"  name="nom" id="nom" class="form-control" placeholder="Nombre ..."   required/>
                                </div>
                                <div class="form-group">
                                    <label>Apellido Paterno:</label>
                                    <input type="text"  name="apepa" id="apepa" class="form-control" placeholder="Apellido Paterno ..." required/>
                                </div>
                                    <div class="form-group">
                                        <label>Apellido Materno:</label>
                                        <input type="text" name="apema" id="apema" class="form-control" placeholder="Apellido Materno ..."   required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Dni:</label>
                                        <input type="text" name="dni" id="dni" class="form-control" placeholder="Dni ..." maxlength="8"  required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Sexo:</label>
                                                
                                                  <input type="radio"  id="sexo" name="sexo"  value="M" checked> Hombre                                             
                                                   <input type="radio" id="sexo"  name="sexo"  value="F"> Mujer 
                                                </div>
                                                  <div class="form-group">
                                                    <label>Tel&eacutefono:</label>
                                                    <input type="text" name="telef" id="telef"  class="form-control" placeholder="Telefono ..." maxlength="6"/>
                                                </div>
                                             <div class="form-group">
                                                    <label>Direcci&oacuten:</label>
                                                    <input type="text" name="dir" id="dir" class="form-control" placeholder="Dirección ..." />
                                                </div>
                                                <div class="form-group">
                                                    <label>Email:</label>
                                                    <input type="text" name="email" id="email" class="form-control" placeholder="Email ..."/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Celular:</label>
                                                    <input type="text"  name="celu" id="celu" class="form-control" placeholder="Celular ..." maxlength="9" />
                                                </div>
                                                 <div class="form-group">
                                                    <label>Subir foto:</label>
                                                    <input type="file" name="subirarchivo" id="subirarchivo" />
                                                </div>
                        </div>
                        
                        <div class="modal-footer clearfix">

                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                            <!--<input type="button" value="Enviar Datos" onclick="insertarajax()">-->
                            <button type="submit"  id="btnguardar" name="btnguardar" class="btn btn-success pull-left" >Guardar</button>
                        </div>
                        <input type="hidden" id="idtrabajador" name="idtrabajador">
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
         
     <script src="view/jquery/servidormunicipal.js" type="text/javascript"></script>
     <?php include "dist/footer.php";?> 
    </body>
</html>
