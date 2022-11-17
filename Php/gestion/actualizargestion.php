<?php   
require_once "../Conexion.php";
$id=$_POST['id'] ;
$descripcion1=$_POST['descripcion1'];
$responsable1=$_POST['director1'];
$observaciones1=$_POST['observaciones1'];
//echo $result=mysqli_query($conn,"call User_In ('".$Id."','".$Nam."','".$Ema."','".$Gest."','".$Cargo."','".$User."','".$Pass."','".$Tipo."','".$Estado."')");

  $sql="UPDATE gestion SET Descripcion='$descripcion1',Director='$responsable1',Observaciones='$observaciones1' WHERE Id_Gestion='$id'";
  mysqli_set_charset($conn,"utf8");
  echo mysqli_query($conn,$sql); 
?>