<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 11/01/2019
	 */

	/**
	 * Modelo de la entidad PROFESOR
	 * 
	 * @var dni DNI del profesor (PK)
	 * @var nombre Nombre del profesor
	 * @var apellidos Apellidos del profesor
	 * @var area Área de conocimiento del profesor
	 * @var departamento Departamento del profesor
	 * 
	 * @var mysqli Conexión con la BD
	 */
	class PROFESOR_Model
	{
		// Variables de la clase
		var $dni;
		var $nombre;
		var $apellidos;
		var $area;
		var $departamento;

		/**
		 * Constructor de la clase
		 */
		function __construct($dni,$nombre,$apellidos,$area,$departamento){
			$this->dni = $dni;
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->area = $area;
			$this->departamento = $departamento;

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
			$sql = "select * from PROFESOR where DNI = '".$this->dni."'";

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

			// Ejecutamos la sentencia y devolvemos
			// el mensaje correspondiente
			if (!$this->mysqli->query($sql))
			{
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

		/**
		 * Borra valores de la BD
		 * 
		 * @return resultado Mensaje correspondiente al resultado
		 */
		function DELETE()
		{
			// Sentencia SQL
			$sql = "DELETE FROM 
						PROFESOR
					WHERE(
						DNI = '$this->dni'
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
					FROM PROFESOR
					WHERE (
						(DNI = '$this->dni') 
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
			$sql = "UPDATE PROFESOR
					SET
						NOMBREPROFESOR = '$this->nombre',
						APELLIDOSPROFESOR = '$this->apellidos',
						AREAPROFESOR = '$this->area',
						DEPARTAMENTOPROFESOR = '$this->departamento'
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