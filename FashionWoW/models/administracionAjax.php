<?php
    if(!isset($_SESSION)) {
        session_start();
    };

    require_once("../conexion.php");
    require_once("administracion.php");

    $administracionObj = new Administracion();
    if (isset($_SESSION['id']) && $_SESSION['nivel'] == "admin") {
        if (isset($_POST['accion'])) {
            switch($_POST['accion']) {
                case "obtenerNumeroPaginas":
                    $numPaginas = $administracionObj->numeroPaginas($_POST['elementos'], $_POST['match']);
                    echo $numPaginas;
                    break;
                case "obtenerPagina":
                    $listaObj = $administracionObj->paginaNumero($_POST['elementos'],$_POST['pagina'], $_POST['campoOrden'],$_POST['direcOrden'],$_POST['match']);
                    foreach($listaObj as $fila) {
                        echo "<tr id='$fila->id_usuario'>";
                        echo "<td>$fila->id_usuario</td>";
                        echo "<td class='nombre_fila'>$fila->nombre_usuario</td>";
                        echo "<td class='password_fila'>$fila->password</td>";
                        echo "<td class='nivel_fila'>$fila->nivel</td>";
                        echo "<td><button class='btnModificar btn btn-outline-secondary'>Modificar</button><button class='btnEliminar btn btn-outline-danger'>Eliminar</button></td>";
                        echo "</tr>";                        
                    }
                    break;
                case "eliminarElemento":
                    $administracionObj->eliminarElemento($_POST['elementos'], $_POST['idElemento']);
                    break;
                case "modificarElemento":
                    $administracionObj->modificarElemento($_POST['elementos'], $_POST['idElemento'], $_POST['nombre_usuario'],$_POST['password'],$_POST['nivel']);
                case "nuevoElemento":
                    echo $administracionObj->nuevoElemento($_POST['elementos'], $_POST['nombre_usuario'],$_POST['password'], $_POST['nivel']);
            }
        }
    }