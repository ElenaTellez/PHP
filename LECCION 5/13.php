<p><h3>Ejercicio 13</h3>
Rellena un array bidimensional de 6 filas por 9 columnas con números enteros positivos comprendi-
dos entre 100 y 999 (ambos incluidos). Todos los números deben ser distintos, es decir, no se puede
repetir ninguno. Muestra a continuación por pantalla el contenido del array de tal forma que se
cumplan los siguientes requisitos:<br>
• Los números de las dos diagonales donde está el mínimo deben aparecer en color verde.<br>
• El mínimo debe aparecer en color azul.<br>
• El resto de números debe aparecer en color negro.</p>


<?php
$contadorNumeros = 0;



do {
    $n = rand(100, 999); //creo y compruebo que los numeros del array no se repiten
    if (!in_array($n, $numeros)) {
        $numeros[] = $n;
        $contadorNumeros++;
            }
} while ($contadorNumeros < 54);

$minimo = 999; // establece el minimo
$i = 0;
for ($x = 0; $x < 6; $x++) {
    for ($y = 0; $y < 9; $y++) {
        $arrayBi[$x][$y] = $numeros[$i]; //convierte array uni en bi
        $i++;
        if ($arrayBi[$x][$y] < $minimo) { //busca el minimo
            $minimo = $arrayBi[$x][$y];
            $xMinimo = $x;
            $yMinimo = $y;
        }
    }
}

  echo "<table>";
  for ($x = 0; $x < 6; $x++) {
    echo "<tr>";
    for ($y = 0; $y < 9; $y++) {
      if ($arrayBi[$x][$y] == $minimo) { 
        echo '<td><span style="color: blue; font-weight:bold">'.$arrayBi[$x][$y].' </span></td>';
      } else if (abs((abs($x) - abs($xMinimo))) == abs((abs($y) - abs($yMinimo))))  {
        echo '<td><span style="color: green; font-weight:bold">'.$arrayBi[$x][$y].' </span></td>';
      } else {
        echo '<td>'.$arrayBi[$x][$y].'</td>';
      }
    }
    echo "</tr>";  
  }
  echo "</table>";
  
// Nota: abs($x) devuelve el valor absoluto de $x y de esta forma saco las dos diagonales 
 
 

    