
<?php

	session_start(); //solicito trabajar con la session

	include '../Functions/Authentication.php';

	if (!IsAuthenticated()){
		header('Location:../index.php');
	}

	include '../Model/PROF_ESPACIO_Model.php';
	include '../View/PROF_ESPACIO_ADD_View.php';
	include '../View/PROF_ESPACIO_EDIT_View.php';
	include '../View/PROF_ESPACIO_DELETE_View.php';
	include '../View/PROF_ESPACIO_SEARCH_View.php';
	include '../View/PROF_ESPACIO_SHOWALL_View.php';
	include '../View/PROF_ESPACIO_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia CENTRO y la devuelve
	function get_data_form(){
		$dni = $_POST['dni'];
		$CODEspacio = $_POST['CODEspacio'];
		
		$prof_espacio = new PROF_ESPACIO_Model($dni,$CODEspacio);
		return $prof_espacio;
	}

	
// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // se incoca la vista de add de CENTRO
					new PROF_ESPACIO_ADD();
				}
				else{
					$prof_espacio = get_data_form(); //se recogen los datos del formulario
					$respuesta = $prof_espacio->ADD();
					new MESSAGE($respuesta, '../Controller/PROF_ESPACIO_Controller.php');
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$prof_espacio = new PROF_ESPACIO_Model($_REQUEST['dni'],'');
					$valores = $prof_espacio->RellenaDatos();
					new PROF_ESPACIO_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$prof_espacio = get_data_form();
					$respuesta = $prof_espacio->DELETE();
					new MESSAGE($respuesta, '../Controller/PROF_ESPACIO_Controller.php');
				}
				break;
			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$prof_espacio = new PROF_ESPACIO_Model($_REQUEST['dni'],''); // Creo el objeto
					$valores = $prof_espacio->RellenaDatos(); // obtengo todos los datos de la tupla
					if (is_array($valores))
					{
						new PROF_ESPACIO_EDIT($valores); //invoco la vista de edit con los datos 
							//precargados
					}else
					{
						new MESSAGE($valores, '../Controller/PROF_ESPACIO_Controller.php');
					}
				}
				else{

					$prof_espacio = get_data_form(); //recojo los valores del formulario

					$respuesta = $prof_espacio->EDIT(); // update en la bd en la bd
					new MESSAGE($respuesta, '../Controller/PROF_ESPACIO_Controller.php');
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					new PROF_ESPACIO_SEARCH();
				}
				else{
					$prof_espacio = get_data_form();
					$datos = $prof_espacio->SEARCH();

					$lista = array('DNI','CODESPACIO');

					new PROF_ESPACIO_SHOWALL($lista, $datos, '../index.php');
				}
				break;
			case 'SHOWCURRENT':
				$prof_espacio = new PROF_ESPACIO_Model($_REQUEST['dni'],'');
				$valores = $prof_espacio->RellenaDatos();
				new PROF_ESPACIO_SHOWCURRENT($valores);
				break;
			default:
				if (!$_POST){
					$prof_espacio = new PROF_ESPACIO_Model('','');
				}
				else{
					$prof_espacio = get_data_form();
				}
				$datos = $prof_espacio->SEARCH();
				$lista = array('DNI','CODESPACIO');
				new PROF_ESPACIO_SHOWALL($lista, $datos);
		}

?>
