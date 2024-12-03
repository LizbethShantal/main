<?php
include("auth.php");

$cod=$_SESSION["codusuario"];

$nombre=$_FILES["archivo"]["name"];
$archivo=$_FILES["archivo"]["tmp_name"];

list($n,$e)=explode(".",$nombre);

if (trim($e)=="png") {
    //Reemplazar el archivo y redirecciona a principal
    move_uploaded_file($archivo,"img/".$cod.".png");
    header('location: principal.php');

} else {
    //Redirecciona a imagenperfil
    header('location: imagenperfil.php');
}


?>