<?php
    session_start();
    if(isset($_SESSION['suma'])){
                if($_GET['numeroIntroducido']>=0){
                    //va sumando
                    $_SESSION['suma'] = $_SESSION['suma'] + $_GET['numeroIntroducido'];
                    //va haciendo un contador
                    $_SESSION['cantidadNumeros']++;
                    //verifica si es mayor al maximo
                    if($_GET['numeroIntroducido']>$_SESSION['max']){
                        $_SESSION['max'] = $_GET['numeroIntroducido'];
                    }
                    //verifica si es menor al mínimo
                    if($_GET['numeroIntroducido']<$_SESSION['min']){
                        $_SESSION['min'] = $_GET['numeroIntroducido'];
                    }
                    //verifica si es primo
                    $divisores = 0;
                    for($x = 1; $x <= $_GET['numeroIntroducido']; $x++){
                        if(($_GET['numeroIntroducido']%$x)==0){
                            $divisores++;
                        }
                    }
                    if($divisores <= 2){
                        $_SESSION['numPrimos']++;
                    }
                } else {
                    $_SESSION['noMas'] = true;
                }
            //   echo $_SESSION['noMas'], "holaaa";
            } else {
                 $_SESSION['suma'] = 0;
                 $_SESSION['cantidadNumeros'] = 0;
                 $_SESSION['max'] = -PHP_INT_MAX;
                 $_SESSION['min'] = PHP_INT_MAX;
                 $_SESSION['numPrimos'] = 0;
                 $_SESSION['noMas'] = false;
            }  
?>
<!DOCTYPE html>
<!--
Escribe un programa que pida números positivos uno detrás de otro. Se termina introduciendo un
número negativo. A continuación, el programa debe mostrar la media, el máximo, el mínimo y el
número de primos encontrados. Utiliza sesiones para propagar los datos necesarios; no se permite
utilizar campos ocultos en formularios.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <p>
            Escribe un programa que pida números positivos uno detrás de otro. Se termina introduciendo un
            número negativo. A continuación, el programa debe mostrar la media, el máximo, el mínimo y el
            número de primos encontrados. Utiliza sesiones para propagar los datos necesarios; no se permite
            utilizar campos ocultos en formularios.
        </p>
        <?php
            if(!$_SESSION['noMas']){            
         ?>
        <form action="ejercicio01Examen02.php" method="get">
            Introduzca un número:
            <br>
            <input type="number" name="numeroIntroducido">
            <input type="submit" value="OK">
        </form>
        <?php
            } else {
                echo "La media es: ", ($_SESSION['suma']/$_SESSION['cantidadNumeros']), "<br>";
                echo "El mínimo es: ", $_SESSION['min'], "<br>";
                echo "El máximo es: ", $_SESSION['max'], "<br>";
                echo "Se introdujeron ", $_SESSION['numPrimos'], " números primos.";
            }
        ?>
        
    </body>
</html>
