

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

            <!-- Right side column. .Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Municipalidad Provincial de Ferreñafe
                         <small>Mi Evaluacion</small>
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
                                         <select class="form-control" id="poithismetas" name="poithis"><!--poe vigentes-->  
                                                      
                                                <?php  foreach ($ldosmipoi as $mipoi): ?>
                                                  <option value="<?php echo $mipoi->idgerencia."|".$mipoi->idplan ;?>">
                                                    <?php echo "POI  ".$mipoi->codigo."  ".utf8_encode($mipoi->nombre )?></option>
                                                <?php endforeach; ?>  
                                            </select>    
                                            <br/>
                                            
                                            <!--<a href="index.php?page=mipoi&accion=generarpdfPOI&id=<?php echo $mipoi->idgerencia; ?>"  target="_blank" class="btn btn-primary"><i class="fa fa-download"></i> Generate PDF</a>-->
                                            
                                     </div>
                                     
                                </div>
                                <div class="colx-xs-12">
                                    <button id="t1" name="t1"type="button" class="btn btn-primary" <?php 
                                                               if ($mipoi->et1==0) {
                                                                 echo "disabled";
                                                               } else {
                                                                  echo "";
                                                               }
                                                               

                                                            ?>>Trimestre I </button>  
                                          <button id="t2" name="t2" type="button" class="btn btn-primary" <?php 
                                                           if ($mipoi->et2==0) {
                                                              echo "disabled";
                                                          } else {
                                                              echo "";
                                                          }
                                                           ?> >Trimestre II  </button>  
                                            <button id="t3" name="t3" type="button" class="btn btn-primary"  <?php 
                                                           if ($mipoi->et3==0) {
                                                              echo "disabled";
                                                          } else {
                                                              echo "";
                                                          }
                                                                     
                                                  ?>>Trimestre III</button> 
                                            <button id="t4" name="t4" type="button" class="btn btn-primary" <?php 
                                                         if ($mipoi->et4==0) {
                                                            echo "disabled";
                                                                    
                                                           } else {
                                                               echo "";
                                                              }
                                                              

                                            ?>>Trimestre IV</button>  
                                               
                                     </div>
                            </div><!-- /.box (chat box) -->
                      </section>
                    <section class="col-lg-12 connectedSortable" id="listametas" name="listametas">
                              <div class="box">
                                 <div class="box-header">
                                    <h3 class="box-title"></h3>
                                    <div class="box-tools"><!--aqui llamo a mi modal-->
                                       <h3>Listado de Metas Por Trimestre</h3>  
                                      </div><!-- /.box-header -->


                                  <div class="box-body table-responsive no-padding" >
                                       <div id="listametasportrimestre" ></div>
                                  </div><!-- /.box-body -->
                         </div><!-- /.box (chat box) -->
                    </section>
                </section>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
         <!-- COMPOSE MESSAGE MODAL -->
      
        <!-- /.modal -->
       

       <!--  <div class="modal fade" id="informacionmetas" tabindex="-1" role="dialog" aria-hidden="true">
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
        </div> -->


   <!-- COMPOSE MESSAGE MODAL -->
        <div class="modal fade" id="sustentxometa" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                        <h4 class="modal-title"><i class="fa  fa-file-archive-o"></i> Sustentar Metas</h4>
                    </div>
                   
                    <form  action="index.php?page=mievaluacion&accion=insertarSustentacion" method="post"  id="frmsustentoxmetas" enctype="multipart/form-data">
                        <div class="modal-body">
                                <!-- text input -->
                         <div class="form-group">
                              <label>Subir Archivo:</label>
                              <input type="file" name="subirarchivo" id="subirarchivo" />
                          </div>
                        
                        </div>
                          <input type="hidden" id="iddetmeta" name="iddetmeta">
                        
                        <div class="modal-footer clearfix">

                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>Cerrar</button>
                            <button   id="btnguardarfile"  name="btnguardarfile" class="btn btn-success pull-left" >Guardar</button>
                        </div>
                       
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->





      
     <?php include "view/dist/footer.php";?>
     <script src="view/importaciones/jquery-ui.min.js"></script>
     <script src="view/jquery/mievaluacion.js" type="text/javascript"></script>
     <script src="view/jquery/subirarchivos.js" type="text/javascript"></script>
     <!--<script src="view/jquery/mipoi.js" type="text/javascript"></script>-->
     <!--<script src="view/jquery/metas.js" type="text/javascript"></script>-->
     <script src="view/jquery/bootbox.js" type="text/javascript"></script>
     <script src="view/jquery/toastr.js" type="text/javascript"></script>
     <script src="view/jquery/PrintArea.js" type="text/javascript"></script>
     
     
    </body>
</html>

