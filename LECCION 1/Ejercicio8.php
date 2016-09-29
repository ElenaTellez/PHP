<!DOCTYPE html>
<!--
Ejercicio 8
Realiza un conversor de euros a pesetas. 
La cantidad en euros que se quiere convertir deberá estar
almacenada en una variable.

RECUERDA: FLOOR EN PHP QUITA LOS DECIMALES DE LOS NUMEROS
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
   <?php  $euros = 6;
          $pesetas = 166.386;
          ?>      
        
    <b><u>CONVERSOR EUROS A PESETAS</u></b><br><br>
    
    <?php echo $euros; ?> euros son: <?php echo floor($euros * $pesetas); ?> pesetas<br>

    </body>
</html>
