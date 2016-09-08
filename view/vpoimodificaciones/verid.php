
     <select class="form-control" id="idperiodo" name="idperiodo">             
     <?php  foreach ($lgerencias as $gerencia): ?>

     <option value="<?php echo $gerencia->idgerencia; ?>">
     <?php echo $codigogerencia=$gerencia->idgerencia; ?></option>
    
     <?php  
         $planes= new Poi;
         $insert=$planes->insertar($codigogerencia,$cod,$formatuno,$formatdos,$documen);                                         
      ?>       

      <?php endforeach; ?>  
  
    </select> 
