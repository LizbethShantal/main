<?php
include("auth.php");
include("cabecera.php");

$cod = $_SESSION["codusuario"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Foto de Perfil</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h2>Cambiar Foto de Perfil</h2>
        <p>Sube una foto en formato PNG para actualizar tu perfil.</p>
        <form action="p_imagenperfil.php" method="post" enctype="multipart/form-data">
            <input type="file" name="archivo" accept=".png">
            <input type="submit" value="Cambiar Foto de Perfil">
        </form>
    </div>
</body>
</html>
