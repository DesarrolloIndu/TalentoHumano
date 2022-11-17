<?php 
	require_once "../Conexion.php";
	$id=$_POST['registro'];
    $sql="DELETE FROM solicitudes WHERE Reg_Kawak = $id";
	echo mysqli_query($conn,$sql);
 ?>