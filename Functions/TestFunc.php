<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 15/12/2019
	 */

	/**
	 * Funciones para el testing
	 */

	/**
	 * Elimina mensajes no deseados de la pila de tests
	 * 
	 * @param times Número de mensajes que se desean sacar
	 */
	function popTest($times)
	{
		global $ERRORS_array_test;
		for($i = 0; $i < $times; $i++)
			{ array_pop($ERRORS_array_test); }
	}

	/**
	 * Cuenta el número de test fallidos
	 * 
	 * @return num_errors Número de test fallidos
	 */
	function countErrors()
	{
		global $ERRORS_array_test;
		$num_errors = 0;
		foreach($ERRORS_array_test as $result)
			{ if($result['resultado'] == "FALSE") { $num_errors++; } }
		return $num_errors;
    }
?>