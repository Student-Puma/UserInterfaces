<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 11/01/2019
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
			<form name='Form' action='../Controller/Register_Controller.php' method='post'">
			
					<?php echo $strings['Login']; ?> : <input type='text' name='login' id='login' size='15' value=''><br>
					<?php echo $strings['Password']; ?> : <input type='text' name='password' id='password' size='128' value=''><br>
					<?php echo $strings['Name']; ?> : <input type='text' name='nombre' id='nombre' size='30' value=''><br>
					<?php echo $strings['Surname']; ?> : <input type='text' name='apellidos' id='apellidos' size='50' value=''><br>
					<?php echo $strings['Email']; ?> : <input type='text' name='email' id='email' size='40' value=''><br>

					<?php echo $strings['DNI']; ?> : <input type='text' name='dni' id='dni' size='9' value=''><br>
					<?php echo $strings['Phone']; ?> : <input type='text' name='telefono' id='telefono' size='15' value='' ><br>
					<?php echo $strings['Birth']; ?> : <input type='text' name='fechanac' id='fechanac' size='30' value=''><br>
					<?php echo $strings['Picture']; ?> : <input type='text' name='fotopersonal' id='fotopersonal' size='50' value=''><br>
					<?php echo $strings['Genre']; ?> : <input type='text' name='sexo' id='sexo' size='40' value=''><br>

					<input type='submit' name='action' value='REGISTER'>
			</form>

			<a href='../Controller/Index_Controller.php'><?php echo $strings['Back']; ?></a>
	<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>