<?php
require_once 'conexion.php';



class Medida{

           private $objPdo;
			function __construct(){
					$this->objPdo = new Conexion();
				}


	 public function insertar($denominacion,$simbolo){
			$sql="INSERT INTO medidas( denominacion, simbolo) VALUES (:deno, :simbolo);";
				$stmt = $this->objPdo->prepare($sql);
				$stmt->execute(array('deno' => $denominacion,
					                 'simbolo' =>$simbolo

					));
		} 

      public function eliminar($cod) {
        $stmt = $this->objPdo->prepare('DELETE FROM medidas WHERE  	idmedida= :id');
        $rows = $stmt->execute(array('id' => $cod));
        return $rows;
    }


         public function listar() {
        	 //$stmt = $this->objPdo->prepare('SELECT idservidor,nombres, appaterno, apmaterno, dni, sexo, telefono,direccion, email, celular FROM servidores');
       	$stmt = $this->objPdo->prepare('SELECT *FROM medidas');
       		 $stmt->execute();
        	 $servidor = $stmt->fetchAll(PDO::FETCH_OBJ);
       		 return $servidor;
    }

    public function modificar($denomicacion,$simbolo,$id){

    $sql="UPDATE medidas SET denominacion =:deno,simbolo =:simbolo WHERE idmedida =:id";
    $stmt=$this->objPdo->prepare($sql);
    $stmt->execute(array('deno'=> $denomicacion, 
                         'simbolo'=>$simbolo, 
                         'id'=>$id

      ));
  } 


 public function getmedidaxId($id) {
        $stmt = $this->objPdo->prepare('SELECT *FROM medidas where idmedida =:id');
        $stmt->execute(array('id' => $id));
        $medida = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $medida[0];
    }

}
