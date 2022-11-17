<?php
require_once "../Conexion.php";
//leer JSON
$Documento = htmlentities($_POST["Documento"], ENT_QUOTES, 'utf-8');
//Consulta SQL
$result = mysqli_query($conn, "call Cambio_Presel('" . $Documento . "')");
//Validar error
$error_message = mysqli_error($conn);
//Evaluar error -> Envio Mensaje
if($error_message == ""){
    echo json_encode("Modificado...");
}else{
    echo "Error: ".$error_message;
}
// Cerrar Conexion
mysqli_close($conn);
?>

