<?php
	//testing funcionalidades globales
	include '../Model/config.php';

	/**
     * Test para comprobar la existencia de la Base de Datos
     * 
     * Valida:
     *  
     */
	function ExisteBD()
	{
		// Array para almacenar los errores
		global $ERRORS_array_test;

		// -------- Base de datos errónea

		// Plantilla

        $DB_array_error = array(
			"entidad"           => "Global",
            "metodo"            => "BD",
            "error"             => "Base de datos incorrecta",
            "error_esperado"    => "Access denied for user 'iu2018'@'localhost' to database 'error'",
            "error_obtenido"    => "",
            "resultado"         => "",
		);
		
		// Lógica del test

		@$mysqli = new mysqli(host, user, pass, 'ERROR');
		$DB_array_error['error_obtenido'] = !$mysqli ? "Error inesperado. Comprueba que la BD esté levantada" :
			$mysqli->connect_errno ? $mysqli->connect_error : "FALSE";
		$DB_array_error['resultado'] = $DB_array_error['error_obtenido'] === $DB_array_error['error_esperado'] ? 'OK' : 'FALSE';

		array_push($ERRORS_array_test, $DB_array_error);

		// -------- Usuario erróneo

		// Plantilla

        $DB_array_error = array(
			"entidad"           => "Global",
            "metodo"            => "BD",
            "error"             => "Usuario incorrecto",
            "error_esperado"    => "Access denied for user 'ERROR'@'localhost' (using password: YES)",
            "error_obtenido"    => "",
            "resultado"         => "",
		);
		
		// Lógica del test

		@$mysqli = new mysqli(host, 'ERROR', pass, BD);
		$DB_array_error['error_obtenido'] = !$mysqli ? "Error inesperado. Comprueba que la BD esté levantada" :
			$mysqli->connect_errno ? $mysqli->connect_error : "FALSE";
		$DB_array_error['resultado'] = $DB_array_error['error_obtenido'] === $DB_array_error['error_esperado'] ? 'OK' : 'FALSE';

		array_push($ERRORS_array_test, $DB_array_error);
		
		// -------- Contraseña errónea

		// Plantilla

        $DB_array_error = array(
			"entidad"           => "Global",
            "metodo"            => "BD",
            "error"             => "Contraseña incorrecta",
            "error_esperado"    => "Access denied for user 'iu2018'@'localhost' (using password: YES)",
            "error_obtenido"    => "",
            "resultado"         => "",
		);
		
		// Lógica del test

		@$mysqli = new mysqli(host, user, 'ERROR' , BD);
		$DB_array_error['error_obtenido'] = !$mysqli ? "Error inesperado. Comprueba que la BD esté levantada" :
			$mysqli->connect_errno ? $mysqli->connect_error : "FALSE";
		$DB_array_error['resultado'] = $DB_array_error['error_obtenido'] === $DB_array_error['error_esperado'] ? 'OK' : 'FALSE';

		array_push($ERRORS_array_test, $DB_array_error);

		// -------- Conexión correcta

		// Plantilla

        $DB_array_error = array(
			"entidad"           => "Global",
            "metodo"            => "BD",
            "error"             => "Conexión correcta",
            "error_esperado"    => "true",
            "error_obtenido"    => "",
            "resultado"         => "",
		);
		
		// Lógica del test

		@$mysqli = new mysqli(host, user, pass, BD);
		$DB_array_error['error_obtenido'] = !$mysqli ? "Error inesperado. Comprueba que la BD esté levantada" :
			$mysqli->connect_errno ? $mysqli->connect_error : "true";
		$DB_array_error['resultado'] = $DB_array_error['error_obtenido'] === $DB_array_error['error_esperado'] ? 'OK' : 'FALSE';

		array_push($ERRORS_array_test, $DB_array_error);
	}

	function ExistenTablas()
	{
		// Array para almacenar los errores
		global $ERRORS_array_test;

		// Conexión con la base de datos
		@$mysqli = new mysqli(host, user, pass, BD);
		if(!$mysqli || $mysqli->connect_error) { return; }

		// -------- Existe tabla USUARIOS

		// Plantilla

        $DB_array_error = array(
			"entidad"           => "Global",
            "metodo"            => "BD",
            "error"             => "Existe USUARIOS",
            "error_esperado"    => "true",
            "error_obtenido"    => "",
            "resultado"         => "",
		);
		
		// Lógica del test

		$sql = "SELECT * FROM USUARIOS";
		$DB_array_error['error_obtenido'] = $mysqli->query($sql) ? "true" : "false";
		$DB_array_error['resultado'] = $DB_array_error['error_obtenido'] === $DB_array_error['error_esperado'] ? 'OK' : 'FALSE';

		array_push($ERRORS_array_test, $DB_array_error);

		// -------- Existe tabla EDIFICIO

		// Plantilla

        $DB_array_error = array(
			"entidad"           => "Global",
            "metodo"            => "BD",
            "error"             => "Existe EDIFICIO",
            "error_esperado"    => "true",
            "error_obtenido"    => "",
            "resultado"         => "",
		);
		
		// Lógica del test

		$sql = "SELECT * FROM EDIFICIO";
		$DB_array_error['error_obtenido'] = $mysqli->query($sql) ? "true" : "false";
		$DB_array_error['resultado'] = $DB_array_error['error_obtenido'] === $DB_array_error['error_esperado'] ? 'OK' : 'FALSE';

		array_push($ERRORS_array_test, $DB_array_error);

		// -------- Existe tabla CENTRO

		// Plantilla

        $DB_array_error = array(
			"entidad"           => "Global",
            "metodo"            => "BD",
            "error"             => "Existe CENTRO",
            "error_esperado"    => "true",
            "error_obtenido"    => "",
            "resultado"         => "",
		);
		
		// Lógica del test

		$sql = "SELECT * FROM CENTRO";
		$DB_array_error['error_obtenido'] = $mysqli->query($sql) ? "true" : "false";
		$DB_array_error['resultado'] = $DB_array_error['error_obtenido'] === $DB_array_error['error_esperado'] ? 'OK' : 'FALSE';

		array_push($ERRORS_array_test, $DB_array_error);

		// -------- Existe tabla ESPACIO

		// Plantilla

        $DB_array_error = array(
			"entidad"           => "Global",
            "metodo"            => "BD",
            "error"             => "Existe ESPACIO",
            "error_esperado"    => "true",
            "error_obtenido"    => "",
            "resultado"         => "",
		);
		
		// Lógica del test

		$sql = "SELECT * FROM ESPACIO";
		$DB_array_error['error_obtenido'] = $mysqli->query($sql) ? "true" : "false";
		$DB_array_error['resultado'] = $DB_array_error['error_obtenido'] === $DB_array_error['error_esperado'] ? 'OK' : 'FALSE';

		array_push($ERRORS_array_test, $DB_array_error);

		// -------- Existe tabla PROFESOR

		// Plantilla

        $DB_array_error = array(
			"entidad"           => "Global",
            "metodo"            => "BD",
            "error"             => "Existe PROFESOR",
            "error_esperado"    => "true",
            "error_obtenido"    => "",
            "resultado"         => "",
		);
		
		// Lógica del test

		$sql = "SELECT * FROM PROFESOR";
		$DB_array_error['error_obtenido'] = $mysqli->query($sql) ? "true" : "false";
		$DB_array_error['resultado'] = $DB_array_error['error_obtenido'] === $DB_array_error['error_esperado'] ? 'OK' : 'FALSE';

		array_push($ERRORS_array_test, $DB_array_error);

		// -------- Existe tabla TITULACION

		// Plantilla

        $DB_array_error = array(
			"entidad"           => "Global",
            "metodo"            => "BD",
            "error"             => "Existe TITULACION",
            "error_esperado"    => "true",
            "error_obtenido"    => "",
            "resultado"         => "",
		);
		
		// Lógica del test

		$sql = "SELECT * FROM TITULACION";
		$DB_array_error['error_obtenido'] = $mysqli->query($sql) ? "true" : "false";
		$DB_array_error['resultado'] = $DB_array_error['error_obtenido'] === $DB_array_error['error_esperado'] ? 'OK' : 'FALSE';

		array_push($ERRORS_array_test, $DB_array_error);

		// -------- Existe tabla PROF_ESPACIO

		// Plantilla

        $DB_array_error = array(
			"entidad"           => "Global",
            "metodo"            => "BD",
            "error"             => "Existe PROF_ESPACIO",
            "error_esperado"    => "true",
            "error_obtenido"    => "",
            "resultado"         => "",
		);
		
		// Lógica del test

		$sql = "SELECT * FROM PROF_ESPACIO";
		$DB_array_error['error_obtenido'] = $mysqli->query($sql) ? "true" : "false";
		$DB_array_error['resultado'] = $DB_array_error['error_obtenido'] === $DB_array_error['error_esperado'] ? 'OK' : 'FALSE';

		array_push($ERRORS_array_test, $DB_array_error);

		// -------- Existe tabla PROF_TITULACION

		// Plantilla

        $DB_array_error = array(
			"entidad"           => "Global",
            "metodo"            => "BD",
            "error"             => "Existe PROF_TITULACION",
            "error_esperado"    => "true",
            "error_obtenido"    => "",
            "resultado"         => "",
		);
		
		// Lógica del test

		$sql = "SELECT * FROM PROF_TITULACION";
		$DB_array_error['error_obtenido'] = $mysqli->query($sql) ? "true" : "false";
		$DB_array_error['resultado'] = $DB_array_error['error_obtenido'] === $DB_array_error['error_esperado'] ? 'OK' : 'FALSE';

		array_push($ERRORS_array_test, $DB_array_error);
	}

	ExisteBD();
	ExistenTablas();
?>