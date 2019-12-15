<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 15/12/2019
	 */

	/**
	 * Controlador del Registro
	 */

	// Iniciamos la sesión
	session_start();

	// Si no recibimos el login, mostramos la vista correspondiete
	if(!isset($_POST['login']))
	{
		include '../View/Register_View.php';
		new Register();
	}
	else
	{
		// Añadimos la vista de los mensajes
		include '../View/MESSAGE_View.php';
		// Incluímos el modelo de USUARIOS
		include '../Model/USUARIOS_Model.php';

		// Creamos una nueva instancia de la entidad
		$usuario = new USUARIOS_Model($_REQUEST['login'],$_REQUEST['password'],$_REQUEST['nombre'],
			$_REQUEST['apellidos'],$_REQUEST['email'],$_REQUEST['dni'],$_REQUEST['telefono'],
			$_REQUEST['fechanac'],$_REQUEST['fotopersonal'],$_REQUEST['sexo']);
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

