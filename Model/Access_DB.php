<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
	 */

	/**
	 * Acceso y configuración de la base de datos
	 */

	// Incluímos las constantes de configuración de la BD
	include_once '../Model/config.php';

	/**
	 * Genera las dependencias de la BD
     * Es un método 'toy' enfocado en el desarrollo,
     * con el fin de poder aportar una solución en el plazo
     * fijado. ¡Nunca llevarlo a producción!
	 * 
	 * @var db Conexión con la base de datos
	 */
    function RelationDB($db)
    {
		// Pedimos los datos de la sesión
		@session_start();
		// Evitamos duplicados
		if(isset($_SESSION) && !isset($_SESSION['Unicorns']))
		{
			$sql = array(
				// Relacionamos EDIFICIO <- CENTRO
				"ALTER TABLE CENTRO ADD FOREIGN KEY (CODEDIFICIO) REFERENCES EDIFICIO(CODEDIFICIO);",
				// Relacionamos EDIFICIO <- ESPACIO
				"ALTER TABLE ESPACIO ADD FOREIGN KEY (CODEDIFICIO) REFERENCES EDIFICIO(CODEDIFICIO);",
				// Relacionamos CENTRO <- ESPACIO
				"ALTER TABLE ESPACIO ADD FOREIGN KEY (CODCENTRO) REFERENCES CENTRO(CODCENTRO);",
				// Relacionamos PROFESOR <-> ESPACIO
				"ALTER TABLE PROF_ESPACIO ADD FOREIGN KEY (CODESPACIO) REFERENCES ESPACIO(CODESPACIO);",
				"ALTER TABLE PROF_ESPACIO ADD FOREIGN KEY (DNI) REFERENCES PROFESOR(DNI);",
				// Relacionamos PROFESOR <-> TITULACION
				"ALTER TABLE PROF_TITULACION ADD FOREIGN KEY (CODTITULACION) REFERENCES TITULACION(CODTITULACION);",
				"ALTER TABLE PROF_TITULACION ADD FOREIGN KEY (DNI) REFERENCES PROFESOR(DNI);",
				// Relacionamos CENTRO <- TITULACION
				"ALTER TABLE TITULACION ADD FOREIGN KEY (CODCENTRO) REFERENCES CENTRO(CODCENTRO);"
			);

			foreach ($sql as $q)
			{
				// Actualizamos las relaciones
				$db->query($q);	// DEBUG: or die(mysqli_error($db));
			}

			$_SESSION['Unicorns'] = true;
		}
	}

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
			new MESSAGE('ErrMySQL', './index.php');
			return false;
		}
		else
		{
			// Relacionamos la BD
			RelationDB($mysqli);

			// Devolvemos la conexión creada
			return $mysqli;
		}
	}
?>
