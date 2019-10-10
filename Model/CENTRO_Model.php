
<?php

//	Clase : CENTRO_Model
//	Creado el : 09-10-2017
//	Creado por: Diego E. Fontan
//-------------------------------------------------------

class CENTRO_Model {
	var $CODCentro;
	var $CODEdificio;
	var $nombre;
	var $direccion;
	var $responsable;

	//	Constructor de la clase
	//

	function __construct($CODCentro,$CODEdificio,$nombre,$direccion,$responsable){
		$this->CODCentro = $CODCentro;
		$this->CODEdificio = $CODEdificio;
		$this->nombre = $nombre;
		$this->direccion = $direccion;
		$this->responsable = $responsable;
		$this->erroresdatos = array(); 

		//$this->Comprobar_atributos();

		include_once '../Model/Access_DB.php';
		$this->mysqli = ConnectDB();
	}

	// function Comprobar_atributos
	// si todas las funciones de comprobacion de atributos individuales son true devuelve true
	// si alguna es false, devuelve el array de errores de datos
	function Comprobar_atributos()
	{
		if ($this->Comprobar_login &
			$this->Comprobar_nombre)
		{
			return true;
		}
		else
			{
				return $this->erroresdatos;
			}
	}

	// function Comprobar_login()
	// Comprueba el formato del login 
	//	alfanumerico
	//	mayor o igual a 5
	// 	menor o igual a 15
	//	no vacio
	// devuelve un true o un false y rellena en caso de error el array de errores de datos
	function Comprobar_login()
	{
		// TODO: DELETE
	}

	// function Comprobar_login()
	// Comprueba el formato del login 
	//	alfanumerico
	//	mayor o igual a 5
	// 	menor o igual a 15
	//	no vacio
	// devuelve un true o un false y rellena en caso de error el array de errores de datos
	function Comprobar_nombre()
	{
		$correcto = true;

		if (strlen($this->nombre)<3)
		{
			$error = 'Error en nombre: longitud menor que 3';
			array_push($this->erroresdatos, $error);
			$correcto = false;
		}
		if (strlen($this->nombre)>30)
		{
			$error = 'Error en nombre: longitud mayor de 30';
			array_push($this->erroresdatos, $error);
			$correcto = false;
		}
		if (!preg_match("^([a-zA-Z])^",$this->nombre)){
			$error = 'Error en nombre: Solo se admiten alfabéticos';
			array_push($this->erroresdatos, $error);
			$correcto = false;
		}
		
		return $correcto;
	}

	//Metodo ADD
	//Inserta en la tabla  de la bd  los valores
	// de los atributos del objeto. Comprueba si la clave/s esta vacia y si 
	//existe ya en la tabla
	function ADD()
	{
			$sql = "select * from CENTRO where CODCENTRO = '".$this->CODCentro."'";

			if (!$result = $this->mysqli->query($sql))
			{
				return 'Error de gestor de base de datos';
			}

			if ($result->num_rows == 1){  // existe el usuario
					return 'Inserción fallida: el elemento ya existe';
				}

			$sql = "INSERT INTO CENTRO (
				CODCENTRO,
				CODEDIFICIO,
				NOMBRECENTRO,
				DIRECCIONCENTRO,
				RESPONSABLECENTRO) 
					VALUES (
						'".$this->CODCentro."',
						'".$this->CODEdificio."',
						'".$this->nombre."',
						'".$this->direccion."',
						'".$this->responsable."'
						)";

			if (!$this->mysqli->query($sql)) {
				return 'Error de gestor de base de datos';
			}
			else{
				return 'Inserción realizada con éxito'; //operacion de insertado correcta
			}		
	}
		

	//funcion de destrucción del objeto: se ejecuta automaticamente
	//al finalizar el script
	function __destruct()
	{

	}


	//funcion SEARCH: hace una búsqueda en la tabla con
	//los datos proporcionados. Si van vacios devuelve todos
	function SEARCH()
	{

		$sql = "SELECT *
				FROM CENTRO
				WHERE (
					CODCENTRO LIKE '%".$this->CODCentro."%' AND
					CODEDIFICIO LIKE '%".$this->CODEdificio."%' AND
					NOMBRECENTRO LIKE '%".$this->nombre."%' AND
					DIRECCIONCENTRO LIKE '%".$this->direccion."%' AND
					RESPONSABLECENTRO LIKE '%".$this->responsable."%'
				)
		";
		if (!$resultado = $this->mysqli->query($sql))
			{
				return 'Error de gestor de base de datos';
			}
		return $resultado;
		
	}

	//funcion DELETE : comprueba que la tupla a borrar existe y una vez
	// verificado la borra
	function DELETE()
	{
	$sql = "	DELETE FROM 
					CENTRO
				WHERE(
					CODCENTRO = '$this->CODCentro'
				)
				";

		if ($this->mysqli->query($sql))
		{
			$resultado = 'Borrado realizado con éxito';
		}
		else
		{
			$resultado = 'Error de gestor de base de datos';
		}
		return $resultado;
	}

	// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
	function RellenaDatos()
	{
		$sql = "SELECT *
				FROM CENTRO
				WHERE (
					(CODCENTRO = '$this->CODCentro') 
				)";

		if (!$resultado = $this->mysqli->query($sql))
		{
				return 'Error de gestor de base de datos';
		}else
		{
			$tupla = $resultado->fetch_array();
		}
		return $tupla;
	}

	// funcion Edit: realizar el update de una tupla despues de comprobar que existe
	function EDIT()
	{
		$sql = "UPDATE CENTRO
				SET 
					CODEDIFICIO = '$this->CODEdificio',
					NOMBRECENTRO = '$this->nombre',
					DIRECCIONCENTRO = '$this->direccion',
					RESPONSABLECENTRO = '$this->responsable'
				WHERE (
					CODCENTRO = '$this->CODCentro'
				)
				";
		if ($this->mysqli->query($sql))
		{
			$resultado = 'Actualización realizada con éxito';
		}
		else
		{
			$resultado = 'Error de gestor de base de datos';
		}
		return $resultado;
	}
}

?> 