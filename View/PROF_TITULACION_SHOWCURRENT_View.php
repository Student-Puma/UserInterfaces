<?php

	class PROF_TITULACION_SHOWCURRENT{


		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['SHOWCURRENT']; ?></h1>	
			<form name = 'Form' action='../Controller/PROF_TITULACION_Controller.php' method='post' onsubmit="return comprobar_registro();">
				DNI : <input type='text' name='dni' id='dni' placeholder='DNI' size='9' value='<?php echo $this->tupla['DNI']; ?>' readonly><br>
				Codigo titulacion : <input type='text' name='CODTitulacion' id='CODTitulacion' placeholder='Codigo titulacion' size='9' value='<?php echo $this->tupla['CODTITULACION']; ?>' readonly><br>
				Año academico : <input type='text' name='anho' id='anho' placeholder='Año' size='4' value='<?php echo $this->tupla['ANHOACADEMICO']; ?>' readonly><br>
			</form>
				
		
			<a href='../Controller/PROF_TITULACION_Controller.php'>Volver </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	