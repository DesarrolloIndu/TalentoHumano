<?php   
require_once "../Conexion.php";
$id1=$_POST['id1'] ;
$descripcion1=$_POST['cargo1'];
$gestion1=$_POST['gestion1'];
$responsable1=$_POST['area1'];
$observaciones1=$_POST['observaciones1'];
$escolaridad1=$_POST['escolaridad1'];
$formacion1=$_POST['formacion1'];
$experiencia1=$_POST['experiencia1'];
$h1=$_POST['horario1'];
$d1=$_POST['d1'];
$s1=$_POST['s1'];
//echo $result=mysqli_query($conn,"call User_In ('".$Id."','".$Nam."','".$Ema."','".$Gest."','".$Cargo."','".$User."','".$Pass."','".$Tipo."','".$Estado."')");

  $sql="UPDATE cargos SET Descripcion='$descripcion1',Observaciones='$observaciones1',Escolaridad='$escolaridad1',Formacion='$formacion1',Experiencia='$experiencia1',Horario='$h1',Disponibilidad='$d1',sal='$s1' WHERE Id_Cargo='$id1'";
  mysqli_set_charset($conn,"utf8");
  echo mysqli_query($conn,$sql); 
?>