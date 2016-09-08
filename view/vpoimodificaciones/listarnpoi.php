<table class="table table-hover" style=" font-weight: 100;font-size: 14px">
                                      <tbody>
                                        <tr>
                                            <th>Denominación</th>
                                            <th>Documento de Aprobación</th>
                                            <th>Inicio</th>
                                            <th>Fin</th>
                                            <th>Total de Planes</th>
                                            <th>Confirmados</th>
                                            <th>Estado</th>
                                        </tr>
                                          <tr>
                                            <?php  foreach ($lpoi as $poi): ?>
                                                 <tr id="<?php echo $poi->idplan; ?>">
                                                   <td> <?php echo "Plan Operativo Institucional-POI ".$poi->codigo; ?></td>
                                                   <td> <?php echo $poi->documento; ?></td>
                                                   <td> <?php echo $poi->finicio; ?></td>
                                                   <td> <?php echo $poi->ffin;  ?></td>
                                                   <td> <?php echo $poi->cantidad; ?></td>                                                 
                                                   <td> <?php echo $poi->CantConfirmado; ?></td>
                                                   <td> <span class="label label-warning">Elaborando</span></td>               
                                               <?php endforeach; ?>
                                          </tr>
                                      </tbody>
                                      </table>