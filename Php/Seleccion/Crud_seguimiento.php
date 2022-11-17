<?php
include_once "../Conexiondb.php";


class Crud_Seguimiento extends Conexion{ 

    private $intId;
    private $intSolicitud;
    private $strEstado;
    private $strDate;

    public function __construct(){
    $this->conexion = new Conexion();
    $this->conexion= $this->conexion->connect();
    }

    public function Update_Estado(int $Id , int $Solicitud , string $Estado ){
    $this->intId = $Id;
    $this->intSolicitud= $Solicitud; 
    $this->strEstado = $Estado;
  
    }


}





?>   