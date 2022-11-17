<?php
class Conexion {
    private $host = "localhost";
    private $user = "Permisos";
    private $password = "WEB_Indu2021*";
    private $db="talentohumano";
    private $conect;
   
    public function __construct() {
      // $connectionString = "mysql:host=".$this->host.";bdname=".$this->db.";charset=utf8";
      $connectionString="mysql:host=".$this->host.";dbname=".$this->db . ";charset=utf8";
       try {
           $this->conect = new PDO($connectionString, $this->user, $this->password);
           $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
           //echo"ok";                      
       } catch (Exception $e) {
           $this->conect = 'Error de conexion';
           echo "ERROR: " . $e->getMessage();
       }
    }

    public function connect()
    {
        return $this->conect;
    }
    
}
?>
