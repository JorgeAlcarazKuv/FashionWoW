<?php
    if(!isset($_SESSION)) {
        session_start();
    };

    require_once("../conexion.php");
    require_once("administracion.php");

    $administracionObj = new Administracion();

    if (isset($_GET['iptNombreNuevo']) ){
            $db = Db::getInstance();
            $nombre = $db->real_escape_string($_GET['iptNombreNuevo']);
            $sql = "SELECT * FROM usuarios WHERE nombre_usuario='$nombre'";
            $resultado = $db->query($sql);
            if ($resultado->num_rows){
                echo json_encode(" • Nombre ya existente, por favor elije otro.");
            } else {
                echo "true";
            }
        }