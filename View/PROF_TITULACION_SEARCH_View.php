<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 11/01/2019
	 */

	/**
	 * Vista de la función SEARCH de la entidad
	 */
	class PROF_TITULACION_SEARCH
	{
		/**
		 * Constructor de la clase
		 */
		function __construct()
		{	
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
			<h1><?php echo $strings['SEARCH']; ?></h1>	
			<form name='Form' action='../Controller/PROF_TITULACION_Controller.php' method='post'>
				
				<?php echo $strings['DNI']; ?> : <input type='text' name='dni' id='dni' size='9' value=''><br>
				<?php echo $strings['CODTitulacion']; ?> : <input type='text' name='CODTitulacion' id='CODTitulacion' size='9' value=''><br>
				<?php echo $strings['Year']; ?> : <input type='text' name='anho' id='anho' size='4' value=''><br>

				<input type='submit' name='action' value='SEARCH'>
			</form>

			<a href='../Controller/Index_Controller.php'><?php echo $strings['Back']; ?></a>
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>