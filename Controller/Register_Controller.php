<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 */

	// Iniciamos la sesión
	session_start();

	// Incluímos los strings referentes al idioma actual
	include_once '../Locale/Strings_'.$_SESSION['idioma'].'.php';

	// Si no recibimos el login, mostramos la vista correspondiete
	if(!isset($_POST['login']))
	{
		include '../View/Register_View.php';
		$register = new Register();	// FIX: ? Variable register sin uso
	}
	else
	{
		// Añadimos la vista de los mensajes
		include '../View/MESSAGE_View.php';
		// Incluímos el modelo de USUARIOS
		include '../Model/USUARIOS_Model.php';

		// Creamos una nueva instancia de la entidad
		$usuario = new USUARIOS_Model($_REQUEST['login'],$_REQUEST['password'],$_REQUEST['nombre'],
			$_REQUEST['apellidos'],$_REQUEST['email']);
		// Intentamos registrar dicha entidad en la BD
		$respuesta = $usuario->Register();

		// Comprobamos el resultado de la operación
		if ($respuesta == 'true')
		{
			// Registramos la entidad
			$respuesta = $usuario->registrar();
			// Mostramos el mensaje correspondiente
			new MESSAGE($respuesta, './Login_Controller.php');
		}
		else
		{
			// Mostramos el mensaje correspondiente
			new MESSAGE($respuesta, './Login_Controller.php');
		}
	}
?>

