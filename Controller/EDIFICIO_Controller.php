<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 11/01/2019
	 */

	/**
	 * Controlador de la entidad
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
	include '../Model/EDIFICIO_Model.php';
	include '../View/EDIFICIO_ADD_View.php';
	include '../View/EDIFICIO_EDIT_View.php';
	include '../View/EDIFICIO_DELETE_View.php';
	include '../View/EDIFICIO_SEARCH_View.php';
	include '../View/EDIFICIO_SHOWALL_View.php';
	include '../View/EDIFICIO_SHOWCURRENT_View.php';

	// Añadimos la vista de los mensajes
	include '../View/MESSAGE_View.php';

	/**
	 * Recoge los valores POST y crea una instancia de la entidad
	 * 
	 * @return edificio Instancia de la entidad
	 */
	function get_data_form()
	{
		// Valores POST
		$CODEdificio = $_POST['CODEdificio'];
		$nombre = $_POST['nombre'];
		$direccion = $_POST['direccion'];
		$campus = $_POST['campus'];
		$action = $_POST['action'];
		
		// Creación de la instancia EDIFICIO
		$edificio = new EDIFICIO_Model($CODEdificio,$nombre,$direccion,$campus);
		return $edificio;
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
				new EDIFICIO_ADD();
			}
			else
			{
				// Recogemos los datos del formulario y los añadimos a la BD
				$EDIFICIO = get_data_form();
				$respuesta = $EDIFICIO->ADD();
				// Mostramos un mensaje con la respuesta
				new MESSAGE($respuesta, '../Controller/EDIFICIO_Controller.php');
			}
			break;
		// Acción: Borrar
		case 'DELETE':
			// Si no hay datos, mostramos el formulario correspondiente
			if (!$_POST)
			{
				$EDIFICIO = new EDIFICIO_Model($_REQUEST['CODEdificio'],'','','');
				$valores = $EDIFICIO->RellenaDatos();
				new EDIFICIO_DELETE($valores);
			}
			else
			{
				// Se muestra el formulario con los valores actuales
				$EDIFICIO = get_data_form();
				$respuesta = $EDIFICIO->DELETE();
				// Mostramos un mensaje con la respuesta
				new MESSAGE($respuesta, '../Controller/EDIFICIO_Controller.php');
			}
			break;
		// Acción: Editar
		case 'EDIT':
			// Si no hay datos, mostramos el formulario correspondiente
			if (!$_POST)
			{
				// Se muestra el formulario con los valores actuales
				$EDIFICIO = new EDIFICIO_Model($_REQUEST['CODEdificio'],'','','');
				$valores = $EDIFICIO->RellenaDatos();
				// Si no hay error, mostramos el formulario con los datos
				if (is_array($valores))
				{
					new EDIFICIO_EDIT($valores);
				}
				else
				{
					// Sino, mostramos un mensaje de error
					new MESSAGE($valores, '../Controller/EDIFICIO_Controller.php');
				}
			}
			else
			{
				// Editamos los datos de la BD
				$EDIFICIO = get_data_form();
				$respuesta = $EDIFICIO->EDIT();
				// Mostramos un mensaje con la respuesta
				new MESSAGE($respuesta, '../Controller/EDIFICIO_Controller.php');
			}
			break;
		// Acción: Buscar
		case 'SEARCH':
			// Si no hay datos, mostramos el formulario correspondiente
			if (!$_POST)
			{
				new EDIFICIO_SEARCH();
			}
			else
			{
				// Filtramos los resultados de la BD
				$EDIFICIO = get_data_form();
				$datos = $EDIFICIO->SEARCH();
				// Claves de la tabla
				$lista = array('CODEDIFICIO','NOMBREEDIFICIO','DIRECCIONEDIFICIO','CAMPUSEDIFICIO');
				// Mostramos la vista correspondiente
				new EDIFICIO_SHOWALL($lista, $datos, '../index.php');
			}
			break;
		// Acción: Detallar
		case 'SHOWCURRENT':
			// Creamos una instancia de la entidad con la clave primaria del registro que deseemos ver
			$EDIFICIO = new EDIFICIO_Model($_REQUEST['CODEdificio'],'','','');
			$valores = $EDIFICIO->RellenaDatos();
			// Mostramos la vista correspondiente
			new EDIFICIO_SHOWCURRENT($valores);
			break;
		// Acción: Mostrar todos
		default:
			// Si no hay datos, creamos una nueva instancia de la entidad
			if (!$_POST)
			{
				// Sino, usamos los datos recibidos
				$EDIFICIO = new EDIFICIO_Model('','','','');
			}
			else
			{
				$EDIFICIO = get_data_form();
			}
			// Obtenemos la BD
			$datos = $EDIFICIO->SEARCH();
			$lista = array('CODEDIFICIO','NOMBREEDIFICIO','DIRECCIONEDIFICIO','CAMPUSEDIFICIO');
			new EDIFICIO_SHOWALL($lista, $datos);
	}
?>
