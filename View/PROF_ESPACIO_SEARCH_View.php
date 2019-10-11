<?php

	class PROF_ESPACIO_SEARCH {


		function __construct(){	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['SEARCH']; ?></h1>	
			<form name='Form' action='../Controller/PROF_ESPACIO_Controller.php' method='post'>
				<?php echo $strings['DNI']; ?> : <input type='text' name='dni' id='dni' size='9' value=''><br>
				<?php echo $strings['CODEspacio']; ?> : <input type='text' name='CODEspacio' id='CODEspacio' size='9' value=''><br>

				<input type='submit' name='action' value='SEARCH'>
			</form>
				
		
			<a href='../Controller/Index_Controller.php'><?php echo $strings['Back']; ?></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	