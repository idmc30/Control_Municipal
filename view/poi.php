<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
       <?php include "dist/cabecera.php";?>
       <link href="view/importaciones/jquery-ui.min.css" rel="stylesheet"> 
    </head>
    <body class="skin-blue wysihtml5-supported  pace-done fixed">
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
                        
                         <small>Plan de Organizacion Institucional</small>
                    </h1>
              
                </section>
                     <!-- Main content -->
                <section class="content">
                     <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-7 connectedSortable">
                            <div class="box box-success">
                                <div class="box-header">
                                    <a class="btn btn-app" id="ppoi" name="ppoi">
                                        <i class="fa fa-external-link"></i> Preparar Poi
                                    </a>
                                     <a class="btn btn-app" id="adminispoi" name="adminispoi">
                                        <i class="fa fa-gears" id="admin" name="admin"></i> Administrar Poi
                                    </a>
                                </div>

                            </div><!-- /.box (chat box) -->
                        </section>
                            <section  id="gpoi" nane="gpoi">
                                       <section class="col-lg-8 connectedSortable">
                                          <div class="box box-success">
                                                
                                                <div class="form-group">
                                                  <label class="col-md-2">POI:</label>
                                                   <div class="col-xs-7">
                                                     <select class="form-control" id="poi" name="poi"><!--poe vigentes-->        
                                                            <?php  foreach ($lpoi as $poi): ?>
                                                              <option value="<?php echo $poi->codigo;?>">
                                                                <?php echo "POI ".$poi->codigo; ?></option>
                                                            <?php endforeach; ?>  
                                                        </select>    
                                                 </div>
                                                </div>
                                                <hr> 
                                                <hr> 
                                                 <div class="form-group">
                                                    <label class="col-md-2">Unidades del POI:</label>
                                                     <div class="col-xs-7">
                                                     <select class="form-control" id="unidadespoi" name="unidadespoi">                                                          
                                                     </select>
                                                     </div> 
                                                 </div>                                                 
                                                 <hr> 
                                                 <hr> 
                                                  <div class="form-group">
                                                    <label class="col-md-2">Proceso:</label>
                                                      <div class="col-xs-7">
                                                             <select class="form-control" id="procesopoi" name="procesopoi">             
                                                                 <option value=""></option>
                                                             </select>  
                                                     </div>            
                                                 </div>
                                                  <hr> 
                                                 <hr> 
                                            </div>
                                         </section>
                               </section>


                               <section id="listachekpoi" name="listachekpoi">
                                     <div class="col-lg-12">
                                        <div class="box">
                                            <div class="box-body table-responsive no-padding">

                                              <div id="resultadotodospoe" name="resultadotodospoe" ></div>

                                            </div><!-- /.box-body -->
                                          </div><!-- /.box -->
                                       </div>
                                  </div><!-- /.box (chat box) -->
                               </section>

                    <section class="col-lg-12 connectedSortable" >
                            <div class="box">
                                 <div class="box-header">
                                    <h3 class="box-title"></h3>
                                    <div class="box-tools"><!--aqui llamo a mi modal-->
                                        <button id="btnasignacion" name="btnasignacions"type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalpoe">Insertar POI</button>
                                    </div>
                                 </div><!-- /.box-header -->
                                  <div class="box-body table-responsive no-padding" id="listaplann" name="listaplann">
                                              <table class="table table-hover" style=" font-weight: 100;font-size: 14px">
                                              <tbody>
                                                <tr>
                                                    <th>Denominación</th>
                                                    <th>Documento de Aprobación</th>
                                                    <th>Inicio</th>
                                                    <th>Fin</th>
                                                    <th>Total de Planes</th>
                                                    <th>Confirmados</th>
                                                    <th>Estado</th>
                                                </tr>
                                                  <tr>
                                                    <?php  foreach ($lpoi as $poi): ?>
                                                         <tr id="<?php echo $poi->idplan; ?>">
                                                           <td> <?php echo "Plan Operativo Institucional-POI ".$poi->codigo; ?></td>
                                                           <td> <?php echo $poi->documento; ?></td>
                                                           <td> <?php echo $poi->finicio; ?></td>
                                                           <td> <?php echo $poi->ffin;  ?></td>
                                                           <td> <?php echo $poi->cantidad; ?></td>                                                 
                                                           <td> <?php echo $poi->CantConfirmado; ?></td>
                                                           <td> <span class="label label-warning">Elaborando</span></td>               
                                                       <?php endforeach; ?>
                                                  </tr>
                                              </tbody>
                                              </table>
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
                        <h4 class="modal-title"><i class="fa fa-bullseye"></i> POI</h4>
                    </div>
                    <form action="view/poi.php" method="post">
                        <div class="modal-body">
                                <div class="form-group">
                                    <label>Fecha Inicio:</label>
                                    <input type="text" id="fechinicio" name="fechinicio"  class="form-control" placeholder="Fecha ..." required/>
                                </div>   
                                 <div class="form-group">
                                    <label>Fecha Final:</label>
                                    <input type="text"  id="fechfinal" name="fechfinal" class="form-control" placeholder="Fecha ..." required/>
                                </div>
                                    
                                       <div class="form-group">
                                    <label>Documento:</label>
                                   <input class="form-control"  id="doc" name="doc" placeholder="Documento de aprobación" type="text">   
                                </div>

                                   
                                <div class="form-group">
                                      <label>Estructura Vigente</label>
                                                
                                            <select class="form-control" id="idperiodo" name="idperiodo">             
                                                <?php  foreach ($lperiodo as $periodo): ?>
                                                  <option value="<?php echo $periodo->idperiodo; ?>">
                                                    <?php echo utf8_encode($periodo->documento); ?></option>
                                                <?php endforeach; ?>  
                                            </select>  
                                </div>
                               
                        </div>
                        <div class="modal-footer clearfix">

                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                            <button type="button"  id="btnguardartiempo" name="btnguardartiempo" class="btn btn-success pull-left">Guardar</button>
                        </div>
                        <input type="hidden" id="idtrabajador" name="idtrabajador">
                    </form>
                </div>
            </div>
        </div> 



      
     <?php include "dist/footer.php";?>

     <script src="view/importaciones/jquery-ui.min.js"></script>
     <script src="view/jquery/poi.js" type="text/javascript"></script> 
      <script src="view/jquery/poixtrimestres.js" type="text/javascript"></script> 
      
  
    </body>
</html>
