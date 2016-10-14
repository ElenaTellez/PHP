<!DOCTYPE html>
<!--
Ejercicio 5
Realiza un programa que pida la temperatura media que ha hecho en cada mes de un determinado
año y que muestre a continuación un diagrama de barras horizontales con esos datos. Las barras
del diagrama se pueden dibujar a base de la concatenación de una imagen.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
        table, th, td {
            border: 1px solid black;
            border-collapse:collapse;
            padding: 4px;
        }
        </style>
    </head>
    <body>
 <?php
  if (!isset($_GET['temperatura'])) {
    // Pide los datos de las temperaturas
    $mes = array(
      "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
      "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    ?>
    Por favor, introduzca la temperatura media de cada mes.<br>
    <form action="#" method="get">
      <?php
      for ($i = 0; $i < 12; $i++) {
        echo "$mes[$i]: <input type=\"number\" name =\"temperatura[$mes[$i]]\"><br>";
      }
      ?>
      <input type="submit" value="OK">
    </form>
    <?php                       
  } else {
    // Pinta el diagrama de barras
    $temperatura = $_GET['temperatura'];
    echo "<table>";
    foreach($temperatura as $mes => $temperaturaMes) {
      echo "<tr><td>$mes </td><td>";
      // Pinta la barra
      for ($i = 0; $i < $temperaturaMes; $i++) {
        echo "<img src=\"maceta.jpeg\">";
      }
      echo " $temperaturaMes"."ºC<br></td></tr>";
    }
    echo "</table>";
  }
  ?>
    </body>
</html>
