<?php

// Verificar que el usuario haya iniciado sesión
if (!isset($_SESSION['rol'])) {
    header("Location: login.php");
    exit();
}

$rol = $_SESSION['rol']; // Obtener el rol del usuario
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MESA PARTES</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="menu_assets/estilo.css">
    <link rel="stylesheet" href="menu_assets/styles.css">
</head>
<body>
    <center>
        <img src="img/Logo_UNJFSC.png" width="180" height="180" alt="Logo">
        <br>
        <h1>MESA PARTES</h1>
    </center>
    <br>
    <center>
        <div id='cssmenu'>
            <ul>
                <li><a href='principal.php'><span>Principal</span></a></li>
                <li><a href='imagenperfil.php'><span>Subir Foto de Perfil</span></a></li>

                <?php if ($rol === 'alumno'): ?>
                    <li class='has-sub'><a href='#'><span>FUT</span></a>
                        <ul>
                            <li><a href='fut_alumno.php'><span>Realizar FUT</span></a></li>
                            <li class='last'><a href='gestionarreporte_alumno.php'><span>Buscar FUT</span></a></li>
                        </ul>
                    </li>
                    
                    <!-- <li><a href='verpostulante.php'><span>Ver Postulantes</span></a></li> -->
                <?php elseif ($rol === 'personal'): ?>
                    <li class='has-sub'><a href='#'><span>FUT</span></a>
                        <ul>
                            <li><a href='fut_personal.php'><span>Realizar FUT</span></a></li>
                            <li class='last'><a href='gestionarreporte_personal.php'><span>Buscar FUT</span></a></li>
                        </ul>
                    </li>
                    
                    <!-- <li><a href='verpostulante.php'><span>Ver Postulantes</span></a></li> -->
                <?php elseif ($rol === 'egresado'): ?>
                    <li class='has-sub'><a href='#'><span>FUT</span></a>
                        <ul>
                            <li><a href='fut_egresado.php'><span>Realizar FUT</span></a></li>
                            <li class='last'><a href='gestionarreporte_egresado.php'><span>Buscar FUT</span></a></li>
                        </ul>
                    </li>
                    
                    <!-- <li><a href='verpostulante.php'><span>Ver Postulantes</span></a></li> -->
                <?php elseif ($rol === 'entidad'): ?>
                    <li class='has-sub'><a href='#'><span>FUT</span></a>
                        <ul>
                            <li><a href='fut_entidad.php'><span>Realizar FUT</span></a></li>
                            <li class='last'><a href='gestionarreporte_entidad.php'><span>Buscar FUT</span></a></li>
                        </ul>
                    </li>
                    
                    <!-- <li><a href='verpostulante.php'><span>Ver Postulantes</span></a></li> -->
                <?php endif; ?>

                <li class='last'><a href='cerrarsesion.php'><span>Cerrar Sesión</span></a></li>
            </ul>
        </div>
    </center>
</body>
</html>