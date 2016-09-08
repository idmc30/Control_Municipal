<?php 
require_once 'conexion.php';

class Asignaciones{

           private $objPdo;
			function __construct(){
					$this->objPdo = new Conexion();
				}



  	public function lasignacionesxId($id) {
    	$stmt = $this->objPdo->prepare('SELECT * FROM servidores s INNER JOIN cargos c ON s.idcargo=c.idcargo INNER JOIN gerencias g ON c.idgerencia=g.idgerencia	
        WHERE g.idgerencia=:id');
    	$stmt->execute(array('id' => $id));
    	$lcargos = $stmt->fetchAll(PDO::FETCH_OBJ);
       	return $lcargos;

   	}

  	public function buscarxDNI($dni) {
    	$stmt = $this->objPdo->prepare('SELECT * FROM servidores where dni = :dni ');
    	$stmt->execute(array('dni' => $dni));
    	$lservidores = $stmt->fetchAll(PDO::FETCH_OBJ);
       	return $lservidores[0];

   	}


 public function obtenerxId($idasignacion) {
    	$stmt = $this->objPdo->prepare('SELECT*FROM servidores s 
inner join cargos c on s.idcargo=c.idcargo 
where idservidor  = :id');
    	$stmt->execute(array('id' =>$idasignacion));
    	$lservidores = $stmt->fetchAll(PDO::FETCH_OBJ);
       	return $lservidores[0];

   	}


      public function insertar($idcargo,$idservidor,$clasificacion,$situacion,$observacion){
			$sql="UPDATE servidores SET clasificacion =:clasifi,situacion = :situacion, observacion =:observacio,idcargo =:cargo WHERE idservidor = :codservidor";
				$stmt = $this->objPdo->prepare($sql);
				$stmt->execute(array('cargo' =>$idcargo, 
					           		 'codservidor'=>$idservidor,
					           		 'clasifi'=>$clasificacion,
					            	 'situacion'=>$situacion, 					            	  
                         'observacio'=>$observacion
                         //'estado'=>$estado
					           ));
		} 

   
	public function modificar($idcargo,$idservidor,$clasificacion,$situacion,$observacion){
		$sql="UPDATE servidores SET clasificacion =:clasifi,situacion = :situacion, observacion =:observacio,idcargo =:cargo WHERE idservidor = :codservidor";
        $stmt = $this->objPdo->prepare($sql);
        $stmt->execute(array('cargo' =>$idcargo, 
                         'codservidor'=>$idservidor,
                         'clasifi'=>$clasificacion,
                         'situacion'=>$situacion,                           
                         'observacio'=>$observacion
                     ));
	} 




 public function eliminar($cod) {
        $stmt = $this->objPdo->prepare('UPDATE servidores SET clasificacion = NULL, situacion = NULL, observacion = NULL,idcargo = NULL WHERE idservidor = :id');
        $rows = $stmt->execute(array('id' => $cod));
        return $rows;
    }















}