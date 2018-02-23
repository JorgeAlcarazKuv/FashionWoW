<style>

.contenedor-subida {
  padding: 1rem 2rem 2rem 2rem;
  border: 1px solid black;
}
.contenedor-imagen-principal{
    width: 100%;
    min-height: 550px;
    background-repeat: no-repeat;
    background-size: contain;
    background-position: center;
    text-align: center;
    position:relative;
    border: 1px solid brown;
    background-color: #fff6892e;
}
.contenedor-imagen-principal i{
  position: relative;
  top: 225px;
}
.contenedor-titulo-subida {
    height: 50px;
}
.contenedor-titulo-subida input, textarea {
    text-align: center;
}
.form-control:focus {
  box-shadow: 1px 0px 20px 0.2rem rgba(236, 218, 86, 0.83);
}
.form-control {
    border: 0;
    border-bottom: 1px solid #6d6d6d;
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

.input-item {
  margin-bottom: 15px;
  text-align: center;
}

#loadingImageIcon {
  color: #ffee71;
  display:none;
}


</style>



<div class="row">
  <!-- Comienza Columna Izquierda -->
  <div class="col-sm-2 columna-izquierda-items">
    <div id="icono-cabeza" class="icon-item" data-toggle="tooltip" data-placement="right" title="Cabeza"></div>
    <input id="cabeza" class="input-item" type="text" form="form-nueva-subida" name="item-cabeza">    
    <div id="icono-hombros" class="icon-item"data-toggle="tooltip" data-placement="right" title="Hombros"></div>
    <input id="hombros" class="input-item" type="text" form="form-nueva-subida" name="item-hombros">  
    <div id="icono-capa" class="icon-item" data-toggle="tooltip" data-placement="right" title="Capa"></div>
    <input id="capa" class="input-item" type="text" form="form-nueva-subida" name="item-capa">   
    <div id="icono-pecho" class="icon-item" data-toggle="tooltip" data-placement="right" title="Torso"></div>
    <input id="pecho" class="input-item" type="text" form="form-nueva-subida" name="item-pecho">    
    <div id="icono-camisa" class="icon-item" data-toggle="tooltip" data-placement="right" title="Camisa"></div>
    <input id="camisa" class="input-item" type="text" form="form-nueva-subida" name="item-camisa">    
    <div id="icono-tabardo" class="icon-item" data-toggle="tooltip" data-placement="right" title="Tabardo"></div>
    <input id="tabardo" class="input-item" type="text" form="form-nueva-subida" name="item-tabardo">    
  
  </div>

  <!-- Comienza Columna Central -->
  <div class="col-sm-8 columna-central">
    <!-- Titulo subida -->
    <div class="row justify-content-sm-center contenedor-titulo-subida">
      <div class="col-sm-6">
        <input name="titulo" minlength="4" maxlength="20" required form="form-nueva-subida" type="text" class="form-control" id="nuevoPostTitulo" aria-describedby="nuevoPostTituloHelp" placeholder="Introduce un título">
      </div>
    </div>
    <!-- Imagen Principal -->
    <div class="contenedor-imagen-principal"><p style="position:relative;top:225px; z-index:-1;">> Haz click para añadir imagen < </p><i id="loadingImageIcon" class="fa fa-spinner fa-spin" style="font-size:48px"></i></div>
    <input id="iptSubidaImagen" type="file" style="display:none"></input>
    <input id="iptSubidaUrlImagen" required form="form-nueva-subida" name="urlImagen" type="text" style="display:none"></input>
    <!-- Formulario -->
    <form id="form-nueva-subida" action='?controlador=posts&accion=comprobacion' method="post">
      <div class="form-row">
        <div class="form-group col-sm-12">
          <textarea class="form-control" required minlength="4" maxlength="400" name="descripcion" id="nuevoPostDescripcion" cols="30" rows="2" placeholder="Introduce una descripción"></textarea>
        </div>
      </div>
      <div class="form-row justify-content-sm-center">
        <div class="form-group col-sm-1">
          <button type="submit" class="btn btn-outline-warning">Subir</button>      
        </div>
      </div>
    </form>
  </div>
  
  <!-- Comienza Columna Derecha -->
  <div class="col-sm-2 columna-derecha-items">
    <div id="icono-brazales" class="icon-item" data-toggle="tooltip" data-placement="right" title="Brazales"></div>
    <input id="brazales" class="input-item" type="text" form="form-nueva-subida" name="item-brazales">  
    <div id="icono-manos" class="icon-item" data-toggle="tooltip" data-placement="right" title="Guantes"></div>
    <input id="manos" class="input-item" type="text" form="form-nueva-subida" name="item-manos">    
    <div id="icono-cinturon" class="icon-item" data-toggle="tooltip" data-placement="right" title="Cinturón"></div>
    <input id="cinturon" class="input-item" type="text" form="form-nueva-subida" name="item-cinturon">    
    <div id="icono-piernas" class="icon-item" data-toggle="tooltip" data-placement="right" title="Piernas"></div>
    <input id="piernas" class="input-item" type="text" form="form-nueva-subida" name="item-piernas">    
    <div id="icono-pies" class="icon-item" data-toggle="tooltip" data-placement="right" title="Pies"></div>
    <input id="pies" class="input-item" type="text" form="form-nueva-subida" name="item-pies">    
    <div id="icono-arma1" class="icon-item" data-toggle="tooltip" data-placement="right" title="Arma 1"></div>
    <input id="arma1" class="input-item" type="text" form="form-nueva-subida" name="item-arma1">  
  </div>
