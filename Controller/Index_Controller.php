<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
	 */

	/**
	 * Controlador del Index
	 */
	
	// Iniciamos la sesión
	session_start();

	// Comprobamos que el usuario esté autenticado
	include '../Functions/Authentication.php';
	if (!IsAuthenticated())
	{
		header('Location: ../index.php');
	}
	else
	{
		// Mostramos la vista correspondiente
		include '../View/users_index_View.php';
		new Index();
	}
?>