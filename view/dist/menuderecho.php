  <?php 
  error_reporting(0);
  session_start();

  ?>

  <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>  <?php echo $_SESSION['nom']." ".$_SESSION['apepa']." ".$_SESSION['apema'] ;?><i class="caret"></i></span>
                            </a> 
                            <ul class="dropdown-menu">
                                <!--  imagen -->
                                <li class="user-header bg-light-blue">
                                      <?php if (!$_SESSION['foto']  & $_SESSION['sexo']=="F")  : ?>
                                         <img src="view/img/avatar3.png ?>" class="img-circle" alt="User Image" />
                                      <?php elseif(!$_SESSION['foto']  & $_SESSION['sexo']=="M"): ?>
                                          <img src="view/img/avatar5.png" class="img-circle" alt="User Image" />
                                        <?php else: ?>
                                           <img src="fotos/<?php echo $_SESSION['foto'] ?>" class="img-circle" alt="User Image" />
                                      <?php endif ?>                                
                                    <?php  echo "<p>".utf8_encode($_SESSION['gerencia']).
                                               "<small>".utf8_encode($_SESSION['cargo'])." - ". utf8_encode($_SESSION['nomperfil'])."</small>
                                                </p>"
                                       ?>
                                </li>
                                <!-- Menu Body -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                       
                                    </div>
                                    <div class="pull-right">
                                        <a href="index.php?page=log&accion=cerrar" class="btn btn-default btn-flat">Cerrar</a>
                                    </div>
                                </li>
                            </ul>
                        </li>


                       