


<div id="encabezado"></div>
 
<div id="logo"><h1> Banco del Tiempo </h1><b><i><u>Gasta el tiempo ahorrado</u></i></b><br><br>

    <div id="detalle"> 
        <b>Nota:</b> El Banco del Tiempo no se hace responsable del estado de salud en el que usted llega para disfrutar de su tiempo ahorrado.
    </div>
</div><br>
<div id="productos">
    <h3>Relojes de Tiempo:</h3><hr>
    <?php
  
    $categoria = $_POST['categoria'];
    $relojes = $_SESSION['compra'];
    
    foreach ($relojes as $codigo => $elemento) {
        if ($elemento[categoria] == "novedad") {
            $novedad[$codigo]= $relojes[$codigo];
         } else if ($elemento[categoria] == "oferta"){
            $oferta[$codigo]= $relojes[$codigo];
         } else if ($elemento[categoria] == "novedadYoferta"){
           $novedadYoferta[$codigo]= $relojes[$codigo];
         } else {
           $sincategoria[$codigo]= $relojes[$codigo];
         }
    }  
    
   if ($categoria == "novedad"){ 
        foreach ($novedad as $cod => $elemento) {
    ?>
        <div class="pro" >
                <img src="<?= $elemento[imagen] ?>" width="110" border="1">
                <br> <?= $elemento[nombre] ?><br>
                Precio: <?= $elemento[precio] ?> Años
                <br> <?= $elemento[categoria] ?><br>
                <?= $elemento[categoria] ?> <br>
                <form action="pagina.php" method="post">
                    <input type="hidden" name="ejercicio" value="06_detalle">
                    <input type="hidden" name="codigo" value="<?= $cod ?>">
                    <input type="hidden" name="accion" value="detalle">
                    <input type="submit" value="Detalle" >
                </form>
                Unidades: 
                <form action="pagina.php" method="post">
                    <input type="hidden" name="ejercicio" value="06_categorias">                        
                    <input type="number" class="tamano" name ="a" min="1" required="" value="1">
                    <input type="hidden" name="codigo" value="<?= $cod ?>">
                     <input type="hidden" name="categoria" value="espiritual"> 
                    <input type="hidden" name="accion" value="comprar">
                    <input type="submit" value="Comprar">
                </form>       
        </div>
    <?php
        }
   } else if ($categoria == "oferta"){
        foreach ($oferta as $cod => $elemento) {
    ?>
         <div class="pro" >
                <img src="<?= $elemento[imagen] ?>" width="110" border="1">
                <br> <?= $elemento[nombre] ?><br>
                Precio: <?= $elemento[precio] ?> Años<br>
                <?= $elemento[categoria] ?><br>
                <form action="pagina.php" method="post">
                    <input type="hidden" name="ejercicio" value="06_detalle">
                    <input type="hidden" name="codigo" value="<?= $cod ?>">
                    <input type="hidden" name="accion" value="detalle">
                    <input type="submit" value="Detalle" >
                </form>
                Unidades: 
                <form action="pagina.php" method="post">
                    <input type="hidden" name="ejercicio" value="06_categorias">                        
                    <input type="number" class="tamano" name ="a" min="1" required="" value="1">
                    <input type="hidden" name="codigo" value="<?= $cod ?>">
                    <input type="hidden" name="categoria" value="material"> 
                    <input type="hidden" name="accion" value="comprar">
                    <input type="submit" value="Comprar">
                </form>            
            </div>
    <?php
        }
   } else if ($categoria == "novedadYoferta"){
        foreach ($novedadYoferta as $cod => $elemento) {
    ?>
         <div class="pro" >
                <img src="<?= $elemento[imagen] ?>" width="110" border="1">
                <br> <?= $elemento[nombre] ?><br>
                <br> <?= $elemento[categoria] ?><br>
                Precio: <?= $elemento[precio] ?> Años
                <form action="pagina.php" method="post">
                    <input type="hidden" name="ejercicio" value="06_detalle">
                    <input type="hidden" name="codigo" value="<?= $cod ?>">
                    <input type="hidden" name="accion" value="detalle">
                    <input type="submit" value="Detalle" >
                </form>
                Unidades: 
                <form action="pagina.php" method="post">
                    <input type="hidden" name="ejercicio" value="06_categorias">                        
                    <input type="number" class="tamano" name ="a" min="1" required="" value="1">
                    <input type="hidden" name="codigo" value="<?= $cod ?>">
                    <input type="hidden" name="categoria" value="material"> 
                    <input type="hidden" name="accion" value="comprar">
                    <input type="submit" value="Comprar">
                </form>            
            </div>
    <?php
        }
   }    
    ?>
    
    <div>  
        <form action="pagina.php" method="post">
            <b>Filtrar por categorias: </b>
            <input type="hidden" name="ejercicio" value="06_categorias">
            <input type="hidden" name="codigo" value="<?= $cod ?>">
            <input type="radio" name="categoria" value="oferta">Oferta
            <input type="radio" name="categoria" value="novedad">Novedad
            <input type="radio" name="categoria" value="novedadYoferta">Novedad y Oferta
            <input type="submit" value="Filtrar" >
        </form>
    </div> 
    
    <div> 
        <form action="pagina.php" method="post">
            <input type="hidden" name="ejercicio" value="06">  
            <input type="submit" value="Quitar Filtro">
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
        $unidades = $_POST['a'];
        if ($accion == "eliminarTodo") { //vacia de articulos la cesta  
            $total = 0;
            unset( $_SESSION[cesta]);//no puedo destruir la sesion porque sino no funciona las categorias
            //session_destroy();
            //header("refresh: 0;");
        }
// Inicializa la cesta la primera vez
        if (!isset($_SESSION[cesta])) {
            $_SESSION[cesta] = array("c0001" => 0, "c0002" => 0, "c0003" => 0, "c0004" => 0, "c0005" => 0, "c0006" => 0, "c0007" => 0, "c0008" => 0);
        }
        if ($accion == "comprar") {
          $_SESSION[cesta][$codigo]=$unidades;
        }
        if ($accion == "eliminar") {
            $_SESSION[cesta][$codigo]=$_SESSION[cesta][$codigo]-1;//quita unidades de una en una
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
                        <input type="hidden" name="ejercicio" value="06">
                        <input type="hidden" name="codigo" value="<?= $cod ?>">
                        <input type="hidden" name="accion" value="eliminar">
                        <input type="submit" value="Quitar Unidades">
              </form>
              

              <?php
              $total = $total + ($_SESSION[cesta][$cod] * $elemento[precio]);
            }
          }
          ?>
          <form action="pagina.php" method="post">
                <input type="hidden" name="ejercicio" value="06">
                <input type="hidden" name="accion" value="eliminarTodo">
                <input type="submit" value="Vaciar Carrito">
          </form>    
          <b>Total: <?= $total ?> Años</b>
        </div>
    </div>
    
    
