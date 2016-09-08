<?php 

include 'controller/validar-sesion.php';
require_once 'model/clases/medida.php';
require_once 'class.inputfilter.php';


function _formAction(){

       $medida=new Medida();
      $lmedida=$medida->listar();
      require 'view/vpoimodificaciones/vunidadesdemedida.php';

    }

 function _insertarAction(){
       $denominacion=strtoupper($_POST['deno']); 
       $simbolo=$_POST['simb'];

       if (!empty($_POST["cod"])) {
            $id=$_POST['cod'];
            $medida= new Medida();
           $mmedida=$medida->modificar($denominacion,$simbolo,$id);
            echo "Se modificó correctamente";
        }else{
             $medida= new Medida;
             $nmedida=$medida->insertar($denominacion,$simbolo);
            echo "Medida Registrada Correctamente"; 
        }  
 }


function _listarTablaAction(){
    $medida=new Medida();
    $lmedida=$medida->listar();
    require 'view/vpoimodificaciones/tablamedida.php'; 
 
}


 function _eliminarAction(){
       $id=$_POST['id']; 
       $medida= new Medida;
       $nmedida=$medida->eliminar($id);
       echo "Medida Eliminada Correctamente";      
          
 }


function _obtenerAction(){
     $id = $_POST['id'];
     $medida=new Medida();
     $upmedida=$medida->getmedidaxId($id); 
    $response = array();
    $response["deno"] =$upmedida->denominacion;
    $response["simb"] =$upmedida->simbolo;
    header('Content-Type: application/json');
    echo json_encode($response);

}




?>
