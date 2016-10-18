<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse:collapse;
                padding: 4px;
            }

            img {
                width: 50px;
                height: 50px;
            }

            #blanco{
                background-color:white;
                width: 50px;
                height: 50px;
            }

            #negro{
                background-color:blue;
                width: 50px;
                height: 50px;
            }
        </style>
    </head>
    <body>

        <?php
        $posicion = $_GET['posicion'];
        $columna = ord(substr($posicion, 0, 1)) - ord('a');
        $fila = 8-substr($posicion, 1, 1);
        //substr — Devuelve parte de una cadena por ejemplo echo substr('abcdef', 1, 3);  devuelve bcd

        echo "<table>";
        echo '<td></td><td>a</td><td>b</td><td>c</td><td>d</td><td>e</td><td>f</td><td>g</td><td>h</td></tr>';
        for ($x = 0; $x < 8; $x++) {
            echo '<tr><td>' . (8-$x) . '</td>';
            for ($y = 0; $y < 8; $y++) {
                if ((($x) == $fila) && ($y == $columna)) {
                    echo '<td><img src="alfil.png"></td>';
                } else if (abs((abs($x) - abs($fila))) == abs((abs($y) - abs($columna)))) {
                    echo '<td><img src="alfil.png"></td>';
                } else if (($x % 2 == 0) && ($y % 2 == 0)) {
                    echo '<td id="blanco"></td>';
                } else if (($x % 2 != 0) && ($y % 2 != 0)) {
                    echo '<td id="blanco"></td>';
                } else {
                    echo '<td id="negro"></td>';
                }
            }
        }

        echo "</table>";
        ?>
        <br>
        Introduzca las coordenadas del alfil (por ejemplo a5)
        <br>
        <form action="#" method="get">
            <input type="text" name="posicion" autofocus="" required=""><br>
            <input type="submit" value="Aceptar">
        </form>


    </body>
</html>
