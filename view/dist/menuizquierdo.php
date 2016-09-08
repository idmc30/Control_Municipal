<?php 
error_reporting(0);
session_start(); 
require_once 'model/clases/usuarios.php';
  $menu = new Usuarios();
  $navmenu = $menu->getmenuxusuario($_SESSION['idusuario']);
?>

<section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                    </div>
                    <!-- search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->

                    <ul class="sidebar-menu">
                        <?php  
                                    $resp= $_SESSION['idusuario'];
                                  ?>
                        <li>
                            <a href="index.php?page=panel&accion=form">
                                <i class="fa fa-slideshare"></i> <span>Principal</span>
                            </a>
                        </li>

<?php foreach ($navmenu as $menunav): ?>

    <?php if (($menunav->idmenupadre)==null): ?>
                <li class="treeview">       
                       <a href="<?php echo $menunav->link ?>">
                       <i class="fa fa-bar-chart-o"></i> <span><?php echo utf8_encode($menunav->nombremenu) ?></span><i class="fa fa-angle-left pull-right"></i>
                   </a> 
                <ul class="treeview-menu">
                <?php foreach ($navmenu as $menunav1): ?>
                    <?php if (($menunav1->idmenupadre) == ($menunav->idmenu)): ?>
                        <li>
                            <a href="<?php echo $menunav1->link ?>">
                             <i class="fa fa-angle-double-right"></i><?php echo $menunav1->nombremenu ?>
                            </a>
                        </li>
                    <?php endif ?>
                <?php endforeach ?>
                </ul>  </li>
    <?php endif ?>

<?php endforeach ?>
                        <!--   
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Organización</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="index.php?page=estructura&accion=form"><i class="fa fa-angle-double-right"></i> Estructura</a></li>
                                <li><a href="index.php?page=cargos&accion=form"><i class="fa fa-angle-double-right"></i>Cargos</a></li>
                               <li><a href="index.php?page=asignaciones&accion=form"><i class="fa fa-angle-double-right"></i> Asignaciones</a></li>
                               <li><a href="index.php?page=personal&accion=form"><i class="fa fa-angle-double-right"></i>Servidores</a></li>
                            </ul>
                        </li>
                         <li class="treeview">
                                <a href="#">
                                <i class="fa fa-line-chart"></i>
                                <span>POI</span>
                                <i class="fa fa-angle-left pull-right"></i>
                                 </a>
                            <ul class="treeview-menu">
                                <li><a href="index.php?page=poi&accion=form"><i class="fa fa-angle-double-right"></i>Administrar POI</a></li>
                                <li><a href="index.php?page=medida&accion=form"><i class="fa fa-angle-double-right"></i>Unidades de Medida</a></li>
                                <li><a href="index.php?page=poi&accion=listarResumenpoi"><i class="fa fa-angle-double-right"></i>Resumen de POI</a></li>
                                
                            </ul>
                        </li>
                        <li class="treeview">
                                <a href="#">
                                <i class="fa fa-line-chart"></i>
                                <span>MI POI</span>
                                <i class="fa fa-angle-left pull-right"></i>
                                 </a>
                            <ul class="treeview-menu">
                                <li><a href="index.php?page=mipoi&accion=form"><i class="fa fa-angle-double-right"></i>Objetivos Operativos</a></li>
                                 <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                            </ul>
                        </li>


                        <li class="treeview">
                                <a href="#">
                                <i class="fa fa-wrench"></i>
                                <span>Configuraciones</span>
                                <i class="fa fa-angle-left pull-right"></i>
                                 </a>
                            <ul class="treeview-menu">

                                 <li><a href="index.php?page=usuariospersonal&accion=form"><i class="fa fa-angle-double-right"></i>Usuarios Personal</a></li>
                                 <li><a href="index.php?page=usuariospersonal&accion=listarUsuarioMenu"><i class="fa fa-angle-double-right"></i>Usuarios Menu</a></li>

                                 
                            </ul>
                        </li> -->
                    </ul>
                </section>