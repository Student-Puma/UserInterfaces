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
	include '../Model/PROFESOR_Model.php';
	include '../View/PROFESOR_ADD_View.php';
	include '../View/PROFESOR_EDIT_View.php';
	include '../View/PROFESOR_DELETE_View.php';
	include '../View/PROFESOR_SEARCH_View.php';
	include '../View/PROFESOR_SHOWALL_View.php';
	include '../View/PROFESOR_SHOWCURRENT_View.php';
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
		$dni = $_POST['dni'];
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$area = $_POST['area'];
		$departamento = $_POST['departamento'];
		$action = $_POST['action'];
		
		// Creación de la instancia PROFESOR
		$profesor = new PROFESOR_Model($dni,$nombre,$apellidos,$area,$departamento);
		return $profesor;
	}

	// Comprobamos que exista la el valor 'action'
	if (!isset($_REQUEST['action']))
	{
		$_REQUEST['action'] = '';
	}

	// Ejecutamos la acción deseada
	Switch ($_REQUEST['action']){
		// Acción: Añadir
		case 'ADD':
			// Si no hay datos, mostramos el formulario correspondiente
			if (!$_POST)
			{
				new PROFESOR_ADD();
			}
			else
			{
				// Recogemos los datos del formulario y los añadimos a la BD
				$PROFESOR = get_data_form();
				$respuesta = $PROFESOR->ADD();
				new MESSAGE($respuesta, '../Controller/PROFESOR_Controller.php');
			}
			break;
		// Acción: Borrar
		case 'DELETE':
			// Si no hay datos, mostramos el formulario correspondiente
			if (!$_POST)
			{
				// Se muestra el formulario con los valores actuales
				$PROFESOR = new PROFESOR_Model($_REQUEST['dni'],'','','','');
				$valores = $PROFESOR->RellenaDatos();
				new PROFESOR_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
			}
			else
			{
				// Eliminamos los datos de la BD
				$PROFESOR = get_data_form();
				$respuesta = $PROFESOR->DELETE();
				// Mostramos un mensaje con la respuesta
				new MESSAGE($respuesta, '../Controller/PROFESOR_Controller.php');
			}
			break;
		// Acción: Editar
		case 'EDIT':
			// Si no hay datos, mostramos el formulario correspondiente
			if (!$_POST)
			{
				// Se muestra el formulario con los valores actuales
				$PROFESOR = new PROFESOR_Model($_REQUEST['dni'],'','','','');
				$valores = $PROFESOR->RellenaDatos();
				// Si no hay error, mostramos el formulario con los datos
				if (is_array($valores))
				{
					new PROFESOR_EDIT($valores);
				}
				else
				{
					// Sino, mostramos un mensaje de error
					new MESSAGE($valores, '../Controller/PROFESOR_Controller.php');
				}
			}
			else
			{
				// Editamos los datos de la BD
				$PROFESOR = get_data_form();
				$respuesta = $PROFESOR->EDIT();
				// Mostramos un mensaje con la respuesta
				new MESSAGE($respuesta, '../Controller/PROFESOR_Controller.php');
			}
			break;
		// Acción: Buscar
		case 'SEARCH':
			// Si no hay datos, mostramos el formulario correspondiente
			if (!$_POST)
			{
				new PROFESOR_SEARCH();
			}
			else
			{
				// Filtramos los resultados de la BD
				$PROFESOR = get_data_form();
				$datos = $PROFESOR->SEARCH();
				// Claves de la tabla
				$lista = array('DNI','NOMBREPROFESOR','APELLIDOSPROFESOR','AREAPROFESOR','DEPARTAMENTOPROFESOR');
				// Mostramos la vista correspondiente
				new PROFESOR_SHOWALL($lista, $datos, '../index.php');
			}
			break;
		// Acción: Detallar
		case 'SHOWCURRENT':
			// Creamos una instancia de la entidad con la clave primaria del registro que deseemos ver
			$PROFESOR = new PROFESOR_Model($_REQUEST['dni'],'','','','');
			$valores = $PROFESOR->RellenaDatos();
			// Mostramos la vista correspondiente
			new PROFESOR_SHOWCURRENT($valores);
			break;
		// Acción: Mostrar todos
		default:
			// Si no hay datos, creamos una nueva instancia de la entidad
			if (!$_POST)
			{
				$PROFESOR = new PROFESOR_Model('','','','','');
			}
			else
			{
				// Sino, usamos los datos recibidos
				$PROFESOR = get_data_form();
			}
			// Obtenemos la BD
			$datos = $PROFESOR->SEARCH();
			$lista = array('DNI','NOMBREPROFESOR','APELLIDOSPROFESOR','AREAPROFESOR','DEPARTAMENTOPROFESOR');
			new PROFESOR_SHOWALL($lista, $datos);
	}
?>
