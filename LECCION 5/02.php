<!DOCTYPE html>
<!--
Escribe un programa que pida 10 números por teclado y que luego muestre los 
números introducidos junto con las palabras “máximo” y “mínimo” al lado
del máximo y del mínimo respectivamente.
-->

         <h3>Por favor introduzca 10 números:</h3>
           
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

  if ($contadorNumeros == 10) {
    $numeroTexto = $numeroTexto . " " . $n; // añade el último número leído
    $numeroTexto = substr($numeroTexto, 2); // quita espacios sobrantes
    $numero = explode(" ", $numeroTexto); //ahora tengo una cadena de string 
    ////y explode lo divide en funcion del separador " " 

    $maximo = -PHP_INT_MAX; // establece el maximo 
    $minimo = PHP_INT_MAX; // establece el minimo

    foreach ($numero as $n) {
      if ($n < $minimo) {
        $minimo = $n;
      }
      if ($n > $maximo) {
        $maximo = $n;
      }
    }

    foreach ($numero as $n) {
      if ($n == $minimo) {
        echo "$n mínimo<br>";
      } else if ($n == $maximo) {
        echo "$n máximo<br>";
      } else {
        echo "$n<br>";
      }
    }
  }
  
  // Pide número y añade el actual a la cadena
  if (($contadorNumeros < 10) || (!isset($n))) {
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