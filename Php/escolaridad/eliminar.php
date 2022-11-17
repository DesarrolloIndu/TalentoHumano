<?php 
	require_once "../Conexion.php";
	$id=$_POST['ID'];
    $sql="DELETE FROM escolaridad WHERE Id_Escolaridad='$id'";
	echo mysqli_query($conn,$sql);
 ?>