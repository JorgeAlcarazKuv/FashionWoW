<?php
  class Administracion {
    private $elementosPorPagina;
    

    public function __construct() {
        $this->elementosPorPagina = 5;
    }

    /**
     * 
     */
    public function numeroPaginas($tabla) {
      $db = Db::getInstance();

      $tabla = $db->real_escape_string($tabla);
      
      $sql = "SELECT * FROM $tabla";
      $resultado = $db->query($sql);
      $numeroElementos = $resultado->num_rows;

      return ceil($numeroElementos/$this->elementosPorPagina);
    }

    public function paginaNumero($tabla, $numero, $campoOrden, $direcOrden, $match) {
      $lista = [];
      $db = Db::getInstance();
      $tabla = $db->real_escape_string($tabla);
      $numero = intval($numero);
      $campoOrden = $db->real_escape_string($campoOrden);
      $direcOrden = $db->real_escape_string($direcOrden);
      $match = $db->real_escape_string($match);

      $referencia = ($numero - 1) * $this->elementosPorPagina;
      $sql = "SELECT * FROM $tabla WHERE nombre_usuario LIKE '%$match%' ORDER BY $campoOrden $direcOrden LIMIT $referencia, $this->elementosPorPagina";
      $resultado = $db->query($sql);
      while ($fila = $resultado->fetch_object()) {
        $lista[] = $fila;
      }
      return $lista;
    }

    public function eliminarElemento($tabla, $idElemento) {
      $db = Db::getInstance();
      $tabla = $db->real_escape_string($tabla);
      $idElemento = intval($idElemento);

      $sql = "DELETE FROM $tabla WHERE id_usuario=$idElemento";
      $resultado = $db->query($sql);
    }

    public function modificarElemento($tabla, $idElemento, $nombre_usuario, $password, $nivel) {
      $db = Db::getInstance();
      $tabla = $db->real_escape_string($tabla);
      $nombre_usuario = $db->real_escape_string($nombre_usuario);
      $password = $db->real_escape_string($password);
      $nivel = $db->real_escape_string($nivel);
      $idElemento = intval($idElemento);

      $sql = "UPDATE $tabla SET nombre_usuario = '$nombre_usuario', password = '$password', nivel = '$nivel' WHERE id_usuario = $idElemento";
      $resultado = $db->query($sql);
    }

    public function nuevoElemento($tabla, $nombre_usuario, $password, $nivel) {
      $db = Db::getInstance();
      $nombre_usuario = $db->real_escape_string($nombre_usuario);
      $tabla = $db->real_escape_string($tabla);
      $password = $db->real_escape_string($password);
      $password = md5($password);
      $nivel = $db->real_escape_string($nivel);
      
      $sql = "INSERT INTO $tabla VALUES (null, '$nombre_usuario', '$password', '$nivel')";
      $resultado = $db->query($sql);
      return $db->insert_id;
    }
  }
?>