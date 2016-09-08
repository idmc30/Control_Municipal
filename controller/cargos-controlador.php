<?php 

require_once 'model/clases/estructura.php';
require_once 'model/clases/cargos.php';

require_once 'class.inputfilter.php';

function _formAction(){
     //modificar en esta pate....
     $lestructura = new Estructura();
     $glistas=$lestructura->listar();
     $onivel=$lestructura->obtenerultimonivel();
     $ultimonivel=$onivel->idnivel;
      require 'view/cargos.php';
    }
    

function _obtenerCargosAction(){
  
    $id = $_POST['id'];
    $cargos=new Cargos();
    $lcargos=$cargos->obtenerCargosxId($id);
    $response = array();
    $response["identificador"] =$lcargos->idcargo;
    $response["codigo"] =$lcargos->codigo;
    $response["titulo"] =$lcargos->titulo;
    $response["descrip"] =$lcargos->descripcion;
    $response["nombre"] =$lcargos->nombre;
    header('Content-Type: application/json');
    echo json_encode($response);
}



function _vistaAction(){

     require 'view/tablacargos.php'; 
}
//aqui estaa =D
function _listabuttonTablaAction(){
     
     $id = $_POST['id'];
    $cargos=new Cargos();
    $lcargos=$cargos->getcargosxId($id);
    require 'view/tablacargos.php'; 
 
}



function _guardarAction(){
        $id=$_POST['id'];
        $cod=$_POST['cod'];
        $titulo=strtoupper($_POST['titul']);
        $descrip=strtoupper($_POST['descrip']);
         if (!empty($_POST["idcargo"])) {
            $idcargo=$_POST['idcargo'];
            $cargos= new Cargos();
            $ncargos=$cargos->modificar($idcargo,$cod,$titulo,$descrip);
            echo "Cargo Modificado Correctamente";
        }else{
             $cargos= new Cargos();
        $ncargos=$cargos->insertar($id,$cod,$titulo,$descrip);
        echo "Cargo Registrado Correctamente"; 
        }  

}

function _eliminarAction(){
          
         $codigo= $_POST["id"];
         $personal=new Cargos();
         $validar=$personal->eliminar($codigo); 
         echo "Se eliminó Correctamente";

    }


    ?>