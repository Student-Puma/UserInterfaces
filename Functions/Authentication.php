<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 11/01/2019
	 */

	/**
	 * Comprueba si un usuario está autenticado
	 */

	/**
	 * Valida si existe la variable de sesión 'login'
	 * @return resultado Devuelve si el usuario está autenticado
	 */
	function IsAuthenticated()
	{
		$resultado = isset($_SESSION['login']);
		return $resultado;
	}
?>

