<?php 
	require_once "../Conexion.php";
	$id=$_POST['id'];
    $sql="call Gest_Del('$id')";
	echo mysqli_query($conn,$sql);
 ?>