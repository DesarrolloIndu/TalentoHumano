
<?php
require('Php/Conexion.php');
$area=$_POST['area'];

$result = mysqli_query($conn,"call areas_gestion($area);"); 

	while ($ver=mysqli_fetch_row($result)) {
		echo  '<option value='.$ver[0].'>'.$ver[1].'</option>';
	}


?>
