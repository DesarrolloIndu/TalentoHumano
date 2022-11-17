 <?php
  header("Content-Type: text/html;charset=UTF-8");
//require('Php/Seguridad.php');
require_once "../Conexion.php";
$resultado = $_POST['Peticion'];

    $result = mysqli_query($conn, "CALL areas_gestion($resultado);");

    if (mysqli_num_rows($result) > 0) {
    while ($ver = mysqli_fetch_row($result)) {
                       echo   $ver[0]. "|";
                       echo  $ver[1]. "|";
                       echo   $ver[2]. "|";
                    }
                };              
?>