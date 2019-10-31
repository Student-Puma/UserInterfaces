<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
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
	include '../Model/ESPACIO_Model.php';
	include '../View/ESPACIO_ADD_View.php';
	include '../View/ESPACIO_EDIT_View.php';
	include '../View/ESPACIO_DELETE_View.php';
	include '../View/ESPACIO_SEARCH_View.php';
	include '../View/ESPACIO_SHOWALL_View.php';
	include '../View/ESPACIO_SHOWCURRENT_View.php';

	// Añadimos la vista de los mensajes
	include '../View/MESSAGE_View.php';

	/**
	 * Recoge los valores POST y crea una instancia de la entidad
	 * 
	 * @return espacio Instancia de la entidad
	 */
	function get_data_form()
	{
		// Valores POST
		$CODEspacio = $_POST['CODEspacio'];
		$CODEdificio = $_POST['CODEdificio'];
		$CODCentro = $_POST['CODCentro'];
		$tipo = $_POST['tipo'];
		$superficie = $_POST['superficie'];
		$numinventario = $_POST['numinventario'];
		
		// Creación de la instancia ESPACIO
		$espacio = new ESPACIO_Model($CODEspacio,$CODEdificio,$CODCentro,$tipo,$superficie,$numinventario);
		return $espacio;
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
				new ESPACIO_ADD();
			}
			else
			{
				// Recogemos los datos del formulario y los añadimos a la BD
				$ESPACIO = get_data_form();
				$respuesta = $ESPACIO->ADD();
				// Mostramos un mensaje con la respuesta
				new MESSAGE($respuesta, '../Controller/ESPACIO_Controller.php');
			}
			break;
		// Acción: Borrar
		case 'DELETE':
			// Si no hay datos, mostramos el formulario correspondiente
			if (!$_POST)
			{
				// Se muestra el formulario con los valores actuales
				$ESPACIO = new ESPACIO_Model($_REQUEST['CODEspacio'],'','','','','');
				$valores = $ESPACIO->RellenaDatos();
				new ESPACIO_DELETE($valores);
			}
			else
			{
				// Eliminamos los datos de la BD
				$ESPACIO = get_data_form();
				$respuesta = $ESPACIO->DELETE();
				// Mostramos un mensaje con la respuesta
				new MESSAGE($respuesta, '../Controller/ESPACIO_Controller.php');
			}
			break;
		// Acción: Editar
		case 'EDIT':
			// Si no hay datos, mostramos el formulario correspondiente
			if (!$_POST)
			{
				$ESPACIO = new ESPACIO_Model($_REQUEST['CODEspacio'],'','','','','');
				$valores = $ESPACIO->RellenaDatos();
				// Si no hay error, mostramos el formulario con los datos
				if (is_array($valores))
				{
					new ESPACIO_EDIT($valores);
				}
				else
				{
					// Sino, mostramos un mensaje de error
					new MESSAGE($valores, '../Controller/ESPACIO_Controller.php');
				}
			}
			else
			{
				// Editamos los datos de la BD
				$ESPACIO = get_data_form();
				// Mostramos un mensaje con la respuesta
				$respuesta = $ESPACIO->EDIT();
				new MESSAGE($respuesta, '../Controller/ESPACIO_Controller.php');
			}
			break;
		// Acción: Buscar
		case 'SEARCH':
			// Si no hay datos, mostramos el formulario correspondiente
			if (!$_POST)
			{
				new ESPACIO_SEARCH();
			}
			else
			{
				// Filtramos los resultados de la BD
				$ESPACIO = get_data_form();
				$datos = $ESPACIO->SEARCH();
				// Claves de la tabla
				$lista = array('CODESPACIO','CODEDIFICIO','CODCENTRO','TIPO','SUPERFICIEESPACIO','NUMINVENTARIOESPACIO');
				// Mostramos la vista correspondiente
				new ESPACIO_SHOWALL($lista, $datos, '../index.php');
			}
			break;
		// Acción: Detallar
		case 'SHOWCURRENT':
			// Creamos una instancia de la entidad con la clave primaria del registro que deseemos ver
			$ESPACIO = new ESPACIO_Model($_REQUEST['CODEspacio'],'','','','','');
			$valores = $ESPACIO->RellenaDatos();
			// Mostramos la vista correspondiente
			new ESPACIO_SHOWCURRENT($valores);
			break;
		// Acción: Mostrar todos
		default:
			// Si no hay datos, creamos una nueva instancia de la entidad
			if (!$_POST)
			{
				$ESPACIO = new ESPACIO_Model('','','','','','');
			}
			else
			{
				// Sino, usamos los datos recibidos
				$ESPACIO = get_data_form();
			}
			// Obtenemos la BD
			$datos = $ESPACIO->SEARCH();
			$lista = array('CODESPACIO','CODEDIFICIO','CODCENTRO','TIPO','SUPERFICIEESPACIO','NUMINVENTARIOESPACIO');
			new ESPACIO_SHOWALL($lista, $datos);
	}
?>
