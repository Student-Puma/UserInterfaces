<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
	 */

	/**
	 * Vista del Login
	 */
	class Login
	{
		/**
		 * Constructor de la clase
		 */
		function __construct(){	
			$this->render();
		}

		/**
		 * Renderiza la vista
		 */
		function render()
		{
			// Añadimos la vista Header
			include '../View/Header.php';

?>
			<h2 class="trad_Welcome"></h2>
			<h4><span class="trad_UserNotAuth"></span>. <a href="../Controller/Register_Controller.php" class="trad_Register"></a></h4>
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>
