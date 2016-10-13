<!DOCTYPE html>
<!--
Define tres arrays de 20 números enteros cada una, con nombres “numero”, “cuadrado” y “cubo”.
Carga el array “numero” con valores aleatorios entre 0 y 100. En el array “cuadrado” se deben
almacenar los cuadrados de los valores que hay en el array “numero”. En el array “cubo” se deben
almacenar los cubos de los valores que hay en “numero”. A continuación, muestra el contenido de
los tres arrays dispuesto en tres columnas.
-->
<html>
<head>
    <meta charset="UTF-8">
        <title>Ejercicio 1</title>
</head>    

<body>
<?php

  for ($i = 0; $i < 20; $i++) {
      $numero[] = rand(0,100);
  }

  foreach ($numero as $elemento) {
      $cuadrado[] = $elemento * $elemento;
      $cubo[] = $elemento * $elemento * $elemento;
  }

?>
<table>
     <tr><td>Número</td><td>Cuadrado</td><td>Cubo</td></tr>
    <?php
    for ($i = 0; $i < 20; $i++) {
      echo "<tr><td>".$numero[$i]."</td>";
      echo "<td>".$cuadrado[$i]."</td>";
      echo "<td>".$cubo[$i]."</td></tr>";
    }
?>
</table>        
  </body>
</html>