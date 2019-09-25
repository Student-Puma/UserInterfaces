<?php
    // Incluimos el código de autentificación
    include_once '../Functions/Authentication.php';

    // Iniciamos sesión
    session_start();
    // Redireccionamos si no está autenticado
    if(!IsAuthenticated())
    {
        header('Location: ../index.php');
    }
    // Damos acceso al usuario autenticado
    else
    {
        // Mostramos la página
        include '../View/_db_view.php';
        new DBView();
    }
?>