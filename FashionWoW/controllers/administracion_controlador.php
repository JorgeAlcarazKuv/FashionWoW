<?php
  class AdministracionControlador {
    public function index() {
        $administracionObj = new Administracion();
        $numPaginasUsuarios = $administracionObj->numeroPaginas("usuarios");
        require_once('views/administracion/index.php');
    }
  }
?>