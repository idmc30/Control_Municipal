<?php
require_once 'conexion.php';

class Estructura{

            private $objPdo;

			function __construct(){
					$this->objPdo = new Conexion();
				}


 
	 public function insertar($documento,$fecha,$activo,$confirmacion){
			$sql="INSERT INTO periodo (documento, fecha, activo, confirmar) 
			                 VALUES (:doc, :fech, :activo, :confir)";
				$stmt = $this->objPdo->prepare($sql);
				$stmt->execute(array('doc' => $documento, 
					           		 'fech'=>$fecha,
					           		 'activo'=>$activo,
					            	 'confir'=>$confirmacion 
					           ));
		} 


    public function insertarPadre($idpadre,$nom,$sigla,$descrip,$nivel){
      $sql="INSERT INTO gerencias(idgerenciaPadre, nombre, sigla, descripcion,nivel,idperiodo) 
            VALUES ( :idpadre, :nom,:sigla,:descrip, :nivel, (SELECT idperiodo FROM periodo WHERE activo=1 and confirmar=1));";
        $stmt = $this->objPdo->prepare($sql);
        $stmt->execute(array('idpadre' =>$idpadre, 
                              'nom' =>$nom, 
                              'sigla'=>$sigla,
                              'descrip'=>$descrip,
                              'nivel'=>$nivel
                     ));
    } 
//esto es para insertar altagerencia y gerencia ----------
     public function insertargerencias($nom,$sigla,$descrip,$nivel){		             
              $sql="INSERT INTO gerencias(idgerenciaPadre,nombre,sigla,descripcion, nivel,idperiodo) 
                   VALUES ( NULL, :nom,:sigla,:descrip,:nivel ,(SELECT idperiodo FROM periodo WHERE activo=1 and confirmar=1))";
		     	$stmt = $this->objPdo->prepare($sql);
				$stmt->execute(array('nom' =>$nom, 
					           		 'sigla'=>$sigla,
					           		 'descrip'=>$descrip,
					            	 'nivel'=>$nivel
					           )); 
		} 

  // public function listar() {       
  //      	$stmt = $this->objPdo->prepare('SELECT   idgerencia,idgerenciaPadre,nombre,nivel,sigla,
  //        (CASE  nivel WHEN 1 THEN "Alta direccion" WHEN 2 THEN "Gerencia" WHEN 3 THEN "Unidad" WHEN 4 THEN "AreaFuncional" ELSE "Division" END) AS nomnivel,
  //        (CASE  WHEN isnull(idgerencia) AND nivel=1 THEN 0  WHEN nivel=3 THEN idgerenciaPadre WHEN nivel=4 then idgerenciaPadre WHEN nivel=5 THEN  idgerenciaPadre ELSE idgerenciaPadre END) AS orden
  //           FROM gerencias 
  //           WHERE idperiodo =(SELECT idperiodo FROM periodo WHERE activo=1 and confirmar=1) ');
  //      		 $stmt->execute();
  //       	 $gerencias = $stmt->fetchAll(PDO::FETCH_OBJ);
  //      		 return $gerencias;
  //   }


