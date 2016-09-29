<!DOCTYPE html>
<!--
Ejercicio 2
Modifica el programa anterior para que muestre tu dirección y tu número de teléfono.
Cada dato se debe mostrar en una línea diferente. 
Mezcla de alguna forma las salidas por pantalla, utilizando tanto HTML como PHP.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 3 Lección 1 PHP</title>
        <style>  
                
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 15%;
    color: violet;
    background-color: whitesmoke;
    margin: 10% auto;
}

td, th {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 4px;
}

</style>
    </head>
    <body>
        <table>
            <tr>
                <td><?php echo "<b><u>" ; ?>House:<?php echo "</u></b>"; ?></td>
                <td><?php echo "Casa"; ?></td>    
            </tr>
            <tr>
                <td><?php echo "<b><u>" ; ?>Kitty:<?php echo "</u></b>"; ?></td>
                <td><?php echo "Gatita"; ?></td>    
            </tr>
            <tr>
                <td><?php echo "<b><u>" ; ?>Boy:<?php echo "</u></b>"; ?></td>
                <td><?php echo "Niño"; ?></td>    
            </tr>
            <tr>
                <td><?php echo "<b><u>" ; ?>Girl:<?php echo "</u></b>"; ?></td>
                <td><?php echo "Niña"; ?></td>    
            </tr>
            <tr>
                <td><?php echo "<b><u>" ; ?>Fish:<?php echo "</u></b>"; ?></td>
                <td><?php echo "Azul"; ?></td>    
            </tr>
            <tr>
                <td><?php echo "<b><u>" ; ?>Money:<?php echo "</u></b>"; ?></td>
                <td><?php echo "Dinero"; ?></td>    
            </tr>
            <tr>
                <td><?php echo "<b><u>" ; ?>Blue:<?php echo "</u></b>"; ?></td>
                <td><?php echo "Azul"; ?></td>    
            </tr>
            <tr>
                <td><?php echo "<b><u>" ; ?>Book:<?php echo "</u></b>"; ?></td>
                <td><?php echo "Libro"; ?></td>    
            </tr>
            <tr>
                <td><?php echo "<b><u>" ; ?>Bone:<?php echo "</u></b>"; ?></td>
                <td><?php echo "Hueso"; ?></td>    
            </tr>
            <tr>
                <td><?php echo "<b><u>" ; ?>Word:<?php echo "</u></b>"; ?></td>
                <td><?php echo "Palabra"; ?></td>    
            </tr>
        </table>
            
    </body>
</html>

