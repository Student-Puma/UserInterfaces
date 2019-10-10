<?php

	class ESPACIO_SHOWCURRENT{

		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['SHOWCURRENT']; ?></h1>	
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post' onsubmit="return comprobar_registro();">
				Codigo Espacio : <input type='text' name='CODEspacio' id='CODEspacio' placeholder='Codigo espacio' size='5' value='<?php echo $this->tupla['CODESPACIO']; ?>' readonly><br>
				Codigo Edificio : <input type='text' name='CODEdificio' id='CODEdificio' placeholder='Codigo edificio' size='5' value='<?php echo $this->tupla['CODEDIFICIO']; ?>' readonly><br>
				Codigo Centro : <input type='text' name='CODCentro' id='CODCentro' placeholder='Codigo centro' size='5' value='<?php echo $this->tupla['CODCENTRO']; ?>' readonly><br>
				Tipo : <input type='text' name='tipo' id='tipo' placeholder='Tipo' size='50' value='<?php echo $this->tupla['TIPO']; ?>' readonly><br>
				Superficie : <input type='text' name='superficie' id='superficie' placeholder='Superficie' size='50' value='<?php echo $this->tupla['SUPERFICIEESPACIO']; ?>' readonly><br>
				Num. Inventario : <input type = 'text' name='numinventario' id='numinventario' size='40' value='<?php echo $this->tupla['NUMINVENTARIOESPACIO']; ?>' readonly><br>
			</form>

			<a href='../Controller/ESPACIO_Controller.php'>Volver </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	