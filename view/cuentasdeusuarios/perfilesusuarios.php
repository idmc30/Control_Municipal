<label>Seleccionar Nivel:</label>

     <select class="form-control" id="idperfil" name="idperfil">
     <?php  foreach ($lperfil as $perfil): ?>
      <option style="display:none;" value=""  selected>Seleccionar Nivel</option>
     <option value="<?php echo $perfil->idperfil; ?>">
     <?php echo utf8_encode($perfil->nombreperfil)?></option>
     <?php endforeach; ?>  

</select> 


 