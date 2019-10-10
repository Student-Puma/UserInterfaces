<?php

	class PROF_ESPACIO_ADD {


		function __construct(){	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['ADD']; ?></h1>	
			<form name = 'Form' action='../Controller/PROF_ESPACIO_Controller.php' method='post' onsubmit="return comprobar_registro();">
				 	DNI : <input type='text' name='dni' id='dni' placeholder='DNI' size='9' value=''><br>
					Codigo Espacio : <input type='text' name='CODEspacio' id='CODEspacio' placeholder='Codigo espacio' size='9' value=''><br>

					<input type='submit' name='action' value='ADD'>
			</form>
				
		
			<a href='../Controller/Index_Controller.php'>Volver </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

