<?php
require_once "../Conexion.php";
$ID = $_POST['ID'];
$naci = $_POST['nacio'];
$observ = $_POST['observ'];


$sql = "UPDATE nacionalidad SET Nacionalidad='$naci',Observaciones='$observ' WHERE Id_Nacionalidad='$ID'";
echo mysqli_query($conn, $sql);

//echo $result=mysqli_query($conn,"call User_In ('".$Id."','".$Nam."','".$Ema."','".$Gest."','".$Cargo."','".$User."','".$Pass."','".$Tipo."','".$Estado."')");
