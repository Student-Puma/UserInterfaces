<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
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
			<form name='Form' action='../Controller/TITULACION_Controller.php' method='post' onsubmit="return comprobar_registro();">
				
				Codigo Titulacion : <input type = 'text' name = 'CODTitulacion' id = 'CODTitulacion' placeholder = 'Codigo titulacion' size = '15' value = '' readonly><br>
				Codigo Centro : <input type = 'text' name = 'CODCentro' id = 'CODCentro' placeholder = 'Codigo centro' size = '9' value = '' readonly><br>
				Nombre : <input type = 'text' name = 'nombre' id = 'nombre' placeholder = 'Nombre titulacion' size = '30' value = '' readonly><br>
				Responsable : <input type = 'text' name = 'responsable' id = 'responsable' placeholder = 'Responsable titulacion' size = '50' value = '' readonly><br>

				<input type='submit' name='action' value='DELETE'>
			</form>

			<a href='../Controller/Index_Controller.php'>Volver </a>
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>

	