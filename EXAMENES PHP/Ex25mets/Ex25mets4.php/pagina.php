<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/default.css" rel="stylesheet" type="text/css" />
        <title>Tienda on-line simple</title>
    </head>
<body>
   
    <div>
        <?php
          include $_REQUEST['ejercicio'].'.php';
        ?>
    </div>
  </body>
</html>
