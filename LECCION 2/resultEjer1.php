<!DOCTYPE html>
<!--
Ejercicio 1
Realiza un programa que pida dos números
y luego muestre el resultado de su multiplicación.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 1 Leccion 2</title>
    </head>
 <body>
    <?php
    $a = $_GET['a'];
    $b = $_GET['b'];
    echo "La multiplicación de $a por $b es ", $a * $b;
    ?>
</body>
</html> 
