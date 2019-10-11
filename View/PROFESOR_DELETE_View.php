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
	class PROFESOR_DELETE
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
			<form name='Form' action='../Controller/PROFESOR_Controller.php' method='post' onsubmit="return comprobar_registro();">
				
				DNI : <input type='text' name='dni' id='dni' placeholder='DNI' size='9' value='<?php echo $this->tupla['DNI']; ?>' readonly><br>
				Nombre : <input type='text' name='nombre' id='nombre' placeholder='Nombre' size='30' value='<?php echo $this->tupla['NOMBREPROFESOR']; ?>' readonly><br>
				Apellidos : <input type='text' name='apellidos' id='apellidos' placeholder='Apellidos' size='60' value='<?php echo $this->tupla['APELLIDOSPROFESOR']; ?>' readonly><br>
				Area : <input type = 'text' name='area' id='area' placeholder='Area' size='40' value='<?php echo $this->tupla['AREAPROFESOR']; ?>' readonly><br>
				Departamento : <input type = 'text' name='departamento' id='departamento' placeholder='Departamento' size='40' value='<?php echo $this->tupla['DEPARTAMENTOPROFESOR']; ?>' readonly><br>

				<input type='submit' name='action' value='DELETE'>
			</form>

			<a href='../Controller/Index_Controller.php'>Volver </a>
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>

	