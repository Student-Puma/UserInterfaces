<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 11/01/2019
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
        // Relacionamos EDIFICIO <- CENTRO
        $sql = "ALTER TABLE CENTRO
                ADD CONSTRAINT FK_EDIFICIOCENTRO
                FOREIGN KEY (CODEDIFICIO) REFERENCES EDIFICIO(CODEDIFICIO);";
		// Relacionamos EDIFICIO <- ESPACIO
        $sql+= "ALTER TABLE ESPACIO
                ADD CONSTRAINT FK_EDIFICIOESPACIO
                FOREIGN KEY (CODEDIFICIO) REFERENCES EDIFICIO(CODEDIFICIO);";
		// Relacionamos CENTRO <- ESPACIO
        $sql+= "ALTER TABLE ESPACIO
                ADD CONSTRAINT FK_CENTROESPACIO
                FOREIGN KEY (CODCENTRO) REFERENCES CENTRO(CODCENTRO);";
		// Relacionamos PROFESOR <-> ESPACIO
        $sql+= "ALTER TABLE PROF_ESPACIO
                ADD CONSTRAINT FK_PROF_ESPACIO
				FOREIGN KEY (CODESPACIO) REFERENCES ESPACIO(CODESPACIO);
				
				ALTER TABLE PROF_ESPACIO
                ADD CONSTRAINT FK_ESPACIO_PROF
                FOREIGN KEY (DNI) REFERENCES PROFESOR(DNI);";
		// Relacionamos PROFESOR <-> TITULACION
        $sql+= "ALTER TABLE PROF_TITULACION
                ADD CONSTRAINT FK_PROF_TITULACION
				FOREIGN KEY (CODTITULACION) REFERENCES TITULACION(CODTITULACION);
				
				ALTER TABLE PROF_TITULACION
                ADD CONSTRAINT FK_TITULACION_PROF
				FOREIGN KEY (DNI) REFERENCES PROFESOR(DNI);";
		// Relacionamos CENTRO <- TITULACION
		$sql+= "ALTER TABLE TITULACION
                ADD CONSTRAINT FK_CENTROTITULACION
                FOREIGN KEY (CODCENTRO) REFERENCES CENTRO(CODCENTRO);";
		// Actualizamos las relaciones
		@$db->query($sql);
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
