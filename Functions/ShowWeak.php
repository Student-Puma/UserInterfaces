<?php
    /**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 15/12/2019
	 */

	/**
	 * Permite mostrar las entidades débiles de manera sencilla
	 */

    // Si no existen los parámetros, salimos
    if(!isset($_GET['key']) || !isset($_GET['entity']))
    {
        header('Location:../index.php');
    }

    // Obtenemos la entidad y su llave primaria
    $key = $_GET['key'];
    $entity = $_GET['entity'];

    // Incluimos el Modelo y la Vista SHOWCURRENT de la entidad
    include '../Model/' . $entity . '_Model.php';
    include '../View/' . $entity . '_SHOWCURRENT_View.php';

    // Mostramos el SHOWCURRENT de dicha entidad
    switch ($entity) {
        // PROFESOR
        case 'PROFESOR':
            // Creamos una instancia de la entidad con la clave primaria del registro que deseemos ver
			$PROFESOR = new PROFESOR_Model($key,'','','','');
			$valores = $PROFESOR->RellenaDatos();
			// Mostramos la vista correspondiente
			new PROFESOR_SHOWCURRENT($valores);
            break;
        // EDIFICIO
        case 'EDIFICIO':
            // Creamos una instancia de la entidad con la clave primaria del registro que deseemos ver
			$EDIFICIO = new EDIFICIO_Model($key,'','','');
			$valores = $EDIFICIO->RellenaDatos();
			// Mostramos la vista correspondiente
			new EDIFICIO_SHOWCURRENT($valores);
            break;
        // CENTRO
		case 'CENTRO':
            // Creamos una instancia de la entidad con la clave primaria del registro que deseemos ver
            $CENTRO = new CENTRO_Model($key,'','','','');
            $valores = $CENTRO->RellenaDatos();
            // Mostramos la vista correspondiente
            new CENTRO_SHOWCURRENT($valores);
            break;
        // ESPACIO
		case 'ESPACIO':
            // Creamos una instancia de la entidad con la clave primaria del registro que deseemos ver
            $ESPACIO = new ESPACIO_Model($key,'','','','','');
            $valores = $ESPACIO->RellenaDatos();
            // Mostramos la vista correspondiente
            new ESPACIO_SHOWCURRENT($valores);
            break;
        // TITULACION
		case 'TITULACION':
            // Creamos una instancia de la entidad con la clave primaria del registro que deseemos ver
            $TITULACION = new TITULACION_Model($key,'','','');
            $valores = $TITULACION->RellenaDatos();
            // Mostramos la vista correspondiente
            new TITULACION_SHOWCURRENT($valores);
            break;
        // Si no existe, volvemos al inicio
        default:
            // Redirigimos a la página referencia
            header('Location:../index.php');
            break;
    }
?>