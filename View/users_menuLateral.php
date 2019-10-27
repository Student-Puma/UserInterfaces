<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 11/01/2019
	 */

	/**
	 * Vista del Menú Lateral
	 */

	// Añadimos la librería de autentificación
	include_once '../Functions/Authentication.php';

	// Seleccionamos un idioma si no hay uno seleccionado
	if (!isset($_SESSION['idioma'])) {
		$_SESSION['idioma'] = 'SPANISH';
	}
	include_once '../Locale/Strings_' . $_SESSION['idioma'] . '.php';
?>
	<ul class="menu-lateral">
<?php
	// Si está autenticado, mostramos el Menú de Gestión
	if (IsAuthenticated())
	{
?>
		<li class="title"><?php echo $strings['Management']; ?></li>
		<a href="../Controller/USUARIOS_Controller.php"><li><?php echo $strings['GUsuarios']; ?></li></a>
		<a href="../Controller/EDIFICIO_Controller.php"><li><?php echo $strings['GEdificios']; ?></li></a>
		<a href="../Controller/CENTRO_Controller.php"><li><?php echo $strings['GCentros']; ?></li></a>
		<a href="../Controller/ESPACIO_Controller.php"><li><?php echo $strings['GEspacios']; ?></li></a>
		<a href="../Controller/PROFESOR_Controller.php"><li><?php echo $strings['GProfesores']; ?></li></a>
		<a href="../Controller/TITULACION_Controller.php"><li><?php echo $strings['GTitulaciones']; ?></li></a>
		<a href="../Controller/PROF_ESPACIO_Controller.php"><li><?php echo $strings['GProfEspacios']; ?></li></a>
		<a href="../Controller/PROF_TITULACION_Controller.php"><li><?php echo $strings['GProfTitulaciones']; ?></li></a>
<?php
	}
	// Si no está autenticado, mostramos el Menú de Login
	else
	{
?>
		<form name='Form' action='../Controller/Login_Controller.php' method='post'>
			<label for="login"><?php echo $strings['Login']; ?></label>
			<input type='text' name='login' size='9' value=''><br>
			<label for="password"><?php echo $strings['Password']; ?></label>
			<input type='password' name='password' size='9' value=''><br>

			<input type='submit' name='action' value='<?php echo $strings['GoIn']; ?>'>
		</form>		
<?php
	}
?>
	</ul>