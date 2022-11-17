<?php
require_once "../Conexion.php";
$id = $_POST["id"];
$nombre = $_POST["nom"];
$sol = $_POST["sol"];
$estado = $_POST["aplica"];
$email=$_POST["em"];
$check=$_POST["circulo"];

if ($estado == 0) {
    $sql1 = "UPDATE preseleccion SET Estado='$estado' WHERE Documento='$id'";
    mysqli_set_charset($conn, "utf8");
    mysqli_query($conn, $sql1);
    echo ("1");
}
if ($estado == 1) {
    // Crear Hoja de vida  Automaticamente
    $sql ="INSERT INTO seguimiento (Documento,nombre,Cod_Sol,Estado) VALUES ('".$id."','".$nombre."','".$sol."','".$estado."')";
    mysqli_set_charset($conn, "utf8");
    mysqli_query($conn, $sql);
    mysqli_next_result($conn);
    $sql1 = "UPDATE preseleccion SET Estado='$estado' WHERE Documento='$id'";
    mysqli_set_charset($conn, "utf8");
    mysqli_query($conn, $sql1);
    echo ("1");
} 
   


/*
//Validar errores

$res = mysqli_query($conn, $sql1);
if ($res === false) {
    echo "SQL Error: " . mysqli_error($conn);
}

//Otra Forma
 $result = mysqli_query($conn, $sql1);
 $error_message = mysqli_error($conn);
    if($error_message == ""){
        echo "No error related to SQL query.";
    }else{
        echo "Query Failed: ".$error_message;
    }
    mysqli_close($connection);

*/
