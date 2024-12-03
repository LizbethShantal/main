<?php
include 'conexion.php'; // Conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo_usu'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];

    // Insertar en la tabla usuario
    $queryUsuario = "INSERT INTO usuario (codusuario, password, rol) VALUES ('$codigo', '$password', '$rol')";
    $resultUsuario = mysqli_query($cn, $queryUsuario);

    if ($resultUsuario) {
        $idusuario = mysqli_insert_id($cn); // Obtener ID generado

        if ($rol === 'alumno') {
            $codalumno = $_POST['codalumno'];
            $apaterno_a = $_POST['apaterno_a'];
            $amaterno_a = $_POST['amaterno_a'];
            $nombre_a = $_POST['nombre_a'];
            $dni_a = $_POST['dni_a'];
            $anoingreso_a = $_POST['ano_a'];
            $modalidad_a = $_POST['modalidad_a'];
            $ciclo_a = $_POST['ciclo_a'];
            $facultad_a = $_POST['facultad_a'];
            $escuela_a = $_POST['escuela_a'];
            $domicilio_a = $_POST['domicilio_a'];
            $ncasa_a = $_POST['ncasa_a'];
            $distrito_a = $_POST['distrito_a'];
            $provincia_a = $_POST['provincia_a'];
            $referencia_a = $_POST['referencia_a'];
            $fijo_a = $_POST['fijo_a'];
            $celular_a = $_POST['celular_a'];
            $correo_a = $_POST['correo_a'];
            

            $queryRol = "INSERT INTO alumno (codalumno, apaterno_a, amaterno_a, nombre_a, dni_a, anoingreso_a, modalidad_a, ciclo_a, facultad_a, escuela_a, domicilio_a, ncasa_a, distrito_a, provincia_a, referencia_a, fijo_a, celular_a, correo_a) 
                         VALUES ('$codalumno', '$apaterno_a', '$amaterno_a', '$nombre_a', '$dni_a', '$anoingreso_a', '$modalidad_a', '$ciclo_a', '$facultad_a', '$escuela_a', '$domicilio_a', '$ncasa_a', '$distrito_a', '$provincia_a', '$referencia_a', '$fijo_a', '$celular_a','$correo_a')";

        } elseif ($rol === 'personal') {
            // Datos de la empresa
            $codadministrativo  = $_POST['codadministrativo'];
            $apaterno_p = $_POST['apaterno_p'];
            $amaterno_p = $_POST['amaterno_p'];
            $nombre_p = $_POST['nombre_p'];
            $dni_p = $_POST['dni_p'];
            $anoingreso_p = $_POST['anoingreso_p'];
            $facultad_p = $_POST['facultad_p'];
            $area_p = $_POST['area_p'];
            $domicilio_p = $_POST['domicilio_p'];
            $ncasa_p = $_POST['ncasa_p'];
            $distrito_p = $_POST['distrito_p'];
            $provincia_p = $_POST['provincia_p'];
            $referencia_p = $_POST['referencia_p'];
            $fijo_p = $_POST['fijo_p'];
            $celular_p = $_POST['celular_p'];
            $correo_p = $_POST['correo_p'];
            

            $queryRol = "INSERT INTO personal (codadministrativo ,apaterno_p ,amaterno_p,nombre_p,dni_p,anoingreso_p,facultad_p,area_p,domicilio_p,ncasa_p,distrito_P,provincia_p,referencia_p,fijo_p,celular_p,correo_p) 
                         VALUES ('$codadministrativo', '$apaterno_p', '$amaterno_p', '$nombre_p', '$dni_p', '$anoingreso_p', '$facultad_p', '$area_p', '$domicilio_p', '$ncasa_p', '$distrito_p', '$provincia_p', '$referencia_p', '$fijo_p', '$celular_p', '$correo_p')";

        } elseif ($rol === 'entidad') {
            // Datos de la empresa
            $codentidad = $_POST['codentidad'];
            $ruc_ti = $_POST['ruc_ti'];
            $representante_ti = $_POST['representante_ti'];
            $razonsocial_ti = $_POST['razonsocial_ti'];
            $distrito_ti = $_POST['distrito_ti'];
            $provincia_ti = $_POST['provincia_ti'];
            $referencia_ti = $_POST['referencia_ti'];
            $fijo_ti = $_POST['fijo_ti'];
            $celular_ti = $_POST['celular_ti'];
            $correo_ti = $_POST['correo_ti'];
            

            $queryRol = "INSERT INTO entidad (codentidad, ruc_ti, representante_ti, razonsocial_ti, distrito_ti, provincia_ti, referencia_ti, fijo_ti, celular_ti, correo_ti) 
                         VALUES ('$codentidad', '$ruc_ti', '$representante_ti', '$razonsocial_ti', '$distrito_ti', '$provincia_ti', '$referencia_ti', '$fijo_ti', '$celular_ti', '$correo_ti')";
        }
        else if ($rol === 'egresado') {
        // Datos de la empresa
        $coduniversitario  = $_POST['coduniversitario'];
        $apaterno_e = $_POST['apaterno_e'];
        $amaterno_e = $_POST['amaterno_e'];
        $nombre_e = $_POST['nombre_e'];
        $dni_e = $_POST['dni_e'];
        $anoegreso_e = $_POST['anoegreso_e'];
        $condicion_e = $_POST['condicion_e'];
        $categoria_e = $_POST['categoria_e'];
        $facultad_e = $_POST['facultad_e'];
        $escuela_e = $_POST['escuela_e'];
        $domicilio_e = $_POST['domicilio_e'];
        $ncasa_e = $_POST['ncasa_e'];
        $distrito_e = $_POST['distrito_e'];
        $provincia_e = $_POST['provincia_e'];
        $referencia_e = $_POST['referencia_e'];
        $fijo_e = $_POST['fijo_e'];
        $celular_e = $_POST['celular_e'];
        $correo_e = $_POST['correo_e'];
        
        $queryRol = "INSERT INTO egresado (coduniversitario,apaterno_e ,amaterno_e,nombre_e,dni_e,anoegreso_e,condicion_e,categoria_e,facultad_e,escuela_e,domicilio_e,ncasa_e,distrito_e,provincia_e,referencia_e,fijo_e,celular_e,correo_e) 
                     VALUES ('$coduniversitario', '$apaterno_e', '$amaterno_e', '$nombre_e', '$dni_e', '$anoegreso_e', '$condicion_e', '$categoria_e', '$facultad_e', '$escuela_e', '$domicilio_e', '$ncasa_e', '$distrito_e', '$provincia_e', '$referencia_e', '$fijo_e', '$celular_e', '$correo_e')"; 
                     }

        



        $resultRol = mysqli_query($cn, $queryRol);

        if ($resultRol) {
            echo "Registro exitoso. <a href='login.php'>Iniciar Sesión</a>";
        } else {
            echo "Error al registrar en la tabla específica del rol.";
        }
    } else {
        echo "Error al registrar usuario.";}
}
?>