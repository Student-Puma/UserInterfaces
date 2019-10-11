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
	include '../Model/USUARIOS_Model.php';
	include '../View/USUARIOS_SHOWALL_View.php';
	include '../View/USUARIOS_SEARCH_View.php';
	include '../View/USUARIOS_ADD_View.php';
	include '../View/USUARIOS_EDIT_View.php';
	include '../View/USUARIOS_DELETE_View.php';
	include '../View/USUARIOS_SHOWCURRENT_View.php';

	// Añadimos la vista de los mensajes
	include '../View/MESSAGE_View.php';

	/**
	 * Recoge los valores POST y crea una instancia de la entidad
	 * 
	 * @return usuarios Instancia de la entidad
	 */
	function get_data_form()
	{
		// Valores POST
		$login = $_POST['login'];
		$password = $_POST['password'];
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$email = $_POST['email'];
		$action = $_POST['action'];

		// Creación de la instancia USUARIOS
		$usuarios = new USUARIOS_Model($login,$password,$nombre,$apellidos,$email);
		return $usuarios;
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
				new USUARIOS_ADD();
			}
			else
			{
				// Recogemos los datos del formulario y los añadimos a la BD
				$USUARIOS = get_data_form();
				$respuesta = $USUARIOS->ADD();
				// Mostramos un mensaje con la respuesta
				new MESSAGE($respuesta, '../Controller/USUARIOS_Controller.php');
			}
			break;
		// Acción: Borrar
		case 'DELETE':
			// Si no hay datos, mostramos el formulario correspondiente
			if (!$_POST)
			{
				// Se muestra el formulario con los valores actuales
				$USUARIOS = new USUARIOS_Model($_REQUEST['login'],'','','','');
				$valores = $USUARIOS->RellenaDatos();
				new USUARIOS_DELETE($valores);
			}
			else
			{
				// Eliminamos los datos de la BD
				$USUARIOS = get_data_form();
				$respuesta = $USUARIOS->DELETE();
				// Mostramos un mensaje con la respuesta
				new MESSAGE($respuesta, '../Controller/USUARIOS_Controller.php');
			}
			break;
		// Acción: Editar
		case 'EDIT':
			// Si no hay datos, mostramos el formulario correspondiente
			if (!$_POST)
			{
				// Se muestra el formulario con los valores actuales
				$USUARIOS = new USUARIOS_Model($_REQUEST['login'],'','','','');
				$valores = $USUARIOS->RellenaDatos();
				// Si no hay error, mostramos el formulario con los datos
				if (is_array($valores))
				{
					new USUARIOS_EDIT($valores);
				}
				else
				{
					// Sino, mostramos un mensaje de error
					new MESSAGE($valores, '../Controller/USUARIOS_Controller.php');
				}
			}
			else
			{
				// Editamos los datos de la BD
				$USUARIOS = get_data_form();
				// Mostramos un mensaje con la respuesta
				$respuesta = $USUARIOS->EDIT();
				new MESSAGE($respuesta, '../Controller/USUARIOS_Controller.php');
			}
			break;
		// Acción: Buscar
		case 'SEARCH':
			// Si no hay datos, mostramos el formulario correspondiente
			if (!$_POST)
			{
				new USUARIOS_SEARCH();
			}
			else
			{
				// Filtramos los resultados de la BD
				$USUARIOS = get_data_form();
				$datos = $USUARIOS->SEARCH();
				// Claves de la tabla
				$lista = array('login','password','email', 'nombre', 'apellidos');
				// Mostramos la vista correspondiente
				new USUARIOS_SHOWALL($lista, $datos, '../index.php');
			}
			break;
		// Acción: Detallar
		case 'SHOWCURRENT':
			// Creamos una instancia de la entidad con la clave primaria del registro que deseemos ver
			$USUARIOS = new USUARIOS_Model($_REQUEST['login'],'','','','');
			$valores = $USUARIOS->RellenaDatos();
			// Mostramos la vista correspondiente
			new USUARIOS_SHOWCURRENT($valores);
			break;
		// Acción: Mostrar todos
		default:
			// Si no hay datos, creamos una nueva instancia de la entidad
			if (!$_POST)
			{
				$USUARIOS = new USUARIOS_Model('','','','','');
			}
			else
			{
				// Sino, usamos los datos recibidos
				$USUARIOS = get_data_form();
			}
			// Obtenemos la BD
			$datos = $USUARIOS->SEARCH();
			$lista = array('login','password','nombre','apellidos','email');
			new USUARIOS_SHOWALL($lista, $datos);
	}
?>
