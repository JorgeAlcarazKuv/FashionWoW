<?php
  /**
   * Array que mapea los controladores a sus acciones.
   */
  define("CONTROLADORES", array('paginas_genericas' => ['home', 'error'],
                                'login'             => ['index', 'comprobacion', 'logout', 'registro', 'comprobacionRegistro'],
                                'posts'             => ['detalle', 'subir', 'comprobacion', 'listadoAutor'],
                                'administracion'    => ['index']));


  /* Usa las variables $controlador y $accion que son definidas en index.php
     Si no existen los parámetros proporcionados en el array de controladores, 
     carga la página genérica de error.*/
  if (array_key_exists($controlador, CONTROLADORES)) {
    if (in_array($accion, CONTROLADORES[$controlador])) {
      cargar($controlador, $accion);
    } else {
      cargar('paginas_genericas', 'error');
    }
  } else {
    cargar('paginas_genericas', 'error');
  }

  /**
   * Se encarga de ejecutar el método que cargará la vista, en función de los parámetros
   * controlador y acción proporcionados.
   */
  function cargar($controlador, $accion) {
    require_once('controllers/' . $controlador . '_controlador.php');

    switch($controlador) {
      case 'paginas_genericas':
        require_once('models/post.php');
        $controlador = new PaginasGenericasControlador();
      break;
      case 'login':
        require_once('models/login.php');
        $controlador = new LoginControlador();
      break;
      case 'posts':
        require_once('models/post.php');
        $controlador = new PostsControlador();
      break;
      case 'administracion':
        require_once('models/administracion.php');
        $controlador = new AdministracionControlador();
      break;
    }

    $controlador->{$accion}();
  }
?>