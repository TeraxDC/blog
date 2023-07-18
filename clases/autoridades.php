<?php
require_once  './conexion/conexion.php';
class Autoridad
{

  public function listar_alcalde()
  {
    try {
      $conexion = new Conexion();
      $conectado = $conexion->conectar();
      $sql = "SELECT * FROM autoridad a INNER JOIN gestion g on a.gestion = g.id WHERE cargo = 1";
      $result = $conectado->prepare($sql);
      $result->execute([]);

      foreach ($result as $filas) {

        echo '<div class="card mb-3">';
        echo '<div class="row g-0">';
        echo '<div class="col-md-5">';
        echo '<img src="./adminweb/imagenes/autoridad/' . $filas['foto'] . '" class="img-fluid rounded-start" alt="' . $filas['nombre'] . '">';
        echo '</div>';
        echo '<div class="col-md-7">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title font-weight-bold"> ' . $filas['nombre'] . ' </h5>';
        echo '<p class="card-text">' . $filas['descripcion'] . '</p>';
        echo '<p class="card-text"><small class="text-muted">' . $filas['lema'] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
    } catch (Exception $exc) {
      echo $exc->getTraceAsString();
    }
  }

  public function listar_regidores()
  {
    try {
      $conexion = new Conexion();
      $conectado = $conexion->conectar();
      $sql = "select * from autoridad where cargo = 2";
      $result = $conectado->prepare($sql);
      $result->execute([]);

      foreach ($result as $filas) {
        echo '<div class="col-lg-4 mb-4">';
        echo '<div class="card">';
        echo '<img src="./adminweb/imagenes/autoridad/' . $filas['foto'] . '" alt="" class="card-img-top">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title font-weight-bold">' . $filas['nombre'] . '</h5>';
        echo '<h6 class="card-text font-weight-bold">' . $filas['correo'] . '</h6>';
        echo '<p class="card-text">' . $filas['descripcion'] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
    } catch (Exception $exc) {
      echo $exc->getTraceAsString();
    }
  }
}
