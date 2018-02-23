<link rel="stylesheet" href="./assets/styles/administracion_index.css">
<style>
    fieldset input { display:block; }
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    h1 { font-size: 1.2em; margin: .6em 0; }
    div#users-contain { width: 350px; margin: 20px 0; }
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em; }
    .page-item.active .page-link {background-color: #e0d26b; border-color: #a98431;}
    .page-link {color: #ceb55a;}

    .page-link:focus {box-shadow:    0 0 0 0.2rem rgba(255, 165, 73, 0.43);}
    .page-link:hover{color:#b35300;}
    .errores {font-size: 12px; color: red}

  </style>
<?php 
    if (!isset($_SESSION['usuario']) || $_SESSION['nivel'] != "admin") {
        echo "No tienes permisos para ver esto.";
    } else { ?>
        <h5 style="margin-top: 15px">Panel de administración</h5>
        <div class="row" style="flex-direction: row-reverse; margin-bottom: 15px;">
            <div class="col-sm-3">
                <label for="selectOrden">Dirección</label>
                <select id="selectOrden" class="custom-select custom-select-sm">
                    <option selected value="ASC">Ascendente</option>
                    <option value="DESC">Descendente</option>
                </select>
            </div>
            <div class="col-sm-3">
                <label for="selectCampo">Ordenar por:</label>
                <select id="selectCampo" class="custom-select custom-select-sm">
                    <option selected value="id_usuario">Id de usuario</option>
                    <option value="nombre_usuario">Nombre de usuario</option>
                </select>
            </div>
            <div class="col-sm-3" style="margin-right: auto">
                <label for="matchCadena">Buscar cadena: </label>
                <input type="text" id="matchCadena">
            </div>

        </div>

    <div id="paginacion-selector-top" style="text-align: center"></div>
    <div id="tabla-administracion">
        <table class="table table-sm" style="text-align: center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Contraseña</th>
                    <th scope="col">Nivel</th>
                    <th scope="col">Controles</th>
                </tr>
                <tbody id="cuerpo-tabla-administracion">
                </tbody>
            </thead>
        </table>
    </div>
    <div id="paginacion-selector-bot" style="text-align: center"></div>
    
    <h5>Nuevo usuario <span class="errores" id="iptNombreNuevoError"></span><span class="errores" id="iptPasswordNuevoError"></span></h5>
    <table class="table" >
        <tbody>
            <tr class="row">
                <th>
                    <form id="formNuevo">
                        <label for="iptNombreNuevo">Nombre: </label>
                        <input type="text" id="iptNombreNuevo" class="col-sm-2"name="iptNombreNuevo" form="formNuevo" required>
                        <label for="iptPasswordNuevo">Pass: </label>
                        <input type="password" id="iptPasswordNuevo" class="col-sm-2" name="iptPasswordNuevo"  form="formNuevo" required>
                        <label for="iptNivelNuevo">Nivel: </label>
                        <select type="text" id="iptNivelNuevo" class="custom-select custom-select-sm col-sm-2" name="iptNivelNuevo" form="formNuevo" required>
                            <option value="usuario" selected>Usuario</option>
                            <option value="moderador">Moderador</option>
                            <option value="admin">Admin</option>
                        </select>
                        <label for="datepicker">Fecha: </label>
                        <input type="text" id="datepicker" name="datepicker"form="formNuevo">
                        <input type="submit" id="btnNuevo" class="btn btn-outline-success" value="Nuevo">
                    </form>
                </th>
            </tr>
        </tbody>
    </table>



    <div id="dialog-eliminar" title="Eliminar usuario">
        <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>¿Está seguro de que desea eliminar el usuario?</p>
    </div>


    <div id="dialog-modificar" title="Modificar usuario">
        <form id="formModificar">
            <fieldset>
            <label for="id_usuario">Id</label>
            <input disabled type="text" name="id_usuario" id="id_usuario" class="text ui-widget-content ui-corner-all">
            <label for="nombre_usuario">Nombre</label>
            <input type="text" name="nombre_usuario" id="nombre_usuario" class="text ui-widget-content ui-corner-all">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="text ui-widget-content ui-corner-all">
            <label for="nivel">Nivel</label>
            <input type="text" name="nivel" id="nivel" class="text ui-widget-content ui-corner-all">
        
            </fieldset>
        </form>
    </div>
<script>
    // COMIENZO DE JQUERY
    $(document).ready(function() {
        obtenerPaginaUsuarios(1);
        $('#paginacion-selector-top,#paginacion-selector-bot').bootpag({
            total: <?= $numPaginasUsuarios ?>,
            page: 1,
            maxVisible: 5,
            leaps: true,
            firstLastUse: true,
            first: '←',
            last: '→',
        }).on("page", function(event, num){
            obtenerPaginaUsuarios(num);
        });
        // AJAX NÚMERO DE PAGINAS
        function obtenerPaginaUsuarios(pagina) {
            $( "#cuerpo-tabla-administracion").load( "models/administracionAjax.php", { accion: "obtenerPagina", elementos: "usuarios", pagina: pagina, campoOrden: $('#selectCampo').val(), direcOrden:$('#selectOrden').val(), match:$('#matchCadena').val()});
        }

        // BOTÓN ELIMINAR
        let dataEliminar;
        $("body").on("click",".btnEliminar",function(){
            let padreId = $(this).parents("tr").attr("id");
            let fila = $(this).parents("tr");
            dataEliminar = {fila: fila, data: {accion: "eliminarElemento", elementos: "usuarios", idElemento: padreId}};
            dialogEliminar.dialog( "open" );
        });
        // MODAL ELIMINAR
        dialogEliminar = $( "#dialog-eliminar" ).dialog({
            autoOpen: false,
            resizable: false,
            height: "auto",
            width: 600,
            modal: true,
            buttons: {
                "Eliminar": () =>  {
                    $.post({
                        url: 'models/administracionAjax.php',
                        data: dataEliminar.data,
                        success: () => {
                            dataEliminar.fila.fadeOut("slow", function() {
                                $(this).remove();
                            });
                        }
                    })
                    dialogEliminar.dialog( "close" );
                },
                Cancel: function() {
                    dialogEliminar.dialog( "close" );
                }
            }
        });
        
        // BOTÓN MODIFICAR
        let dataModificar;
        $("body").on("click",".btnModificar",function(){
            let padreId = $(this).parents("tr").attr("id");
            let fila = $(this).parents("tr");
            dataModificar = {fila: fila, data: {accion: "modificarElemento", elementos: "usuarios", idElemento: padreId}};
            
            $("#id_usuario").val(padreId);
            $("#nombre_usuario").val(fila.children(".nombre_fila").text());
            $("#password").val(fila.children(".password_fila").text());
            $("#nivel").val(fila.children(".nivel_fila").text());
            
            dialogModificar.dialog( "open" );
        });
        // MODAL MODIFICAR
        dialogModificar = $( "#dialog-modificar" ).dialog({
            autoOpen: false,
            height: "auto",
            width: 400,
            modal: true,
            buttons: {
                "Modificar": modificarElemento,
                Cancel: function() {
                    dialogModificar.dialog( "close" );
                }
            }
        });

        function modificarElemento() {
            
            dataModificar.data.nombre_usuario = $("#nombre_usuario").val();
            dataModificar.data.password = $("#password").val();
            dataModificar.data.nivel = $("#nivel").val();
            console.log(dataModificar.data);
            $.post({
                url: 'models/administracionAjax.php',
                data: dataModificar.data,
                success: () => dataModificar.fila.html(`<td>${$("#id_usuario").val()}</td><td>${$("#nombre_usuario").val()}</td><td>${$("#password").val()}</td><td>${$("#nivel").val()}</td><td><button class='btnModificar btn btn-outline-secondary'>Modificar</button><button class='btnEliminar btn btn-outline-danger'>Eliminar</button></td>`)
            });
            $( this ).dialog( "close" );
        }
        // Evita el submit
        jQuery.validator.setDefaults({
            debug: true,
            success: "valid"
        });
        // REGLAS DE VALIDACIÓN
        setTimeout(()=> { 
            $( "#iptNombreNuevo" ).rules( "add", {
                required: true,
                minlength: 5,
                messages: {
                    required: " • Nombre requerido.",
                    minlength: jQuery.validator.format(" • El nombre debe ser de al menos {0} caracteres.")
                },
                remote: "models/compruebaNombreAjax.php"
            });
            $( "#iptPasswordNuevo" ).rules( "add", {
                required: true,
                rangelength: [4, 10],
                messages: {
                    required: " • Password requerida.",
                    rangelength: jQuery.validator.format(" • La contraseña debe ser de 4 a 10 caracteres")
                }
            });
        }, 0);

        // VALIDACIÓN NUEVO ELEMENTO
        let formNuevo = $( "#formNuevo" );
        formNuevo.validate({
            errorPlacement : function(error, element) {
                $("#" + element.attr("id") + "Error").text(error.text());
            },
            submitHandler: formNuevoValidado
        });

        function formNuevoValidado() {
            let stringPassword = $("#iptPasswordNuevo").val();
            stringPassword = CryptoJS.MD5(stringPassword);
            stringPassword = stringPassword + ""; // Esto es necesario para que no pete la librería de encriptación
            let data = {accion: "nuevoElemento", elementos: "usuarios", nombre_usuario: $("#iptNombreNuevo").val(), password: stringPassword, nivel: $("#iptNivelNuevo").val()};
            $.post({
                url: 'models/administracionAjax.php',
                data: data,
                success: (respuesta) => {
                    $('#paginacion-selector-top,#paginacion-selector-bot').bootpag({page: <?= $numPaginasUsuarios ?>});
                    $("#cuerpo-tabla-administracion").append(`<tr id="${respuesta}"><td>${respuesta}</td><td class="nombre_fila">${$("#iptNombreNuevo").val()}</td><td class="password_fila">${stringPassword}</td><td class="nivel_fila">${$("#iptNivelNuevo").val()}</td><td><button class='btnModificar btn btn-outline-secondary'>Modificar</button><button class='btnEliminar btn btn-outline-danger'>Eliminar</button></td></tr>`);
                }
            });
        }

        $("#selectOrden,#selectCampo").on("change", function() {
            obtenerPaginaUsuarios(1);
        });

        $("#matchCadena").keyup(function() {
            obtenerPaginaUsuarios(1);
        });

        $( "#datepicker" ).datepicker();

        
    });

</script>
<?php } ?>