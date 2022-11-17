<?php
require_once "../conexion.php";
// Pw post
$Dato = htmlentities($_POST['res'], ENT_QUOTES, 'utf-8');
//Consulta SQL
$result = mysqli_query($conn, "call Param_Pw_Admin ('" . $Dato . "')");
//Si Hay Resultado Query
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        //Convertir String a Int    
        $Id_Pw = (int)($row['Id_Parametro']);
        $Pw = $row['valor'];
        //Validar y enviar dato Json    
        if ($Dato == $Pw) {
            echo json_encode($Id_Pw);
        } else {
            echo json_encode(404);
        }
    }
};
 
