<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 11/01/2019
	 */

	/**
	 * Vista del Header
	 */

	// Añadimos la librería de autentificación
	include_once '../Functions/Authentication.php';

	// Seleccionamos un idioma si no hay uno seleccionado
	if (!isset($_SESSION['idioma'])) {
		$_SESSION['idioma']='SPANISH';
	}
	include '../Locale/Strings_' . $_SESSION['idioma'] . '.php';
?>
<html>
<head>
	<title>
		<?php echo $strings['AppName']; ?>
	</title>
	<meta charset="UTF-8">
	<title>
		<?php echo $strings['AppName']; ?>
	</title>
</head>
<body>
	<header>
		<p style="text-align:center">
			<h1> <?php echo $strings['Title']; ?> </h1>
		</p>
	
		<div width: 50%; align="left">
			<form name='idiomaform' action="../Functions/CambioIdioma.php" method="post">
				<?php echo $strings['Language']; ?>
				<select name="idioma" onChange='this.form.submit()'>
					<option value="SPANISH"> </option>
					<option value="ENGLISH"><?php echo $strings['ENGLISH']; ?></option>
					<option value="SPANISH"><?php echo $strings['SPANISH']; ?></option>
					<option value="GALLAECIAN"><?php echo $strings['GALLAECIAN']; ?></option>
				</select>
			</form>
		</div>
<?php
		// Si el usuario está autenticado,
		// mostramos el Header correspondiente
		if (IsAuthenticated()){
			echo $strings['User'] . ' : ' . $_SESSION['login'] . '<br>';
?>			
		<div width: 50%; align="right">
			<a href='../Functions/Desconectar.php'>
				<?php echo $strings['Disconnect']; ?>
			</a>
		</div>
<?php
		}
		else
		{
			echo $strings['UserNotAuth']; 
?>
			<a href='../Controller/Register_Controller.php'><?php echo $strings['Register']; ?></a>
<?php
		}
?>
	</header>
	<div id='main'>
<?php
		// Mostramos el Menú Lateral si está autenticado
		if (IsAuthenticated()){
			include '../View/users_menuLateral.php';
		}
?>
	<article>
