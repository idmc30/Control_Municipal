<table  class="table table-hover" cellspacing="0" cellpadding="0">

	<tr>
		<th rowspan="2" border="1px">N°</th> 
		<th rowspan="2" border="1px">Objetivo Operacional</th>
		<th rowspan="2" border="1px">Meta</th>
		<th rowspan="2" border="1px">Medida</th>
		<th colspan="4" border="1px">Tiempo</th>
		<!--<th rowspan="2" border="1px">Estado</th>-->
		<th rowspan="2" border="1px">Editar</th>
		<!--<th rowspan="2" border="1px">Eliminar</th>-->
		<!--<th rowspan="2" border="1px">Ver</th>-->
	</tr>

    <tr>
      <th>I</th>
      <th>II</th>
      <th>III</th>
      <th>IV</th>
    </tr>
<?php $c=1 ?>
		<?php foreach ($objetivosxmeta as $objxplan): ?>
			
				<?php $metaxobjetivo = $mipoi->mxobj($idplan, $objxplan->idobjetivo); ?>

				<?php foreach ($metaxobjetivo as $mxobj): ?>
				<tr >

				<?php if (($mxobj->row_number) == 1): ?>
					<td rowspan="<?php echo count($metaxobjetivo) ?>"><?php echo $c ?></td>
					<td rowspan="<?php echo count($metaxobjetivo) ?>"><?php echo utf8_encode($objxplan->descripcion) ?></td>
					<td ><?php echo "<p align='justify'>".$mxobj->descripcion."</p>" ?></td>	
					<td ><?php echo "<p align='justify'>".$mxobj->denominacion."</p>" ?></td>
					<?php $ltiempos=$mipoi->listartimpometa($mxobj->idmeta); ?>
						<?php foreach($ltiempos as $tiempo):?>
						<td ><?php echo $tiempo->cantidad ?></td>
                    	<?php endforeach ?>
                    <!--<td><span class="badge bg-<?php echo (($mxobj->estado)=='P') ? 'red' : 'light-blue' ; ?>"> <?php echo (($mxobj->estado)=='P') ? 'Pendiente' : 'Aprobado' ; ?></span></td>-->
                    <td ><button  onclick="updateMeta()"class='btn btn-danger fa  fa fa-pencil' <?php  
                                       if ($objxplan->elaborando==2) {
                                       	   echo "disabled";
                                       } elseif($objxplan->elaborando==3) {
                                       	    echo "disabled";
                                       }else{
                                            echo "";
                                       }
                                       
                                                                           

                    ?>></button></td>
                	<!--<td ><button class='btn btn-danger fa  fa fa-times' ></button></td>-->
					<!--<td><button class='btn btn-danger fa  fa-search-plus' data-toggle="modal" data-target="#informacionmetas"></button></td>-->
				<?php else: ?>
					<td ><?php echo "<p align='justify'>".$mxobj->descripcion."</p>" ?></td>
					<td ><?php echo "<p align='justify'>".$mxobj->denominacion."</p>" ?></td>
					<?php $ltiempos=$mipoi->listartimpometa($mxobj->idmeta); ?>
						<?php foreach($ltiempos as $tiempo):?>
						<td ><?php echo $tiempo->cantidad ?></td>
                    	<?php endforeach ?>
                    <!--<td><span class="badge bg-<?php echo (($mxobj->estado)=='P') ? 'red' : 'light-blue' ; ?>"> <?php echo (($mxobj->estado)=='P') ? 'Pendiente' : 'Aprobado' ; ?></span></td>-->
                    <td ><button  class='btn btn-danger fa  fa fa-pencil' 
                        <?php  
                                       if ($objxplan->elaborando==2) {
                                       	   echo "disabled";
                                       } elseif($objxplan->elaborando==3) {
                                       	    echo "disabled";
                                       }else{
                                            echo "";
                                       }
                                       
                                                                           

                    ?>></button></td>
                	<!--<td ><button class='btn btn-danger fa  fa fa-times' ></button></td>-->
					<!--<td ><button class='btn btn-danger fa  fa-search-plus' data-toggle="modal" data-target="#informacionmetas"></button></td>-->
				<?php endif ?>

				</tr>	
				
				<?php endforeach ?>
 <?php $c++; ?>							
		<?php endforeach ?>


</table>