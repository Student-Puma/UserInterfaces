<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 15/12/2019
	 */

	/**
	 * Vista del Header
	 */

	// Añadimos la librería de autentificación
	include_once '../Functions/Authentication.php';
	
	// Añadimos el archivo con los iconos
	include '../Locale/Icons.php';
?>

<!-- ¡HTML CODE! -->

<html>
<head>
	<title class="trad_AppName"></title>
	
	<meta charset="UTF-8">

	<!-- FaiTIC stylesheet by Kike Fontán -->
	<link rel="stylesheet" type="text/css" href="../View/public/css/faketic.css">
	<link rel="icon" type="image/vnd.microsoft.icon" href="../View/public/img/favicon.ico">
	<script> var _ = true, err = _; </script>
	<script type="application/javascript" src="../View/public/js/locale.js"></script>
	<script type="application/javascript" src="../View/public/js/cookies.js"></script>
	<script type="application/javascript" src="../View/public/js/language.js"></script>
</head>
<body onload="traducir()">
	<div class="main">
		<!-- Logo Image -->
		<div class="banner">
			<a href="../index.php"><img alt="Logo" src="<?php echo $icons['logo']; ?>"></a>
		</div> <!-- banner -->
		<!-- Menú Superior -->
		<div class="menu-superior">
			<span class="title trad_Title"></span>
			<div class="icons">
				<a onclick="traducir('es')"><img height="12" src="<?php echo $icons['flag_es']; ?>"></a>
				<a onclick="traducir('en')"><img height="12" src="<?php echo $icons['flag_en']; ?>"></a>
				<a onclick="traducir('gl')"><img height="12" src="<?php echo $icons['flag_gl']; ?>"></a>
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
                <span class="title trad_Content"></span>
                <div class="workspace">
					<div class="datos">