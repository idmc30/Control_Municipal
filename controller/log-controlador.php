<?php

session_start();

require_once 'model/clases/usuarios.php';
require_once 'class.inputfilter.php';

function _formAction(){
    
if (!isset($_SESSION['usuario'])) {
	require_once 'login.php';
} else {

	header("location: index.php");
}
}


function _loginAction(){
	$usu = $_POST["userid"];
	$pass = $_POST["password"];
	$usuario = new Usuarios();
	$usuarios = $usuario->validar($usu, $pass);
	if ($usuarios ) {
		foreach ($usuarios as $user) {
			$_SESSION['usuario'] =$user->usuario;
			$_SESSION['nom'] =$user->nombres;
			$_SESSION['apepa'] = $user->appaterno;
			$_SESSION['apema'] = $user->apmaterno;
			$_SESSION['nomperfil'] = $user->nombreperfil;
			$_SESSION['cargo'] = $user->titulo;
            $_SESSION['gerencia'] = $user->nombre;	
            $_SESSION['estado'] = $user->estado;
            $_SESSION['idusuario'] =$user->idusuario;
            $_SESSION['idgerencia'] =$user->idgerencia;
            $_SESSION['foto'] =$user->foto;	
            $_SESSION['sexo'] =$user->sexo;				
		}
		header("location: index.php");	
	}else{
		header("location: index.php?page=log&accion=form");
	}


}


function _cerrarAction(){
	if (isset($_SESSION['usuario'])) {
		unset($_SESSION['usuario']);
		header("location: index.php?page=log&accion=form");
        die;
	}
}








?>