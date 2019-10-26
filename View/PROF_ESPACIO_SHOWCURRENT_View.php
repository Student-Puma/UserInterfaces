<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 11/01/2019
	 */

	/**
	 * Vista de la función SHOWCURRENT de la entidad
	 */
	class PROF_ESPACIO_SHOWCURRENT
	{
		/**
		 * Constructor de la clase
		 */
		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}

		/**
		 * Renderiza la vista
		 */
		function render(){
			// Añadimos la vista Header
			include '../View/Header.php';
?>
			<h1><?php echo $strings['SHOWCURRENT']; ?></h1>	
			<form name='Form' action='../Controller/PROF_ESPACIO_Controller.php' method='post'>
				
				<?php echo $strings['DNI']; ?> : <input type='text' name='dni' id='dni' size='9' value='<?php echo $this->tupla['DNI']; ?>' readonly><br>
				<?php echo $strings['CODEspacio']; ?> : <input type='text' name='CODEspacio' id='CODEspacio' size='9' value='<?php echo $this->tupla['CODESPACIO']; ?>' readonly><br>
			
			</form>

			<a href='../Controller/PROF_ESPACIO_Controller.php'><?php echo $strings['Back']; ?></a>
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>