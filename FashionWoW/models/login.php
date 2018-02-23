<?php
  class Login {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $id_usuario;
    public $usuario;
    public $nivel;

    public function __construct($id_usuario, $usuario, $nivel) {
      $this->id_usuario = $id_usuario;
      $this->usuario = $usuario;
      $this->nivel = $nivel;
    }

    // Intento de login
    public static function login($usuario, $password) {
      $db = Db::getInstance();
      $usuario = $db->real_escape_string($usuario);
      $password = $db->real_escape_string($password);
      $passwordhasheada = md5($password);
      $sql = "SELECT * FROM usuarios WHERE nombre_usuario='$usuario' AND password='$passwordhasheada';";
      $resultado = $db->query($sql);
      if ($resultado->num_rows) {
        $fila = $resultado->fetch_object();
        return new Login($fila->id_usuario, $fila->nombre_usuario, $fila->nivel);
      } else {
        return false;
      }
    }
    
    // Intento de registro
    public static function registro($usuario, $password1, $password2) {
      $db = Db::getInstance();
      $usuario = $db->real_escape_string($usuario);
      $password1 = $db->real_escape_string($password1);
      $password2 = $db->real_escape_string($password2);

      // Comprobación de que la contraseña coincide
      if ($password1 != $password2) {
        return "error_pass";
      }
      // Comprobación de nombre usado
      $sql = "SELECT * FROM usuarios WHERE nombre_usuario='$usuario';";
      $resultado = $db->query($sql);
      if ($resultado->num_rows) {
        return "nombre_repetido";
      }

      $passwordhasheada = md5($password1);

      $sql = "INSERT INTO usuarios VALUES (null, '$usuario', '$passwordhasheada', 'usuario');";
      $db->query($sql) or die("Error al registrar: ".$db->error);
      $id_usuario = $db->insert_id;
      return new Login($id_usuario, $usuario, "usuario");
    }
  }
?>