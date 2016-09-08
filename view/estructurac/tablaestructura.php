 <section class="content">
  <div class="row">
    <section class="col-lg-10 connectedSortable" >
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
                            <th style='width: 10px'>Depen</th>
                            <th style='width: 10px'>C.Costo</th>
                            <th style='width: 10px'>Nombre</th>
                            <th style='width: 10px'>Editar</th>
                            <th style='width: 11px'>Eliminar</th>
                            <th style='width: 21px'>Nivel</th>
                        </tr>
                        
                          <?php foreach ($glistas as $lgerencia): ?>
                          <tr>
                            <td><b><u><?php echo $lgerencia->row_number ?>.</u> </b></td>
                            <td><b><?php echo $lgerencia->row_number ?>.0</b></td>
                            <td><b><?php echo utf8_encode($lgerencia->nombre) ?></b></td>
                           <!-- <td><b><?php //echo $lgerencia->nivel ?></b></td>-->
                            <td><button onclick='actualizarNivel("<?php echo $lgerencia->idgerencia; ?>")' class="btn btn-danger fa  fa-pencil"></button>   </td>
                            <td><button onclick='eliminarNivel(" <?php echo $lgerencia->idgerencia; ?> ")' class="btn btn-danger fa fa-close"></button></td>   
                            <td><b><?php 
                                         if ($lgerencia->nivel==1) {
                                           echo "<button onclick='agregar(".$lgerencia->idgerencia.")' class='btn btn-danger fa  fa fa-plus'  data-toggle='modal' data-target='#modalrestoniveles'></button>";
                                         }elseif ($lgerencia->nivel==2) {
                                             echo "<button onclick='agregar(".$lgerencia->idgerencia.")' class='btn btn-danger fa  fa fa-plus'  data-toggle='modal' data-target='#modalrestoniveles'></button>";
                                         }


                               ?></b></td>
                          </tr>

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
                            <tr>
                            <td></td>
                            <td>&nbsp;&nbsp;&nbsp;<?php echo $lgerencia->row_number.'.'.$lsub->row_number ?> </td>
                            <td>&nbsp;&nbsp;&nbsp;<?php echo utf8_encode($lsub->nombre) ?></td>
                            <td><button onclick='actualizarNivel("<?php echo $lsub->idgerencia; ?>")' class="btn btn-danger fa  fa-pencil"></button>   </td>
                            <td><button onclick='eliminarNivel(" <?php echo $lsub->idgerencia; ?> ")' class="btn btn-danger fa fa-close"></button></td>   
                            <td><?php  
                                     if ($lsub->nivel==3) {
                                       echo "<button onclick='agregar(".$lsub->idgerencia.")' class='btn btn-danger fa  fa fa-plus'  data-toggle='modal' data-target='#modaln3'></button>";
                                     }elseif ($lsub->nivel==4) {
                                       echo "";
                                     }elseif ($lsub->nivel==5) {
                                       echo "<button onclick='agregar(".$lsub->idgerencia.")' class='btn btn-danger fa  fa fa-plus'  data-toggle='modal' data-target='#modaln5'></button>";
                                     }

                              ?></td>
                             

                          </tr> 
                          <?php else: ?>
                            <tr>
                            <td></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $lgerencia->row_number.'.0.'.$lsub->row_number ?> </td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo utf8_encode($lsub->nombre) ?></td>
                            <td><button onclick='actualizarNivel("<?php echo $lsub->idgerencia; ?>")' class="btn btn-danger fa  fa-pencil"></button></td>
                            <td><button onclick='eliminarNivel(" <?php echo $lsub->idgerencia; ?> ")' class="btn btn-danger fa fa-close"></button></td>   
                            <td><?php //echo $lsub->nivel
                                   if ($lsub->nivel==3) {
                                    echo "<button onclick='agregar(".$lsub->idgerencia.")' class='btn btn-danger fa  fa fa-plus'  data-toggle='modal' data-target='#modaln3'></button>";
                                   }elseif ($lsub->nivel==4) {
                                     echo "";
                                   }elseif ($lsub->nivel==5) {
                                     echo "<button onclick='agregar(".$lsub->idgerencia.")' class='btn btn-danger fa  fa fa-plus'  data-toggle='modal' data-target='#modaln5'></button>";
                                   }


                             ?></td>
                          </tr>
                          <?php endif ?>


                          <?php $padre = $lsub->idgerencia; ?>
                        <?php endforeach ?> <!--aqui termina el for echa principal-->

                            <?php
                              }
                            }
                          ?>
                          <?php endforeach ?>
                      </tbody>
                      </table>
                  </div><!-- /.box-body -->
         </div><!-- /.box (chat box) -->
    </section>
</section>


<!--                           <tr>
                            <td></td>
                            <td>&nbsp;&nbsp;&nbsp;<?php// echo $lgerencia->row_number.'.'.$lsub->row_number ?> </td>
                            <td>&nbsp;&nbsp;&nbsp;<?php// echo $lsub->nombre ?></td>
                            <td><?php// echo $lsub->nivel ?></td>
                          </tr> -->  