<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 15/12/2019
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
			// Añadimos la vista Header
			include '../View/Header.php';
?>
			<h2 class="trad_Welcome"></h2>
			<h4>
				<span class="trad_ActualUser"></span>
				<span class="blue"><?php echo $_SESSION['login']; ?></span>
			</h4>
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>