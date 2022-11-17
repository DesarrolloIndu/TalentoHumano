<?php   
require_once "../Conexion.php";
require_once "../Criptografia.php";
$identificacion=$_POST['identificacion'];
$nombre=$_POST['nombre'] ;
$email=$_POST['email'];
$gestion=$_POST['gestion'];
$cargo=$_POST['cargo'];
$usuario=$_POST['usuario'];
$password=$_POST['password'];
$_password=Criptograma::encryption($password);
$tipo=$_POST['Tipo_Up'];
$estado=$_POST['Estado_Up'];
//echo $result=mysqli_query($conn,"call User_In ('".$Id."','".$Nam."','".$Ema."','".$Gest."','".$Cargo."','".$User."','".$Pass."','".$Tipo."','".$Estado."')");

  $sql="UPDATE usuarios SET Nombre='$nombre',Email='$email',Gestion='$gestion',Cargo='$cargo',Usuario='$usuario',Contraseña='$_password',Tipo='$tipo',Estado='$estado' WHERE Id='$identificacion'";
  echo mysqli_query($conn,$sql); 
?>