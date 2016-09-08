<?php
require_once 'conexion.php';



class Cargos{

           private $objPdo;
			function __construct(){
					$this->objPdo = new Conexion();
				}

  
  public function getcargosxId($id) {
        $stmt = $this->objPdo->prepare('SELECT c.idcargo,c.codigo,c.titulo,c.descripcion,c.idgerencia,g.nombre FROM cargos c 
                inner join gerencias g
                on c.idgerencia=g.idgerencia
            where 	c.idgerencia =:id  ORDER BY codigo');
        $stmt->execute(array('id' => $id));
        $lcargos = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $lcargos;
    }


  public function obtenerCargosxId($id) {
        $stmt = $this->objPdo->prepare('SELECT * FROM cargos c  inner join gerencias g on c.idgerencia=g.idgerencia
            where   c.idcargo =:id ');
        $stmt->execute(array('id' => $id));
        $lcargos = $stmt->fetchAll(PDO::FETCH_OBJ);
       return$lcargos[0];
    }


 public function insertar($id,$cod,$titulo,$descrip){
			$sql="INSERT INTO cargos(idgerencia,codigo,titulo,descripcion) VALUES (:idgerencia,:codig,:titulo,:descrip)";
				$stmt = $this->objPdo->prepare($sql);
				$stmt->execute(array('idgerencia' =>$id, 
					           		 'codig'=>$cod,
					           		 'titulo'=>$titulo,
					            	 'descrip'=>$descrip 
					           ));
		} 



 public function listar($id) {

        $stmt = $this->objPdo->prepare('SELECT c.idcargo,c.codigo,c.titulo,c.descripcion,c.idgerencia,g.nombre FROM cargos c 
inner join gerencias g
on c.idgerencia=g.idgerencia
where 	c.idgerencia =:id  ORDER BY codigo');
        $stmt->execute(array('id' => $id));
        $cargos = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $cargos;
    }




 public function eliminar($cod) {
        $stmt = $this->objPdo->prepare('DELETE FROM cargos WHERE idcargo = :id');
        $rows = $stmt->execute(array('id' => $cod));
        return $rows;
    }

   


public function modificar($id,$codigo,$titulo,$descripcion){

    $sql='UPDATE cargos SET codigo =:cod, titulo =:titulo, descripcion =:descrip WHERE idcargo =:id;';
    $stmt=$this->objPdo->prepare($sql);
    $stmt->execute(array('cod'=> $codigo, 
                         'titulo'=>$titulo, 
                         'descrip'=>$descripcion,
                         'id'=>$id


      ));
  } 


}




?>