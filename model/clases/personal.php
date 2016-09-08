<?php

require_once 'conexion.php';

class Personal{

           private $objPdo;
			function __construct(){
					$this->objPdo = new Conexion();
				}

     public function insertar($nom, $apepa,$apema,$dni,$sexo,$telef,$dir,$correo,$celu,$foto){
	
         $sql="INSERT INTO servidores (nombres, appaterno,apmaterno, dni,sexo,telefono,direccion,email, celular, foto,clasificacion, situacion,observacion,idcargo) 
         VALUES ( :nom, :apepa, :apema,:dni,:sexo, :telef,:direc, :email, :celu, :imagen, NULL, NULL, NULL, NULL);";
		$stmt = $this->objPdo->prepare($sql);
		$stmt->execute(array('nom' => $nom, 
			           		 'apepa'=>$apepa,
			           		 'apema'=>$apema,
			            	 'dni'=> $dni,
			            	 'sexo'=> $sexo,
			            	 'telef'=> $telef,
			            	 'direc'=> $dir,
			            	 'email'=> $correo,
			            	 'celu'=> $celu,
			            	 'imagen'=> $foto
			           ));
		} 


	public function modificar($id,$nom,$apepa,$apema,$dni,$sexo,$telef,$dir,$correo,$celu,$foto){
		$sql="UPDATE servidores SET nombres= :nom,appaterno= :apepa,apmaterno= :apema,dni= :dni,sexo= :sex,telefono= :telef,direccion= :dir,email= :email,celular= :celu,foto= :img
		 WHERE idservidor= :id";
		$stmt=$this->objPdo->prepare($sql);
		$stmt->execute(array('nom'=> $nom, 
			                 'apepa'=>$apepa, 
			                 'apema'=>$apema,
			                 'dni'=>$dni,
			                 'sex'=>$sexo,
			                 'telef'=>$telef,
			                 'dir'=>$dir,
			                 'email'=>$correo,
			                 'celu'=>$celu,
			                 'img'=>$foto,
			                 'id'=>$id

			));
	} 

       public function listar() {
        	 //$stmt = $this->objPdo->prepare('SELECT idservidor,nombres, appaterno, apmaterno, dni, sexo, telefono,direccion, email, celular FROM servidores');
       	$stmt = $this->objPdo->prepare('SELECT * FROM servidores order by  idservidor  ASC');
       		 $stmt->execute();
        	 $servidor = $stmt->fetchAll(PDO::FETCH_OBJ);
       		 return $servidor;
    }


    public function gettrabajadorxId($id) {
        $stmt = $this->objPdo->prepare('SELECT * FROM servidores where idservidor = :id');
        $stmt->execute(array('id' => $id));
        $empleados = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $empleados[0];
    }

//verificar las funciones
    public function taertrabajadorxDni($dni) {
        $stmt = $this->objPdo->prepare("SELECT * FROM servidores where dni LIKE '%:dni%'");
        $stmt->execute(array('dni' => $dni));
        $empleados = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $empleados;
    }

      public function selectnormal() {
        $stmt = $this->objPdo->prepare("SELECT * FROM servidores");
        $stmt->execute();
        $empleados = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $empleados;
    }

    

     public function eliminar($cod) {
        $stmt = $this->objPdo->prepare('DELETE FROM servidores WHERE idservidor = :id');
        $rows = $stmt->execute(array('id' => $cod));
        return $rows;
    }


}

?>