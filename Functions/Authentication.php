<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 11/01/2019
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

