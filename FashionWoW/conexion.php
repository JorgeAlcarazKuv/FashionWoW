<?php
  class Db {
    private static $instancia = NULL;

    private function __construct() {}
    
    /**
     * Función para obterner el singleton que inicia la conexión con la bbdd.
     */
    public static function getInstance() {
      if (!isset(self::$instancia)) {
        self::$instancia = new mysqli("localhost", "root", "root", "fashionwow");
        if (self::$instancia->connect_errno) {
            die("Error código " . self::$instancia->connect_errno . ": " . self::$instancia->connect_error . "<br>");
        }
        self::$instancia->set_charset("utf8");  
      }
      return self::$instancia;
    }
  }
?>