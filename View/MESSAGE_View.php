<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 11/01/2019
	 */

	/**
	 * Vista de mensajes
	 * 
	 * @param string Índice del texto a mostrar
	 * @param volver Localización de retorno
	 */
	class MESSAGE{
		// Variables de la clase
		private $string; 
		private $volver;

		/**
		 * Constructor de la clase
		 */
		function __construct($string, $volver){
			$this->string = $string;
			$this->volver = $volver;	
			$this->render();
		}

		/**
		 * Renderizado de la vista
		 */
		function render(){
			// Añadimos el idioma
			include '../Locale/Strings_'.$_SESSION['idioma'].'.php';
			// Añadimos la vista Header
			include '../View/Header.php';
?>
			<br>
			<br>
			<br>
			<p>
			<h3>
<?php		
			echo $strings[$this->string];
?>
			</h3>
			</p>
			<br>
			<br>
			<br>

<?php
			echo '<a href=\'' . $this->volver . "'>" . $strings['Back'] . " </a>";
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>