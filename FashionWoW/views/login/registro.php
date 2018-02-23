<div class="row justify-content-sm-center" style="text-align: center; color: red">
    <div class="col-sm-3">
      <?= isset($_GET['error_pass']) ? "Las contraseñas no son iguales." : "" ?>        
    </div>
  </div>
  <div class="row justify-content-sm-center" style="text-align: center; color: red">
    <div class="col-sm-3">
      <?= isset($_GET['nombre_repetido']) ? "El nombre ya existe, elige otro." : "" ?>        
    </div>
  </div>


<form action='?controlador=login&accion=comprobacionRegistro' method="post"style="position: relative; top: 100px;">
  <div class="form-row justify-content-sm-center">
    <div class="col-sm-3">
        Nombre de usuario: <input required minlength="5" maxlength="20" class="form-control" type="text" name="usuario">
    </div>
  </div>
  <div class="form-row justify-content-sm-center">
    <div class="col-sm-3">
        Contraseña: <input required minlength="5" maxlength="20" class="form-control" type="password" name="password1">
    </div>
  </div><div class="form-row justify-content-sm-center">
    <div class="col-sm-3">
        Repita contraseña: <input minlength="5" maxlength="20" required class="form-control" type="password" name="password2">
    </div>
  </div>
  <div class="form-row justify-content-sm-center" style="position: relative; top: 25px;">
    <div class="col-sm-3">
      <button class="form-control" type="submit">Registrarse</button>
    </div>   
  </div>  
</form>