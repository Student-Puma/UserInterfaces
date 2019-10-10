
<?php

	session_start(); //solicito trabajar con la session

	include '../Functions/Authentication.php';

	if (!IsAuthenticated()){
		header('Location:../index.php');
	}

	include '../Model/CENTRO_Model.php';
	include '../View/CENTRO_ADD_View.php';
	include '../View/CENTRO_EDIT_View.php';
	include '../View/CENTRO_DELETE_View.php';
	include '../View/CENTRO_SEARCH_View.php';
	include '../View/CENTRO_SHOWALL_View.php';
	include '../View/CENTRO_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia CENTRO y la devuelve
	function get_data_form(){

		$CODCentro = $_POST['CODCentro'];
		$CODEdificio = $_POST['CODEdificio'];
		$nombre = $_POST['nombre'];
		$direccion = $_POST['direccion'];
		$responsable = $_POST['responsable'];
		$action = $_POST['action'];

		
		$centro = new CENTRO_Model($CODCentro,$CODEdificio,$nombre,$direccion,$responsable);
		return $centro;
	}

	
// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // se incoca la vista de add de CENTRO
					new CENTRO_ADD();
				}
				else{
					$CENTRO = get_data_form(); //se recogen los datos del formulario
					$respuesta = $CENTRO->ADD();
					new MESSAGE($respuesta, '../Controller/CENTRO_Controller.php');
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$CENTRO = new CENTRO_Model($_REQUEST['CODCentro'],'','','','');
					$valores = $CENTRO->RellenaDatos();
					new CENTRO_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$CENTRO = get_data_form();
					$respuesta = $CENTRO->DELETE();
					new MESSAGE($respuesta, '../Controller/CENTRO_Controller.php');
				}
				break;
			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$CENTRO = new CENTRO_Model($_REQUEST['CODCentro'],'','','',''); // Creo el objeto
					$valores = $CENTRO->RellenaDatos(); // obtengo todos los datos de la tupla
					if (is_array($valores))
					{
						new CENTRO_EDIT($valores); //invoco la vista de edit con los datos 
							//precargados
					}else
					{
						new MESSAGE($valores, '../Controller/CENTRO_Controller.php');
					}
				}
				else{

					$CENTRO = get_data_form(); //recojo los valores del formulario

					$respuesta = $CENTRO->EDIT(); // update en la bd en la bd
					new MESSAGE($respuesta, '../Controller/CENTRO_Controller.php');
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					new CENTRO_SEARCH();
				}
				else{
					$CENTRO = get_data_form();
					$datos = $CENTRO->SEARCH();

					$lista = array('CODCENTRO','CODEDIFICIO','NOMBRECENTRO','DIRECCIONCENTRO','RESPONSABLECENTRO');

					new CENTRO_SHOWALL($lista, $datos, '../index.php');
				}
				break;
			case 'SHOWCURRENT':
				$CENTRO = new CENTRO_Model($_REQUEST['CODCentro'],'','','','');
				$valores = $CENTRO->RellenaDatos();
				new CENTRO_SHOWCURRENT($valores);
				break;
			default:
				if (!$_POST){
					$CENTRO = new CENTRO_Model('','','','','');
				}
				else{
					$CENTRO = get_data_form();
				}
				$datos = $CENTRO->SEARCH();
				$lista = array('CODCENTRO','CODEDIFICIO','NOMBRECENTRO','DIRECCIONCENTRO','RESPONSABLECENTRO');
				new CENTRO_SHOWALL($lista, $datos);
		}

?>
