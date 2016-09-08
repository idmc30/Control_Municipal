<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
       <?php include "view/dist/cabecera.php";?>
       <link href="view/importaciones/jquery-ui.min.css" rel="stylesheet"> 
    </head>
    <body class="skin-blue">
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
                        
                         <small>Resumen Plan de Organizacion Institucional</small>
                    </h1>
              
                </section>
                     <!-- Main content -->
                <section class="content">
                     <div class="row">
                        <!-- Left col -->                               
                       <section class="content">
                         <div class="row">
                           <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Listado de POI</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>POI</th>
                                                <th>Estado</th>
                                                <th>Obervar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php  foreach ($lpoi as $poi): ?>
                                                 <tr id="<?php echo $poi->idplan; ?> ?>">
                                                   <td> <?php echo "POI ".$poi->codigo." - ".$poi->nombre; ?></td>                                            
                                                   <td><?php echo "Estado" ?></td>                                                 
                                                   <td><a href="javascript:editar('<?php  //echo $servidor->idservidor; ?>')">Resumen</a></td>
                                                   
                                                                                          
                                               <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div>

                            
                            </div>
                       </div>

                     </section><!-- /.content -->



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
                        <h4 class="modal-title"><i class="fa fa-bullseye"></i> POE</h4>
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
                            <button type="button"  id="btnguardar" name="btnguardar" class="btn btn-success pull-left">Guardar</button>
                        </div>
                        <input type="hidden" id="idtrabajador" name="idtrabajador">
                    </form>
                </div>
            </div>
        </div> 



      
     <?php include "view/dist/footer.php";?>
     <script src="view/importaciones/jquery-ui.min.js"></script>
     <script src="view/jquery/poi.js" type="text/javascript"></script> 
    </body>
</html>
