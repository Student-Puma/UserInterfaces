<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 11/01/2019
	 */

	/**
	 * Vista de la función SEARCH de la entidad
	 */
	class EDIFICIO_SEARCH
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
			<form name='Form' action='../Controller/EDIFICIO_Controller.php' method='post'>
				
				<?php echo $strings['CODEdificio']; ?> : <input type='text' name='CODEdificio' id='CODEdificio' size='5' value=''><br>
				<?php echo $strings['Name']; ?> : <input type='text' name='nombre' id='nombre' size='30' value=''><br>
				<?php echo $strings['Address']; ?> : <input type='text' name='direccion' id='direccion' size='50' value=''><br>
				<?php echo $strings['Campus']; ?> :<input type='text' name='campus' id='campus' size='40' value=''><br>

				<input type='submit' name='action' value='SEARCH'>
			</form>
			
			<a href='../Controller/Index_Controller.php'><?php echo $strings['Back']; ?></a>
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>