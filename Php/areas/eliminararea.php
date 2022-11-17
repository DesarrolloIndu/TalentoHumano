<?php 
	require_once "../Conexion.php";
	$id=$_POST['id'];
    $sql="call eliminararea('$id')";
	echo mysqli_query($conn,$sql);
 ?>