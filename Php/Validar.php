<?php
require_once "conexion.php";
require_once "Criptografia.php";
$nombre = htmlentities($_POST['login_username'],ENT_QUOTES,'utf-8');
$password = htmlentities($_POST['login_password'],ENT_QUOTES,'utf-8');
$_password=Criptograma::encryption($password);
// ;
//Validacion de Datos  Criptograma  159                                                                                                                                                                                          
$result = mysqli_query($conn , "call login ('".$nombre."','".$_password."')");
if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
////////////////////////////////////////////////////////    	
$id= $row['Id'];
$nom_user= $row['Nombre']; 
$tipe= $row['Tipo'];
$State=$row['Estado']; 
         
////////////////////////////////////////////////////////		
session_start();
       $_SESSION["Id"]=$id;
       $_SESSION["tipo"]=$tipe;
       $_SESSION["autenticar"] = "Ok";
       $_SESSION["Usuario_Activo"]=$nom_user;
       $_SESSION["Estado"]=$State;
////////////////////////////////////////////////////////
// Inicio Validacion Tipos de usuario
if ($State==1){  
// Validacion por tipo de Usuario
if($tipe ==4) {
 $_SESSION["categoria"]= 4;
header('location: ../Usuarios.php');
 }
////////////////////////////////////////////////////////
 if($tipe ==3) {
   $_SESSION["categoria"]=3;
  header('location: ../Jefes_area.php');
 }
////////////////////////////////////////////////////////
 if($tipe ==2) {
   $_SESSION["categoria"]=2;
  header('location:../Administracion.php');
 }
////////////////////////////////////////////////////////

 if($tipe ==1) {
   $_SESSION["categoria"]=1;
   header('location: ../Dashboard.php');
 }
//Fin Validador estado
}else{
echo'<script type="text/javascript">  alert("Usuario Inactivo, Contactar al administrador del sistema."); window.location.href="../Index.php";  </script>';
//echo '<span>El usuario esta Inactivo.</span>';
}         
////////////////////////////////////////////////////////
   }
 }else {
 //Contraseña Incorrecta    
 //header('location: ../Index.php');
 echo'<script type="text/javascript">  alert("usuario o contraseña incorrecta"); window.location.href="../Index.php";  </script>';
// echo '<span>El usuario y/o clave son incorrectas, vuelva a intentarlo.</span>';
}
mysqli_close($conn);
?> 
