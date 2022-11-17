<?php   
require_once "../Conexion.php";
$kawak = $_POST['registro1'];
$fsolicitud = $_POST['fechasol1'];
$codcargo = $_POST['cargo1'];
$cantidad = $_POST['cantidad1'];
$salario = $_POST['salario1'];
$fechap = $_POST['fechap1'];
$link = $_POST['link1'];
$flimite = $_POST['fechal1'];
$observaciones = $_POST['observaciones1'];
$contratados= $_POST['contrato1'];
//echo $result=mysqli_query($conn,"call User_In ('".$Id."','".$Nam."','".$Ema."','".$Gest."','".$Cargo."','".$User."','".$Pass."','".$Tipo."','".$Estado."')");

  $sql="UPDATE solicitudes SET Fecha_solicitud='$fsolicitud',Cod_Cargo='$codcargo',Cantidad='$cantidad',Salario='$salario',Fecha_publicacion='$fechap',Link='$link',Fecha_limite='$flimite',Observaciones='$observaciones',Contratados='$contratados' WHERE Reg_Kawak='$kawak'";
  mysqli_set_charset($conn,"utf8");
  echo mysqli_query($conn,$sql); 
?> 