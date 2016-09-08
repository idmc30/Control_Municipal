<?php 

include 'controller/validar-sesion.php';
require_once 'model/clases/medida.php';
require_once 'model/clases/objetivo.php';
require_once 'model/clases/tiempo.php';
require_once 'model/clases/mipoi.php';
require_once 'model/clases/estructura.php';
require_once 'class.inputfilter.php';


function _formAction(){

      $mipoi  = new MiPoi();
      $ooperacional  = new ObjetivoOperacional();
      $looperacional=$ooperacional->listar();
      $tiempo  = new Tiempo();
      $ltiempo=$tiempo->listar();
      $medida  = new Medida();
      $lmedida=$medida->listar();

      require 'view/mipoi/metasform.php';

}

function _ajaxgetmetasAction(){

  $idplan = $_POST['idp'];
  $mipoi  = new MiPoi();
  $objetivosxmeta = $mipoi->obtenerobjxmeta($idplan);
  require 'view/mipoi/listadometas.php';

}



function _ajaxinsertmetaAction(){

//idperiodo, descipmeta, medida, cant1, cant2, cant3, cant4
  $idplan = $_POST['idplan'];
  $idobjetivo = $_POST['idobjetivo'];
  $descipmeta = $_POST['descipmeta'];
  $medida = $_POST['medida'];
  $estado = 'P';
  $response = array();

  $mipoi = new MiPoi();
  $insertarmeta = $mipoi->insertarmeta($descipmeta, $estado, $idplan, $medida, $idobjetivo);
  $obteneridmeta = $mipoi->obteneridmeta($estado, $idplan, $medida, $idobjetivo, $descipmeta);
  $idmeta = $obteneridmeta->idmeta;

  for ($i=1; $i<5 ; $i++) { 
    $cantidad = $_POST['cant'.$i];
    $idtiempo = $i;
    $insertarmetadet = $mipoi->insertarmeta_det($idmeta, $idtiempo, $cantidad);
  }
  $response['inserted'] = true;
  header('Content-Type: application/json');
  echo json_encode($response);

}



  function _generarpdfPOIAction(){
         $filter = new InputFilter();
         $id = $filter->process($_GET['id']); 
         $mipoi  = new MiPoi();
         $rmipoi=$mipoi->listapoipdf($id); 
         $gerencia  = new Estructura();
         $lngerencia=$gerencia->obtenerGereciasxId($id); 
         require 'view/imprimir/listado-poi.php';
  }



function _estadobotonesPoiAction(){
 $idplanbtn=$_POST['codplan'];
 $mipoi  = new MiPoi();
 $estado=$mipoi->obtenerEstadoPlan($idplanbtn);
   $response = array();
    $response["idplan"] =$estado->idplan;
    $response["codigo"] =$estado->codigo;
    $response["inicio"] =$estado->inicio;
    $response["fin"] =$estado->fin;
    $response["documento"] =$estado->documento;
    $response["idgerencia"] =$estado->idgerencia;
    $response["activo"] =$estado->activo;
    $response["elaborando"] =$estado->elaborando;
    $response["confirmado"] =$estado->confirmado;
    header('Content-Type: application/json');
    echo json_encode($response);
   






}


function _imprimirAction(){


  // $idplan = $_GET['id'];
  // $mipoi  = new MiPoi();
  // $objetivosxmeta = $mipoi->obtenerobjxmeta($idplan);


  require 'view/mipoi/imprimir-metas.php';
  //require 'view/imprimir/listado-poi.php';

}



