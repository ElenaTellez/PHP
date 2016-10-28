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
            "categoria" => "novedadYoferta",
            "precio" => 3,
            "imagen" => "/imag/relojpared.jpg",
            "detalle" => "¿Toda la vida trabajando sin un minuto que perder? ¿Quieres peder el tiempo? Este es tu reloj. Compra tiempo perdido y ¡disfruta!"
            ),
        
        "c0002" => array(
            "nombre" => "Tiempo Musical",
            "categoria" => "novedadYoferta",
            "precio" => 5,
            "imagen" => "/imag/relojMusica.png",
            "detalle" => "¿Demasiado ocupado para distrutar de una buena canción? Este es tu reloj. Compra tiempo para escuchar musica y ser feliz."
            ),
        "c0003" => array(
            "nombre" => "Tiempo de aprender",
            "categoria" => "novedad",
            "precio" => 4,
            "imagen" => "/imag/relojAprender.gif",
            "detalle" => "El saber no ocupa lugar, pero si requiere tiempo. Aprende ahora todo lo que desees."
            ),
        "c0004" => array(
            "nombre" => "Recuperar Tiempo",
            "categoria" => "novedad",
            "precio" => 15,
            "imagen" => "/imag/relojVida.jpeg",
            "detalle" => "¿Deseando retrasar la llegada de la muerte? Ahora puedes: un año por tan sólo 15 años. ¡Una ganga!"
            ),
        "c0005" => array(
            "nombre" => "Tiempo de viajar",
            "categoria" => "oferta",
            "precio" => 3,
            "imagen" => "/imag/relojviaje.png",
            "detalle" => "¿Cuántos lugares has querido conocer? Date un capricho, ¡ahora puedes viajar!"
            ),
        "c0006" => array(
            "nombre" => "Tiempo de amar",
            "categoria" => "oferta",
            "precio" => 10,
            "imagen" => "/imag/relojCorazon.jpeg",
            "detalle" => "El amor es de esos caprichos que roba mucho tiempo. Compra y ¡dejate querer!"
            ),
        "c0007" => array(
            "nombre" => "Tiempo de jugar",
            "categoria" => "sinCategoria",
            "precio" => 3,
            "imagen" => "/imag/relojJuego.png",
            "detalle" => "¿Toda la vida deseando disfrutar como un niño? Ha llegado tu hora. Invierte en tiempo ludico y ¡diviertete!"
            ),
        "c0008" => array(
            "nombre" => "Tiempo de Soñar",
            "categoria" => "sinCategoria",
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
            <?= $elemento[categoria]?>
            
           
             <form action="pagina.php" method="post">
      <input type="hidden" name="ejercicio" value="06">
      <input type="hidden" name="codigo" value="<?=$codigo?>">
      <input type="hidden" name="accion" value="comprar">
      <input type="submit" value="Comprar">
    </form><br><br>          
        </div>
    <?php
    }
     ?>
        <div>  
            <form action="pagina.php" method="post">
                <input type="hidden" name="ejercicio" value="06_categorias">
                <input type="radio" name="categoria" value="oferta">Oferta
                <input type="radio" name="categoria" value="novedad">Novedad
                <input type="radio" name="categoria" value="novedadYoferta">Novedad y Oferta
                <input type="submit" value="Filtrar" >
            </form>
        </div>
    </div> 
    <div id="compra"> 
    <h3>Cesta de la compra</h3>
    <hr> 

    <?php
// Cesta de la Compra ///////////////////////////////////////////////////////
        $accion = $_POST['accion'];
        $codigo = $_POST['codigo'];
        $confirma = $_POST['confirma'];
         $codelimina = $_POST['cod'];
        ?>
    <?php
        if ($confirma == "eliminarTodo") { //vacia de articulos la cesta  
            $total = 0;
            unset( $_SESSION[cesta]);//no puedo destruir la sesion porque sino no funciona las categorias
            
        }
// Inicializa la cesta la primera vez
        if (!isset($_SESSION[cesta])) {
            $_SESSION[cesta] = array("c0001" => 0, "c0002" => 0, "c0003" => 0, "c0004" => 0, "c0005" => 0, "c0006" => 0, "c0007" => 0, "c0008" => 0);
        }
        if ($accion == "comprar") {
         $_SESSION[cesta][$codigo]++;
        }
        if ($confirma == "eliminar") {
            $_SESSION[cesta][$codelimina]=0;//quita producto
        }
       
// Muestra el contenido del carrito de la compra
         $total = 0;
          foreach ($relojes as $cod => $elemento) {
            if ($_SESSION[cesta][$cod] > 0) {
              ?>
        <div class="carr">
              <img src="<?= $elemento[imagen] ?>" width="75" border="1"><br>
              <?= $elemento[nombre] ?><br>
              Precio: <?= $elemento[precio] ?> Años<br>
              Unidades: <?= $_SESSION[cesta][$cod] ?>
               <form action="pagina.php" method="post">
        <input type="hidden" name="ejercicio" value="06_confirmacion">
        <input type="hidden" name="codigo" value="<?=$cod?>">
        <input type="hidden" name="accion" value="eliminar">
        <input type="submit" value="Eliminar">
      </form><br><br>
              

              <?php
              $total = $total + ($_SESSION[cesta][$cod] * $elemento[precio]);
            }
          }
          ?>
          <form action="pagina.php" method="post">
                <input type="hidden" name="ejercicio" value="06_confirmacion">
                <input type="hidden" name="accion" value="eliminarTodo">
                <input type="submit" value="Vaciar Carrito">
          </form>    
          <b>Total: <?= $total ?> Años</b>
        </div>
    </div> 
</body>
</html>
