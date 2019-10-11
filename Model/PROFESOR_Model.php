
<?php

//	Clase : EDIFICIO_Model
//	Creado el : 09-10-2017
//	Creado por: Diego E. Fontan
//-------------------------------------------------------

class PROFESOR_Model {
	var $dni;
	var $nombre;
	var $apellidos;
	var $area;
	var $departamento;

	//	Constructor de la clase
	//

	function __construct($dni,$nombre,$apellidos,$area,$departamento){
		$this->dni = $dni;
		$this->nombre = $nombre;
		$this->apellidos = $apellidos;
		$this->area = $area;
		$this->departamento = $departamento;
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
			$sql = "select * from PROFESOR where DNI = '".$this->dni."'";

			if (!$result = $this->mysqli->query($sql))
			{
				return 'Error de gestor de base de datos';
			}

			if ($result->num_rows == 1){  // existe el usuario
					return 'Inserción fallida: el elemento ya existe';
				}

			$sql = "INSERT INTO PROFESOR (
				DNI,
				NOMBREPROFESOR,
				APELLIDOSPROFESOR,
				AREAPROFESOR,
				DEPARTAMENTOPROFESOR) 
					VALUES (
						'".$this->dni."',
						'".$this->nombre."',
						'".$this->apellidos."',
						'".$this->area."',
						'".$this->departamento."'
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

	/**
	 * Busca valores en la BD
	 * 
	 * @return resultado Valores resultantes || Mensaje de error
	 */
	function SEARCH()
	{
		// Sentencia SQL
		$sql = "SELECT *
				FROM PROFESOR
				WHERE (
					DNI LIKE '%".$this->dni."%' AND
					NOMBREPROFESOR LIKE '%".$this->nombre."%' AND
					APELLIDOSPROFESOR LIKE '%".$this->apellidos."%' AND
					AREAPROFESOR LIKE '%".$this->area."%' AND
					DEPARTAMENTOPROFESOR LIKE '%".$this->departamento."%'
				)";

		// Ejecutamos la sentencia y devolvemos
		// el valor o un mensaje de error
		if (!$resultado = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';
		}
		else
		{
			return $resultado;
		}
	}

	//funcion DELETE : comprueba que la tupla a borrar existe y una vez
	// verificado la borra
	function DELETE()
	{
	$sql = "DELETE FROM 
				PROFESOR
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
				FROM PROFESOR
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
		$sql = "UPDATE PROFESOR
				SET
					NOMBREPROFESOR = '$this->nombre',
					APELLIDOSPROFESOR = '$this->apellidos',
					AREAPROFESOR = '$this->area',
					DEPARTAMENTOPROFESOR = '$this->departamento'
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