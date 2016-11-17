<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PERFIL USUARIO DE ADMINISTRACION GESTICOLE</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
         <div class="container">
            <div class="jumbotron">
                <a  href="Alquiler de Castillos/index.php">Gestion de Castillos Hinchables</a>
            </div>
        <div class="container">
            <div class="jumbotron">
                <h3 class="text-center">Claustro de Profesores</h3>
            </div>

            <?php
            try {
                $conexion = new PDO("mysql:host=localhost;dbname=gesticole;charset=utf8", "root", "root");
            } catch (PDOException $e) {
                echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                die("Error: " . $e->getMessage());
            }

            $consulta = $conexion->query("SELECT dni, nombre, direccion, telefono, actividad FROM profesor");

            if (!isset($_SESSION['pagina'])) {
                $_SESSION['pagina'] = 1;
            }

            if ($_POST['accion'] == "Nuevo unProfesor") {

                // Comprueba si ya existe un  Profesor con el DNI introducido
                $consulta = $conexion->query("SELECT dni FROM profesor WHERE dni=" . $_POST['dni']);

                if ($consulta->rowCount() > 0) {
                    echo '<script type="text/javascript">alert("Lo siento, ese DNI ya existe en la base de datos");</script>';
                } else {
                    $insercion = "INSERT INTO profesor (dni, nombre, direccion, telefono, actividad) VALUES ('$_POST[dni]','$_POST[nombre]','$_POST[direccion]','$_POST[telefono]','$_POST[actividad]')";
                    //echo $insercion;
                    $conexion->exec($insercion);
                    echo "<h2>Profesor dado de alta correctamente.</h2>";
                }
            }

            if ($_POST['accion'] == "Modificar") {
                $modifica = "UPDATE profesor SET  nombre=\"$_POST[nombre]\", direccion=\"$_POST[direccion]\", telefono=\"$_POST[telefono]\", actividad=\"$_POST[actividad]\"WHERE dni=\"$_POST[dni]\"";
                $conexion->exec($modifica);
            }

            if ($_POST['accion'] == "Eliminar") {
                $borra = "DELETE FROM profesor WHERE dni=\"$_POST[dni]\"";
                $conexion->exec($borra);
            }

