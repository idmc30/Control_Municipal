<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
       <?php include "view/dist/cabecera.php";?>
       <link href="view/importaciones/jquery-ui.min.css" rel="stylesheet"> 

    </head>
    <body class="skin-blue wysihtml5-supported  pace-done fixed">
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
                         <small>Metas Operativas</small>
                    </h1>
                </section>
                     <!-- Main content -->
                <section class="content">
                     <div class="row">
                        <!-- Left col -->
                        <?php 
                           
                           //$lmipoi=$mipoi->listar($_SESSION['idgerencia']);
                           $ldosmipoi=$mipoi->listardos($_SESSION['idgerencia']);          
                        ?>
                        <section class="col-lg-7 connectedSortable">
                              <div class="box box-success">
                                <div class="box-header">
                                   <div class="col-xs-7">
                                         <select class="form-control" id="poithis" name="poithis"><!--poe vigentes-->  
                                                      
                                                <?php  foreach ($ldosmipoi as $mipoi): ?>
                                                  <option value="<?php echo $mipoi->idgerencia."|".$mipoi->idplan ;?>">
                                                    <?php echo "POI  ".$mipoi->codigo."  ".utf8_encode($mipoi->nombre )?></option>
                                                <?php endforeach; ?>  
                                            </select>    
                                            <br/>
                                           
                                     </div>

                                </div>
                                <div class="colx-xs-12">
                                       <button id="btnmmetas" name="btnmmetas"type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalpoe">Insertar Metas </button>  
                                            <!--<a href="index.php?page=mipoi&accion=generarpdfPOI&id=<?php echo $mipoi->idgerencia; ?>"  target="_blank" class="btn btn-primary"><i class="fa fa-download"></i> Generate PDF</a>-->
                                             <button id="imprimirmetas" name="imprimirmetas" type="button" class="btn btn-primary"><i  class="fa fa-print"></i> Imprimir  </button>  
                                            <button id="confirmarmetas" name="confirmarmetas" type="button" class="btn btn-primary">Confirmar</button>  
                                     </div>
                            </div><!-- /.box (chat box) -->
                      </section>
                    <section class="col-lg-12 connectedSortable" id="listametas" name="listametas">
                              <div class="box">
                                 <div class="box-header">
                                    <h3 class="box-title"></h3>
                                    <div class="box-tools"><!--aqui llamo a mi modal-->
                                       <h3>Listado de Metas</h3>  
                                      </div><!-- /.box-header -->


                                  <div class="box-body table-responsive no-padding" >
                                       <div id="listametaspoI" onload="listarmetas()"></div>
                                  </div><!-- /.box-body -->
                         </div><!-- /.box (chat box) -->
                    </section>
                </section>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
         <!-- COMPOSE MESSAGE MODAL -->
      
        <!-- /.modal -->
          <div class="modal fade" id="modalpoe" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-group"></i> Metas</h4>
                    </div>
                    <form action="view/estructura.php" method="post">
                        <div class="modal-body">
                                   <div class="form-group">
                                      <label>Tipo de Objetivo Operacional</label>
                                                
                                            <select class="form-control" id="idobjetivo" name="idobjetivo">  
                                             <option style="display:none;" value=""  selected>Seleccionar...</option>           
                                                <?php  foreach ($looperacional as $ooperacional): ?>
                                                  <option value="<?php echo $ooperacional->idobjetivo; ?>">
                                                    <?php echo utf8_encode($ooperacional->descripcion); ?></option>
                                                <?php endforeach; ?>  
                                            </select>  
                                  </div>

                                <div class="form-group">
                                            <label>Descripción de Meta</label>
                                            <textarea id="descipmeta" name="descipmeta"class="form-control" rows="3" placeholder="Meta ..."></textarea>
                                        </div>

                                   <div class="form-group">
                                      <label>Medida:</label>
                                                
                                            <select class="form-control" id="medida" name="medida">
                                            <option style="display:none;" value=""  selected>Seleccionar...</option>                        
                                                <?php  foreach ($lmedida as $medida): ?>
                                                  <option value="<?php echo $medida->idmedida ?>">
                                                    <?php echo utf8_encode($medida->denominacion); ?></option>
                                                <?php endforeach; ?>  
                                            </select>  
                                </div>      
<!--                                  <div class="form-group">
                                      <label>Tiempo</label>
                                                
                                            <select class="form-control" id="tiempo" name="tiempo">  
                                            <option style="display:none;" value=""  selected>Seleccionar...</option>                      
                                                <?php//  foreach ($ltiempo as $tiempo): ?>
                                                  <option value="<?php //echo $tiempo->idtiempo; ?>">
                                                    <?php// echo utf8_encode($tiempo->descripcion); ?></option>
                                                <?php //endforeach; ?>  
                                            </select>  
                                </div>  -->
                                 <div class="form-group">
                                   <label>Tiempo</label>
                                    <div class="row">
                                        <div class="col-xs-3">
                                          <label>I</label>
                                            <input type="text" class="form-control" id="cant1"  placeholder="cantI">
                                        </div>
                                        <div class="col-xs-3">
                                          <label>II</label>
                                            <input type="text" class="form-control"  id="cant2" placeholder="cantII">
                                        </div>
                                        <div class="col-xs-3">
                                          <label>III</label>
                                            <input type="text" class="form-control" id="cant3"  placeholder="cantIII">
                                        </div>
                                        <div class="col-xs-3">
                                          <label>IV</label>
                                            <input type="text" class="form-control" id="cant4"  placeholder="cantIV">
                                        </div>                                        
                                    </div>


                                </div> 
                        </div>
                        <div class="modal-footer clearfix">

                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                            <button type="button"  id="btnguardarmeta" name="btnguardarmeta" class="btn btn-success pull-left">Guardar</button>
                        </div>
                        <input type="text" id="idplan" name="idplan">
                         <input type="text" id="textactualiza" name="textactualiza">                        
                    </form>
                </div>
            </div>
        </div> 

         <div class="modal fade" id="informacionmetas" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-group"></i> Metas</h4>
                    </div>
                    <form action="view/estructura.php" method="post">
                        <div class="modal-body">
                               <div class="container-fuid">
                                  <div class="row">
                                     <div class="col-md-5">
                                           <img src="fotos/escanear0001.jpg" class="" alt="">
                                      </div>  
                                       <div class="col-md-4">
                                           <a href="">Descargar</a>
                                      </div>           
                                  </div>

                               </div>
                              
                        </div>
                        <div class="modal-footer clearfix">

                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                           
                        </div>
                  
                    </form>
                </div>
            </div>
        </div> 


      
     <?php include "view/dist/footer.php";?>
     <script src="view/importaciones/jquery-ui.min.js"></script>
     <script src="view/jquery/mipoi.js" type="text/javascript"></script> 
     <script src="view/jquery/metas.js" type="text/javascript"></script>
     <script src="view/jquery/bootbox.js" type="text/javascript"></script>
     <script src="view/jquery/toastr.js" type="text/javascript"></script>
     <script src="view/jquery/PrintArea.js" type="text/javascript"></script>
     <script src="view/jquery/ImprimirPOI.js" type="text/javascript"></script>  
      <script src="view/jquery/imprmetas.js" type="text/javascript"></script>         
     
    </body>
</html>
