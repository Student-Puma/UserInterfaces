<?php
    /**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 */

	// Iniciamos la sesión
    session_start();

    // Recogemos el idioma del post y los guardamos en la sesión
    $idioma = $_POST['idioma'];
    $_SESSION['idioma'] = $idioma;

    // Redirigimos a la página rederencia
    header('Location:' . $_SERVER["HTTP_REFERER"]);
?>