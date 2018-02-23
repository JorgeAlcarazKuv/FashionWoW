<?php
  class PaginasGenericasControlador {
    public function home() {
      $ultimosPosts = Post::ultimosPosts();
      require_once('views/paginas_genericas/home.php');
    }

    public function error() {
      require_once('views/paginas_genericas/error.php');
    }
  }
?>