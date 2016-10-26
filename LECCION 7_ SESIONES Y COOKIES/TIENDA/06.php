<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/default.css" rel="stylesheet" type="text/css" />
        <title>Tienda on-line simple</title>
    </head>
<body>
    <div id="encabezado"></div>
    <div id="logo"><h1> Banco del Tiempo </h1><b><i><u>Gasta el tiempo ahorrado</u></i></b><br><br>
    <div id="detalle"> <b>Nota:</b> El Banco del Tiempo no se hace responsable del estado de salud en el que usted llega para disfrutar de su tiempo ahorrado.</div>
    </div>
    <br>
    <div id="productos">
    <h3>Relojes de Tiempo:</h3><hr>
    <?php
    
// Tienda ///////////////////////////////////////////////////////
    $relojes = array(//en un array recojo otro array asociativo en el que asocio varias parejas
       "c0001" => array(
            "nombre" => "Tiempo de no pensar",
            "precio" => 3,
            "imagen" => "/imag/relojpared.jpg",
            "detalle" => "¿Toda la vida trabajando sin un minuto que perder? ¿Quieres peder el tiempo? Este es tu reloj. Compra tiempo perdido y ¡disfruta!"
            ),
        
        "c0002" => array(
            "nombre" => "Tiempo Musical",
            "precio" => 5,
            "imagen" => "/imag/relojMusica.png",
            "detalle" => "¿Demasiado ocupado para distrutar de una buena canción? Este es tu reloj. Compra tiempo para escuchar musica y ser feliz."
            ),
        "c0003" => array(
            "nombre" => "Tiempo de aprender",
            "precio" => 4,
            "imagen" => "/imag/relojAprender.gif",
            "detalle" => "El saber no ocupa lugar, pero si requiere tiempo. Aprende ahora todo lo que desees."
            ),
        "c0004" => array(
            "nombre" => "Recuperar Tiempo",
            "precio" => 15,
            "imagen" => "/imag/relojVida.jpeg",
            "detalle" => "¿Deseando retrasar la llegada de la muerte? Ahora puedes: un año por tan sólo 15 años. ¡Una ganga!"
            ),
        "c0005" => array(
            "nombre" => "Tiempo de viajar",
            "precio" => 3,
            "imagen" => "/imag/relojviaje.png",
            "detalle" => "¿Cuántos lugares has querido conocer? Date un capricho, ¡ahora puedes viajar!"
            ),
        "c0006" => array(
            "nombre" => "Tiempo de amar",
            "precio" => 10,
            "imagen" => "/imag/relojCorazon.jpeg",
            "detalle" => "El amor es de esos caprichos que roba mucho tiempo. Compra y ¡dejate querer!"
            ),
        "c0007" => array(
            "nombre" => "Tiempo de jugar",
            "precio" => 3,
            "imagen" => "/imag/relojJuego.png",
            "detalle" => "¿Toda la vida deseando disfrutar como un niño? Ha llegado tu hora. Invierte en tiempo ludico y ¡diviertete!"
            ),
        "c0008" => array(
            "nombre" => "Tiempo de Soñar",
            "precio" => 5,
            "imagen" => "/imag/relojTiempoLibre.png",
            "detalle" => "¿Otra vez soñando con los ojos abiertos? ¡Ya no! Ahora podras soñar sin reparos y con tranquilidad."
            )
        );
    
    $_SESSION['compra'] = $relojes;
    
    foreach ($relojes as $codigo => $elemento) {
    ?>
        <div class="pro" >
            <img src="<?= $elemento[imagen] ?>" width="110" border="1">
            <br> <?= $elemento[nombre] ?><br>
            Precio: <?= $elemento[precio] ?> Años
            <form action="pagina.php" method="post">
                <input type="hidden" name="ejercicio" value="06_detalle">
                <input type="hidden" name="codigo" value="<?= $codigo ?>">
                <input type="hidden" name="accion" value="detalle">
                <input type="submit" value="Detalle" >
            </form>
            <form action="pagina.php" method="post">
                <input type="hidden" name="ejercicio" value="06">
                <input type="hidden" name="codigo" value="<?= $codigo ?>">
                <input type="hidden" name="accion" value="comprar">
                <input type="submit" value="Comprar">
            </form>
        </div>
    <?php
    }
     ?>
    </div> 
    <div id="compra"> 
    <h3>Cesta de la compra</h3>
    <hr> 

    <?php
// Cesta de la Compra ///////////////////////////////////////////////////////
        $accion = $_POST['accion'];
        $codigo = $_POST['codigo'];

// Inicializa la cesta la primera vez
        if (!isset($_SESSION[cesta])) {
            $_SESSION[cesta] = array("c0001" => 0, "c0002" => 0, "c0003" => 0, "c0004" => 0, "c0005" => 0, "c0006" => 0, "c0007" => 0, "c0008" => 0);
        }
        if ($accion == "comprar") {
            $_SESSION[cesta][$codigo]++;
        }
        if ($accion == "eliminar") {
            $_SESSION[cesta][$codigo]=$_SESSION[cesta][$codigo]-1;//quita unidades de una en una
        }
        if ($accion == "eliminarTodo") { //vacia de articulos la cesta  
            $total = 0;
            unset( $_SESSION[cesta]);
            session_destroy();
            header("refresh: 0;");
        }
        
        
     
// Muestra el contenido del carrito de la compra
        $total = 0;
       
        foreach ($relojes as $cod => $elemento) {
            if ($_SESSION[cesta][$cod] > 0) {
                ?>
                <div class="carr">
                    <img src="<?= $elemento[imagen] ?>" width="50" border="1"><br>
                    <?= $elemento[nombre] ?><br>
                    Precio: <?= $elemento[precio] ?> Años<br>
                    /* Unidades: <?= $_SESSION[cesta][$cod] ?> 
                    <form action="pagina.php" method="post">
                        <input type="hidden" name="ejercicio" value="06">
                        <input type="hidden" name="codigo" value="<?= $cod ?>">
                        <input type="hidden" name="accion" value="eliminar">
                        <input type="submit" value="Eliminar">
                    </form>*/
                    Unidades:
                     <form action="pagina.php" method="get">
                        <input type="hidden" name="ejercicio" value="06">                        
                        <input type="number" name ="a" min="1" required="" value="1" maxlength="2">
                        <br><input type="submit" value="Calcular precio">
                     </form>
                </div>
                <?php
                $totalPedido = 0;
                $b = $_SESSION[cesta][$cod]*$_GET['a'];
                $numero[]= $total + ($b * $elemento[precio]);
                    foreach ($numero as $elemento) {
                        $totalPedido = $totalPedido + $elemento;
                        $b=0;
                    }
                    
            }
        }
        ?>
        <form action="pagina.php" method="post">
            <input type="hidden" name="ejercicio" value="06">
            <input type="hidden" name="accion" value="eliminarTodo">
            <input type="submit" value="Vaciar carrito">
        </form>
        <b class="pro">Total: <?= $totalPedido?> Años</b> 

    </div> 
</body>
</html>
