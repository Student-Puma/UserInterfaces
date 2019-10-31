<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
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
			<div class="centrado">
				<span class="msg"><?php echo $strings[$this->string]; ?></span>
			</div>

			<a href="<?php echo $this->volver; ?>" class="return"><?php echo $strings['Back']; ?></a>

<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>