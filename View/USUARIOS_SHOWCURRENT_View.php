<?php

	class USUARIOS_SHOWCURRENT{


		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['SHOWCURRENT']; ?></h1>	
			<form name='Form' action='../Controller/USUARIOS_Controller.php' method='post'>
			
					<?php echo $strings['Login']; ?> : <input type='text' name='login' id='login' size='9' value='<?php echo $this->tupla['login']; ?>' readonly><br>
					<?php echo $strings['Password']; ?> : <input type='text' name='password' id='password' size='15' value='<?php echo $this->tupla['password']; ?>' readonly><br>
					<?php echo $strings['Name']; ?> : <input type='text' name='nombre' id='nombre' size='30' value='<?php echo $this->tupla['nombre']; ?>' readonly><br>
					<?php echo $strings['Surname']; ?> : <input type='text' name='apellidos' id='apellidos' size='50' value='<?php echo $this->tupla['apellidos']; ?>' readonly><br>
					<?php echo $strings['Email']; ?> : <input type='text' name='email' id='email' size='40' value='<?php echo $this->tupla['email']; ?>' readonly><br>
		
			</form>
		
			<a href='../Controller/USUARIOS_Controller.php'><?php echo $strings['Back']; ?></a>
<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	