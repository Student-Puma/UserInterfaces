<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 */

	/**
	 * Modelo de la entidad EDIFICIO
	 * 
	 * @var CODEdificio Código del edificio (PK)
	 * @var nombre Nombre del edificio
	 * @var direccion Dirección del edificio
	 * @var campus Campus en el cual está situado el edificio
	 * 
	 * @var mysqli Conexión con la BD
	 */
	class EDIFICIO_Model
	{
		// Variables de la clase
		var $CODEdificio;
		var $nombre;
		var $direccion;
		var $campus;

		/**
		 * Constructor de la clase
		 */
		function __construct($CODEdificio,$nombre,$direccion,$campus){
			$this->CODEdificio = $CODEdificio;
			$this->nombre = $nombre;
			$this->direccion = $direccion;
			$this->campus = $campus;

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
			$sql = "select * from EDIFICIO where CODEDIFICIO = '".$this->CODEdificio."'";

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
			$sql = "INSERT INTO EDIFICIO (
						CODEDIFICIO,
						NOMBREEDIFICIO,
						DIRECCIONEDIFICIO,
						CAMPUSEDIFICIO) 
					VALUES (
						'".$this->CODEdificio."',
						'".$this->nombre."',
						'".$this->direccion."',
						'".$this->campus."'
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
					FROM EDIFICIO
					WHERE (
						CODEDIFICIO LIKE '%".$this->CODEdificio."%' AND
						NOMBREEDIFICIO LIKE '%".$this->nombre."%' AND
						DIRECCIONEDIFICIO LIKE '%".$this->direccion."%' AND
						CAMPUSEDIFICIO LIKE '%".$this->campus."%'
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
					EDIFICIO
				WHERE(
					CODEDIFICIO = '$this->CODEdificio'
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
					FROM EDIFICIO
					WHERE (
						(CODEDIFICIO = '$this->CODEdificio') 
					)";

			// Ejecutamos la sentencia y devolvemos
			// el valor o un mensaje de error
			if (!$resultado = $this->mysqli->query($sql))
			{
				$tupla = 'Error de gestor de base de datos';
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
			$sql = "UPDATE EDIFICIO
					SET
						NOMBREEDIFICIO = '$this->nombre',
						DIRECCIONEDIFICIO = '$this->direccion',
						CAMPUSEDIFICIO = '$this->campus'
					WHERE (
						CODEDIFICIO = '$this->CODEdificio'
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