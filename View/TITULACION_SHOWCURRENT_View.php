<?php

	class TITULACION_SHOWCURRENT{


		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['SHOWCURRENT']; ?></h1>	
			<form name = 'Form' action='../Controller/TITULACION_Controller.php' method='post' onsubmit="return comprobar_registro();">
			Codigo Titulacion : <input type = 'text' name = 'CODTitulacion' id = 'CODTitulacion' placeholder = 'Codigo titulacion' size = '15' value = '<?php echo $this->tupla['CODTITULACION']; ?>' readonly><br>
				Codigo Centro : <input type = 'text' name = 'CODCentro' id = 'CODCentro' placeholder = 'Codigo centro' size = '9' value = '<?php echo $this->tupla['CODCENTRO']; ?>' readonly><br>
				Nombre : <input type = 'text' name = 'nombre' id = 'nombre' placeholder = 'Nombre titulacion' size = '30' value = '<?php echo $this->tupla['NOMBRETITULACION']; ?>' readonly><br>
				Responsable : <input type = 'text' name = 'responsable' id = 'responsable' placeholder = 'Responsable titulacion' size = '50' value = '<?php echo $this->tupla['RESPONSABLETITULACION']; ?>' readonly><br>
			</form>
		
			<a href='../Controller/TITULACION_Controller.php'>Volver </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	