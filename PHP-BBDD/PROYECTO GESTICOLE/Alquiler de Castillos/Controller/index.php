

<?php
  require_once '../Model/Castillo.php';

  // Obtiene todos los castillos
  $data['castillos'] = Castillo::getCastillos();

  // Carga la vista de listado
  include '../View/listado.php';
  
  