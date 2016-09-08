<html>
    <head>
        <meta charset="UTF-8">
       <?php include "dist/cabecera.php";?> 
    </head>
    <body class="skin-blue wysihtml5-supported   fixed  pace-done">
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
                        <small>Cargos</small>
                    </h1>
                   
                </section> 
              <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-5">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Unidad Organica</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form">
                                    <div class="box-body">
                                         <div class="form-group">                                          
                                            <label></label>
                                                
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
                                </form>
                            </div><!-- /.box -->
                        </div><!--/.col (left) -->
                        <!-- right column -->
                    </div> <!-- /.row -->                  
                </section><!-- /.content -->
              
              <section class="content">
                     <div class="row" id="mostrarcargos" name="mostrarcargos">
                    <section class="col-lg-12 connectedSortable" id="listaplann" name="listaplann">
                              <div class="box">
                                 <div class="box-header">
                                    <h3 class="box-title"></h3>
                                    <div class="box-tools"><!--aqui llamo a mi modal-->
                                       <button id="ncargo" name="ncargo" class="btn btn-primary" data-toggle="modal" data-target="#modalcargo">Nuevo Cargo</button>
                                     </div>
                                 </br>
                                 </div><!-- /.box-header -->
                                  <div class="box-body table-responsive no-padding" >
                                          <div id="lrespuesta" name="lrespuesta"></div> 
                                  </div><!-- /.box-body -->
                         </div><!-- /.box (chat box) -->
                    </section>
                </section>


            </aside><!-- /.right-side -->
<!-- MODAL-->
           <div class="modal fade" id="modalcargo" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-crop"></i> Crear Cargos</h4>
                    </div>
                    <form id="frmgerencias"action="view/estructura.php" method="post">
                        <div class="modal-body">
                                <!-- text input -->
                              <div class="form-group">
                                            <label>Unidad Organica</label>
                                           <input type="text"  name="nomuorganica" id="nomuorganica" class="form-control"  disabled/>       
                                         </div>
                                   <div class="form-group">
                                    <label>Codigo:</label>
                                    <input type="text"  id="cod" name="cod"  class="form-control" placeholder="Nombre ..." required/>

                                </div>   
                                <div class="form-group">
                                    <label>Titulo:</label>
                                    <input type="text" id="titulo" name="titulo"  class="form-control" placeholder="Iniciales ..." required/>
                                    
                                </div>
                               <div class="form-group">
                                            <label>Descripción</label>
                                            <textarea class="form-control" id="txtareadescrip" name="txtareadescrip"rows="3" placeholder="Descripción ..."></textarea>
                                </div>
                             <input type="hidden" id="iddeCargo" name="iddeCargo">
                        </div>
                        <div class="modal-footer clearfix">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                        
                            <button type="button"  id="btnguardarcargos" name="btnguardarcargos" class="btn btn-success pull-left">Guardar</button>
                        </div>
                       
                    </form>
                </div>
                </div>
           </div>

        </div><!-- ./wrapper -->
     <?php include "dist/footer.php";?> 
     <script src="view/jquery/cargos.js" type="text/javascript"></script> 
    </body>
</html>
