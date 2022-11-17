<?php 
// No mostrar los errores de PHP
//error_reporting(0);
session_start();
// Validar Autenticación
if(!$_SESSION['autenticar']){
     header("Location:Index.php"); 
}

?>