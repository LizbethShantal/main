<?php 
include("conexion.php");
include("auth.php");
include("cabecera.php");
?>
<br><br>
<div>
    <form action="p_fut_alumno.php" method="post">
        <fieldset>DATOS PERSONALES
            <table align="center" width="600">
                <tr>
                    <td>Código alumno</td>
                    <td><input type="text" name="txtcodigo" required></td>
                </tr>
                <tr>
                    <td>Asunto</td>
                    <td><input type="text" name="txtasunto" style="width: 400px; height: 50px;" required></td>
                </tr>
                <tr>
                    <td>Descripción</td>
                    <td><textarea name="txtdescripcion" style="width: 400px; height: 100px;" required></textarea></td>
                </tr>
                <tr>
                    <td>Tipo de Trámite</td>
                    <td>
                        <select name="lsttramite" required>
                            <?php
                            $sql = "SELECT * FROM tipotramite";
                            $fila = mysqli_query($cn, $sql);

                            while ($tramite = mysqli_fetch_assoc($fila)) {
                                echo "<option value='{$tramite['idtramite']}'>{$tramite['nombretramite']}</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Área</td>
                    <td>
                        <select name="lstarea" required>
                            <?php
                            $sql = "SELECT * FROM area";
                            $fila = mysqli_query($cn, $sql);

                            while ($area = mysqli_fetch_assoc($fila)) {
                                echo "<option value='{$area['idarea']}'>{$area['nombrearea']}</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
            </table>
        </fieldset>
        <div align="center">
            <button type="submit">Enviar Trámite</button>
        </div>
    </form>
</div>
