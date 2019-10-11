<?php

	class EDIFICIO_SHOWCURRENT{

		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['SHOWCURRENT']; ?></h1>	
			<form name='Form' action='../Controller/EDIFICIO_Controller.php' method='post'>
				<?php echo $strings['CODEdificio']; ?> : <input type='text' name='CODEdificio' id='CODEdificio' size='5' value='<?php echo $this->tupla['CODEDIFICIO']; ?>' readonly><br>
				<?php echo $strings['Name']; ?> : <input type='text' name='nombre' id='nombre' size='30' value='<?php echo $this->tupla['NOMBREEDIFICIO']; ?>' readonly><br>
				<?php echo $strings['Address']; ?> : <input type='text' name='direccion' id='direccion' size='50' value='<?php echo $this->tupla['DIRECCIONEDIFICIO']; ?>' readonly><br>
				<?php echo $strings['Campus']; ?> :<input type='text' name='campus' id='campus' size='40' value='<?php echo $this->tupla['CAMPUSEDIFICIO']; ?>' readonly><br>
			</form>

			<a href='../Controller/EDIFICIO_Controller.php'><?php echo $strings['Back']; ?></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	