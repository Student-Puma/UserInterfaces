<?php

	class PROFESOR_SEARCH {

		function __construct(){	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['SEARCH']; ?></h1>	
			<form name = 'Form' action='../Controller/PROFESOR_Controller.php' method='post' onsubmit="return comprobar_registro();">
				DNI : <input type='text' name='dni' id='dni' placeholder='DNI' size='9' value=''><br>
				Nombre : <input type='text' name='nombre' id='nombre' placeholder='Nombre' size='30' value=''><br>
				Apellidos : <input type='text' name='apellidos' id='apellidos' placeholder='Apellidos' size='60' value=''><br>
				Area : <input type = 'text' name='area' id='area' placeholder='Area' size='40' value=''><br>
				Departamento : <input type = 'text' name='departamento' id='departamento' placeholder='Departamento' size='40' value=''><br>

				<input type='submit' name='action' value='SEARCH'>
			</form>
				
		
			<a href='../Controller/Index_Controller.php'>Volver </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	