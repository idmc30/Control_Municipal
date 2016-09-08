<?php 

require_once 'model/clases/tiempo.php';
require_once 'class.inputfilter.php';

function _formAction(){
     
      //$tiempo=new Tiempo();
      //$ltiempo=$tiempo->listar();
      require 'view/vpoimodificaciones/vtiempotrimestral.php';

    }



function _listarTiempoAction(){
    $tiempo=new Tiempo();
   $ltiempo=$tiempo->listar();
   require 'view/vpoimodificaciones/tablatrimeste.php';

}    

       

function _insertarTrimestreAction(){
         $descripcion=$_POST['trimestre'];
         $finicio=$_POST['finicio'];
         $ffinal=$_POST['ffinal'];
         $timeuni = strtotime($finicio);
         $timedos = strtotime($ffinal);
         $formatuno = date('Y-m-d',$timeuni);
         $formatdos = date('Y-m-d',$timedos);
       if(!empty($_POST["codigo"])) {
           $id=$_POST['codigo'];
           $tiempo= new Tiempo;
           $mtiempo=$tiempo->actualizarTrimestre($descripcion,$formatuno,$formatdos,$id);
        }else{
             $tiempo= new Tiempo;
            $ntiempo=$tiempo->guardarTrimestre($descripcion,$formatuno,$formatdos);
        }    
       header("location: index.php?page=trimestres&accion=form");

}



  

  function _eliminarTrimestreAction(){
         $codigo=$_POST['codtiempo'];
         $tiempo= new Tiempo;
         $etiempo=$tiempo->eliminarTrimestre($codigo);
         header("location: index.php?page=trimestres&accion=form");

  
 } 



   function _getTrimestreAction(){
              $id=$_POST['codtiempo'];
              $tiempo= new Tiempo;
              $gettiempo=$tiempo->gettiempoxId($id);
              $response = array();
                $response["descripcion"] =$gettiempo->descripcion;
                $response["fechinicio"] =$gettiempo->fechinicio;
                $response["fechafinal"] =$gettiempo->fechfinal; 
                 $response["idtiempo"] =$gettiempo->idtiempo;     
                header('Content-Type: application/json');
                echo json_encode($response);


   }


