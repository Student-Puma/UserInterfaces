<?php

	class CENTRO_SHOWCURRENT{


		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['SHOWCURRENT']; ?></h1>	
			<form name='Form' action='../Controller/CENTRO_Controller.php' method='post'>
			
				 	<?php echo $strings['CODCentro']; ?> : <input type='text' name='CODCentro' id='CODCentro' size='9' value='<?php echo $this->tupla['CODCENTRO']; ?>' readonly><br>
					<?php echo $strings['CODEdificio']; ?> : <input type='text' name='CODEdificio' id='CODEdificio' size='15' value='<?php echo $this->tupla['CODEDIFICIO']; ?>' readonly><br>
					<?php echo $strings['Name']; ?> : <input type='text' name='nombre' id='nombre' size='30' value='<?php echo $this->tupla['NOMBRECENTRO']; ?>' readonly><br>
					<?php echo $strings['Address']; ?> : <input type='text' name='direccion' id='direccion' size='50' value='<?php echo $this->tupla['DIRECCIONCENTRO']; ?>' readonly><br>
					<?php echo $strings['Responsable']; ?> : <input type='text' name='responsable' id='responsable' size='40' value='<?php echo $this->tupla['RESPONSABLECENTRO']; ?>' readonly><br>
		
			</form>
				
			<a href='../Controller/CENTRO_Controller.php'><?php echo $strings['Back']; ?></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	