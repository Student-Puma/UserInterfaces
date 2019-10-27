<?php
    /**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 11/01/2019
	 */

    /**
     * Cambia el idioma de la aplicación
     */

	// Iniciamos la sesión
    session_start();

    // Recogemos el idioma del post y los guardamos en la sesión
    $idioma = $_GET['idioma'];
    $_SESSION['idioma'] = $idioma;

    // Redirigimos a la página rederencia
    header('Location:' . $_SERVER["HTTP_REFERER"]);
?>