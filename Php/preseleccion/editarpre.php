<?php
require_once "../Conexion.php";
$documento1 = $_POST['documento1'];
$tipo1 = $_POST['tipo1'];
$nombre1 = $_POST['nombre1'];
$nacionalidad1 = $_POST['nacionalidad2'];
$ocupacion1 = $_POST['ocupacion1'];
$escolaridad1 = $_POST['escolaridad1'];
$ciudad1= $_POST['ciudad1'];
$direccion1 = $_POST['direccion1'];
$telefono1 = $_POST['tel1'];
$email1 = $_POST['email1'];
$cargo1 = $_POST['cargoo'];

$sql="UPDATE preseleccion SET Tipo_Doc='$tipo1',Nombre='$nombre1',Nacionalidad='$nacionalidad1',Ocupacion='$ocupacion1',Escolaridad='$escolaridad1',Ciudad='$ciudad1',Direccion='$direccion1',Telefono='$telefono1',Email='$email1',Cod_Sol='$cargo1' WHERE Documento='$documento1'";
mysqli_set_charset($conn,"utf8");
echo mysqli_query($conn,$sql); 

//echo $result=mysqli_query($conn,"call User_In ('".$Id."','".$Nam."','".$Ema."','".$Gest."','".$Cargo."','".$User."','".$Pass."','".$Tipo."','".$Estado."')");
