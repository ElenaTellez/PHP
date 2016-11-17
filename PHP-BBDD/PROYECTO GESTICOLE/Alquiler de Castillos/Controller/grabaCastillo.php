<?php
  require_once '../Model/Castillo.php';

  // sube la imagen al servidor
  move_uploaded_file($_FILES["imagen"]["tmp_name"], "../View/images/" . $_FILES["imagen"]["name"]);

  // inserta un castillo nuevo en la base de datos
  $CastilloAux = new Castillo("", $_POST['titulo'], $_FILES["imagen"]["name"], $_POST['descripcion']);
  $CastilloAux->insert();
  header("Location: index.php");