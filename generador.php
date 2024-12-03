<?php
session_start();
$cod = $_SESSION["codusuario"];

include("conexion.php");
include("cabecera.php");

$sql = "SELECT nfut, estado FROM fut WHERE codusuario = '$cod' ORDER BY fecha DESC LIMIT 1";
$result = mysqli_query($cn, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    die("No se encontraron trámites para el usuario.");
}

$tramite = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trámite Generado</title>
</head>
<body>
    <br><br>
    <div align="center">
        <fieldset align="center">
            <h3>Datos del Trámite</h3>
            Número de trámite: <?php echo htmlspecialchars($tramite['nfut']); ?><br>
            Estado: <?php echo htmlspecialchars($tramite['estado']); ?><br><br>
            <a href="principal.php" style="text-decoration: none; background-color: #007BFF; color: white; padding: 10px 20px; border-radius: 5px; font-size: 16px;">
                Regresar al Menú
            </a>
        </fieldset>
    </div>
</body>
</html>
