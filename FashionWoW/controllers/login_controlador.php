<?php
  class LoginControlador {

    public function index() {
      if (!isset($_SESSION['id'])) {
        require_once('views/login/index.php');
      } else {
        cargar('paginas_genericas', 'home');
      }
    }

    public function comprobacionRegistro() {
      if (!isset($_SESSION['id']) && isset($_POST['usuario']) && isset($_POST['password1']) && isset($_POST['password2'])) {
        $usuario = Login::registro($_POST['usuario'], $_POST['password1'],$_POST['password2']);
        if (is_object($usuario)) {
          $_SESSION['id'] = session_id();
          $_SESSION['usuario'] = $usuario->usuario;
          $_SESSION['id_usuario'] = $usuario->id_usuario;
          $_SESSION['nivel'] = $usuario->nivel;          
          require_once('views/login/registroAceptado.php');
        } else if (is_string($usuario) && $usuario == "error_pass") {
          $_GET['error_pass'] = true;
          require_once('views/login/registro.php');
        } else if (is_string($usuario) && $usuario == "nombre_repetido") {
          $_GET['nombre_repetido'] = true;
          require_once('views/login/registro.php');
        }
      } else {
        cargar('paginas_genericas', 'home');
      }
    }

    public function comprobacion() {
      if (!isset($_SESSION['id']) && isset($_POST['usuario']) && isset($_POST['password'])) {
        $usuario = Login::login($_POST['usuario'], $_POST['password']);
        if ($usuario) {
          $_SESSION['id'] = session_id();
          $_SESSION['usuario'] = $usuario->usuario;
          $_SESSION['id_usuario'] = $usuario->id_usuario;
          $_SESSION['nivel'] = $usuario->nivel;          
          require_once('views/login/aceptado.php');
        } else {
          $_GET['incorrecto'] = true;
          require_once('views/login/index.php');
          
        }
      } else {
        cargar('paginas_genericas', 'home');
      }
    }

    public function registro() {
      if (!isset($_SESSION['id'])) {
        require_once('views/login/registro.php');
      } else {
        cargar('paginas_genericas', 'home');
      }
    }

    public function logout() {
      if (!isset($_SESSION['id'])) {
        cargar('paginas_genericas', 'home');
      } else {
        session_unset();
        session_destroy();
        require_once('views/login/logout.php');
      }
    }

  }
?>