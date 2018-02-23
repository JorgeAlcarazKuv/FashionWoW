<?php
  class Post {
    public $id;
    public $autor;
    public $descripcion;
    public $titulo;
    public $imagenPrincipal;

    public function __construct($id, $autor, $descripcion, $titulo, $fecha, $imagenPrincipal) {
      $this->id      = $id;
      $this->autor  = $autor;
      $this->descripcion = $descripcion;
      $this->titulo = $titulo;
      $this->imagenPrincipal = $imagenPrincipal;
      $this->fecha = $fecha;
    }

    /**
     * Busca los últimos 5 posts y devuelve un array con 5 objetos.
     */
    public static function ultimosPosts() {
      $lista = [];
      $db = Db::getInstance();
      $sql = 'SELECT posts.id_post, usuarios.nombre_usuario, posts.titulo, posts.descripcion, posts.fecha, imagenes.url
              FROM posts
                INNER JOIN usuarios 
                ON posts.id_usuario = usuarios.id_usuario
                INNER JOIN imagenes
                ON posts.id_imagen_principal = imagenes.id_imagen
              ORDER BY posts.fecha DESC LIMIT 5';
      $resultado = $db->query($sql);

      foreach($resultado->fetch_all(MYSQLI_ASSOC) as $post) {
        $lista[] = new Post($post['id_post'], $post['nombre_usuario'], $post['descripcion'], $post['titulo'], $post['fecha'], $post['url']);
      }
      return $lista;
    }

    /**
     * Sube un nuevo post.
     */
    public static function subir($id_usuario, $titulo, $descripcion, $urlImagen, $cabeza, $hombros, $capa, $pecho, $camisa, $tabardo, $brazales, $manos, $cinturon, $piernas, $pies, $arma1) {
      $db = Db::getInstance();

      /* Inserta imagen y recupera su id */
      $sql = "INSERT INTO imagenes VALUES (null, '$urlImagen', '$id_usuario');";
      $db->query($sql) or exit("Error: " .$db->error);
      $id_imagen_principal = $db->insert_id;

      /* Inserta post */
      $sql = "INSERT INTO posts VALUES (null, '$id_usuario', '$titulo', '$descripcion', NOW(), '$id_imagen_principal','$cabeza',
      '$hombros','$capa','$pecho','$camisa','$tabardo','$brazales','$manos','$cinturon','$piernas','$pies','$arma1')";
      $db->query($sql) or exit("Error: " .$db->error);

    }

    /**
     * Recupera la información básica de un post
     */
    public static function detalleInfo($id_post) {
      $db = Db::getInstance();
      $sql = "SELECT * FROM posts 
              JOIN imagenes ON posts.id_imagen_principal = imagenes.id_imagen
              WHERE id_post='$id_post'";
      $resultado = $db->query($sql) or exit("Error: " .$db->error);      
      if ($resultado->num_rows) {
        $objDetalle = $resultado->fetch_object();
      } else {
        $objDetalle = null;
      }
      return $objDetalle;
    }

    /**
     * Busca los posts de un usuario dado
     */
    public static function listadoAutor($autor) {
      $lista = [];
      $db = Db::getInstance();
      $sql = "SELECT posts.id_post, usuarios.nombre_usuario, posts.titulo, posts.descripcion, posts.fecha, imagenes.url
              FROM posts
                INNER JOIN usuarios 
                ON posts.id_usuario = usuarios.id_usuario
                INNER JOIN imagenes
                ON posts.id_imagen_principal = imagenes.id_imagen
                WHERE usuarios.nombre_usuario = '$autor'
              ORDER BY posts.fecha DESC";
      $resultado = $db->query($sql);

      foreach($resultado->fetch_all(MYSQLI_ASSOC) as $post) {
        $lista[] = new Post($post['id_post'], $post['nombre_usuario'], $post['descripcion'], $post['titulo'], $post['fecha'], $post['url']);
      }
      return $lista;
    }

    /**
     * Recupera los items de un post
     */
    public static function detalleItems($id_post) {
      $definiciones = ['id_item_cabeza','id_item_hombros','id_item_capa','id_item_pecho','id_item_camisa','id_item_tabardo','id_item_brazales','id_item_manos','id_item_cinturon','id_item_piernas','id_item_pies','id_item_arma1'];
      $db = Db::getInstance();
      $arrayItemsDetalle = array();

      // Me traigo los datos del post
      $sql = "SELECT * FROM posts 
              WHERE id_post='$id_post'";
      $resultado = $db->query($sql) or exit("Error: " .$db->error);      
      if ($resultado->num_rows) {
        $objDetalle = $resultado->fetch_object();
      } else {
        return null;
      }

      // Saco info de item cabeza
      foreach ($definiciones as $campo) {
        $idCampo = $objDetalle->{$campo};
        $sql = "SELECT * FROM items WHERE id_item='$idCampo'";
        $resultado = $db->query($sql) or exit("Error: " .$db->error);      
        if ($resultado->num_rows) {
          $arrayItemsDetalle[$campo] = $resultado->fetch_assoc();
        } else {
          return null;
        }
      }
      return $arrayItemsDetalle;
    }
  }
?>