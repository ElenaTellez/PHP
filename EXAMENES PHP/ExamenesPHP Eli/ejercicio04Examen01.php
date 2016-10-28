<!DOCTYPE html>
<!--
Crea un array bidimensional de 10 filas por 9 columnas relleno con números aleatorios entre 1 y 1000 (ambos
incluidos). Los números se pueden repetir. Se deben mostrar todos los números bien alineados en filas y columnas.
Muestra el máximo de entre los números capicúa en azul y los números adyacentes en verde. Si el máximo capicúa
se repite, se puede colorear uno cualquiera de ellos o todos, como al alumno le resulte más fácil.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            table, td, tr{
                border-collapse: collapse;
                border: 1px solid black;
                text-align: center;
            }
            #capicua{
                font-weight: bold;
            }
            #adyacente{
                color: red;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <p>
            Crea un array bidimensional de 10 filas por 9 columnas relleno con números aleatorios entre 1 y 1000 (ambos
            incluidos). Los números se pueden repetir. Se deben mostrar todos los números bien alineados en filas y columnas.
            Muestra el máximo de entre los números capicúa en azul y los números adyacentes en verde. Si el máximo capicúa
            se repite, se puede colorear uno cualquiera de ellos o todos, como al alumno le resulte más fácil.
        </p>
        <?php
            $arrayBidimensional;
            $maxCapicua = 0;
            $capicuaX;
            $capicuaY;
            echo "Array Original: <br>";
            echo "<table>";
            for($x = 0; $x < 10; $x++){
                echo "<tr>";
                for($i = 0; $i < 9; $i++){
                    //Genera el número aleatorio
                    $num = rand(1,1000);
                    //Coloca el número en el array
                    $arrayBidimensional[$x][$i] = $num;
                    //Se fija si es capicua
                    $capicuaString = "$num";
                    if($capicuaString== strrev($capicuaString)&&($capicuaString>$maxCapicua)){
                        $maxCapicua = $num;
                        $capicuaX = $x;
                        $capicuaY = $i;
                    }
                    //Lo muestra
                    echo "<td>", $arrayBidimensional[$x][$i],"</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            //Muestra el array con capicuas
            echo "Array Capicua: <br>";
            echo "<table>";
            for($x = 0; $x < 10; $x++){
                echo "<tr>";
                for($i = 0; $i < 9; $i++){
                    if((($x>=$capicuaX-1)&&($x<=$capicuaX+1))&&(($i>=$capicuaY-1)&&($i<=$capicuaY+1))){
                        if(($x==$capicuaX)&&($i==$capicuaY)){
                            echo "<td id=\"capicua\">", $arrayBidimensional[$x][$i],"</td>";
                        } else {
                            echo "<td id=\"adyacente\">", $arrayBidimensional[$x][$i],"</td>";
                        }
                    } else {
                        echo "<td>", $arrayBidimensional[$x][$i],"</td>";
                    }
                }
                echo "</tr>";
            }
            echo "</table>";
        ?>
    </body>
</html>
