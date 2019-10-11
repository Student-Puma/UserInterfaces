<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 */

	// Iniciamos la sesión
	session_start();

	// Comprobamos que el usuario esté autenticado
	include '../Functions/Authentication.php';
	if (!IsAuthenticated())
	{
		header('Location:../index.php');
	}

	// Añadimos el modelo y las vistas pertenecientes a la entidad
	include '../Model/CENTRO_Model.php';
	include '../View/CENTRO_ADD_View.php';
	include '../View/CENTRO_EDIT_View.php';
	include '../View/CENTRO_DELETE_View.php';
	include '../View/CENTRO_SEARCH_View.php';
	include '../View/CENTRO_SHOWALL_View.php';
	include '../View/CENTRO_SHOWCURRENT_View.php';

	// Añadimos la vista de los mensajes
	include '../View/MESSAGE_View.php';

	/**
	 * Recoge los valores POST y crea una instancia de la entidad
	 * 
	 * @return centro Instancia de la entidad
	 */
	function get_data_form()
	{
		// Valores POST
		$CODCentro = $_POST['CODCentro'];
		$CODEdificio = $_POST['CODEdificio'];
		$nombre = $_POST['nombre'];
		$direccion = $_POST['direccion'];
		$responsable = $_POST['responsable'];
		$action = $_POST['action'];

		// Creación de la instancia CENTRO
		$centro = new CENTRO_Model($CODCentro,$CODEdificio,$nombre,$direccion,$responsable);
		return $centro;
	}

	// Comprobamos que exista la el valor 'action'
	if (!isset($_REQUEST['action']))
	{
		$_REQUEST['action'] = '';
	}

	// Ejecutamos la acción deseada
	Switch ($_REQUEST['action'])
	{
		// Acción: Añadir
		case 'ADD':
			// Si no hay datos, mostramos el formulario correspondiente
			if (!$_POST)
			{
				new CENTRO_ADD();
			}
			else
			{
				// Recogemos los datos del formulario y los añadimos a la BD
				$CENTRO = get_data_form();
				$respuesta = $CENTRO->ADD();
				// Mostramos un mensaje con la respuesta
				new MESSAGE($respuesta, '../Controller/CENTRO_Controller.php');
			}
			break;
		// Acción: Borrar
		case 'DELETE':
			// Si no hay datos, mostramos el formulario correspondiente
			if (!$_POST)
			{
				// Se muestra el formulario con los valores actuales
				$CENTRO = new CENTRO_Model($_REQUEST['CODCentro'],'','','','');
				$valores = $CENTRO->RellenaDatos();
				new CENTRO_DELETE($valores);
			}
			else
			{
				// Eliminamos los datos de la BD
				$CENTRO = get_data_form();
				$respuesta = $CENTRO->DELETE();
				// Mostramos un mensaje con la respuesta
				new MESSAGE($respuesta, '../Controller/CENTRO_Controller.php');
			}
			break;
		// Acción: Editar
		case 'EDIT':
			// Si no hay datos, mostramos el formulario correspondiente
			if (!$_POST)
			{
				// Se muestra el formulario con los valores actuales
				$CENTRO = new CENTRO_Model($_REQUEST['CODCentro'],'','','','');
				$valores = $CENTRO->RellenaDatos();
				// Si no hay error, mostramos el formulario con los datos
				if (is_array($valores))
				{
					new CENTRO_EDIT($valores);
				}
				else
				{
					// Sino, mostramos un mensaje de error
					new MESSAGE($valores, '../Controller/CENTRO_Controller.php');
				}
			}
			else
			{
				// Editamos los datos de la BD
				$CENTRO = get_data_form();
				$respuesta = $CENTRO->EDIT();
				// Mostramos un mensaje con la respuesta
				new MESSAGE($respuesta, '../Controller/CENTRO_Controller.php');
			}
			break;
		// Acción: Buscar
		case 'SEARCH':
			// Si no hay datos, mostramos el formulario correspondiente
			if (!$_POST)
			{
				new CENTRO_SEARCH();
			}
			else
			{
				// Filtramos los resultados de la BD
				$CENTRO = get_data_form();
				$datos = $CENTRO->SEARCH();
				// Claves de la tabla
				$lista = array('CODCENTRO','CODEDIFICIO','NOMBRECENTRO','DIRECCIONCENTRO','RESPONSABLECENTRO');
				// Mostramos la vista correspondiente
				new CENTRO_SHOWALL($lista, $datos, '../index.php');
			}
			break;
		// Acción: Detallar
		case 'SHOWCURRENT':
			// Creamos una instancia de la entidad con la clave primaria del registro que deseemos ver
			$CENTRO = new CENTRO_Model($_REQUEST['CODCentro'],'','','','');
			$valores = $CENTRO->RellenaDatos();
			// Mostramos la vista correspondiente
			new CENTRO_SHOWCURRENT($valores);
			break;
		// Acción: Mostrar todos
		default:
			// Si no hay datos, creamos una nueva instancia de la entidad
			if (!$_POST)
			{
				$CENTRO = new CENTRO_Model('','','','','');
			}
			else
			{
				// Sino, usamos los datos recibidos
				$CENTRO = get_data_form();
			}
			// Obtenemos la BD
			$datos = $CENTRO->SEARCH();
			$lista = array('CODCENTRO','CODEDIFICIO','NOMBRECENTRO','DIRECCIONCENTRO','RESPONSABLECENTRO');
			new CENTRO_SHOWALL($lista, $datos);
	}
?>
