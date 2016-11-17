<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gesticole</title>
        <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    </head>
    <body>
        <div id="encabezado">

            <div id="header" >
                <img src="img/logo.jpg" alt=""/>
                <h1>GESTICOLE</h1>
            </div>

            <div class="login">
                <p>Acceso zona usuarios</p>
                <form action="pagina.php" method="post">
                    <table>    
                        <tr>   
                            <td id="libre"> <input type="hidden" name="ejercicio" value="index">
                                <label for="usuario">Usuario</label> </td>   
                            <td id="libre">   <input type="text" name="usuario" required="required" autofocus> 
                        </tr>
                        <tr>
                            <td id="libre"><label for="clave">Contraseña</label></td>                   
                            <td id="libre"><input type="password" name="contrasena" required="required"></td>
                        </tr> 
                        <tr>
                            <td id="libre"> <a href="02_alta_usuario.php" class="boton">Nuevo Registro </a></td>                   
                            <td id="libre"> <input type="submit" value="Iniciar sesión"></td>
                        </tr> 
                    </table>
                </form>

            </div>
        </div>
        <div id="contenido">
            <div class="menu">
                <ul>
                    <li><a href="#">Actividades deportivas</a></li>
                    <li><a href="#">Refuerzo educativo</a></li>
                    <li><a href="#">Viaje fin de curso</a></li>					
                    <li><a href="#">Novedad: Alquiler de castillos hinchables</a></li>
                    <li><a href="#">Campamento de Verano</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </div>

        </div>



        <?php
        if (!isset($_SESSION['logueado'])) {
            $_SESSION['logueado'] = false;
        }


        if (!$_SESSION['logueado']) {
            
        }

        // Comprueba nombre de usuario y contraseña. Ademas se controla los accesos a
        // información o datos de administrador de la página
        
        if (isset($_POST['usuario'])) {

            try {
                $conexion = new PDO("mysql:host=localhost;dbname=gesticole;charset=utf8", "root", "root");
            } catch (PDOException $e) {
                echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                die("Error: " . $e->getMessage());
            }

            $contrasena = $_POST['contrasena'];
            $consultaClave = "SELECT usuario FROM acceso WHERE clave =\"$contrasena\"";
            echo $consultaClave;
            $consulta = $conexion->query($consultaClave);
            $visita = $consulta->fetchObject();
            
            $consultaTipo = "SELECT tipo FROM acceso WHERE clave =\"$contrasena\"";
            echo $consultaTipo;
            $consulta = $conexion->query($consultaTipo);
            $perfil = $consulta->fetchObject();

            if (($_POST['usuario'] == $visita->usuario) && ($perfil->tipo == 'administra')){
                $_SESSION['logueado'] = true;
              
                header("Refresh: 1; url=pagina.php?ejercicio=02", true, 303); // recarga la página
            } else {
                echo '<script type="text/javascript">alert("Contraseña o usuario incorrecto");</script>';
            }
        }
        ?>

    </body>
</html>

