<table class='table table-bordered' style=' font-weight: 100;font-size: 14px'>
 <tr>
     <th>Titulo</th>
     <th>Nombre</th>
    </tr>

     <?php  foreach ($lpersonal as $personal): ?>
  <tr id="<?php echo $personal->idservidor; ?>">
    <td> <?php echo utf8_encode($cargos->titulo) ?></td>
    <td><?php echo utf8_encode($lcargos->nombres) ?></td>                                            
   <?php endforeach; ?>
</table> 