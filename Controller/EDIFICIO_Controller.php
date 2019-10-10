
<?php

	session_start(); //solicito trabajar con la session

	include '../Functions/Authentication.php';

	if (!IsAuthenticated()){
		header('Location:../index.php');
	}

	include '../Model/EDIFICIO_Model.php';
	include '../View/EDIFICIO_ADD_View.php';
	include '../View/EDIFICIO_EDIT_View.php';
	include '../View/EDIFICIO_DELETE_View.php';
	include '../View/EDIFICIO_SEARCH_View.php';
	include '../View/EDIFICIO_SHOWALL_View.php';
	include '../View/EDIFICIO_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia CENTRO y la devuelve
	function get_data_form(){
		$CODEdificio = $_POST['CODEdificio'];
		$nombre = $_POST['nombre'];
		$direccion = $_POST['direccion'];
		$campus = $_POST['campus'];
		$action = $_POST['action'];
		
		$edificio = new EDIFICIO_Model($CODEdificio,$nombre,$direccion,$campus);
		return $edificio;
	}

	
// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // se incoca la vista de add de CENTRO
					new EDIFICIO_ADD();
				}
				else{
					$EDIFICIO = get_data_form(); //se recogen los datos del formulario
					$respuesta = $EDIFICIO->ADD();
					new MESSAGE($respuesta, '../Controller/EDIFICIO_Controller.php');
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$EDIFICIO = new EDIFICIO_Model($_REQUEST['CODEdificio'],'','','');
					$valores = $EDIFICIO->RellenaDatos();
					new EDIFICIO_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$EDIFICIO = get_data_form();
					$respuesta = $EDIFICIO->DELETE();
					new MESSAGE($respuesta, '../Controller/EDIFICIO_Controller.php');
				}
				break;
			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$EDIFICIO = new EDIFICIO_Model($_REQUEST['CODEdificio'],'','',''); // Creo el objeto
					$valores = $EDIFICIO->RellenaDatos(); // obtengo todos los datos de la tupla
					if (is_array($valores))
					{
						new EDIFICIO_EDIT($valores); //invoco la vista de edit con los datos 
							//precargados
					}else
					{
						new MESSAGE($valores, '../Controller/EDIFICIO_Controller.php');
					}
				}
				else{

					$EDIFICIO = get_data_form(); //recojo los valores del formulario

					$respuesta = $EDIFICIO->EDIT(); // update en la bd en la bd
					new MESSAGE($respuesta, '../Controller/EDIFICIO_Controller.php');
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					new EDIFICIO_SEARCH();
				}
				else{
					$EDIFICIO = get_data_form();
					$datos = $EDIFICIO->SEARCH();

					$lista = array('CODEDIFICIO','NOMBREEDIFICIO','DIRECCIONEDIFICIO','CAMPUSEDIFICIO');

					new EDIFICIO_SHOWALL($lista, $datos, '../index.php');
				}
				break;
			case 'SHOWCURRENT':
				$EDIFICIO = new EDIFICIO_Model($_REQUEST['CODEdificio'],'','','');
				$valores = $EDIFICIO->RellenaDatos();
				new EDIFICIO_SHOWCURRENT($valores);
				break;
			default:
				if (!$_POST){
					$EDIFICIO = new EDIFICIO_Model('','','','','');
				}
				else{
					$EDIFICIO = get_data_form();
				}
				$datos = $EDIFICIO->SEARCH();
				$lista = array('CODEDIFICIO','NOMBREEDIFICIO','DIRECCIONEDIFICIO','CAMPUSEDIFICIO');
				new EDIFICIO_SHOWALL($lista, $datos);
		}

?>
