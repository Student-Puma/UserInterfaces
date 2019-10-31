<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
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
			<h2><?php echo $strings['Welcome']; ?></h2>
			<h4><?php echo $strings['ActualUser'] . ': '; ?>
				<span class="blue"><?php echo $_SESSION['login']; ?></span>
			</h4>
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>