<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 */

	/**
	 * Vista de la función ADD de la entidad
	 * 
	 * @var render Renderizado de la vista
	 */
	class USUARIOS_ADD
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
		function render(){
			// Añadimos la vista Header
			include '../View/Header.php';
?>
			<h1><?php echo $strings['ADD']; ?></h1>	
			<form name = 'Form' action='../Controller/USUARIOS_Controller.php' method='post' onsubmit="return comprobar_registro();">
			
				 	Login : <input type = 'text' name = 'login' id = 'login' placeholder = 'Utiliza tu dni' size = '9' value = '' onblur="esNoVacio('login')  && comprobarDni('login')" ><br>
					Password : <input type = 'text' name = 'password' id = 'password' placeholder = 'letras y numeros' size = '15' value = '' onblur="esNoVacio('password')  && comprobarLetrasNumeros('password',15)" ><br>
					Nombre : <input type = 'text' name = 'nombre' id = 'nombre' placeholder = 'Solo letras' size = '30' value = '' onblur="esNoVacio('nombre')  && comprobarSoloLetras('nombre',30)" ><br>
					Apellidos : <input type = 'text' name = 'apellidos' id = 'apellidos' placeholder = 'Solo letras' size = '50' value = '' onblur="esNoVacio('apellidos')  && comprobarSoloLetras('apellidos',50)" ><br>
					Email : <input type = 'text' name = 'email' id = 'email' size = '40' value = '' onblur="esNoVacio('email')  && comprobarEmail('email')" ><br>

					<input type='submit' name='action' value='ADD'>
			</form>
		
			<a href='../Controller/Index_Controller.php'>Volver </a>
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>

	