<!DOCTYPE html>
<!--
Escribe un programa que pida 6 números uno detrás de otro (no se pueden pedir los 6 en la misma página) y
que, a continuación, muestre el máximo, el mínimo y el número de primos (solo la cantidad).
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <p>Escribe un programa que pida 6 números uno detrás de otro (no se pueden pedir los 6 en la misma página) y
            que, a continuación, muestre el máximo, el mínimo y el número de primos (solo la cantidad).</p>
        <?php
            if(isset($_GET['numerosEnviados'])){
                $numerosEnviados = $_GET['numerosEnviados'];
                $numerosEnviados++;                      
                if($numerosEnviados<6) {
                    $numIntroducido = $_GET['numIntroducido'];
                    $cadenaNumero = $_GET['cadenaNumero']." ".$numIntroducido;
                } else {
                    $numIntroducido = $_GET['numIntroducido'];
                    $cadenaNumero = $_GET['cadenaNumero']." ".$numIntroducido;
                    $noMasNumeros = true;
                    //Explota la cadena
                    $cadenaNumero = substr($cadenaNumero, 1);
                    $cadenaNumero = explode(" ", $cadenaNumero);  
                    $numPrimos = 0;
                    $min = PHP_INT_MAX;
                    $max = -PHP_INT_MAX;
                    //Asigna mínimo y máximo
                    foreach ($cadenaNumero as $num) {
                        if($num < $min){
                            $min = $num;
                        }
                        if($num > $max){
                            $max = $num;
                        }
                        //Se fija si es primo
                        $divisores = 0;
                        for($x = 1; $x <= $num; $x++){
                            if(($num%$x)==0){
                                $divisores++;
                            }
                        }
                        if($divisores<=2){
                            $numPrimos++;
                        }
                    }
                    //Muestra el resultado
                    echo "El menor número es $min, el mayor es $max y el número de primos es $numPrimos";
                }
            } else {
                $numerosEnviados = 0;
                $cadenaNumero = "";
                $noMasNumeros = false;
            }                     
        ?>      
         <?php if(!$noMasNumeros){        
        ?>
        <form method="get" action="ejercicio01Examen01.php">
            <input type="number" name="numIntroducido">
            <input type="hidden" name="cadenaNumero" value=<?php echo "\"$cadenaNumero\""; ?>>
            <input type="hidden" name="numerosEnviados" value= <?php echo "\"$numerosEnviados\""; ?>>
            <input type="submit" value="Enviar número">
        </form>
        <?php
        }
        ?>   
    </body>
</html>
