<?php
  require_once '../Model/Castillo.php';
  $castilloAux = new Castillo($_GET['id']);
  $castilloAux->delete();
  header("Location: index.php");