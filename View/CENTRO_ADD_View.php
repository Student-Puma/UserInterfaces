<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 */

	/**
	 * Vista de la función ADD de la entidad
	 * 
	 * @var render Renderizado de la vista
	 */
	class CENTRO_ADD
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
			<h1><?php echo $strings['ADD']; ?></h1>	
			<form name = 'Form' action='../Controller/CENTRO_Controller.php' method='post' onsubmit="return comprobar_registro();">

				 	Codigo Centro : <input type = 'text' name = 'CODCentro' id = 'CODCentro' placeholder = 'Codigo centro' size = '9' value = '' onblur="esNoVacio('CODCentro')  && (true || comprobarDni('CODCentro'))" ><br>
					Codigo Edificio : <input type = 'text' name = 'CODEdificio' id = 'CODEdificio' placeholder = 'Codigo edificio' size = '15' value = '' onblur="esNoVacio('CODEdificio')  && (true || comprobarLetrasNumeros('CODEdificio',15))" ><br>
					Nombre : <input type = 'text' name = 'nombre' id = 'nombre' placeholder = 'Nombre centro' size = '30' value = '' onblur="esNoVacio('nombre')  && comprobarSoloLetras('nombre',30)" ><br>
					Direccion : <input type = 'text' name = 'direccion' id = 'direccion' placeholder = 'Solo letras' size = '50' value = '' onblur="esNoVacio('direccion')  && comprobarSoloLetras('direccion',50)" ><br>
					Responsable : <input type = 'text' name = 'responsable' id = 'responsable' size = '40' value = '' onblur="esNoVacio('responsable')  && comprobarEmail('responsable')" ><br>

					<input type='submit' name='action' value='ADD'>
			</form>

			<a href='../Controller/Index_Controller.php'>Volver </a>
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>

