<?php   
require_once "../Conexion.php";
$gestion=$_POST['Cmb_Gestion'];
$area=$_POST['area'];
$director=$_POST['director'];
$observaciones=$_POST['observaciones'];
$correo=$_POST['corr'];
//echo $result=mysqli_query($conn,"call User_In ('".$Id."','".$Nam."','".$Ema."','".$Gest."','".$Cargo."','".$User."','".$Pass."','".$Tipo."','".$Estado."')");
if ($observaciones=="") {
    $vacio="No hay observaciones";
    $sql ="CALL area_In('".$gestion."','".$area."','".$director."','". $vacio."','". $correo."')";
    mysqli_set_charset($conn,"utf8");
    echo mysqli_query($conn,$sql); 
  }else{
    $sql ="CALL area_In('".$gestion."','".$area."','".$director."','".$observaciones."','". $correo."')";
    mysqli_set_charset($conn,"utf8");
    echo mysqli_query($conn,$sql); 
  }

 
?>