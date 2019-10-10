
<?php

//	Clase : EDIFICIO_Model
//	Creado el : 09-10-2017
//	Creado por: Diego E. Fontan
//-------------------------------------------------------

class ESPACIO_Model {
	var $CODEspacio;
	var $CODEdificio;
	var $CODCentro;
	var $tipo;
	var $superficie;
	var $numinventario;

	//	Constructor de la clase
	//

	function __construct($CODEspacio,$CODEdificio,$CODCentro,$tipo,$superficie,$numinventario){
		$this->CODEspacio = $CODEspacio;
		$this->CODEdificio = $CODEdificio;
		$this->CODCentro = $CODCentro;
		$this->tipo = $tipo;
		$this->superficie = $superficie;
		$this->numinventario = $numinventario;
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
			$sql = "select * from ESPACIO where CODESPACIO = '".$this->CODEspacio."'";

			if (!$result = $this->mysqli->query($sql))
			{
				return 'Error de gestor de base de datos';
			}

			if ($result->num_rows == 1){  // existe el usuario
					return 'Inserción fallida: el elemento ya existe';
				}

			$sql = "INSERT INTO ESPACIO (
				CODESPACIO,
				CODEDIFICIO,
				CODCENTRO,
				TIPO,
				SUPERFICIEESPACIO,
				NUMINVENTARIOESPACIO) 
					VALUES (
						'".$this->CODEspacio."',
						'".$this->CODEdificio."',
						'".$this->CODCentro."',
						'".$this->tipo."',
						'".$this->superficie."',
						'".$this->numinventario."'
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
				FROM ESPACIO
				WHERE (
					CODESPACIO LIKE '%".$this->CODEspacio."%' AND
					CODEDIFICIO LIKE '%".$this->CODEdificio."%' AND
					CODCENTRO LIKE '%".$this->CODCentro."%' AND
					TIPO LIKE '%".$this->tipo."%' AND
					SUPERFICIEESPACIO LIKE '%".$this->superficie."%' AND
					NUMINVENTARIOESPACIO LIKE '%".$this->numinventario."%'
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
				ESPACIO
			WHERE(
				CODESPACIO = '$this->CODEspacio'
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
				FROM ESPACIO
				WHERE (
					(CODESPACIO = '$this->CODEspacio') 
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
		$sql = "UPDATE ESPACIO
				SET
					CODEDIFICIO = '$this->CODEdificio',
					CODCENTRO = '$this->CODCentro',
					TIPO = '$this->tipo',
					SUPERFICIEESPACIO = '$this->superficie',
					NUMINVENTARIOESPACIO = '$this->numinventario'
				WHERE (
					CODESPACIO = '$this->CODEspacio'
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