<?php

	class PROFESOR_SEARCH {

		function __construct(){	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['SEARCH']; ?></h1>	
			<form name='Form' action='../Controller/PROFESOR_Controller.php' method='post'>
				<?php echo $strings['DNI']; ?> : <input type='text' name='dni' id='dni' size='9' value=''><br>
				<?php echo $strings['Name']; ?> : <input type='text' name='nombre' id='nombre' size='30' value=''><br>
				<?php echo $strings['Surname']; ?> : <input type='text' name='apellidos' id='apellidos' size='60' value=''><br>
				<?php echo $strings['Area']; ?> :<input type='text' name='area' id='area' size='40' value=''><br>
				<?php echo $strings['Department']; ?> :<input type='text' name='departamento' id='departamento' size='40' value=''><br>

				<input type='submit' name='action' value='SEARCH'>
			</form>
				
		
			<a href='../Controller/Index_Controller.php'><?php echo $strings['Back']; ?></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	