<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 11/01/2019
	 */

	/**
	 * Vista del Login
	 */
	class Login
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
			<h1><?php echo $strings['Login']; ?></h1>	 
			<form name='Form' action='../Controller/Login_Controller.php' method='post'>
		
				 	<label for="login"><?php echo $strings['Login']; ?></label>
					<input type='text' name='login' size='9' value=''><br>
					<label for="password"><?php echo $strings['Password']; ?></label>
					<input type='password' name='password' size='15' value=''><br>

					<input type='submit' name='action' value='<?php echo $strings['Login']; ?>'>
			</form>		
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>
