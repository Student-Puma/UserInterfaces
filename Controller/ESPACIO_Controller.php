
<?php

	session_start(); //solicito trabajar con la session

	include '../Functions/Authentication.php';

	if (!IsAuthenticated()){
		header('Location:../index.php');
	}

	include '../Model/ESPACIO_Model.php';
	include '../View/ESPACIO_ADD_View.php';
	include '../View/ESPACIO_EDIT_View.php';
	include '../View/ESPACIO_DELETE_View.php';
	include '../View/ESPACIO_SEARCH_View.php';
	include '../View/ESPACIO_SHOWALL_View.php';
	include '../View/ESPACIO_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia CENTRO y la devuelve
	function get_data_form(){
		$CODEspacio = $_POST['CODEspacio'];
		$CODEdifcio = $_POST['CODEdifcio'];
		$CODCentro = $_POST['CODCentro'];
		$tipo = $_POST['tipo'];
		$superficie = $_POST['superficie'];
		$numinventario = $_POST['numinventario'];
				
		$espacio = new ESPACIO_Model($CODEspacio,$CODEdifcio,$CODCentro,$tipo,$superficie,$numinventario);
		return $espacio;
	}

	
// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // se incoca la vista de add de CENTRO
					new ESPACIO_ADD();
				}
				else{
					$ESPACIO = get_data_form(); //se recogen los datos del formulario
					$respuesta = $ESPACIO->ADD();
					new MESSAGE($respuesta, '../Controller/ESPACIO_Controller.php');
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$ESPACIO = new ESPACIO_Model($_REQUEST['CODEspacio'],'','','','','');
					$valores = $ESPACIO->RellenaDatos();
					new ESPACIO_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$ESPACIO = get_data_form();
					$respuesta = $ESPACIO->DELETE();
					new MESSAGE($respuesta, '../Controller/ESPACIO_Controller.php');
				}
				break;
			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$ESPACIO = new ESPACIO_Model($_REQUEST['CODEspacio'],'','','','','');
					$valores = $ESPACIO->RellenaDatos(); // obtengo todos los datos de la tupla
					if (is_array($valores))
					{
						new ESPACIO_EDIT($valores); //invoco la vista de edit con los datos 
							//precargados
					}else
					{
						new MESSAGE($valores, '../Controller/ESPACIO_Controller.php');
					}
				}
				else{

					$ESPACIO = get_data_form(); //recojo los valores del formulario

					$respuesta = $ESPACIO->EDIT(); // update en la bd en la bd
					new MESSAGE($respuesta, '../Controller/ESPACIO_Controller.php');
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					new ESPACIO_SEARCH();
				}
				else{
					$ESPACIO = get_data_form();
					$datos = $ESPACIO->SEARCH();

					$lista = array('CODESPACIO','CODEDIFICIO','CODCENTRO','TIPO','SUPERFICIEESPACIO','NUMINVENTARIOESPACIO');

					new ESPACIO_SHOWALL($lista, $datos, '../index.php');
				}
				break;
			case 'SHOWCURRENT':
				$ESPACIO = new ESPACIO_Model($_REQUEST['CODEspacio'],'','','','','');
				$valores = $ESPACIO->RellenaDatos();
				new ESPACIO_SHOWCURRENT($valores);
				break;
			default:
				if (!$_POST){
					$ESPACIO = new ESPACIO_Model('','','','','','');
				}
				else{
					$ESPACIO = get_data_form();
				}
				$datos = $ESPACIO->SEARCH();
				$lista = array('CODESPACIO','CODEDIFICIO','CODCENTRO','TIPO','SUPERFICIEESPACIO','NUMINVENTARIOESPACIO');
				new ESPACIO_SHOWALL($lista, $datos);
		}

?>
