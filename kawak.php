<?php
require('Php/Conexion.php');
$kawa=$_POST['kawa'];

$result = mysqli_query($conn,"CALL kawak($kawa);"); 

	while ($ver=mysqli_fetch_row($result)) {
		echo  $ver[0];
	}


?>