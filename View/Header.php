<?php
	include_once '../Functions/Authentication.php';
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
	<script type="text/javascript" src="../View/js/tcal.js"></script> 
	<script type="text/javascript" src="../View/js/md5.js"></script>
	<script type="text/javascript" src="../View/js/validaciones.js"></script> 
	 
	<!--<script type="text/javascript" src="../View/js/comprobar.js"></script> -->
	<link rel="stylesheet" type="text/css" href="../View/css/JulioCSS-2.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../View/css/tcal.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../View/css/modal.css" />
</head>
<body>
		<div id="modal" style="display:none">
	  		<div id="contenido-interno">
	  			<div id="aviso"><img src="../View/Icons/sign-error.png" name="aviso"/></div>
	  			<div id="mensajeError"></div>
				<a id="cerrar" href="#" onclick="cerrarModal();">
		       		<img style="cursor: pointer" alt="" src="../View/Icons/salir.png" width="25"/>
				</a>
			</div>
		</div>
<header>
	<p style="text-align:center">
		<h1>
<?php
			echo $strings['Title'];
?>
		</h1>
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
	
	if (IsAuthenticated()){
?>

<?php
		echo $strings['User'] . ' : ' . $_SESSION['login'] . '<br>';
?>			
	<div width: 50%; align="right">
		<a href='../Functions/Desconectar.php'>
			<img src='./sign-error.png'>
		</a>
	</div>

<?php
	
	}
	else{
		echo $strings['UserNotAuth']; 
		/*echo 	'<form name=\'registerForm\' action=\'../Controller/Register_Controller.php\' method=\'post\'>
					<input type=\'submit\' name=\'action\' value=\'REGISTER\'>
				</form>';*/
?>
		<a href='../Controller/Register_Controller.php'><?php echo $strings['Register']; ?></a>
<?php
	}	
?>


</header>

<div id='main'>
<?php
	//session_start();
	if (IsAuthenticated()){
		include '../View/users_menuLateral.php';
	}
?>
<article>
