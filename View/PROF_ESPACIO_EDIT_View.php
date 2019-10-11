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
	class PROF_ESPACIO_EDIT
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
			<form name = 'Form' action='../Controller/PROF_ESPACIO_Controller.php' method='post' onsubmit="return comprobar_registro();">
				
				DNI : <input type='text' name='dni' id='dni' placeholder='DNI' size='9' value='<?php echo $this->tupla['DNI']; ?>' readonly><br>
				Codigo Espacio : <input type='text' name='CODEspacio' id='CODEspacio' placeholder='Codigo espacio' size='9' value='<?php echo $this->tupla['CODESPACIO']; ?>'><br>
			
				<input type='submit' name='action' value='EDIT'>
			</form>
		
			<a href='../Controller/Index_Controller.php'>Volver </a>
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>	