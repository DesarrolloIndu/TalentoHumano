<?php 
	require_once "../Conexion.php";
	$id=$_POST['ID'];
    $sql="DELETE FROM nacionalidad WHERE Id_Nacionalidad='$id'";
	echo mysqli_query($conn,$sql);
 ?>