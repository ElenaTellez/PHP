<!DOCTYPE html>
<!--
Ejercicio 4
Escribe un programa que sume, reste, multiplique y divida 
dos números introducidos por teclado.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 4 Leccion 2</title>
    </head>
 <body>
    <h3>Suma, Resta, Multiplicación y División</h3>
    <?php
    $a = $_GET['a'];
    $b = $_GET['b'];
    echo "Suma: $a + $b = ", $a+$b, "<br>";
    echo "Resta: $a - $b = ", $a-$b , "<br>";
    echo "Multiplicación: $a x $b = ", $a*$b, "<br>";
    echo "División: $a / $b = ", round($a/$b, $precision = 2);
    ?>
</body>
</html> 
