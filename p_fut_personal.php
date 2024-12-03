<?php
include("conexion.php");

$codigo = $_POST["txtcodigo"];
$asunto = $_POST["txtasunto"];
$descripcion = $_POST["txtdescripcion"];
$tramite = $_POST["lsttramite"];
$area = $_POST["lstarea"];

$sql = "INSERT INTO fut (codusuario, asunto, descripcion, estado)
        VALUES ('$codigo', '$asunto', '$descripcion', 'ENVIADO')";

if (mysqli_query($cn, $sql)) {
    header("Location: generador.php");
} else {
    echo "Error: " . mysqli_error($cn);
}
?>