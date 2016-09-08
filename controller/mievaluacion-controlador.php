<?php 

require_once 'model/clases/mipoi.php';
require_once 'model/clases/mievaluacion.php';
require_once 'class.inputfilter.php';


function _formAction(){

      $mipoi  = new MiPoi();
      require 'view/mipoi/vmievaluacion.php';

    }



  function _listarmetasAction(){
       //$idgerencia=$_POST['gerencia'];
       $poi  = new MiPoi();
       //$ldosmipoi=$poi ->listar($idgerencia);       
       require 'view/mipoi/vmievaluacion.php';
  }   



  function _metasxTrimestreAction(){
         
        $idplan=$_POST['codplan'];
        $idtiempo=$_POST['descriptiempo'];

        $mievaluacion = new  MiEvaluacion();
        $metaxtrimestre=$mievaluacion->listMestasxTrimestre($idplan,$idtiempo);
        require 'view/mipoi/vmestasxtrimestre.php';
      
  }


  function _insertarSustentacionAction(){
   
    
       $nombre_temp= $_FILES['subirarchivo']["tmp_name"];
       $nombre_archivo= $_FILES['subirarchivo']['name'];
       $nuevo_nombre="sustentos/".basename($nombre_archivo);  
          $anio=date("Y");
          $mes=date("n");
          $dia=date("d");
          $fechaenvio= $anio."-".$mes."-".$dia ;     
       $iddemeta=$_POST["iddetmeta"];
       
        $mievaluacion = new  MiEvaluacion();
        move_uploaded_file($nombre_temp,$nuevo_nombre);
        $nsustento=$mievaluacion->subirSustento($nombre_archivo,$fechaenvio,$iddemeta);         
        header("location: index.php?page=mievaluacion&accion=form");
        
}





