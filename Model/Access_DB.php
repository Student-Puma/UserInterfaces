<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 */

	// Incluímos las constantes de configuración de la BD
	include_once '../Model/config.php';

	/**
	 * Conecta con la base de datos
	 * En caso de error, muestra el mensaje correspondiente
	 * 
	 * @return mysqli Objeto con la nueva conexión || False en caso de error
	 */
	function ConnectDB()
	{
		// Conectamos con la BD
		$mysqli = new mysqli(host, user, pass, BD);
		
		// En caso de error...
		if ($mysqli->connect_errno)
		{
			// Añadimos la vista de los mensajes
			include '../View/MESSAGE_View.php';
			// Mostramos el mensaje correspondiente
			new MESSAGE("Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error, './index.php');
			
			return false;
		}
		else
		{
			// Devolvemos la conexión creada
			return $mysqli;
		}
	}
?>
