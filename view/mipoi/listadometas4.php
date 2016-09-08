
        <!-- border-top: 1px solid rgb(0, 0, 0); -->


<table class="table table-hover" style=" font-weight: 100;font-size: 14px" border="1px">
  <tbody >
    <tr >
        <th class="borderx" border="1px"rowspan="2" style="border-top: 1px solid rgb(0, 0, 0);">N°</th> 
        <th rowspan="2" border="1px" style="border-top: 1px solid rgb(0, 0, 0);">Objetivo Operacional</th>
        <th rowspan="2" border="1px" style="border-top: 1px solid rgb(0, 0, 0);">Meta</th>
        <th rowspan="2" border="1px" style="border-top: 1px solid rgb(0, 0, 0);">Medida</th>
        <th colspan="4" border="1px" style="border-top: 1px solid rgb(0, 0, 0);">Tiempo </th>
        <th rowspan="2" border="1px" style="border-top: 1px solid rgb(0, 0, 0);">Estado</th>
        <th rowspan="2" border="1px" style="border-top: 1px solid rgb(0, 0, 0);">Editar</th>
        <th rowspan="2" border="1px" style="border-top: 1px solid rgb(0, 0, 0);">Eliminar</th>
        <th rowspan="2" border="1px" style="border-top: 1px solid rgb(0, 0, 0);">Ver</th>
       

    </tr>
    <tr>
      <th style="border-top: 1px solid rgb(0, 0, 0);">I</th>
      <th style="border-top: 1px solid rgb(0, 0, 0);">II</th>
      <th style="border-top: 1px solid rgb(0, 0, 0);">III</th>
      <th style="border-top: 1px solid rgb(0, 0, 0);">IV</th>

    </tr>

   <?php 
    $ct = count($ldosmipoi);
   ?>
   
      <?php foreach ($ldosmipoi as $metas1): ?>
        <?php $c=1 ?>
        <tr>
          <td rowspan="3" style="border-top: 1px solid rgb(0, 0, 0);"> <?php echo "<b>".$c."</b>" ?></td>
        </tr>

        <?php $c++; ?>
      <?php endforeach ?>
    

    <tr>   
          <?php  foreach ($ldosmipoi as $metas): ?>
                <?php $nfila=$poi->nfilas($metas->idobjetivo);  
                    $cant = $nfila->nfilas;
                ?>
               <tr  id="<?php echo $metas->idmeta; ?>" class="idmetas">
                
                  
                  <td style="border-top: 1px solid rgb(0, 0, 0);"> <?php echo utf8_encode($metas->objetivo).'|'.$ct; ?></td>
                  <td style="border-top: 1px solid rgb(0, 0, 0);"> <?php echo utf8_encode($metas->meta ) ; ?></td>
                  <td style="border-top: 1px solid rgb(0, 0, 0);"> <?php echo $metas->medida  ; ?></td>
                  <?php $ltiempos=$poi->listartimpometa($metas->idmeta); ?>
                    

                    <!-- <table  class="table table-hover">
                        <tr> -->
        
                        <?php foreach($ltiempos as $tiempo):?>

                        <td style="border-top: 1px solid rgb(0, 0, 0);"><?php echo $tiempo->cantidad ?></td>
                        <?php endforeach ?>
                        <!-- </tr>
                        </table> -->
                       
                   <?php if ($metas->estado=="P"): ?>
                       <td style="border-top: 1px solid rgb(0, 0, 0);"> <span class="badge bg-red">Pendiente</span></td>                                                               
                   <?php else: ?>
                       <td style="border-top: 1px solid rgb(0, 0, 0);"><span class="badge bg-light-blue">Aprobado</span></td>    
                   <?php endif ?>                                                      
                 <td style="border-top: 1px solid rgb(0, 0, 0);"><button  class='btn btn-danger fa  fa fa-pencil' id="editarmetas"></button></td>
                 <td style="border-top: 1px solid rgb(0, 0, 0);"><button class='btn btn-danger fa  fa fa-times' id="eliminarmetas"></button></td>
                 <!--<td style="border-top: 1px solid rgb(0, 0, 0);"><button class='btn btn-danger fa  fa-search-plus' data-toggle="modal" data-target="#informacionmetas"></button></td>
                  <button id="btnmmetas" name="btnmmetas"type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalpoe">Insertar Metas </button> -->
                
             <?php endforeach; ?>
        </tr>
    </tr>
  </tbody>