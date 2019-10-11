<?php
    /**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 11/01/2019
	 */

	// Iniciamos la sesión
    session_start();
    // Destruimos la sesión
    session_destroy();
    // Redirigimos a la página principal
    header('Location:../index.php');
?>
