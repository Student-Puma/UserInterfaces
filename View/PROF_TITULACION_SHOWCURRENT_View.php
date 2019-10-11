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
			<form name='Form' action='../Controller/PROF_TITULACION_Controller.php' method='post'>
				<?php echo $strings['DNI']; ?> : <input type='text' name='dni' id='dni' size='9' value='<?php echo $this->tupla['DNI']; ?>' readonly><br>
				<?php echo $strings['CODTitulacion']; ?> : <input type='text' name='CODTitulacion' id='CODTitulacion' size='9' value='<?php echo $this->tupla['CODTITULACION']; ?>' readonly><br>
				<?php echo $strings['Year']; ?> : <input type='text' name='anho' id='anho' size='4' value='<?php echo $this->tupla['ANHOACADEMICO']; ?>' readonly><br>
			</form>
				
		
			<a href='../Controller/PROF_TITULACION_Controller.php'><?php echo $strings['Back']; ?></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	