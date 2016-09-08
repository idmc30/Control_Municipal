<?php 
  $idplan = $_GET['id'];
  $mipoi  = new MiPoi();
  $objetivosxmeta = $mipoi->obtenerobjxmeta($idplan);
  $gerexplan = $mipoi->obtenergerenciaxplan($idplan);
 ?>
<style type="text/css">
<!--
table
{
    width:  100%;
    border: solid 1px #D5D5D5;
}

th
{
    text-align: center;
    border: solid 1px #D5D5D5;
    background: #D5D5D5;
}

td
{
    text-align: left;
    border: solid 1px #D5D5D5;
}

td.col1
{
    border: solid 1px red;
    text-align: right;
}

td.col2
{
    border: solid 1px red;
    text-align: center;
}

-->
</style>


<page backtop="10mm" backbottom="10mm" >
    <page_header>

        <table style="width: 100%; border: none 0px black;">

            <tr>
                <td style="text-align: left;    width: 20% "></td>
                <td style="text-align: center;    width: 60% "><h4>Plan Operativo Institucional </h4></td>
                <td style="text-align: right;    width: 20% " ><?php echo date('d/m/Y'); ?></td>
            </tr>
            <tr>
                <td style="text-align: left;    width: 20% "></td>
                <td style="text-align: center;    width: 60% "><p><b>UNIDAD ORGANICA : </b><?php echo $gerexplan->nombre ?></p></td>
                <td style="text-align: right;    width: 20% " ><?php echo date('d/m/Y'); ?></td>
            </tr>            
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%; border: solid 1px black;">
            <tr>
                <td style="text-align: left;    width: 50%">html2pdf.fr</td>
                <td style="text-align: right;    width: 50%">page [[page_cu]]/[[page_nb]]</td>
            </tr>
        </table>
    </page_footer>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

<table  cellspacing="0" cellpadding="0">
    <col style="width: 2%" class="col2">
    <col style="width: 20%">
    <col style="width: 3%" class="col2">
    <col style="width: 56%">
    <col style="width: 10%">
    <col style="width: 2%" class="col2">
    <col style="width: 2%" class="col2">
	<col style="width: 2%" class="col2">
    <col style="width: 2%" class="col2">

	<tr>
		<th rowspan="2" border="1px">N°</th> 
		<th rowspan="2" border="1px">Objetivo Operacional</th>
        <th rowspan="2" border="1px">N°</th> 
		<th rowspan="2" border="1px">Meta</th>
		<th rowspan="2" border="1px">Medida</th>
		<th colspan="4" border="1px">Tiempo</th>
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
                <?php $t=1 ?>
				<?php foreach ($metaxobjetivo as $mxobj): ?>
				<tr >

				<?php if (($mxobj->row_number) == 1): ?>
					<td border="1px"rowspan="<?php echo count($metaxobjetivo) ?>"><?php echo $c ?></td>
					<td border="1px"rowspan="<?php echo count($metaxobjetivo) ?>"><?php echo utf8_encode($objxplan->descripcion) ?></td>
                    <td border="1px" ><?php echo $c.'.'.$t ?></td>
					<td border="1px"><?php echo $mxobj->descripcion ?></td>	
					<td border="1px"><?php echo $mxobj->denominacion ?></td>
					<?php $ltiempos=$mipoi->listartimpometa($mxobj->idmeta); ?>
						<?php foreach($ltiempos as $tiempo):?>
						<td border="1px"><?php echo $tiempo->cantidad ?></td>
                    	<?php endforeach ?>

				<?php else: ?>
                    <td border="1px"><?php echo $c.'.'.$t ?></td>
					<td border="1px"><?php echo $mxobj->descripcion ?></td>
					<td border="1px"><?php echo $mxobj->denominacion ?></td>
					<?php $ltiempos=$mipoi->listartimpometa($mxobj->idmeta); ?>
						<?php foreach($ltiempos as $tiempo):?>
						<td border="1px"><?php echo $tiempo->cantidad ?></td>
                    	<?php endforeach ?>

				<?php endif ?>

				</tr>	
				<?php $t++; ?>
				<?php endforeach ?>
 <?php $c++; ?>							
		<?php endforeach ?>





		


</table>

   <!-- <br>
    Ca marche toujours !<br>
    De plus, vous pouvez faire des sauts de page manuellement en utilisant les balises &lt;page&gt; &lt;/page&gt;, comme ici par exemple :-->
</page>
