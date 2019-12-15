<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 15/12/2019
	 */

    /**
     * Archivo de ejecución y visualización de los test unitarios
     */

	// Creamos el array principal de test
	$ERRORS_array_test = array();

	// Incluímos las funciones de apoyo
	include_once '../Functions/TestFunc.php';

	// Ejecutamos el test Global
	include_once '../test/Global_test.php';

	// Contamos la cantidad de test globales
	$count_global = count($ERRORS_array_test);

	// Ejecutamos los Test Unitarios de las Entidades
	// ------------ INICIO ------------

	include_once '../test/USUARIOS_test.php';
	include_once '../test/EDIFICIO_test.php';
		EDIFICIO_ADD_test();
		popTest(2);
	include_once '../test/CENTRO_test.php';
		CENTRO_ADD_test();
		popTest(2);
	include_once '../test/ESPACIO_test.php';
	include_once '../test/TITULACION_test.php';
	include_once '../test/PROFESOR_test.php';
		ESPACIO_ADD_test();
		PROFESOR_ADD_test();
		popTest(4);
	include_once '../test/PROF_ESPACIO_test.php';
		TITULACION_ADD_test();
		popTest(2);
	include_once '../test/PROF_TITULACION_test.php';
		TITULACION_DELETE_test();
		PROFESOR_DELETE_test();
		ESPACIO_DELETE_test();
		CENTRO_DELETE_test();
		EDIFICIO_DELETE_test();
		popTest(5);

	// ------------ FIN ------------

	// Contamos la cantidad de test unitarios
	$count_utest = count($ERRORS_array_test);

	// Ejecutamos los Test de Atributos de las Entidades
	// ------------ INICIO ------------

	include_once '../test/USUARIOS_VALIDACION_test.php';
	include_once '../test/EDIFICIO_VALIDACION_test.php';
	include_once '../test/CENTRO_VALIDACION_test.php';
	include_once '../test/ESPACIO_VALIDACION_test.php';
	include_once '../test/PROFESOR_VALIDACION_test.php';
	include_once '../test/TITULACION_VALIDACION_test.php';
	include_once '../test/PROF_ESPACIO_VALIDACION_test.php';
	include_once '../test/PROF_TITULACION_VALIDACION_test.php';

	// ------------ FIN ------------
?>
<head>
	<link rel="stylesheet" type="text/css" href="../View/public/css/faketic.css">
</head>
<body>
	<div class="main" style="width: 95vw">
		<div class="contenido">
			<div class="contenido-principal">
				<div class="workspace">
					<div class="datos">
					<h1>Resumen</h1>
					<h2>De <?php echo count($ERRORS_array_test); ?> tests hay <?php echo countErrors(); ?> fallidos</h2>
					<h1>Detalle</h1>
<?php				
	foreach($ERRORS_array_test as $i=>$test)
	{
		// Global Test
		if($i == 0)
		{
?>
			<h2>Pruebas Globales</h2>
			<table>
				<tr>
					<th>Error testeado</th>
					<th>Valor esperado</th>
					<th>Error obtenido</th>
					<th>Resultado</th>
				</tr>
<?php
		} else if ($i == $count_global) {
?>
			</table>
			<h2>Pruebas Unitarias</h2>
			<table>
				<tr>
					<th>Entidad</th>
					<th>Método</th>
					<th>Error testeado</th>
					<th>Valor esperado</th>
					<th>Error obtenido</th>
					<th>Resultado</th>
				</tr>
<?php
		} else if ($i == $count_utest) {
?>
			</table>
			<h2>Pruebas Validación</h2>
			<table>
				<tr>
					<th>Entidad</th>
					<th>Atributo</th>
					<th>Error testeado</th>
					<th>Valor esperado</th>
					<th>Error obtenido</th>
					<th>Resultado</th>
				</tr>
<?php
		}

		if($i < $count_global)
		{
?>
				<tr class="<?php echo($test['resultado'] === "OK" ? "test_ok" : "test_bad"); ?>">
					<td><?php echo $test['error']; ?></td>
					<td><?php echo $test['error_esperado']; ?></td>
					<td><?php echo $test['error_obtenido']; ?></td>
					<td><?php echo $test['resultado']; ?></td>
				</tr>
<?php
		} else {
?>
			<tr class="<?php echo($test['resultado'] === "OK" ? "test_ok" : "test_bad"); ?>">
				<td><?php echo $test['entidad']; ?></td>
				<td><?php echo $test['metodo']; ?></td>
				<td><?php echo $test['error']; ?></td>
				<td><?php echo $test['error_esperado']; ?></td>
				<td><?php echo $test['error_obtenido']; ?></td>
				<td><?php echo $test['resultado']; ?></td>
			</tr>
<?php
		}
	}
?>
			</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>