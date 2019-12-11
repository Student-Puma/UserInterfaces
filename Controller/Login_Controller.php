<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
	 */

	/**
	 * Controlador del Login
	 */

	// Iniciamos la sesión
	session_start();

	// Si no recibimos los datos referentes al login, mostramos la vista de Login
	if(!isset($_REQUEST['login']) && !(isset($_REQUEST['password'])))
	{
		include '../View/Login_View.php';
		$login = new Login();
	}
	else
	{
		// Incluímos el acceso a la BD
		include '../Model/Access_DB.php';
		// Añadimos el modelo de la entidad USUARIOS
		include '../Model/USUARIOS_Model.php';

		// Creamos una nueva instancia de la entidad
		$usuario = new USUARIOS_Model($_REQUEST['login'],$_REQUEST['password'],'','','','','','','','');
		// Intentamos loguearnos
		$respuesta = $usuario->login();

		// Si hemos podido loguearnos, redireccionamos a la página principal con la nueva
		// sesión activa.
		if ($respuesta == 'true')
		{
			if(!isset($_SESSION)) { session_start(); }
			$_SESSION['login'] = $_REQUEST['login'];
			header('Location:../index.php');
		}
		// Si no hemos podido loguearnos, mostramos el mensaje correspondiente
		else
		{
			include '../View/MESSAGE_View.php';
			new MESSAGE($respuesta, './Login_Controller.php');
		}
	}
?>

