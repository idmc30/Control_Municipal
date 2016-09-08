<table class="table table-hover" style=" font-weight: 100;font-size: 14px" >
                                        <tbody>
                                        <tr>
                                         
                                            <th>N°</th>
                                            <th>Tipo de Objetivo</th>
                                             <th>Meta</th>
                                             <th>Estado</th>  
                                             <th>Cantidad</th>  
                                             <th>Sustento</th>  
                                             
                                        </tr>
                                         
                                         <?php $c=1; ?>

                                   

                                          <tr> 
                                            <?php  foreach ($metaxtrimestre as $metatimestre): ?>
                                                 <?php if ($metatimestre->cantidad==1): ?>
                                                 <tr id="<?php echo $metatimestre->idmeta ; ?>">
                                                   <td><?php echo "<b>".$c."</b>"; ?></td>
                                                   <td><?php echo utf8_encode($metatimestre->tipoobjetivo); ?></td>
                                                   <td><?php echo "<p align='justify'>".$metatimestre->meta."</p>" ?></td>
                                                    <?php if ($metatimestre->estado=="P"): ?>
                                                       <td><span class="badge bg-red">Pendiente</span></td>  
                                                    <?php elseif($metatimestre->estado=="E"): ?>
                                                      <td><span class="badge bg-yellow">Sustento Enviado</span></td>
                                                     <?php else: ?>
                                                         <td><span class="badge bg-green">Meta Aprobada</span></td>
                                                    <?php endif ?>
                                                   <td><?php echo "<center>".$metatimestre->cantidad ."</center>" ?></td>
                                                   <td><?php echo '<button onclick="asignarid('.$metatimestre->iddetmeta.')" class="btn btn-danger fa   fa-plus-square" data-toggle="modal" data-target="#sustentxometa"></button>' ;?></td>
                                                   
                                                   
                                               </tr>
                                              
                                                  <?php $c=$c+1; ?>
                                                    
                                                   
                                                 <?php else: ?>
                                                    
                                                 <?php endif ?>

                                              <?php endforeach; ?>
                                          </tr>
                                      
                                </table>