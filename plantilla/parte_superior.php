<?php
include("conexion.php");
session_start();
?>
<!DOCTYPE html>
<html class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MESADEPARTES</title>
    <link href="css/index.css" rel="stylesheet">
    <link href="output.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>
<body class="dark:bg-slate-900">
    <nav class="bg-white dark:bg-blue-900 fixed w-full z-20 top-0 start-0 border-b border-blue-200 dark:border-blue-600">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">MPV</span>
            </a>
            <div class="flex md:order-2 gap-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <?php if (!isset($_SESSION['codusuario'])): ?>
                    <a href="login.php" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Iniciar Sesión</a>
                    <a href="registro.php" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrarse</a>
                <?php else: ?>
                    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                        <?php
                        $codusuario = $_SESSION['codusuario']; // Asegúrate de tener el usua_cod correcto en la sesión
                        $image_path = "images/default.png"; // Imagen por defecto

                        // Define la ruta de la imagen según el rol del usuario
                        if ($_SESSION['rol'] == 'alumno') {
                            $folder = "UsuarioFoto/Persona/";
                            $image_path = $folder . $usua_cod . ".PNG";
                        } elseif ($_SESSION['usua_rol'] == 'institucion') {
                            $folder = "UsuarioFoto/Institucion/";
                            $image_path = $folder . $usua_cod . ".PNG";
                        } elseif ($_SESSION['usua_rol'] == 'administrador') {
                            $folder = "UsuarioFoto/Administrador/";
                            $image_path = $folder . $usua_cod . ".PNG";
                        }

                        // Verifica si la imagen existe
                        if (!file_exists($image_path)) {
                            $image_path = "UsuarioFoto/default.png"; // Usa la imagen por defecto si no existe la personalizada
                        }
                        ?>
                        <button type="button" class="flex text-sm bg-blue-800 rounded-full md:me-0 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="<?php echo $image_path; ?>" alt="user photo">
                        </button>
                        <!-- Dropdown menu -->
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-blue-100 rounded-lg shadow dark:bg-blue-700 dark:divide-blue-600" id="user-dropdown">
                            <div class="px-4 py-3">
                                <span class="block text-sm text-blue-900 dark:text-white">
                                    <?php
                                    if (isset($_SESSION['usua_rol'])) {
                                        // Realiza la consulta según el rol del usuario
                                        if ($_SESSION['usua_rol'] == 'persona') {
                                            $query = "SELECT pers_nombre FROM persona WHERE usua_cod = $usua_cod";
                                        } elseif ($_SESSION['usua_rol'] == 'institucion') {
                                            $query = "SELECT inst_nombre FROM institucion WHERE usua_cod = $usua_cod";
                                        } elseif ($_SESSION['usua_rol'] == 'administrador') {
                                            $query = "SELECT admin_nombre FROM administrador WHERE usua_cod = $usua_cod";
                                        }

                                        $result = mysqli_query($cn, $query); // Usa $cn para la conexión
                                        if ($result) {
                                            if (mysqli_num_rows($result) > 0) {
                                                $row = mysqli_fetch_assoc($result);
                                                //echo $row['pers_nombre'] ?? $row['inst_nombre'] ?? $row['admin_nombre']; // O la columna correspondiente según el rol
                                            } else {
                                                echo "No se encontraron resultados.";
                                            }
                                        } else {
                                            echo "Error en la consulta: " . mysqli_error($cn);
                                        }
                                    } else {
                                        echo "Rol de usuario no reconocido.";
                                    }
                                    ?>
                                </span>
                            </div>
                            <ul class="py-2" aria-labelledby="user-menu-button">
                                <?php if ($_SESSION['usua_rol'] == 'administrador'): ?>
                                    <li>
                                        <a href="dashboard.php" class="block px-4 py-2 text-sm text-blue-700 hover:bg-blue-100 dark:hover:bg-blue-600 dark:text-blue-200 dark:hover:text-white">Dashboard</a>
                                    </li>
                                <?php endif; ?>
                                <li>
                                    <a href="configuration.php" class="block px-4 py-2 text-sm text-blue-700 hover:bg-blue-100 dark:hover:bg-blue-600 dark:text-blue-200 dark:hover:text-white">Configuración</a>
                                </li>
                                <li>
                                    <a href="logout.php" class="block px-4 py-2 text-sm text-blue-700 hover:bg-blue-100 dark:hover:bg-blue-600 dark:text-blue-200 dark:hover:text-white">Cerrar Sesión</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
                <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-blue-500 rounded-lg md:hidden hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-200 dark:text-blue-400 dark:hover:bg-blue-700 dark:focus:ring-blue-600" aria-controls="navbar-user" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-blue-100 rounded-lg bg-blue-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-blue-800 md:dark:bg-blue-900 dark:border-blue-700">
                    <li>
                        <a href="objectives.php" class="block py-2 px-3 text-blue-900 rounded hover:bg-blue-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-blue-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-blue-700">Comentarios</a>
                    </li>

                    <?php if (isset($_SESSION['usua_cod'])) { ?>

                    <li>
                        <a href="contacto.php" class="block py-2 px-3 text-blue-900 rounded hover:bg-blue-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-blue-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-blue-700">Contacto</a>
                    </li>

                    <?php } else { echo '<a href="login.php" class="block py-2 px-3 text-blue-900 rounded hover:bg-blue-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-blue-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-blue-700">Contacto</a>';} ?>

                    <?php if (isset($_SESSION['usua_cod']) && $_SESSION['usua_rol']=='administrador') { ?>

                    <li>
                        <a href="statistics.php" class="block py-2 px-3 text-blue-900 rounded hover:bg-blue-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-blue-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-blue-700">Estadísticas</a>
                    </li>

                    <?php } else { echo '<a href="login.php" class="block py-2 px-3 text-blue-900 rounded hover:bg-blue-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-blue-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-blue-700">Estadística</a>';} ?>

                </ul>
            </div>
        </div>
    </nav>
    <div class="container-header">