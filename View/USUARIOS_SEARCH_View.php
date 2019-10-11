<?php

	class USUARIOS_SEARCH{


		function __construct(){	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['SEARCH']; ?></h1>	
			<form name='Form' action='../Controller/USUARIOS_Controller.php' method='post'>
			
				 	<?php echo $strings['Login']; ?> : <input type='text' name='login' id='login' size='9' value='' ><br>
					<?php echo $strings['Password']; ?> : <input type='text' name='password' id='password' size='15' value='' ><br>
					<?php echo $strings['Name']; ?> : <input type='text' name='nombre' id='nombre' size='30' value='' ><br>
					<?php echo $strings['Surname']; ?> : <input type='text' name='apellidos' id='apellidos' size='50' value='' ><br>
					<?php echo $strings['Surname']; ?> : <input type='text' name='email' id='email' size='40' value='' ><br>

					<input type='submit' name='action' value='SEARCH'>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'><?php echo $strings['Back']; ?></a>
		
		<?php
			include '../View/Footer.php';
		}
	}
?>

	