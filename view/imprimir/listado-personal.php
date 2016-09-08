<?php
require 'fpdf/fpdf.php';


class PDF extends FPDF{

function Footer()
  {
    // To be implemented in your own inherited class
    //$this->Ln(2);
    $this->SetY(-12);
    $this->SetFont('Arial','B',10);      
    $this->Cell(390,10,utf8_decode("UTIC. Fecha de creación: ").date("d-m-Y H:i")."                         "."Pag ".$this->PageNo(),0,0,'C');    
  }

  function Header()  {
    // To be implemented in your own inherited class
    //$this->Ln(2);
    $this->SetFont('Arial', 'B', 10);
    $this->Image("view/img/menbrete.png", 50, 3, 20, 25);
    // $this->Image("view/img/logr.jpg", 265, 5, 20, 20);
    $this->Cell(390,2, utf8_decode("MUNICIPALIDAD PROVINCIAL DE FERREÑAFE"), 0, 0, 'C');
     $this->Ln(4);
    $this->Cell(390, 2,utf8_decode( "Calle Nicanor Carmona Nº 436 - Ferreñafe - Lambayeque - Central Telefónica: +51 - 074287876 "), 0, 0, 'C');

    $this->Ln(4);
    $this->Cell(390, 2, utf8_decode( "Email: municipalidad@muniferrenafe.gob.pe"), 0, 0, 'C');    
    $this->Ln(10);
    $this->Ln(10);


  }

}
$pdf=new PDF('L','mm','A3');
$pdf->SetMargins(8, 10 , 10);
$pdf->AddPage();
//$pdf->Ln(15);
$pdf->SetFont('Arial','B',18);
$pdf->Cell(385, 2, utf8_decode('"REPORTE  DE  PERSONAL"'), 0, 0, 'C');
$pdf->SetFont('Arial','B',9);
$pdf->ln(5);
$pdf->Cell(695, 2, utf8_decode("  FECHA: ".date('Y-m-d')." "), 0, 0, 'C');

$pdf->Line(20,30,380,30); //linea
// $pdf->SetFont('Arial','B',8);
// $pdf->Cell(275,16,utf8_decode("DEPARTAMENTO: ")." ".$depart."             "."FECHA:  ".$meses[$fecha_mes]." - ".$fecha_anio,0,0,'C');
$pdf->ln(20);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,10,"",4);  // modificar le pafding
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(10,10,utf8_decode("N°"),1,0,'C',1);
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(50,10,"Nombres",1,0,'C',1);
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(60,10,"Apellidos",1,0,'C',1);
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(30,10,"Dni",1,0,'C',1);
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(12,10,"Sexo",1,0,'C',1);
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(23,10, utf8_decode("Teléfono"),1,0,'C',1);
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(80,10, utf8_decode("Dirección"),1,0,'C',1);
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(55,10,"Email",1,0,'C',1);
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(25,10, utf8_decode("Clasificación"),1,0,'C',1);
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(25,10, utf8_decode("Situación"),1,0,'C',1);
$pdf->Ln(10);
$pdf->SetMargins(8, 10 , 10);
if($sermunicipal){
    
$cont=1;  //CONTADO PARA  MOSTRAR EN  FORMA ENUMERADA 
        
 foreach ($sermunicipal as $personal) {

      $pdf->Cell(10,10,"",0); //modificar el pading
      $pdf->SetFont('Arial','',12);
      $pdf->Cell(10,6,utf8_decode($cont),1,0,'C'); //Campo barra numerica
      $pdf->Cell(50,6,utf8_decode($personal->nombres),1,0,'L'); 
      $pdf->Cell(60,6,utf8_decode($personal->appaterno)."".utf8_decode($personal->apmaterno),1,0,'L');                  
      $pdf->Cell(30,6,utf8_decode($personal->dni),1,0,'C');
      $pdf->Cell(12,6,utf8_decode($personal->sexo),1,0,'C');
      if ($personal->telefono) {
        $pdf->Cell(23,6,utf8_decode($personal->telefono),1,0,'L');
      }else {
         $pdf->Cell(23,6,utf8_decode($personal->celular),1,0,'L');
      }
      $pdf->Cell(80,6,utf8_decode($personal->direccion),1,0,'L');
      $pdf->Cell(55,6,utf8_decode($personal->email),1,0,'L');
      $pdf->Cell(25,6,utf8_decode($personal->clasificacion),1,0,'C');
      $pdf->Cell(25,6,utf8_decode($personal->situacion),1,0,'C');
      $cont= $cont+1;
      $pdf->Ln(6);
      }


/*$pdf->ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,10,"",0);  // modificar le pafding
$pdf->Cell(20,6,"TOTAL",1,0,'C',1);
*/
}

   /* $pdf->Cell(75,3,utf8_decode($_SESSION['usuario']),0,0,'C');
    $pdf->Ln(2);
    $pdf->Cell(75,3,utf8_decode($_SESSION['nivel']),0,0,'C');

    $pdf->Ln(2);  */

                
$pdf->Output();
?>