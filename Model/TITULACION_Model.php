<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 11/01/2019
	 */

	/**
	 * Modelo de la entidad TITULACION
	 * 
	 * @var CODTitulacion Código de la titulación (PK)
	 * @var CODCentro Código del centro (FK)
     * @var nombre Nombre de la titulación
	 * @var responsable Responsable de la titulación (FK?)
	 * 
	 * @var mysqli Conexión con la BD
	 */
	class TITULACION_Model
	{
        var $CODTitulacion;
		var $CODCentro;
        var $nombre;
        var $responsable;

		/**
		 * Constructor de la clase
		 */
		function __construct($CODTitulacion,$CODCentro,$nombre,$responsable){
			$this->CODTitulacion = $CODTitulacion;
			$this->CODCentro = $CODCentro;
            $this->nombre = $nombre;
            $this->responsable = $responsable;
			
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
			$sql = "select * from TITULACION where CODTITULACION = '".$this->CODTitulacion."'";

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
			$sql = "INSERT INTO TITULACION (
						CODTITULACION,
						CODCENTRO,
						NOMBRETITULACION,
                        RESPONSABLETITULACION) 
					VALUES (
						'".$this->CODTitulacion."',
						'".$this->CODCentro."',
                        '".$this->nombre."',
						'".$this->responsable."'
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
					FROM TITULACION
					WHERE (
						CODTITULACION LIKE '%".$this->CODTitulacion."%' AND
						CODCENTRO LIKE '%".$this->CODCentro."%' AND
                        NOMBRETITULACION LIKE '%".$this->nombre."%' AND
						RESPONSABLETITULACION LIKE '%".$this->responsable."%'
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
						TITULACION
					WHERE(
						CODTITULACION = '$this->CODTitulacion'
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
					FROM TITULACION
					WHERE (
						(CODTITULACION = '$this->CODTitulacion') 
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
			$sql = "UPDATE TITULACION
					SET
						CODCENTRO = '$this->CODCentro',
                        NOMBRETITULACION = '$this->nombre',
						RESPONSABLETITULACION = '$this->responsable'
					WHERE (
						CODTITULACION = '$this->CODTitulacion'
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