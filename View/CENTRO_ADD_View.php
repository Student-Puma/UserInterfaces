<?php

	class CENTRO_ADD {


		function __construct(){	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['ADD']; ?></h1>	
			<form name = 'Form' action='../Controller/CENTRO_Controller.php' method='post' onsubmit="return comprobar_registro();">
			
				 	Codigo Centro : <input type = 'text' name = 'CODCentro' id = 'CODCentro' placeholder = 'Codigo centro' size = '9' value = '' onblur="esNoVacio('CODCentro')  && (true || comprobarDni('CODCentro'))" ><br>
					Codigo Edificio : <input type = 'text' name = 'CODEdificio' id = 'CODEdificio' placeholder = 'Codigo edificio' size = '15' value = '' onblur="esNoVacio('CODEdificio')  && (true || comprobarLetrasNumeros('CODEdificio',15))" ><br>
					Nombre : <input type = 'text' name = 'nombre' id = 'nombre' placeholder = 'Nombre centro' size = '30' value = '' onblur="esNoVacio('nombre')  && comprobarSoloLetras('nombre',30)" ><br>
					Direccion : <input type = 'text' name = 'direccion' id = 'direccion' placeholder = 'Solo letras' size = '50' value = '' onblur="esNoVacio('direccion')  && comprobarSoloLetras('direccion',50)" ><br>
					Responsable : <input type = 'text' name = 'responsable' id = 'responsable' size = '40' value = '' onblur="esNoVacio('responsable')  && comprobarEmail('responsable')" ><br>

					<input type='submit' name='action' value='ADD'>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'>Volver </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

