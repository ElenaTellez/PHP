<!DOCTYPE html>
<!--
RESULTADO EJERCICIO 3
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Resultado Ejercicio 3 Leccion 2</title>
    </head>
 <body>
    <?php
    $a = $_GET['a'];
    echo "$a PESETAS son ", round($a / 166.386, $precision = 2), " EUROS";
    ?>
</body>
</html> 

