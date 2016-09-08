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
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                           <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <span class="label label-success">400</span>
                            </a>-->
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
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                           <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                                <span class="label label-warning">10</span>
                            </a>-->
                            <ul class="dropdown-menu">
                               
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                         </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#"></a></li>
                            </ul>
                        </li>
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">
                           <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-tasks"></i>
                                <span class="label label-danger">9</span>
                            </a>-->
                            <ul class="dropdown-menu">
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                        </li>
                                        
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
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
                
            <?php include "dist/menuizquierdo.php";?> 
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Municipalidad Provincial de Ferreñafe
                       <small>Unidad de Tecnolog&iacutea,Informaci&oacuten</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-slideshare"></i> Principal</a></li>
                       <!-- <li><a href="#"></a></li>
                        <li class="active"></li>-->
                    </ol>
                </section>
                 </br>
                 </br>
                <!--CONTENIDO -->
                <div class="col-md-9">
                     <div class="box">
                        <div class="alert alert-info alert-dismissable">
                                        <i class="fa fa-info"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Bienvenido al administrador del Sistema 
                                        Planificación Municipal</b> 
                                         Usted se encuntra en el modulo del Administrador..
                                    </div>         
                      </div><!-- /.box -->
                 </div>
                <!-- /.FIN DEL CONTENIDO -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <?php include "dist/footer.php";?> 
    </body>
</html>
