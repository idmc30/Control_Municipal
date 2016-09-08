<?php

require_once 'conexion.php';

class Poe{

           private $objPdo;
			function __construct(){
					$this->objPdo = new Conexion();
				}



 public function insertar($id,$cod,$finicio,$ffinal,$documen){
			$sql="";
				$stmt = $this->objPdo->prepare($sql);
				$stmt->execute(array('id' => $id,
                                      'codigo'=>$cod,
					                 'fechainicio' =>$finicio,
					                 'fechafinal' =>$ffinal,
					                 'documento' => $documen

					));
		} 






?>