// Determina la página que se muestra
            $listadoProfesores = "SELECT dni, nombre, direccion, telefono FROM profesor";
            $consulta = $conexion->query("SELECT dni, nombre, direccion, telefono FROM profesor");
            $numProfes = $consulta->rowCount();
            $numPaginas = floor(abs($numProfes - 1) / 5) + 1;

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
                    <th>Actividad</th>
                    <th></th>
                    <th></th>
                </tr>

                <?php
                $listadoProfes = "SELECT dni, nombre, direccion, telefono,actividad FROM profesor ORDER BY nombre LIMIT " . (($_SESSION['pagina'] - 1) * 5) . ", 5";
                $consulta = $conexion->query("SELECT dni, nombre, direccion, telefono, actividad FROM profesor");

                while ($unProfesor = $consulta->fetchObject()) {
                    ?>
                    <tr>
                        <td><?= $unProfesor->dni ?></td>
                        <td><?= $unProfesor->nombre ?></td>
                        <td><?= $unProfesor->direccion ?></td>
                        <td><?= $unProfesor->telefono ?></td>
                        <td><?= $unProfesor->actividad ?></td>
                        <td>
                            <form action="pagina.php" method="post">
                                <input type="hidden" name="ejercicio" value="02_borrar_confirmacion">
                                <input type="hidden" name="dni" value="<?= $unProfesor->dni ?>">  
                                <input type="hidden" name="nombre" value="<?= $unProfesor->nombre ?>">
                                <input type="hidden" name="direccion" value="<?= $unProfesor->direccion ?>">
                                <input type="hidden" name="telefono" value="<?= $unProfesor->telefono ?>">
                                <input type="hidden" name="actividad" value="<?= $unProfesor->actividad ?>">
                                <input type="hidden" name="accion" value="Eliminar">
                                <button type="submit" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span> Eliminar
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="pagina.php" method="post">
                                <input type="hidden" name="ejercicio" value="02_modificar_unProfesor">
                                <input type="hidden" name="dni" value="<?= $unProfesor->dni ?>">  
                                <input type="hidden" name="nombre" value="<?= $unProfesor->nombre ?>">
                                <input type="hidden" name="direccion" value="<?= $unProfesor->direccion ?>">
                                <input type="hidden" name="telefono" value="<?= $unProfesor->telefono ?>">
                                <input type="hidden" name="actividad" value="<?= $unProfesor->actividad ?>">
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


                    <!-- Añadir un nuevo unProfesor /////////////////////////////////-->
                <form action="pagina.php" method="post">
                    <input type="hidden" name="ejercicio" value="02">
                    <input type="hidden" name="accion" value="Nuevo unProfesor">
                    <tr>
                        <td><input type="text" name="dni" size="10" required="required"></td>
                        <td><input type="text" name="nombre" required="required"></td>
                        <td><input type="text" name="direccion"></td>
                        <td><input type="text" name="telefono"  size="12" required="required"></td>
                        <td><input type="text" name="actividad"  size="12" required="required"></td>
                        <td colspan="2">
                            <button type="submit" class="btn btn-success">
                                <span class="glyphicon glyphicon-ok"></span> Nuevo profesor
                            </button>
                        </td>

                    </tr>
                </form>
            </table>
            <div class="jumbotron">
                <h3 class="text-center">Listado de Alumnos</h3>
            </div>

            <?php
            

            $consultaDos = $conexion->query("SELECT dni, nombre, colegio, edad, curso, actividad FROM alumno");

            if (!isset($_SESSION['paginaDos'])) {
                $_SESSION['paginaDos'] = 1;
            }

            if ($_POST['accion'] == "Nuevo unAlumno") {

                // Comprueba si ya existe   unAlumno con el DNI introducido
                $consultaDos = $conexion->query("SELECT dni FROM alumno WHERE dni=" . $_POST['dni']);

                if ($consultaDos->rowCount() > 0) {
                    echo '<script type="text/javascript">alert("Lo siento, ese DNI ya existe en la base de datos");</script>';
                } else {
                    $insercion = "INSERT INTO alumno (dni, nombre, colegio, edad, curso, actividad) VALUES ('$_POST[dni]', '$_POST[nombre]','$_POST[colegio]','$_POST[edad]','$_POST[curso]','$_POST[actividad]')";
                    //echo $insercion;
                    $conexion->exec($insercion);
                    echo "<h2>Alumno dado de alta correctamente.</h2>";
                }
            }

            if ($_POST['accion'] == "Modificar") {
                $modifica = "UPDATE alumno SET  nombre=\"$_POST[nombre]\", nombre=\"$_POST[colegio]\", edad=\"$_POST[edad]\", curso=\"$_POST[curso]\", actividad=\"$_POST[actividad]\"WHERE dni=\"$_POST[dni]\"";
                $conexion->exec($modifica);
            }

            if ($_POST['accion'] == "Eliminar") {
                $borra = "DELETE FROM alumno WHERE dni=\"$_POST[dni]\"";
                $conexion->exec($borra);
            }

// Determina la página que se muestra
            $listadoAlumnos = "SELECT dni, nombre, colegio, edad, curso, actividad FROM alumno";
            $consultaDos = $conexion->query("SELECT dni, nombre, colegio, edad, curso, actividad FROM alumno");
            $numAlum = $consultaDos->rowCount();
            $numPaginas = floor(abs($numAlum - 1) / 5) + 1;

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
                    <th>Colegio</th>
                    <th>Edad</th>
                    <th>Curso</th>
                    <th>Actividad</th>
                    <th></th>
                    <th></th>
                </tr>

                <?php
                $listadoAlum = "SELECT dni, nombre, edad, curso,actividad FROM alumno ORDER BY nombre LIMIT " . (($_SESSION['pagina'] - 1) * 5) . ", 5";
                $consulta = $conexion->query("SELECT dni, nombre, colegio, edad, curso, actividad FROM alumno");

                while ($unAlumno = $consulta->fetchObject()) {
                    ?>
                    <tr>
                        <td><?= $unAlumno->dni ?></td>
                        <td><?= $unAlumno->nombre ?></td>
                        <td><?= $unAlumno->colegio ?></td>
                        <td><?= $unAlumno->edad ?></td>
                        <td><?= $unAlumno->curso ?></td>
                        <td><?= $unAlumno->actividad ?></td>
                        <td>
                            <form action="pagina.php" method="post">
                                <input type="hidden" name="ejercicio" value="02_borrar_alumno">
                                <input type="hidden" name="dni" value="<?= $unAlumno->dni ?>">  
                                <input type="hidden" name="nombre" value="<?= $unAlumno->nombre ?>">
                                <input type="hidden" name="colegio" value="<?= $unAlumno->colegio ?>">
                                <input type="hidden" name="edad" value="<?= $unAlumno->edad ?>">
                                <input type="hidden" name="curso" value="<?= $unAlumno->curso ?>">
                                <input type="hidden" name="actividad" value="<?= $unAlumno->actividad ?>">
                                <input type="hidden" name="accion" value="Eliminar">
                                <button type="submit" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span> Eliminar
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="pagina.php" method="post">
                                <input type="hidden" name="ejercicio" value="02_modificar_unAlumno">
                                <input type="hidden" name="dni" value="<?= $unAlumno->dni ?>">  
                                <input type="hidden" name="nombre" value="<?= $unAlumno->nombre ?>">
                                <input type="hidden" name="colegio" value="<?= $unAlumno->nombre ?>">
                                <input type="hidden" name="edad" value="<?= $unAlumno->edad ?>">
                                <input type="hidden" name="curso" value="<?= $unAlumno->curso ?>">
                                <input type="hidden" name="actividad" value="<?= $unAlumno->actividad ?>">
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


                    <!-- Añadir un nuevo unAlumno /////////////////////////////////-->
                <form action="pagina.php" method="post">
                    <input type="hidden" name="ejercicio" value="02">
                    <input type="hidden" name="accion" value="Nuevo unAlumno">
                    <tr>
                        <td><input type="text" name="dni" size="10" required="required"></td>
                        <td><input type="text" name="nombre" required="required"></td>
                        <td><input type="text" name="colegio" required="required"></td>
                        <td><input type="text" name="edad" required="required"></td>
                        <td><input type="text" name="curso"  size="12" required="required"></td>
                        <td><input type="text" name="actividad"  size="12" required="required"></td>
                        <td colspan="2">
                            <button type="submit" class="btn btn-success">
                                <span class="glyphicon glyphicon-ok"></span> Nuevo Alumno
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
