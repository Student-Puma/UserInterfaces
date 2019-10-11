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
	class CENTRO_EDIT
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
			<form name = 'Form' action='../Controller/CENTRO_Controller.php' method='post' onsubmit="return comprobar_registro();">
				
				Codigo Centro : <input type = 'text' name = 'CODCentro' id = 'CODCentro' placeholder = 'Utiliza tu dni' size = '9' value = '<?php echo $this->tupla['CODCENTRO']; ?>' readonly><br>
				Codigo Edificio : <input type = 'text' name = 'CODEdificio' id = 'CODEdificio' placeholder = 'letras y numeros' size = '15' value = '<?php echo $this->tupla['CODEDIFICIO']; ?>'><br>
				Nombre : <input type = 'text' name = 'nombre' id = 'nombre' placeholder = 'Solo letras' size = '30' value = '<?php echo $this->tupla['NOMBRECENTRO']; ?>'><br>
				Direccion : <input type = 'text' name = 'direccion' id = 'direccion' placeholder = 'Solo letras' size = '50' value = '<?php echo $this->tupla['DIRECCIONCENTRO']; ?>'><br>
				Responsable : <input type = 'text' name = 'responsable' id = 'responsable' size = '40' value = '<?php echo $this->tupla['RESPONSABLECENTRO']; ?>'><br>
			
				<input type='submit' name='action' value='EDIT'>
			</form>
		
			<a href='../Controller/Index_Controller.php'>Volver </a>
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>