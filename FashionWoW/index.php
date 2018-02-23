<?php

  session_start();

  /**
   * Carga del php contenedor de la clase Db
   */
  require_once('conexion.php');

  /**
   * Asignación del controlador y acción sobre dicho controlador.
   */
  if (isset($_GET['controlador']) && isset($_GET['accion'])) {
    $controlador = $_GET['controlador'];
    $accion     = $_GET['accion'];
  } else {
    $controlador = 'paginas_genericas';
    $accion     = 'home';
  }


  /** 
   * Carga del layout
   */
  require_once('views/plantilla.php');
?>