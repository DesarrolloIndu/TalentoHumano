<?php   
require_once "../Conexion.php";
require_once "../Criptografia.php";
// Id ,Name,Email, Gestion,Cargo, User,Pass,Estado,Tipo )
$Id=$_POST['Id'];
$Nam=$_POST['Name'];
$Ema=$_POST['Email'];
$Gest=$_POST['Gestion'];
$Cargo= $_POST['Cargo'];
$User=$_POST['User'];
$Pass=$_POST['Pass'];
$_PasCrip=Criptograma::encryption($Pass);
$Tipo=$_POST['Tipo']; 
$Estado =$_POST['Estado'];

//echo $result=mysqli_query($conn,"call User_In ('".$Id."','".$Nam."','".$Ema."','".$Gest."','".$Cargo."','".$User."','".$Pass."','".$Tipo."','".$Estado."')");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $Passfuerte= password_hash($Pass,PASSWORD_BCRYPT);
  $sql = ("call User_In ('".$Id."','".$Nam."','".$Ema."','".$Gest."','".$Cargo."','".$User."','".$_PasCrip."','".$Tipo."','".$Estado."')");
  if (mysqli_query($conn, $sql)) {
    echo "1";
  } else {
    echo "0";
    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);



  
  
?>