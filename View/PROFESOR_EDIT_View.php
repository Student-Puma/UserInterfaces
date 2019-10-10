<?php

	class PROFESOR_EDIT{

		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['EDIT']; ?></h1>	
			<form name = 'Form' action='../Controller/PROFESOR_Controller.php' method='post' onsubmit="return comprobar_registro();">			
			DNI : <input type='text' name='dni' id='dni' placeholder='DNI' size='9' value='<?php echo $this->tupla['DNI']; ?>' readonly><br>
				Nombre : <input type='text' name='nombre' id='nombre' placeholder='Nombre' size='30' value='<?php echo $this->tupla['NOMBREPROFESOR']; ?>'><br>
				Apellidos : <input type='text' name='apellidos' id='apellidos' placeholder='Apellidos' size='60' value='<?php echo $this->tupla['APELLIDOSPROFESOR']; ?>'><br>
				Area : <input type = 'text' name='area' id='area' placeholder='Area' size='40' value='<?php echo $this->tupla['AREAPROFESOR']; ?>'><br>
				Departamento : <input type = 'text' name='departamento' id='departamento' placeholder='Departamento' size='40' value='<?php echo $this->tupla['DEPARTAMENTOPROFESOR']; ?>'><br>
				
				<input type='submit' name='action' value='EDIT'>
			</form>
		
			<a href='../Controller/Index_Controller.php'>Volver </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	