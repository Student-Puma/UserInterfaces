<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 11/01/2019
	 */

	/**
	 * Vista de la función SHOWCURRENT de la entidad
	 */
	class USUARIOS_SHOWCURRENT
	{
		/**
		 * Constructor de la clase
		 */
		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}

		/**
		 * Renderiza la vista
		 */
		function render(){
			// Añadimos la vista Header
			include '../View/Header.php';
?>
			<h1><?php echo $strings['SHOWCURRENT']; ?></h1>	
			<form name='Form' action='../Controller/USUARIOS_Controller.php' method='post'>
			
				<?php echo $strings['Login']; ?> : <input type='text' name='login' id='login' size='15' value='<?php echo $this->tupla['login']; ?>' readonly><br>
				<?php echo $strings['Password']; ?> : <input type='text' name='password' id='password' size='128' value='<?php echo $this->tupla['password']; ?>' readonly><br>
				<?php echo $strings['Name']; ?> : <input type='text' name='nombre' id='nombre' size='30' value='<?php echo $this->tupla['nombre']; ?>' readonly><br>
				<?php echo $strings['Surname']; ?> : <input type='text' name='apellidos' id='apellidos' size='50' value='<?php echo $this->tupla['apellidos']; ?>' readonly><br>
				<?php echo $strings['Email']; ?> : <input type='text' name='email' id='email' size='60' value='<?php echo $this->tupla['email']; ?>' readonly><br>
		
				<?php echo $strings['DNI']; ?> : <input type='text' name='dni' id='dni' size='9' value='<?php echo $this->tupla['DNI']; ?>' readonly><br>
				<?php echo $strings['Phone']; ?> : <input type='text' name='telefono' id='telefono' size='11' value='<?php echo $this->tupla['telefono']; ?>' readonly><br>
				<?php echo $strings['Birth']; ?> : <input type='text' name='fechanac' id='fechanac' size='20' value='<?php echo $this->tupla['FechaNacimiento']; ?>' readonly><br>
				<?php echo $strings['Picture']; ?> : <input type='text' name='fotopersonal' id='fotopersonal' size='50' value='<?php echo $this->tupla['fotopersonal']; ?>' readonly><br>
				<?php echo $strings['Genre']; ?> : <input type='text' name='sexo' id='sexo' size='6' value='<?php echo $this->tupla['sexo']; ?>' readonly><br>

			</form>
		
			<a href='../Controller/USUARIOS_Controller.php'><?php echo $strings['Back']; ?></a>
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>