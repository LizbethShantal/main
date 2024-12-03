<?php
include("auth.php");       // Verificación de sesión
include("conexion.php");   // Conexión a la base de datos
include("cabecera.php");   // Menú dinámico

$codigo = $_SESSION["codusuario"]; // ID del usuario obtenido de la sesión
$rol = $_SESSION["rol"];       // Rol del usuario (empresa o postulante)

// Determinar la tabla y consulta según el rol
if ($rol === 'alumno') {
    $sql = "SELECT * FROM alumno WHERE codalumno = '$codigo'";
} elseif ($rol === 'personal') {
    $sql = "SELECT * FROM personal WHERE codadministrativo = '$codigo'";
} elseif ($rol === 'egresado') {
    $sql = "SELECT * FROM egresado WHERE coduniversitario = '$codigo'";
} elseif ($rol === 'entidad') {
    $sql = "SELECT * FROM entidad WHERE codentidad = '$codigo'";
}

$f = mysqli_query($cn, $sql);
$r = mysqli_fetch_assoc($f);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<div class="container">

    <?php if ($rol === 'alumno'): ?>
    
    <center>
        <h2>Bienvenido(a) <?php echo $rol === 'alumno' ? $r["nombre_a"] : $r["nombre_a"] . " " . $r["apaterno_a"]; ?></h2>
    </center>

    <center>
        <div class="profile-image">
            <img src="img/<?php echo $rol === 'alumno' ? $r["codalumno"] : $r["codalumno"]; ?>.png" width="150" height="150" alt="Foto de Perfil">
        </div>
    </center>

    <?php elseif ($rol === 'egresado'): ?>

    <center>
        <h2>Bienvenido(a) <?php echo $rol === 'egresado' ? $r["nombre_e"] : $r["nombre_e"] . " " . $r["apaterno_e"]; ?></h2>
    </center>

    <center>
        <div class="profile-image">
            <img src="img/<?php echo $rol === 'egresado' ? $r["coduniversitario"] : $r["coduniversitario"]; ?>.png" width="150" height="150" alt="Foto de Perfil">
        </div>
    </center>

    <?php elseif ($rol === 'entidad'): ?>

    <center>
        <h2>Bienvenido(a) <?php echo $rol === 'entidad' ? $r["representante_ti"] : $r["representante_ti"] . " " . $r["razonsocial_ti"]; ?></h2>
    </center>

    <center>
        <div class="profile-image">
            <img src="img/<?php echo $rol === 'entidad' ? $r["codentidad"] : $r["codentidad"]; ?>.png" width="150" height="150" alt="Foto de Perfil">
        </div>
    </center>

    <?php elseif ($rol === 'personal'): ?>

    <center>
        <h2>Bienvenido(a) <?php echo $rol === 'personal' ? $r["nombre_p"] : $r["nombre_p"] . " " . $r["apaterno_p"]; ?></h2>
    </center>

    <center>
        <div class="profile-image">
            <img src="img/<?php echo $rol === 'personal' ? $r["codadministrativo"] : $r["codadministrativo"]; ?>.png" width="150" height="150" alt="Foto de Perfil">
        </div>
    </center>

    <?php endif; ?>
    <!-- Información básica según el rol -->
    <table>
        <thead>
        <tr>
            <th colspan="2">Información Básica</th>
        </tr>
        </thead>
        <tbody>
        <?php if ($rol === 'alumno'): ?>
            <tr>
                <td><strong>CÓDIGO ALUMNO:</strong></td>
                <td><?php echo $r["codalumno"]; ?></td>
            </tr>
            <tr>
                <td><strong>A. Paterno</strong></td>
                <td><?php echo $r["apaterno_a"]; ?></td>
            </tr>
            <tr>
                <td><strong>A. Materno</strong></td>
                <td><?php echo $r["amaterno_a"]; ?></td>
            </tr>
            <tr>
                <td><strong>Nombre</strong></td>
                <td><?php echo $r["nombre_a"]; ?></td>
            </tr>
            <tr>
                <td><strong>Dni</strong></td>
                <td><?php echo $r["dni_a"]; ?></td>
            </tr>
            <tr>
                <td><strong>Año de ingreso</strong></td>
                <td><?php echo $r["anoingreso_a"]; ?></td>
            </tr>
            <tr>
                <td><strong>Modalidad</strong></td>
                <td><?php echo $r["modalidad_a"]; ?></td>
            </tr>
            <tr>
                <td><strong>Ciclo</strong></td>
                <td><?php echo $r["ciclo_a"]; ?></td>
            </tr>
            <tr>
                <td><strong>Facultad</strong></td>
                <td><?php echo $r["facultad_a"]; ?></td>
            </tr>
            <tr>
                <td><strong>Escuela</strong></td>
                <td><?php echo $r["escuela_a"]; ?></td>
            </tr>
            <tr>
                <td><strong>Domicilio</strong></td>
                <td><?php echo $r["domicilio_a"]; ?></td>
            </tr>
            <tr>
                <td><strong>Número Casa</strong></td>
                <td><?php echo $r["ncasa_a"]; ?></td>
            </tr>
            <tr>
                <td><strong>Distrito</strong></td>
                <td><?php echo $r["distrito_a"]; ?></td>
            </tr>
            <tr>
                <td><strong>Provincia</strong></td>
                <td><?php echo $r["provincia_a"]; ?></td>
            </tr>
            <tr>
                <td><strong>Referencia</strong></td>
                <td><?php echo $r["referencia_a"]; ?></td>
            </tr>
            <tr>
                <td><strong>Teléfono fijo</strong></td>
                <td><?php echo $r["fijo_a"]; ?></td>
            </tr>
            <tr>
                <td><strong>Celular</strong></td>
                <td><?php echo $r["celular_a"]; ?></td>
            </tr>
            <tr>
                <td><strong>Correo</strong></td>
                <td><?php echo $r["correo_a"]; ?></td>
            </tr>

            <?php elseif ($rol === 'egresado'): ?>
            <tr>
                <td><strong>Codigo de Egresado</strong></td>
                <td><?php echo $r["coduniversitario"]; ?></td>
            </tr>
            <tr>
                <td><strong>Apellido Paterno</strong></td>
                <td><?php echo $r["apaterno_e"]; ?></td>
            </tr>
            <tr>
                <td><strong>Apellido Materno</strong></td>
                <td><?php echo $r["amaterno_e"]; ?></td>
            </tr>
            <tr>
                <td><strong>Nombres</strong></td>
                <td><?php echo $r["nombre_e"]; ?></td>
            </tr>
            <tr>
                <td><strong>DNI</strong></td>
                <td><?php echo $r["dni_e"]; ?></td>
            </tr>
            <tr>
                <td><strong>Año de Egreso</strong></td>
                <td><?php echo $r["anoegreso_e"]; ?></td>
            </tr>
            <tr>
                <td><strong>Condicion</strong></td>
                <td><?php echo $r["condicion_e"]; ?></td>
            </tr>
            <tr>
                <td><strong>Categoria</strong></td>
                <td><?php echo $r["categoria_e"]; ?></td>
            </tr>
            <tr>
                <td><strong>Facultad</strong></td>
                <td><?php echo $r["facultad_e"]; ?></td>
            </tr>
            <tr>
                <td><strong>Escuela</strong></td>
                <td><?php echo $r["escuela_e"]; ?></td>
            </tr>
            <tr>
                <td><strong>Domicilio</strong></td>
                <td><?php echo $r["domicilio_e"]; ?></td>
            </tr>
            <tr>
                <td><strong>N°/Lote </strong></td>
                <td><?php echo $r["ncasa_e"]; ?></td>
            </tr>
            <tr>
                <td><strong>Distrito</strong></td>
                <td><?php echo $r["distrito_e"]; ?></td>
            </tr>
            <tr>
                <td><strong>Provincia</strong></td>
                <td><?php echo $r["provincia_e"]; ?></td>
            </tr>
            <tr>
                <td><strong>Referencia</strong></td>
                <td><?php echo $r["referencia_e"]; ?></td>
            </tr>
            <tr>
                <td><strong>Fijo</strong></td>
                <td><?php echo $r["fijo_e"]; ?></td>
            </tr>
            <tr>
                <td><strong>Celular</strong></td>
                <td><?php echo $r["celular_e"]; ?></td>
            </tr>
            <tr>
                <td><strong>Correo</strong></td>
                <td><?php echo $r["correo_e"]; ?></td>
            </tr>
        <?php elseif ($rol === 'entidad'): ?>
            <tr>
                <td><strong>Code Entidad</strong></td>
                <td><?php echo $r["codentidad"]; ?></td>
            </tr>
            <tr>
                <td><strong>Ruc</strong></td>
                <td><?php echo $r["ruc_ti"]; ?></td>
            </tr>
            <tr>
                <td><strong>Representante</strong></td>
                <td><?php echo $r["representante_ti"]; ?></td>
            </tr>
            <tr>
                <td><strong>Razon social</strong></td>
                <td><?php echo $r["razonsocial_ti"]; ?></td>
            </tr>
            <tr>
                <td><strong>Distrito</strong></td>
                <td><?php echo $r["distrito_ti"]; ?></td>
            </tr>
            <tr>
                <td><strong>Provincia</strong></td>
                <td><?php echo $r["provincia_ti"]; ?></td>
            </tr>
            <tr>
                <td><strong>Referencia</strong></td>
                <td><?php echo $r["referencia_ti"]; ?></td>
            </tr>
            <tr>
                <td><strong>Fijo</strong></td>
                <td><?php echo $r["fijo_ti"]; ?></td>
            </tr>
            <tr>
                <td><strong>Celular</strong></td>
                <td><?php echo $r["celular_ti"]; ?></td>
            </tr>
            <tr>
                <td><strong>Correo</strong></td>
                <td><?php echo $r["correo_ti"]; ?></td>
            </tr>
        
            <?php elseif ($rol === 'personal'): ?>
            <tr>
                <td><strong>ID entidad</strong></td>
                <td><?php echo $r["codadministrativo"]; ?></td>
            </tr>
            <tr>
                <td><strong>A. Paterno</strong></td>
                <td><?php echo $r["apaterno_p"]; ?></td>
            </tr>
            <tr>
                <td><strong>A. Materno</strong></td>
                <td><?php echo $r["amaterno_p"]; ?></td>
            </tr>
            <tr>
                <td><strong>Nombre</strong></td>
                <td><?php echo $r["nombre_p"]; ?></td>
            </tr>
            <tr>
                <td><strong>DNI</strong></td>
                <td><?php echo $r["dni_p"]; ?></td>
            </tr>
            <tr>
                <td><strong>Año de Ingreso</strong></td>
                <td><?php echo $r["anoingreso_p"]; ?></td>
            </tr>
            <tr>
                <td><strong>Facultad</strong></td>
                <td><?php echo $r["facultad_p"]; ?></td>
            </tr>
            <tr>
                <td><strong>Área</strong></td>
                <td><?php echo $r["area_p"]; ?></td>
            </tr>
            <tr>
                <td><strong>Domicilio</strong></td>
                <td><?php echo $r["domicilio_p"]; ?></td>
            </tr>
            <tr>
                <td><strong>Número de Casa</strong></td>
                <td><?php echo $r["ncasa_p"]; ?></td>
            </tr>
            <tr>
                <td><strong>Distrito</strong></td>
                <td><?php echo $r["distrito_p"]; ?></td>
            </tr>
            <tr>
                <td><strong>Provincia</strong></td>
                <td><?php echo $r["provincia_p"]; ?></td>
            </tr>
            <tr>
                <td><strong>Número de Referencia</strong></td>
                <td><?php echo $r["referencia_p"]; ?></td>
            </tr>
            <tr>
                <td><strong>Télefono fijo</strong></td>
                <td><?php echo $r["fijo_p"]; ?></td>
            </tr>
            <tr>
                <td><strong>Celular</strong></td>
                <td><?php echo $r["celular_p"]; ?></td>
            </tr>
            <tr>
                <td><strong>Correo</strong></td>
                <td><?php echo $r["correo_p"]; ?></td>
            </tr>

        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
