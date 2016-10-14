<!DOCTYPE html>
<!--
Ejercicio 11
Crea un mini-diccionario español-inglés que contenga, al menos, 20 palabras (con su traducción).
Utiliza un array asociativo para almacenar las parejas de palabras. El programa pedirá una palabra
en español y dará la correspondiente traducción en inglés.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <h3>Por favor introduzca una palabra en inglés:</h3>    



        <?php
        if (isset($_GET['n'])) { //si aun no he escrito la palabra no entra php
            $n = $_GET['n'];
            $diccionario = array(//Array asociativo
                'blue' => 'azul', 'white' => 'blanco', 'black' => 'negro', 'pink' => 'rosa', 'green' => 'verde',
                'dog' => 'perro', 'cat' => 'gato', 'fish' => 'pez', 'moon' => 'luna', 'star' => 'estrella');


            foreach ($diccionario as $clave => $valor) {
                $palabrasIngles[] = $clave;
            }

            if (in_array($n, $palabrasIngles)) {
                echo "<b>$n</b> en español es <b>" . $diccionario[$n] . "</b><br><br>";
            } else {
                echo "Lo siento, no conozco esa palabra.<br><br>";
            }
        }
        ?>  
        <form action="#" method="get">
            Introduzca una palabra:
            <input type="text" name ="n" autofocus> 
            <input type="submit" value="OK">
        </form>

    </body>
</html>
