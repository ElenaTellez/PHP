<!DOCTYPE html>
<!--
Ejercicio 12
Realiza un programa que escoja al azar 5 palabras en español del mini-diccionario del ejercicio
anterior. El programa pedirá que el usuario teclee la traducción al inglés de cada una de las palabras
y comprobará si son correctas. Al final, el programa deberá mostrar cuántas respuestas son válidas
y cuántas erróneas.
-->
<h2>Prueba tu vocabulario en inglés</h2>
<?php
  $diccionario = array (
    "loco" => "crazy",
    "gato" => "cat",      
    "rojo" => "red",
    "árbol" => "tree",
    "pingüino" => "penguin",
    "sol" => "sun",
    "agua" => "water",
    "viento" => "wind",
    "siesta" => "nap",
    "arriba" => "up",
    "ratón" => "mouse",
    "luna" => "moon",
    "mentira" => "lie",
    "aguacate" => "avocado",
    "cuerpo" => "body",
    "concurso" => "contest",
    "cena" => "dinner",
    "salida" => "exit",
    "lenteja" => "lentil",
    "cacerola" => "pan",
    "pastel" => "pie",
    "azul" => "blue"
  );

  if (!isset($_GET['espanol'])) {//mientras no esten rellenos los campos del cuestionario no entra php
    echo "Por favor, introduzca la traducción al inglés de las siguientes palabras.<br>";

    // Extrae las palabras españolas y las mete en array palabrasEspañolas
    foreach ($diccionario as $clave => $valor) {
      $palabrasEspanolas[] = $clave;
    }

    // Elige 5 palabras en español sin que se repita ninguna
    $contadorPalabras = 0;
    do {
      $palabra = $palabrasEspanolas[rand(0, 19)];
      if (!in_array($palabra, $espanol)) { //comprueba que no esten dentro del array
        $espanol[] = $palabra;
        $contadorPalabras++;
      }
    } while ($contadorPalabras < 5);

    echo '<form action="#" method="get">';
    for ($i = 0; $i < 5; $i++) {
      echo $espanol[$i]." "; //muestro una a una las 6 palabras elegidas al azar
      echo '<input type="hidden" name="espanol['.$i.']" value="'.$espanol[$i].'">';
      // con este campo oculto recojo la palabra en español para despues compararla
      echo '<input type="text" name="ingles['.$i.']" ><br>';
      // recojo la respuesta en ingles para despues compararla
    }
    echo '<input type="submit" value="Aceptar">';
    echo '</form>';
    
  } else {
    $espanol = $_GET['espanol'];
    $ingles = $_GET['ingles'];

    for ($i = 0; $i < 5; $i++) {
      if ($diccionario[$espanol[$i]] == $ingles[$i]) {
        echo '<span style="color: green;">'.$espanol[$i].": ".$ingles[$i];
        echo " - correcto</span><br>";
      } else {
        echo '<span style="color: red;">'.$espanol[$i].": ".$ingles[$i];
        echo " - incorrecto</span>, la respuesta correcta es <b>".$diccionario[$espanol[$i]]."</b><br>";
      }
    }
  }
?>


