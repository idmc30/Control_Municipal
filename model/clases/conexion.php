<?php

class Conexion extends PDO {
    
    private $type = 'mysql';
    private $host = 'localhost';
    private $db = 'bdpruebaidmc';
    private $user = 'root';
    private $pass = '';

    public function __construct() {
        
        try {
            parent::__construct($this->type . ':host=' . $this->host . ';dbname=' . $this->db, $this->user, $this->pass);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch (PDOException $e) {
            echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
            exit;
        }
    }
}

?>