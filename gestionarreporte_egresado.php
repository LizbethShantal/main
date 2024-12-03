<?php
include("conexion.php");
include("auth.php");
include("cabecera.php");
?>

<div align="center" style="margin-top: 20px;">
    <fieldset style="width: 50%; padding: 20px;">
        <legend><strong>Búsqueda de FUT</strong></legend>
        <form method="POST" action="">
            <table>
                <tr>
                    <td>Identificador del FUT:</td>
                    <td><input type="text" name="nfut" required></td>
                </tr>
                <tr>
                    <td>Contraseña:</td>
                    <td><input type="password" name="password" required></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <button type="submit" style="padding: 10px 20px; background-color: #007BFF; color: white; border: none; border-radius: 5px;">
                            Buscar
                        </button>
                    </td>
                </tr>
            </table>
        </form>
    </fieldset>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nfut = $_POST['nfut'];
    $password = $_POST['password'];

    // Verificar los datos ingresados
    $sql = "SELECT f.nfut, f.codusuario, f.asunto, f.descripcion, f.fecha, f.estado 
            FROM fut f
            INNER JOIN usuario u ON f.codusuario = u.codusuario
            WHERE f.nfut = '$nfut' AND u.password = '$password'";
    $result = mysqli_query($cn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
?>
        <div align="center" style="margin-top: 20px;">
            <fieldset style="width: 60%; padding: 20px;">
                <legend><strong>Información del FUT</strong></legend>
                <table border="1" cellspacing="0" cellpadding="5">
                    <tr>
                        <th>Identificador</th>
                        <td><?php echo htmlspecialchars($data['nfut']); ?></td>
                    </tr>
                    <tr>
                        <th>Código</th>
                        <td><?php echo htmlspecialchars($data['codusuario']); ?></td>
                    </tr>
                    <tr>
                        <th>Asunto</th>
                        <td><?php echo htmlspecialchars($data['asunto']); ?></td>
                    </tr>
                    <tr>
                        <th>Descripción</th>
                        <td><?php echo htmlspecialchars($data['descripcion']); ?></td>
                    </tr>
                    <tr>
                        <th>Fecha</th>
                        <td><?php echo htmlspecialchars($data['fecha']); ?></td>
                    </tr>
                    <tr>
                        <th>Estado</th>
                        <td><?php echo htmlspecialchars($data['estado']); ?></td>
                    </tr>
                </table>
                <br>
                <a href="generar_pdf_egresado.php?nfut=<?php echo $data['nfut']; ?>" target="_blank"
                   style="text-decoration: none; background-color: #28A745; color: white; padding: 10px 20px; border-radius: 5px;">
                    Generar PDF
                </a>
            </fieldset>
        </div>
<?php
    } else {
        echo "<div align='center' style='margin-top: 20px; color: red;'>No se encontraron resultados para los datos ingresados.</div>";
    }
}
?>
