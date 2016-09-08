<div class="box-header">
                                    <h3 class="box-title">Lista de POI - Unidades</h3>
                                    <div class="box-tools">
                                    </div>
                                </div><!-- /.box-header -->


<table class="table table-hover" style=" font-weight: 100;font-size: 14px" >
                                        <tbody>
                                        <tr>
                                           <th>N°</th>
                                            <th>Unidad Organica</th>
                                            <th>Habilitar/Formulación/Estado</th>
                                             <th>I Trim.</th>
                                             <th>II Trim</th>  
                                             <th>III Trim</th>  
                                             <th>IV Trim</th>    
                                        </tr>
                                           <?php $c=1; ?>
                                         <tr> 
                                            <?php  foreach ($ogerencias as $poe): ?>
                                                 <tr id="<?php echo $poe->idplan; ?>">
                                                  <td><?php echo "<b>".$c."</b>" ?></td>
                                                   <td><?php echo "POI ".$poe->codigo." - ".utf8_encode($poe->nombre); ?></td>
                                                   <td>
                                                   <?php  
                                                   /* if ($poe->elaborando==1) {
                                                        echo "<input type='checkbox' checked  data-idpoi='".$poe->idplan."' class='activarpoi'>
                                                          <span class='label label-success'>POI en elaboración</span>";
                                                   }elseif ($poe->elaborando==2) {
                                                     echo "<input type='checkbox' checked  data-idpoi='".$poe->idplan."' class='activarpoi'>
                                                          <span class='label label-warning'>POI Confirmado</span>";
                                                   }elseif ($poe->elaborando==3) {
                                                     echo "<input type='checkbox' checked  data-idpoi='".$poe->idplan."' class='activarpoi'>
                                                          <span class='label label-primary'>POI </span>";
                                                   }
                                                   else{
                                                     echo "<input type='checkbox'  data-idpoi='".$poe->idplan."' class='activarpoi'>
                                                          <span class='label label-danger'>Click para habilitar</span>";
                                                   } */
                                                        if ($poe->activo==1) {
                                                           /*echo "<input type='checkbox' checked  data-idpoi='".$poe->idplan."' class='activarpoi'>
                                                                            <span class='label label-success'>POI en elaboración</span>";*/
                                                              switch ($poe->elaborando) {
                                                                  case 0:
                                                                       echo "<input type='checkbox' checked  data-idpoi='".$poe->idplan."' class='activarpoi'>
                                                                            <span class='label label-success'>POI en elaboración</span>";
                                                                  break;
                                                                      
                                                                 /*case 1:
                                                                     echo "<input type='checkbox' checked  data-idpoi='".$poe->idplan."' class='activarpoi'>
                                                                            <span class='label label-success'>POI en elaboración</span>";
                                                                  break;*/
                                                                  case 2:
                                                                       echo "<input type='checkbox' checked  data-idpoi='".$poe->idplan."' class='activarpoi'>
                                                                            <span class='label label-warning'>POI Confirmado</span>";
                                                                  break;
                                                                  case 3:
                                                                  echo "<input type='checkbox' checked  data-idpoi='".$poe->idplan."' class='activarpoi'>
                                                                         <span class='label label-primary'>POI Terminado</span>";
                                                                  break;
                                                              }
                                                            


                                                        } elseif($poe->activo==0) {
                                                          echo "<input type='checkbox'  data-idpoi='".$poe->idplan."' class='activarpoi'>
                                                          <span class='label label-danger'>Click para habilitar</span>";
                                                        }
                                                        


                                                   ?></td>
                                                   <td><?php if ($poe->elaborando==2): ?>
                                                        <input type='checkbox' id='a' name='a' data-idplan="<?php echo $poe->idplan ?>" class="activartuno" 
                                                        <?php 
                                                        if ($poe->et1==1) {
                                                          echo "checked";
                                                        } else {
                                                          echo "";
                                                        }?>>
                                                      </td>
                                                       <td><input type='checkbox' id='b' name='b' data-idplan="<?php echo $poe->idplan ?>" class="activartdos" 
                                                        <?php 
                                                        if ($poe->et2==1) {
                                                          echo "checked";
                                                        } else {
                                                          echo "";
                                                        }?>></td>
                                                       <td><input type='checkbox' id='c' name='c'  data-idplan="<?php echo $poe->idplan ?>" class="activarttres"
                                                        <?php 
                                                        if ($poe->et3==1) {
                                                          echo "checked";
                                                        } else {
                                                          echo "";
                                                        }?> 

                                                        ></td> 
                                                       <td><input type='checkbox' id='d' name='d' data-idplan="<?php echo $poe->idplan ?>" class="activartcuatro"
                                                        <?php 
                                                        if ($poe->et4==1) {
                                                          echo "checked";
                                                        } else {
                                                          echo "";
                                                        }?>
                                                        ></td> 
                                                      <?php else: ?> <!-- chekcbox disabled pero verificando estado-->

                                                       <input type='checkbox' id='a' name='a' data-idplan="<?php echo $poe->idplan ?>" class="activartuno" 
                                                       <?php 
                                                        if ($poe->et1==1) {
                                                          echo "checked";
                                                        } else {
                                                          echo "";
                                                        }?> disabled></td>
                                                       <td><input type='checkbox' id='b' name='b' data-idplan="<?php echo $poe->idplan ?>" class="activartdos" 
                                                        <?php 
                                                        if ($poe->et2==1) {
                                                          echo "checked";
                                                        } else {
                                                          echo "";
                                                        }?>disabled></td>
                                                       <td><input type='checkbox' id='c' name='c' data-idplan="<?php echo $poe->idplan ?>" class="activarttres" 
                                                        <?php 
                                                        if ($poe->et3==1) {
                                                          echo "checked";
                                                        } else {
                                                          echo "";
                                                        }?>disabled></td> 
                                                       <td><input type='checkbox' id='d' name='d' data-idplan="<?php echo $poe->idplan ?>" class="activartcuatro" 
                                                        <?php 
                                                        if ($poe->et4==1) {
                                                          echo "checked";
                                                        } else {
                                                          echo "";
                                                        }?>disabled></td> 
                                                      <?php endif ?>

                                                      




                                                   </td>
                                                     
                                                   
                                               </tr>
                                           
                                                    
                                               
                                                    
                                                <?php $c=$c+1; ?>                                                  
                                                <?php endforeach; ?>
                                          </tr>
                                      
                                </table>