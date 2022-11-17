<?php
require_once "../Conexion.php";
$kawak = $_POST['registro'];
$fsolicitud = $_POST['fechasol'];
$codcargo = $_POST['cargo'];
$cantidad = $_POST['cantidad'];
$salario = $_POST['salario'];
$fechap = $_POST['fechap'];
$link = $_POST['link'];
$estado = $_POST['estado'];
$flimite = $_POST['fechal'];
$observaciones = $_POST['observaciones'];
$contratados= $_POST['contrato'];
$Dato= 0;


    // Traer consecutivo
    $result = mysqli_query($conn , "call Sp_Consecutivo ()");
    if (mysqli_num_rows($result) > 0) {
       while($row = mysqli_fetch_assoc($result)) {
        $Dato = $row['Dato'];
        if($Dato<999){   //Asignar contadores
            $Consecutivo=1000 ;
        }else{
            $Consecutivo= $Dato;
        }
       }
    mysqli_next_result($conn);
    };
// Crear 
if ( $contratados=="") { 
    $vacio = "no hay observaciones";
    $vacio1=0;
    $sql = "call insertarsolicitud('" .$kawak. "','" .$fsolicitud. "','" .$codcargo. "','" .$cantidad . "','" .$salario. "','" .$fechap. "','" .$link. "','" .$estado. "','" .$flimite . "','" .$observaciones. "','" .$vacio1. "','" .$Consecutivo."')";
    mysqli_set_charset($conn,"utf8");
    echo mysqli_query($conn, $sql);
} else {
    $sql = "call insertarsolicitud('" .$kawak. "','" .$fsolicitud . "','" . $codcargo . "','" . $cantidad . "','" . $salario . "','" .$fechap. "','" .$link. "','" .$estado. "','" .$flimite. "','" .$observaciones. "','" .$contratados."','" .$Consecutivo."')";
    mysqli_set_charset($conn,"utf8");
    echo mysqli_query($conn, $sql);
}
//echo $result=mysqli_query($conn,"call User_In ('".$Id."','".$Nam."','".$Ema."','".$Gest."','".$Cargo."','".$User."','".$Pass."','".$Tipo."','".$Estado."')");
