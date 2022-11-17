<?php
require_once "../Conexion.php";
$ID = $_POST['ID'];
$esc = $_POST['escolari'];
$observ = $_POST['observ'];


$sql = "UPDATE escolaridad SET Escolaridad='$esc',Observaciones='$observ' WHERE Id_Escolaridad='$ID'";
echo mysqli_query($conn, $sql);

//echo $result=mysqli_query($conn,"call User_In ('".$Id."','".$Nam."','".$Ema."','".$Gest."','".$Cargo."','".$User."','".$Pass."','".$Tipo."','".$Estado."')");
