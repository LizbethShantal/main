<?php
// Conexión a la base de datos
include("conexion.php");
session_start(); // Iniciar sesión

// Consulta para obtener los valores del campo ENUM
$sql = "SHOW COLUMNS FROM usuario LIKE 'rol'";
$result = mysqli_query($cn, $sql);
$row = mysqli_fetch_assoc($result);

// Extraer los valores del ENUM
$enumValues = str_replace("'", "", substr($row['Type'], 5, -1));
$options = explode(",", $enumValues);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

<form action="p_login.php" method="post">
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="login-box">
        <div class="text-center mb-4">
            <h2><b>Ingrese al Sistema</b></h2>
        </div>
        <div class="card">
            <div class="card-body">
                <p class="text-center">Ingrese sus credenciales</p>
                <form id="account" method="post">
                    <!-- Code -->
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="text" name="codigo_usu" class="form-control" placeholder="Código del usuario" required>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                        </div>
                    </div>

                    <!-- Combo Box -->
                    <div class="mb-3">
                    <select class="form-select" name="rol" aria-label="Seleccione tipo de usuario" required>
                        <option value="" disabled selected>Seleccione tipo de usuario</option>
                            <?php foreach ($options as $option) { ?>
                                <option value="<?php echo $option; ?>"><?php echo ucfirst($option); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success w-100 mb-3">INICIAR SESION</button>
                </form>

                <!-- Links -->
                <p class="text-center mt-3">
                    <a href="#">Olvide mi contraseña</a> | <a href="registro.php">Registrar un nuevo usuario</a>
                </p>
            </div>
        </div>
    </div>
</div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
