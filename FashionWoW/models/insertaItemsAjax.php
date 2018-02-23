<?php
    if(!isset($_SESSION)) {
        session_start();
    };

    require_once("../conexion.php");
    require_once("administracion.php");

    $administracionObj = new Administracion();

    if (isset($_POST['id_item']) ){
        $db = Db::getInstance();
        $id_item = intval($_POST['id_item']);
        $id_casilla = intval($_POST['id_casilla']);
        $url_icono = $db->real_escape_string($_POST['url_icono']);
        $nombre_item = $db->real_escape_string($_POST['nombre_item']);
        
        $sql = "INSERT IGNORE INTO items VALUES ('$id_item', '$nombre_item', '$url_icono', '$id_casilla')";
        $db->query($sql);
    }