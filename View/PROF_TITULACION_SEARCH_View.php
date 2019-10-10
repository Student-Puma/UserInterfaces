<?php

	class PROF_TITULACION_SEARCH {


		function __construct(){	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['SEARCH']; ?></h1>	
			<form name = 'Form' action='../Controller/PROF_TITULACION_Controller.php' method='post' onsubmit="return comprobar_registro();">
				DNI : <input type='text' name='dni' id='dni' placeholder='DNI' size='9' value=''><br>
				Codigo titulacion : <input type='text' name='CODTitulacion' id='CODTitulacion' placeholder='Codigo titulacion' size='9' value=''><br>
				Año academico : <input type='text' name='anho' id='anho' placeholder='Año' size='4' value=''><br>

				<input type='submit' name='action' value='SEARCH'>
			</form>
				
		
			<a href='../Controller/Index_Controller.php'>Volver </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	