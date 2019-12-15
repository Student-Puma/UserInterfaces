<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
	 */

	// Añadimos las validaciones
	include_once '../Functions/Validaciones.php';

	/**
	 * Modelo de la entidad PROF_ESPACIO
	 * 
	 * @var dni DNI del profesor (PK)
	 * @var CODEspacio Código del espacio (FK)
	 * 
	 * @var mysqli Conexión con la BD
	 */
	class PROF_ESPACIO_Model
	{
		// Variables de la clase
		var $dni;
		var $CODEspacio;

		/**
		 * Constructor de la clase
		 */
		function __construct($dni,$CODEspacio){
			$this->dni = $dni;
			$this->CODEspacio = $CODEspacio;

			$this->erroresdatos = array();

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
		 * Comprueba todos los atributos
		 * 
		 * @return true || errores
		 */
		function comprobar_atributos()
		{
			// Eliminamos anteriores errores
			$this->erroresdatos = array();

			// Ejecutamos los test
			$this->comprobar_DNI();
			$this->comprobar_CODESPACIO();

			return empty($this->erroresdatos);
		}

		/**
		 * Funciones simbólicas para cada atributo
		 */
		function comprobar_DNI() { $resultado = comprobar_DNI($this->dni); if($resultado !== true) { $this->erroresdatos = array_merge($this->erroresdatos, $resultado); } return $resultado; }
		function comprobar_CODESPACIO() { $resultado = comprobar_codigo($this->CODEspacio); if($resultado !== true) { $this->erroresdatos = array_merge($this->erroresdatos, $resultado); } return $resultado; }


		/**
		 * Inserta valores en la BD
		 * Comprueba si la clave está vacía o si ya existe en la tabla
		 * 
		 * @return msg Mensaje correspondiente al resultado
		 */
		function ADD()
		{
			// Comprobamos atributos
			if($this->comprobar_atributos() !== true) { return $this->erroresdatos; }

			// Consulta SQL
			$sql = "select * from PROF_ESPACIO where (DNI = '".$this->dni."' AND CODESPACIO = '".$this->CODEspacio."')";

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
			$sql = "INSERT INTO PROF_ESPACIO (
						DNI,
						CODESPACIO) 
					VALUES (
						'".$this->dni."',
						'".$this->CODEspacio."'
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
					FROM PROF_ESPACIO
					WHERE (
						DNI LIKE '%".$this->dni."%' AND
						CODESPACIO LIKE '%".$this->CODEspacio."%'
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
			// Comprobamos atributos
			if($this->comprobar_atributos() !== true) { return $this->erroresdatos; }

			// Sentencia SQL
			$sql = "DELETE FROM 
						PROF_ESPACIO
					WHERE(
						DNI = '$this->dni' AND
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
					FROM PROF_ESPACIO
					WHERE (
						(DNI = '$this->dni' AND
						CODESPACIO = '$this->CODEspacio') 
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
		 * FIXME: Este código jamás se llegará a ejecutar
		 * 
		 * @return resultado Mensaje correspondiente al resultado
		 */
		function EDIT()
		{
			// Comprobamos atributos
			if($this->comprobar_atributos() !== true) { return $this->erroresdatos; }
			
			// Sentencia SQL
			$sql = "UPDATE PROF_ESPACIO
					SET
						CODESPACIO = '$this->CODEspacio'
					WHERE (
						DNI = '$this->dni'
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