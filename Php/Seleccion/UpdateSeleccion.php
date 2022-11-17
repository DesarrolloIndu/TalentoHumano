<?php
include_once "CrudSeleccion.php";
$Dato1 = htmlentities($_POST['res'], ENT_QUOTES, 'utf-8');
$Dato2 = htmlentities($_POST['res'], ENT_QUOTES, 'utf-8');
$Dato3 = htmlentities($_POST['res'], ENT_QUOTES, 'utf-8');
//=============================================================
$seleccion = new CrudpreSeleccion();
$seleccion ->Id = $Dato1;
$seleccion ->Solicitud = $Dato2;
$seleccion -> Estado = $Dato3;
//$seleccion->Create();
?>