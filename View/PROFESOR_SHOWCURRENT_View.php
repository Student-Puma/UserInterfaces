<?php

	class PROFESOR_SHOWCURRENT{

		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['SHOWCURRENT']; ?></h1>	
			<form name='Form' action='../Controller/PROFESOR_Controller.php' method='post'>
			<?php echo $strings['DNI']; ?> : <input type='text' name='dni' id='dni' size='9' value='<?php echo $this->tupla['DNI']; ?>' readonly><br>
				<?php echo $strings['Name']; ?> : <input type='text' name='nombre' id='nombre' size='30' value='<?php echo $this->tupla['NOMBREPROFESOR']; ?>' readonly><br>
				<?php echo $strings['Surname']; ?> : <input type='text' name='apellidos' id='apellidos' size='60' value='<?php echo $this->tupla['APELLIDOSPROFESOR']; ?>' readonly><br>
				<?php echo $strings['Area']; ?> :<input type='text' name='area' id='area' size='40' value='<?php echo $this->tupla['AREAPROFESOR']; ?>' readonly><br>
				<?php echo $strings['Department']; ?> :<input type='text' name='departamento' id='departamento' size='40' value='<?php echo $this->tupla['DEPARTAMENTOPROFESOR']; ?>' readonly><br>
			</form>

			<a href='../Controller/PROFESOR_Controller.php'><?php echo $strings['Back']; ?></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	