<style>


.contenedor-imagen-principal{
    width: 100%;
    min-height: 550px;
    background-image: url(<?= $detallePost->url ?>);
    background-repeat: no-repeat;
    background-size: contain;
    background-position: center;
    text-align: center;
    position:relative;
    border: 1px solid brown;
}
.contenedor-imagen-principal i{
  position: relative;
  top: 225px;
}
.contenedor-titulo-post {
    height: 50px;
}


.columna-central {
  border-left: 1px solid black;
  border-right: 1px solid black;
}
.columna-izquierda-items, .columna-derecha-items{
  text-align: center;
  flex-direction: column;
  display:flex;
  align-items: center;
}

.icon-item {
  background-size: contain;
  background-repeat: no-repeat;
  width: 75px;
  height: 75px;
  border: 1px solid black;
}

.text-item {
  margin-bottom: 15px;
  text-align: center;
}

#postTitulo {
    text-align: center;
    font-size: 28px;
    font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
    color: #aba15c;
}

#postDescripcion {
    text-align: center;
    font-size: 20px;
    font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
    min-height: 100px;
    line-height: 100px;
    display: inline-block;
    color: #aba15c;
    margin-top: 15px;
}
#postDescripcion > span{
    display: inline-block;
  vertical-align: middle;
  line-height: normal;
}


</style>



<div class="row">
  <!-- Comienza Columna Izquierda -->
  <div class="col-sm-2 columna-izquierda-items">
    <div id="icono-cabeza" class="icon-item" data-toggle="tooltip" data-placement="right" title="<?= $detalleItems['id_item_cabeza']['nombre_item'] ?>" style="background-image: url('<?= $detalleItems['id_item_cabeza']['url_icono'] ?>')"></div>
    <span id="cabeza" class="text-item"></span>  
    <div id="icono-hombros" class="icon-item"data-toggle="tooltip" data-placement="right" title="<?= $detalleItems['id_item_hombros']['nombre_item'] ?>" style="background-image: url('<?= $detalleItems['id_item_hombros']['url_icono'] ?>')"></div>
    <span id="hombros" class="text-item">  </span>
    <div id="icono-capa" class="icon-item" data-toggle="tooltip" data-placement="right" title="<?= $detalleItems['id_item_capa']['nombre_item'] ?>" style="background-image: url('<?= $detalleItems['id_item_capa']['url_icono'] ?>')"></div>
    <span id="capa" class="text-item" >  </span> 
    <div id="icono-pecho" class="icon-item" data-toggle="tooltip" data-placement="right" title="<?= $detalleItems['id_item_pecho']['nombre_item'] ?>" style="background-image: url('<?= $detalleItems['id_item_pecho']['url_icono'] ?>')"></div>
    <span id="pecho" class="text-item" > </span>   
    <div id="icono-camisa" class="icon-item" data-toggle="tooltip" data-placement="right" title="<?= $detalleItems['id_item_camisa']['nombre_item'] ?>" style="background-image: url('<?= $detalleItems['id_item_camisa']['url_icono'] ?>')"></div>
    <span id="camisa" class="text-item" > </span>   
    <div id="icono-tabardo" class="icon-item" data-toggle="tooltip" data-placement="right" title="<?= $detalleItems['id_item_tabardo']['nombre_item'] ?>" style="background-image: url('<?= $detalleItems['id_item_tabardo']['url_icono'] ?>')"></div>
    <span id="tabardo" class="text-item" > </span>   
  
  </div>

  <!-- Comienza Columna Central -->
    <div class="col-sm-8 columna-central">
        <!-- Titulo post -->
        <div class="row justify-content-sm-center contenedor-titulo-post">
            <div id="postTitulo" class="col-sm-6">
                <?= $detallePost->titulo ?>
            </div>
        </div>
        <!-- Imagen Principal -->
        <div class="contenedor-imagen-principal"></div>
        <!-- Información -->
        <div class="row">
            <div id="postDescripcion" class="col-sm-12">
                <span><?= $detallePost->descripcion ?></span>
            </div>
        </div>
    </div>
  
  <!-- Comienza Columna Derecha -->
  <div class="col-sm-2 columna-derecha-items">
    <div id="icono-brazales" class="icon-item" data-toggle="tooltip" data-placement="right" title="<?= $detalleItems['id_item_brazales']['nombre_item'] ?>" style="background-image: url('<?= $detalleItems['id_item_brazales']['url_icono'] ?>')"></div>
    <span id="brazales" class="text-item">  </span>
    <div id="icono-manos" class="icon-item" data-toggle="tooltip" data-placement="right" title="<?= $detalleItems['id_item_manos']['nombre_item'] ?>" style="background-image: url('<?= $detalleItems['id_item_manos']['url_icono'] ?>')"></div>
    <span id="manos" class="text-item">    </span>
    <div id="icono-cinturon" class="icon-item" data-toggle="tooltip" data-placement="right" title="<?= $detalleItems['id_item_cinturon']['nombre_item'] ?>" style="background-image: url('<?= $detalleItems['id_item_cinturon']['url_icono'] ?>')"></div>
    <span id="cinturon" class="text-item">    </span>
    <div id="icono-piernas" class="icon-item" data-toggle="tooltip" data-placement="right" title="<?= $detalleItems['id_item_piernas']['nombre_item'] ?>" style="background-image: url('<?= $detalleItems['id_item_piernas']['url_icono'] ?>')"></div>
    <span id="piernas" class="text-item">    </span>
    <div id="icono-pies" class="icon-item" data-toggle="tooltip" data-placement="right" title="<?= $detalleItems['id_item_pies']['nombre_item'] ?>" style="background-image: url('<?= $detalleItems['id_item_pies']['url_icono'] ?>')"></div>
    <span id="pies" class="text-item">   </span> 
    <div id="icono-arma1" class="icon-item" data-toggle="tooltip" data-placement="right" title="<?= $detalleItems['id_item_arma1']['nombre_item'] ?>" style="background-image: url('<?= $detalleItems['id_item_arma1']['url_icono'] ?>')"></div>
    <span id="arma1" class="text-item"> </span> 
  </div>
</div>

<script>
  $(document).ready(function() {

    $('[data-toggle="tooltip"]').tooltip()

  });
</script>

  








