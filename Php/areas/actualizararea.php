<?php   
require_once "../Conexion.php";
$id1=$_POST['id'] ;
$gestion1=$_POST['gestion'];
$area1=$_POST['area1'];
$director1=$_POST['director1'];
$observaciones1=$_POST['observaciones1'];
$corr1=$_POST['corr1'];
//echo $result=mysqli_query($conn,"call User_In ('".$Id."','".$Nam."','".$Ema."','".$Gest."','".$Cargo."','".$User."','".$Pass."','".$Tipo."','".$Estado."')");

  $sql="CALL area_Up('".$id1."','".$area1."','".$director1."','".$observaciones1."','".$corr1."')";
  mysqli_set_charset($conn,"utf8");
  echo mysqli_query($conn,$sql); 
?>