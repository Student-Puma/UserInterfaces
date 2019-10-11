<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 */

	/**
	 * Vista de la función ADD de la entidad
	 */
	class EDIFICIO_ADD {

		/**
		 * Constructor de la clase
		 */
		function __construct(){	
			$this->render();
		}

		/**
		 * Renderiza la vista
		 */
		function render(){
			// Añadimos la vista Header
			include '../View/Header.php';
?>
			<h1><?php echo $strings['ADD']; ?></h1>	
			<form name = 'Form' action='../Controller/EDIFICIO_Controller.php' method='post' onsubmit="return comprobar_registro();">
				 	
					Codigo Edificio : <input type='text' name='CODEdificio' id='CODEdificio' placeholder='Codigo edificio' size='5' value=''><br>
					Nombre : <input type='text' name='nombre' id='nombre' placeholder='Nombre edificio' size='30' value=''><br>
					Direccion : <input type='text' name='direccion' id='direccion' placeholder='Direccion' size='50' value=''><br>
					Campus : <input type = 'text' name='campus' id='campus' size='40' value=''><br>

					<input type='submit' name='action' value='ADD'>
			</form>

			<a href='../Controller/Index_Controller.php'>Volver </a>
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>
