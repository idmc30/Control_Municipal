<?php
require_once 'controller/class.inputfilter.php';
$carpetaControladores = "controller/";

$controladorPredefinido = "panel";
$accionPredefinida = "panel";
$filter = new InputFilter();
if(! empty($_GET['page']))
      $controlador = $filter->process($_GET['page']);
else
      $controlador = $controladorPredefinido;
if(! empty($_GET['accion']))
      $accion = $filter->process($_GET['accion']) .'Action';
else
      $accion = $accionPredefinida; 

$controlador = preg_replace('/[^a-zA-Z0-9]/', '', $controlador);
$accion = '_' . preg_replace('/[^a-zA-Z0-9]/', '', $accion);
$controlador = $carpetaControladores . $controlador . '-controlador.php';
if(is_file($controlador))
      require_once $controlador;
else
      die('La pagina no existe - 404 not found');

if(is_callable($accion))
      $accion();
else
      die('La accion no existe - 404 not found');
?>