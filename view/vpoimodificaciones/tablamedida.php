<table class="table table-hover" style=" font-weight: 100;font-size: 14px">
                                      <tbody>
                                        <tr>
                                            <th>Denominación</th>
                                            <th>Simbolo</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                          <tr>
                                            <?php  foreach ($lmedida as $medida): ?>
                                                 <tr id="<?php echo $medida->idmedida; ?>">
                                                   <td> <?php echo $medida->denominacion; ?></td>
                                                   <td> <?php echo $medida->simbolo; ?></td>
                                                   <td><button onclick='actualizar("<?php echo $medida->idmedida; ?>")' class="btn btn-danger fa  fa-pencil"></button></td>
                                                   <td><button onclick='eliminar("<?php echo $medida->idmedida; ?>")' class="btn btn-danger fa fa-close"></button>                                    
                                                     
                                                   </td>               


                                               <?php endforeach; ?>
                                          </tr>
                                      </tbody>
                                      </table>