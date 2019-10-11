<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 11/01/2019
	 */

	// ENTRYPOINT DE LA APLICACIÓN

	// Iniciamos la sesión
	session_start();

	// Comprobamos que el usuario esté autenticado
	// Si está logueado, mostramos el Index
	// Si no está logueado, mostramos el Login
	include './Functions/Authentication.php';
	if (!IsAuthenticated())
	{
		header('Location:./Controller/Login_Controller.php');
	}
	else
	{
		header('Location:./Controller/Index_Controller.php');
	}
?>
