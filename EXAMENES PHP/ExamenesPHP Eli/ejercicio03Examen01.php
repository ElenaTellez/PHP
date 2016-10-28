<!DOCTYPE html>
<!--
Realiza un programa que vaya generando al azar las piezas que capturan dos jugadores durante una partida. Un
jugador se rinde cuando el contrario captura el equivalente a 9 peones (o más).
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <p>
            Realiza un programa que vaya generando al azar las piezas que capturan dos jugadores durante una partida. Un
            jugador se rinde cuando el contrario captura el equivalente a 9 peones (o más).
        </p>
        <?php
            $ajedrez = [ "Dama" => 9,
                         "Torre" => 5,
                         "Alfil" => 3,
                         "Caballo" => 2,
                         "Peon" => 1];
            $capturadas = [ "Negra" => 0,
                            "Blanca" => 0];
            $jugadorNegra = [ "Dama" => 0,
                            "Torre" => 0,
                            "Alfil" => 0,
                            "Caballo" => 0,
                            "Peon" => 0];
            $jugadorBlanca = [ "Dama" => 0,
                            "Torre" => 0,
                            "Alfil" => 0,
                            "Caballo" => 0,
                            "Peon" => 0];
            //Crea la partida            
            $colorJugada;
            $ficha;
            $finPartida = false;
            
            while(!$finPartida){   
                $repeat = false;
                do {
                    $x = rand(0, 1);
                    switch($x){
                    case 0:
                        $colorJugada = "Negra";
                        break;
                    case 1:
                        $colorJugada = "Blanca";
                    }
                    $x = rand(0, 4);
                    switch($x){
                        case 0:
                            $ficha= "Dama";
                            break;
                        case 1:
                            $ficha = "Torre";
                            break;
                        case 2:
                            $ficha= "Alfil";
                            break;
                        case 3:
                            $ficha = "Caballo";
                            break;
                        case 4:
                            $ficha = "Peon";
                            break;                
                    }
                    //Controla que la ficha sea correcta
                    if($colorJugada=="Blanca"){
                        if($ficha=="Dama"){
                           if(($jugadorBlanca[$ficha])<1){
                               $jugadorBlanca[$ficha]++;
                               $repeat = true;
                           }                    
                        } else if($ficha=="Torre"){
                           if(($jugadorBlanca[$ficha])<2){
                               $jugadorBlanca[$ficha]++;
                               $repeat = true;
                           }
                        } else if($ficha=="Alfil"){
                           if(($jugadorBlanca[$ficha])<2){
                               $jugadorBlanca[$ficha]++;
                               $repeat = true;
                           }
                        } else if($ficha=="Caballo"){
                           if(($jugadorBlanca[$ficha])<2){
                               $jugadorBlanca[$ficha]++;
                               $repeat = true;
                           }
                        } else if($ficha=="Peon"){
                           if(($jugadorBlanca[$ficha])<8){
                               $jugadorBlanca[$ficha]++;
                               $repeat = true;
                           }
                        }                       
                    } else {
                        if($ficha=="Dama"){
                           if(($jugadorNegra[$ficha])<1){
                               $jugadorNegra[$ficha]++;
                               $repeat = true;
                           }                    
                        } else if($ficha=="Torre"){
                           if(($jugadorNegra[$ficha])<2){
                              $jugadorNegra[$ficha]++;
                              $repeat = true;
                           }
                        } else if($ficha=="Alfil"){
                           if(($jugadorNegra[$ficha])<2){
                               $jugadorNegra[$ficha]++;
                               $repeat = true;
                           }
                        } else if($ficha=="Caballo"){
                           if(($jugadorNegra[$ficha])<2){
                               $jugadorNegra[$ficha]++;
                               $repeat = true;
                           }
                        } else if($ficha=="Peon"){
                           if(($jugadorNegra[$ficha])<8){
                               $jugadorNegra[$ficha]++;
                               $repeat = true;
                           }
                        }
                    }
                } while(!repeat);
                
                //Actualiza las capturadas
                if($colorJugada=="Negra"){
                    $capturadas["Negra"] += $ajedrez[$ficha];
                } else {
                    $capturadas["Blanca"] += $ajedrez[$ficha];
                }
                echo "Juega $ficha $colorJugada : (", $ajedrez[$ficha], " peones)<br>";
                if(($capturadas["Blanca"]>= 9)||($capturadas["Negra"]>=9)){
                    $finPartida = true;
                    if($capturadas["Blanca"]>=9){
                        echo "Las negras se rinden, han perdido el equivalente a ", $capturadas["Blanca"], " peones.";
                    } else {
                        echo "Las blancas se rinden, han perdido el equivalente a ", $capturadas["Negra"], " peones.";
                    }
                }        
            }
            echo "<br>Blancas:";
            print_r($jugadorBlanca);
            echo "<br>Negras:";
            print_r($jugadorNegra);
            
        ?>
    </body>
</html>
