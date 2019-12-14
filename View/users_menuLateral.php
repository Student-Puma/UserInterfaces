<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
	 */

	/**
	 * Vista del Menú Lateral
	 */

	// Añadimos la librería de autentificación
	include_once '../Functions/Authentication.php';
?>
	<ul class="menu-lateral">
<?php
	// Si está autenticado, mostramos el Menú de Gestión
	if (IsAuthenticated())
	{
?>
		<li class="title trad_Management"></li>
		<a class="trad_GUsuarios" href="../Controller/USUARIOS_Controller.php"><li></li></a>
		<a class="trad_GEdificios" href="../Controller/EDIFICIO_Controller.php"><li></li></a>
		<a class="trad_GCentros" href="../Controller/CENTRO_Controller.php"><li></li></a>
		<a class="trad_GEspacios" href="../Controller/ESPACIO_Controller.php"><li></li></a>
		<a class="trad_GProfesores" href="../Controller/PROFESOR_Controller.php"><li></li></a>
		<a class="trad_GTitulaciones" href="../Controller/TITULACION_Controller.php"><li></li></a>
		<a class="trad_GProfEspacios" href="../Controller/PROF_ESPACIO_Controller.php"><li></li></a>
		<a class="trad_GProfTitulaciones" href="../Controller/PROF_TITULACION_Controller.php"><li></li></a>
<?php
	}
	// Si no está autenticado, mostramos el Menú de Login
	else
	{
?>
		<form name='Form' action='../Controller/Login_Controller.php' method='post'>
			<label for="login" class="trad_Login"></label>
			<input type='text' name='login' size='9' value=''><br>
			<label for="password" class="trad_Password"></label>
			<input type='password' name='password' size='9' value=''><br>

			<input type='submit' name='action' value='Login'>
		</form>		
<?php
	}
?>
	</ul>