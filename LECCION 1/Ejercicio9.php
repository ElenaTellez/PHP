<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 9 Leccion 1</title>
    </head>
    <body>
        <h1>Conversor de PESETAS a EUROS</h1>
           <?php
          $pesetas = 1000;
          echo $pesetas, " pesetas son ", round($pesetas / 166.386, $precision = 2), " euros.";
        ?>
    </body>
</html> 

