<?php 

require_once 'model/clases/usuarios.php';
require_once 'model/clases/estructura.php';
require_once 'class.inputfilter.php';

function _formAction(){

      
      require 'view/estructura.php';

    }
       

function _insertarAction(){
       $documento=strtoupper($_POST['documento']); //le cambia el ajax por el normal action
       $fecha=$_POST['fecha'];
       $activo=1;
       $confirmacion=1;       
       $time = strtotime($fecha);
       $newformat = date('Y-m-d',$time);
           $estructura= new Estructura;
           $nestructura=$estructura->insertar($documento,$newformat,$activo,$confirmacion);
              if ($nestructura) {
                 header("location: index.php?page=estructura&accion=form");
              }
              else {
                 header("location: index.php?page=estructura&accion=form");
              }
 }



function _listargetAction(){
    $id = $_POST['id'];
    $estructura=new Estructura();
    $lestructura=$estructura->getestucturaxId($id);
    $response = array();
    $response["idgere"] =$lestructura->idgerencia;
    $response["idpadre"] =$lestructura->idgerenciaPadre;
    $response["nombre"] =$lestructura->nombre;
    $response["nivel"] =$lestructura->nivel;
    $response["sigla"] =$lestructura->sigla;
    $response["descrip"] =$lestructura->descripcion;
    header('Content-Type: application/json');
    echo json_encode($response);
}


function _insertarGerenciasAction(){
        $nombre=utf8_decode(strtoupper($_POST['nom']));
        $iniciales=strtoupper($_POST['sigla']);
        $descripcion=$_POST['descrip'];
        $niveles=$_POST['niveles'];

   if (!empty($_POST["codigogere"])) {
           $idgerencia=$_POST['codigogere'];
           $gerencias= new Estructura;
           $ngerencias=$gerencias->modificar($nombre,$iniciales,$descripcion,$idgerencia);
           echo " Modificado Correctamente";
        }else{
          $gerencias= new Estructura;
           $ngerencias=$gerencias->insertargerencias($nombre,$iniciales,$descripcion,$niveles);
           echo "Datos registrados Correctamente";; 
        }  



 }


 function _insertarPadreAction(){
        $idpadre=$_POST['idpadre'];
        $nombre=utf8_decode(strtoupper($_POST['nom']));
        $iniciales=strtoupper($_POST['sigla']);
        $descripcion=$_POST['descrip'];
        $niveles=$_POST['niveles'];
      if (!empty($_POST["codgerencia"])) {
           $idgerencia=$_POST['codgerencia'];
           $gerencias= new Estructura;
           $ngerencias=$gerencias->modificar($nombre,$iniciales,$descripcion,$idgerencia);
           echo " Modificado Correctamente";
        }else{
           $gerencias= new Estructura;
        $ngerencias=$gerencias->insertarPadre($idpadre,$nombre,$iniciales,$descripcion,$niveles);
        echo "Registrada Correctamente";
        }  

 }



 function _listabuttonAction(){
      echo "</br> <div class='callout callout-danger'>
                           <h4>Importante!</h4>
                                        <p>Usted no cuenta con una estructura organica actual.</p>
                                    </div>";
             
 }

 function _contarEstadosBotonesAction(){
       $periodo = new Estructura();
       $contarperiodo=$periodo->contar();             
      if ($contarperiodo) {            
            echo "hay datos";
       } else{        
           echo "no hay datos";
       }
 }



  function _eliminarAction(){
         $codigo=$_POST['id'];
        try {
            $eliminar= new Estructura();
           $neliminar=$eliminar->eliminar($codigo);
        } catch (Exception $e) {
           echo "No se puede eliminar Verificar ";
        }
  } 


  function _gestionarAction(){
          $lestructura = new Estructura();
          $glistas=$lestructura->listar();
          $onivel=$lestructura->obtenerultimonivel();
          $ultimonivel=$onivel->idnivel;
          require 'view/estructurac/tablaestructura.php';
 }


    ?>