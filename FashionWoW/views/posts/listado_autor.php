<link rel="stylesheet" href="./assets/styles/home.css">

<div class="row">
    <div class="col-sm">
      <h3>Publicaciones del usuario <b><?= $listaPostsAutor[0]->autor ?></b></h3>
    </div>
</div>
<?php foreach($listaPostsAutor as $post) { ?>
    <div class="row card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <img src="<?= $post->imagenPrincipal ?> "style='height: 100%; width: 100%; object-fit: contain' alt="<?= $post->titulo ?>"/> 
                </div>
                <div class="col-sm-8">
                    <h2 class="card-text"><a href="?controlador=posts&accion=detalle&id_post=<?= $post->id ?>"><?= $post->titulo ?></a></h2>                    
                    <p class="card-text">Autor: <a href="?controlador=posts&accion=listadoAutor&autor=<?= $post->autor ?>"><?= $post->autor ?></a></p>
                    <p class="card-text"><?= $post->descripcion ?></p>
                </div>                
            </div>
        </div>
    </div>
<?php } ?>