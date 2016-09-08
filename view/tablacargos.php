<table class="table table-hover"  style=" font-weight: 100;font-size: 14px">
 <tr>

     <th style='width: 50px'>N°</th>
     <th style='width: 400px'>Titulo</th>
     <th style='width: 200px'>Codigo</th>
     <th style='width: 200px'>Descripcion</th>
     <th style='width: 80px'>Editar</th>
     <th style='width: 90px'>Eliminar</th>
     
     
    </tr>
      <?php $c=1 ?>
     <?php  foreach ( $lcargos as $cargos): ?>
   
    <tr id="<?php echo $cargos->idcargo; ?>">
    <td> <?php echo "<b>".$c."</b>" ?></td>
    <td> <?php echo $cargos->titulo ?></td>
     <td> <?php echo $cargos->codigo; ?></td>
    <td><?php echo $cargos->descripcion; ?></td>   
     <td><button onclick="actualizarCargo('<?php  echo $cargos->idcargo; ?>')"class="btn btn-danger fa  fa-pencil"></button></td>
    <td><button onclick="eliminarCargo('<?php  echo $cargos->idcargo; ?>')"class="btn btn-danger fa fa-close"></button></td>
    </tr> 
     <?php $c=$c+1 ?>
   <?php endforeach; ?>
</table>