  public function listar() {       
        $stmt = $this->objPdo->prepare('SELECT  @row_number:=@row_number+1 AS row_number, g.idgerencia as idgerencia, g.idgerenciaPadre, g.nombre, g.sigla, g.descripcion, g.nivel, g.idperiodo, p.documento, p.fecha, p.activo, p.confirmar
                                  from gerencias g inner join periodo p on g.idperiodo=p.idperiodo,
                                (SELECT @row_number:=0) AS t
                                where g.idgerenciaPadre is null AND g.nombre NOT IN (SELECT nombre FROM gerencias
 WHERE nombre="Aministrador") and p.idperiodo = (SELECT idperiodo FROM periodo WHERE activo=1 and confirmar=1)  order by g.nivel');
           $stmt->execute();
           $gerencias = $stmt->fetchAll(PDO::FETCH_OBJ);
           return $gerencias;
    }

  public function listarsub($idgerencia) {       
        $stmt = $this->objPdo->prepare('SELECT  @row_number:=@row_number+1 AS row_number, g.idgerencia as idgerencia, g.idgerenciaPadre, g.nombre, g.sigla, g.descripcion, g.nivel, g.idperiodo, p.documento, p.fecha, p.activo, p.confirmar from gerencias g inner join periodo p on g.idperiodo=p.idperiodo,
(SELECT @row_number:=0) AS t
where g.idgerenciaPadre = :idgerencia and g.nombre NOT IN (SELECT nombre FROM gerencias
 WHERE nombre="Aministrador")  and p.idperiodo = (SELECT idperiodo FROM periodo WHERE activo=1 and confirmar=1)  order by g.nivel');

           $stmt->execute(array('idgerencia' => $idgerencia ));
           $subgerencias = $stmt->fetchAll(PDO::FETCH_OBJ);
           return $subgerencias;
    }

  public function obtenerultimonivel() {       
        $stmt = $this->objPdo->prepare('SELECT * FROM nivel order by idnivel desc limit 1');
           $stmt->execute();
           $nronivel = $stmt->fetchAll(PDO::FETCH_OBJ);
           return $nronivel[0];
    }


 public function getestucturaxId($id) {
        $stmt = $this->objPdo->prepare('SELECT  idgerencia,nombre,nivel,idgerenciaPadre,sigla,descripcion,
            (CASE  nivel WHEN 1 THEN "Alta direccion" WHEN 2 THEN "Gerencia" WHEN 3 THEN "Unidad" WHEN 4 THEN "AreaFuncional" ELSE "Division" END) AS nomnivel,
                        (CASE  WHEN isnull(idgerenciaPadre) AND nivel=1 THEN idgerencia WHEN nivel=2 THEN idgerencia WHEN nivel=3 THEN idgerenciaPadre WHEN nivel=4 then idgerenciaPadre WHEN nivel=5 THEN  idgerenciaPadre ELSE idgerenciaPadre END) AS orden
            FROM gerencias 
            WHERE idperiodo =(SELECT idperiodo FROM periodo WHERE activo=1 and confirmar=1)  and idgerencia=:id');
        $stmt->execute(array('id' => $id));
        $estructura = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $estructura[0];
    }


public function modificar($nom,$iniciales,$descripcion,$idgerencia){
    $sql='UPDATE gerencias SET nombre =:nom, sigla =:inicia, descripcion =:descrip WHERE idgerencia =:codgerencia';
    $stmt=$this->objPdo->prepare($sql);
    $stmt->execute(array('nom'=> $nom, 
                         'inicia'=>$iniciales, 
                         'descrip'=>$descripcion,
                         'codgerencia'=>$idgerencia


      ));
  } 



 public function confirmarestructura(){
    // UPDATE `avance`.`periodo` SET `confirmar` = '1' WHERE `periodo`.`idperiodo` = 3;

   /* $stmt = $this->objPdo->prepare('UPDATE periodo SET confirmar = '1' WHERE idperiodo=');
       		 $stmt->execute();
        	 $servidor = $stmt->fetchAll(PDO::FETCH_OBJ);
       		 return $servidor;*/
}

        public function contar() {       
    	$stmt = $this->objPdo->prepare('SELECT idperiodo  FROM periodo WHERE activo=1 and confirmar=1');
       		 $stmt->execute();
        	 $periodos = $stmt->fetchAll(PDO::FETCH_OBJ);
       		 return $periodos;

           }


    public function listarPeriodoVigente() {
       	$stmt = $this->objPdo->prepare('SELECT * FROM periodo  where activo=1 and confirmar=1');
       		 $stmt->execute();
        	 $servidor = $stmt->fetchAll(PDO::FETCH_OBJ);
       		 return $servidor;
    }

     public function eliminar($cod) {
        $stmt = $this->objPdo->prepare('DELETE FROM gerencias WHERE idgerencia= :id');
        $rows = $stmt->execute(array('id' => $cod));
        return $rows;
    }
    

     public function obtenerGereciasxId($id) {
        $stmt = $this->objPdo->prepare('SELECT*FROM PLANES p INNER JOIN gerencias g on  p.idgerencia=g.idgerencia where p.idgerencia =:id and  p.codigo=YEAR(Now())');
        $stmt->execute(array('id' => $id));
        $lgerencias = $stmt->fetchAll(PDO::FETCH_OBJ);
       return$lgerencias[0];
    }
 

  }




?>