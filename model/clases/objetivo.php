<?php

require_once 'conexion.php';

class ObjetivoOperacional{

        private $objPdo;
		function __construct(){
					$this->objPdo = new Conexion();
				}


       public function listar() {  	 
       	$stmt = $this->objPdo->prepare('SELECT * FROM objetivo');
       		 $stmt->execute();
        	 $objoperacional = $stmt->fetchAll(PDO::FETCH_OBJ);
       		 return $objoperacional;
    }





}
           
       