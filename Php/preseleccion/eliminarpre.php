<?php 
	require_once "../Conexion.php";
	$id=$_POST['documento'];
    $sql="DELETE FROM preseleccion WHERE Documento = $id";
	echo mysqli_query($conn,$sql);
 ?>