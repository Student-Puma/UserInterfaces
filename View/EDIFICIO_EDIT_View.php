<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 */

	/**
	 * Vista de la función EDIT de la entidad
	 * 
	 * @var tupla Datos de la entidad
	 */
	class EDIFICIO_EDIT
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
			<h1><?php echo $strings['EDIT']; ?></h1>	
			<form name = 'Form' action='../Controller/EDIFICIO_Controller.php' method='post' onsubmit="return comprobar_registro();">			
				
				Codigo Edificio : <input type='text' name='CODEdificio' id='CODEdificio' placeholder='Codigo edificio' size='5' value='<?php echo $this->tupla['CODEDIFICIO']; ?>' readonly><br>
				Nombre : <input type='text' name='nombre' id='nombre' placeholder='Nombre edificio' size='30' value='<?php echo $this->tupla['NOMBREEDIFICIO']; ?>'><br>
				Direccion : <input type='text' name='direccion' id='direccion' placeholder='Direccion' size='50' value='<?php echo $this->tupla['DIRECCIONEDIFICIO']; ?>'><br>
				Campus : <input type = 'text' name='campus' id='campus' size='40' value='<?php echo $this->tupla['CAMPUSEDIFICIO']; ?>'><br>
				
				<input type='submit' name='action' value='EDIT'>
			</form>

			<a href='../Controller/Index_Controller.php'>Volver </a>
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>

	