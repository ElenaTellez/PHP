<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../../css/estilos.css" />
        <title>Listado de Castillos Hinchables</title>

    </head>
    <body>
        <div id="encabezado">
            <div id="header">    
                <h1>NOVEDAD: Alquiler de Castillos Hinclables</h1>
                  <a  href="../../02.php">Volver a Gestion Claustro y Alumnos</a>
            </div>
        </div>

        <div id="contenido">
            <a href="../Controller/nuevoCastillo.php">Nuevo Castillo</a>
            <hr>

            <div class="contenido">
                <?php
                foreach ($data['castillos'] as $castillo) {
                    ?><table id="libre">
                        <td><h3><?= $castillo->getTitulo() ?></h3></td>

                        <td><img src="../View/images/<?= $castillo->getImagen() ?>" width="400"></td>
                        <td><p><?= $castillo->getDescripcion() ?></p></td>
                        <td><a href="../Controller/borraCastillo.php?id=<?= $castillo->getId() ?>">Borrar</a></td>
                    </table>
                    <?php
                }
                ?>
            </div>  
        </div>

    </body>
</html>
