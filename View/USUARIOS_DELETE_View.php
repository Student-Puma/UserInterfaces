<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 */

	/**
	 * Vista de la función DELETE de la entidad
	 * 
	 * @var tupla Datos de la entidad
	 */
	class USUARIOS_DELETE
	{
		/**
		 * Constructor de la clase
		 */
		function __construct($tupla)
		{	
			$this->tupla = $tupla;
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
			<h1><?php echo $strings['DELETE']; ?></h1>	
			<form name = 'Form' action='../Controller/USUARIOS_Controller.php' method='post' onsubmit="return comprobar_registro();">
			
				 	Login : <input type = 'text' name = 'login' id = 'login' placeholder = 'Utiliza tu dni' size = '9' value = '<?php echo $this->tupla['login']; ?>' onblur="esNoVacio('login')  && comprobarDni('login')" readonly><br>
					Password : <input type = 'text' name = 'password' id = 'password' placeholder = 'letras y numeros' size = '15' value = '<?php echo $this->tupla['password']; ?>' onblur="esNoVacio('password')  && comprobarLetrasNumeros('password',15)" readonly><br>
					Nombre : <input type = 'text' name = 'nombre' id = 'nombre' placeholder = 'Solo letras' size = '30' value = '<?php echo $this->tupla['nombre']; ?>' onblur="esNoVacio('nombre')  && comprobarSoloLetras('nombre',30)" readonly><br>
					Apellidos : <input type = 'text' name = 'apellidos' id = 'apellidos' placeholder = 'Solo letras' size = '50' value = '<?php echo $this->tupla['apellidos']; ?>' onblur="esNoVacio('apellidos')  && comprobarSoloLetras('apellidos',50)" readonly><br>
					Email : <input type = 'text' name = 'email' id = 'email' size = '40' value = '<?php echo $this->tupla['email']; ?>' onblur="esNoVacio('email')  && comprobarEmail('email')" readonly><br>

					<input type='submit' name='action' value='DELETE'>
			</form>
				
			<a href='../Controller/Index_Controller.php'>Volver </a>
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>


	