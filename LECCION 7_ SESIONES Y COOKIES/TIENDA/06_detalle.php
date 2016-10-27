
<div id="productos">
    <h3>Detalle del producto</h3>
    <hr>
    <?php
    $codigo = $_POST['codigo'];
    $producto = $_SESSION['compra'];
    $elemento = $producto[$codigo];
    ?>
    <div class="detalle">
    <img src="<?= $elemento[imagen] ?>" width="360" border="1">
    </div>
    <div class="detalle">  <br> <br>
        <b>Reloj: </b><?= $elemento[nombre] ?>  <br> <br>   
    <b>Precio: </b><?= $elemento[precio] ?> Años <br> 
    <br><b>Unidades de este producto en la cesta:</b> <?= $_SESSION[cesta][$codigo] ?>
    <br> <br> <b>Características de este tiempo:</b>
    <br> <br><?= $elemento[detalle] ?>
    <br> <br>
    <form action="pagina.php" method="post">
        <input type="hidden" name="ejercicio" value="06">
        <input type="hidden" name="codigo" value="<?= $codigo ?>">
        <input type="hidden" name="accion" value="comprar">
        <input type="submit" value="Añadir a la cesta de la compra">
    </form>
    <br> <br>
    <form action="pagina.php" method="post">
        <input type="hidden" name="ejercicio" value="06">
        <input type="submit" value="Seguir comprando">
    </form>
    </div>
    </div>
</div>   