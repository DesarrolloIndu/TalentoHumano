<?php
require_once "../Conexion.php";
$documento = $_POST['documento'];
$tipo = $_POST['tipo'];
$nombre = $_POST['nombre'];
$nacionalidad = $_POST['nacionalidad'];
$ocupacion = $_POST['ocupacion'];
$escolaridad = $_POST['escolaridad'];
$ciudad = $_POST['ciudad'];
$direccion = $_POST['direccion'];
$telefono = $_POST['tel'];
$email = $_POST['email'];
$cargo = $_POST['cargo'];
$fecha=date('Y-m-d');
$Estado=2;

$sql = "INSERT INTO preseleccion (Documento,Tipo_Doc,Nombre,Nacionalidad,Ocupacion,Escolaridad,Ciudad,Direccion,Telefono,Email,Cod_Sol,Fecha,Estado) values ('".$documento."','".$tipo."','".$nombre."','".$nacionalidad."','".$ocupacion."','".$escolaridad."','".$ciudad."','".$direccion."','".$telefono."','".$email."','".$cargo."','".$fecha."','".$Estado."')";
echo mysqli_query($conn, $sql);

//echo $result=mysqli_query($conn,"call User_In ('".$Id."','".$Nam."','".$Ema."','".$Gest."','".$Cargo."','".$User."','".$Pass."','".$Tipo."','".$Estado."')");
