<?php

	class CENTRO_SEARCH {


		function __construct(){	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['SEARCH']; ?></h1>	
			<form name = 'Form' action='../Controller/CENTRO_Controller.php' method='post' onsubmit="return comprobar_registro();">
			
				 	Codigo Centro : <input type = 'text' name = 'CODCentro' id = 'CODCentro' placeholder = 'Codigo Centro' size = '9' value = ''><br>
					Codigo Edificio : <input type = 'text' name = 'CODEdificio' id = 'CODEdificio' placeholder = 'Codigo Edificio' size = '15' value = ''><br>
					Nombre : <input type = 'text' name = 'nombre' id = 'nombre' placeholder = 'Nombre' size = '30' value = ''><br>
					Direccion : <input type = 'text' name = 'direccion' id = 'direccion' placeholder = 'Direccion' size = '50' value = ''><br>
					Responsable : <input type = 'text' name = 'responsable' id = 'responsable' placeholder='Responsable' size = '40' value = ''><br>

					<input type='submit' name='action' value='SEARCH'>
			</form>
		
			<a href='../Controller/Index_Controller.php'>Volver </a>
<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	