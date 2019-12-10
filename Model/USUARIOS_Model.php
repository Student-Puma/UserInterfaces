<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
	 */

	/**
	 * Modelo de la entidad USUARIOS
	 * 
	 * @var login DNI del usuario (PK)
	 * @var password Contraseña del usuario
	 * @var nombre Nombre del usuario
	 * @var email Email del usuario
	 * @var dni DNI del usuario
	 * @var telefono Teléfono del usuario
	 * @var fechanac Fecha de nacimiento del usuario
	 * @var fotopersonal Foto personal
	 * @var sexo Sexo del usuario
	 * 
	 * @var mysqli Conexión con la BD
	 */
	class USUARIOS_Model
	{
		// Variables de la clase
		var $login;
		var $password;
		var $nombre;
		var $apellidos;
		var $email;
		var $dni;
		var $telefono;
		var $fechanac;
		var $fotopersonal;
		var $sexo;
		var $md5pass;

		/**
		 * Constructor de la clase
		 */
		function __construct($login,$password,$dni,$nombre,$apellidos,$email,$telefono,$fechanac,$fotopersonal,$sexo){
			$this->login = $login;
			$this->password = $password;
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->email = $email;
			$this->dni = $dni;
			$this->telefono = $telefono;
			$this->fechanac = $fechanac;
			$this->fotopersonal = $fotopersonal;
			$this->sexo = $sexo;

			$this->md5pass = empty($this->password) ? '' : md5($this->password);

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
		 * Inserta valores en la BD
		 * Comprueba si la clave está vacía o si ya existe en la tabla
		 * 
		 * @return msg Mensaje correspondiente al resultado
		 */
		function ADD()
		{
			// Consulta SQL
			$sql = "select * from USUARIOS where login = '".$this->login."'";

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
			$sql = "INSERT INTO USUARIOS (
						login,
						password,
						nombre,
						apellidos,
						email,
						DNI,
						telefono,
						FechaNacimiento,
						fotopersonal,
						sexo) 
					VALUES (
						'".$this->login."',
						'".$this->md5pass."',
						'".$this->nombre."',
						'".$this->apellidos."',
						'".$this->email."',
						'".$this->dni."',
						'".$this->telefono."',
						'".$this->fechanac."',
						'".$this->fotopersonal."',
						'".$this->sexo."'
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
					FROM USUARIOS
					WHERE (
						login LIKE '%".$this->login."%' AND
						password LIKE '%".$this->md5pass."%' AND
						nombre LIKE '%".$this->nombre."%' AND
						apellidos LIKE '%".$this->apellidos."%' AND
						email LIKE '%".$this->email."%' AND
						DNI LIKE '%".$this->dni."%' AND
						telefono LIKE '%".$this->telefono."%' AND
						FechaNacimiento LIKE '%".$this->fechanac."%' AND
						fotopersonal LIKE '%".$this->fotopersonal."%' AND
						sexo LIKE '%".$this->sexo."%'
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
			return $resultado;
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
						USUARIOS
					WHERE(
						login = '$this->login'
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
					FROM USUARIOS
					WHERE (
						(login = '$this->login') 
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
			$sql = "UPDATE USUARIOS
					SET 
						password = '$this->md5pass',
						nombre = '$this->nombre',
						apellidos = '$this->apellidos',
						email = '$this->email',
						DNI = '$this->dni',
						telefono = '$this->telefono',
						FechaNacimiento = '$this->fechanac',
						fotopersonal = '$this->fotopersonal',
						sexo = '$this->sexo'
					WHERE (
						login = '$this->login'
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

		/**
		 * Realiza la comprobación de si existe el usuario en la BD y
		 * además si la contraseña es correcta.
		 * 
		 * @return response True || Mensaje de error
		 */
		function login()
		{
			// Sentencia SQL
			$sql = "SELECT *
					FROM USUARIOS
					WHERE (
						(login = '$this->login') 
					)";

			// Ejecutamos la sentencia
			$resultado = $this->mysqli->query($sql);

			// Comprobamos si existe el usuario
			if ($resultado->num_rows == 0){
				return 'El login no existe';
			}
			else
			{
				// Obtenemos y comprobamos la contraseña
				$tupla = $resultado->fetch_array();
				if ($tupla['password'] == $this->md5pass)
				{
					return true;
				}
				else
				{
					return 'La password para este usuario no es correcta';
				}
			}
		}

		/**
		 * Comprueba si un usuario y existe en la BD
		 * 
		 * @return response True || Mensaje de error
		 */
		function Register()
		{
			// Sentencia SQL
			$sql = "select * from USUARIOS where login = '".$this->login."'";

			// Ejecutamos la sentencia y devolvemos
			// los datos correspondientes
			$result = $this->mysqli->query($sql);
			if ($result->num_rows == 1)
			{
				return 'El usuario ya existe';
			}
			else
			{
				return true;
			}
		}

		/**
		 * Permite registrar un nuevo usuario en la BD
		 * 
		 * @return response Mensaje correspondiente a la respuesta
		 */
		function registrar()
		{
			// Sentencia SQL
			$sql = "INSERT INTO USUARIOS (
						login,
						password,
						nombre,
						apellidos,
						email,
						DNI,
						telefono,
						FechaNacimiento,
						fotopersonal,
						sexo) 
					VALUES (
						'".$this->login."',
						'".$this->md5pass."',
						'".$this->nombre."',
						'".$this->apellidos."',
						'".$this->email."',
						'".$this->dni."',
						'".$this->telefono."',
						'".$this->fechanac."',
						'".$this->fotopersonal."',
						'".$this->sexo."'
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
	}
?> 