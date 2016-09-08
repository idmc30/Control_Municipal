<?php
require_once 'conexion.php';



class MiEvaluacion{

           private $objPdo;
			function __construct(){
					$this->objPdo = new Conexion();
				}

     public function listMestasxTrimestre($idplan,$tiempo) {
        $stmt = $this->objPdo->prepare('SELECT md.iddetmeta as iddetmeta,m.idmeta as idmeta,o.descripcion as tipoobjetivo,m.descripcion as meta,cantidad,md.estado as estado,fechinicio,fechfinal FROM meta m
										INNER JOIN meta_det  md on m.idmeta=md.idmeta
										INNER JOIN tiempo t on md.idtiempo=t.idtiempo
										INNER JOIN objetivo o on o.idobjetivo=m.idobjetivo										
										where idplan=:idplan and t.descripcion=:tiempodescip');
           $stmt->execute(array('idplan' => $idplan,
           	                    'tiempodescip'=>$tiempo ));
           $mxtrimestre = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $mxtrimestre;

			}


 	 public function subirSustento($sustento,$fechaenvio,$iddemeta){    
			    $sql="UPDATE meta_det SET sustento = :desarchivo, fechaenvio = :fechanvio,estado='E' WHERE iddetmeta = :iddemetas ";
							    $stmt=$this->objPdo->prepare($sql);
							    $stmt->execute(array('desarchivo'=> $sustento, 
							                         'fechanvio'=>$fechaenvio, 
							                         'iddemetas'=>$iddemeta
							      ));

			 	 }	 


}
?>