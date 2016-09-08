<?php

session_start();

require_once 'model/clases/usuarios.php';
require_once 'model/clases/personal.php';
require_once 'class.inputfilter.php';

function _formAction(){

    $lempleado = new Personal();
    $sermunicipal=$lempleado->listar();
      require 'view/nuevopersonal.php';

    }

function _insertarAction(){
  $errores= array(UPLOAD_ERR_OK =>"No se ha producito ningun error", 
  UPLOAD_ERR_INI_SIZE=>"El tamaño de archvi ha excedido el maximo indicado en php.ini",
  UPLOAD_ERR_FORM_SIZE=>"El tamaño de archivo ha excedido el maximo para este formulario", 
  UPLOAD_ERR_PARTIAL=>"El archivo ha sido subido parcialmente",
  UPLOAD_ERR_NO_FILE=>"El archivo no existe",
  UPLOAD_ERR_NO_TMP_DIR=>"El directorio temporal no existe",
  UPLOAD_ERR_CANT_WRITE=>"No se puede escribir en el dico duro",
  UPLOAD_ERR_EXTENSION=>"Error en una extension php");  

       $non=strtoupper($_POST['nom']); 
       $apepa=strtoupper($_POST['apepa']);
       $apema=strtoupper($_POST['apema']);
       $dni=strtoupper($_POST['dni']);
       $sex=$_POST['sexo'];
       $telef=$_POST['telef'];
       $dir=strtoupper($_POST['dir']);
       $email=$_POST['email'];
       $cel=$_POST['celu'];
       $nombre_temp= $_FILES['subirarchivo']["tmp_name"];
       $nombre_archivo= $_FILES['subirarchivo']['name'];
        if (!$nombre_archivo==null) {
          $nombre_archivo_string= $dni."".$nombre_archivo;
        } else {
          $nombre_archivo_string=$nombre_archivo;
        }
        
       $nuevo_nombre="fotos/".basename($nombre_archivo);      
      if (!empty($_POST["idtrabajador"])) {
            $id=$_POST["idtrabajador"];
        $servidor= new Personal();
        move_uploaded_file($nombre_temp,$nuevo_nombre);
        $nservido=$servidor->modificar($id,$non,$apepa,$apema,$dni,$sex,$telef,$dir,$email,$cel,$nombre_archivo_string);         
        header("location: index.php?page=personal&accion=form");
        }else{
           $servidor= new Personal(); 
           move_uploaded_file($nombre_temp,$nuevo_nombre);
           $nservido=$servidor->insertar($non,$apepa,$apema,$dni,$sex,$telef,$dir,$email,$cel,$nombre_archivo_string);   
           
           header("location: index.php?page=personal&accion=form");
       }
        
}




function _listarAction(){
      $lempleado = new Personal();
       $sermunicipal=$lempleado->listar();
       require 'view/nuevopersonal.php';
        }



  function _generarpdfAction(){

       $lempleado = new Personal();
       $sermunicipal=$lempleado->listar();
       require 'view/imprimir/listado-personal.php';

  }


/* function _listarAction(){
      $lempleado = new Personal();
       $sermunicipal=$lempleado->listar();

       
   echo "<section class='content'>
   <div class='row'>

   <div class='col-xs-12'>
    <div class='box'>
   <div class='box-header'>
      <h3 class='box-title'>Listado de Personal</h3>
    </div>
      <div class='box-body table-responsive' >
   <table id='example1'  class='table table-bordered table-striped'>
                                            <thead>
                                                <tr>
                                                    
                                                    <th>Nombres</th>               
                                                    <th>Apellido Paterno</th>
                                                    <th>Apellido Materno</th>
                                                    <th>Dni</th>
                                                    <th>Direccion</th>
                                                     <th>Editar</th>
                                                     <th>Eliminar</th>                                                   
                                                </tr>
                                            </thead>
                                                <tbody>";
                                                foreach ($sermunicipal as $servidor):
                                            echo "<tr id=".$servidor->idservidor.">";
                                            echo "<td>".utf8_encode($servidor->nombres)."</td>";
                                            echo "<td>".utf8_encode($servidor->appaterno)."</td>";
                                            echo "<td>".utf8_encode($servidor->apmaterno)." </td>";    
                                            echo "<td>".utf8_encode($servidor->dni)."</td>";    
                                            echo "<td>".utf8_encode($servidor->direccion)."</td>";
                                            echo "<td><a href='sdsd.php?id=".$servidor->idservidor."'>Editar</a></td>";
                                            echo "<td><a href='sdsd.php?id=".$servidor->idservidor."'>Eliminar</a></td></tr>";
                                                                                          
                                               endforeach;
                                           echo "</tbody>";
                                        echo "</table>

                                        </div>
                                      </div>
                                   </div>
                                 </div>
                              </section> ";

        }*/



function _obtenerAction(){
   //con esta funcion obtengo un listar
     $id = $_POST['id'];
     $personal=new Personal();
     $validar=$personal->gettrabajadorxId($id); 
    $response = array();
    $response["nom"] =$validar->nombres;
    $response["apepa"] =$validar->appaterno;
    $response["apema"] =$validar->apmaterno;
    $response["dni"] =$validar->dni;
    $response["sexo"] =$validar->sexo;
    $response["telef"] =$validar->telefono;
    $response["direc"] =$validar->direccion;
    $response["email"] =$validar->email;
    $response["celu"] =$validar->celular;
    $response["foto"] =$validar->foto;    
    header('Content-Type: application/json');
    echo json_encode($response);

}


function _obtenerDosAction(){
   //con esta funcion obtengo un listar
    $dni = $_POST['dni'];
    $personal=new Personal();
    $validar=$personal->selectnormal(); //ya
    require 'view/asignaciones.php';

}




function _eliminarAction(){
          
         $codigo= $_POST["id"];
         $personal=new Personal();
         $validar=$personal->eliminar($codigo); 

      if ($validar) {
        header("location: index.php");  
     }else{

        header("location: index.php?page=personal&accion=form");
     }

    }


?>