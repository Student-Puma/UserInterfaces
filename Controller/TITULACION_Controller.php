<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 11/01/2019
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
	include '../Model/TITULACION_Model.php';
	include '../View/TITULACION_ADD_View.php';
	include '../View/TITULACION_EDIT_View.php';
	include '../View/TITULACION_DELETE_View.php';
	include '../View/TITULACION_SEARCH_View.php';
	include '../View/TITULACION_SHOWALL_View.php';
	include '../View/TITULACION_SHOWCURRENT_View.php';

	// Añadimos la vista de los mensajes
	include '../View/MESSAGE_View.php';

	/**
	 * Recoge los valores POST y crea una instancia de la entidad
	 * 
	 * @return titulacion Instancia de la entidad
	 */
	function get_data_form()
	{
		// Valores POST
		$CODTitulacion = $_POST['CODTitulacion'];
		$CODCentro = $_POST['CODCentro'];
		$nombre = $_POST['nombre'];
		$responsable = $_POST['responsable'];
		$action = $_POST['action'];
		
		// Creación de la instancia TITULACION
		$titulacion = new TITULACION_Model($CODTitulacion,$CODCentro,$nombre,$responsable);
		return $titulacion;
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
				new TITULACION_ADD();
			}
			else
			{
				// Recogemos los datos del formulario y los añadimos a la BD
				$TITULACION = get_data_form();
				$respuesta = $TITULACION->ADD();
				// Mostramos un mensaje con la respuesta
				new MESSAGE($respuesta, '../Controller/TITULACION_Controller.php');
			}
			break;
		// Acción: Borrar
		case 'DELETE':
			// Si no hay datos, mostramos el formulario correspondiente
			if (!$_POST)
			{
				$TITULACION = new TITULACION_Model($_REQUEST['CODTitulacion'],'','','');
				$valores = $TITULACION->RellenaDatos();
				new TITULACION_DELETE($valores);
			}
			else
			{
				// Se muestra el formulario con los valores actuales
				$TITULACION = get_data_form();
				$respuesta = $TITULACION->DELETE();
				// Mostramos un mensaje con la respuesta
				new MESSAGE($respuesta, '../Controller/TITULACION_Controller.php');
			}
			break;
		// Acción: Editar
		case 'EDIT':
			// Si no hay datos, mostramos el formulario correspondiente
			if (!$_POST)
			{
				// Se muestra el formulario con los valores actuales
				$TITULACION = new TITULACION_Model($_REQUEST['CODTitulacion'],'','','');
				$valores = $TITULACION->RellenaDatos();
				// Si no hay error, mostramos el formulario con los datos
				if (is_array($valores))
				{
					new TITULACION_EDIT($valores);
				}
				else
				{
					// Sino, mostramos un mensaje de error
					new MESSAGE($valores, '../Controller/TITULACION_Controller.php');
				}
			}
			else
			{
				// Editamos los datos de la BD
				$TITULACION = get_data_form();
				$respuesta = $TITULACION->EDIT();
				// Mostramos un mensaje con la respuesta
				new MESSAGE($respuesta, '../Controller/TITULACION_Controller.php');
			}
			break;
		// Acción: Buscar
		case 'SEARCH':
			// Si no hay datos, mostramos el formulario correspondiente
			if (!$_POST)
			{
				new TITULACION_SEARCH();
			}
			else
			{
				// Filtramos los resultados de la BD
				$TITULACION = get_data_form();
				$datos = $TITULACION->SEARCH();
				// Claves de la tabla
				$lista = array('CODTITULACION','CODCENTRO','NOMBRETITULACION','RESPONSABLETITULACION');
				// Mostramos la vista correspondiente
				new TITULACION_SHOWALL($lista, $datos, '../index.php');
			}
			break;
		// Acción: Detallar
		case 'SHOWCURRENT':
			// Creamos una instancia de la entidad con la clave primaria del registro que deseemos ver
			$TITULACION = new TITULACION_Model($_REQUEST['CODTitulacion'],'','','');
			$valores = $TITULACION->RellenaDatos();
			// Mostramos la vista correspondiente
			new TITULACION_SHOWCURRENT($valores);
			break;
		// Acción: Mostrar todos
		default:
			// Si no hay datos, creamos una nueva instancia de la entidad
			if (!$_POST)
			{
				// Sino, usamos los datos recibidos
				$TITULACION = new TITULACION_Model('','','','');
			}
			else
			{
				$TITULACION = get_data_form();
			}
			// Obtenemos la BD
			$datos = $TITULACION->SEARCH();
			$lista = array('CODTITULACION','CODCENTRO','NOMBRETITULACION','RESPONSABLETITULACION');
			new TITULACION_SHOWALL($lista, $datos);
	}
?>
