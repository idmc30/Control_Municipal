<?php 

require_once 'model/clases/mipoi.php';
require_once 'class.inputfilter.php';


function _formAction(){

     /* $mipoi  = new MiPoi();
      require 'view/mipoi/metasform.php';*/

    }



  function _listarmetasAction(){
       $idgerencia=$_POST['gerencia'];
       $poi  = new MiPoi();
       $ldosmipoi=$poi ->listar($idgerencia);       
       require 'view/mipoi/listadometas.php';
  }


 
  function _actualizarEstadodePlanAction(){
       
       $idplan=$_POST['codplan'];
       $poi  = new MiPoi();
       $apoi=$poi ->confirmaPOI($idplan); 
             
       
  }



  /*function _listartiempoMetaActio(){
       
       $metatiempo  = new MiPoi();
      $lmetatiempo=$metatiempo->listartimpometa($metas->idmeta)
       require 'view/mipoi/listadometas.php';
       


  }*/


