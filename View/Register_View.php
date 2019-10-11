<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 */

	/**
	 * Vista del Login
	 */
	class Register
	{
		/**
		 * Constructor de la clase
		 */
		function __construct(){	
			$this->render();
		}

		/**
		 * Renderiza la vista
		 */
		function render()
		{
			// Añadimos la vista Header
			include '../View/Header.php'; 
?>
			<h1><?php echo $strings['Register']; ?></h1>	
			<form name='Form' action='../Controller/Register_Controller.php' method='post' onsubmit="return comprobar_registro();"">
			
					<?php echo $strings['Login']; ?> : <input type='text' name='login' id='login' size='9' value=''><br>
					<?php echo $strings['Password']; ?> : <input type='text' name='password' id='password' size='15' value=''><br>
					<?php echo $strings['Name']; ?> : <input type='text' name='nombre' id='nombre' size='30' value=''><br>
					<?php echo $strings['Surname']; ?> : <input type='text' name='apellidos' id='apellidos' size='50' value=''><br>
					<?php echo $strings['Email']; ?> : <input type='text' name='email' id='email' size='40' value=''><br>

					<input type='submit' name='action' value='REGISTER'>
			</form>

			<a href='../Controller/Index_Controller.php'><?php echo $strings['Back']; ?></a>
	<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>