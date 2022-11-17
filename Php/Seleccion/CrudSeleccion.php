<?php
include_once "../Conexiondb.php";
// class CrudpreSeleccion extends conexion
// {
//     public $Id;
 //   public $Solicitud;
//     public $Estado;

//     public function Create(){
//         $this->conectar();
//         $pre = mysqli_prepare($this->con, "insert INTO seleccion (Id_Proceso,Cod_Sol,Estado) VALUES (?,?,?)
//         ON DUPLICATE KEY UPDATE Cod_Sol =? , Estado = ?;");
//         $pre->bind_param("iisis", $this->Id, $this->Solicitud, $this->Estado, $this->Solicitud, $this->Estado);
//         $pre->execute();
//         //echo json_encode("hola desde crud jejejeje");
//     }
// }

class CrudpreSeleccion extends Conexion{

  private $intId;
  private $intSolicitud;
  private $strEstado;
  private $strDate;
  public function __construct(){
  $this->conexion = new Conexion();
  $this->conexion= $this->conexion->connect();
  }

  public function InsertSeleccion(int $Id , int $Solicitud , string $Estado ){
    $this->intId = $Id;
    $this->intSolicitud= $Solicitud; 
    $this->strEstado = $Estado;
    // $sql = "insert INTO seleccion (Id_Proceso,Cod_Sol,Estado) VALUES (?,?,?)ON DUPLICATE KEY UPDATE Cod_Sol =? , Estado = ?";
    $sql =  "CALL Sp_InsertSeleccion(?,?,?)";
    $insert = $this->conexion->prepare($sql);
    //$arrData= array($this->intId,$this->intSolicitud,$this->strEstado,$this->intSolicitud,$this->strEstado); // sql
    $arrData= array($this->intId,$this->intSolicitud,$this->strEstado);
    $resInsert= $insert->execute($arrData);
    //$idInsert= $this->conexion->lastInsertId();
    //return $idInsert;
  }


  
}