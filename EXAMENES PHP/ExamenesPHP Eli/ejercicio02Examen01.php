<!DOCTYPE html>
<!--
Realiza un programa que pida 10 números por teclado y que los almacene en un array. A continuación se debe
mostrar el contenido de ese array junto al índice (0 – 9). Seguidamente el programa debe colocar de forma alterna y
en orden los pares y los impares: primero par, luego impar, luego par, luego impar... Cuando se acaben los pares o
los impares, se completará con los números que queden.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            table, tr, td {
                border: 1px solid black;
                border-collapse: collapse;
                width: 400px;
            }
        </style>
    </head>
    <body>
        <p>Realiza un programa que pida 10 números por teclado y que los almacene en un array. A continuación se debe
            mostrar el contenido de ese array junto al índice (0 – 9). Seguidamente el programa debe colocar de forma alterna y
            en orden los pares y los impares: primero par, luego impar, luego par, luego impar... Cuando se acaben los pares o
            los impares, se completará con los números que queden.</p>
        <?php
            if(isset($_GET['numerosEnviados'])){
                $numerosEnviados = $_GET['numerosEnviados'];
                $pares = $_GET['pares'];
                $impares = $_GET['impares'];
                $numerosEnviados++;
                if($numerosEnviados<10) {
                    $numIntroducido = $_GET['numIntroducido'];
                    //Se fija si es par o impar y lo pone en una cadena
                    if(($numIntroducido%2)==0){
                        $pares = $_GET['pares']." ".$numIntroducido;
                    } else {
                        $impares = $_GET['impares']." ".$numIntroducido;
                    }
                    //Lo introduce a la cadena
                    $cadenaNumero = $_GET['cadenaNumero']." ".$numIntroducido;
                } else {
                    $numIntroducido = $_GET['numIntroducido'];
                    $pares = $_GET['pares'];
                    $impares = $_GET['impares'];
                   //Se fija si es par o impar y lo pone en una cadena
                    if(($numIntroducido%2)==0){
                        $pares = $_GET['pares']." ".$numIntroducido;
                    } else {
                        $impares = $_GET['impares']." ".$numIntroducido;
                    }
                    //Los introduce a la cadena
                    $cadenaNumero = $_GET['cadenaNumero']." ".$numIntroducido;
                    $noMasNumeros = true;
                    //Explota las cadenas
                    $cadenaNumero = substr($cadenaNumero, 1);
                    $cadenaNumero = explode(" ", $cadenaNumero);
                    $pares = substr($pares, 1);
                    $pares = explode(" ", $pares);
                    $impares = substr($impares, 1);
                    $impares = explode(" ", $impares);
                   //Crea un nuevo array en el que ordena los números
                    $arrayOrdenado;
                    $sizeMenor = 0;
                    if(count($pares)<count($impares)){
                        $sizeMenor = count($pares);
                    } else {
                        $sizeMenor = count($impares);
                    }
                    $i = 0;
                    $j = 0;
                    for($x = 0; $x < 10; $x++){
                        if($x < $sizeMenor*2){
                            if(($x%2)==0){
                                $arrayOrdenado[$x] = $pares[$i];
                                $i++;
                            } else {
                                $arrayOrdenado[$x] = $impares[$j];
                                $j++;
                            }
                        } else {
                            if(count($pares)<count($impares)){
                                $arrayOrdenado[$x] = $impares[$j];
                                $j++;
                            } else {
                                $arrayOrdenado[$x] = $pares[$i];
                                $i++;
                            }
                        }
                    }
                    //Muestra el resultado
                    echo "Array original <br>";
                    echo "<table>";
                    for ($i = 0; $i < 2; $i++){
                        echo "<tr>";
                        if($i==0){
                            for($j = 0; $j < 10; $j++){
                                echo "<td>$j</td>";
                            }
                        } else {
                            foreach($cadenaNumero as $num){
                                echo "<td>$num</td>";
                            }
                        }                        
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "Array Ordenado <br>";
                    echo "<table>";
                    for ($i = 0; $i < 2; $i++){
                        echo "<tr>";
                        if($i==0){
                            for($j = 0; $j < 10; $j++){
                                echo "<td>$j</td>";
                            }
                        } else {
                            foreach($arrayOrdenado as $num){
                                echo "<td>$num</td>";
                            }
                        }                        
                        echo "</tr>";
                    }
                    echo "</table>";    
                }
            } else {
                $numerosEnviados = 0;
                $cadenaNumero = "";
                $noMasNumeros = false;
                $pares = "";
                $impares = "";
            }                     
        ?>      
         <?php if(!$noMasNumeros){        
        ?>
        <form method="get" action="ejercicio02Examen01.php">
            <input type="number" name="numIntroducido">
            <input type="hidden" name="cadenaNumero" value=<?php echo "\"$cadenaNumero\""; ?>>
            <input type="hidden" name="numerosEnviados" value= <?php echo "\"$numerosEnviados\""; ?>>
            <input type="hidden" name="pares" value= <?php echo "\"$pares\""; ?>>
            <input type="hidden" name="impares" value= <?php echo "\"$impares\""; ?>>
            <input type="submit" value="Enviar número">
        </form>
        <?php
        }
        ?>   
    </body>
</html>

