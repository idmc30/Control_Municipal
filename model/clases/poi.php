<?php

require_once 'conexion.php';

class Poi{

           private $objPdo;
			function __construct(){
					$this->objPdo = new Conexion();
				}
           
       

  public function getidgerencias($id) {
          $stmt = $this->objPdo->prepare('SELECT idgerencia FROM gerencias WHERE idperiodo=:id');
          $stmt->execute(array('id' => $id));
          $lcargos = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $lcargos;
    }
     
 public function insertar($id,$cod,$finicio,$ffinal,$documen){
			$sql="INSERT INTO planes(codigo,inicio,fin,documento,tipo, idgerencia, activo,elaborando, confirmado) 
			                 VALUES ( :codigo,:fechainicio,:fechafinal,:documento, 'O', :id, '1', '0', '0');";
				$stmt = $this->objPdo->prepare($sql);
				$stmt->execute(array('id' => $id,
                                      'codigo'=>$cod,
					                 'fechainicio' =>$finicio,
					                 'fechafinal' =>$ffinal,
					                 'documento' => $documen
					));
		} 
		
public function listarpoi() {
          $stmt = $this->objPdo->prepare("SELECT  idplan, documento, codigo,
								DATE_FORMAT(inicio, '%d/%m/%y') as finicio, 
								DATE_FORMAT(fin, '%d/%m/%y') as ffin,
								COUNT(idplan) AS cantidad ,
								SUM(activo) AS CantActivo ,
								SUM(confirmado) AS CantConfirmado,
								idperiodo, inicio
						FROM planes p INNER JOIN gerencias g ON p.idgerencia=g.idgerencia
						WHERE tipo='O' GROUP BY codigo, inicio, fin, documento ORDER BY codigo DESC");
          $stmt->execute();
          $lplanes = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $lplanes;
    }


  public function listarunidadespoe($anio) {
          $stmt = $this->objPdo->prepare("SELECT*FROM PLANES p INNER JOIN GERENCIAS g ON p.idgerencia=g.idgerencia  where codigo=:anio");
          $stmt->execute(array('anio' =>$anio));
          $lunipoe=$stmt->fetchAll(PDO::FETCH_OBJ);
        return $lunipoe;
    }
   
    public function listarunidadespoidos() {
          $stmt = $this->objPdo->prepare("SELECT*FROM PLANES p INNER JOIN GERENCIAS g ON p.idgerencia=g.idgerencia where codigo=YEAR(Now())");
          $stmt->execute();
          $lunipoe=$stmt->fetchAll(PDO::FETCH_OBJ);
        return $lunipoe;
    }
//YEAR(Now())

    public function modificar($id){

		$sql="UPDATE planes SET activo = '0' WHERE idplan = :id;";
		$stmt=$this->objPdo->prepare($sql);
		$stmt->execute(array('id'=> $id));
	}
	
	public function modificaractivo($id){

		$sql="UPDATE planes SET activo= '1' WHERE idplan = :id;";
		$stmt=$this->objPdo->prepare($sql);
		$stmt->execute(array('id'=> $id));
	} 

// funcion dinamica 
	public function updateplan($et, $estado, $idplan){
         //UPDATE  planes SET  `et1` =  '1' WHERE  `planes`.`idplan` =31;
		$sql="UPDATE  planes SET  $et = :estado WHERE  idplan = :idplan;";
		$stmt=$this->objPdo->prepare($sql);
		$stmt->execute(array('estado'=> $estado,
    		                 'idplan'=> $idplan
    		                 ));
	}
 

}
