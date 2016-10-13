<!DOCTYPE html>
<!--
Ejercicio 3
Escribe un programa que lea 15 números por teclado y que los almacene en un array.
Rota los elementos de ese array, es decir, el elemento de la posición 0 debe pasar 
a la posición 1, el de la 1 a la 2, etc. El número que se encuentra en la última
posición debe pasar a la posición 0. Finalmente, muestra el contenido del array.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 3</title>
    </head>
    <style>
table, th, td {
    border: 1px solid black;
    border-collapse:collapse;
    padding: 4px;
}
    </style>
    <body>
    <h3>Por favor introduzca 5 números:</h3>
           
<?php
  $n = $_GET['n'];
  $contadorNumeros = $_GET['contadorNumeros'];
  $numeroTexto = $_GET['numeroTexto'];

  if (!isset($n)) { // si n no esta definido entonces:
    $contadorNumeros = 0;
    $numeroTexto = "";
  }
  
  ////////////////////////////////////////////////////////////////
  //  Programa principal una vez recogidos los datos del array.
  //  El array con los números es $numero
  ////////////////////////////////////////////////////////////////

  if ($contadorNumeros == 5) {
    $numeroTexto = $numeroTexto . " " . $n; // añade el último número leído
    $numeroTexto = substr($numeroTexto, 2); // quita espacios sobrantes
    $numero = explode(" ", $numeroTexto); //ahora tengo una cadena de string 
    ////y explode lo divide en funcion del separador " " 
    
    echo "Array inicial:<br>";
    echo "<table><tr>";
    
        foreach ($numero as $n) {
            echo "<td> $n </td>";
        }
    echo "</tr></table>";    
    
    $x = $contadorNumeros - 1 ;    
    echo "<br>Array final:<br>";
    echo "<table><tr>";
    echo "<td>$numero[$x]</td>";     
        for ($i= 0; $i < ($contadorNumeros - 1); $i++){
            echo "<td>$numero[$i]</td>";
        }
    echo "</tr></table>";        
    }
   
  
  // Pide número y añade el actual a la cadena
  if (($contadorNumeros < 5) || (!isset($n))) {
    ?>
    <form action="#" method="get">
      <input type="hidden" name="ejercicio" value="02">
      Introduzca un número:
      <input type="number" name ="n" autofocus>
      <input type="hidden" name="contadorNumeros" value="<?= ++$contadorNumeros ?>">
      <input type="hidden" name="numeroTexto" value="<?= $numeroTexto . " " . $n ?>">
      <input type="submit" value="OK">
    </form>
    <?php 
  }//este cierre de etiqueta de php
  // no es necesario si no pongo nada mas porque es una sola sentencia 
  ?> 
    </body>
</html>
