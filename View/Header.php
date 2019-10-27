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
		$_SESSION['idioma'] = 'SPANISH';
	}
	include_once '../Locale/Strings_' . $_SESSION['idioma'] . '.php';
?>

<!-- ¡HTML CODE! -->

<html>
<head>
	<title>
		<?php echo $strings['AppName']; ?>
	</title>
	<meta charset="UTF-8">

	<!-- FaiTIC stylesheet by Kike Fontán -->
	<style>
        a { text-decoration: none; }
        li { list-style-type: none; }

        html { height: 100vh; }
        body { margin: 0; min-height: 100vh; overflow: hidden; }

        .title { float: left; color: #FFF; font-size: 18px; margin-left: 15px; font-weight: 100; font-family: Georgia, 'Times New Roman', Times, serif; }

        .main { margin: 0 auto; width: 80vw; height: 100vh;
            display: flex; flex-direction: column; }

        .banner { order: 10; margin-top: 25px; }

        .menu-superior { order: 20; height: 20px; padding: 5px; margin: 20px 0px; background-size: 100% 100%; border-top: 1px solid #77B3D9;
            background: linear-gradient(#7FB6E2, #77B3D9, #59A8D9, #3B9CD9, #1B80BF, #0477BF, #006EC6); }
		  .menu-superior .icons { float: right; display: flex; justify-content: center; align-items: center; }
          .menu-superior .icons a { height: 12; margin-right: 7px; }
          .menu-superior .icons a.logout { height: 16; margin-left: 15px; }

        .contenido { order: 30; display: flex; flex-direction: row; align-items: flex-start; }

          .menu-lateral { order: 31; display:flex; flex-direction: column; margin: 0; margin-right: 40px; border: 1px solid #CCC; background-color:#EEE; width: 210px; padding: 0; }
            .menu-lateral li, form { margin: 0; padding: 2px 15px; height: 20px; text-align: left; border: 1px solid #CCC; background-color:#EEE; }
            .menu-lateral li:hover { background-color:#AAA; }
			.contenido .menu-lateral .title { padding: 0; font-size: 16px; text-align: center; color: #fff; border-top: 2px solid #CCC;
              background: linear-gradient(#EEE, #AAA, #999, #888); }
            .menu-lateral a li { color: #555; }

			.menu-lateral form { height: 100%; display:flex; flex-direction: column; flex-wrap: wrap; justify-content: center; padding: 10px; }
			.menu-lateral form label { margin-top: 5px; font-size: 12px; color: #666;}
			.menu-lateral form input { border: 1px solid #999; padding: 2px 5px; color: #333; }
			.menu-lateral form input[type=submit] { color: #FFF; border: 1px solid #3B9CD9; text-transform: uppercase; margin-top: 13px; margin-bottom: 5px; height: 25px;
			  background: linear-gradient(#59A8D9, #7FB6E2, #59A8D9, #0477BF); }

          .contenido-principal { order: 32; width: 100%; display:flex; flex-direction: column; background: linear-gradient(#888, #FFF); }
            .contenido-principal .title { height: 30px; line-height: 30px; font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: bolder; font-size: 12px; text-transform: uppercase; }
            .contenido-principal .workspace { margin: 2px; background: #FFF; height: calc(100% - 30px);}
            .contenido-principal .workspace .datos { margin: 15px; border: 1px solid #CCC; height: calc(100% - 30px); }

			.contenido-principal .workspace .datos h2,h4 { width: 100%; text-align: center; color: #333; }
			.contenido-principal .workspace .datos a { color: #0067E2; }

        .footer { order: 40; margin-top: 20px; padding: 10px 0; }
          .footer p { border-top: 1px solid #BBB; padding-top: 10px; font-size: 12px; text-align: center; font-weight: bold;}
          .footer p .author { color: #0067E2; }
          .footer p .today { font-weight: normal; }
          .footer p span { margin: auto 2px; }
    </style>
	<!-- End of stylesheet -->
</head>
<body>
	<div class="main">
		<!-- Logo Image -->
		<div class="banner">
			<img alt="Logo" src="data:image/jpeg;base64,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">
		</div> <!-- banner -->
		<!-- Menú Superior -->
		<div class="menu-superior">
			<span class="title"><?php echo $strings['Title']; ?></span>
			<div class="icons">
				<a href="../Functions/CambioIdioma.php?idioma=SPANISH"><img height="12" src="data:image/gif;base64,R0lGODlhEgAMAMQAAK5PHqlGGeWuBrtOFb5CEu6vA813VLBZQ4xVSsWJKM2cDqlgJNWlCfnAAseKQ8OWRK5ZE8RNGLWJFb5/hM9qTcaeN7h1Fr2in//EAMYLHgAAAAAAAAAAAAAAAAAAAAAAACH5BAAAAAAALAAAAAASAAwAAAUuYCaOZGmeaJpiLMZIStPONFZAwSLUfEIclwqvRhkgJoYh7WEBRBzKqFJFrVpRIQA7"></a>
				<a href="../Functions/CambioIdioma.php?idioma=ENGLISH"><img height="12" src="data:image/gif;base64,R0lGODlhEgAMAPcAANQYLe+nr+iPmgElcdQuQtQtQtq/zc8UK88TKu2Sm+A4SOucpn2RvxIseCBLmRIpdtIWLAEkctAUK//f3g4tguqXodozRcwDHNa8y8fT5h9GlP/7+R82fcwIIPOCiRg2fwc0fP/6+AEohAwqgffV2QYuhfaTmQApgi1VngAZd9Y0SOmTnaysytIjOPixtbZlgOxVYehUYPbP09FqfWByq/XL0BIndO2Fju6AieZ8iQAaed9gcOnm7t28wgEpdImUt2B/uOtWYsAPHP/o5t5SYdzs98pwd/KXn//v7tjo9WRyqXBtkgEdbPbu8c0MJHdomvB4gHBglMwGH7Nphm6Zy9Pq6uufqfjh5NUwRM8SKhIqd9c5TNc4TNUxRRIjcxAvg9FpfPCmpiBOjv/r6cYgKhIfb//i4fSTmdm+zClSnOiMl+dXY1RioK5kgxg5hPOZoNMpPmh/tTxalmqFut/G0tchLdni765RcOiOmQAgfcHZ7v77+3J4o+6UnfTKz////OurtYScx66wzThepMy7vwAeeiJLmumQmv/m5QAceN00RmOBqgEnc9zr9+lWY+qWoNY0Rw80eudUYWZ1qytZk+unsAYxiup5g+iSnX6Ww7Vif9EQH/Df5dbc6hIqdt3w+//q6MwFHfOLkuj6/+ylrgAVde+aotPQ3+yMls8VLNbc69+lo+6nr9tHWAAPcLTI480GHssAGf///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAAAAAAALAAAAAASAAwAAAjoAH9wKPOggZYPPepsCiPHRgNPXtzwGVKEwZdShUoYAAArAIpEKSwp0RTDERREjRiMyIOGYwAHIia9kORhApspRC6NsZOJDgRYlQK1WYODxKc5gjJcYeUnxB8ZCKRYQeKihqw9p1goUNRlC6QCBOAcyNICCxcVBApYUBCrrdtYFw6k6vDW7RsBAlYsqJAgBwInO/ocwvNoAaYjQPTIkmXKBA9OEkIBGiVrg5oEqqi8aoIqyIwoGjBwJDWIRiczN1rdOQMDzBNDOk5s7JjGFYU4SUCJMrJETIQBPkAQIiNkFaUBjJhEWlQlIAA7"></a>
				<a href="../Functions/CambioIdioma.php?idioma=GALLAECIAN"><img height="12" src="data:image/gif;base64,R0lGODlhEgAMAPcAADSexFzS9LTW3HzG1DS63NTy9JTi9DzK9PT6/DTK/FzS/NTe3Cy23DzK/FzW9MTCxNTy/KTi9OTi5Jzm9PT+/CzO/OTe3DS25NT2/DSixGTS9LzW3HzG3Jzi9DTO9FzW/Nze3DS23DzO/GTW9MTGxPz+/DTO/Nz2/FYaGQAAAAAAAAAAADAAEegAABIAAAAAAHMA0QAAOQAAFQAAW1AVhOkAABIAAAAAABgViO4AFpEAGHwAW3ANFQUAAJIAAHwAAP8NJP8AAP8AAP8AAG3XlQUHOZIQFXwmW4UyWOcEPoGFOHwDAAAX7gAAAxUAEwAAAGgBSAMAPgAAOAAAAKgZ25EAGhYAFQAAWzgRDF4A9xUAEgAAAAABIAAAIAAARgAAAH4HhAAAAAAAAMAAAAAI7gAAAwAAEwAAAP8JhP8AAP8AAP8AAP8BAP8AAP8AAP8CAAABJAAAAAAALwAAAAAwBADqAAASAAAAAADQ5AA8BBUVAABbABZAYNs/ngA4gAAAfGAk8OkAbBIAFgAAAJ8vAOsAAIEAAHwAAErwB+PqAIESAHwAAKBGAHfQAFAWAABbADhAAF4/YAE4FgAAAG0FAAAAAAAAAAAAAJwWAOjbABIAAAAAADR4AADqAAASAMAAAAiFAPwrABKDAAB8ABgAaO4AnpEAgHwAfHAA/wUA/5IA/3wA//8AYP8Anv8AgP8AfG0ALAUBAJIAAHwAAErpLPQrAICDAHx8AACcWADq8RUSEgAAAADE/wAr/wCD/wB8/zgAAF4AABUAAAAAAADwpAFs6wAWEgAAAAA09gBkOACDTAB8AFf/hPT/64D/Enz/AIigd+rrEBISTwAAADhtuF5k6xWDEgB8AKBoNAAsZABPgwAAfB+AXAA17ABPEgAAABEA0gAB/wAA/wAAfwScMADq7AASEgAAAAMA8AABbAAAFgAAAACINABkZACDgwB8fAAB8AAAbAAAFgAAAAQAFgAw2wAwAAAAAAMBAAAAAAAAAAAAAAAajQAA4gAARwAAACH5BAAAAAAALAAAAAASAAwABwiLADNcCMFhAQgJBxFKUIjwQYgEFRI4gFCiosWLJSQIcJCgo4gOCDBeRIhgQoMDHT8UEFlRgoWKEBQk8DBzAksQICwi6NAAYoIAFEO2lIAxZscKDSZQsIgQY0ieHX9SLGGBqEgEGDSY6OihAwWcLCuWbLDVhIMNVlmGLMAxYggSB3EijBt3AYcQDAAEBAA7"></a>
<?php
			// Si está autenticado, mostramos el botón de desconectarse
			if (IsAuthenticated())
			{
?>
				<a href="../Functions/Desconectar.php" class="logout""><img height="18" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAMAAADzN3VRAAAACXBIWXMAAA7DAAAOwwHHb6hkAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAAADqYAAAXb5JfxUYAAADeUExURf///zMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMw0NDQ8PDxISEhMTExQUFBoaGhwcHB8fHyYmJigoKCkpKSoqKjAwMDMzM01NTU5OTlNTU19fX2JiYnV1dYWFhZ6enp+fn6mpqa2trbGxsb29vdTU1NXV1dfX19nZ2dra2tzc3N7e3t/f3+Dg4OTk5PLy8vT09PX19fb29vf39/j4+Pr6+vz8/P39/f7+/vdo4e8AAAAbdFJOUwAVGx4nMDNaaWxydYGEh5mcoqWorrG0t7q98OZ8B/cAAADwSURBVBgZpcHbWoJQEAbQScSUMJKSJMyy46+ds/NByyxnv/8LNbPBD6KLLlqL/sXxgnY7aFSoxI2RiV0q8lHgUy6E2u8iFdKCD3G8ffaGjE8pF2J375lN0u3DcsnqQNx8GcPz98seVIdUFep2zsaw4cc+lEPCgzWcMJ+Pma+g6iRayFx8AC9mBtUi0YFKkiOIU8NQmyQiKOYBxIAZKiKxBjXjh97B4c6T+YQKSKxAXTPfnwzvmEdQdRJVWGPDhtm8wnJIxbBGU+bpCFZMVg2/uJRqoqRJC+v4IaTcKnJby1RUi5HZWKISxwuiKGhU6E/f8iM9YQBDtFgAAAAASUVORK5CYII="></a>
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