 <section class="content">
                     <div class="row">
                    <section class="col-lg-12 connectedSortable" >
                              <div class="box">
                                 <div class="box-header">
                                    <h3 class="box-title">Listado de Estructura</h3>
                                    <div class="box-tools"><!--aqui llamo a mi modal-->  
                                           <button class='btn btn-primary' id='ngerencia' name='ngerencia' onclick="prueba()"data-toggle='modal' data-target='#modalgerencias' >Nueva Gerencia</button> 
                                        <!-- <button class='btn btn-primary' id='nestructura' name='nestructura' data-toggle='modal' data-target='#modalpersonalnuevo'> Nueva Estructura</button>-->
                                         
                                     </div>
                                 </br>
                                 </div><!-- /.box-header -->
                                  <div class="box-body table-responsive no-padding" >
                                      <table class="table table-hover" style=" font-weight: 100;font-size: 14px" id="ltabla" mame="ltabla">
                                      <tbody>
                                        <tr>
                                              <th style='width: 20px'>Dependencia</th>
                                              <th style='width: 20px'>C.Costo</th>
                                              <th style='width: 500px'>Nombre</th>
                                              <th style='width: 80px'>Sigla</th>
                                              <th style='width: 80px'>Nivel</th>
                                              <th style='width: 20px'>Editar</th>
                                              <th style='width: 20px'>Eliminar</th>
                                              <th style='width: 20px'></th>

                                        </tr>
                                          <tr>
                                            <?php 
                                               $i=1;
                                               $j=1;
                                               $k=1
                                              
                                            ?>
                                   
                                            <?php  foreach ($glistas as $lgerencias): ?>
                                                 <tr id="<?php echo $lgerencias->idgerencia; ?>">
                                                  <?php if ($lgerencias->nivel!=2 ): ?>
                                                   <?php if ($lgerencias->nivel==3): 
                                                      $i= $i-1;
                                                      $k=$k-1; 
                                                   ?>
                                                       <td></td>    <!--en esta parte es para el espacio de dependencia-->
                                                    <?php elseif($lgerencias->nivel==4):
                                                        $i= $i-1;
                                                        $k=$k-1; 
                                                     ?>
                                                      <td><?php echo "<b><center>".$i.".0.".$j."</center></b>";?></td>      
                                                    <?php elseif($lgerencias->nivel==5): 
                                                       $i= $i-1;
                                                       $k=$k-1; 
                                                    ?>                                            
                                                      <td><?php 
                                                         $k=$k-1;
                                                         $j= $j-1;  
                                                      echo "<b><center>".$i.".0.".$j."</center></b>";
                                                         
                                                      ?></td>      
                                                    <?php else: ?>
                                                    <td> <?php echo "<b><center>".$i."</center></b>";?></td>      
                                                    <?php endif ?>  
                                                   <td> <?php echo "<b><center>".$i.".".$j."</center></b>" ?></td>
                                                     <?php 
                                                        $j= $j-1;                 
                                                     ?>
                                                   <td> <?php echo utf8_encode($lgerencias->nombre); ?></td>
                                                   <td> <?php echo utf8_encode($lgerencias->sigla); ?></td>
                                                   <td> <?php echo "<b><i>".utf8_encode($lgerencias->nomnivel)."<i></b>"; ?></td>
                                                   <td><button onclick='actualizarNivel("<?php echo $lgerencias->idgerencia; ?>")' class="btn btn-danger fa  fa-pencil"></button>   </td>
                                                   <td><button onclick='eliminarNivel(" <?php echo $lgerencias->idgerencia; ?> ")' class="btn btn-danger fa fa-close"></button></td>   
                                                   
                                                   <td>  
                                               <?php 
                                                       if($lgerencias->nivel==3){
                                                        echo "<button onclick='agregar(".$lgerencias->idgerencia.")' class='btn btn-danger fa  fa fa-plus'  data-toggle='modal' data-target='#modaln3'></button>";
                                                       }elseif ($lgerencias->nivel==4) {
                                                          echo "";
                                                         }
                                                       elseif($lgerencias->nivel==5){
                                                         echo "<button onclick='agregar(".$lgerencias->idgerencia.")' class='btn btn-danger fa  fa fa-plus'  data-toggle='modal' data-target='#modaln5'></button>";
                                                       }
                                                       else {
                                                        echo "<button onclick='agregar(".$lgerencias->idgerencia.")' class='btn btn-danger fa  fa fa-plus'  data-toggle='modal' data-target='#modalrestoniveles'></button>";      
                                                       }
                                                       $j=$j+1;
                                                       $k=$k+1;
                                                       $i=$i+1;                                                     
                                                  ?>

                                                     </td>
                                                  <?php else: ?>
                                                           
                                                   <td> <?php echo "<b><center>".$i ."</center></b>"?></td>
                                                   <td> <?php echo "<b><center>".$i.".".$j."</center></b>" ?></td>
                                                   <td> <?php echo utf8_encode($lgerencias->nombre); ?></td>
                                                   <td> <?php echo utf8_encode($lgerencias->sigla); ?></td>
                                                   <td> <?php echo "<b><i>".utf8_encode($lgerencias->nomnivel)."<i></b>"; ?></td>
                                                    
                                                   <td><button onclick='actualizarNivel("<?php echo $lgerencias->idgerencia; ?>")' class="btn btn-danger fa  fa-pencil"></button>   </td>
                                                   <td><button onclick='eliminarNivel(" <?php echo $lgerencias->idgerencia; ?> ")' class="btn btn-danger fa fa-close"></button></td>   
                                                  
                                                   
                                                   <td>  
                                               <?php 
                                                       if($lgerencias->nivel==3){
                                                        echo "<button onclick='agregar(".$lgerencias->idgerencia.")' class='btn btn-danger fa  fa fa-plus'  data-toggle='modal' data-target='#modaln3'></button>";
                                                       }elseif ($lgerencias->nivel==4) {
                                                          echo "";
                                                         }
                                                       elseif($lgerencias->nivel==5){
                                                         echo "<button onclick='agregar(".$lgerencias->idgerencia.")' class='btn btn-danger fa  fa fa-plus'  data-toggle='modal' data-target='#modaln5'></button>";
                                                       }
                                                       else {
                                                        echo "<button onclick='agregar(".$lgerencias->idgerencia.")' class='btn btn-danger fa  fa fa-plus'  data-toggle='modal' data-target='#modalrestoniveles'></button>";      
                                                       }

                                                       $j= 1;
                                                       $i= $i+1;
                                                  ?>
                                                     </td>
                                                  <?php endif ?>
                                                   <?php endforeach; ?>
                                                   
                                          </tr>
                                      </tbody>
                                      </table>
                                  </div><!-- /.box-body -->
                         </div><!-- /.box (chat box) -->
                    </section>
                </section>