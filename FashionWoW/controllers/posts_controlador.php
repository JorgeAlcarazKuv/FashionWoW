<?php
  class PostsControlador {
    public function subir() {
        if (isset($_SESSION['id'])) {
            require_once('views/posts/subir.php');
        } else {
            cargar('login', 'index');
        }
    }

    public function comprobacion() {
        if (isset($_SESSION['id']) && isset($_POST['titulo'])) {
            Post::subir($_SESSION['id_usuario'], $_POST['titulo'], $_POST['descripcion'], $_POST['urlImagen'],
            $_POST['item-cabeza'],$_POST['item-hombros'],$_POST['item-capa'], $_POST['item-pecho'],$_POST['item-camisa'],
            $_POST['item-tabardo'],$_POST['item-brazales'],$_POST['item-manos'],$_POST['item-cinturon'],$_POST['item-piernas'],
            $_POST['item-pies'],$_POST['item-arma1']);
            require_once('views/posts/aceptado.php');
        } else {
            cargar('paginas_genericas', 'home');
        }
    }

    public function detalle() {
        if (isset($_GET['id_post'])) {            
            $detallePost = Post::detalleInfo($_GET['id_post']);
            $detalleItems = Post::detalleItems($_GET['id_post']);
            if ($detallePost != null) {
                require_once('views/posts/detalle.php');
            } else {
                cargar('paginas_genericas', 'home');                
            }
        } else {
            cargar('paginas_genericas', 'home');
        }
    }

    public function listadoAutor() {
        if (isset($_GET['autor'])) {            
            $listaPostsAutor = Post::listadoAutor($_GET['autor']);
            if ($listaPostsAutor != null) {
                require_once('views/posts/listado_autor.php');
            } else {
                cargar('paginas_genericas', 'home');                
            }
        } else {
            cargar('paginas_genericas', 'home');
        }
    }
}
?>