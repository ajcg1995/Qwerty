<?php

require ("../bd/ProcedimientosAdministracion.php");
if (isset($_POST['usuario'])) {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $us = usuarioLogueado($usuario, $contrasena);
    if (!empty($us)) {
        session_start();
        $_SESSION['usuario'] = $us;
        echo '1';
    } else {
        echo '0';
    }
}

if (isset($_POST['cerrarSesion'])) {
    session_start();
    session_unset($_SESSION['usuario']);
    session_destroy();
    echo '1';
}




