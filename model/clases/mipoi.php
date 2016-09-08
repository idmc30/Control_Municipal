<?php
require_once 'conexion.php';



class MiPoi{

           private $objPdo;
			function __construct(){
					$this->objPdo = new Conexion();
				}

     public function obtenerobjxmeta($idplan) {
        $stmt = $this->objPdo->prepare('SELECT m.idobjetivo, o.descripcion,p.elaborando  as elaborando FROM meta m 
                                       INNER JOIN objetivo o ON m.idobjetivo = o.idobjetivo 
                                        INNER JOIN planes p on m.idplan=p.idplan
                                       WHERE m.idplan =:idplan    GROUP BY m.idobjetivo
                                      ');
           $stmt->execute(array('idplan' => $idplan));
           $objxp = $stmt->fetchAll(PDO::FETCH_OBJ);
           return $objxp;
    }

     public function obtenergerenciaxplan($idplan) {
        $stmt = $this->objPdo->prepare('SELECT * from planes p inner join gerencias g on p.idgerencia = g.idgerencia where p.idplan= :idplan');
           $stmt->execute(array('idplan' => $idplan));
           $gerenxplan = $stmt->fetchAll(PDO::FETCH_OBJ);
           return $gerenxplan[0];
    }


     public function mxobj($idplan, $idobjetivo) {
        $stmt = $this->objPdo->prepare('SELECT @row_number:=@row_number+1 AS row_number,  m.idmeta, descripcion, m.estado, m.idplan, m.idmedida, m.idobjetivo, me.denominacion from meta m inner join medidas me on m.idmedida=me.idmedida , (SELECT @row_number:=0) AS t WHERE idplan = :idplan AND idobjetivo = :idobjetivo');
           $stmt->execute(array('idplan' => $idplan, 
                                'idobjetivo' => $idobjetivo, ));
           $metaxobj = $stmt->fetchAll(PDO::FETCH_OBJ);
           return $metaxobj;
    }

  public function obtenerEstadoPlan($idplan) {
      $stmt = $this->objPdo->prepare('SELECT * FROM planes where idplan = :codplan ');
      $stmt->execute(array('codplan' => $idplan));
      $estadoplan = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $estadoplan[0];

    }
     public function listar($idgerencia) {
       	$stmt = $this->objPdo->prepare('SELECT idmeta,o.descripcion as objetivo ,m.descripcion as meta,me.denominacion as medida,m.estado as estado,p.codigo as plananio, m.idobjetivo FROM meta m
            INNER JOIN planes p on m.idplan=p.idplan
            INNER JOIN medidas me on me.idmedida=m.idmedida
            INNER JOIN objetivo o ON o.idobjetivo=m.idobjetivo
            WHERE p.codigo=YEAR(Now())  and p.idgerencia=:idgerencia order by idmeta');
       		 $stmt->execute(array('idgerencia' => $idgerencia));
        	 $mipoi = $stmt->fetchAll(PDO::FETCH_OBJ);
       		 return $mipoi;
    }
   //esta es para mostrar los tiempos en las metas
    public function listartimpometa($codmeta){
      $stmt = $this->objPdo->prepare('SELECT * FROM meta_det md 
                                     inner join tiempo t on md.idtiempo=t.idtiempo
                                     where md.idmeta=:idmeta');
           $stmt->execute(array('idmeta' => $codmeta));
           $tiempometa = $stmt->fetchAll(PDO::FETCH_OBJ);
           return $tiempometa;

    }

    public function nfilas($idobjetivo){
      $stmt = $this->objPdo->prepare('SELECT COUNT(*) AS nfilas FROM meta WHERE idobjetivo = :idobjetivo');
           $stmt->execute(array('idobjetivo' => $idobjetivo));
           $nflias = $stmt->fetchAll(PDO::FETCH_OBJ);
           return $nflias[0];

    }




    //voy a actualizar el estado de los planes
 
    public function confirmaPOI($idplan){

    $sql=" UPDATE planes SET elaborando = '2' WHERE idplan  = :id;";
    $stmt=$this->objPdo->prepare($sql);
    $stmt->execute(array('id'=> $idplan));
  }



  


    public function listardos($idgerencia) {
        $stmt = $this->objPdo->prepare('SELECT*FROM PLANES p INNER JOIN GERENCIAS g on p.idgerencia =g.idgerencia WHERE p.codigo=YEAR(Now())  and p.idgerencia=:idgerencia');
           $stmt->execute(array('idgerencia' => $idgerencia));
           $mipoi = $stmt->fetchAll(PDO::FETCH_OBJ);
           return $mipoi ;
    }

  public function taertrabajadorxDni($dni) {
        $stmt = $this->objPdo->prepare("SELECT * FROM servidores where dni LIKE '%:dni%'");
        $stmt->execute(array('dni' => $dni));
        $empleados = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $empleados;
    }




public function obteneridmeta($estado, $idplan, $medida, $idobjetivo, $descipmeta) {
      $stmt = $this->objPdo->prepare("SELECT * FROM meta m where m.estado = :estado and m.idplan= :idplan and m.idmedida = :medida and m.idobjetivo = :idobjetivo and m.descripcion=:descipmeta;");
      $stmt->execute(array('estado' => $estado,
                           'idplan' => $idplan,
                           'medida' => $medida,
                           'idobjetivo' => $idobjetivo,
                           'descipmeta' => $descipmeta,
                           ));
      $idplan = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $idplan[0];
  }

   public function insertar($descipcion,$estado,$idplan,$idtiempo,$idmedida,$idtipoobjetivo){
      $sql="INSERT INTO meta (descripcion,estado,idplan,idtiempo, idmedida,idobjetivo)
            VALUES (:descripcion,:estado, :codplan,:codtiempo, :codmedida,:codobjetivo);";
        $stmt = $this->objPdo->prepare($sql);
        $stmt->execute(array('descripcion' => $descipcion,
                             'estado'=>$estado,
                             'codplan' =>$idplan,
                             'codtiempo' =>$idtiempo,
                             'codmedida' =>$idmedida,
                             'codobjetivo' => $idtipoobjetivo

          ));
    } 
//idperiodo, descipmeta, medida,

   public function insertarmeta($descipmeta, $estado, $idplan, $medida, $idobjetivo){
      $sql="INSERT INTO meta (idmeta, descripcion, estado, idplan, idmedida, idobjetivo)
            VALUES (null, :descipmeta, :estado, :idplan, :medida, :idobjetivo);";
        $stmt = $this->objPdo->prepare($sql);
        $stmt->execute(array('descipmeta' => $descipmeta,
                             'estado'=>$estado,
                             'idplan' =>$idplan,
                             'medida' => $medida,
                             'idobjetivo' => $idobjetivo

          ));
    } 

   public function insertarmeta_det($idmeta, $idtiempo, $cantidad){
      $sql="INSERT INTO meta_det (iddetmeta, idmeta, idtiempo, cantidad)
            VALUES (null, :idmeta, :idtiempo, :cantidad);";
        $stmt = $this->objPdo->prepare($sql);
        $stmt->execute(array('idmeta' => $idmeta,
                             'idtiempo'=> $idtiempo,
                             'cantidad' => $cantidad));
    }     

  public function modificar($descipcion,$idplan,$idtiempo,$idmedida,$idtipoobjetivo,$idmeta){
    $sql="UPDATE meta SET descripcion = :descripcion, idplan =:idplane, idtiempo = :idtiempo, idmedida = :idmedida, idobjetivo = :idobjetivo 
    WHERE idmeta = :idmeta";
    $stmt=$this->objPdo->prepare($sql);
    $stmt->execute(array('deno'=> $denomicacion, 
                         'simbolo'=>$simbolo, 
                         'id'=>$id

      ));
  } 

  public function listapoipdf($codigogerencia){
      $sql="SELECT idmeta,o.descripcion as objetivo ,m.descripcion as meta,me.denominacion as medida,m.estado as estado,p.codigo as plananio,g.nombre FROM meta m
            INNER JOIN planes p on m.idplan=p.idplan
            INNER JOIN gerencias g on p.idgerencia=g.idgerencia
            INNER JOIN medidas me on me.idmedida=m.idmedida
            INNER JOIN objetivo o ON o.idobjetivo=m.idobjetivo
            WHERE p.codigo=YEAR(Now())  and p.idgerencia=:idgerencia";
           $stmt=$this->objPdo->prepare($sql);
           $stmt->execute(array('idgerencia' => $codigogerencia));
           $reporte = $stmt->fetchAll(PDO::FETCH_OBJ);
           return $reporte;
    } 



}