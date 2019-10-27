<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 11/01/2019
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
			<div class="datos">
				<h2><?php echo $strings['Welcome']; ?></h2>
				<h4><?php echo $strings['UserNotAuth']; ?>. <a href="#"><?php echo $strings['Register']; ?></a></h4>
			</div> <!-- datos -->
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>
