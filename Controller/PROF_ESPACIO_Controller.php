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
	include '../Model/PROF_ESPACIO_Model.php';
	include '../View/PROF_ESPACIO_ADD_View.php';
	include '../View/PROF_ESPACIO_EDIT_View.php';
	include '../View/PROF_ESPACIO_DELETE_View.php';
	include '../View/PROF_ESPACIO_SEARCH_View.php';
	include '../View/PROF_ESPACIO_SHOWALL_View.php';
	include '../View/PROF_ESPACIO_SHOWCURRENT_View.php';

	// Añadimos la vista de los mensajes
	include '../View/MESSAGE_View.php';

	/**
	 * Recoge los valores POST y crea una instancia de la entidad
	 * 
	 * @return prof_espacio Instancia de la entidad
	 */
	function get_data_form()
	{
		// Valores POST
		$dni = $_POST['dni'];
		$CODEspacio = $_POST['CODEspacio'];
		
		// Creación de la instancia CENTRO
		$prof_espacio = new PROF_ESPACIO_Model($dni,$CODEspacio);
		return $prof_espacio;
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
				new PROF_ESPACIO_ADD();
			}
			else
			{
				// Recogemos los datos del formulario y los añadimos a la BD
				$prof_espacio = get_data_form();
				$respuesta = $prof_espacio->ADD();
				// Mostramos un mensaje con la respuesta
				new MESSAGE($respuesta, '../Controller/PROF_ESPACIO_Controller.php');
			}
			break;
		// Acción: Borrar
		case 'DELETE':
			// Si no hay datos, mostramos el formulario correspondiente
			if (!$_POST)
			{
				// Se muestra el formulario con los valores actuales
				$prof_espacio = new PROF_ESPACIO_Model($_REQUEST['dni'],$_REQUEST['CODEspacio']);
				$valores = $prof_espacio->RellenaDatos();
				new PROF_ESPACIO_DELETE($valores);
			}
			else
			{
				// Eliminamos los datos de la BD
				$prof_espacio = get_data_form();
				$respuesta = $prof_espacio->DELETE();
				// Mostramos un mensaje con la respuesta
				new MESSAGE($respuesta, '../Controller/PROF_ESPACIO_Controller.php');
			}
			break;
		case 'EDIT':
			// Acción: Editar
			if (!$_POST)
			{
				// Se muestra el formulario con los valores actuales
				$prof_espacio = new PROF_ESPACIO_Model($_REQUEST['dni'],$_REQUEST['CODEspacio']);
				$valores = $prof_espacio->RellenaDatos();
				// Si no hay error, mostramos el formulario con los datos
				if (is_array($valores))
				{
					new PROF_ESPACIO_EDIT($valores);
				}
				else
				{
					// Sino, mostramos un mensaje de error
					new MESSAGE($valores, '../Controller/PROF_ESPACIO_Controller.php');
				}
			}
			else
			{
				// Editamos los datos de la BD
				$prof_espacio = get_data_form();
				$respuesta = $prof_espacio->EDIT();
				// Mostramos un mensaje con la respuesta
				new MESSAGE($respuesta, '../Controller/PROF_ESPACIO_Controller.php');
			}
			break;
		// Acción: Buscar
		case 'SEARCH':
			// Si no hay datos, mostramos el formulario correspondiente
			if (!$_POST)
			{
				new PROF_ESPACIO_SEARCH();
			}
			else
			{
				// Filtramos los resultados de la BD
				$prof_espacio = get_data_form();
				$datos = $prof_espacio->SEARCH();
				// Claves de la tabla
				$lista = array('DNI','CODESPACIO');
				// Mostramos la vista correspondiente
				new PROF_ESPACIO_SHOWALL($lista, $datos, '../index.php');
			}
			break;
		// Acción: Detallar
		case 'SHOWCURRENT':
			// Creamos una instancia de la entidad con la clave primaria del registro que deseemos ver
			$prof_espacio = new PROF_ESPACIO_Model($_REQUEST['dni'],$_REQUEST['CODEspacio']);
			$valores = $prof_espacio->RellenaDatos();
			// Mostramos la vista correspondiente
			new PROF_ESPACIO_SHOWCURRENT($valores);
			break;
		// Acción: Mostrar todos
		default:
			// Si no hay datos, creamos una nueva instancia de la entidad
			if (!$_POST)
			{
				$prof_espacio = new PROF_ESPACIO_Model('','');
			}
			else
			{
				// Sino, usamos los datos recibidos
				$prof_espacio = get_data_form();
			}
			// Obtenemos la BD
			$datos = $prof_espacio->SEARCH();
			$lista = array('DNI','CODESPACIO');
			new PROF_ESPACIO_SHOWALL($lista, $datos);
	}
?>
