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
    <div id="encabezado">
    
        <?php
          include $_REQUEST['ejercicio'].'.php';
        ?>
        
    </div>
 
    <div id="footer">
      <p class="text-center">© María Elena Téllez Santana</p>
    </div>
    
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
