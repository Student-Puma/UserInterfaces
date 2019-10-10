<?php

	class PROF_ESPACIO_SHOWCURRENT{


		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['SHOWCURRENT']; ?></h1>	
			<form name = 'Form' action='../Controller/PROF_ESPACIO_Controller.php' method='post' onsubmit="return comprobar_registro();">
				DNI : <input type='text' name='dni' id='dni' placeholder='DNI' size='9' value='<?php echo $this->tupla['DNI']; ?>' readonly><br>
				Codigo Espacio : <input type='text' name='CODEspacio' id='CODEspacio' placeholder='Codigo espacio' size='9' value='<?php echo $this->tupla['CODESPACIO']; ?>' readonly><br>
			</form>
				
		
			<a href='../Controller/PROF_ESPACIO_Controller.php'>Volver </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	