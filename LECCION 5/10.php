<!DOCTYPE html>
<!--
Ejercicio 10
Realiza un programa que escoja al azar 10 cartas de la baraja española y que diga cuántos puntos
suman según el juego de la brisca. Emplea un array asociativo para obtener los puntos a partir del
nombre de la figura de la carta. Asegúrate de que no se repite ninguna carta, igual que si las hubieras
cogido de una baraja de verdad.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 10: Baraja Española</title>
    </head>
    <body>
       <?php
    $puntuacion = array ( //Array asociativo
      'as' => 11, 'dos' => 0, 'tres' => 10, 'cuatro' => 0, 'cinco' => 0,
      'seis' => 0, 'siete' => 0, 'sota' => 2, 'caballo' => 3, 'rey' => 4);
    
    $palo = array ('oros', 'copas', 'bastos', 'espadas');
    
    $figura = array ('as', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'sota', 'caballo', 'rey');
    
    $cartasEchadas = "";
    $contadorCartasEchadas = 0;
    $puntosTotales = 0;

    do {
      $paloCarta = $palo[rand(0, 3)]; //de forma aleatoria decide palo 
      
      $figuraCarta = $figura[rand(0, 9)];// de forma aleatoria decide figura
      
      $puntosCarta = $puntuacion[$figuraCarta]; //cuento los puentos segun la figura que salga
      
      $nombreCarta = "$figuraCarta de $paloCarta";  // variable string con figura y palo de cada carta
      
      if (!in_array($nombreCarta, $cartasEchadas)) { //comprueba que la carta no se repite
          //se trata de un array que contiene otro array
        echo "$nombreCarta - $puntosCarta puntos<br>"; // muestro la carta no repetida
        $cartasEchadas[] = $nombreCarta; // la meto en un array en el q compruebo que no saco la misma carta
        $contadorCartasEchadas++; // contador que para cuando llego a 10 cartas echadas
        $puntosTotales += $puntosCarta; // suma puntos carta
      }
    } while ($contadorCartasEchadas < 10); 

    echo "<br><b>Total: $puntosTotales puntos</b>";
    ?>
    </body>
</html>
