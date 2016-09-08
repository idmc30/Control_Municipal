<?php
require_once 'conexion.php';

class Usuarios 
{
	private $objPdo;
	function __construct(){
		$this->objPdo = new Conexion();
	}

	public function validar($usu, $pass){
		$sql = "SELECT * FROM usuario u 
            INNER JOIN servidores s on u.idservidor=s.idservidor
                INNER JOIN perfil p on u.idperfil=p.idperfil
                INNER JOIN cargos c on c.idcargo=s.idcargo
                INNER JOIN gerencias g on c.idgerencia=g.idgerencia
                WHERE usuario = :usu and clave =:pass and estado='A'";
		$stmt = $this->objPdo->prepare($sql);
		$stmt->execute(array('usu' => $usu, 'pass'=> $pass));
		$usuarios = $stmt->fetchAll(PDO::FETCH_OBJ);
		return $usuarios;

	}


   public function listar(){
		$sql = "SELECT * FROM usuario u 
		        INNER JOIN servidores s on u.idservidor=s.idservidor
                INNER JOIN perfil p on u.idperfil=p.idperfil
                INNER JOIN cargos c on c.idcargo=s.idcargo
                INNER JOIN gerencias g on c.idgerencia=g.idgerencia";
		$stmt = $this->objPdo->prepare($sql);
		$stmt->execute();
		$usuarios = $stmt->fetchAll(PDO::FETCH_OBJ);
		return $usuarios;
	}




    public function listarPerfil(){
		$sql = "SELECT * FROM perfil";
		$stmt = $this->objPdo->prepare($sql);
		$stmt->execute();
		$usuarios = $stmt->fetchAll(PDO::FETCH_OBJ);
		return $usuarios;
	}


    public function insertar($usuario,$clave,$fecha,$estado,$idservidor,$idperfil){
			$sql=" INSERT INTO usuario( usuario, clave,fecha,estado,idservidor,idperfil) 
			VALUES (:usu, :pass,:fech, :estado,:idservid,:idperfil)";
				$stmt = $this->objPdo->prepare($sql);
				$stmt->execute(array('usu' => $usuario,
					                 'pass' =>$clave,
					                 'fech' =>$fecha,
                           'estado' =>$estado,
					                 'idservid' =>$idservidor,					                 
					                 'idperfil' =>$idperfil
					));
		} 



    public function getUsuario($id) {
        $stmt = $this->objPdo->prepare('SELECT * FROM usuario u INNER JOIN servidores s on u.idservidor=s.idservidor where idusuario= :id');
        $stmt->execute(array('id' => $id));
        $empleados = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $empleados[0];
    }


   public function modificar($usu,$pass,$pefil,$idusuario,$estado){    
    $sql="UPDATE usuario SET usuario =:usua, clave = :clave,idperfil =:pefil,estado=:estado  WHERE idusuario =:idusuario";
    $stmt=$this->objPdo->prepare($sql);
    $stmt->execute(array('usua'=> $usu, 
                         'clave'=>$pass, 
                         'pefil'=>$pefil, 
                         'estado'=>$estado, 
                         'idusuario'=>$idusuario
      ));
  } 



   public function eliminar($cod) {
        $stmt = $this->objPdo->prepare('DELETE FROM usuario WHERE idusuario = :id');
        $rows = $stmt->execute(array('id' => $cod));
        return $rows;
    }

    public function autocompletarUsuario($nparametro) {
        $stmt = $this->objPdo->prepare('SELECT usuario as label, idusuario as value FROM usuario where  usuario like :nparametro');
        $stmt->execute(array('nparametro' => $nparametro));
        $lusuario = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $lusuario;
    }    
  

     public function listarmenu() {
        $stmt = $this->objPdo->prepare('SELECT * FROM menu');
        $stmt->execute();
        $lusuario = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $lusuario;
    }    

      public function getMenuxusuxidmenu($cod, $idmenu){
        $stmt=$this->objPdo->prepare('SELECT * FROM menuusuario mu 
inner join usuario u on mu.idusuario=u.idusuario 
inner join menu m on mu.idmenu=m.idmenu where mu.idusuario= :cod and  m.idmenu =:idmenu ');
        $stmt->execute(array('cod' =>$cod, 'idmenu' =>$idmenu));
        $menudet = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $menudet[0]->idmenu;
    }  


 public function iusumenu($idmenu, $codusuario){
        $stmt = $this->objPdo->prepare('INSERT INTO menuusuario (idmenu,idusuario)  
            VALUES( :idmenu, :codusuario);');
        $rows = $stmt->execute(array('idmenu' => $idmenu,
                                    'codusuario' => $codusuario,));
    }


    public function eusumenu($idmenu, $codusuario){
        $stmt = $this->objPdo->prepare('DELETE FROM  menuusuario WHERE idmenu = :idmenu and  idusuario = :codusuario;');
        $rows = $stmt->execute(array('idmenu' => $idmenu,
                                    'codusuario' => $codusuario));
    }


//e--------
public function getmenuxusuario($resp){
        $stmt=$this->objPdo->prepare('SELECT * FROM menuusuario mu 
                                       INNER JOIN usuario u on mu.idusuario=u.idusuario 
                                      INNER JOIN menu m on mu.idmenu=m.idmenu
                                where mu.idusuario= :resp');
        $stmt->execute(array('resp' =>$resp));
        $menunav = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $menunav; 
  }

}