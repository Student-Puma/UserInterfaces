<?php
    $key = $_GET['key'];
    $entity = $_GET['entity'];

    if(!isset($_GET['key']) || !isset($_GET['entity']))
    {
        header('Location:../index.php');
    }

    // Incluimos el Modelo
    include '../Model/' . $entity . '_Model.php';
    include '../View/' . $entity . '_SHOWCURRENT_View.php';

    switch ($entity) {
        case 'PROFESOR':
            // Creamos una instancia de la entidad con la clave primaria del registro que deseemos ver
			$PROFESOR = new PROFESOR_Model($key,'','','','');
			$valores = $PROFESOR->RellenaDatos();
			// Mostramos la vista correspondiente
			new PROFESOR_SHOWCURRENT($valores);
            break;

        default:
            // Redirigimos a la página referencia
            header('Location:../index.php');
            break;
    }
?>