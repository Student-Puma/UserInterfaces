<?php
// Autor : jrodeiro
// Fecha : 23/9/2019
// Descripción : 
//	Fichero de test de unidad de la entidad USUARIOS
//	Incluye USUARIOS_Model.php
//	Saca por pantalla el resultado de los test

// incluir el modelo de la entidad USUARIOS
	include '../Model/USUARIOS_Model.php';
// crear el array principal de test
	$USUARIOS_array_test = array();

/*	$login		
	$password
	$nombre
	$apellidos
	$email
*/

// function USUARIOS_Login_test()
// Valida:
//		login no existente
//		password no correcta para el login
//		login correcto

function USUARIOS_login_test()
{

	global $USUARIOS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test1 = array();

// Comprobar el login no existe

	$USUARIOS_array_test1['error'] = 'El login no existe';
	$USUARIOS_array_test1['error_esperado'] = 'El login no existe';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = 'loginerror';
	$usuarios = new USUARIOS_Model($login,'','','','');
	$USUARIOS_array_test1['error_obtenido'] = $usuarios->login();
	if ($USUARIOS_array_test1['error_obtenido'] == $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}

	array_push($USUARIOS_array_test, $USUARIOS_array_test1);

// Comprobar La password para este usuario no es correcta

	$USUARIOS_array_test1['error'] = 'La password para este usuario no es correcta';
	$USUARIOS_array_test1['error_esperado'] = 'La password para este usuario no es correcta';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = 'jrodeiro';
	$password = 'javi2232';
	$usuarios = new USUARIOS_Model($login,$password,'','','');
	$USUARIOS_array_test1['error_obtenido'] = $usuarios->login();
	if ($USUARIOS_array_test1['error_obtenido'] === $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}
	
	array_push($USUARIOS_array_test, $USUARIOS_array_test1);		

// Comprobar login exitoso

	$USUARIOS_array_test1['error'] = 'Login Correcto';
	$USUARIOS_array_test1['error_esperado'] = 'true';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
	
	$login = 'jrodeiro';
	$password = 'javi22';
	$usuarios = new USUARIOS_Model($login,$password,'','','');
	$USUARIOS_array_test1['error_obtenido'] = $usuarios->login();
	if ($USUARIOS_array_test1['error_obtenido'] == $USUARIOS_array_test1['error_esperado'])
	{
		$USUARIOS_array_test1['resultado'] = 'OK';
	}
	else
	{
		$USUARIOS_array_test1['resultado'] = 'FALSE';
	}
	
	array_push($USUARIOS_array_test, $USUARIOS_array_test1);	


}

	USUARIOS_login_test();
?>
<h1>Test de unidad de USUARIOS</h1>
<table>
	<tr>
		<th>
			Error testeado
		</th>
		<th>
			Error Esperado
		</th>
		<th>
			Error Obtenido
		</th>
		<th>
			Resultado
		</th>
	</tr>
<?php
	foreach ($USUARIOS_array_test as $test)
	{
?>
	<tr>
		<td>
			<?php echo $test['error']; ?>
		</td>
		<td>
			<?php echo $test['error_esperado']; ?>
		</td>
		<td>
			<?php echo $test['error_obtenido']; ?>
		</td>
		<td>
			<?php echo $test['resultado']; ?>
		</td>
	</tr>
<?php	
	}
?>
</table>


<?php

?>