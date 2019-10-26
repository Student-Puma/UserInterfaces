<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 11/01/2019
	 */

	/**
	 * Vista de la función SHOWCURRENT de la entidad
	 */
	class ESPACIO_SHOWCURRENT
	{
		/**
		 * Constructor de la clase
		 */
		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}

		/**
		 * Renderiza la vista
		 */
		function render(){
			// Añadimos la vista Header
			include '../View/Header.php';
?>
			<h1><?php echo $strings['SHOWCURRENT']; ?></h1>	
			<form name='Form' action='../Controller/ESPACIO_Controller.php' method='post'>
				
				<?php echo $strings['CODEspacio']; ?> : <input type='text' name='CODEspacio' id='CODEspacio' size='5' value='<?php echo $this->tupla['CODESPACIO']; ?>' readonly><br>
				<?php echo $strings['CODEdificio']; ?> : <input type='text' name='CODEdificio' id='CODEdificio' size='5' value='<?php echo $this->tupla['CODEDIFICIO']; ?>' readonly><br>
				<?php echo $strings['CODCentro']; ?> : <input type='text' name='CODCentro' id='CODCentro' size='5' value='<?php echo $this->tupla['CODCENTRO']; ?>' readonly><br>
				<?php echo $strings['Type']; ?> : <input type='text' name='tipo' id='tipo' size='50' value='<?php echo $this->tupla['TIPO']; ?>' readonly><br>
				<?php echo $strings['Surface']; ?> : <input type='text' name='superficie' id='superficie' size='50' value='<?php echo $this->tupla['SUPERFICIEESPACIO']; ?>' readonly><br>
				<?php echo $strings['NumInvent']; ?> : <input type='text' name='numinventario' id='numinventario' size='40' value='<?php echo $this->tupla['NUMINVENTARIOESPACIO']; ?>' readonly><br>
			
			</form>

			<a href='../Controller/ESPACIO_Controller.php'><?php echo $strings['Back']; ?></a>
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>

	