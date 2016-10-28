 
<div id="productos">
    <?php
    
    $accion = $_POST['accion'];
    $codigo = $_POST['codigo'];
    
    if ($accion == "eliminarTodo") { //vacia de articulos la cesta  
          ?> 
            <form action="pagina.php" method="post">
              <p>¿Desea vaciar el carrito de la compra?</p>
                <input type="hidden" name="ejercicio" value="06">
                <input type="radio" name="confirma" value="eliminarTodo">SI 
                <input type="radio" name="confirma" value="no">NO
                <input type="submit" value="confirmar" >
            </form>
  <?php
  }
       
  if ($accion == "eliminar") { //quita un producto 
          ?> 
            <form action="pagina.php" method="post">
              <p>¿Desea quitar el producto del carrito de la compra?</p>
                <input type="hidden" name="ejercicio" value="06">
                <input type="hidden" name="cod" value="<?=$codigo?>">
                <input type="radio" name="confirma" value="eliminar">SI 
                <input type="radio" name="confirma" value="no">NO
                <input type="submit" value="confirmar" >
            </form>
    <?php
  }
  ?>    
 </div>