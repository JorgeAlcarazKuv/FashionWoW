<style>
    .navbar a{color: #ceb437}
  </style>
</style>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/FashionWoW"><img src="./assets/images/WoWlogo.png" height="40" width="100"></img></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link active" href="/FashionWoW">Home</span></a>
          </div>
        </div>
        <?php if (!isset($_SESSION['usuario'])) { ?>
            <a class="nav-item nav-link" href='?controlador=login&accion=registro'>Registrarse</a>
            <a class="nav-item nav-link" href='?controlador=login&accion=index'>Login</a>
        <?php } else { ?>
            <?php if ($_SESSION['nivel'] == "admin") { ?>
                <a class="nav-item nav-link" href='?controlador=administracion&accion=index'>Administración</a>
            <?php } ?> 
            <a class="nav-item nav-link" href='?controlador=posts&accion=subir'>Subir</a>
            <a class="nav-item nav-link" href='?controlador=login&accion=logout'>Salir</a>
        <?php } ?>
    </nav>
</header>