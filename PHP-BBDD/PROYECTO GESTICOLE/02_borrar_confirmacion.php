<?php
$dni = $_POST['dni'];
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$actividad = $_POST['actividad'];
?>
<div class="container">
    <h3 class="text-center">Se borrará el profesor seleccionado de la base de datos:</h3>
    <hr>
    <table  class="table table-striped">
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Actividad</th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <td><?= $dni ?></td>
            <td><?= $nombre ?></td>
            <td><?= $direccion ?></td>
            <td><?= $telefono ?></td>
            <td><?= $actividad ?></td>
        </tr>            
    </table>        
    <hr>¿Está seguro?

    <table>
        <tr>
            <td>
                <form action="pagina.php" method="post">
                    <input type="hidden" name="ejercicio" value="02">
                    <input type="hidden" name="dni" value="<?= $dni ?>">
                    <input type="hidden" name="accion" value="Eliminar">
                    <button type="submit" class="btn btn-primary">
                        Eliminar
                    </button>
                </form>
            </td>
            <td>&nbsp;</td>
            <td>
                <a class="btn btn-danger" href="pagina.php?ejercicio=02" role="button">Cancelar</a>
            </td>
        </tr>
    </table>
</div>
