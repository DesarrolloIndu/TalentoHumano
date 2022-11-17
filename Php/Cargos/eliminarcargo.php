<?php 
	require_once "../Conexion.php";
	$id=$_POST['id1'];
    $sql="DELETE FROM cargos WHERE Id_Cargo='$id'";
	echo mysqli_query($conn,$sql);
 ?>