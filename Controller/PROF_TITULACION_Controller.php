<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 15/12/2019
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
	include '../Model/PROF_TITULACION_Model.php';
	include '../View/PROF_TITULACION_ADD_View.php';
	include '../View/PROF_TITULACION_EDIT_View.php';
	include '../View/PROF_TITULACION_DELETE_View.php';
	include '../View/PROF_TITULACION_SEARCH_View.php';
	include '../View/PROF_TITULACION_SHOWALL_View.php';
	include '../View/PROF_TITULACION_SHOWCURRENT_View.php';

	// Añadimos la vista de los mensajes
	include '../View/MESSAGE_View.php';

	/**
	 * Recoge los valores POST y crea una instancia de la entidad
	 * 
	 * @return prof_titulacion Instancia de la entidad
	 */
	function get_data_form()
	{
		// Valores POST
		$dni = $_POST['dni'];
		$CODTitulacion = $_POST['CODTitulacion'];
		$anho = $_POST['anho'];
		
		// Creación de la instancia PROF_TITULACION
		$prof_titulacion = new PROF_TITULACION_Model($dni,$CODTitulacion,$anho);
		return $prof_titulacion;
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
				new PROF_TITULACION_ADD();
			}
			else
			{
				// Recogemos los datos del formulario y los añadimos a la BD
				$prof_titulacion = get_data_form();
				$respuesta = $prof_titulacion->ADD();
				// Mostramos un mensaje con la respuesta
				new MESSAGE($respuesta, '../Controller/PROF_TITULACION_Controller.php');
			}
			break;
		// Acción: Borrar
		case 'DELETE':
			// Si no hay datos, mostramos el formulario correspondiente
			if (!$_POST)
			{
				// Se muestra el formulario con los valores actuales
				$prof_titulacion = new PROF_TITULACION_Model($_REQUEST['dni'],$_REQUEST['CODTitulacion'],'');
				$valores = $prof_titulacion->RellenaDatos();
				new PROF_TITULACION_DELETE($valores);
			}
			else
			{
				// Eliminamos los datos de la BD
				$prof_titulacion = get_data_form();
				$respuesta = $prof_titulacion->DELETE();
				// Mostramos un mensaje con la respuesta
				new MESSAGE($respuesta, '../Controller/PROF_TITULACION_Controller.php');
			}
			break;
		// Acción: Editar
		case 'EDIT':
			// Si no hay datos, mostramos el formulario correspondiente
			if (!$_POST)
			{
				// Se muestra el formulario con los valores actuales
				$prof_titulacion = new PROF_TITULACION_Model($_REQUEST['dni'],$_REQUEST['CODTitulacion'],'');
				$valores = $prof_titulacion->RellenaDatos();
				// Si no hay error, mostramos el formulario con los datos
				if (is_array($valores))
				{
					new PROF_TITULACION_EDIT($valores);
				}
				else
				{
					// Sino, mostramos un mensaje de error
					new MESSAGE($valores, '../Controller/PROF_TITULACION_Controller.php');
				}
			}
			else
			{
				// Editamos los datos de la BD
				$prof_titulacion = get_data_form();
				$respuesta = $prof_titulacion->EDIT();
				// Mostramos un mensaje con la respuesta
				new MESSAGE($respuesta, '../Controller/PROF_TITULACION_Controller.php');
			}
			break;
		// Acción: Buscar
		case 'SEARCH':
			if (!$_POST)
			{
				new PROF_TITULACION_SEARCH();
			}
			else
			{
				// Filtramos los resultados de la BD
				$prof_titulacion = get_data_form();
				$datos = $prof_titulacion->SEARCH();
				// Claves de la tabla
				$lista = array('DNI','CODTITULACION','ANHOACADEMICO');
				// Mostramos la vista correspondiente
				new PROF_TITULACION_SHOWALL($lista, $datos, '../index.php');
			}
			break;
		// Acción: Detallar
		case 'SHOWCURRENT':
			// Creamos una instancia de la entidad con la clave primaria del registro que deseemos ver
			$prof_titulacion = new PROF_TITULACION_Model($_REQUEST['dni'],$_REQUEST['CODTitulacion'],'');
			$valores = $prof_titulacion->RellenaDatos();
			// Mostramos la vista correspondiente
			new PROF_TITULACION_SHOWCURRENT($valores);
			break;
		// Acción: Mostrar todos
		default:
			// Si no hay datos, creamos una nueva instancia de la entidad
			if (!$_POST)
			{
				$prof_titulacion = new PROF_TITULACION_Model('','','');
			}
			else
			{
				// Sino, usamos los datos recibidos
				$prof_titulacion = get_data_form();
			}
			// Obtenemos la BD
			$datos = $prof_titulacion->SEARCH();
			$lista = array('DNI','CODTITULACION','ANHOACADEMICO');
			new PROF_TITULACION_SHOWALL($lista, $datos);
	}
?>
