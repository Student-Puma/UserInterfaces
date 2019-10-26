<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 11/01/2019
	 */

	/**
	 * Vista de la función DELETE de la entidad
	 * 
	 * @var tupla Datos de la entidad
	 */
	class TITULACION_DELETE
	{
		/**
		 * Constructor de la clase
		 */
		function __construct($tupla)
		{	
			$this->tupla = $tupla;
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
			<h1><?php echo $strings['DELETE']; ?></h1>	
			<form name='Form' action='../Controller/TITULACION_Controller.php' method='post'>
				
				<?php echo $strings['CODTitulacion']; ?> : <input type='text' name='CODTitulacion' id='CODTitulacion' size='15' value='<?php echo $this->tupla['CODTITULACION']; ?>' readonly><br>
				<?php echo $strings['CODCentro']; ?> : <input type='text' name='CODCentro' id='CODCentro' size='9' value='<?php echo $this->tupla['CODCENTRO']; ?>' readonly><br>
				<?php echo $strings['Name']; ?> : <input type='text' name='nombre' id='nombre' size='30' value='<?php echo $this->tupla['NOMBRETITULACION']; ?>' readonly><br>
				<?php echo $strings['Responsable']; ?> : <input type='text' name='responsable' id='responsable' size='50' value='<?php echo $this->tupla['RESPONSABLETITULACION']; ?>' readonly><br>

				<input type='submit' name='action' value='DELETE'>
			</form>

			<a href='../Controller/Index_Controller.php'><?php echo $strings['Back']; ?></a>
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>

	