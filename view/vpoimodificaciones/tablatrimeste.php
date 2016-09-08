<table class="table table-hover" style=" font-weight: 100;font-size: 14px" >
                                      <tbody>
                                        <tr>
                                            <th style='width: 20px'>N°</th>
                                            <th style='width: 50px'>Trimestre</th>
                                            <th style='width: 80px'>Fecha de Incio</th>
                                            <th style='width: 80px'>Fecha Final</th>
                                            <th style='width: 20px'>Editar</th>
                                            <th style='width: 20px'>Eliminar</th>
                                        </tr>
                                          <tr> 
                                             <?php  $cnt=1; ?>
                                            <?php  foreach ($ltiempo as $tiempo): ?>
                                                 <tr id="<?php echo $tiempo->idtiempo; ?>">
                                                    <td> <?php echo  "<b>".$cnt."</b>" ?></td>
                                                   <td> <?php echo $tiempo->descripcion; ?></td>
                                                   <td> <?php echo $tiempo->fechinicio; ?></td>
                                                   <td> <?php echo $tiempo->fechfinal; ?></td>
                                                   <td>                                    
                                                     <button onclick='actualizarTiempo("<?php echo $tiempo->idtiempo; ?>")' class="btn btn-danger fa  fa-pencil"></button>
                                                   </td>               
                                                   <td><button onclick='eliminarTiempo("<?php echo $tiempo->idtiempo; ?>")' class="btn btn-danger fa fa-close"></button></td>
                                              <?php $cnt=$cnt+1; ?>
                                               <?php endforeach; ?>
                                          </tr>
                                      </tbody>
                                      </table>