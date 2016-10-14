

Ejercicio 7 <br>
Escribe un programa que genere 20 números enteros aleatorios entre 0 y 100 y que los almacene en
un array. El programa debe ser capaz de pasar todos los números pares a las primeras posiciones del
array (del 0 en adelante) y todos los números impares a las celdas restantes. Utiliza arrays auxiliares
si es necesario. <br><br><br>


        <?php
        $x = 0;
        $y = 0;
        for ($i= 0; $i < 20; $i++){
            $numero[$i] = rand(0, 100); // genero array de 20 numeros aleatorios
        
            if ($numero[$i]%2 == 0){ // los separo entre pares e impares
                $pares[$x] = $numero[$i];
                $x++;
            } else {
                $impares[$y] = $numero[$i];
                $y++;
                
            }
            
            echo "<span> $numero[$i] </span>";
        }
        
        echo "<br> Array Pares: <br>";
        
        for ($i= 0; $i < $x; $i++){
            echo "<span> $pares[$i] </span>";
        }
        
        echo "<br> Array impares: <br>";
        
        for ($i= 0; $i < $y; $i++){
            echo "<span> $impares[$i] </span>";
        }
        
        for ($i= 0; $i < $x; $i++){
            $final[$i] = $pares[$i]; //lleno array final con pares primero
        }
        
        
        
            for ($j= 0; $j < $y; $j++){
                $final[$x] = $impares[$j]; //lleno resto array final con impares 
                $x++;           
            }
        
        
        echo "<br><br><br> Array definitivo<br>";
        
        for ($i= 0; $i < 20; $i++){
            echo "<span> $final[$i] </span>";
            
        }
        
        
        ?>
