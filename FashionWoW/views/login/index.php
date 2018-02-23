
<div class="row justify-content-sm-center" style="text-align: center; color: red">
    <div class="col-sm-2">
      <?= isset($_GET['incorrecto']) ? "Login Incorrecto" : "" ?>        
    </div>
  </div>


<form action='?controlador=login&accion=comprobacion' method="post" style="position: relative; top: 100px;">
  <div class="form-row justify-content-sm-center">
    <div class="col-sm-3">
        Nombre de usuario: <input class="form-control" type="text" name="usuario">
    </div>
  </div>
  <div class="form-row justify-content-sm-center">
    <div class="col-sm-3">
        Contraseña: <input class="form-control" type="password" name="password">
    </div>
  </div>
  <div class="form-row justify-content-sm-center">
    <div class="col-sm-3">
      <button class="form-control" type="submit"style="position: relative; top: 25px;">Log In</button>
    </div>   
  </div>  
</form>