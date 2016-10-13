<!DOCTYPE html>
<!--
Ejercicio 4
Escribe un programa que genere 100 números aleatorios del 0 al 20 
y que los muestre por pantalla separados por espacios. El programa pedirá
entonces por teclado dos valores y a continuación cambiará todas las ocurrencias
del primer valor por el segundo en la lista generada anteriormente.
Los números que se han cambiado deben aparecer resaltados de un color diferente.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 4</title>
    </head>
    <body>
  <?php
  if (!isset($_GET['numeroTexto'])) { // si el array no está definido entonces lo genero y lo muestro
    // Genera el array aleatorio
    for ($i = 0; $i < 100; $i++) {
        $numero[$i] = rand(0, 20);
        echo $numero[$i]." ";
    }

    $numeroTexto = implode(" ", $numero); //numeroTexto es el array que he generado 
    //con los numeros aleatorios, pero al enviar el formulario este array se pierde, por
    //lo que es necesario pasarlo a string para que no pierda ese valor y a través del 
    //campo oculto lo envío como string
    
    ?>
    <br><br>
    <form action="#" method="get">
      Valor a sustituir: <input type="number" name ="viejo" autofocus="" required=""><br>
      Valor nuevo: <input type="number" name ="nuevo" required="">
      <input type="hidden" name="numeroTexto" value="<?php echo $numeroTexto; ?>">
      <input type="submit" value="OK">
    </form>
    <?php
  } else {
    $numeroTexto = $_GET['numeroTexto'];
    $viejo = $_GET['viejo'];
    $nuevo = $_GET['nuevo'];
    $numero = explode(" ", $numeroTexto);
    
    //ahora ya tengo los datos del string y lo convierto nuevamente en array para poder
    //compararlo con los valores que he introducido por teclado

    foreach ($numero as $n) {
      if ($n == $viejo) { 
        echo "<span style=\"color: red; font-weight: bold;\">$nuevo</span> ";
      } else {
        echo  "$n ";
      }
    }
  }//este cierre de etiqueta de php
  // no es necesario si no pongo nada mas porque es una sola sentencia 
  ?>        
    </body>
</html>
