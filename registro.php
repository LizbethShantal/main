<?php
include("plantilla/parte_superior.php");
?>



<div class="py-8 px-4 flex flex-col justify-center items-center gap-8 mx-auto max-w-screen-xl text-center lg:py-16">
    <div class="w-full max-w-lg p-4 bg-white border border-light-blue-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-blue-800 dark:border-gray-700">

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="css/estilo.css">
    <script>
        function toggleFields() {
            const rol = document.getElementById('rol').value;
            document.getElementById('alumnoFields').style.display = rol === 'alumno' ? 'block' : 'none';
            document.getElementById('personalFields').style.display = rol === 'personal' ? 'block' : 'none';
            document.getElementById('egresadoFields').style.display = rol === 'egresado' ? 'block' : 'none';
            document.getElementById('entidadFields').style.display = rol === 'entidad' ? 'block' : 'none';
        }
    </script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto ">
    <h1 class="text-3xl font-bold text-center mb-8 text-white">Registro de Tipo de Usuario</h1>
    
    <form action="p_registro.php" method="POST" class="bg-white rounded-lg shadow-md p-6 space-y-6 max-w-2xl mx-auto">
        <h2 class="text-xl font-medium text-gray-800">Iniciar Sesion</h2>
        
        <div class="flex flex-col justify-start items-start">
        <label for="codigo_usu" class="block text-sm font-medium text-gray-700" >Código:</label>
        <input type="text" name="codigo_usu" id="codigo_usu" placeholder="Código de 8 caracteres" required class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
        <br>
        <label for="password" class="block text-sm font-medium text-gray-700">Contraseña:</label>
        <input type="password" name="password" id="password" required class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm" placeholder="Contraseña">
        <br>
        <label for="rol" class="block text-sm font-medium text-gray-700">Tipo de Usuario:</label>
        <select name="rol" id="rol" class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm" onchange="toggleFields()" required>
            <option value="" disabled selected>Seleccione tipo de usuario</option>
            <option value="alumno">Alumno</option>
            <option value="personal">Personal</option>
            <option value="egresado">Egresado</option>
            <option value="entidad">Entidad</option>
        </select>
        <br><br>

        <!-- Campos específicos de empresa -->
        <div id="alumnoFields" style="display:none;" class="bg-white rounded-lg shadow-md p-6 space-y-6 w-full mx-auto">
            <h3 class="text-lg font-semibold text-blue-600">Datos del Alumno</h3>
            <div>
                <label for="codalumno" class="block text-sm font-medium text-gray-700" >Código universitario:</label>
                <input type="text" name="codalumno" id="codalumno" 
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm" placeholder="Ejem: 0332221014">
            </div>
            <div>
                <label for="apaterno_a" class="block text-sm font-medium text-gray-700" >Apellido Paterno:</label>
                <input type="text" name="apaterno_a" id="apaterno_a" 
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm" placeholder="Ejem: Castillo">
            </div>
            <div>
                <label for="amaterno_a" class="block text-sm font-medium text-gray-700" >Apellido Materno:</label>
                <input type="text" name="amaterno_a" id="amaterno_a" 
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm" placeholder="Ejem: Robles">
            </div>
            <div>
                <label for="nombre_a" class="block text-sm font-medium text-gray-700" >Nombres:</label>
                <input type="text" name="nombre_a" id="nombre_a" 
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm" placeholder="Ejem: Bruno Eber">
            </div>
            <div>
                <label for="dni_a" class="block text-sm font-medium text-gray-700" >Dni:</label>
                <input type="text" name="dni_a" id="dni_a" 
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm" placeholder="Ejem: 74851825">
            </div>
            <div>
                <label for="ano_a" class="block text-sm font-medium text-gray-700">Año de Ingreso:</label>
                <input type="date" name="ano_a" id="ano_a" 
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm" placeholder="Ejem: 2022-1">
            </div>
            <div>
                <label for="modalidad_a" class="block text-sm font-medium text-gray-700">Modalidad de Ingreso:</label>
                <input type="text" name="modalidad_a" id="modalidad_a" 
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm" placeholder="Ejem: Centro Pre Universitario ">
            </div>
            <div>
                <label for="ciclo_a" class="block text-sm font-medium text-gray-700">Ciclo:</label>
                <input type="text" name="ciclo_a" id="ciclo_a" 
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm" placeholder="Ejem: VI">
            </div>
            <div>
                <label for="facultad_a" class="block text-sm font-medium text-gray-700">Facultad:</label>
                <input type="text" name="facultad_a" id="facultad_a" placeholder="Ejem: FIISI"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="escuela_a" class="block text-sm font-medium text-gray-700">Escuela:</label>
                <input type="text" name="escuela_a" id="escuela_a" placeholder="Ejem: Ingeniería de Sistemas"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="domicilio_a" class="block text-sm font-medium text-gray-700">Domicilio:</label>
                <input type="text" name="domicilio_a" id="domicilio_a" placeholder="Ejem: Huaral"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="ncasa_a" class="block text-sm font-medium text-gray-700">Número/MZ/Lt:</label>
                <input type="text" name="ncasa_a" id="ncasa_a" placeholder="Ejem: MZ.G - Lote.10"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="distrito_a" class="block text-sm font-medium text-gray-700">Distrito:</label>
                <input type="text" name="distrito_a" id="distrito_a" placeholder="Ejem: Huacho"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="provincia_a" class="block text-sm font-medium text-gray-700">Provincia:</label>
                <input type="text" name="provincia_a" id="provincia_a" placeholder="Ejem: Huaura"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="referencia_a" class="block text-sm font-medium text-gray-700">Referencia:</label>
                <input type="text" name="referencia_a" id="referencia_a" placeholder="Ejem: Frente de un parque"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="fijo_a" class="block text-sm font-medium text-gray-700">Telefono Fijo:</label>
                <input type="text" name="fijo_a" id="fijo_a" placeholder="Ejem: 01 91 234 5678"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm"> 
            </div>
            <div>
                <label for="celular_a" class="block text-sm font-medium text-gray-700">Celular:</label>
                <input type="text" name="celular_a" id="celular_a" placeholder="Ejem: 915334302"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
               <label for="correo_a" class="block text-sm font-medium text-gray-700" >Correo Institucional:</label>
                <input type="email" name="correo_a" id="correo_a" placeholder="Ejem: 0332221014@unjfsc.edu.pe"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm"> 
            </div>
        </div>

        <div id="personalFields" style="display:none;" class="bg-white rounded-lg shadow-md p-6 space-y-6 w-full mx-auto">
            <h3 class="text-lg font-semibold text-blue-600">Datos del Personal</h3>
            <div>
                <label for="codadministrativo" class="block text-sm font-medium text-gray-700">Código Administrativo:</label>
                <input type="text" name="codadministrativo" id="codadministrativo" placeholder="Ejem: 0332221014"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="apaterno_p " class="block text-sm font-medium text-gray-700">Apellido Paterno:</label>
                <input type="text" name="apaterno_p" id="apaterno_p" placeholder="Ejem: Castillo"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="amaterno_p" class="block text-sm font-medium text-gray-700">Apellido Materno:</label>
                <input type="text" name="amaterno_p" id="amaterno_p" placeholder="Ejem: Robles"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="nombre_p" class="block text-sm font-medium text-gray-700">Nombre: </label>
                <input type="text" name="nombre_p" id="nombre_p" placeholder="Ejem: Bruno Eber"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="dni_p" class="block text-sm font-medium text-gray-700">DNI: </label>
                <input type="text" name="dni_p" id="dni_p" placeholder="Ejem: 74851825"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="anoingreso_p" class="block text-sm font-medium text-gray-700">Año de Ingreso: </label>
                <input type="date" name="anoingreso_p" id="anoingreso_p" placeholder="Ejem: 2020"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="facultad_p" class="block text-sm font-medium text-gray-700">Facultad: </label>
                <input type="text" name="facultad_p" id="facultad_p" placeholder="Ejem: FIISI"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="area_p" class="block text-sm font-medium text-gray-700">Área: </label>
                <input type="text" name="area_p" id="area_p" placeholder="Ejem: Laboratorio"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="domicilio_p" class="block text-sm font-medium text-gray-700">Domicilio: </label>
                <input type="text" name="domicilio_p" id="domicilio_p" placeholder="Ejem: Av.Bellido"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="ncasa_p" class="block text-sm font-medium text-gray-700">N°/Mz/Lt: </label>
                <input type="text" name="ncasa_p" id="ncasa_p" placeholder="Ejem: MZ. G LOTE.10"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="distrito_p" class="block text-sm font-medium text-gray-700">Distrito:</label>
                <input type="text" name="distrito_p" id="distrito_p" placeholder="Ejem: Huacho"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="provincia_p" class="block text-sm font-medium text-gray-700">Provincia:</label>
                <input type="text" name="provincia_p" id="provincia_p" placeholder="Ejem: Huaura"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="referencia_p" class="block text-sm font-medium text-gray-700">Referencia:</label>
                <input type="text" name="referencia_p" id="referencia_p" placeholder="Ejem: Frente de un Parque"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="fijo_p" class="block text-sm font-medium text-gray-700">Teléfono Fijo:</label>
                <input type="text" name="fijo_p" id="fijo_p" placeholder="Ejem: 01 91 234 5678"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="celular_p" class="block text-sm font-medium text-gray-700">Celular:</label>
                <input type="text" name="celular_p" id="celular_p" placeholder="Ejem: 915334302"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="correo_p" class="block text-sm font-medium text-gray-700">Correo Electrónico:</label>
                <input type="email" name="correo_p" id="correo_p" placeholder="Ejem: 0332221014@unjfsc.edu.pe"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm"> 
            </div>
        </div>

        <div id="egresadoFields" style="display:none;" class="bg-white rounded-lg shadow-md p-6 space-y-6 w-full mx-auto">
            <h3 class="text-lg font-semibold text-blue-600" >Datos del Egresado</h3>
            <div>
                <label for="coduniversitario" class="block text-sm font-medium text-gray-700">Código Universitario:</label>
                <input type="text" name="coduniversitario" id="coduniversitario" placeholder="Ejem: 0332221014"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="apaterno_e" class="block text-sm font-medium text-gray-700" >Apellido Paterno:</label>
                <input type="text" name="apaterno_e" id="apaterno_e" placeholder="Ejem: Castillo"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="amaterno_e" class="block text-sm font-medium text-gray-700">Apellido Materno:</label>
                <input type="text" name="amaterno_e" id="amaterno_e" placeholder="Ejem: Robles"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="nombre_e" class="block text-sm font-medium text-gray-700">Nombres:</label>
                <input type="text" name="nombre_e" id="nombre_e" placeholder="Ejem: Bruno Eber"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="dni_e" class="block text-sm font-medium text-gray-700">DNI:</label>
               <input type="text" name="dni_e" id="dni_e" placeholder="Ejem: 74851825"
               class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="anoegreso_e" class="block text-sm font-medium text-gray-700" >Año de Egreso:</label>
                <input type="date" name="anoegreso_e" id="anoegreso_e" placeholder="Ejem: 2024"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="condicion_e" class="block text-sm font-medium text-gray-700" >Condición:</label>
                <input type="text" name="condicion_e" id="condicion_e" placeholder="Ejem: Egresado reciente"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="categoria_e" class="block text-sm font-medium text-gray-700" >Categoría:</label>
                <input type="text" name="categoria_e" id="categoria_e" placeholder="Ejem: nose XD"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="facultad_e" class="block text-sm font-medium text-gray-700">Facultad:</label>
                <input type="text" name="facultad_e" id="facultad_e" placeholder="Ejem: FIISI"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="escuela_e" class="block text-sm font-medium text-gray-700">Escuela:</label>
                <input type="text" name="escuela_e" id="escuela_e" placeholder="Ejem: Ingenieria de Sistemas"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="domicilio_e" class="block text-sm font-medium text-gray-700">Domicilio:</label>
                <input type="text" name="domicilio_e" id="domicilio_e" placeholder="Ejem: Av.Bellido"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="ncasa_e" class="block text-sm font-medium text-gray-700">N°/Mz/Lt:</label>
                <input type="text" name="ncasa_e" id="ncasa_e" placeholder="Ejem: MZ. G LOTE.10"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="distrito_e" class="block text-sm font-medium text-gray-700">Distrito:</label>
                <input type="text" name="distrito_e" id="distrito_e" placeholder="Ejem: Huacho"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="provincia_e" class="block text-sm font-medium text-gray-700">Provincia:</label>
                <input type="text" name="provincia_e" id="provincia_e" placeholder="Ejem: Huaura"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="referencia_e" class="block text-sm font-medium text-gray-700">Referencia:</label>
                <input type="text" name="referencia_e" id="referencia_e" placeholder="Ejem: Frente del Parque"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="fijo_e" class="block text-sm font-medium text-gray-700">Teléfono Fijo:</label>
                <input type="text" name="fijo_e" id="fijo_e" placeholder="Ejem: 01 91 234 5678"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="celular_e" class="block text-sm font-medium text-gray-700">Celular:</label>
                <input type="text" name="celular_e" id="celular_e" placeholder="Ejem: 915334302"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="correo_e" class="block text-sm font-medium text-gray-700">Correo Electrónico:</label>
                <input type="email" name="correo_e" id="correo_e" placeholder="Ejem: example@gmail.com"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
        </div>

        <div id="entidadFields" style="display:none;" class="bg-white rounded-lg shadow-md p-6 space-y-6 w-full mx-auto">
            <h3 class="text-lg font-semibold text-blue-600" >Datos de la Entidad</h3>
            <div>
                <label for="codentidad" class="block text-sm font-medium text-gray-700">Código de Entidad:</label>
                <input type="text" name="codentidad" id="codentidad" placeholder="Ejem: cod002105"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="ruc_ti" class="block text-sm font-medium text-gray-700">RUC:</label>
                <input type="text" name="ruc_ti" id="ruc_ti" placeholder="Ejem: 10603645948"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="representante_ti" class="block text-sm font-medium text-gray-700">Representante:</label>
                <input type="text" name="representante_ti" id="representante_ti" placeholder="Ejem: Director"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="razonsocial_ti" class="block text-sm font-medium text-gray-700">Razón Social:</label>
                <input type="text" name="razonsocial_ti" id="razonsocial_ti" placeholder="Ejem: Universidad"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="distrito_ti" class="block text-sm font-medium text-gray-700">Distrito:</label>
                <input type="text" name="distrito_ti" id="distrito_ti" placeholder="Ejem: Huacho"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="provincia_ti" class="block text-sm font-medium text-gray-700">Provincia:</label>
                <input type="text" name="provincia_ti" id="provincia_ti" placeholder="Ejem: Huaura"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="referencia_ti" class="block text-sm font-medium text-gray-700">Referencia:</label>
                <input type="text" name="referencia_ti" id="referencia_ti" placeholder="Ejem: Centro"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">   
            </div>
            <div>
                <label for="fijo_ti" class="block text-sm font-medium text-gray-700">Teléfono Fijo:</label>
                <input type="text" name="fijo_ti" id="fijo_ti" placeholder="Ejem: 01 91 234 5678"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="celular_ti" class="block text-sm font-medium text-gray-700">Celular:</label>
                <input type="text" name="celular_ti" id="celular_ti" placeholder="Ejem: 915334302"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label for="correo_ti" class="block text-sm font-medium text-gray-700">Correo Electrónico:</label>
                <input type="email" name="correo_ti" id="correo_ti" placeholder="Ejem: example@gmial.com"
                class="w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm">
            </div>
        </div>

        <br>
        <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700">
                Registrar
        </button>

    </form>
    </div>
</body>
</html>
