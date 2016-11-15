<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Capítulo 8 - Acceso a Bases de Datos</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <h3 class="text-center">Mantemiento de clientes</h3>
            <?php
            try {
                $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "root");
            } catch (PDOException $e) {
                echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                die("Error: " . $e->getMessage());
            }

            $consulta = $conexion->query("SELECT dni, nombre, direccion, telefono FROM cliente");

            if (!isset($_SESSION['pagina'])) {
                $_SESSION['pagina'] = 1;
            }

            if ($_POST['accion'] == "Nuevo cliente") {

                // Comprueba si ya existe un cliente con el DNI introducido
                $consulta = $conexion->query("SELECT dni FROM cliente WHERE dni=" . $_POST['dni']);
                
                if ($consulta->rowCount() > 0) {
                    echo '<script type="text/javascript">alert("Lo siento, ese DNI ya existe en la base de datos");</script>';
                } else {
                    $insercion = "INSERT INTO cliente (dni, nombre, direccion, telefono) VALUES ('$_POST[dni]','$_POST[nombre]','$_POST[direccion]','$_POST[telefono]')";
                    //echo $insercion;
                    $conexion->exec($insercion);
                    echo "Cliente dado de alta correctamente.";
                }
            }

            if ($_POST['accion'] == "Modificar") {
                $modifica = "UPDATE cliente SET  nombre=\"$_POST[nombre]\", direccion=\"$_POST[direccion]\", telefono=\"$_POST[telefono]\" WHERE dni=\"$_POST[dni]\"";
                $conexion->exec($modifica);
            }

            if ($_POST['accion'] == "Eliminar") {
                $borra = "DELETE FROM cliente WHERE dni=\"$_POST[dni]\"";
                $conexion->exec($borra);
            }

// Determina la página que se muestra
            $listadoClientes = "SELECT dni, nombre, direccion, telefono FROM cliente";
            $consulta = $conexion->query("SELECT dni, nombre, direccion, telefono FROM cliente");
            $numClientes = $consulta->rowCount();
            $numPaginas = floor(abs($numClientes - 1) / 5) + 1;

            $pagina = $_POST['pagina'];

            if ($pagina == "Primera") {
                $_SESSION['pagina'] = 1;
            }

            if (($pagina == "Anterior") && ($_SESSION['pagina'] > 1)) {
                $_SESSION['pagina'] --;
            }

            if (($pagina == "Siguiente") && ($_SESSION['pagina'] < $numPaginas)) {
                $_SESSION['pagina'] ++;
            }

            if ($pagina == "Ultima") {
                $_SESSION['pagina'] = $numPaginas;
            }


// Listado /////////////////////////////////////////////////
            ?>

            <table  class="table table-striped">
                <tr>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th></th>
                    <th></th>
                </tr>

                <?php
                $listadoClientes = "SELECT dni, nombre, direccion, telefono FROM cliente ORDER BY nombre LIMIT " . (($_SESSION['pagina'] - 1) * 5) . ", 5";
                $consulta = $conexion->query("SELECT dni, nombre, direccion, telefono FROM cliente");

                while ($cliente = $consulta->fetchObject()) {
                    ?>
                    <tr>
                        <td><?= $cliente->dni ?></td>
                        <td><?= $cliente->nombre ?></td>
                        <td><?= $cliente->direccion ?></td>
                        <td><?= $cliente->telefono ?></td>
                        <td>
                            <form action="pagina.php" method="post">
                                <input type="hidden" name="ejercicio" value="02_borrar_confirmacion">
                                <input type="hidden" name="dni" value="<?= $cliente->dni ?>">  
                                <input type="hidden" name="nombre" value="<?= $cliente->nombre ?>">
                                <input type="hidden" name="direccion" value="<?= $cliente->direccion ?>">
                                <input type="hidden" name="telefono" value="<?= $cliente->telefono?>">
                                <input type="hidden" name="accion" value="Eliminar">
                                <button type="submit" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span> Eliminar
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="pagina.php" method="post">
                                <input type="hidden" name="ejercicio" value="02_modificar_cliente">
                                <input type="hidden" name="dni" value="<?= $cliente->dni ?>">  
                                <input type="hidden" name="nombre" value="<?= $cliente->nombre ?>">
                                <input type="hidden" name="direccion" value="<?= $cliente->direccion ?>">
                                <input type="hidden" name="telefono" value="<?= $cliente->telefono?>">
                                <button type="submit" class="btn btn-warning">
                                    <span class="glyphicon glyphicon-pencil"></span> Modificar
                                </button>
                            </form>
                        </td>            
                    </tr>
                    <?php
                }
                ?>

                <!-- Botones para pasar las páginas -->
                <tr><td>Página <?= $_SESSION['pagina'] ?> de <?= $numPaginas ?></td>
                    <!-- Primera -->
                    <td>
                        <form action="pagina.php" method="post">
                            <input type="hidden" name="ejercicio" value="02">
                            <button type="submit" name="pagina" value="Primera">
                                <span class="glyphicon glyphicon-step-backward"></span>
                                Primera
                            </button>
                        </form>
                    </td>
                    <!-- Anterior -->
                    <td>
                        <form action="pagina.php" method="post">
                            <input type="hidden" name="ejercicio" value="02">
                            <button type="submit" name="pagina" value="Anterior">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                Anterior
                            </button>
                        </form>
                    </td>
                    <!-- Siguiente -->
                    <td>
                        <form action="pagina.php" method="post">
                            <input type="hidden" name="ejercicio" value="02">
                            <button type="submit" name="pagina" value="Siguiente">
                                Siguiente
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </button>
                        </form>
                    </td>
                    <!-- Última -->
                    <td>
                        <form action="pagina.php" method="post">
                            <input type="hidden" name="ejercicio" value="02">
                            <button type="submit" name="pagina" value="Ultima">
                                Última
                                <span class="glyphicon glyphicon-step-forward"></span>
                            </button>
                        </form>
                    </td>      


                    <!-- Añadir un nuevo cliente /////////////////////////////////-->
                <form action="pagina.php" method="post">
                    <input type="hidden" name="ejercicio" value="02">
                    <input type="hidden" name="accion" value="Nuevo cliente">
                    <tr>
                        <td><input type="text" name="dni" size="10"></td>
                        <td><input type="text" name="nombre"></td>
                        <td><input type="text" name="direccion"></td>
                        <td><input type="text" name="telefono"  size="12"></td>
                        <td colspan="2">
                            <button type="submit" class="btn btn-success">
                                <span class="glyphicon glyphicon-ok"></span> Nuevo cliente
                            </button>
                        </td>

                    </tr>
                </form>
            </table>
        </div>
        <script src="js/jquery-2.1.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
