
<?php

	session_start(); //solicito trabajar con la session

	include '../Functions/Authentication.php';

	if (!IsAuthenticated()){
		header('Location:../index.php');
	}

	include '../Model/PROFESOR_Model.php';
	include '../View/PROFESOR_ADD_View.php';
	include '../View/PROFESOR_EDIT_View.php';
	include '../View/PROFESOR_DELETE_View.php';
	include '../View/PROFESOR_SEARCH_View.php';
	include '../View/PROFESOR_SHOWALL_View.php';
	include '../View/PROFESOR_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia CENTRO y la devuelve
	function get_data_form(){
		$dni = $_POST['dni'];
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$area = $_POST['area'];
		$departamento = $_POST['departamento'];
		$action = $_POST['action'];
		
		$profesor = new PROFESOR_Model($dni,$nombre,$apellidos,$area,$departamento);
		return $profesor;
	}

	
// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // se incoca la vista de add de CENTRO
					new PROFESOR_ADD();
				}
				else{
					$PROFESOR = get_data_form(); //se recogen los datos del formulario
					$respuesta = $PROFESOR->ADD();
					new MESSAGE($respuesta, '../Controller/PROFESOR_Controller.php');
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$PROFESOR = new PROFESOR_Model($_REQUEST['dni'],'','','','');
					$valores = $PROFESOR->RellenaDatos();
					new PROFESOR_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$PROFESOR = get_data_form();
					$respuesta = $PROFESOR->DELETE();
					new MESSAGE($respuesta, '../Controller/PROFESOR_Controller.php');
				}
				break;
			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$PROFESOR = new PROFESOR_Model($_REQUEST['dni'],'','','',''); // Creo el objeto
					$valores = $PROFESOR->RellenaDatos(); // obtengo todos los datos de la tupla
					if (is_array($valores))
					{
						new PROFESOR_EDIT($valores); //invoco la vista de edit con los datos 
							//precargados
					}else
					{
						new MESSAGE($valores, '../Controller/PROFESOR_Controller.php');
					}
				}
				else{

					$PROFESOR = get_data_form(); //recojo los valores del formulario

					$respuesta = $PROFESOR->EDIT(); // update en la bd en la bd
					new MESSAGE($respuesta, '../Controller/PROFESOR_Controller.php');
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					new PROFESOR_SEARCH();
				}
				else{
					$PROFESOR = get_data_form();
					$datos = $PROFESOR->SEARCH();
					
					$lista = array('DNI','NOMBREPROFESOR','APELLIDOSPROFESOR','AREAPROFESOR','DEPARTAMENTOPROFESOR');
					
					new PROFESOR_SHOWALL($lista, $datos, '../index.php');
				}
				break;
			case 'SHOWCURRENT':
				$PROFESOR = new PROFESOR_Model($_REQUEST['dni'],'','','','');
				$valores = $PROFESOR->RellenaDatos();
				new PROFESOR_SHOWCURRENT($valores);
				break;
			default:
				if (!$_POST){
					$PROFESOR = new PROFESOR_Model('','','','','');
				}
				else{
					$PROFESOR = get_data_form();
				}
				$datos = $PROFESOR->SEARCH();
				$lista = array('DNI','NOMBREPROFESOR','APELLIDOSPROFESOR','AREAPROFESOR','DEPARTAMENTOPROFESOR');
				new PROFESOR_SHOWALL($lista, $datos);
		}

?>
