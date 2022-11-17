<?php
require_once "../Conexion.php";
$nac = $_POST['nac'];
$obser = $_POST['obser'];


$sql = "INSERT INTO nacionalidad (Nacionalidad,Observaciones) values ('".$nac."','".$obser."')";
echo mysqli_query($conn, $sql);

//echo $result=mysqli_query($conn,"call User_In ('".$Id."','".$Nam."','".$Ema."','".$Gest."','".$Cargo."','".$User."','".$Pass."','".$Tipo."','".$Estado."')");
