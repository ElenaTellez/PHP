<!DOCTYPE html>
<!--
Ejercicio 6
Realiza un programa que pida 8 números enteros y que luego muestre esos números de colores, los
pares de un color y los impares de otro.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 3</title>
        <style>
table, th, td {
    border: 1px solid black;
    border-collapse:collapse;
    padding: 4px;
}

.pares{
    color:blue;
}
.impares{
    color:red;
}
</style>

    </head>
<body>
    <h3>Por favor introduzca 8 números:</h3>
           
<?php
  $n = $_GET['n'];
  $contadorNumeros = $_GET['contadorNumeros'];
  $numeroTexto = $_GET['numeroTexto'];

  if (!isset($n)) { // si n no esta definido entonces:
    $contadorNumeros = 0;
    $numeroTexto = "";
  }
  
 
  if ($contadorNumeros == 8) {
    $numeroTexto = $numeroTexto . " " . $n; // añade el último número leído
    $numeroTexto = substr($numeroTexto, 2); // quita espacios sobrantes
    $numero = explode(" ", $numeroTexto); //ahora tengo una cadena de string 
    ////y explode lo divide en funcion del separador " " 
    
    for ($i= 0; $i < ($contadorNumeros); $i++){
        if ($numero[$i]%2 == 0){
            echo "<p class=pares> $numero[$i] par </p>";
        } else {
            echo "<p class=impares> $numero[$i] impar </p>";
        }
    }
    
  }
  // Pide número y añade el actual a la cadena
  if (($contadorNumeros < 8) || (!isset($n))) {
    ?>
    <form action="#" method="get">
      Introduzca 8 números:
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