<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Capítulo 7 - Acceso a Bases de Datos</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    
    <nav class="navbar navbar-inverse">
      <div class="container">
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Pagina principal</a></li>
            <li><a href="https://github.com/LuisJoseSanchez/aprende-php-con-ejercicios">GitHub</a></li>
            <li><a href="#"></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<?php
  if (!isset($_SESSION['logueado'])) {
    $_SESSION['logueado'] = false;
  } 
  
  // Formulario de login
  if (!$_SESSION['logueado']) {
  ?>
    <p>Debe iniciar sesión para acceder a la aplicación.</p>
    <form action="pagina.php" method="post">
      <input type="hidden" name="ejercicio" value="index">
      Usuario: <input type="text" name="usuario" autofocus><br>
      Contraseña: <input type="password" name="contrasena"><br><br>
      <input type="submit" value="Iniciar sesión">
    </form>
    <br>
  <?php
  }

  // Comprueba nombre de usuario y contraseña
  if (isset($_POST['usuario'])) {
    
    try {
                $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "root");
            } catch (PDOException $e) {
                echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                die("Error: " . $e->getMessage());
            }
            
            $dni = $_POST['contrasena'];
            $consultaDni = "SELECT nombre FROM cliente WHERE dni =\"$dni\"";
            echo $consultaDni;
            $consulta = $conexion->query($consultaDni);
            $cliente = $consulta->fetchObject();
            
            
    if ($_POST['usuario'] == $cliente->nombre)  {
      $_SESSION['logueado'] = true;
      echo '<span style="color: red">CONSEGUIDO.</span><br><br>';
      header("Refresh: 3; url=pagina.php?ejercicio=02", true, 303); // recarga la página
    } else {
      echo '<span style="color: red">Contraseña incorrecta. Inténtelo de nuevo.</span><br><br>';
    }
  }
  
  
?>
              
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
