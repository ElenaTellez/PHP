<?php

require_once 'GesticoleDB.php';

class Castillo {
  private $id;
  private $titulo;
  private $imagen;
  private $descripcion;
  
  function __construct($id, $titulo, $imagen, $descripcion) {
    $this->id = $id;
    $this->titulo = $titulo;
    $this->imagen = $imagen;
    $this->descripcion = $descripcion;
  }

  public function getId() {
    return $this->id;
  }

  public function getTitulo() {
    return $this->titulo;
  }

  public function getImagen() {
    return $this->imagen;
  }

  public function getDescripcion() {
    return $this->descripcion;
  }  
  
  public function insert() {
    $conexion = GesticoleDB::connectDB();
    $insercion = "INSERT INTO castillo (titulo, imagen, descripcion) VALUES (\"".$this->titulo."\", \"".$this->imagen."\", \"".$this->descripcion."\")";
    $conexion->exec($insercion);
  }

  public function delete() {
    $conexion = GesticoleDB::connectDB();
    $borrado = "DELETE FROM castillo WHERE id=\"".$this->id."\"";
    $conexion->exec($borrado);
  }
  
  public static function getCastillos() {
    $conexion = GesticoleDB::connectDB();
    $seleccion = "SELECT id, titulo, imagen, descripcion FROM castillo";
    $consulta = $conexion->query($seleccion);
    
    $ofertas = [];
    
    while ($registro = $consulta->fetchObject()) {
      $castillos[] = new Castillo($registro->id, $registro->titulo, $registro->imagen, $registro->descripcion);
    }
   
    return $castillos;    
  }
  
  public static function getCastilloById($id) {
    $conexion = GesticoleDB::connectDB();
    $seleccion = "SELECT id, titulo, imagen, descripcion FROM castillo WHERE id=\"".$id."\"";
    $consulta = $conexion->query($seleccion);
    $registro = $consulta->fetchObject();
    $castillo = new Castillo($registro->id, $registro->titulo, $registro->imagen, $registro->descripcion);
       
    return $castillo;    
  }
}
