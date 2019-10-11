<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 */

	/**
	 * Modelo de la entidad ESPACIO
	 * 
	 * @var CODEspacio Código del espacio (PK)
	 * @var CODEdificio Código del edificio (FK)
	 * @var CODEdificio Código del edificio (FK)
	 * @var tipo Tipo de espacio
	 * @var superficie Superficie asignada al espacio
	 * @var numinventario Número de inventario del espacio
	 * 
	 * @var mysqli Conexión con la BD
	 */
	class ESPACIO_Model
	{
		// Variables de la clase
		var $CODEspacio;
		var $CODEdificio;
		var $CODCentro;
		var $tipo;
		var $superficie;
		var $numinventario;

		/**
		 * Constructor de la clase
		 */
		function __construct($CODEspacio,$CODEdificio,$CODCentro,$tipo,$superficie,$numinventario){
			$this->CODEspacio = $CODEspacio;
			$this->CODEdificio = $CODEdificio;
			$this->CODCentro = $CODCentro;
			$this->tipo = $tipo;
			$this->superficie = $superficie;
			$this->numinventario = $numinventario;

			$this->erroresdatos = array(); // FIX: ? Unused variable

			// Añadimos el modelo de acceso a la base de datos
			include_once '../Model/Access_DB.php';
			// Nos conectamos con la base de datos
			$this->mysqli = ConnectDB();
		}

		/**
		 * Destructor de la clase
		 */
		function __destruct()
		{ }

		/**
		 * Inserta valores en la BD
		 * Comprueba si la clave está vacía o si ya existe en la tabla
		 * 
		 * @return msg Mensaje correspondiente al resultado
		 */
		function ADD()
		{
			// Consulta SQL
			$sql = "select * from ESPACIO where CODESPACIO = '".$this->CODEspacio."'";

			// Ejecuta la consulta
			if (!$result = $this->mysqli->query($sql))
			{
				return 'Error de gestor de base de datos';
			}

			// Comprueba si ya existe la clave
			if ($result->num_rows == 1)
			{
				return 'Inserción fallida: el elemento ya existe';
			}

			// Consulta SQL
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

			// Ejecutamos la sentencia y devolvemos
			// el mensaje correspondiente
			if (!$this->mysqli->query($sql)) {
				return 'Error de gestor de base de datos';
			}
			else
			{
				return 'Inserción realizada con éxito';
			}		
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
					FROM ESPACIO
					WHERE (
						CODESPACIO LIKE '%".$this->CODEspacio."%' AND
						CODEDIFICIO LIKE '%".$this->CODEdificio."%' AND
						CODCENTRO LIKE '%".$this->CODCentro."%' AND
						TIPO LIKE '%".$this->tipo."%' AND
						SUPERFICIEESPACIO LIKE '%".$this->superficie."%' AND
						NUMINVENTARIOESPACIO LIKE '%".$this->numinventario."%'
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

		/**
		 * Borra valores de la BD
		 * 
		 * @return resultado Mensaje correspondiente al resultado
		 */
		function DELETE()
		{
			// Sentencia SQL
			$sql = "DELETE FROM 
						ESPACIO
					WHERE(
						CODESPACIO = '$this->CODEspacio'
					)";

			// Ejecutamos la sentencia y devolvemos el mensaje correspondiente
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

		/**
		 * Recupera todos los atributos de una tupla a partir de su clave
		 * 
		 * @return tupla Valores resultantes || Mensaje de error
		 */
		function RellenaDatos()
		{
			// Sentencia SQL
			$sql = "SELECT *
					FROM ESPACIO
					WHERE (
						(CODESPACIO = '$this->CODEspacio') 
					)";

			// Ejecutamos la sentencia y devolvemos
			// el valor o un mensaje de error
			if (!$resultado = $this->mysqli->query($sql))
			{
				return 'Error de gestor de base de datos';
			}
			else
			{
				$tupla = $resultado->fetch_array();
			}
			return $tupla;
		}

		/**
		 * Realizar el UPDATE de una tupla despues de comprobar que existe
		 * 
		 * @return resultado Mensaje correspondiente al resultado
		 */
		function EDIT()
		{
			// Sentencia SQL
			$sql = "UPDATE ESPACIO
					SET
						CODEDIFICIO = '$this->CODEdificio',
						CODCENTRO = '$this->CODCentro',
						TIPO = '$this->tipo',
						SUPERFICIEESPACIO = '$this->superficie',
						NUMINVENTARIOESPACIO = '$this->numinventario'
					WHERE (
						CODESPACIO = '$this->CODEspacio'
					)";
			// Ejecutamos la sentencia y devolvemos
			// el mensaje correspondiente
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