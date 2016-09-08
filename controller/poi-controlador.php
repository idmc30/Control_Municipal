<?php 

include 'controller/validar-sesion.php';
require_once 'model/clases/estructura.php';
require_once 'model/clases/poi.php';
require_once 'class.inputfilter.php';
function _formAction(){
        
        $periodo= new Estructura;
        $lperiodo=$periodo->listarPeriodoVigente();
        $poi= new Poi;
        $lpoi=$poi->listarpoi();
        require 'view/poi.php';
    }


function _listarpoiAction(){
        $poi= new Poi;
        $lpoi=$poi->listarpoi();
        require 'view/vpoimodificaciones/listarnpoi.php';
}

function _listarResumenpoiAction(){
        $poi= new Poi;
        $anio=date("Y");
        $lpoi=$poi->listarunidadespoe($anio);
        require 'view/vpoimodificaciones/versumenpoi.php';
}

//en esta parte inserto varias veces
function _listarInsertarAction(){
          
         $id=$_POST["id"]; 
         $finicio=$_POST['finicio'];
         $ffinal=$_POST['ffinal'];
         $documen=$_POST['doc'];
         //use strtotime par cambiar de formato de fecha..XD!
         $timeuni = strtotime($finicio);
         $timedos = strtotime($ffinal);
         $formatuno = date('Y-m-d',$timeuni);
         $formatdos = date('Y-m-d',$timedos);
         $cod = substr("$formatuno", 0, -6); 
         $gerencia= new Poi;
         $lgerencias=$gerencia->getidgerencias($id);
         require 'view/vpoimodificaciones/verid.php';

 }

//genera los option
function _ajaxGetUnidadesxanioAction(){
    $anio=$_POST["anio"]; 
    $gerencia= new Poi;
    $ogerencias=$gerencia->listarunidadespoe($anio);
    $html .= '<option value=1>Todos los POI</option>'; 
    foreach ($ogerencias as $obgerencia) {
          $html .= '<option value="'.$obgerencia->idgerencia.'">'.utf8_encode($obgerencia->nombre).'</option>'; 
    }
    echo $html;
}

function _ajaxProcesoAction(){
  
    $html .= '<option value=0>Seleccione proceso</option>'; 
    $html .= '<option value=1>Evaluacion</option>'; 
    echo $html;
}



function _ajaxGetUnidadesPOIAction(){
    $anio=$_POST["anio"]; 
    $gerencia= new Poi;
    $ogerencias=$gerencia->listarunidadespoe($anio);
    require 'view/vpoimodificaciones/tablalistapoe.php';
}

function _actualizarEstadoPlanesCeroAction(){
    $id=$_POST["id"]; 
    $gerencia= new Poi;
    $ogerencias=$gerencia->modificar($id);
    echo "estadocero";
   //header("location: index.php?page=poe&accion=consultarVariasVeces");
}

function _actualizarEstadoPlanesUnoAction(){
    $id=$_POST["id"]; 
    $gerencia= new Poi;
    $ogerencias=$gerencia->modificaractivo($id);
    echo "estadouno";
     //header("location: index.php?page=poe&accion=consultarVariasVeces");
}

function _listarAdminPoiAction(){
   $gerencia= new Poi;
    $ogerencias=$gerencia->listarunidadespoidos();
    require 'view/vpoimodificaciones/recargartabla.php';
}
//esto es par alos chekbox
function _updatePoixTrimestreAction(){
    $idplan=$_POST["plan"]; 
    $et=$_POST['tiempo'];
    $estado=$_POST['estado'];
    $gerencia= new Poi;
    $uptgerencias= $gerencia->updateplan($et, $estado, $idplan);

    $response = array();

    header('Content-Type: application/json');
    echo json_encode($response);
   
}





?>