</div>

<script>
  $(document).ready(function() {
    $("#iptSubidaImagen").change(() => {
      var form = new FormData();      
      form.append("image", iptSubidaImagen.files[0]);
      console.log(form);
      var settings = {
        "async": true,
        "crossDomain": true,
        "url": "https://api.imgur.com/3/image",
        "method": "POST",
        "headers": {
            "Authorization": "Client-ID a91e8926d34e117"
        },
        "processData": false,
        "contentType": false,
        "mimeType": "multipart/form-data",
        "data": form,
        beforeSend: function() {
          $("#loadingImageIcon").css("display", "inline-block");
        },
        complete: function() {
          $("#loadingImageIcon").css("display", "none");            
        },
        success: (response) => {
          $(".contenedor-imagen-principal").css("background-image", `url(${JSON.parse(response).data.link})`);
          $("#iptSubidaUrlImagen").val(JSON.parse(response).data.link); 
        }
      }
      $.ajax(settings).done(function (response) {});

    });

    $(".contenedor-imagen-principal").click(() => {
      $("#iptSubidaImagen").trigger('click');      
    });

    $(".input-item").blur((e) => {
      if (e.target.value) {
        $.get(`https://eu.api.battle.net/wow/item/${e.target.value}?locale=es_ES&apikey=gwm4v4gagaa2zhw33teacses238z37fz`, (respuesta) => {
          console.log(respuesta);
          let iconoUrl = `http://media.blizzard.com/wow/icons/56/${respuesta.icon}.jpg`;
          $(`#icono-${e.target.id}`).css("background-image", `url(${iconoUrl})`);
          $(`#icono-${e.target.id}`).attr("data-original-title", respuesta.name);

          // Inserción del objeto comprobado en base de datos.
          let payload = {};
          payload.id_item = respuesta.id;
          payload.url_icono = iconoUrl;
          payload.nombre_item = respuesta.name;
          payload.id_casilla = respuesta.inventoryType;
          $.post({
              url: 'models/insertaItemsAjax.php',
              data: payload
          }).done(() => {
            console.log("Insertado item");
          });
        });
      }
    });

    $('[data-toggle="tooltip"]').tooltip()

  });
</script>

  








