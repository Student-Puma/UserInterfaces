<?php

	class TITULACION_SEARCH {

		function __construct(){	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['SEARCH']; ?></h1>	
			<form name = 'Form' action='../Controller/TITULACION_Controller.php' method='post' onsubmit="return comprobar_registro();">
			
				Codigo Titulacion : <input type = 'text' name = 'CODTitulacion' id = 'CODTitulacion' placeholder = 'Codigo titulacion' size = '15' value = ''><br>
				Codigo Centro : <input type = 'text' name = 'CODCentro' id = 'CODCentro' placeholder = 'Codigo centro' size = '9' value = ''><br>
				Nombre : <input type = 'text' name = 'nombre' id = 'nombre' placeholder = 'Nombre titulacion' size = '30' value = ''><br>
				Responsable : <input type = 'text' name = 'responsable' id = 'responsable' placeholder = 'Responsable titulacion' size = '50' value = ''><br>

				<input type='submit' name='action' value='SEARCH'>
			</form>
				
		
			<a href='../Controller/Index_Controller.php'>Volver </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	