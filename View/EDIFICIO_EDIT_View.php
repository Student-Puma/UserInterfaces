<?php

	class EDIFICIO_EDIT{

		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
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
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	