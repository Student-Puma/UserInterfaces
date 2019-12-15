<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 15/12/2019
	 */

	/**
	 * Modelo de la entidad
	 */

	// Añadimos las validaciones
	include_once '../Functions/Validaciones.php';

	/**
	 * Modelo de la entidad PROF_TITULACION
	 * 
	 * @var dni DNI del profesor (PK)
	 * @var CODTitulacion Código de la titulación (FK)
	 * @var anho Año
	 * 
	 * @var mysqli Conexión con la BD
	 */
	class PROF_TITULACION_Model
	{
		var $dni;
		var $CODTitulacion;
		var $anho;

		/**
		 * Constructor de la clase
		 */
		function __construct($dni,$CODTitulacion,$anho){
			$this->dni = $dni;
			$this->CODTitulacion = $CODTitulacion;
			$this->anho = $anho;
			
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
			$this->comprobar_CODTITULACION();
			$this->comprobar_ANHOACADEMICO();

			return empty($this->erroresdatos);
		}

		/**
		 * Funciones simbólicas para cada atributo
		 */
		function comprobar_DNI() { $resultado = comprobar_DNI($this->dni); if($resultado !== true) { $this->erroresdatos = array_merge($this->erroresdatos, $resultado); } return $resultado; }
		function comprobar_CODTITULACION() { $resultado = comprobar_codigo_titulacion($this->CODTitulacion, "codigo"); if($resultado !== true) { $this->erroresdatos = array_merge($this->erroresdatos, $resultado); } return $resultado; }
		function comprobar_ANHOACADEMICO() { $resultado = comprobar_anhoacademico($this->anho); if($resultado !== true) { $this->erroresdatos = array_merge($this->erroresdatos, $resultado); } return $resultado; }

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
			$sql = "select * from PROF_TITULACION where (DNI = '".$this->dni."' AND CODTITULACION = '".$this->CODTitulacion."')";

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
			$sql = "INSERT INTO PROF_TITULACION (
						DNI,
						CODTITULACION,
						ANHOACADEMICO) 
					VALUES (
						'".$this->dni."',
						'".$this->CODTitulacion."',
						'".$this->anho."'
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
					FROM PROF_TITULACION
					WHERE (
						DNI LIKE '%".$this->dni."%' AND
						CODTITULACION LIKE '%".$this->CODTitulacion."%' AND
						ANHOACADEMICO LIKE '%".$this->anho."%'
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
			// Eliminamos anteriores errores
			$this->erroresdatos = array();

			// Comprobamos atributos
			$this->comprobar_DNI();
			$this->comprobar_CODTITULACION();
			if(!empty($this->erroresdatos)) { return $this->erroresdatos; }

			// Sentencia SQL
			$sql = "DELETE FROM 
						PROF_TITULACION
					WHERE(
						DNI = '$this->dni' AND
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
					FROM PROF_TITULACION
					WHERE (
						(DNI = '$this->dni' AND
						CODTITULACION = '$this->CODTitulacion') 
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
			// Comprobamos atributos
			if($this->comprobar_atributos() !== true) { return $this->erroresdatos; }
			
			// Sentencia SQL
			$sql = "UPDATE PROF_TITULACION
					SET
						ANHOACADEMICO = '$this->anho'
					WHERE (
						DNI = '$this->dni' AND
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