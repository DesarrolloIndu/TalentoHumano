<?php
require_once "../Conexion.php";
$esc = $_POST['esc'];
$obser = $_POST['obser'];


$sql = "INSERT INTO escolaridad (Escolaridad,Observaciones) values ('".$esc."','".$obser."')";
echo mysqli_query($conn, $sql);

//echo $result=mysqli_query($conn,"call User_In ('".$Id."','".$Nam."','".$Ema."','".$Gest."','".$Cargo."','".$User."','".$Pass."','".$Tipo."','".$Estado."')");
