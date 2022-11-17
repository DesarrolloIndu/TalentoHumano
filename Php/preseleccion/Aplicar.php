<?php
require_once "../Conexion.php";
include_once "../Seleccion/CrudSeleccion.php";
//leer JSON
$Documento = htmlentities($_POST["Documento"], ENT_QUOTES, 'utf-8');
$Solicitud = htmlentities($_POST["Solicitud"], ENT_QUOTES, 'utf-8');
$Aplica = htmlentities($_POST["Aplica"], ENT_QUOTES, 'utf-8');
$Email = htmlentities($_POST["Email"], ENT_QUOTES, 'utf-8');
$Solicitud = htmlentities($_POST["Solicitud"], ENT_QUOTES, 'utf-8');
//===============================================================================================================


//Aplicaciom al cargo ============================================================================================
$result = mysqli_query($conn, "call Sp_AplicaPresel('" . $Documento . "','" . $Aplica . "')");
//Validar error
$error_message = mysqli_error($conn);
//Evaluar error -> Envio Mensaje
if ($error_message == "") {
    echo json_encode("Aplicacion al cargo Ok ");
} else {
    echo "Error: " . $error_message;
}
//Cerrar Conexion
mysqli_close($conn);
// //Crear Proceso===================================================================================================

if ($Aplica == 1) {  
    $seleccion = new CrudpreSeleccion();  //Genera error 
    $insert = $seleccion->InsertSeleccion($Documento,$Solicitud,1);
    echo json_encode( $insert . " Se crea proceso Se envia Correo poo ");
}else{
    echo json_encode(" No se crea proceso Se envia Correo ");
}

//Envio Correo====================================================================================================
if ($Email == 0) {
    echo json_encode("No se envia Correo ");
} else {
    echo json_encode(" Se envia Correo ");
}
