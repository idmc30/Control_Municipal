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
                        <small>Asignaciones</small>
                    </h1>
                   
                </section>

                 <section class="content">
                  <div class="row">
                        <!-- left column -->
                        <div class="col-md-5">
                            <!-- general form elements -->                     
                           <div class="box box-success">
                                <div class="box-header">
                                    <h3 class="box-title">Asignaciones de Personal</h3>
                                </div>
                                <div class="box-body">
                                   <div class="form-group">
                                            <label>Unidad Organizacional</label>
                                             <select class="form-control" id="idestructura" name="idestructura">



                                                     <?php foreach ($glistas as $lgerencia): ?>
                                                <option value="<?php echo $lgerencia->idgerencia ?>"> 
                                                  <?php echo $lgerencia->row_number.'.0 - '.utf8_encode($lgerencia->nombre) ?>
                                                </option>

                                               <?php 
                                                $padre = $lgerencia->idgerencia;
                                                $resto= $ultimonivel - $lgerencia->nivel;

                                               for ($i=0; $i<$resto ; $i++) { 
                                                $lsubs = 'lsubs'.$i.'d';
                                                $lsub = 'lsub'.$i.'';

                                                $lsubs=$lestructura->listarsub($padre);

                                                if ($lsubs) {
                                                 ?>

                                              <?php foreach ($lsubs as $lsub): ?>

                                                <?php if (($lsub->idgerenciaPadre) == $lgerencia->idgerencia): ?>
                                                  
                                                <option value="<?php echo $lsub->idgerencia ?>"> 
                                                  
                                                  &nbsp;&nbsp;&nbsp;<?php echo $lgerencia->row_number.'.'.$lsub->row_number.' - '.utf8_encode($lsub->nombre) ?>
                                                </option>
                                                
                                                <?php else: ?>
                                                  
                                                  <option value="<?php echo $lsub->idgerencia ?>">
                                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $lgerencia->row_number.'.0.'.$lsub->row_number.' - '.utf8_encode($lsub->nombre) ?>
                                                  </option>

                                                
                                                <?php endif ?>


                                                <?php $padre = $lsub->idgerencia; ?>
                                              <?php endforeach ?> <!--aqui termina el for echa principal-->

                                                  <?php
                                                    }
                                                  }
                                                ?>

                                                <?php endforeach ?>
                                             </select>                                      
                                        </div>
                                </div><!-- /.box-body -->
                            </div>
                        </div><!--/.col (left) -->
                        <!-- right column -->
                    </div> <!-- /.row -->
                         
                    <div class="row" id="mostrarasignaciones" name="mostrarasignaciones" action="" method="post">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title"></h3>
                                    <div class="box-tools"><!--aqui llamo a mi modal-->
                                        <button id="btnasignacion" name="btnasignacions"type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalasignacion">Nueva Asignación</button>
                                     </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                  <div id="lasignaciones" name="lasignaciones"></div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section><!-- /.content --> 
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
         <!-- COMPOSE MESSAGE MODAL -->
    <div class="modal fade" id="modalasignacion" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-crop"></i>  Asignaciones</h4>
                    </div>
                    <form id="frmgerencias"action="view/estructura.php" method="post">
                        <div class="modal-body">
                                <!-- text input -->
                              <div class="form-group">
                                       <div id="cargosvalue" name="cargosvalue"></div>  
                                       </br>               
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
                                    <input type="hidden" id="idasignacion" name="idasignacion" > 
                                  </br>
                                </div>  
                               
                                <div class="form-group">
                                
                                </div>
                                </br>
                                  <div class="form-group">
                                     <label>Clasificación:</label>
                                             <select class="form-control" id="clasificacion" name="clasificacion">
                                                  <option value="">Seleccionar Clasificación</option>
                                                  <option value="FP">FP:Funcionario Publico</option>
                                                  <option value="EC">EC:Empleado Público</option>
                                                  <option value="SP-DS">SP-DS:Servidor Público - Directivo Superior</option>
                                                  <option value="SP-EJ">SP-EJ:Servidor Público - Ejecutivo</option>
                                                  <option value="SP-ES">SP-ES:Sevidor Público - Especialista</option>                                                  
                                                  <option value="SP-AP">SP-AP:Servidor Público - de apoyo</option>
                                                  <option value="RE">RE:Regimen, especial: magistrados,docentes</option>
                                            </select>  
                                </div>
                                   <div class="form-group">
                                     <label>Situacion del Cargo:</label>
                                             <select class="form-control" id="situacion" name="situacion">
                                                  <option value="">seleccionar situacion del cargo</option>
                                                  <option value="276">O:276</option>
                                                  <option value="728">O:728</option>
                                                  <option value="CAS">O:CAS</option>
                                            </select>  
                                </div>


                                <div class="form-group">
                                            <label>Observacion</label>
                                            <textarea class="form-control" id="txtobservacion" name="txtobservacion" rows="3" placeholder="Descripción ..."></textarea>
                                </div>
                        </div>
                        <div class="modal-footer clearfix">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                        
                            <button type="button"  id="btnGuardarAsig" name="btnGuardarAsig" class="btn btn-success pull-left">Guardar</button>
                        </div>
                        <!--<input type="hidden" id="idtrabajador" name="idtrabajador">-->
                    </form>
                </div>
                </div>
           </div>
     <?php include "dist/footer.php";?>
     <script src="view/importaciones/jquery-ui.min.js"></script> 
     <script src="view/jquery/asignaciones.js" type="text/javascript"></script> 
    </body>
</html>
