<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link href="css/default.css" rel="stylesheet" type="text/css" />
    <title>Tienda on-line simple</title>
    <style type="text/css">
      #productos  {
        border: 2px;
        border-collapse: collapse;
        margin: 0px 30px 0px 30px;
        text-align: center;
        float: left;
        width: 300px;
        height: 800px;
        background-color: blue;
        border-radius: 5%;
      }
      #compra {
        border: 2px;
        border-collapse: collapse;
        margin: 0px 30px 0px 30px;
        text-align: center;
        float: left;
        width: 300px;
        height: 800px;
        background-color: pink;
        border-radius: 5%;
      }
    </style>
  </head>
  <body>


    <h3>Tienda on-line <b><i><u>Carrera de Caracoles</u></i></b></h3>
    <table><tr><td id="productos">
          <h3>Productos</h3><hr>
          <?php
// Tienda ///////////////////////////////////////////////////////

          $caracoles = array(//en un array recogo otro array asociativo en el que asocio varias parejas
              "c0001" => array(
                  "nombre" => "Bruma",
                  "precio" => 75,
                  "imagen" => "caracol0.png"
              ),
              "c0002" => array(
                  "nombre" => "Turbo",
                  "precio" => 80,
                  "imagen" => "caracol1.png"
              ),
              "c0003" => array(
                  "nombre" => "Brisa",
                  "precio" => 90,
                  "imagen" => "caracol2.png"
              )
          );

          $_SESSION['compra'] = $caracoles;

          foreach ($caracoles as $codigo => $elemento) {
            ?>
            <img src="<?= $elemento[imagen] ?>" width="100" border="1"><br>
            <?= $elemento[nombre] ?><br>
            Precio: <?= $elemento[precio] ?> €
            <form action="#" method="post">
              <input type="hidden" name="codigo" value="<?= $codigo ?>">
              <input type="hidden" name="accion" value="comprar">
              <input type="submit" value="Comprar">
            </form>
            <?php
          }
          ?>

        </td>

        <td id="compra">			
          <h3>Carrito</h3>
          <hr>
          <?php
// Cesta de la Compra ///////////////////////////////////////////////////////
          $accion = $_POST['accion'];
          $codigo = $_POST['codigo'];

// Inicializa la cesta la primera vez
          if (!isset($_SESSION[cesta])) {
            $_SESSION[cesta] = array("c0001" => 0, "c0002" => 0, "c0003" => 0);
          }

          if ($accion == "comprar") {
            $_SESSION[cesta][$codigo] ++;
          }

          if ($accion == "eliminar") {
            $_SESSION[cesta][$codigo] = 0;
          }

// Muestra el contenido de la cesta de la compra
          $total = 0;
          foreach ($caracoles as $cod => $elemento) {
            if ($_SESSION[cesta][$cod] > 0) {
              ?>
              <img src="<?= $elemento[imagen] ?>" width="75" border="1"><br>
              <?= $elemento[nombre] ?><br>
              Precio: <?= $elemento[precio] ?> €<br>
              Unidades: <?= $_SESSION[cesta][$cod] ?>
              <form action="#" method="post">
                <input type="hidden" name="codigo" value="<?= $cod ?>">
                <input type="hidden" name="accion" value="eliminar">
                <input type="submit" value="Eliminar">
              </form>

              <?php
              $total = $total + ($_SESSION[cesta][$cod] * $elemento[precio]);
            }
          }
          ?>
          <b>Total: <?= $total ?> €</b>

        </td>
      </tr>
    </table>
  </body>
</html>
