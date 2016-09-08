<?php 


require_once 'model/clases/usuarios.php';
require_once 'class.inputfilter.php';

include 'controller/validar-sesion.php';
function _formAction(){

      $usuarios=new Usuarios();
      $lusuarios=$usuarios->listar();
      require 'view/cuentasdeusuarios/vusuariospersonal.php';

    }


function _listarPefilAction(){
      $perfil=new Usuarios();
      $lperfil=$perfil->listarPerfil();
      require 'view/cuentasdeusuarios/perfilesusuarios.php'; 
 
}    
//usuarios menu
function _listarUsuarioMenuAction(){      
        require 'view/cuentasdeusuarios/usuariosmenu.php';
}
//tabla dinamica 
function _tablaMenuAction(){
        $cod=$_POST['id']; 
        $menu=new Usuarios();
        $lmenu=$menu->listarmenu();
        $verificarestadoMenu = new Usuarios(); 
        require 'view/cuentasdeusuarios/tablamenus.php';
}





function _getUtocompleteAction(){
   //con esta funcion obtengo un listar
     $parametro = $_POST['usu'];
     $nparametro= "%".$parametro."%";
     $usuario=new Usuarios();
     $gusuario=$usuario->autocompletarUsuario($nparametro);
     $response = array();
    // foreach ($gusuario as $reg) {
    //   $response[] = $reg->usuario;
    // }
    $response = $gusuario;

    header('Content-Type: application/json');
    echo json_encode($response);

}


function _ajaxmanejomenuAction(){
    $codusuario = $_POST['codusuario'];
    $idmenu = $_POST['idmenu'];
    $accion = $_POST['accion'];
    $gmenu = new Usuarios();
    if ($accion == "agregar") {
        $imenus = $gmenu->iusumenu($idmenu, $codusuario);        
    } else {
        $emenus = $gmenu->eusumenu($idmenu, $codusuario);
    }
}

//aqui estoy listando el menu
// function _listarMenuAction(){

//   require 'view/dist/menuizquierdo.php';
// }




function _registrarUsuarioAction(){
  $usuario=$_POST['usu'];
  $clave=$_POST['clave'];
  $servidor=$_POST['idservidor'];
  $perfil=$_POST['idperfil'];
  $anio=date("Y");
  $mes=date("n");
  $dia=date("j");
  $fecha= $anio."-".$mes."-".$dia ;
  if (isset($_POST["chkestadou"])) {
            $estado="A";
      }else{
            $estado="D";
      }

       if (!empty($_POST["codusuario"])) {
            $id=$_POST['codusuario'];
             $usuarios=new Usuarios();
            $nusuarios=$usuarios->modificar($usuario,$clave,$perfil,$id,$estado); 
                                  
        }else{
            $usuarios=new Usuarios();
            $nusuarios=$usuarios->insertar($usuario,$clave,$fecha,$estado,$servidor,$perfil);  
        }  
           
      header("location: index.php?page=usuariospersonal&accion=form");
}



function _eliminarUsuAction(){
     $id=$_POST["id"];
     $usuarios=new Usuarios();
     $eusuarios=$usuarios->eliminar($id); 
     header("location: index.php?page=usuariospersonal&accion=form");
}



function _getUsuarioAction(){
   //con esta funcion obtengo un listar
     $id = $_POST['id'];
     $usuario=new Usuarios();
     $gusuario=$usuario->getUsuario($id); 
    $response = array();
    $response["usuario"] =$gusuario->usuario;
    $response["clave"] =$gusuario->clave;
    $response["estado"] =$gusuario->estado;
    $response["idusuario"] =$gusuario->idusuario;
    $response["idservidor"] =$gusuario->idservidor;
    $response["idperfil"] =$gusuario->idperfil;
    $response["nombre"] =$gusuario->nombres;
    $response["appaterno"] =$gusuario->appaterno;
    $response["apmaterno"] =$gusuario->apmaterno;
    $response["dni"] =$gusuario->dni;
    header('Content-Type: application/json');
    echo json_encode($response);

}
