<?php   
require_once "../Conexion.php";
$cargo=$_POST['cargo'];
$gestion=$_POST['Cmb_Gestion'];
$area=$_POST['lista2'];
$observaciones=$_POST['observaciones'];
$escolaridad=$_POST['escolaridad'];
$formacion=$_POST['formacion'];
$experiencia=$_POST['experiencia'];
$h=$_POST['horario'];
$d=$_POST['d'];
$s=$_POST['s'];
//echo $result=mysqli_query($conn,"call User_In ('".$Id."','".$Nam."','".$Ema."','".$Gest."','".$Cargo."','".$User."','".$Pass."','".$Tipo."','".$Estado."')");
if ($observaciones=="") {
  $vacio="El cargo no tiene observaciones";
  $sql ="CALL incargos ('".$cargo."','".$gestion."','".$area."','".$vacio."','".$escolaridad."','".$formacion."','".$experiencia."','".$h."','".$d."','".$s."')";
  echo mysqli_query($conn,$sql);
}else{
  $sql ="CALL incargos ('".$cargo."','".$gestion."','".$area."','".$observaciones."','".$escolaridad."','".$formacion."','".$experiencia."','".$h."','".$d."','".$s."')";
  mysqli_set_charset($conn,"utf8");
  echo mysqli_query($conn,$sql);
}
?> 