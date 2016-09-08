<table class="table table-hover" style=" font-weight: 100;font-size: 14px">
                                        <tbody><tr>
                                            <th style='width: 200px'>Cargo Institucional</th>
                                            <th style='width: 200px'>Servidor Municipal</th>
                                            <th style='width: 20px'>Clasificación</th>
                                            <th style='width: 20px'>Situación</th>
                                            <th style='width: 20px'>Editar</th>
                                            <th style='width: 20px'>Eliminar</th>
                                        </tr>
                           <?php  foreach ( $lasignaciones as $asignaciones): ?>
                                <tr id="<?php echo $asignaciones->idservidor; ?>">
                                        <td><?php echo utf8_encode($asignaciones->titulo)." - ".utf8_encode($asignaciones->descripcion) ?></td>
                                        <td><?php echo utf8_encode($asignaciones->dni)." - ".utf8_encode($asignaciones->appaterno)." ".utf8_encode($asignaciones->apmaterno)." , ".utf8_encode($asignaciones->nombres) ?></td>                                         
                                        <td><?php echo utf8_encode($asignaciones->clasificacion)?></td>
                                        <td><?php echo utf8_encode($asignaciones->situacion)?></td>
                                        
                                        <td><button onclick='actualizarAsignacion("<?php echo  $asignaciones->idservidor; ?>")' class="btn btn-danger fa  fa-pencil"></button></td>
                                        <td><button onclick='eliminarAsignacion("<?php echo $asignaciones->idservidor; ?>")' class="btn btn-danger fa fa-close"></button></td>  
                                </tr>          
                                </tbody>
                               <?php endforeach; ?>
 </table>
