<?php   
require_once "../Conexion.php";
$descripcion=$_POST['descripcion'];
$responsable=$_POST['director'];
$observaciones=$_POST['observaciones'];


//echo $result=mysqli_query($conn,"call User_In ('".$Id."','".$Nam."','".$Ema."','".$Gest."','".$Cargo."','".$User."','".$Pass."','".$Tipo."','".$Estado."')");


  $sql ="CALL gest_In ('".$descripcion."','".$responsable."','".$observaciones."')";
  mysqli_set_charset($conn,"utf8");
  echo mysqli_query($conn,$sql); 
?>