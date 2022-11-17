<?php 
	require_once "../Conexion.php";
	$id=$_POST['id'];
	echo $result=mysqli_query($conn,"call User_Del('".$id."')");
 ?>