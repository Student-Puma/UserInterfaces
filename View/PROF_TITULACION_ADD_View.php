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
	class PROF_TITULACION_ADD
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
			<form name = 'Form' action='../Controller/PROF_TITULACION_Controller.php' method='post' onsubmit="return comprobar_registro();">
				 	
					DNI : <input type='text' name='dni' id='dni' placeholder='DNI' size='9' value=''><br>
					Codigo titulacion : <input type='text' name='CODTitulacion' id='CODTitulacion' placeholder='Codigo titulacion' size='9' value=''><br>
					Año academico : <input type='text' name='anho' id='anho' placeholder='Año' size='4' value=''><br>

					<input type='submit' name='action' value='ADD'>
			</form>
				
		
			<a href='../Controller/Index_Controller.php'>Volver </a>
		
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>

