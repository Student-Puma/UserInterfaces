
<?php

//	Clase : EDIFICIO_Model
//	Creado el : 09-10-2017
//	Creado por: Diego E. Fontan
//-------------------------------------------------------

class PROF_ESPACIO_Model {
	var $dni;
	var $CODEspacio;

	//	Constructor de la clase
	//

	function __construct($dni,$CODEspacio){
		$this->dni = $dni;
		$this->CODEspacio = $CODEspacio;
		$this->erroresdatos = array(); 

		//$this->Comprobar_atributos();

		include_once '../Model/Access_DB.php';
		$this->mysqli = ConnectDB();
	}

	//Metodo ADD
	//Inserta en la tabla  de la bd  los valores
	// de los atributos del objeto. Comprueba si la clave/s esta vacia y si 
	//existe ya en la tabla
	function ADD()
	{
			$sql = "select * from PROF_ESPACIO where DNI = '".$this->dni."'";

			if (!$result = $this->mysqli->query($sql))
			{
				return 'Error de gestor de base de datos';
			}

			if ($result->num_rows == 1){  // existe el usuario
					return 'Inserción fallida: el elemento ya existe';
				}

			$sql = "INSERT INTO PROF_ESPACIO (
				DNI,
				CODESPACIO) 
					VALUES (
						'".$this->dni."',
						'".$this->CODEspacio."'
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
				FROM PROF_ESPACIO
				WHERE (
					DNI LIKE '%".$this->dni."%' AND
					CODESPACIO LIKE '%".$this->CODEspacio."%'
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
	$sql = "DELETE FROM 
				PROF_ESPACIO
			WHERE(
				DNI = '$this->dni'
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
				FROM PROF_ESPACIO
				WHERE (
					(DNI = '$this->dni') 
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
		$sql = "UPDATE PROF_ESPACIO
				SET
					CODESPACIO = '$this->CODEspacio'
				WHERE (
					DNI = '$this->dni'
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