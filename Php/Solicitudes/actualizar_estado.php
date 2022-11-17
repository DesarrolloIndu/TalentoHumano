<?php   
require_once "../Conexion.php";
$kawak = $_POST['registro2'];
$estado= "1";
$fechaActual = date('Y-m-d');
//echo $result=mysqli_query($conn,"call User_In ('".$Id."','".$Nam."','".$Ema."','".$Gest."','".$Cargo."','".$User."','".$Pass."','".$Tipo."','".$Estado."')");
 // $sql="UPDATE solicitudes SET Estado='$estado2' WHERE Reg_Kawak='$kawak'";
  $sql ="CALL Cerrar_Solicitud ('".$kawak."','".$estado."','".$fechaActual ."')";
  mysqli_set_charset($conn,"utf8");
  echo mysqli_query($conn,$sql);  
?> 