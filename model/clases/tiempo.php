<?php

require_once 'conexion.php';

class Tiempo{

           private $objPdo;
     		function __construct(){
 					$this->objPdo = new Conexion();
				}

   public function listar() {  	 
       	$stmt = $this->objPdo->prepare('SELECT * FROM tiempo');
       		 $stmt->execute();
        	 $tiempo = $stmt->fetchAll(PDO::FETCH_OBJ);
       		 return $tiempo;
    }


    public function guardarTrimestre($descripcion,$finicio,$ffinal){
			$sql="INSERT INTO tiempo (descripcion,fechinicio,fechfinal, estado) 
			       VALUES ( :descrip,:fechincio,:fechfinal, '0'); ";
				$stmt = $this->objPdo->prepare($sql);
				$stmt->execute(array('descrip' => $descripcion,
                            'fechincio'=>$finicio,
					                  'fechfinal' =>$ffinal
					));
		} 

   public function eliminarTrimestre($codtiempo){
      $sql="DELETE FROM tiempo WHERE idtiempo = :idtime";
        $stmt = $this->objPdo->prepare($sql);
        $stmt->execute(array('idtime' => $codtiempo));
    } 


      public function actualizarTrimestre($descripcion,$finicio,$ffinal,$codtiempo){
         $sql="UPDATE tiempo SET descripcion = :descrip, fechinicio =:fechincio, fechfinal = :fechfinal WHERE idtiempo =:idtime";
        $stmt = $this->objPdo->prepare($sql);
        $stmt->execute(array('descrip' => $descripcion,
                             'fechincio'=>$finicio,
                             'fechfinal' =>$ffinal,
                             'idtime' =>$codtiempo,

          ));
    }



     public function gettiempoxId($id) {
        $stmt = $this->objPdo->prepare('SELECT *FROM tiempo where idtiempo =:id');
        $stmt->execute(array('id' => $id));
        $medida = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $medida[0];
    }




}
           
       