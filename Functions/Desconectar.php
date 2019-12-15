<?php
    /**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 15/12/2019
	 */

    /**
     * Cierra la sesión de un usuario
     */

	// Iniciamos la sesión
    session_start();
    // Destruimos la sesión
    session_destroy();
    // Redirigimos a la página principal
    header('Location:../index.php');
?>
