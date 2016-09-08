
<?php
$cod = $_GET['id']; 

require 'fpdf/fpdf.php';

$pdf=new FPDF('L','mm','A3');//hoja=> L= horizontal P= vertical, mm=milimetros cm=centimetros, A4  posicion,medidas,tamaño
$pdf->Addpage();//Añadimos página.
$pdf->SetFont('Arial', 'B', 18);
$pdf->Image("view/img/menbrete.png", 15, 3, 20, 25);
$pdf->Cell(390,2, utf8_decode("PLAN OPERATIVO INSTITUCIONAL - POI - ".$lngerencia->codigo), 0, 0, 'C');
$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190,2, utf8_decode("UNIDAD ORGÁNICA:  ".$lngerencia->nombre), 0, 0, 'C');
$pdf->SetFont('Arial','B',9);
$pdf->ln(15);
$pdf->Cell(700, 2, utf8_decode("  FECHA: ".date('Y-m-d')." "), 0, 0, 'C');

$pdf->Line(20,30,400,30); //linea
$pdf->ln(10);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,12,"",4);  // modificar le pafding
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(10,12,utf8_decode("N°"),1,0,'C',1);
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(80,12,"OBJETIVOS OPERATIVOS",1,0,'C',1);
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(10,12,utf8_decode("N°"),1,0,'C',1);
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(150,12,"METAS OPERATIVAS",1,0,'C',1);
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(45,12,"UNIDAD DE MEDIDA",1,0,'C',1);
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(20,12,"CANTIDAD",1,0,'C',1);
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(78,12, utf8_decode("CONOGRAMA TRIMESTRAL DE EJECUCIÓN"),1,0,'C',1);
$pdf->ln(12);
$pdf->SetMargins(8, 20 , 10);
$cont=1;  //CONTADO PARA  MOSTRAR EN  FORMA ENUMERADA 
        
if($rmipoi){
    
$cont=1;  //CONTADO PARA  MOSTRAR EN  FORMA ENUMERADA 
$contdos=1;
        
 foreach ($rmipoi as $metas) {

      $pdf->Cell(5,5,"",0); //modificar el pading
      $pdf->SetFont('Arial','',12);
      $pdf->Cell(10,180,utf8_decode($cont),1,0,'C'); //Campo barra numerica
      //$pdf->Cell(80,180,utf8_decode($metas->objetivo),1,0,'C'); 
      $pdf->Cell(80,180,"f",1,0,'C'); 
      $pdf->Cell(10,12,utf8_decode($cont.".".$contdos ),1,0,'C');

      $pdf->MultiCell( 150, 12, utf8_decode($metas->meta) ,1,1,'L' );
           for ($i=1; $i <=10 ; $i++) { 
              $pdf->Cell(10,12,utf8_decode($i),1,1,'C');
            }
          


     /* $pdf->Cell(30,6,utf8_decode($metas->dni),1,0,'C');
      $pdf->Cell(80,6,utf8_decode($metas->direccion),1,0,'L');
      $pdf->Cell(53,6,utf8_decode($metas->email),1,0,'L');
      $pdf->Cell(25,6,utf8_decode($metas->clasificacion),1,0,'C');
      $pdf->Cell(25,6,utf8_decode($metas->situacion),1,0,'C');*/
      $cont= $cont+1;
      $contdos= $contdos+1;
      $pdf->Ln(6);
      }

    }
$pdf->Output();//Función que nos permite obtener el PDF.
?>