<?php
session_start();
include ("conexion.php"); // Incluye la conexión

    $codigo = $_POST['codigo_usu'];
    $password = $_POST['password'];

    // Verificar las credenciales
    $sql = "SELECT codusuario, rol FROM usuario WHERE codusuario = '$codigo' AND password = '$password'";
    $f = mysqli_query($cn, $sql);
    $r = mysqli_fetch_assoc($f);

    if ($r) {
        $_SESSION['codusuario'] = $r['codusuario'];
        $_SESSION["auth"] = 1;
        $_SESSION['rol'] = $r['rol'];

        if ($r['rol'] === 'alumno') {
            header("Location: principal.php");
        } elseif ($r['rol'] === 'personal') {
            header("Location: principal.php");
        } elseif ($r['rol'] === 'egresado') {
            header("Location: principal.php");
        } elseif ($r['rol'] === 'entidad') {
            header("Location: principal.php");
        }
    } else {
        echo "Credenciales incorrectas.";
    }
?>