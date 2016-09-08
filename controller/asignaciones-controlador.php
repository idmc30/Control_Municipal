  <?php 

  //require_once 'model/clases/usuarios.php';
  require_once 'model/clases/estructura.php';
  require_once 'model/clases/cargos.php';
  require_once 'model/clases/personal.php';
  require_once 'model/clases/asignaciones.php';
  require_once 'class.inputfilter.php';

  function _formAction(){

    /*$lestructura = new Estructura();
    $glistas=$lestructura->listar(); */

      $lestructura = new Estructura();
     $glistas=$lestructura->listar();
     $onivel=$lestructura->obtenerultimonivel();
     $ultimonivel=$onivel->idnivel;
   
    require 'view/asignaciones.php';

  }

function _listarcargosAction(){

  $id = $_POST['id'];
  $asignaciones=new Asignaciones();
  $lasignaciones=$asignaciones->lasignacionesxId($id);

    //aqui debe ir el archivo php..donde vas a imprimir el resultdo del array 
  require 'view/tablaasignaciones.php'; 

}



function _listarcargosValueAction(){

  $id = $_POST['id'];
  $cargos=new Cargos();
  $lcargos=$cargos->getcargosxId($id);
  require 'view/Vcagoestructural.php'; 

}



function _ajaxGetAsignacionxDniAction(){

  $dni = $_POST['dni'];
  $asignacion=new Asignaciones();
  $oasignacion=$asignacion->buscarxDNI($dni);
  $response = array();
    if ($oasignacion) {
   $response['capturado'] = $oasignacion->appaterno.' '.$oasignacion->apmaterno.' '.$oasignacion->nombres;
   $response['idservidor'] = $oasignacion->idservidor;
 } else{
    $response['capturado'] = "servidor no registrado";
}
  header('Content-Type: application/json');
  echo json_encode($response);
  
}


function _guardarAsignacionesAction(){
  $idcargo = $_POST['idestruc'];
  $idservidor = $_POST['idperso'];
  $clasificacion = $_POST['idclasifi'];
  $situacion = $_POST['situa'];
  $observacion = $_POST['observ'];
 // $idasignacion = $_POST['idasig'];
  $estado = 1;
    if (!empty($_POST["idasig"])) {
            $idasignacion=$_POST['idasig'];
             $cargos=new Asignaciones();
            $lcargos=$cargos->modificar($idcargo,$idservidor,$clasificacion,$situacion,$observacion);
            echo "Asignacion Modificada Correctamente";
        }else{
            $cargos=new Asignaciones();
            $lcargos=$cargos->insertar($idcargo,$idservidor,$clasificacion,$situacion,$observacion);
            echo "Registrado Correctamente";
        }  
}



function _eliminarAsignacionAction(){
     $cod=$_POST['id'];
     $cargos=new Asignaciones();
     $lcargos=$cargos->eliminar($cod);
     echo "Se eliminó Correctamente";
}

function _ajaxGetAsignacionxCodigoAction(){
  $id = $_POST['idasig'];
  $asignacion=new Asignaciones();
  $oasignacion=$asignacion->obtenerxId($id);
  $response = array();
  $response['idcargo'] = $oasignacion->idcargo;
  $response['idservidor'] = $oasignacion->idservidor;
  $response['clasifiacion'] = $oasignacion->clasificacion;
  $response['situacion'] = $oasignacion->situacion;
  $response['observacion'] = $oasignacion->observacion;
  $response['titulo'] = $oasignacion->titulo;
  $response['descripcion'] = $oasignacion->descripcion;
  $response['nombres'] = $oasignacion->nombres;
  $response['appaterno'] = $oasignacion->appaterno;
  $response['apmaterno'] = $oasignacion->apmaterno;
  $response['dni'] = $oasignacion->dni;
  header('Content-Type: application/json');
  echo json_encode($response);
}



?>