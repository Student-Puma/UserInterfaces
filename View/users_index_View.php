<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 11/01/2019
	 */

	/**
	 * Vista del Index
	 */
	class Index
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
			// Añadimos el idioma
			include '../Locale/Strings_SPANISH.php';
			// Añadimos la vista Header
			include '../View/Header.php';
?>
			<h1> <?php echo $strings['Welcome']; ?> </h1>
			<br>
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>