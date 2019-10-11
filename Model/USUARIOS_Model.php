<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 */

	/**
	 * Modelo de la entidad USUARIOS
	 * 
	 * @var login DNI del usuario (PK)
	 * @var password Contraseña del usuario
	 * @var nombre Nombre del usuario
	 * @var email Email del usuario
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
		var $mysqli;

		/**
		 * Constructor de la clase
		 */
		function __construct($login,$password,$nombre,$apellidos,$email){
			$this->login = $login;
			$this->password = $password;
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->email = $email;

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
		 * Comprueba que los datos recibidos cumplan los estándares
		 * 
		 * @return response Verdadero || Los errores de los datos
		 */
		function Comprobar_atributos()
		{
			if ($this->Comprobar_login & $this->Comprobar_nombre)
			{
				return true;
			}
			else
			{
				return $this->erroresdatos;
			}
		}

		/**
		 * Comprueba el formato del login
		 * Formato: Alfnum, Len: 5-15, !vacio
		 * 
		 * @return response Respuesta booleana
		 */
		function Comprobar_login()
		{
			if (!preg_match("^([a-zA-Z][0-9]){5,15}^",$this->login))
			{
				$error = 'Error en login: Mal formato';
				array_push($this->erroresdatos, $error);
				return false;
			}
			else
			{
				return true;
			}
		}

		/**
		 * Comprueba el formato del nombre
		 * Formato: Alf, Len: 3-30, !vacio
		 * 
		 * @return response Respuesta booleana
		 */
		function Comprobar_nombre()
		{
			$correcto = true;

			if (strlen($this->nombre) < 3)
			{
				$error = 'Error en nombre: longitud menor que 3';
				array_push($this->erroresdatos, $error);
				$correcto = false;
			}
			if (strlen($this->nombre) > 30)
			{
				$error = 'Error en nombre: longitud mayor de 30';
				array_push($this->erroresdatos, $error);
				$correcto = false;
			}
			if (!preg_match("^([a-zA-Z])^", $this->nombre)){
				$error = 'Error en nombre: Solo se admiten alfabéticos';
				array_push($this->erroresdatos, $error);
				$correcto = false;
			}
			
			return $correcto;
		}

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
						email) 
					VALUES (
						'".$this->login."',
						'".$this->password."',
						'".$this->nombre."',
						'".$this->apellidos."',
						'".$this->email."'
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
						password LIKE '%".$this->password."%' AND
						nombre LIKE '%".$this->nombre."%' AND
						apellidos LIKE '%".$this->apellidos."%' AND
						email LIKE '%".$this->email."%'
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
						password = '$this->password',
						nombre = '$this->nombre',
						apellidos = '$this->apellidos',
						email = '$this->email'
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
				if ($tupla['password'] == $this->password)
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
						email) 
					VALUES (
						'".$this->login."',
						'".$this->password."',
						'".$this->nombre."',
						'".$this->apellidos."',
						'".$this->email."'
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