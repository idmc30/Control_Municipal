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
                        
                         <small>Tiempo</small>
                    </h1>
              
                </section>
                     <!-- Main content -->
                <section class="content">
                     <div class="row">
                    <section class="col-lg-10 connectedSortable" id="listatiempo" name="listatiempo">
                              <div class="box">
                                 <div class="box-header">
                                    <h3 class="box-title"></h3>
                                    <div class="box-tools"><!--aqui llamo a mi modal-->
                                        <button id="btnasignacion" name="btnasignacions" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaltrimestre">Insertar Trimestre </button>
                                     </div>
                                 </br>
                                 </div><!-- /.box-header -->
                                  <div class="box-body table-responsive no-padding" id="tablatiempo" mame="tablatiempo">
                                      
                                  </div><!-- /.box-body -->
                         </div><!-- /.box (chat box) -->
                    </section>
                </section>

            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
         <!-- COMPOSE MESSAGE MODAL -->
      
        <!-- /.modal -->
          <div class="modal fade" id="modaltrimestre" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-square-o"></i>Tiempo</h4>
                    </div>
                    <form action="view/vpoimodificaciones/vtiempotrimestral.php" method="post">
                        <div class="modal-body">
                                <div class="form-group">
                                   <label>Trimestre:</label>
                                   <select class="form-control" id="idtrimestres" name="idtrimestres">
                                               <option style="display:none;" value="" selected="">Seleccionar Nivel</option>
                                                <option value="I">Trimestre I</option>
                                                <option value="II">Trimestre II</option>
                                                <option value="III">Trimestre III</option>
                                                <option value="IV">Trimestre IV</option>
                                            </select>  
                                </div>   
                                 <div class="form-group">
                                   <label>Fecha de Inicio:</label>
                                   <input class="form-control"  id="fechinciotrimestre" name="fechinciotrimestre" placeholder="Simbolo" type="text">   
                                </div>
                                 <div class="form-group">
                                   <label>Fecha de Final:</label>
                                   <input class="form-control"  id="fechafinaltrimestre" name="fechafinaltrimestre" placeholder="Simbolo" type="text">   
                                </div>  
                                <input type="text" id="txtcodtimpo" name="txtcodtimpo">      
                        </div>
                        <div class="modal-footer clearfix">
                               
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                            <button  type="button"  id="btnguardartiempo" name="btnguardartiempo" class="btn btn-success pull-left">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 



      
     <?php include "view/dist/footer.php";?>  
     <script src="view/importaciones/jquery-ui.min.js"></script>
     <script src="view/jquery/tiempo.js" type="text/javascript"></script> 
    </body>
</html>
