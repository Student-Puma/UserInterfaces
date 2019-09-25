<?php
	include_once '../Model/USUARIOS_Model.php';
	// Conectamos con la base de datos
	$usuario = new USUARIOS_Model('','','','','','');
	$resultado = array();

	if(isset($_GET['delete']) && strcmp($_GET['delete'], '') != 0)
	{
		$login = $_GET['delete'];
		$response = $usuario->DELETE($login);
		echo '<script language="javascript">alert("' . $response . '");</script>';
	}

	$query = isset($_GET['q']) ? $_GET['q'] : '';
	$resultado = $usuario->SEARCH($query);
?>

<form method="GET">
	<label for="Search">Buscar</label>
	<input id="Search" name="q" type="text">
</form>


<table style="width:100%;">
	<tr>
		<th>Login</th>
		<th>Nombre</th>
		<th>Apellidos</th>
		<th>Email</th>

		<th>Borrar</th>
	</tr>

<?php
	while($fila = $resultado->fetch_array(MYSQLI_ASSOC))
	{
		echo("<tr>");
		echo("<td>" . $fila['login']		. "</td>");
		echo("<td>" . $fila['nombre']		. "</td>");
		echo("<td>" . $fila['apellidos']	. "</td>");
		echo("<td>" . $fila['email']		. "</td>");
		echo("<td><a href=\"?delete=" . $fila['login'] . "\">Borrar</a></td>");
		echo("</tr>");
	}
?>
	
</table>