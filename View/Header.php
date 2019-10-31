<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
	 */

	/**
	 * Vista del Header
	 */

	// Añadimos la librería de autentificación
	include_once '../Functions/Authentication.php';

	// Seleccionamos un idioma si no hay uno seleccionado
	if (!isset($_SESSION['idioma'])) {
		$_SESSION['idioma'] = 'SPANISH';
	}
	include '../Locale/Strings_' . $_SESSION['idioma'] . '.php';
	
	// Añadimos el archivo con los iconos
	include '../Locale/Icons.php';
?>

<!-- ¡HTML CODE! -->

<html>
<head>
	<title>
		<?php echo $strings['AppName']; ?>
	</title>
	
	<meta charset="UTF-8">

	<!-- FaiTIC stylesheet by Kike Fontán -->
	<link rel="stylesheet" type="text/css" href="../View/public/css/faketic.css">
	<link rel="icon" type="image/vnd.microsoft.icon" href="../View/public/img/favicon.ico">
	<script> var _ = true, err = _; </script>
</head>
<body>
	<div class="main">
		<!-- Logo Image -->
		<div class="banner">
			<a href="../index.php"><img alt="Logo" src="<?php echo $icons['logo']; ?>"></a>
		</div> <!-- banner -->
		<!-- Menú Superior -->
		<div class="menu-superior">
			<span class="title"><?php echo $strings['Title']; ?></span>
			<div class="icons">
				<a href="../Functions/CambioIdioma.php?idioma=SPANISH"><img height="12" src="<?php echo $icons['flag_es']; ?>"></a>
				<a href="../Functions/CambioIdioma.php?idioma=ENGLISH"><img height="12" src="<?php echo $icons['flag_en']; ?>"></a>
				<a href="../Functions/CambioIdioma.php?idioma=GALLAECIAN"><img height="12" src="<?php echo $icons['flag_gl']; ?>"></a>
<?php
			// Si está autenticado, mostramos el botón de desconectarse
			if (IsAuthenticated())
			{
?>
				<a href="../Functions/Desconectar.php" class="logout""><img height="18" src="<?php echo $icons['logout']; ?>"></a>
<?php		}	?>
				</div> <!-- icons -->
		</div> <!-- menu-superior -->

		<div class="contenido">
<?php

			include '../View/users_menuLateral.php';
?>
			
			<div class="contenido-principal">
                <span class="title"><?php echo $strings['Content']; ?></span>
                <div class="workspace">
					<div class="datos">