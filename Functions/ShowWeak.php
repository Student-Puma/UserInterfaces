<?php
    $key = $_GET['key'];
    $entity = $_GET['entity'];
    $_POST['action'] = 'SHOWCURRENT';

    switch ($entity) {
        case 'PROFESOR':
            $_POST['dni'] = $key;
            @include '../Controller/PROFESOR_Controller.php';
            break;
        default:
            // Redirigimos a la página referencia
            header('Location:' . $_SERVER["HTTP_REFERER"]);
            break;
    }
?>