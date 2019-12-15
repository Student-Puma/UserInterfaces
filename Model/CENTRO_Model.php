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
	 * Modelo de la entidad CENTRO
	 * 
	 * @var CODCentro Código del centro (PK)
	 * @var CODEdificio Código del edificio (FK)
	 * @var nombre Nombre del edificio
	 * @var direccion Dirección del edificio
	 * @var responsable Responsable del centro (FK?)
	 * 
	 * @var mysqli Conexión con la BD
	 */
	class CENTRO_Model
	{
		// Variables de la clase
		var $CODCentro;
		var $CODEdificio;
		var $nombre;
		var $direccion;
		var $responsable;

		/**
		 * Constructor de la clase
		 */
		function __construct($CODCentro,$CODEdificio,$nombre,$direccion,$responsable){
			$this->CODCentro = $CODCentro;
			$this->CODEdificio = $CODEdificio;
			$this->nombre = $nombre;
			$this->direccion = $direccion;
			$this->responsable = $responsable;
			
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
			$this->comprobar_CODCENTRO();
			$this->comprobar_CODEDIFICIO();
			$this->comprobar_NOMBRECENTRO();
			$this->comprobar_DIRECCIONCENTRO();
			$this->comprobar_RESPONSABLECENTRO();
			
			return empty($this->erroresdatos);
		}

		/**
		 * Funciones simbólicas para cada atributo
		 */
		function comprobar_CODCENTRO() { $resultado = comprobar_codigo($this->CODCentro,"codigo centro"); if($resultado !== true) { $this->erroresdatos = array_merge($this->erroresdatos, $resultado); } return $resultado; }
		function comprobar_CODEDIFICIO() { $resultado = comprobar_codigo($this->CODEdificio,"codigo edificio"); if($resultado !== true) { $this->erroresdatos = array_merge($this->erroresdatos, $resultado); } return $resultado; }
		function comprobar_NOMBRECENTRO() { $resultado = comprobar_nombreedificio($this->nombre,"nombre"); if($resultado !== true) { $this->erroresdatos = array_merge($this->erroresdatos, $resultado); } return $resultado; }
		function comprobar_DIRECCIONCENTRO() { $resultado = comprobar_direccion($this->direccion); if($resultado !== true) { $this->erroresdatos = array_merge($this->erroresdatos, $resultado); } return $resultado; }
		function comprobar_RESPONSABLECENTRO() { $resultado = comprobar_responsable($this->responsable); if($resultado !== true) { $this->erroresdatos = array_merge($this->erroresdatos, $resultado); } return $resultado; }

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
			$sql = "select * from CENTRO where CODCENTRO = '".$this->CODCentro."'";

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
					FROM CENTRO
					WHERE (
						CODCENTRO LIKE '%".$this->CODCentro."%' AND
						CODEDIFICIO LIKE '%".$this->CODEdificio."%' AND
						NOMBRECENTRO LIKE '%".$this->nombre."%' AND
						DIRECCIONCENTRO LIKE '%".$this->direccion."%' AND
						RESPONSABLECENTRO LIKE '%".$this->responsable."%'
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
			if($this->comprobar_CODCENTRO() !== true) { return $this->erroresdatos; }

			// Sentencia SQL
			$sql = "DELETE FROM 
						CENTRO
					WHERE(
						CODCENTRO = '$this->CODCentro'
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
					FROM CENTRO
					WHERE (
						(CODCENTRO = '$this->CODCentro') 
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
			$sql = "UPDATE CENTRO
					SET 
						CODEDIFICIO = '$this->CODEdificio',
						NOMBRECENTRO = '$this->nombre',
						DIRECCIONCENTRO = '$this->direccion',
						RESPONSABLECENTRO = '$this->responsable'
					WHERE (
						CODCENTRO = '$this->CODCentro'
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