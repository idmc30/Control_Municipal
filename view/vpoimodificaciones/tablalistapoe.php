<div class="box-header">
                                    <h3 class="box-title">Lista de POI - Unidades</h3>
                                    <div class="box-tools">
                                    </div>
                                </div><!-- /.box-header -->


<table class="table table-hover" style=" font-weight: 100;font-size: 14px" >
                                        <tbody>
                                        <tr>
                                         
                                            <th>Unidad Organica</th>
                                            <th>Habilitar/Formulación/Estado</th>
                                             <th>I Trim.</th>
                                             <th>II Trim</th>  
                                             <th>III Trim</th>  
                                             <th>III Trim</th>    
                                        </tr>

                                         <tr>
                                            <?php  foreach ($ogerencias as $poe): ?>
                                                 <tr id="<?php echo $poe->idplan; ?>">
                                                   <td><?php echo "POI ".$poe->codigo." - ".$poe->nombre; ?></td>
                                                   <td>
                                                   <?php  if ($poe->elaborando==1) {
                                                        echo "<input type='checkbox' onclick='HabilFormulacion(".$poe->idplan.");' id='habilitardos' name='habilitardos' checked>
                                                          <span class='label label-success'>POI en elaboración</span>";
                                                   }else{

                                                         echo "<input type='checkbox' onclick='disbledC(".$poe->idplan.");' id='habilitar' name='habilitar'>
                                                          <span class='label label label-danger'>Click para habilitar</span>";
                                                   }   
                                                   ?>
                                                     <td><input type='checkbox' id='a' name='a' disabled></td>
                                                   <td><input type='checkbox' id='b' name='b' disabled></td>
                                                   <td><input type='checkbox' id='c' name='c' disabled></td> 
                                                    <td><input type='checkbox' id='d' name='d' disabled></td> 
                                                 </td>
                                                   
                                               </tr>
                                                                                                
                                                <?php endforeach; ?>
                                          </tr>
                                      
                                </table>