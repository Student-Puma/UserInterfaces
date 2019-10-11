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
	class ESPACIO_EDIT
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
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post' onsubmit="return comprobar_registro();">			
				
				Codigo Espacio : <input type='text' name='CODEspacio' id='CODEspacio' placeholder='Codigo espacio' size='5' value='<?php echo $this->tupla['CODESPACIO']; ?>' readonly><br>
				Codigo Edificio : <input type='text' name='CODEdificio' id='CODEdificio' placeholder='Codigo espacio' size='5' value='<?php echo $this->tupla['CODEDIFICIO']; ?>'><br>
				Codigo Centro : <input type='text' name='CODCentro' id='CODCentro' placeholder='Codigo centro' size='5' value='<?php echo $this->tupla['CODCENTRO']; ?>'><br>
				Tipo : <input type='text' name='tipo' id='tipo' placeholder='Tipo' size='50' value='<?php echo $this->tupla['TIPO']; ?>'><br>
				Superficie : <input type='text' name='superficie' id='superficie' placeholder='Superficie' size='50' value='<?php echo $this->tupla['SUPERFICIEESPACIO']; ?>'><br>
				Num. Inventario : <input type = 'text' name='numinventario' id='numinventario' size='40' value='<?php echo $this->tupla['NUMINVENTARIOESPACIO']; ?>'><br>
				
				<input type='submit' name='action' value='EDIT'>
			</form>
		
			<a href='../Controller/Index_Controller.php'>Volver </a>
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>

	